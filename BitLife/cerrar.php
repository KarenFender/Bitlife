<?php
	
	session_start();
	
	if (!isset($_SESSION['usuario'])){
	    header("location:inicio.html");
	
	session_unset();
	session_destroy();
}//else{

	//echo "Vuelve a iniciar sesion";
	//header("Location: redir.html"); 
//}
?>