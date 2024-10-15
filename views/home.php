<?php include_once (__DIR__ . "/../index.php"); ?>
<?php include_once (__DIR__ . "/../controllers/action/act_update.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Colegio ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/home.css" />
</head>

<body>
    <?php $checked_id = 1; ?>
    <?php $nav_button = ['href' => '#', 'icon' => 'dashboard', 'id' => 'toggle-view']; ?>
    <?php include_once (__DIR__ . "/templates/nav.php"); ?>
    <?php $show_profile = true; ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>
    <?php include_once (__DIR__ . "/templates/footer.php"); ?>

    <div class="md3-snackbar" id="not-allowed">
        <span class="md3-snackbar__icon material-symbols-rounded">info</span>
        <span class="md3-snackbar__text">
            Ya has votado o no estás autorizado para acceder al módulo de votación. Si crees que esto es un error,
            actualiza para intentarlo nuevamente
        </span>
        <button class="md3-btn md3-btn--icon md3-snackbar__btn" onclick="location.reload()">
            <span class="md3- btn__icon material-symbols-rounded">refresh</span>
        </button>
    </div>

    <main>
        <h1>Página principal</h1>
        <p>Bienvenido al sitio web oficial del Colegio ACME, puedes hacer clic en cada noticia para saber más de lo
            último sobre nosotros.</p>

        <div id="container" class="list">
            <!-- <div id="container"> -->
            <?php include_once (__DIR__ . "/templates/news.php"); ?>
        </div>

        <!-- <div style="display: flex; justify-content: flex-end; margin-top: 0.5rem">
            <button class="md3-btn md3-btn--text" id="toggle-view">
                <span class="md3-btn__text">Cambiar vista</span>
            </button>
        </div> -->
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/home.js"></script>
</body>

</html>