<?php session_start();
 	
	if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
	}

if (!$_POST['nombre']||
	(!$_POST['fechainicio'])||
	(!$_POST['fechafin'])||
	(!$_POST['costo'])||
	(!$_POST['boleteria'])||
	(!$_POST['asistentes'])||
	(!$_POST['patrocinador'])||
	(!$_POST['organizador'])||
	(!$_SESSION['nikname'])||
	(!$_POST['descripcion'])||
	(!$_POST['lugar'])||
	(!$_POST['hora'])||
	(!$_POST['capacidad'])) {
		echo ("le falta algo a esto");
		//$s = false;	
}else {////falta el id de creador
require('../CONTROLADOR/CrearActividad.php');
	$nueva = array('nombre'=>$_POST['nombre'],
					'fechainicio'=>$_POST['fechainicio'],
					'fechafin'=>$_POST['fechafin'],
					'costo'=>$_POST['costo'],
					'boleteria'=>$_POST['boleteria'],
					'asistentes'=>$_POST['asistentes'],
					'patrocinador'=>$_POST['patrocinador'],
					'organizador'=>$_POST['organizador'],
					'multiple'=>$_POST['multiple'],
					'idcreador'=>$_SESSION['nikname'],
					'descripcion'=>$_POST['descripcion'],
					'lugar'=>$_POST['lugar'],
					'hora'=>$_POST['hora'],
					'capacidad'=>$_POST['capacidad']);
	$tipoAct = array();
	if($_POST['musical']){
		$tipoAct['musical'] = $_POST['musical'];
	}
	if ($_POST['deportivo']){
		$tipoAct['deportivo'] = $_POST['deportivo'];
	}
	
	$s = CrearActividad::CrearNuevaActividad($nueva,$tipoAct);
	
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/MOLDE.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Culturalisite - Index:</title>
<!-- InstanceEndEditable -->
<meta name="keywords" content="" />
<meta name="Culturalisite" content="" />
<link href="../web_page/default.css" rel="stylesheet" type="text/css" media="screen" />

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><span>Culturali</span>Site</a></h1>
		<p>Su ciudad en sus manos</p>
	</div>
</div>
<!-- InstanceBeginEditable name="menuBar" -->
<div id="menu">
  <ul id="main">
    <li class="current_page_item"><a href="#">Indice</a></li>
    <li></li>
    <a href="/web/VISTA/InfoDeUsuario.php">Info de Usuario</a><a href="/web/VISTA/Actividades.php">Actividades</a>
  </ul>
</div>
<!-- InstanceEndEditable -->
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page"><!-- InstanceBeginEditable name="sidebar" -->
	  <div id="sidebar1" class="sidebar">
      <ul>
        <li>
        <h2><?php echo $_SESSION['nikname'] ?><a href="/web/VISTA/logout.php">salir</a></h2>
        <li>E-mail: <?php echo $_SESSION['email']; ?></li>
        <li>Estado: <?php echo $_SESSION['estado']; ?></li>
        <li>Actividades publicadas: <?php echo $_SESSION['actividades']; ?></li>
        <li>Activo: <?php echo $_SESSION['activo']; ?></li>
        <li>Inicio desde: <?php echo $_SESSION['fechacreacion']; ?></li>
        </li>
        <li>
          <h2>Actividades Recientes</h2>
          <ul>
            <li><a href="#">Las actividades van aqu&iacute; (beta)</a></li>
          </ul>
        </li>
        <li> </li>
      </ul>
      </div>
	<!-- InstanceEndEditable -->
	  <!-- start content -->
    <!-- InstanceBeginEditable name="workArea" -->
		<div id="content">
		 	<?php if ($s == true) {?><h1 class="title">Registro Exitoso</h1>
 			<p>Has creado una nueva actividad.para regresar al inicio preciona <a href="/web/index.php">aqui</a></p>
 			<?php }else{?><h1 class="title">Fallo de registro</h1>
 			<p>Problemas al guardar la informacion. verifica que toda la informacion sea correcta.presion <a href="/web/VISTA/registerActivity.php">aqui</a> para ingresar los datos nuevamente.</p>
 			<?php }?>
	    </div>
	<!-- InstanceEndEditable -->
		<!-- end content -->
		<!-- start sidebars -->
		<!-- InstanceBeginEditable name="shearBar" -->
		<div id="sidebar2" class="sidebar">
		  <ul>
		    <li>
		      <form id="searchform" method="get" action="#">
		        <div>
		          <h2>Buscar</h2>
		          <input type="text" name="s" class="cuadrito" size="15" value="" />
		          </div>
		        </form>
		      </li>
		    <li> </li>
		    </ul>
		  </div>
		<!-- InstanceEndEditable -->
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end page -->
</div>
<div id="footer">
	<p class="copyright">&copy;&nbsp;&nbsp;2009 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	<p class="link"><a href="#">Privacy Policy</a>&nbsp;&#8226;&nbsp;<a href="#">Terms of Use</a></p>
</div>
</body>
<!-- InstanceEnd --></html>
