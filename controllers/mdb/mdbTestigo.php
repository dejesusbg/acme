<?php

require_once (__DIR__ . "/../../models/dao/TestigoDAO.php");

function testigo_array($testigo)
{
    $mesa = mesa_search($testigo->getIdMesa());

    return array(
        "id" => $testigo->getId(),
        "id_mesa" => $mesa->getId(),
        "mesa" => $mesa->getNombre(),
    );
}

function testigo_search($id)
{
    $dao = new TestigoDAO();
    $res = $dao->search($id);
    return $res;
}

function testigo_insert($Testigo)
{
    $dao = new TestigoDAO();
    $res = $dao->insert($Testigo);
    return $res;
}

function testigo_update($Testigo)
{
    $dao = new TestigoDAO();
    $res = $dao->update($Testigo);
    return $res;
}

function testigo_delete($id)
{
    $dao = new TestigoDAO();
    $res = $dao->delete($id);
    return $res;
}
