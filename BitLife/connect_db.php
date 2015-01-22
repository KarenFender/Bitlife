<?php
	$link = mysql_connect("localhost", "root","")or die("erro en conexion");
	if ($link) {
		mysql_select_db("bitlife", $link)or die("no selecciono base de datos");
	}
?>