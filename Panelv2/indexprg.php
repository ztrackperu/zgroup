<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';

if($_REQUEST['c']=="01")
{	
    $controller = 'programacion';  
}
if(isset($_REQUEST['c']))
{  
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == '01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaEventos';
	}else if($c == '02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Eventos';
	}	
	
    // Instanciamos el controlador
    require_once "controller/programacion/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

?>