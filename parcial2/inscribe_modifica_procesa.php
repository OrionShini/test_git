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
		$asistencia=$_POST['asistencia'];
		$nota=$_POST['nota'];

		require 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta= "UPDATE inscripcion SET asistencia='$asistencia', nota='$nota' WHERE id='$id'";
        
        if (!mysqli_query($conexion, $consulta)) {
        	echo "Hubo un error en la consulta de datos de: Inscripción!";
            exit();
        }
        mysqli_close($conexion);
        echo "<script>
	                alert('Modificación Exitosa!');
	                window.location= 'inscribe_listado.php'
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