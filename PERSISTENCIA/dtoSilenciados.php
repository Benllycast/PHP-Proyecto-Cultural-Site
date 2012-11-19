<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 11:14:45 p.m.
 */
class dtoSilenciados
{

	private $id;
	private $idsilenciado;
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

	public function getIdSilenciado()
	{
		return $this->idsilenciado;
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
	 * @param sil
	 */
	public function setIdSilenciado($sil)
	{
		$this->idsilenciado = $sil;
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