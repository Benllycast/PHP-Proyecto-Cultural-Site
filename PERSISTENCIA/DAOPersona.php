<?php
//require_once ('DAO.php');
//require_once ('dtoPersona.php');
//require("Junction/Junction.php");


/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 12:43:34 p.m.
 */
class DAOPersona //implements DAO
{

	public $m_dtoPersona;

	function __construct()
	{
	}
	function __destruct()
	{
	}



	public function actualizar(dtoPersona $DTO)
	{
		include_once("master.php");
		
		$poderoso = new master();
		$poderoso->setconexion();
		
		$consulta="SELECT * FROM personas WHERE nikname ='".$DTO->getNikname()."'";
			 
		$registros=mysql_query($consulta, $poderoso->getconexion());
			 
		if(mysql_fetch_array($registros)){
			
			if($DTO->getNombre()!= null){
				$actualizacion="UPDATE personas SET nombre ='".$DTO->getNombre()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getApellidos()!= null){
				$actualizacion="UPDATE personas SET apellidos ='".$DTO->getApellidos()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getEdad()!= null){
				$actualizacion="UPDATE personas SET edad ='".$DTO->getEdad()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getDireccion()!= null){
				$actualizacion="UPDATE personas SET direccion ='".$DTO->getDireccion()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getCiudad()!= null){
				$actualizacion="UPDATE personas SET ciudad ='".$DTO->getCiudad()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getLocalidad()!= null){
				$actualizacion="UPDATE personas SET localidad ='".$DTO->getLocalidad()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getPais()!= null){
				$actualizacion="UPDATE personas SET pais ='".$DTO->getPais()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getAmigos()!= null){
				$actualizacion="UPDATE personas SET amigos ='".$DTO->getAmigos()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			
			if($DTO->getSeguimiento()!= null){
				$actualizacion="UPDATE personas SET seguimiento='".$DTO->getSeguimiento()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			$poderoso->closeconexion();
			return true;
		}else {
			$poderoso->closeconexion();
			return false;
		}
	}

	public function agregar($dtoPersona)
	{
		include_once('master.php');
		$poderoso = new master();
		$poderoso->setconexion();
		
		$sql = "INSERT INTO personas(
		nikname,
		nombre,
		apellidos,
		edad,
		direccion,
		ciudad,
		localidad,
		pais,
		amigos,
		seguimiento
		)values(
		'".$dtoPersona->getNikname()."',
		'".$dtoPersona->getNombre()."',
		'".$dtoPersona->getApellidos()."',
		'".$dtoPersona->getEdad()."',
		'".$dtoPersona->getDireccion()."',
		'".$dtoPersona->getCiudad()."',
		'".$dtoPersona->getLocalidad()."',
		'".$dtoPersona->getPais()."','0','0'
		);";
		
		
		$s = mysql_query($sql,$poderoso->getconexion());
		$poderoso->closeconexion();
		if ($s == true)
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
		return $restriccion;
	}

	public function eliminar($DTOPersona)
	{
		include_once('master.php');
		$poderoso = new master();
		$poderoso->setconexion();
		
		$sql = "DELETE FROM personas WHERE personas.nikname='".$DTOPersona->getNikname()."'";
		
		$s=mysql_query($sql, $poderoso->getconexion());
		$poderoso->closeconexion();
		if ($s == true) {
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function select($param)
	{
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoPersona");

		// fetch the users from the database with email foo@bar.com
		$clause = $junction->createQuery("nikname = ?");
		$clause->bind(0,$param->getNikname());
		$users = $junction->loadWhere($clause);
		foreach ($users as $user) { 
				if (strcmp($user->getNikname(),$param->getNikname()) == 0) {
				 	return $user;
			} 
		}
	}
}
?>