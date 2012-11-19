<?php
require('../PERSISTENCIA/DAOUsuario.php');
$actvidades = $_POST['actividades'];
$activo = $_POST['activo'];
$email = $_POST['email'];
$estado =$_POST['estado'];
$nikname = $_POST['nikname'];
$password = $_POST['password'];

$usuarioDAO = new DAOUsuario($actvidades,$activo,$email,$estado,date("y-m-d"),null,$nikname,$password);
$usuarioDAO->agregar();
?>