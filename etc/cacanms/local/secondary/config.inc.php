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
// URL to your primary network definition
// (see relevant publish_files value in your primary server config.inc.php)
$remote_files['local network']='http://127.0.0.1:12345/plocal/local_network';
// URL to your primary local server timestamp
// (see relevant publish_files value in your primary server config.inc.php)
$remote_files['primary timestamp']='http://127.0.0.1:12345/plocal/timestamp';

// Archives (look into that directory for archived CACANMS files)
$archives_directory=realpath('../../var/backups/cacanms/'.$subsystem); // reasonable default

// Servers
$domain_name_servers=array('10.0.16.4','10.0.56.31','10.0.12.5','10.0.8.15');
$netbios_name_servers=array('10.0.16.4','10.0.56.31');
$routers=array('r1'=>'10.0.8.15','r2'=>'10.0.12.5');

// This server
$this_server_internal_IP='10.0.56.31';
$this_server_internal_NIC='eth0';

// DNS
$domain_name='somelocalnetwork.org.';

// DHCP
$files['dhcpd file']=realpath('../../etc').'/dhcpd.conf'; // reasonable default
$restart_services['dhcp']='/etc/init.d/dhcp restart'; // reasonable default
// you also have to set the beginning ($dhcp_header variable)
// and the ending ($dhcp_footer variable) of generated dhcpd.conf file
// in usr/share/cacanms/components/local/common/dhcp.php
// (unless the default values satisfy your needs)

// Firewall
$iptables='/sbin/iptables'; // reasonable default

// Other services you want to be restarted on 'all restart'
$restart_services['samba']='/etc/init.d/samba restart';
?>
