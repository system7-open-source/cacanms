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

require_once "bandwidth.inc.php";
require_once $classes."/networking/ipv4_network.inc.php";

class Internet_Link
{
 var $name;
 var $NIC; // Network Interface Card
 var $IPv4_network;
 var $bandwidth;
 var $is_local;

 function Internet_Link($in_name,$in_NIC,$in_IPv4_network,$in_bandwidth,$in_is_local=true)
 {
  if(!is_a($in_bandwidth,'Bandwidth'))
   $in_bandwidth=Bandwidth::from_String(trim($in_bandwidth));

  if(!is_a($in_IPv4_network,'IPv4_Network'))
   $in_IPv4_network=new IPv4_Network($in_IPv4_network);

  $this->bandwidth=$in_bandwidth;
  $this->IPv4_network=$in_IPv4_network;
  $this->NIC=$in_NIC;
  $this->name=$in_name;
  $this->is_local=(boolean)$in_is_local;
 }

 function Is_Inactive($in_filename)
 {
  return file_exists($in_filename);
 }

 function to_String()
 {
  return sprintf("%s,%s,%s,%s"
                 ,$this->name
                 ,$this->NIC
	         ,$this->IPv4_network->address->to_String()
	         ,$this->bandwidth->to_String());
 }

 function from_String($in_string)
 {
  $fields=explode(',',$in_string);
  if(count($fields)!==4)
   exit("Error! '{$in_string}' is not a valid 'Internet_Link' class object textual representation!\n");
  return new Internet_Link(trim($fields[0]),$fields[1],new IPv4_Network($fields[2])
                           ,Bandwidth::from_String(trim($fields[3])));
 }
}
?>
