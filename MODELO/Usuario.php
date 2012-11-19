<?php
require('Persona.php');
//require ('../PERSISTENCIA/DAOUsuario.php');
//require_once('../PERSISTENCIA/dtoUsuario.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 14-May-2009 11:35:02 a.m.
 */
class Usuario extends Persona
{

	private $actividades;
	private $activo;
	private $codigo;//=> id
	private $email;
	private $estado;
	private $fechaCreacion;
	private $nikname;
	private $password;
	private $tipo;
	public $m_DAOUsuarios;

	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
	}


	public function getActividades()
	{
		return $this->actividades;
	}
	
	public function setActividades($act)
	{
		$this->actividades = $act;
	}
	
	public function getActivo(){
		return $this->activo;
	}
	
	public function setActivo($act){
		$this->activo = $act;
	}
	
	public function getFechacreacion(){
		return $this->fechaCreacion;
	}
	
	public function setFechacreacion($fecha){
		$this->fechaCreacion = $fecha;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($e)
	{
		$this->email = $e;
	}
	
	public function getCodigo()
	{
		return  $this->codigo;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getNik()
	{
		return $this->nikname;
	}

	public function getpassword()
	{
		return $this->password;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setCodigo()
	{
		return $this->codigo;
	}

	public function setEstado($est)
	{
		$this->estado = $est;
	}

	public function setNick($nik)
	{
		$this->nikname = $nik;
	}

	public function setPassword($pass)
	{
		$this->password = $pass;
	}

	public function setTipo($tip)
	{
		$this->tipo = $tip;
	}
	
	public function guardar(){
		require_once('../PERSISTENCIA/DAOUsuario.php');
		require_once('../PERSISTENCIA/dtoUsuario.php');
		$nuevoUsuario = new dtoUsuario();
		$nuevoUsuario->setActividades($this->getActividades());
		$nuevoUsuario->setActivo($this->getActivo());
		$nuevoUsuario->setEmail($this->getEmail());
		$nuevoUsuario->setEstado($this->getEstado());
		$nuevoUsuario->setFechaCreacion($this->getFechacreacion());
		$nuevoUsuario->setId(null);
		$nuevoUsuario->setNikname($this->getNik());
		$nuevoUsuario->setPassword($this->getpassword());
		$nuevoDAO = new DAOUsuario();
		$t = $nuevoDAO->agregar($nuevoUsuario);
		
		if ($t == true) {
			$f = parent::guardar($this->getNik());/////////////////
		}
		
		if ($t && $f) {
			return true;
		}else {
			return false;
		}
	}
	
	public function eliminar()
	{
		require_once('../PERSISTENCIA/DAOUsuario.php');
		require_once('../PERSISTENCIA/dtoUsuario.php');
		
		$dtoUsuario = new dtoUsuario();
		$dtoUsuario->setNikname($this->getNik());
		$nuevoDAO = new DAOUsuario();
		$t = $nuevoDAO->eliminar($dtoUsuario);
		if ($t == true) {
			$f = parent::eliminar($this->getNik());
			//return true;
		}else{return false;}		
		if ($t && $f) {
			return true;
		}else {
			return false;
		}
	}
	
	public function buscar()
	{
		require_once('../PERSISTENCIA/DAOUsuario.php');
		require_once('../PERSISTENCIA/dtoUsuario.php');
		
		$nuevoDAO = new DAOUsuario();
		$nuevoDTO = $nuevoDAO->buscar($this->getNik());
		if ($nuevoDTO == null) {
			return false;
		}else {
			$this->setNick($nuevoDTO->getNikname());
			$this->setPassword($nuevoDTO->getPassword());
			$this->setCodigo($nuevoDTO->getId());
			$this->setActividades($nuevoDTO->getActividades());
			$this->setActivo($nuevoDTO->getActivo());
			$this->setEmail($nuevoDTO->getEmail());
			$this->setEstado($nuevoDTO->getEstado());
			$this->setFechacreacion($nuevoDTO->getFechaCreacion());
			return true;
		}
	}
	
	public function perfil()
	{
		require_once('../PERSISTENCIA/DAOUsuario.php');
		require_once('../PERSISTENCIA/dtoUsuario.php');

		$nuevoDTO = new dtoUsuario();
		$nuevoDAO = new DAOUsuario();
		
		$nuevoDTO->setNikname($this->getNik());	
		$users = $nuevoDAO->select($nuevoDTO);
		$nuevoDTO = null;
		
		if($users && parent::perfil($this->getNik())){
				$this->setActividades($users->getActividades());
				$this->setActivo($users->getActivo());
				$this->setEmail($users->getEmail());
				$this->setEstado($users->getEstado());
				$this->setNick($users->getNikname());
				//$this->setTipo($users->getTipo());
				$this->setFechacreacion($users->getFechaCreacion());
		return true;
		}else{
			return false;
		}
	}
	
	public function actualizar(){
		require_once('../PERSISTENCIA/DAOUsuario.php');
		require_once('../PERSISTENCIA/dtoUsuario.php');
		$nuevoUsuario = new dtoUsuario();
		$nuevoUsuario->setActividades($this->getActividades());
		$nuevoUsuario->setActivo($this->getActivo());
		$nuevoUsuario->setEmail($this->getEmail());
		$nuevoUsuario->setEstado($this->getEstado());
		$nuevoUsuario->setPassword($this->getpassword());
		$nuevoUsuario->setNikname($this->getNik());
		$nuevoDAO = new DAOUsuario();		
		$t = $nuevoDAO->actualizar($nuevoUsuario);
		
		if ($t == true) {
			$f= parent::actualizar($this->getNik());
		}
		
		if ($t && $f) {
			return true;
		}else {
			return false;
		}
	}
}
?>