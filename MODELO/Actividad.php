<?php


/**
 * llena lso set y los get
 * @author cesarecf
 * @version 1.0
 * @created 14-May-2009 11:35:10 a.m.
 */
class Actividad
{

	private $asistentes;
	private $boleteria;
	private $capacidad;
	private $costo;
	private $descripcion;
	private $fechaCreacion;
	private $fechaFin;
	private $fechaInicio;
	private $hora;
	private $icono;
	private $lugar;
	private $multiple;
	private $nombre;
	private $organizador;
	private $patrocinador;
	private $tipo;
	public $m_Comentario;/**este eatributo solo se
	 						utiliza para cargar los
	 						comentarios de la actvidad
	 						a mostrar en la vista*/

	function __construct()
	{
	}

	function __destruct()
	{
	}
	
	public function getAsistentes()
	{
		return $this->asistentes;
	}

	public function getBoleteria()
	{
		return $this->boleteria;
	}

	public function getCapacidad()
	{
		return $this->capacidad;
	}

	public function getCosto()
	{
		return $this->costo;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function getFechaCreacion()
	{
		return $this->fechaCreacion;
	}

	public function getFechaFin()
	{
		return $this->fechaFin;
	}

	public function getFechaInicio()
	{
		return $this->fechaInicio;
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function getIcono()
	{
		return $this->icono;
	}

	public function getLugar()
	{
		return $this->lugar;
	}

	public function getMultiples()
	{
		return $this->multiple;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getOrganizador()
	{
		return $this->organizador;
	}

	public function getPatrocinador()
	{
		return $this->patrocinador;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * 
	 * @param a
	 */
	public function setAsistentes($a)
	{
		$this->asistentes = $a;
	}

	/**
	 * 
	 * @param bol
	 */
	public function setBoleteria($bol)
	{
		$this->boleteria = $bol;
	}

	/**
	 * 
	 * @param cap
	 */
	public function setCapacidad($cap)
	{
		$this->capacidad = $cap;
	}

	/**
	 * 
	 * @param a
	 */
	public function setCosto($a)
	{
		$this->costo = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setDescripcion($a)
	{
		$this->descripcion = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setFechaCreacion($a)
	{
		$this->fechaCreacion = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setFechaFin($a)
	{
		$this->fechaFin = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setFechaInicio($a)
	{
		$this->fechaInicio = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setHora($a)
	{
		$this->hora = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setIcono($a)
	{
		$this->icono = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setLugar($a)
	{
		$this->lugar = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setMultiple($a)
	{
		$this->multiple = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setNombre($a)
	{
		$this->nombre = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setOrganizador($a)
	{
		$this->organizador = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setPatrocinador($a)
	{
		$this->patrocinador = $a;
	}

	/**
	 * 
	 * @param a
	 */
	public function setTipo($a)
	{		/**@$a es un array de a[] = tipo*/
		$this->tipo = $a;
	}
	
	public function guardar($idcreador)
	{
		require_once('../PERSISTENCIA/DAOActividad.php');
		require_once('../PERSISTENCIA/DAOTipoActividad.php');
		require_once('../PERSISTENCIA/dtoActividad.php');
		require_once('../PERSISTENCIA/dtoTipoActividad.php');
		
		$m_dtoActividad = new dtoActividad();
		$nuevoDAO = new DAOActividad();
		
		$m_dtoActividad->setAsistentes($this->getAsistentes());
		$m_dtoActividad->setBoleteria($this->getBoleteria());
		$m_dtoActividad->setCapacidad($this->getCapacidad());
		$m_dtoActividad->setCosto($this->getCosto());
		$m_dtoActividad->setDescripcion($this->getDescripcion());
		$m_dtoActividad->setFechaCreacion($this->getFechaCreacion());
		$m_dtoActividad->setFechaFin($this->getFechaFin());
		$m_dtoActividad->setFechaInicio($this->getFechaInicio());
		$m_dtoActividad->setHora($this->getHora());
		$m_dtoActividad->setIcono($this->getIcono());
		$m_dtoActividad->setId(null);
		$m_dtoActividad->setIdCreador($idcreador);
		$m_dtoActividad->setLugar($this->getLugar());
		$m_dtoActividad->setMultiple($this->getMultiples());
		$m_dtoActividad->setNombre($this->getNombre());
		$m_dtoActividad->setOrganizador($this->getOrganizador());
		$m_dtoActividad->setPatrocinador($this->getPatrocinador());
		
		$t = $nuevoDAO->agregar($m_dtoActividad);
		if($m_dtoActividad->getId()){
			$dtosTipoActividad = array();
			$tipo = $this->getTipo();
			$i = 0;
			foreach ($tipo as $tipos => $valor ) {
				foreach ($valor as $value) {
					$dtosTipoActividad[$i] = new dtoTipoActividad();
					$dtosTipoActividad[$i]->setIdActividad($m_dtoActividad->getId());
					$dtosTipoActividad[$i]->setTipo($tipos);
					$dtosTipoActividad[$i]->setGenero($value);
					$i++;
				}	
			}
			
			$nuevoDAO2 =new DAOTipoActividad();
			$f = $nuevoDAO2->agregar($dtosTipoActividad);
		}else {
			return false;
		}
		if ($t==true && $f ==true) {
			return true;
		}else {
			return  false;
		}
		
	}
	public function eliminar($nikname,$idActividad)
	{
		require_once('../PERSISTENCIA/dtoActividad.php');
		require_once('../PERSISTENCIA/DAOActividad.php');
		require('../PERSISTENCIA/dtoTipoActividad.php');
		require('../PERSISTENCIA/DAOTipoActividad.php');
		
		$nuevoDAO = new DAOActividad();
		$nuevoDTO = new dtoActividad();
		
		$nuevoDTO->setIdCreador($nikname);
		$nuevoDTO->setId($idActividad);
		
		$s = $nuevoDAO->eliminar($nuevoDTO);
		if ($s){
			$DTOtipo = new dtoTipoActividad();
			$DAOtipo = new DAOTipoActividad();
			$DTOtipo->setIdActividad($idActividad);
			$DAOtipo->eliminar($DTOtipo);
			return true;
		}else {
			return false;
		}
	}
	
	public function cargar($idactividad)
	{
		require_once('../PERSISTENCIA/dtoActividad.php');
		require_once('../PERSISTENCIA/DAOActividad.php');
		require_once('../PERSISTENCIA/dtoTipoActividad.php');
		require_once('../PERSISTENCIA/DAOTipoActividad.php');
		require_once ('Comentario.php');
		$nuevoDAO = new DAOActividad();
		$nuevoDTO = new dtoActividad();
		$nuevoDTO->setId($idactividad);
		$dtos = $nuevoDAO->select($nuevoDTO);
		if ($dtos) {
			//////////////Datos de la actvidad/////////////
			$this->setAsistentes($dtos->getAsistentes());
			$this->setBoleteria($dtos->getBoleteria());
			$this->setCapacidad($dtos->getCapacidad());
			$this->setCosto($dtos->getCosto());
			$this->setDescripcion($dtos->getDescripcion());
			$this->setFechaCreacion($dtos->getFechaCreacion());
			$this->setFechaFin($dtos->getFechaFin());
			$this->setFechaInicio($dtos->getFechaInicio());
			$this->setHora($dtos->getHora());
			$this->setIcono($dtos->getIcono());
			$this->setLugar($dtos->getLugar());
			$this->setMultiple($dtos->getMultiple());
			$this->setNombre($dtos->getNombre());
			$this->setOrganizador($dtos->getOrganizador());
			$this->setPatrocinador($dtos->getPatrocinador());
			/////////tipos de eventos////////////////////////
			$nuevoDTO2 = new dtoTipoActividad();
			$nuevoDAO2 = new DAOTipoActividad();
			$nuevoDTO2->setIdActividad($dtos->getId());
			$tip = $nuevoDAO2->select($nuevoDTO2);
			$eventos = array();
			$i = 0;
			foreach ($tip as $tipos) {
				$eventos[$i] = $tipos->getTipo();
				$i++;
			}
			$this->setTipo($eventos);
			///////////////comentarios de la actividad/////////
			$comentarios = new Comentario();
			$comentarios->setIdActividad($dtos->getId());
			$this->m_Comentario = $comentarios->cargarComentarios();			
			return true;	
		}else {
			return false;
		}		
	}
	
	public function actualizar($idactividad){
		require_once('../PERSISTENCIA/DAOActividad.php');
		require_once('../PERSISTENCIA/dtoActividad.php');
		
		$m_dtoActividad = new dtoActividad();
		$nuevoDAO = new DAOActividad();
		echo(" 2 bandera de asignacion");
		$m_dtoActividad->setAsistentes($this->getAsistentes());
		$m_dtoActividad->setBoleteria($this->getBoleteria());
		$m_dtoActividad->setCapacidad($this->getCapacidad());
		$m_dtoActividad->setCosto($this->getCosto());
		$m_dtoActividad->setDescripcion($this->getDescripcion());
		$m_dtoActividad->setFechaFin($this->getFechaFin());
		$m_dtoActividad->setFechaInicio($this->getFechaInicio());
		$m_dtoActividad->setHora($this->getHora());
		//$m_dtoActividad->setIcono($this->getIcono());
		$m_dtoActividad->setId($idactividad);
		$m_dtoActividad->setLugar($this->getLugar());
		$m_dtoActividad->setMultiple($this->getMultiples());
		$m_dtoActividad->setNombre($this->getNombre());
		$m_dtoActividad->setOrganizador($this->getOrganizador());
		$m_dtoActividad->setPatrocinador($this->getPatrocinador());
		echo("bandera de terminacio asignacion");
		$t = $nuevoDAO->actualizar($m_dtoActividad);
		
		if ($t == true ) {
			return true;
		}else {
			return  false;
		}
	}
}
?>