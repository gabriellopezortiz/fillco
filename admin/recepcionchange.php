<?php
date_default_timezone_set('America/Bogota');
session_start();

if(isset($_SESSION['nombre'])) {

require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE

$fechaactual = date("d-m-Y h:i:s A");
//$fechaDesde = $fecha->format('Y-m-d'); // imprime por ejemplo: 01/12/2012
 $fechaactual;

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
        <script type="text/javascript" src="appcahnge.js"></script>

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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reportes</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">POR BLOQUE</a>
                            <a class="dropdown-item" href="#">POR VARIEDAD</a>
                            <a class="dropdown-item" href="#">POR VARIEDAD Y BLOQUE</a>
                           
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

                mysqli_select_db($conexion,$database_conexion);
				$primConsulta = " SELECT * FROM  cargos_administrativos  ";
				
				$primerResul = mysqli_query($conexion, $primConsulta);
				
				/*if ($primerResultado	){echo "todo bien";}else{"todo mal";}*/
                
    ?>
        
        



         <!--hero header-->
         <section class="py-5 py-md-6 bg-hero inverse" id="signup" style="background-image: url(img/parallex.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 my-md-auto text-center text-md-left pb-5 pb-md-0">
                    <br>
                        <h1 class="display-3 text-white">RECEPCIÓN-CALIDAD</h1>
                        <?php
													
                                                    if (isset($_GET['existeEmail']) == 1){
                                                    echo"<h3 style='color:#FF0000 '>Ya este correo eléctronico esta registrado en la base de datos, el usuario del correo tiene que recuperar su clave de acceso</h3>";
                                                    }
                                                    
                                                    if (isset($_GET['listo']) == 1){
                                                    echo"<h3 style='color:#0000FF '>El usuario fue creado con exito, la clave le llegara al correo del usuario nuevo</h3>";
                                                    }
                                                
                                                ?>
                        <p class="lead text-light"></p>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <form class="signup-form" name="recepcion" id="recepcion" >
                                    <div class="form-group">
                                        <input id = "fechaactual" name = "fechaactual" type="text" class="form-control" value="<?php echo $fechaactual;?>" readonly  size="40" maxlength="30" style="text-transform:uppercase" required >
                                    </div>
                                    <div class="form-group">
                                        <input id = "cod_malla" name = "cod_malla" type="text" placeholder="CODIGO MALLA" class="form-control" value="" autofocus size="40" maxlength="30"  required >
                                    </div>
                                    <input id = "id_finca" type="hidden" name="id_finca" value="1"  >
                                    <div class="form-group">
                                        <input id="pilas" name="codigo_variedad" type="text" class="form-control" placeholder="CODIGO VARIEDAD" size="40"  maxlength="40"  required >
                                    </div>
                                    <div class="form-group">
                                        <input id="numero_tallos" name="numero_tallos" type="text" class="form-control" placeholder="NÚMERO DE TALLOS" size="100" maxlength="100" style="text-transform:uppercase" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input id="grado" name="grado" type="text" class="form-control" placeholder="GRADO" size="11" maxlength="11" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="cod_bloque" name="cod_bloque" type="text" class="form-control" placeholder="BLOQUE" size="11" maxlength="11" required>
                                    </div>
                                    
                                    <input type="hidden" value="<?php $_SESSION['idUsuario'];?>" id="quien_ingreso_registro" name="quien_ingreso_registro" >                        
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                    </div>
                                </form>
                                        
                                <form class="signup-form" name="contadorReset" id="contadorReset">
                                     <div class="form-group">
                                        <input  id="contadorResetInput" name="contadorResetInput" type="text" class="form-control" placeholder="CONTADOR" size="11" maxlength="11">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-block">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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

                    <div class="col-md-2 col-sm-6 ml-auto">
                        <h5 class="text-white">Reportes</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Por Bloque</a></li>
                            <li><a href="#">Por Variedad</a></li>
                            <li><a href="#">Por Variedad Y Bloque</a></li>
                           
                        </ul>
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