<?php

require_once (__DIR__ . "/../../models/dao/MesaDAO.php");

function mesa_get()
{
    $dao = new MesaDAO();
    $res = $dao->get();
    return $res;
}

function mesa_search($id)
{
    $dao = new MesaDAO();
    $res = $dao->search($id);
    return $res;
}

function mesa_insert($mesa)
{
    $dao = new MesaDAO();
    $res = $dao->insert($mesa);
    return $res;
}

function mesa_update($mesa)
{
    $dao = new MesaDAO();
    $res = $dao->update($mesa);
    return $res;
}

function mesa_delete($id)
{
    $dao = new MesaDAO();
    $res = $dao->delete($id);
    return $res;
}
