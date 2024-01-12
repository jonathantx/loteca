<?php
    require_once 'db/connection.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferir Jogos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Conferir Jogos - Lotomania</h1>
        <div class="row mt-3">
            <div class="col-md-3">
                <button class="btn btn-md btn-primary">Meus Jogos</button>
                <button class="btn btn-md btn-success btn-gerar-resultado">Resultado</button>
            </div>
            <div class="col text-end">
                <h3 class="text-center acertos"></h3>
            </div>
            <div class="col-md-3 text-end">
                <button class="btn btn-md btn-dark" id="btn-save-game">Salvar Jogo</button>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="numeros-container"></div>
        </div>
    </div>
</body>

<script src="script.js"></script>
</html>