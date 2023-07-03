<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio - Sistema de Inscripción</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href="css/estiloVentEm.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php
        require 'conexion.php';
        require 'funciones.php';
        if (!$conexion) {
            echo "Se produjo un error! no hubo conexión a la base de datos." . PHP_EOL;
            exit();
        }
        $consulta_mesa = "SELECT * FROM mesa_examen";
        $consul_alum = "SELECT * FROM alumno";
        $consulta_cond = "SELECT * FROM condicion";
        if (!($resultado_mesa = mysqli_query($conexion, $consulta_mesa))) {
            echo "Hubo un error en la consulta de datos de: Mesa!";
            exit();
        }
        if (!($resultado_alumno = mysqli_query($conexion, $consul_alum))) {
            echo "Hubo un error en la consulta de datos de: Alumno!";
            exit();
        }
        if (!($resultado_cond = mysqli_query($conexion, $consulta_cond))) {
            echo "Hubo un error en la consulta de datos de: Condición!";
            exit();
        }
    ?>
    <header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <ul class="navbar">
        <a href="inicio2.php">Inscripción Alum.</a></li>
        <a href="#" style="cursor: no-drop;">Mesas Examenes</a></li>
        <a href="#"style="cursor: no-drop;">Registrar Alumnos</a></li>
        <a href="#"style="cursor: no-drop;">Panel Inscripciones</a></li>
        <a href="#"style="cursor: no-drop;">Panel Usuarios</a></li>
        <a href="logout.php">Salir</a></li>
    </ul>
    <br>
    <h2 align="center">Formulario de Inscripción</h2>
    <section class="centro">
        
                    <center>
                    <form action="inscribe_procesa.php" method="POST">
                        <table class="tabla">
                            <tr>
                                <td>Mesa</td>
                                <td><select name="mesa" required>
                                    <option value="0">Seleccione mesa</option>
                                    <?php
                                        while ($row_m = mysqli_fetch_array($resultado_mesa)) {
                                            echo '<option value="',$row_m[0],'">',$row_m[1]," * ",$row_m[2],'</option>';
                                        }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alumno</td>
                                <td><select name="alumno" required>
                                    <option value="0">Seleccione alumno</option>
                                    <?php
                                        while ($row_a = mysqli_fetch_array($resultado_alumno)) {
                                            echo '<option value="',$row_a[0],'">',$row_a[2],", ",$row_a[1]," * ",$row_a[3],'</option>';
                                        }
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Condición</td>
                                <td><select name="condicion" required>
                                <option value="0">Seleccione condición</option>
                                    <?php
                                        while ($row_c = mysqli_fetch_array($resultado_cond)) {
                                            echo '<option value="',$row_c[0],'">',$row_c[1],'</option>';
                                        }
                                    ?>
                                    </select>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" name="enviar" value="Inscribir" style=" border-radius: 4px; height: 25px;">
                                <input type="reset" name="reset" value="Borrar" style=" border-radius: 4px; height: 25px;"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><a href="inscribe_listado2.php"><input type="button" name="lista" value="Ir al Listado de Inscriptos" style=" border-radius: 4px; height: 25px;"></a></td>
                            </tr>
                        </table>
                    </form>
                    </center>
    </section>
    
    <?php
        mysqli_free_result($resultado_cond);
        mysqli_free_result($resultado_mesa);
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