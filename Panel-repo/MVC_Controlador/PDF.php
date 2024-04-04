<?php 
require("../MVC_Modelo/cajaM.php");
require('../php/Funciones/Funciones.php');
if($_GET["acc"] == "imprimirpdf") // MOSTRAR: Formulario Nuevo Registro
{
	 $cli=$_GET['cod'];
	 $coti=$_GET['coti'];
	$c_nomcli=$_GET['cli'];
	 $c_desgral=($_GET['gral']);
	 $c_obsped=($_GET['obs']);
	//$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	//$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);*/
	include('../MVC_Vista/Cotizaciones/print/verpdf.php');	
}
if($_GET["acc"] == "imprimirpdf3") // MOSTRAR: Formulario Nuevo Registro
{
	 $cli=$_GET['cod'];
	 $coti=$_GET['coti'];
	 $c_nomcli=$_GET['cli'];
	 $c_desgral=($_GET['gral']);
	 $c_obsped=($_GET['obs']);
	//$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	//$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);*/
	include('../MVC_Vista/Cotizaciones/print/verpdf3.php');	
}

if($_GET["acc"] == "imprimirpdf4") // MOSTRAR: Formulario Nuevo Registro
{
	 $cli=$_GET['cod'];
	 $coti=$_GET['coti'];
	$c_nomcli=$_GET['cli'];
	 $c_desgral=($_GET['gral']);
	 $c_obsped=($_GET['obs']);
	//$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	//$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);*/
	include('../MVC_Vista/Cotizaciones/print/verpdf4.php');	
}


if($_GET["acc"] == "imprimirpdf2") // MOSTRAR: Formulario Nuevo Registro
{
	 $cli=$_GET['cod'];
	 $coti=$_GET['coti'];
	 $c_nomcli=$_GET['cli'];
	 $c_desgral=($_GET['gral']);
	 $c_obsped=($_GET['obs']);
	//$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	//$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);*/
	include('../MVC_Vista/Cotizaciones/print/verpdf2.php');	
}
if($_GET["acc"] == "imprimiros") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numos=$_GET['os'];
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/veros.php');
}

?>