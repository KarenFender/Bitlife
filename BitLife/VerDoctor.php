<?php 
$link = mysql_connect("localhost", "root","")or die ("Error de conexion"); 
mysql_select_db("bitlife", $link)or die ("No se selecciono base"); 
$result = mysql_query("SELECT * FROM doctor;", $link); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td>CedProfesional</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Nombre</td><td>Especialidad</td><td>Hora Entrada</td><td>Hora Salida</td></tr>\n"; 
   do { 
      echo "<tr><td>".$row["CedPro"]."</td><td>".$row["ApPat"]."</td><td>".$row["ApMat"]."</td><td>".$row["Nombre"]."</td><td>".$row["Especialidad"]."</td><td>".$row["Horain"]."</td><td>".$row["horaout"]."</td></tr>\n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table>\n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 