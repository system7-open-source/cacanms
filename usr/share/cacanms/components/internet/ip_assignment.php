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

require 'internet_access_objects_table.php';

echo "Assigning IP addresses.\n";
for($i=0;$i<count($internet_access_objects);$i++)
{
 $modified=false;
 for($j=0;$j<count($internet_access_objects[$i]->internet_link_access_objects);$j++)
 {
  if($internet_access_objects[$i]->internet_link_access_objects[$j]->IP === null)
  {
   $ip=$internet_links
       [$internet_access_objects[$i]->internet_link_access_objects[$j]->internet_link_name]
	->IPv4_network->Get_Free_IP();
   $internet_links[$internet_access_objects[$i]->internet_link_access_objects[$j]->internet_link_name]
    ->IPv4_network->Reserve_IP($ip); 
   $internet_access_objects[$i]->internet_link_access_objects[$j]->Set_IP($ip); 
   echo ' '.$ip->to_String()."\n";
   $modified=true;
  }
 }
 if($modified)
 {
  $contract=$contracts->Get_Contract($internet_access_objects[$i]->host->hostname->to_String());
  if($contract!==null)
  {
   for($k=0;$k<$j;$k++)
   {
    if($internet_access_objects[$i]->internet_link_access_objects[$k]->flags->own_address
       && strpos($contract->ILAs_strings[$k],':')===false)
     $contract->ILAs_strings[$k]=$contract->ILAs_strings[$k]
      .':'.$internet_access_objects[$i]->internet_link_access_objects[$k]->IP->to_String();
   }
   $contracts->Replace_Contract($contract);
  }
 }
}
echo "IP addresses assignment completed.\n\n";

// Destroying temporary variables
unset($contract,$ip,$modified,$i,$j,$k);
?>
