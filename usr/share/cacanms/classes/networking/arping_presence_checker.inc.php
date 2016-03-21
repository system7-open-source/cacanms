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

require_once "presence_checker.inc.php";

class Arping_Presence_Checker extends Presence_Checker
{
 var $arping_command;

 function Arping_Presence_Checker($in_arping_command='nice -15 arping')
 {
  $this->arping_command=$in_arping_command;
 }
 
 function Check_Presence($in_address)
 {
  parent::Check_Presence($in_address);
  $result=exec($this->arping_command." -c 1 -w 5000 ".$this->address->to_String().' 2>&1');
  if(strpos($result,'1 packets received')!==false)
   $this->is_present=true;
  else
   $this->is_present=false;
 }
}
?>
