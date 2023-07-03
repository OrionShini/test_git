<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alumno Insertando</title>
</head>
<body>
	<?php
		$nom=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$dni=$_POST['dni'];

		require 'conexion.php';


        if (!$conexion){
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        
        $consulta1 = "SELECT * FROM alumno";
        
        if (!$resultado=mysqli_query($conexion, $consulta1)) {
        	echo "Hubo un error en la consulta de datos!";
            exit();
        }


        
        while ($row=mysqli_fetch_row($resultado)) {
        	if ($dni==$row[3]) {
        		echo "<script>
	                alert('El DNI del Alumno ya está registrado!');
	                window.location= 'alumnos_form.php'
	    			</script>";
				exit();
        	}
        }



        $consulta2= "INSERT INTO alumno(nombre, apellido, dni) 
		VALUES ('$nom','$apellido','$dni')";



        if (!mysqli_query($conexion, $consulta2)) {
        	echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }

		
        echo "<script>
	                alert('Alumno registrado con éxito!');
	                window.location= 'alumnos_form.php'
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