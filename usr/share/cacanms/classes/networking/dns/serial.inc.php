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

class Serial
{
 var $serial;
 var $format='([0-9]{4}((0[1-9])|(1[0-2]))((0[1-9])|([12][0-9])|(3[01]))[0-9]{2})';
 /** Chosen format: YYYYMMDDNN
                   where YYYY denotes a four-digit year,
		   MM is a two-digit month number,
		   DD is a two-digit day of the month number,
		   NN is a two-digit version number for a given day (00 to 99).

		   Preceding zeros are to be always included.
 */

 function Serial($in_serial)
 {
  Serial::Validate($in_serial);
  $this->serial=$in_serial;
 }
 
 function to_String()
 {
  return $this->serial;
 }
 
 function Extract_from_String(&$in_string)
 {
  $i=Serial::Serial_Position_in_String($in_string);
  if($i!==false)
   return new Serial(substr($in_string,$i,10));
  else
   return false;
 }
 
 function Validate($in_serial)
 {
  if(!ereg("^{$this->format}$",$in_serial))
   exit('Error! "'.$in_serial.'" is not a valid serial number!'."\n");
 }

 function Serial_Position_in_String(&$in_string)
 {
  $tmp=new Serial('0000010100');
  $i=ereg("((^.*\n+[[:space:]]*)|(^[[:space:]]*))".$tmp->format
          ."[[:space:]]*;[[:space:]]*Serial",$in_string,$matches);
  if($i!==false)
  {
   $i=strpos($in_string,$matches[4]);
   return $i;
  }
  else
   return false;
 }
 
 function Set_in_String($in_serial,&$in_out_string)
 {
  if(!is_a($in_serial,'Serial'))
   $in_serial=new Serial($in_serial);
  $pos=Serial::Serial_Position_in_String($in_out_string);
  if($pos===false)
   return false;
  $in_serial=$in_serial->to_String();
  for($i=0;$i<10;$i++)
   $in_out_string{$i+$pos}=$in_serial{$i};
  return true;
 }
  
 function Increment_in_String(&$in_out_string)
 {
  $old=Serial::Extract_from_String($in_out_string);
  if($old!==false)
  {
   $new=$old;
   $new->Increment();
   Serial::Set_in_String($new,$in_out_string);
   return true;
  }
  else
   return false;
 }
 
 function Increment()
 {
   $serial_date=substr($this->serial,0,8);
   $serial_suffix=substr($this->serial,8,2);
   $current_date=date("Ymd");   
   
   if($serial_date<$current_date)
    $serial_suffix='00';
   elseif($serial_date==$current_date)
   {
    if(++$serial_suffix>99)
     exit("Error! Too many changes today! Serial suffix would be bigger than 99!\n");
    $serial_suffix=sprintf("%02d",$serial_suffix);
   }
   else
    exit("Error! Current serial date lies is in the future!\n");
   
   $this->serial=$current_date.$serial_suffix;
 }
}
?>
