<?php

require_once (__DIR__ . "/../mdb/mdbGrupo.php");
require_once (__DIR__ . "/../mdb/mdbRol.php");
require_once (__DIR__ . "/../mdb/mdbMesa.php");

function get_classes()
{
    $grupos_obj = grupo_get();
    $grupos = array();

    foreach ($grupos_obj as $grupo_obj) {
        $grupo = [
            "key" => grupo_array($grupo_obj)["id"],
            "value" => grupo_array($grupo_obj)["curso"]
        ];
        array_push($grupos, $grupo);
    }

    $roles_obj = rol_get();
    $roles = array();

    foreach ($roles_obj as $rol_obj) {
        $rol = [
            "key" => $rol_obj->getId(),
            "value" => $rol_obj->getNombre()
        ];
        array_push($roles, $rol);
    }

    $mesas_obj = mesa_get();
    $mesas = array();

    foreach ($mesas_obj as $mesa_obj) {
        $mesa = [
            "key" => $mesa_obj->getId(),
            "value" => $mesa_obj->getNombre()
        ];
        array_push($mesas, $mesa);
    }

    $res = [
        "grupos" => $grupos,
        "roles" => $roles,
        "mesas" => $mesas
    ];

    return $res;
}