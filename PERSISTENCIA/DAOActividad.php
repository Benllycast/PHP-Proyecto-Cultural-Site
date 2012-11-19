<?php
//require('dtoActividad.php');
//require('DAO.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 7:20:20 p.m.
 */
class DAOActividad //implements DAO
{

	public $m_dtoActividad;

	function __construct( )
	{
		
	}

	function __destruct()
	{
	}
	public function actualizar(dtoActividad $DTO)
	{
		include_once("master.php");
		
		$poderoso = new master();
		$poderoso->setconexion();
		
		$consulta="SELECT * FROM actividades WHERE id =".$DTO->getId()."";
			 
		$registros=mysql_query($consulta, $poderoso->getconexion());
			 
		if(mysql_fetch_array($registros)){
			echo("bandera de DAO");
			if($DTO->getAsistentes()!= null){
				$actualizacion="UPDATE actividades SET asistentes ='".$DTO->getAsistentes()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}

			if($DTO->getBoleteria()!= null){
				$actualizacion="UPDATE actividades SET boleteria ='".$DTO->getBoleteria()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getCapacidad()!= null){
				$actualizacion="UPDATE actividades SET capacidad ='".$DTO->getCapacidad()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getCosto()!= null){
				$actualizacion="UPDATE actividades SET costo ='".$DTO->getCosto()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getDescripcion()!= null){
				$actualizacion="UPDATE actividades SET descripcion ='".$DTO->getDescripcion()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getFechaFin()!= null){
				$actualizacion="UPDATE actividades SET fecha_fin ='".$DTO->getFechaFin()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getFechaInicio()!= null){
				$actualizacion="UPDATE actividades SET fecha_inicio ='".$DTO->getFechaInicio()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getHora()!= null){
				$actualizacion="UPDATE actividades SET hora ='".$DTO->getHora()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getIcono()!= null){
				$actualizacion="UPDATE actividades SET icono ='".$DTO->getIcono()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getLugar()!= null){
				$actualizacion="UPDATE actividades SET lugar ='".$DTO->getLugar()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getMultiple()!= null){
				$actualizacion="UPDATE actividades SET multiple ='".$DTO->getMultiple()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getNombre()!= null){
				$actualizacion="UPDATE actividades SET nombre ='".$DTO->getNombre()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getOrganizador()!= null){
				$actualizacion="UPDATE actividades SET organizador ='".$DTO->getOrganizador()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			if($DTO->getPatrocinador()!= null){
				$actualizacion="UPDATE actividades SET patrocinador ='".$DTO->getPatrocinador()."' WHERE id =".$DTO->getId()."";
				mysql_query($actualizacion, $poderoso->getconexion());
			}
			$poderoso->closeconexion();
			return true;
		}else {
			$poderoso->closeconexion();
			return false;
		}
	}

	public function agregar(dtoActividad $m_dtoActividad)
	{
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoActividad");

		// have Junction save the user to the database
		$junction->save($m_dtoActividad);
		if($m_dtoActividad->getId())
		{
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * 
	 * @param ideCreador
	 */
	public function buscar($ideCreador)
	{
		include_once("master.php");
		
		$poderoso = new master();
		$poderoso->setconexion();
		
		$consulta="SELECT * FROM actividades WHERE idCreador ='".$ideCreador."'";
			 
		$registros=mysql_query($consulta, $poderoso->getconexion());
		$actividades = mysql_fetch_array($registros);
		$poderoso->closeconexion();
		if ($actividades) {
			return $registros;
		}else {
			return false;
		}
	}

	public function eliminar(dtoActividad $DTO)
	{
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoActividad");
	
		// delete user's with password = newPassword (see UpdateUser script)
		$clause = $junction->createQuery("id = ? AND idCreador = ?");
		$clause->bind(0, $DTO->getId());
		$clause->bind(1, $DTO->getIdCreador());
		$deleted = $junction->deleteWhere($clause);
		if ($deleted) {
			echo "Number of activity deleted: " . $deleted;
			return $deleted;
		}else {
			return false;
		}
	}
	
	public function select(dtoActividad $DTO)
	{
		require_once("Junction/Junction.php");

		// create a new Junction session for the user object
		$junction = Junction::construct("dtoActividad");

		// fetch the users from the database with email foo@bar.com
		$clause = $junction->createQuery("id = ?");
		
		$clause->bind(0,$DTO->getId());
		$activity = $junction->loadWhere($clause);
		foreach ($activity as $user) { 
			if ($user->getId()==$DTO->getId()) {
			 	return $user;
			 } 
		}
	}

}
?>