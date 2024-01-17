<?php
header('Content-Type: application/json');

require_once '../app/db/connection.php';
require_once '../app/functions.php';
require_once './api-loteria.php';

$sql = "SELECT id FROM jogos ORDER BY id ASC";

$query = $conn->query($sql);

$jogos = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($jogos as $key => $jogo) {

    $numbers = [];

    $sql = "SELECT numero, selected FROM jogos_numeros WHERE jogo_id = $jogo->id ORDER BY numero ASC";

    $query = $conn->query($sql);

    $numeros = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($numeros as $k => $num) {

        $selected = $num->selected == 1 ? true : false;

        $numbers[] = (Object) [
            'numero' => $num->numero,
            'selected' => $selected,
            'premiado' => false,
        ];

        
        foreach ($api['dezenas'] as $premiado) {

            $premiado = (Int) $premiado;
            
            if($premiado == $numbers[$k]->numero){
                $numbers[$k]->premiado = true;
            }
        }
        
    }

    $jogos[$key] = [
        'id_jogo'  => $jogo->id,
        'concurso' => $api['concurso'],
        'data' => $api['data'],
        'numeros' => $numbers,
    ];
}

response([
    'status' => true,
    'data' => $jogos
]);