<?php
$utc = date('U');
$anio = date('Y');
$mes = date('m');
$dia = date('d');
$hora = date('H');
$minuto = date('i');
$seg = date('s');
@$ip = getenv(REMOTE_ADDR);
$navegador = $_SERVER["HTTP_USER_AGENT"];


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

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body data-spy="scroll" data-target="#lambda-navbar" data-offset="0">

        <!--navigation-->
        <nav class="navbar navbar-expand-md navbar-dark navbar-transparent fixed-top sticky-navigation" id="lambda-navbar">
            <a class="navbar-brand" href="../">
                Sistema Fillco Pro
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" 
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#reviews"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#faq"></a>
                    </li>
                </ul>
                <form class="form-inline">
                    <a href="../" class="btn btn-outline-secondary btn-navbar page-scroll">Módulo de Acceso a Ficoll Pro</a>
                </form>
            </div>
        </nav>

       


      
        <!--hero header-->
        <section class="py-5 py-md-6 bg-hero inverse" id="signup" style="background-image: url(img/parallex.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 my-md-auto text-center text-md-left pb-5 pb-md-0">
                    <a href="../"><h1 class="display-3 text-white">Acceso Denegado al sistema</h1></a>
                        <?php
													
							if (isset($_GET['error']) == 1){
							echo"<h1 style='color:#F51D1D '>Usuario o clave errado</h1>";
                            }
                            if (isset($_GET['recuperar']) == 1){
					        echo "<h1 style='color:#0000FF '>Se ha enviado la nueva clave a su correo eléctronico</h1>";
                            }
                            if (isset($_GET['cer']) == 1){
                                echo"<h1 style='color:#0000FF '>Estimado usuario la sesión en el sistema ha sido cerrada</h1>";
                                }
                            ?>
                        <p class="lead text-light"></p>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <div class="card">
                            <div class="card-body p-4">
                            <a href="../"><img src="img/deleteUser.png"><img src="img/stop.png"></a><br>
                            <?php $utc = date('U');
                                echo "año= ".$anio = date('Y')." ";
                                echo "mes= ".$mes = date('m')." ";
                                echo "dia= ".$dia = date('d')." ";
                                echo "hora= ".$hora = date('H')." ";
                                echo "minuto= ".$minuto = date('i')." ";
                                echo "seg= ".$seg = date('s')." ";
                                echo "Direccion ip= ".@$ip = getenv(REMOTE_ADDR)." ";
                                echo "Navegador= ".$navegador = $_SERVER["HTTP_USER_AGENT"]; 
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--footer / contact-->
        <footer class="py-6 bg-black" id="contact">
       
                    <div class="col-12 text-muted text-center small-xl">
                        <p>&copy; 2019 Fillco Pro. All rights reserved. CI Fillco Flowers S.A.S.</p>
                        <a href="https://www.fillcoflowers.com/" target="_blank">Fillco Roses</a>.
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