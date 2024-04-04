<?php 
//reporte donde muestra los productos y sus ultimos precios.
function Rep_Lista_ProductoxPrecioM($codigo,$sit,$sw,$clase){
include('cn/dbconex.php');
if($sw=='1'){
$sql="SELECT DISTINCT c.c_numeoc,d_fecing,i.c_idequipo,c_codsit,a.in_codi,in_arti,m.in_cost,(m.in_cost/in_tcam) as pd,n_costo_c,in_tcam,(n_costo_c/in_tcam) as pc ,n_preprd from invequipo as i , invmae as a,detaoc as d ,cabeoc as c,invmov as m where a.in_codi=i.c_codprd  and cod_clase='$clase'
and a.in_codi=d.c_codprd and d.c_codprd =i.c_codprd and c_nroserie=c_nserie and d.c_numeoc=c.c_numeoc and m.c_idequipo=i.c_idequipo AND c.c_estado<>'4' 
 order by d_fecing desc";
 }else{
$sql="SELECT DISTINCT c.c_numeoc, d_fecing,i.c_idequipo,c_codsit,a.in_codi,in_arti,m.in_cost,(m.in_cost/in_tcam) as pd,n_costo_c,in_tcam,(n_costo_c/in_tcam) as pc ,n_preprd from invequipo as i , invmae as a,detaoc as d ,cabeoc as c,invmov as m where a.in_codi=i.c_codprd  and cod_clase='$clase'
and a.in_codi=d.c_codprd and d.c_codprd =i.c_codprd and c_nroserie=c_nserie and d.c_numeoc=c.c_numeoc and m.c_idequipo=i.c_idequipo AND c.c_estado<>'4' 
and c_codsit='$sit' order by d_fecing desc";}
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
function Rep_Lista_DescripProductoxPrecioM($codigo,$sit,$opsw,$clase){
include('cn/dbconex.php');

$sql="SELECT DISTINCT c.c_numeoc,d_fecing,i.c_idequipo,c_codsit,a.in_codi,in_arti,m.in_cost,(m.in_cost/in_tcam) as pd,n_costo_c,in_tcam,(n_costo_c/in_tcam) as pc ,n_preprd from invequipo as i , invmae as a,detaoc as d ,cabeoc as c,invmov as m where a.in_codi=i.c_codprd  and d.c_codprd='$codigo' and c_codsit='$sit'
and a.in_codi=d.c_codprd and d.c_codprd =i.c_codprd and c_nroserie=c_nserie and d.c_numeoc=c.c_numeoc and m.c_idequipo=i.c_idequipo AND c.c_estado<>'4' 
 order by d_fecing desc";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}
?>