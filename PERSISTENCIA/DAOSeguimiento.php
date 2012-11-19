<?php
require ('dtoSeguimiento.php');
//require ('DAO.php');
require('Junction/Junction.php');
/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 11:14:50 p.m.
 */
class DAOSeguimiento //implements DAO
{

	public $m_dtaSeguimiento;

	function __construct($ide,$usu,$act)
	{
		$this->m_dtaSeguimiento = new dtoSeguimiento();
		$this->m_dtaSeguimiento->setId($ide);
		$this->m_dtaSeguimiento->setIdUsuario($usu);
		$this->m_dtaSeguimiento->setIdActividad($act);
	}

	function __destruct()
	{
	}



	public function actualizar()
	{
	}

	public function agregar()
	{
		// require dependencies
		//require("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoSeguimiento");

		// have Junction save the user to the database
		$junction->save($this->m_dtaSeguimiento);

		echo "New user saved to database with id = " .$this->m_dtaSeguimiento->getId();
	}

	/**
	 * 
	 * @param restriccion
	 */
	public function buscar($restriccion)
	{
	}

	public function eliminar()
	{
	}

}
?>