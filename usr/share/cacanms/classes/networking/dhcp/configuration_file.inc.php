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
require_once 'host_declaration.inc.php';

class Configuration_File extends Text_File
{
 var $header;
 var $footer;

 function Configuration_File($in_filename,$in_header,$in_footer="\n}\n")
 {
  parent::Text_File($in_filename, false);
  $this->header=$in_header;
  $this->footer=$in_footer;
 }

 function Load($in_filename=null)
 {
  exit("Error! 'Load' method not implemented for DHCP Configuration_File class!\n");
 }

 function to_String()
 {
  return sprintf("%s%s%s",$this->header,$this->contents,$this->footer);
 }
 
 function Add_Host_Declaration($in_host_declaration)
 {
  if(!is_a($in_host_declaration,'Host_Declaration'))
   exit("Error! Argument 'in_host_declaration' is not an instance of Host_Declaration class!"); 
  $this->contents=$this->contents.$in_host_declaration->to_String();
 }
}
?>
