<?php 
require('../PERSISTENCIA/DAOComentarios.php');

$emisor = $_POST['emisor'];
$mensaje = $_POST['mensaje'];
$actividad = $_POST['actividad'];
$fecha = date("y-m-d H-i-s");

$comentarioDAO = new DAOComentarios($fecha,null,$actividad,$emisor,$mensaje);
$comentarioDAO->agregar();
?>