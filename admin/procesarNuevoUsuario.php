<?php
session_start();
date_default_timezone_set('America/Bogota');
//isset($_SESSION['nombre']);

require("../modelo/conexion.php");//AQUI SE ABRE LA PRIMERA CONEXION LLAMANDOLO DESDE UN ARCHIVO EXTERNO CON INCLUDE
mysqli_select_db($conexion,$database_conexion);

//realizo una primera consulta para saber si ya existe en la base de datos el usuario con el email
$emailExiste = "SELECT email FROM usuario_principal where email =  '".strtoupper($_POST['email'])."' ";

$resEmail = mysqli_query($conexion, $emailExiste);

 $row_cnt = mysqli_num_rows($resEmail);

if($row_cnt==1){
	
	header("Location:./agregarUsuario.php?existeEmail=1");
	
	
	
	}else{



				
				


//recibo las variables del formulario

$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$email = strtoupper($_POST['email']);
$telefono = $_POST['telefono'];
$cedula = $_POST['cedula'];
$cargo = $_POST['cargo'];
$password = $_POST['password'];
//$foto = "Desconocido.png";

if (empty($_POST['foto'])) {
  $foto = "Desconocido.png";
}else{
	
	$foto = $_POST['foto'] ;
	}
$ubicacion = $_POST['ubicacion'];

echo $insertSQL = "INSERT INTO usuario_principal (nombre, apellido, email, password, cedula, telefono, tipoCargo, foto, ubicacion) VALUES ('".strtoupper($_POST['nombre'])."', '".strtoupper($_POST['apellido'])."', '".strtoupper($_POST['email'])."', '".sha1($_POST['password'])."', '".$_POST['cedula']."', '".$telefono."', '".$_POST['cargo']."','".$foto."', '".$ubicacion."') ";

$ejecucion = mysqli_query($conexion, $insertSQL);
//mysqli_free_result($ejecucion);

mysqli_close($conexion);



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
		
		
	

		
		$mail->AddAddress($_POST['email'], $nombre);
		//$mail->AddAddress("johnduarte7@gmail.com");
		//$mail->AddAddress('johnduarte7@gmail.com', $nombre);
		
	
			
		echo $mail->Body = "<p>Fecha: ".$fechaactual."   -- Saludos<br/><br/><br/><strong>Estimado usuario, ".$nombre." nueva clave asignada por el sistema:<br></strong>			
			<hr noshade='noshade' align='center' width='80%' >
					  <ul>
					  <li>CLAVE PARA ACCEDER AL SISTEMA: <strong>".$_POST['password']."</strong></li>
					   <li><strong>******************</strong></li>
					   <li><strong>LINK PARA INGRESAR AL SISTEMA: <a href='http://fillcoflowers.com/fillcopro/' target='_blank'>AQUI</a></strong></li>
					  
					  
														
							<li><img src='http://fillcoflowers.com/images/fillco/logo.png' width='150' height='100' alt='LogoCompany' /></li>				
					   </ul><br>
					   
					  <hr> 
					  

			
			";	
			
			;	
		echo $mail->Send();
		
		$mail->ClearAddresses();								 
										







		header("Location:./agregarUsuario.php?listo=1");









    }
?>