<?php
//ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';
//$controller = 'alumno';
if ($_REQUEST['c']=='inv01') {
    $controller = 'procesosinv';
} elseif ($_REQUEST['c']=='inv02') {
    $controller = 'procesosasig';
} elseif ($_REQUEST['c']=='inv03') { //eir entrada
    $controller = 'procesoseir';
} elseif ($_REQUEST['c']=='inv00') {
    $controller = 'procesosregequi';
} elseif ($_REQUEST['c']=='inv04') {
    $controller = 'procesosguia';
} elseif ($_REQUEST['c']=='inv05') { //eir salida
    $controller = 'procesoseir';
} elseif ($_REQUEST['c']=='inv06') { //eir
    $controller = 'procesoseir';
} elseif ($_REQUEST['c']=='
') { //reporte guias
    $controller = 'procesosguia';
} elseif ($_REQUEST['c']=='inv08') { //reporte guias
    $controller = 'procesosguia';
}else if($_REQUEST['c']=='inv07'){ //reporte guias
	$controller = 'procesosguia';	
} elseif ($_REQUEST['c']=='inv09') { //reporte guias
    $controller = 'procesosguia';
} elseif ($_REQUEST['c']=='inv10') { //reporte guias
    $controller = 'procesosguia';	
} elseif ($_REQUEST['c']=='liq01') { //reporte guias
    $controller = 'procesosliqui';
} elseif ($_REQUEST['c']=='dev01') { //reporte guias
    $controller = 'procesodevoluciones';
} elseif ($_REQUEST['c']=='rep01') { //reporte PRODUCTOS DETALLADOS
    $controller = 'reporteinventario';
} elseif ($_REQUEST['c']=='rep02') { //reporte PRODUCTOS DETALLADOS
    $controller = 'reporteinventario';
}elseif ($_REQUEST['c']=='rep04') { //reporte PRODUCTOS DETALLADOS
    $controller = 'reporteinventariodisponibles';
} elseif ($_REQUEST['c']=='equi01') { //Equipos
    $controller = 'equipos';
} elseif ($_REQUEST['c']=='ot01') { //Equipos
    $controller = 'procesosinv';
} elseif ($_REQUEST['c']=='inv11') { //Equipos
    $controller = 'procesosinv';
} elseif ($_REQUEST['c']=='inv12') { //Equipos
    $controller = 'procesosinv';
} elseif ($_REQUEST['c']=='inv13') { //Equipos
    $controller = 'procesosinv';
}


// Todo esta lógica hara el papel de un FrontController
if (isset($_REQUEST['c'])) {
    // Obtenemos el controlador que queremos cargar
    $c = strtolower($_REQUEST['c']);
    if ($c == 'inv01') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaEquipos';
    } elseif ($c== 'inv02') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaAsig';
    } elseif ($c== 'inv03') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaEirEntrada';
    } elseif ($c== 'inv00') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'BusquedaProducto';
    } elseif ($c== 'inv04') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaGuia';
    } elseif ($c== 'inv05') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaEirSalida';
    } elseif ($c== 'inv06') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListaEir';
    } elseif ($c== 'inv07') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Reporteguia';
    } elseif ($c== 'inv08') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ReporteGuiaGeneral';
    } elseif ($c== 'inv09') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'VerReporteGuiaTransporte';
    } elseif ($c== 'inv10') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegistroGuiaTransporte';	
    }elseif ($c== 'inv11') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RegistrarAlmacenaje';	
    }elseif ($c== 'inv12') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'VerDetalleGuiaxCotizacion';	
    }elseif ($c== 'inv13') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ListadoGeneralGuia';	
    }
	elseif ($c== 'liq01') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Reportes';
    } elseif ($c== 'dev01') {
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Devoluciones';
    } elseif ($c== 'rep01') { //reporte PRODUCTOS DETALLADOS
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ProductosDetallados';
    } elseif ($c== 'rep02') { //reporte PRODUCTOS DETALLADOS
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'AsigPendiente';
    }elseif ($c== 'rep04') { //reporte PRODUCTOS DETALLADOS
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ProductosDetalladosDisponibles';
    }elseif ($c == 'equi01') { //Equipos
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'busquedaequipo';
    }elseif ($c == 'rep03') { //Equipos
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'busquedaequipo';
    }elseif ($c == 'ot01') { //Equipos
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'buscarOt';
    }
    // Instanciamos el controlador
    require_once "controller/inventario/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
