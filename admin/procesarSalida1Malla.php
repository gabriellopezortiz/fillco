<?php
session_start();
date_default_timezone_set('America/Bogota');
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE



//recibo las variables del formulario


$flor = 1;
$hora_unix = date('U');
$fecha_granel  = date("Y-m-d");
$hora_granel = date("h:i:s");
$semana = date("W");
//echo date('l jS \of F Y h:i:s A');
$status = 1;
setlocale(LC_TIME, 'es_CO.UTF-8');
$mesEspaniol=strftime("%B");
$mesCompleto = strtoupper($mesEspaniol);

$cod_malla = $_POST['cod_malla'];

mysqli_select_db($conexion,$database_conexion);

echo $updateSQL = "

UPDATE inventario SET inventario.status = 2, fecha_granel = '".$fecha_granel."', hora_granel = '".$hora_granel."'  WHERE inventario.cod_malla = '".$cod_malla."' AND inventario.status = 1

 ";

$ejecucion = mysqli_query($conexion, $updateSQL);
//mysqli_free_result($ejecucion);

mysqli_close($conexion);



?>