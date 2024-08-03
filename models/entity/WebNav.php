<?php

/**
 * WebNav
 */

class WebNav
{
    private $id;
    private $nombre;
    private $ruta;
    private $icono;
    private $idWebUbicacion;
    private $idRol;

    public function __construct($id, $nombre, $ruta, $icono, $idWebUbicacion, $idRol)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->icono = $icono;
        $this->idWebUbicacion = $idWebUbicacion;
        $this->idRol = $idRol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($value)
    {
        $this->nombre = $value;
    }

    public function getIdWebUbicacion()
    {
        return $this->idWebUbicacion;
    }

    public function setIdWebUbicacion($value)
    {
        $this->idWebUbicacion = $value;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($value)
    {
        $this->ruta = $value;
    }

    public function getIcono()
    {
        return $this->icono;
    }

    public function setIcono($value)
    {
        $this->icono = $value;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setIdRol($value)
    {
        $this->idRol = $value;
    }
}