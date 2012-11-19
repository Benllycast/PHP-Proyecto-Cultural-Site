<?php
/**
 * @author Benlly
 * @version 1.0
 * @created 14-May-2009 1:28:19 p.m.
 */
class AdministracionUsuario
{

	public $m_Usuario;

	function __construct()
	{		
	}

	function __destruct()
	{
	}
	/**guarda la informacion
	 * de un nuevo usuario*/
	public function CrearUsuario($vector,$gustos)
	{
		require('../MODELO/Usuario.php');
		$m_Usuario = new Usuario();
		$m_Usuario->setActividades(0);
		$m_Usuario->setActivo(0);
		$m_Usuario->setCodigo("");
		$m_Usuario->setEmail($vector['email']);
		$m_Usuario->setEstado('ok');
		$m_Usuario->setFechacreacion(date("y-m-d"));
		$m_Usuario->setNick($vector['nikname']);
		$m_Usuario->setPassword($vector['password']);
		$m_Usuario->setTipo("");
		$m_Usuario->setNombre($vector['nombre']);
		$m_Usuario->setApellidos($vector['apellido']);
		$m_Usuario->setEdad($vector['edad']);
		$m_Usuario->setGusto($gustos);////////////////////////////
		$m_Usuario->setDireccion($vector['direccion']);
		$m_Usuario->setLocalidad($vector['localidad']);
		$m_Usuario->setCiudad($vector['ciudad']);
		$m_Usuario->setPais($vector['pais']);
		$s = $m_Usuario->guardar();
		if ($s == true) {
			return true;
		}
		else
		{
			return false;
		}
	}
	/**elimina toda la
	 * informacion del usuario*/		
	public function EliminarInfoUsuario($nik)
	{
		require('../MODELO/Usuario.php');
		
		$deleteUsuario = new Usuario();
		$deleteUsuario->setNick($nik);
		$s = $deleteUsuario->eliminar();
		if ($s == true) {
			return true;
		}
		else
		{
			return false;
		}
	}
	/**actualiza la 
	 * informacion del usuario*/
	public function IngresarInfoUsuario()
	{
	}
	/**
	 * @param nik es el nik del usuario al cual
	 * desea que le muestren su perfil*/
	public function mostrarPerfil($nik)
	{
		require('../MODELO/Usuario.php');
		$usuario = new Usuario();
		$usuario->setNick($nik);
		$s = $usuario->perfil();		
		if ($s == true) {
			$datosUser = array();
			$datosUser['nikname']=$usuario->getNik();
			$datosUser['email']=$usuario->getEmail();
			$datosUser['estado']=$usuario->getEstado();
			$datosUser['actividades']= $usuario->getActividades();
			$datosUser['activo']=$usuario->getActivo();
			$datosUser['tipo']=$usuario->getTipo();
			$datosUser['fechacreacion']=$usuario-> getFechacreacion();
			$datosUser['nombre']=$usuario->getNombre();
			$datosUser['apellidos']=$usuario->getApellidos();
			$datosUser['edad']=$usuario->getEdad();
			$datosUser['direccion']=$usuario->getDireccion();
			$datosUser['ciudad']=$usuario->getCiudad();
			$datosUser['localidad']=$usuario->getLocalidad();
			$datosUser['pais']=$usuario->getPais();
			$gustos = $usuario->getGusto();
			$i=0;
			foreach ($gustos as $value) {
				$datosUser['gustos'][$i]=$value->getTipo();
				$i++;
			}
			return $datosUser;
		}else
		{
			return false;
		}
	}
	
	public function ActualizarUsuario($vector){
		
		require('../MODELO/Usuario.php');
		$m_Usuario = new Usuario();
		$m_Usuario->setActividades($vector['actividades']);
		$m_Usuario->setActivo($vector['activo']);
		$m_Usuario->setCodigo("");
		$m_Usuario->setEmail($vector['email']);
		$m_Usuario->setEstado($vector['estado']);
		$m_Usuario->setFechacreacion(date("y-m-d"));
		$m_Usuario->setNick($vector['nikname']);
		$m_Usuario->setPassword($vector['password']);
		//$m_Usuario->setTipo("");
		$m_Usuario->setNombre($vector['nombre']);
		$m_Usuario->setApellidos($vector['apellido']);
		$m_Usuario->setEdad($vector['edad']);
		//$m_Usuario->setGusto($gustos);////////////////////////////
		$m_Usuario->setDireccion($vector['direccion']);
		$m_Usuario->setLocalidad($vector['localidad']);
		$m_Usuario->setCiudad($vector['ciudad']);
		$m_Usuario->setPais($vector['pais']);
		$s = $m_Usuario->actualizar();
		
		if ($s == true) {
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>