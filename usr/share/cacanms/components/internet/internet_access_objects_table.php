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

/**
component name:	internet_access_objects_table

input:		contracts object (Contracts_Database class instance)
		internet_link_access_types array (of Internet_Link_Access class objects)
		local_network object (Network class instance)

output:		internet_access_objects array (of Internet_Access class objects)
		suspended_internet_access_objects array (of Internet_Access class objects)
*/

require 'internet_link_access_types.php';
require_once $common_components.'/network_loader.php';
require_once $classes."/isp/internet_access.inc.php";

$GLOBALS['internet_access_objects']=&$internet_access_objects;
$GLOBALS['suspended_internet_access_objects']=&$suspended_internet_access_objects;
$internet_access_objects=array();
$suspended_internet_access_objects=array();

echo "Creating Internet_Access objects table.\n";
foreach($contracts->contracts as $contract)
{
 $array_name=false;
 if($contract->status === Contract_Status::Operative())
  $array_name='internet_access_objects';
 if($contract->status === Contract_Status::Suspended())
  $array_name='suspended_internet_access_objects';
 if($array_name)
 {
  $host=$local_network->Find_Hosts($contract->hostname,'hostname');
  if(count($host)<1)
   echo " Warning! Host '".$contract->hostname->to_String()."' not found in local network database!\n";
  else
  {
   $ILAs=array();
   foreach($contract->ILAs_strings as $ILA_string)
   {
    $fields=explode(':',$ILA_string);
    switch(count($fields))
    {
     case 2:
      $ip=new IP($fields[1]);
      break;
     case 1:
      $ip=null;
      break;
     default:
      exit("Error! '{$ILA_string}' is not a valid Internet_Link_Access description!\n");
    }
    // ILAs link defined?
    if(!array_key_exists($fields[0],$internet_link_access_types))
     exit(" Error! '{$fields[0]}' internet link access type not defined!\n");

    $ILA=$internet_link_access_types[$fields[0]];
    if($ip!==null)
     $ILA->Set_IP($ip);
    $internet_link=&$internet_links[$ILA->internet_link_name];
    if(($ILA->IP!==null) && ($ILA->flags->own_address))
     $internet_link->IPv4_network->Reserve_IP($ILA->IP);
    
    $ILAs[]=$ILA;
   }
   $internet_access_object=new Internet_Access($host[0],$ILAs,$contract->internet_access_flags);
   ${$array_name}[]=new Internet_Access($host[0],$ILAs,$contract->internet_access_flags);
  }
 }
}
echo "Internet_Access objects table creation completed.\n\n";

// Destroying temporary variables
unset($contract,$array_name,$host,$ILAs,$ILA_string,$fields,$ILA,$ip);
?>
