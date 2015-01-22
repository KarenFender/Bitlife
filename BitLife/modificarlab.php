<!DOCTYPE html> 
   <head>
   	<meta charset = "utf-8">
   	<title>Modificar Laboratoristas</title>
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
                  <li class="divider-vertical"><a href="indexadmin.html">Inicio</a></li>
                  <li class="divider-vertical"><a href="medicos.php">Medicos</a></li>
                   <li class="divider-vertical"><a href="laboratoristas.php">Laboratoristas</a></li>
                  <li class="divider-vertical"><a href="#">Cerrar sesión</a></li>
                  
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
              <h1><a href="index.html"></a> <img src="img/logo.jpg" alt="Logo" class="img-rounded"></h1>
              <aside>
               <span class="offset9 add-on"><i class="icon-twitter-sign icon-3x"></i><i class="icon-facebook-sign icon-3x"></i><i class="icon-phone-sign icon-3x"></i>55000555</span>
               </aside>
              
            </div>


            </div>

            <div class="row">
          <div class="offset5 span4">
<?php 
include ("consult.php");
$idLaboratorista =$_REQUEST['idLaboratorista'];
$query ="SELECT * from laboratorista where idLaboratorista = '$idLaboratorista';";
$res=consulta($query);
$row = mysql_fetch_array($res);
?>

             <form method="post" action="registralab2.php">
                <legend><h2>Modificar Laboratoristas</h2></legend>
                 <div class="prepend">
                <label for="">Apellido Paterno:</label>
                <span class="add-on"><i class="icon-user-md icon-2x"></i></span>
                <input type="text" id="nombre" name="apat" value="<?php echo "$row[ApPat]";?>" required>
             </div>
              <div class="prepend">
                <label for="">Apellido Materno:</label>
                <span class="add-on"><i class="icon-user-md icon-2x"></i></span>
                <input type="text" id="nombre" name="amat" value="<?php echo "$row[ApMat]";?>" required>
             </div>
                 <div class="prepend">
                <label for="">Nombre del médico:</label>
                <span class="add-on"><i class="icon-user-md icon-2x"></i></span>
                <input type="text" id="nombre" name="nombre" value="<?php echo "$row[Nombre]";?>" required>
             </div>
                <div class="prepend">
                <label for="">Referencia</label>
                <span class="add-on"><i class="icon-asterisk icon-2x"></i></span>
                <input type="text" id="idLab" name="idLaboratorista" value="<?php echo $idLaboratorista;?>" required>
             </div>

             <div class="prepend">
                <label for="">Horario entrada:</label>
                <span class="add-on"><i class="icon-time icon-2x"></i></span>
                <input type="time" id="time" name="timein" placeholder="" value="<?php echo "$row[Horain]";?>" required>
             </div>
             <div class="prepend">
                <label for="">Horario salida:</label>
                <span class="add-on"><i class="icon-time icon-2x"></i></span>
                <input type="time" id="time" name="timeout" placeholder=""  value="<?php echo "$row[Horaout]";?>"  required>
             </div>
              <div class=" offset span4">
              <button class="btn btn-info"><i class="icon-check-sign "> </i>Aceptar</button>
               
            </div>
             </form>
             
          </div>
       </div>

           </div>
         </div>
       </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
   </body>
</html>