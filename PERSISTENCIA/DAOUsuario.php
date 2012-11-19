<?php
//require ('DAO.php');
//require_once('dtoUsuario.php');
//require("Junction/Junction.php");


/**
 * @author Benlly
 * @version 1.0
 * @created 11-May-2009 7:19:44 p.m.
 */
class DAOUsuario //implements DAO    
{

	public $m_dtoUsuario;

	function __construct()
	{
		
	}

	function __destruct()
	{
	}



	public function actualizar(dtoUsuario $DTO)
	{
		include_once("master.php");
		
		$poderoso = new master();
		$poderoso->setconexion();
		
		$consulta="SELECT * FROM usuarios WHERE nikname ='".$DTO->getNikname()."'";
			 
		$registros=mysql_query($consulta, $poderoso->getconexion());
			 
		if(mysql_fetch_array($registros)){
		
			if($DTO->getPassword()!= null){
				$actualizacion="UPDATE usuarios SET password ='".$DTO->getPassword()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}			
			if($DTO->getActividades()!= null){
				$actualizacion="UPDATE usuarios SET actividades ='".$DTO->getActividades()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}			
			if($DTO->getActivo()!= null){
				$actualizacion = "UPDATE usuarios SET activo ='".$DTO->getActivo()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getEmail()!= null){
				$actualizacion="UPDATE usuarios SET email ='".$DTO->getEmail()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getEstado()!= null){
				$actualizacion="UPDATE usuarios SET estado ='".$DTO->getEstado()."' WHERE nikname ='".$DTO->getNikname()."'";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			$poderoso->closeconexion();
			return true;		
		}else{
			$poderoso->closeconexion();
			return false;
		}
	}
	public function agregar($DTOUsuario)
	{
		include_once('master.php');
		$poderoso = new master();
		$poderoso->setconexion();
		
		$agregar = "INSERT INTO usuarios(
		nikname,
		password,
		email,
		estado,
		activo,
		actividades,
		fechaCreacion
		)values(
		'".$DTOUsuario->getNikname()."',
		'".$DTOUsuario->getPassword()."',
		'".$DTOUsuario->getEmail()."',
		'".$DTOUsuario->getEstado()."',
		'".$DTOUsuario->getActivo()."',
		'".$DTOUsuario->getActividades()."',
		'".$DTOUsuario->getFechaCreacion()."'
		)";
		
		$s=mysql_query($agregar, $poderoso->getconexion());
		$poderoso->closeconexion();
		if ($s == true) {
			return true;
		}
		else
		{
			return false;
		}
	}

	public function buscar($nik)
	{
		include_once('master.php');
		$poderoso = new master();
		$poderoso->setconexion();
		
		$sql = "SELECT * FROM usuarios WHERE nikname = '".$nik."'";
		$query = mysql_query($sql, $poderoso->getconexion());
		$poderoso->closeconexion();
		
		if (($query == true)&&(mysql_num_rows($query)!= 0)) {
			$registros = mysql_fetch_array($query);
			require_once('dtoUsuario.php');
			$DTOusuario = new dtoUsuario();
			$DTOusuario->setId($registros['id']);
			$DTOusuario->setActividades($registros['actividades']);
			$DTOusuario->setActivo($registros['activo']);
			$DTOusuario->setEmail($registros['email']);
			$DTOusuario->setEstado($registros['estado']);
			$DTOusuario->setFechaCreacion($registros['fechaCreacion']);
			$DTOusuario->setNikname($registros['nikname']);
			$DTOusuario->setPassword($registros['password']);
			return $DTOusuario;
		}else {
			echo mysql_error();
			return null;
		} 
		
		//return $nik;ojo que esta funcion no hace su trabajo
	}

	public function eliminar($DTOUsuario)
	{
		include_once('master.php');
		$poderoso = new master();
		$poderoso->setconexion();
		
		$sql = "DELETE FROM usuarios WHERE usuarios.nikname='".$DTOUsuario->getNikname()."'";
		
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
		$junction = Junction::construct("dtoUsuario");

		// fetch the users from the database with email foo@bar.com
		$clause = $junction->createQuery("nikname = ?");
		//echo("".$param->getNikname());
		$clause->bind(0,$param->getNikname());
		$users = $junction->loadWhere($clause);
		foreach ($users as $user) { 
			if (strcmp($user->getNikname(),$param->getNikname()) == 0) {
			 	return $user;
			 } 
		}
	}
	
	public function seletAll()
	{
		
	}

}
?>