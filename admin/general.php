<?php
date_default_timezone_set('America/Bogota');
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE

session_start();
if(isset($_SESSION['nombre'])) {
    

    
                $dia = date('j');
                $mes = date('n');
                $anio = date('Y');
                $fechaactual = date("d-m-Y h:i:s A");
//$fechaDesde = $fecha->format('Y-m-d'); // imprime por ejemplo: 01/12/2012
                $fechaactual;
                setlocale(LC_TIME, 'es_CO.UTF-8');
                $mesEspaniol=strftime("%B");
                $mesCompleto = strtoupper($mesEspaniol);
                $semana = date("W");




$result = 1;
$row1 = 1;
    

    

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    
        
    
    
    
    if(isset($_POST['fechaDesde'])) {//componente que se almacena en el deposito    
    $fechaDesde = $_POST['fechaDesde']; 
    }
    if(isset($_POST['fechaHasta'])) {//componente que se almacena en el deposito    
    $fechaHasta = $_POST['fechaHasta']; 
    }

    if(isset($_POST['cod_bloque'])) {//componente que se almacena en el deposito    
    $cod_bloque = $_POST['cod_bloque']; 
    }
    
    if(isset($_POST['ruta'])) {//componente que se almacena en el deposito  
    $ruta = $_POST['ruta']; 
    }       
    ///////////////////////AQUI VA ALMACENADO QUIEN ENVIA LA INFORMACION
    if(isset($_POST['quien'])) {    //variable para saber si es de produccion o de calidad
        $quien = $_POST['quien'];   
        }   
        
    
    
        mysqli_select_db($conexion,$database_conexion);
                 
                 $first = "
                
                   SELECT SUM(`numero_tallos`) AS totalTallos, `cod_bloque`, inventario.grado, variedad_flor.nombre, inventario.codigo_variedad, inventario.nombre_mes, inventario.semana, bloque.id_area, variedad_flor.id_variedad, color.color, color.color_spanish, color.code_html FROM inventario Join variedad_flor on inventario.codigo_variedad = variedad_flor.codigo_variedad INNER JOIN bloque ON inventario.cod_bloque = bloque.codigo INNER JOIN color ON variedad_flor.id_color = color.id_color and inventario.fecha_calidad BETWEEN '".$fechaDesde."' AND '".$fechaHasta."'   GROUP BY inventario.cod_bloque, inventario.codigo_variedad, inventario.grado
                
                ";              
                 //$second = mysqli_query($conexion, $first);  

                 $result = $conexion->query($first);
                 //$result = $conn->query($sql);

                 if (!$result) {
                        trigger_error('Invalid query: ' . $conexion->error);
                    }




  $calcularTotales = "
    SELECT SUM(`numero_tallos`) AS totalTallosT FROM inventario Join variedad_flor on inventario.codigo_variedad = variedad_flor.codigo_variedad INNER JOIN bloque ON inventario.cod_bloque = bloque.codigo INNER JOIN color ON variedad_flor.id_color = color.id_color and inventario.fecha_calidad BETWEEN '".$fechaDesde."' AND '".$fechaHasta."' 
                                 ";
                                 
   $resulTotales = mysqli_query($conexion, $calcularTotales); 


    
} 


/*
            
            
                        select * FROM salidas_acumulados, base_estandar WHERE salidas_acumulados.Material = base_estandar.Material AND Fe_contab BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() AND base_estandar.TIPO = '1'   
            
                select *, (ordenes_gloria.FACTOR2*salidas.Cantidad) AS litros, (((ordenes_gloria.FACTOR2*salidas.Cantidad)) * Densidad ) AS Kg, (((ordenes_gloria.FACTOR2*salidas.Cantidad))* mg /100) AS KGMG,  ((((ordenes_gloria.FACTOR2*salidas.Cantidad))*Densidad) * MP / 100) AS KGMP, ((ST * ((Importe_ML/1000)*Densidad)  )/100) AS KgST  FROM salidas, ordenes_gloria  WHERE salidas.Material = ordenes_gloria.MATERIAL AND ordenes_gloria.TIPO = '1'  AND MONTH(Fe_contab) = ".$mesActual." AND YEAR(Fe_contab) = ".$anioActual."*/




     /*
     ((SUM((Volumen*DENSIDAD))/(SUM(Volumen))))  AS totalDensidad,
     
     select sum(volRealL) as totalLitros, sum(cantidadNeta) as totalCantidad, sum(volRealKg) as Tkg,  (sum(KgGrasaReal)/sum(volRealL)*100) as totalmg, sum(KgGrasaReal) as TKGMG7, (sum(KgProteinaReal)/sum(volRealKg)*100) as totalMP, sum(KgProteinaReal) as TKGMP7
 
  from salidas_acumulados WHERE  Fe_contab = '".$fecha."'*/
// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);




?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Fillco Pro</title>
        <meta name="description" content="Lambda is a beautiful Bootstrap 4 template for multipurpose landing pages." /> 

        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!--vendors styles-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

        <!-- Bootstrap CSS / Color Scheme -->
        <link rel="stylesheet" href="css/default.css" id="theme-color">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        

        <style type="text/css">
        .important {
              font-weight: bold;
              font-size: xx-large;
            }

            .blue {
              color: blue;
            }
        </style>

    </head>

    
    <body data-spy="scroll" data-target="#lambda-navbar" data-offset="0">

       <!--navigation-->
       <nav class="navbar navbar-expand-md navbar-dark navbar-transparent fixed-top sticky-navigation" id="lambda-navbar">
            <a class="navbar-brand" href="index.php">
                Fillco Pro
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" 
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="./index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./agregarUsuario.php">Agregar Usuario</a>
                            <a class="dropdown-item" href="listadoUsuarios.php">Listado de Usuarios</a>
                           
                        </div>
                        
                        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Informes</a>
                           <div class="dropdown-menu">
                                <a class="dropdown-item" href="general.php">GENERAL PRODUCCION</a>
                                <a class="dropdown-item" href="generalInventario.php">GENERAL INVENTARIO</a>
                                <a class="dropdown-item" href="porBloque.php">POR BLOQUE</a>
                                <a class="dropdown-item" href="porVariedad.php">POR VARIEDAD</a>
                                <a class="dropdown-item" href="variedadBloque.php">POR VARIEDAD Y BLOQUE</a>
                                
                              
                           
                          

                                

                           </div>


                    
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Producción</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./recepcion.php">GRANEL INGRESO</a>
                            <a class="dropdown-item" href="granel.php">GRANEL SALIDA</a>
                           
                        </div>

                        <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Post Cosecha</a>
                    </li>


                     <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Comercial</a>
                    </li>                   
                </ul>
                <form class="form-inline">
                    <a href="#signup" class="btn btn-outline-secondary btn-navbar page-scroll">Balances</a>
                </form>
            </div>
        </nav>

        

    <?php 
        function CrearCodAsignado(){
            $cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                
            $longitud = 6; //longitud de la clave 
            
            
            // Se raealiza una funcion hash (dispersion) sobre la cadena de caracteres  
            
            $cadena= md5($cadena);
            $longcadena=strlen($cadena); //*longitud  de la cadena 
            
            // se genera un valor random 
            
            srand((double) microtime() * 10000000);
            
            //* se selecciona un punto inicial arbitrario 
            $inicio = rand (0, ($longcadena - $longitud - 1));
            
            global $passworNew;
            $passworNew= substr($cadena, $inicio, $longitud);
            
            
            }
            
            
            
            CrearCodAsignado();	
            
                $passworNew;//ESTA ES LA VARIABLE QUE ME GUARDA EL CODIGO DE ACCESO AL SISTEMA

                //mysqli_select_db($conexion,$database_conexion);
				$primConsulta = " SELECT * FROM  cargos_administrativos  ";
				
				//$primerResul = mysqli_query($conexion, $primConsulta);
				
				/*if ($primerResultado	){echo "todo bien";}else{"todo mal";}*/
                
    ?>
        
        



         <!--hero header-->
         <section class="py-5 py-md-6 bg-hero inverse" id="signup" style="background-image: url(img/parallex.jpg)">
            <div class="container">
                
                                    <!---->
                 <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                  <th scope="col">CONSULTA EN GENERAL</th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                 
                                </tr>
                              </thead>

                              <thead>
                               
                              </thead>
                              <tbody>
                                
                                 <form class="signup-form" name="form1" id="form1" method="post" action="<?php echo $editFormAction; ?>" >

                                 <tr>
                                  <th scope="row">
                                       <div class="form-group">
                                              <div class="input-group mb-3">
                                                              <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01">Fecha Inicio</label>
                                                              </div>
                                                          <input class="form-control" type="date" id="fechaHasta" name="fechaDesde" min="2019-07-01" max="2019-12-31">
                                                    </div>
                                              </div>
                                  </th>
                                  <td><div class="form-group">
                                              <div class="input-group mb-3">
                                                              <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01">Fecha Fin</label>
                                                              </div>
                                                          <input class="form-control" type="date" id="fechaHasta" name="fechaHasta"  min="2019-07-01" max="2019-12-31">
                                                    </div>
                                              </div></td>
                                  <td></td>
                                 
                                </tr>

                               
                                <tr>
                                  <th scope="row"></th>
                                  <td> <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                    </div></td>
                                  <td> 
                                   
                                  </td>
                                 
                                </tr>

                                 <input type="hidden" name="MM_insert" value="form1" />
                               </form>
                              </tbody>
                            </table>
                                                <!---->
                
            </div>
        </section>

        


        <?php if(isset($_POST['fechaDesde'])) { ?>



        <section >
            <div class="container">

        <table class="table table-striped">
  <thead>
    
    <tr>
     <th scope="col"># AREA</th>
      <th scope="col"># BLOQUE</th>
      <th scope="col">GRADO</th>
      <th scope="col">VARIEDAD</th>
     
      <th scope="col">Total</th>
    </tr>
     
  </thead>
  <tbody>

    <?php if ((isset($result->num_rows)> 0)){   ?><!--#############ESTO ME SACO LA PACIENCIA*********-->

        
    <?php while($row1 = $result->fetch_assoc()){ ?>

   
    <tr>
      <td><?php echo $row1['id_area']; ?></td>
      <th scope="row"><?php echo $row1['cod_bloque']; ?></th>
      <th scope="row"><?php echo $row1['grado']; ?></th>
      <td><?php echo $row1['nombre']; ?></td>
     
      <td><?php echo $row1['totalTallos']; ?></td>


    </tr>
      <?php  } } 

     $conexion->close();

      ?>
      <tr>
      <td></td>
      <td></td>
      <th scope="row">
     
      <td><strong>Total General</strong> 
        
      </td>
      <?php while($row5 = mysqli_fetch_array($resulTotales)){ ?>
      <td>
        <strong><?php if(isset($row5['totalTallosT'])) {echo number_format($row5['totalTallosT'], 0, ',', '.'); }?></strong>
      </td>
    <?php } ?>
    </tr>
      <tr>
      <td></td>
      <th scope="row">
     
      <td>
        
      </td>
      <td>
        <div class="form-group">
            <form method="post" action="exportInformeGeneral.php">
            <button type="submit" class="btn btn-primary btn-block" name="export">Excel</button>
            <input type="hidden" value="<?php if(isset($_POST['fechaDesde'])) { echo $_POST['fechaDesde'];} ?>" name="fechaDesde">
            <input type="hidden" value="<?php if(isset($_POST['fechaHasta'])) { echo $_POST['fechaHasta'];} ?>"  name="fechaHasta">
            </form>
        </div>
      </td>
    </tr>
    
  </tbody>
</table>

            </div>
        </section>

    <?php } ?>


        <audio id = "sonido">
    <source src = "Voz femenina de computadora diciendo.mp3" type = "audio/mpeg" />
</audio>
        




       <!--footer / contact-->
       <footer class="py-6 bg-black" id="contact">
            <div class="container">
                <div class="row">
                    

                <div class="col-md-2 col-sm-6 ml-auto">
                        <h5 class="text-white">Usuarios</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Agregar Usuario</a></li>
                            <li><a href="#">Listado De Usuarios</a></li>
                            
                        </ul>
                    </div>

                      <div class="dropdown-menu">
                                <a class="dropdown-item" href="general.php">GENERAL PRODUCCION</a>
                                <a class="dropdown-item" href="generalInventario.php">GENERAL INVENTARIO</a>
                                <a class="dropdown-item" href="porBloque.php">POR BLOQUE</a>
                                <a class="dropdown-item" href="porVariedad.php">POR VARIEDAD</a>
                                <a class="dropdown-item" href="variedadBloque.php">POR VARIEDAD Y BLOQUE</a>
                                
                              
                           
                          

                                

                           </div>

                    <div class="col-md-2 col-sm-6 ml-auto">
                        <h5 class="text-white">Producción</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Recepción-Calidad</a></li>
                            <li><a href="#">Inventario a Granel</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="text-white">Post Cosecha</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Elemento 1</a></li>
                            <li><a href="#">Elemento 2</a></li>
                            <li><a href="#">Elemento 3</a></li>
                            <li><a href="#">Elemento 4</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="text-white">Comercial</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Elemento 1</a></li>
                            <li><a href="#">Elemento 2</a></li>
                            <li><a href="#">Elemento 3</a></li>
                            <li><a href="#">Elemento 4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-muted text-center small-xl">
                    <p>&copy; 2019 Fillco Pro. All rights reserved. CI Fillco Flowers S.A.S.</p>
                        
                    </div>
                </div>
            </div>
        </footer>
        <!--scroll to top-->
        <div class="scroll-top">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>

        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" charset="iso-8859-1">
function AceptaNumero(e)
{
    	var whichCode = e.keyCode;
    	if(!whichCode) whichCode=e.which;
		if (whichCode < 13 || (whichCode>=37 && whichCode<=40) || (whichCode>=45 && whichCode<=57)) return true; // Enter
		else return false;
}


function AceptaTexto(e)
{
    	var whichCode = e.keyCode;
    	if(!whichCode) whichCode=e.which;
		if ((whichCode != 32) && (whichCode< 65) || (whichCode > 90) && (whichCode < 97) || (whichCode>122)) return false;
}



 function subirimagen(){
			   self.name='opener';
			   remote=open('gestionimagen.php','remote','width=800,height=300,location=no,scrollbars=yes,menubars=no,toolbaras=no,resizable=yes,fullscreen=no,status=yes screenX=440,screenY=90');
			   remote.focus();
			   
			   
			   }



</script>
    </body>
</html>


<?php 
}else{
	
    echo '<script language="javascript">
location.href = "../admin/accesoInvalido.php";
</script>'
;

}
?>