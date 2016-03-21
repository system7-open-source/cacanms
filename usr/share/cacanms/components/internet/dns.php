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

require_once $classes."/networking/dns/reverse_domain.inc.php";
require_once $classes."/networking/dns/zone_header_file.inc.php";
require_once $classes."/networking/dns/zone_records_file.inc.php";
require_once $classes."/networking/dns/a_record.inc.php";
require_once $classes."/networking/dns/ptr_record.inc.php";
require_once $classes."/networking/dns/hostname.inc.php";
require_once $classes."/networking/ip.inc.php";
require_once $classes."/networking/cidr.inc.php";

// Zone
$domain=new Domain($domain_name);
$zhf=new Zone_Header_File($files['zone header file']);
$ozrf=new Zone_Records_File($output_files['zone records file']);

// Reverse Zone(s)
foreach($reverse_domains as $linkname=>$reverse_domain)
{
 $rzhf[$linkname]=new Zone_Header_File($files['reverse zone header file'][$linkname]);
 $orzrf[$linkname]=new Zone_Records_File($output_files['reverse zone records file'][$linkname]);
}

// Preparing Records Files
foreach($internet_access_objects as $internet_access_object)
{
 $hostname=$internet_access_object->host->hostname;
 foreach($internet_access_object->internet_link_access_objects as $internet_link_access_object)
 {
  $ip=$internet_link_access_object->IP;
  $linkname=$internet_link_access_object->internet_link_name;
  if(is_a($ip,'IP') && $internet_link_access_object->flags->own_address)
  {
   // zone
   $ozrf->Add_RR(new A_Record($hostname,null,"IN",$ip));

   // reverse zone
   if(isset($reverse_domains[$linkname]))
   {
    $cidr=$internet_links[$internet_link_access_object->internet_link_name]->IPv4_network->address;
    $reverse_domain=new Reverse_Domain($cidr);
    if($reverse_domain->to_String()!=$reverse_domains[$internet_link_access_object->internet_link_name])
     echo " Warning! Reverse domain for '".$cidr->to_String()."' network is configured as '"
          .$reverse_domains[$internet_link_access_object->internet_link_name]."'!\n"
	  ." Should not it be set to '".$reverse_domain->to_String()."'?\n"; 
    $cidr=$ip->to_String().$cidr->IP_prefix->to_String();
    $cidr=new CIDR($cidr);
    $fqdn=new FQDN($hostname,$domain);
    $orzrf[$linkname]->Add_RR(new PTR_Record($cidr,null,"IN",$fqdn));
   }
  }
 }
}
// Loading header files
$zhf->Load();
foreach($reverse_domains as $linkname=>$reverse_domain)
 $rzhf[$linkname]->Load();

// Destroying temporary variables
unset($linkname,$ip,$hostname,$cidr,$reverse_domain,$domain,$fqdn,$cidr);
?>
