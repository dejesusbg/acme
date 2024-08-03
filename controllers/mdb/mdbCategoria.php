<?php

require_once (__DIR__ . "/../../models/dao/CategoriaDAO.php");

function categoria_search_by_nombre($nombre)
{
    $dao = new CategoriaDAO();
    $res = $dao->searchByNombre($nombre);
    return $res;
}

function categoria_get()
{
    $dao = new CategoriaDAO();
    $res = $dao->get();
    return $res;
}

function categoria_search($id)
{
    $dao = new CategoriaDAO();
    $res = $dao->search($id);
    return $res;
}

function categoria_insert($categoria)
{
    $dao = new CategoriaDAO();
    $res = $dao->insert($categoria);
    return $res;
}

function categoria_update($categoria)
{
    $dao = new CategoriaDAO();
    $res = $dao->update($categoria);
    return $res;
}

function categoria_delete($id)
{
    $dao = new CategoriaDAO();
    $res = $dao->delete($id);
    return $res;
}
