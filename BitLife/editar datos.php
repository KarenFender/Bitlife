<!DOCTYPE html> 
   <head>
   	<meta charset = "utf-8">
   	<title>Index</title>
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
                  <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
                <form action="#" class="navbar-search pull-right">
                <input type="text" class="search-query" placeholder="Buscar">
                <i class="icon-search"></i>
              </form>
               </div>
              </div>

            </div>
              <div class="row-fluid">
            <div class="offset-5 span12">
              <h1><a href="index.html"></a> <img src="img/logo.jpg" alt="Logo" class="img-circle"></h1>
              <aside>
               <span class="offset9 add-on"><i class="icon-twitter-sign icon-3x"></i><i class="icon-facebook-sign icon-3x"></i><i class="icon-phone-sign icon-3x"></i>55000555</span>
               </aside>
              
            </div>


            </div>

            <?php 
include ("consult.php");
session_start();

$curp = $_COOKIE['karen_fender'];
$query ="select * from usuario where Curp = '$curp';";
$res=consulta($query);
$row = mysql_fetch_array($res);
?>

            <div class="row">
          <div class="offset5 span4">
             <form method="post" action="modificarusuario.php">
              <div class="form-group">
                <legend><h2>Editar Datos</h2></legend>
                <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" id="name" name="name" value="<?php echo "$row[Nombre]";?>" required>
             </div>
              <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" id="apat" name="apat" value="<?php echo "$row[ApPat]";?>"  required>
             </div>
              <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" id="amat" name="amat" value="<?php echo "$row[ApMat]";?>" required>
             </div>
             <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-envelope-alt"></i></span>
                <input type="email" id="email" name="email" value="<?php echo "$row[Correo]";?>" required>
             </div>
             <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-key"></i></span>
                <input type="password" id="pass" name="pass" placeholder="Ingresa tu contraseña actual" required>
             </div>
                          <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-key"></i></span>
                <input type="password" id="pass" name="passnew" placeholder="Ingresa tu Contraseña nueva" required>
             </div>
             
             <div class="prepend">
                <label for=""></label>
                <span class="add-on"><i class="icon-key"></i></span>
                <input type="password" id="rpass" name="rpass" placeholder="Repite Contraseña nueva" required>
             </div>
            <input type="hidden" name="curp" value="<?php echo "$row[Curp]";?>">             
             <div class=" offset span4">
              <button class="btn btn-info"><i class="icon-check-sign"> </i>Modificar Datos</button>
               
            </div>


             </form>
             
          </div>
        </div>
       </div>

           </div>
         </div>
       </div>
        

       
  

      

      
   		
   		
   	
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
   </body>
</html>