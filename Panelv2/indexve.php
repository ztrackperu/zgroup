<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'vehiculo';

if(!isset($_REQUEST['c']))
{	
	$accion = 'RegVehiculo';
	// Instanciamos el controlador 
    require_once "controller/vehiculo/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
	// Llama la accion
    call_user_func( array( $controller, $accion ) );
	   
}
else
{
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == '01'){
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegVehiculo';				
	}else if($c == '02'){
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminTransporte';				
	}
			
    // Instanciamos el controlador 
    require_once "controller/vehiculo/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>