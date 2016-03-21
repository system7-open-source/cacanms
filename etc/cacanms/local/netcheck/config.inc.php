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
$presence_logfiles_directory=realpath('../../var/log/presence'); // reasonable default
$arping_path='/usr/sbin/arping';
// Set $files['local network file'] to:
//  - if you are going to use netcheck on a system hosting CACANMS for Primary Local Server:
//       realpath('../../var/lib/cacanms/local/primary').'/local_network'
//
//  - if you are going to use netcheck on a system hosting CACANMS for Secondary Local Server
//       realpath('../../var/lib/cacanms/local/secondary').'/local_network'
//
//  - if you are going to use netcheck on a system hosting CACANMS for Internet Server
//       realpath('../../var/lib/cacanms/internet').'/local_network'
//
// OR use some other value if you know what you are doing
//
$files['local network file']=realpath('../../var/lib/cacanms/local/primary').'/local_network'; // default for primary local server
?>