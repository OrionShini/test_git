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
		$nom=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$dni=$_POST['dni'];

		require 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta= "UPDATE alumno SET nombre='$nom', apellido='$apellido', dni='$dni' WHERE id='$id'";
        if (!mysqli_query($conexion, $consulta)) {
        	echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }
        mysqli_close($conexion);
        echo "<script>
	                alert('Modificación Exitosa!');
	                window.location= 'alumno_listado.php'
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