<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 11:14:47 p.m.
 */
class dtoSeguimiento
{

	private $id;
	private $idactvidad;
	private $idusuario;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getId()
	{
		return $this->id;
	}

	public function getIdActividad()
	{
		return $this->idactvidad;
	}

	public function getIdUsuario()
	{
		return $this->idusuario;
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
		$this->idactvidad = $act;
	}

	/**
	 * 
	 * @param usu
	 */
	public function setIdUsuario($usu)
	{
		$this->idusuario = $usu;
	}

}
?>