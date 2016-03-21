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
require_once $classes."/miscellaneous/semaphore.inc.php";

// Semaphore
$cacanms_semaphore=new Semaphore($cacanms_semaphore_file,'r');
echo "Awaiting clearance...\n";
$access_granted=$cacanms_semaphore->Acquire();
echo "Clearance granted.\n";

$argv_copy=$argv;
array_shift($argv_copy);
$arguments=implode(' ',$argv_copy);
switch($arguments)
{
 case 'interactive':
  require 'interactive_session.php';
  $session->Run();
  break;

 default:
  require 'session.php';
  $session->Run($arguments);
  break;
}
if($access_granted)
{
 $cacanms_semaphore->Release();
}
?>