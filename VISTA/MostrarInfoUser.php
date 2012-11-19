<?php session_start();
 	
	if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
	}

	if (!$_SESSION['nikname']) {
	$s = false;
}else {
	require_once('../CONTROLADOR/AdministracionUsuario.php');
	$s = true;
	$nik = $_SESSION['nikname'];
	$documento = AdministracionUsuario::mostrarPerfil($nik);
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
		    <h1 class="title">My informacion Personal</h1>
	  		
		  		  <p><a href="/web/VISTA/ModificarInfoUser.php">Para modificar la informacion haga click aqui</a></p><?php if (!s || !$documento) {
						echo "<h1>NO SE PUEDE MOSTRAR SU PERFIL</h1>";
					}else { ?>
  		    </p>
		  		<h3>Nikname:&nbsp; <?php echo $documento['nikname']; ?><br>
						</h3>
			<h3>E-mail:&nbsp; <?php echo $documento['email']; ?><br>
			</h3>
<h3>Estado:&nbsp; <?php echo $documento['estado']; ?><br>
		    </h3>
<h3>Activo:&nbsp; <?php echo $documento['activo']; ?><br>
		    </h3>
<h3>Actvidades:&nbsp;<?php echo $documento['actividades']; ?><br>
		    </h3>
<h3>Fecha Creacion: &nbsp;<?php echo $documento['fechacreacion']; ?><br>
		    </h3>
<h3>Nombre:&nbsp; <?php echo $documento['nombre']; ?><br>
		    </h3>
<h3>Apellidos:&nbsp; <?php echo $documento['apellidos']; ?><br>
		    </h3>
<h3>Edad:&nbsp; <?php echo $documento['edad']; ?><br>
		    </h3>
<h3>Direccion:&nbsp; <?php echo $documento['direccion']; ?><br>
		    </h3>
<h3>Ciudad: &nbsp;<?php echo $documento['ciudad']; ?><br>
		    </h3>
<h3>Localidad:&nbsp; <?php echo $documento['localidad']; ?><br>
		    </h3>
<h3>Pais:&nbsp; <?php echo $documento['pais']; ?><br>	
		    </h3>
<h3>GUSTOS:</h3>
					    <ul>
						<?php foreach ($documento['gustos'] as $value) {							
							echo("<li>$value</li>");
						}?>
						<ul/>
			<?php }?>
			</ul>
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
