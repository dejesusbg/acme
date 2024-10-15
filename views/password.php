<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Editar contraseña ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/password.css" />
</head>

<body>
    <?php $show_back = true; ?>
    <?php $show_logout = false; ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>
    <?php include_once (__DIR__ . "/templates/footer.php") ?>

    <main>
        <h2>Editar contraseña</h2>
        <form method="POST" id="password-form">
            <label for="student-clave">Nueva contraseña:</label>
            <input class="md3-input--text" type="password" name="password" placeholder="password" required />
            <button class="md3-btn md3-btn--filled" type="submit">
                <span class="md3-btn__text">Guardar</span>
            </button>
        </form>
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/password.js"></script>
</body>

</html>