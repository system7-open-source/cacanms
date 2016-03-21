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

require_once $classes.'/networking/ip.inc.php';
require_once 'bandwidth.inc.php';
require_once 'internet_link_access_flags.inc.php';

class Internet_Link_Access
{
 var $internet_link_name;
 var $guaranteed_bandwidth;
 var $maximum_bandwidth;
 var $flags;
 var $IP;
 var $is_active=true;

 function Internet_Link_Access($in_link_name,$in_guaranteed_bandwidth
                               ,$in_maximum_bandwidth,$in_flags,$in_IP=null)
 {
  if(!is_a($in_guaranteed_bandwidth,'Bandwidth'))
   $in_guaranteed_bandwidth=Bandwidth::from_String($in_guaranteed_bandwidth);

  if(!is_a($in_maximum_bandwidth,'Bandwidth'))
   $in_maximum_bandwidth=Bandwidth::from_String($in_maximum_bandwidth);

  if(!is_a($in_flags,'Internet_Link_Access_Flags'))
   $in_flags=new Internet_Link_Access_Flags(trim($in_flags));

  if(!is_a($in_IP,'IP') && $in_IP!==null)
   $in_IP=new IP(trim($in_IP));

  $this->internet_link_name=$in_link_name;
  $this->maximum_bandwidth=$in_maximum_bandwidth;
  $this->Set_Guaranteed_Bandwidth($in_guaranteed_bandwidth);
  $this->flags=$in_flags;
  $this->IP=$in_IP;
 }

 function from_String($in_string)
 {
  $fields=explode(',',$in_string);
  $count=count($fields);
  if($count<4 || $count>5)
   exit("Error! '{$in_string}' is not a valid 'Internet_Link_Access' class object textual representation!\n");
  if($count==4)
   $IP=null;
  else
   $IP=new IP($fields[4]);
  return new Internet_Link_Access($fields[0]
              ,Bandwidth::from_String($fields[1])
	      ,Bandwidth::from_String($fields[2])
	      ,new Internet_Link_Access_Flags($fields[3])
	      ,$IP);
 }

 function Set_Guaranteed_Bandwidth($in_bw)
 {
  if(!is_a($in_bw,'Bandwidth'))
   $in_bw=new Bandwidth($in_bw);
  if($in_bw->upstream>$this->maximum_bandwidth->upstream
     || $in_bw->downstream>$this->maximum_bandwidth->downstream)
   exit("Error! Guaranteed bandwidth cannot exceed maximum bandwidth!\n");
  $this->guaranteed_bandwidth=$in_bw;
 }
 
 function Set_IP($in_IP)
 {
  if(!is_a($in_IP,'IP'))
   $in_IP=new IP($in_IP);
  $this->IP=$in_IP;
 }
 
 function to_String()
 {
  if($this->IP===null)
   $ip_string='';
  else
   $ip_string=','.$this->IP->to_String();
  return sprintf("%s,%s,%s,%s%s"
                 ,$this->internet_link_name
	         ,$this->guaranteed_bandwidth->to_String()
	         ,$this->maximum_bandwidth->to_String()
	         ,$this->flags->to_String()
	         ,$ip_string);
 }

 function Is_Active()
 {
  return $this->is_active;
 }

 function Activate()
 {
  $this->is_active=true;
 }

 function Deactivate()
 {
  $this->is_active=false;
 }
}
?>
