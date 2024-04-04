<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'alumno';
if($_REQUEST['c']=='prov01'){
	$controller = 'proveedor';
}else if($_REQUEST['c']=='prov02'){
	$controller = 'proveedor';
}else if($_REQUEST['c']=='cli01'){ //eir entrada
	$controller = 'clientes';
}else if($_REQUEST['c']=='cli02'){
	$controller = 'clientes';
}else if($_REQUEST['c']=='cli03'){
	$controller = 'clientes';
}else if($_REQUEST['c']=='tec01'){
	$controller = 'tecnicos';
}else if($_REQUEST['c']=='tec02'){
	$controller = 'tecnicos';
}else if($_REQUEST['c']=='fac01'){
	$controller = 'facturas';
}else if($_REQUEST['c']=='fac02'){
	$controller = 'facturas';
}else if($_REQUEST['c']=='mm01'){
	$controller = 'modmarca';
}else if($_REQUEST['c']=='mm02'){
	$controller = 'modmarca';
}else if($_REQUEST['c']=='mm03'){
	$controller = 'cobranzas';
}

// Todo esta lógica hara el papel de un FrontController
if(isset($_REQUEST['c']))
{  
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == 'prov01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaProveedor';
	}else if($c == 'prov02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegistroProveedor';
	}else if($c == 'cli01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaCliente';
	}else if($c == 'cli02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegistroCliente';
	}else if($c == 'cli03'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ReporteCliente';
	}else if($c == 'tec01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaTecnicos';
	}else if($c == 'tec02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegistroTecnicos';
	}else if($c == 'fac01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarFactura';
	}else if($c == 'fac02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ActualizarFactura';
	}else if($c == 'mm01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarTodos';
	}else if($c == 'mm02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AgregarModMar';
	}else if($c == 'mm02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListarSaldos';
	}
	
	
	
    // Instanciamos el controlador
    require_once "controller/mantenimiento/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}




?>