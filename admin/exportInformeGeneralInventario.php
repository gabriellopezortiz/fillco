<?php  
//export.php 

 
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE

mysqli_select_db($conexion,$database_conexion);
$output = '';
if(isset($_POST["export"]))
{
	
	if(isset($_POST['fechaDesde'])) {//componente que se almacena en el deposito	
	$fechaDesde = $_POST['fechaDesde'];	
	}
	
	
	if(isset($_POST['fechaHasta'])) {//componente que se almacena en el deposito	
	$fechaHasta = $_POST['fechaHasta'];	
	}
	
	
 $first = "
				
			 SELECT SUM(`numero_tallos`) AS totalTallos, `cod_bloque`, inventario.grado, variedad_flor.nombre, inventario.codigo_variedad, inventario.nombre_mes, inventario.semana, bloque.id_area, variedad_flor.id_variedad, color.color, color.color_spanish, color.code_html FROM inventario Join variedad_flor on inventario.codigo_variedad = variedad_flor.codigo_variedad INNER JOIN bloque ON inventario.cod_bloque = bloque.codigo INNER JOIN color ON variedad_flor.id_color = color.id_color and inventario.fecha_calidad BETWEEN '".$fechaDesde."' AND '".$fechaHasta."' AND inventario.status = 1  GROUP BY inventario.cod_bloque, inventario.codigo_variedad
				
				";				
				$second = mysqli_query($conexion, $first);	


				$calcularTotales = "
    SELECT SUM(`numero_tallos`) AS totalTallosT FROM inventario Join variedad_flor on inventario.codigo_variedad = variedad_flor.codigo_variedad INNER JOIN bloque ON inventario.cod_bloque = bloque.codigo INNER JOIN color ON variedad_flor.id_color = color.id_color and inventario.fecha_calidad BETWEEN '".$fechaDesde."' AND '".$fechaHasta."' AND inventario.status = 1
                                 ";
                                 
   $resulTotales = mysqli_query($conexion, $calcularTotales); 



 
 
 
 
 if(mysqli_num_rows($second) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                        <th>AREA</th>  
						<th>BLOQUE</th>
						<th>VARIEDAD</th>
						<th>TOTAL</th>						         					
                    </tr>

  ';
  while($row = mysqli_fetch_array($second))
 
 
 /*  <td >".$row1['Material']."</td>
              <td >".$row1['Texto_breve_material']."</td>
              <td>".number_format($row1['volRealL'], 0, ',', '.')."</td>
              <td>".number_format($row1['Densidad'], 4, ',', '.')."</td>
              <td>".number_format($row1['volRealKg'], 0, ',', '.')."</td>
			  <td>".number_format($row1['mg'], 2, ',', '.')."</td>
               <td>".number_format($row1['KgGrasaReal'], 1, ',', '.')."</td>
              
              <td>".number_format($row1['MP'], 2, ',', '.')."</td>
              <td>".number_format($row1['KgProteinaReal '], 1, ',', '.')."</td>
               
			   
			  <td colspan='2'>".$row1['Fe_contab']."</td>*/
  
  {
   $output .= '
    <tr>  
                       <td>'.$row["id_area"].'</td>  
                         <td>'.$row["cod_bloque"].'</td> 
                         <td>'.$row["grado"].'</td>   
						  <td>'.$row["nombre"].'</td>                          
						  <td>'.$row["totalTallos"].'</td>  
						  
						  


						  
                    </tr>
   ';

 




  }


  while($row1 = mysqli_fetch_array($resulTotales))

 $output .= '
     
                    <tr>
                        <th></th>  
						<th></th>
              <th></th>
						<th>TOTAL</th>
						<th>'.$row1["totalTallosT"].'</th>						         					
                    </tr>
                    
  ';






  $output .= '</table>';

  /*td><?php echo $row1['id_area']; ?></td>
      <th scope="row"><?php echo $row1['cod_bloque']; ?></th>
      <td><?php echo $row1['nombre']; ?></td>
     
      <td><?php echo $row1['totalTallos']; ?></td>*/
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=InformeGeneralProduccion.xls');
  //header("Content-Type: application/xls;charset=UTF-8");
  //header("Content-Disposition: attachement; filename=file.xls");
  echo $output;
 }
}
?>
