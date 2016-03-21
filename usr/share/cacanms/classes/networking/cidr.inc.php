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

require_once $classes.'/miscellaneous/relation.inc.php';
require_once 'ip.inc.php';
require_once 'cidr_ip_prefix.inc.php';

// CIDR (Classless Inter Domain Routing) Address
class CIDR extends IP
{
 var $IP_prefix; 

 function CIDR($in_cidr='0.0.0.0/0')
 {
  $tmp=array();
  $tmp=explode('/',$in_cidr,3);

  CIDR::Validate($tmp,$in_cidr);
  parent::IP($tmp[0]);
  $this->IP_prefix=new CIDR_IP_Prefix('/'.$tmp[1]);
  
 }

 function to_String()
 {
  $string=parent::to_String().$this->IP_prefix->to_String();
  return $string;
 }

 function to_IP()
 {
  return new IP($this->address);
 }

 function IP_to_String()
 {
  $string=parent::to_String();
  return $string;
 }

 function Match_IP($in_IP)
 {
  $netmask=$this->IP_prefix->to_Netmask();
  $netmask=$netmask->address;
  return (($this->address & $netmask)==($in_IP->address & $netmask));
 }

 function Match_CIDR($in_CIDR)
 {
  $result=Relation::Undefined();
  $in_broadcast_address=$in_CIDR->Broadcast_Address();
  $in_network_address=$in_CIDR->Network_Address();
  $broadcastmatch=$this->Match_IP($in_broadcast_address);
  $networkmatch=$this->Match_IP($in_network_address);
  if($broadcastmatch && $networkmatch)
  {
   if($this->Broadcast_Address() == $in_broadcast_address)
   {
    if($this->Network_Address() == $in_network_address)
     $result=Relation::Identity();
    else
     $result=Relation::Subset();
   }
   else
    $result=Relation::Subset();
  }
  elseif($broadcastmatch xor $networkmatch)
  {
   $result=Relation::Superset();
  }
  else
  {
   if($in_CIDR->Match_IP($this->Broadcast_Address()))
    $result=Relation::Superset();
   else
    $result=Relation::Exclusion();
  }
  return $result;
 }

 function Broadcast_Address()
 {
  $thisnetmask=$this->IP_prefix->to_Netmask();
  $thisnetmask=$thisnetmask->address;
  
  $thisnet=$thisnetmask&$this->address;

  $broadcast = ( (int)$thisnet | ~ (int)$thisnetmask );

  return new IP(long2ip($broadcast));
 }

 function Network_Address()
 {
  $thisnetmask=$this->IP_prefix->to_Netmask();
  $thisnetmask=$thisnetmask->address;
  $thisnet=$thisnetmask&$this->address;
  return new IP(long2ip($thisnet));
 }

 function Return_Host_Part($in_IP)
 {
  if($this->Match_IP($in_IP))
  {
   $netmask=$this->IP_prefix->to_Netmask();
   $netmask=$netmask->address;
   $result=(~$netmask) & ($in_IP->address);
   return new IP(long2ip($result));
  }
  else
   return null;
 }

 function Get_Next_IP($in_IP)
 {
  $host_part=$this->Return_Host_Part($in_IP);
  if(($host_part === null) || ($in_IP == $this->Broadcast_Address()))
   return null;
  $host_part=$host_part->address; 
  $host_part++;
  $next=$this->Network_Address();
  $next=$next->address | $host_part;
  return new IP(long2ip($next));
 }

 function Validate($in_array,$in_string)
 {
  $invalid=false;
  $length=count($in_array);

  if($length!=2)
   $invalid=true;
  elseif(strlen($in_array[0])<1)
   $invalid=true;
  elseif(strlen($in_array[1])<1)
   $invalid=true;
  
  if($invalid)
   exit('Error! "'.$in_string.'" is not a valid CIDR address!'."\n");
 }
}
?>
