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
require_once $classes."/networking/ip.inc.php";
require_once $classes."/networking/dns/fqdn.inc.php";

class Routers_Option extends Option
{
 var $name='routers';
 
 function Routers_Option($in_data)
 {
  Routers_Option::Validate($in_data);

  $this->data=$in_data;
 }

 function Validate($in_data)
 {
  parent::Validate($this->name,$in_data);
  if(is_array($in_data))
   foreach($in_data as $router)
    if(!is_a($router,'IP') && !is_a($router,'FQDN'))
     Routers_Option::Invalid_Option_Data_Error($router);
  else
   if(!is_a($in_data,'IP') && !is_a($in_data,'FQDN'))
    Routers_Option::Invalid_Option_Data_Error($in_data);
 }
 
 function Invalid_Option_Data_Error($in_data)
 {
  if(is_object($in_data))
   $in_data=$in_data->to_String();
  exit("Error! '{$in_data}' is not a valid router address!\n"); 
 }
}
?>
