<?php require_once '../pages/head.php' ?>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">
                <!-- <button class="btn btn-md btn-primary">Meus Jogos</button> -->
                <button class="btn btn-md btn-success btn-gerar-resultado" >Resultado</button>
            </div>
            <div class="col text-end">
                <h3 class="text-center acertos"></h3>
            </div>
            <div class="col-md-3 text-end">
                <button class="btn btn-md btn-dark" id="btn-save-game">Salvar Jogo</button>
            </div>
        </div>
        <div class="container-jogos">
            <div class="numeros-container"></div>
        </div>
    </div>
</body>

<script src="./assets/js/script.js"></script>

</html>