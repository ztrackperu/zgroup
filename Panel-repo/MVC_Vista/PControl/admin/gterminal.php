<?php include("../conexion.php"); ?>

<?
$servi=$_REQUEST["servi"];
$nompc=$_REQUEST["nompc"];
$pcip=$_REQUEST["pcip"];
$pcmac=$_REQUEST["pcmac"];
$fecha=$_REQUEST["fecha"];

 
        conectarBD();
						$vercedula= "INSERT INTO cpipmac VALUES (NULL , '$servi', '$pcip', '$pcmac', '$nompc', '$fecha');";
						$resultadoc= mysql_query($vercedula);
						echo mysql_error();
						
						
		echo "<center><p><b>TERMINAR REGISTRADO CORRECTAMENTE </b></center>"
						
?>