<?php 
require('../CONTROLADOR/ValidarUsuario.php');
if (!($_POST['nikname'])||!($_POST['password'])) {
	echo "porfavor ingrese los campos requeridos";
}else {
	$nik = $_POST['nikname'];
	$pass = $_POST['password'];
	$s = ValidarUsuario::ValidarUsuarios($pass,$nik);
	if ($s==true ) {
		foreach ($s as $value => $valor) {
			echo("$value => $valor");
		}
		echo "bienvenido a WWW.CULTURALISITE.ORG";		
	}else {
		echo "lo sentimos pero el usuario \"$nik\"\n
			no aperece registrado en esta pagina";
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>