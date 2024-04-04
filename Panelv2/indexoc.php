<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'alumno';
if ($_REQUEST['c']=='01') {
    $controller = 'procesosoc';
} elseif ($_REQUEST['c']=='02') {
    $controller = 'procesosoc';
}

// Todo esta lógica hara el papel de un FrontController
if (isset($_REQUEST['c'])) {
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
    if ($c == '01') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarOrdenCompra';
    } elseif ($c== '02') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'CrearOrdenCompra';
    } 
    // Instanciamos el controlador
    require_once "controller/inventario/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
