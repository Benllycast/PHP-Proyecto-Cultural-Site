<?php

require ('DAO.php');
require ('dtoAmigos.php');
require("Junction/Junction.php");


/**
 * @author Benlly
 * @version 1.0
 * @created 11-May-2009 10:01:40 a.m.
 */
class DAOAmigos //implements DAO
{

	public $m_dtoAmigos;

	function __construct($ide,$ami,$usu,$rel)
	{
		$this->m_dtoAmigos = new dtoAmigos();
		$this->m_dtoAmigos->setId($ide);
		$this->m_dtoAmigos->setIdAmigo($ami);
		$this->m_dtoAmigos->setIdUsuario($usu);
		$this->m_dtoAmigos->setRelacion($rel);
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
		$junction = Junction::construct("dtoAmigos");

		// have Junction save the user to the database
		$junction->save($this->m_dtoAmigos);

		echo "New user saved to database with id = " .$this->m_dtoAmigos->getId();
	}

	/**
	 * 
	 * @param restriccion = parametro de restriccion de busqueda
	 */
	public function buscar($restriccion)
	{
		return $restriccion;
	}

	public function eliminar()
	{
	}

}
?>