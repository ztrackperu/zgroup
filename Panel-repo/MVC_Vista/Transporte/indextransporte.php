<?php

$controller = 'procesostransporte';

if(!isset($_REQUEST['c']))
{	
	$accion = 'AdminTransporte';
	// Instanciamos el controlador 
    require_once "../../MVC_Controlador/Transporte/$controller.controller.php";
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
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'reportes';		
		/*$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegDetTransporte';		
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotiAprobadas';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarForwarder';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'GuardarCabTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'GuardarDetTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'EliminarTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminDetTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'EliminarDetTransporte';*/					
	}
			
    // Instanciamos el controlador 
    require_once "../../MVC_Controlador/Transporte/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>