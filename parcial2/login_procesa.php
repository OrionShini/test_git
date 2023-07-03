<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Control</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <br>
    <h2 align="center">Ingreso al Sistema</h2>
	<?php
        
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];

		require 'conexion.php';
        

        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }


        $consul = "SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'";
        

        $result= mysqli_query($conexion, $consul);

        if ($result->num_rows == 1) {
            session_start();
            $_SESSION['usuario'] = $usuario;

            $consul2 = "SELECT perfil FROM usuario WHERE usuario='$usuario'";
            $consulta= mysqli_query($conexion,$consul2);
            $arr= mysqli_fetch_array($consulta);
            
            if($arr[0]==1){
                header("Location: inicio.php");
            }
            else {
                
                header("Location: inicio2.php");
            }
        } else {
            echo "<script>
                alert('Nombre de usuario o contraseña incorrecta');
                window.location= 'login.php'
                </script>";
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