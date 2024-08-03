<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title><?= $_SESSION["ROL_USUARIO"] ?> - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/sufrage.css" />
</head>

<body>
    <?php $checked_id = 2; ?>
    <?php include_once (__DIR__ . "/templates/nav.php") ?>
    <?php $show_profile = true; ?>
    <?php include_once (__DIR__ . "/templates/header.php") ?>
    <?php include_once (__DIR__ . "/templates/footer.php") ?>

    <dialog class="md3-dialog" id="carnet">
        <span class="md3-dialog__headline">Info del estudiante</span>
        <div class="md3-card md3-card--outlined">
            <span id="student-nombre"></span>
            <section id="student-container">
                <img id="student-foto" alt="Foto de perfil">
                <section id="student-info">
                    <span id="student-correo"></span>
                    <span id="student-nacimiento"></span>
                    <span id="student-grupo"></span>
                    <h6 id="student-id"></h6>
                </section>
            </section>
        </div>
        <button id="dialog-accept" class="md3-btn md3-btn--filled md3-dialog__btn" type="submit">
            <span class="md3-btn__text"> Permitir </span>
        </button>
    </dialog>

    <main>
        <h2>Mesa <?= $_SESSION["MESA_JURADO"] ?></h2>
        <div id="search">
            <input class="md3-input--text" type="text" placeholder="Buscar nombre o código" id="filter-table" />
        </div>
        <table id="acme-students">
            <tr>
                <th>Nombre</th>
                <th>Código</th>
            </tr>
        </table>
        <h6>
            Votos en la mesa:
            <span id="votes-amt"></span>
        </h6>
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg5/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg5/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/sufrage.js"></script>
</body>

</html>