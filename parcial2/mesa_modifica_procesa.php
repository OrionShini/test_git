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
		$fecha=$_POST['fecha'];
		$materia=$_POST['materia'];
		$titular=$_POST['titular'];
		$vocal1=$_POST['vocal1'];
		$vocal2=$_POST['vocal2'];

		require_once 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta= "UPDATE mesa_examen SET materia='$materia', profesor_titutlar='$titular', profesor_vocal1='$vocal1', profesor_vocal2='$vocal2', fecha='$fecha' WHERE id='$id'";
		if (mysqli_query($conexion, $consulta)) {
			echo "<script>
			alert('Modificación Exitosa!');
			window.location= 'mesa_listado.php'
			</script>";
		} else {
			echo "Error en la actualización: " . mysqli_error($conexion);
		}
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */        
       
	?>
</body>
</html>