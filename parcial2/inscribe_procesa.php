<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Procesa Inscripción</title>
</head>
<body>
	<?php
		$mesa=$_POST['mesa'];
		$alumno=$_POST['alumno'];
		$condicion=$_POST['condicion'];
		
		$fecha_incripcion=date('y-m-d');



		
		require 'conexion.php';
		if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta_inscr_existe= "SELECT * FROM inscripcion";
        $resultado_existe=mysqli_query($conexion, $consulta_inscr_existe);
        
        while ($row_existe=mysqli_fetch_row($resultado_existe)) {
	    	if (($alumno==$row_existe[2])&&($mesa==$row_existe[1])) {
	        	echo "<script>
	                alert('El Alumno ya se encuentra inscripto en dicha Mesa!');
	                window.location= 'inicio.php'
	    			</script>";
				exit();
	    	}
    	}
		mysqli_free_result($resultado_existe);
		$consulta_mesa_fecha = "SELECT fecha FROM mesa_examen WHERE id='$mesa'";
		$resultado=mysqli_query($conexion,$consulta_mesa_fecha);
		$row=mysqli_fetch_assoc($resultado);
		
		if (!($fecha<$row['fecha'])) {
			
	        echo "<script>
                alert('Imposible Inscribir: la mesa indicada ya pasó!');
                window.location= 'inicio.php'
    			</script>";
			exit();
		}

        $consulta_mesa = "INSERT INTO inscripcion(mesa_ins, alumno_ins, condicion_ins, fecha_ins) VALUES ('$mesa','$alumno','$condicion','$fecha_incripcion')";
        if (!($resultado_mesa = mysqli_query($conexion, $consulta_mesa))) {
            echo "Hubo un error en la consulta de datos de: Mesa!";
            exit();
        }
        echo "<script>
                alert('Inscripción Exitosa!');
                window.location= 'inicio.php'
    			</script>";
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */				
	?>
</html>