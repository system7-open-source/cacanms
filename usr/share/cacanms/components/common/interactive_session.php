<?php
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

require_once $components.'/actions.php';

require_once $classes.'/session/interactive_session.inc.php';
require_once $classes.'/session/command.inc.php';
require_once $classes.'/session/help_command.inc.php';
require_once $classes.'/session/exit_command.inc.php';

$session=new Interactive_Session('Enter CACANMS command: '
                        ,new Help_Command('\n'.$version
			 .'\nCopyright (C) Tomasz J. Kotarba (tomasz@kotarba.net), 2004\n\nKnown commands:\n')
			,new Exit_Command());

unset($actions['edit']);
unset($actions['interactive']);
require_once 'commands.php';
?>
