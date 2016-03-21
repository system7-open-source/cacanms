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

require_once "command.inc.php";

class Session
{
 var $commands;
 var $help_command;

 function Session($in_help_command)
 {
  $this->commands=array();
  $this->Add_Command($in_help_command);
  $this->help_command=$in_help_command;
 }

 function Add_Command($in_command)
 {
  if(!is_a($in_command,'Command'))
   exit("Error! '{$in_command}' is not an instance of class Command!");
  if($this->Find_Command($in_command->name)!==null)
   exit("Error! '{$in_command->name}' command already added!\n");
  $this->commands[$in_command->name]=$in_command;
 }

 function Run($in_command_string)
 {
   $command=$this->Find_Command($in_command_string);
   if(!is_a($command,'Command'))
   {
    $this->Unknown_Command_Message($in_command_string);
    return null;
   }
   else
   {
    $command->Execute();
    if($command===$this->help_command)
     $this->Display_Help();
    return $command;
   }
 }

 function Display_Help()
 {
  echo "\n";
  foreach($this->commands as $command_string => $command)
  {
   printf("\t%-20s - %s\n","'".$command_string."'",$command->action->Get_Description());
  }
  echo "\n";
 }

 function Unknown_Command_Message($in_command_string)
 {
  echo "Unknown command '{$in_command_string}'!\n";	 
  echo "Use '{$this->help_command->name}' command for a list of known commands.\n";
 }

 function Find_Command($in_command_string)
 {
  $elements=split('[[:space:]]+',$in_command_string);

  $keys=array_keys($this->commands);
  foreach($keys as $key)
  {
   $key_elements=split('[[:space:]]+',$key);
   if($elements===$key_elements)
    return $this->commands[$key];
  }
  return null;
 }
}
?>
