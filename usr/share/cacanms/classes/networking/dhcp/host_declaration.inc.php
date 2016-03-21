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

require_once "option.inc.php";
require_once $classes."/networking/host.inc.php";
require_once $classes."/networking/dns/hostname.inc.php";
require_once $classes."/networking/dns/fqdn.inc.php";
require_once $classes."/networking/hardware_address.inc.php";
require_once $classes."/networking/ip.inc.php";

class Host_Declaration
{
 var $name;
 var $hwaddr;
 var $address;
 var $options;

 function Host_Declaration($in_name, $in_hwaddr, $in_address, $in_options=null)
 {
  if(!is_a($in_name,'Hostname'))
   $in_name=new Hostname($in_name);
  $this->name=$in_name;

  if(!is_a($in_hwaddr,'Hardware_Address'))
   $in_RDATA=new Hardware_Address($in_hwaddr);
  $this->hwaddr=$in_hwaddr;

  if(!is_a($in_address,'IP') && !is_a($in_address,'Hostname') && !is_a($in_address,'FQDN'))
   exit("Error! Wrong 'fixed-address' DHCP parameter!\n");
  else
   $this->address=$in_address;

  $this->options=array();
  if(!is_a($in_options,'Option'))
  {
   if($in_options!==null)
   {
    if(is_array($in_options))
    {
     foreach($in_options as $option)
      if(!is_a($option,'Option'))
       exit("Error! Invalid DHCP option!\n");
     $this->options=$in_options;
    }
    else
     exit("Error! The object is not a valid DHCP option!\n");
   }
  }
  else
   $this->options[]=$in_options;
 }

 function to_String()
 {
  $options="";
  foreach($this->options as $option)
   $options=$options.$option->to_String();
  return sprintf("host %-24s { hardware ethernet %s; fixed-address %s; %s }\n"
                 ,$this->name->to_String()
		 ,$this->hwaddr->to_String()
		 ,$this->address->to_String()
		 ,$options);
 }
}
?>
