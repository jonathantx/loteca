<?php

require_once '../app/db/connection.php';
require_once '../app/functions.php';

header('Content-Type: application/json');

$numbers = $_POST['numbers'] ?? [];

$countNumbers = array_reduce($numbers, function ($acc, $b) {

    if($b['selected'] == 'true')
        $acc++;

        return $acc;
}, 0);


// if($countNumbers < 50){
//     response([
//         'status' => false,
//         'message' => 'Você deve selecionar no mínimo 50 números!' 
//     ]);
// }

// Insere o jogo

$sql = "INSERT INTO jogos (premiado) VALUES ('Não')";

$query = $conn->prepare($sql);

$data = $query->execute();

$jogo_id = $conn->lastInsertId();

foreach ($numbers as $key => $number) {

    $number = (Object) $number;

    $selected = $number->selected == 'true' ? 1 : 0;

    $sql = "INSERT INTO jogos_numeros (numero, jogo_id, selected) VALUES ($number->num, $jogo_id, $selected)";

    $query = $conn->prepare($sql);

    $data = $query->execute();

}

response([
    'status' => true,
    'message' => 'Ok'
]);