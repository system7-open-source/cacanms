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

require_once 'internet_links.php';

require_once $classes.'/isp/qos_internet_link.inc.php';
require_once $classes."/networking/firewall/netfilter_chain.inc.php";

$marking_chain=new Netfilter_Chain($output_files['marking chain file'],'MARKING','mangle',null,$iptables);
$balancing_chain=new Netfilter_Chain($output_files['balancing chain file'],'BALANCING','mangle',null,$iptables);

echo "Preparing load-balancing firewall chain files...\n\n";
$marking_chain->Add_Rule('-j CONNMARK --restore-mark');

$balancing_chain->Add_Rule('-m state --state NEW -j MARKING');
$balancing_chain->Add_Rule('-j CONNMARK --restore-mark');

$total_weight=0;

$link_status=array();
$active=0;
foreach($internet_links as $internet_link)
{
 $link_status[$internet_link->name]=$internet_link->Is_Inactive($internet_link_status[$internet_link->name]);
 if($link_status[$internet_link->name])
  continue;
 else
 {
  $total_weight=$total_weight+$internet_link->weight;
  $active++;
 }
}
$packet=0;
foreach($internet_links as $internet_link)
{
 if($link_status[$internet_link->name])
  continue;
 $marking_chain->Add_Line('# for "'.$internet_link->name.'" link:');
 if($active<2)
 {
  $marking_chain->Add_Rule('-m connmark ! --mark 0 -j RETURN');
  $marking_chain->Add_Rule('-j CONNMARK --set-mark '.$internet_link->fwmark);

 }
 else
  for($i=0;$i<$internet_link->weight;$i++)
  {
   $marking_chain->Add_Rule('-m connmark ! --mark 0 -j RETURN');
   $marking_chain->Add_Rule('-m nth --counter 8 --every '.$total_weight
                            .' --packet '.$packet
  			    .' -j CONNMARK --set-mark '.$internet_link->fwmark);
   $packet++;
  }
}
echo " Preparation of load-balancing firewall chain files completed.\n\n";

unset($active,$link_status,$internet_link,$total_weight,$packet,$i);
?>
