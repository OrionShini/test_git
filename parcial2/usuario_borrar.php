<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Borrado correcto!</title>
</head>
<body>
	<?php
		$id=$_POST['id'];
		require 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        if ($id==1) {
        	echo "<script>
	                alert('El Usuario Administrador NO puede ser Eliminado!');
	                window.location= 'usuario_listado.php'
	    			</script>";
	    			exit();
        }
        $consulta= "DELETE FROM usuario WHERE id='$id'";
        if (!mysqli_query($conexion, $consulta)) {
        	echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }
        mysqli_close($conexion);
        echo "<script>
	                alert('Usuario Eliminado!');
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