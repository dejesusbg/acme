<?php

require_once __DIR__ . "/ajax.php";

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbGrupo.php");

switch ($_POST['js']) {
    case 'admin':
        $res = array();

        switch ($_POST['query']) {
            case 'Usuario':
            default:
                $array = usuario_get();

                foreach ($array as $key => $value) {
                    $usuario = usuario_array($value, true);
                    array_push($res, $usuario);
                }

                break;

            case 'Grupo':
                $array = grupo_get();

                foreach ($array as $key => $value) {
                    $grupo = grupo_array($value);
                    array_push($res, $grupo);
                }

                break;
        }

        send_response($res);
        break;

    case 'delete':
        $id = $_POST["id"];

        switch ($_POST['query']) {
            case 'Usuario':
            default:
                if ($id == $_SESSION["ID_USUARIO"]) {
                    send_response(false);
                } else {
                    usuario_delete($id);
                    send_response(true);
                }
        }

        break;

    default:
        send_response("Invalid POST request", 401);
}
