<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 3:06:06 p.m.
 */
class dtoGustos
{

	private $genero;
	private $id;
	private $idUsuario;
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
		return  $this->id;
	}

	public function getIdUsuario()
	{
		return $this->idUsuario;
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
	 * @param usu
	 */
	public function setIdUsuario($usu)
	{
		$this->idUsuario = $usu;
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