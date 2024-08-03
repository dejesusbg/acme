<?php

require_once (__DIR__ . "/../../models/dao/GradoDAO.php");

function grado_search($id)
{
    $dao = new GradoDAO();
    $res = $dao->search($id);
    return $res;
}

function grado_insert($grado)
{
    $dao = new GradoDAO();
    $res = $dao->insert($grado);
    return $res;
}

function grado_update($grado)
{
    $dao = new GradoDAO();
    $res = $dao->update($grado);
    return $res;
}

function grado_delete($id)
{
    $dao = new GradoDAO();
    $res = $dao->delete($id);
    return $res;
}
