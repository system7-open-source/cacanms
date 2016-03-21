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

require_once $common_components.'/network_loader.php';

require_once $classes."/networking/firewall/netfilter_chain.inc.php";
require_once $classes."/networking/host.inc.php";

$hosts=$local_network->Find_Hosts('^[^F]+$','flags');

$lan_chain=new Netfilter_Chain($output_files['lan chain file'],'lan','nat','DROP',$iptables);
$admin_chain=new Netfilter_Chain($output_files['admin chain file'],'admin','nat','DROP',$iptables);
$secondary_chain=new Netfilter_Chain($output_files['secondary chain file'],'secondary','nat','DROP',$iptables);

// Generating netfilter rules
foreach($hosts as $host)
{
 if($host->flags->no_firewall)
  continue;
 // lan chain
 $lan_chain->Add_Host($host,'ACCEPT');
 // admin chain
 if($host->flags->administrative_access)
  $admin_chain->Add_Host($host,'ACCEPT');
 // secondary servers chain
 if($host->flags->access_level==9)
  $secondary_chain->Add_Host($host,'ACCEPT');
}

// Generating firewall BASH configuration file
$firewall_configuration_file=new Text_File($output_files['firewall configuration file']);
$firewall_configuration_file->Add_Line("IPTABLES=\"{$iptables}\"");
$firewall_configuration_file->Add_Line("FIREWALL_SEMAPHORE=\"{$firewall_semaphore}\"");
$firewall_configuration_file->Add_Line("LAN_CHAIN_FILE=\"{$files['lan chain file']}\"");
$firewall_configuration_file->Add_Line("ADMIN_CHAIN_FILE=\"{$files['admin chain file']}\"");
$firewall_configuration_file->Add_Line("SECONDARY_CHAIN_FILE=\"{$files['secondary chain file']}\"");
$firewall_configuration_file->Add_Line("INTERNAL_INTERFACE=\"{$this_server_internal_NIC}\"");
$firewall_configuration_file->Add_Line("INTERNAL_IP=\"{$this_server_internal_IP}\"");
$firewall_configuration_file->Add_Line("LOCAL_NETWORK_ADDRESS=\"".$local_network->address->to_String()."\"");

// Destroying temporary variables
unset($hosts,$host);
?>
