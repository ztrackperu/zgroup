
<?php
try {
	## conexion a sql server...
	$link=mssql_connect("JULIO-PC","sa","123456");
	## seleccionamos la base de datos
	mssql_select_db("Marcaciones",$link);
	## generamos el query
	//$result=mssql_query("select * from checkinout",$link);
	## recorremos todos los registros
	
} catch (Exception $e) {
    echo "Caught Exception ('{$e->getMessage()}')\n{$e}\n";
}
## cerramos la conexion
mssql_close($link);
?>