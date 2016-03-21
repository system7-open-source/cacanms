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

require_once 'netfilter_rules_file.inc.php';

class Netfilter_Chain extends Netfilter_Rules_File
{
 var $header;
 var $footer;

 function Netfilter_Chain($in_filename,$in_name,$in_table, $in_default,
                          $in_command='iptables')
 {
  parent::Netfilter_Rules_File($in_filename,$in_name,$in_table,$in_command);
  $this->header=$this->command.' -t '.$this->table.' -N '.$this->name."\n";
  if($in_default===null)
   $this->footer='';
  else
   $this->footer=$this->command.' -t '.$this->table.' -A '.$this->name.' -j '.$in_default."\n";
 }

 function Load($in_filename=null)
 {
  exit("Error! 'Load' method not implemented for Netfilter_Chain class!\n");
 }

 function to_String()
 {
  return sprintf("%s%s%s",$this->header,parent::to_String(),$this->footer);
 }
}
?>
