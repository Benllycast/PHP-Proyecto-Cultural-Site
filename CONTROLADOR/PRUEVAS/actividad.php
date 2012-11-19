<?php
require('../PERSISTENCIA/DAOActividad.php');

$asis = $_POST['asistentes'];
$bol = $_POST['boleteria'];
$cap = $_POST['capacidad'];
$cos = $_POST['costo'];
$desc = $_POST['descrpcion'];
$fC = date("y-m-d");
$fF = $_POST['fechafin'];
$fI = $_POST['fechainicio'];
$hor = $_POST['hora'];
$ico = null;
$ide = null;
$idc = $_POST['idcreador'];
$lug = $_POST['lugar'];
$mul = $_POST['multiple'];
$nom = $_POST['nombre'];
$org = $_POST['organizador'];
$pat = $_POST['patrocinador'];
$tip = $_POST['tipo'];

$actividadDAO = new DAOActividad($asis,$bol,$cap,$cos,$desc,$fC,$fF,$fI,$hor,$ico,$ide,$idc,$lug,$mul,$nom,$org,$pat,$tip);
$actividadDAO->agregar();

?>