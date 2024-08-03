<?php session_start(); ?>

<?php $name = 'acme'; ?>
<?php
// $uri = trim($_SERVER['REQUEST_URI'], '/');
$uri = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');
?>

<?php if ($uri == $name): ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Por favor, espere</title>
    </head>

    <body onLoad="location.href='./views/home'">
        <script>
            document.write(
                '<div class="normal" style="position: absolute; top: 0.75rem; left: 0.5rem;">Por favor espere...</div>'
            );
        </script>
    </body>

    </html>

<?php else: ?>
    <?php

    $views = $name . "/views/";

    $routes = [
        "home",
        "contact",
        "login",
        "vote",
        "sufrage",
        "results",
        "profile",
        "password",
        "auth",
        "forgot",
        "admin",
        "edit",
        "create"
    ];

    function goToHome($flag)
    {
        $flag and header("Location: ../views/home");
    }

    function checkRoute($route)
    {
        global $uri, $views;
        return ($uri == ($views . $route)) or ($uri == ($views . $route . '.php'));
    }

    $is_logged = isset($_SESSION["IS_LOGGED"]);

    // $has_voted = (isset($_SESSION['ESTADO_USUARIO']) and $_SESSION['ESTADO_USUARIO'] == "Válido");
    $is_allowed = (isset($_SESSION['ESTADO_USUARIO']) and $_SESSION['ESTADO_USUARIO'] == "En proceso")
        || (isset($_SESSION['ROL_LOGIN']) and $_SESSION["ROL_LOGIN"] != "Solo votante");

    $is_auth = false;
    $has_forgot = false;
    $has_query = false;

    $end = false;

    if (checkRoute('home')) {
        // nothing to do here
    } elseif (checkRoute('contact')) {
        // nothing to do here
    } elseif (checkRoute('login')) {
        goToHome($is_logged);
    } elseif (checkRoute('forgot')) {
        goToHome($is_logged);

        $has_forgot = isset($_GET["forgot"]) and isset($_GET["id"]);
    } elseif (checkRoute('auth')) {
        goToHome($is_logged);

        $is_auth = isset($_GET["auth"]) and isset($_GET["id"]);
    } else {
        goToHome(!$is_logged);

        if (checkRoute('admin') || checkRoute('edit') || checkRoute('create')) {
            goToHome($_SESSION["ROL_LOGIN"] != "Admin");
        } elseif (checkRoute('profile')) {
            // nothing to do here
        } elseif (checkRoute('results')) {
            goToHome($end); // go home if it's < 4:00 pm
        } elseif (checkRoute('password')) {
            // nothing to do here
        } else {
            goToHome($_SESSION["ROL_LOGIN"] == "Admin");

            if (checkRoute('vote')) {
                goToHome($_SESSION["ROL_LOGIN"] == "Testigo");
                goToHome($_SESSION["ROL_LOGIN"] == "Jurado");
                goToHome(!$is_allowed); // go home if already voted or is not allowed
            } elseif (checkRoute('sufrage')) {
                goToHome($_SESSION["ROL_LOGIN"] == "Votante");
            }
        }
    }

    ?>

    <script>
        var is_logged = ('<?= $is_logged ?>' != ''),
            is_allowed = ('<?= $is_allowed ?>' != ''),
            is_auth = ('<?= $is_auth ?>' != ''),
            has_forgot = ('<?= $has_forgot ?>' != '');

        var img = '<?= $is_logged ? $_SESSION["FOTO_USUARIO"] : "" ?>';
    </script>

<?php endif; ?>