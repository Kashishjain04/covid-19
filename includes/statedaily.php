<?php
date_default_timezone_set("Asia/Kolkata");
$date = date("d-M-y", strtotime("-1 day", strtotime(date("d-M-y"))));
$st = file_get_contents('https://api.covid19india.org/states_daily.json');
$starr = json_decode($st, true);
$stdaily = $starr['states_daily'];
foreach($stdaily as $key=>$std){
  if($std['date'] == $date && $std['status']=="Confirmed")
  {
    $confdaily = $stdaily[$key]; 
    break;
}
}
foreach($stdaily as $key => $std){
  if($std['date']==$date && $std['status']=="Recovered"){
    $recdaily = $stdaily[$key];
  break;
}
}
foreach($stdaily as $key => $std){
  if($std['date']==$date && $std['status']=="Deceased"){
    $decdaily = $stdaily[$key];
    break;
  }
}

?>