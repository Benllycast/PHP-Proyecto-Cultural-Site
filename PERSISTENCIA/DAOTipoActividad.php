<?php
//require('dtoTipoActividad.php');
//require('DAO.php');
require('Junction/Junction.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 3:06:15 p.m.
 */
class DAOTipoActividad //implements DAO
{

	public $m_dtoTipoActividad;

	function __construct()
	{
		
	}

	function __destruct()
	{
	}



	public function actualizar()
	{
	}

	public function agregar(array $vectorDTO)
	{
		// require dependencies
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoTipoActividad");

		// have Junction save the user to the database
		foreach ($vectorDTO as $valores){
			$junction->save($valores);
			if ($valores->getID()) {
				$s = true;
			}else {
				$s = false;
			}
		}
		
		return $s;
		//echo "New user saved to database with id = " .$this->m_dtoTipoActividad->getId();
	}

	/**
	 * 
	 * @param restriccion
	 */
	public function buscar($restriccion)
	{
	}

	public function eliminar(dtoTipoActividad $DTO)
	{
		// require dependencies
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoTipoActividad");
		// delete user's with password = newPassword (see UpdateUser script)
		$clause = $junction->createQuery("idactividad = ? ");
		$clause->bind(0, $DTO->getIdActividad());
		$deleted = $junction->deleteWhere($clause);
		echo "Number of tipo deleted: " . $deleted;
	}
	
	public function select(dtoTipoActividad $DTO)
	{
		// require dependencies
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoTipoActividad");
		// delete user's with password = newPassword (see UpdateUser script)
		$clause = $junction->createQuery("idactividad = ? ");
		$clause->bind(0, $DTO->getIdActividad());
		$tip = $junction->loadWhere($clause);
		if ($tip) {
			return $tip;
		}else {
			return false;
		}
	}

}
?>