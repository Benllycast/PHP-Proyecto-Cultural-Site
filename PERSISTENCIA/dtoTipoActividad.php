<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 3:06:17 p.m.
 */
class dtoTipoActividad
{

	private $genero;
	private $id;
	private $idactividad;
	private $tipo;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getGenero()
	{
		return $this->genero;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getIdActividad()
	{
		return $this->idactividad;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * 
	 * @param gen
	 */
	public function setGenero($gen)
	{
		$this->genero = $gen;
	}

	/**
	 * 
	 * @param ide
	 */
	public function setId($ide)
	{
		$this->id = $ide;
	}

	/**
	 * 
	 * @param act
	 */
	public function setIdActividad($act)
	{
		$this->idactividad = $act;
	}

	/**
	 * 
	 * @param tip
	 */
	public function setTipo($tip)
	{
		$this->tipo = $tip;
	}

}
?>