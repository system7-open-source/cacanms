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
$subsystem='local/primary';
require_once '../../etc/cacanms/'.$subsystem.'/config.inc.php';

$cacanms_semaphore_file=realpath('../../var/lock/cacanms/'.$subsystem).'/semaphore';
$version=file_get_contents('../share/cacanms/components/'.$subsystem.'/version').'; '.file_get_contents('../share/cacanms/classes/version');
$output_directory=realpath('../../var/lib/cacanms/'.$subsystem.'/out');
$common_components=realpath('../share/cacanms/components/common');
$common_local_components=realpath('../share/cacanms/components/local/common');
$components=realpath('../share/cacanms/components/'.$subsystem);
$classes=realpath('../share/cacanms/classes');
$files['local network file']=realpath('../../var/lib/cacanms/'.$subsystem).'/local_network';
$output_files['local network file']=$output_directory.'/local_network';
$editor['arguments'][0]=$files['local network file'];

// DNS
$files['zone header file']=$dns_directory."/db.{$domain_name}";
$output_files['zone header file']=$output_directory."/db.{$domain_name}";
$output_files['zone records file']=$output_directory."/db.{$domain_name}.inc";
$files['reverse zone header file']=$dns_directory."/db.{$reverse_zone}";
$output_files['reverse zone header file']=$output_directory."/db.{$reverse_zone}";
$output_files['reverse zone records file']=$output_directory."/db.{$reverse_zone}.inc";

// DHCP
$output_files['dhcpd file']=$output_directory.'/dhcpd.conf';

// Firewall
$firewall_semaphore=realpath('../../var/lock/cacanms/'.$subsystem).'/firewall';
$output_files['lan chain file']=$output_directory.'/lan.chain';
$output_files['admin chain file']=$output_directory.'/admin.chain';
$output_files['secondary chain file']=$output_directory.'/secondary.chain';
$firewall_directory=realpath('../../var/lib/cacanms/'.$subsystem.'/firewall');
$output_files['firewall configuration file']=$output_directory.'/config';
$files['lan chain file']=$firewall_directory.'/chains/lan.chain';
$files['admin chain file']=$firewall_directory.'/chains/admin.chain';
$files['secondary chain file']=$firewall_directory.'/chains/secondary.chain';
$files['firewall configuration file']=$firewall_directory.'/config';

// GLOBALS
$GLOBALS['version']=$version;
$GLOBALS['output_directory']=$output_directory;
$GLOBALS['common_components']=$common_components;
$GLOBALS['common_local_components']=$common_local_components;
$GLOBALS['components']=$components;
$GLOBALS['classes']=$classes;
$GLOBALS['files']=$files;
$GLOBALS['output_files']=$output_files;
$GLOBALS['archives_directory']=$archives_directory;
$GLOBALS['publish_files']=$publish_files;
$GLOBALS['restart_services']=$restart_services;
?>