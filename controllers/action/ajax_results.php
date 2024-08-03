<?php

require_once (__DIR__ . "/ajax.php");

require_once (__DIR__ . "/../mdb/mdbVoto.php");
require_once (__DIR__ . "/../mdb/mdbCandidato.php");
require_once (__DIR__ . "/../mdb/mdbCategoria.php");

switch ($_POST['js']) {
    case 'results':
        $votos = voto_get();

        $habilitados = count(usuario_votantes());
        $recibidos = count($votos);

        $stats = array();

        $candidatos = candidato_get();
        foreach ($candidatos as $candidato) {
            $id_categoria = $candidato->getIdCategoria();
            $categoria = categoria_search($id_categoria);

            $cont = 0;
            foreach ($votos as $voto) {
                if ($voto->getIdCandidato() == $candidato->getId())
                    $cont++;
            }

            $stat = [
                "numero" => "#" . $candidato->getNumero(),
                "categoria" => $categoria->getNombre(),
                "votos" => $cont
            ];

            array_push($stats, $stat);
        }

        for ($i = 1; $i <= count(categoria_get()); $i++) {
            $categoria = categoria_search($i);

            $cont = 0;
            foreach ($votos as $voto) {
                $id_categoria_voto = ($voto->getId() % 2) ? 1 : 2;
                if ($voto->getIdCandidato() == null and $categoria->getId() == $id_categoria_voto)
                    $cont++;
            }

            $stat = [
                "numero" => "n/a",
                "categoria" => $categoria->getNombre(),
                "votos" => $cont
            ];

            array_push($stats, $stat);
        }

        $res = [
            "habilitados" => $habilitados,
            "recibidos" => $recibidos,
            "stats" => $stats
        ];

        send_response($res);
        break;

    default:
        send_response("Invalid POST request", 401);
}
