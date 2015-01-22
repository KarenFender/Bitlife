<?php


 $accion = $_POST['accion'];

 switch ($accion) {
 	case 'validar':
 		validar();
 		break;

 		case 'enviar':
 		enviar();
 		break;
 	
 	default:
 		echo "hola mil";
 		break;
 }


 function validar()
 {
 	echo "1";
 }

 function enviar()
 {
 	$conexion = mysql_connect("localhost","root","");
 	mysql_select_db("bitlife",$conexion);

 	$fecha = $_POST['fecha'];
 	$hora = $_POST['hora'];
 	$servicio = $_POST['servicio'];
 	$doc = $_POST['doc'];
 	$docquery = "SELECT CedPro FROM doctor WHERE Nombre = '$doc';";
 	$docmil = mysql_query($docquery);
 	$doc_cp = mysql_fetch_array($docmil);
 	$docp  = $doc_cp['CedPro'];
 	//$docp = '1948692840';
 	echo "$docp";
 	$curp = $_COOKIE["karen_fender"];

 	date_default_timezone_set('UTC');
 	$fecha2 = date("Y-m-d");
 	$fecha3 = date($fecha);

 	if($fecha2>$fecha3){
 		echo "Elige otra fecha";
 		return 0;
 	}
 	//echo "$fecha2<$fecha3";

 	 switch ($hora) {
 	case 'time1':
 		$horain = "07:00";
 		$horaout = "08:00";
 		break;

 		case 'time2':
 		$horain = "08:00";
 		$horaout = "09:00";
 		break;

 		case 'time3':
 		$horain = "09:00";
 		$horaout = "10:00";
 		break;

 		case 'time4':
 		$horain = "10:00";
 		$horaout = "11:00";
 		break;

 		case 'time5':
 		$horain = "11:00";
 		$horaout = "12:00";
 		break;

 		case 'time6':
 		$horain = "12:00";
 		$horaout = "13:00";
 		break;

 		case 'time7':
 		$horain = "13:00";
 		$horaout = "14:00";
 		break;

 		case 'time8':
 		$horain = "14:00";
 		$horaout = "15:00";
 		break;
 	
 	default:
 		echo "hola mil";
 		break;
 }

 $query = "INSERT into cita (Horain,Fecha,Servicio,Horaout,Usuario_Curp,CedPro) VALUES ('$horain','$fecha','$servicio','$horaout','$curp','$docp');";
$res = mysql_query($query);
if($res){
	echo "Se ha registrado la cita correctamente"; 
}else{
	echo "No se registró la cita";
}
mysql_close($conexion);

 }
?>