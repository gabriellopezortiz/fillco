<?php
session_start();
require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE


$login=$_POST['login'];

mysqli_select_db($conexion,$database_conexion);

echo $primeraConsulta = " SELECT * FROM  usuario_principal where email ='".$login."' ";

$primerResultado = mysqli_query($conexion, $primeraConsulta);

/*if ($primerResultado	){echo "todo bien";}else{"todo mal";}*/

if($row = mysqli_fetch_array($primerResultado)){
			    
                            //primero capturo los datos del usuario y los guardo en variables de arreglo
                           	
                                    $idUsuario=$row['id'];
                                    $nombre=$row['nombre'];							
                                    $primerApellido=$row['apellido'];							
                                    $cedula=$row['cedula'];
									$contrasena=$row['password'];									
                                    $tipoUsuario=$row['tipoCargo'];
									$foto=$row['foto'];
									$emailPefect= $row['email'];
							
                            
					
			                        
	/*#########################################################################################*/
function CrearCodAsignado(){
$cadena = '".$login."';
	
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
	
			
				
	echo $updateEmail = "update usuario_principal set password = '".sha1($passworNew)."' where email = '".$login."'   ";
	
	                                                                                                                               mysqli_query ($conexion, $updateEmail);
												
												
     	/*AQUI VA EL CODIGO DE ENVIO DE CORREO*/
		/*AQUI VA EL CODIGO DE ENVIO DE CORREO*/
		require("./correo/class.phpmailer.php");
		
		$mail = new PHPMailer(); 
		
		$mail->SetLanguage("es", "language/"); //setea el lengueja a español 
		
		$mail->IsSMTP(); // send via SMTP 
		$mail->Host = "localhost"; // SMTP tus correo saliente es (mail.tu-dominio.com.ar) 
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = "tls";		
		$mail->Host = "smtp.gmail.com";
		$mail->Mailer = "smtp"; 
		$mail->Port = 587; //puerto smtp 
		$mail->SMTPDebug = 1;
		
		$mail->Username = "soportefillcopro@gmail.com";
		$mail->Password = "soporte7$"; 
		
		
		
		$mail->From = "soportefillcoflowers@gmail.com"; 
		$mail->FromName = "Portal Web Fillco Pro";		
			
		
		
 
//$mail->AddAddress("msn@adapweb.com.ar"); // optional name 

//$mail->AddBCC("johnduarte7@hotmail.com");
//$mail->AddReplyTo("info@site.com","Information"); 
		
		$mail->IsHTML(true); // send as HTML
		
		$mail->Subject = "MENSAJE ENVIADO DESDE EL PORTAL WEB FILLCO PRO"; 
		 
		$fechaactual = date("Y-m-d");
		
		
	

		
		$mail->AddAddress($row['email'], $nombre);
		//$mail->AddAddress("johnduarte7@gmail.com");
		//$mail->AddAddress('johnduarte7@gmail.com', $nombre);
		
	
			
		echo $mail->Body = "<p>Fecha: ".$fechaactual."   -- Saludos<br/><br/><br/><strong>Estimado usuario, ".$nombre." nueva clave asignada por el sistema:<br></strong>			
			<hr noshade='noshade' align='center' width='80%' >
					  <ul>
					  <li>CLAVE PARA ACCEDER AL SISTEMA: <strong>".$passworNew."</strong></li>
					   <li><strong>******************</strong></li>
					   <li><strong>LINK PARA INGRESAR AL SISTEMA: <a href='http://fillcoflowers.com/fillcopro/' target='_blank'>AQUI</a></strong></li>
					  
					  
														
							<li><img src='http://fillcoflowers.com/images/fillco/logo.png' width='150' height='100' alt='LogoCompany' /></li>				
					   </ul><br>
					   
					  <hr> 
					  

			
			";	
			
			;	
		echo $mail->Send();
		
		$mail->ClearAddresses();								 
																													 
																											 
	
							
							
							
						
				
				mysqli_close($conexion);		
										
					header("Location:../index.php?recuperar=1");
					
					
			
                                          
                                          
                                          
                                  }//FINAL DEL IF PRINCIPAL
                                else {
	
	
						mysqli_close($conexion);		
										
					header("Location:../contrasena.php?error=1");

	
	
	
	
	}

                  



?>