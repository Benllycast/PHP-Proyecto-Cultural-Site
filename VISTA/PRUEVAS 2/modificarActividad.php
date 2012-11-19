<?php 
require_once('../CONTROLADOR/AdministrarOrganizador.php');
if ($_POST['idactividad'] ) {
	$inf = array();
	$inf['idactividad'] = $_POST['idactividad'];
	if (($_POST['nombre'])) {$inf['nombre'] = $_POST['nombre'];}else{$inf['nombre']=null;}
	if (($_POST['asistentes'])) {$inf['asistentes'] = $_POST['asistentes'];}else{$inf['asistentes']=null;}
	if (($_POST['boleteria'])) {$inf['boleteria'] = $_POST['boleteria'];}else{$inf['boleteria']=null;}
	if (($_POST['capacidad'])) {$inf['capacidad'] = $_POST['capacidad'];}else{$inf['capacidad']=null;}
	if (($_POST['costo'])) {$inf['costo'] = $_POST['costo'];}else{$inf['costo']=null;}
	if (($_POST['descripcion'])) {$inf['descripcion'] = $_POST['descripcion'];}else{$inf['descripcion']=null;}
	if (($_POST['fechafin'])) {$inf['fechafin'] = $_POST['fechafin'];}else{$inf['fechafin']=null;}
	if (($_POST['fechainicio'])) {$inf['fechainicio'] = $_POST['fechainicio'];}else{$inf['fechainicio']=null;}
	if (($_POST['hora'])) {$inf['hora'] = $_POST['hora'];}else{$inf['hora']=null;}
	if (($_POST['lugar'])) {$inf['lugar'] = $_POST['lugar'];}else{$inf['lugar']=null;}
	if (($_POST['multiple'])) {$inf['multiple'] = $_POST['multiple'];}else{$inf['multiple']=null;}
	if (($_POST['patrocinador'])) {$inf['patrocinador'] = $_POST['patrocinador'];}else{$inf['patrocinador']=null;}
	if (($_POST['organizador'])) {$inf['organizador'] = $_POST['organizador'];}else{$inf['organizador']=null;}
	$s = AdministrarOrganizador::ModificarActividad($inf);
}else {
	echo("ingrese el id de la actvidad");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php if ($s) {
	echo("la actualizacion se realizo con exito");
}else {
	echo("no se pudo actualizar la informacion");
}
?>
</body>
</html>