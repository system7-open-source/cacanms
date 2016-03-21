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

require_once 'global_variables.inc.php';
require_once $classes."/miscellaneous/text_file.inc.php";
require_once $classes."/isp/contract.inc.php";
require_once $classes."/isp/contracts_database.inc.php";

$GLOBALS['contracts_file']=&$contracts_file;
$GLOBALS['contracts']=&$contracts;
$GLOBALS['contracts_counter']=&$contracts_counter;

// Loading contracts
echo "Loading contracts.\n";
$contracts_file=new Text_File($files['contracts']);
$contracts_file->Load();
echo "Contracts loaded successfully.\n\n";
echo "Creating Contract objects database.\n";
$contracts=new Contracts_Database($contracts_file->contents);
echo "Contract objects database created successfully.\n\n";
echo "Validating Contract objects database.\n";
$contracts->Validate_Contracts_with_ILAs($internet_link_access_templates);
echo "Contract objects database validated.\n\n";
$contracts_counter=$contracts->Get_Counts_Array($internet_link_access_templates);
?>
