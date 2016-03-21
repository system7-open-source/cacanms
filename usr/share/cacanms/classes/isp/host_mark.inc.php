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

class Host_Mark
{
 var $linkpart;
 var $hostpart;

 function Host_Mark($in_linkmark,$in_ip)
 {
  if(!is_int($in_linkmark) || ($in_linkmark!==0xFF000000&$in_linkmark))
   exit("Error! Wrong linkmark '{$in_linkmark}'! It must be a 32bit integer'
        .' with its most significant octet within a range [0;255].\n");
  if(!is_a($in_ip,'IP'))
   $in_ip=new IP($in_ip);
  $hostpart=$in_ip->address&0x00FFFFFF;

  $this->linkpart=$in_linkmark;
  $this->hostpart=$hostpart;
 }

 function Get_Mark()
 {
  $mark=$this->linkpart|$this->hostpart;
  return $mark;
 }
 
 function to_String()
 {
  return sprintf("%d",$this->Get_Mark());
 }
}
?>
