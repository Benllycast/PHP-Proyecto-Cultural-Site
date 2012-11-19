<?php


/**
 * @author Benlly
 * @version 1.0
 * @created 18-May-2009 1:53:05 p.m.
 */
class CrearActividad
{

	public $m_Actividad;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function CrearNuevaActividad($nueva,$tipoAct)
	{///falta el ide de creador en la funcion
		require('..\MODELO\Actividad.php');
		$nuevaActvidad = new Actividad();
		$nuevaActvidad->setNombre($nueva['nombre']);
		$nuevaActvidad->setFechaCreacion(date("y-m-d"));
		$nuevaActvidad->setFechaFin($nueva['fechafin']);
		$nuevaActvidad->setTipo($nueva['tipo']);
		$nuevaActvidad->setFechaInicio($nueva['fechainicio']);		
		$nuevaActvidad->setCosto($nueva['costo']);
		$nuevaActvidad->setBoleteria($nueva['boleteria']);		
		$nuevaActvidad->setAsistentes($nueva['asistentes']);		
		$nuevaActvidad->setPatrocinador($nueva['patrocinador']);
		$nuevaActvidad->setOrganizador($nueva['organizador']);
		$nuevaActvidad->setMultiple($nueva['multiple']);
		$nuevaActvidad->setDescripcion($nueva['descripcion']);
		$nuevaActvidad->setLugar($nueva['lugar']);
		$nuevaActvidad->setHora($nueva['hora']);		
		$nuevaActvidad->setCapacidad($nueva['capacidad']);
		$nuevaActvidad->setTipo($tipoAct);		
		return $nuevaActvidad->guardar($nueva['idcreador']);		
	}

	public function AnadirInformacion()
	{
	}

}
?>