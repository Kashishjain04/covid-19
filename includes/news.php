<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://newsapi.org/v2/top-headlines?q=covid&apiKey=4af9a74626774997bde9703717af2639&country=in",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
  ),
));

$response = curl_exec($curl);
$ndata = json_decode($response, true);
curl_close($curl);
$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://newsapi.org/v2/top-headlines?q=&apiKey=0d42d55acd7f4923aac9a7d8d9c432fb&country=in",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
  ),
));

$response1 = curl_exec($curl);
$ndata1 = json_decode($response1, true);
curl_close($curl);
?>
