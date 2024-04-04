<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'alumno';
if($_REQUEST['c']=='p01'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p02'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p03'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p04'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p05'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p06'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p07'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p08'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p09'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p10'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p11'){
	$controller = 'presupuestos';
}else if($_REQUEST['c']=='p12'){
	$controller = 'presupuestos';
}


// Todo esta lógica hara el papel de un FrontController
if(isset($_REQUEST['c']))
{  
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
	if($c == 'p01'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaPresupuestos';
	}else if($c == 'p02'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegPresupuesto';
	}else if($c == 'p03'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarCliente';
	}else if($c == 'p04'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarProducto';
	}else if($c == 'p05'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BuscarConcepto';
	}else if($c == 'p06'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AgregarConcepto';
	}else if($c == 'p07'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'GrabarPresupesto';
	}else if($c == 'p08'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaEstimados';
	}else if($c == 'p09'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegEstimado';
	}else if($c == 'p11'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'GestionEstimados';
	}else if($c == 'p12'){
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'MostrarSimboloMoneda';
	}
	
	
	
	
	
	
	
    // Instanciamos el controlador
    require_once "controller/presupuestos/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}




?>