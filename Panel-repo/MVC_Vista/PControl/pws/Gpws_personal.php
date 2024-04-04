<?
include("../conexion.php");
$conexion= conectarBD();
 $dni=$_POST["dni"];

$pwsant=$_POST["pwsant"];

$pwsnuv=$_POST["pwsnuv"];

$pwsrep=$_POST["pwsrep"];


$quueridni=mysql_query("select*from personal where cedula='$dni' limit 0,1"); 
while($dniquery = mysql_fetch_array($quueridni))
	{
 	$nombre=$dniquery['apellido'];
 	$codigo=$dniquery['codigo'];
	$cedula=$dniquery['cedula'];
	}
	
	
	
if($cedula==$dni and $pwsant==$codigo and $pwsnuv==$pwsrep ){

$personar=mysql_query("UPDATE personal SET codigo = '$pwsnuv' WHERE cargo='$dni';"); 
//$asistencia=mysql_query("UPDATE asistencia SET codigo = '$pwsnuv' WHERE codigo='$pwsant';"); 

echo "<center><b>SU NUEVA CONTRASEÑA HA SIDO MODIFICADA CORRECTAMENTE 
SE RECOMIENDA CAMBIAR SU CONTRASEÑA PERIÓDICAMENTE</b></center> 
";
}else{
echo "<center><font color='#FF0000'><b> DATOS INGRESADO NO COINCIDEN VERIFIQUE LOS DATOS INGRESADO </b></font></center>";
}
								
				
        					 ?>