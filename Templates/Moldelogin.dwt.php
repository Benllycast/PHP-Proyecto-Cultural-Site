<?php
session_start();

$Autollamar = $_SERVER['PHP_SELF']; 
$sw=true;
if(($_POST['username']) && ($_POST['password'])){
		require_once('../CONTROLADOR/ValidarUsuario.php');
		$nik = $_POST['username'];
		$pass=$_POST['password'];
		
		$s = ValidarUsuario::ValidarUsuarios($pass,$nik);
		
		if($s){
			$sw = false;
			 $_SESSION['nikname']=$s['nikname'];
			 $_SESSION['actividades']=$s['actividades'];
			 $_SESSION['activo']=$s['activo'];
			 $_SESSION['email']=$s['email'];
			 $_SESSION['estado']=$s['estado'];
			 $_SESSION['codigo']=$s['codigo'];
			 $_SESSION['fechacreacion']=$s['fechacreacion'];
			 $_SESSION["mensaje"]="0";	
			
		  	 header("Location: /web/index.php");
		}
	
}?>
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
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/culturalisaitTemplate2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Culturalisite - Index:</title>
<!-- InstanceEndEditable -->
<meta name="keywords" content="" />
<meta name="Culturalisite" content="" />
<link href="../web_page/default.css" rel="stylesheet" type="text/css" media="screen" />
<!-- InstanceBeginEditable name="head" -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
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
    <li><a href="../web_page/registrarse.html">Registrarse</a></li>
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
        <form ACTION="<?php echo $Autollamar;  ?>" method="POST" id="form">
          <div>
          <li>
          Nombre de Usuario
          </li>
          <input type="text" name="username" class="cuadrito" size="15"/>
          <li>Contrase&ntilde;a</li>
          <input type="password" name="password" class="cuadrito" />
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
		    <h1 class="title"><a href="#">Bienvenido a Culturalisite</a></h1>
		    <p class="byline"><small>Publicado el 25 de mayo de 2009 por <a href="#">Cesarecf</a></small></p>
		    <div class="entry">
		      <p><strong>Culturalisite</strong> es una web que busca reunir toda la informaci&oacute;n que acontece en su ciudad y llevarle a usted solo la que realmente le interesa. Para esto, solo necesita <a href="../web_page/registrarse.html">registrarse aqu&iacute;</a>, elegir la informaci&oacute;n que le interesa recibir y luego iniciar sesi&oacute;n</p>
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
