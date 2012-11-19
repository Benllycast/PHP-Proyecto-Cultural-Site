<?php 
require ('../PERSISTENCIA/DAOSeguimiento.php');

$idusuario = $_POST['idusuario'];
$idsilenciado =$_POST['idactividad'];

$silenciadosDAO = new DAOSeguimiento(null,$idusuario,$idsilenciado);
$silenciadosDAO->agregar();

?>