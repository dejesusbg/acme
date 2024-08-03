<?php

require_once (__DIR__ . "/ajax.php");

require_once (__DIR__ . "/../mdb/mdbCandidato.php");
require_once (__DIR__ . "/../mdb/mdbCategoria.php");
require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../mdb/mdbEstadoDelVoto.php");
require_once (__DIR__ . "/../mdb/mdbVoto.php");

switch ($_POST['js']) {
    case 'ballot':
        $type = $_POST['type'];

        $categoria = categoria_search_by_nombre($type);
        $id_categoria = $categoria->getId();

        $candidatos = candidato_search_by_categoria($id_categoria);

        $res = array();
        foreach ($candidatos as $candidato) {
            $candidato_res = candidato_array($candidato);
            array_push($res, $candidato_res);
        }

        send_response($res);
        break;

    case 'vote':
        $vote = [
            "personero" => $_POST['personero'],
            "contralor" => $_POST['contralor'],
        ];

        foreach ($vote as $key => $value) {
            if ($value == "blank") {
                $vote[$key] = null;
            }
        }

        $vote_array = [
            new Voto(0, $_SESSION["ID_MESA_USUARIO"], $vote["personero"]),
            new Voto(1, $_SESSION["ID_MESA_USUARIO"], $vote["contralor"]),
        ];

        voto_insert($vote_array["0"]);
        voto_insert($vote_array["1"]);

        // update session and estado
        $estado = estado_search_by_nombre("Válido");
        $id_estado = $estado->getId();

        $id = $_SESSION["ID_USUARIO"];
        $usuario = usuario_search($id);
        $usuario->setIdEstado($id_estado);

        usuario_update($usuario);

        $_SESSION['ID_ESTADO_USUARIO'] = $id_estado;
        $_SESSION['ESTADO_USUARIO'] = "Válido";

        $res = $vote_array;
        send_response(true);
        break;

    default:
        send_response("Invalid POST request", 401);
}