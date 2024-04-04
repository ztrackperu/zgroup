<?php 
require("../MVC_Modelo/ContabilidadM.php");
require("../MVC_Modelo/CajaM.php");
require('../php/Funciones/Funciones.php');
require('../php/Funciones/clsletras.php');
//require('xxToRtf.php');
require("../MVC_Modelo/usuariosM.php"); 
if($_GET['acc']=='mostrarcb'){
	$Ringresos=listaingresosM($_REQUEST['txtbusca']);
	$Rgastos=listagastosM($_REQUEST['txtbusca']);	
	include('../MVC_Vista/Contabilidad/DetalleCB.php');
}
if($_GET['acc']=='updatevou'){
	
	for($i=1;$i<=150;$i++){
		
		$c_numvou=$_REQUEST['c_numvou'.$i];$c_numeOP=$_REQUEST['c_numeOP'.$i];$c_anovou=$_REQUEST['c_anovou'.$i];$c_mesvou=$_REQUEST['c_mesvou'.$i];
		UpdateComprobanteM($c_numvou,$c_numeOP,$c_anovou,$c_mesvou);
	}
	
	$mensaje="Se actualizo correctamente";
		print "<script>alert('$mensaje')</script>";
	
	}

if($_GET["acc"] == "buscacoti") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/buscacoti.php');	
}
if($_GET["acc"] == "v01") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/iniciointerface.php');	
}

if($_GET["acc"] == "vercomp") // MOSTRAR: Formulario Nuevo Registro
{
$resultado=ListarComprobantesM($_REQUEST['fecha'],$_REQUEST['c_codasi'],$_REQUEST['vou'],$_REQUEST['anno'],$_REQUEST['mes']);
include('../MVC_Vista/Contabilidad/interface.php');	
}


if($_GET["acc"] == "r1") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/Reportes.php');	
	
}

if($_GET["acc"] == "Ap01") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/reporte1.php');	
	
}
if($_GET["acc"] == "Ap02") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/reporte2.php');	
	
}
if($_GET["acc"] == "Ap03") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/ReporteCB.php');	
	
}
if($_GET["acc"] == "ver1")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteCompras.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteCompras.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteCompras.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteCompras.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
 $f1=$_REQUEST["textfield"];
 $f2=$_REQUEST["textfield2"];

//$fecha = '2011-05-20'; //20-05-2011  04/05/2013
$variable = explode ('/',$f1); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha1 = $variable [1].-$variable [0].-$variable [2];
$variable2 = explode ('/',$f2); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha2 = $variable2 [1].-$variable2 [0].-$variable2 [2];
$sw=$_REQUEST["sw"];

 $reporte=reporte1C($fecha1,$fecha2,$sw);
 $reporte2=reporte11C();
//$reporte=verguiasremisionC($fecha1,$fecha2);
include('../MVC_Vista/Contabilidad/reporte1.php');	 
}
function reporte1C($f1,$f2,$sw){ return   reporte1M($f1,$f2,$sw);}
function reporte11C(){  return reporte11M();}




if($_GET["acc"] == "ver2")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteCompras.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteCompras.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}	
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteCompras.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteCompras.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
EliminaTemporalr2M();
$anno=$_REQUEST['select'];		
$top=$_REQUEST['select2'];	
$tipo=$_REQUEST['select3'];	
 for($i=1;$i<=12;$i++){
 $recorrer=reporte2C($anno,$top,$tipo,$i);
	foreach ($recorrer as $item)
	{
$c_dcto= $item["PE_NDOC"];
$c_razon= $item["PE_CLIE"];
$c_fecdoc= $item["PE_FDOC"];
$c_ruc= $item["PE_NRUC"];
$c_importe= $item["PE_TBRU"];
$c_anno=$anno;
$c_mes=$i;	
//guardar en temporal
GuardaTemporalr2C($c_dcto,$c_razon,$c_fecdoc,$c_ruc,$c_importe,$c_anno,$c_mes);		//}
}
 }
$reporte=ListaTemporalM($anno);
include('../MVC_Vista/Contabilidad/reporte2.php');	 
}
function reporte2C($anno,$top,$tipo,$mes){ return reporte2M($anno,$top,$tipo,$mes);}
function GuardaTemporalr2C($c_dcto,$c_razon,$c_fecdoc,$c_ruc,$c_importe,$c_anno,$c_mes){
	$resul= GuardaTemporalr2M($c_dcto,$c_razon,$c_fecdoc,$c_ruc,$c_importe,$c_anno,$c_mes);}
	

if($_GET["acc"] == "v02")
{
	include('../MVC_Vista/Contabilidad/Regdetraccion.php');	
	
	}	

if($_GET["acc"] == "vertc")
{
	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Contabilidad/vertc.php');	
	}

if($_GET["acc"] == "updatetc") // MOSTRAR: Formulario Modificar Registro
{
	
	$documento='F'.$_REQUEST['serie'].$_REQUEST['numero'];
	$usermod=$_REQUEST['udni'];
	$fechamod=date("Y-m-d H:i:s");
	$tc=$_REQUEST['tc'];
	$busca=BuscarFacM($documento);
	if($busca!=NULL)
	{
	updatetc1M($tc,$documento);
	updatetc2M($tc,$documento);
	updatetc3M($tc,$documento);
	guardamodtcM($usermod,$fechamod,$documento,$tc);
	$mensaje="Documento Actualizado... Necesita Correr Proceso Registro Venta";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	include('../MVC_Vista/Contabilidad/vertc.php');	
	}else{
	$mensaje="Documento No Existe Revise";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Contabilidad/vertc.php');	
		
		}
}

//**** 06042015 registro de letras
if($_GET["acc"] == "verlet") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$resulet=listaletrasM();
	include('../MVC_Vista/Contabilidad/Adminletra.php');		
}
if($_GET["acc"] == "formlet") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Contabilidad/Regletra.php');		
}	

if($_GET["acc"] == "reglet") // MOSTRAR: Formulario Nuevo Registro
{
	
$c_codcia='01';$c_codtda='000';$c_nume=$_REQUEST['num'];

$resultado = str_replace("0", "", $c_nume);

$c_numlet='L'.str_pad($c_nume, 6, '0', STR_PAD_LEFT);

$c_numfac=$_REQUEST['ref'];
$c_numcont=$_REQUEST['contrato'];
$c_numcoti=$_REQUEST['coti'];
$c_lugarg=strtoupper($_REQUEST['lugar']);
$d_fecemi=$_REQUEST['fgiro'];
$d_fecven=$_REQUEST['fvcto'];
$c_codmon=$_REQUEST['moneda'];
$n_implet=$_REQUEST['monto'];
$c_codcli=strtoupper($_REQUEST['codcli']);
$c_nomcli=$_REQUEST['cliente'];
$c_docli=$_REQUEST['ruc'];
$c_dircli=$_REQUEST['dire'];
$c_oper=$_REQUEST['udni'];
$d_fcrea=date("Y-m-d H:i:s");
if($c_codmon==0){$mo='SOLES';}else{$mo='DOLARES';}

 

$zc_imppal=num2letras($n_implet,$mo);
$c_imppal=strtoupper($zc_imppal);

$busca=buscaLetraM($c_nume);
	if($busca==NULL)
	{
GuardaLetraM($c_codcia,$c_codtda,$resultado,$c_numlet,$c_numfac,$c_numcont,$c_numcoti,$c_lugarg,$d_fecemi,
$d_fecven,$c_codmon,$n_implet,$c_codcli,$c_nomcli,$c_docli,$c_dircli,$c_oper,$d_fcrea,$c_imppal);
	$mensaje="Guardado Correctamente";

	//include('../MVC_Vista/contabilidad/print/GenerarLetra.php');	
	
	}else{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$mensaje="Nro de Letra Ya Existe Revise";
	print "<script>alert('$mensaje')</script>";	
	include('../MVC_Vista/Contabilidad/Regletra.php');		
		}
}
if($_GET["acc"] == "updateletra") // MOSTRAR: Formulario Nuevo Registro
{
		$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_GET['ot'];
	$cargaletra=buscaLetraM($c_nume);
	
	include('../MVC_Vista/Contabilidad/updateletra.php');	
}
?>