<?php

require_once (__DIR__ . "/../../models/dao/RolDAO.php");

function rol_search_by_nombre($nombre)
{
    $dao = new RolDAO();
    $rol = $dao->searchByNombre($nombre);
    return $rol;
}

function rol_get()
{
    $dao = new RolDAO();
    $res = $dao->get();
    return $res;
}

function rol_search($id)
{
    $dao = new RolDAO();
    $res = $dao->search($id);
    return $res;
}

function rol_insert($rol)
{
    $dao = new RolDAO();
    $res = $dao->insert($rol);
    return $res;
}

function rol_update($rol)
{
    $dao = new RolDAO();
    $res = $dao->update($rol);
    return $res;
}

function rol_delete($id)
{
    $dao = new RolDAO();
    $res = $dao->delete($id);
    return $res;
}
