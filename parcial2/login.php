<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Sistema de Inscripción</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body style="background-color: #a3b4c8;">
	<header class="encabezado" style="height:50px;">
        <h1 align="center" style="padding: 4px;">TSDS - Inicio de Sesion -</h1>
    </header>
    <br>
    <h2 align="center">Ingreso al Sistema</h2>
    <section class="centro">
        

        <form action="login_procesa.php" method="POST">
        <center>
            <table class="tabla">

                <tr>
                    <td>Usuario</td>
                    <td><input type="text" name="usuario" maxlength="20" required></td>
                </tr>
                <tr>
                	<td>Clave</td>
                	<td><input type="password" name="clave" maxlength="20" required></td>
                </tr>
                <tr>
                	<td colspan="2" align="center"><input type="submit" name="ingresar" value="Ingresar" style=" border-radius: 4px; height: 25px;"></td>
                </tr>
            </table>
        </center>
        </form>

    </section>
</body>
</html>