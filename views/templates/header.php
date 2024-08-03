<?php

$titulo = !isset($titulo) ? 'Colegio ACME' : $titulo;

$show_back = !isset($show_back) ? false : $show_back;
$show_title = !isset($show_title) ? true : $show_title;
$show_profile = !isset($show_profile) ? false : $show_profile;

$show_login = !$is_logged ? (!isset($show_login) ? true : $show_login) : false;
$show_logout = $is_logged ? (!isset($show_logout) ? true : $show_logout) : false;

$short_name = "";
if (isset($_SESSION['NOMBRE_USUARIO'])) {
    $short_name = explode(" ", $_SESSION['NOMBRE_USUARIO'], 4)["0"];
}
?>

<header class="md3-topbar">
    <section class="md3-topbar__leading">

        <?php if ($show_back): ?>
            <button class="md3-btn md3-btn--icon md3-topbar__btn" onclick="history.back()">
                <span class="material-symbols-rounded md3-btn__icon"> arrow_back </span>
            </button>
        <?php endif; ?>

        <?php if ($show_title): ?>
            <a href="./home">
                <img src="./img/escudo.png" alt="Badge Colegio ACME" />

                <span class="md3-topbar__title">
                    <?= $titulo; ?>
                </span>
            </a>
        <?php endif; ?>

    </section>

    <section class="md3-topbar__trailing">

        <button class="md3-btn md3-btn--icon md3-topbar__btn" onclick="setTheme()">
            <span class="material-symbols-rounded md3-btn__icon">
                dark_mode
            </span>
        </button>

        <?php if ($show_login): ?>

            <a href="./login">
                <button class="md3-btn md3-btn--text md3-topbar__btn">
                    <span class="material-symbols-rounded md3-btn__icon"> login </span>
                    <span class="md3-btn__text"> Ingresar </span>
                </button>
            </a>

        <?php elseif ($show_profile): ?>

            <a href="./profile">
                <button class="md3-btn md3-btn--text md3-topbar__btn">
                    <img class="md3-btn__icon" src="<?= $_SESSION['FOTO_USUARIO'] ?>" alt="Ricardo's picture" />
                    <span class="md3-btn__text"> <?= $short_name ?> </span>
                </button>
            </a>

        <?php elseif ($show_logout): ?>

            <form action="../controllers/action/act_logout.php">
                <button class="md3-btn md3-btn--text md3-topbar__btn">
                    <span class="material-symbols-rounded md3-btn__icon">logout</span>
                    <span class="md3-btn__text"> Salir </span>
                </button>
            </form>

        <?php endif; ?>

    </section>
</header>