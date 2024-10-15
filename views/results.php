<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Resultados - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/results.css" />
</head>

<body>
    <?php $checked_id = 3; ?>
    <?php include_once (__DIR__ . "/templates/nav.php") ?>
    <?php $show_profile = true; ?>
    <?php include_once (__DIR__ . "/templates/header.php") ?>
    <?php include_once (__DIR__ . "/templates/footer.php") ?>

    <main>
        <h2>Gobierno Escolar 2024</h2>
        <h5>Resultados generales</h5>
        <div id="acme-stats">
            <div class="md3-card md3-card--outlined">
                <span class="md3-card__headline">Votantes habilitados</span>
                <span class="result" id="authorized"></span>
            </div>
            <div class="md3-card md3-card--outlined">
                <span class="md3-card__headline">Votos recibidos</span>
                <span class="result" id="voted"></span>
            </div>
            <!-- <div class="md3-card md3-card--outlined">
                <span class="md3-card__headline">Personero ganador</span>
                <span class="result" id="personero"></span>
            </div>
            <div class="md3-card md3-card--outlined">
                <span class="md3-card__headline">Contralor ganador</span>
                <span class="result" id="contralor"></span>
            </div> -->
        </div>
        <h5>Estadísticas</h5>
        <div id="acme-graph">
            <div class="md3-card md3-card--outlined">
                <span class="md3-card__headline">Personero</span>
                <table id="personero-table"
                    class="charts-css column show-data-on-hover data-outside show-heading show-labels data-spacing-8 datasets-spacing-4">
                    <tbody></tbody>
                </table>
            </div>
            <div class="md3-card md3-card--outlined">
                <span class="md3-card__headline">Contralor</span>
                <table id="contralor-table"
                    class="charts-css column show-data-on-hover data-outside show-heading show-labels data-spacing-8 datasets-spacing-4">
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <div id="toggle-btn-container">
            <button class="md3-btn md3-btn--icon" id="refresh">
                <span class="material-symbols-rounded md3-btn__icon">refresh</span>
            </button>
            <button class="md3-btn md3-btn--elevated" type="submit" id="toggle-scope">
                <span class="md3-btn__text">Ver resultados por mesa</span>
            </button>
        </div>
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/results.js"></script>
</body>

</html>