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

require_once $classes."/miscellaneous/object.inc.php";

class Option extends Object
{
 var $name;
 var $data;

 function Option($in_name, $in_data)
 {
  Option::Validate($in_name, $in_data);
  $this->name=$in_name;
  $this->data=$in_data;
 }

 function to_String()
 {
  $data="";
  if(is_array($this->data))
  {
   $size=count($this->data);
   $data=$this->Attribute_to_String($this->data[0]);
   for($i=1;$i<$size;$i++)
    $data=$data.','.$this->Attribute_to_String($this->data[$i]);
  }
  else
   $data=$this->Attribute_to_String($this->data);
  
  return sprintf("option %s %s;",$this->Attribute_to_String($this->name),$data);
 }

 function Validate($in_name, $in_data)
 {
  if(is_string($in_name))
   if(!ereg('^[[:alpha:]]+[[:alnum:]-]*$',$in_name))
    Option::Invalid_Option_Name_Error($in_name);
  if(is_string($in_data))
   if($in_data==="")
    Option::Invalid_Option_Data_Error($in_data);
 }
 
 function Invalid_Option_Name_Error($in_name)
 {
  exit('Error! '.$in_data.' is not a valid DHCP option name!'."\n");
 }

 function Invalid_Option_Data_Error($in_data)
 {
  exit('Error! '.$in_data.' is not a valid DHCP option data!'."\n");
 }
}
?>
