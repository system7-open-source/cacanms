<?
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

require_once "resource_record.inc.php";
require_once "reverse_domain.inc.php";
require_once "fqdn.inc.php";
require_once $classes."/networking/cidr.inc.php";

class PTR_Record extends Resource_Record
{
 var $CIDR;

 function PTR_Record($in_CIDR, $in_TTL, $in_class, $in_RDATA, $in_use_fully_qualified_name=false)
 {
  parent::Resource_Record(null, $in_TTL, $in_class, RR_Type::PTR(), $in_RDATA);

  if(!is_a($in_RDATA,'FQDN'))
   $in_RDATA=new FQDN($in_RDATA);
  $this->RDATA=$in_RDATA;

  if(!is_a($in_CIDR,'CIDR'))
   $in_CIDR=new CIDR($in_CIDR);

  $this->CIDR=$in_CIDR;

  switch($in_CIDR->IP_prefix->IP_prefix)
  {
   case 24:
    $host_octets=1;
    break;
   case 16:
    $host_octets=2;
    break;
   case 8:
    $host_octets=3;
    break;
   default:
    exit("Error! '".$in_CIDR->to_String()."' subnet cannot have its own in-addr.arpa domain!\n");
  }
  
  $octets=$in_CIDR->Get_Octets();
  
  $this->name=$octets[0];
  for($i=1;$i<$host_octets;$i++)
  {
   $this->name=$this->name.'.'.$octets[$i];
  }
  if($in_use_fully_qualified_name)
  {
   $domain=$this->Get_Reverse_Domain();
   $this->name=$this->name.'.'.$domain->to_String();
  }
 }

 function Get_Reverse_Domain()
 {
  return new Reverse_Domain($this->CIDR);
 }
}
?>
