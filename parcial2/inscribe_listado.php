<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Inscripciones Listado</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
        require 'conexion.php';
        
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta = "SELECT * FROM inscripcion";
        if (!($resultado = mysqli_query($conexion, $consulta))) {
            echo "Hubo un error en la consulta de datos de: Inscripción!";
            exit();
        }

        $consulta_al = "SELECT * FROM alumno";
        $resultado_al = mysqli_query($conexion, $consulta_al);
        $col_al=mysqli_fetch_row($resultado_al);
        
    ?>
    <header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Listado de Inscripciones Realizadas</h2>
 
    <section class="centro">
        
        <center>
        
        <table class="tabla">
        	
            <th>Mesa</th>
        	<th>Condición</th>
        	<th>Alumno</th>
            <th>DNI</th>
        	<th>Fecha de Inscripción</th>
            <th>Fecha de la Mesa</th>
        	<th>Asistencia</th>
        	<th>Nota</th>
            <td colspan="2">Editar Inscripción</td>


        	<?php
        		while ($row=mysqli_fetch_row($resultado)) {
        			echo "<tr align='center'>";
                        $consulta_m = "SELECT * FROM mesa_examen WHERE id='$row[1]'";
                        $resultado_m = mysqli_query($conexion, $consulta_m);
                        $col_m=mysqli_fetch_row($resultado_m);

                    echo "<td>$col_m[1]</td>";
                    

                    
                        $consulta_cd = "SELECT * FROM condicion WHERE id='$row[3]'";
                        $resultado_cd = mysqli_query($conexion, $consulta_cd);
                        $col_cd=mysqli_fetch_row($resultado_cd);
                    echo "<td>$col_cd[1]</td>";


                        $consulta_al = "SELECT * FROM alumno WHERE id='$row[2]'";
                        $resultado_al = mysqli_query($conexion, $consulta_al);
                        $col_al=mysqli_fetch_row($resultado_al);


                    echo "<td>$col_al[2], $col_al[1]</td>";
                    echo "<td>$col_al[3]</td>";   
                    echo "<td>$row[4]</td>";
                    echo "<td>$col_m[6]</td>"; 
                    echo "<td>$row[5]</td>";
                    echo "<td>$row[6]</td>";
                    
                    echo "<td>
                            <form action='inscribe_modifica_form.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Modificar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='inscribe_borrar.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Borrar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
        			echo "</tr>";
        		}
        		mysqli_free_result($resultado);
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
    <div align="center">
        <input type="button" onclick="history.back()" name="volver" value="Volver" style=" border-radius: 4px; height: 25px;"> 
        <a href="inicio.php"><button style=" border-radius: 4px; height: 25px;">Ir a Inscribir</button></a>
        <br>
         
    </div>
</body>
</html>