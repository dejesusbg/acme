<?php

/**
 * Usuario
 */
class Usuario
{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $nacimiento;
    private $foto;
    private $idGrupo;
    private $idEstado;
    private $idRol;

    public function __construct($id, $nombre, $correo, $clave, $nacimiento, $foto, $idGrupo, $idEstado, $idRol)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nacimiento = $nacimiento;
        $this->foto = $foto;
        $this->idGrupo = $idGrupo;
        $this->idEstado = $idEstado;
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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($value)
    {
        $this->correo = $value;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($value)
    {
        $this->clave = $value;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function setNacimiento($value)
    {
        $this->nacimiento = $value;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($value)
    {
        $this->foto = $value;
    }
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }

    public function setIdGrupo($value)
    {
        $this->idGrupo = $value;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function setIdEstado($value)
    {
        $this->idEstado = $value;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setIdRol($value)
    {
        $this->idRol = $value;
    }

    public function toArray()
    {
        $vars = get_object_vars($this);
        $array = array();
        foreach ($vars as $key => $value) {
            $array[ltrim($key, '_')] = $value;
        }
        return $array;
    }
}