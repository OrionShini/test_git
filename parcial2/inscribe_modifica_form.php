<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Inscripción Modificar</title>
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
        $consulta = "SELECT * FROM inscripcion WHERE id='$id'";
        if (!($resultado = mysqli_query($conexion, $consulta))) {
            echo "Hubo un error en la consulta de datos de: Inscripción!". PHP_EOL;
            exit();
        }
        $col= mysqli_fetch_row($resultado);
        $asistencia=$col[5];
		$nota=$col[6];
	?>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Modificar Datos de Inscripción</h2>
    <section class="centro">
        
        <center>
        <form action="inscribe_modifica_procesa.php" method="POST">
		<table class="tabla">
			
			<tr>
				<td>Mesa</td>
				<td><input type="text" name="mesa" value="<?php
					$consulta_m = "SELECT * FROM mesa_examen WHERE id='$col[1]'";
                    $resultado_m = mysqli_query($conexion, $consulta_m);
                    $col_m=mysqli_fetch_row($resultado_m);
					echo $col_m[2] ?>" readonly></td>
			</tr>
			<tr>
				<td>Condición</td>
				<td><input type="text" name="condicion" value="<?php 
					$consulta_cd = "SELECT * FROM condicion WHERE id='$col[3]'";
                	$resultado_cd = mysqli_query($conexion, $consulta_cd);
                    $col_cd=mysqli_fetch_row($resultado_cd);
				echo $col_cd[1] ?>" readonly></td>
			</tr>
			<tr>
				<td>Alumno</td>
				<td><input type="text" name="alumno" value="<?php 
					$consulta_al = "SELECT * FROM alumno WHERE id='$col[2]'";
                    $resultado_al = mysqli_query($conexion, $consulta_al);
                    $col_al=mysqli_fetch_row($resultado_al);
				echo $col_al[2],", ",$col_al[1],", DNI: ",$col_al[3] ?>"readonly></td>
			</tr>
			<tr>
				<td>Fecha de Inscripción</td>
				<td><input type="date" name="fecha" value="<?php echo $col[4]?>" readonly></td>
			</tr>
			<tr>
				<td>Asistencia</td>
				<td><abbr title="Se guardará: P=Presente/A=Ausente"><select name="asistencia" maxlength="11"></abbr>
					<option value="<?php echo $col[5]?>">Seleccione asistencia</option>
					<option value="P">Presente</option>
					<option value="A">Ausente</option>
				</select></td>
			</tr>
			<tr>
				<td>Nota</td>
				<td><input type="number" min="0" max="10" name="nota" value="<?php echo $col[6]?>" maxlength="11"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="enviar" value="Guardar Datos"  style=" border-radius: 4px; height: 25px;" onclick=" return confirm('Esta seguro que quiere guardar los datos?')"></td>";
			</tr>
		</table>
	</form>
	<br>
	<input type="button" onclick="history.back()" name="volver" value="Volver" style=" border-radius: 4px; height: 25px;">
	</center>
</section>
	<?php
		mysqli_free_result($resultado);
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