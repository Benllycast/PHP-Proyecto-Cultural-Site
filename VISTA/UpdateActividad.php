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
<script type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function YY_checkform() { //v4.66
//copyright (c)1998,2002 Yaromat.com
  var args = YY_checkform.arguments; var myDot=true; var myV=''; var myErr='';var addErr=false;var myReq;
  for (var i=1; i<args.length;i=i+4){
    if (args[i+1].charAt(0)=='#'){myReq=true; args[i+1]=args[i+1].substring(1);}else{myReq=false}
    var myObj = MM_findObj(args[i].replace(/\[\d+\]/ig,""));
    myV=myObj.value;
    if (myObj.type=='text'||myObj.type=='password'||myObj.type=='hidden'){
      if (myReq&&myObj.value.length==0){addErr=true}
      if ((myV.length>0)&&(args[i+2]==1)){ //fromto
        var myMa=args[i+1].split('_');if(isNaN(myV)||myV<myMa[0]/1||myV > myMa[1]/1){addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==2)){
          var rx=new RegExp("^[\\w\.=-]+@[\\w\\.-]+\\.[a-z]{2,4}$");if(!rx.test(myV))addErr=true;
      } else if ((myV.length>0)&&(args[i+2]==3)){ // date
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);
        if(myAt){
          var myD=(myAt[myMa[1]])?myAt[myMa[1]]:1; var myM=myAt[myMa[2]]-1; var myY=myAt[myMa[3]];
          var myDate=new Date(myY,myM,myD);
          if(myDate.getFullYear()!=myY||myDate.getDate()!=myD||myDate.getMonth()!=myM){addErr=true};
        }else{addErr=true}
      } else if ((myV.length>0)&&(args[i+2]==4)){ // time
        var myMa=args[i+1].split("#"); var myAt=myV.match(myMa[0]);if(!myAt){addErr=true}
      } else if (myV.length>0&&args[i+2]==5){ // check this 2
            var myObj1 = MM_findObj(args[i+1].replace(/\[\d+\]/ig,""));
            if(myObj1.length)myObj1=myObj1[args[i+1].replace(/(.*\[)|(\].*)/ig,"")];
            if(!myObj1.checked){addErr=true}
      } else if (myV.length>0&&args[i+2]==6){ // the same
            var myObj1 = MM_findObj(args[i+1]);
            if(myV!=myObj1.value){addErr=true}
      }
    } else
    if (!myObj.type&&myObj.length>0&&myObj[0].type=='radio'){
          var myTest = args[i].match(/(.*)\[(\d+)\].*/i);
          var myObj1=(myObj.length>1)?myObj[myTest[2]]:myObj;
      if (args[i+2]==1&&myObj1&&myObj1.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
      if (args[i+2]==2){
        var myDot=false;
        for(var j=0;j<myObj.length;j++){myDot=myDot||myObj[j].checked}
        if(!myDot){myErr+='* ' +args[i+3]+'\n'}
      }
    } else if (myObj.type=='checkbox'){
      if(args[i+2]==1&&myObj.checked==false){addErr=true}
      if(args[i+2]==2&&myObj.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
    } else if (myObj.type=='select-one'||myObj.type=='select-multiple'){
      if(args[i+2]==1&&myObj.selectedIndex/1==0){addErr=true}
    }else if (myObj.type=='textarea'){
      if(myV.length<args[i+1]){addErr=true}
    }
    if (addErr){myErr+='* '+args[i+3]+'\n'; addErr=false}
  }
  if (myErr!=''){alert('The required information is incomplete or contains errors:\t\t\t\t\t\n\n'+myErr)}
  document.MM_returnValue = (myErr=='');
}
//-->
</script>
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
		    <h1 class="title">Actualizar Actividad</h1>
		    <div class="entry">
		      <form action="/web/VISTA/ActualizarActividad.php" method="post" id="form1" onsubmit="YY_checkform('form1','fechainicio','^\([0-9]{4}\)\\-\([0-9][0-9]\)\\-\([0-9][0-9]\)$#3#2#1','3','Field \'fechainicio\' is not valid.','fechafin','^\([0-9]{4}\)\\-\([0-9][0-9]\)\\-\([0-9][0-9]\)$#3#2#1','3','Field \'fechafin\' is not valid.','boleteria','0_1000','1','Field \'boleteria\' is not valid.','costo','0_1000','1','Field \'costo\' is not valid.','asistentes','0_1000','1','Field \'asistentes\' is not valid.','capacidad','0_1000','1','Field \'capacidad\' is not valid.','hora','^\(0[0-9]|1[0-9]|2[0-3]\)\:\([0-5][0-9]\)\:\([0-5][0-9]\)$','4','Field \'hora\' is not valid.');return document.MM_returnValue">
		        <table width="100%" border="0">
		          <tr>
		            <td width="35%">ID de la actividad</td>
		            <td width="65%"><label>
		              <input name="idactividad" type="text" class="cuadrito" id="idactividad" value="<?php echo $_REQUEST['idactividad']; ?>" readonly="true" />
		            </label></td>
	              </tr>
		          <tr>
		            <td>Nombre</td>
		            <td><label>
		              <input name="nombre" type="text" class="cuadrito" id="nombre" />
		            </label></td>
	              </tr>
		          <tr>
		            <td>Fecha de inicio</td>
		            <td><p>
		              <input name="fechainicio" type="text" class="cuadrito" id="fechainicio" size="10" />
		            </p>
	                <p>(YYYY-MM-DD)</p></td>
	              </tr>
		          <tr>
		            <td>Fecha de fin</td>
		            <td><p>
		              <input name="fechafin" type="text" class="cuadrito" id="fechafin" />
		            </p>
	                <p>(YYYY-MM-DD) </p></td>
	              </tr>
		          <tr>
		            <td>cantidad de boletas</td>
		            <td><input name="boleteria" type="text" class="cuadrito" id="boleteria" /></td>
	              </tr>
		          <tr>
		            <td>costo de la boleta</td>
		            <td><input name="costo" type="text" class="cuadrito" id="costo" /></td>
	              </tr>
		          <tr>
		            <td>asistentes confirmados</td>
		            <td><input name="asistentes" type="text" class="cuadrito" id="asistentes" /></td>
	              </tr>
		          <tr>
		            <td>capacidad de asistentes</td>
		            <td><input name="capacidad" type="text" class="cuadrito" id="capacidad" /></td>
	              </tr>
		          <tr>
		            <td>hora</td>
		            <td><p>
		              <input name="hora" type="text" class="cuadrito" id="hora" />
		            </p>
	                <p>(HH-MM-SS) </p></td>
	              </tr>
		          <tr>
		            <td>lugar</td>
		            <td><input name="lugar" type="text" class="cuadrito" id="lugar" /></td>
	              </tr>
		          <tr>
		            <td>multiples eventos</td>
		            <td><label>
		              <select name="multiple" class="cuadrito" id="multiple">
                      <option>no cambiar</option>
		                <option value="si">si</option>
		                <option value="no">no</option>
	                  </select>
	                </label></td>
	              </tr>
		          <tr>
		            <td>organizador</td>
		            <td><input name="organizador" type="text" class="cuadrito" id="organizador" /></td>
	              </tr>
		          <tr>
		            <td>patrocinador</td>
		            <td><input name="patrocinador" type="text" class="cuadrito" id="patrocinador" /></td>
	              </tr>
		          <tr>
		            <td>descripcion</td>
		            <td><label>
		              <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
	                </label></td>
	              </tr>
	            </table>
                <label><p>&nbsp;</p>
                    <input type="submit" name="button" id="button" value="modificar" />
                  </label>
	          </form>
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
