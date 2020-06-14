<?php

$curl = curl_init();

curl_setopt_array($curl, array(  
  CURLOPT_URL => "https://newsapi.org/v2/top-headlines?q=vaccine&apiKey=64127cf643634d0c98de3f96c0935d6d",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$vdata = json_decode($response, true);
curl_close($curl);

?>