<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Perfil - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/profile.css" />
</head>

<body>
    <?php $checked_id = 4; ?>
    <?php $nav_button = ['href' => './password', 'icon' => 'edit']; ?>
    <?php include_once (__DIR__ . "/templates/nav.php"); ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>
    <?php include_once (__DIR__ . "/templates/footer.php") ?>

    <main>
        <h2>Perfil</h2>
        <div class="md3-card md3-card--elevated">
            <span id="student-nombre"></span>
            <section id="student-container">
                <img id="student-foto" alt="Foto de perfil">
                <section id="student-info">
                    <span id="student-correo"><b>Correo: </b></span>
                    <span id="student-nacimiento"><b>Fecha de nacimiento: </b></span>
                    <span id="student-grupo"><b>Grado: </b></span>
                    <span id="student-mesa"><b>Mesa de votación: </b></span>
                    <h6 id="student-id">idacme-</h6>
                </section>
            </section>
        </div>
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/profile.js"></script>
</body>

</html>