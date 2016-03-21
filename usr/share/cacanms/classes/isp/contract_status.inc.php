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
class Contract_Status
{
 var $status;

 function Contract_Status($in_status)
 {
  if(!is_a($in_status,'Contract_Status'))
  {
   if(is_int($in_status))
   {
    if(1<=$in_status && $in_status<=3)
     $this->status=$in_status;
    else
     exit("Error! Unknown status value!\n");
   }
   elseif(is_string($in_status))
   {
    $this=new Contract_Status(Contract_Status::from_String($in_status)); 
   }
  }
  else
   $this=$in_status;
 }
 
 function to_String()
 {
  $result="";
  switch($this->status)
  {
   case 1:
    $result="OPERATIVE";
    break;
   case 2:
    $result="SUSPENDED";
    break;
   case 3:
    $result="CANCELED";
    break;
  }
  return sprintf("%s",$result);
 }

 function from_String($in_string)
 {
  $result=0;
  $in_string=strtoupper($in_string);
  switch(strtoupper($in_string))
  {
   case "O":
   case "OPERATIVE":
    $result=1;
    break;
   case "S":
   case "SUSPENDED":
    $result=2;
    break;
   case "C":
   case "CANCELED":
    $result=3;
    break;
   default:
    exit("Error! '{$in_string}' is not a valid string representation of Contract_Status class object!");
  }
  return new Contract_Status($result);
 }

 function OPERATIVE()
 {
  return new Contract_Status(1);
 }

 function SUSPENDED()
 {
  return new Contract_Status(2);
 }

 function CANCELED()
 {
  return new Contract_Status(3);
 }
}
?>
