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

require_once 'contract.inc.php';

class Contracts_Database
{
 var $contracts;

 function Contracts_Database($in_string='')
 {
  $this->contracts=array();
  $contracts_strings=explode("\n",$in_string);
  foreach($contracts_strings as $contract_string)
   if(strlen($contract_string))
   {
    $contract=Contract::from_String($contract_string);
    $this->Add_Contract($contract);
   }  
 }

 function Add_Contract($in_contract)
 {
  if(!is_a($in_contract,'Contract'))
   $in_contract=Contract::from_String($in_contract);

  if($this->Find_Conflicting_Contracts($in_contract)!==null)
   exit("Error! Contract for '".$in_contract->hostname->to_String()."' host already exists!\n");
  else
   $this->contracts[$in_contract->hostname->to_String()]=$in_contract;
 }

 function Replace_Contract($in_contract)
 {
  if(!is_a($in_contract,'Contract'))
   $in_contract=Contract::from_String($in_contract);

  if(!array_key_exists($in_contract->hostname->to_String(),$this->contracts))
   exit("Error! Contract for '".$in_contract->hostname->to_String()."' host cannot be replaced because it does not exist!\n");
  else
   $this->contracts[$in_contract->hostname->to_String()]=$in_contract;
 }

 function Get_Contract($in_hostname)
 {
  if(array_key_exists($in_hostname,$this->contracts))
   return $this->contracts[$in_hostname];
  else
   return null;
 }
 
 function Find_Conflicting_Contracts($in_contract)
 {
  if(!is_a($in_contract,'Contract'))
   $in_contract=Contract::from_String($in_contract);

  foreach($this->contracts as $contract)
   if($contract->Match($in_contract))
    $conflicting[]=$contract;
  if(count($conflicting)>0)
   return $conflicting;
  else
   return null;
 }

 function Validate_Contracts_with_ILAs($in_ILAs_array)
 {
  foreach($this->contracts as $contract)
   $contract->Validate_with_ILAs($in_ILAs_array);
 }

 function Get_Counts_Array($in_ILAs_templates)
 {
  // prepare contracts counts array
  foreach($in_ILAs_templates as $template=>$array)
  {
   $contracts_counts['operative'][$array[0]][$template]=0;
   $contracts_counts['canceled'][$array[0]][$template]=0;
   $contracts_counts['suspended'][$array[0]][$template]=0;
  }
  
  // counting
  foreach($this->contracts as $contract)
   foreach($contract->ILAs_strings as $ILA_string)
   {
    $ILA_string_fields=explode(':',$ILA_string);
    $internet_link=$in_ILAs_templates[$ILA_string_fields[0]][0];

    if($contract->status === Contract_Status::Operative())
     $contracts_counts['operative'][$internet_link][$ILA_string_fields[0]]++;
    elseif($contract->status === Contract_Status::Canceled())
     $contracts_counts['canceled'][$internet_link][$ILA_string_fields[0]]++;
    elseif($contract->status === Contract_Status::Suspended())
     $contracts_counts['suspended'][$internet_link][$ILA_string_fields[0]]++;
   }
  return $contracts_counts;
 }

 function to_String()
 {
  foreach($this->contracts as $contract)
   $string=$string.$contract->to_String()."\n";
  return $string;
 }
}
?>
