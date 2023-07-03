<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0">
	<title>TSDS - Gestión de Alumnos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>

    <?php require 'navbar.php';?>

    <br>
    <h2 align="center">Ingresar Alumno</h2>
    <section class="centro">
        
        <center>
        <form action="alumno_insertar.php" method="POST">
            <table class="tabla">
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="nombre" required></td>
                </tr>

                <tr>
                	<td>Apellido</td>
                	<td><input type="text" name="apellido" required></td>
                </tr>

                <tr>
                	<td>DNI</td>
                	<td><input type="number" name="dni"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="enviar" value="Registrar" style=" border-radius: 4px; height: 25px;">
                    <input type="reset" name="reset" value="Limpiar" style=" border-radius: 4px; height: 25px;"></td>
                </tr>

            </table>
        </form>
        <br><br>
        <a href="alumno_listado.php"><button style=" border-radius: 4px; height: 25px;">Ver lista completa de Alumnos</button></a>
        </center>
    </section>
    <?php                
                 /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */
                ?>
</body>
</html>