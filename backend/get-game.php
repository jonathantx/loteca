<?php

require_once '../app/db/connection.php';
require_once '../app/functions.php';

header('Content-Type: application/json');

$sql = "SELECT id FROM jogos ORDER BY id ASC";

$query = $conn->query($sql);

$jogos = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($jogos as $key => $jogo) {

    $numbers = [];

    $sql = "SELECT numero FROM jogos_numeros WHERE jogo_id = $jogo->id ORDER BY numero ASC";

    $query = $conn->query($sql);

    $numeros = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($numeros as $k => $num) {
        
        $numbers[] = $num->numero;
        
    }

    $jogos[$key] = [
        'id_jogo'  => $jogo->id,
        'numerais' => $numbers,
    ];
}

response([
    'status' => true,
    'data' => $jogos
]);