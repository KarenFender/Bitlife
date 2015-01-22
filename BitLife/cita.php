<?php
session_start();
if (!isset($_SESSION['usuario']))
	    header("location:inicio.html");
		
	//$conexion = mysql_connect("localhost","root","");
  //mysql_select_db("bitlife",$conexion);
  
  function generaPaises()
{
	include 'connect_db.php';
	//conectar();
	$consulta=mysql_query("SELECT id, opcion FROM lista_servicios");
	//desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='servicios' id='servicios' onChange='cargaContenido(this.id)'>";
	//echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
  ?>
<!DOCTYPE html> 
   <head>
    <meta charset = "utf-8">
     <script type="text/javascript" src="validar.js"></script>
    <title>Inicio sesión</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
      <link rel="stylesheet"  href="font-awesome/css/font-awesome.min.css">
	  <script type="text/javascript" src="select_dependientes.js"></script>
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
       <hgroup>
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
            <div class="offset span12">
              <h1><a href="index.html"></a> <img src="img/logotipo.jpg" alt="Logo" class="img-circle"></h1>
                
            </div>


            </div>

          <div class="row-fluid">
        <div class="span6">
           <h1>AGENDAR UNA CITA</h1>
                <hr>
                <FONT FACE="verdana" SIZE=3 COLOR="black">
				
				
				<?php

?>
        
        <form method="post" action="generarcita.php">
              <table class="table table-striped" >
                <tr>
                  <td><label for="fecha">Fecha</label></td>
                  <td><input type="date" id="fecha" name="fecha"></td>
                  <td><label for="hora">Hora de cita</label></td>
                  <td><select id="hora" name="hora">
                    <option value="time1">7:00-8:00</option>
                    <option value="time2">8:00-9:00</option>
                    <option value="time3">9:00-10:00</option>
                    <option value="time4">10:00-11:00</option>
                    <option value="time5">11:00-12:00</option>
                    <option value="time6">12:00-13:00</option>
                    <option value="time7">13:00-14:00</option>
                    <option value="time8">14:00-15:00</option>
                        </select></td>
                </tr>
                <tr>

                       
                    
					
				<td>
					<select disabled="disabled" name="doctores" id="doctores">
						<option value="0">Selecciona doctores</option>
					</select>
					</td>
				
				<td><?php generaPaises(); ?></td>
			
                </tr>
                
              </table>     
                 </form>
                 <button onclick="validar()" class="btn btn-info"><i class="icon-check-sign"> </i>Generar Cita</button> 

        
       </hgroup>
    </body>
</html>
