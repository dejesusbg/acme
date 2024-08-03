<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Elecciones - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/vote.css" />
</head>

<body>
    <?php $checked_id = 2; ?>
    <?php include_once (__DIR__ . "/templates/nav.php"); ?>
    <?php $show_profile = true; ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>
    <?php include_once (__DIR__ . "/templates/footer.php") ?>

    <main>
        <h2 id="ballot-type"></h2>
        <p>Puedes votar por cualquiera de los siguientes candidatos para el Gobierno Escolar 2024 del Colegio ACME. </p>
        <form id="vote-form">
            <input type="radio" name="choice" id="blank" value="blank" />
            <label for="blank">
                <div class="md3-card md3-card--filled">
                    <span class="choice-nombre">Voto en Blanco</span>
                </div>
            </label>
            <button class="md3-btn md3-btn--filled" type="submit">
                <span class="md3-btn__text">Votar</span>
            </button>
        </form>
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg5/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg5/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/vote.js"></script>
</body>

</html>