<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Gestión de Mesas</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php';
    require 'conexion.php'?>
    <br>
    <h2 align="center">Ingresar Mesa</h2>
    <section class="centro">
        
        <form action="mesa_insertar.php" method="POST">
        <center>
            <table class="tabla">
                <tr>
                    <td>Fecha de la Mesa</td>
                    <td><input type="date" name="fecha" required></td>
                </tr>
                <tr>
              
                    <td>Condicion</td>
                            <td><select name="condicion">
                            <option value="0">Seleccione condicion</option>
                        <?php
                            $consulta = "SELECT id, condicion FROM condicion";
                            $resultado = mysqli_query($conexion, $consulta);

                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo '<option value="' . $fila['id'] . '">' . $fila['condicion'] . '</option>';
                            }
                            mysqli_close($conexion);
                        ?>
                            </select></td>
                </tr>
                <tr>
                	<td>Materia</td>
                	<td><input type="text" name="materia" required></td>
                </tr>
                <tr>
                	<td>Profesor Titular</td>
                	<td><input type="text" name="titular"></td>
                </tr>
                <tr>
                	<td>Profesor Vocal 1</td>
                	<td><input type="text" name="vocal1"></td>
                </tr>
                <tr>
                	<td>Profesor Vocal 2</td>
                	<td><input type="text" name="vocal2"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="enviar" value="Registrar" style=" border-radius: 4px; height: 25px;">
                    <input type="reset" name="reset" value="Limpiar" style=" border-radius: 4px; height: 25px;"></td>
                </tr>
            </table>
        </center>
        </form>
        <br><br>
        <a href="mesa_listado.php"><button style=" border-radius: 4px; height: 25px;">Lista completa de Mesas</button></a>
        <a href="mesa_habilitada.php"><button style=" border-radius: 4px; height: 25px;">Lista de Mesas Habilitadas</button></a>
    </section>
    <?php       /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */?>
</body>
</html>