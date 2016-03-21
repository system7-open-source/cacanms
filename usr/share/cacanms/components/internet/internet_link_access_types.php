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

require 'internet_links.php';
require_once $classes.'/isp/internet_link_access.inc.php';

$GLOBALS['internet_link_access_types']=&$internet_link_access_types;

echo "Preparing internet link access types.\n";
foreach($internet_link_access_templates as $key=>$internet_link_access_template)
{
 $guaranteed_bandwidth=$guaranteed_bandwidths[$internet_link_access_template[0]];
 $temp_ILAT=Internet_Link_Access::from_String
   ($internet_link_access_template[0].',1/1bit,'.$internet_link_access_template[1]);
 if(!array_key_exists($temp_ILAT->internet_link_name,$internet_links))
 {
  echo " Warning! '".$temp_ILAT->internet_link_name."' internet link not defined locally.\n";
  continue;
 }
 $temp_ILAT->Set_Guaranteed_Bandwidth($temp_ILAT->maximum_bandwidth->Get_Intersection($guaranteed_bandwidth));
 $internet_link_access_types[$key]=$temp_ILAT;
 $internet_link=&$internet_links[$internet_link_access_template[0]];
 $ilat=$internet_link_access_types[$key];
 //if(($ilat->IP!==null) && (!$ilat->flags->own_address))
 if($ilat->IP!==null)
  if($internet_link->IPv4_network->Is_Free($ilat->IP))
   $internet_link->IPv4_network->Reserve_IP($ilat->IP);
}
echo "Internet link access types preparation completed.\n\n";

unset($key,$internet_link_access_template,$guaranteed_bandwidth,$temp_ILAT,$internet_link,$ilat);
?>
