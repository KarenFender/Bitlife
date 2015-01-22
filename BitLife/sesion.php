<?php
session_start();
if (!isset($_SESSION['usuario']))
	    header("location:inicio.html");
		
		
?>


<!DOCTYPE html> 
   <head>
   	<meta charset = "utf-8">
   	<title>Inicio sesión</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
   	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
      <link rel="stylesheet"  href="font-awesome/css/font-awesome.min.css">
   	<style type="text/css">
   	/*Escritorio*/
   	@media (min-width: 1200px){
   		/*body{color: red;}*/
   		
}
   	/*Tablet*/
   	@media (min-width: 768px) and (max-width: 979px){
   		body{color: green;}
   		

   	}
   	/*Tablet o smartphone*/
   	@media (max-width: 767px){
   		body{color: blue;}
   		

   	}
   	/*Smartphone*/
   	@media (max-width: 480px){
   		body{color: yellow;}

   	}
      .text-big{
         font-size: 300px;
         line-height: 320px;
      }
   	</style>
   </head>
   <body>
   	<div class="container">

   		<div class="row-fluid">
   			<div class="span12">&nbsp;</div>
         </div>
         <div class="row-fluid">
           <div class="span12">
             
              
            <div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
                  <a href="inicio.html" class="brand">BitLife</a>
                <ul class="nav pull-right">
                  <li class="divider-vertical"><a href="perfil.php">Perfil</a></li>
                  <li class="divider-vertical"><a href="cita.php">Agendar Cita</a></li>
                  <li class="divider-vertical"><a href="citas.php">Citas agendadas</a></li>
                  <li class="divider-vertical"></li>
                  <li><a href="logotipout.php">Cerrar Sesión</a></li>
                </ul>
                <form action="#" class="navbar-search pull-right">
                <input type="text" class="search-query" placeholder="Buscar">
                <i class="icon-search"></i>
              </form>
               </div>
              </div>

            </div>
              <div class="row-fluid">
            <div class="offset span12">
              <h1><a href="index.html"></a> <img src="img/logotipo.jpg" alt="logotipo" class="img-circle"></h1>
                
            </div>


            </div>

          <div class="row-fluid">
        <div class="span6">
           <h1>DATOS PERSONALES</h1>
                <hr>
                <FONT FACE="verdana" SIZE=3 COLOR="black">
                


                 <?php
if(isset($_COOKIE["karen_fender"])){
  $conexion = mysql_connect("localhost","root","");
  mysql_select_db("bitlife",$conexion);
  
  $query = "SELECT * from Usuario where Curp = '$_COOKIE[karen_fender]';";
  $consulta = mysql_query($query);
  $reg = mysql_fetch_array($consulta);

  echo "Bienvenido "."$reg[Nombre]"." $reg[ApPat]";
}else{
  echo "No se ha iniciado sesion";

}
?>

<div class="row-fluid">
            <div class="span4">
            
                </FONT>
               </p> </FONT> 
             </div>

           </div>
         </div>
       </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
   </body>
</html>