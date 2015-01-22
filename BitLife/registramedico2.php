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
			$query = "UPDATE doctor set ApPat='$apat' ";
			$query = $query.",ApMat='$amat',Nombre='$nombre',Especialidad='$especialidad' ";
			$query = $query.",Horain='$horain',horaout='$horaout' where CedPro='$cedula';";
			$res = mysql_query($query)or die(mysql_error());
			echo "$query";
			if ($res){
				echo "se registro";
				mysql_close($link);
				header('Location: medicos.php');
			}else{
				echo "no se registro";
				mysql_close($link);
				header("Location: inicio.html");
			}
		
	  } else {
		echo 'Por favor, rellene todos los campos requeridos.';
	}
?>