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
require_once $classes.'/isp/qos_internet_link.inc.php';

$GLOBALS['guaranteed_bandwidths']=&$guaranteed_bandwidths;
$GLOBALS['internet_links']=&$internet_links;

echo "Loading internet links.\n";
foreach($internet_links_strings as $key=>$internet_link_string)
 $internet_links[$key]=QoS_Internet_Link::from_String($internet_link_string);
unset($key,$internet_link_string);
echo "Internet links loaded successfully.\n\n";

require_once 'contracts.php';

echo "Computing guaranteed bandwidth for each internet link.\n";

foreach($internet_links as $internet_link)
{
 $total=0;
 foreach($contracts_counter['operative'][$internet_link->name] as $count)
  $total=$total+$count;
 $total=$total*$average_hosts_activity_rate;
 $total=$total<1?1:$total;
 $guaranteed_bandwidths[$internet_link->name]=$internet_link->bandwidth->Get_Bandwidth_Divided($total);
}
echo "Guaranteed bandwidth for each internet link computed.\n\n";

unset($internet_link,$total,$count);
?>
