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

class TC_Class_ID
{
 var $major;
 var $minor;

 function TC_Class_ID($in_ID)
 {
  $fields=explode(':',$in_ID);
  if(count($fields)!==2)
   exit("Error! '{$in_major}' is not a valid TC class ID!\n");

  $major=(int)$fields[0];
  $minor=(int)$fields[1];

  if($major<0 || $major>0xffff)
   exit("Error! 'TC_Class_ID' major number '{$major}' out of range (allowed values: from 0 to 0xFFFF)!\n");

  if($minor<0 || $minor>0xffff)
   exit("Error! 'TC_Class_ID' minor number '{$minor}' out of range (allowed values: from 0 to 0xFFFF)!\n");

  $this->major=$major;
  $this->minor=$minor;
 }

 function Get_Major()
 {
  return $this->major;
 }

 function Get_Minor()
 {
  return $this->minor;
 }

 function to_String()
 {
  return sprintf("%d:%d"
                 ,$this->major
	         ,$this->minor);
 }
}
?>
