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
require_once 'cidr.inc.php';
require_once 'host.inc.php';
require_once $classes.'/miscellaneous/relation.inc.php';

class Network
{
 var $name;
 var $address; 
 var $hosts;
 var $subnetworks;
 var $awating_hosts;

 function Network($in_name,$in_cidr)
 {
  if(!is_a($in_cidr,'CIDR'))
   $in_cidr=new CIDR($in_cidr);
  $this->address=$in_cidr;
  $this->hosts=array();
  $this->awaiting_hosts=array();
  $this->subnetworks=array();
  $this->name=trim($in_name);
 }

 function Add_Host($in_host)
 {
  if(count($this->subnetworks) !=0 )
   exit("Error! This network is divided into subnetworks! You should try to add "
        ."this host to one of them.\n");

  if($this->Find_Hosts($in_host->hostname) !== null)
   exit("Error! Hostname '".$in_host->hostname->to_String()."' already in use!\n");

  foreach($in_host->MAC as $MAC)
   if($this->Find_Hosts($MAC,'MAC') !== null)
    exit("Error! MAC address '".$MAC->to_String()."' already in use!\n");

  if($in_host->IP_is_Set())
  {
   if(!$this->address->Match_IP($in_host->IP))
    exit("Error! Host's IP address outside the network IP range!\n");

   if( ($this->address->Broadcast_Address() == $in_host->IP)
      || ($this->address->Network_Address() == $in_host->IP)
      || ($this->Find_Hosts($in_host->IP,'IP') !== null) )
    exit("Error! IP address '".$in_host->IP->to_String()."' already in use!\n");
   $this->hosts[]=$in_host; 
  }
  else
   $this->awaiting_hosts[]=$in_host;
 }

 function Add_Subnetwork($in_network)
 {
  if(count($this->hosts) !=0 )
   exit("Error! Subnetworks cannot be added because this network contains some hosts.\n");

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

 function Assign_IP_Addresses()
 {
  $subn=count($this->subnetworks);
  if($subn != 0)
   for($i=0;$i<$subn;$i++)
    $this->subnetworks[$i]->Assign_IP_Addresses();
  else
   foreach($this->awaiting_hosts as $awaiting_host)
   {
    $awaiting_host->IP=$this->Get_Free_IP();
    $this->Add_Host($awaiting_host);
   }
  $this->awaiting_hosts=array();
 }

 function Get_Free_IP()
 {
  if(count($this->subnetworks) !=0 )
   exit("Error! This network may only contain subnetworks.\n");
 
  $ip=$this->address->Network_Address();
  while(($ip=$this->address->Get_Next_IP($ip)) !== null)
   if($this->Find_Hosts($ip,'IP') === null)
    break;

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
  if((count($network_header_fields) !== 3) || ($network_header_fields[0] !== ''))
   exit("Error! '".$network_header."' is not a valid network header!\n");

  $cidr=new CIDR($network_header_fields[2]); 
  $network=new Network($network_header_fields[1],$cidr); 

  $lines=array_slice($lines,1);
  $in_out_network_string=implode("\n",$lines);
  
  $section_end=false;
  $hosts=0;
  while(!$section_end && (strlen($in_out_network_string)>0))
  {
   $hosts_end=false;
   $lines=explode("\n",$in_out_network_string);
   foreach($lines as $index => $line)
   {
    if($hosts_end)
     break;
    if($line==='//')
    {
     $lines=array_slice($lines,$hosts+1);
     $in_out_network_string=implode("\n",$lines);
     $section_end=true;
     $hosts_end=true;
    }
    elseif((strpos($line,'//') === 0) && (strlen($line)>2))
    {
     $lines=array_slice($lines,(int)$index);
     $in_out_network_string=implode("\n",$lines);
     $subnetwork=Network::from_String($in_out_network_string);
     $network->Add_Subnetwork($subnetwork);
     $hosts_end=true;
    }
    else
    {
     $host=Host::from_String($line);
     $network->Add_Host($host);
     $hosts++;
    }
   }
  }
  return $network;
 }

 function to_String()
 {
  $string='//'.$this->name.'//'.$this->address->to_String()."\n";
  if(count($this->subnetworks) !=0)
   foreach($this->subnetworks as $subnetwork)
      $string=$string.$subnetwork->to_String();
  elseif(count($this->hosts) !=0)
   foreach($this->hosts as $host)
    $string=$string.$host->to_String()."\n";
  $string=$string."//\n";
  return $string;
 }

 function &Find_Hosts($in_pattern, $in_criterion='hostname')
 {
  $matching_hosts=array();
  
  if(count($this->subnetworks) != 0)
   foreach($this->subnetworks as $subnetwork)
   {
    $tmp=$subnetwork->Find_Hosts($in_pattern, $in_criterion);
    if(count($tmp))
     $matching_hosts=array_merge($matching_hosts,$tmp);
   }
  else
   foreach($this->hosts as $host)
   {
    if($host->Match_Host($in_pattern, $in_criterion))
     $matching_hosts[]=$host;
   }
  if(count($matching_hosts)!=0)
   return $matching_hosts;
  else
   return null;
 }

 function Get_Awaiting_Hosts()
 {
  $awaiting_hosts=array();
  
  if(count($this->subnetworks) != 0)
   foreach($this->subnetworks as $subnetwork)
   {
    $tmp=$subnetwork->Get_Awaiting_Hosts();
    if(count($tmp))
     $awaiting_hosts=array_merge($awaiting_hosts,$tmp);
   }
  else
   foreach($this->awaiting_hosts as $host)
     $awaiting_hosts[]=$host;
  if(count($awaiting_hosts)!=0)
   return $awaiting_hosts;
  else
   return null;
 }
}
?>
