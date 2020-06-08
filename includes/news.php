<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.smartable.ai/coronavirus/news/IN",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Subscription-Key: 3009d4ccc29e4808af1ccc25c69b4d5d"
  ),
));

$response = curl_exec($curl);
$ndata = json_decode($response, true);
curl_close($curl);
//echo $response;
?>
