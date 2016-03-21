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

require_once "option.inc.php";

class String_Option extends Option
{
 function String_Option($in_name, $in_data)
 {
  String_Option::Validate($in_name, $in_data);

  if(substr_count($in_data,'"')===0)
   $in_data='"'.$in_data.'"';

  $this->name=$in_name;
  $this->data=$in_data;
 }

 function Validate($in_name, $in_data)
 {
  parent::Validate($in_name, $in_data);
  if(is_string($in_data))
   if( (ereg('^[[:space:]]*"[[:space:]]*"[[:space:]]',$in_data)!==false)
       || (substr_count($in_data,'"')!==0 && substr_count($in_data,'"')!==2) )
    Option::Invalid_Option_Data_Error($in_data);
 }
}
?>
