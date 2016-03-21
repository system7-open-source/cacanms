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

class Bandwidth
/**Responsibilities
- - stores information about upstream and downstream bandwidth (i.e. the amount of data
    that can be transferred through a digital connection in a given time period)
- - understands all major bit rate units and provides conversion between them
- - understands bandwidth textual representation
- - calculates bandwidth divisions by a number
- - computes intersection of any two bandwidths
*/
{
 var $downstream; // stores downstream bandwidth in bits (integer value)
 var $upstream; // stores upstream bandwidth in bits (integer value)

 function Bandwidth($in_down,$in_up,$in_unit='')
 /** Constructor
 */
 {
  if(!is_numeric($in_down) || !is_numeric($in_up))
   exit("Error! Wrong arguments in 'Bandwidth' class constructor call!\n");
  $this->downstream=Bandwidth::to_from_bit($in_down,$in_unit,true);
  $this->upstream=Bandwidth::to_from_bit($in_up,$in_unit,true);
  if($this->downstream==0 || $this->upstream==0)
   exit("Error! Bandwidth must be greater than 0!\n");
 }

 function Get_Bandwidth_Divided($in_number)
 /** Returns a new object of this class. The object is a result of a bandwidth division by a given
     (integer or floating point) number.
 */
 {
  if($in_number==0)
   exit("Error! Bandwidth divisor must be different than 0!\n");
  return new Bandwidth((int)($this->downstream/$in_number),(int)($this->upstream/$in_number),'bit');
 }
 
 function from_String($in_string)
 /** Creates and returns a new object of this class from its textual representation. On error
     (invalid textual representation format) returns an error.
 */
 {
  $fields=explode('/',trim($in_string));
  if(count($fields)!==2)
   Bandwidth::Wrong_String_Error($in_string);
  $regs=array();
  if(ereg('^([0-9.]*)([[:alpha:]]*)$',$fields[1],$regs)===false)
   Bandwidth::Wrong_String_Error($in_string);
  return new Bandwidth(trim($fields[0]),trim($regs[1]),trim($regs[2]));
 }

 function Get_Intersection($in_bandwidth)
 /** Computes a bandwidth which is an intersection of this object and a bandwidth given as an
     argument. Returns a new object of this class.
 */
 {
  $up=$this->upstream<$in_bandwidth->upstream?$this->upstream:$in_bandwidth->upstream;
  $down=$this->downstream<$in_bandwidth->downstream?$this->downstream:$in_bandwidth->downstream;
  return new Bandwidth($down,$up,'bit');
 }

 function to_String($in_unit='')
 /** Returns a text string which is a textual representation of this object bandwidth expressed
     as a multitude of data rate unit given as an argument.
 */
 {
  if($in_unit=='')
   $in_unit='bps';
  $down=$this->to_from_bit($this->downstream,$in_unit);
  $up=$this->to_from_bit($this->upstream,$in_unit);
  if($down==(int)$down)
  {
   $down=(int)$down;
   $down_string=sprintf("%d",$down);
  }
  else
   $down_string=sprintf("%f",$down);
  if($up==(int)$up)
  {
   $up=(int)$up;
   $up_string=sprintf("%d",$up);
  }
  else
   $up_string=sprintf("%f",$up);
  
  return sprintf("%s/%s%s"
                 ,$down_string
	         ,$up_string
	         ,$in_unit);
 }

 function Downstream_to_String($in_unit='')
 /** Returns textual representation of downstream bandwidth stored in this object. The bandwidth
     is expressed as a multitude of data rate unit given as an argument.
 */
 {
  if($in_unit=='')
   $in_unit='bps';
  return sprintf("%f%s"
	         ,$this->to_from_bit($this->downstream,$in_unit)
	         ,$in_unit);
 }

 function Upstream_to_String($in_unit='')
 /** Returns textual representation of upstream bandwidth stored in this object. The bandwidth is
     expressed as a multitude of data rate unit given as an argument.
 */
 {
  if($in_unit=='')
   $in_unit='bps';
  return sprintf("%f%s"
	         ,$this->to_from_bit($this->upstream,$in_unit)
	         ,$in_unit);
 }

 function to_from_bit($in_data_rate,$in_unit,$in_to=false)
 /** Converts a given value, expressed in a given data rate unit, to a value being a multitude of
     bits or vice versa.
 */
 {
  $i=1;
  switch($in_unit)
  {
   case 'mbps': //Megabytes per second
    $i*=1024;
   case 'kbps': //Kilobytes per second
    $i*=1024;
   case 'bps': //bytes per second
   case '': //bytes per second
    $i*=8;
    break;
   case 'mbit': //Megabits per second
    $i*=1000;
   case 'kbit': //Kilobits per second
    $i*=1000;
   case 'bit': //bits per second
    break;
   default:
    exit("Error! Unknown data rate unit '{$in_unit}'!\n");
  }
  if($in_to)
   return $in_data_rate*$i;
  else
   return $in_data_rate/$i;
 }

 function Wrong_String_Error($in_string)
 /** Outputs an error message and terminates the flow.
 */
 {
  exit("Error! '{$in_string}' is not a valid 'Bandwidth' class object textual representation!\n");
 }
}
?>
