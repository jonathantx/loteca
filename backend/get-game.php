<?php

require_once '../db/connection.php';
require_once '../app/functions.php';

$id = $_GET['id'];

$sql = "SELECT * FROM jogos_numeros ORDER BY numero ASC";

$query = $conn->query($sql);

$numeros = $query->fetchAll(PDO::FETCH_OBJ);

response([
    'status' => true,
    'data' => $numeros
]);