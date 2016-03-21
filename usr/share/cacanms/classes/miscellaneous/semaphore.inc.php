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

class Semaphore
{
 var $filename;
 var $IPC_key;
 var $max_acquire;
 var $semaphore_resource;

 function Semaphore($in_filename,$in_project_id,$in_max_acquire=1)
 {
  $this->filename=$in_filename;
  if(strlen($in_project_id)!==1)
   exit("Error! The 'project_id' parameter must be 1 character long string!\n");
  $this->max_acquire=$in_max_acquire;
  touch($this->filename);
  $this->IPC_key=ftok($this->filename,$in_project_id);
  if($this->IPC_key===-1)
   exit("Error! No access to file '{$this->filename}'!!!\n");
  $this->semaphore_resource=sem_get($this->IPC_key,$this->max_acquire,0666,0);
  if($this->semaphore_resource===false)
   exit("Error! Could not get the semaphore!!!\n");
 }

 function Acquire()
 {
  return sem_acquire($this->semaphore_resource); 
 }

 function Release()
 {
  return sem_release($this->semaphore_resource);
 }

 function Destroy()
 {
  return sem_remove($this->semaphore_resource);
 }
}
?>
