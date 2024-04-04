<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'alumno';
if($_REQUEST['c']=='adm01'){
	$controller = 'adminequipo';
}else if($_REQUEST['c']=='adm02'){
	$controller = 'adminproducto';
}

// Todo esta lógica hara el papel de un FrontController
if(isset($_REQUEST['c']))
{  
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == 'adm01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'adminequibloque';
	}else if($c== 'adm02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'adminproducto';
	}	
    // Instanciamos el controlador
    require_once "controller/admin/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>