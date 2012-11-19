<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 11-May-2009 10:01:41 a.m.
 */
class dtoAmigos
{

	private $id;
	private $idamigo;
	private $idusuario;
	private $relacion;

	function __construct()
	{
	}

	function __destruct()
	{
	}
	public function getId()
	{
		return$this->id;
	}

	public function getIdAmigo()
	{
		return $this->idamigo;
	}

	public function getIdUsuario()
	{
		return $this->idusuario;
	}

	public function getRelacion()
	{
		return $this->relacion;
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
	 * @param ami
	 */
	public function setIdAmigo($ami)
	{
		$this->idamigo = $ami;
	}

	/**
	 * 
	 * @param usu
	 */
	public function setIdUsuario($usu)
	{
		$this->idusuario = $usu;
	}

	/**
	 * 
	 * @param rel
	 */
	public function setRelacion($rel)
	{
		$this->relacion = $rel;
	}

}
?>