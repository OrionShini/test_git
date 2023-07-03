<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Usuarios Listado</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<?php
        require 'conexion.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta = "SELECT * FROM usuario";
        if (!($resultado = mysqli_query($conexion, $consulta))) {
            echo "Hubo un error en la consulta de datos de: Usuario!";
            exit();
        }
        
    ?>
    <header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php'?>
    <br>
    <h2 align="center">Listado de Usuarios</h2>
    <section class="centro">
        
        <center>
        
        <table class="tabla">
        	<th>Usuario</th>
        	<th>Clave</th>
        	<th>Nombre Completo</th>
        	<th>Perfil</th>
            <td colspan="2">Editar Usuario</td>
        	<?php
        		while ($row=mysqli_fetch_row($resultado)) {
        			echo "<tr align='center'>";
        			echo "<td>$row[1]</td>";
        			echo "<td>$row[2]</td>";
        			echo "<td>$row[3]</td>";
        			echo "<td>$row[4]</td>";
                    echo "<td>
                            <form action='usuario_modifica_form.php' method='POST'>
                              <input type='hidden' name='id' value='$row[0]'>
                              <input type='submit' value='Modificar' style=' border-radius: 4px; height: 25px;'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='usuario_borrar.php' method='POST'>
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
        <a href="usuario_form.php"><button style=" border-radius: 4px; height: 25px;">Volver a Registrar Usuario</button></a>   <a href="inicio.php"><button style=" border-radius: 4px; height: 25px;">Ir a Inscribir</button></a>
        <br>
         
    </div>
    
  
</body>
</html>