<?php 	//cliente	
function BusquedaautoM($descripcion){
	include('cn/dbconex.php');
	$sql="SELECT CC_RUC as CC_COD ,CC_RAZO,CC_NRUC,CC_DIR1,CC_TELE,CC_EMAI,CC_RESP  FROM CLIMAE WHERE cc_esta='1' and CC_RAZO like '%$descripcion%' OR CC_NRUC like '$descripcion%' OR CC_RUC like '$descripcion%' ";
	$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
		
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
}
	//proveedor
function BusquedaautoproveM($descripcion){	
	include('cn/dbconex.php');
	$sql="select pr_razo,pr_nruc,pr_tfax,pr_emai,pr_resp,pr_chofer,pr_licencia,pr_marca,pr_placa FROM promae WHERE pr_razo like '$descripcion%' or pr_nruc like '$descripcion%' ";
	$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
}	
	
	
	
	
		

	//BUSCAR DOC 
	function BusquedaDocuM($descripcion,$sw){
		include('cn/dbconex.php');
		
		if($sw=='1'){
			
//$sql="select distinct top 100 c.c_numcd,d_fecreg,c_opereg,c_obsdoc from ctrdoc c where  c.C_ESTADO<>'3' order by c.c_numcd desc "; 
			$sql="select distinct top 100 c.c_numcd,d_fecreg,c_opereg,c_obsdoc,sum(c_estado) as estado from ctrdoc c where  c.C_ESTADO<>3 group by c.c_numcd,d_fecreg,c_opereg,c_obsdoc,c_estado order by c.c_numcd desc";

		}if($sw=='2'){
			
		$sql="select distinct top 100 c.c_numcd,d_fecreg,c_opereg,c_obsdoc from ctrdoc c where  c.C_ESTADO<>3 and c_opereg like '%$descripcion%' order by c.c_numcd desc";
	
	
		}else{
		
		//$sql="select distinct top 100 c.*,C_DESITM  from ctrdoc c,Dettabla d where d.C_CODTAB='TDC' and d.C_ESTADO='1' and d.C_NUMITM=c.c_tipodoc and c.C_ESTADO<>'0'";	
		
		//$sql="select distinct top 100 c.c_numcd,d_fecreg,c_opereg,c_obsdoc from ctrdoc c where  c.C_ESTADO<>3 order by c.c_numcd desc";	
		$sql="select distinct top 100 c.c_numcd,d_fecreg,c_opereg,c_obsdoc,sum(c_estado) as estado from ctrdoc c where  c.C_ESTADO<>3 group by c.c_numcd,d_fecreg,c_opereg,c_obsdoc,c_estado order by c.c_numcd desc";
		
		}
		
	
		
		
		
		//$sql="select distinct top 100 c.c_numcd,d_fecreg,c_opereg,c_obsdoc from ctrdoc c where  c.C_ESTADO<>'3'";	
		
		$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
		while ($fila=odbc_fetch_array($resultado))
		{
		$ven[] = $fila;
		}
		odbc_close($cid);
		return $ven;
	}	

	//FIN BUSCAR DOC 


	function docuM(){
include('cn/dbconex.php');

$sql="select * from Dettabla where C_CODTAB='TDC' and C_ESTADO='1' ";

$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

function destinatarioM(){
require('cn/db_conexion.php');

$sql="SELECT * FROM USUARIO WHERE estado='1' ";

$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
	}


//VALIDAR


	function listavalidarM($c_numcd){
		include('cn/dbconex.php');				
		
			$sql="select c.*,C_DESITM  from ctrdoc c,Dettabla d where d.C_CODTAB='TDC' and d.C_ESTADO='1' 
and d.C_NUMITM=c.c_tipodoc and c_numcd=$c_numcd";	
		
				
				
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}




//INICIO REPORTES 


	function listahistorialM($c_codprd,$c_catprd,$c_conprd,$f1,$f2,$sw){
		include('cn/dbconex.php');				
		
		if($sw=='2'){
			$sql="select * from precio where c_estado='1' and c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd'  and  d_fecreg Between #$f1# and #$f2# order by d_fecreg desc";	
		}
		
		if($sw=='1'){
			$sql="select * from precio where c_estado='1' and c_codprd='$c_codprd' and c_catprd='$c_catprd' and c_conprd='$c_conprd'  order by c_numpre desc";
		}				
				
	$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
	
	}
	
//FIN REPORTES


// INICIO MANTENIMIENTOS

//genera el codigo siguiente de la BD para guardar orden de compra.	
function GenCorrePrecioM(){	
include('cn/dbconex.php');
$sql="SELECT max(c_numcd) as cod from ctrdoc";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	

}

	
function grabarDocM($c_numcd,$d_fecreg,$c_opereg,$d_date,$c_obsdoc,$n_item,$c_tipodoc,$c_serdoc,$c_numdoc,
$c_destidoc,$c_remidoc,$d_fecdoc,$n_copias,$c_estado){	
	include('cn/dbconex.php');	
	$sqlDocM="insert into ctrdoc(c_numcd,d_fecreg,c_opereg,d_date,c_obsdoc,n_item,c_tipodoc,c_serdoc,c_numdoc,
c_destidoc,c_remidoc,d_fecdoc,n_copias,c_estado) values($c_numcd,'$d_fecreg','$c_opereg','$d_date','$c_obsdoc',$n_item,'$c_tipodoc','$c_serdoc','$c_numdoc',
'$c_destidoc','$c_remidoc','$d_fecdoc',$n_copias,$c_estado)";
	$resultado = odbc_exec($cid, $sqlDocM)or die(exit("Error en odbc_exec()<br>"));
	return $resultado;
	
}


function validarDocM($obsdoc,$c_numcd,$n_item,$sel,$c_estado){	
	include('cn/dbconex.php');	
	$sqlDocM="update ctrdoc set c_obsdoc='$obsdoc', c_estado=$c_estado where c_numcd=$c_numcd and n_item=$sel";
	$resultado = odbc_exec($cid, $sqlDocM)or die(exit("Error en odbc_exec()<br>"));
	return $resultado;
	
}
	
		

function eliminardocM($c_numcd,$obs){
	include('cn/dbconex.php');
	$sql="update ctrdoc set c_estado=3,c_obselim='$obs' where c_numcd=$c_numcd";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
	return $resultado;	
	}
	
// FIN MANTENIMIENTOS	
?>