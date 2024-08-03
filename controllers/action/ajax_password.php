<?php

require_once (__DIR__ . "/ajax.php");

require_once (__DIR__ . "/../mdb/mdbUsuario.php");

$id = $_SESSION["ID_USUARIO"];

switch ($_POST['js']) {
        case 'password':
                $usuario = usuario_search($id);
                $usuario->setClave($_POST['password']);

                usuario_update($usuario);

                $_SESSION['CLAVE_USUARIO'] = $usuario->getClave();

                send_response(true);
                break;

        default:
                send_response("Invalid POST request", 401);

}