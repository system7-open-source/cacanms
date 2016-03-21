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

require_once 'global_variables.inc.php';

require_once $classes.'/session/system_action.inc.php';

////////////////////////////////////////////////////////////////////////////////////
$actions['all']=new Action('archive, assign IPs, generate and install files, clean, restart services','all');
function all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['archive'];
 $a->Perform(); 
 assign_addresses();
 dns();
 firewall();
 tc_make();
 load_balancing();
 install_all();
 $a=$actions['clean'];
 $a->Perform(); 
 restart_all();
}

////////////////////////////////////////////////////////////////////////////////////
$actions['all install']=new Action('install all generated files','install_all');
function install_all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['contracts install']; 
 $a->Perform(); 
 $a=$actions['dns install'];
 $a->Perform(); 
 $a=$actions['firewall install'];
 $a->Perform(); 
 $a=$actions['tc install'];
 $a->Perform(); 
 $a=$actions['load balancing install'];
 $a->Perform(); 
}

////////////////////////////////////////////////////////////////////////////////////
$actions['all restart']=new Action('restart all relevant services','restart_all');
function restart_all()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 $a=$actions['firewall stop'];
 $a->Perform(); 
 system($restart_services['dns']);
 sleep(2);
 $a=$actions['firewall start'];
 $a->Perform(); 
 $a=$actions['tc restart'];
 $a->Perform(); 
}

////////////////////////////////////////////////////////////////////////////////////
$actions['archive']=new Action('archive essential files','archive');
function archive()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 echo "Archiving essential files...\n";
 foreach($files as $file)
  if(is_array($file))
   foreach($file as $subfile)
    $essential_files=$essential_files.$subfile.' ';
  else
   $essential_files=$essential_files.$file.' ';
 system('tar -cvjf '.$archives_directory.'/'.date("Y-m-d\TH:i:s")
         .sprintf(".%03d",1000*microtime(true)).'.tar.bz2 '.$essential_files,$result);
 if($result===0)
  echo " Files archived.\n";
}

////////////////////////////////////////////////////////////////////////////////////
// Prepare internet access objects and assign IPs
$actions['assign']=new Action('assign IP addresses','assign_addresses');
function assign_addresses()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require 'ip_assignment.php';
}

////////////////////////////////////////////////////////////////////////////////////
// 
$actions['clean']=new System_Action('remove output files',"rm -f '".$output_directory
                  ."'/*;echo Output directory purged.");

////////////////////////////////////////////////////////////////////////////////////
// Show contracts counter
$actions['contract counter']=new Action('show contract counter','contract_counter');
function contract_counter()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once 'contracts.php';
 echo "Contract counter:\n";
 foreach($contracts_counter as $name1=>$contracts_counter2)
 {
  echo ' '.$name1.":\n";
  $counter1=0;
  foreach($contracts_counter2 as $name2=>$contracts_counter3)
  {
   $counter2=0;
   echo '  '.$name2.":\n";
   foreach($contracts_counter3 as $name3=>$contracts_counter_item)
   {
    printf("   %20s : %-10d\n",$name3,$contracts_counter_item); 
    $counter2+=$contracts_counter_item;
   }
   $counter1+=$counter2;
   printf("   TOTAL (%s) : %-10d\n",$name2,$counter2); 
  } 
  printf("  TOTAL (%s) : %-10d\n\n",$name1,$counter1); 
 }
}

////////////////////////////////////////////////////////////////////////////////////
$actions['contracts install']=new Action('install current working copy of contracts database','contracts_install');
function contracts_install()
{
 echo "Installing contracts database file...\n";
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once 'contracts.php';
 $contracts_file->Save();
 echo " Contracts database file installed.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['contracts reload']=new Action('reload contracts database','contracts_reload');
function contracts_reload()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require 'contracts.php';
 echo "Contracts database reloaded.\n";
}


////////////////////////////////////////////////////////////////////////////////////
// Show contracts
$actions['contracts show']=new Action('show contract list','contracts_show');
function contracts_show()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once 'contracts.php';
 echo "Contract list:\n";
 echo $contracts->to_String();
 echo "End of contract list.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['dns']=new Action('generate DNS daemon files','dns');
function dns()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require 'dns.php';
 echo "DNS\n";
 $ozrf->Save();
 echo " DNS zone records file generated.\n";
 $zhf->Increment_Serial();
 $zhf->Save($output_files['zone header file']);

 echo " Serial incremented. DNS zone header file generated.\n";
 foreach($reverse_domains as $linkname=>$reverse_domain)
 {
  $rzhf[$linkname]->Load();
  $orzrf[$linkname]->Save();
  echo " Reverse DNS zone record file for '{$reverse_domain}' ('{$linkname}' internet link) generated.\n";
  $rzhf[$linkname]->Increment_Serial();
  $rzhf[$linkname]->Save($output_files['reverse zone header file'][$linkname]);
  echo " Serial incremented. Reverse DNS zone header file for '{$reverse_domain}'"
       ." ('{$linkname}' internet link) generated.\n";
 }
}

$actions['dns install']=new Action('install generated DNS daemon files','dns_install');
function dns_install()
{
 echo "Installing DNS files...\n";
 foreach($GLOBALS as $key=>$val) global $$key;
 $dns_files="'".$output_files['zone header file']."'"
            ." '".$output_files['zone records file']."'";
 foreach($reverse_domains as $link=>$reverse_domain)
 {
  $dns_files=$dns_files
             ." '".$output_files['reverse zone header file'][$link]."'"
	     ." '".$output_files['reverse zone records file'][$link]."'";
 }
 exec("cp -f {$dns_files} '{$dns_directory}'&&echo ' All DNS daemon files installed.'");
}

////////////////////////////////////////////////////////////////////////////////////
$actions['edit']=new Action('edit contracts database','edit');
function edit()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 pcntl_exec($editor['programme'],$editor['arguments'],$editor['environmental_variables']);
}

////////////////////////////////////////////////////////////////////////////////////
$actions['firewall install']=new System_Action('install generated firewall files'
                         ,"echo 'Installing generated firewall files...'&&"
			 ."cp -f '{$output_files['lan chain file']}' '"
			 .$output_files['admin chain file']."' '"
			 .$output_files['inet chain file']."' '"
			 .$output_files['noinet chain file']."' '"
			 .$output_files['secondary chain file']."' '"
			 .$output_files['uinet chain file']."' '"
			 .$output_files['snat rules file']."' '"
			 .$output_files['traffic control rules file']."' '"
			 .$firewall_directory
			 ."/chains' 2>&1&&echo ' Firewall chain and rule files successfully installed.'||echo ' Error installing firewall chain and rule files!';"
			 ."cp -f '{$output_files['firewall configuration file']}' '"
			 .$files['firewall configuration file']."' 2>&1&&echo ' Firewall configuration file installed.'||echo ' Error installing firewall configuration file!'");

////////////////////////////////////////////////////////////////////////////////////
$actions['firewall make']=new Action('generate firewall files','firewall');
function firewall()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require 'firewall.php';
 echo "Firewall\n";
 $admin_chain->Save();
 $inet_chain->Save();
 $lan_chain->Save();
 $noinet_chain->Save();
 $secondary_chain->Save();
 $uinet_chain->Save();
 $snat_rules->Save();
 echo " Firewall chain files generated.\n";
 $firewall_configuration_file->Save();
 echo " Firewall configuration file generated.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['firewall restart']=new System_Action('restart firewall'
             ,"echo 'Restarting firewall...';cd {$firewall_directory};./run.sh restart&&echo 'Firewall restarted.'");

////////////////////////////////////////////////////////////////////////////////////
$actions['firewall start']=new System_Action('activate firewall'
               ,"echo 'Activating firewall...';cd {$firewall_directory};./run.sh start&&echo 'Firewall activated.'");

////////////////////////////////////////////////////////////////////////////////////
$actions['firewall stop']=new System_Action('deactivate firewall'
            ,"echo -e 'Deactivating firewall...\n';cd {$firewall_directory};./run.sh stop&&echo 'Firewall deactivated.'");

////////////////////////////////////////////////////////////////////////////////////
$actions['interactive']=new Action('start an interactive session');

////////////////////////////////////////////////////////////////////////////////////
// Show internet link access types
$actions['link access types']=new Action('show defined internet link access types','link_access_types');
function link_access_types()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once 'internet_link_access_types.php';
 echo "The following internet link access types has been defined:\n";
 foreach($internet_link_access_types as $name=>$internet_link_access_type)
  echo ' '.$name.' - '.$internet_link_access_type->to_String()."\n";
 echo "\n";
}

////////////////////////////////////////////////////////////////////////////////////
// Show internet links
$actions['links']=new Action('show defined internet links','links_show');
function links_show()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once 'internet_links.php';
 echo "The following internet links has been defined:\n";
 foreach($internet_links as $internet_link)
 {
  if($internet_link->Is_Inactive($internet_link_status[$internet_link->name]))
   $status='INACTIVE';
  else
   $status='active';
  echo ' '.$internet_link->to_String()." ({$status})\n";
 }
 echo "\n";
}

////////////////////////////////////////////////////////////////////////////////////
// Check if internet links are functioning properly
$actions['links update']=new Action("check for internet links status change",'links_update');
function links_update()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once 'internet_links.php';
 echo "Checking if internet links state has changed...\n";

 if(!file_exists($files['marking chain file']))
  exit("Error! File '{$files['marking chain file']}' must be installed to perform links check!\n");
 $marking_file=file_get_contents($files['marking chain file']);

 foreach($internet_links as $internet_link)
 {
  $link_status=$internet_link->Is_Inactive($internet_link_status[$internet_link->name]);
  $present=(strpos($marking_file,'# for "'.$internet_link->name.'" link:'."\n")!==false);
  if($link_status===$present)
  {
   echo " Change detected! Performing corrective action...\n";
   load_balancing();
   $a=$actions['load balancing install'];
   $a->Perform();
   $a=$actions['clean'];
   $a->Perform(); 
   $a=$actions['firewall restart'];
   $a->Perform();
   echo " Corrective action completed.\n";
   return;  
  }
 }
 echo " No change detected.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['load balancing install']=new System_Action('install generated load balancing chain files'
  ,"echo \"Installing generated load balancing chain files...\"&&"
  ."cp -f '{$output_files['marking chain file']}' '{$files['marking chain file']}' 2>&1"
   ."||echo ' Error installing MARKING chain file!';"
  ."cp -f '{$output_files['balancing chain file']}' '{$files['balancing chain file']}' 2>&1"
   ."||echo ' Error installing BALANCING chain file!'");

////////////////////////////////////////////////////////////////////////////////////
$actions['load balancing']=new Action('generate load balancing chain files','load_balancing');
function load_balancing()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require 'load_balancer.php';
 echo "Load balancer\n";
 $marking_chain->Save();
 echo " Traffic control classes and queuing disciplines file generated.\n";
 $balancing_chain->Save();
 echo " Traffic control classifying rules file generated.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['ls']=new System_Action('list output files',"ls -lh '{$output_directory}'");

////////////////////////////////////////////////////////////////////////////////////
$actions['network show']=new Action('show local network definition','network_show');
function network_show()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $common_components.'/network_loader.php';
 echo $local_network->to_String();
}

////////////////////////////////////////////////////////////////////////////////////
$actions['network update']=new Action(
                'check primary local server for local network database update','network_update');
function network_update()
{
 echo "Updating local network database.\n";
 foreach($GLOBALS as $key=>$val) global $$key;
 require_once $classes.'/miscellaneous/file.inc.php';
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
 $primary_timestamp=$file->Load();
 if($primary_timestamp===false)
 {
  echo "  Unable to complete. Aborting.\n";
  return;
 }
 $primary_timestamp=(int)$primary_timestamp;
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
  // Regenerating all and restarting the system
  all();
 }
 else
  echo " Local network database copy already up-to-date.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['tc install']=new System_Action('install generated traffic control files'
  ,"echo 'Installing generated traffic control files...';"
  ."cp -f '{$output_files['traffic control file']}' '{$files['traffic control file']}'"
   ."&&echo ' Traffic control file successfully installed.';"
  ."cp -f '{$output_files['traffic control rules file']}' '{$files['traffic control rules file']}'"
   ."&&echo ' Traffic control classifying rules file successfully installed.';"
  ."cp -f '{$output_files['traffic control configuration file']}' '{$files['traffic control configuration file']}'"
   ."&&echo ' Traffic control configuration file successfully installed.';");

////////////////////////////////////////////////////////////////////////////////////
$actions['tc make']=new Action('generate traffic control files','tc_make');
function tc_make()
{
 foreach($GLOBALS as $key=>$val) global $$key;
 require 'traffic_control.php';
 echo "Traffic control\n";
 $traffic_control_file->Save();
 echo " Traffic control classes and queuing disciplines file generated.\n";
 $traffic_control_rules->Save();
 echo " Traffic control classifying rules file generated.\n";
 $traffic_control_configuration_file->Save();
 echo " Traffic control configuration file generated.\n";
}

////////////////////////////////////////////////////////////////////////////////////
$actions['tc restart']=new System_Action('restart traffic control subsystem'
             ,"echo 'Restarting traffic control subsystem...';cd {$traffic_control_directory};./run.sh restart&&echo ' Traffic control subsystem restarted.'");

////////////////////////////////////////////////////////////////////////////////////
$actions['tc start']=new System_Action('activate traffic control subsystem'
               ,"echo 'Activating traffic control subsystem...';cd {$traffic_control_directory};./run.sh start&&echo ' Traffic control subsystem activated.'");

////////////////////////////////////////////////////////////////////////////////////
$actions['tc stop']=new System_Action('deactivate traffic control subsystem'
            ,"echo 'Deactivating traffic control subsystem...';cd {$traffic_control_directory};./run.sh stop&&echo ' Traffic control subsystem deactivated.'");

// Sort actions' array by key
ksort($actions);
?>
