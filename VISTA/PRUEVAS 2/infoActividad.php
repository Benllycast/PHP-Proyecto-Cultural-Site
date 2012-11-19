<?php 
require('../CONTROLADOR/AdministrarPersona.php');
if(!$_POST['idactividad']){
	echo("ingrese el id de actvidad a mostrar");		
}else{
	$id = $_POST['idactividad'];
	$s = AdministrarPersona::MostrarActividad($id);	
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php 
if ($s) {
	foreach ($s['datos'] as $answer => $valor) {
		if (is_array($valor)) {
			foreach ($valor as $value) {
				echo("$answer => $value <br>");	
			}
		}else {
			echo("$answer => $valor <br>");
		}
	}
	echo("<h1>Comentarios----------------</h1>");
	foreach ($s['comentarios'] as $value) {
		echo("emisor: ".$value['emisor'].
				"mensaje:".$value['mensaje'].
				"fecha: ".$value['fecha']."<br>");
	}
}else {
	echo("no hay actividad que mostrar");
}

?>
<body>
</body>
</html>