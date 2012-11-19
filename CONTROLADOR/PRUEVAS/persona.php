<?php
require('../PERSISTENCIA/DAOPersona.php');

$nom = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$localidad = $_POST['localidad'];
$pais = $_POST['pais'];
$amigos = $_POST['amigos'];
$seguimiento = $_POST['seguimiento'];

$personaDAO = new DAOPersona($amigos,$apellido,$ciudad,$direccion,$edad,null,$localidad,$nom,$pais,$seguimiento);
$personaDAO->agregar();
?>