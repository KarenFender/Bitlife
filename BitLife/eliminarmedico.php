<?php


$link = mysql_connect('localhost', 'root', '');
if(!$link) {
die("Error al intentar conectar: ".mysql_error());
}
$db_link = mysql_select_db('bitlife', $link);
if(!$db_link) {
die("Error al intentar seleccionar la base de datos". mysql_error());
}
  
$req=mysql_query("SELECT CedPro FROM doctor WHERE CedPro= '$_POST[cedula]'",$link);

if($re=mysql_fetch_array($req))
{
	mysql_query("DELETE FROM doctor WHERE CedPro ='$_POST[cedula]'",$link);
	echo "Datos eliminados";
	header('location: medicos.php');
}else{
	echo "Datos no eliminados";
	header('location: medicos.php');
}

?>