<?php
require('../CONTROLADOR/AdministrarOrganizador.php');

if ((!$_POST['nikname'])||(!$_POST['idactividad'])) {
	echo("nose puede eliminar la actvidad");
}else {
	$nik = $_POST['nikname'];
	$id = $_POST['idactividad'];
	$s = AdministrarOrganizador::EliminarActividad($nik,$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php if ($s) {?>
	<h1>la actividad se a elimiando con exito</h1>
<?php }else{ ?>
	<h1>no se puede elimianar la actvidad</h1>
<?php }?>
<body>
</body>
</html>