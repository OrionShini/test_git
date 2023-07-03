<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Usuario Insertar</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];
		$nom=$_POST['nombre'];
		
		
		$perfil=$_POST['perfil'];

		require 'conexion.php';
        if (!$conexion){
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        
        $consulta1 = "SELECT * FROM usuario";
        
        if (!$resultado=mysqli_query($conexion, $consulta1)) {
        	echo "Hubo un error en la consulta de datos!";
            exit();
        }
        
        while ($row=mysqli_fetch_row($resultado)) {
        	if ($usuario==$row[1]) {
        		echo "<script>
	                alert('El Usuario ya está registrado!');
	                window.location= 'usuario_form.php'
	    			</script>";
				exit();
        	}
        }
        $consulta2= "INSERT INTO usuario(usuario, clave, nom_completo, perfil) VALUES ('$usuario','$clave','$nom','$perfil')";
        if (!mysqli_query($conexion, $consulta2)) {
        	echo "Hubo un error en la consulta de datos de: Usuario!";
            exit();
        }
        echo "<script>
	                alert('Usuario registrado con éxito!');
	                window.location= 'usuario_form.php'
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