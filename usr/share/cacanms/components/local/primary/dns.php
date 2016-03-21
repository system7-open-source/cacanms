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

require_once $classes."/networking/dns/zone_header_file.inc.php";
require_once $classes."/networking/dns/zone_records_file.inc.php";
require_once $classes."/networking/dns/a_record.inc.php";
require_once $classes."/networking/dns/ptr_record.inc.php";
require_once $classes."/networking/dns/hostname.inc.php";
require_once $classes."/networking/ip.inc.php";
require_once $classes."/networking/cidr.inc.php";

$hosts=$local_network->Find_Hosts('*');

// Zone
$domain=new Domain($domain_name);
$zhf=new Zone_Header_File($files['zone header file']);
$ozrf=new Zone_Records_File($output_files['zone records file']);

// Reverse Zone
$rzhf=new Zone_Header_File($files['reverse zone header file']);
$orzrf=new Zone_Records_File($output_files['reverse zone records file']);

// Preparing Records Files
{
foreach($hosts as $host)
{
 // zone
 if(!$host->flags->no_dns)
  $ozrf->Add_RR(new A_Record($host->hostname,null,"IN",$host->IP));
 // reverse zone
 if(!$host->flags->no_revdns)
 {
  $cidr=$host->IP->to_String().$local_network->address->IP_prefix->to_String();
  $cidr=new CIDR($cidr);
  $fqdn=new FQDN($host->hostname,$domain);
  $orzrf->Add_RR(new PTR_Record($cidr,null,"IN",$fqdn));
 }
}
}
// Loading header files
$zhf->Load();
$rzhf->Load();

// Destroying temporary variables
unset($hosts,$host,$fqdn,$cidr);
?>
