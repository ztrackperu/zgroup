<?php 
/*$dbuser="zgroupco";
$dbpass="zgroup@@@";
$dbname="zgroupco_bdzgroup";
$conexion = mysql_connect("zgroup.com.pe", $dbuser, $dbpass) or die("Error conectando a la BBDD");
echo "conectado correctamente a bd
";
mysql_select_db($dbname, $conexion) or die ($dbname . " Base de datos no encontrada." . $dbuser);*/
$dbuser="zgroupco";
$dbpass="zgroup@@@";
$dbname="zgroupco_bdzgroup";
$conexion = mysql_connect("zgroup.com.pe", $dbuser, $dbpass) or die("Error conectando a la BBDD");
echo "";
mysql_select_db($dbname, $conexion) or die ($dbname . " Base de datos no encontrada." . $dbuser);
?>

