<?php
//require('dtoGustos.php');
//require('DAO.php');
//require('Junction/Junction.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 3:06:13 p.m.
 */
class DAOGustos //implements DAO
{

	//public $m_dtoGustos;

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
		require("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoGustos");

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
	}

	public function buscar($restriccion)
	{
	}

	public function eliminar(array $vectorDTO)
	{
	}
	
	public function eliminarTodos($DTO)
	{
		require("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoGustos");

		// delete user's with password = newPassword (see UpdateUser script)
		$clause = $junction->createQuery("idusuario = ?");
		$clause->bind(0, $DTO->getIdUsuario());
		$deleted = $junction->deleteWhere($clause);
		if ($deleted) {
			echo("gustos eliminados".$deleted);
			return true;
		}else {
			return false;
		}
	}
	
	public function select(dtoGustos $DTO)
	{
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoGustos");
		
		// fetch the users from the database with email foo@bar.com
		$clause = $junction->createQuery("idusuario = ?");
		$clause->bind(0, $DTO->getIdUsuario());
		$gustos = $junction->loadWhere($clause);
		if ($gustos) {
			return $gustos;
		}else{
			return false;
		}
	}

}
?>