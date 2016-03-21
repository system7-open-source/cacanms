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

require_once "hostname.inc.php";
require_once "domain.inc.php";

class FQDN
{
 var $hostname;
 var $domainname;
 var $maximum_length=255;

 function FQDN($in_hostname,$in_domain)
 {
  if(!(is_a($in_hostname,'Hostname') && is_a($in_domain,'Domain')))
   exit('FQDN::FQDN(): Error! Invalid arguments!'."\n");
  
  $name=$in_hostname->to_String().'.'.$in_domain->to_String();
  if($name{strlen($name)-1}!=='.')
   exit("Error! '".$name."' is not a fully qualified domain name.\n");
  FQDN::Validate($name);
  $this->hostname=$in_hostname;
  $this->domainname=$in_domain;
 }

 function from_String($in_fqdn)
 {
  $parts=explode('.',$in_fqdn,2);
  if(count($parts)!==2)
   exit("Error! '{$in_fqdn}' is not a valid Fully Qualified Domain Name!'\n");
  return new FQDN(new Hostname($parts[0]),new Domain($parts[1]));
 }
 
 function to_String()
 {
  return $this->hostname->to_String().'.'.$this->domainname->to_String();
 }
 
 function Validate($in_name)
 {
  $length=strlen($in_name);
  if($length>$this->maximum_length)
   exit('Error! "'.$in_name.'" is to long to be a valid FQDN!'."\n");
 }
}
?>
