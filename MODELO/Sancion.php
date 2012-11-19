<?php
require_once ('Usuario.php');
require_once ('DAOSancion.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 14-May-2009 11:35:04 a.m.
 */
class Sancion
{

	private $fecha;
	private $reportado;
	private $sancionElegida;
	public $m_DAOSancion;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function getFecha()
	{
	}

	public function getReportado()
	{
	}

	public function getSancion()
	{
	}

	/**
	 * 
	 * @param fecha
	 */
	public function setFecha($fecha)
	{
	}

	/**
	 * 
	 * @param rep
	 */
	public function setReportado(Usuario $rep)
	{
	}

	/**
	 * 
	 * @param san
	 */
	public function setSancion($san)
	{
	}

}
?>