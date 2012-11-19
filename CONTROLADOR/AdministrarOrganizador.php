<?php

//require_once ('modificaciones.php');
//require_once ('..\MODELO\Actividad.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 23-May-2009 5:08:16 p.m.
 */
class AdministrarOrganizador
{

	public $m_busquedas;
	public $m_eliminarActividad;
	public $m_listas;
	public $m_modificaciones;
	public $m_Actividad;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function AnunciarActividad()
	{
	}

	public function BuscarActividaes($ideCreador)
	{
		require_once ('../MODELO/Datos.php');
		$datos = new Datos();
		return $datos->buscarActvidades($ideCreador);
		
	}

	public function EliminarActividad($nikname,$idactividad)
	{
		require_once ('..\MODELO\Actividad.php');
		$nueva = new Actividad();
		$s = $nueva->eliminar($nikname,$idactividad);
		if ($s) {
			return true;
		}else {
			return false;
		}
	}

	public function ModificarActividad($nueva)
	{   
		require('..\MODELO\Actividad.php');
		$nuevaActvidad = new Actividad();
		
		echo(" 1 bandera de asignacion");
		$nuevaActvidad->setNombre($nueva['nombre']);
		//$nuevaActvidad->setFechaCreacion(date("y-m-d"));
		$nuevaActvidad->setFechaFin($nueva['fechafin']);
		//$nuevaActvidad->setTipo($nueva['tipo']);
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
		//$nuevaActvidad->setTipo($tipoAct);		
		return $nuevaActvidad->actualizar($nueva['idactividad']);
	}

}
?>