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
require_once 'netmask.inc.php';

class CIDR_IP_Prefix
{
 var $IP_prefix;

 function CIDR_IP_Prefix($in_IP_prefix='/0')
 {
  CIDR_IP_Prefix::Validate($in_IP_prefix);
  $this->IP_prefix=(int)trim($in_IP_prefix,'/');
 }

 function to_String()
 {
  return sprintf("/%d",$this->IP_prefix);
 }

 function to_Netmask()
 {
  $long = $this->IP_prefix==0?0:0xffffffff << (32 - $this->IP_prefix);
  return new Netmask(long2ip($long));
 }

 function Validate($in_IP_prefix)
 {
  $invalid=false;

  if(!ereg("^/[[:digit:]]{1,2}$",$in_IP_prefix))
   $invalid=true;
  else
  {
   $tmp=trim($in_IP_prefix,'/');
   if($tmp<0 || $tmp>32)
   $invalid=true;
  }
   
  if($invalid)
   exit('Error! "'.$in_IP_prefix.'" is not a valid CIDR IP prefix!'."\n");
 }
}
?>
