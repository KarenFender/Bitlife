<?php
    $idLaboratorista = $_POST['idLaboratorista'];
    $apat = $_POST['apat'];
    $amat = $_POST['amat'];
	$nombre = $_POST['nombre'];
	$horain = $_POST['timein'];
	$horaout = $_POST['timeout'];

	
	$reqlen = strlen($idLaboratorista) * strlen($nombre);
	if ($reqlen > 0) { 
			require("connect_db.php");
			$query = "UPDATE laboratorista set idLaboratorista='$idLaboratorista',ApPat='$apat' ";
			$query = $query.",ApMat='$amat',Nombre='$nombre'";
			$query = $query.",Horain='$horain',Horaout='$horaout';";
			$res = mysql_query($query)or die(mysql_error());
			echo "$query";
			if ($res) {
				echo "se registro";
				mysql_close($link);
				header('Location: laboratoristas.php');
			}else{
				echo "no se registro";
				mysql_close($link);
				header("Location: inicio.html");
			}
		
	  } else {
		echo 'Por favor, rellene todos los campos requeridos.';
	}
?>