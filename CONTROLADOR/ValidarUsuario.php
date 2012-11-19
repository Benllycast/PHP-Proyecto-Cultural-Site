<?php
require_once ('..\MODELO\Usuario.php');

/**
 * @author Benlly
 * @version 1.0
 * @created 17-May-2009 10:23:30 a.m.
 */
class ValidarUsuario
{

	
	public $m_Usuario;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	/**
	 * 
	 * @param user
	 * @param pass
	 * @param nik
	 */
	public function validar(Usuarios $user, $pass, $nik)
	{
	}

	/**
	 * 
	 * @param pass
	 * @param nik
	 */
	public function ValidarUsuarios($pass, $nik)
	{
		 $usuario = new Usuario();
		 $usuario->setNick($nik);
		 $s = $usuario->buscar();
		 if ($s == true) {
		 	$password = $pass;//md5($pass);
		 	if (($nik == $usuario->getNik())&&($password == $usuario->getpassword())) {
		 		$datosUser = array();
		 		$datosUser['nikname']=$usuario->getNik();
		 		$datosUser['codigo']=$usuario->getCodigo();
				$datosUser['email']=$usuario->getEmail();
				$datosUser['estado']=$usuario->getEstado();
				$datosUser['actividades']= $usuario->getActividades();
				$datosUser['activo']=$usuario->getActivo();
				$datosUser['fechacreacion']=$usuario-> getFechacreacion();
		 		
		 		return $datosUser;
		 	}else {
		 		return false;
		 	}
		 }else{
		 	return false;
		 }
	}

	public function VerificarInfoUsuario()
	{
	}

}
?>