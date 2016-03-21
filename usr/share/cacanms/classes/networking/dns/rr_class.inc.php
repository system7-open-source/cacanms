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
class RR_Class
{
/*
  IN              1 the Internet

  CS              2 the CSNET class (Obsolete - used only for examples in some obsolete RFCs)

  CH              3 the CHAOS class

  HS              4 Hesiod [Dyer 87]
                    S. Dyer, F. Hsu, "Hesiod", Project Athena Technical Plan - Name Service, April 1987, version 1.9.
                    Describes the fundamentals of the Hesiod name service.
*/
 var $class;

 function RR_Class($in_class)
 {
  if(!is_a($in_class,'RR_Class'))
  {
   if(is_int($in_class))
   {
    if(1<=$in_class && $in_class<=4)
     $this->class=$in_class;
    else
     exit("Error! Unknown RR_Class value!\n");
   }
   elseif(is_string($in_class))
   {
    $this=new RR_Class(RR_Class::from_String($in_class)); 
   }
  }
  else
   $this=$in_class;
 }
 
 function to_String()
 {
  $result="";
  switch($this->class)
  {
   case 1:
    $result="IN";
    break;
   case 2:
    $result="CS";
    break;
   case 3:
    $result="CH";
    break;
   case 4:
    $result="HS";
    break;
  }
  return sprintf("%s",$result);
 }

 function from_String($in_string)
 {
  $result=0;
  $in_string=strtoupper($in_string);
  switch($in_string)
  {
   case "IN":
    $result=1;
    break;
   case "CS":
    $result=2;
    break;
   case "CH":
    $result=3;
    break;
   case "HS":
    $result=4;
    break;
   default:
    exit("Error! '{$in_string}' is not a valid string representation of any Resource Record class!");
  }
  return new RR_Class($result);
 }

 function IN()
 {
  return new RR_Class(1);
 }

 function CS()
 {
  return new RR_Class(2);
 }

 function CH()
 {
  return new RR_Class(3);
 }

 function HS()
 {
  return new RR_Class(4);
 }
}
?>
