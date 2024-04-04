<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'procesostransporte';
//if($_REQUEST['c']=='01'){
	$controller = 'utilitarios';
//}
/*else if($_REQUEST['c']=='cont02'){
	$controller = 'procesos';
}*/

if(isset($_REQUEST['c']))
{
	//$accion = 'AdminTransporte';
	$c = strtolower($_REQUEST['c']);
	if($c == '01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'veruti';
	}
	if($c == '02'){
    	$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'adminControllers';
	}
	if($c == '03'){
    	$accion = 'adminUsers';
	}
	// Instanciamos el controlador 
    require_once "controller/utilitarios/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
	// Llama la accion
    call_user_func( array( $controller, $accion ) );
	   
}
?>