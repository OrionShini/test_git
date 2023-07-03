<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Alumnos Listado</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
        require 'conexion.php';

        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consul_alum = "SELECT * FROM alumno";
        if (!($resultado_alumno = mysqli_query($conexion, $consul_alum))) {
            echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }
        $total=mysqli_num_rows($resultado_alumno);
    ?>
    <header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Listado de Alumnos</h2>
    <section class="centro">
        
        <center>
        
        <table class="tabla">
        	<th>Apellido</th>
        	<th>Nombre</th>
        	<th>DNI</th>
            <th>Mesas Inscriptas</th>
            <th colspan="2">Editar Alumno</th>
        	<?php
        		while ($row=mysqli_fetch_row($resultado_alumno)) {
        			echo "<tr align='center'>";
        			echo "<td>$row[2]</td>";
        			echo "<td>$row[1]</td>";
        			echo "<td>$row[3]</td>";
                    echo "<td>
                            <form action='alumno_lista_mesa.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Mostrar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='alumno_modifica_form.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Modificar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='alumno_borrar.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Borrar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
        			echo "</tr>";
        		}
        		mysqli_free_result($resultado_alumno);
        		mysqli_close($conexion);
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */                
        	?>
            <tr>
                <td colspan="5" align="center">Total de Alumnos: <strong><?php echo $total;?></strong></td>
            </tr>
        </table>
        
        </center>
    </section>
    <div align="center">
        <a href="alumnos_form.php"><button style=" border-radius: 4px; height: 25px;">Volver a Registrar Alumno</button></a><a href="inicio.php"><button style=" border-radius: 4px; height: 25px;">Ir a Inscribir</button></a>
        <br>
         
    </div>
</body>
</html>