<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Modificación Correcta!</title>
</head>
<body>
	<?php
		$id=$_POST['id'];
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];
		$nom=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$perfil=$_POST['perfil'];

		require 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        if ($id==1) {
        	$consulta= "UPDATE usuario SET usuario='$usuario', clave='$clave', nom_completo='$nom' WHERE id='$id'";
        } else {
        	$consulta= "UPDATE usuario SET usuario='$usuario', clave='$clave', nom_completo='$nom',  perfil='$perfil' WHERE id='$id'";
        }
        if (!mysqli_query($conexion, $consulta)) {
        	echo "Hubo un error en la consulta de datos de: Usuario!";
            exit();
        }
        mysqli_close($conexion);
        echo "<script>
	                alert('Modificación Exitosa!');
	                window.location= 'usuario_listado.php'
	    		</script>";
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */

	?>
</body>
</html>