<?php
session_start();
if(isset($_SESSION['nombre'])) {

require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE


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
    </head>
    <body data-spy="scroll" data-target="#lambda-navbar" data-offset="0">

        <!--navigation-->
        <nav class="navbar  navbar-expand-md navbar-dark  fixed-top sticky-navigation" id="lambda-navbar" style="background-color: #292929;">
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
                        <a class="nav-link page-scroll" href="#services">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../controlador/agregarUsuario.php">Agregar Usuario</a>
                            <a class="dropdown-item" href="listadoUsuarios.php">Listado de Usuarios</a>
                           
                        </div>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Módulo Calidad</a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#reviews">Módulo Producción</a>
                    </li>                   
                     <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Módulo Comercial</a>
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
                        <h1 class="display-3 text-white">Ingresar Usuario</h1>
                        <p class="lead text-light"></p>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <form class="signup-form" name="agregarUsuario"  method="post" action="./procesarNuevoUsuario.php">
                                    <div class="form-group">
                                        <input name="nombre" type="text" class="form-control" placeholder="Nombre" autofocus size="40" maxlength="30" style="text-transform:uppercase" required >
                                    </div>
                                    <div class="form-group">
                                        <input name="apellido" type="text" class="form-control" placeholder="Apellido" size="40" maxlength="30" style="text-transform:uppercase" required >
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Correo Eléctronico" size="100" maxlength="100" style="text-transform:uppercase" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input name="cedula" type="text" class="form-control" placeholder="N. De Identificación" size="11" maxlength="11"  onKeyPress="return AceptaNumero(event);">
                                    </div>
                                    <div class="form-group">
                                        <input name="telefono" type="text" class="form-control" placeholder="Teléfono" size="11" maxlength="11"  onKeyPress="return AceptaNumero(event);">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="cargo" required>
                                            <option value="">Cargo asignado al sistema</option>
                                            <?php while($row1 = mysqli_fetch_array($primerResul)){
			    
                                                    //primero capturo los datos del usuario y los guardo en variables de arreglo
                                                    
                                                        $idCargo=$row1['id'];
                                                        $nombreCargo=$row1['nombre'];									
                                                                                        ?>
                                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['nombre']; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input readonly  value="Clave asignada por el sistema" type="text" class="form-control" style="background-color:#CDDBE8"  >
                                    </div>
                                    <div class="form-group">
                                        <input readonly name="password" value="<?php echo $passworNew; ?>" type="text" class="form-control">
                                    </div>
                                    <input type="hidden" name="ubicacion" value="FILLCO"  >
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
       <!--footer / contact-->
       <footer class="py-6 bg-black" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <h5 class="text-white">Fillco Pro</h5>
                        <p class="about">Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. 
                            Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam explabo.</p>
                        <ul class="list-inline social social-rounded social-sm">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 ml-auto">
                        <h5 class="text-white">Fillco Pro</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="text-white">Products</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Publish</a></li>
                            <li><a href="#">Outreach</a></li>
                            <li><a href="#">Collaborate</a></li>
                            <li><a href="#">Global</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5 class="text-white">Community</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">Help forum</a></li>
                            <li><a href="#">Slack channel</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Policies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-muted text-center small-xl">
                        <p>&copy; 2019 Fillco Pro. All rights reserved.</p>
                        <a href="https://www.fillcoflowers.com/" target="_blank">Fillco Roses</a>.
                    </div>
                </div>
            </div>
        </footer>
        <!--scroll to top-->
        <div class="scroll-top">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>

        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
</script>


'
;

}
?>