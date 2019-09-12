<?php
session_start();
include("database.php");

$pilas = $_POST['pilas'];

//$pilas = 'j';

$ubicacion= ''
if($_SESSION['ubicacion']=='FILLCO'){

	$ubicacion = 1;
}



if(!empty($pilas)){

 $query = "

SELECT bloque.codigo from bloque WHERE bloque.id_bloque IN (SELECT bloque_variedad.id_bloque FROM bloque_variedad INNER JOIN variedad_flor ON bloque_variedad.id_variedad = variedad_flor.id_variedad AND bloque_variedad.id_finca = '".$ubicacion."' AND bloque_variedad.id_variedad IN (SELECT variedad_flor.id_variedad FROM variedad_flor WHERE variedad_flor.codigo_variedad = '".$pilas."') )


";
$respuesta = mysqli_query($conexion,$query);



$json= array();
while ($row= mysqli_fetch_array($respuesta)) {
    $json[] = array(
        'codigo' => $row['codigo'],
        
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;
}


?>