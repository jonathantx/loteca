<?php require_once '../pages/head.php' ?>
<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php require_once '../pages/header.php' ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col text-end">
                <h3 class="text-center acertos"></h3>
            </div>
            <div class="col-md-3 text-end">
                <button class="btn btn-md btn-dark" id="btn-save-game">Salvar Jogo</button>
            </div>
        </div>
        <div class="container-jogos mt-3">
            <div class="numeros-container"></div>
        </div>
    </div>
</body>

<script src="./assets/js/script.js"></script>

</html>