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

require 'internet_access_objects_table.php';

require_once $classes."/networking/firewall/netfilter_chain.inc.php";

$admin_chain=new Netfilter_Chain($output_files['admin chain file'],'admin','nat','DROP',$iptables);
$inet_chain=new Netfilter_Chain($output_files['inet chain file'],'inet','nat','DROP',$iptables);
$lan_chain=new Netfilter_Chain($output_files['lan chain file'],'lan','nat','DROP',$iptables);
$noinet_chain=new Netfilter_Chain($output_files['noinet chain file'],'noinet','nat',null,$iptables);
$secondary_chain=new Netfilter_Chain($output_files['secondary chain file'],'secondary','nat','DROP',$iptables);
$uinet_chain=new Netfilter_Chain($output_files['uinet chain file'],'uinet','nat','DROP',$iptables);
$snat_rules=new Netfilter_Rules_File($output_files['snat rules file'],'POSTROUTING','nat',$iptables);


// Generating netfilter rules

// admin chain
foreach($administrators as $administrator)
 $admin_chain->Add_FQDN(FQDN::from_String($administrator),'ACCEPT');

foreach($suspended_internet_access_objects as $iao)
{
 // lan chain
 $lan_chain->Add_Host($iao->host,'ACCEPT');

 // noinet chain
 $noinet_chain->Add_Host($iao->host,'REDIRECT --to-port 1234','-i '.$this_server_internal_NIC.' -p tcp --dport 80');
}

foreach($internet_access_objects as $iao)
{
 // inet chain
 $inet_chain->Add_Host($iao->host,'RETURN');

 // lan chain
 $lan_chain->Add_Host($iao->host,'ACCEPT');

 // secondary servers chain
 if($iao->flags->access_level==9)
  $secondary_chain->Add_Host($iao->host,'ACCEPT');

 foreach($iao->internet_link_access_objects as $ilao)
 {
  // uinet chain
  if($ilao->flags->outside_access)
   if(is_a($ilao->IP,'IP'))
    $uinet_chain->Add_Rule('-d '.$ilao->IP->to_String().'/32 -j DNAT --to-destination '.$iao->host->IP->to_String());
  // snat rules
  if(is_a($ilao->IP,'IP'))
   $snat_rules->Add_IP($iao->host->IP->to_String(),'SNAT --to-source '.$ilao->IP->to_String(),'-o '
                .$this_server_external_NIC.' -d ! '.$local_network->address->to_String().' -m connmark --mark '
		.$internet_links[$ilao->internet_link_name]->fwmark);
 }
}

// Generating firewall BASH configuration file
$firewall_configuration_file=new Text_File($output_files['firewall configuration file']);
$firewall_configuration_file->Add_Line("IPTABLES=\"{$iptables}\"");
$firewall_configuration_file->Add_Line("FIREWALL_SEMAPHORE=\"{$firewall_semaphore}\"");
$firewall_configuration_file->Add_Line("ADMIN_CHAIN_FILE=\"{$files['admin chain file']}\"");
$firewall_configuration_file->Add_Line("BALANCING_CHAIN_FILE=\"{$files['balancing chain file']}\"");
$firewall_configuration_file->Add_Line("INET_CHAIN_FILE=\"{$files['inet chain file']}\"");
$firewall_configuration_file->Add_Line("LAN_CHAIN_FILE=\"{$files['lan chain file']}\"");
$firewall_configuration_file->Add_Line("MARKING_CHAIN_FILE=\"{$files['marking chain file']}\"");
$firewall_configuration_file->Add_Line("NOINET_CHAIN_FILE=\"{$files['noinet chain file']}\"");
$firewall_configuration_file->Add_Line("SECONDARY_CHAIN_FILE=\"{$files['secondary chain file']}\"");
$firewall_configuration_file->Add_Line("UINET_CHAIN_FILE=\"{$files['uinet chain file']}\"");
$firewall_configuration_file->Add_Line("SNAT_RULES_FILE=\"{$files['snat rules file']}\"");
$firewall_configuration_file->Add_Line("TRAFFIC_CONTROL_RULES_FILE=\"{$files['traffic control rules file']}\"");
$firewall_configuration_file->Add_Line("INTERNAL_INTERFACE=\"{$this_server_internal_NIC}\"");
$firewall_configuration_file->Add_Line("EXTERNAL_INTERFACE=\"{$this_server_external_NIC}\"");
$firewall_configuration_file->Add_Line("INTERNAL_IP=\"{$this_server_internal_IP}\"");
$firewall_configuration_file->Add_Line("LOCAL_NETWORK_ADDRESS=\"".$local_network->address->to_String()."\"");

// Destroying temporary variables
unset($iao,$fwmark,$ilao);
?>
