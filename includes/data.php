<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://api.covid19india.org/data.json",
  CURLOPT_URL => "https://api.covid19india.org/v3/data.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$data = json_decode($response, true);
arsort($data);
foreach($data as $state){
  krsort($state['districts']);
}
curl_close($curl);

$curl = curl_init();
curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://api.covid19india.org/data.json",
  CURLOPT_URL => "https://api.covid19india.org/v3/timeseries.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$timeseries = json_decode($response, true);
curl_close($curl);

?>