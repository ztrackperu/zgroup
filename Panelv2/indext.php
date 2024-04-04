<?php
ini_set('error_reporting', 0);//para xampp
require_once 'model/database.php';
$controller = 'procesostransporte';

if (!isset($_REQUEST['c'])) {
    $accion = 'AdminTransporte';
    // Instanciamos el controlador
    require_once "controller/Transporte/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
} else {
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
    if ($c == '01') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminTransporte';
        
        /*$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegDetTransporte';		
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCotiAprobadas';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarForwarder';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'GuardarCabTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'GuardarDetTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'EliminarTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminDetTransporte';
		$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'EliminarDetTransporte';*/
    } elseif ($c == '02') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarCotizacionesPsc';
    }elseif ($c == '03') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminServiciosTecnicos';
    }elseif ($c == '04') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AdminChecklist';
    }
            
    // Instanciamos el controlador
    require_once "controller/Transporte/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
