<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'ReportsController';

if(!isset($_REQUEST['c']))
{	
    $accion = 'reportSales';
    // Instanciamos el controlador 
    require_once "controller/report/$controller.php";    
    $controller = new $controller;
	// Llama la accion
    call_user_func( array($controller, $accion));
	   
}
else
{
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == '01'){
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'listForUser';							
	}else if($c == '02'){
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'reporteOne';		
	}else if($c == '03'){
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'searchSalesMan';
	}else if($c == '04'){
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : '';
	}else if($c == '05'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'VendorReportDashboard';
    }else if($c == '06'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AgregarNota';
    }else if($c == '07'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'MostrarDetalleNotas';
    }
			
    // Instanciamos el controlador 
    require_once "controller/report/$controller.php";    
    $controller = new $controller;
    
    // Llama la accion
    call_user_func(array($controller, $accion));
}