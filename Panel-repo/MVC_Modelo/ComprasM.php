<?php 
date_default_timezone_set('America/Bogota'); 
function ListaPlazoocM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm from dettabla where c_codtab='CPG' AND C_ESTADO='1'";
$sql="select  c_numitm, c_desitm from dettabla where c_estado='1'  and c_codtab='CPG' order by c_desitm asc ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

function consultaprecioocM($descripcion){
	include('cn/dbconex.php');
	$sql="SELECT cabeoc.c_numoc,c_codmon, cabeoc.c_nomprv, cabeoc.d_fecoc, detaoc.c_codprd, detaoc.c_desprd, detaoc.n_preprd
FROM detaoc, cabeoc where detaoc.c_numeoc = cabeoc.c_numeoc and c_desprd like '%$descripcion%' and c_estado<>'4'
order by c_numoc desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	
	}
function UpdateReferenciaOCM($c_numoc,$c_tipmon,$c_importe,$c_tipdoc,$c_serdoc,$c_nrodoc,$c_usrudp,$d_fecudp){
	include('cn/dbconex.php');
	$sql="update cabeoc set c_tipmon='$c_tipmon',c_importe='$c_importe', c_tipdoc='$c_tipdoc', c_serdoc='$c_serdoc', c_nrodoc='$c_nrodoc', 
	c_usrudp='$c_usrudp',d_fecudp='$d_fecudp' where c_numeoc='$c_numoc'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}	
	
function UpdateReferenciaOCM2($c_numoc,$c_tipmon,$c_importe,$c_tipdoc,$c_serdoc,$c_nrodoc,$c_usrudp,$d_fecudp){
	include('cn/dbconex.php');
	$sql="update cabeoc set c_tipmon2='$c_tipmon',c_importe2='$c_importe', c_tipdoc2='$c_tipdoc', c_serdoc2='$c_serdoc', c_nrodoc2='$c_nrodoc', 
	c_usrudp2='$c_usrudp',d_fecudp2='$d_fecudp' where c_numeoc='$c_numoc'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	}	

function BusqxOc($c_numeoc){
	include('cn/dbconex.php');
	$sql="select * from cabeoc  where c_numeoc='$c_numeoc'";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
	
function consultaOCsinNIM(){ // consulta de orden de compra sin nota de ingreso
	include('cn/dbconex.php');
	$sql="SELECT DISTINCT C.C_NUMEOC,C_NOMPRV,d_fecoc FROM CABEOC AS C , DETAOC  AS D WHERE C.C_NUMEOC=D.C_NUMEOC
AND N_CANALM=0 AND C_ESTADO<>'4'  ORDER BY C.C_NUMEOC DESC";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	
	}	
	
	
	//LISTAR LUGAR
	
function BusquedaautolugarateM($descripcion){	
include('cn/dbconex.php');
$sql="select * from Dettabla where C_CODTAB='LAT' and C_DESITM like '%$descripcion%'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
}
	
	//LISTAR LUGAR DE ATENCION (retorna lima o callao)		
	
	function BusquedaautolugaratencionM(){
include('cn/dbconex.php');
//$sql="select c_numitm,c_desitm from dettabla where c_codtab='CPG' AND C_ESTADO='1'";
$sql="select * from Dettabla where C_CODTAB='LAT' and C_ABRITM='PREF1' ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
	
//genera el codigo siguiente de la BD para guardar orden de compra.	
function GenCorreOcM(){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="SELECT max(c_numoc) as cod from cabeoc";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	

	}
	
		
	
//LISTAS MAESTRAS
//lista concepto (retorna compra de mercaderia)
function ListaConceptoM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm,c_tipitm from dettabla where c_codtab='TCO' AND C_ESTADO='1' and  c_numitm='001' ORDER BY c_tipitm ASC";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}
//lista tipo de OC
function ListaTipoOCM(){
include('cn/dbconex.php');
$sql="select c_numitm,c_desitm,c_tipitm from dettabla where c_codtab='TOC' AND C_ESTADO='1'  ORDER BY c_tipitm ASC";
//$sql="select *  from tab_tran where TT_CODI='02'";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
}

//busca producto (para retornar el nombre y la medida)
function BusquedaautodescripcionOCM($descripcion){
	
include('cn/dbconex.php');
$sql="select tp_codi,in_codi,IN_ARTI,IN_UVTA,C_TIPITM FROM INVMAE as i ,Dettabla as d where cod_clase=c_numitm and c_codtab='CLP' AND IN_ARTI like '%$descripcion%'";
//$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE WHERE IN_ARTI like '$descripcion%' ";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
	
	}
	
	//BUSCAR OC SEGUN PROVEEDOR, ASUNTO (PRODUCTO O SERVICIO) Y N DE ORDEN
	function BusquedaOSM($descripcion,$sw){
		include('cn/dbconex.php');
		
		if($sw=='1'){
			
			$sql="select top 150 c_numeoc,c_nomprv,d_fecoc,c_codmon,n_totoc, c_obsoc, c_estado,n_swaprb,b_swtfac,c_refcoti,c_tipmon,c_importe,c_tipdoc,c_serdoc,c_nrodoc,c_oper,c_tipmon2,c_importe2,c_tipdoc2,c_serdoc2,c_nrodoc2 from
cabeoc where c_nomprv like '%$descripcion%' and c_estado<>'4' order by c_numeoc desc";
			
			

}elseif($sw='2'){
	$sql="select top 100 c_numeoc,c_nomprv,d_fecoc,c_codmon,n_totoc,  c_obsoc, c_estado,n_swaprb,b_swtfac,c_refcoti,c_tipmon,c_importe,c_tipdoc,c_serdoc,c_nrodoc,c_oper,c_tipmon2,c_importe2,c_tipdoc2,c_serdoc2,c_nrodoc2 from
cabeoc where c_numeoc like '%$descripcion%' and c_estado<>'4' order by c_numeoc desc ";
	}else{
		
		$sql="select top 100 c_numeoc,c_nomprv,d_fecoc,c_codmon,n_totoc, c_obsoc, c_estado,n_swaprb,b_swtfac,c_refcoti,c_tipmon,c_importe,c_tipdoc,c_serdoc,c_nrodoc,c_oper,c_tipmon2,c_importe2,c_tipdoc2,c_serdoc2,c_nrodoc2 from
cabeoc where  c_estado<>'4'   order by c_numeoc desc";
		
		}
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
	
function listaactualizarosM($c_numeoc){
	include('cn/dbconex.php');
	$sql="select cabeoc.c_numeoc as os,* from cabeoc,detaoc where cabeoc.c_numeoc='$c_numeoc' and cabeoc.c_numeoc=detaoc.c_numeoc";
	
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}	
	
	
		
	
	
	// SQL INSERT,UPDATE,DELETE,REPORTES.
	
function GuardaComprasCabM($c_numeoc,$c_seroc,$c_numoc,$c_ocmain,$c_codcon,$c_codprv,$c_nomprv,$d_fecoc,$n_bruafe,$n_desafe,$n_netafe,$n_facisc,$n_totisc,$n_porigv,$n_igvafe,$n_totoc,$n_tcoc,$c_codmon,$c_codpag,
$c_codcc,$c_codlug,$c_deslug,$c_estado,$c_obsoc,$d_fecent,$c_lugent,$b_swtenv,$c_codtran,$c_nomtran,$n_swtofi,
$d_fecreg,$c_oper,$d_date,$c_tipooc,$c_claoc,$c_codcia,$c_codtda,$b_importac,$b_cierreOP,$c_refcoti,$c_pais,$c_icote,$c_puerto,$c_depo,$c_costo,$monto){
	include('cn/dbconex.php');
		$sqlComprascabM="insert into cabeoc(c_numeoc,c_seroc,c_numoc,c_ocmain,c_codcon,c_codprv,c_nomprv,d_fecoc,n_bruafe,n_desafe,n_netafe,n_facisc,n_totisc,n_porigv,n_igvafe,n_totoc,n_tcoc,c_codmon,c_codpag,
c_codcc,c_codlug,c_deslug,c_estado,c_obsoc,d_fecent,c_lugent,b_swtenv,c_codtran,c_nomtran,n_swtofi,
d_fecreg,c_oper,d_date,c_tipooc,c_claoc,c_codcia,c_codtda,b_importac,c_refcoti,c_pais,c_icote,c_puerto,c_depo,c_reg,c_costo,monto) 
values('$c_numeoc','$c_seroc','$c_numoc','$c_ocmain','$c_codcon','$c_codprv','$c_nomprv','$d_fecoc',$n_bruafe,$n_desafe,$n_netafe,$n_facisc,$n_totisc,$n_porigv,$n_igvafe,$n_totoc,$n_tcoc,'$c_codmon','$c_codpag',
'$c_codcc','$c_codlug','$c_deslug','$c_estado','$c_obsoc','$d_fecent','$c_lugent','$b_swtenv','$c_codtran','$c_nomtran',$n_swtofi,
'$d_fecreg','$c_oper','$d_date','$c_tipooc','$c_claoc','$c_codcia','$c_codtda',$b_importac, '$c_refcoti','$c_pais','$c_icote','$c_puerto','$c_depo','intranet','$c_costo','$monto')";
	$resultado = odbc_exec($cid, $sqlComprascabM)or die(exit(odbc_errormsg($cid)));
	return $resultado;
	
}

function GuardaComprasDetM($c_numeoc,$n_item,$c_codprd,$c_tipomv,$c_desprd,
$c_codund,$n_canprd,$n_canund,$n_factor,$n_preprd,$n_dscto,
$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,$c_oper,
$c_codcia,$c_codtda,$c_nroserie){
	include('cn/dbconex.php');
$sqlComprascabM="insert into detaoc(c_numeoc,n_item,c_codprd,c_tipomv,c_desprd,
c_codund,n_canprd,n_canund,n_factor,n_preprd,n_dscto,
n_totimp,c_codafe,c_obsdoc,d_fecreg,c_oper,
c_codcia,c_codtda,c_nroserie)
values('$c_numeoc',$n_item,'$c_codprd','$c_tipomv','$c_desprd',
'$c_codund',$n_canprd,$n_canund,$n_factor,$n_preprd,$n_dscto,
$n_totimp,'$c_codafe','$c_obsdoc','$d_fecreg','$c_oper',
'$c_codcia','$c_codtda','$c_nroserie')";		
$resultado = odbc_exec($cid, $sqlComprascabM)or die(exit("Error en odbc_exec()<br>$sqlComprascabM ".odbc_errormsg($cid)));
	return $resultado;
	}

	
function UpdateCabComprasM($c_numeoc,$d_fecmod,$c_opermd,$n_tcoc,$c_codmon,$c_codpag,$c_codlug,$c_deslug,$c_estado,$c_obsoc,$d_fecent,$c_lugent,$c_codtran,$c_nomtran,$c_tipooc,$c_refcoti,$c_pais,$c_icote,$c_puerto,$c_depo,$c_costo,$monto){
	include('cn/dbconex.php');
	
	$sql="update cabeoc set d_fecmod='$d_fecmod',c_opermd='$c_opermd',n_tcoc=$n_tcoc,c_codmon='$c_codmon',c_codpag='$c_codpag',c_codlug='$c_codlug',c_deslug='$c_deslug',c_estado='$c_estado',c_obsoc='$c_obsoc',d_fecent='$d_fecent',c_lugent='$c_lugent',
	c_codtran='$c_codtran',c_nomtran='$c_nomtran',c_tipooc='$c_tipooc',c_refcoti='$c_refcoti',
	c_pais='$c_pais',c_icote='$c_icote',c_puerto='$c_puerto',c_depo='$c_depo',c_costo='$c_costo',monto='$monto'
	where c_numeoc='$c_numeoc'";
	
	
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	
	
	
	function DeleterocM($c_numeoc){ //elimnar los detalles de la OC, para luego ingresar los nuevos pedidos
	include('cn/dbconex.php');
	$sql="delete from detaoc where c_numeoc='$c_numeoc'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	
	function updateCabocM($n_bruafe,$n_desafe,$n_netafe,$n_igvafe,$n_totoc,$c_numeoc){
	include('cn/dbconex.php');
	$sql="update cabeoc set n_bruafe=$n_bruafe,n_desafe=$n_desafe,n_netafe=$n_netafe,n_igvafe=$n_igvafe,n_totoc=$n_totoc where c_numeoc='$c_numeoc'"; 	
	
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	
	function ApruebaosM($c_numeoc,$c_uaprb,$d_feaprb,$c_obaprb){
include('cn/dbconex.php');

$sql="update cabeoc set n_swaprb=2,c_estado=0, c_uaprb='$c_uaprb',d_feaprb='$d_feaprb', c_obaprb='$c_obaprb' where c_numeoc='$c_numeoc'";

	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	
	function BuscaLibComprasM($c_numeoc){
	include('cn/dbconex.php');
	$sql="SELECT * from  detaoc  where c_numeoc='$c_numeoc'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
	
	
	function LiberaosM($c_numeoc,$d_feaprb,$c_uaprb,$c_obaprb){
	include('cn/dbconex.php');
	$sql="update cabeoc set n_swaprb='0',c_estado=0,d_feaprb='$d_feaprb',c_uaprb='$c_uaprb',
	c_obaprb='$c_obaprb' where c_numeoc='$c_numeoc'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	function EliminarocM($os,$obs){
	include('cn/dbconex.php');
	$sql="update cabeoc set c_estado='4',c_obselim='$obs' where c_numeoc='$os'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	
//AGREGADO EL 20 02 2015

function actucorrdocuocM($c_numoc)	{
		include('cn/dbconex.php');
	$sql="UPDATE TAB_DOCU SET TD_CORR='$c_numoc' where TD_CODI='M'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;
	
	}
	
	
	function ListaIcotermsM(){
			include('cn/dbconex.php');
			$sql="select c_numitm,c_desitm from Dettabla where c_codtab='ICO' and c_estado='1' order by c_desitm asc ";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
		}


		function listarPaisM(){
			require('cn/db_conexion.php');
				$sql="SELECT Code,Name FROM country order by Name asc";
				$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
				while ($fila=mysqli_fetch_array($resultado))
				{
				$ven[] = $fila;
				}	
			return $ven;	
		}
			
		function ListaPuertosM(){
			include('cn/dbconex.php');
			$sql="select c_numitm,c_desitm from Dettabla where c_codtab='PTO' and c_estado='1' order by c_desitm asc ";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
		}
		
		function ListaDepositosM(){
			include('cn/dbconex.php');
			$sql="select c_numitm,c_desitm from Dettabla where c_codtab='DEP' and c_estado='1' order by c_desitm asc ";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
		}
		function ListaCentroCostoM(){
			include('cn/dbconex.php');
			$sql="select * from centro_costo where estado=1 ORDER BY DESCRIPCION";
			$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
				
			while ($fila = odbc_fetch_array($resultado))
			{
				$Paciente[] = $fila;
			}	
			odbc_close($cid);
			return $Paciente;	
		}
		
		//AGREGADO PARA DUPLICAR OC DETALLADO(con c_idequipo)
		function deletedetduplicadoM($c_nroserie,$c_numeocant)	{
			include('cn/dbconex.php');
			$sql="DELETE from detaoc where c_nroserie='$c_nroserie' and c_numeoc='$c_numeocant' ";
			$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
			return $resultado;	
		}
	
  ?>
