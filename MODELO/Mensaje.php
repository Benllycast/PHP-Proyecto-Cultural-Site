<?php

/**
 * @author Benlly
 * @version 1.0
 * @created 14-May-2009 11:35:08 a.m.
 */
class Mensaje
{

	private $emisor;
	private $mensaje;
	private $receptor;
	private $tiempo;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getEmisor()
	{
		return $this->emisor;
	}

	public function getMensaje()
	{
		return $this->mensaje;
	}

	public function getReceptor()
	{
		return $this->receptor;
	}

	public function getTiempo()
	{
		return $this->tiempo;
	}

	

	/**
	 * 
	 * @param emi
	 */
	public function setEmisor($emi)
	{
		$this->emisor = $emi;
	}

	/**
	 * 
	 * @param humo
	 */
	public function setMensaje($humo)
	{
		$this->mensaje = $humo;
	}

	/**
	 * 
	 * @param user
	 */
	public function setReceptor($user)
	{
		$this->receptor = $user;
	}

	/**
	 * 
	 * @param temp
	 */
	public function setTiempo($temp)
	{
		$this->tiempo = $temp;
	}

}
?>