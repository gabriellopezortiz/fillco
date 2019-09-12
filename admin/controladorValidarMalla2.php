<?php
include("database.php");

$cod_malla = $_POST['cod_malla'];
//$cod_malla = '1234';

if(!empty($cod_malla)){

 $query = "
 
SELECT * FROM inventario, variedad_flor WHERE inventario.cod_malla = '".$cod_malla."' AND inventario.status = 1 AND inventario.codigo_variedad = variedad_flor.codigo_variedad ORDER BY id_inventario DESC LIMIT 1

";

$respuesta = mysqli_query($conexion,$query);

 $row_cnt = mysqli_num_rows($respuesta);

$json= array();
while ($row= mysqli_fetch_array($respuesta)) {
    
   

    $json[] = array(
        'cod_malla' => $row['cod_malla'],
        'nombre' => $row['nombre'],
        
    );
}



$jsonstring = json_encode($json);
echo $jsonstring;


}



?>