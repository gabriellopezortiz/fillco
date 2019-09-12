<?php
session_start(); 
if(isset($_SESSION['nombre'])) { 
include('./logRegistros.php');
//echo "esta es la variable de sesion". $_SESSION['tipoCargo']; 
isset($_SESSION['tipoCargo']);


?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inicio Fillco Pro</title>
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
                    </li>
                        
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Informes</a>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="general.php">GENERAL PRODUCCION</a>
                                <a class="dropdown-item" href="generalInventario.php">GENERAL INVENTARIO</a>
                                <a class="dropdown-item" href="porBloque.php">POR BLOQUE</a>
                                <a class="dropdown-item" href="porVariedad.php">POR VARIEDAD</a>
                                <a class="dropdown-item" href="variedadBloque.php">POR VARIEDAD Y BLOQUE</a>
                                
                              
                           
                          

                                

                           </div>


                    </li>
                             <!--
                    <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Services</span> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Service A</a></li>
                <li><a href="#">Service B</a></li>
                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">Service C</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Service C1</a></li>
                        <li><a href="#">Service C2</a></li>
                        <li><a href="#">Service C3</a></li>
                        <li><a href="#">Service C4</a></li>
                        <li><a href="#">Service C5</a></li>
                    </ul>
                </li>
            </ul>
        </li>
                    -->
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Producción</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./recepcion.php">GRANEL INGRESO</a>
                        <!--<a class="dropdown-item" href="./recepcionchange.php">GRANEL INGRESO CHANGE</a>
                            <a class="dropdown-item" href="./recepcionfocus.php">GRANEL INGRESO FOCUS</a>-->


                            <a class="dropdown-item" href="outRecepcion.php">GRANEL SALIDA</a>



                           
                        </div>

                 <!--       <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Post Cosecha</a>
                    </li>-->


                 <!--      <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Comercial</a>
                    </li> -->

                    

                </ul>
              <!--  <form class="form-inline">
                    <a href="#signup" class="btn btn-outline-secondary btn-navbar page-scroll">Balances</a>
                </form>-->
            </div>
        </nav>

        

        <!--hero header-->
        <section class="py-7 py-md-0 bg-hero" id="home" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url(img/parallex.jpg)">
            <div class="container">
                <div class="row vh-md-100">
                    <div class="col-md-7 my-md-auto text-center text-md-left">
                    
		  
		  
		  
		  <?php if (isset($_SESSION['nombre'])!="") { ?>
                    <img id="mifoto" width="80" height="80" src="./img/users/<?php
					  if (isset($_SESSION['foto'])==NULL){ echo 'Desconocido.png';  
					                                    }else{
															  echo $_SESSION['foto'];} ?>"  />

                    
                     <?php echo "<p  style='color:#3399FF';font-size: 9px;> ".strtoupper($_SESSION['descripcionUsuario'])." ".$_SESSION['nombre']." ".$_SESSION['apellido']."</p><a href=\"../controlador/cerrarSesion.php\"><button type='button' class='btn btn-light'>CERRAR SESIÓN</button><br> </a><a href='./passwordChange.php'><button type='button' class='btn btn-dark'>CAMBIAR CLAVE</button></a><hr noshade='noshade' width='200' >"; 
					
					} ?>
                        <h1 class="display-3 text-white font-weight-bold" style="color:blue;">Sistema De Control</h1>
                        <p class="lead text-light my-4"></p>
                        <a href="#" class="btn btn-primary page-scroll">Finca Fillco</a>
                    </div>
                </div>
            </div>
        </section>

       
        
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php
}else{
	
         echo '<script language="javascript">
            location.href = "./accesoInvalido.php";
            </script>';
	
	}

?>