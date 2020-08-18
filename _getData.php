<?php

$repos = array();
$url =  'https://api.github.com/search/repositories?q=language:php&sort=stars&order=desc';

// set the curl options...
$opts = array(CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
    CURLOPT_SSL_VERIFYPEER => FALSE,
    CURLOPT_SSL_VERIFYHOST =>  FALSE
    );

// execute the curl call and get the data..
$ch = curl_init($url);
curl_setopt_array($ch,  $opts);
$data = curl_exec($ch);
curl_close($ch);

$data = json_decode($data);

if(isset($data->items)) {
    $repos = $data->items;
}

echo json_encode(array('data' => $repos));

die(); // make sure we end...
