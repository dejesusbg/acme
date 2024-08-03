<?php

/**
 * Grado
 */

class Grado
{
    private $id;
    private $nombre;

	public function __construct($id, $nombre) {

		$this->id = $id;
		$this->nombre = $nombre;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($value) {
		$this->nombre = $value;
	}
}