<?php 
// LISTA TIPO DE CAMBIO
date_default_timezone_set('America/Bogota'); 
function Listatipocambiov2M(){
	include('cn/dbconex.php');

	$mes=(date("n"));
	//$fecha='26/08/2014';
/*	$sxzxzql="SELECT  top 1 TC_VTA AS tc_cmp
FROM  tipocamb order by tc_fecha desc;";*/
$sql="SELECT top 1  tc_cmp ,tc_fecha
FROM  tipocamb where  MONTH(tc_fecha)='$mes' order by tc_fecha desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
odbc_close($cid);
return $ven;
	}

//LISTADO PROVEEDORES

function BusquedaproveM($descripcion){
	//usp_PACIENTES_Buscar_PATERNO_MATERNO
include('cn/dbconex.php');
$sql="SELECT pr_razo,pr_nruc,pr_tfax,pr_emai,pr_resp,pr_tele,pr_chofer,pr_licencia,pr_marca,pr_placa,pr_decl FROM promae WHERE pr_razo LIKE '%$descripcion%' or pr_nruc LIKE '%$descripcion%'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;	
	
	
	}


?>
