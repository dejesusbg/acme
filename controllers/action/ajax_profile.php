<?php

require_once (__DIR__ . "/ajax.php");

require_once (__DIR__ . "/../mdb/mdbUsuario.php");

switch ($_POST['js']) {
    case 'profile':
        $usuario = usuario_search($_SESSION['ID_USUARIO']);

        $res = usuario_array($usuario);
        send_response($res);
        break;

    default:
        send_response("Invalid POST request", 401);
}
