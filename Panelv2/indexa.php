<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'procesosvta';

if(!isset($_REQUEST['c']))
{	
    require_once "controller/ventas/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
  
}
else
{
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == '01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarClientes';
	}
	if($c == '02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotizaciones';
	}
	if($c == '03'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegCotizaciones';		
	}
	if($c == '04'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarCotizaciones';		
	}
	if($c == '05'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCronograma';		
	}
	if($c == '06'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotiAFusionar';		
	}
	if($c == '07'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminReportes';		
	}
	if($c == '09'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaCotXFacturar';		
	}
	if($c == '08'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaCotXAprobar';		
	}
	if($c == '10'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaCotCronograma';		
	}
    if($c == '13'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'CotiPSC';		
	}
	if($c == '14'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotxRuc';		
	}
	if($c == '15'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCroxRuc';		
	}
	if($c == '16'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarEquipo';		
	}
	if($c == '17'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotxUsu';		
	}
	if($c == '18'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotxUsuGerencia';		
	}
	if($c == '19'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotAprobadasxUsuGerencia';		
	}

/*	if($c == '07'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'DuplicarCotizacion';		
	}	*/			
    // Instanciamos el controlador RegistroCotizaciones
    require_once "controller/ventas/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>