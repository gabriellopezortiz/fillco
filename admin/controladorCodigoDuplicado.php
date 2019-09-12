<?php
include("database.php");

$cod_malla = $_POST['cod_malla'];

//$pilas = 'j';



if(!empty($cod_malla)){

 $query = "

SELECT *  FROM `inventario` WHERE `cod_malla` = '".$cod_malla."' and inventario.status = 1


";
$respuesta = mysqli_query($conexion,$query);



$json= array();
while ($row= mysqli_fetch_array($respuesta)) {
    $json[] = array(
        'cod_bloque' => $row['cod_bloque'],
        
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;
}


?>