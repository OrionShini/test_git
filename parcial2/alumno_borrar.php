<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Borrado</title>
</head>
<body>
	<?php
		require 'conexion.php';
		

		$id=$_POST['id'];
		


        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }


        $consulta= "DELETE FROM alumno WHERE id='$id'";
        if (!mysqli_query($conexion, $consulta)) {
        	echo "Hubo un error en la consulta de datos";
            exit();
        }

        mysqli_close($conexion);
        echo "<script>
	                alert('Alumno Eliminado!');
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