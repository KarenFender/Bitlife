<?php

  	include("conf.php"); 

  
  function loguea($query) {


  	  global $Usuario,$Password,$Servidor,$BaseDeDatos;
  	  $conexion=mysql_connect($Servidor,$Usuario,$Password) or die("Error: El servidor no puede conectar con la base de datos");
	  $descriptor=mysql_select_db($BaseDeDatos,$conexion) or die ("Error no se encuentra la base de datos");
	  $r = mysql_query($query);// or die('Consulta fallida: ' . mysql_error());
	  if ( ($res=mysql_fetch_array($r)) ){//$reg=mysql_fetch_array($result)
	  		mysql_close($conexion);
			return $res;
		}
		else{
	  		mysql_close($conexion);
			return 0;
		}

	}


	function consulta($query) {

  	  global $Usuario,$Password,$Servidor,$BaseDeDatos;
  	  $conexion=mysql_connect($Servidor,$Usuario,$Password) or die("Error: El servidor no puede conectar con la base de datos");
	  $descriptor=mysql_select_db($BaseDeDatos,$conexion) or die ("Error no se encuentra la base de datos");
	  $r = mysql_query($query);// or die('Consulta fallida: ' . mysql_error());
	  if (($r)){
	  		mysql_close($conexion);
			return $r;
		}
		else{
	  		mysql_close($conexion);
			return 0;
		}
	}







?>