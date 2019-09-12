<?php
include("database.php");

$cod_malla = $_POST['cod_malla'];
//$cod_malla = '1234';
$valorID='';

if(!empty($cod_malla)){

 $query = "
 
SELECT * FROM inventario, variedad_flor WHERE inventario.cod_malla = '".$cod_malla."' AND inventario.status = 1 AND inventario.codigo_variedad = variedad_flor.codigo_variedad ORDER BY id_inventario DESC LIMIT 1

";
$respuesta = mysqli_query($conexion,$query);

 $row_cnt = mysqli_num_rows($respuesta);

$json= array();
while ($row= mysqli_fetch_array($respuesta)) {
    
    $valorID =  $row['id_inventario'];

    $json[] = array(
        'cod_malla' => $row['cod_malla'],
        'nombre' => $row['nombre'],
        
    );
}

 $query2 = "
       UPDATE inventario SET inventario.status = 2 WHERE inventario.id_inventario = '".$valorID."'
";

$respuesta2 = mysqli_query($conexion,$query2);

$jsonstring = json_encode($json);
echo $jsonstring;


}



?>