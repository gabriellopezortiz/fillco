<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion = "localhost";
$database_conexion = "wwwfill_data_base";
//$database_conexion = "wwwfill_fillcodb";
$username_conexion = "wwwfill_userdb";
$password_conexion = "FillcoFlowersdb7$";
$conexion = mysqli_connect( $hostname_conexion, $username_conexion, $password_conexion ) or die ("No se ha podido conectar al servidor de Base de datos");
?>

