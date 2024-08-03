<?php

require_once (__DIR__ . "/../../models/dao/UsuarioDAO.php");

require_once (__DIR__ . "/mdbGrupo.php");
require_once (__DIR__ . "/mdbEstadoDelVoto.php");
require_once (__DIR__ . "/mdbRol.php");

function usuario_new($nombre, $correo, $clave, $nacimiento, $foto, $idGrupo, $idRol){
    $usuario = new Usuario(0, $nombre, $correo, $clave, $nacimiento, $foto, $idGrupo, 1, $idRol);
    $res = usuario_insert($usuario);
    return $res;
}

function usuario_array($usuario, $extended = false)
{
    
    $id = $usuario->getId();
    
    $id_grupo = $usuario->getIdGrupo();
    $id_estado = $usuario->getIdEstado();
    $id_rol = $usuario->getIdRol();
    
    $grupo = grupo_array(grupo_search($id_grupo));
    $estado = estado_search($id_estado);
    $rol = rol_search($id_rol);
    
    // $FOTOS_DISPONIBLES = array(3, 4, 5, 24, 25, 26);
    // $id_foto = (in_array($id, $FOTOS_DISPONIBLES)) ? $id : 0;
    // $foto = "./img/pfps/" . $id_foto . ".png";

    $imagen = base64_encode($usuario->getFoto());
    $foto = ($imagen != "")
        ? ('data:image/jpeg;base64,' . $imagen)
        : "./img/pfps/0.png";

    $res = [
        "id" => $usuario->getId(),
        "nombre" => $usuario->getNombre(),
        "correo" => $usuario->getCorreo(),
        "nacimiento" => $usuario->getNacimiento(),
        "grupo" => $grupo["curso"],
        "estado" => $estado->getNombre(),
        "foto" => $foto,
        "mesa" => $grupo["mesa"],
        "rol" => $rol->getNombre(),
    ];

    if ($extended) {
        $extended_res = [
            "clave" => $usuario->getClave(),
            "id_grupo" => $id_grupo,
            "id_estado" => $id_estado,
            "id_mesa" => $grupo["id_mesa"],
            "id_rol" => $id_rol,
        ];

        // $res = [...$res, ...$extended_res];
        $res = array_merge($res, $extended_res);
    }

    return $res;
}

function usuario_login($correo, $clave)
{
    $dao = new UsuarioDAO();
    $usuario = $dao->login($correo, $clave);

    $res = null;
    if ($usuario != null) {
        $res = usuario_array($usuario, true);
    }

    return $res;
}

function usuario_votantes($id_mesa = 0)
{
    $votantes = usuario_get();
    $grupos = grupo_search_by_mesa($id_mesa);

    $res = array();
    foreach ($votantes as $votante) {
        if (in_array($votante->getIdGrupo(), $grupos)) {
            $usuario = usuario_array($votante);

            if ($usuario["rol"] != "Admin") {
                array_push($res, $usuario);
            }
        }
    }

    return $res;
}

function usuario_search_by_correo($correo)
{
    $dao = new UsuarioDAO();
    $res = $dao->searchByCorreo($correo);
    return $res;
}

function usuario_get()
{
    $dao = new UsuarioDAO();
    $res = $dao->get();
    return $res;
}

function usuario_search($id)
{
    $dao = new UsuarioDAO();
    $res = $dao->search($id);
    return $res;
}

function usuario_insert($usuario)
{
    $dao = new UsuarioDAO();
    $res = $dao->insert($usuario);
    return $res;
}

function usuario_update($usuario)
{
    $dao = new UsuarioDAO();
    $res = $dao->update($usuario);
    return $res;
}

function usuario_delete($id)
{
    $dao = new UsuarioDAO();
    $res = $dao->delete($id);
    return $res;
}