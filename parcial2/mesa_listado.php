<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Mesas Listado</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
        require 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta = "SELECT * FROM mesa_examen";
        if (!($resultado = mysqli_query($conexion, $consulta))) {
            echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }
        $consulta2= "SELECT alumno_ins FROM inscripcion"
    ?>
    <header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Listado de Mesas</h2>
        
    </div>
    <section class="centro">
        
        <center>
        <form action="mesa_modifica.php" method="POST">
        <table class="tabla">
            <th>Materia</th>
        
        	<th>Tipo de mesa</th>
        	<th>Profesor Titular</th>
        	<th>Profesor Vocal 1</th>
        	<th>Profesor Vocal 2</th>
            <th>Fecha de la Mesa</th>
            <td colspan="2" align="center">Editar Mesa</td>
            <td>Alumnos Inscriptos</td>
        	<?php
        		while ($row=mysqli_fetch_row($resultado)) {
        			echo "<tr align='center'>";
        			echo "<td>$row[1]</td>";
        			echo "<td>";
                    $consulta_co= "SELECT condicion FROM condicion WHERE id='$row[2]'";
                    $resultado_co = mysqli_query($conexion, $consulta_co);
                    $col_co= mysqli_fetch_row($resultado_co);
                    echo "$col_co[0]</td>";
        			echo "<td>$row[3]</td>";
        			echo "<td>$row[4]</td>";
        			echo "<td>$row[5]</td>";
                    echo "<td>$row[6]</td>";
                    echo "<td>
                            <form action='mesa_modifica_form.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Modificar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='mesa_borrar.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Borrar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='mesa_lista_alum.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Mostrar' style=' border-radius: 4px; height: 25px;'>
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
        </form>
        </center>
    </section>
    <div align="center"  ">
        <h5>Mostrar Mesas de un Alumno por DNI</h5>
        <form action="mesa_lista_dni.php" method="POST">
            Ingrese DNI del Alumno: <input type="number" name="dni" maxlength="10" placeholder="Ingrese DNI sin puntos">   <input type="submit" name="enviar" value="Buscar" style=" border-radius: 4px; height: 25px;">
        </form>
        <br>
        <a href="mesa_form.php"><button style=" border-radius: 4px; height: 25px;">Volver a Registrar una Mesa</button></a>   <a href="inicio.php"><button style=" border-radius: 4px; height: 25px;">Ir a Inscribir</button></a>
        <a href="mesa_habilitada.php"><button style=" border-radius: 4px; height: 25px;">Lista de Mesas Habilitadas</button></a>
        <br>
         
    </div>
    
</body>
</html>