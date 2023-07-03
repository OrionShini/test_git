<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSDS - Gestión de Usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<header class="encabezado" style="height:100px;">
        <h1 align="center" style="padding: 25px;">TSDS - Inscripción para Mesas de Exámenes</h1>
    </header>
    <?php require 'navbar.php';
    require 'conexion.php'?>
    <br>
    <h2 align="center">Ingresar Usuario</h2>
    <section class="centro">
        
        <center>
        <form action="usuario_insertar.php" method="POST">
            <table class="tabla">
                <tr>
                    <td>Usuario</td>
                    <td><input type="text" name="usuario" required></td>
                </tr>
                <tr>
                	<td>Clave</td>
                	<td><input type="password" name="clave" required></td>
                </tr>
                <tr>
                	<td>Nombre Completo</td>
                	<td><input type="text" name="nombre" maxlength="50" required></td>
                </tr>

                
                <tr>
                    <td>Perfil</td>
                    <td>
                <select name="perfil">
                    <?php
                    $consulta = "SELECT id, perfil FROM usuario_perfil";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '<option value="' . $fila['id'] . '">' . $fila['perfil'] . '</option>';
                    }
                    mysqli_close($conexion);
                /* 
                - Rodrigo Fabian Castillo
                - 06/23
                - Programación 3 de la TSDS
                - Curso: 2°1°
                */                   
                    ?>
                </select></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="enviar" value="Registrar" style=" border-radius: 4px; height: 25px;">
                    <input type="reset" name="reset" value="Limpiar" style=" border-radius: 4px; height: 25px;"></td>
                </tr>
            </table>
        </form>
        <br><br>
        <a href="usuario_listado.php"><button style=" border-radius: 4px; height: 25px;">Ver lista completa de Usuarios</button></a>
        </center>
    </section>
</body>
</html>