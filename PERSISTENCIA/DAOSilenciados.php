<?php
require ('dtoSilenciados.php');
//require ('DAO.php');
require('Junction/Junction.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 11:14:42 p.m.
 */
class DAOSilenciados //implements DAO
{

	public $m_dtoSilenciados;

	function __construct($ide,$usu,$sil)
	{
		$this->m_dtoSilenciados = new dtoSilenciados();
		$this->m_dtoSilenciados->setId($ide);
		$this->m_dtoSilenciados->setIdSilenciado($sil);
		$this->m_dtoSilenciados->setIdUsuario($usu);
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
		$junction = Junction::construct("dtoSilenciados");

		// have Junction save the user to the database
		$junction->save($this->m_dtoSilenciados);

		echo "New user saved to database with id = " .$this->m_dtoSilenciados->getId();
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