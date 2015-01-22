<?php
    $cedula = $_POST['cedula'];
    $apat = $_POST['apat'];
    $amat = $_POST['amat'];
	$nombre = $_POST['nombre'];
	$especialidad = $_POST['especialidad'];
	$horain = $_POST['timein'];
	$horaout = $_POST['timeout'];

	
	$reqlen = strlen($cedula) * strlen($nombre) * strlen($especialidad);
	if ($reqlen > 0) { 
			require("connect_db.php");
			$query = "INSERT INTO doctor(CedPro,ApPat,ApMat,Nombre,Especialidad,Horain,horaout) VALUES('$cedula', '$apat','$amat','$nombre','$especialidad','$horain','$horaout');";
			$res = mysql_query($query)or die (mysql_error());
			if ($res) {
				echo "se registro";
				header('Location: medicos.php');
			}else{
				echo "no se registro";
				header("Location: inicio.html");
			}
			mysql_close($link);
		
	  } else {
		echo 'Por favor, rellene todos los campos requeridos.';
	}
?>