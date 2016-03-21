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

require_once "object.inc.php";

class File extends Object
{
 var $filename;
 var $contents='';
 var $handle=null;

 function File($in_filename)
 {
  $this->Set_Filename($in_filename);
 }

 function Set_Filename($in_filename)
 {
  $this->filename=$in_filename;
 }

 function Open_for_Reading($in_filename=null)
 {
  if($in_filename===null)
   $in_filename=$this->filename;
  if(!($this->handle=fopen($in_filename,'r')))
   File::No_Access_Error();
 }
 
 function Open_for_Writing($in_filename=null)
 {
  if($in_filename===null)
   $in_filename=$this->filename;
  if(!($this->handle=fopen($in_filename,'w')))
   File::No_Access_Error();
 }

 function Load($in_filename='')
 {
  if($in_filename=='')
   $in_filename=$this->filename;
  return $this->contents=file_get_contents($in_filename);
 }

 function Save($in_filename='')
 {
  if($in_filename=='')
   $in_filename=$this->filename;
  return file_put_contents($in_filename,$this->contents);
 }

 function Read($in_size)
 {
  if($this->handle===null)
   $this->Open_for_Reading();
  return fread($this->handle, $in_size);
 }

 function Write($in_buffer)
 {
  if($this->handle===null)
   $this->Open_for_Writing();
  fwrite($this->handle,$in_buffer);
 }

 function Close()
 {
  if($this->handle!==null)
  {  
   fclose($this->handle);
   $this->handle=null;
  }
 }

 function Is_Readable($in_filename=null)
 {
  if($in_filename===null)
   $in_filename=$this->filename;
  return is_readable($in_filename);
 }

 function Get_Last_Modification_Time($in_filename=null)
 {
  if($in_filename===null)
     $in_filename=$this->filename;
  return filemtime($in_filename);
 }
 
 function No_Access_Error()
 {
  exit("Error! No access to file '{$this->filename}'!!!\n");
 }
}
?>
