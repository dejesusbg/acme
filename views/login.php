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
            <span>El correo o contraseña ingresados no son correctos.</span>
        </div>
        <button class="md3-btn md3-btn--filled md3-dialog__btn" type="reset" onclick="closeDialog()">
            <span class="md3-btn__text"> Aceptar </span>
        </button>
    </dialog>

    <dialog class="md3-dialog" id="not-votante">
        <span class="md3-dialog__headline"> <span class="dialog-rol"></span> </span>
        <div class="md3-dialog__text">
            <span>¿Desea iniciar sesión como <span class="dialog-rol"></span> para ejercer su función?</span>
        </div>
        <button class="md3-btn md3-btn--filled md3-dialog__btn" type="submit" id="dialog-accept">
            <span class="md3-btn__text">Aceptar</span>
        </button>
        <button class="md3-btn md3-btn--text md3-dialog__btn" type="submit" id="dialog-cancel">
            <span class="md3-btn__text">Cancelar</span>
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
                    <h4>Elecciones ACME</h4>
                    <p>Inicia sesión en tu cuenta para votar.</p>
                    <a href="./forgot">
                        <span>¿Olvidaste tu contraseña?</span>
                    </a>
                </div>
                <form method="POST" id="login-form">
                    <input class="md3-input--text" type="email" name="email" placeholder="example@acme.com" required />
                    <input class="md3-input--text" type="password" name="password" placeholder="password" required />
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
    <script src="./js/login.js"></script>
</body>

</html>