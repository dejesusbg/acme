<?php

/**
 * WebUbicacion
 */

class WebNoticia
{
    private $id;
    private $titulo;
    private $subtitulo;
    private $descripcion;
    private $imagen;

    public function __construct($id, $titulo, $subtitulo, $descripcion, $imagen)
    {

        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($value)
    {
        $this->titulo = $value;
    }

    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    public function setSubtitulo($value)
    {
        $this->subtitulo = $value;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($value)
    {
        $this->imagen = $value;
    }
}