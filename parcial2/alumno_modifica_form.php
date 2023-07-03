<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Alumno Modificar</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
		$id=$_POST['id'];

		require 'conexion.php';	
		
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consul_alum = "SELECT * FROM alumno WHERE id='$id'";

        if (!($resultado_alumno = mysqli_query($conexion, $consul_alum))) {
            echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }
        $col= mysqli_fetch_row($resultado_alumno);
	?>


	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Modificar Datos del Alumnos</h2>
    <section class="centro">
        
        <center>
        <form action="alumno_modifica_procesa.php" method="POST">
		<table class="tabla">
			<tr>
				<td>Id</td>
				<td><input type="text" name="id" value="<?php echo $col[0]?>" readonly></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $col[1]?>" maxlength="20" required></td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td><input type="text" name="apellido" value="<?php echo $col[2]?>" maxlength="20" required></td>
			</tr>
			<tr>
				<td>DNI</td>
				<td><input type="number" name="dni" value="<?php echo $col[3]?>" maxlength="10" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="enviar" value="Guardar Cambios"  style=" border-radius: 4px; height: 25px;" onclick=" return confirm('Esta seguro que quiere guardar los cambios?')"></td>
			</tr>
		</table>
	</form>
	<input type="button" onclick="history.back()" name="volver" value="Volver" style=" border-radius: 4px; height: 25px;">
	</center>
</section>
	<?php
		mysqli_free_result($resultado_alumno);
		mysqli_close($conexion);
		        /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */
	?>
</body>
</html>