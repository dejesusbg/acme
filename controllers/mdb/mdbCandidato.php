<?php

require_once (__DIR__ . "/../mdb/mdbUsuario.php");
require_once (__DIR__ . "/../../models/dao/CandidatoDAO.php");

function candidato_array($candidato)
{
    $id_candidato = $candidato->getId();
    $usuario = usuario_search($id_candidato);

    $res = usuario_array($usuario);
    $candidato_res = ['numero' => $candidato->getNumero()];

    // $res = [...$res, ...$candidato_res];
    $res = array_merge($res, $candidato_res);
    return $res;
}

function candidato_search_by_categoria($id)
{
    $dao = new CandidatoDAO();
    $res = $dao->searchByCategoria($id);
    return $res;
}

function candidato_get()
{
    $dao = new CandidatoDAO();
    $res = $dao->get();
    return $res;
}

function candidato_search($id)
{
    $dao = new CandidatoDAO();
    $res = $dao->search($id);
    return $res;
}

function candidato_insert($candidato)
{
    $dao = new CandidatoDAO();
    $res = $dao->insert($candidato);
    return $res;
}

function candidato_update($candidato)
{
    $dao = new CandidatoDAO();
    $res = $dao->update($candidato);
    return $res;
}

function candidato_delete($id)
{
    $dao = new CandidatoDAO();
    $res = $dao->delete($id);
    return $res;
}
