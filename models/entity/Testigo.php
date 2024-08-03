<?php

/**
 * Testigo
 */

class Testigo
{
	private $id;
	private $idMesa;

	public function __construct($id, $idMesa)
	{

		$this->id = $id;
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

	public function getIdMesa()
	{
		return $this->idMesa;
	}

	public function setIdMesa($value)
	{
		$this->idMesa = $value;
	}
}