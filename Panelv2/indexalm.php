<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'procesostransporte';
if($_REQUEST['c']=='cont01'){
	$controller = 'procesoscontrol';
}/*else if($_REQUEST['c']=='cont02'){
	$controller = 'procesos';
}*/

if(isset($_REQUEST['c']))
{	
	//$accion = 'AdminTransporte';
	$c = strtolower($_REQUEST['c']);
	if($c == 'cont01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'aperturarmes';
	}else if($c== 'cont01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'cerrarmes';
	}
	// Instanciamos el controlador 
    require_once "controller/contabilidad/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
	// Llama la accion
    call_user_func( array( $controller, $accion ) );
	   
}
?>