<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 12:41:57 p.m.
 */
class dtoPersona
{

	private $amigos;
	private $apellidos;
	private $ciudad;
	private $direccion;
	private $edad;
	private $id;
	private $localidad;
	private $nombre;
	private $nikname;
	private $pais;
	private $seguimiento;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getAmigos()
	{
		return $this->amigos;//retorna un array o un valor numerico
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function getCiudad()
	{
		return $this->ciudad;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function getEdad()
	{
		return $this->edad;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getLocalidad()
	{
		return  $this->localidad;
	}

	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function getNikname()
	{
		return $this->nikname;
	}

	public function getPais()
	{
		return $this->pais;
	}

	public function getSeguimiento()
	{
		return $this->seguimiento;//retorna un array o un valor numerico
	}

	/**
	 * 
	 * @param friend aqui hay que hacer la agregacion de la un array
	 */
	public function setAmigos($friend)
	{
		$this->amigos = $friend;
	}

	/**
	 * 
	 * @param ape
	 */
	public function setApellidos($ape)
	{
		$this->apellidos = $ape;
	}

	/**
	 * 
	 * @param ciu
	 */
	public function setCiudad($ciu)
	{
		$this->ciudad = $ciu;
	}

	/**
	 * 
	 * @param direc
	 */
	public function setDireccion($direc)
	{
		$this->direccion = $direc;
	}

	/**
	 * 
	 * @param eda
	 */
	public function setEdad($eda)
	{
		$this->edad = $eda;
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
	 * @param lacla
	 */
	public function setLocalidad($lacla)
	{
		$this->localidad = $lacla;
	}

	/**
	 * 
	 * @param nom
	 */
	public function setNombre($nom)
	{
		$this->nombre = $nom;
	}
	
	public function setNikname($nik)
	{
		$this->nikname = $nik;
	}

	/**
	 * 
	 * @param p
	 */
	public function setPais($p)
	{
		$this->pais = $p;
	}

	/**
	 * 
	 * @param seg aqui hay que hacer la agregacion de la un array
	 */
	public function setSeguimiento($seg)
	{
		$this->seguimiento = $seg;
	}

}
?>