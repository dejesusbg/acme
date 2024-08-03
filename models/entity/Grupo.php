<?php

/**
 * Grupo
 */

class Grupo
{
    private $id;
    private $nombre;
    private $idGrado;
    private $idMesa;

    public function __construct($id, $nombre, $idGrado, $idMesa)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->idGrado = $idGrado;
        $this->idMesa = $idMesa;
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

    public function getIdGrado()
    {
        return $this->idGrado;
    }

    public function setIdGrado($value)
    {
        $this->idGrado = $value;
    }

    public function getIdMesa()
    {
        return $this->idMesa;
    }

    public function setIdMesa($value)
    {
        $this->idMesa = $value;
    }
}