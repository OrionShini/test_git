<?php
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_nombre="parcial";

	$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre);
	mysqli_set_charset($conexion,"UTF8");
?>