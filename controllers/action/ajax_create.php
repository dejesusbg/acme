<?php

require_once __DIR__ . "/ajax.php";
require_once __DIR__ . "/serv_classes.php";

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbGrupo.php");

switch ($_POST['js']) {
    case 'get':
        $classes = get_classes();

        $res["grupos"] = $classes["grupos"];
        $res["roles"] = $classes["roles"];
        $res["mesas"] = $classes["mesas"];

        send_response($res);
        break;

    case 'create':
        $res = null;

        switch ($_POST['query']) {
            case 'usuario':
            default:
                $foto = null;
                isset($_FILES['foto']) and ($foto = file_get_contents($_FILES['foto']['tmp_name']));

                $res = usuario_new(
                    $_POST['nombre'],
                    $_POST['correo'],
                    $_POST['clave'],
                    $_POST['nacimiento'],
                    $foto,
                    $_POST['grupo'],
                    $_POST['rol']
                );

        }

        send_response($_POST);
        break;

    default:
        send_response("Invalid POST request", 401);
}
