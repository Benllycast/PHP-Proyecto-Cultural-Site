<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 11-May-2009 7:20:26 p.m.
 */
class dtoUsuario
{

	private $actividades;
	private $activo;
	private $email;
	private $estado;
	private $fechacreacion;
	private $id;
	private $nikname;
	private $password;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getActividades()
	{
		//numero de actividades creadas
		return $this->actividades;
	}

	public function getActivo()
	{
		return $this->activo;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getFechaCreacion()
	{
		return $this->fechacreacion;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getNikname()
	{
		return $this->nikname;
	}

	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * numero de actividades creadas
	 * @param act
	 */
	public function setActividades($act)
	{
		$this->actividades = $act;
	}

	/**
	 * 
	 * @param act
	 */
	public function setActivo($act)
	{
		$this->activo = $act;
	}

	/**
	 * 
	 * @param e
	 */
	public function setEmail($e)
	{
		$this->email = $e;
	}

	/**
	 * 
	 * @param e
	 */
	public function setEstado($e)
	{
		$this->estado = $e;
	}

	/**
	 * 
	 * @param c
	 */
	public function setFechaCreacion($c)
	{
		$this->fechacreacion = $c;
	}

	/**
	 * 
	 * @param i
	 */
	public function setId($i)
	{
		$this->id = $i;
	}

	public function setNikname($n)
	{
		$this->nikname = $n;
	}

	/**
	 * 
	 * @param p
	 */
	public function setPassword($p)
	{
		$this->password = $p;
	}
}
?>