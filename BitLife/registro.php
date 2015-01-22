<?php
    $curp = $_POST['curp'];
	$nombre = $_POST['name'];
	$apat = $_POST['apat'];
	$amat = $_POST['amat'];
	$mail = $_POST['email'];
	$pass = $_POST['pass'];
	$rpass  = $_POST['rpass'];
	$reqlen = strlen($mail) * strlen($pass) * strlen($rpass);
	if ($reqlen > 0) {
		if ($pass === $rpass) {
			require("connect_db.php");
			$pass = md5($pass);
			$query = "INSERT INTO usuario(Curp,Nombre,ApPat,ApMat,Correo,Password) VALUES('$curp','$nombre','$apat','$amat','$mail','$pass');";
			$res = mysql_query($query)or die (mysql_error());
			if ($res) {
				echo "se registro";
				header('Location: login.html');
			}else{
				echo "no se registro";
				header("Location: inicio.html");	
			}
			mysql_close($link);
		} else {
			echo"<script type=\"text/javascript\">alert('Las Contraseñas deben ser autenticas'); 
			window.location='register.html';
			</script>"; 
			//header("Location: register.html");
		}
	}
?>
