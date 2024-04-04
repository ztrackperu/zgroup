<?php 
$conexion = mysqli_connect("localhost","root","123-3341@$","zgroup")or 
die ("Verifique la Base de Datos. Error: ".mysqli_error());
mysqli_query($conexion, "SET NAMES 'utf8'"); 
?>