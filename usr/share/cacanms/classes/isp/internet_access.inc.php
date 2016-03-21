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

require_once $classes.'/networking/host.inc.php';
require_once 'internet_link_access.inc.php';
require_once 'internet_access_flags.inc.php';

class Internet_Access
{
 var $host;
 var $internet_link_access_objects;
 var $flags;

 function Internet_Access($in_host,$in_internet_link_access_objects,$in_flags)
 {
  if(!is_a($in_host,'Host'))
   $in_host=Host::from_String($in_host);
  $this->host=$in_host;

  if(!is_a($in_flags,'Internet_Access_Flags'))
   $in_flags=new Internet_Access_Flags($in_flags);
  $this->flags=$in_flags;

  // $in_internet_link_access_objects ought to be:
  // an array of Internet_Link_Access objects or their textual representations or
  // an Internet_Link_Access object or
  // a string containing Internet_Link_Access textual representation
  if(is_array($in_internet_link_access_objects))
   foreach($in_internet_link_access_objects as $internet_link_access)
    if(!is_a($internet_link_access,'Internet_Link_Access'))
     $this->internet_link_access_objects[]=new Internet_Link_Access($internet_link_access);
    else
     $this->internet_link_access_objects[]=$internet_link_access;
  else
   if(!is_a($in_internet_link_access_objects,'Internet_Link_Access'))
    $this->internet_link_access_objects[]=new Internet_Link_Access($in_internet_link_access_objects);
   else
    $this->internet_link_access_objects[]=$in_internet_link_access_objects;
 }

 function to_String()
 {
  $ILAs_count=count($this->internet_link_access_objects);
  $ILAs_string=$this->internet_link_access_objects[0];
  $ILAs_string=$ILAs_string->to_String();
  for($i=1;$i<$ILAs_count;$i++)
   $ILAs_string=$ILAs_string.','.$ILA->to_String();
  return sprintf("%s %s %s"
                 ,$this->host->to_String()
	         ,$this->flags->to_String()
		 ,$ILAs_string);
 }
}
?>
