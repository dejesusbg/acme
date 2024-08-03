<?php

require_once (__DIR__ . "/../mdb/mdbMesa.php");
require_once (__DIR__ . "/../../models/dao/JuradoDAO.php");

function jurado_array($jurado)
{
    $mesa = mesa_search($jurado->getIdMesa());

    return array(
        "id" => $jurado->getId(),
        "id_mesa" => $mesa->getId(),
        "mesa" => $mesa->getNombre(),
    );
}

function jurado_search($id)
{
    $dao = new JuradoDAO();
    $res = $dao->search($id);
    return $res;
}

function jurado_insert($Jurado)
{
    $dao = new JuradoDAO();
    $res = $dao->insert($Jurado);
    return $res;
}

function jurado_update($Jurado)
{
    $dao = new JuradoDAO();
    $res = $dao->update($Jurado);
    return $res;
}

function jurado_delete($id)
{
    $dao = new JuradoDAO();
    $res = $dao->delete($id);
    return $res;
}
