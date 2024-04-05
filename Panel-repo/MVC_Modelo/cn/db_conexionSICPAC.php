<?php 
$conexion = mysqli_connect("localhost:33066","root","","sac0461")or 
die ("Verifique la Base de Datos. Error: ".mysqli_error());
mysqli_query($conexion, "SET NAMES 'utf8'"); 
?>