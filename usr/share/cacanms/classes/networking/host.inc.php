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
require_once 'ip.inc.php';
require_once 'presence_checker.inc.php';
require_once 'mac_address.inc.php';
require_once 'host_flags.inc.php';
require_once $classes.'/miscellaneous/date.inc.php';
require_once 'dns/hostname.inc.php';

class Host
{
 var $hostname;
 var $IP;
 var $flags;
 var $date;
 var $MAC;
 var $location;
 var $router;

 function Host($in_hostname,$in_MACs,$in_IP,$in_flags,$in_location,$in_date,$in_router='-')
 {
  if(!is_a($in_hostname,'Hostname'))
   $in_hostname=new Hostname($in_hostname);
  if(!is_a($in_IP,'IP') && $in_IP!==null)
   $in_IP=new IP($in_IP);
  if(!is_a($in_date,'Date'))
   $in_date=new Date($in_date);
  if(!is_a($in_flags,'Host_Flags'))
   $in_flags=new Host_Flags($in_flags);

  $this->hostname=$in_hostname;
  $this->IP=$in_IP; 
  $this->MAC=array();
  if(is_a($in_MACs,'MAC_Address'))
   $this->MAC[]=$in_MACs;
  else
   foreach($in_MACs as $MAC)
    $this->MAC[]=$MAC;
  $this->flags=$in_flags;
  $this->location=trim($in_location);
  $this->date=$in_date;
  $this->router=$in_router;
 }

 function from_String($in_host_record)
 {
  $fields=split('[[:space:]]+',trim($in_host_record));
  $size=count($fields);
  // Host record should have 7 fields but...
  // MAC addresses' octets may be separated not only by ':' and '-' but also by [[:space:]]
  if($size<7 || $size>12)
    exit('Error! "'.$in_host_record.'" is not a valid host record.'."\n");
  for($i=1;$i<$size-5;$i++)
   $macs_string=$macs_string.$fields[$i].' ';
  unset($i);
    
  $in_host_record=array('name'=>"$fields[0]",'macs'=>$macs_string,'ip'=>$fields[$size-5]
                  ,'flags'=>$fields[$size-4],'router'=>$fields[$size-3]
		  ,'location'=>$fields[$size-2],'date'=>trim($fields[$size-1]));

  $macs=split(',',$in_host_record['macs']);

  $in_host_record['macs']=array();
  foreach($macs as $mac)
   $in_host_record['macs'][]=new MAC_Address($mac);

  if($in_host_record['ip']=='-')
   $ip=null;
  else
   $ip=new IP($in_host_record['ip']);
  
  return new Host(new Hostname($in_host_record['name']), $in_host_record['macs']
                  ,$ip, new Host_Flags($in_host_record['flags']),$in_host_record['location']
		  , new Date($in_host_record['date']),$in_host_record['router']);
 }

 function to_String()
 {
  $string=sprintf("%-20s %s",$this->hostname->name,$this->MAC[0]->to_String());
  for($i=1;$i<count($this->MAC);$i++)
  {
   $string=$string.','.$this->MAC[$i]->to_String();
  }
  if($this->IP === null)
   $ip='-';
  else
   $ip=$this->IP->to_String();
  $string=$string."\t".$ip."\t".$this->flags->to_String()."\t".$this->router."\t"
          .$this->location."\t".$this->date->to_String();
  return $string;
 }
 
 function Match_Host($in_pattern, $in_criterion='hostname')
 {
  $attributes=array_keys(get_class_vars('Host'));
  if(array_search($in_criterion,$attributes) === false)
   exit("Error! Host::Match_Host(): '".$in_criterion."' is not an attribute of class 'Host'\n");

  if($in_pattern==='*')
   return true;

  $result=false;
  
  if($in_criterion=='MAC')
   $result=$this->Match_MAC_Address($in_pattern);
  elseif($in_criterion=='hostname')
   $result=$this->hostname->Match($in_pattern);
  elseif($in_criterion=='flags')
   $result=(ereg($in_pattern,$this->flags->to_String())!==false);
  elseif($in_criterion=='location')
   $result=(ereg($in_pattern,$this->location)!==false);
  else
   $result=($this->$in_criterion === $in_pattern);
  return $result;
 }

 function Match_MAC_Address($in_MAC_address)
 {
  foreach($this->MAC as $MAC)
   if($in_MAC_address === $MAC)
    return true;
   return false;
 }
 
 function IP_is_Set()
 {
  if($this->IP !== null)
   return true;
  else
   return false;
 }

 function Has_Router()
 {
  return $this->router==='-'?false:true;
 }

 function Is_Present($in_presence_checker)
 {
  if(!is_subclass_of($in_presence_checker,'Presence_Checker'))
   exit("Error! '{$in_presence_checker}' is not of a subclass of Presence_Checker class!\n");
  $result=$in_presence_checker;
  $result->Check_Presence($this->IP);
  return $result;
 }
}
?>
