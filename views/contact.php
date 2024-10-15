<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Contacto - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/guess.css" />
</head>

<body>
    <?php $show_back = true; ?>
    <?php $show_login = false; ?>
    <?php $show_logout = false; ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>
    <?php include_once (__DIR__ . "/templates/footer.php"); ?>

    <dialog id="guess-dialog" class="md3-dialog">
        <span class="md3-dialog__text" id="guess-msg"></span>
        <button type="button" class="md3-btn md3-btn--text md3-dialog__btn" onclick="closeDialog()">
            <span class="md3-btn__text">Aceptar</span>
        </button>
    </dialog>

    <main>
        <h1>Contacto</h1>
        <p>Esta aplicación web fue desarrollada por Ricardo Barrios y Gianmarco Gambin, estudiantes del programa de
            Ingeniería de Sistemas en la Universidad del Magdalena, para la asignatura de Programación para la Web (en
            el periodo académico 2024-I).</p>

        <div id="guess-game">
            <h5>shhh, secret game!</h5>
            <form action="#" onsubmit="validate()">
                <input type="text" placeholder="Ingrese un número" id="guess" class="md3-input--text" />
                <button class="md3-btn md3-btn--filled" type="submit">
                    <span class="md3-btn__text">Validar</span>
                </button>
            </form>

            <table id="attempts" class="md3-table">
                <thead>
                    <th>#</th>
                    <th>Intento</th>
                    <th>Picas</th>
                    <th>Fijas</th>
                </thead>
                <tbody></tbody>
            </table>
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
    <script src="./js/guess.js"></script>

</body>

</html>