<?php
//require_once ('Actividad.php');
require_once ('lista_gustos.php');
//require_once ('Perfil.php');

/**
 * @author cesarecf
 * @version 1.0
 * @created 14-May-2009 11:35:12 a.m.
 */
class Persona
{

	private $apellidos;
	private $ciudad;
	private $direccion;
	private $edad;
	private $localidad;
	private $nombre;
	private $pais;
	public $evento;
	public $m_lista_gustos;

	function __construct()
	{
		$this->m_lista_gustos = new lista_gustos();
	}

	function __destruct()
	{
	}


	public function getLocalidad()
	{
		return  $this->localidad;
	}
	
	public function setLocalidad($lacla)
	{
		$this->localidad = $lacla;
	}
	
	public function getGusto()
	{
		/**
	 * la funcion getGustos()retorna un 
	 * array de objetos tipo gustos*/
		return $this->m_lista_gustos->getGustos();
	}
	
	/**
	 * @param $gustos es un array anidado
	 * de los gustos marcados en la vista*/
	public function setGusto($gustos)
	{
		$this->m_lista_gustos->setGustos($gustos);//////////////////
	}
	
	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function getCiudad()
	{
		return $this->ciudad;
	}

	public function getDepartamento()
	{
		//return $this->departamento
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function getEdad()
	{
		return $this->edad;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getPais()
	{
		return $this->pais;
	}

	public function setApellidos($nuevo)
	{
		$this->apellidos = $nuevo;
	}

	public function setCiudad($nuevo)
	{
		$this->ciudad = $nuevo;
	}

	public function setDepartamento($nuevo)
	{
		//$this->departamento = $nuevo;
	}

	public function setDireccion($nuevo)
	{
		$this->direccion = $nuevo;
	}

	public function setEdad($nuevo)
	{
		$this->edad = $nuevo;
	}

	public function setNombre($nuevo)
	{
		$this->nombre = $nuevo;
	}

	public function setPais($nuevo)
	{
		$this->pais = $nuevo;
	}
	
	public function guardar($nik)
	{
		require_once("../PERSISTENCIA/dtoPersona.php");
		require_once("../PERSISTENCIA/DAOPersona.php");
		$nuevaPersona = new dtoPersona();
		$nuevaPersona->setNombre($this->getNombre());
		$nuevaPersona->setApellidos($this->getApellidos());
		$nuevaPersona->setEdad($this->getEdad());
		$nuevaPersona->setDireccion($this->getDireccion());
		$nuevaPersona->setCiudad($this->getCiudad());
		$nuevaPersona->setPais($this->getPais());
		$nuevaPersona->setLocalidad($this->getLocalidad());
		$nuevaPersona->setNikname($nik);
		$nuevoDAO = new DAOPersona();
		$s = $nuevoDAO->agregar($nuevaPersona);
		if ($s == true) {
			echo "<br>entro a meter los gustos";
			$f = $this->m_lista_gustos->guardar($nik);
		}else {
			echo "<br>uvo problemas en la metida de persona";
			return false;
		}
		if ($s==true && $f == true) {
			return true;
		}else{
			echo "<br>uvo problemas en al meter los gustos";
			return false;
		}
	}
	
	public function eliminar($nik){
		require_once("../PERSISTENCIA/dtoPersona.php");
		require_once("../PERSISTENCIA/DAOPersona.php");
		
		$dtoPersona = new dtoPersona();
		$dtoPersona->setNikname($nik);
		$nuvoDAO = new DAOPersona();
		$s = $nuvoDAO->eliminar($dtoPersona);
		
		if ($s == true) {
			echo "<br>entro a eliminar los gustos";
			$f = $this->m_lista_gustos->eliminarTodos($nik);
		}else {
			echo "<br>no elimina a la persona";
			return false;
		}
		
		if ($s==true && $f == true) {
			return true;
		}else{
			echo "<br>uvo problemas en al meter los gustos";
			return false;
		}
	
	}
	
	public function perfil($nik)
	{
		require_once("../PERSISTENCIA/dtoPersona.php");
		require_once("../PERSISTENCIA/DAOPersona.php");
		
		$dtoPersona = new dtoPersona();
		$dtoPersona->setNikname($nik);
		$nuvoDAO = new DAOPersona();
		$personUser = $nuvoDAO->select($dtoPersona);
		$dtoPersona = null;
		$this->m_lista_gustos->obtenerGustos($nik);
		if($personUser){
				$this->setApellidos($personUser->getApellidos());
				$this->setCiudad($personUser->getCiudad());
				$this->setDireccion($personUser->getDireccion());
				$this->setEdad($personUser->getEdad());
				$this->setNombre($personUser->getNombre());
				$this->setPais($personUser->getPais());
				$this->setLocalidad($personUser->getLocalidad());				
		return true;
		}else{
			return false;
		}
	}
	
	public function actualizar($nik){
		require_once("../PERSISTENCIA/dtoPersona.php");
		require_once("../PERSISTENCIA/DAOPersona.php");
		$nuevaPersona = new dtoPersona();
		$nuevaPersona->setNombre($this->getNombre());
		$nuevaPersona->setApellidos($this->getApellidos());
		$nuevaPersona->setEdad($this->getEdad());
		$nuevaPersona->setDireccion($this->getDireccion());
		$nuevaPersona->setCiudad($this->getCiudad());
		$nuevaPersona->setPais($this->getPais());
		$nuevaPersona->setLocalidad($this->getLocalidad());
		$nuevaPersona->setNikname($nik);
		$nuevoDAO = new DAOPersona();
		$s = $nuevoDAO->actualizar($nuevaPersona);
				
		if ($s==true ) {
			return true;
		}else{
			return false;
		}
	}
}
?>