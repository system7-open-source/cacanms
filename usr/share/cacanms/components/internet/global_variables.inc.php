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

// CACANMS
$subsystem='internet';
require_once '../../etc/cacanms/'.$subsystem.'/config.inc.php';
$cacanms_semaphore_file=realpath('../../var/lock/cacanms/'.$subsystem).'/semaphore';
$version=file_get_contents('../share/cacanms/components/'.$subsystem.'/version').'; '.file_get_contents('../share/cacanms/classes/version');
$output_directory=realpath('../../var/lib/cacanms/'.$subsystem.'/out');
$common_components=realpath('../share/cacanms/components/common');
$components=realpath('../share/cacanms/components/'.$subsystem);
$classes=realpath('../share/cacanms/classes');
$files['local network file']=realpath('../../var/lib/cacanms/'.$subsystem).'/local_network';
$files['contracts']=realpath('../../var/lib/cacanms/'.$subsystem).'/contracts';
$editor['arguments'][]=$files['contracts'];
$files['timestamp']=realpath('../../var/lib/cacanms/'.$subsystem).'/timestamp';

// DNS
$files['zone header file']=$dns_directory."/db.{$domain_name}";
$output_files['zone header file']=$output_directory."/db.{$domain_name}";
$output_files['zone records file']=$output_directory."/db.{$domain_name}.inc";
foreach($reverse_domains as $link=>$reverse_domain)
{
 $files['reverse zone header file'][$link]=$dns_directory."/db.{$reverse_domain}";
 $output_files['reverse zone header file'][$link]=$output_directory."/db.{$reverse_domain}";
 $output_files['reverse zone records file'][$link]=$output_directory."/db.{$reverse_domain}.inc";
}
unset($link,$reverse_domain);

// Traffic control
$traffic_control_semaphore=realpath('../../var/lock/cacanms/'.$subsystem).'/traffic_control';
$traffic_control_directory=realpath('../../var/lib/cacanms/'.$subsystem.'/traffic_control');
$files['traffic control file']=$traffic_control_directory.'/qos.inc.sh';
$files['traffic control configuration file']=$traffic_control_directory.'/config';
$output_files['traffic control file']=$output_directory.'/qos.inc.sh';
$output_files['traffic control configuration file']=$output_directory.'/tc_config';

// Firewall
$firewall_semaphore=realpath('../../var/lock/cacanms/'.$subsystem).'/firewall';
$firewall_directory=realpath('../../var/lib/cacanms/'.$subsystem.'/firewall');
$output_files['traffic control rules file']=$output_directory.'/traffic_control.chain';
$output_files['admin chain file']=$output_directory.'/admin.chain';
$output_files['balancing chain file']=$output_directory.'/balancing.chain';
$output_files['inet chain file']=$output_directory.'/inet.chain';
$output_files['lan chain file']=$output_directory.'/lan.chain';
$output_files['marking chain file']=$output_directory.'/marking.chain';
$output_files['noinet chain file']=$output_directory.'/noinet.chain';
$output_files['secondary chain file']=$output_directory.'/secondary.chain';
$output_files['uinet chain file']=$output_directory.'/uinet.chain';
$output_files['snat rules file']=$output_directory.'/snat.chain';
$output_files['firewall configuration file']=$output_directory.'/fw_config';
$files['traffic control rules file']=$firewall_directory.'/chains/traffic_control.chain';
$files['admin chain file']=$firewall_directory.'/chains/admin.chain';
$files['balancing chain file']=$firewall_directory.'/chains/balancing.chain';
$files['inet chain file']=$firewall_directory.'/chains/inet.chain';
$files['lan chain file']=$firewall_directory.'/chains/lan.chain';
$files['marking chain file']=$firewall_directory.'/chains/marking.chain';
$files['noinet chain file']=$firewall_directory.'/chains/noinet.chain';
$files['secondary chain file']=$firewall_directory.'/chains/secondary.chain';
$files['uinet chain file']=$firewall_directory.'/chains/uinet.chain';
$files['snat rules file']=$firewall_directory.'/chains/snat.chain';
$files['firewall configuration file']=$firewall_directory.'/config';

// GLOBALS
$GLOBALS['version']=$version;
$GLOBALS['system_directory']=$system_directory;
$GLOBALS['output_directory']=$output_directory;
$GLOBALS['components']=$components;
$GLOBALS['common_components']=$common_components;
$GLOBALS['classes']=$classes;
$GLOBALS['files']=$files;
$GLOBALS['output_files']=$output_files;
$GLOBALS['archives_directory']=$archives_directory;
$GLOBALS['publish_files']=$publish_files;
$GLOBALS['restart_services']=$restart_services;
?>