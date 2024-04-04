<?php 
require("../MVC_Modelo/CajaM.php"); 
require("../MVC_Modelo/GerenciaM.php");
require('../php/Funciones/Funciones.php');
if($_GET["acc"] == "frmreporte"){
	include('../MVC_Vista/Gerencia/reportes.php');	
}
if($_GET["acc"] == "rep01"){
	$listaestados=SituacionEquipoM();
	include('../MVC_Vista/Gerencia/frmrep_equipoxprecios.php');	
		
}
if($_GET["acc"]=="verrep01"){
	$listaestados=SituacionEquipoM();
	 $codigo=$_REQUEST['codigo'];
	 $clase=$_REQUEST['claseprod'];
	 $sit=$_REQUEST['situequi'];
	 $opsw=$_REQUEST['opsw'];	
	if($sit=='xtodos'){
		$sw='1'; 
		}
	if($codigo==""){
	$reporte=Rep_Lista_ProductoxPrecioM($codigo,$sit,$sw,$clase);
	}else{
	$reporte=Rep_Lista_DescripProductoxPrecioM($codigo,$sit,$opsw,$clase);	
		}
	include('../MVC_Vista/Gerencia/frmrep_equipoxprecios.php');	
	}
?>