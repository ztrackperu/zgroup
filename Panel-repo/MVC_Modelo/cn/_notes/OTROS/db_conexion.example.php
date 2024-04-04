<?php 
$conexion = mysqli_connect("192.168.0.5","root","","zgroup")or 
die ("Verifique la Base de Datos. Error: ".mysqli_error());
mysqli_query($conexion, "SET NAMES 'utf8'"); 
?>