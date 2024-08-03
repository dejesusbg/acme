<?php

require_once (__DIR__ . "/../mdb/mdbUsuario.php");

if (isset($_SESSION["ID_USUARIO"])) {
    $id = $_SESSION["ID_USUARIO"];

    $usuario = usuario_search($id);
    $array = usuario_array($usuario, true);

    $_SESSION["ID_ESTADO_USUARIO"] = $array["id_estado"];
    $_SESSION["ESTADO_USUARIO"] = $array["estado"];
}

