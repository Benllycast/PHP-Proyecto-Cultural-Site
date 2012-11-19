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
function todo(){
            var sw = false;
	for (i=0;i<document.f1.elements.length;i++){
		if(document.f1.elements[i].type == "checkbox"){	
    		if(!document.f1.elements[i].checked){
            //document.f1.elements[i].checked=1;
            sw = false;
            }else{
                return true;            
            }
      }
   }
   
   if (sw == false) {
			alert("No has seleccionado ningun checkbox!!!")
			return false;
		}
   
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
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
   <li class="current_page_item"></li>
    <li><a href="/web/index.php">indice</a><a href="/web/VISTA/registerUser.php">Registrarse</a></li>
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
        <form action="/web/VISTA/login.php" method="post" id="registerUser" onsubmit="YY_checkform('registerUser','username','#q','0','ingrese Nombre de usuario','contrasena','#q','0','Field \'contrasena\' is not valid.');return document.MM_returnValue">
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
			<form action="/web/VISTA/createUser.php" method="post" name="f1" id="f1" onsubmit="YY_checkform('f1','nikname','#q','0','Field \'nikname\' is not valid.','email','#q','3','Field \'email\' is not valid.','nombre','#q','0','Field \'nombre\' is not valid.','apellido','#q','0','Field \'apellido\' is not valid.','edad','#1_100','1','Field \'edad\' is not valid.','direccion','#q','0','Field \'direccion\' is not valid.','ciudad','#q','0','Field \'ciudad\' is not valid.','localidad','#q','0','Field \'localidad\' is not valid.','pais','#q','0','Field \'pais\' is not valid.','password','#q','0','Field \'password\' is not valid.');return document.MM_returnValue">
			<div class="post">
				<h1 class="title">Datos de Usuario</h1>
				<div class="entry">
				  <p>Ingrese sus datos de usuario para que pueda ingresar a culturalisite                    
					<table cols="2" rows="*" border="0">
						<tr>
							<td>
								<span><strong>Nombre de usuario</strong></span>
							</td>
							<td><input name="nikname" type="text" class="cuadrito" onblur="YY_checkform('form1','nikname','#q','0','ingrese Nombre de Usuario');return document.MM_returnValue"/></td>
					  </tr>
						<tr>
							<td>
								<span><strong>E-mail</strong></span>
							</td>
							<td>
								<input name="email" type="text" class="cuadrito" onblur="YY_checkform('form1','email','#S','2','ingrese \'E-mail\'');return document.MM_returnValue" />
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Contrase&ntilde;a</strong></span>
							</td>
							<td>
								<input name="password" type="password" class="cuadrito" id="password" onblur="MM_validateForm('password','','R');return document.MM_returnValue"  />
							</td>
						</tr>
				  </table>
			  </div><!-- end entry -->
			</div> <!-- end post -->
			<div class="post">
				<h1 class="title">Datos B&aacute;sicos</h1>
				<div class="entry">
					<p>Ingrese su informaci&oacute;n b&aacute;sica para que nosotros podamos en un futuro facilitarle otros servicios para su comodidad </p>
					<table cols="2" rows="*" border="0">
						<tr>
							<td>
								<span><strong>Nombres</strong></span>
							</td>
							<td>
								<input name="nombre" type="text" class="cuadrito" onblur="YY_checkform('form1','nombre','#q','0','ingrese Nombres');return document.MM_returnValue"/>
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Apellidos</strong></span>
							</td>
							<td>
								<input name="apellido" type="text" class="cuadrito" onblur="YY_checkform('form1','apellido','#q','0','ingrese Apellidos');return document.MM_returnValue" />
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Edad</strong></span>
							</td>
							<td>
								<input name="edad" type="text" class="cuadrito" onblur="YY_checkform('form1','edad','#10_100','1','ingrese Edad \(10-100\)');return document.MM_returnValue" />
                                
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Direcci&oacute;n</strong></span>
							</td>
							<td>
								<input name="direccion" type="text" class="cuadrito" onblur="YY_checkform('form1','direccion','#q','0','ingrese Direccion');return document.MM_returnValue" />
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Ciudad</strong></span>
							</td>
							<td>
								<input name="ciudad" type="text" class="cuadrito" onblur="YY_checkform('form1','direccion','#q','0','ingrese Direccion');return document.MM_returnValue" />
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Localidad - Regi&oacute;n</strong></span>
							</td>
							<td>
								<input name="localidad" type="text" class="cuadrito" onblur="YY_checkform('form1','ciudad','#q','0','Ingrese Ciudad','localidad','#q','0','ingrese Localidad');return document.MM_returnValue" />
							</td>
						</tr>
						<tr>
							<td>
								<span><strong>Pa&iacute;s</strong></span>
							</td>
							<td>
								<input name="pais" type="text" class="cuadrito" onblur="YY_checkform('form1','pais','#q','0','ingrese Pais');return document.MM_returnValue" />
							</td>
						</tr>
					</table>
				</div><!-- end entry -->				
			</div> <!-- end post -->
			<div class="post">
				<h1 class="title">Perfil de Gustos</h1>
				<div class="entry">
					<p>Esta podr&iacute;a ser la secci&oacute;n m&aacute;s importante para usted: aqu&iacute; es donde podr&aacute; eligir cual es la informaci&oacute;n que desea recibir, usted es el jefe.</p>
					<p>Elija sus gustos:</p>
					<table cols="6" rows="*" border="0">
						<tr>
							
							<td>
								<input type="checkbox" name="musical[]" value="clasica" checked="checked" id="check"/>
							</td>
							<td>
								<label>Cl&aacute;sica</label>
							</td>
							<td>
								<input type="checkbox" name="musical[]" value="rock" checked="checked" id="check"/>
							</td>
							<td>
								<label>Rock</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="futbol" checked="checked" id="check"/>
							</td>
							<td>
								<label>f&uacute;tbol</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="baseball" checked="checked" id="check"/>
							</td>
							<td>
								<label>Baseball</label>
							</td>
						</tr>
						<tr>							
							<td>
								<input type="checkbox" name="musical[]" value="salsa" checked="checked" id="check"/>
							</td>
							<td>
								<label>Salsa</label>
							</td>
							<td>
								<input type="checkbox" name="musical[]" value="vallenato" checked="checked" id="check"/>
							</td>
							<td>
								<label>Vallenato</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="voleyball" checked="checked" id="check"/>
							</td>
							<td>
								<label>Voleyball</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="tennis" checked="checked" id="check"/>
							</td>
							<td>
								<label>Tennis</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="musical[]" value="merengue" checked="checked" id="check"/>
							</td>
							<td>
								<label>Merengue</label>
							</td>
							<td>
								<input type="checkbox" name="musical[]" value="soca" checked="checked" id="check"/>
							</td>
							<td>
								<label>Soca</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="boxeo" checked="checked" id="check"/>
							</td>
							<td>
								<label>Boxeo</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="poker" checked="checked" id="check"/>
							</td>
							<td>
								<label>Poker</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="musical[]" value="reggae" checked="checked" id="check"/>
							</td>
							<td>
								<label>Reggae</label>
							</td>
							<td>
								<input type="checkbox" name="musical[]" value="electronica" checked="checked" id="check"/>
							</td>
							<td>
								<label>Electr&oacute;nica</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="patinaje" checked="checked" id="check"/>
							</td>
							<td>
								<label>Patinaje</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="autosc" checked="checked" id="check"/>
							</td>
							<td>
								<label>Carreras de autos</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="musical[]" value="disco" checked="checked" id="check"/>
							</td>
							<td>
								<label>Disco</label>
							</td>
							<td>
								<input type="checkbox" name="musical[]" value="reggaeton" checked="checked" id="check"/>
							</td>
							<td>
								<label>Reggaeton</label>
							</td>
							<td>
								<input type="checkbox" name="deportivo[]" value="maraton" checked="checked" id="check"/>
							</td>
							<td>
								<label>Marat&oacute;n</label>
							</td><td>
								<input type="checkbox" name="deportivo[]" value="basketball" checked="checked" id="check"/>
							</td>
							<td>
								<label>Basketball</label>
							</td>
						</tr>						
					</table><br />
					<input type="submit" name="enviar" value="crear nueva cuenta" onclick="return todo()"/>
					<input type="reset" name="reset" value="borrar" />
					
				</div> <!-- end entry -->
			</div> <!-- end post -->
			</form> <!-- end form -->
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
