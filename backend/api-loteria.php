<?php

$url = "https://loteriascaixa-api.herokuapp.com/api/lotofacil/latest";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if(empty($response)){
    echo 'Erro ao fazer a requisição: ' . curl_error($curl);
    die;
}

$api = json_decode($response, true);

curl_close($curl);
