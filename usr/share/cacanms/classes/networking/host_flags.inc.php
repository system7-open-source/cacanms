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

class Host_Flags
{
 var $administrative_access;//A
 var $access_level=null;//[0-9]
 var $no_dns; //D
 var $no_revdns;//R
 var $no_firewall;//F
 var $no_tc;//Q
 var $no_dhcp;//H

 function Host_Flags($in_flags='')
 {
  $this->administrative_access=(strpos($in_flags,'A')!==false);
  $this->secondary_server_access=(strpos($in_flags,'S')!==false);
  $this->no_dns=(strpos($in_flags,'D')!==false);
  $this->no_revdns=(strpos($in_flags,'R')!==false);
  $this->no_firewall=(strpos($in_flags,'F')!==false);
  $this->no_tc=(strpos($in_flags,'Q')!==false);
  $this->no_dhcp=(strpos($in_flags,'H')!==false);
  if(ereg('[0-9]',$in_flags,$access_level)!==false)
   $this->access_level=(int)$access_level[0];
 }

 function to_String()
 {
  $string='';
  if($this->administrative_access)
   $string=$string.'A';
  if($this->access_level !== null)
   $string=$string.$this->access_level;
  if($this->no_dns)
   $string=$string.'D';
  if($this->no_revdns)
   $string=$string.'R';
  if($this->no_firewall)
   $string=$string.'F';
  if($this->no_tc)
   $string=$string.'Q';
  if($this->no_dhcp)
   $string=$string.'H';
  if($string=='')
   $string='-';
  return sprintf("%s",$string);
 }
}
?>
