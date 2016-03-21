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
require_once "ip_network_class.inc.php";

class IP
{
 var $address;

 function IP($in_address='0.0.0.0')
 {
  $this->address=ip2long($in_address);
  if((trim($in_address!='255.255.255.255')) && ($this->address == -1))
   exit('Error! '.$in_address.' is not a valid IP address!'."\n");
 }

 function to_String()
 {
  return sprintf("%s",long2ip($this->address));
 }

 function Get_Class()
 {
  $ip=$this->address>>28;
  $ip&=0x0000000F;
  if($ip<8)
   return IP_Network_Class::A();
  elseif($ip<12)
   return IP_Network_Class::B();
  elseif($ip<14)
   return IP_Network_Class::C();
  elseif($ip==14)
   return IP_Network_Class::D();
  elseif($ip==15)
   return IP_Network_Class::E();
 }

 function Get_Octets()
 {
  $out_array=array();
  for($i=0;$i<=24;$i+=8)
  {
   $octet=$this->address>>$i;
   $octet=$octet&0x000000FF;
   $out_array[]=$octet;
  }
  return $out_array;
 }
}
?>
