<?php 
//require('../PERSISTENCIA/DAOTipoActividad.php');
require('../PERSISTENCIA/DAOGustos.php');

$idactividad = $_POST['idactividad'];
$tipo = $_POST['tipo'];
$genero = $_POST['genero'];

//$tipoActvidadDAO = new DAOTipoActividad(null,$idactividad,$tipo,$genero);
//$tipoActvidadDAO->agregar();
$gustoDAO = new DAOGustos(null,$idactividad,$tipo,$genero);
$gustoDAO->agregar();
?>