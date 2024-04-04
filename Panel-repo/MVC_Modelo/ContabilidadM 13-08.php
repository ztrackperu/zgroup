<?php function reporte1M($f1,$f2,$sw){
include('cn/dbconex.php');
		if($sw=='1'){
			$sql="SELECT  pr_orden,pr_ndoc,pr_rucc,pr_tmov,pr_remi,pr_obse,pr_fven,pr_dtot,pr_razo,pr_ruc from promov , promae
			where pr_rucc=pr_ruc order by pr_fven desc";
			}else{
		$sql="SELECT  pr_orden,pr_ndoc,pr_rucc,pr_tmov,pr_remi,pr_obse,pr_fven,pr_dtot,pr_razo,pr_ruc from promov,promae
			where pr_rucc=pr_ruc and  pr_fven Between #$f1# and #$f2# order by pr_fven desc";
			}
	    $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
function reporte11M(){
	include('cn/dbconex.php');
		
		$sql="Select pr_ndoc,count(*) As CantidadRepetidos
From promov  
Group By  pr_ndoc
Having Count(*) =1 order by pr_ndoc asc";
			
	    $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
	
function reporte2M($anno,$top,$tipo,$mes){
	include('cn/dbconex.php');
	if($tipo=='0'){ // para ventas
	$sql="SELECT TOP $top PE_NDOC,PE_CLIE,PE_NRUC,PE_FDOC,PE_TBRU FROM PEFMAE WHERE YEAR( PE_FDOC)=$anno AND MONTH  (PE_FDOC)='$mes' AND PE_ESTA<>'4' ORDER BY PE_TBRU DESC";
	}else{ // para compras
$sql="SELECT TOP $top OC_NDOC AS PE_NDOC,OC_PROV AS PE_CLIE,OC_NRUC AS PE_NRUC, OC_TBRUA AS PE_TBRU,OC_FDOC AS PE_FDOC FROM ORCMAE WHERE YEAR( OC_FDOC)=$anno AND MONTH  (OC_FDOC)='$mes'  AND OC_ESTA<>'4' ORDER BY OC_TBRUA DESC";
	}
	 $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
	
function reporte3facxcliM($cli,$sw){
include('cn/dbconex.php');
		if($sw=='1'){
			$sql="SELECT DISTINCT pefmae.PE_NDOC, pefmae.PE_CLIE, pefmae.PE_FDOC, pefmae.PE_NRUC, pedicab.c_numped, pedicab.c_asunto, pefmov.PE_ITEM, pefmov.PE_CART, pefmov.PE_DESC, pefmov_glosa.c_glosa, pefmov.PE_CANT, pefmov.PE_PREC, pefmae.PE_ESTA
FROM pefmov_glosa INNER JOIN ((pedicab INNER JOIN pefmae ON pedicab.c_numped = pefmae.PE_NCOTI) INNER JOIN pefmov ON pefmae.PE_NDOC = pefmov.PE_NDOC) ON (pefmov_glosa.c_nrodoc = pefmov.PE_NDOC) AND (pefmov_glosa.n_item = pefmov.PE_ITEM)
WHERE ((pefmae.PE_ESTA)<>'4'));";
			}else{
		$sql="SELECT DISTINCT pefmae.PE_NDOC, pefmae.PE_CLIE, pefmae.PE_FDOC, pefmae.PE_NRUC, pedicab.c_numped, pedicab.c_asunto, pefmov.PE_ITEM, pefmov.PE_CART, pefmov.PE_DESC, pefmov_glosa.c_glosa, pefmov.PE_CANT, pefmov.PE_PREC, pefmae.PE_ESTA
FROM pefmov_glosa INNER JOIN ((pedicab INNER JOIN pefmae ON pedicab.c_numped = pefmae.PE_NCOTI) INNER JOIN pefmov ON pefmae.PE_NDOC = pefmov.PE_NDOC) ON (pefmov_glosa.c_nrodoc = pefmov.PE_NDOC) AND (pefmov_glosa.n_item = pefmov.PE_ITEM)
WHERE (((pefmae.PE_CCLI)='$cli') AND ((pefmae.PE_ESTA)<>'4'));";
			}
	    $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}	
	
function EliminaTemporalr2M(){
include('cn/dbconex.php');
$sql="delete from tmp_conta_rep2";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
function GuardaTemporalr2M($c_dcto,$c_razon,$c_fecdoc,$c_ruc,$c_importe,$c_anno,$c_mes){
include('cn/dbconex.php');
$sql="insert into tmp_conta_rep2 (c_dcto,c_razon,c_fecdoc,c_ruc,c_importe,c_anno,c_mes)values('$c_dcto','$c_razon','$c_fecdoc','$c_ruc',$c_importe,'$c_anno','$c_mes')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
function ListaTemporalM($anno){
	include('cn/dbconex.php');
		
		$sql="select * from tmp_conta_rep2 where c_anno='$anno'";
			
	    $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}

function ListarComprobantesM($fecha,$c_codasi,$vou,$anno,$mes){
	include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="SELECT * FROM VOUMAE where c_codasi='$c_codasi' and c_anovou='$anno' and c_mesvou='$mes' and c_numeOP=''   ORDER BY c_numvou DESC";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	
	}
function UpdateComprobanteM($c_numvou,$c_numeOP,$c_anovou,$c_mesvou){
include('cn/dbconex.php');
$sql="update voumae set c_tipOP='C',c_swtOP='S',c_numeOP='$c_numeOP' where c_numvou='$c_numvou'
and c_anovou='$c_anovou' and c_mesvou='$c_mesvou' ";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
		
function listaingresosM($nrocoti){ //tabla pefmae
		include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="SELECT * from pefmae  where pe_ncoti='$nrocoti' and pe_esta<>'4'";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}	
function listagastosM($nrocoti)	{ //tabla voumae
		include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
		$sql="SELECT * from voumae where c_numeOP='$fw' and c_estado<>'4'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
//01042015
//AQUI ACTUALIZAR TIPO CAMBIO FACTURA 
function BuscarFacM($nro)	{ //tabla voumae
	include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="select * from pefmae where PE_NDOC='$nro' and PE_ESTA<>'4'";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function updatetc1M($tc,$nro){
	include('cn/dbconex.php');
	$sql="update pefmae set PE_TCAM=$tc  where PE_NDOC='$nro' and PE_ESTA<>'4'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function updatetc2M($tc,$nro){
	include('cn/dbconex.php');
	$sql="update t_pefmae set PE_TCAM=$tc  where PE_NDOC='$nro' and PE_ESTA<>'4'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function updatetc3M($tc,$nro){
	include('cn/dbconex.php');
	$sql="update climov set CC_TCAM=$tc  where CC_NDOC='$nro'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function guardamodtcM($usuario,$fechamod,$documento,$tipocambio){
	include('cn/dbconex.php');
	$sql="insert into cambiostc (usuario,fechamod,documento,tipocambio)
values ('$usuario','$fechamod','$documento','$tipocambio')";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
///06042014

function GuardaLetraM($c_codcia,$c_codtda,$c_nume,$c_numlet,$c_numfac,$c_numcont,$c_numcoti,$c_lugarg,$d_fecemi,
$d_fecven,$c_codmon,$n_implet,$c_codcli,$c_nomcli,$c_docli,$c_dircli,$c_oper,$d_fcrea,$c_imppal,$c_telcli,$c_nomava,$c_docava,$c_telava,$c_dirava){
	include('cn/dbconex.php');
	if($d_fecven==""){
	$sql="insert into letras (c_codcia,c_codtda,c_nume,c_numlet,c_numfac,c_numcont,c_numcoti,c_lugarg,d_fecemi,
d_fecven,c_codmon,n_implet,c_codcli,c_nomcli,c_doccli,c_dircli,c_oper,d_fcrea,c_imppal,c_telcli,c_nomava,c_docava,c_telava,c_dirava)
values('$c_codcia','$c_codtda',$c_nume,'$c_numlet','$c_numfac','$c_numcont','$c_numcoti','$c_lugarg',
'$d_fecemi',
NULL,'$c_codmon',$n_implet,'$c_codcli','$c_nomcli','$c_docli','$c_dircli','$c_oper','$d_fcrea','$c_imppal','$c_telcli','$c_nomava','$c_docava','$c_telava','$c_dirava' )";
	}else{
	$sql="insert into letras (c_codcia,c_codtda,c_nume,c_numlet,c_numfac,c_numcont,c_numcoti,c_lugarg,d_fecemi,
d_fecven,c_codmon,n_implet,c_codcli,c_nomcli,c_doccli,c_dircli,c_oper,d_fcrea,c_imppal,c_telcli,c_nomava,c_docava,c_telava,c_dirava)
values('$c_codcia','$c_codtda',$c_nume,'$c_numlet','$c_numfac','$c_numcont','$c_numcoti','$c_lugarg',
'$d_fecemi',
'$d_fecven','$c_codmon',$n_implet,'$c_codcli','$c_nomcli','$c_docli','$c_dircli','$c_oper','$d_fcrea','$c_imppal','$c_telcli','$c_nomava','$c_docava','$c_telava','$c_dirava' )";
	}
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
function buscaLetraM($num){
	include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="select * from letras where c_nume=$num";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function buscaLetraIM($num){
	include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="select * from letras where c_numlet='$num'";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function listaletrasM($des){
	include('cn/dbconex.php');//Left ( d_fecreg,10 )='$fecha'
	if($des==""){
		$sql="select * from letras order by c_nume desc"; // where c_estado <>'4' ANULADO
	}else{
		$sql="select * from letras where c_nomcli like '%$des%' order by c_nume desc"; 
	}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
function eliminaletraM($numlet){
		include('cn/dbconex.php');
	$sql="delete from letras where c_numlet=$numlet";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}

/*function UpdateLetraM($c_codcia,$c_codtda,$c_nume,$c_numlet,$c_numfac,$c_numcont,$c_numcoti,$c_lugarg,$d_fecemi,
$d_fecven,$c_codmon,$n_implet,$c_codcli,$c_nomcli,$c_docli,$c_dircli,$c_opermod,$d_fmod,$c_imppal){
	include('cn/dbconex.php');
	$sql="update letras set c_codcia='$c_codcia',c_codtda='$c_codtda',c_nume='$c_nume',c_numlet='$c_numlet',c_numfac='$c_numfac',c_numcont='$c_numcont',c_numcoti='$c_numcoti',c_lugarg='$c_lugarg',d_fecemi='$d_fecemi',
d_fecven='$d_fecven',c_codmon='$c_codmon',n_implet=$n_implet,c_codcli='$c_codcli',c_nomcli='$c_nomcli',c_doccli='$c_docli',c_dircli='$c_dircli',c_opermod='$c_opermod',d_fmod='$d_fmod',c_imppal='$c_imppal' where c_numlet='$c_numlet'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}*/
	
//////////AGREGADO
	
	//genera el codigo siguiente de la BD para guardar letras.	
function GenCorreLetrasM(){	
include('cn/dbconex.php');
$sql="SELECT max(c_nume) as cod from letras";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	

	}
	
	function GuardaUpdLetraM($c_nume,$c_numfac,$c_numcont,$c_numcoti,$c_lugarg,$d_fecemi,
$d_fecven,$c_codmon,$n_implet,$c_codcli,$c_nomcli,$c_docli,$c_dircli,$c_imppal,$c_opermod,$d_fmod,$c_telcli,$c_nomava,$c_docava,$c_telava,$c_dirava){
	include('cn/dbconex.php');
	if($d_fecven==""){
		$sql="update letras set c_numfac='$c_numfac',c_numcont='$c_numcont',c_numcoti='$c_numcoti',c_lugarg='$c_lugarg',d_fecemi='$d_fecemi',
		d_fecven=NULL,c_codmon='$c_codmon',n_implet=$n_implet,c_codcli='$c_codcli',c_nomcli='$c_nomcli',c_doccli='$c_docli',c_dircli='$c_dircli',c_imppal='$c_imppal',
		c_opermod='$c_opermod',d_fmod='$d_fmod',c_telcli='$c_telcli',c_nomava='$c_nomava',c_docava='$c_docava',c_telava='$c_telava',c_dirava='$c_dirava'  where c_nume=$c_nume";
	}else{
		$sql="update letras set c_numfac='$c_numfac',c_numcont='$c_numcont',c_numcoti='$c_numcoti',c_lugarg='$c_lugarg',d_fecemi='$d_fecemi',
		d_fecven='$d_fecven',c_codmon='$c_codmon',n_implet=$n_implet,c_codcli='$c_codcli',c_nomcli='$c_nomcli',c_doccli='$c_docli',c_dircli='$c_dircli',c_imppal='$c_imppal',
		c_opermod='$c_opermod',d_fmod='$d_fmod',c_telcli='$c_telcli',c_nomava='$c_nomava',c_docava='$c_docava',c_telava='$c_telava',c_dirava='$c_dirava'  where c_nume=$c_nume";
	}	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
	function eliminarletM($c_nume,$c_operelim){
	include('cn/dbconex.php');
	$sql="update letras set c_estado='4',c_operelim='$c_operelim'
	where c_nume=$c_nume";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
	function apruebaletM($c_nume,$c_operapr,$d_fapr){
	include('cn/dbconex.php');
	$sql="update letras set c_estado='3', n_swtapr='1',c_operapr='$c_operapr',d_fapr='$d_fapr'
	where c_nume=$c_nume";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
	function liberaletM($c_nume,$c_operapr,$d_fapr){
	include('cn/dbconex.php');
	$sql="update letras set c_estado='0', n_swtapr='0',c_operapr='$c_operapr',d_fapr='$d_fapr'
	where c_nume=$c_nume";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}
	
?>