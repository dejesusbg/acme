<?php

require_once (__DIR__ . "/ajax.php");

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbEstadoDelVoto.php");

switch ($_POST['js']) {
    case 'sufrage':
        $id_mesa = $_SESSION['ID_MESA_JURADO'];

        $res = usuario_votantes($id_mesa);
        send_response($res);
        break;

    case 'allow':
        $id = $_POST["id"];

        $estado = estado_search_by_nombre("En proceso");
        $id_estado = $estado->getId();

        $usuario = usuario_search($id);
        $usuario->setIdEstado($id_estado);

        usuario_update($usuario);

        send_response($usuario);
        break;

    case 'check':
        $id = $_POST["id"];

        $usuario = usuario_search($id);

        $id_estado = $usuario->getIdEstado();
        $estado = estado_search($id_estado);

        $res = $estado->getNombre() == "Válido";

        send_response($res, 201);
        break;

    default:
        send_response("Invalid POST request", 401);
}
