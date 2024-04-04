<?php $db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
// Se define la cadena de conexión
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conexón con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876' );
if (!$cid) { exit( "Error al conectar: " . $cid);
}
?>