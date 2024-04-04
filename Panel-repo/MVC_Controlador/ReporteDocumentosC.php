<?php 
require('../php/Funciones/Funciones.php');
require("../MVC_Modelo/usuariosM.php"); 
require("../MVC_Modelo/CajaM.php"); 
require("../MVC_Modelo/ReporteDocumentosM.php"); 
//require("../MVC_Modelo/ReporteDocumentosMsql.php"); 

if($_GET["acc"] == "clieauto") 
{
 $texto =utf8_decode($_REQUEST["q"]);	
	  $busquedaproveedor = listaclienteM($texto);		
		echo json_encode($busquedaproveedor);		
		
}

if($_GET['acc']=='RepCotizaciones'){	
	//include('../MVC_Vista/ReporteDocumentos/FrmRepCotizaciones.php');
	$busqueda=$_REQUEST['busqueda'];
	$mas=$_REQUEST['mas'];
	
	$nrodoc=$_REQUEST['nrodoc'];
	$IdCliente=$_REQUEST["idcli"];	
	$fechainicial=gfecha($_REQUEST["fechainicial"]);
	$fechafinal=gfecha($_REQUEST["fechafinal"]);
	
	if($busqueda=='doc'){
		//listado por nrodoc	
		$resultadoc=listaCotiPorDocM($nrodoc);
		include('../MVC_Vista/ReporteDocumentos/FrmRepCotizaciones.php');
	}else if($busqueda=='clie'){
		if($mas=='1'){
			//listado con fecha	
		$resultadoc=listaCotiPorFechasM($IdCliente,$fechainicial,$fechafinal);	
		include('../MVC_Vista/ReporteDocumentos/FrmRepCotizaciones.php');	
		}else{
		//listado con cliente		
		$resultadoc=listaCotiPorClienteM($IdCliente);
		include('../MVC_Vista/ReporteDocumentos/FrmRepCotizaciones.php');	
		}
	}else{
		include('../MVC_Vista/ReporteDocumentos/FrmRepCotizaciones.php');
	}
}

if($_GET['acc']=='verRepCotizaciones'){
	$busqueda=$_REQUEST['busqueda'];
	$mas=$_REQUEST['mas'];
	
	$nrodoc=$_REQUEST['nrodoc'];
	$IdCliente=$_REQUEST["IdCliente"];	
	$fechainicial=gfecha($_REQUEST["fechainicial"]);
	$fechafinal=gfecha($_REQUEST["fechafinal"]);
	
	if($busqueda=='doc'){
		//listado por nrodoc	
		$resultadoc=listaCotiPorDocM($nrodoc);
		include('../MVC_Vista/ReporteDocumentos/ListaRepCotizaciones.php');
	}else if($busqueda=='clie'){
		if($mas=='1'){
			//listado con fecha	
		$resultadoc=listaCotiPorFechasM($IdCliente,$fechainicial,$fechafinal);	
		include('../MVC_Vista/ReporteDocumentos/ListaRepCotizaciones.php');	
		}else{
		//listado con cliente		
		$resultadoc=listaCotiPorClienteM($IdCliente);
		include('../MVC_Vista/ReporteDocumentos/ListaRepCotizaciones.php');	
		}
	}else{
		include('../MVC_Vista/ReporteDocumentos/FrmRepCotizaciones.php');
	}
	
	//include('../MVC_Vista/ReporteDocumentos/ListaRepCotizaciones.php');
}

if($_GET['acc']=='verdetCoti'){
	$c_numped=trim($_GET['c_numped']);
	$resultadodet=listaCotiDetalleM($c_numped);	
	 echo json_encode($resultadodet);	
	
}


?>