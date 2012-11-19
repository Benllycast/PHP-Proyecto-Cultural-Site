<?php session_start();
 	
	if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
	}
require('../CONTROLADOR/AdministrarPersona.php');
if(!$_REQUEST['idactividad']){
	echo("ingrese el id de actvidad a mostrar");		
}else{
	$id = $_REQUEST['idactividad'];
	$s = AdministrarPersona::MostrarActividad($id);	
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
		    <h1 class="title"><strong>Nombre:&nbsp;<?php echo $s['datos']['nombre'];?></strong></h1>
            <p class="byline"><small><a href="/web/VISTA/UpdateActividad.php?idactividad=<?php echo $id; ?>">Actualizar&nbsp;&nbsp;&nbsp;</a><a href="/web/VISTA/EliminarActividad.php?idactividad=<?php echo $id; ?>">Eliminar</a></small></p>
            
		    <div class="entry">
		      <table width="100%" border="0">
		        <tr>
		          <td><p><strong>Fecha de Creacion:&nbsp;</strong><?php echo $s['datos']['fechacreacion']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Fecha de Inicio:&nbsp;</strong><?php echo $s['datos']['fechainicio']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Fecha de Finalizacion:&nbsp;</strong><?php echo $s['datos']['fechafin']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Numero de asistentes:&nbsp;</strong><?php echo $s['datos']['asistentes']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Cantidad de Boletas:&nbsp;</strong><?php echo $s['datos']['boleteria']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Capacidad de Personas:&nbsp;</strong><?php echo $s['datos']['capacidad']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Costo de la Boleta:&nbsp;</strong><?php echo $s['datos']['costo']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Hora de Inicio:&nbsp;</strong><?php echo $s['datos']['hora']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Lugar:&nbsp;</strong><?php echo $s['datos']['lugar']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Multiples Eventos:&nbsp;</strong><?php echo $s['datos']['multiple']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Organizador del Evento:&nbsp;</strong><?php echo $s['datos']['organizador']; ?></p></td>
	            </tr>
                <tr>
		          <td><p><strong>Patrocinador del Evento:&nbsp;</strong><?php echo $s['datos']['patrocinador']; ?></p></td>
	            </tr>
	          </table>
		    </div>
	      </div>
          <div class="post">
		    <h1 class="title">Tipos de actividades</h1>
		    <div class="entry">
		     <ul> <?php foreach ($s['datos']['tipo'] as $tipos) {
				echo "<li>".$tipos."</li>";
			}?></ul>
		    </div>
	      </div>
          <div class="post">
		    <h1 class="title">Comentarios acerca de la actividad</h1>
		    <div class="entry">
		     <ul> <?php foreach ($s['comentarios'] as $value) {
		echo("&nbsp; <strong>emisor:</strong> ".$value['emisor'].
				"&nbsp; <strong>mensaje:</strong>".$value['mensaje'].
				"&nbsp; <strong>fecha:</strong> ".$value['fecha']."<br>");
	}?></ul>
		    </div>
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
