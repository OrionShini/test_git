<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Mesa Inscriptos por DNI</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
		$dni=$_POST['dni'];

		require 'conexion.php';


        $consulta_al = "SELECT * FROM alumno WHERE dni='$dni'";
        if (!($resultado_al = mysqli_query($conexion, $consulta_al))) {
            echo "Hubo un error en la consulta de datos de: Inscripción!";
            exit();
        }
        $col_al= mysqli_fetch_row($resultado_al);
        
        $consulta_ins = "SELECT * FROM inscripcion WHERE alumno_ins='$col_al[0]'";
        if (!($resultado_ins = mysqli_query($conexion, $consulta_ins))) {
            echo "Hubo un error en la consulta de datos de: Inscripción!";
            exit();
        }
	?>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h4 align="center"  ">El Alumno <?php echo $col_al[2],', ',$col_al[1],', DNI nro: ',$col_al[3]; ?></h4>
    <h5 align="center"  ">Se inscribió en la/s siguiente/s Mesa/s:</h5>
    <section class="centro">
        
        <center>
        
        <table class="tabla">
        	<th>Fecha de la Mesa</th>
        	<th>Materia</th>
        	<th>Profesor Titular</th>
        	<th>Profesor Vocal 1</th>
        	<th>Profesor Vocal 2</th>
            <th>Nota</th>
            <?php
        		while ($col_ins= mysqli_fetch_row($resultado_ins)) {
        			echo "<tr align='center'>";
                        $consulta_m= "SELECT * FROM mesa_examen WHERE id='$col_ins[1]'";
                        $resultado_m = mysqli_query($conexion, $consulta_m);
                        $col_m= mysqli_fetch_row($resultado_m);
        			echo "<td>$col_m[1]</td>";
        			echo "<td>$col_m[2]</td>";
        			echo "<td>$col_m[3]</td>";
        			echo "<td>$col_m[4]</td>";
        			echo "<td>$col_m[5]</td>";
                    echo "<td>$col_ins[6]</td>";
        			echo "</tr>";
        		}
        		
        		
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
        <input type="button" onclick="history.back()" name="volver" value="Volver al Listado" style=" border-radius: 4px; height: 25px;"><br><br>
        <a href="mesa_form.php"><button style=" border-radius: 4px; height: 25px;">Volver a Registrar una Mesa</button></a>   
        <a href="inicio.php"><button style=" border-radius: 4px; height: 25px;">Ir a Inscribir</button></a>
        <br>
         
    </div>
</body>
</html>