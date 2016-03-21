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

require_once "hardware_address.inc.php";

class MAC_Address extends Hardware_Address
{
 function MAC_Address($in_address='FF:FF:FF:FF:FF:FF')
 {
  MAC_Address::Validate($in_address);
  $this->address=$in_address;
  $this->Format();
 }

 function Format()
 {
  $separators=array(' ','-');
  $this->address=str_replace($separators,':',$this->address);
  $this->address=strtoupper($this->address);
  $tmp=split(':',$this->address);
  for($i=0;$i<6;$i++)
  {
   if(strlen($tmp[$i])<2)
    $tmp[$i]='0'.$tmp[$i];
  }

  $this->address=$tmp[0].':'.$tmp[1].':'.$tmp[2].':'.$tmp[3].':'.$tmp[4].':'.$tmp[5];
 }
 
 function Validate($in_address)
 {
  $in_address=trim($in_address);
  if(!eregi('^[0-9A-F]{1,2}[ :-]{1}[0-9A-F]{1,2}[ :-]{1}[0-9A-F]{1,2}[ :-]{1}[0-9A-F]'
     .'{1,2}[ :-]{1}[0-9A-F]{1,2}[ :-]{1}[0-9A-F]{1,2}$',$in_address))
   exit('Error! '.$in_address.' is not a valid MAC address!'."\n");
 }
}
?>
