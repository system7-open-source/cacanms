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

require_once $classes.'/miscellaneous/text_file.inc.php';
require_once $classes.'/networking/host.inc.php';
require_once $classes.'/networking/dns/fqdn.inc.php';

class Netfilter_Rules_File extends Text_File
{
 var $name;
 var $table;
 var $command;

 function Netfilter_Rules_File($in_filename,$in_name,$in_table, $in_command='iptables')
 {
  parent::Text_File($in_filename, false);
  $this->name=$in_name;
  $this->table=$in_table;
  $this->command=$in_command;
 }

 function Load($in_filename=null)
 {
  exit("Error! 'Load' method not implemented for Netfilter_Rules_File class!\n");
 }

 function to_String()
 {
  return sprintf("%s",$this->contents);
 }
 
 function Add_Rule($in_rule)
 {
  $this->contents=$this->contents.$this->command.' -t '.$this->table
    .' -A '.$this->name.' '.$in_rule."\n";
 }
 
 function Add_FQDN($in_fqdn,$in_target,$in_extended_options='')
 {
  if(!is_a($in_fqdn,'FQDN'))
   $in_fqdn=FQDN::from_String($in_fqdn);
  $this->contents=$this->contents.$this->command.' -t '.$this->table
    .' -A '.$this->name.' -s '.$in_fqdn->to_String().' '.$in_extended_options.' -j '.$in_target."\n";
 }
 
 function Add_IP($in_ip,$in_target,$in_extended_options='')
 {
  if(!is_a($in_ip,'IP'))
   $in_ip=new IP($in_ip);
  $this->contents=$this->contents.$this->command.' -t '.$this->table
    .' -A '.$this->name.' -s '.$in_ip->to_String().'/32 '.$in_extended_options.' -j '.$in_target."\n";
 }
 
 function Add_Host($in_host,$in_target,$in_extended_options='')
 {
  if(!is_a($in_host,'Host'))
   $in_host=Host::from_String($in_host);
  foreach($in_host->MAC as $hwaddr)
   $this->contents=$this->contents.$this->command.' -t '.$this->table
     .' -A '.$this->name.' -m mac -s '.$in_host->IP->to_String().'/32 --mac-source '
     .$hwaddr->to_String().' '.$in_extended_options.' -j '.$in_target."\n";
 }
}
?>
