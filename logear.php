<?php 
require 'conexion.php';

session_start();
$usuario= $_POST['usuario'];
$clave = $_POST['pass'];

$q = "SELECT COUNT(*) AS contar FROM usuarios WHERE usuario= '$usuario' AND pass = '$clave'";

$consulta= mysqli_query($conexion,$q);
$array= mysqli_fetch_array($consulta);

if ($array['contar']>0){
    $_SESSION['username'] = $usuario;


    $q2 = "SELECT nivel FROM usuarios WHERE usuario= '$usuario' AND pass = '$clave'";
    $consulta= mysqli_query($conexion,$q);
    $array2= mysqli_fetch_array($consulta);
    $_SESSION['nivel'] = $array2[0];

    header("location: principal.php");
}
else{
    echo "datos incorrectos";
}