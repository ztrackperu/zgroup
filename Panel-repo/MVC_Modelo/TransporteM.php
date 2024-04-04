<?php 
//include('cn/dbconex.php');

function ListaTipoTransporteM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='TEP' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaTipoRutaM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='TRU' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaTipoSeguimientoM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='TSE' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaBancoM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='BCO' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaTipoResultadoM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='TRE' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}


function ListaTipoUsuarioM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm from dettabla where c_codtab='SGT' AND C_ESTADO='1'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

function ListaNotaSalidaM($descrip){
include('cn/dbconex.php');
$sql="select nt_ndoc,nt_ccli from notmae where nt_tdoc='S' AND NT_ESTA='3' AND NT_NDOC LIKE '%$descrip%'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}
function listadetnotsal($nront){
	include('cn/dbconex.php');
	$sql="SELECT *,in_arti from notmov,invmae where  in_codi=nt_cart and nt_ndoc='$nront'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
?>