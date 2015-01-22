<?php

include("consult.php");

$curp = $_REQUEST['curp'];
$name = $_REQUEST['name'];
$apat = $_REQUEST['apat'];
$amat = $_REQUEST['amat'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
$passnew = $_REQUEST['passnew'];
$rpass = $_REQUEST['rpass']; 

$pass = md5($pass);

$query = "SELECT * FROM usuario where Curp='$curp'; ";
$res = consulta($query);
$reg = mysql_fetch_array($res);

if($pass== $reg['Password'])
{
  if($passnew != '' && $rpass != '' ){
  	if($passnew === $rpass){
  		$passnew = md5($passnew);
  		$query="UPDATE usuario SET Nombre='$name', ApPat = '$apat', ApMat='$amat', Correo='$email' , Password = '$passnew' WHERE Curp='$curp'; ";
  		$res = consulta($query);
  		if($res == 0){
  			echo "Lo hizo mal";
  		}else{
  			echo "Lo hice bien";
  		}
  	}else{
  		echo "Las contraseñas no coinciden";
  	}
  }
}else{
	echo "Contraseña incorrecta";
}
//echo $query;

?>