<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'login';
// Todo esta lógica hara el papel de un FrontController
if(isset($_REQUEST['c'])){
	$c = strtolower($_REQUEST['c']);
	if($c == 'log01'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'validar';
	}
	if($c == 'log02'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Alertas';
	}
	if($c == 'log03'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'CambiarMoneda';
	}
	if($c == 'log04'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'CotPreAprobadas';
	}
    require_once "controller/login/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
     // Llama la accion
    call_user_func( array( $controller, $accion ) );    
}else{
	require_once "controller/login/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();  	
}
?>
