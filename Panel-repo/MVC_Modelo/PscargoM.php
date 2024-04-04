<?php
function ListarForwarderM(){
include('cn/sqlconexps.php');


$sql="SELECT Fwd_Codi,CONVERT(VARCHAR (12),FWD_FCRE,103) AS Fcre FROM Fordwarder ";	 
$results = $conn->query($sql);
		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}
			
		$stmt = null;
		$conn = null; 
		return $validar;



	}
function listaentregacartas($fwd){
	include('cn/sqlconexps.php');
	$sql="select   'FW' + ltrim(str(FWD_Codi)) as RO, 
         KCLI = case fwd_tmov 
	         when 'E' then fwd_emba 
		 else fwd_csne
               end, 
	 Cliente = case fwd_tmov 
	            when 'E'then (select ent_rsoc from Entidades where fwd_emba = ent_codi)
	            else (select ent_rsoc from Entidades where fwd_csne = ent_codi)
		   end,	
	 '' as BL,
	 ISNULL((SELECT Nav_Desc + ' V.' + V.Vje_Nvia +  V.Vje_Dire from Viaje V INNER JOIN NAVES ON 
	 Vje_Nave = Nav_Codi where fwd_Vje1 = V.Vje_Kvje),'') as Viaje1 , isnull(fed_cant, '0') as Cantidad,
	 isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fed_tdoc and tgc_tipo = '01'), '') as TipoDocu , 
	 ISNULL((select  tgc_desc from TAGralCodigo where tgc_codi = fed_docu and tgc_tipo = '39'), '') as Docu ,
	 isnull(fed_obse, '') as Obse, isnull(fed_item,0) as Item, 
	 Detalle =  case 
			when fed_cant = 1 then  isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fed_tdoc and tgc_tipo = '01'), '') + ' ' +
				     ISNULL((select  tgc_desc from TAGralCodigo where tgc_codi = fed_docu and tgc_tipo = '39'), '') + ' ' +
				     isnull(fed_obse, '') 	
			when fed_cant > 1 then
				     RTRIM(LTRIM(str(fed_cant))) + '  ' + 
				     isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fed_tdoc and tgc_tipo = '01'), '') + ' ' +
				     ISNULL((select  tgc_desc from TAGralCodigo where tgc_codi = fed_docu and tgc_tipo = '39'), '') + ' ' +
				     isnull(fed_obse, '') 	
			else ''
               	        end,  
	Atencion =  case fwd_tmov 
		      when 'E' then (ISNULL(((select LTRIM(RTRIM(Eco_Titu)) + ' ' + LTRIM(RTRIM(eco_Nomb)) + ' ' + LTRIM(RTRIM(eco_Apel))
				     from Entidades inner join EntidadesContactos on Ent_codi = Eco_Ecod WHERE  ent_codi = fwd_emba AND  
				     eco_corr = fwd_ContactoEntrega)), ''))
		      else (ISNULL(((select LTRIM(RTRIM(Eco_Titu)) + ' ' + LTRIM(RTRIM(eco_Nomb)) + ' ' + LTRIM(RTRIM(eco_Apel))
				     from Entidades inner join EntidadesContactos on Ent_codi = Eco_Ecod WHERE  ent_codi = fwd_csne AND  
				     eco_corr = fwd_ContactoEntrega)), ''))	
	             end,
 	isnull((select  tgc_desc from TAGralCodigo where tgc_codi = fwd_RefEntrega and tgc_tipo = '03'), '')  as Referencia,
	isnull((select Usu_Nomb + ' ' + Usu_Apel from Usuarios where usu_codi =fed_ucre), '') as Usuario, 
	Fecha = isnull(CONVERT(VARCHAR(10),getdate(), 103), ''),
	FWD_Tmov AS TipoMovimiento,Fwd_NBL1,Fwd_Bkng
from Fordwarder left join FWDEntregaDocumentos C on fwd_codi = C.fed_ro
 WHERE   fwd_codi = $fwd";	
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
}	
function listanombrecartaentM($descripcion)	{
include('cn/sqlconexps.php');
$sql="select Ltrim (Eco_Titu + ' ' + Eco_Nomb + ' '+ Eco_Apel)as nombre from EntidadesContactos
where  Ltrim (Eco_Titu + ' ' + Eco_Nomb + ' '+ Eco_Apel) like '%$descripcion%'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
}	
function ListaCliAutoM($descripcion){
include('cn/sqlconexps.php');
$sql="select Ent_Codi,Ent_Rsoc,Ent_Ruc,Ent_Dire from Entidades where Ent_Rsoc like '%$descripcion%'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
}	
	
	
function UpdateEntidadesM($cod,$razon,$dire,$Ent_Umod,$Ent_Fmod){
include('cn/sqlconexps.php');
	$sql="update Entidades set Ent_Dire='$dire',Ent_Rsoc='$razon',Ent_Nomc='$razon',Ent_Umod='$Ent_Umod',Ent_Fmod='$Ent_Fmod' where Ent_Codi='$cod'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;	
	}

function AnularFacM($nro,$user,$fec){
include('cn/sqlconexps.php');
$sql="UPDATE CXCDocumentos set Cxc_Esta='A',Cxc_Umod='$user',Cxc_Fmod='$fec' WHERE Cxc_Ndoc='$nro'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;	
}	//u4rtraL
function BuscarFactM($nro){
include('cn/sqlconexps.php');
$sql="SELECT * FROM CXCDocumentos WHERE Cxc_Ndoc='$nro' and Cxc_Esta='P'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar; }	

function fwd_Reporte_pago_prov($prov,$fini,$ffin,$sw){
	include('cn/sqlconexps.php');
	if($sw=='1'){
	$sql="SELECT DISTINCT FWS_KFWD,Ent_Rsoc,convert(varchar(10),FWS_Fcre,103)as FWS_Fcre,FWS_KConcepto,Tgc_Desc,FWS_TipoCheque,FWS_TipoSolicitud,FWS_Observacion,FWS_KCOD,
FWT_Cantidad,FWT_KMON,FWT_TNET,FWT_TVTA,FWT_TvtaAgente
FROM FWDSolicitud  AS F,FWDTarifas AS T ,TaGralCodigo AS C ,Entidades as e
where  FWS_Fcre BETWEEN '$fini' AND '$ffin'
AND FWT_KFWD=FWS_KFWD AND FWS_KConcepto=FWT_KCON AND Tgc_Codi=FWS_KConcepto AND Tgc_Codi=FWT_KCON AND Tgc_Tipo =26
and FWS_Proveedor=Ent_Codi order by Ent_Rsoc asc";	
	}else{
$sql="
SELECT DISTINCT FWS_KFWD,Ent_Rsoc,convert(varchar(10),FWS_Fcre,103)as FWS_Fcre,FWS_KConcepto,Tgc_Desc,FWS_TipoCheque,FWS_TipoSolicitud,FWS_Observacion,FWS_KCOD,
FWT_Cantidad,FWT_KMON,FWT_TNET,FWT_TVTA,FWT_TvtaAgente
FROM FWDSolicitud  AS F,FWDTarifas AS T ,TaGralCodigo AS C ,Entidades as e
where FWS_Proveedor='$prov' AND FWS_Fcre BETWEEN '$fini' AND '$ffin'
AND FWT_KFWD=FWS_KFWD AND FWS_KConcepto=FWT_KCON AND Tgc_Codi=FWS_KConcepto AND Tgc_Codi=FWT_KCON AND Tgc_Tipo =26
and FWS_Proveedor=Ent_Codi order by Ent_Rsoc asc
";


	}
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
	}
	

/* function listafacturafwM($nro){
include('cn/sqlconexps.php');
$sql="select Cxc_swcot,Ent_Ruc,Cxc_Kdoc,Cxc_Ndoc,convert(varchar(10),Cxc_Femi,103)as Cxc_Femi,Cxc_Mone, Cxc_Adqu,Ent_Rsoc,Cxc_Tota,Cxc_Igv,Cxc_Tnet,Cxc_Glos,Cxc_Obse,Cxc_Femi,Cxc_Tica,Cxc_Pigv,Cxc_Tdsc
from CXCDocumentos as c ,Entidades as e
where Cxc_Adqu=Ent_Codi and  Cxc_KAna='$nro' and Cxc_Esta<>'A'  order by Cxc_Ndoc asc";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar; }	
	
			
function listadetallefacM($nro){
include('cn/sqlconexps.php');
$sql="select Ccd_Desc,Ccd_Cant,Ccd_Mone,Ccd_Vuni,Ccd_Tota,Ccd_Kcon,Ccd_Item from CXCDocumentosDetalle 
where Ccd_Kdoc='$nro'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;} */
		
		
function OntenerCotiM($Nro){
	include('cn/dbconex_ps.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="select c_numped from pedicab where c_numped='$Nro'";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
		
function listafacturafwM($nro){
include('cn/db_conexionSICPAC.php');
$sql="SELECT
guia_remis,
'' AS Cxc_swcot,
ruc AS Ent_Ruc,
reg.N_DOC AS Cxc_Kdoc,
reg.N_DOC AS Cxc_Ndoc,
FCH_INGRE AS Cxc_Femi,
MONEDA AS Cxc_Mone,
'' AS Cxc_Adqu,
NOM_CNN AS Ent_Rsoc,
CASE WHEN MONEDA='USD' THEN sub_totald   ELSE sub_total  END AS Cxc_Tota,
CASE WHEN MONEDA='USD' THEN igv_dol   ELSE igv  END AS Cxc_Igv,
CASE WHEN MONEDA='USD' THEN total_dol  ELSE total  END AS  Cxc_Tnet ,
'' AS Cxc_Glos,
'' AS Cxc_Obse,
FCH_INGRE AS Cxc_Femi,
T_CAMBIO AS Cxc_Tica,
'0.18' AS Cxc_Pigv,
'0.00' AS Cxc_Tdsc
FROM
reg
INNER JOIN ta010 ON ta010.CODIGO = reg.TIPO_DOC 
where N_ORDEN='$nro' AND ANULADO='0' and TIPO_DOC='01'
ORDER BY N_DOC DESC";

	
			$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
		
		
}	
	
			
function listadetallefacM($nro){
include('cn/db_conexionSICPAC.php');
$sql="SELECT
det.N_DOC,
CONCEPTO AS Ccd_Desc,CANTIDAD AS Ccd_Cant,reg.MONEDA AS Ccd_Mone,
CASE WHEN MONEDA='USD' THEN det.sub_totald   ELSE det.sub_total  END AS Ccd_Vuni,
CASE WHEN MONEDA='USD' THEN det.sub_totald   ELSE det.sub_total  END AS Ccd_Tota,
'' AS Ccd_Kcon,
ITEM AS Ccd_Item
FROM
det
INNER JOIN reg ON reg.N_DOC = det.N_DOC 
where reg.N_DOC='$nro'
ORDER BY det.N_DOC DESC";
	
			$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
		
		
		}	


function UpdateDocCotSISPACM($Nro)
{
	require('cn/db_conexionSICPAC.php');
	$sql="update reg set guia_remis='1' where N_DOC='$Nro'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;
}



		
	function NropedidoM(){
	include('cn/dbconex_ps.php');
//	$sql="select max(c_numped) as cod from pedicab";
$sql="select max(Left ( c_numped,11 )) as cod from pedicab";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
}
function Nropedido2M(){
	include('cn/dbconex_ps.php');
	$sql="select max(n_idreg) as cod from pedicab";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}

function NropedidoDetM(){
	include('cn/dbconex_ps.php');
	$sql="select max(n_idreg) as cod from pedidet";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;	
}
if($c_codpga==null)
{$c_codpga = '0';}

if($c_codpga==null)
{$c_numpd = '0';}

if($c_codpga==null || $c_codpgf=='')
{$c_codpgf = '0';}

if($c_uaprob==null || $c_uaprob=='')
{$c_uaprob = "AMONTEZA"; }
//echo "**".$c_uaprob."--"; $_GET['udni'];
function GuardaPedidoCabM($c_numped,$c_codcia,$c_codtda,$c_numpd,
$c_nomcli,$c_asunto,$d_fecped,$d_fecvig,$n_bruto,$n_dscto,
$n_neta,$n_facisc,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_estado,
$n_swtfac,$n_idreg,$d_fecrea,$d_fecreg,$c_desgral,$c_opcrea,$c_oper,$c_codcli,$c_contac,$c_telef,$c_email,$n_swtapr,$d_fecapr,$c_uaprob,$c_codven,$c_tipped,$c_precios,$c_tiempo,$c_validez,$c_tipocoti,
$c_meses,$c_codpga,$c_codpgf,$b_IncIgv,$fw){
	include('cn/dbconex_ps.php');
$sqlpedcab="insert into pedicab(c_numped,c_codcia,c_codtda,c_numpd,
c_nomcli,c_asunto,d_fecped,d_fecvig,n_bruto,n_dscto,
n_neta,n_facisc,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_estado,
n_swtfac,n_idreg,d_fecrea,d_fecreg,c_desgral,c_opcrea,c_oper,c_codcli,c_contac,c_telef,c_email,n_swtapr,d_fecapr,c_uaprob,c_codven,c_tipped,c_precios,c_tiempo,c_validez,c_tipocoti,
c_meses,c_codpga,c_codpgf,b_IncIgv,fw)
values('$c_numped','$c_codcia','$c_codtda','$c_numpd',
'$c_nomcli','$c_asunto','$d_fecped','$d_fecvig',$n_bruto,$n_dscto,
$n_neta,$n_facisc,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,'$c_codmon','$c_estado',
$n_swtfac,$n_idreg,'$d_fecrea','$d_fecreg','$c_desgral','$c_opcrea','$c_oper','$c_codcli','$c_contac','$c_telef','$c_email',$n_swtapr,'$d_fecapr','$c_uaprob','$c_codven','$c_tipped','$c_precios','$c_tiempo','$c_validez','$c_tipocoti',
'$c_meses','$c_codpga','$c_codpgf','$b_IncIgv',$fw)";	
$resultado = odbc_exec($cid, $sqlpedcab)or die(odbc_errormsg().$sqlpedcab);
echo "<script>
alert('SE PROCESARON LAS FACTURAS');
</script>";
	return $resultado;
	}
	
	function GuardaPedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,
$c_codprd,$c_desprd,$n_canprd,$n_preprd,
$n_prelis,$n_prevta,$n_precrd,$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,
$c_oper,$n_apbpre,$c_usuapb,$c_fecapb,$n_idreg2,$c_codund,$c_descr2,$c_codlp,$c_tiprec,$c_codcla,$c_tipped2){
	include('cn/dbconex_ps.php');
$sqlpeddet="insert into pedidet(c_numped,c_codcia,c_codtda,n_item,
c_codprd,c_desprd,n_canprd,n_preprd,
n_prelis,n_prevta,n_precrd,n_totimp,c_codafe,c_obsdoc,d_fecreg,
c_oper,n_apbpre,c_usuapb,c_fecapb,n_idreg,c_codund,c_descr2,c_codlp,c_tiprec,c_codcla,c_tipped)
values('$c_numped','$c_codcia','$c_codtda',$n_item,
'$c_codprd','$c_desprd',$n_canprd,$n_preprd,
$n_prelis,$n_prevta,$n_precrd,$n_totimp,'$c_codafe','$c_obsdoc','$d_fecreg',
'$c_oper',$n_apbpre,'$c_usuapb','$c_fecapb',$n_idreg2,'$c_codund','$c_descr2','$c_codlp','$c_tiprec','$c_codcla','$c_tipped2')";	
	
$resultado = odbc_exec($cid, $sqlpeddet)or die(exit("Error en odbc_exec()<br>$sqlpeddet"));
	return $resultado;
	}
	
	
	
	function datosClienteM($ruc){
		include('cn/dbconex_ps.php');
		$sql="select * from climae where CC_NRUC='$ruc'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;	
	}
	
	function detallecotizacionM($fac){
		include('cn/dbconex_ps.php');
		$sql="select * from pedicab c,pedidet d where c.c_numped=d.c_numped and c.c_numped='$fac'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;	
	}
	
	function eliminarcabeCotiM($fac){
		include('cn/dbconex_ps.php');
		$sql="delete from pedicab c where c_estado='0' and c_numped='$fac'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
		return $resultado;	
	}
	function eliminardetaCotiM($fac){
		include('cn/dbconex_ps.php');
		$sql="delete from pedidet c where c_numped='$fac'";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
		return $resultado;	
	}
	
	function listarpedicabM($fw){ //listar cuando c_estado no sea igual 0
		include('cn/dbconex_ps.php');
		$sql="select c_numped,fw from pedicab where c_estado<>'0' and fw=$fw";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;	
	}
	
	function listarfacturaM($fw){ //listar cuando c_estado no sea igual 0
		include('cn/dbconex_ps.php');
		$sql="select * from pedicab where c_estado='2' and c_numped='$fw'";
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		return $ven;	
	}
	
	function UpdateDocCotMAnt($fac){ //usado cuando eliminas un registro en pedicab
		include('cn/sqlconexps.php');
		$sql="update CXCDocumentos set Cxc_swcot='1' where Cxc_Ndoc='$fac'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;	
	}
	
	function UpdateDocM($fac){ //usado cuando registras un registro en pedicab
		include('cn/sqlconexps.php');
		$sql="update CXCDocumentos set Cxc_swcot='' where Cxc_Ndoc='$fac'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;	
	}
function listarCondicionPagoM($id){ //listar el ultimo registro clilcred de 1 cliente
include('cn/dbconex_ps.php');
$sql="SELECT TOP 1 cc_pago FROM clilcred where cc_ruc='$id' order by cc_freg desc";
  $resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
  while ($fila=odbc_fetch_array($resultado))
  {
  $ven[] = $fila;
    }
     return $ven;      
    }
	
	
	function ListarForwarderDetM(){
		include('cn/sqlconexps.php');

		
		$sql="exec FWD_Listar_ForwarderDet ";	 
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
		
			
	}
	
	function ListarForwarderDet2M(){
		include('cn/sqlconexps.php');

		
	$sql="exec FWD_Listar_ForwarderDet ";	 
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
		
		
		
	}  
function ListarComprobantesM($fecha,$c_codasi,$vou,$anno,$mes){
	include('cn/dbconex_ps.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="SELECT * FROM VOUMAE where c_codasi='$c_codasi' and c_anovou='$anno' and c_mesvou='$mes'  ORDER BY c_numvou DESC";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	
	}
	function UpdateComprobanteM($c_numvou,$c_numeOP,$c_anovou,$c_mesvou){
include('cn/dbconex_ps.php');
$sql="update voumae set c_tipOP='C',c_swtOP='S',c_numeOP='$c_numeOP' where c_numvou='$c_numvou'
and c_anovou='$c_anovou' and c_mesvou='$c_mesvou' ";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
//		
function ObtenercabocfwM($fw){
	include('cn/dbconex_ps.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="select c_numeoc from cabeoc where c_numeoc='$fw'";	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}
	function InsertfwincabeocM($fw,$fecoc,$fec){
include('cn/dbconex_ps.php');
$sql="insert into cabeoc (c_numeoc,d_fecoc,c_estado,d_date,n_swaprb,c_codcia,c_codtda)values('$fw','$fecoc','1','$fec',2,'01','000')";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
		}
////profit 07/01/2016

function XXXListarprofitM($fw){
include('cn/sqlconexps.php');
//	$sql="";FWD_Listar_IngresosGastos_v2
/**/


	
	
	
	$sql="exec FWD_Listar_IngresosGastos_v2 ".$fw;	 
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
	
		
	}
	function ListarIngProfM($fw){
include('cn/sqlconexps.php');
$sql="select Ccd_Desc,Ccd_Mone,Ccd_Vuni,Ccd_Tota, Cxc_Tdoc, Cxc_Ndoc,CONVERT ( CHAR(12), Cxc_Femi ,103 )as fechadoc,Cxc_Tota,Cxc_Tnet,Cxc_Tica,Cxc_Mone,Cxc_Esta,Cxc_Pigv
 from CXCDocumentos as c,CXCDocumentosDetalle as d where Ccd_Kdoc=Cxc_Kdoc and cxc_esta='P' and Cxc_KAna =$fw";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar;
		 }	
function ListarGasProdM($fw){ //tabla voumae
		include('cn/dbconex_ps.php');//Left ( d_fecreg,10 )='$fecha'
	$sql="select distinct d_fecdoc,n_tipcmb,c_codmon,c.n_debnac,c.n_debext,c.c_glosa from voumae as c,voumov as d where c.c_numvou=d.c_numvou and c.c_anovou=d.c_anovou and c.c_mesvou=d.c_mesvou and c_numeOP='$fw' and c.c_estado<>'4'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}		
	
	/*reporte florent 
	select distinct d.c_codasi,n_tipcmb,c_codmon,c_coddoc,c_serdoc,c_numdoc,d_fecdoc,Left(c.d_fecreg,10) as fecreg,c_codana,c.n_debnac,c.n_debext,c.c_glosa ,d.c_numvou,c_numeOP as fw from voumae as c,voumov as d where c.c_numvou=d.c_numvou and c.c_anovou=d.c_anovou and c.c_mesvou=d.c_mesvou 
 and c.c_estado<>'4' and Left(c.d_fecreg,10)=#01/21/2016#
	
	*/	
function ListargastotesoriaM($mes,$anno){ //tabla voumae
		include('cn/dbconex_ps.php');//Left ( d_fecreg,10 )='$fecha'
//if($sw=='1'){
	$sql="select distinct d.c_codasi,n_facigv,n_tipcmb,c_codmon,c_coddoc,td_desc,c_serdoc,c_numdoc,d_fecdoc, d.c_mesvou, (int([c.d_fecreg])) as fecreg,pr_razo,c_codana,c.n_debnac,c.n_debext,c.c_glosa ,d.c_numvou,c_numeOP as fw from voumae as c,voumov as d,tab_docu,promae where c.c_numvou=d.c_numvou and c.c_anovou=d.c_anovou and c.c_mesvou=d.c_mesvou 
 and c.c_estado<>'4' and td_codi=c_coddoc and pr_ruc=c_codana and d.c_anovou='$anno'  and  d.c_mesvou='$mes'";
//}else{
	//and d_fecped Between #$f1# and #$f2# 
 /*$sql="select distinct d.c_codasi,n_facigv,n_tipcmb,c_codmon,c_coddoc,td_desc,c_serdoc,c_numdoc,d_fecdoc,Left(c.d_fecreg,10) as fecreg,pr_razo,c_codana,c.n_debnac,c.n_debext,c.c_glosa ,d.c_numvou,c_numeOP as fw from voumae as c,voumov as d,tab_docu,promae where c.c_numvou=d.c_numvou and c.c_anovou=d.c_anovou and c.c_mesvou=d.c_mesvou 
 and c.c_estado<>'4' and td_codi=c_coddoc and pr_ruc=c_codana  and  (int([c.d_fecreg]))=#$fecha#";*/
//}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}	


function ListaringresostesoriaM($sw,$fecha,$fechafin){ //tabla voumae
		include('cn/dbconex_ps.php');//Left ( d_fecreg,10 )='$fecha'
if($sw=='1'){
	$sql="SELECT PE_REFE,PE_ESTA,PE_TDOC,PE_NDOC,PE_FDOC,(int([PE_FDOC])) as fechadoc,PE_VLE1,PE_CLIE,PE_NRUC,PE_MONE,PE_TCAM,PE_IGVL,PE_TBRU,PE_TOTD,PE_TIGV,PE_TCAM
FROM PEFMAE WHERE   (int([PE_FDOC]))  between #$fecha# and #$fechafin# order by PE_NDOC desc" ;
}else{
	
	
 $sql="SELECT PE_REFE,PE_ESTA,PE_TDOC,PE_NDOC,PE_FDOC,(int([PE_FDOC])) as fechadoc,PE_VLE1,PE_CLIE,PE_NRUC,PE_MONE,PE_TCAM,PE_IGVL,PE_TBRU,PE_TOTD,PE_TIGV,PE_TCAM
FROM PEFMAE WHERE    (int([PE_FDOC]))=#$fecha# order by PE_NDOC desc";

}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	}	
		
	
	
function ListarFacturaFWM($fac){
include('cn/sqlconexps.php');
$sql="SELECT *
  FROM CXCDocumentos WHERE Cxc_Esta='P' and SUBSTRING(Cxc_Ndoc,5,7)='$fac'";
		$results = $conn->query($sql);		
		while ($row = $results->fetch(PDO::FETCH_UNIQUE)){
			  $validar[] = $row;
		}			
		$stmt = null;
		$conn = null; 
		return $validar; }	
	
?>