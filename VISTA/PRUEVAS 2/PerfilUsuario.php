<?php
require_once('../CONTROLADOR/AdministracionUsuario.php');
if (!$_POST['nikname']) {
	$s = false;
}else {
	$s = true;
	$nik = $_POST['nikname'];
	$documento = AdministracionUsuario::mostrarPerfil($nik);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php if (!s || !$documento) {
	echo "<h1>NO SE PUEDE MOSTRAR SU PERFIL</h1>";
}else { echo
	"<h1>Perfil del usuario:</h1><br>
	<h3>Nikname:</h3>".$documento['nikname']."<br>
	<h3>E-mail:</h3>".$documento['email']."<br>
	<h3>Estado:</h3>".$documento['estado']."<br>
	<h3>Activo:</h3>".$documento['activo']."<br>
	<h3>Actvidades:</h3>".$documento['actividades']."<br>
	<h3>Fecha Creacion:</h3>".$documento['fechacreacion']."<br>
	<h3>Nombre:</h3>".$documento['nombre']."<br>
	<h3>Apellidos:</h3>".$documento['apellidos']."<br>
	<h3>Edad:</h3>".$documento['edad']."<br>
	<h3>Direccion:</h3>".$documento['direccion']."<br>
	<h3>Ciudad:</h3>".$documento['ciudad']."<br>
	<h3>Localidad:</h3>".$documento['localidad']."<br>
	<h3>Pais:</h3>".$documento['pais']."<br>
	";
	echo "<h3>GUSTOS:</h3><br><ul>";
	foreach ($documento['gustos'] as $value) {
		
		echo("<li>$value</li>");
	}
	echo "<ul/>";
}
 ?>
</body>
</html>