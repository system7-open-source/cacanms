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

class Label
{
 var $name;
 var $minimum_length=1;
 var $maximum_length=24;

 function Label($in_name)
 {
  Label::Validate($in_name);
  $this->name=$in_name;
 }

 function to_String()
 {
  return $this->name;
 }
 
/** To ensure maximum compatibility the most strict rules possible were applied
    (based on many RFCs, conventions and knowledge of technological constraints).
    The actual DNS Label specification is much more liberal.
*/
 function Validate($in_name)
 {
  $length=strlen($in_name);
  if($length<$this->minimum_length || $length>$this->maximum_length
     || !(eregi('^[[:alpha:]]+[[:alnum:]-]*$',$in_name) && eregi('[^-]+$',$in_name)))
   exit('Error! "'.$in_name.'" is not a valid DNS label!'."\n");
 }

 function Match($in_label)
 {
  $p=strtolower($this->name);
  $q=strtolower($in_label->name);

  return ($p===$q);
 }
}
?>
