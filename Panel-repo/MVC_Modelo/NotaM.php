<?php 
function ListaMonedaM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm from dettabla where c_codtab='MON' AND C_ESTADO='1'";
$sql="select tm_codi as c_numitm,tm_desc as c_desitm from tab_mone WHERE tm_esta='1' ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function transacSalidaM(){
include('cn/dbconex.php');

$sql="Select * from tab_tran where TT_CODI='05' or TT_CODI='07' or TT_CODI='08' or
TT_CODI='15' or TT_CODI='17' or TT_CODI='19'";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	
	function docuM(){
include('cn/dbconex.php');

$sql="select *  from  tab_docu  where td_codi='&' or td_codi='A' or td_codi='B' or
td_codi='C' or td_codi='F'  or td_codi='S'  or td_codi='G' ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function BusquedaNotaSalidaM($descripcion){
		include('cn/dbconex.php');
		
		if($descripcion!=""){
			
			$sql="select * from notmae where nt_esta<>'4' and nt_tdoc='S' and nt_tran='$descripcion'";
			
			
	}else{
		
		$sql="select * from notmae where nt_esta<>'4' and nt_tdoc='S'";
		
		
		}
		  
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	
		function cabeceraNotaM($nt_ndoc){
include('cn/dbconex.php');

$sql="select * from notmae c, climae cli where c.nt_ccli=cli.cc_ruc  and c.nt_ndoc='$nt_ndoc'";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function detalleNotaM($nt_ndoc){
include('cn/dbconex.php');

$sql="select * from notmae c,notmov d,invmae i where c.nt_ndoc=d.nt_ndoc and d.nt_cart=i.in_codi and c.nt_ndoc='$nt_ndoc'";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function verserieM($codigo){
include('cn/dbconex.php');

$sql="select c_idequipo,c_nserie from invequipo
where c_codsit='D' and c_codprd='$codigo'";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	
	
	//genera el codigo siguiente de la BD para guardar la orden de salida.	
function GenCorreOrdenSalidaM(){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="SELECT max(nt_ndoc) as cod from notmae";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	

	}
	
	
	function insertarTemporalNotmovM($id_nid,$codigo,$descripcion,$medida,$tipo,$precio,$serie,$cantidad,$udni){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sqlx="insert into copianotmov (id_nid,nt_cart,c_nproducto,nt_cund,c_tipo,n_precio,c_idequipo,n_cant,nt_oper) values ($id_nid,'$codigo','$descripcion','$medida','$tipo',$precio,'$serie',$cantidad,'$udni')";
$resultado = odbc_exec($cid, $sqlx)or die(exit("Error en odbc_exec()<br>"));
	return $resultado;
	
	}
	
		function listaTemporalM(){
include('cn/dbconex.php');

$sql="select * from copianotmov";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	
	
  ?>