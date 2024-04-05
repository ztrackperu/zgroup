<?php ini_set('memory_limit', '1024M');
$db = 'C:\xampp\htdocs\test\luis\Access\DBZ.mdb';
//$db = 'C:\zgroup\DBZ.mdb';
// Se define la cadena de conexión
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conexón con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876' );
if (!$cid) { exit( "Error al conectar: " . $cid);
}
?>