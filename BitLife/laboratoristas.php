<!DOCTYPE html> 
   <head>
    <meta charset = "utf-8">
    <title>Inicio</title>
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
                  <a href="indexadmin.html" class="brand">BitLife</a>
                <ul class="nav pull-right">
                  <li class="divider-vertical"><a href="indexadmin.html">Inicio</a></li>
                  <li class="divider-vertical"><a href="medicos.php">Médicos</a></li>
                  <li class="divider-vertical"><a href="laboratoristas.php">Laboratoristas</a></li>
                  <li class="divider-vertical"></li>
                  <li><a href="#">Cerrar sesión</a></li>
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

          <legend><h2>Laboratoristas Registrados</h2></legend>
<?php 
$link = mysql_connect("localhost", "root","")or die ("Error de conexion"); 
mysql_select_db("bitlife", $link)or die ("No se selecciono base"); 
$result = mysql_query("SELECT * FROM laboratorista;", $link); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td>Referencia</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Nombre</td><td>Hora Entrada</td><td>Hora Salida</td></tr>\n"; 
   do { 
      echo "<tr><td>".$row["idLaboratorista"]."</td><td>".$row["ApPat"]."</td><td>".$row["ApMat"]."</td><td>".$row["Nombre"]."</td><td>".$row["Horain"]."</td><td>".$row["Horaout"]."</td><form method='post' action='modificarlab.php'>  <input name=\"idLaboratorista\" type=\"hidden\" value=\"$row[idLaboratorista]\">  <td><button class='btn btn-primary'><i class='icon-cog '> </i>Modificar</button></form></td><td><form method='post' action='eliminarlab.php' name='form'><td> <input name=\"idLaboratorista\" type=\"hidden\" value=\"$row[idLaboratorista]\"> <button class='btn btn-danger'><i class='icon-trash '> </i>Eliminar</button></form></td></tr>\n"; 
      //echo "<tr><td>".$row["idLaboratorista"]."</td><td>".$row["ApPat"]."</td><td>".$row["ApMat"]."</td><td>".$row["Nombre"]."</td><td>".$row["Horain"]."</td><td>".$row["Horaout"]."</td></tr>\n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table>\n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 

<hr>

<hr>
          
          <div class="offset5 span4">
           <form method="post" action="agregarlab.html">

          <button class="btn btn-success"><i class="icon-check-sign "> </i>Agregar Laboratorista</button>
        </form>
      </div>
         </div>
       </div>
       
        
  <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
   </body>
</html>