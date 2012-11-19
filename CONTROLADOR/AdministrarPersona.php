<?php
//require_once ('..\MODELO\Actividad.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 23-May-2009 8:37:51 p.m.
 */
class AdministrarPersona
{

	public $m_Actividad;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	public function AsistirActividad()
	{
	}

	public function ListarActivdadAmigo()
	{
	}

	public function MostrarActividad($idactividad)
	{
		require_once ('..\MODELO\Actividad.php');
		$nueva = new Actividad();
		$s = $nueva->cargar($idactividad);
		if ($s) {
			$answer = array();
			$answer['asistentes']=$nueva->getAsistentes();
			$answer['boleteria']=$nueva->getBoleteria();
			$answer['capacidad']=$nueva->getCapacidad();
			$answer['costo']=$nueva->getCosto();
			$answer['descripcion']=$nueva->getDescripcion();
			$answer['fechacreacion']=$nueva->getFechaCreacion();
			$answer['fechainicio']=$nueva->getFechaInicio();
			$answer['fechafin']=$nueva->getFechaFin();
			$answer['hora']=$nueva->getHora();
			$answer['icono']=$nueva->getIcono();
			$answer['lugar']=$nueva->getLugar();
			$answer['multiple']=$nueva->getMultiples();
			$answer['nombre']=$nueva->getNombre();
			$answer['organizador']=$nueva->getOrganizador();
			$answer['patrocinador']=$nueva->getPatrocinador();
			$tip = $nueva->getTipo();
			$i = 0;
			foreach ($tip as $tipos) {
				$answer['tipo'][$i] = $tipos;
				$i++;
			}
			$comentarios = $nueva->m_Comentario;
			$respuesta = array();
			$respuesta['datos']=$answer;
			$respuesta['comentarios']=$comentarios;
			//return $answer;
			return $respuesta;			
		}else {
			return false;
		}

	}

	public function SeguirActividad()
	{
	}

}
?>