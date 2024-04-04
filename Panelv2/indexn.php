<?php
// echo 'holaaa'; 
//ini_set('error_reporting',0);//para xamp
$controller="";
require_once 'model/database.php';
if($_REQUEST['c']=='not01'){
	$controller = 'procesosnotsal';
}else if($_REQUEST['c']=='not02'){
	$controller = 'procesosnoting';
}else if($_REQUEST['c']=='con1'){
        $controller = 'procesosnotsal';
}else if($_REQUEST['c']=='con2'){
        $controller = 'ajusteinventario';
}else if($_REQUEST['c']=='con3'){
        $controller = 'ubicacioninventario';
}
if(isset($_REQUEST['c']))
{	
	//$accion = 'AdminTransporte';
	$c = strtolower($_REQUEST['c']);
	if($c == 'not01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Registrar';
	}else if($c == 'not02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'InicioRegNotaIng';
	}else if($c == 'con1'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ConsultaProductos';
	}else if($c == 'con2'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AjusteInventario';
	}else if($c == 'con3'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'UbicacionInventario';
	}
	else if($c == 'not02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminNotasInsumos';
	}
	// Instanciamos el controlador 
    require_once "controller/notasAlmacen/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
	// Llama la accion
    call_user_func( array( $controller, $accion ) );	   
}


?>