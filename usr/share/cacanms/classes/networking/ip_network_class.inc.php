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
class IP_Network_Class
{
 var $class;

 function IP_Network_Class($in_class)
 {
  $this->class=$in_class; 
 }
 
 function to_String()
 {
  $result="";
  switch($this->class)
  {
   case 0:
    $result="A";
    break;
   case 1:
    $result="B";
    break;
   case 2:
    $result="C";
    break;
   case 3:
    $result="D";
    break;
   case 4:
    $result="E";
    break;
  }
  return sprintf("%s",$result);
 }

 function A()
 {
  return new IP_Network_Class(0);
 }

 function B()
 {
  return new IP_Network_Class(1);
 }

 function C()
 {
  return new IP_Network_Class(2);
 }

 function D()
 {
  return new IP_Network_Class(3);
 }

 function E()
 {
  return new IP_Network_Class(4);
 }
}
?>
