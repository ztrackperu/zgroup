<?php 
require("../MVC_Modelo/PscargoM.php"); 
require('../php/Funciones/Funciones.php');
require("../MVC_Modelo/usuariosM.php"); 
if($_GET["acc"] == "v01") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/verforwarder.php');	
}
if($_GET["acc"] == "ver1")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteCompras.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteCompras.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteCompras.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteCompras.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
$reporte=ListarForwarderM();
include('../MVC_Vista/Pscargo/verforwarder.php');	 
}
if($_GET["acc"] == "v02") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/VerCartaEntrega.php');	
}
if($_GET["acc"] == "ver2") // MOSTRAR: Formulario Nuevo Registro
{
	$fwd=$_REQUEST["fwd"];
	$reporte=listaentregacartas($fwd);
	
include('../MVC_Vista/Pscargo/ImprimirCartaEntrega.php');	
}

if($_GET["acc"] == "nombauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = listanombrecartaentM($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$nombre =   utf8_encode($item["nombre"]);
		echo "$nombre\n";
	}
}
	
}
//28032015
if($_GET["acc"] == "vercli") // MOSTRAR: Formulario Modificar Registro
{
	include('../MVC_Vista/Pscargo/VerClientes.php');
}


if($_GET["acc"] == "entauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; Ent_Codi,Ent_Rsoc,Ent_Ruc,Ent_Dire
 $busquedapacienteauto = ListaCliAutoM($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$clinom =   utf8_encode($item["Ent_Rsoc"]);
		$cliruc=$item["Ent_Ruc"];
		$clicod=$item["Ent_Codi"];
		$clidir=$item["Ent_Dire"];
		$concatena=$clinom;
		echo "$concatena|$clinom|$cliruc|$clicod|$clidir|\n";
	}
}
	
}

if($_GET["acc"] == "verentidades") // MOSTRAR: Formulario Modificar Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);	
	$cliruc=$_REQUEST['cliruc'];
	$clicod=$_REQUEST['clicod'];
	$clidire=$_REQUEST['clidire'];
	$nomcli=$_REQUEST['nomcli'];	
	include('../MVC_Vista/Pscargo/UpdateEntidad.php');
}
if($_GET["acc"] == "updatecliente") // MOSTRAR: Formulario Modificar Registro
{
	$cliruc=$_REQUEST['cliruc'];
	$clicod=$_REQUEST['clicod'];
	$razon=strtoupper($_REQUEST['nomcli']);
	$xclidire=utf8_encode(strtoupper($_REQUEST['clidire']));
	$clidire=htmlspecialchars($xclidire, ENT_QUOTES,'UTF-8');
	//htmlspecialchars
	$nomcli=$_REQUEST['nomcli'];	
	$udni=$_REQUEST['udni'];//usuario que modifica
	$fechamod=date("Y-m-d H:i:s");
	UpdateEntidadesM($clicod,$razon,$clidire,$udni,$fechamod);
	$mensaje="Datos de Cliente Actualizado";
	print "<script>alert('$mensaje')</script>";	
	include('../MVC_Vista/Pscargo/VerClientes.php');	
}

if($_GET["acc"] == "verfac") // MOSTRAR: Formulario Modificar Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Pscargo/anularfactura.php');
}

if($_GET["acc"] == "anulfac") // MOSTRAR: Formulario Modificar Registro
{
	
	$documento=$_REQUEST['serie'].'-'.$_REQUEST['numero'];
	$usermod=$_REQUEST['udni'];
	$fechamod=date("Y-m-d H:i:s");
	
	$busca=BuscarFactM($documento);
	if($busca!=NULL)
	{
	AnularFacM($documento,$usermod,$fechamod);
	$mensaje="Documento Anulado Correctamente";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Pscargo/anularfactura.php');
	}else{
	$mensaje="Documento No Existe Revise";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Pscargo/anularfactura.php');
		
		}
}

///18052015 new report

if($_GET["acc"] == "verpago") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/Reportes/ver_rep_pagosprov.php');	
}
if($_GET["acc"] == "vpagprov"){
	$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteCompras.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteCompras.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteCompras.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteCompras.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		$prov=$_REQUEST['codprov'];
		$fini=$_REQUEST['textfield'];
		$ffin=$_REQUEST['textfield2'];
		$sw=$_REQUEST['chkprov'];
		
$reporte=fwd_Reporte_pago_prov($prov,$fini,$ffin,$sw);
include('../MVC_Vista/Pscargo/Reportes/ver_rep_pagosprov.php');	
	}
if($_GET["acc"] == "verfacs") // MOSTRAR: Formulario Nuevo Registro 
{
include('../MVC_Vista/Pscargo/ListaFacSicoz.php');	
}
if($_GET["acc"] == "verfacsis") // MOSTRAR: Formulario Nuevo Registro verfacsis
{
	
	$fw=$_REQUEST['fw'];
	
	$reporte=listafacturafwM($fw);
include('../MVC_Vista/Pscargo/Verfacturas.php');	
}
if($_GET["acc"] == "verdetafac") // MOSTRAR: Formulario Nuevo Registro 
{
	$fac=$_GET['cod'];
	$reporte=listadetallefacM($fac);
include('../MVC_Vista/Pscargo/detallefactura.php');	
}
?>