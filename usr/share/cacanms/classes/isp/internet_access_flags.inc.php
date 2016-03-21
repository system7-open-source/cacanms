<?
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

class Internet_Access_Flags
{
 var $proxy_access;//P
 var $mail_access;//M
 var $no_dns_access;//N
 var $access_level=null;//[0-9]

 function Internet_Access_Flags($in_flags='')
 {
  $this->proxy_access=(strpos($in_flags,'P')!==false);
  $this->mail_access=(strpos($in_flags,'M')!==false);
  $this->no_dns_access=(strpos($in_flags,'N')!==false);
  if(ereg('[0-9]',$in_flags,$access_level)!==false)
   $this->access_level=(int)$access_level[0];
 }

 function to_String()
 {
  $string='';
  if($this->proxy_access)
   $string=$string.'P';
  if($this->access_level !== null)
   $string=$string.$this->access_level;
  if($this->mail_access)
   $string=$string.'M';
  if($this->no_dns_access)
   $string=$string.'N';
  if($string=='')
   $string='-';
  return sprintf("%s",$string);
 }
}
?>
