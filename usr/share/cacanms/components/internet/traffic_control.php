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

require_once $classes."/networking/firewall/netfilter_rules_file.inc.php";
require_once $classes."/miscellaneous/text_file.inc.php";
require_once $classes."/isp/host_mark.inc.php";

$traffic_control_rules=new Netfilter_Rules_File($output_files['traffic control rules file']
                                                ,'POSTROUTING','mangle',$iptables);
$traffic_control_file=new Text_File($output_files['traffic control file']);

$unique_id=100;
foreach($internet_access_objects as $iao)
{
 foreach($iao->internet_link_access_objects as $ilao)
 {
  $unique_id+=3;

  $fwmark=$internet_links[$ilao->internet_link_name]->fwmark;
  $parent=$internet_links[$ilao->internet_link_name]->tc_class_id;
  $major=$parent->Get_Major();
  $class_id=new TC_Class_ID($major.':'.$unique_id);
  $prio_class_id=new TC_Class_ID($major.':'.(string)($unique_id+1));
  $bulk_class_id=new TC_Class_ID($major.':'.(string)($unique_id+2));
  $sub_bandwidth=$ilao->guaranteed_bandwidth->Get_Bandwidth_Divided(2);
  // classifying rules
   $traffic_control_rules->Add_Line('# host: '.$iao->host->hostname->to_String()
                                   .' (link: '.$ilao->internet_link_name.')');
   // downstream
   // priority traffic
   $traffic_control_rules->Add_Rule('-o '.$this_server_internal_NIC
                          .' -d '.$iao->host->IP->to_String()
			  .' -m connmark --mark '.$fwmark
			  .' -m length --length :160'
			  .' -j CLASSIFY --set-class '.$prio_class_id->to_String());
   // bulk traffic
   $traffic_control_rules->Add_Rule('-o '.$this_server_internal_NIC
                          .' -d '.$iao->host->IP->to_String()
			  .' -m connmark --mark '.$fwmark
			  .' -m length --length 160:'
			  .' -j CLASSIFY --set-class '.$bulk_class_id->to_String());
   // upstream
   // priority traffic
   $traffic_control_rules->Add_Rule('-o '.$this_server_external_NIC
                          .' -d '.$iao->host->IP->to_String()
			  .' -m connmark --mark '.$fwmark
			  .' -m length --length :160'
			  .' -j CLASSIFY --set-class '.$prio_class_id->to_String());
   // bulk traffic
   $traffic_control_rules->Add_Rule('-o '.$this_server_external_NIC
                          .' -d '.$iao->host->IP->to_String()
			  .' -m connmark --mark '.$fwmark
			  .' -m length --length 160:'
			  .' -j CLASSIFY --set-class '.$bulk_class_id->to_String());

  // classes and queuing disciplines
   $traffic_control_file->Add_Line('# host: '.$iao->host->hostname->to_String()
                                   .' (link: '.$ilao->internet_link_name.')');
   // downstream
   // host's main class
   $traffic_control_file->Add_Line('$TC class add dev '.$this_server_internal_NIC
                          .' parent '.$parent->to_String()
			  .' classid '.$class_id->to_String()
			  .' htb rate '.$ilao->guaranteed_bandwidth->Downstream_to_String()
			  .' ceil '.$ilao->maximum_bandwidth->Downstream_to_String());
   // priority traffic
   $traffic_control_file->Add_Line(' $TC class add dev '.$this_server_internal_NIC
                          .' parent '.$class_id->to_String()
			  .' classid '.$prio_class_id->to_String()
			  .' htb rate '.$sub_bandwidth->Downstream_to_String()
			  .' ceil '.$ilao->maximum_bandwidth->Downstream_to_String()
			  .' prio 0');
   $traffic_control_file->Add_Line('  $TC qdisc add dev '.$this_server_internal_NIC
                          .' parent '.$prio_class_id->to_String()
			  .' handle '.(string)($unique_id+1)
			  .' sfq perturb 10');
   // bulk traffic
   $traffic_control_file->Add_Line(' $TC class add dev '.$this_server_internal_NIC
                          .' parent '.$class_id->to_String()
			  .' classid '.$bulk_class_id->to_String()
			  .' htb rate '.$sub_bandwidth->Downstream_to_String()
			  .' ceil '.$ilao->maximum_bandwidth->Downstream_to_String()
			  .' prio 1');
   $traffic_control_file->Add_Line('  $TC qdisc add dev '.$this_server_internal_NIC
                          .' parent '.$bulk_class_id->to_String()
			  .' handle '.(string)($unique_id+2)
			  .' sfq perturb 10');
   // upstream
   // host's main class
   $traffic_control_file->Add_Line('$TC class add dev '.$this_server_external_NIC
                          .' parent '.$parent->to_String()
			  .' classid '.$class_id->to_String()
			  .' htb rate '.$ilao->guaranteed_bandwidth->Upstream_to_String()
			  .' ceil '.$ilao->maximum_bandwidth->Upstream_to_String());
   // priority traffic
   $traffic_control_file->Add_Line(' $TC class add dev '.$this_server_external_NIC
                          .' parent '.$class_id->to_String()
			  .' classid '.$prio_class_id->to_String()
			  .' htb rate '.$sub_bandwidth->Upstream_to_String()
			  .' ceil '.$ilao->maximum_bandwidth->Upstream_to_String()
			  .' prio 0');
   $traffic_control_file->Add_Line('  $TC qdisc add dev '.$this_server_external_NIC
                          .' parent '.$prio_class_id->to_String()
			  .' handle '.(string)($unique_id+1)
			  .' sfq perturb 10');
   // bulk traffic
   $traffic_control_file->Add_Line(' $TC class add dev '.$this_server_external_NIC
                          .' parent '.$class_id->to_String()
			  .' classid '.$bulk_class_id->to_String()
			  .' htb rate '.$sub_bandwidth->Upstream_to_String()
			  .' ceil '.$ilao->maximum_bandwidth->Upstream_to_String()
			  .' prio 1');
   $traffic_control_file->Add_Line('  $TC qdisc add dev '.$this_server_external_NIC
                          .' parent '.$bulk_class_id->to_String()
			  .' handle '.(string)($unique_id+2)
			  .' sfq perturb 10');
 }
}

// Generating traffic control subsystem BASH configuration file
$traffic_control_configuration_file=new Text_File($output_files['traffic control configuration file']);
$traffic_control_configuration_file->Add_Line("TC=\"{$tc_command}\"");
$traffic_control_configuration_file->Add_Line("TRAFFIC_CONTROL_SEMAPHORE=\"{$traffic_control_semaphore}\"");
$traffic_control_configuration_file->Add_Line("TRAFFIC_CONTROL_RULES_FILE=\"{$files['traffic control rules file']}\"");
$traffic_control_configuration_file->Add_Line("TRAFFIC_CONTROL_FILE=\"{$files['traffic control file']}\"");
$traffic_control_configuration_file->Add_Line("INTERNAL_INTERFACE=\"{$this_server_internal_NIC}\"");
$traffic_control_configuration_file->Add_Line("EXTERNAL_INTERFACE=\"{$this_server_external_NIC}\"");
$traffic_control_configuration_file->Add_Line("INTERNAL_IP=\"{$this_server_internal_IP}\"");
$traffic_control_configuration_file->Add_Line("LOCAL_NETWORK_ADDRESS=\"".$local_network->address->to_String()."\"");



// Destroying temporary variables
unset($iao,$ilao,$unique_id,$fwmark,$parent,$major,$class_id,$prio_class_id,$bulk_class_id,$sub_bandwidth);
?>
