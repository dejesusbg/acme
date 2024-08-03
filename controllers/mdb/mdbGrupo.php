<?php

require_once (__DIR__ . "/../../models/dao/GrupoDAO.php");

require_once (__DIR__ . "/mdbGrado.php");
require_once (__DIR__ . "/mdbMesa.php");

function grupo_array($grupo)
{
    $id_grado = $grupo->getIdGrado();
    $id_mesa = $grupo->getIdMesa();

    $grado = grado_search($id_grado);
    $mesa = mesa_search($id_mesa);

    $res = [
        'id' => $grupo->getId(),
        'curso' => $grado->getNombre() . ' ' . $grupo->getNombre(),
        'grado' => $grado->getNombre(),
        'grupo' => $grupo->getNombre(),
        'id_mesa' => $id_mesa,
        'mesa' => $mesa->getNombre()
    ];

    return $res;
}

function grupo_search_by_mesa($id_mesa = 0)
{
    $dao = new GrupoDAO();

    if (!$id_mesa) {
        $grupos = $dao->get();
    } else {
        $grupos = $dao->searchByMesa($id_mesa);
    }

    $res = array();
    foreach ($grupos as $grupo) {
        array_push($res, $grupo->getId());
    }

    return $res;
}

function grupo_get()
{
    $dao = new GrupoDAO();
    $res = $dao->get();
    return $res;
}

function grupo_search($id)
{
    $dao = new GrupoDAO();
    $res = $dao->search($id);
    return $res;
}

function grupo_insert($grupo)
{
    $dao = new GrupoDAO();
    $res = $dao->insert($grupo);
    return $res;
}

function grupo_update($grupo)
{
    $dao = new GrupoDAO();
    $res = $dao->update($grupo);
    return $res;
}

function grupo_delete($id)
{
    $dao = new GrupoDAO();
    $res = $dao->delete($id);
    return $res;
}
