<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'postventa';
// Todo esta lógica hara el papel de un FrontController
if(isset($_REQUEST['c'])){
	$c = strtolower($_REQUEST['c']);
	if($c == 'pv01'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegistrarCaso';
	}
	if($c == 'pv02'){
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'VerPanel';
	}
    require_once "controller/postventa/$controller.controller.php";
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