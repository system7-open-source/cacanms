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

require_once "resource_record.inc.php";
require_once "hostname.inc.php";
require_once $classes."/networking/ip.inc.php";

class A_Record extends Resource_Record
{
 function A_Record($in_name, $in_TTL, $in_class, $in_RDATA)
 {
  parent::Resource_Record($in_name, $in_TTL, $in_class, RR_Type::A(), $in_RDATA);

  if(!is_a($in_name,'Hostname'))
   $in_name=new Hostname($in_name);
  $this->name=$in_name;

  if(!is_a($in_RDATA,'IP'))
   $in_RDATA=new IP($in_RDATA);
  $this->RDATA=$in_RDATA;
 }
}
?>
