<?php

/**
 * Candidato
 */

class Candidato
{
	private $id;
	private $numero;
	private $idCategoria;

	public function __construct($id, $numero, $idCategoria)
	{

		$this->id = $id;
		$this->numero = $numero;
		$this->idCategoria = $idCategoria;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($value)
	{
		$this->id = $value;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($value)
	{
		$this->numero = $value;
	}

	public function getIdCategoria()
	{
		return $this->idCategoria;
	}

	public function setIdCategoria($value)
	{
		$this->idCategoria = $value;
	}
}