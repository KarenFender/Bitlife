<?php
if(isset($_COOKIE["karen_fender"])){
	header("sesion.html");
	echo "Usuario con sesion iniciada";
}else
	echo "No se ha iniciado sesion";
?>