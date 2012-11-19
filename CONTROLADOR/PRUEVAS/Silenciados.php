<?php 
require ('../PERSISTENCIA/DAOSilenciados.php');

$idusuario = $_POST['idusuario'];
$idsilenciado =$_POST['idsilenciado'];

$silenciadosDAO = new DAOSilenciados(null,$idusuario,$idsilenciado);
$silenciadosDAO->agregar();

?>