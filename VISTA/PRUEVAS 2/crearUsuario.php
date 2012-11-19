<?php 
require('../CONTROLADOR/AdministracionUsuario.php');
//include('../PERSISTENCIA/master.php');
//$vector = array();
if ((!$_POST['nikname'])||
	(!($_POST['password']))||
	(!($_POST['email']))||
	(!($_POST['nombre']))||
	(!($_POST['apellido']))||
	(!($_POST['edad']))||
	(!($_POST['ciudad']))||
	(!($_POST['localidad']))||
	(!($_POST['pais']))
	) {
		echo "usuario no registrado o no ingreso todos los campos";
		return false;
	/*$vector['nikname'] = $_POST['nikname'];
	$vector['password'] = $_POST['password'];
	$vector['email'] = $_POST['email'];
	return AdministracionUsuario::CrearUsuario($vector['nikname'],$vector['email'],$vector['password']);*/
}else {
	//echo "usuario no registrado o no ingreso todos los campos";
	//return false;
	$vector = array();
	$vector['nikname'] = $_POST['nikname'];
	$vector['password'] = $_POST['password'];
	$vector['email'] = $_POST['email'];
	$vector['nombre'] = $_POST['nombre'];
	$vector['apellido'] = $_POST['apellido'];
	$vector['edad'] = $_POST['edad'];
	$vector['direccion'] = $_POST['direccion'];
	$vector['ciudad'] = $_POST['ciudad'];
	$vector['localidad'] = $_POST['localidad'];
	$vector['pais'] = $_POST['pais'];
	
	$gustos = array();
	if($_POST['musical']){
		$gustos['musical'] = $_POST['musical'];
	}
	if ($_POST['deportivo']){
		$gustos['deportivo'] = $_POST['deportivo'];
	}
	$s = AdministracionUsuario::CrearUsuario($vector,$gustos);
	if ($s == true) {
		echo "el usuario ha sido registrado con exito";
	}else {
		echo "problemas al ingresa usuario";
	}
}


?>