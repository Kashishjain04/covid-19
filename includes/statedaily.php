<?php
date_default_timezone_set("Asia/Kolkata");
$date = date("d-M-y", strtotime("-1 day", strtotime(date("d-M-y"))));


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.covid19india.org/states_daily.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$data1 = json_decode($response, true);
curl_close($curl);


$starr = json_decode($response, true);
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