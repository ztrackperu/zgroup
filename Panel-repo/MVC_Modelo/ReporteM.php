<?php 
ini_set('memory_limit','1024M');

function listaVentasM($xfechainicio,$xfechafinal, $system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();
//sin c_numvou(Id CUO)
/*$sql="SELECT PE_FDOC as cuatro,PE_FDOC+PE_VLE1 as cinco, 
PE_TDOC as seis,PE_SERI as siete,PE_DOC as ocho,
CC_TDOC as diez , CC_NRUC as once,PE_CLIE as doce,PE_TBRU*PE_TCAM as catorce,
IIF (PE_TIGV=0,PE_TBRU*PE_TCAM,'0') as dieciseis,
PE_TIGV*PE_TCAM as dieciocho, PE_TOTD*PE_TCAM as veintidos,PE_TCAM AS 
veintitres,PE_REFE as factura, PE_ESTA as veintinueve
FROM pefmae p,climae c
where p.PE_CCLI=c.CC_RUC and PE_FDOC Between #$xfechainicio# and #$xfechafinal#
ORDER BY p.PE_NDOC asc";*/

//solo se muestran las facturas sin anular, es decir las que tienen c_numvou(Id CUO)
/*$sql="SELECT distinct PE_FDOC as cuatro,PE_FDOC+PE_VLE1 as cinco, 
PE_TDOC as seis,PE_SERI as siete,PE_DOC as ocho,
CC_TDOC as diez , CC_NRUC as once,PE_CLIE as doce,PE_TBRU*PE_TCAM as catorce,
IIF (PE_TIGV=0,PE_TBRU*PE_TCAM,'0') as dieciseis,
PE_TIGV*PE_TCAM as dieciocho, PE_TOTD*PE_TCAM as veintidos,PE_TCAM AS 
veintitres,PE_REFE as factura, PE_ESTA as veintinueve,c_numvou,c_numdoc,c_codasi
FROM pefmae p,climae c,voumov v
where p.PE_CCLI=c.CC_RUC and  PE_FDOC Between #$xfechainicio# and #$xfechafinal#
and p.pe_doc=v.c_numdoc  and c_anovou='$anno' and c_mesvou='$mes'";*/

//se muestran todas las facturas(tambien las anuladas) con/sin c_numvou(Id CUO)
/*$sql="SELECT distinct PE_FDOC as cuatro,PE_FDOC+PE_VLE1 as cinco, 
PE_TDOC as seis,PE_SERI as siete,PE_DOC as ocho,
CC_TDOC as diez , CC_NRUC as once,PE_CLIE as doce,PE_TBRU*PE_TCAM as catorce,
IIF (PE_TIGV=0,PE_TBRU*PE_TCAM,'0') as dieciseis,
PE_TIGV*PE_TCAM as dieciocho, PE_TOTD*PE_TCAM as veintidos,PE_TCAM AS 
veintitres,PE_REFE as factura, PE_ESTA as veintinueve,c_numvou,c_numdoc,c_codasi,
c_anovou,c_mesvou
FROM 
(pefmae p LEFT  JOIN voumov v ON  p.pe_doc=v.c_numdoc)
LEFT JOIN climae c  ON  p.PE_CCLI=c.CC_RUC
where  PE_FDOC Between #$xfechainicio# and #$xfechafinal#
and (c_anovou IS NULL or c_anovou='$anno') and (c_mesvou IS NULL  or c_mesvou='$mes')";*/

$sql="SELECT distinct PE_MONE,PE_TOTD,PE_TCAM,
PE_FDOC as cuatro,PE_FDOC+PE_VLE1 as cinco, 
PE_TDOC as seis,PE_SERI as siete,PE_DOC as ocho,
CC_TDOC as diez , CC_NRUC as once,PE_CLIE as doce,
 IIF (PE_MONE='1',PE_TBRU*PE_TCAM,PE_TBRU)  as catorce,
 IIF (PE_MONE='1',PE_TDES*PE_TCAM,PE_TDES)  as quince,
 IIF (PE_MONE='1',PE_TIGV*PE_TCAM,PE_TIGV)  as dieciseis, 
 IIF (PE_TIGV=0,PE_TBRU*PE_TCAM,'0') as diecinueve,
 IIF (PE_MONE='1',PE_TOTD*PE_TCAM,PE_TOTD)   as veinticuatro,
PE_TCAM AS veintiseis, PE_REFE as factura, PE_RSERI, PE_ESTA as treintaycuatro
FROM (pefmae p LEFT JOIN climae c  ON  p.PE_CCLI=c.CC_RUC)
where  PE_FDOC Between #$xfechainicio# and #$xfechafinal#";
// echo $sql;

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}	
	///cuo ventas
function obtenercuoM($nfactura,$nserie, $system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();

	$sql="select distinct c_numvou 
	from Voumov
	where c_numdoc='$nfactura' and c_serdoc='$nserie'";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}	
	
function listafacturaM($factura,$system){
	include('cn/dbconex.php');
	
		if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	
	
	//SET VARIBLE $ven
	$ven = array();

	$sql="SELECT PE_FDOC as veintisiete,PE_TDOC as veintiocho,
	PE_SERI as veintinueve,PE_DOC as treinta FROM pefmae p
	where PE_NDOC='$factura' ";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
	
function listaNombreLEComprasM($system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();

	$sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_ruc=t.OC_CPRV
	where pr_decl<>-1 and   OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'66666666666' and OC_NRUC<>'99999999999' and  not isnull(c_anovou) and not isnull(c_mesvou)";  

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
	
function listaComprasM($system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();

	/*$sql="select * from t_orcmae t, Promae
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1"; */
	 
	/* $sql="select * from
	 (T_orcmae t INNER JOIN Promae p  on p.PR_NRUC=t.OC_NRUC)
	LEFT JOIN q_Promov_A_Detraccion q on t.OC_NDOC=q.PR_NDOC	
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1"; */
	 
	/* $sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_nruc=t.OC_NRUC 
	where pr_decl<>-1 and   OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666' order by OC_FDOC asc"; */
	 


//	 $sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_ruc=t.OC_CPRV
	//where pr_decl<>-1 and   OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'   order by OC_FDOC asc"; //and OC_NRUC<>'99999999999'  
	
	 $sql="SELECT (t.c_anovou&t.c_mesvou&'00') as PERIODO,t.c_numvou as c_numvou ,'M' as CUO,* 
	  from t_orcmae t
	  LEFT JOIN  Promae p on p.pr_nruc=t.OC_NRUC 
	  where p.pr_decl<>-1 and left( t.oc_ndoc,1)<>'B'  AND  left( t.oc_ndoc,1)<>'H'   order by t.OC_FDOC asc";
	
	

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
function listaComprasMv($system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();

	/*$sql="select * from t_orcmae t, Promae
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1"; */
	 
	/* $sql="select * from
	 (T_orcmae t INNER JOIN Promae p  on p.PR_NRUC=t.OC_NRUC)
	LEFT JOIN q_Promov_A_Detraccion q on t.OC_NDOC=q.PR_NDOC	
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1"; */
	 
	/* $sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_nruc=t.OC_NRUC 
	where pr_decl<>-1 and   OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666' order by OC_FDOC asc"; */
	  $sql="SELECT (t.c_anovou&t.c_mesvou&'00') as PERIODO,t.c_numvou as c_numvouz ,'M' as CUO,* 
	  from t_orcmae t
	  LEFT JOIN  Promae p on p.pr_nruc=t.OC_NRUC 
	  where p.pr_decl<>-1 and left( t.oc_ndoc,1)<>'B'  AND  left( t.oc_ndoc,1)<>'H'   order by t.OC_FDOC asc"; //and OC_NRUC<>'99999999999'  

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
	
	
function listaCompras2M(){ //listar facturas con ruc 9999999 que tiene IGV
	include('cn/dbconex.php');
	//SET VARIBLE $ven
	$ven = array();

	$sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_ruc=t.OC_CPRV
	where  OC_NRUC='99999999999' and OC_TIGVA<>0   order by OC_FDOC asc"; //and OC_NRUC<>'99999999999'  
	 
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}

function listaComprasNodomiM($system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();

	/*$sql="select * from t_orcmae t, Promae
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1"; */
	 
	/* $sql="select * from
	 (T_orcmae t INNER JOIN Promae p  on p.PR_NRUC=t.OC_NRUC)
	LEFT JOIN q_Promov_A_Detraccion q on t.OC_NDOC=q.PR_NDOC	
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1"; */
	 
	/* $sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_nruc=t.OC_NRUC 
	where pr_decl<>-1 and   OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666' order by OC_FDOC asc"; */
	  $sql="select * from T_orcmae t LEFT JOIN  Promae p on p.pr_ruc=t.OC_CPRV
	where pr_decl=-1 and   OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'   order by OC_FDOC asc"; //and OC_NRUC<>'99999999999'  

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}





	
function listaRefeM($oc_refe){ //listar facturas de refernecia de las notas de credito/debito en compras
	include('cn/dbconex.php');
	//SET VARIBLE $ven
	$ven = array();

	/*$sql="select * from t_orcmae t, Promae
	where OC_TDOC<>'B' and  OC_TDOC<>'H' and OC_NRUC<>'99999999999' and OC_NRUC<>'66666666666'
	 and pr_nruc=OC_NRUC and pr_decl<>-1 and OC_NDOC='$oc_refe'";*/
	 $sql="select top 1 * from Voumov where c_coddoc&c_serdoc&c_numdoc='$oc_refe'";
	 
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
	
function listaLibroDiarioM($xano,$xmes, $system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();
	/*$sql="SELECT d.c_codcta,d.c_codasi, d.c_numvou, d.c_codcc,d.c_codana,d.n_debnac,d.n_habnac,d.c_numdoc,d.d_fecdoc,d.c_serdoc,c.d_fecvou,c.c_glosa,d.n_debext,d.n_habext,
	d.c_glosa,d.c_estado
	from voumov d,voumae c
	where c.c_numvou=d.c_numvou and c.c_anovou=d.c_anovou and c.c_mesvou=d.c_mesvou
	and d.c_anovou='$xano' and d.c_mesvou='$xmes' and c.c_estado<>'4' and d.c_estado<>'4'";*/

	/*$sql="SELECT d.c_codcta,d.c_codasi, d.c_numvou, d.c_codcc,d.c_codana,d.n_debnac as ocho,d.n_habnac as nueve
	,d.c_numdoc,d.d_fecdoc as seis,d.c_serdoc,c.d_fecvou,c.c_glosa as siete,
	d.n_debext,d.n_habext,d.c_glosa,d.c_estado 
	from voumov d,voumae c
	where c.c_numvou=d.c_numvou and c.c_anovou=d.c_anovou and c.c_mesvou=d.c_mesvou
	and d.c_anovou='$xano' and d.c_mesvou='$xmes' and c.c_estado<>'4' and d.c_estado<>'4'";*/

	$sql="SELECT Voumov.c_anovou, Voumov.c_mesvou, Voumov.c_codasi, Voumov.c_numvou, Voumov.c_coddoc, Voumov.c_codcta, Voumov.c_serdoc, Voumov.c_numdoc, Voumov.d_fecdoc, Voumov.d_vendoc, Voumov.c_codmon, Voumov.n_debnac, Voumov.n_habnac, Voumov.n_tipcmb, Voumae.c_glosa, Voumov.n_debext, Voumov.n_habext, Voumov.c_codcc, Voumae.d_fecvou,
	voumov.c_codmon as siete,voumov.c_coddoc as diez,voumov.c_serdoc as once,voumov.c_numdoc as doce,voumae.d_fecvou as trece,voumov.d_vendoc as catorce
	FROM Voumae INNER JOIN Voumov ON (Voumae.c_anovou = Voumov.c_anovou) AND (Voumae.c_mesvou = Voumov.c_mesvou) AND (Voumae.c_codasi = Voumov.c_codasi) AND (Voumae.c_numvou = Voumov.c_numvou)
	WHERE (((Voumov.c_anovou)='$xano') AND ((Voumov.c_mesvou)='$xmes') AND ((Voumov.c_estado)='1') AND ((Voumae.c_tipvou)='D') AND ((Voumae.c_estado)='1'))";
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}
	
function listaCuentasM($ano,$mes, $system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();
	$sql="select distinct v.c_codcta,p.c_descta from Voumov v,plan_cta p
	where v.c_codcta=p.c_codcta and c_anovou='$ano' and c_mesvou='$mes' ";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}

function listaLibroMayorM($system = ''){
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	//SET VARIBLE $ven
	$ven = array();
	//$sql="SELECT * from T_Voumov_DMAD";
	$sql="SELECT * from T_Voumov_DMAD where c_glosa<>'SALDO MES ANTERIOR'";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}

function ObtenerAnoMesLibroMayorM($system = ''){
	//SET VARIBLE $ven
	$ven = array();
	if($system == ''){
		include('cn/dbconex.php');
	}else{
		switch($system){
			case 'foodz':
				include('cn/dbconex_foodz.php');
				break;
			case 'psc':
				include('cn/dbconex_ps.php');
				break;
			default:
				include('cn/dbconex.php');
				break;
		}
	}
	$sql="SELECT max(c_anovou) as ano, max(c_mesvou) as mes from T_Voumov_DMAD";

	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){
		$ven[] = $fila;
	}	
	odbc_close($cid);
	return $ven;
}

?>