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
require_once 'resource_record.inc.php';

class Zone_Records_File extends Text_File
{
 var $comment="[[:space:]]*;.*";
 var $class=null;

 function Zone_Records_File($in_filename)
 {
  parent::Text_File($in_filename, false);
 }

 function Add_RR($in_rr)
 {
  if(!is_a($in_rr,'Resource_Record'))
   exit("Error! Argument 'in_rr' is not an instance of Resource_Record class!"); 
  if($this->class===null)
   $this->class=$in_rr->class;
  if($this->class!==$in_rr->class)
   exit("Error! 'in_rr' is a record of class '".$in_rr->class->to_String."' while this is a class '"
        .$this->class->to_String()."' file. All RRs in the file should have the same class.");
  $this->contents=$this->contents.$in_rr->to_String()."\n";
 }
}
?>
