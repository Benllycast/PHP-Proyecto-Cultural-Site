<?php session_start();
 	
	if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
	}
require_once('../CONTROLADOR/AdministrarOrganizador.php');
if ($_POST['idactividad'] ) {
	$inf = array();
	$inf['idactividad'] = $_POST['idactividad'];
	if (($_POST['nombre'])) {$inf['nombre'] = $_POST['nombre'];}else{$inf['nombre']=null;}
	if (($_POST['asistentes'])) {$inf['asistentes'] = $_POST['asistentes'];}else{$inf['asistentes']=null;}
	if (($_POST['boleteria'])) {$inf['boleteria'] = $_POST['boleteria'];}else{$inf['boleteria']=null;}
	if (($_POST['capacidad'])) {$inf['capacidad'] = $_POST['capacidad'];}else{$inf['capacidad']=null;}
	if (($_POST['costo'])) {$inf['costo'] = $_POST['costo'];}else{$inf['costo']=null;}
	if (($_POST['descripcion'])) {$inf['descripcion'] = $_POST['descripcion'];}else{$inf['descripcion']=null;}
	if (($_POST['fechafin'])) {$inf['fechafin'] = $_POST['fechafin'];}else{$inf['fechafin']=null;}
	if (($_POST['fechainicio'])) {$inf['fechainicio'] = $_POST['fechainicio'];}else{$inf['fechainicio']=null;}
	if (($_POST['hora'])) {$inf['hora'] = $_POST['hora'];}else{$inf['hora']=null;}
	if (($_POST['lugar'])) {$inf['lugar'] = $_POST['lugar'];}else{$inf['lugar']=null;}
	if (($_POST['multiple'])) {$inf['multiple'] = $_POST['multiple'];}else{$inf['multiple']=null;}
	if (($_POST['patrocinador'])) {$inf['patrocinador'] = $_POST['patrocinador'];}else{$inf['patrocinador']=null;}
	if (($_POST['organizador'])) {$inf['organizador'] = $_POST['organizador'];}else{$inf['organizador']=null;}
	$s = AdministrarOrganizador::ModificarActividad($inf);
}else {
	echo("ingrese el id de la actvidad");
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
    <li class="current_page_item"><a href="/web/index.php">Indice</a></li>
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
		  <div class="post">
		    <?php if ($s== true) {?>
		    <h1 class="title">Modificacion Exitosa</h1>
 			<p>la informacion que ingresasate se ha guardado de manera correcta.</p>
 			<?php }else{?><h1 class="title">Fallo de registro</h1>
 			<p>Se ha encontrado  un problema al momento de guardar la informacion</p>
 			<?php }?>
	      </div>
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
