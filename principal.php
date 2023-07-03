<?php 
 session_start();
 $usuario = $_SESSION['username'];
$nivel = $_SESSION['nivel'];
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

echo "bienvenido $usuario <br>nivel de usuario $nivel <br>";
echo "<a href='salir.php'> Salir</a>"
?>
    
</body>
</html>