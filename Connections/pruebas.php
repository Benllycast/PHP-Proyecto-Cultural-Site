<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pruebas = "localhost";
$database_pruebas = "erp";
$username_pruebas = "root";
$password_pruebas = "123456";
$pruebas = mysql_pconnect($hostname_pruebas, $username_pruebas, $password_pruebas) or trigger_error(mysql_error(),E_USER_ERROR); 
?>