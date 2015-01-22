<?php
    $referencia = $_POST['referencia'];
    $apat = $_POST['apat'];
    $amat = $_POST['amat'];
	$nombre = $_POST['nombre'];
	$horain = $_POST['timein'];
	$horaout = $_POST['timeout'];

	
	$reqlen = strlen($referencia) * strlen($nombre) * strlen($apat) * strlen($amat);
	if ($reqlen > 0) { 
			require("connect_db.php");
			$query = "INSERT INTO laboratorista(idLaboratorista,ApPat,ApMat,Nombre,Horain,Horaout) VALUES('$referencia', '$apat','$amat','$nombre','$horain','$horaout');";
			$res = mysql_query($query)or die (mysql_error());
			if ($res) {
				echo "se registro";
				header('Location: laboratoristas.php');
			}else{
				echo "no se registro";
				header("Location: inicio.html");
			}
			mysql_close($link);
		
	  } else {
		echo 'Por favor, rellene todos los campos requeridos.';
	}
?>