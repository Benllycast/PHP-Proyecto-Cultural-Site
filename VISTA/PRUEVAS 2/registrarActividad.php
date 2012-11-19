<?php
require('../CONTROLADOR/CrearActividad.php');

if (!$_POST['nombre']||
	(!$_POST['fechainicio'])||
	(!$_POST['fechafin'])||
	(!$_POST['costo'])||
	(!$_POST['boleteria'])||
	(!$_POST['asistentes'])||
	(!$_POST['patrocinador'])||
	(!$_POST['organizador'])||
	(!$_POST['idcreador'])||
	(!$_POST['descripcion'])||
	(!$_POST['lugar'])||
	(!$_POST['hora'])||
	(!$_POST['capacidad'])) {
		echo "ingrese todos los campos requeridos";	
}else {////falta el id de creador
	$nueva = array('nombre'=>$_POST['nombre'],
					'fechainicio'=>$_POST['fechainicio'],
					'fechafin'=>$_POST['fechafin'],
					'costo'=>$_POST['costo'],
					'boleteria'=>$_POST['boleteria'],
					'asistentes'=>$_POST['asistentes'],
					'patrocinador'=>$_POST['patrocinador'],
					'organizador'=>$_POST['organizador'],
					'multiple'=>$_POST['multiple'],
					'idcreador'=>$_POST['idcreador'],
					'descripcion'=>$_POST['descripcion'],
					'lugar'=>$_POST['lugar'],
					'hora'=>$_POST['hora'],
					'capacidad'=>$_POST['capacidad']);
	$tipoAct = array();
	if($_POST['musical']){
		$tipoAct['musical'] = $_POST['musical'];
	}
	if ($_POST['deportivo']){
		$tipoAct['deportivo'] = $_POST['deportivo'];
	}
	
	$s = CrearActividad::CrearNuevaActividad($nueva,$tipoAct);
	if ($s == true) {
		echo "la actividad ha sido creada con los datos:\n
			nombre -> ".$nueva['nombre']."\n
			fecha inicio -> ".$nueva['fechainicio']."\n
			fecha fin -> ".$nueva['fechafin']."\n
			costo ->".$nueva['costo'];
	}else {
		echo "PROBLEMA ///////////////////NOSE";
	}
}

?>