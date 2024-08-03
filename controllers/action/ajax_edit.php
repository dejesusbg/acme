<?php

require_once __DIR__ . "/ajax.php";
require_once __DIR__ . "/serv_classes.php";

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbGrupo.php");

switch ($_POST['js']) {
    case 'get':
        $id = $_POST["id"];
        $res = array();

        switch ($_POST['query']) {
            case 'Usuario':
            default:
                $usuario = usuario_search($id);
                $res["data"] = usuario_array($usuario, true);
                break;

            case 'Grupo':
                $grupo = grupo_search($id);
                $res["data"] = grupo_array($grupo);
                break;
        }

        $classes = get_classes();

        $res["grupos"] = $classes["grupos"];
        $res["roles"] = $classes["roles"];
        $res["mesas"] = $classes["mesas"];

        send_response($res);
        break;

    case 'edit':
        $id = $_POST["id"];

        switch ($_POST['query']) {
            case 'Usuario':
            default:
                $usuario = usuario_search($id);

                $usuario->setNombre($_POST["nombre"]);
                $usuario->setCorreo($_POST["correo"]);
                $usuario->setClave($_POST["clave"]);
                $usuario->setNacimiento($_POST["nacimiento"]);
                $usuario->setIdGrupo($_POST["grupo"]);

                isset($_FILES['foto']) and $usuario->setFoto(file_get_contents($_FILES['foto']['tmp_name']));

                if ($_SESSION["ID_USUARIO"] != $id) {
                    $usuario->setIdRol($_POST["rol"]);
                } else {
                    $array = usuario_array($usuario);
                    array_session($array, "USUARIO");
                }

                usuario_update($usuario);
                break;

            case 'Grupo':
                $grupo = grupo_search($id);

                $grupo->setIdMesa($_POST["mesa"]);
                $grupo->setNombre($_POST["grupo"]);

                grupo_update($grupo);

                break;
        }

        send_response($_POST);
        break;

    default:
        send_response("Invalid POST request", 401);
}
