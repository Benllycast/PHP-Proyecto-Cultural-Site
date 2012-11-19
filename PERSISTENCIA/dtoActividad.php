<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 7:20:23 p.m.
 */
class dtoActividad
{

	private $asistentes;
	private $boleteria;
	private $capacidad;
	private $costo;
	private $descripcion;
	private $fecha_creacion;
	private $fecha_fin;
	private $fecha_inicio;
	private $hora;
	private $icono;
	private $id;
	private $idcreador;
	private $lugar;
	private $multiple;
	private $nombre;
	private $organizador;
	private $patrocinador;
	private $tipo;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getAsistentes()
	{
		return $this->asistentes;
	}

	public function getBoleteria()
	{
		return $this->boleteria;
	}

	public function getCapacidad()
	{
		return $this->capacidad;
	}

	public function getCosto()
	{
		return $this->costo;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function getFechaCreacion()
	{
		return $this->fecha_creacion;
	}

	public function getFechaFin()
	{
		return $this->fecha_fin;
	}

	public function getFechaInicio()
	{
		return $this->fecha_inicio;
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getPatrocinador()
	{
		return $this->patrocinador;
	}

	public function getIcono()
	{
		return $this->icono;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getIdCreador()
	{
		return $this->idcreador;
	}

	public function getLugar()
	{
		return $this->lugar;
	}

	public function getMultiple()
	{
		return $this->multiple;
	}

	public function getOrganizador()
	{
		return $this->organizador;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * 
	 * @param num
	 */
	public function setAsistentes($num)
	{
		$this->asistentes = $num;
	}

	/**
	 * 
	 * @param bol
	 */
	public function setBoleteria($bol)
	{
		$this->boleteria = $bol;
	}

	/**
	 * 
	 * @param cost
	 */
	public function setCosto($cost)
	{
		$this->costo = $cost;
	}

	/**
	 * 
	 * @param cap
	 */
	public function setCapacidad($cap)
	{
		$this->capacidad = $cap;
	}

	/**
	 * 
	 * @param des
	 */
	public function setDescripcion($des)
	{
		$this->descripcion = $des;
	}

	/**
	 * 
	 * @param fecha
	 */
	public function setFechaFin($fecha)
	{
		$this->fecha_fin = $fecha;
	}

	/**
	 * 
	 * @param fecha
	 */
	public function setFechaInicio($fecha)
	{
		$this->fecha_inicio = $fecha;
	}

	/**
	 * 
	 * @param hor
	 */
	public function setHora($hor)
	{
		$this->hora = $hor;
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
	 * @param ide
	 */
	public function setIdCreador($ide)
	{
		$this->idcreador = $ide;
	}

	/**
	 * 
	 * @param lug
	 */
	public function setLugar($lug)
	{
		$this->lugar = $lug;
	}

	/**
	 * 
	 * @param mul
	 */
	public function setMultiple($mul)
	{
		$this->multiple = $mul;
	}

	/**
	 * 
	 * @param org
	 */
	public function setOrganizador($org)
	{
		$this->organizador = $org;
	}

	/**
	 * 
	 * @param patro
	 */
	public function setPatrocinador($patro)
	{
		$this->patrocinador = $patro;
	}

	/**
	 * 
	 * @param fecha
	 */
	public function setFechaCreacion($fecha)
	{
		$this->fecha_creacion = $fecha;
	}

	/**
	 * 
	 * @param ico
	 */
	public function setIcono($ico)
	{
		$this->icono = $ico;
	}

	/**
	 * 
	 * @param nom
	 */
	public function setNombre($nom)
	{
		$this->nombre = $nom;
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