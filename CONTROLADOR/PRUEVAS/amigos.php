<?php
require('../PERSISTENCIA/DAOAmigos.php');
$ideUsuario = $_POST['idUsuario'];
$ideAmigo = $_POST['idAmigo'];
$relacion = $_POST['relacion'];
//$intefast = new DAO();
$amigosDAO = new DAOAmigos(null,$ideAmigo,$ideUsuario,$relacion);
$amigosDAO->agregar();
$amigosDAO = new DAOAmigos(null,$ideUsuario,$ideAmigo,$relacion);
$amigosDAO->agregar();
?>