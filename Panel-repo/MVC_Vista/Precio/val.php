<?php

$c_codprd=$_GET['c_codprd'];
$c_catprd=$_GET['c_catprd'];
$c_conprd=$_GET['c_conprd'];
$c_opermod=$_GET['c_opermod'];
$d_fecmod=$_GET['d_fecmod'];
$n_preprd=$_GET['n_preprd'];

$c_mcamaq=$_GET['c_mcamaq'];//new
$c_cmodel=$_GET['c_cmodel'];//new



 $mensaje="EL PRODUCTO YA TIENE EL PRECIO REGISTRADO...Precio Activado...!";
		print "<script>alert('$mensaje')</script>";	
		
		DesactivarUltimoProductoM($c_codprd,$c_catprd,$c_conprd,$c_opermod,$d_fecmod,$c_mcamaq,$c_cmodel);
		DesactivarProductoActivadoM($c_codprd,$c_catprd,$c_conprd,$c_opermod,$d_fecmod,$c_mcamaq,$c_cmodel);		
	    ActivarProductoM($c_codprd,$c_catprd,$c_conprd,$n_preprd,$c_opermod,$d_fecmod,$c_mcamaq,$c_cmodel);			       
	    $resulos=BusquedaPrecioM($descripcion,$sw);
	   include('../MVC_Vista/Precio/AdminPrecio.php');
?>