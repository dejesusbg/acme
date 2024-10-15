<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Admin - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/admin.css" />
</head>

<body>
    <?php $checked_id = 2; ?>
    <?php $nav_button = ['href' => './create', 'icon' => 'add']; ?>
    <?php include_once (__DIR__ . "/templates/nav.php"); ?>
    <?php $show_profile = true; ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>
    <?php include_once (__DIR__ . "/templates/footer.php"); ?>

    <div class="md3-menu md3-menu--sheet" id="filter-menu">
        <a href="?q=Usuario">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">person</span>
                <span class="md3-menu__item__text">Usuarios</span>
            </div>
        </a>
        <a href="?q=Grado">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">school</span>
                <span class="md3-menu__item__text">Grados</span>
            </div>
        </a>
        <a href="?q=Grupo">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">workspaces</span>
                <span class="md3-menu__item__text">Grupos</span>
            </div>
        </a>
        <a href="?q=Mesa">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">where_to_vote</span>
                <span class="md3-menu__item__text">Mesas</span>
            </div>
        </a>
        <a href="?q=Candidato">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">ballot</span>
                <span class="md3-menu__item__text">Candidatos</span>
            </div>
        </a>
        <a href="?q=Jurado">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">license</span>
                <span class="md3-menu__item__text">Jurados</span>
            </div>
        </a>
        <a href="?q=Testigo">
            <div class="md3-menu__item">
                <span class="material-symbols-rounded md3-menu__item__icon md3-chip__icon">policy</span>
                <span class="md3-menu__item__text">Testigos</span>
            </div>
        </a>
    </div>

    <dialog class="md3-dialog" id="edit">
        <span class="md3-dialog__headline">Editar</span>
        <form id="edit-form"> </form>
        <button id="edit-accept" class="md3-btn md3-btn--filled md3-dialog__btn" type="button">
            <span class="md3-btn__text"> Aceptar </span>
        </button>
        <button id="edit-cancel" class="md3-btn md3-btn--text md3-dialog__btn" type="button">
            <span class="md3-btn__text"> Cancelar </span>
        </button>
    </dialog>

    <dialog class="md3-dialog" id="delete">
        <span class="md3-dialog__headline">Eliminar</span>
        <span class="md3-dialog__text">
            ¿Estás seguro que deseas eliminar este elemento? Esta acción no es reversible
        </span>
        <button id="delete-accept" class="md3-btn md3-btn--filled md3-dialog__btn" type="button">
            <span class="md3-btn__text"> Aceptar </span>
        </button>
        <button id="delete-cancel" class="md3-btn md3-btn--text md3-dialog__btn" type="button">
            <span class="md3-btn__text"> Cancelar </span>
        </button>
    </dialog>

    <main>
        <h1 id="acme-title"></h1>
        <div id="search">
            <input class="md3-input--text" type="text" placeholder="Buscar" id="filter-table" />
            <button class="md3-btn md3-btn--icon md3-topbar__btn" click="filter-menu">
                <span class="material-symbols-rounded md3-chip__icon">filter_list</span>
            </button>
        </div>
        <table id="acme-data">
            <tbody></tbody>
        </table>
    </main>

    <!-- Material Design -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.4.2/chroma.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/monet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dejesusbg/md3/script/material-you.js"></script>
    <!-- ACME -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/admin.js"></script>
</body>

</html>