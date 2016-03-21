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
require_once 'cidr.inc.php';
require_once $classes.'/miscellaneous/relation.inc.php';

class IPv4_Network
{
 var $address; 
 var $IPs;
 var $subnetworks;

 function IPv4_Network($in_cidr)
 {
  if(!is_a($in_cidr,'CIDR'))
   $in_cidr=new CIDR($in_cidr);
  $this->address=$in_cidr;
  $this->IPs=array();
  $this->subnetworks=array();
 }

 function Reserve_IP($in_IP)
 {
  if(!is_a($in_IP,'IP'))
   $in_IP=new IP($in_IP);

  if(count($this->subnetworks) !=0 )
   exit("Error! This network is divided into subnetworks! You should try to"
        ." reserve this IP in one of them.\n");

  if(!$this->Belongs_To($in_IP))
   exit("Error! IP address '".$in_IP->to_String()."' outside the network '"
        .$this->address->to_String()."' IP range!\n");

  if(!$this->Is_Free($in_IP))
   exit("Error! IP address '".$in_IP->to_String()."' already in use!\n");
  else
   $this->IPs[]=$in_IP; 
 }

 function Belongs_To($in_IP)
 {
  if(!is_a($in_IP,'IP'))
   $in_IP=new IP($in_IP);

  if(!$this->address->Match_IP($in_IP))
   return false;
  else
   return true;
 }

 function Is_Free($in_IP)
 {
  if(!is_a($in_IP,'IP'))
   $in_IP=new IP($in_IP);

  if(!$this->Belongs_To($in_IP))
   exit("Error! IP address '".$in_IP->to_String()."' outside the network '"
        .$this->address->to_String()."' IP range!\n");

  if( ($this->address->Broadcast_Address() == $in_IP)
      || ($this->address->Network_Address() == $in_IP))
    return false;

  $found=false;
  foreach($this->IPs as $IP)
  {
   if($IP->to_String()==$in_IP->to_String())
    $found=true;
   if($found)
    break;
  }

  return !$found;
 }

 function Add_Subnetwork($in_network)
 {
  if(count($this->IPs) !=0 )
   exit("Error! Subnetworks cannot be added because of IP reservation.\n");

  $check=$this->address->Match_CIDR($in_network->address);
  if($check !== Relation::Subset())
   exit("Error! Wrong IP range! Not a subnetwork of this network.\n");

  foreach($this->subnetworks as $subnetwork)
  {
   $check=$subnetwork->address->Match_CIDR($in_network->address);
   if($check !== Relation::Exclusion())
    exit("Error! Subnetwork's IP range intersects one or more of current subnetworks\n");
  }
  $this->subnetworks[]=$in_network; 
 }

 function Get_Free_IP()
 {
  if(count($this->subnetworks) !=0 )
   exit("Error! This network may only contain subnetworks.\n");
 
  $ip=$this->address->Network_Address();
  while(($ip=$this->address->Get_Next_IP($ip)) !== null)
  {
   $found=false;
   foreach($this->IPs as $IP)
    if($ip->to_String()===$IP->to_String())
    {
     $found=true;
     break;
    }
   if(!$found)
    break;
  }
  if($ip === null)
   exit("Error! There are no available IP addresses left!\n");
  return $ip;
 }
 
 function from_String(&$in_out_network_string)
 {
  $lines=explode("\n",$in_out_network_string);
  if(count($lines)<1)
   exit("Error! No network header!\n");

  $network_header=$lines[0];
  $network_header_fields=explode("//",$network_header);
  if((count($network_header_fields) !== 2) || ($network_header_fields[0] !== ''))
   exit("Error! '".$network_header."' is not a valid network header!\n");

  $cidr=new CIDR($network_header_fields[1]); 
  $network=new IPv4_Network($cidr); 

  $lines=array_slice($lines,1);
  $in_out_network_string=implode("\n",$lines);
  
  $section_end=false;
  $IPs=0;
  while(!$section_end && (strlen($in_out_network_string)>0))
  {
   $IPs_end=false;
   $lines=explode("\n",$in_out_network_string);
   foreach($lines as $index => $line)
   {
    if($IPs_end)
     break;
    if($line==='//')
    {
     $lines=array_slice($lines,$IPs+1);
     $in_out_network_string=implode("\n",$lines);
     $section_end=true;
     $IPs_end=true;
    }
    elseif((strpos($line,'//') === 0) && (strlen($line)>2))
    {
     $lines=array_slice($lines,(int)$index);
     $in_out_network_string=implode("\n",$lines);
     $subnetwork=IPv4_Network::from_String($in_out_network_string);
     $network->Add_Subnetwork($subnetwork);
     $IPs_end=true;
    }
    else
    {
     $ip=new IP($line);
     $network->Reserve_IP($ip);
     $IPs++;
    }
   }
  }
  return $network;
 }

 function to_String()
 {
  $string='//'.$this->address->to_String()."\n";
  if(count($this->subnetworks) !=0)
   foreach($this->subnetworks as $subnetwork)
      $string=$string.$subnetwork->to_String();
  elseif(count($this->IPs) !=0)
   foreach($this->IPs as $IP)
    $string=$string.$IP->to_String()."\n";
  $string=$string."//\n";
  return $string;
 }
}
?>
