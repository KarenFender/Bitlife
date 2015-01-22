
<?php

require("connect_db.php");
require("registramedico.php");

$cedula = getParam($_GET("CedPro"), "-1");
$action = getParam ($_GET("action"),"");

if ($action=="del") {
	$sql = "DELETE FROM doctor WHERE CedPro =".sqlValue($cedula, "int");
	mysql_query($sql, $conexion);
	header("location: medicos.php");


?>