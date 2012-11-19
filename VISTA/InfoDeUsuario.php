<?php session_start();
 	
	if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
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
        <h2><?php echo $_SESSION['nikname']; ?><a href="/web/VISTA/logout.php">salir</a></h2>
        <li>E-mail: <?php echo $_SESSION['email']; ?></li>
        <li>Estado: <?php echo $_SESSION['estado']; ?></li>
        <li>Actividades publicadas: <?php echo $_SESSION['actividades']; ?></li>
        <li>Activo: <?php echo $_SESSION['activo']; ?>(M)</li>
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
		    <h2 class="title"><a href="/web/VISTA/MostrarInfoUser.php">Mi Informacion Personal</a>		  </h2>
		    <p>en &quot;My informacion Personal&quot; puedes observar la informacion que hayas ingresado en el momento de registrarte en nuestra comunidad. para observarla solo tienes hacel click en el titulo <a href="MostrarInfoUser.php">"My Informacion Personal"</a>.</p>
		    <h2 class="title"><a href="/web/VISTA/ModificarInfoUser.php">Modificar Mi Informacion Personal</a></h2>
            <p>Como el titulo lo indica puedes <a href="/web/VISTA/ModificarInfoUser.php">&quot;modificar&quot;</a> tu informacion para mantenerla actualizada.</p>
            <h1 class="title"><a href="/web/VISTA/EliminarInfoUser.php">Abandonar Comunidad</a></h1>
            <p>Puedes abandonar nuetra pagina cuando tu lo desees solo tienes que hacer click en el titulo <a href="#">"Abandonar Comunidad"</a>.</p>
            <p>&nbsp;</p>
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
