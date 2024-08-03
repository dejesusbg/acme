<?php

/**
 * Voto
 */

class Voto
{
    private $id;
    private $idMesa;
    private $idCandidato;

	public function __construct($id, $idMesa, $idCandidato) {

		$this->id = $id;
		$this->idMesa = $idMesa;
		$this->idCandidato = $idCandidato;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getIdMesa() {
		return $this->idMesa;
	}

	public function setIdMesa($value) {
		$this->idMesa = $value;
	}

	public function getIdCandidato() {
		return $this->idCandidato;
	}

	public function setIdCandidato($value) {
		$this->idCandidato = $value;
	}
}