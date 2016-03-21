<?php
/*   Copyright (C) Tomasz J. Kotarba, 2004
 *
 *   Do you want to contact me? I live in Cracow/Poland/EU so unless
 *   you live in this lovely and ancient city, you will most likely want to
 *   send me an e-mail... here is the address:
 *
 *   Tomasz J. Kotarba <tomasz@kotarba.net>
 *
 *
 *   This file is part of CACANMS.
 *   
 *   CACANMS is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *   
 *   CACANMS is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *   
 *   You should have received a copy of the GNU General Public License
 *   along with CACANMS; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

require "global_variables.inc.php";

require_once $classes."/session/system_action.inc.php";

////////////////////////////////////////////////////////////////////////////////////////////
$actions['all']=new Action('generate and install all files, clean, restart services','all');
function all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 $a=$actions['dhcp'];
 $a->Perform(); 
 $a=$actions['firewall'];
 $a->Perform(); 
 install_all();
 $a=$actions['clean'];
 $a->Perform(); 
 restart_all();
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['all install']=new Action('install all generated files','install_all');
function install_all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['dhcp install']; 
 $a->Perform(); 
 $a=$actions['firewall install']; 
 $a->Perform(); 
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['all restart']=new Action('restart all relevant services','restart_all');
function restart_all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['firewall stop'];
 $a->Perform(); 
 system($restart_services['dhcp']);
 system($restart_services['samba']);
 $a=$actions['firewall start'];
 $a->Perform(); 
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['awaiting']=new Action('list hosts awaiting for IP assignment','show_awaiting');
function show_awaiting()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 $awaiting_hosts=$local_network->Get_Awaiting_Hosts();
 if($awaiting_hosts!==null)
  foreach($awaiting_hosts as $host)
   echo $host->to_String()."\n";
  else
   echo "There are no hosts awaiting for IP assignment!\n";
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['clean']=new System_Action('remove output files',"rm -f '".$output_directory
                  ."'/*;echo Output directory purged.");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['dhcp']=new Action('generate DHCP daemon configuration file','dhcp');
function dhcp()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require $common_local_components.'/dhcp.php';
 $dhcp_configuration_file->Save();
 echo "DHCP configuration file generated.\n";
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['dhcp install']=new System_Action('install generated DHCP daemon configuration file'
                         ,"cp -f '{$output_files['dhcpd file']}' '".$files['dhcpd file']
			 ."'&&echo 'DHCP daemon configuration file installed.'");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall']=new Action('generate firewall files','firewall');
function firewall()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require $common_local_components."/firewall.php";
 echo "Firewall\n";
 $lan_chain->Save();
 $admin_chain->Save();
 $secondary_chain->Save();
 echo " Firewall chain files generated.\n";
 $firewall_configuration_file->Save();
 echo " Firewall configuration file generated.\n";
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall install']=new System_Action('install generated firewall files'
                         ,"echo 'Installing generated firewall files...';"
			 ."cp -f '{$output_files['lan chain file']}' '"
			 .$output_files['admin chain file']."' '"
			 .$output_files['secondary chain file']."' '".$firewall_directory
			 ."/chains'&&echo ' Firewall chains successfully installed.';"
			 ."cp -f '{$output_files['firewall configuration file']}' '"
			 .$files['firewall configuration file']."'&&echo ' Firewall configuration file installed.'");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall restart']=new System_Action('restart firewall'
                         ,"echo 'Restarting firewall...';cd {$firewall_directory};./run.sh restart&&echo 'Firewall restarted.'");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall start']=new System_Action('activate firewall'
                         ,"echo 'Activating firewall...';cd {$firewall_directory};./run.sh start&&echo 'Firewall activated.'");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall stop']=new System_Action('deactivate firewall'
                         ,"echo 'Deactivating firewall...';cd {$firewall_directory};./run.sh stop&&echo 'Firewall deactivated.'");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['interactive']=new Action('start an interactive session');

////////////////////////////////////////////////////////////////////////////////////////////
$actions['ls']=new System_Action('list output files',"ls -lh '{$output_directory}'");

////////////////////////////////////////////////////////////////////////////////////////////
$actions['network show']=new Action('show network definition','show_network');
function show_network()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 echo $local_network->to_String();
}

////////////////////////////////////////////////////////////////////////////////////////////
$actions['network update']=new Action('check primary server for update','update');
function update()
{
 echo "Updating local network database.\n";
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $classes."/miscellaneous/file.inc.php";
 // Loading local timestamp (timestamp known to secondary server)
 echo " Checking local timestamp.\n";
 $file=new File($files['timestamp']);
 if($file->Is_Readable())
  $local_timestamp=(int)$file->Load();
 else
 {
  $file->Open_for_Writing();
  $file->Write(0);
  $file->Close();
 }
 // Loading remote timestamp (timestamp published by primary server)
 echo " Checking remote timestamp.\n";
 $file=new File($remote_files['primary timestamp']);
 $primary_timestamp=(int)$file->Load();
 echo " Comparing both timestamps.\n";
 if($primary_timestamp>$local_timestamp)
 {
  echo " Update available.\n";
  // Copying local network database from primary local server
  $file=new File($remote_files['local network']);
  $local_file=new File($files['local network file']);
  $network_database=$file->Load();
  $local_file->Open_for_Writing();
  $local_file->Write($network_database);
  $local_file->Close();
  // Writing new timestamp
  $file=new File($files['timestamp']);
  $file->Open_for_Writing();
  $file->Write($primary_timestamp);
  $file->Close();
  echo " Local network database copy updated.\n";
  // Regenerating and restarting the system
  all();
 }
 else
  echo " Local network database copy already up-to-date.\n";
}

// Sort actions' array by key
ksort($actions);
?>
