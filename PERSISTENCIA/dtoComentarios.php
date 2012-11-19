<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 13-May-2009 09:12:13 a.m.
 */
class dtoComentarios
{

	private $fecha;
	private $id;
	private $idactividad;
	private $idemisor;
	private $mensaje;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getFecha()
	{
		return  $this->fecha;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getIdActividad()
	{
		return $this->idactividad;
	}

	public function getIdEmisor()
	{
		return $this->idemisor;
	}

	public function getMensaje()
	{
		return $this->mensaje;
	}

	/**
	 * 
	 * @param fecha
	 */
	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
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
	 * @param emi
	 */
	public function setIdEmisor($emi)
	{
		$this->idemisor = $emi;
	}

	/**
	 * 
	 * @param men
	 */
	public function setMensaje($men)
	{
		$this->mensaje = $men;
	}

}
?>