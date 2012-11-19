<?php 
require('../CONTROLADOR/AdministracionUsuario.php');
if(!$_POST['nikname'])
{
	echo "porfavor digite el nik a eliminar";
}
else
{
	$nik = $_POST['nikname'];
	$s = AdministracionUsuario::EliminarInfoUsuario($nik);
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php 
if($s == true)
	{
		echo "la eliminacion se realizo con exito";
	}else{
		echo "problema al elimianr el usuario ingresado";
	}
?>
<body>
</body>
</html>