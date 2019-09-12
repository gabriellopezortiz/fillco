<?php
session_start();
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE

$login=$_POST['login'];
$password=sha1($_POST['password']);



mysqli_select_db($conexion,$database_conexion);

echo $primeraConsulta = "SELECT * FROM  usuario_principal where email ='".$login."'  and password = '".$password."'  ";

$primerResultado =mysqli_query($conexion, $primeraConsulta);






if($row = mysqli_fetch_array($primerResultado)){
			    
                            //primero capturo los datos del usuario y los guardo en variables de arreglo
                           	
                                    $idUsuario=$row['id'];
                                    $nombre=$row['nombre'];							
                                    $primerApellido=$row['apellido'];							
                                    $cedula=$row['cedula'];
									$contrasena=$row['password'];									
                                    $tipoUsuario=$row['tipoCargo'];
									$email=$row['email'];
                                    echo $foto=$row['foto'];		
									echo $ubicacion=$row['ubicacion'];
									echo $administrativo = $row['administrativo'];	
									
									
															
							
                            
					
			    //variables de sesion para control de pantallas
			             $_SESSION['idUsuario'] = $idUsuario;//IDENTIFICADOR UNICO DEL USUARIO
			             $_SESSION['nombre'] = $nombre;//IDENTIFICADOR UNICO DEL USUARIO
						 $_SESSION['apellido'] = $primerApellido;//IDENTIFICADOR UNICO DEL USUARIO
						 $_SESSION['cedula'] = $cedula;//IDENTIFICADOR UNICO DEL USUARIO
						 $_SESSION['password'] = $contrasena;//IDENTIFICADOR UNICO DEL USUARI
			             $_SESSION['tipoCargo'] = $tipoUsuario;//IDENTIFICADOR UNICO DEL USUARIO
				         $_SESSION['foto'] = $foto;//IDENTIFICADOR UNICO DEL USUARIO
						 $_SESSION['email'] = $email;//IDENTIFICADOR UNICO DEL USUARIO
						 $_SESSION['ubicacion'] = $ubicacion;//IDENTIFICADOR UNICO DEL USUARIO
						  $_SESSION['administrativo'] = $administrativo;//IDENTIFICADOR UNICO DEL USUARIO
							
							
							  
							
							
							/**************************SEGUNDA CONSULTA PARA TRAERME EL NOMBRE DEL PERFIL*********/
			    		                
echo $segundaConsulta = "SELECT nombre FROM  cargos_administrativos where id  = '".$_SESSION['tipoCargo']."'   ";

$segundoResultado = mysqli_query($conexion, $segundaConsulta);

if($row2 = mysqli_fetch_array($segundoResultado)){
			    
                            //primero capturo los datos del usuario y los guardo en variables de arreglo
                           	
					    $descripcionUsuario = $row2['nombre'];          
				        $_SESSION['descripcionUsuario'] = $descripcionUsuario;//NOMBRE DESCRIPTIVO DEL PERFIL DEL USUARIO
                                          }
										  
										  
										  
										  
										  
										  /*ACCESO AL DEMO*/


	 /*############################## AQUI DEBO VALIDAR DE QUE SITIO O SISTEMA SON  USUARIO#######################################################################*/
    


              if($_SESSION['tipoCargo']=='5'){
				 
				 
				   
						 header("Location:../admin/recepcion.php");
						 
						 
							 
							
					 
					 }//cierre de FL PARA SABER A QUE SISTEMA O UBICACION PERTENECE




              if($_SESSION['tipoCargo']=='3'){
				 
				 
				   
						 header("Location:../admin/outRecepcion.php");
						 
						 
							 
							
					 
					 }//cierre de FL PARA SABER A QUE SISTEMA O UBICACION PERTENECE




			 if($_SESSION['tipoCargo']=='1'){
				 
				 
				   
						 header("Location:../admin/index.php");
						 
						 
							 
							
					 
					 }//cierre de FL PARA SABER A QUE SISTEMA O UBICACION PERTENECE
			 
			 
			  
			  
			
                                                             
                                          
                                          
                                 
	
	 }else{//ESTA ES LA LLAVE DE CIERRE DEL PRIMER IF else
	   mysqli_free_result($primerResultado);
       mysqli_close($conexion);		
       header("Location:../index.php?error=1");          
	 }


?>