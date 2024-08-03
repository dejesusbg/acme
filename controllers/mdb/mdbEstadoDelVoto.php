<?php

require_once (__DIR__ . "/../../models/dao/EstadoDelVotoDAO.php");

function estado_search_by_nombre($nombre)
{
    $dao = new EstadoDelVotoDAO();
    $res = $dao->searchByNombre($nombre);
    return $res;
}

function estado_search($id)
{
    $dao = new EstadoDelVotoDAO();
    $res = $dao->search($id);
    return $res;
}

function estado_insert($estado_del_voto)
{
    $dao = new EstadoDelVotoDAO();
    $res = $dao->insert($estado_del_voto);
    return $res;
}

function estado_update($estado_del_voto)
{
    $dao = new EstadoDelVotoDAO();
    $res = $dao->update($estado_del_voto);
    return $res;
}

function estado_delete($id)
{
    $dao = new EstadoDelVotoDAO();
    $res = $dao->delete($id);
    return $res;
}
