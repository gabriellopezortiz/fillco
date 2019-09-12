<?php
session_start();
date_default_timezone_set('America/Bogota');
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE



//recibo las variables del formulario


$flor = 1;
$hora_unix = date('U');
$fecha_calidad = date("Y-m-d");
$hora_calidad = date("h:i:s");
$semana = date("W");
//echo date('l jS \of F Y h:i:s A');
$status = 1;
setlocale(LC_TIME, 'es_CO.UTF-8');
$mesEspaniol=strftime("%B");
$mesCompleto = strtoupper($mesEspaniol);


mysqli_select_db($conexion,$database_conexion);

echo $insertSQL = "INSERT INTO inventario (id_finca, cod_malla, id_flor, codigo_variedad, numero_tallos, grado, cod_bloque, hora_unix,
 fecha_calidad, hora_calidad, status, quien_ingreso_registro,nombre_mes,semana) VALUES ('".$_POST['id_finca']."', '".$_POST['cod_malla']."', 
 '".$flor."', '".$_POST['pilas']."', '".$_POST['numero_tallos']."', '".$_POST['grado']."', '".$_POST['cod_bloque']."', '".$hora_unix."',
 '".$fecha_calidad."', '".$hora_calidad."', '".$status."', '".$_SESSION['idUsuario']."', '".$mesCompleto."', '".$semana."') ";

$ejecucion = mysqli_query($conexion, $insertSQL);
//mysqli_free_result($ejecucion);

mysqli_close($conexion);



?>