<?php

require_once (__DIR__ . "/../../models/dao/WebNoticiaDAO.php");

function noticia_array($noticia)
{
    return array(
        "titulo" => $noticia->getTitulo(),
        "subtitulo" => $noticia->getSubtitulo(),
        "descripcion" => $noticia->getDescripcion(),
        "imagen" => $noticia->getImagen()
    );
}

function noticia_get()
{
    $dao = new WebNoticiaDAO();
    $res = $dao->get();
    return $res;
}

function noticia_search($id)
{
    $dao = new WebNoticiaDAO();
    $res = $dao->search($id);
    return $res;
}

function noticia_insert($Noticia)
{
    $dao = new WebNoticiaDAO();
    $res = $dao->insert($Noticia);
    return $res;
}

function noticia_update($Noticia)
{
    $dao = new WebNoticiaDAO();
    $res = $dao->update($Noticia);
    return $res;
}

function noticia_delete($id)
{
    $dao = new WebNoticiaDAO();
    $res = $dao->delete($id);
    return $res;
}
