<?php 

function listaCotiPorDocM($nrodoc){
include('cn/dbconex.php');
$sql="select c.CC_RUC,c.CC_RAZO,c.CC_NRUC,c.CC_TELE,c.CC_DIR1,c.CC_RESP,
c_numped,c_nomcli,c_asunto,n_totped,c_opcrea,d_fecrea,c_cotipadre,c_codmon,n_tcamb
from pedicab p left join climae c on p.c_codcli=c.CC_RUC  
where  c_estado<>'4' and  c_numped='$nrodoc' ";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function listaCotiPorClienteM($IdCliente){
include('cn/dbconex.php');
//$sql="select top 10 * from pedicab where  c_estado<>'4' and c_codcli='$IdCliente' order by d_fecrea desc";
$sql="select top 10 c.CC_RUC,c.CC_RAZO,c.CC_NRUC,c.CC_TELE,c.CC_DIR1,c.CC_RESP,
c_numped,c_nomcli,c_asunto,n_totped,c_opcrea,d_fecrea,c_cotipadre,c_codmon,n_tcamb 
from pedicab p left join climae c on p.c_codcli=c.CC_RUC  
where  c_estado<>'4' and p.c_codcli='$IdCliente' order by d_fecrea desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function listaCotiPorFechasM($IdCliente,$fechainicial,$fechafinal){
include('cn/dbconex.php');
/*$sql="select top 10 * from pedicab where  c_estado<>'4' and c_codcli='$IdCliente' and 
d_fecrea Between #$fechainicial 00:00:00# and #$fechafinal  23:59:00# order by d_fecrea desc";*/
$sql="select c.CC_RUC,c.CC_RAZO,c.CC_NRUC,c.CC_TELE,c.CC_DIR1,c.CC_RESP,
c_numped,c_nomcli,c_asunto,n_totped,c_opcrea,d_fecrea,c_cotipadre,c_codmon,n_tcamb 
from pedicab p left join climae c on p.c_codcli=c.CC_RUC  
where  c_estado<>'4' and p.c_codcli='$IdCliente' and 
p.d_fecrea Between #$fechainicial 00:00:00# and #$fechafinal  23:59:00# order by d_fecrea desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
	function listaCotiDetalleM($c_numped){
include('cn/dbconex.php');
$sql="select d.n_item,d.c_numped,d.c_codprd,d.c_desprd,d.c_codcont,d.n_canprd,d.n_preprd,d.n_dscto,d.n_totimp,d.n_canfac 
from pedicab c,pedidet d 
where c.c_numped=d.c_numped and c_estado<>'4' 
and d.c_numped='$c_numped'";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

?>