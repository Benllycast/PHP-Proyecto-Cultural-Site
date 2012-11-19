<?php  session_start();
 	
	if(!isset($_SESSION['nikname'])){
		header("Location: /web/VISTA/login.php");
	}?>
<?php require_once('../Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Actividades = "-1";
if (isset($_SESSION['nikname'])) {
  $colname_Actividades = $_SESSION['nikname'];
}
mysql_select_db($database_conexion, $conexion);
$query_Actividades = sprintf("SELECT * FROM actividades WHERE idCreador = %s ORDER BY fecha_creacion ASC", GetSQLValueString($colname_Actividades, "text"));
$Actividades = mysql_query($query_Actividades, $conexion) or die(mysql_error());
$row_Actividades = mysql_fetch_assoc($Actividades);
$totalRows_Actividades = mysql_num_rows($Actividades);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		    <h1 class="title">Actividades Hechas Por el usuario</h1>
		    <p class="byline">&nbsp;</p>
		    <div class="entry">
		      <table width="100%" border="0">
		        <?php do { ?>
	            <tr>
	              <td><a href="/web/VISTA/MostrarActividad.php?idactividad=<?php echo $row_Actividades['id']; ?>"><strong>Nombre</strong>:&nbsp;<?php echo $row_Actividades['nombre']; ?>&nbsp;&nbsp;&nbsp;<strong>Fecha de creacion</strong>:&nbsp;<?php echo $row_Actividades['fecha_creacion']; ?><strong>Descripcion</strong>:&nbsp;&nbsp;<?php echo $row_Actividades['descripcion']; ?>&nbsp;</a></td>
                </tr>
		          <?php } while ($row_Actividades = mysql_fetch_assoc($Actividades)); ?>
              </table>
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
<?php
mysql_free_result($Actividades);
?>
