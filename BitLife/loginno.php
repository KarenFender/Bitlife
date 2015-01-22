<?php 
	//session_start();

	/*if($_SESSION['activo']==false){
	header("Location:contacto.html");
	}*/
	
	//session_start();
	$conexion=@mysql_connect("localhost","root","");

	if (!($conexion)){
		echo 'No se puede realizar la conexion con la base de datos.';
	}else{

	mysql_select_db("bitlife");

	$email=$_POST["email"];
	$pass=$_POST["pass"];

	//$query="SELECT Correo,Password FROM usuario WHERE Correo='$email' and Password='$pass' ";
	$query="SELECT Correo,Password FROM usuario WHERE Correo='$email";
	$rs=mysql_query($query); 
	//$row=mysql_fetch_object($rs); 
	//$nr = mysql_num_rows($rs); 

	if($row = mysql_fetch_array($rs)){
        if($row["pass"] == $pass){
        	session_start();
 
            //$_SESSION["email"] = $row['Correo'];
            //$_SESSION['Correo'] = $row['email'];
            $_SESSION['email'] = $email;
           
            echo 'Has sido logueado correctamente '.$_SESSION['Correo'].' <p>';
            header ("Location:inicio.html");
           
            //Elimina el siguiente comentario si quieres que re-dirigir autom&aacute;ticamente a index.php
           
            /*Ingreso exitoso, ahora sera dirigido a la pagina principal.
            <SCRIPT LANGUAGE="javascript">
            location.href = "index.php";
            </SCRIPT>*/
 
        }else{
            echo 'Password incorrecto';
            header("contacto.html");
        }
    }else{
        echo 'Usuario no existente en la base de datos';
    }
    mysql_free_result($rs);

mysql_close();
	/*f($nr == 1){ 
		$_SESSION['activo'] = true;
	 	header ("Location:inicio.html"); 
	}

	else if($nr <= 0) { 
  		header("Location:register.html"); 
	} */
}
?>