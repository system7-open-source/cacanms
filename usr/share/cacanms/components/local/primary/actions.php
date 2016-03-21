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

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['all']=new Action('archive, assign IPs, generate and install all files, clean, restart services','all');
function all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 $a=$actions['archive'];
 $a->Perform(); 
 $a=$actions['assign'];
 $a->Perform(); 
 $a=$actions['dns'];
 $a->Perform(); 
 $a=$actions['dhcp'];
 $a->Perform(); 
 $a=$actions['firewall'];
 $a->Perform(); 
 install_all();
 $a=$actions['clean'];
 $a->Perform(); 
 $a=$actions['dhcp publish'];
 $a->Perform(); 
 $a=$actions['network publish'];
 $a->Perform(); 
 set_timestamp();
 restart_all();
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['all install']=new Action('install all generated files','install_all');
function install_all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['dhcp install']; 
 $a->Perform(); 
 $a=$actions['dns install']; 
 $a->Perform(); 
 $a=$actions['firewall install']; 
 $a->Perform(); 
 $a=$actions['network install']; 
 $a->Perform(); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['all restart']=new Action('restart all relevant services','restart_all');
function restart_all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['firewall stop'];
 $a->Perform(); 
 system($restart_services['dns']);
 system($restart_services['dhcp']);
 system($restart_services['samba']);
 $a=$actions['firewall start'];
 $a->Perform(); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['archive']=new Action('archive essential files','archive');
function archive()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 echo "Archiving essential files...\n";
 foreach($files as $file)
 {
  $essential_files=$essential_files.$file.' ';
 }
 $result=system('tar -cvjf '.$archives_directory.'/'.date("Y-m-d\TH:i:s")
         .sprintf(".%03d",1000*microtime(true)).'.tar.bz2 '.$essential_files);
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['assign']=new Action('assign IP addresses to hosts awaiting for assignment','assign');
function assign()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 echo "Assigning IP addresses...\n";
 $local_network->Assign_IP_Addresses();
 $local_network_file->contents=$local_network->to_String();
 $local_network_file->Save($output_files['local network file']);
 echo "IP assignment completed.\n";
}

///////////////////////////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['clean']=new System_Action('remove output files',"rm -f '".$output_directory
                  ."'/*;echo Output directory purged.");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['dhcp']=new Action('generate DHCP daemon configuration file','dhcp');
function dhcp()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require $common_local_components."/dhcp.php";
 $dhcp_configuration_file->Save();
 echo "DHCP configuration file generated.\n";
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['dhcp install']=new System_Action('install generated DHCP daemon configuration file'
                         ,"cp -f '{$output_files['dhcpd file']}' '".$files['dhcpd file']
			 ."'&&echo 'DHCP daemon configuration file installed.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['dhcp publish']=new System_Action('publish installed DHCP daemon configuration file (for secondary DHCP servers)'
                         ,"cp -f '{$files['dhcpd file']}' '".$publish_files['dhcpd file']
			 ."'&&echo 'DHCP daemon configuration file published.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['dns']=new Action('generate DNS daemon files','dns');
function dns()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require $components."/dns.php";
 echo "DNS\n";
 $ozrf->Save();
 echo " DNS zone records file generated.\n";
 $orzrf->Save();
 echo " Reverse DNS zone records file generated.\n";
 $zhf->Increment_Serial();
 $zhf->Save($output_files['zone header file']);
 echo " Serial incremented. DNS zone header file generated.\n";
 $rzhf->Increment_Serial();
 $rzhf->Save($output_files['reverse zone header file']);
 echo " Serial incremented. Reverse DNS zone header file generated.\n";
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['dns install']=new System_Action('install generated DNS daemon files'
                        ,"cp -f '".$output_files['zone header file']."' '".$output_files['zone records file']
			."' '".$output_files['reverse zone header file']."' '"
			.$output_files['reverse zone records file']."' '".$dns_directory
			."'&&echo 'All DNS daemon files installed.'");

////////////////////////////////////////////////////////////////////////////////////////////////////
$actions['edit']=new Action('edit network database','edit');
function edit()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 pcntl_exec($editor['programme'],$editor['arguments'],$editor['environmental_variables']);
}

//////////////////////////////////////////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall install']=new System_Action('install generated firewall files'
                         ,"echo 'Installing generated firewall files...';"
			 ."cp -f '{$output_files['lan chain file']}' '"
			 .$output_files['admin chain file']."' '"
			 .$output_files['secondary chain file']."' '".$firewall_directory
			 ."/chains'&&echo ' Firewall chains successfully installed.';"
			 ."cp -f '{$output_files['firewall configuration file']}' '"
			 .$files['firewall configuration file']."'&&echo ' Firewall configuration file installed.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall start']=new System_Action('activate firewall'
                         ,"echo 'Activating firewall...';cd {$firewall_directory};./run.sh start&&echo 'Firewall activated.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall stop']=new System_Action('deactivate firewall'
                         ,"echo 'Deactivating firewall...';cd {$firewall_directory};./run.sh stop&&echo 'Firewall deactivated.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['firewall restart']=new System_Action('restart firewall'
                         ,"echo 'Restarting firewall...';cd {$firewall_directory};./run.sh restart&&echo 'Firewall restarted.'");

//////////////////////////////////////////////////////////////////////////////////////////////////
$actions['interactive']=new Action('start an interactive session');

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['ls']=new System_Action('list output files',"ls -lh '{$output_directory}'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['network install']=new System_Action('install regenerated local network file'
                         ,"cp -f '{$output_files['local network file']}' '{$files['local network file']}'"
			 ."&&echo 'Main network file installed.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['network publish']=new System_Action('publish installed local network file (for secondary servers)'
                         ,"cp -f '{$files['local network file']}' '".$publish_files['local network file']
			 ."'&&echo 'Main network file published.'");

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['network show']=new Action('show network definition','show_network');
function show_network()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 echo $local_network->to_String();
}

///////////////////////////////////////////////////////////////////////////////////////////////////
$actions['timestamp']=new Action('publish new timestamp (for secondary servers)','set_timestamp');
function set_timestamp()
{
 echo "Setting new timestamp...\n";
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $classes.'/miscellaneous/file.inc.php';
 $file=new File($publish_files['timestamp']);
 $file->Open_for_Writing();
 $file->Write(time());
 $file->Close();
 echo "Timestamp successfully updated.\n";
}

// Sort actions' array by key
ksort($actions);
?>
