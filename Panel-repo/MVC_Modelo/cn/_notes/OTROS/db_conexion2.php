<?php $conexion = mysqli_connect("localhost:88","root","1234","zgroup")or die ("Verifique la Base de Datos. Error: ".mysqli_error());
mysqli_query($conexion, "SET NAMES 'utf8'"); 
?>