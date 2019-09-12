<?php
date_default_timezone_set('America/Bogota');
$utc = date('U');
$anio = date('Y');
$mes = date('m');
$dia = date('d');
$hora = date('H');
$minuto = date('i');
$seg = date('s');
@$ip = getenv(REMOTE_ADDR);
$navegador = $_SERVER["HTTP_USER_AGENT"];
$idUsuario = $_SESSION['idUsuario'];
$primerNombre = $_SESSION['nombre'];
$primerApellido = $_SESSION['apellido'];
$contrasena = $_SESSION['password'];
$tipoUsuario = $_SESSION['tipoCargo'];

//Se crea la conexion

require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE

mysqli_select_db($conexion, $database_conexion);

//Establecer la base de datos donde se insertaran los registros

$consulta = "INSERT INTO registros_ingresos(utc,anio,mes,dia,hora,minuto,segundo,ip,navegador,idUsuario,primerNombre,primerApellido,contrasena,perfil)VALUES('$utc','$anio','$mes','$dia','$hora','$minuto','$seg','$ip','$navegador','$idUsuario','$primerNombre','$primerApellido','$contrasena','$tipoUsuario')";

$recordID = mysqli_query($conexion, $consulta) or die(mysqli_error());

//echo $consulta;

//Cerramos la conexion	
mysqli_close ($conexion); 


?>