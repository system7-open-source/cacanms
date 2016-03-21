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
class RR_Type
{
/*
  A               1 a host address

  NS              2 an authoritative name server

  MD              3 a mail destination (Obsolete - use MX)

  MF              4 a mail forwarder (Obsolete - use MX)

  CNAME           5 the canonical name for an alias

  SOA             6 marks the start of a zone of authority

  MB              7 a mailbox domain name (EXPERIMENTAL)

  MG              8 a mail group member (EXPERIMENTAL)

  MR              9 a mail rename domain name (EXPERIMENTAL)

  NULL            10 a null RR (EXPERIMENTAL)

  WKS             11 a well known service description

  PTR             12 a domain name pointer

  HINFO           13 host information

  MINFO           14 mailbox or mail list information

  MX              15 mail exchange

  TXT             16 text strings
*/
 var $type;

 function RR_Type($in_type)
 {
  if(!is_a($in_type,'RR_Type'))
  {
   if(is_int($in_type))
   {
    if(1<=$in_type && $in_type<=16)
     $this->type=$in_type;
    else
     exit("Error! Unknown RR_Type value!\n");
   }
   elseif(is_string($in_type))
   {
    $this=new RR_Type(RR_Type::from_String($in_type)); 
   }
  }
  else
   $this=$in_type; 
 }
 
 function from_String($in_string)
 {
  $result="";
  switch($in_string)
  {
   case "A":
    $result=1;
    break;
   case "NS":
    $result=2;
    break;
   case "CNAME":
    $result=5;
    break;
   case "SOA":
    $result=6;
    break;
   case "PTR":
    $result=12;
    break;
   case "MX":
    $result=15;
    break;
   default:
    exit("Error! '{$in_string}' is not a valid Resource Record type!");
  }
  return new RR_Type($result);
 }

 function to_String()
 {
  $result="";
  switch($this->type)
  {
   case 1:
    $result="A";
    break;
   case 2:
    $result="NS";
    break;
   case 5:
    $result="CNAME";
    break;
   case 6:
    $result="SOA";
    break;
   case 12:
    $result="PTR";
    break;
   case 15:
    $result="MX";
    break;
  }
  return sprintf("%s",$result);
 }

 function A()
 {
  return new RR_Type(1);
 }

 function NS()
 {
  return new RR_Type(2);
 }

 function CNAME()
 {
  return new RR_Type(5);
 }

 function SOA()
 {
  return new RR_Type(6);
 }

 function PTR()
 {
  return new RR_Type(12);
 }

 function MX()
 {
  return new RR_Type(15);
 }
}
?>
