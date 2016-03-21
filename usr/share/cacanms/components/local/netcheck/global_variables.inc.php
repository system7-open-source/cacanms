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

// CACANMS
$subsystem='local/netcheck';
require_once '../../etc/cacanms/'.$subsystem.'/config.inc.php';

$version=file_get_contents('../share/cacanms/components/'.$subsystem.'/version').'; '.file_get_contents('../share/cacanms/classes/version');
$common_components=realpath('../share/cacanms/components/common');
$components=realpath('../share/cacanms/components/'.$subsystem);
$classes=realpath('../share/cacanms/classes');

// GLOBALS
$GLOBALS['version']=$version;
$GLOBALS['components']=$components;
$GLOBALS['classes']=$classes;
$GLOBALS['files']=$files;
$GLOBALS['arping_path']=$arping_path;
?>
