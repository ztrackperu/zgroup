<?php 
require("../MVC_Modelo/cajaM.php");
require("../MVC_Modelo/TransporteM.php");
require('../php/Funciones/Funciones.php');

if($_GET["acc"] == "v01") // MOSTRAR: Formulario Nuevo Registro
{
	$mensaje="MODULO EN MANTENIMIENTO...!";
		print "<script>alert('$mensaje')</script>";	
//include('../MVC_Vista/Transporte/Generar.php');
}

if($_GET["acc"]=="regoper"){
	$mensaje="MODULO EN MANTENIMIENTO...!";
		print "<script>alert('$mensaje')</script>";	
	//include('../MVC_Vista/Transporte/SeguimientoTransporte.php');
}

function Ver_Estadistica3C(){ return Ver_Estadistica3M();}
function ListaTipoRutaC(){ return  ListaTipoRutaM();}
function ListaTipoSeguimientoC(){ return  ListaTipoSeguimientoM();}
function ListaTipoTransporteC(){ return  ListaTipoTransporteM();}
function ListaBancoC(){ return  ListaBancoM();}
function ListaTipoUsuarioC(){ return  ListaTipoUsuarioM();}

if($_GET["acc"] == "v02") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Transporte/Transportistas.php');
}

/////agregado por Mahali el 18-04-2016
if($_GET["acc"] == "admin")
{	
	$udni=$_GET['udni'];
	$mod=$_GET['mod'];
	header("Location: ../MVC_Vista/Transporte/indextransporte.php?udni=".$udni."&mod=".$mod);	
}
if($_GET["acc"] == "reportes")
{	
	$udni=$_GET['udni'];
	$mod=$_GET['mod'];
	header("Location: ../MVC_Vista/Transporte/indextransporte.php?c=01&a=reportes&udni=".$udni."&mod=".$mod);	
}
////fin agregado por Mahali el 18-04-2016

?>

