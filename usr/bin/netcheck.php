#!/usr/bin/php4 -q
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
chdir(dirname($_SERVER['argv'][0]));
require '../share/cacanms/components/local/netcheck/global_variables.inc.php';
require_once $common_components."/network_loader.php";
require_once $classes."/networking/arping_presence_checker.inc.php";

$arguments=$argv;
array_shift($arguments);

$verbose=0;
$presence_log=false;
$all=false;
switch ($arguments[0])
{
 case '-v':
  $verbose=1;
  break;
 case '-vv':
  $verbose=2;
  break;
 case '-vvv':
  $verbose=3;
  break;
 case '-all':
  $verbose=2;
  $all=true;
 case '-log':
  $presence_log=true;
  break;
}
if($verbose || $presence_log || $all)
 array_shift($arguments);

$date=date("Y-m-d\TH:i:s");
  

// building regular expression (pattern)
$size=count($arguments);
if($size>0)
{
 $pattern='(^'.$arguments[0].'$)';
 for($i=1;$i<$size;$i++)
  $pattern=$pattern.'|(^'.$arguments[$i].'$)';
 unset($i);
}
else
 $pattern='.*';
unset($size);

// getting relevant hosts
$hosts=$local_network->Find_Hosts($pattern,'location');
unset($pattern);
$size=count($hosts);
if($size<1)
 exit("No matching hosts found.\n");

$active_hosts=array();

$presence_checker=new Arping_Presence_Checker($arping_path);

$counter=0;

// checking hosts and building results array
$active_hosts_number=0;
foreach($hosts as $host)
{
 $counter++;
 $locations[$host->location]['total']++;
 $presence_checker=$host->Is_Present($presence_checker);
 if($presence_checker->Is_Present())
 {
  $locations[$host->location]['active']++;
  $active_hosts[$host->location][]=$host->hostname->to_String();
  $active_hosts_number++;
 }
 elseif(!is_int($locations[$host->location]['active']))
  $locations[$host->location]['active']=0;
 if($verbose===1 || $verbose===3)
  printf("\r%3.3f %% of hosts checked.      ",$counter/$size*100);
}
echo "\n";

// sort arrays by location
ksort($active_hosts);
ksort($locations);

if(!$presence_log || $all)
 // calculate rates and display results
 {
  echo   "\nActive hosts : ".$active_hosts_number."\n";
  foreach($locations as $location=>$results)
  {
   $locations[$location]['rate']=sprintf("%3.3f %%",$results['active']/$results['total']*100);
   printf("\nlocation : %s\n active  :%3d\n total   :%3d\n rate    : %3.3f %%\n",$location,$results['active'],$results['total'],$locations[$location]['rate']);
   if($verbose>1 && $results['active']>0)
   {
    echo " active hosts:\n";
    foreach((array)$active_hosts[$location] as $host)
     printf("              %s\n",$host);
   }
  }
  echo "\nReport created: ".$date."\n";
 }
if($presence_log || $all)
 foreach($active_hosts as $tmp)
  foreach($tmp as $host)
  {
   $logfile=$presence_logfiles_directory.'/'.$host;
   system("echo '{$date}' >>{$logfile}");
  }
unset($size,$presence_checker,$counter);
?>
