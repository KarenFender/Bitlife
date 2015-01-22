<?php
 
 $email = $_POST['email'];
 $pass = $_POST['pass'];

 $conexion = mysql_connect("localhost","root","");
 mysql_select_db("bitlife",$conexion);
$pass2 = md5($pass);

 echo "$email <br/>";
 echo "$pass <br/>";

 
 $query = "SELECT Curp,Correo,Password,Nombre,ApPat FROM usuario WHERE Correo='$email' AND Password='$pass2';";
 
 echo "$query <br/>";
 $comp = mysql_query($query);

 if(mysql_num_rows($comp) > 0){
 	$reg = mysql_fetch_array($comp);
 	/*$nombrecomp  = $reg['Nombre'];
 	$nombrecomp = $nombrecomp . " $reg[ApPat]";*/


 	$correo = mysql_result($comp, 0);
 	echo "todo bien";
	session_start();
	$_SESSION['usuario'] = "".$reg['Nombre'];
    setcookie("karen_fender","$reg[Curp]",time() + 3600);
    header("Location:sesion.php");
}
 else{
 	echo "Usuario o contraseña incorrectos";
   header("Location:inicio.html");
 }
?>