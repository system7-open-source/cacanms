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

require_once "file.inc.php";

class Text_File extends File
{
 var $comment='^[[:space:]]*#.*';
 var $remove_comments;

 function Text_File($in_filename,$in_remove_comments=true)
 {
  parent::File($in_filename);
  $this->remove_comments=$in_remove_comments;
 }

 function Comments_Removal_On($in_flag)
 {
  $this->remove_comments=$in_flag;
 }

 function Add_String($in_string)
 {
  $this->contents=$this->contents.$in_string;
 }

 function Add_Line($in_string)
 {
  $this->Add_String($in_string."\n");
 }

 function Load($in_filename=null)
 {
  parent::Open_for_Reading($in_filename);

  while (!feof($this->handle))
  {
   $line=fgets($this->handle);
   if($this->remove_comments)
   {
    $line=ereg_replace("^[[:space:]]*{$this->comment}$","",$line);
    $line=ereg_replace("{$this->comment}$","\n",$line);
   }
   $this->contents=$this->contents.$line;
  }
  parent::Close();
 }
 
 function Save($in_filename=null)
 {
  parent::Open_for_Writing($in_filename);
  fwrite($this->handle,$this->to_String());
  parent::Close();
 }

 function to_String()
 {
  return sprintf("%s",$this->contents);
 }
}
?>
