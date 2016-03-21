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

require_once $classes.'/networking/dns/hostname.inc.php';
require_once $classes.'/miscellaneous/date.inc.php';
require_once 'contract_status.inc.php';
require_once 'internet_access_flags.inc.php';

class Contract
/**
Responsibilities
- - stores information about ISP contract (i.e. access rights granted to a particular host)
- - understands contract textual representation
- - can compare contracts and validate them against Internet_Link_Access types known
    to the system
*/
{
 var $hostname; // Stores a hostname of a host the contract applies to.
 var $status; // Stores a status of the contract.
 var $internet_access_flags; // Stores Internet_Access_Flags object.
 var $ILAs_strings; // Stores textual strings for each Internet Link Acces type the host has been granted the access to.
 var $date; // Stores a Date class object representing a date the contract becomes effective (or expires).

 function Contract($in_hostname,$in_status,$in_internet_access_flags,$in_ILAs_strings,$in_date)
 /** Constructor
 */
 {
  if(!is_a($in_hostname,'Hostname'))
   $in_hostname=new Hostname($in_hostname);
  $this->hostname=$in_hostname;

  if(!is_a($in_status,'Contract_Status'))
   $in_status=new Contract_Status($in_status);
  $this->status=$in_status;

  if(!is_a($in_internet_access_flags,'Internet_Access_Flags'))
   $in_internet_access_flags=new Internet_Access_Flags($in_internet_access_flags);
  $this->internet_access_flags=$in_internet_access_flags;

  if(!is_a($in_date,'Date'))
   $in_date=new Date($in_date);
  $this->date=$in_date;

  if(is_array($in_ILAs_strings))
   foreach($in_ILAs_strings as $in_ILA_string)
    if(is_string($in_ILA_string))
     $this->ILAs_strings[]=$in_ILA_string;
    else
     exit("Error! '{$in_ILA_string}' is not a valid Internet Link Access name!\n");
  else
   if(is_string($in_ILAs_string))
    $this->ILAs_strings[]=$in_ILAs_string;
   else
    exit("Error! '{$in_ILAs_string}' is not a valid Internet Link Access name!\n");
  $this->Validate();
 }

 function from_String($in_string)
 /** Creates and returns a new object of this class from its textual representation. On error
     (invalid textual representation format) returns an error.
 */
 {
  $in_string=trim($in_string);
  $fields=split('[[:space:]]+',$in_string);

  $ILAs_strings=explode(',',$fields[3]);

  return new Contract(new Hostname($fields[0])
                      ,new Contract_Status($fields[1])
		      ,new Internet_Access_Flags($fields[2])
		      ,$ILAs_strings
		      ,new Date($fields[4]));
 }
  
 function to_String()
 /** Returns a text string which is a textual representation of the object.
 */
 {
  $ILAs_count=count($this->ILAs_strings);
  $ILAs_string=$this->ILAs_strings[0];
  for($i=1;$i<$ILAs_count;$i++)
   $ILAs_string=$ILAs_string.','.$this->ILAs_strings[$i];
  return sprintf("%-24s %-9s %-3s %40s\t%s"
                 ,$this->hostname->to_String()
	         ,$this->status->to_String()
	         ,$this->internet_access_flags->to_String()
	         ,$ILAs_string
	         ,$this->date->to_String()
		 );
 }

 function Match($in_contract)
 /** Matches a given object against this object and returns true if both objects store the same hostnames.
     Otherwise returns false.
 */
 {
  if($in_contract->hostname->to_String()==$this->hostname->to_String())
   return true;
  else
   return false;
 }
 
 function Validate()
 /** Checks if attribute ILAs_strings is valid (i.e. there are no equal strings).
 */
 {
  $size=count($this->ILAs_strings);
  for($i=0;$i<$size;$i++)
   for($j=$i+1;$j<$size;$j++)
    if($this->ILAs_strings[$i]==$this->ILAs_strings[$j])
     exit("Error! '".$this->hostname->to_String()."' contract has some identical ILAs strings!\n"); 
 }
 
 function Validate_with_ILAs($in_ILAs_array)
 /** Checks if all strings contained in ILAs_strings attribute are refering to Internet link access
     templates existing in an array given as an argument.
 */
 {
  foreach($this->ILAs_strings as $ILA_string)
   $ILA_string_fields=explode(':',$ILA_string);
    if(!array_key_exists($ILA_string_fields[0],$in_ILAs_array))
     exit("Error! Internet link access template '{$ILA_string_fields[0]}' not defined!\n");
 }
}
?>
