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
class Date
{
 var $timestamp;

 function Date($in_date='1970-01-01')
 {
  $in_date=trim($in_date);
  $separators=array('/',' ');
  $in_date=str_replace($separators,'-',$in_date);
  Date::Validate($in_date);
  $this->timestamp=strtotime($in_date);
 }

 function to_String()
 {
  return date('Y-m-d',$this->timestamp);
 }

 function Validate($in_date)
 {
  if(!ereg('^[0-9]{4}-[0-9]{2}-[0-9]{2}$',$in_date))
   exit('Error! '.$in_date.' is not a valid ISO 8601 date!'."\n");
 }
}
?>
