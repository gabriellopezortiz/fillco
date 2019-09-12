<?php

session_start();

require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE

 $password1 = $_POST['password1']; 
 $email =  $_SESSION['email'];

mysqli_select_db($conexion,$database_conexion);

	$updatePassword = "update usuario_principal set password = '".sha1($password1)."' where email = '".$_SESSION['email']."'   ";
	  mysqli_query ($conexion, $updatePassword);	
	  
	  
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
		
		 $mail->Subject = "FILLCO PRO MENSAJE ENVIADO DESDE EL PORTAL WEB"; 
		 
		$fechaactual = date("Y-m-d");
		
		
	

		
		
		//$mail->AddAddress("johnduarte7@gmail.com");
		$mail->AddAddress($_SESSION['email'], $_SESSION['nombre']." ". $_SESSION['apellido']);
		
	
			
		$mail->Body = "<p>Fecha: ".$fechaactual."   -- Saludos<br/><br/><br/><strong>Estimado usuario ".$nombre." nueva clave asignada por usted mismo en el sistema:<br></strong>			
			<hr noshade='noshade' align='center' width='80%' >
					  <ul>
					  <li>CLAVE PARA ACCEDER AL SISTEMA: <strong>".$password1."</strong></li>
					   <li><strong>******************</strong></li>
					  
														
							<li><img src='http://fillcoflowers.com/images/fillco/logo.png' width='150' height='100' alt='LogoCompany' /></li>				
					   </ul><br>
					   
					  <hr> 
					  
					   			
			
			";	
			
			;	
		$mail->Send();
		
		$mail->ClearAddresses();	 
	  
	  																								 
					mysqli_close($conexion);	
					
					
										
					header("Location:./passwordChange.php?listo=1");                                   

                  



?>