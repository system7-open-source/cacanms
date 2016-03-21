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

require_once "rr_class.inc.php";
require_once "rr_type.inc.php";
require_once $classes."/miscellaneous/object.inc.php";

class Resource_Record extends Object
{
 var $name="";
 var $TTL="";
 var $class="";
 var $type="";
 var $RDATA="";

 function Resource_Record ($in_name,$in_TTL,$in_class, $in_type, $in_RDATA)
 {
  if($in_TTL!==null)
  {
   if(!is_numeric($in_TTL))
    exit("Error! Argument '{$in_TTL}' is not a valid TTL value!");
   else
    $in_TTL=(int)$in_TTL;
  }
  $this->TTL=$in_TTL;

  if(!is_a($in_type,'RR_Type'))
   $in_type=new RR_Type($in_type);
  $this->type=$in_type;

  if(!is_a($in_class,'RR_Class'))
   $in_class=new RR_Class($in_class);
  $this->class=$in_class;
 }

 function to_String()
 {
  if($this->TTL<0)
   $TTL=sprintf("%u",$this->TTL);

  $name=$this->Attribute_to_String($this->name);
  $RDATA=$this->Attribute_to_String($this->RDATA);

  return sprintf("%-24s\t%-10s\t%s\t%s\t%s",$name,$TTL,
                 $this->class->to_String(),$this->type->to_String(),$RDATA);
 }
}
?>
