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

require_once $classes."/networking/cidr.inc.php";

class Reverse_Domain
{
 var $name;

 function Reverse_Domain($in_arg)
 {
  if(!is_a($in_arg,'CIDR'))
  {
   Reverse_Domain::Validate($in_arg);
   $this->name=$in_arg;
  }
  else
  {
   switch($in_arg->IP_prefix->IP_prefix)
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
     exit("Error! '".$in_arg->to_String()."' subnet cannot have its own in-addr.arpa domain!\n");
   }
   $octets=$in_arg->Get_Octets();
   
   for($i=$host_octets;$i<4;$i++)
   {
    $this->name=$this->name.$octets[$i].'.';
   }
   $this->name=$this->name.'in-addr.arpa.';
  }
 }

 function to_String()
 {
  return $this->name;
 }
 
 function Validate($in_name)
 {
  if(!ereg("^((([0-9])|([(1-9][0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){1,3}in-addr\.arpa$"
     ,$in_name))
   exit('Error! '.$in_name.' is not a valid in-addr.arpa domain!'."\n");
 }
}
?>
