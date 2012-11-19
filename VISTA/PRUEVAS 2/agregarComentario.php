<?php 
require('../CONTROLADOR/ComunicacionActividad.php');

if ((!$_POST['idemisor'])||
	(!$_POST['idactividad'])||
	(!$_POST['mensaje'])) {
	echo "por favor ngrese todos los campos requeridos";
}else{
	$nuevo = array();
	
	$nuevo['idemisor'] = $_POST['idemisor'];
	$nuevo['mensaje'] = $_POST['mensaje'];
	$nuevo['idactividad'] = $_POST['idactividad'];
	$nuevo['fecha'] = date("y-m-d H-i-s");
	
	$s = ComunicacionActividad::ComentarActivdad($nuevo);
	if ($s = true) {
	 	echo "el comentario hecho por ".$nuevo['idemisor']."se agrego con exito!!!";
	 }else {
	 	echo "error al agregar el ecomentario°°°";
	 } 
}


?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t√≠tulo</title>
</head>

<body>
</body>
</html>