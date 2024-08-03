<?php

require_once (__DIR__ . "/../../models/dao/VotoDAO.php");

require_once (__DIR__ . "/mdbMesa.php");
require_once (__DIR__ . "/mdbCandidato.php");

function voto_array($voto)
{
    $id_mesa = $voto->getIdMesa();
    $id_candidato = $voto->getIdCandidato();

    $mesa = mesa_search($id_mesa);
    $candidato = candidato_search($id_candidato);

    $res = [
        'mesa' => $mesa->getNombre(),
        'categoria' => $candidato->getIdCategoria(),
        'candidato' => $candidato->getNumero()
    ];

    return $res;
}

function voto_get()
{
    $dao = new VotoDAO();
    $res = $dao->get();
    return $res;
}

function voto_search($id)
{
    $dao = new VotoDAO();
    $res = $dao->search($id);
    return $res;
}

function voto_insert($voto)
{
    $dao = new VotoDAO();
    $res = $dao->insert($voto);
    return $res;
}

function voto_update($voto)
{
    $dao = new VotoDAO();
    $res = $dao->update($voto);
    return $res;
}

function voto_delete($id)
{
    $dao = new VotoDAO();
    $res = $dao->delete($id);
    return $res;
}
