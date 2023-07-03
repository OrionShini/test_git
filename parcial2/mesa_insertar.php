<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Mesa Agregar</title>
</head>
<body>
	<?php
		$materia=$_POST['materia'];
		$tipo_mesa=$_POST['condicion'];
		$titular=$_POST['titular'];
		$vocal1=$_POST['vocal1'];
		$vocal2=$_POST['vocal2'];
		$fecha=$_POST['fecha'];
		require 'conexion.php';
        if (!$conexion){
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        
        $consulta1 = "SELECT * FROM mesa_examen";
        
        if (!$resultado=mysqli_query($conexion, $consulta1)) {
        	echo "Hubo un error en la consulta de datos!";
            exit();
        }
        
        while ($row=mysqli_fetch_row($resultado)) {
        	if (($fecha==$row[1])&&($materia==$row[2])) {
        		echo "<script>
	                alert('La Mesa, en ese día, ya está registrada!');
	                window.location= 'mesas_form.php'
	    			</script>";
				exit();
        	}
        }
        $consulta2= "INSERT INTO mesa_examen ( materia, tipo_mesa, profesor_titutlar, profesor_vocal1, profesor_vocal2, fecha) VALUES ( '$materia', '$tipo_mesa', '$titular', '$vocal1', '$vocal2', '$fecha')";

		
		if (mysqli_query($conexion, $consulta2)) {
			echo "<script>
	                alert('Mesa registrada con éxito!');
	                window.location= 'mesa_form.php'
	    			</script>";
		} else {
			echo "Error en la inserción: " . mysqli_error($conexion);
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