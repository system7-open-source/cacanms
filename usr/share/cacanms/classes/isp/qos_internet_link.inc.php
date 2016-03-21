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

require_once "internet_link.inc.php";
require_once "tc_class_id.inc.php";

class QoS_Internet_Link extends Internet_Link
{
 var $tc_class_id; // an id of a class (cbq, htb etc.) for this link 
 var $fwmark; // firewall mark for netfilter rules
 var $weight; // weight for weighted round-robin algorithm load balancing

 function QoS_Internet_Link($in_name,$in_NIC,$in_IPv4_network,$in_bandwidth,$in_fwmark,$in_tc_class_id,$in_weight)
 {
  if(!is_a($in_tc_class_id,'TC_Class_ID'))
   $in_tc_class_id=new TC_Class_ID(trim($in_tc_class_id));
  $this->tc_class_id=$in_tc_class_id;

  $in_fwmark=$in_fwmark+0;
  if($in_fwmark!==(int)$in_fwmark)
   exit("Error! Firewall mark '{$in_fwmark}' is not an integer!\n");
  $this->fwmark=abs($in_fwmark);

  $in_weight=$in_weight+0;
  if($in_weight!==(int)$in_weight)
   exit("Error! Internet link weight '{$in_weight}' is not an integer!\n");
  $this->weight=abs($in_weight);

  parent::Internet_Link($in_name,$in_NIC,$in_IPv4_network,$in_bandwidth);
 }

 function to_String()
 {
  return sprintf("%s,%d,%s"
                 ,parent::to_String()
                 ,$this->fwmark
	         ,$this->tc_class_id->to_String());
 }

 function from_String($in_string)
 {
  $fields=explode(',',$in_string);
  if(count($fields)!==7)
   exit("Error! '{$in_string}' is not a valid 'QoS_Internet_Link' class object textual representation!\n");
  return new QoS_Internet_Link(trim($fields[0]),$fields[1],new IPv4_Network($fields[2]),Bandwidth::from_String($fields[3]),$fields[4],new TC_Class_ID(trim($fields[5])),$fields[6]);
 }
}
?>
