<?php
$conexion = mysqli_connect("localhost","root","1234","bdventas")or die ("Verifique la Base de Datos. Error: ".mysqli_error());
mysqli_query($conexion, "SET NAMES 'utf8'"); 
?>

 