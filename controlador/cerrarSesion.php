<?php
session_start();
	
session_destroy();

header("Location:../index.php?cer=1");
//header("Location:../index.php?error=1");

//header("Location:../index.php?error=1");

echo" esteo se esyta mostrando";


?>

	