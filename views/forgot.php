<?php include_once (__DIR__ . "/../index.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Ingresa - ACME</title>
    <link rel="shortcut icon" href="./img/escudo.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/login.css" />
</head>

<body>
    <?php include_once (__DIR__ . "/templates/footer.php"); ?>

    <dialog class="md3-dialog" id="invalid-credentials">
        <span class="material-symbols-rounded md3-dialog__icon">warning</span>
        <span class="md3-dialog__headline">Error de credenciales</span>
        <div class="md3-dialog__text">
            <span>El correo no está registrado como en el sistema.</span>
        </div>
        <button class="md3-btn md3-btn--filled md3-dialog__btn" type="reset" onclick="closeDialog()">
            <span class="md3-btn__text"> Aceptar </span>
        </button>
    </dialog>

    <dialog class="md3-dialog" id="mailto-login">
        <span class="material-symbols-rounded md3-dialog__icon">mail</span>
        <span class="md3-dialog__headline">Correo enviado</span>
        <div class="md3-dialog__text">
            <span>Ha sido enviado un correo de verificación para reestablecer su cuenta.</span>
        </div>
        <button class="md3-btn md3-btn--filled md3-dialog__btn" type="reset" onclick="closeDialog()">
            <span class="md3-btn__text"> Aceptar </span>
        </button>
    </dialog>

    <?php $show_back = true; ?>
    <?php $show_title = false; ?>
    <?php $show_login = false; ?>
    <?php $show_logout = false; ?>
    <?php include_once (__DIR__ . "/templates/header.php"); ?>

    <main>
        <div id="container">
            <img src="./img/escudo.png" alt="Badge Colegio ACME" />
            <section>
                <div>
                    <h4>Reestablecer cuenta</h4>
                    <p>Escriba su correo electrónico inscrito en el sistema.</p>
                </div>
                <form method="POST" id="forgot-form">
                    <input class="md3-input--text" type="email" name="email" placeholder="example@acme.com" required />
                    <button class="md3-btn md3-btn--filled" type="submit">
                        <span class="md3-btn__text">Entrar</span>
                    </button>
                </form>
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
    <script src="./js/forgot.js"></script>
</body>

</html>