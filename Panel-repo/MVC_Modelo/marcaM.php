<?php 
function cListaMarcaMaqM(){
	include('cn/dbconex.php');
	$sql="SELECT Dettabla.c_numitm, Dettabla.c_desitm, Dettabla.C_ESTADO
FROM Dettabla
WHERE Dettabla.C_CODTAB='MCM'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
	}

?>