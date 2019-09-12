<?php
session_start();
date_default_timezone_set('America/Bogota');
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE



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



 mysqli_select_db($conexion,$database_conexion);
				

				 $primConsulta = " SELECT COUNT(id_inventario) as numeroMallas FROM inventario WHERE status = 2 and fecha_granel = '".$fechaHoy."'
                 ";


				
				$primerResulMallas = mysqli_query($conexion, $primConsulta);

				$arregloContador= array();
				
				if($cuenta = mysqli_fetch_array($primerResulMallas)){

                    //echo $numeroMallas=$cuenta['numeroMallas'];    

                  $arregloContador[] = array(
				        'numeroMallas' => $cuenta['numeroMallas'],
				        
				    );


                }

                $Contadorstring = json_encode($arregloContador);
                echo $Contadorstring;




?>