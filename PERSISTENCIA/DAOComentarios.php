<?php
//require('dtoComentarios.php');
//require_once ('DAO.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 13-May-2009 09:12:25 a.m.
 */
class DAOComentarios //implements DAO
{

	public $m_dtoComentarios;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function actualizar()
	{
	}

	public function agregar($m_dtoComentarios)
	{
		
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoComentarios");

		// have Junction save the user to the database
		$junction->save($m_dtoComentarios);
		
		if($m_dtoComentarios->getId())
		{
			return true;
		}
		else {
			return false;
		}		
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
	
	public function select(dtoComentarios $DTO){
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoComentarios");

		// fetch the users from the database with email foo@bar.com
		$clause = $junction->createQuery("idactividad = ?");		
		$clause->bind(0,$DTO->getIdActividad());
		$coment = $junction->loadWhere($clause);
		if ($coment) {
			return $coment;
		}else {
			return false;
		}
	}

}
?>