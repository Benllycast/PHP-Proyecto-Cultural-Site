<?php
session_start();

if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
	}
	
if(!$_SESSION['nikname'])
{
	header("Location: /web/VISTA/login.php");
}
else
{
	require('../CONTROLADOR/AdministracionUsuario.php');
	$nik = $_SESSION['nikname'];
	$s = AdministracionUsuario::EliminarInfoUsuario($nik);
	unset ($_SESSION['nikname']);
	unset ($_SESSION["actividades"]);
	unset ($_SESSION['activo']);
	unset ($_SESSION['estado']);
	unset ($_SESSION['fechacreacion']);
	unset ($_SESSION['codigo']);
	unset ($_SESSION['email']);
	$_SESSION = array();
	session_unset();
	session_destroy();	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Cool Black
Description: A three-column, fixed-width blog design.
Version    : 1.0
Released   : 20090309

-->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Moldelogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
   <li class="current_page_item"></li>
    <li><a href="/web/VISTA/registerUser.php">Registrarse</a></li>
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
        <h2>Iniciar Sesi&oacute;n</h2>
        <form ACTION="/web/VISTA/login.php" method="POST" id="form">
          <div>
          <li>
          Nombre de Usuario
          </li>
          <input type="text" name="username" class="cuadrito" size="15"/>
          <li>Contrase&ntilde;a</li>
          <input name="contrasena" type="password" class="cuadrito" id="contrasena" />
          <li>
            <input type="submit" name="log" value="Entrar" id="enter" /> 
          </li><?php if($sw == true){?><li>USUARIO NO REGISTRADO</li><?php }?>
          </div>
        </form>
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
		    <h1 class="title">Has Abandonado Nuestra Comunidad		    </h1>
		    <div class="entry">
		      <p>Has abandonado nuestra comunidad. si quieres volver en otro momento ya sabes como hacerlo, solo tienes que hacer click en la pestaña de <a href="/web/VISTA/registerUser.php">"Registrarse"</a> que aparece arriba para participar en nuestros contenidos y proporcionarte lo ultimo en informacion de las actividades que se realicen en tu ciudad.</p>
		      <p>Te esperamos tu pronto regreso.</p>
		      <p>&nbsp;</p>
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
