<?php
include("database.php");
date_default_timezone_set('America/Bogota');
$cod_malla = $_POST['cod_malla'];
//$cod_malla = '1234';


//recibo las variables del formulario


$flor = 1;
$hora_unix = date('U');
$fechaHoy  = date("Y-m-d");
$hora_granel = date("h:i:s");
$semana = date("W");
//echo date('l jS \of F Y h:i:s A');
$status = 1;
setlocale(LC_TIME, 'es_CO.UTF-8');
$mesEspaniol=strftime("%B");
$mesCompleto = strtoupper($mesEspaniol);


if(!empty($cod_malla)){

 $query = "
 
SELECT * FROM inventario, variedad_flor WHERE inventario.cod_malla = '".$cod_malla."' AND inventario.status = 1 AND inventario.codigo_variedad = variedad_flor.codigo_variedad ORDER BY id_inventario DESC LIMIT 1

";

$respuesta = mysqli_query($conexion,$query);

$row_cnt = mysqli_num_rows($respuesta);

if ($row_cnt > 0){

	$updateSQL = "

UPDATE inventario SET inventario.status = 2, fecha_granel = '".$fechaHoy."', hora_granel = '".$hora_granel."'  WHERE inventario.cod_malla = '".$cod_malla."' AND inventario.status = 1

 ";

$ejecucion = mysqli_query($conexion, $updateSQL);
//mysqli_free_result($ejecucion);

mysqli_close($conexion);

header("Location:../admin/outRecepcion.php?codMalla=$cod_malla");

  

}else{

	header("Location:../admin/outRecepcion.php?varError=1");
}






}



?>