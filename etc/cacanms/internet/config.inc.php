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
$editor['programme']='/usr/bin/vi';
$editor['environmental_variables']=array('HOME'=>'/root','TERM'=>'xterm');
// URL to your primary network definition
// (see relevant publish_files value in your primary server config.inc.php)
$remote_files['local network']='http://127.0.0.1:12345/plocal/local_network';
// URL to your primary local server timestamp
// (see relevant publish_files value in your primary server config.inc.php)
$remote_files['primary timestamp']='http://127.0.0.1:12345/plocal/timestamp';

// ISP settings
// $average_hosts_activity_rate =
//  (average number of local hosts that use the internet link at the same time) / (all hosts connected to your network)
// (load-balancer needs this information) 
$average_hosts_activity_rate=0.55;

 // Internet Links
 //  internet link textual format: name,NIC,CIDR,downstream/upstreamUNIT,firewall mark,TC class ID, weight
 //
 //   - the firewall mark is needed for netfilter rules
 //   - TC stands for Traffic Control - it is the id of a class (cbq, htb etc.) for this link
 //   - the weight for weighted round-robin algorithm load balancing (unsigned integer)
 $internet_links_strings=array();
 // remove or change the examples below
 $internet_links_strings['dsl1']='dsl1,eth1,192.168.0.0/24,2000/230kbit,1,1:1,1';
 $internet_links_strings['dsl2']='dsl2,eth1,192.168.1.0/24,2000/230kbit,2,1:2,1';

 // Internet link status files (existing file denotes link malfunction)
 // ATTENTION! You must implement your own way of checking if a given link is active or not.
 // CACANMS will just check if the files given by you exist.
 // You should also consider runing 'cacanms_i.php links update' periodically (e.g. every minute, using cron daemon).
 // Using this feature is not mandatory.
 $internet_link_status['dsl1']=realpath('../../var/run/cacanms/'.$subsystem).'/dsl1_check_semaphore';
 $internet_link_status['dsl2']=realpath('../../var/run/cacanms/'.$subsystem).'/dsl2_check_semaphore';

 // Internet Link Access templates (you can have as many as you need (each template has to have a unique name))
 //
 //  $internet_link_access_templates['name']=array('link name','downstream/upstream,flags');
 //   OR
 //  $internet_link_access_templates['name']=array('link name','downstream/upstream,flags,IP');
 // flags:
 //  A - own address (IP address not shared with other hosts; can change after each execution of cacanms)
 //  C - constant address (IP address assigned to a host permanently (i.e. it does not change))
 //  O - outside access (IP added to uinet chain (it can be reached from the internet (DNAT)))
 // remove or change the examples below
 //
 // an example below - hosts having granted this type of ILA will be masqueraded (sharing one IP)
 $internet_link_access_templates['fast1']=array('dsl1','1500/48kbit,-,192.168.0.1');
 $internet_link_access_templates['fast2']=array('dsl2','1500/48kbit,-,192.168.1.1');
 // another example - situation similar to the previous one
 $internet_link_access_templates['slow1']=array('dsl1','30/15kbit,-,192.168.0.1');
 $internet_link_access_templates['slow2']=array('dsl2','30/15kbit,-,192.168.1.1');
 // yet another example - hosts having granted this type of ILA will be
 //  automatically assigned separate IPs for their exclusive use, but CACANMS
 //  will not guarantee that IPs do not change during the next assignment process 
 $internet_link_access_templates['fast1withIP']=array('dsl1','1500/48kbit,A');
 $internet_link_access_templates['fast2withIP']=array('dsl2','1500/48kbit,A');
 
 // Traffic Control
 $tc_command='/sbin/tc'; // reasonable default

// Archives (look into that directory for archived CACANMS files)
$archives_directory=realpath('../../var/backups/cacanms/'.$subsystem); // reasonable default

// Hosts with administrative access (e.g. ssh)
$administrators=array('someadmin'=>'somehost.somewhere.org.');

// This server
$this_server_internal_IP='10.0.12.5';
$this_server_internal_NIC='eth0'; // LAN NIC
$this_server_external_NIC='eth1'; // Internet NIC

// DNS
$dns_directory=realpath('../../etc/bind'); // reasonable default
$domain_name='somenetwork.org.';
$reverse_domains=array();
$restart_services['dns']='/etc/init.d/bind9 restart'; // reasonable default

// Firewall
$iptables='/sbin/iptables'; // reasonable default

// Other services
?>