<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
$controller = 'procesoot';

if(!isset($_REQUEST['c']))
{	
    require_once "controller/ordentrabajo/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
  
}
else
{
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == '01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'VerFrmOT';
	}else if($c == '02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarOT';
	}
	
	
    // Instanciamos el controlador RegistroCotizaciones
    require_once "controller/ordentrabajo/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>