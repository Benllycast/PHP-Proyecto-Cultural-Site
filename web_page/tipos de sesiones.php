<?php session_start();
 	
	if(!isset($_SESSION["entrada"])){
		header("Location: /Interfaz/Validar/login.php") ;
	}

?>
///////////////////////////////////////////////
<?php session_start();
 	
	if(!isset($_SESSION["entrada"])){
		header("Location: /Interfaz/Validar/login.php") ;
	}

?>
////////////////////////////////////////
<?php
session_start();

$Autollamar = $_SERVER['PHP_SELF']; 
$sw=true;
if(($_POST['username']) && ($_POST['password'])){

	    $dbhostname = "localhost";
        $dbdatabase = "erp";
        $dbusername = "root";
		$dbpassword = "123456";
		
		mysql_connect ($dbhostname, $dbusername , $dbpassword );
        mysql_select_db($dbdatabase);
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query = mysql_query("SELECT user,password,grupo FROM usuarios WHERE user = '".$username."' AND                              password = '".$password."'");
		
		$registros = mysql_fetch_array($query); 
		$sw=false;
		if($registros['user']==$username && $registros['password']==$password){
			 $sw=true; 
			 $_SESSION["entrada"]=$username;
			 $_SESSION["master"]=$registros['grupo'];
			 $_SESSION["mensaje"]="0";	
			
		  	 header("Location: /index.php");
		}
	
}

?>
/////////////////////////////////
<?php session_start();
 	
	if((!$_SESSION["master"]) || (!isset($_SESSION["master"]))){
	    
		header("Location: /index.php") ;
	}
	if($_SESSION["master"]!="Master"){
		$_SESSION["mensaje"]="1";
		header("Location: /index.php") ;
	}	
	

?>
///////////////////////////////////
<?php session_start();
 	
	if(!isset($_SESSION["entrada"])){
		header("Location: /Interfaz/Validar/login.php") ;
	}
	if($_SESSION["master"]=="Limitado"){
		$_SESSION["mensaje"]="1";
		header("Location: /index.php") ;
	}	
	
?>
///////////////////////////////////////////////
<?php session_start();
 	
	if(!isset($_SESSION["entrada"])){
		header("Location: /Interfaz/Validar/login.php") ;
	}	
	
?>
///////////////////////////////////////////////
<?php
	session_start();
    unset ($_SESSION["entrada"]);
	unset ($_SESSION["mensaje"]);
	$_SESSION = array();
	session_unset();
	session_destroy();
	header("Location: /Interfaz/Validar/login.php");
?>