<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Mesa Inscriptos</title>
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
        $consulta_ins = "SELECT * FROM inscripcion WHERE mesa_ins='$id'";
        if (!($resultado_ins = mysqli_query($conexion, $consulta_ins))) {
            echo "Hubo un error en la consulta de datos de: Inscripción!";
            exit();
        }
        
        $consulta_m= "SELECT * FROM mesa_examen WHERE id='$id'";
            $resultado_m = mysqli_query($conexion, $consulta_m);
            $col_m= mysqli_fetch_row($resultado_m);
    ?>
    <header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Alumnos Inscriptos en la Mesa de:<i> <?php echo $col_m[2]; ?></i></h2>
    <section class="centro">
        
        <center>
        
        <table class="tabla">
        	<th>Nombre</th>
        	<th>Apellido</th>
        	<th>DNI</th>
            <th>Nota</th>
            <?php
        		while ($col_ins= mysqli_fetch_row($resultado_ins)) {
        			echo "<tr align='center'>";
                        $consulta_al= "SELECT * FROM alumno WHERE id='$col_ins[2]'";
                        $resultado_al = mysqli_query($conexion, $consulta_al);
                        $col_al= mysqli_fetch_row($resultado_al);
        			echo "<td>$col_al[1]</td>";
        			echo "<td>$col_al[2]</td>";
        			echo "<td>$col_al[3]</td>";
                    echo "<td>$col_ins[6]</td>";
        			echo "</tr>";
        		}
        		
        		mysqli_free_result($resultado_ins);
        		mysqli_close($conexion);
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */

        	?>
        </table>
        
        </center>
    </section>
    <div align="center" style="margin-top: 0;">
        <input type="button" onclick="history.back()" name="volver" value="Volver" style=" border-radius: 4px; height: 25px;"><br><br>
        <a href="mesa_form.php"><button style=" border-radius: 4px; height: 25px;">Volver a Registrar una Mesa</button></a>   <a href="inicio.php"><button style=" border-radius: 4px; height: 25px;">Ir a Inscribir</button></a>
        <br>
         
    </div>
</body>
</html>