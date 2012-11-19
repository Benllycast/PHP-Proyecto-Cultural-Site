<?php 
/**
 * @author Benlly
 * @version 1.0
 * @created 12-May-2009 7:20:20 p.m.
 */

class Datos
{
	public function buscarActvidades($idecreador){
		require_once('../PERSISTENCIA/DAOActividad.php');
		$nuevoDAO = new DAOActividad();
		$actividades = $nuevoDAO->buscar($idecreador);
		if ($actividades) {
			return $actividades;
		}else {
			return false;
		}
	}	
}


?>