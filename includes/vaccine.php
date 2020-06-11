<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://api.covid19india.org/data.json",
  CURLOPT_URL => "https://extraction.import.io/query/extractor/42710749-0d24-4083-8ff5-164b8dd0f2f6?_apikey=5be618cb9ad44580b9935888dc06dd5df0a3a0062431cfd8accfbf80571dbc62c92403db7233d93c7e23b35ff963678ae5398661e343a939d4b1dd2ef858dfe55a86b33632be2b1b6d7197a3c83ad23d&url=https%3A%2F%2Fwww.precisionvaccinations.com%2Fvaccine-treats%2Fcoronavirus",
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


//echo $response;

?>