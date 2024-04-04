<?php 
require("../MVC_Modelo/InventarioM.php"); 
require("../MVC_Modelo/CajaM.php"); 
require('../php/Funciones/Funciones.php');

$c_empresa=$_GET['val2'];$c_nombre=$_GET['val3'];$c_fono=$_GET['val4'];$c_email=$_GET['val5'];$c_ruc=$_GET[''];$c_producto=$_GET['val6'];$c_consulta=$_GET['val7'];$c_estado=$_GET[''];$c_derivado=$_GET['val8'];


RegistroContactoweb($c_empresa,$c_nombre,$c_fono,$c_email,$c_ruc,$c_producto,$c_consulta,$c_estado,$c_derivado);

 $mensaje="Datos Grabados Correctamente";
 print "<script>alert('$mensaje')</script>";

?>