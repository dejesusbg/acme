<?php

require_once (__DIR__ . "/../../models/dao/WebNavDAO.php");

require_once (__DIR__ . "/mdbRol.php");
require_once (__DIR__ . "/mdbWebUbicacion.php");

function nav_array($nav, $checked_id)
{
    $rol = rol_search($nav->getIdRol());
    $ubicacion = ubicacion_search($nav->getIdWebUbicacion());

    $res = [
        "id" => $nav->getId(),
        "nombre" => $nav->getNombre(),
        "ruta" => $nav->getRuta(),
        "icono" => $nav->getIcono(),
        "rol" => $rol->getNombre(),
        "ubicacion" => $ubicacion->getNombre(),
        "checked" => ''
    ];

    if ($checked_id == $res['id']) {
        $res['checked'] = 'checked';
    }

    return $res;
}

function nav_search_by_rol($id_rol)
{
    $dao = new WebNavDAO();
    $res = $dao->searchByRol($id_rol);
    return $res;
}

function nav_search($id, $id_rol)
{
    $dao = new WebNavDAO();
    $res = $dao->search($id, $id_rol);
    return $res;
}

function nav_insert($nav)
{
    $dao = new WebNavDAO();
    $res = $dao->insert($nav);
    return $res;
}

function nav_update($nav)
{
    $dao = new WebNavDAO();
    $res = $dao->update($nav);
    return $res;
}

function nav_delete($id, $id_rol)
{
    $dao = new WebNavDAO();
    $res = $dao->delete($id, $id_rol);
    return $res;
}
