<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'facelec';

if(!isset($_REQUEST['c']))
{	
    require_once "controller/facturadorelectronico/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
  
}
else
{
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == '01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarFacturas';
	}
	if($c == '02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'VerProcesofacturacion';
	}
	if($c == '03'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ExportarLibros';
	}
	if($c == '04'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ExportarCajaChica';
	}
    //la vista de cerear insumos esta referencia aqui  ->ProductosForm
	if($c == '05'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ProductosForm';
	}
	if($c == '06'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'CajaChica';
	}
        
/*	if($c == '07'){ 
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'DuplicarCotizacion';		
	}	*/			
    // Instanciamos el controlador RegistroCotizaciones
    require_once "controller/facturadorelectronico/$controller.controller.php";
    //controller/facturadorelectronico/facelec.controller.php   ->ProductosForm
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>