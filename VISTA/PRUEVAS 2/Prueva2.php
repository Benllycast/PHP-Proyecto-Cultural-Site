<?php 
require('../../CONTROLADOR/AdministrarOrganizador.php');

if (!$_POST['idcreador']) {
	echo("intenta denuevi");
}else {
	$datos = AdministrarOrganizador::BuscarActividaes($_POST['idcreador']) ;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
	<?php
	if (!$datos) {
	 	echo("no hay actividades");
	 } else {
		 while ($line = mysql_fetch_assoc($datos)) {
    			foreach ($line as $ter => $col_value) {
        			echo "<br>".$ter."=>".$col_value;
    }
}
	 }?>
<body>
</body>
</html>