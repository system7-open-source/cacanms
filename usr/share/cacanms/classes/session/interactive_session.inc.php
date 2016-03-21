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
require_once "session.inc.php";

class Interactive_Session extends Session
{
 var $prompt;
 var $terminating_command;

 function Interactive_Session($in_prompt,$in_help_command,$in_terminating_command)
 {
  parent::Session($in_help_command);
  $this->prompt=$in_prompt;
  $this->Add_Command($in_terminating_command);
  $this->terminating_command=$in_terminating_command;
 }

 function Run()
 {
  do
  {
   $this->Display_Prompt();
   $command_string=$this->Get_Command_String();
   $command=parent::Run($command_string);
  } while($command!==$this->terminating_command);
 }

 function Display_Prompt()
 {
  echo $this->prompt;
 }

 function Get_Command_String()
 {
  return trim(fgets(STDIN));
 }
}
?>
