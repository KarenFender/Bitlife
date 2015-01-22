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
                  <li class="divider-vertical"><a href="perfil.php">Perfil</a></li>
                  <li class="divider-vertical"><a href="cita.php">Agendar cita</a></li>
                  <li class="divider-vertical"><a href="citass.php">Citas agendadas</a></li>
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
            <div class="offset span12">
              <h1><a href="index.html"></a> <img src="img/logotipo.jpg" alt="Logo" class="img-circle"></h1>
              <aside>
               <span class="offset9 add-on"><i class="icon-twitter-sign icon-3x"></i><i class="icon-facebook-sign icon-3x"></i><i class="icon-phone-sign icon-3x"></i>55000555</span>
               </aside>
              
            </div>


            </div>
<legend><h2>Citas Agendadas</h2></legend>
          

          <?php 
$link = mysql_connect("localhost", "root","")or die ("Error de conexion"); 
mysql_select_db("bitlife", $link)or die ("No se selecciono base"); 
$result = mysql_query("SELECT * FROM cita WHERE Usuario_Curp = '$_COOKIE[karen_fender]';", $link); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table class= \"table table-striped\"> \n"; 
   echo "<tr><td>Fecha</td><td>Hora de inicio</td><td>Hora fin</td><td>Especialidad</td><td>Médico</td></tr>\n"; 
   do { 
      $query2 = "SELECT Nombre FROM doctor WHERE CedPro='$row[CedPro]'";
      $res = mysql_query($query2);
      $reg = mysql_fetch_array($res);
      echo "<tr><td>".$row["Fecha"]."</td><td>".$row["Horain"]."</td><td>".$row["Horaout"]."</td><td>".$row["Servicio"]."</td><td>".$reg["Nombre"]."</td><td><form method='post' action='pruebapdf.php' name='form'><td> <input name=\"cedula\" type=\"hidden\" value=\"$row[CedPro]\">  <input name=\"id\" type=\"hidden\" value=\"$row[idCita]\"> <input name=\"curp\" type=\"hidden\" value=\"$row[Usuario_Curp]\"><button class='btn btn-warning'><i class='icon-file-text '> </i>Generar Comprobante</button></form></td></tr>\n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 

<hr>

<hr>
           <form method="post" action="agregardoc.html"> 
            <div class="offset5 span4">
            
        </form>


      </div>
         </div>
       </div>
       
        
  <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
   </body>
</html>