<?php
require_once('../CONTROLADOR/AdministracionUsuario.php');
if (isset($_POST['nikname'])) {
	$inf = array();
	$inf['nikname']=$_POST['nikname'];
	if (isset($_POST['estado'])) {$inf['estado'] = $_POST['estado'];}else {$inf['estado'] = nul;}
	if (isset($_POST['password'])) {$inf['password'] = $_POST['password'];}else{$inf['password'] = nul;}
	if (isset($_POST['email'])) {$inf['email'] = $_POST['email'];}else{$inf['email'] = nul;}
	if (isset($_POST['actividades'])) {$inf['actividades'] = $_POST['actividades'];}else{$inf['actividades'] = nul;}	
	if (isset($_POST['activo'])) {$inf['activo'] = $_POST['activo'];}else{$inf['activo'] = nul;}
	if (isset($_POST['nombre'])) {$inf['nombre'] = $_POST['nombre'];}else{$inf['nombre'] = nul;}
	if (isset($_POST['apellido'])) {$inf['apellido'] = $_POST['apellido'];}else{$inf['apellido'] = nul;}
	if (isset($_POST['edad'])) {$inf['edad'] = $_POST['edad'];}else{$inf['edad'] = nul;}
	if (isset($_POST['direccion'])) {$inf['direccion'] = $_POST['direccion'];}else{$inf['direccion'] = nul;}
	if (isset($_POST['ciudad'])) {$inf['ciudad'] = $_POST['ciudad'];}else{$inf['ciudad'] = nul;}
	if (isset($_POST['localidad'])) {$inf['localidad'] = $_POST['localidad'];}else{$inf['localidad'] = nul;}
	if (isset($_POST['pais'])) {$inf['pais'] = $_POST['pais'];}else{$inf['pais'] = nul;}
	if (isset($_POST['amigo'])) {$inf['amigo'] = $_POST['amigo'];}else{$inf['amigo'] = nul;}
	if (isset($_POST['seguimiento'])) {$inf['seguimiento'] = $_POST['seguimiento'];}else{$inf['seguimiento'] = nul;}
	
	$s = AdministracionUsuario::ActualizarUsuario($inf);
}else {
	echo("deve de ingresar el nik");
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php 
if ($s) {
	echo("la actualizacion se realizo con exito");
}else {
	echo("no se pudo actualizar la informacion");
}
?>
<body>
</body>
</html>