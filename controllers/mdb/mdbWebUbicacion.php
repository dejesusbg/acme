<?php

require_once (__DIR__ . "/../../models/dao/WebUbicacionDAO.php");

function ubicacion_search($id)
{
    $dao = new WebUbicacionDAO();
    $res = $dao->search($id);
    return $res;
}

function ubicacion_insert($ubicacion)
{
    $dao = new WebUbicacionDAO();
    $res = $dao->insert($ubicacion);
    return $res;
}

function ubicacion_update($ubicacion)
{
    $dao = new WebUbicacionDAO();
    $res = $dao->update($ubicacion);
    return $res;
}

function ubicacion_delete($id)
{
    $dao = new WebUbicacionDAO();
    $res = $dao->delete($id);
    return $res;
}
