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

class Internet_Link_Access_Flags
{
 var $own_address;//A
 var $constant_address;//C
 var $outside_access;//O

 function Internet_Link_Access_Flags($in_flags='')
 {
  $this->own_address=(strpos($in_flags,'A')!==false);
  $this->constant_address=(strpos($in_flags,'C')!==false);
  $this->outside_access=(strpos($in_flags,'O')!==false);

  if($this->outside_access || $this->constant_address)
   $this->own_address=true;
 }

 function to_String()
 {
  $string='';
  if($this->own_address)
   $string=$string.'A';
  if($this->constant_address)
   $string=$string.'C';
  if($this->outside_access)
   $string=$string.'O';
  if($string=='')
   $string='-';
  return sprintf("%s",$string);
 }
}
?>
