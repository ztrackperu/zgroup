<?php
require("../MVC_Modelo/CajaM.php"); 
require("../MVC_Modelo/InventarioM.php"); 
require("../MVC_Modelo/TransporteM.php");
require('../php/Funciones/Funciones.php');
//require("marca.php"); 
//require("../MVC_Modelo/usuariosM.php"); 
//include("../php/Funciones/PHPMailer/class.phpmailer.php");
//include("../php/Funciones/PHPMailer/class.smtp.php");
//transporte tipo nacional/exportacion etc
if($_GET["acc"] == "ampliacion") // MOSTRAR: Formulario alerta de pendientes por facturar y/o aprobar
{
	$cli=$_GET['cli'];
	$coti=$_GET['coti'];
	$cuota=$_GET['cuota'];
	$resul=ObtenermaxcuotaM($coti);
	foreach($resul as $itemC){
		$cuo=$itemC['cuota'];
}
	//$cuota=$_GET['cuota'];
	$ObtenercotizacionesCab=Ver_CotizacionesC($cli,$coti);
	$Obtenercotizaciones=listaritemAmplCronoM($coti,$cuo);
//    $Obtenercotizaciones=listaritemswC($coti);

	include('../MVC_Vista/Cotizaciones/AmpliarCronograma.php');
}




if($_GET["acc"] == "Bandeja") // MOSTRAR: Formulario alerta de pendientes por facturar y/o aprobar
{
	
	$dni=$_GET['udni'];
	$sw=$_GET['sw'];
	if($sw=='1'){
	 $reporte=AlertaAvisoFacturarM();
	 include("../MVC_Vista/RepCotFac.php");
	}elseif($sw=='2'){
	 $reporte=AlertaAvisoCotiAproM();
	 include("../MVC_Vista/RepCotAprob.php");
	}else{
	 include("../MVC_Vista/contenidoV.php");
	}
	
}

// 
function ListaTipoRutaC(){ return  ListaTipoRutaM();}

if($_GET["acc"] == "Ap01") // MOSTRAR: Formulario Nuevo Registro
{
	$reporte=ListadiaC();
include('../MVC_Vista/Contabilidad/Aperturadia.php');
}
function ListadiaC(){ return  ListadiaM();}

if($_GET["acc"] == "procesar dias") // MOSTRAR: Formulario Nuevo Registro
{}

if($_GET["acc"] == "verprov") // MOSTRAR: Formulario Nuevo Registro
{
	$resulta=ListaProveedoresC($_GET['des']);
	include('../MVC_Vista/Cotizaciones/ListaProveedores.php');
}
if($_GET["acc"] == "verprov2") // MOSTRAR: Formulario Nuevo Registro
{
	$resulta=ListaProveedoresC($_REQUEST['des']);
	include('../MVC_Vista/Cotizaciones/ListaProveedores.php');
}
if($_GET["acc"] == "vercli2") // MOSTRAR: Formulario Nuevo Registro
{
	$resulta=listaclienteC($_REQUEST['des']);
	include('../MVC_Vista/Cotizaciones/ListaCliente.php');
}

if($_GET["acc"] == "vercliupdate") // MOSTRAR: Formulario Nuevo Registro
{
echo $tipop=$_GET['tipo'];
echo $doc=$_GET['doc'];
$idcli=$_GET['cli'];
$resul=VerClienteC($idcli);
include('../MVC_Vista/Cotizaciones/ActualizaCliente.php');

}
if($_GET["acc"] == "registrocli"){
	 
$TXTRUC=$_REQUEST['txtruc'];
if($_GET['doc']=='06'){
$cc_nruc=$_GET['ruc'];
//$razon=$_GET['soc'];/
$razon=str_replace("@","&",$_GET['soc']);
$cc_ndni=' ';
$cc_apat=' ';$cc_amat=' ';$cc_nomb=' ';$cc_nomb2=' ';
}else{$cc_nruc=$_GET['dni'];
$razon=$_GET['pat'].' '.$_GET['mat'].' '.$_GET['n1'].' '.$_GET['n2'];
$cc_apat=$_GET['pat'];$cc_amat=$_GET['mat'];$cc_nomb=$_GET['n1'];
$cc_ndni=$_GET['dni'];
}
if($_GET['n2']==''){
$cc_nomb2=' ';
}else{$cc_nomb2=$_GET['n2'];}
$cc_ruc='auotgenerado';$cc_razo=strtoupper($razon);$cc_nruc=$cc_nruc;
$cc_dir1=strtoupper($_GET['d1']);$cc_dir2=strtoupper($_GET['d2']);$cc_cdis=$_GET['dis'];
$cc_tele=$_GET['fono'];$cc_tfax='';$cc_emai=strtoupper($_GET['ema']);$cc_cven='000';$cc_czon='000';$cc_resp=strtoupper($_GET['con']);$cc_pago='00';$cc_ruca='';$cc_noma='';$cc_dira='';$cc_tela='';$cc_freg=date("d/m/Y");$cc_cate='01';$cc_swmon='1';$cc_ccul='000';$cc_ccan='00';$cc_ncom=strtoupper($razon);$cc_tcli=$_GET['tip'];$cc_tdoc=$_GET['doc'];
$CC_FCREA=date("d/m/Y H:i:s");
$cc_evta='00';$cc_esta='1';$cc_situd='C';$cc_lfer='0';$cc_ccor=' ';$cc_TOPE='';$cc_LCFER='0';$cc_FVLC='0';$cc_PAGOF='0';$cc_MBLOQ='0';$cc_IVTA='0';$cc_ARET='0';$cc_ICOB='0';$cc_DLFER='0';$cc_DLAGRO='0';$cc_SWINT='0';$cc_FVLCF='0';$c_codcia='01';$c_codtda='000';
$cc_pagof='00';


$cc_lsol='0';$cc_lnc='0';
$cc_CCLAS='D';$cc_CCOB='000';
$cc_CSEC='001';$cc_LVTAM='0';
$cc_CLNEG='C';

$busca=ValidaClienteC($cc_nruc);

if($busca!=NULL){
	$mensaje="Nro de Documento de Cliente Ya Existe...!";
		print "<script>alert('$mensaje')</script>";	
		$resulta=listaclienteC($TXTRUC);
		include('../MVC_Vista/Cotizaciones/ListaCliente.php');
	}else{
//**// genera nuevo id cliente
$secuencia=NroClienteC();
foreach($secuencia as $item){
	$cod=$item['cod'];
	}
$c1=substr($cod,7,4);
$c2=$c1+1;
$c3=str_pad($c2, 8, '0', STR_PAD_LEFT);
$codigo='CLI'.$c3;

//***// usuario que registro
$secuencia=UserRegCliC($_GET['udni']);
foreach($secuencia as $item){
	$codi=$item['login'];
	}
$cc_oper=$codi;
$CC_FVLC=date("d/m/Y");
$CC_FVLCF=date("d/m/Y");

$c_CodCert=$_GET['certi'];
$c_DetalleCert=$_GET['nrocerti'];

registraclienteC($codigo,ltrim(strtoupper($cc_razo)),$cc_nruc,ltrim($cc_dir1),ltrim($cc_dir2),$cc_cdis,
         $cc_tele,$cc_tfax,strtoupper($cc_emai),$cc_cven,$cc_czon,strtoupper($cc_resp),$cc_pago,
         $cc_ruca,$cc_noma,$cc_dira,$cc_tela,$cc_freg,$cc_oper,
         $cc_ndni,$cc_cate,$cc_swmon,$cc_ccul,$cc_ccan,strtoupper($cc_apat),strtoupper($cc_amat),
         strtoupper($cc_nomb),strtoupper($cc_nomb2),strtoupper($cc_ncom),$cc_tcli,$cc_tdoc,$cc_evta,$cc_esta,$cc_situd,$cc_lfer,$cc_ccor,$c_codcia,$c_codtda,$CC_FCREA,$cc_lsol,$cc_lnc,
$cc_CCLAS,$cc_CCOB,
$cc_CSEC,$cc_LVTAM,
$cc_CLNEG,$cc_pagof,$CC_FVLC,
$CC_FVLCF,$c_CodCert,strtoupper($c_DetalleCert));
		 $mensaje="Cliente Registrado Correctamente...!!!";
		 print "<script>alert('$mensaje')</script>";		
	     }
//20516556561	
}
function UserRegCliC($udni){ return UserRegCliM($udni);}
function NroClienteC(){ return  NroClienteM();}
function registraclienteC($cc_ruc,$cc_razo,$cc_nruc,$cc_dir1,$cc_dir2,$cc_cdis,
         $cc_tele,$cc_tfax,$cc_emai,$cc_cven,$cc_czon,$cc_resp,$cc_pago,
         $cc_ruca,$cc_noma,$cc_dira,$cc_tela,$cc_freg,$cc_oper,
         $cc_ndni,$cc_cate,$cc_swmon,$cc_ccul,$cc_ccan,$cc_apat,$cc_amat,
         $cc_nomb,$cc_nomb2,$cc_ncom,$cc_tcli,$cc_tdoc,$cc_evta,$cc_esta,
         $cc_situd,$cc_lfer,$cc_ccor,$c_codcia,$c_codtda,$CC_FCREA,$cc_lsol,$cc_lnc,
$cc_CCLAS,$cc_CCOB,
$cc_CSEC,$cc_LVTAM,
$cc_CLNEG,$cc_pagof,$CC_FVLC,
$CC_FVLCF,$c_CodCert,$c_DetalleCert){
			 $resultado=registraclienteM($cc_ruc,$cc_razo,$cc_nruc,$cc_dir1,$cc_dir2,$cc_cdis,
         $cc_tele,$cc_tfax,$cc_emai,$cc_cven,$cc_czon,$cc_resp,$cc_pago,
         $cc_ruca,$cc_noma,$cc_dira,$cc_tela,$cc_freg,$cc_oper,
         $cc_ndni,$cc_cate,$cc_swmon,$cc_ccul,$cc_ccan,$cc_apat,$cc_amat,
         $cc_nomb,$cc_nomb2,$cc_ncom,$cc_tcli,$cc_tdoc,$cc_evta,$cc_esta,
         $cc_situd,$cc_lfer,$cc_ccor,$c_codcia,$c_codtda,$CC_FCREA,$cc_lsol,$cc_lnc,
		 $cc_CCLAS,$cc_CCOB,
		 $cc_CSEC,$cc_LVTAM,
		 $cc_CLNEG,$cc_pagof,$CC_FVLC,
		 $CC_FVLCF,$c_CodCert,$c_DetalleCert);
} 
if($_GET["acc"] == "actualizarcli"){
$TXTRUC=$_REQUEST['txtruc'];
if($_GET['doc']=='06'){
$cc_nruc=$_GET['ruc'];
$x=str_replace("@","&",$_GET['soc']);
$razon=($x);

$cc_ndni=' ';
$cc_apat=' ';$cc_amat=' ';$cc_nomb=' ';$cc_nomb2=' ';
}else{$cc_nruc=$_GET['dni'];
$razon=$_GET['pat'].' '.$_GET['mat'].' '.$_GET['n1'].' '.$_GET['n2'];
$cc_apat=$_GET['pat'];$cc_amat=$_GET['mat'];$cc_nomb=$_GET['n1'];
$cc_ndni=$_GET['dni'];;
}
if($_GET['n2']==''){
$cc_nomb2=' ';
}else{$cc_nomb2=$_GET['n2'];}

$cc_ruc=$_GET['cli'];$cc_razo=$razon;$cc_nruc=$cc_nruc;$cc_dir1=$_GET['d1'];$cc_dir2=$_GET['d2'];$cc_cdis=$_GET['dis'];
$cc_tele=$_GET['fono'];$cc_tfax='';$cc_emai=$_GET['ema'];$cc_cven='000';$cc_czon='000';$cc_resp=$_GET['con'];$cc_pago='00';$cc_ruca='';$cc_noma='';$cc_dira='';$cc_tela='';$cc_freg=date("d/m/Y");$cc_cate='01';$cc_swmon='1';$cc_ccul='000';$cc_ccan='00';$cc_ncom=$razon;$cc_tcli=$_GET['tip'];$cc_tdoc=$_GET['doc'];
$CC_FCREA=date("d/m/Y H:i:s");
$cc_evta='00';$cc_esta='1';$cc_situd='C';$cc_lfer='0';$cc_ccor=' ';$cc_TOPE='';$cc_LCFER='0';$cc_FVLC='0';$cc_PAGOF='0';$cc_MBLOQ='0';$cc_IVTA='0';$cc_ARET='0';$cc_ICOB='0';$cc_DLFER='0';$cc_DLAGRO='0';$cc_SWINT='0';$cc_FVLCF='0';$c_codcia='01';$c_codtda='000';
$cc_pagof='00';
$cc_lsol='0';$cc_lnc='0';
$cc_CCLAS='D';$cc_CCOB='000';
$cc_CSEC='001';$cc_LVTAM='0';
$cc_CLNEG='C';
//***// usuario que registro
$secuencia=UserRegCliC($_GET['udni']);
foreach($secuencia as $item){
	$codi=$item['login'];
	}
$cc_oper=$codi;
$CC_FVLC=date("d/m/Y");
$CC_FVLCF=date("d/m/Y");
$cc_date=date("d/m/Y H:i:s");
$c_CodCert=$_GET['certi'];
$c_DetalleCert=$_GET['nrocerti'];


ActualizaclienteC($cc_ruc,strtoupper($cc_razo),$cc_dir1,$cc_dir2,$cc_cdis,$cc_tele,strtoupper($cc_emai),$cc_czon,strtoupper($cc_resp),$cc_apat,$cc_amat,$cc_nomb,$cc_nomb2,$cc_ncom,$cc_oper,$cc_date,$c_CodCert,strtoupper($c_DetalleCert));	
		 $mensaje="Cliente Actualizado Correctamente...!!!";
		 print "<script>alert('$mensaje')</script>";

}

function ActualizaclienteC($cc_ruc,$cc_razo,$cc_dir1,$cc_dir2,$cc_cdis,$cc_tele,$cc_emai,$cc_czon,$cc_resp,$cc_apat,$cc_amat,$cc_nomb,$cc_nomb2,$cc_ncom,$cc_oper,$cc_date,$c_CodCert,$c_DetalleCert){$resul= ActualizaclienteM($cc_ruc,$cc_razo,$cc_dir1,$cc_dir2,$cc_cdis,$cc_tele,$cc_emai,$cc_czon,$cc_resp,$cc_apat,$cc_amat,$cc_nomb,$cc_nomb2,$cc_ncom,$cc_oper,$cc_date,$c_CodCert,$c_DetalleCert);}

function ValidaClienteC($cc_nruc){ return  ValidaClienteM($cc_nruc);}

function ListaTipPersonaC(){	return  ListaTipPersonaM();	}
//function VerClienteM($idcli){

function VerClienteC($idcli){ return  VerClienteM($idcli);}

if($_GET["acc"] == "r01") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
}
if($_GET["acc"] == "rdet01") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_GET['cod'];
	$coti=$_GET['coti'];
	$ImpresionCotizaciones=Ver_CotizacionesAC($_GET['cod'],$_GET['coti']);
	$impresionFactura=buscarcotifactC($coti);
	$impresionguia=buscaguiaC($coti);
	include('../MVC_Vista/Cotizaciones/Detalle_Cotizacion.php');	
//	include('../MVC_Vista/Cotizaciones/pruebas.php');
}
function buscarcotifactC($coti){ return  buscarcotifactM($coti);}
function buscaguiaC($coti){ return  buscaguiaM($coti);}
if($_GET["acc"] == "rdet02") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_GET['cod'];
	$coti=$_GET['coti'];
	$ImpresionCotizaciones=Ver_CotizacionesAC($_GET['cod'],$_GET['coti']);
	include('../MVC_Vista/Cotizaciones/LiberarCotizacion.php');	
//	include('../MVC_Vista/Cotizaciones/pruebas.php');
}

function Ver_CotizacionesAC($cli,$coti){ return  Ver_CotizacionesAM($cli,$coti);}
if($_GET["acc"] == "vercoti") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_GET['cod'];
	$coti=$_GET['coti'];
	$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);
	include('../MVC_Vista/Cotizaciones/actualizacotizaciones.php');	

	//include('../MVC_Vista/Cotizaciones/print/print1.php');	
}


if($_GET["acc"] == "vercoti2") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_GET['cod'];
	$coti=$_GET['coti'];
	$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);
	include('../MVC_Vista/Cotizaciones/Generarcotizacion.php');	
}
if($_GET['acc']=='updateitemcobro'){
	
	$coti=$_REQUEST['coti'];
	$cli=$_REQUEST['cli'];
	UpdatecronogramalimpiaiteC($id,$coti);  //SI HAY ERROR COMENTAR ESTO
	for($i=1;$i<=200;$i++){
	$id=$_REQUEST['sel'.$i];
	$finicio=$_REQUEST['finicio'.$i];
	$ffin=$_REQUEST['ffin'.$i];
	 
	  if($id!='')	{ //pregunto si el check esta activo  //INICIO SI HAY ERROR COMENTAR ESTO
		UpdatecronogramaiteC($id,$coti,$finicio,$ffin);
		}//fin if										  //FIN SI HAY ERROR COMENTAR ESTO
	} // fin for

	$ObtenercotizacionesCab=Ver_CotizacionesC($cli,$coti);
    $Obtenercotizaciones=listaritemswC($coti);
	include('../MVC_Vista/Cotizaciones/RegistrarRenovacion.php');
	//UpdatecronogramaiteRC($id,$coti);	
}// fin accion

function UpdatecronogramalimpiaiteC($id,$coti){ $resul= UpdatecronogramalimpiaiteM($id,$coti);}

function listaritemswC($coti){ return  listaritemswM($coti);}
function UpdatecronogramaiteC($id,$coti,$finicio,$ffin){ $resul=UpdatecronogramaiteM($id,$coti,$finicio,$ffin);}
function UpdatecronogramaiteRC($id,$coti,$finicio,$ffin){ $resul=UpdatecronogramaiteRM($id,$coti,$finicio,$ffin);}
if($_GET["acc"] == "cobroalq") // MOSTRAR: Formulario Nuevo Registro Obtenercotizaciones
{
	$cli=$_GET['cod'];
	$coti=$_GET['coti'];
	$ObtenercotizacionesCab=Ver_CotizacionesC($cli,$coti);
	//$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);
	
	
	
	include('../MVC_Vista/Cotizaciones/RegistrarRenovacion.php');	
}
if($_GET['acc']=='updatecobro'){
    $coti=$_REQUEST['coti'];
	$cli=$_REQUEST['cli'];
	$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$verreportecronograma=Ver_cronogramaC($_REQUEST['coti']);
	foreach($verreportecronograma as $itemcr){
	$xcoti=$itemcr['c_nroped'];
	$nidreg=$itemcr['n_idreg'];
	if($xcoti!=NULL){
	$buscafact=buscarcotifactC($xcoti);
	foreach($buscafact as $itemfac){	
		$nrofact=$itemfac['PE_NDOC'];
		$nrocoti=$itemcr['c_nroped'];
		$xxx=$nrofact.'-'.$nrocoti;
		$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
// Se define la cadena de conexión
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conexón con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876' );
if (!$cid) { exit( "Error al conectar: " . $cid);
}
$sql="update pedi_cronograma set c_nrofac='$nrofact' where c_nroped='$nrocoti'";
	$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
		//UpdateCronogramaFactC($factura,$nrocoti);				
			}
		}
	}
$mensaje="Se Actualizo Correctamente Vuelva a Ingresar";
include('../MVC_Vista/Cotizaciones/printcrono.php');	
}

function UpdateCronogramaFactC($factura,$coti){ $resul=UpdateCronogramaFactM($factura,$coti);}

if($_GET["acc"] == "vercotipdf") // MOSTRAR: Formulario Nuevo Registro
{
	 $cli=$_GET['cod'];
	 $coti=$_GET['coti'];
	 $c_nomcli=$_GET['cli'];
	 $c_desgral=($_GET['gral']);
	 $c_obsped=($_GET['obs']);
	//$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	//$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);*/
	include('../MVC_Vista/Cotizaciones/print/verpdf.php');	
}

if($_GET["acc"] == "rep05") // MOSTRAR: Formulario Nuevo Registro
{

if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}


	
	$f1=$_REQUEST['textfield'];
	$f2=$_REQUEST['textfield2'];

		//$fecha = '2011-05-20'; //20-05-2011  04/05/2013
$variable = explode ('/',$f1); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha1 = $variable [1].-$variable [0].-$variable [2];
$variable2 = explode ('/',$f2); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha2 = $variable2 [1].-$variable2 [0].-$variable2 [2];
$sw=$_REQUEST["radio2"];
	
$estado=$_REQUEST['estado'];

$reporte=Listar_CotizacionesGeneralC($fecha1,$fecha2,$sw,$estado);
	
	include('../MVC_Vista/Cotizaciones/ListaCotizacionGeneral.php');
	
}

function Listar_CotizacionesGeneralC($fecha1,$fecha2,$sw,$estado){ return Listar_CotizacionesGeneralM($fecha1,$fecha2,$sw,$estado);}


if($_GET["acc"] == "rep01") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_REQUEST['codcli'];
	$sw=$_REQUEST['radio2'];
	$ff=$_REQUEST['cli'];
	$asunto=$_REQUEST['asunto'];
	$coti=$_REQUEST['cotiz'];
	$forwarder=$_REQUEST['forwarder'];
	
if($sw=='1'){
$reporte=Listar_CotizacionesC($cli,$ff,$sw);
	//$reporte2=Listar_CotizacionesAprobadasC($cli,$ff,$sw);
	}
	if($sw=='2'){
		
$reporte=listar_CotizacionesAsuntoC($asunto);
		}
	if($sw=='3'){
		
		//echo $cot;
$reporte=Listar_CotizacionesxNroC($coti,$ff,$sw);
	//$reporte2=Listar_CotizacionesxNroAprobadaC($coti,$ff,$sw);	
			
			}
			
			if($sw=='4' && $forwarder!=""){	
		
$reporte=Listar_CotizacionesForwarderM($forwarder);	
			
			}
	
	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
	
}



function Listar_CotizacionesxNroC($coti,$ff,$sw){ return Listar_CotizacionesxNroM($coti,$ff,$sw);}
function Listar_CotizacionesxNroAprobadaC($coti,$ff,$sw){ return Listar_CotizacionesxNroAprobadaM($coti,$ff,$sw);}
if($_GET["acc"] == "repcot4") // MOSTRAR: Formulario Nuevo Registro
{include('../MVC_Vista/Cotizaciones/ListaCotizacionesAprobadas.php');}
if($_GET["acc"] == "repcot5") // MOSTRAR: Formulario Nuevo Registro
{include('../MVC_Vista/Cotizaciones/ListaCotizacionGeneral.php');}

if($_GET["acc"] == "repcotiaprobada") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_REQUEST['codcli'];
	$sw=$_REQUEST['radio2'];
	$ff=$_REQUEST['cli'];
	$asunto=$_REQUEST['asunto'];
	
	if($sw=='1'){
	$reporte=Listar_CotizacionesAprobadasC($cli,$ff,$sw);
	}else{
		
			//$reporte=listar_CotizacionesAsuntoC($asunto);
		}
	
	include('../MVC_Vista/Cotizaciones/ListaCotizacionesAprobadas.php');
	
}


if($_GET["acc"] == "rep02") // MOSTRAR: Formulario Nuevo Registro
{
	$cli=$_REQUEST['codcli'];
	$sw=$_REQUEST['radio2'];
	$ff=$_REQUEST['cli'];
	$usuario=$_REQUEST['usuario'];
	$reporte=listar_CotizacionesUsuarioC($usuario);
	include('../MVC_Vista/Cotizaciones/Lista_Cotizaciones_usuario.php');
	/*if($sw=='1'){
	$reporte=Listar_CotizacionesC($cli,$ff,$sw);
	}else{
		
			$reporte=listar_CotizacionesAsuntoC($asunto);
		}
	
	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');*/
	
}
function listar_CotizacionesUsuarioC($user){ return listar_CotizacionesUsuario($user);}


if($_GET["acc"] == "repcoti01") // MOSTRAR: Formulario Nuevo Registro
{
	
	
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}


	
	$f1=$_REQUEST['textfield'];
	$f2=$_REQUEST['textfield2'];

		//$fecha = '2011-05-20'; //20-05-2011  04/05/2013
$variable = explode ('/',$f1); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha1 = $variable [1].-$variable [0].-$variable [2];
$variable2 = explode ('/',$f2); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha2 = $variable2 [1].-$variable2 [0].-$variable2 [2];
$sw=$_REQUEST["sw"];
	$reporte=Listar_Cotizaciones2C($fecha1,$fecha2,$sw);
	include('../MVC_Vista/Cotizaciones/ReporteCoti.php');
	
}


function Listar_Cotizaciones2C($f1,$f2,$sw){ return Listar_Cotizaciones2M($f1,$f2,$sw);}


if($_GET["acc"] == "c01") // MOSTRAR: Formulario Nuevo Registro
{
	
	$udni=$_REQUEST['udni'];
	$tipcambio=ListatipocambioC();
	$listcontweb=listaderivacionxusuarioM($udni);
	if($listcontweb!=NULL){
		$lstcontweb=listaderivacionxusuarioM($udni);
		}
	
	if($tipocambio!=NULL){
		$mensaje="No Se puede Ingresar No Hay Tipo Cambio Registrado Actual";
		print "<script>alert('$mensaje')</script>";
			}else{
			include('../MVC_Vista/Cotizaciones/RegCotizaciones.php');
			}
	
		
}

if($_GET["acc"] == "c02") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/TipoCambioSunat.php');	
	//$sql="select * from cabdet='258' and modcab=258";
	//$sql="update set pis='123' where detguia='w'";
}

if($_GET["acc"] == "c03") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/rutas.php');
}

if($_GET["acc"] == "c04") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/varios.php');
}

/*if($_GET["acc"] == "c05") // MOSTRAR: Formulario Nuevo Registro
{*///include('../MVC_Vista/Cotizaciones/alquileres.php');}

/*if($_GET["acc"] == "verglosa") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/demo02.php');
	
	include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}*/

if($_GET["acc"] == "vercli") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_clientes.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}

if($_GET["acc"] == "verccodigos") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_codigos.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "verccodigosR") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_codigosR.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "verccodigosGUIA") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_codigosguia.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "verccodigosD") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_codigosD.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "verccodigosEIR") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_codigosEIR.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "framecli") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}

if($_GET["acc"] == "framecodigosguia") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_codigosguia.php');
}
if($_GET["acc"] == "framecodigos") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_codigos.php');
}
if($_GET["acc"] == "framecodigosR") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_codigosR.php');
}
if($_GET["acc"] == "framecodigosD") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_codigosD.php');
}
if($_GET["acc"] == "framecodigosEIR") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_codigosEIR.php');
}


if($_GET["acc"] == "frameprov") // MOSTRAR: Formulario Nuevo Registro
{
	
	include('../MVC_Vista/Cotizaciones/frame_prov.php');
}

if($_GET["acc"] == "framecli2") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_cliente2.php');
}
if($_GET["acc"] == "clicauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = BusquedaautoC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["CC_COD"];
		$razon = utf8_encode($item["CC_RAZO"]);
		$rucdni =$item["CC_NRUC"];
		$dir =utf8_encode($item["CC_DIR1"]);
		$telefono=$item["CC_TELE"];
		$email=$item["CC_EMAI"];
		$respo=$item["CC_RESP"];
		$decod=$cod.' '.$razon;
		echo "$decod|$cod|$razon|$rucdni|$dir|$telefono|$respo|$email\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

if($_GET["acc"] == "cliasunto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = listar_CotizacionesAsuntoC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		//$cod =   $item["c_asunto"];
		$razon = utf8_encode($item["c_asunto"]);
		/*$rucdni =$item["CC_NRUC"];
		$dir =utf8_encode($item["CC_DIR1"]);
		$telefono=$item["CC_TELE"];
		$email=$item["CC_EMAI"];
		$respo=$item["CC_RESP"];*/
		$decod=$razon;
		echo "$razon\n";
		//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
function listar_CotizacionesAsuntoC($asunto){ return listar_CotizacionesAsunto($asunto);}

if($_GET["acc"] == "proveauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = BusquedaautoproveC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["pr_nruc"];
		$razon = utf8_encode($item["pr_razo"]);
		$decod=$cod.' '.$razon;
		$con1=$item["pr_placa"]; //placa
		$con2=$item["pr_chofer"]; //chofer
		$con3=$item["pr_licencia"]; //licencia
		$con4=$item["pr_marca"]; //licencia
		

		echo "$decod|$cod|$razon|$con1|$con2|$con3|\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}


if($_GET["acc"] == "autotransportista") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = BuscaChoferC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$chofer = $item["c_chofer"];
		$brevete=$item["c_brevete"];
		$placa=$item["c_placa"];
		
		echo "$chofer|$brevete|$placa\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
function BuscaChoferC($id){ return  BuscaChoferM($id);}


if($_GET["acc"] == "variosauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = ListaCotiVariosCotiAC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$titulo =   $item["titulo"];
		$des=$item["descripcion"];
		$decod=$titulo;
		echo "$decod|$titulo|$des\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
function BusquedaautodescripcionCOTIzC($descripcion){ return  BusquedaautodescripcionCOTIzM($descripcion);}

if($_GET["acc"] == "XXXXproautocoti") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; //busqueda cotizacion en lista de precios lpreciosd.
 $busquedapacienteauto = BusquedaautodescripcionCOTIzC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod  =  $item["IN_CODI"];
		$desc =  $item["IN_ARTI"];
		$pre  =  $item["IN_PLIST"];
		$uni  =  $item["KILOLIT"];
		$des  =  $item['c_desc'];
		$x    =  substr($des,4,20);
		$y    =  ltrim($x);
		//$dir =$item["CC_DIR1"];
		$tip=$item["tp_codi"];
		//$dir =$item["CC_DIR1"];
		$decod=$cod.' '.$desc.' '.$des;
		echo "$decod|$cod|$desc|$pre|$uni|$tip|$y\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

if($_GET["acc"] == "proauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; busqueda descrip de productos no inluida en lista de precios
 $busquedapacienteauto = BusquedaautodescripcionC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["IN_CODI"];
		$desc = $item["IN_ARTI"];
		$pre =$item["IN_PLIST"];
		$uni =$item["KILOLIT"];
		$des=$item['c_desc'];
		//$dir =$item["CC_DIR1"];
$tip=$item["tp_codi"];
		//$dir =$item["CC_DIR1"];
		$decod=$cod.' '.$desc.' '.$des;
		echo "$decod|$cod|$desc|$pre|$uni|$tip\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

//ORIGINAL AUTOCOMPLETADO
if($_GET["acc"] == "proautocoti") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $sw=$_GET["sw"];
 //
 $busquedapacienteauto = BusquedaautodescripcioncotiC($texto,$sw);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["IN_CODI"];
		$desc = utf8_decode($item["IN_ARTI"]);
		$pre =$item["IN_PLIST"];
		$uni =$item["KILOLIT"];
		$clase=$item["COD_TIPO"];
		//$dir =$item["CC_DIR1"];
		$decod=utf8_encode($desc);
		echo "$decod|$cod|$desc|$pre|$uni|$clase\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}





if($_GET["acc"] == "proautoguia") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = BusquedaautodescripcionC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["IN_CODI"];
		$desc = $item["IN_ARTI"];
		$pre =$item["IN_STOK"];
		$uni =$item["KILOLIT"];
		
		//$dir =$item["CC_DIR1"];
	//	$decod=$cod.'|'.$desc.'|'.$pre;
		$decod=$desc;
		echo "$decod|$cod|$desc|$pre|$uni\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}


if($_GET["acc"] == "tareasauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = ListaTareasC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["c_numitm"];
		$desc = $item["c_desitm"];
		$pre =$item["n_valitm"];
	
		//$dir =$item["CC_DIR1"];
		$decod=$cod.' '.$desc;
		echo "$decod|$cod|$desc|$pre|$uni\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

if($_GET["acc"] == "grutas") // MOSTRAR: Formulario Nuevo Registro
{
	$r_id='';
	$r_origen=strtoupper($_REQUEST['textfield']);
	$r_destino=strtoupper($_REQUEST['textfield2']);
	$r_kilometraje=$_REQUEST['textfield3'];
	$r_precio=$_REQUEST['textfield4'];
	$r_estado='1';
	RutasGuardarC($r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado);

$mensaje="Datos Registrados Correctamente";
		print "<script>alert('$mensaje')</script>";
	include('../MVC_Vista/Cotizaciones/rutas.php');
}
if($_GET["acc"] == "arutas") // MOSTRAR: Formulario Nuevo Registro
{
	RutasListaC();
	include('../MVC_Vista/Cotizaciones/actualizarutas.php');
	
}
if($_GET["acc"] == "acturutas") // MOSTRAR: Formulario Nuevo Registro
{
	$r_id=$_REQUEST['hiddenField'];
	$r_origen=strtoupper($_REQUEST['textfield']);
	$r_destino=strtoupper($_REQUEST['textfield2']);
	$r_kilometraje=$_REQUEST['textfield3'];
	$r_precio=$_REQUEST['textfield4'];
	$r_estado='1';
	RutasActualizaC($r_id,$r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado);
$mensaje="Datos Actualizados Correctamente";
		print "<script>alert('$mensaje')</script>";
	include('../MVC_Vista/Cotizaciones/rutas.php');
}
function RutasGuardarC($r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado){
	$resultado=RutasGuardarM($r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado);
}
function RutasActualizaC($r_id,$r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado){
	$resultado=RutasActualizaM($r_id,$r_origen,$r_destino,$r_kilometraje,$r_precio,$r_estado);
	}	
if($_GET["acc"] == "guardacoti") // GUARDAR COTIZACION
{	


$secuencia=NropedidoC();
if($secuencia!=NULL)
{
	foreach ($secuencia as $item)
	{
		$secuencialpedido = $item["cod"]+1;
		}
}	
$secuencia2=Nropedido2C();
if($secuencia2!=NULL)
{
	foreach ($secuencia2 as $item)
	{
		$secuencialidreg = $item["cod"]+1;
		}
}		

/*15 04 2014*/
$c_gencrono=$_REQUEST['gencrono'];
$c_codtit=$_REQUEST['codtitulo'];
$c_swfirma=$_REQUEST['c_swfirma'];
/**/

$c_tippeddetalle=$_REQUEST['clase1'];
$nroped=substr($secuencialpedido,4,8);

$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$c_numpd=$nroped;
$c_codcli=$_REQUEST['hc'];$c_nomcli=$_REQUEST['razon'];$c_contac=strtoupper($_REQUEST['contacto']);$c_telef=$_REQUEST['telefono'];
$c_nextel=$_REQUEST['nextel'];$c_email=strtoupper($_REQUEST['correo']);$c_asunto=strtoupper($_REQUEST['asunto']);$c_codven=$_REQUEST['vendedor'];
$d_fecped=$_REQUEST['fecha'];$d_fecvig=$_REQUEST['xfecha'];$c_tipped=$_REQUEST['tipo'];$n_bruto=$_REQUEST['st'];$n_dscto=$_REQUEST['descuento'];
$n_neta=$_REQUEST['bi'];$n_neti=$_REQUEST['bi'];$n_facisc='0';
$n_swint='0';$n_tasigv='18';
$n_totigv='0';
$n_totped=$_REQUEST['bi'];
$n_tcamb=$_REQUEST['prueba'];$c_codmon=$_REQUEST['moneda'];$c_codpga=$_REQUEST['plazo'];
$c_codpgf=$_REQUEST['plazo'];
$c_estado='0';

$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));

$d_fecent=$_REQUEST['fecha'];$c_lugent=$_REQUEST['lugar'];
$n_swtendv='0';$n_swtfac='0';$n_swtapr='0';$d_fecapr='';
$c_uaprob=$_REQUEST['vendedor'];$c_motivo=$_REQUEST['observacion'];$n_idreg=$secuencialidreg;$n_id='87';
$d_fecrea=date("d/m/Y");$c_opcrea=$_REQUEST['codvendedor'];$d_fecreg='';$c_oper='';
$c_precios=strtoupper($_REQUEST['C_PRECIOS']);$c_tiempo=strtoupper($_REQUEST['tiempo']);$c_validez=strtoupper($_REQUEST['validez']);

$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));


$c_tipocoti=$_REQUEST['tipo'];
$xc_desgral=nl2br(utf8_decode(strip_tags($_REQUEST['area2'])));
$xc_obsped=nl2br(utf8_decode(strip_tags($_REQUEST['area3'])));


if($c_precios=='001'){
	$b_inlgv=0;
	
	}else{
			$b_inlgv=1;
		}

GuardaPedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma);
////***FIN CABECERA***///
////***INICIO DETALLE***///
$i = 1;
$ztotal=0;
	do{
	//$IdTar=$_POST['codigo'.$i];
$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$n_item=$i;$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);$c_codund='';
$c_descr2=strtoupper($_REQUEST['glosa'.$i]);
$n_canprd=$_REQUEST['cantidad'.$i];
$c_clasedet=$_REQUEST['clase'.$i];
/*GUARDAR PRECIO UNITARIO (SIN IGV)*/
//$n_preprd=($_REQUEST['precio'.$i])*($_REQUEST['cantidad'.$i]);
$precio=$_REQUEST['precio'.$i];
$preuni=$precio;
$n_preprd=$preuni;
/*fin*/
$n_dscto=$_REQUEST['dscto'.$i];
$n_prelis='0';
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
//$precioigv=$_REQUEST['precio'.$i]*1.18;

$n_prevta=($precio)*1.18;
/*fin*/
$n_precrd='0';
$n_costo='0';$n_apbpre='0';$c_usuapb='';$c_fecapb='12/09/2011';
/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio-$n_dscto)*$n_canprd;
$n_totimp=$total;
/*fin*/

$ztotal+=$n_totimp;
$c_canfac="0";$n_canbaj="0";$c_codafe="001";
$c_codlp="0011";$c_tiprec="N";$n_intprd="0";$c_obsdoc=strtoupper($_REQUEST['glosa'.$i]);
$c_codcla="";$n_idreg=$secuencialidreg;$n_id='';$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_REQUEST['codvendedor'];$b_glosa=strtoupper($_REQUEST['glosa'.$i]);
if($c_codprd != "")
		{
GuardaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
,$n_canprd,$n_preprd,$n_dscto
,$n_prelis,$n_prevta,$n_precrd,$n_costo ,$c_clasedet/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2);
$i +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);
/*$mensaje="COTIZACION GENERADA CORRECTAMENTE";
		print "<script>alert('$mensaje')</script>";*/
///** PARA LA IMPRESION DEL DOCUMENTO **//
	$cli=$_REQUEST['hc'];
	$coti=$secuencialpedido;
	TotalPedidoC($ztotal,$ztotal,$ztotal,$ztotal,$c_numped);
	//$ImpresionCotizaciones=Ver_CotizacionesC($cli,$coti);
//		include('../MVC_Vista/Cotizaciones/Detalle_Cotizacion.php');	
include('../MVC_Vista/Cotizaciones/imprenov.php');	
//include('../MVC_Vista/Cotizaciones/print/imprimircoti.php');
	//include('../MVC_Vista/Cotizaciones/rutas.php');	
}


function TotalPedidoC($n_bruto,$n_neta,$n_neti,$n_totped,$c_numped){
	$resu=TotalPedidoM($n_bruto,$n_neta,$n_neti,$n_totped,$c_numped);
}

function validaCotiAproC($coti){ return validaCotiAproM($coti); }
if($_GET["acc"] == "updatecoti") // GUARDAR COTIZACION
{	



//**validacion de cotizacion si esta aprobada ya no se puede actualizar.*//
$nrocotizacion=$_REQUEST['doc'];
$valida=validaCotiAproC($nrocotizacion);
if($valida==NULL){


/*15 04 2014*/
$c_gencrono=$_REQUEST['gencrono'];
$c_codtit=$_REQUEST['codtitulo'];
$c_swfirma=$_REQUEST['c_swfirma'];
/**/
/*04/07/2014*/
$c_meses=$_REQUEST['meses'];
/*10/07/2014*/
$c_aprvend=$_REQUEST['c_aprvend'];

$c_tippeddetalle=$_REQUEST['clase1'];
$c_numped=$_REQUEST['doc'];$c_codcia='01';$c_codtda='000';
$firgere=$_REQUEST['firmagerencial'];
$nroped=substr($c_numped,4,8);

$c_numpd=$nroped;
$c_codcli=$_REQUEST['hc'];$c_nomcli=$_REQUEST['razon'];$c_contac=strtoupper($_REQUEST['contacto']);$c_telef=$_REQUEST['telefono'];
$c_nextel=$_REQUEST['nextel'];$c_email=strtoupper($_REQUEST['correo']);$c_asunto=strtoupper($_REQUEST['asunto']);$c_codven=$_REQUEST['vendedor'];
$d_fecped=$_REQUEST['fecha'];$d_fecvig=$_REQUEST['xfecha'];$c_tipped=$_REQUEST['tipo'];$n_bruto=$_REQUEST['st'];$n_dscto=$_REQUEST['descuento'];
$n_neta=$_REQUEST['bi'];$n_neti=$_REQUEST['bi'];$n_facisc='0';
$n_swint='0';$n_tasigv='18';

$n_totigv='0';
$n_totped=$_REQUEST['bi'];
$n_tcamb=$_REQUEST['prueba'];$c_codmon=$_REQUEST['moneda'];$c_codpga=$_REQUEST['plazo'];
$c_codpgf=$_REQUEST['plazo'];
$c_estado='0';



$d_fecent=$_REQUEST['fecha'];$c_lugent=$_REQUEST['lugar'];
$n_swtendv='0';$n_swtfac='0';$n_swtapr='0';$d_fecapr='';
$c_uaprob=$_REQUEST['vendedor'];$c_motivo=$_REQUEST['observacion'];$n_idreg=$_REQUEST['n_idreg'];$n_id='87';
$d_fecrea='';$c_opcrea='';$d_fecreg==$_REQUEST['d_fecreg'];$c_oper=$_REQUEST['codvendedor'];
$c_precios=strtoupper($_REQUEST['zprecio']);$c_tiempo=strtoupper($_REQUEST['tiempo']);$c_validez=$_REQUEST['validez'];

$c_desgral=nl2br(strip_tags(utf8_decode($_REQUEST['area2'])));
//nl2br(utf8_decode(strip_tags
$c_obsped=nl2br(strip_tags(utf8_decode($_REQUEST['area3'])));

/*if($_REQUEST['checkbox2']=='1'){
$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
}else{ $c_obsped=(utf8_decode($_GET['obs']));}

if($_REQUEST['checkbox']=='1'){
$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
}else{ $c_desgral=(utf8_decode($_GET['gral']));}
$xc_desgral=nl2br(strip_tags($_REQUEST['area2']));
$xc_obsped=nl2br(strip_tags($_REQUEST['area3']));*/
if($c_precios=='001'){
	$b_inlgv=0;
	
	}else{
			$b_inlgv=1;
		}
		

UpdatePedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,
$n_facisc,$n_swint,$n_tasigv

,$n_totigv,
$n_totped,$n_tcamb,$firgere
,$c_codmon,$c_codpga,$c_codpgf,$c_estado
,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv
,$n_swtfac,$n_swtapr
,$c_uaprob,$c_motivo,$n_idreg,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$c_meses,$c_aprvend);
////***FIN CABECERA***///


////***INICIO DETALLE***///
///primero eliminamos
EliminarPedidoDetC($_REQUEST['doc']);


$secuencia2=Nropedido2C();
if($secuencia2!=NULL)
{
	foreach ($secuencia2 as $item)
	{
		$secuencialidreg = $item["cod"]+1;
		}
}	
////***INICIO DETALLE***///

	//do{
		$j=1;
		$ytotal=0;
for($i=1;$i<=100;$i++){
	//$IdTar=$_POST['codigo'.$i];
$c_numped=$c_numped;$c_codcia='01';$c_codtda='000';$n_item=$j;$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);$c_codund='';
$c_descr2=strtoupper(utf8_encode($_REQUEST['glosa'.$i])); ///ACTUALIZAR CON TILDES Y Ñ
$n_canprd=$_REQUEST['cantidad'.$i];

$n_preprd=$_REQUEST['precio'.$i];
$n_dscto=$_REQUEST['dscto'.$i];
$n_prelis='0';
$c_clasedet=$_REQUEST['clase'.$i];

//$n_prevta=$_REQUEST['precio'.$i];


/*GUARDAR PRECIO UNITARIO (SIN IGV)*/


//$n_preprd=($_REQUEST['precio'.$i])*($_REQUEST['cantidad'.$i]);
$precio=$_REQUEST['precio'.$i];
$preuni=$precio;
$n_preprd=$preuni;
/*fin*/
$n_dscto=$_REQUEST['dscto'.$i];
$n_prelis='0';
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
//$precioigv=$_REQUEST['precio'.$i]*1.18;
$n_prevta=($precio)*1.18;
/*fin*/
$n_precrd='0';
$n_costo='0';$n_apbpre='0';$c_usuapb='';$c_fecapb='12/09/2011';
/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio-$n_dscto)*$n_canprd;
$n_totimp=$total;
/*fin*/

$n_precrd='0';
//$n_costo='0';$n_apbpre='1';$c_usuapb='';$c_fecapb='12/09/2011';
//$n_totimp=$_REQUEST['imp'.$i];
$c_canfac="0";$n_canbaj="0";$c_codafe="001";
$c_codlp="0011";$c_tiprec="N";$n_intprd="0";$c_obsdoc=strtoupper($_REQUEST['glosa'.$i]);
$c_codcla="";$n_idreg=$secuencialidreg;$n_id='';$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_POST['codvendedor'];$b_glosa=strtoupper($_REQUEST['glosa'.$i]);
$xfini=$_REQUEST['fini'.$i];
$xffin=$_REQUEST['ffin'.$i];
$c_codcont=$_REQUEST['codequipo'.$i];
if($c_desprd!= "")
		{
GuardaPedidoDetAC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
,$n_canprd,$n_preprd,$n_dscto
,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_clasedet/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$xfini,$xffin,$c_codcont);

//updatedetpedifechasC($xfini,$xffin,$c_numped);


$j=$j+1;
$ytotal+=$n_totimp;


		//$seguir = true;

		//$seguir = false;
		}
	}
	$cli=$_REQUEST['hc'];
	$coti=$c_numped;
	TotalPedidoC($ytotal,$ytotal,$ytotal,$ytotal,$c_numped);
	
	if($c_aprvend=='1'){
	//include('../MVC_Vista/Cotizaciones/AlertaAprueba.php');
	}elseif($firgere=='1'){
	
		include('../MVC_Vista/Cotizaciones/print/imprimircotiupdate2.php');
	 	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
		}else{
			
			
			//hoy 09/05/2015
		//	include('../MVC_Vista/Cotizaciones/imprenov.php');
		include('../MVC_Vista/Cotizaciones/print/imprimircotiaupdate.php');	
		//include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
		}
	
	}else{
		
	$mensaje="COTIZACION ESTA APROBADA NO SE PUEDE ACTUALIZAR";
	print "<script>alert('$mensaje')</script>";

		}


	
}
function GuardaPedidoDetAC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo ,$c_tipped,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$xfini,$xffin,$c_codcont){
	$result=GuardaPedidoDetAM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo ,$c_tipped,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$xfini,$xffin,$c_codcont);}
function updatedetpedifechasC($xfini,$xffin,$c_numped){ 
$resul=updatedetpedifechasM($xfini,$xffin,$c_numped);}
if($_GET["acc"] == "guardacotigenerada") // GUARDAR COTIZACION
{	
/*15 04 2014*/
$c_gencrono=$_REQUEST['gencrono'];
$c_codtit=$_REQUEST['codtitulo'];
$c_swfirma=$_REQUEST['c_swfirma'];
/**/
$secuencia=NropedidoC();
if($secuencia!=NULL)
{
	foreach ($secuencia as $item)
	{
		$secuencialpedido = $item["cod"]+1;
	}
}	
$c_tippeddetalle=$_REQUEST['clase1'];
$secuencia2=Nropedido2C();
if($secuencia2!=NULL)
{
	foreach ($secuencia2 as $item)
	{
		$secuencialidreg = $item["cod"]+1;
		}
}		
$nroped=substr($secuencialpedido,4,8);
$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$c_numpd=$nroped;
$c_codcli=$_REQUEST['hc'];$c_nomcli=$_REQUEST['razon'];$c_contac=strtoupper($_REQUEST['contacto']);$c_telef=$_REQUEST['telefono'];
$c_nextel=$_REQUEST['nextel'];$c_email=strtoupper($_REQUEST['correo']);$c_asunto=strtoupper($_REQUEST['asunto']);$c_codven=$_REQUEST['vendedor'];
$d_fecped=$_REQUEST['fecha'];$d_fecvig=$_REQUEST['xfecha'];$c_tipped=$_REQUEST['tipo'];$n_bruto=$_REQUEST['st'];$n_dscto=$_REQUEST['descuento'];
$n_neta=$_REQUEST['bi'];$n_neti=$_REQUEST['bi'];$n_facisc='0';
$n_swint='0';$n_tasigv='18';
$n_totigv='0';
$n_totped=$_REQUEST['bi'];
$n_tcamb=$_REQUEST['prueba'];$c_codmon=$_REQUEST['moneda'];$c_codpga=$_REQUEST['plazo'];
$c_codpgf=$_REQUEST['plazo'];
$c_estado='0';
$c_cotipadre=$_REQUEST['c_cotipadre'];
//$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
/*if($_REQUEST['checkbox2']=='1'){
$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
}else{ $c_obsped=(utf8_decode($_GET['obs']));}*/
$d_fecent=$_REQUEST['fecha'];$c_lugent=$_REQUEST['lugar'];
$n_swtendv='0';$n_swtfac='0';$n_swtapr='0';$d_fecapr='';
$c_uaprob=$_REQUEST['vendedor'];$c_motivo=$_REQUEST['observacion'];$n_idreg=$secuencialidreg;$n_id='87';
$d_fecrea=date("d/m/Y");$c_opcrea=$_REQUEST['codvendedor'];$d_fecreg='';$c_oper='';
$c_precios=strtoupper($_REQUEST['C_PRECIOS']);$c_tiempo=strtoupper($_REQUEST['tiempo']);$c_validez=strtoupper($_REQUEST['validez']);
//$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
$c_tipocoti=$_REQUEST['tipo'];
$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
/*if($_REQUEST['checkbox']=='1'){
$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
}else{ $c_desgral=(utf8_decode($_GET['gral']));}
$xc_desgral=nl2br(strip_tags($_REQUEST['area2']));
$xc_obsped=nl2br(strip_tags($_REQUEST['area3']));*/
if($c_precios=='001'){
	$b_inlgv=0;
	
	}else{
	$b_inlgv=1;
}
GuardaPedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma);
////***FIN CABECERA***///
////***INICIO DETALLE***///
$j=1;$xtotal=0;
for($i=1;$i<=100;$i++){
	//$IdTar=$_POST['codigo'.$i];
$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$n_item=$j;$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=$_REQUEST['descripcion'.$i];$c_codund='';
$c_descr2=strtoupper($_REQUEST['glosa'.$i]);
$n_canprd=$_REQUEST['cantidad'.$i];

$c_clasedet=$_REQUEST['clase'.$i];
/*GUARDAR PRECIO UNITARIO (SIN IGV)*/

$codigoequipo=$_REQUEST['codcont'.$i];
//$n_preprd=($_REQUEST['precio'.$i])*($_REQUEST['cantidad'.$i]);
$precio=$_REQUEST['precio'.$i];
$preuni=$precio;
$n_preprd=$preuni;
/*fin*/
$n_dscto=$_REQUEST['dscto'.$i];
$n_prelis='0';
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
//$precioigv=$_REQUEST['precio'.$i]*1.18;
$n_prevta=($precio)*1.18;
/*fin*/
$n_precrd='0';
$n_costo='0';$n_apbpre='0';$c_usuapb='';$c_fecapb='12/09/2011';
/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio-$n_dscto)*$n_canprd;
$n_totimp=$total;
/*fin*/
$n_prelis='0';$n_precrd='0';
$c_canfac="0";$n_canbaj="0";$c_codafe="001";
$c_codlp="0011";$c_tiprec="N";$n_intprd="0";$c_obsdoc=strtoupper($_REQUEST['glosa'.$i]);
$c_codcla="";$n_idreg=$secuencialidreg;$n_id='';$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_REQUEST['codvendedor'];$b_glosa=strtoupper($_REQUEST['glosa'.$i]);
if($c_codprd != "")
		{
//GuardaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
//,$n_canprd,$n_preprd,$n_dscto
//,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_clasedet/*,
//$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
//$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2);
$c_fecini='';$c_fecfin='';


$n_apbpre='0';
GuardaPedidoDetRenovacionC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
,$n_canprd,$n_preprd,$n_dscto
,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_clasedet/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$codigoequipo,$c_fecini,$c_fecfin,$n_apbpre);


$j=$j+1;




$xtotal+=$n_totimp;
		}
	}
	
/**/
if($_REQUEST['chkhijo']=='1'){
UpdateCotizacionRenovaCabM($c_numped,$c_cotipadre);
}
/**/	
/*$mensaje="COTIZACION GENERADA CORRECTAMENTE";
		print "<script>alert('$mensaje')</script>";*/
///** PARA LA IMPRESION DEL DOCUMENTO **//
	$cli=$_REQUEST['hc'];
	$coti=$secuencialpedido;
	TotalPedidoC($xtotal,$xtotal,$xtotal,$xtotal,$c_numped);
	//$ImpresionCotizaciones=Ver_CotizacionesC($cli,$coti);
//		include('../MVC_Vista/Cotizaciones/Detalle_Cotizacion.php');		
//include('../MVC_Vista/Cotizaciones/print/imprimircoti.php');
include('../MVC_Vista/Cotizaciones/imprenov.php');
	//include('../MVC_Vista/Cotizaciones/rutas.php');	
}


//**RENOVACION DE COTIZACIONES//

if($_GET["acc"] == "renovarcoti") // GUARDAR COTIZACION
{	
/*15 04 2014*/
$c_gencrono=$_REQUEST['gencrono'];
$c_codtit=$_REQUEST['codtitulo'];
$c_swfirma=$_REQUEST['c_swfirma'];
$idregistro=$_REQUEST['idreg'];
/**/
$secuencia=NropedidoC();
if($secuencia!=NULL)
{
	foreach ($secuencia as $item)
	{
		$secuencialpedido = $item["cod"]+1;
		}
}	
$c_tippeddetalle=$_REQUEST['clase1'];
$secuencia2=Nropedido2C();
if($secuencia2!=NULL)
{
	foreach ($secuencia2 as $item)
	{
		$secuencialidreg = $item["cod"]+1;
		}
}		

$nroped=substr($secuencialpedido,4,8);
$c_opcrea=$_REQUEST['codvendedor'];


$useraprob=$_REQUEST['codvendedor'];
$fpag='18';
$d_fecapr=date('d/m/Y');


$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$c_numpd=$nroped;
$c_codcli=$_REQUEST['hc'];$c_nomcli=$_REQUEST['razon'];$c_contac=strtoupper($_REQUEST['contacto']);$c_telef=$_REQUEST['telefono'];
$c_nextel=$_REQUEST['nextel'];$c_email=strtoupper($_REQUEST['correo']);$c_asunto=strtoupper($_REQUEST['asunto']);$c_codven=$_REQUEST['vendedor'];
$d_fecped=$_REQUEST['fecha'];$d_fecvig=$_REQUEST['xfecha'];$c_tipped=$_REQUEST['tipo'];$n_bruto=$_REQUEST['st'];$n_dscto=$_REQUEST['descuento'];
$n_neta=$_REQUEST['bi'];$n_neti=$_REQUEST['bi'];$n_facisc='0';
$n_swint='0';$n_tasigv='18';
$n_totigv='0';
$n_totped=$_REQUEST['bi'];
$n_tcamb=$_REQUEST['prueba'];$c_codmon=$_REQUEST['moneda'];$c_codpga=$_REQUEST['plazo'];
$c_codpgf=$_REQUEST['plazo'];
$c_estado='0';

//$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
if($_REQUEST['checkbox2']=='1'){
$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
}else{ $c_obsped=(utf8_decode($_GET['obs']));}

$d_fecent=$_REQUEST['fecha'];$c_lugent=$_REQUEST['lugar'];
$n_swtendv='0';$n_swtfac='0';$n_swtapr='0';$d_fecapr='';
$c_uaprob=$_REQUEST['vendedor'];$c_motivo=$_REQUEST['observacion'];$n_idreg=$secuencialidreg;$n_id='87';
$d_fecrea=date("d/m/Y");$c_opcrea=$_REQUEST['codvendedor'];$d_fecreg='';$c_oper='';
$c_precios=strtoupper($_REQUEST['C_PRECIOS']);$c_tiempo=strtoupper($_REQUEST['tiempo']);$c_validez=strtoupper($_REQUEST['validez']);
//$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
$c_tipocoti=$_REQUEST['tipo'];


if($_REQUEST['checkbox']=='1'){
$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
}else{ $c_desgral=(utf8_decode($_GET['gral']));}
$xc_desgral=nl2br(strip_tags($_REQUEST['area2']));
$xc_obsped=nl2br(strip_tags($_REQUEST['area3']));

if($c_precios=='001'){
	$b_inlgv=0;
	
	}else{
			$b_inlgv=1;
}

/**fecha vigencia**/
 $fecha = date('Y-m-j');
 $xxfecha = date('d-m-Y');
$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$d_fecvig=vfecha($nuevafecha);

$useraprob=$_REQUEST['codvendedor'];
$c_cotipadre=$_REQUEST['c_cotipadre'];
/*fin fecha*/
GuardaPedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma);

UpdateCotizacionCabC($c_numped,$fpag,$d_fecvig,$useraprob,$xxfecha);
UpdateCotizacionRenovaCabM($c_numped,$c_cotipadre);

////***FIN CABECERA***///
////***INICIO DETALLE***///
$j=1;$xtotal=0;
for($i=1;$i<=100;$i++){
	//$IdTar=$_POST['codigo'.$i];
$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$n_item=$j;$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=$_REQUEST['descripcion'.$i];$c_codund='';
$c_descr2=strtoupper($_REQUEST['glosa'.$i]);
$n_canprd=$_REQUEST['cantidad'.$i];

$c_clasedet=$_REQUEST['clase'.$i]; //clase
/*GUARDAR PRECIO UNITARIO (SIN IGV)*/
$codigoequipo=$_REQUEST['codcont'.$i];
$c_fecini=$_REQUEST['fini'.$i];
$c_fecfin=$_REQUEST['ffin'.$i];
$c_registro=$_REQUEST['re'.$i];
$c_codcla=$c_clasedet;

//$n_preprd=($_REQUEST['precio'.$i])*($_REQUEST['cantidad'.$i]);
$precio=$_REQUEST['precio'.$i];
$preuni=$precio;
$n_preprd=$preuni;
/*fin*/
$n_dscto=$_REQUEST['dscto'.$i];
$n_prelis='0';
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
//$precioigv=$_REQUEST['precio'.$i]*1.18;
$n_prevta=($precio)*1.18;
/*fin*/
$n_precrd='0';
$n_costo='0';$n_apbpre='0';$c_usuapb='';$c_fecapb='12/09/2011';
/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio-$n_dscto)*$n_canprd;
$n_totimp=$total;
/*fin*/
$n_prelis='0';$n_precrd='0';
$c_canfac="0";$n_canbaj="0";$c_codafe="001";
$c_codlp="0011";$c_tiprec="N";$n_intprd="0";$c_obsdoc=strtoupper($_REQUEST['glosa'.$i]);
$c_codclaz="";$n_idreg=$secuencialidreg;$n_id='';$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_REQUEST['codvendedor'];$b_glosa=strtoupper($_REQUEST['glosa'.$i]);
if($c_codprd != "")
		{
			$n_apbpre='1';
GuardaPedidoDetRenovacionC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
,$n_canprd,$n_preprd,$n_dscto
,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_clasedet/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$codigoequipo,$c_fecini,$c_fecfin,$n_apbpre);


$j=$j+1;
$xtotal+=$n_totimp;
//*** aqui datos de renovacion ///

//ActualizaAdicionaCotidetrenovacionC($codigoequipo,$c_fecini,$c_fecfin,$c_codcla,$c_numped);
UpdateCronogramaFactRM($c_numped,$c_registro);
$d_fecapr=date("d/m/Y");

//UpdateCotizacionCabC($c_numped,$_REQUEST['plazo'],$d_fecvig,$c_uaprob,$d_fecapr);
//update cotizacion en pedicronograma segun id de registro.

if($$c_registro!=''){
//	jala desde cuadro ver cronograma

}

/****/


		}
	}

///** PARA LA IMPRESION DEL DOCUMENTO **//
	$cli=$_REQUEST['hc'];
	$coti=$secuencialpedido;
	TotalPedidoC($xtotal,$xtotal,$xtotal,$xtotal,$c_numped);
	//$ImpresionCotizaciones=Ver_CotizacionesC($cli,$coti);
//		include('../MVC_Vista/Cotizaciones/Detalle_Cotizacion.php');
		
//include('../MVC_Vista/Cotizaciones/print/imprimircoti.php');


include('../MVC_Vista/Cotizaciones/imprenov.php');
	//include('../MVC_Vista/Cotizaciones/rutas.php');	
}

if($_GET["acc"] == "ampliacrono") // GUARDAR VARIOS
{




	
	
	}






function GuardaPedidoDetRenovacionC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
,$n_canprd,$n_preprd,$n_dscto
,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_clasedet/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$codigoequipo,$c_fecini,$c_fecfin,$n_apbpre){
	 $r=GuardaPedidoDetRenovacionM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund
,$n_canprd,$n_preprd,$n_dscto
,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_clasedet/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codclaz,$n_idreg,$d_fecreg,$c_oper,$c_descr2,$codigoequipo,$c_fecini,$c_fecfin,$n_apbpre);}

function ActualizaAdicionaCotidetrenovacionC($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti){
	$resul=ActualizaAdicionaCotidetrenovacionM($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti);
}

function EliminarPedidoDetC($nroped){$resul=EliminarPedidoDetM($nroped);}
function GuardaPedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,
$n_totped,$n_tcamb
,$c_codmon,$c_codpga,$c_codpgf,$c_estado,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma){
$resultado=GuardaPedidoCabM($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,
$n_totped
,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr
,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma);
	}	
function GuardaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_tipped/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2){
$resultado=GuardaPedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo,$c_tipped/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper,$c_descr2);
}


function UpdatePedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,
$n_facisc,$n_swint,$n_tasigv

,$n_totigv,
$n_totped,$n_tcamb,$firgere
,$c_codmon,$c_codpga,$c_codpgf,$c_estado
,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv
,$n_swtfac,$n_swtapr
,$c_uaprob,$c_motivo,$n_idreg,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$c_meses,$c_aprvend){
$resultado=UpdatePedidoCabM($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,
$n_facisc,$n_swint,$n_tasigv

,$n_totigv,
$n_totped,$n_tcamb,$firgere
,$c_codmon,$c_codpga,$c_codpgf,$c_estado
,
$c_obsped,$d_fecent,$c_lugent,$n_swtendv
,$n_swtfac,$n_swtapr
,$c_uaprob,$c_motivo,$n_idreg,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$c_meses,$c_aprvend);
	}	
function UpdatePedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper){
$resultado=UpdatePedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,
$n_canprd,$n_preprd,$n_dscto,$n_prelis,$n_prevta,$n_precrd,$n_costo/*,
$c_usuapb,$c_fecapb*/,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$c_obsdoc,$c_codcla,$n_idreg,$d_fecreg,$c_oper);
}










if($_GET["acc"] == "gvarios") // GUARDAR VARIOS
{
	$grupo=$_REQUEST['grupo'];
	$titulo=strtoupper($_REQUEST['titulo']);
	$codigo='123';
	$descripcion=nl2br($_REQUEST['descripcion']);
	$estado=$_REQUEST['estado'];;
	$id='';
	$resultado=ListasCotiGuardarC($grupo,$titulo,$codigo,$descripcion,$estado);
	$mensaje="REGISTRO GUARDADO CORRECTAMENTE";
		print "<script>alert('$mensaje')</script>";
			include('../MVC_Vista/Cotizaciones/varios.php');
	}
if($_GET["acc"] == "avarios") // MOSTRAR: Formulario Nuevo Registro
{
	$obtener=ObtenerVariosC($_GET['cod']);
	include('../MVC_Vista/Cotizaciones/actualizavarios.php');
}
if($_GET["acc"] == "actuvarios") // GUARDAR COTIZACION
{
	$grupo=$_REQUEST['grupo'];
	//$descripcion=nl2br($_REQUEST['descripcion']);
	$codigo='123';
	$descripcion=$_REQUEST['des2'];
//$descripcion=htmlentities($_REQUEST['descripcion'],ENT_QUOTES, "UTF-8");
	$estado=$_REQUEST['estado'];
	$id=$_REQUEST['hiddenField'];;
	$resultado=ListasCotiActualizaC($id,$grupo,$titulo,$codigo,nl2br($descripcion),$estado);
	$mensaje="REGISTRO ACTULIZADO CORRECTAMENTE";
		print "<script>alert('$descripcion')</script>";
			include('../MVC_Vista/Cotizaciones/varios.php');
	}
function ListasCotiGuardarC($grupo,$titulo,$codigo,$descripcion,$estado){
	$resultado=ListasCotiGuardarM($grupo,$titulo,$codigo,$descripcion,$estado);}

function ListasCotiActualizaC($id,$grupo,$titulo,$codigo,$descripcion,$estado){
	$resultado=ListasCotiActualizaM($id,$grupo,$titulo,$codigo,$descripcion,$estado);}

if($_GET["acc"] == "g1") // GUARDAR COTIZACION
{include('../MVC_Vista/Cotizaciones/glosa1.php');}
if($_GET["acc"] == "glosa1") // GUARDAR COTIZACION
{
	
	$obtener=ObtenerVariosC($_GET['cod']);
	include('../MVC_Vista/Cotizaciones/glosa1.php');}
if($_GET["acc"] == "g2") // GUARDAR COTIZACION
{include('../MVC_Vista/Cotizaciones/glosa2.php');}
if($_GET["acc"] == "glosa2") // GUARDAR COTIZACION
{
	
	$obtener=ObtenerVariosC($_GET['cod']);
	include('../MVC_Vista/Cotizaciones/glosa2.php');
	}
if($_GET["acc"] == "prueba") // GUARDAR COTIZACION
{
	$xmensaje='oaaaa';
		print "<script>alert('$xmensaje')</script>";
	include('../MVC_Vista/Cotizaciones/RegCotizaciones.php');
	
	}
/*function IdRegpedidoC(){return IdRegpedidoM(); }*/
function ListaProveedoresC($des){ return  ListaProveedoresM($des);}
function Nropedido2C(){return Nropedido2M();}
function NropedidoC(){return NropedidoM();}
function RutasListaC(){return RutasListaM();}
function ListatipocambioC(){return ListatipocambioM();}
function ListaPlazoC(){return ListaPlazoM();}
function ListaVendedorC(){return ListaVendedorM();}
function ListaTipoC(){return ListaTipoM();}
function ListaMonedaC(){return ListaMonedaM();}
function BusquedaautoC($pat){return BusquedaautoM($pat);}
function BusquedaautodescripcionC($pat){return BusquedaautodescripcionM($pat);}

function BusquedaautodescripcioncotiC($pat,$sw){return BusquedaautodescripcioncotiM($pat,$sw);}

function Listar_CotizacionesAprobadasC($cli,$ff,$sw){return Listar_CotizacionesAprobadasM($cli,$ff,$sw);}
function Listar_CotizacionesC($cli,$ff,$sw){return Listar_CotizacionesM($cli,$ff,$sw);}
function Ver_CotizacionesC($cli,$coti){return Ver_CotizacionesM($cli,$coti);}
function ListaVariosCotiC(){return ListaVariosCotiM();}
function ListaCotiVariosCotiC(){return ListaCotiVariosCotiM();} //
function ObtenerVariosC($id){ return ObtenerVariosM($id);}
function ListaCotiVariosCoti2C(){return ListaCotiVariosCoti2M();} //pedi_varios
function ListaCotiVariosCoti3C(){return ListaCotiVariosCoti3M();} //pedi_varios
function ListaCotiVariosCotiAC($descripcion){return ListaCotiVariosCotiAM($descripcion);}
function ListaCategoriarutasC(){ return  ListaCategoriarutasM();}
function ListaTareasC(){ return ListaTareasM();}

////****************************************************************************//////
function PruebaC($cod){return PruebaM($cod);} //pedi_varios
if($_GET["acc"] == "c05") // GUARDAR COTIZACION
{	
$cod='10000112931';
$holas=PruebaC($cod);
include('../MVC_Vista/Cotizaciones/pruebas.php');}

//precios orden de compra

if($_GET["acc"] == "cn01") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/actualizarordencompranac.php');
}
if($_GET["acc"] == "cn00") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/RegOrdTrab.php');
}



if($_GET["acc"] == "serieautoapro") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $buscarserie = ObtenerSerieaprobC($texto);
	 if($buscarserie!=NULL)
{
	foreach ($buscarserie as $item)
	{
			
		$cod = $item["c_idequipo"];
		$des= $item["c_nserie"];
		
		$decod=$cod.'-'.$des;
		//echo "$decod|$cod|$razon|$rucdni|$dir\n";
		echo "$des|$cod\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 

	}}
}



if($_GET["acc"] == "serieautoapro2") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $buscarserie = ObtenerSerieaprob2C($texto);
	 if($buscarserie!=NULL)
{
	foreach ($buscarserie as $item)
	{
			
		$cod = $item["c_idequipo"];
		$des= $item["c_nserie"];
		
		$decod=$cod.'-'.$des;
		//echo "$decod|$cod|$razon|$rucdni|$dir\n";
		echo "$des|$cod\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 

	}}
}
function ObtenerSerieaprob2C($id){ return ListarSerieaprob2M($id);}










if($_GET["acc"] == "serieauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $buscarserie = ObtenerSerieC($texto);
foreach ($buscarserie as $item)
	{
				
				
		$cod = $item["c_nserie"];
		$des= $item["c_idequipo"];
		//$oc_ndoc=$item["oc_ndoc"];
//		$oc_precio=$item["oc_prec"];
//		
//		$ano=$item["c_anno"];
//		$cat=$item["c_codcat"];
//		$otrocosto=$item["c_nronis"];
//		$otrab=$item["c_nroot"];
//		$serieant=$item["c_serieant"];
//		$c_costadu=$item["c_costadu"];$c_costmar=$item["c_costmar"];$c_costalm=$item["c_costalm"];$c_costotr=$item["c_costotr"];$c_costotr=$item["c_costotr"];$c_preclist=$item["c_preclist"];$c_precvent=$item["c_precvent"];$c_costgute=$item["c_costgute"];$c_costage=$item["c_costage"];
		/*$razon = utf8_encode($item["CC_RAZO"]);
		$rucdni =$item["CC_NRUC"];
		$dir =utf8_encode($item["CC_DIR1"]);
		$decod=$cod.' '.$razon;*/
//		oc_ndoc,oc_desc,oc_prec,oc_serie
		$decod=$cod;
		//echo "$decod|$cod|$razon|$rucdni|$dir\n";
		echo "$decod|$cod|$des\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	//}
}
	
}

if($_GET["acc"] == "variosauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $buscarseries = AutovariosocC($texto);
 if($buscarseries!=NULL)
{
	foreach ($buscarserise as $item)
	{
		if($item["c_codmar"]=='000'){
			$marca='NO DEFINIDO';
			}elseif($item["c_codmar"]=='001'){
			$marca='CARRIER';
			}elseif($item["c_codmar"]=='002'){
				$marca='DAIKIN';
				}elseif($item["c_codmar"]=='003'){
				$marca='MITSUBISHI';
				}elseif($item["c_codmar"]=='004'){
				$marca='OTRO';
				}elseif($item["c_codmar"]=='005'){
				$marca='STAR COLD';
				}elseif($item["c_codmar"]=='006'){
				$marca='THERMOKING';
				}
		if($item["c_codmod"]=='000'){
			$modelo='NO DEFINIDO';
			}elseif($item["c_codmod"]=='001'){
			$modelo='CARRIER';
			}elseif($item["c_codmod"]=='002'){
				$modelo='THERMO KING';
				}elseif($item["c_codmod"]=='003'){
				$modelo='STAR COLD';
				}elseif($item["c_codmod"]=='004'){
				$modelo='MITSUBISHI';
				}elseif($item["c_codmod"]=='005'){
				$modelo='DAYKIN';
				}/*elseif($item["c_codmod"]=='006'){
				$modelo='THERMOKING';
				}*/
				elseif($item["c_codmod"]=='007'){
				$modelo='JINDO';
				}
				elseif($item["c_codmod"]=='008'){
				$modelo='HYNDAI';
				}
				elseif($item["c_codmod"]=='009'){
				$modelo='GRAFF';
				}
		
		$cod = $item["c_numitm"];
		$des= $item["c_desitm"];
		//$serie=$item["oc_serie"];
		$decod=$cod.' '.$des;
		$ano=$item["c_anno"];
		$cat=$item["c_codcat"];
		
		
				//echo "$decod|$cod|$razon|$rucdni|$dir\n";
		echo "$decod|$cod|$des|$marca|$modelo|$ano|$cat\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

if($_GET["acc"] == "llenardata") // MOSTRAR: Formulario Modificar Registro
{
	$valor=$_GET['dato'];
	$valores=ObtenerSerie2C($valor);
	include('../MVC_Vista/Cotizaciones/actualizarordencompranac.php');
	
}




if($_GET["acc"] == "guardaot") // MOSTRAR: Formulario Modificar Registro
{
$secuencia=NroordentrabajoC();

	foreach ($secuencia as $item)
	{
		
			$ot=$item["cod"]+1;
		}
		




$ot_nro=$ot;$ot_descr=strtoupper($_REQUEST['textfield']);$ot_equipo=strtoupper($_REQUEST['textfield3']);$ot_mar=strtoupper($_REQUEST['textfield7']);$ot_mod=strtoupper($_REQUEST['textfield8']);$ot_serie=strtoupper($_REQUEST['textfield9']);$ot_soli=strtoupper($_REQUEST['textfield5']);
$ot_res=strtoupper($_REQUEST['textfield10']);$ot_fecejc=$_REQUEST['fecha'];$ot_aut=strtoupper($_REQUEST['textfield6']);$ot_sup=strtoupper($_REQUEST['textfield11']);$ot_personal=strtoupper($_REQUEST['textfield22']);$ot_h1=$_REQUEST['textfield23'];$ot_h2=$_REQUEST['textfield24'];$ot_h3=$_REQUEST['textfield25'];$ot_med=strtoupper($_REQUEST['textfield20']);
$ot_obs=strtoupper($_REQUEST['textfield21']);$ot_costo=1;$ot_est='1';$ot_usuario=$_REQUEST['hiddenField'];$otfecreg=date("d/m/Y"); $ot_id='';
$ot_tipo=$_REQUEST['tipo'];


GuardaOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$otfecreg,$ot_tipo);



for($i=0;$i<=50;$i++){
 	$ot_tarea=strtoupper($_REQUEST['tarea'.$i]);$ot_h1=$_REQUEST['timees'.$i];$ot_h2=$_REQUEST['timere'.$i];$ot_estado='1';
	
	
 		if($ot_tarea != "")
		{
Guardaordtrabde1C($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado);
			
		}
}
$cos=0;
$cosdol=0;
for($j=0;$j<=30;$j++){
	
$ot_material=strtoupper($_REQUEST['material'.$j]);$ot_uni=$_REQUEST['unidad'.$j];$ot_cant1=$_REQUEST['cant'.$j];$cant2=$_REQUEST['cantutil'.$j];$ot_costo=$_REQUEST['costo'.$j];$ot_estado='1';$ot_costodol=$_REQUEST['costodol'.$j];
	$cos=$cos+$ot_costo;
	$cosdol=$cosdol+$ot_costodol;
 		if($ot_material != "")
		{
Guardaordtrabde2C($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado);
			
		}
}

ActualizaInvC($ot_nro,$ot_serie,$cos,$cosdol);

$imprimeotcab=imprimeotcabC($ot_nro);
$imprimeotde1=imprimeotde1C($ot_nro);
$imprimeotde2=imprimeotde2C($ot_nro);
include('../MVC_Vista/Cotizaciones/imprimirOT.php');

}
if($_GET["acc"] == "ventot") // MOSTRAR: Formulario Nuevo Registro
{
	
$imprimeotcab=imprimeotcabC($_GET['item']);
$imprimeotde1=imprimeotde1C($_GET['item']);
$imprimeotde2=imprimeotde2C($_GET['item']);
include('../MVC_Vista/Cotizaciones/imprimirOT.php');
}
function ObtenerSerie2C($id){ return ObtenerSerie2M($id);}
function ObtenerSerieC($id){ return ObtenerSerieM($id);}
function ObtenerSerieaprobC($id){ return ListarSerieaprobM($id);}
function AutovariosocC($id){ return AutovariosocM($id);}
function ListaCategoriaC(){ return ListaCategoriaM();}
function ListamarcareferC(){ return ListamarcareferM();}
function ListaestadoequipoC(){ return ListaestadoequipoM();}
function ListamarcaC(){ return ListamarcaM();}
function ListacontroladoC(){ return ListacontroladoM();}

//function ListaCategoriareferC(){ return ListaCategoriareferM();}

function NroordentrabajoC(){ return NroordentrabajoM();}
function imprimeotcabC($ot_nro){ return imprimeotcab($ot_nro);}
function imprimeotde1C($ot_nro){ return imprimeotde1($ot_nro);}
function imprimeotde2C($ot_nro){ return imprimeotde2($ot_nro);}

function GuardaOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$otfecreg,$ot_tipo){
$resultado=GuardaOrdenTrabajoCabM($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$otfecreg,$ot_tipo);
	}
function Guardaordtrabde1C($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado){
$resul=Guardaordtrabde1M($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado);
	}
function Guardaordtrabde2C($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado){
$resul=Guardaordtrabde2M($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado);
}

function ActualizaInvC($c_nroot,$c_nserie,$c_nronis,$c_costotr,$codprod){$resul=ActualizaInvM($c_nroot,$c_nserie,$c_nronis,$c_costotr,$codprod);}

if($_GET["acc"] == "actuinv") // MOSTRAR: Formulario Modificar Registro
{
	
	
	$c_codprd=$_REQUEST['codprod'];
	$oc_desc=$_REQUEST['textfield2'];
	$c_costadu=$_REQUEST['textfield4'];
	$c_costmar=$_REQUEST['textfield5'];
	$c_costalm=$_REQUEST['textfield7'];
	$c_costotr=$_REQUEST['textfield8'];
	$c_preclist=$_REQUEST['textfield9'];
	$c_precvent=$_REQUEST['textfield10'];
	$c_serieant=$_REQUEST['c_serieant'];
	$c_condicion=$_REQUEST['con'];
	$c_nserie=strtoupper($_REQUEST['textfield']);
	$c_costgute=$_REQUEST['textfield16'];
	$c_costage=$_REQUEST['textfield6'];
	$c_codcat=$_REQUEST['select3'];
	$c_mcamq=$_REQUEST['marca'];
	$c_controlador=$_REQUEST['control'];
	$c_codmar=$_REQUEST['marca1'];
	$c_idequipo=$_REQUEST['hiddenField4'];
	$n_id=$_REQUEST['hiddenField5'];
	$c_usuario=$_GET['udni'];
	$c_xidcodi=substr($_REQUEST['c_idequipo'],0,2).(strtoupper($_REQUEST['textfield']));
	
	$xcodianterior=substr($_REQUEST['c_idequipo'],0,2).(strtoupper($_REQUEST['c_serieant']));
	//actualizainvmovC($c_idequipo,$xcodianterior);
	
	
	
	actualizarocmovC($n_id,$c_nserie,$c_codprd,$oc_desc,$c_codprd);
	
	ActualizaInvPreciosC($c_idequipo,$c_costadu,$c_costmar,$c_costalm,$c_costotr,$c_preclist,$c_precvent,$c_serieant,$c_condicion,$c_nserie,$c_costgute,$c_costage,$c_codcat,$c_mcamq,$c_controlador,$c_codmar,$c_codprd,$c_usuario,$c_xidcodi);
	 $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
  include('../MVC_Vista/Cotizaciones/actualizarordencompranac.php');
	
	}
function actualizainvmovC($n_id,$oc_serie){ $resul=actualizainvmovM($n_id,$oc_serie);}
function actualizarocmovC($n_id,$oc_serie,$oc_cart,$oc_desc){
	$resul=actualizarocmovM($n_id,$oc_serie,$oc_cart,$oc_desc);
	}

function ActualizaInvPreciosC($c_idequipo,$c_costadu,$c_costmar,$c_costalm,$c_costotr,$c_preclist,$c_precvent,$c_serieant,$c_condicion,$c_nserie,$c_costgute,$c_costage,$c_codcat,$c_mcamq,$c_controlador,$c_codmar,$c_codprd,$c_usuario,$c_xidcodi){
	
	 $resul= ActualizaInvPreciosM($c_idequipo,$c_costadu,$c_costmar,$c_costalm,$c_costotr,$c_preclist,$c_precvent,$c_serieant,$c_condicion,$c_nserie,$c_costgute,$c_costage,$c_codcat,$c_mcamq,$c_controlador,$c_codmar,$c_codprd,$c_usuario,$c_xidcodi);}
	 
	if($_GET["acc"] == "re27")
{include('../MVC_Vista/Cotizaciones/Reporte_lista_precios.php');} 
if($_GET["acc"] == "2re27")
{include('../MVC_Vista/Cotizaciones/Reporte_lista_precios2.php');} 

if($_GET["acc"] == "m27")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
$cod=$_REQUEST["codigo"];
 
$reporte=ObtenerSerie3C($cod);
include('../MVC_Vista/Cotizaciones/Reporte_lista_precios.php');	 
}
if($_GET["acc"] == "2m27")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
$cod=$_REQUEST["codigo"];
 
$reporte=ObtenerSerie3C($cod);
include('../MVC_Vista/Cotizaciones/Reporte_lista_precios2.php');	 
}
function BusquedaautoproveC($descripcion){ return BusquedaautoproveM($descripcion);}
function ObtenerSerie3C($id){ return ObtenerSerie3M($id);}
if($_GET["acc"] == "gc001") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/guiaremisionconcoti.php');
	//include('../MVC_Vista/Cotizaciones/guiaremision.php');
}
if($_GET["acc"] == "g001") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/guiaremision.php');
}
function ObtenernomEquipoC($id){ return ObtenernomEquipoM($id);}
if($_GET["acc"] == "serieautoequipo") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $buscarserie = ObtenernomEquipoC($texto);
	
	foreach ($buscarserie as $item)
	{		
		$cod = $item["oc_serie"];
		$des= $item["oc_desc"];
		$oc_ndoc=$item["oc_ndoc"];
		$oc_precio=$item["oc_prec"];
		
		$ano=$item["c_anno"];
		$cat=$item["c_codcat"];
		$otrocosto=$item["c_nronis"];
		$otrab=$item["c_nroot"];
		$serieant=$item["c_serieant"];
		$c_costadu=$item["c_costadu"];$c_costmar=$item["c_costmar"];$c_costalm=$item["c_costalm"];$c_costotr=$item["c_costotr"];$c_costotr=$item["c_costotr"];$c_preclist=$item["c_preclist"];$c_precvent=$item["c_precvent"];$c_costgute=$item["c_costgute"];$c_costage=$item["c_costage"];
		/*$razon = utf8_encode($item["CC_RAZO"]);
		$rucdni =$item["CC_NRUC"];
		$dir =utf8_encode($item["CC_DIR1"]);
		$decod=$cod.' '.$razon;*/
//		oc_ndoc,oc_desc,oc_prec,oc_serie
		$decod=$des.'-'.$cod;
		//echo "$decod|$cod|$razon|$rucdni|$dir\n";
		echo "$decod|$cod|$des|$oc_ndoc|$oc_precio|$marca|$modelo|$ano|$cat|$otrocosto|$otrab|$serieant|$c_costadu|$c_costmar|$c_costage|$c_costalm|$c_costgute|$c_preclist|$c_precvent\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	
	}

}
if($_GET["acc"] == "verprod") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ver_producto.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}

if($_GET["acc"] == "frameprod") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_producto.php');
}
if($_GET["acc"] == "framechofer") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/frame_choferes.php');
}

if($_GET["acc"] == "guardaguia") // MOSTRAR: Formulario Modificar Registro
{
	
$c_numped=$_REQUEST['c_numped'];
$c_numguia='G'.$_REQUEST["select3"].$_REQUEST["textfield2"];
$guiadet=$c_numguia;
$c_tipdoc="G";
$c_serdoc=$_REQUEST["select3"];
$c_nume=$_REQUEST["textfield2"];
$d_fecgui=$_REQUEST["fecha"];
if($_REQUEST["tipo"]=="1"){
	$c_nomdes=$_REQUEST["textfield3"];
	$c_coddes=$_REQUEST["hiddenField4"];
}else{
	$c_nomdes=$_REQUEST["prov"];
	$c_coddes=$_REQUEST["ruc"];
	}

	
$c_rucdes=$_REQUEST["textfield7"];
$c_parti=$_REQUEST["lpartida"];
$c_llega=$_REQUEST["lentrega"];
$c_docref=$_REQUEST["textfield6"];
$d_fecref=$_REQUEST["ftraslado"];
$c_codtra=$_REQUEST["select2"];
$c_ructra=$_REQUEST["hiddenField2"];
$c_chofer=strtoupper($_REQUEST["chofer"]);
$c_placa=strtoupper($_REQUEST["placa"]);
$c_licenci=strtoupper($_REQUEST["licencia"]);
$c_estado='1';
$c_glosa=$_REQUEST["obs"];
$secuencia=NroguiaC();
if($secuencia!=NULL)
{
foreach ($secuencia as $item)
{
	$n_idreg = $item["cod"]+1;
}
}
$d_fecreg=date("d/m/Y");
$c_oper=$_GET['udni'];
$c_tipo=$_REQUEST["tipo"];
$n_origen="2";
$c_tope="N";
$c_codcia="";
$c_codtda="000";
$c_marca=strtoupper($_REQUEST['marca']);
$c_nomtra=strtoupper($_REQUEST['transportista']);
grabacabguiaC($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$c_rucdes,$c_parti
,$c_llega,$c_docref,$d_fecref,$c_codtra,$c_ructra,$c_chofer,$c_placa,$c_licenci,$c_marca,$c_estado,$c_glosa,$n_idreg ,$d_fecreg
,$c_oper,$c_tipo,$n_origen,$c_tope,$c_codcia,$c_codtda,$c_nomtra,$c_numped);

for($j=0;$j<=30;$j++){

$c_cod=$_REQUEST['codigorepuesto'.$j];	
$c_codprd=$_REQUEST['unidad'.$j]; //codigo de equipo	
$c_desprd=strtoupper($_REQUEST['material'.$j]); //nombre del producto 
$c_codund='UND';
$n_canprd=$_REQUEST['cant'.$j]; //cnatidad
$c_estaequipo=$_REQUEST['estaequi'.$j]; //ESTADO DEL EQUIPO
$n_bultos ='';
$n_peso='';
$c_oper='';
$c_obsprd=strtoupper($_REQUEST['cantutil'.$j]);//observacion
$n_id='';

if($n_canprd != "" )
		{
$n_item=$j;

grabadetguiaC($guiadet,$n_item,$c_codprd,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda,$c_cod);

 //  ActualizastockC($n_canprd,$c_cod);
actuinvxguiaremisionC($c_codprd,$c_estaequipo,$c_estaequipo); 
 	//$j +=1;
		//$seguir = true;
		}
	}	
		

 // include('../MVC_Vista/Cotizaciones/imprimiguiaremision.php');
	$cabecera=imprimeguiacabC($c_nume);
	$detalle=imprimeguiadetC($guiadet);
include('../MVC_Vista/Cotizaciones/verimprimirguia.php');
	//include('../MVC_Vista/Cotizaciones/I_imprimirguia1.php');
	}

function Actualizastock2C($idprod){ return  Actualizastock2M($idprod);}
function ActualizastockC($cant,$idprod){ return  ActualizastockM($cant,$idprod);}
function NroguiaC(){return NroguiaM();}

function NroguiacabC(){return NroguiacabM();}
function grabacabguiaC($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$c_rucdes,$c_parti
,$c_llega,$c_docref,$d_fecref,$c_codtra,$c_ructra,$c_chofer,$c_placa,$c_licenci,$c_marca,$c_estado,$c_glosa,$n_idreg ,$d_fecreg
,$c_oper,$c_tipo,$n_origen,$c_tope,$c_codcia,$c_codtda,$c_nomtra,$c_numped){
	
	$resultado=grabacabguiaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$c_rucdes,$c_parti
,$c_llega,$c_docref,$d_fecref,$c_codtra,$c_ructra,$c_chofer,$c_placa,$c_licenci,$c_marca,$c_estado,$c_glosa,$n_idreg ,$d_fecreg
,$c_oper,$c_tipo,$n_origen,$c_tope,$c_codcia,$c_codtda,$c_nomtra,$c_numped);
	
	}
function grabadetguiaC($c_numgui,$n_item,$c_codprd,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda,$c_cod){
	$resultado=grabadetguiaM($c_numgui,$n_item,$c_codprd,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda,$c_cod);
	}
function imprimeguiacabC($c_nume){return  imprimeguiacabM($c_nume);}
function imprimeguiacab2C($c_nume){return  imprimeguiacab2M($c_nume);}
function imprimeguiadetC($c_numguia){return imprimeguiadetM($c_numguia);}
function actuinvxguiaremisionC($id_equipo,$estado,$estado2){
$resultado=actuinvxguiaremision($id_equipo,$estado,$estado2);}


if($_GET["acc"] == "rg001") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/verguiasremision.php');
}
function verguiasremisionC($f1,$f2){return verguiasremision($f1,$f2);}

if($_GET["acc"] == "mguia")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
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


 $reporte=verguiasremisionC($fecha1,$fecha2);
//$reporte=verguiasremisionC($fecha1,$fecha2);
include('../MVC_Vista/Cotizaciones/verguiasremision.php');	 
}

if($_GET["acc"] == "imprimeguia") // MOSTRAR: Formulario Nuevo Registro

{
	$guia=$_POST['vendedor'];
	$cabecera=imprimeguiacab2C($guia);
	$detalle=imprimeguiadetC($guia);
	
//	include('../MVC_Vista/Cotizaciones/imprimiguiaremision.php');
	//include('../MVC_Vista/Cotizaciones/I_imprimirguia2.php');

	$i = 0;
	foreach($detalle as $itemD){
		$i+=1;
//echo ($i);
		}
//	include('../MVC_Vista/Cotizaciones/imprimiguiaremision.php');
if($i==1){include('../MVC_Vista/Cotizaciones/I_imprimirguia1.php');
}elseif($i==2){include('../MVC_Vista/Cotizaciones/I_imprimirguia2.php');
}elseif($i==3){include('../MVC_Vista/Cotizaciones/I_imprimirguia.php');
}elseif($i==4){include('../MVC_Vista/Cotizaciones/I_imprimirguia3.php');
}elseif($i==5){include('../MVC_Vista/Cotizaciones/I_imprimirguia4.php');
}elseif($i==6){include('../MVC_Vista/Cotizaciones/I_imprimirguia5.php');
}elseif($i==7){include('../MVC_Vista/Cotizaciones/I_imprimirguia5.php');}



}
function listaguiaremisiontransportistaC (){return listaguiaremisiontransportistaM();}
function listaguiaremisionC(){return listaguiaremisionM();}
if($_GET["acc"] == "verguia") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/verimprimirguia.php');
}
if($_GET["acc"] == "repcont01") // MOSTRAR: Formulario Nuevo Registro

{
	include('../MVC_Vista/Cotizaciones/ReporteCompras.php');
}
if($_GET["acc"] == "repcont02") // MOSTRAR: Formulario Nuevo Registro

{
	include('../MVC_Vista/Cotizaciones/ReporteInventario.php');
}
if($_GET["acc"] == "verrepcont02")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteInvetario.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteInvetario.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteInvetario.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteInvetario.html");
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
 $reporte=ReporteInventarioC($fecha1,$fecha2,$sw);
//$reporte=verguiasremisionC($fecha1,$fecha2);
include('../MVC_Vista/Cotizaciones/ReporteInventario.php');	 
}

function ReporteInventarioC($f1,$f2,$sw){return ReporteInventarioM($f1,$f2,$sw);}


function reportecomprasdetalladoC($f1,$f2,$sw){ return reportecomprasdetalladoM($f1,$f2,$sw);}
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

 $reporte=reportecomprasdetalladoC($fecha1,$fecha2,$sw);
//$reporte=verguiasremisionC($fecha1,$fecha2);
include('../MVC_Vista/Cotizaciones/ReporteCompras.php');	 
}



function verotrabajoC($f1,$f2){ return verotrabajo($f1,$f2);}



/****aqui*/
if($_GET["acc"] == "verot01") // MOSTRAR: Formulario Nuevo Registro
{

	include('../MVC_Vista/Cotizaciones/Verordentrabajo.php');
}


if($_GET["acc"] == "mot")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reposte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reposte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reposte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=Reposte.html");
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


 $reporte=verotrabajoC($fecha1,$fecha2);
//$reporte=verguiasremisionC($fecha1,$fecha2);
include('../MVC_Vista/Cotizaciones/Verordentrabajo.php');	 
}
if($_GET["acc"] == "verotss")
{
$ot_nro=$_GET['nro'];
$imprimeotcab=imprimeotcabC($ot_nro);
$imprimeotde1=imprimeotde1C($ot_nro);
$imprimeotde2=imprimeotde2C($ot_nro);
include('../MVC_Vista/Cotizaciones/imprimirOT.php');
}
if($_GET["acc"] == "verotupdateot")
{
$ot_nro=$_GET['nro'];
$imprimeotcab=imprimeotcabC($ot_nro);
$imprimeotde1=imprimeotde1C($ot_nro);
$imprimeotde2=imprimeotde2C($ot_nro);
include('../MVC_Vista/Cotizaciones/actualizaot.php');
}

function UpdateOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo){ 
$resul=UpdateOrdenTrabajoCabM($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo);}
function deleteOTC($ot_nro){ $resul=deleteOTM($ot_nro);}
function delete2OTC($ot_nro){ $resul=delete2OTM($ot_nro);}

if($_GET["acc"] == "updateot") // MOSTRAR: Formulario Modificar Registro
{


 

$ot_nro=$_POST['ot_nro'];$ot_descr=strtoupper($_POST['textfield']);$ot_equipo=strtoupper($_POST['textfield3']);$ot_mar=strtoupper($_REQUEST['textfield7']);$ot_mod=strtoupper($_REQUEST['textfield8']);$ot_serie=strtoupper($_REQUEST['textfield9']);$ot_soli=strtoupper($_REQUEST['textfield5']);
$ot_res=strtoupper($_REQUEST['textfield10']);$ot_fecejc=$_REQUEST['fecha'];$ot_aut=strtoupper($_REQUEST['textfield6']);$ot_sup=strtoupper($_REQUEST['textfield11']);$ot_personal=strtoupper($_REQUEST['textfield22']);$ot_h1=$_REQUEST['textfield23'];$ot_h2=$_REQUEST['textfield24'];$ot_h3=$_REQUEST['textfield25'];$ot_med=strtoupper($_REQUEST['textfield20']);
$ot_obs=strtoupper($_REQUEST['textfield21']);$ot_costo=1;$ot_est='1';$ot_usuario=$_POST['hiddenField'];
$otfecreg=date("d/m/Y"); $ot_id='';
$ot_tipo=$_REQUEST['tipo'];

UpdateOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo);


deleteOTC($ot_nro);
delete2OTC($ot_nro);

for($i=0;$i<=50;$i++){
 	$ot_tarea=strtoupper($_REQUEST['tarea'.$i]);$ot_h1=$_REQUEST['timees'.$i];$ot_h2=$_REQUEST['timere'.$i];$ot_estado='1';
	
	
 		if($ot_tarea != "")
		{
Guardaordtrabde1C($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado);
			
		}
}
$cos=0;
$cosdol=0;
for($j=0;$j<=30;$j++){
	
$ot_material=strtoupper($_REQUEST['material'.$j]);$ot_uni=$_REQUEST['unidad'.$j];$ot_cant1=$_REQUEST['cant'.$j];$cant2=$_REQUEST['cantutil'.$j];$ot_costo=$_REQUEST['costo'.$j];$ot_estado='1';$ot_costodol=$_REQUEST['costodol'.$j];
	$cos=$cos+$ot_costo;
	$cosdol=$cosdol+$ot_costodol;
 		if($ot_material != "")
		{
Guardaordtrabde2C($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado);
			
		}
}
$imprimeotcab=imprimeotcabC($ot_nro);
$imprimeotde1=imprimeotde1C($ot_nro);
$imprimeotde2=imprimeotde2C($ot_nro);
include('../MVC_Vista/Cotizaciones/imprimirOT.php');
}
function Ver_EstadisticaC(){ return Ver_EstadisticaM();}
if($_GET["acc"] == "esta1")
{
	include('../MVC_Vista/Cotizaciones/ReporteCotizaciones.php');
	//$EstadisticaAnioymes=Ver_EstadisticaC();
	//include('../MVC_Vista/Cotizaciones/EstadisticaCotizaciones.php');
}

if($_GET["acc"] == "repcot1")
{
	//include('../MVC_Vista/Cotizaciones/ReporteCotizaciones.php');
	$EstadisticaAnioymes=Ver_EstadisticaC();
	include('../MVC_Vista/Cotizaciones/EstadisticaCotizaciones.php');
}
function Ver_Estadistica2C(){ return Ver_Estadistica2M();}
if($_GET["acc"] == "repcot2")
{
	//include('../MVC_Vista/Cotizaciones/ReporteCotizaciones.php'); 
	$EstadisticaAnioymes=Ver_Estadistica2C();
	include('../MVC_Vista/Cotizaciones/EstadisticaCotizaciones2.php');
}

function Ver_Estadistica3C(){ return Ver_Estadistica3M();}
if($_GET["acc"] == "repcot3")
{Ver_Estadistica3C();
	//include('../MVC_Vista/Cotizaciones/ReporteCotizaciones.php'); Lista_Cotizaciones_usuario
	//$listavendedor=Ver_Estadistica3C();
	include('../MVC_Vista/Cotizaciones/Lista_Cotizaciones_usuario.php');
}
if($_GET["acc"] == "repcoti1") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/ReporteCoti.php');
}
if($_GET["acc"] == "adiciona") // MOSTRAR: Formulario Nuevo Registro
{	$cli=$_GET['cod'];
	$coti=$_GET['coti'];
	$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$obteneritemscotiza=Ver_CotizacionesC($cli,$coti);
	include('../MVC_Vista/Cotizaciones/AdicionalesCotizaciones.php');
}

if($_GET["acc"] == "abrircoti") // MOSTRAR: Formulario Nuevo Registro c_idequipo ???????
{
	$coti=$_REQUEST['hiddenField'];
//$resulta=Validar_cronogramaM($coti);
if($resulta==NULL){
	
	
	
	$c_motivo=$_REQUEST['obs'];
	$c_ulibera=$_GET['udni'];
	abrircotizacionCabC($coti,$c_motivo,$c_ulibera);
	abrircotizacionDetC($coti);
for($i=1;$i<=100;$i++){ //recorro un maximo de 15 items x detalle de cotizacion
$c_idequipo=$_REQUEST['codequipo'.$i]; //valor del item a facturar.
if($c_idequipo != "")
		{
abririnvC($c_idequipo);
}
	}
	$mensaje="Cotizacion Liberada";
	print "<script>alert('$mensaje')</script>";
}else{
	$mensaje="La Cotizacion Presenta Cronograma Periodos Vigente a Facturar No es Posible su Liberacion";
	print "<script>alert('$mensaje')</script>";
	
	}
	
	//include('../MVC_Vista/Cotizaciones/ListaCotizacionesAprobadas.php'); abrircotizacionDetM  abririnvM
	
	}
function abrircotizacionCabC($coti,$c_motivo,$c_ulibera){ return abrircotizacionCabM($coti,$c_motivo,$c_ulibera);}
function abrircotizacionDetC($coti){ return abrircotizacionDetM($coti);}
function abririnvC($c_idequipo){ return abririnvM($c_idequipo);}
function RegistroCabCronogramaC($c_numped,$c_codcli,$c_nomcli,$c_meses,$c_fecreg,$c_usuario,$asunto){ $resul= RegistroCabCronogramaM($c_numped,$c_codcli,$c_nomcli,$c_meses,$c_fecreg,$c_usuario,$asunto);}
if($_GET["acc"] == "adicionacoti") // MOSTRAR: Formulario Nuevo Registro
{
	
	
$nrocotizacion=$_REQUEST['doc'];
$valida=validaCotiAproC($nrocotizacion);
if($valida==NULL){
//verficar que la cotizacion no este facturado.	
$useraprob=$_REQUEST['useraprob'];

$cliente=$_REQUEST['razon'];
$asunto=$_REQUEST['asunto'];

$nrocoti=$_REQUEST['doc'];
$feccond=$_REQUEST['feccond'];
$c_carta=$_REQUEST['carta'];
$c_letra=$_REQUEST['letra'];
$c_contrato=$_REQUEST['contrato'];
$c_oper=$_REQUEST['codvendedor'];
$c_glosa=$_REQUEST['obscond'];
$d_fecreg=date("d/m/Y");
$fecha=$_REQUEST['feccond'];
$fpag=$_REQUEST['plazo'];
$faprobacion=date("d/m/Y");
$d_fecapr=date("d/m/Y");// ,strtotime("$faprobacion + 10 day"));

//

 $fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$d_fecvig=vfecha($nuevafecha);

$c_codcli=$_REQUEST['hc'];
$c_nomcli=$_REQUEST['razon'];
$cabc_meses=$_REQUEST['meses'];
//RegistroCabCronogramaM($c_numped,$c_codcli,$c_nomcli,$c_meses,$c_fecreg,$c_usuario)


if($cabc_meses!='0'){
RegistroCabCronogramaC($nrocoti,$c_codcli,$c_nomcli,$cabc_meses,$d_fecapr,$useraprob,$asunto);
}
//date("Y-m-d", strtotime( "$hoy + 1 day")) ;
if($d_fecregula!=''){
	$fecha=$d_fecregula;
	}else{
	$fecha=date("d/m/Y");
	}
//$d_fecvig=date("d/m/Y");

//do{
for($i=1;$i<=50;$i++){ //recorro un maximo de 15 items x detalle de cotizacion
$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=$_REQUEST['descripcion'.$i];
$n_id=$_REQUEST['re'.$i]; //valor del item a facturar.
$c_codcont=$_REQUEST['codequipo'.$i]; //codigo del equipo
$c_fecini=$_REQUEST['fini'.$i]; //fec inicial de alquiler
$c_fecinicro=$_REQUEST['fini'.$i]; //fec inicial de alquiler
$c_fecfin=$_REQUEST['ffin'.$i]; //fec final de alquiler
$c_codcla=$_REQUEST['clase'.$i]; //TIPO SI ES ALQUILER O VENTA.
$n_idreg=$_POST['re'.$i];//valor del check box 
$importe=$_REQUEST['imp'.$i];
$ximporte=$_REQUEST['imp'.$i];
$crimporte+=$importe;
$clase=$_REQUEST['clase'.$i]; //clase de prducto
$glosa=$_REQUEST['glosa'.$i];
$dscto=$_REQUEST['dscto'.$i];
$cant=$_REQUEST['cant'.$i];
$diff = abs(strtotime($c_fecini) - strtotime($c_fecfin));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

//$conca=$c_fecini.' '.$c_fecfin; 
$obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;

$conca=$n_idreg.' '.$nrocoti;
$item=1;
$c_cia='000';
//if($n_idreg != "" && $c_codcont!="" && $c_fecini!="")
if($n_idreg != "" && $c_codcont!="" && $c_fecini!="") //alquileres todo tipo
		{
			
ActualizaAdicionaCotidetC($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti,$n_idreg); 
//aprobacion de alquiler de equipos

/*aqui para cronograma por producto*/


$xmeses=$_REQUEST['meses'];
$xcrono=$_REQUEST['cronograma'];
$xd_fecreg=$_REQUEST['fini'.$i];
$dateini=$_REQUEST['fini'.$i];
$xfecalq=date("d/m/Y");//xd_fecreg
$f1=$xfecalq;
$variable = explode ('/',$f1);
$fecha1 = $variable [2].-$variable [1].-$variable [0];
$dia=30;
list($day,$mon,$year) = explode('/',$xd_fecreg);
$zz= date('d/m/Y',mktime(0,0,0,$mon,$day-30,$year));
if($xcrono=='1' and $xmeses>1){
	for($cr=1;$cr<=$xmeses;$cr++){
	$crcoti=$nrocoti.$cr;
list($day,$mon,$year) = explode('/',$zz);
 $zzz= date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));
$dia+=30;
	
	if($cr==1){
		
		$x_dscto=$dscto;
		
		}else{
			
		$x_dscto=0.0;
		
		}

//$clase=$_REQUEST['clase'.$i]; //clase de prducto

GrabaCronogramaC($nrocoti,$cr,'000',$cr,$importe,'',$zzz,'0',$xd_fecreg,$c_oper,$c_codprd,$c_desprd,$c_codcont,$cant,$clase,$x_dscto,$cant,$glosa);
		} // fin for cronograma
	//}else{
		
	
		
		}//fin if cronograma










/*fin para cronograma por producto*/
ActualizaAdicionaCotidetfechasalquilerM($obsfecha,$c_fecini,$c_fecfin,$nrocoti,$n_idreg);
//actualizar estado de cabecera pedido
UpdateCotizacionCabC($nrocoti,$fpag,$d_fecvig,$useraprob,$d_fecapr);
ActualizaInvCotizarC($c_codcont);
UpdateCodReservaM($c_codcont);
        }elseif($n_idreg != "" && $c_codcont!=""){
			
ActualizaAdicionaCotidet3C($c_codcont,$nrocoti,$n_idreg);//aprobacion venta de equipos	
UpdateCotizacionCabC($nrocoti,$fpag,$d_fecvig,$useraprob,$d_fecapr);
ActualizaInvCotizarC($c_codcont);
UpdateCodReservaM($c_codcont);
		}elseif($n_idreg!= ""){ //aprobacion de repuestos,transporte,manipuleo,etc otros servicios
			
		ActualizaAdicionaCotidet2C($nrocoti,$n_idreg);//tabla detalle 		
UpdateCotizacionCabC($nrocoti,$fpag,$d_fecvig,$useraprob,$d_fecapr);	
UpdateCodReservaM($c_codcont);
			}//fin if
		
//si la fecha de alquiler existe guardamos condiciones ActualizaAdicionaCotidet3C($c_codcont,$nrocoti,$id)
if($c_fecini != "")
		{
	
GrabaCondicionesC($nrocoti,$item,$c_cia,$c_glosa,$ximporte,$fecha,$d_fecreg,$c_oper,$c_letra,$c_contrato,$c_carta);	
		}

//ssi la fecha de alquiler existe guardamos cronograma 
	} //fin for ($c_obsdoc,$nrocoti,$id,$c_fecini,$c_fecfin) 
//ActualizaAdicionaCotidetfechasalquilerM($obsfecha,$nrocoti,$n_idreg,$c_fecini,$c_fecfin);
// 

if($xcrono=='1'){
	$coticrono=$nrocoti;
	UpdateCronogramaFactR1M($nrocoti); 

include('../MVC_Vista/Cotizaciones/printcrono.php');


	}else{
		$mensaje="Pasado A Facturar Gracias.";
print "<script>alert('$mensaje')</script>";	
//	include('../MVC_Vista/Cotizaciones/Alert.php');

		}

}else{
	
	$mensaje="Cotizacion Ya Aprobada";
print "<script>alert('$mensaje')</script>";	
	}

}//fin funcion

/*AMPLIACION DE CRONOGRAMA**/
if($_GET["acc"] == "ampliarcoti") // MOSTRAR: Formulario Nuevo Registro
{
	
	$nrocoti=$_REQUEST['doc'];
	$cuo=$_REQUEST['n_cuota'];
	$c_oper=$_GET['udni'];
	$cuotanew=$_REQUEST['meses'];
	$cmesesac=$cuo+$cuotanew;
	
	 updatecuotapedicabcroM($cmesesac,$nrocoti);
	 // updatecuotapedicabM($cuota,$coti);
	
for($i=1;$i<=50;$i++){ //recorro un maximo de 15 items x detalle de cotizacion
$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=$_REQUEST['descripcion'.$i];
$n_id=$_REQUEST['re'.$i]; //valor del item a facturar.
$c_codcont=$_REQUEST['codequipo'.$i]; //codigo del equipo
$c_fecini=$_REQUEST['fini'.$i]; //fec inicial de alquiler
$c_fecinicro=$_REQUEST['fini'.$i]; //fec inicial de alquiler
$c_fecfin=$_REQUEST['ffin'.$i]; //fec final de alquiler
$c_codcla=$_REQUEST['clase'.$i]; //TIPO SI ES ALQUILER O VENTA.
$n_idreg=$_POST['re'.$i];//valor del check box 
$importe=$_REQUEST['imp'.$i];
$ximporte=$_REQUEST['imp'.$i];
$crimporte+=$importe;
$clase=$_REQUEST['clase'.$i]; //clase de prducto
$glosa=$_REQUEST['glosa'.$i];
$dscto=$_REQUEST['dscto'.$i];
$cant=$_REQUEST['cantidad'.$i];



$diff = abs(strtotime($c_fecini) - strtotime($c_fecfin));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

//$conca=$c_fecini.' '.$c_fecfin; 
$obsfecha='DEL '.$c_fecini.' AL '.$c_fecfin;

$conca=$n_idreg.' '.$nrocoti;
$item=1;
$c_cia='000';
if($n_idreg != "" && $c_codcont!="" && $c_fecini!="") //alquileres todo tipo
		{
$xmeses=$_REQUEST['meses'];
$xcrono=$_REQUEST['cronograma'];
$xd_fecreg=$_REQUEST['fini'.$i];
$dateini=$_REQUEST['fini'.$i];
$xfecalq=date("d/m/Y");//xd_fecreg
$f1=$xfecalq;
$variable = explode ('/',$f1);
$fecha1 = $variable [2].-$variable [1].-$variable [0];
$dia=30;
$xcr=$cuo;
list($day,$mon,$year) = explode('/',$xd_fecreg);
$zz= date('d/m/Y',mktime(0,0,0,$mon,$day-30,$year));
if($xcrono=='1' and $xmeses>=1){
	for($cr=1;$cr<=$xmeses;$cr++){
	$crcoti=$nrocoti.$cr;
list($day,$mon,$year) = explode('/',$zz);
 $zzz= date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));
$dia+=30;
	$it=$cuo+$cr;
//insert a pedi cronograma
GrabaCronogramaC($nrocoti,$it,'000',$it,$importe,'',$zzz,'0',$xd_fecreg,$c_oper,$c_codprd,$c_desprd,$c_codcont,$cant,$clase,$dscto,$cant,$glosa);
				} // fin for cronograma
			}//fin if cronograma
		}
	}
$mensaje="Cronograma Ampliado Correctamente!";
print "<script>alert('$mensaje')</script>";	
	include('../MVC_Vista/Cotizaciones/printcrono.php');	
}




if($_GET["acc"] == "xvercronograma") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/printcrono.php');
}

if($_GET["acc"] == "vercronograma") // MOSTRAR: Formulario Nuevo Registro
{
	error_reporting(0); 
	try {
    $coti=$_REQUEST['coti'];
	$cli=$_REQUEST['cli'];
	$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$verreportecronograma=Ver_cronogramaC($_REQUEST['coti']);
	$validacrono=Validar_cabcronogramaM($_REQUEST['coti']);
	
	// enn caso la factura este anulada se limpie del cronograma
	if($validacrono!=NULL){
	foreach($verreportecronograma as $zitemcr){
	$zcoti=$zitemcr['c_nroped'];
	$znidreg=$zitemcr['n_idreg'];
	if($zcoti!=NULL){
	$zbuscafact=buscarcotifactanuladaM($zcoti);
	foreach($zbuscafact as $zitemfac){	
		$znrofact=$zitemfac['PE_NDOC'];
		$znrocoti=$zitemcr['c_nroped'];
		//$xxx=$nrofact.'-'.$nrocoti;
		//UpdateUpdatecobroanuladaM($znrofact,$znrocoti);
			$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conexón con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876' );
if (!$cid) { exit( "Error al conectar: " . $cid);
}
$sql="update pedi_cronograma set c_swcob='0',c_nrofac='' where c_nroped='$znrocoti'";
	@$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
		    }
		 }
	   }
	}
	
	/// finnnnnnnn
	if($validacrono!=NULL){
	foreach($verreportecronograma as $itemcr){
	$xcoti=$itemcr['c_nroped'];
	$nidreg=$itemcr['n_idreg'];
	if($xcoti!=NULL){
	$buscafact=buscarcotifactC($xcoti);
	foreach($buscafact as $itemfac){	
		$nrofact=$itemfac['PE_NDOC'];
		$nrocoti=$itemcr['c_nroped'];
		$xxx=$nrofact.'-'.$nrocoti;
		UpdateUpdatecobroM($nrofact,$nrocoti);
		//FALTA OPTIMIZAR ESTA LINEAS DE CODIGO.
		$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conexón con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876' );
if (!$cid) { exit( "Error al conectar: " . $cid);
}
$sql="update pedi_cronograma set c_swcob='1',c_nrofac='$nrofact' where c_nroped='$nrocoti'";
	@$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));
		//UpdateCronogramaFactC($factura,$nrocoti);				
			}
		}
	}
	
	//$verreportecronograma=Ver_cronogramaM($_REQUEST['doc']);
	$verreportecronograma=Ver_cronogramaC($_REQUEST['hiddenField']);
	include('../MVC_Vista/Cotizaciones/VerCronograma.php');
	}else{
		
			$mensaje='Cronograma Se encuentra Cerrado';
	print "<script>alert('$mensaje')</script>";
	
		include('../MVC_Vista/Cotizaciones/VerCronogramacerrado.php');
		}
	}catch(Exception $e)

        {
 //echo ‘IMPRIMIMOS EL MENSAJE QUE QUEREMOS QUE VEAN MAS EL ERROR CACHADO EN $e ‘.$e;
 }
}
function Ver_cronogramaC($coti){return  Ver_cronogramaM($coti);}
function ActualizaAdicionaCotidet3C($c_codcont,$nrocoti,$id){return ActualizaAdicionaCotidet3M($c_codcont,$nrocoti,$id);}
function ActualizaAdicionaCotidet2C($nrocoti,$id){ return ActualizaAdicionaCotidet2M($nrocoti,$id);}
function ActualizaInvCotizarC($c_idequipo){
	return ActualizaInvCotizarM($c_idequipo);
	}


function GrabaCronogramaC($c_numped,$n_item,$c_codcia,$n_cuota,$n_importe,$c_nrofac,$d_fecven,$c_estado,$d_fecreg,$c_oper,$c_codprd,$c_desprd,$codequipo,$n_cantidad,$c_clase,$n_dscto,$n_cant,$c_glosa){
$resu=GrabaCronogramaM($c_numped,$n_item,$c_codcia,$n_cuota,$n_importe,$c_nrofac,$d_fecven,$c_estado,$d_fecreg,$c_oper,$c_codprd,$c_desprd,$codequipo,$n_cantidad,$c_clase,$n_dscto,$n_cant,$c_glosa);
	}

function ActualizaAdicionaCotidetC($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti,$id){
$resul= ActualizaAdicionaCotidetM($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti,$id);
}
function GrabaCondicionesC($c_numped,$n_item,$c_codcia,$c_glosa,$n_importe,$d_fecregula,$d_fecreg,$c_oper,$c_letra,$c_contrato,$c_carta){
	$resultado=GrabaCondicionesM($c_numped,$n_item,$c_codcia,$c_glosa,$n_importe,$d_fecregula,$d_fecreg,$c_oper,$c_letra,$c_contrato,$c_carta);
	}
function UpdateCotizacionCabC($nrocoti,$fpag,$d_fecvig,$useraprob,$d_fecapr){ $resul= UpdateCotizacionCabM($nrocoti,$fpag,$d_fecvig,$useraprob,$d_fecapr);}

	
if($_GET["acc"] == "veralquileres") // MOSTRAR: Formulario Nuevo Registro
{
	$secuencia=UserRegCliC($_GET['udni']);
foreach($secuencia as $item){
	$codi=$item['login'];
	}
	$login=ListaUsuarioM();
	$reporte=listacronogramasvencidosM($_GET['udni'],$_GET['mod']);
	include('../MVC_Vista/Cotizaciones/ListaAlquileresVen.php');
	
}

if($_GET["acc"] == "alquirep01") // MOSTRAR: Formulario Nuevo Registro
{

	$reporte=Ver_AlquileresCotizacionesC();
	include('../MVC_Vista/Cotizaciones/AlquilerReffer.php');
	
}

if($_GET["acc"] == "eliminacoti") // MOSTRAR: Formulario Nuevo Registro
{
$cotiz=$_GET['coti'];
	eliminarCotizacionC($cotiz);
	
	$mensaje=" Eliminado......";
		print "<script>alert('$mensaje')</script>";
	
	
	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
}

if($_GET["acc"] == "cerrarcoti") // MOSTRAR: Formulario Nuevo Registro
{
$cotiz=$_GET['coti'];
	cerrarCotizacionC($cotiz);
	
	$mensaje="Finalizando Cotizacion......";
		print "<script>alert('$mensaje')</script>";
	
	
	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
}
function cerrarCotizacionC($coti){return  cerrarCotizacionM($coti);}

if($_GET["acc"] == "pasarfacturar") // MOSTRAR: Formulario Nuevo Registro
{
$cotiz=$_GET['coti'];
	PasarFacturarCotizacionC($cotiz);
	
	$mensaje=" Pasando a Facturar......";
		print "<script>alert('$mensaje')</script>";
	
	
	include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
}


function ActualizaAdicionaCotiCabC($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti){
$resultado=ActualizaAdicionaCotiCabM($c_codcont,$c_fecini,$c_fecfin,$c_codcla,$nrocoti);}

function Ver_AlquileresCotizacionesC(){ return  Ver_AlquileresCotizacionesM();}

function eliminarCotizacionC($coti){ $resultado= eliminarCotizacionM($coti);}
function PasarFacturarCotizacionC($coti){ $resultado= PasarFacturarCotizacionM($coti);}
function ListaCondicionC(){ return  ListaCondicionM();}
function listaclienteC($descrip){ return  listaclienteM($descrip);}
function lista_tipodocuC(){ return  lista_tipodocuM();}
function lista_distritoC(){ return  lista_distritoM();}
function listainventarioC(){ return listainventarioM();}
function ListarSerieC(){ return  ListarSerieM();}
if($_GET["acc"] == "listacli") // MOSTRAR: Formulario Nuevo Registro
{	
$resulta=listaclienteC($_REQUEST['des']);
	

include('../MVC_Vista/Cotizaciones/ListaCliente.php');}
if($_GET["acc"] == "regcli") // MOSTRAR: Formulario Nuevo Registro
{	include('../MVC_Vista/Cotizaciones/RegistroCliente.php');}
if($_GET["acc"] == "listainv") // MOSTRAR: Formulario Nuevo Registro
{	include('../MVC_Vista/Cotizaciones/ListaInventario.php');}

if($_GET["acc"] == "segcoti") // MOSTRAR: Formulario Nuevo Registro
{	include('../MVC_Vista/Cotizaciones/Lista_Cotizaciones_usuario.php');}

if($_GET["acc"] == "regprov") // MOSTRAR: Formulario Nuevo Registro regprov
{
	
	
	
	 $udni=$_GET['udni'];
	// $resultado=Obtener_UsuarioM($udni);
	$resultados=Obtener_UserM($udni);
		include('../MVC_Vista/Cotizaciones/RegistroProv.php');}
if($_GET["acc"] == "regprovV2") // MOSTRAR: Formulario Nuevo Registro regprov
{
include('../MVC_Vista/Cotizaciones/untitled.php');	
}

if($_GET["acc"] == "gregprov") // MOSTRAR: Formulario Nuevo Registro regprov
{	
$PR_RUC=$_REQUEST['ruc'];
$PR_RAZO=ltrim($_POST['textfield3']);
$PR_NRUC=$_POST['ruc'];
$PR_DIR1=ltrim(strtoupper($_POST['textfield5']));
$PR_DIR2=ltrim(strtoupper($_POST['textfield5']));

$PR_TELE=$_POST['textfield7'];
$PR_EMAI=$_POST['textfield8'];
$PR_ESTA='1';
$C_CODCIA='01';
$C_CODTDA='000';
$pr_freg=date("d/m/Y");
$pr_oper=$_POST['user'];
$c_estado='1';

$c_CodCert=$_GET['certi'];
$c_DetalleCert=$_GET['nrocerti'];
	
$secuencia=validaprovC($PR_NRUC);
	//$mensaje="Ruc de Proveedor NO  Registrado";
if($secuencia!=NULL){
		$mensaje="Ruc de Proveedor YA  Registrado";
		$sw='1';
		print "<script>alert('$mensaje')</script>";
	include('../MVC_Vista/Cotizaciones/ListaProveedores.php');
	}else{
		$sw='0';
grabaprovC($PR_RUC,$PR_RAZO,$PR_NRUC,$PR_DIR1,$PR_DIR2,$PR_TELE,$PR_EMAI,$PR_ESTA,$C_CODCIA,$C_CODTDA,$pr_freg,$pr_oper,$c_CodCert,$c_DetalleCert);
	
for($i=1;$i<=50;$i++){
		
	$C_RUCTRA=strtoupper($_REQUEST['ruc']);
	$C_NONTRA=strtoupper($_REQUEST['textfield3']);
	//$C_NONTRA=strtoupper($_REQUEST['chofer'.$i]);
	$C_CHOFER=strtoupper($_REQUEST['chofer'.$i]);
	$C_PLACA=strtoupper($_REQUEST['placa'.$i]);
	$C_BREVETE=strtoupper($_REQUEST['brevete'.$i]);
	$C_MTC=strtoupper($_REQUEST['mtc'.$i]);
if($C_CHOFER != "")
		{

grabatransportistasC($C_RUCTRA,$C_NONTRA,$C_CHOFER,$C_PLACA,$C_BREVETE,$C_MTC,$C_MARCA,$c_estado);

		}
	}

$mensaje="Ruc de Proveedor Registrado Correctamente.";
		print "<script>alert('$mensaje')</script>";
		
		}// fin if validacion




}


if($_GET["acc"] == "adicionatrans") // MOSTRAR: Formulario Nuevo Registro regprov
{
	$sw=$_REQUEST['sw'];
	$ruc=strtoupper($_REQUEST['cod']);
	if($sw == "1")
		{
			
eliminatransportistasC($ruc);
			
			}
for($i=1;$i<=50;$i++){
		
		$c_estado='1';
		$sw=$_REQUEST['sw'];
		$C_RUCTRA=strtoupper($_REQUEST['cod']);
	$C_NONTRA=strtoupper($_REQUEST['nom']);
	//$C_NONTRA=strtoupper($_REQUEST['chofer'.$i]);
	$C_CHOFER=strtoupper($_REQUEST['chofer'.$i]);
	$C_PLACA=strtoupper($_REQUEST['placa'.$i]);
	$C_MARCA=strtoupper($_REQUEST['marca'.$i]);
	$C_BREVETE=strtoupper($_REQUEST['brevete'.$i]);
	$C_MTC=strtoupper($_REQUEST['mtc'.$i]);
if($C_CHOFER != "")
		{
grabatransportistasC($C_RUCTRA,$C_NONTRA,$C_CHOFER,$C_PLACA,$C_BREVETE,$C_MTC,$C_MARCA,$c_estado);
		}
		
}
$mensaje="Chofer(s) Agregado(s)";
		print "<script>alert('$mensaje')</script>";
}
if($_GET["acc"] == "verchoferes") // MOSTRAR: Formulario Nuevo Registro regprov
{
	include('../MVC_Vista/Cotizaciones/ver_choferes.php');
	}

function grabaprovC($PR_RUC,$PR_RAZO,$PR_NRUC,$PR_DIR1,$PR_DIR2,$PR_TELE,$PR_EMAI,$PR_ESTA,$C_CODCIA,$C_CODTDA,$pr_freg,$pr_oper,$c_CodCert,$c_DetalleCert){
$resul=grabaprovM($PR_RUC,$PR_RAZO,$PR_NRUC,$PR_DIR1,$PR_DIR2,$PR_TELE,$PR_EMAI,$PR_ESTA,$C_CODCIA,$C_CODTDA,$pr_freg,$pr_oper,$c_CodCert,$c_DetalleCert);}
function actualizaprovC($PR_RUC,$PR_RAZO,$PR_DIR1,$PR_DIR2,$PR_TELE,$PR_EMAI){
$resul= actualizaprovM($PR_RUC,$PR_RAZO,$PR_DIR1,$PR_DIR2,$PR_TELE,$PR_EMAI);}

function grabatransportistasC($C_RUCTRA,$C_NONTRA,$C_CHOFER,$C_PLACA,$C_BREVETE,$C_MTC,$C_MARCA,$c_estado){
$resul= grabatransportistasM($C_RUCTRA,$C_NONTRA,$C_CHOFER,$C_PLACA,$C_BREVETE,$C_MTC,$C_MARCA,$c_estado);}

function listaichoferesC($ruc){ return listaichoferesM($ruc);}
function eliminatransportistasC($C_RUCTRA){
$resul=eliminatransportistasM($C_RUCTRA);}
function validaprovC($pr_ruc){
return  validaprovM($pr_ruc);}
function buscaequipoclienteC($idequipo){ return buscaequipoclienteM($idequipo);}
function buscaequipocliente2C($idequipo){ return buscaequipoclienteM($idequipo);}
if($_GET["acc"] == "repcot6")
{
	include('../MVC_Vista/Cotizaciones/Reporte6_equipos_situ.php');
	//$EstadisticaAnioymes=Ver_EstadisticaC();
	//include('../MVC_Vista/Cotizaciones/EstadisticaCotizaciones.php');
}

if($_GET["acc"] == "verrep06") // MOSTRAR: Formulario Nuevo Registro
{
	$idequipo=$_REQUEST['codequipo1'];
	
	

$reporte=buscaequipoclienteC($idequipo);
	//$reporte2=Listar_CotizacionesAprobadasC($cli,$ff,$sw);
	include('../MVC_Vista/Cotizaciones/Reporte6_equipos_situ.php');
}

if($_GET["acc"] == "repcot7")
{
	include('../MVC_Vista/Cotizaciones/Reporte7_equipos_situ.php');
}
if($_GET["acc"] == "verrep07") // MOSTRAR: Formulario Nuevo Registro
{
	
//$idequipo=$_REQUEST['codequipo1'];

$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reporte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=Reporte.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=Reporte.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteCompras.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}	
	if($_POST['sw']=='1'){
		$reporte=listaequipoSituacionFiltroM($_POST['cod']);	
	}else{
		
	 $clase=$_POST['claseprod'];
 	 $situ=$_POST['situequi'];
	$codprod=$_POST['codigo'];

	$reporte=ListaequipoSituacionC($clase,$situ,$codprod);

		}
	//$reporte2=Listar_CotizacionesAprobadasC($cli,$ff,$sw);
	include('../MVC_Vista/Cotizaciones/Reporte7_equipos_situ.php');
}
/*lista equipo x situacion*/
function ClaseEquipoC(){ return ClaseEquipoM();}
function SituacionEquipoC(){ return  SituacionEquipoM();}
function ListaequipoSituacionC($clase,$situ,$codprod){ return  ListaequipoSituacionM($clase,$situ,$codprod);}

if($_GET["acc"] == "verdetalleequialm") // MOSTRAR: Formulario Nuevo Registro
{
	$idequipo=$_GET['cod'];
	$reporte=detalleguiasituacionM($idequipo);
	include('../MVC_Vista/Cotizaciones/DetalleDespachoGuia.php');
}

if($_GET["acc"] == "verdetalleequi") // MOSTRAR: Formulario Nuevo Registro
{
	echo $situacion=$_GET['situ'];
	$idequipo=$_GET['cod'];
	
	$valorencontrado=BuscarcodigopedidetC($idequipo);
	if($valorencontrado!=NULL){
		//$mensaje="equipo encontrado";
		echo $sw='1';
	}else{
				//$mensaje="equipo NO encontrado";
	   echo $sw='0';
		}

	if($situacion=='ALQ' && $sw=='1'){
		//echo 'okass';
	$reporte=buscaequipoclienteC($idequipo);
	include('../MVC_Vista/Cotizaciones/detallesituequipo.php');
	}elseif($situacion=='COT'){
			$reporte=buscaequipoclienteCotizadoC($idequipo);
			include('../MVC_Vista/Cotizaciones/detallesituequipo.php');
	}
	
	
	if($situacion=='VTA' && $sw=='1'){
		//echo 'oka';
		//echo ' // Nota: Equipo vendido antes de tener implementado el sistema de cotizaciones';
		$reporte=buscaequipocliente2C($idequipo);
	include('../MVC_Vista/Cotizaciones/detallesituequipo.php');
	}

	if($situacion=='VTA' && $sw=='0'){
		echo ' // Nota: Equipo vendido antes de tener implementado el sistema de cotizaciones';
		$reporte=buscaequipoclienteNOCotizadoC($idequipo);
	include('../MVC_Vista/Cotizaciones/detallesituequipo.php');
	}
	
}

function listamodeloC(){ return listamodeloM();}
function listamarcaXC(){ return listamarcaXM();}
function listacolorC(){  return  listacolorM();}
function listamquinaC(){ return  listamquinaM();}
function EquipoInvequipoC($cod){ return  EquipoInvequipoM($cod);}
function EquipoestadoC(){ return  EquipoestadoM();}
function ListaProveedorIC(){ return  ListaProveedorIM();}
if($_GET["acc"] == "datosmanufactura") // MOSTRAR: Formulario Nuevo Registro
{
	$idequipo=$_GET['cod'];
	$des=$_GET['situ'];
	//$resul=EquipoInvequipoC($idequipo);
	$tipo=$_GET['codclase'];
	
	
		if($tipo=='001'){ //muestra formulario DRY
	$resul=CodEquipoInvequipoM($idequipo);
	$resulv2=CodEquipoInvequipov2M($idequipo);
	$resulv3=listarproveedorequipoM($idequipo);
		include('../MVC_Vista/Cotizaciones/RegDrySC.php');
		} 
	    if($tipo=='002'){ //muestra formulario REEFER/ REEFER EVERFRESH
	$resul=CodEquipoInvequipoM($idequipo);
	$resulv2=CodEquipoInvequipov2M($idequipo);
	$resulv3=listarproveedorequipoM($idequipo);
	include('../MVC_Vista/Cotizaciones/RegReeferSC.php');
		} 
	if($tipo=='003'){ //muestra formulario GENERADORES
	$resul=CodEquipoInvequipoM($idequipo);	
	$resulv2=CodEquipoInvequipov2M($idequipo);
		$resulv3=listarproveedorequipoM($idequipo);
	include('../MVC_Vista/Cotizaciones/RegGeneradorSC.php');
		} 	
	if($tipo=='004' || $tipo=='005'){ //muestra formulario CARRETA/PLATAFORMAS
	$resul=CodEquipoInvequipoM($idequipo);	
	$resulv2=CodEquipoInvequipov2M($idequipo);
		$resulv3=listarproveedorequipoM($idequipo);
	include('../MVC_Vista/Cotizaciones/RegCarretaSC.php');
		} 		
	if($tipo=='012'){ //muestra formulario TRANSFORMADORES
	$resul=CodEquipoInvequipoM($idequipo);
	$resulv2=CodEquipoInvequipov2M($idequipo);
		$resulv3=listarproveedorequipoM($idequipo);
	include('../MVC_Vista/Cotizaciones/RegTransformadorSC.php');	
		}
	
	
	
	//include('../MVC_Vista/Cotizaciones/DetalleManufactura.php');
	
	}
	/**11 12 14*/
if($_GET["acc"] == "actsitestalmequipo") // MOSTRAR: Formulario Nuevo Registro
{
		$idequipo=$_GET['cod'];
	$des=$_GET['situ'];
	$resul=EquipoInvequipoC($idequipo);
	$tipo=$_GET['codclase'];
	include('../MVC_Vista/Cotizaciones/DetalleManufactura.php');
}

if($_GET["acc"] == "actudatainveqalm") // MOSTRAR: Formulario Nuevo Registro
{
	$idequipo=$_REQUEST['hiddenField'];
	$estaant=$_REQUEST['hiddenField2'];
	$user=$_REQUEST['udni'];
	$newesta=$_REQUEST['estado'];
	$fecha=date("d/m/Y H:i:s");
	
	updatecodsitalm($idequipo,$user,$estado,$fecha);
	registratemcodigoM($idequipo,$estaant,$newesta,$user,$fecha);
	$mensaje="Se actualizo El estado del equipo";
		print "<script>alert('$mensaje')</script>";	
	
}               
if($_GET["acc"] == "updateequipo") // MOSTRAR: Formulario Nuevo Registro
{
$c_idequipo=$_REQUEST['c_idequipo'];$c_codprd=$_REQUEST['c_codprd'];$c_nserie=$_REQUEST['c_nserie'];
$codmar=$_REQUEST['codmar'];$c_codmod=$_REQUEST['c_codmod'];$c_codcol=$_REQUEST['c_codcol'];
$c_anno=$_REQUEST['c_anno'];$c_control=$_REQUEST['c_control'];$c_codcat=$_REQUEST['c_codcat'];
$c_tiprop=$_REQUEST['c_tiprop'];$c_mcamaq=$_REQUEST['c_mcamaq'];$c_procedencia=$_REQUEST['c_procedencia'];$c_nroejes=$_REQUEST['c_nroejes'];$c_tamCarreta=$_REQUEST['c_tamCarreta'];$c_serieequipo=
$_REQUEST['c_serieequipo'];$c_peso=$_REQUEST['c_peso'];$c_tara=$_REQUEST['c_tara'];
$c_seriemotor=$_REQUEST['c_seriemotor'];$c_canofab=$_REQUEST['c_canofab'];$c_cmesfab=$_REQUEST['c_cmesfab'];$c_cfabri=$_REQUEST['c_cfabri'];$c_cmodel=$_REQUEST['c_cmodel'];$c_ccontrola=
$_REQUEST['c_ccontrola'];$c_tipgas=$_REQUEST['c_tipgas'];$c_nacional="";$c_refnaci="";
$c_material=$_REQUEST['material'];
	UpdateVerDataInvequipoM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod);
if($_GET['udni']=='41696274'){
RegularizaEstadoEquipoALM($c_idequipo,$c_sit,$c_sit);
}		$mensaje="Se actualizo datos del equipo";
		print "<script>alert('$mensaje')</script>";	

}
	
	
if($_GET["acc"] == "actudatainveq") // MOSTRAR: Formulario Nuevo Registro
{

 $swequipo=$_REQUEST['swequipo'];

$c_numeir=$nroeir;$c_idequipo=$_REQUEST['c_idequipo'];$c_codprd=$_REQUEST['c_codprd'];$c_nserie=$_REQUEST['c_nserie'];$codmar=$_REQUEST['codmar'];$c_codmod=$_REQUEST['c_codmod'];$c_codcol=$_REQUEST['c_codcol'];$c_anno=$_REQUEST['c_anno'];$c_control=$_REQUEST['c_control'];$c_codcat=$_REQUEST['c_codcat'];$c_tiprop=$_REQUEST['c_tiprop'];$c_mcamaq=$_REQUEST['c_mcamaq'];$c_procedencia=$_REQUEST['c_procedencia'];$c_nroejes=$_REQUEST['c_nroejes'];$c_tamCarreta=$_REQUEST['c_tamCarreta'];$c_serieequipo=$_REQUEST['c_serieequipo'];$c_peso=$_REQUEST['c_peso'];$c_tara=$_REQUEST['c_tara'];
$c_seriemotor=$_REQUEST['c_seriemotor'];$c_canofab=$_REQUEST['c_canofab'];$c_cmesfab=$_REQUEST['c_cmesfab'];$c_cfabri=$_REQUEST['c_cfabri'];$c_cmodel=$_REQUEST['c_cmodel'];$c_ccontrola=$_REQUEST['c_ccontrola'];$c_tipgas=$_REQUEST['c_tipgas'];$c_nacional="";$c_refnaci="";
$c_material=$_REQUEST['material'];
$c_nacional=$_REQUEST['radio2'];
 $c_refnaci=$_REQUEST['textfield7'];
 $c_fecnac=$_REQUEST['c_fecnac'];
/*Actualiza en invequipo*/
$c_opermod=$_REQUEST['udni'];
$c_fecmod=date("d/m/Y H:i:s");
UpdateVerDataInvequipoM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_fecnac,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod,$c_fabcaja);

if($swequipo=='1')
{
	RegistraTempDetEirM($c_idequipo,$c_codprd,$c_nserie,$codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_material);
	}
/*Fin Actualiza en invequipo*/	


if($_GET['udni']=='41696274'){
RegularizaEstadoEquipoALM($c_idequipo,$c_sit,$c_sit);
}


	$mensaje="Se actualizo datos del equipo";
		print "<script>alert('$mensaje')</script>";	
}
function UpdateVerDataInvequipoC($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod){
	$res=UpdateVerDataInvequipoM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod);}

function buscaequipoclienteNOCotizadoC($idequipo){ return  buscaequipoclienteNOCotizadoM($idequipo);}	
function BuscarcodigopedidetC($idequipo){ return  BuscarcodigopedidetM($idequipo);}	
function buscaequipoclienteCotizadoC($idequipo){ return  buscaequipoclienteCotizadoM($idequipo);}
//***REPORTE INVENTARIOS

if($_GET["acc"] == "repinv01")
{
	include('../MVC_Vista/Cotizaciones/Reporte_Inventario_01.php');
}
if($_GET["acc"] == "repinvdet01")
{
	
	$sw=$_REQUEST['radio2'];
	if($sw=='1'){
		$dato=$_REQUEST['xcodprd'];
		}elseif($sw=='2'){
			$dato=$_REQUEST['xprov'];
			}elseif($sw=='3'){
				$dato=$_REQUEST['xserie'];
				}
		$reporte=ListaKardexProveedorC($dato,$sw);		
		include('../MVC_Vista/Cotizaciones/Reporte_Inventario_01.php');
}

function ListaKardexProveedorC($dato,$sw){ return  ListaKardexProveedorM($dato,$sw);}
/***guias**/ 
if($_GET["acc"] == "adicionatransportista")
{
	$ruc=$_GET['cod'];
	$reporte=listaichoferesC($ruc);
	include('../MVC_Vista/Cotizaciones/AdicionaTransportes.php');
}
if($_GET["acc"] == "lguia01")
{
//	include('../MVC_Vista/Cotizaciones/ListaGuiaRemision.php');
	include('../MVC_Vista/Cotizaciones/ReporteGuias.php');
	}
if($_GET["acc"] == "repguia01")
{
	include('../MVC_Vista/Cotizaciones/ListaGuiaRemision.php');
}
if($_GET["acc"] == "repguia02")
{
	include('../MVC_Vista/Cotizaciones/ListaGuiaRemisiondetallado.php');
}
if($_GET["acc"] == "verrepguia02")
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
$cli=$_REQUEST["codcli"];
 $reporte=reporteguiasdetalladoM($fecha1,$fecha2,$codcli,$sw);

include('../MVC_Vista/Cotizaciones/ListaGuiaRemisiondetallado.php');	 
}
function reporteguiasC($f1,$f2,$cli){ return  reporteguiasM($f1,$f2,$cli);}
function eliminarguiasC($guia){ $resul=eliminarguiasM($guia);}
if($_GET["acc"] == "verrepguia01")
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
$cli=$_REQUEST["codcli"];
$reporte=reporteguiasC($fecha1,$fecha2,$cli);
include('../MVC_Vista/Cotizaciones/ListaGuiaRemision.php');	 
}
if($_GET["acc"] == "eliminarguiaremision") // MOSTRAR: Formulario Nuevo Registro
{
$guia=$_GET['guia'];
	eliminarguiasC($guia);
	$detalle=ImprimeGuiaDetaM($guia);
	$i = 1;
	foreach($detalle as $item){
		$c_codprd=$item["c_codprd"];
		$c_estaequipo='D';$c_estaequipo='D';
		print "<script>alert('$c_codprd')</script>";	
	actuinvxguiaremisionM($c_codprd,$c_estaequipo,$c_estaequipo); 
	$i++;
	}
	$mensaje=" Eliminado Guia Click en Aceptar......";		
	include('../MVC_Vista/Cotizaciones/ListaGuiaRemision.php');
}
if($_GET["acc"] == "verdetalleguia") // MOSTRAR: Formulario Nuevo Registro
{
	$guia=$_GET['cod'];
	$cabecera=imprimeguiacab2C($guia);
	$detalle=imprimeguiadetC($guia);
	$i = 0;
	foreach($detalle as $itemD){
		$i+=1;
		}
if($i==1){include('../MVC_Vista/Cotizaciones/I_imprimirguia1.php');
}elseif($i==2){include('../MVC_Vista/Cotizaciones/I_imprimirguia2.php');
}elseif($i==3){include('../MVC_Vista/Cotizaciones/I_imprimirguia.php');
}elseif($i==4){include('../MVC_Vista/Cotizaciones/I_imprimirguia3.php');
}elseif($i==5){include('../MVC_Vista/Cotizaciones/I_imprimirguia4.php');
}elseif($i==6){include('../MVC_Vista/Cotizaciones/I_imprimirguia5.php');
}elseif($i==7){include('../MVC_Vista/Cotizaciones/I_imprimirguia5.php');}
}

/**INICIO GESTION TRANSPORTE*/
function BusquedaCotiautoC($descripcion){ return  BusquedaCotiautoM($descripcion);}
if($_GET["acc"] == "cotiauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //SELECT C_NUMPED,C_CODCLI,C_NOMCLI,C_CONTAC,C_TELEF,C_NEXTEL,C_EMAIL,C_ASUNTO,CC_NRUC,CC_DIR1 
 $busquedapacienteauto = BusquedaCotiautoC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cotcli=$item["C_NUMPED"];
		$codcli=$item["C_CODCLI"];
		$nomcli=utf8_encode($item["C_NOMCLI"]);
		$ruccli=$item["CC_NRUC"];
		$telcli=$item["C_TELEF"];
		$dircli=utf8_encode($item["CC_DIR1"]);
		$nexcli=$item["C_NEXTEL"];
		$emacli=$item["C_EMAIL"];
		$concli=$item["C_CONTAC"];
		$asucli=$item["C_ASUNTO"];
		$decod=$cotcli.' '.$nomcli;
		echo "$decod|$cotcli|$codcli|$nomcli|$ruccli|$telcli|$dircli|$nexcli|$emacli|$concli|$asucli\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
if($_GET["acc"] == "verchofer") // MOSTRAR: Formulario Nuevo Registro regprov
{
include('../MVC_Vista/Transporte/ver_choferes.php');		
}

if($_GET["acc"] == "framechof") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Transporte/frame_choferes.php');
}
if($_GET["acc"] == "vercargaguia") // MOSTRAR: Formulario Nuevo Registro regprov
{
	include('../MVC_Vista/Transporte/CargarGuia.php');
	}
if($_GET["acc"] == "Listasegui") // MOSTRAR: Formulario Nuevo Registro regprov
{
	include('../MVC_Vista/Transporte/ListaSeguimiento.php');
	}
if($_GET["acc"] == "nuevosegui") // MOSTRAR: Formulario Nuevo Registro regprov
{
	include('../MVC_Vista/Transporte/SeguimientoTransporte.php');
	}
if($_GET["acc"] == "conruc") // MOSTRAR: Formulario Nuevo Registro regprov
{
	include('../MVC_Vista/Cotizaciones/consultaruc.php');
	}
if($_GET["acc"] == "verdataguia") // MOSTRAR: Formulario Nuevo Registro regprov
{
	$cod=$_GET['ter'];
	$reporte=CargarguiasC($cod);
	include('../MVC_Vista/Transporte/CargarGuia.php');
	}
	
function CargarguiasC($cod){ return  CargarguiasM($cod);}
function BusquedaGuiaautoC($descripcion){ return BusquedaGuiaautoM($descripcion);}
if($_GET["acc"] == "guiaauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //SELECT C_NUMPED,C_CODCLI,C_NOMCLI,C_CONTAC,C_TELEF,C_NEXTEL,C_EMAIL,C_ASUNTO,CC_NRUC,CC_DIR1 
 $busquedapacienteauto = BusquedaGuiaautoC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$guianum=$item["C_NUMGUIA"];
		$guiacli=$item["C_NOMDES"];
		$decod=$guianum.' '.$guiacli;
		echo "$decod|$guianum|$guiacli\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
/*FIN GESTION TRANSPORTE*/

if($_GET["acc"] == "mostrarguia") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Cotizaciones/VerCronograma.php');	
}
if($_GET["acc"] == "ver_coti_guia") // MOSTRAR: Formulario Nuevo Registro
{
	
	$coti=$_GET['coti'];$cli=$_GET['cli'];
	$valida=buscacotcabguiaM($coti);
	if($valida!=NULL){
	foreach($valida as $item){
		$serie=$item['c_serdoc'];
		$num=$item['c_nume'];
		$numguia=$serie.'-'.$num;
		}
	}
	//if($valida==NULL){
	
		$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$obteneritemscotiza=listacotizacionesDet_guiaM($coti);
	include('../MVC_Vista/Inventario/guiaremisionconcoti.php');
/*	}else{
		$mensaje="Cotizacion ya registrado en la guia Nro:".$numguia;
		print "<script>alert('$mensaje')</script>";	
		
		}*/
	
}
if($_GET["acc"] == "cargar_coti_guia") // MOSTRAR: Formulario Nuevo Registro
{
	$texto =strtoupper($_REQUEST["q"]);
 //SELECT C_NUMPED,C_CODCLI,C_NOMCLI,C_CONTAC,C_TELEF,C_NEXTEL,C_EMAIL,C_ASUNTO,CC_NRUC,CC_DIR1 
 $busquedapacienteauto = listacotizacionespreaprobadasM($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$guianum=$item["c_numped"];
		$ncli=$item["c_nomcli"];
		$ccli=$item["c_codcli"];
		$asu=$item["c_asunto"];
		$decod=$guianum.' '.$ncli;
		echo "$decod|$guianum|$ncli|$ccli|$asu\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
//	include('../MVC_Vista/Cotizaciones/guiaremisionconcoti.php');
	
}
function BuscarucProvC($RUCTXT){ return  BuscarucProvM($RUCTXT);}
if($_GET["acc"] == "valrucprov") // MOSTRAR: Formulario Nuevo Registro
{
//vWritePageToFile( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc=10436232620', '43623262.txt' );
//
$RUCTXT=$_REQUEST["txtruc"];

if($_REQUEST["txtruc"]!=""){

   RecuperarXML( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc='.$RUCTXT, $RUCTXT.'.txt' );
   QuitarXML($RUCTXT.'.txt');
   QiotarLinesBlancas($RUCTXT.'.txt');

$con=mysqli_connect("localhost","root","334125","zgroup");
 
if (mysqli_connect_errno())
  {
  echo "orror  MySQL: " . mysqli_connect_error();
  }
mysqli_query($con,"LOAD DATA LOCAL INFILE '".$RUCTXT.".txt' REPLACE INTO TABLE sunatrusc FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n%%\n'");
/*ELIMINAMOS el TXT*/
unlink($RUCTXT.'.txt'); /// Luego eliminas el TXT
/* LUEGO PODEMOS ELIMINAR EL REGISTRO YA VISUALIZADO RECUERDA Q SOLO ES UNA TAMBLA TEMPORAL */

$result = mysqli_query($con,"SELECT * FROM sunatrusc limit  1");

while($row = mysqli_fetch_array($result))
  {
    $row["camo1"];
    list($RUSX, $RSOS) = split( '[-]', $row["camo1"]);
    $razonsocial=trim($RSOS);
   list($nombrerus, $ruc) = split( '[.]', trim($RUSX));
 // list($ruc, $razonsocial) = split( '[-]', trim($contenido));
    $row["camo2"];
    $row["camo3"];
    $row["camo4"];
  list($nombreestado, $estadoruc) = split( '[.]', $row["camo4"]);
    $row["camo5"];
 // list($nombreretencio, $retencionigv) = split( '[.]', $row["camo5"]);
    $retencionigv=substr($row["camo5"],26,500);
    $row["camo6"];
   list($nomcomericla, $nombrecomercial) = split( '[.]', $row["camo6"]);
   $nombrecomercial=substr($row["camo6"],20,500);
   $Direcciondomicilia=substr($row["camo7"],16,500);
   
   
  $row["camo8"];
  $row["camo9"];
     list($tel, $telf) = split( '[.]', $row["camo9"]);
  //$telf=substr($row["camo9"],16,500);
  
  $row["camo10"];
  $row["camo11"];
  $row["camo12"];
  $row["camo13"];
  $row["camo14"];
  $row["camo15"];
  }
//echo $ruc.$razonsocial;
$result = mysqli_query($con,"TRUNCATE sunatrusc");
mysqli_close($con);

$resultado=BuscarucProvC($RUCTXT);
if($resultado!=NULL){
$mensaje="Atención Proveedor Ya Existe";
		print "<script>alert('$mensaje')</script>";	
			$resulta=ListaProveedoresC($RUCTXT);
include("../MVC_Vista/Cotizaciones/ListaProveedores.php");
	
	}else{

	//$mensaje="RUC NO Existe";
	
		include("../MVC_Vista/Cotizaciones/RegistroProv.php");
		}
	


}
	
}

///para cliente

function BuscaruccliC($RUCTXT){ return  BuscaruccliM($RUCTXT);}
if($_GET["acc"] == "valruccli") // MOSTRAR: Formulario Nuevo Registro
{
//vWritePageToFile( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc=10436232620', '43623262.txt' );
//$RUCTXT=$_REQUEST["txtruc"];
//$DNI=$_REQUEST['DNI'];

if($_REQUEST['selecttp']=="J"){$RUCTXT=$_REQUEST['txtruc'];}else{$RUCTXT=$_REQUEST['DNI'];}


if($_REQUEST["txtruc"]!=""){

   RecuperarXML('http://www.sunat.gob.pe/w/wapS01Alias?ruc='.$RUCTXT, $RUCTXT.'.txt' );
   QuitarXML($RUCTXT.'.txt');
   QiotarLinesBlancas($RUCTXT.'.txt');

$con=mysqli_connect("localhost","root","334125","zgroup");
 
if (mysqli_connect_errno())
  {
  echo "orror  MySQL: " . mysqli_connect_error();
  }
mysqli_query($con,"LOAD DATA LOCAL INFILE '".$RUCTXT.".txt' REPLACE INTO TABLE sunatrusc FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n%%\n'");
/*ELIMINAMOS el TXT*/
unlink($RUCTXT.'.txt'); /// Luego eliminas el TXT
/* LUEGO PODEMOS ELIMINAR EL REGISTRO YA VISUALIZADO RECUERDA Q SOLO ES UNA TAMBLA TEMPORAL */

$result = mysqli_query($con,"SELECT * FROM sunatrusc limit  1");

while($row = mysqli_fetch_array($result))
  {
    $row["camo1"];
    list($RUSX, $RSOS) = split( '[-]', $row["camo1"]);
    $razonsocial=trim($RSOS);
   list($nombrerus, $ruc) = split( '[.]', trim($RUSX));
 // list($ruc, $razonsocial) = split( '[-]', trim($contenido));
    $row["camo2"];
    $row["camo3"];
    $row["camo4"];
  list($nombreestado, $estadoruc) = split( '[.]', $row["camo4"]);
    $row["camo5"];
 // list($nombreretencio, $retencionigv) = split( '[.]', $row["camo5"]);
    $retencionigv=substr($row["camo5"],26,500);
    $row["camo6"];
   list($nomcomericla, $nombrecomercial) = split( '[.]', $row["camo6"]);
   $nombrecomercial=substr($row["camo6"],20,500);
   $Direcciondomicilia=substr($row["camo7"],16,500);
   
   
  $row["camo8"];
  $row["camo9"];
     list($tel, $telf) = split( '[.]', $row["camo9"]);
  //$telf=substr($row["camo9"],16,500);
  
  $row["camo10"];
  $row["camo11"];
  $row["camo12"];
  $row["camo13"];
  $row["camo14"];
  $row["camo15"];
  }
//echo $ruc.$razonsocial;
$result = mysqli_query($con,"TRUNCATE sunatrusc");
mysqli_close($con);

}
$resultado=BuscaruccliC($RUCTXT);
if($resultado!=NULL){
$mensaje="Atención Cliente Ya Existe!!";
		print "<script>alert('$mensaje')</script>";	
		$resulta=listaclienteC($RUCTXT);
include("../MVC_Vista/Cotizaciones/ListaCliente.php");
	
	}else{
		$mensaje="Atención Proceda A Completar Datos!!";
		print "<script>alert('$mensaje')</script>";	
		include("../MVC_Vista/Cotizaciones/RegistroCliente.php");
		}


	
}

function BusquedaautoclicronoC($descripcion){ return  BusquedaautoclicronoM($descripcion);}

if($_GET["acc"] == "clicautocrono") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; c_numped,c_cocli,c_nocli c_numped,c_codcli,c_nomcli ,c_asunto
 $busquedapacienteauto = BusquedaautoclicronoC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["c_codcli"];
		$razon = utf8_encode($item["c_nomcli"]);
		$coti =$item["c_numped"];
		$asunto=$item["c_asunto"];

		$decod=$coti.' '.$razon.' '.$asunto;
		echo "$decod|$cod|$razon|$coti\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

function ListadiasC(){ return ListadiasM();}

if($_GET["acc"] == "verfechas") // MOSTRAR: Formulario Modificar Registro
{	include("../MVC_Vista/Cotizaciones/ventanaFecha.php");}

if($_GET["acc"] == "calculafecha") // MOSTRAR: Formulario Modificar Registro
{
	$xd_fecreg=$_REQUEST['fecha'];$dias=$_REQUEST['dia'];
	$fecha2=caculadias($xd_fecreg,$dias);
	
	include("../MVC_Vista/Cotizaciones/ventanaFecha.php");
	}
function caculadias($xd_fecreg,$dias){
list($day,$mon,$year) = explode('/',$xd_fecreg);
$zz= date('d/m/Y',mktime(0,0,0,$mon,$day+$dias,$year));
list($day,$mon,$year) = explode('/',$zz);
$zzz= date('d/m/Y',mktime(0,0,0,$mon,$day-1,$year));
return $zzz;
}

function ActFPagCotC($c_codpga,$c_codpgf,$c_numped,$vigencia){
	$resul=ActFPagCotM($c_codpga,$c_codpgf,$c_numped,$vigencia);
	}
if($_GET["acc"] == "updatefpcoti") // MOSTRAR: Formulario Modificar Registro
{
	$c_numped=$_REQUEST['hiddenField2'];
	$c_codpga=$_REQUEST['plazo'];
	$c_codpgf=$_REQUEST['plazo'];
	$vigencia=$_REQUEST['vigencia'];
	ActFPagCotC($c_codpga,$c_codpgf,$c_numped,$vigencia);
	
	for($i=1;$i<=20;$i++){
		
		$clase=$_REQUEST['clase'.$i];
	    $id=$_REQUEST['id'.$i];
		if($clase != ""){
		ActualizaAdicionaCotidetx23M($clase,$c_numped,$id);
		}
	}
	
	$mensaje="Se Actualizo Datos Vuelva A Verificar!!!";
		print "<script>alert('$mensaje')</script>";	
		
		include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
}
//11/02/2015
if($_GET["acc"] == "ver_ultimascoti") // MOSTRAR: Formulario Nuevo Registro
{
	//$codigop=$_REQUEST['codigo'];
	
	include('../MVC_Vista/Cotizaciones/Ver_ultimascot.php');
}
/*if($_GET["acc"] == "admv2") // MOSTRAR: Formulario Modificar Registro
{

	$sw='9';
	$des='';	
$reporte=listarCotizacionesv2M($des,$sw);
include('../MVC_Vista/Cotizaciones/Lista_Cotizacionv2.php');
}
if($_GET["acc"] == "veradmv2") // MOSTRAR: Formulario Modificar Registro
{

	 $sw=$_REQUEST['sw'];
     $descripcion=$_REQUEST['descripcion'];	
$reporte=listarCotizacionesv2M($descripcion,$sw);
include('../MVC_Vista/Cotizaciones/Lista_Cotizacionv2.php');
}*/

//MALY 21/02/2014


// BUSCAR CLIENTE PARA EL FUSIONADO

if($_GET["acc"] == "buscarcliente") 
{
	include('../MVC_Vista/Cotizaciones/buscarcliente.php');
}



if($_GET["acc"] == "listacoticliente") 
{
	$cli=$_REQUEST['codcli'];
	//$ff=$_REQUEST['cli'];
	//$asunto=$_REQUEST['asunto'];
	//$coti=$_REQUEST['cotiz'];
	

$reporte=listacoticlienteC($cli);
	
include('../MVC_Vista/Cotizaciones/buscarcliente.php');	
	}



function listacoticlienteC($cli){return listacoticlienteM($cli);}




	




if($_GET['acc']=='fusionar'){
	
	
/////////////////////////LLENAR LA CABECERA CUANDO SELECCIONO UNA COTIZACION (debe llenar los datos de la mayor cotizacion seleccionada)
 	
	for($i=1;$i<=20;$i++){
	$id=$_REQUEST['checka'.$i];	
	//$coti=$_REQUEST['c_numped'];
	$cli=$_REQUEST['c_codcli'];	
	
		if($id!=""){
		
		$reporte_Coti=Ver_CotiC($cli,$id); 
		
			if($reporte_Coti!=0){
				
				foreach($reporte_Coti as $item){
				
					$cotizacion=$item['c_numped'];
					$moneda=$item['c_codmon'];
					$tipo=$item['c_tipped'];
					$asunto=$item['c_asunto'];
					$vendedor=$item['c_codven'];
					$razon=$item['c_nomcli'];
					$ruc=$item['cc_nruc'];
					$direccion=$item['c_nomcli'];
					$nextel=$item['c_nextel'];
					$mail=$item['c_email'];
					$contacto=$item['c_contac'];
					$codcli=$item['c_codcli'];
					$tipocambio=$item['n_tcamb'];
					$telefono=$item['c_telef'];
					$lugarentrega=$item['c_lugent'];
					$tiempoentrega=$item['c_tiempo'];
					$validez=$item['c_validez'];
					$plazoentrega=$item['c_codpgf']; 
					$precios=$item['c_precios'];
					$descrip=$item['c_desgral'];
					$obs=$item['c_obsped'];
					$glosa=$item['c_desgral'];
					$n_idreg=$item['n_idreg'];
					$tipocoti=$item['c_tipped'];
					
					$n_bruto=$item['n_bruto'];
					$n_dscto=$item['n_dscto'];
					$n_neta=$item['n_neta'];
					$n_neti=$item['n_neti'];	
							
				
		
		$arreglo1[$i]=array("$cotizacion","$moneda","$tipo","$asunto","$vendedor","$razon","$ruc","$direccion","$nextel","$mail","$contacto","$codcli","$tipocambio","$telefono","$lugarentrega","$tiempoentrega","$validez","$plazoentrega","$precios","$descrip","$obs","$glosa","$n_idreg","$tipocoti","$n_bruto","$n_dscto","$n_neta","$n_neti");
			
			//var_dump($arreglo1);	
				}
			}
		}
	}
	
	
	
	
/////////////////////////LLENAR ITEMS DEL DETALLE
//$j=1;
//$xtotal=0;
	for($i=0;$i<=20;$i++){		
		
		$chk=$_REQUEST['checka'.$i];
		if($chk!=""){
		//$reporte_Coti=Ver_CotiC($cli,$chk); 
		
		
			
			//foreach($reporte_Coti as $itemcab){
			//$c_numpedcab=$itemcab['c_numped'];
			
			$resul=listaritemC($chk);
			
			if($resul!=0){
				foreach($resul as $item){
					
				$c_codprd=$item['c_codprd'];			
				$c_desprd=utf8_encode($item['c_desprd']);	
				$c_descr2=utf8_encode($item['c_descr2']);
				$c_obsdoc=utf8_encode($item['c_descr2']);
				
				$c_codcont=utf8_encode($item['c_codcont']);
				
				$c_fecini=$item['c_fecini'];	
				$c_fecfin=$item['c_fecfin'];				
				$c_tipped=$item['c_tipped'];
				
				$precio=$item['n_preprd'];
				$n_preprd=$precio;
				$n_dscto=$item['n_dscto'];
				$n_canprd=$item['n_canprd'];	
				$n_totimp=$item['n_totimp'];
				
				//}
				
			////***INICIO DETALLE***///
//$j=1;$xtotal=0;
//for($i=1;$i<=100;$i++){	
$c_numped=$chk;$c_codcia='01';$c_codtda='000';$n_item=$i;

//$c_registro=$_REQUEST['re'.$i];
//$c_codcla=$c_tipped;
$n_prelis='0';$n_precrd='0';$n_costo='0';
$n_apbpre='0';
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
$n_prevta=($precio)*1.18;

//Datos de aprobacion
$c_usuapb='';$c_fecapb='';

/*fin*/


/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio-$n_dscto)*$n_canprd;
$n_totimp=$total;
/*fin*/

$n_canfac="0";$n_canbaj="0";$c_codafe="001";
$c_codlp="0011";$c_tiprec="N";$n_intprd="0";


//$n_idreg=$secuencialidreg;$n_id='';
$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_GET['udni'];
$n_iddef=1;

if($c_codprd != "")
		{
			$n_apbpre='1';
GuardaCopiaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_descr2,$c_obsdoc,$c_codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$n_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$d_fecreg,$c_oper,$n_apbpre,$n_iddef);


//$j=$j+1;
//$xtotal+=$n_totimp;



if($c_registro!=''){
//	jala desde cuadro ver cronograma

}

/****/


		}
	//}

///////////////////////FIN DETALLE					
				
					
			//$arreglo2[$i]=array($c_codprd,$c_desprd,$c_descr2,$c_codcont,$c_fecini,$c_fecfin,$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_totimp);//10 regiatrpa guarda
			//var_dump($arreglo2);
			}
			
			}		
		//  }
		
		
		
		//$actualizaestado=cambiaestadoCotiM($chk);
		
		
		
    	}
	}
	
	$c_oper=$_GET['udni'];
	$resultadodet=listaritemCopiaC($c_oper);
	if($resultadodet != NULL){		
		
	$elimina=eliminaritemCopiaC($c_oper);
	

	
	include('../MVC_Vista/Cotizaciones/RegistrarFusion.php');

	}else{
		
		$mensaje="SELECCIONE LAS COTIZACIONES A FUSIONAR";
		print "<script>alert('$mensaje')</script>";
	
	}
	
}





function Ver_CotiC($cli,$coti){return Ver_CotiM($cli,$coti);}
function listaritemC($chk){ return  listaritemM($chk);}
function listaritemCopiaC($c_oper){ return  listaritemCopiaM($c_oper);}
function eliminaritemCopiaC($c_oper){ return  eliminaritemCopiaM($c_oper);}

if($_GET["acc"] == "guardarfusioncoti") // GUARDAR COTIZACION
{

/*15 04 2014*/
$c_gencrono=$_REQUEST['gencrono'];
$c_codtit=$_REQUEST['codtitulo'];
$c_swfirma=$_REQUEST['c_swfirma'];
$idregistro=$_REQUEST['idreg'];
/**/
$secuencia=NropedidoC();
if($secuencia!=NULL)
{
	foreach ($secuencia as $item)
	{
		$secuencialpedido = $item["cod"]+1;
		}
}	
$c_tippeddetalle=$_REQUEST['clase1'];
$secuencia2=Nropedido2C();
if($secuencia2!=NULL)
{
	foreach ($secuencia2 as $item)
	{
		$secuencialidreg = $item["cod"]+1;
		}
}		

$nroped=substr($secuencialpedido,4,8);
$c_opcrea=$_REQUEST['codvendedor'];


$useraprob=$_REQUEST['codvendedor'];
$fpag='18';
$d_fecapr=date('d/m/Y');


$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$c_numpd=$nroped;
$c_codcli=$_REQUEST['hc'];$c_nomcli=$_REQUEST['razon'];$c_contac=strtoupper($_REQUEST['contacto']);$c_telef=$_REQUEST['telefono'];
$c_nextel=$_REQUEST['nextel'];$c_email=strtoupper($_REQUEST['correo']);$c_asunto=strtoupper($_REQUEST['asunto']);$c_codven=$_REQUEST['vendedor'];
$d_fecped=$_REQUEST['fecha'];$d_fecvig=$_REQUEST['xfecha'];$c_tipped=$_REQUEST['tipo'];$n_bruto=$_REQUEST['st'];$n_dscto=$_REQUEST['descuento'];
$n_neta=$_REQUEST['bi'];$n_neti=$_REQUEST['bi'];$n_facisc='0';
$n_swint='0';$n_tasigv='18';
$n_totigv='0';
$n_totped=$_REQUEST['bi'];
$n_tcamb=$_REQUEST['prueba'];$c_codmon=$_REQUEST['moneda'];$c_codpga=$_REQUEST['plazo'];
$c_codpgf=$_REQUEST['plazo'];
$c_estado='0';

//$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
if($_REQUEST['checkbox2']=='1'){
$c_obsped=nl2br(utf8_decode($_REQUEST['area3']));
}else{ $c_obsped=(utf8_decode($_GET['obs']));}

$d_fecent=$_REQUEST['fecha'];$c_lugent=$_REQUEST['lugar'];
$n_swtendv='0';$n_swtfac='0';$n_swtapr='0';$d_fecapr='';
$c_uaprob=$_REQUEST['vendedor'];$c_motivo=$_REQUEST['observacion'];$n_idreg=$secuencialidreg;$n_id='87';
$d_fecrea=date("d/m/Y");$c_opcrea=$_REQUEST['codvendedor'];$d_fecreg='';$c_oper=$_REQUEST['codvendedor'];
$c_precios=strtoupper($_REQUEST['C_PRECIOS']);$c_tiempo=strtoupper($_REQUEST['tiempo']);$c_validez=strtoupper($_REQUEST['validez']);
//$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
$c_tipocoti=$_REQUEST['tipo'];


if($_REQUEST['checkbox']=='1'){
$c_desgral=nl2br(utf8_decode($_REQUEST['area2']));
}else{ $c_desgral=(utf8_decode($_GET['gral']));}
$xc_desgral=nl2br(strip_tags($_REQUEST['area2']));
$xc_obsped=nl2br(strip_tags($_REQUEST['area3']));

if($c_precios=='001'){
	$b_inlgv=0;
	
	}else{
			$b_inlgv=1;
}

/**fecha vigencia**/
 $fecha = date('Y-m-j');
 $xxfecha = date('d-m-Y');
$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$d_fecvig=vfecha($nuevafecha);

$useraprob=$_REQUEST['codvendedor'];
$c_cotipadre=$_REQUEST['c_cotipadre'];
$n_swfu=1;
/*fin fecha*/
GuardaPedidoCabFusiC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$n_swfu);

UpdateCotizacionCabC($c_numped,$fpag,$d_fecvig,$useraprob,$xxfecha);
UpdateCotizacionRenovaCabM($c_numped,$c_cotipadre);

////***FIN CABECERA***///
////***INICIO DETALLE***///

$j=1;$xtotal=0;


for($i=1;$i<=100;$i++){
	//$IdTar=$_POST['codigo'.$i];
$c_numped=$secuencialpedido;$c_codcia='01';$c_codtda='000';$n_item=$j;

$c_codprd=$_REQUEST['c_codprd'.$i];
$c_desprd=$_REQUEST['c_desprd'.$i];$c_codund='';
$c_descr2=strtoupper($_REQUEST['c_descr2'.$i]);
$c_obsdoc=strtoupper($_REQUEST['c_descr2'.$i]);
$codcont=$_REQUEST['codcont'.$i]; //codigo_equipo

/*$c_fecini=$_REQUEST['c_fecini'.$i];
$c_fecfin=$_REQUEST['c_fecfin'.$i];*/

$c_fecini=$_REQUEST['fini'.$i];
$c_fecfin=$_REQUEST['ffin'.$i];


$c_tipped=$_REQUEST['c_tipped'.$i]; //clase

$precio=$_REQUEST['n_preprd'.$i];
$n_preprd=$precio;
$n_dscto=$_REQUEST['n_dscto'.$i];
$n_canprd=$_REQUEST['n_canprd'.$i];

$c_registro=$_REQUEST['re'.$i];
//$c_codcla=$c_tipped;
$n_prelis='0';$n_precrd='0';$n_costo='0';
$n_apbpre='0';
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
$n_prevta=($precio)*1.18;

//Datos de aprobacion
$c_usuapb='';$c_fecapb='';

/*fin*/


/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio-$n_dscto)*$n_canprd;
$n_totimp=$total;
/*fin*/

$n_canfac="0";$n_canbaj="0";$c_codafe="001";
$c_codlp="0011";$c_tiprec="N";$n_intprd="0";


$n_idreg=$secuencialidreg;$n_id='';$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_REQUEST['codvendedor'];

$c_numpedfu=$_REQUEST['c_numped'.$i];

if($c_codprd != "")
		{
			$n_apbpre='1';
GuardaPedidoDetFusionC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,$c_descr2,$c_obsdoc,$codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$n_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$n_idreg,$d_fecreg,$c_oper,$n_apbpre,$c_numpedfu);


$j=$j+1;
$xtotal+=$n_totimp;



//////////cambiar el estado
$c_cotipadre=$secuencialpedido;

//////////cambiar el estado
$actualizaestado=cambiaestadoCotiM($c_numpedfu,$c_cotipadre);

		}
		
		
	}

	
/*$mensaje="COTIZACION GENERADA CORRECTAMENTE";
		print "<script>alert('$mensaje')</script>";*/
///** PARA LA IMPRESION DEL DOCUMENTO **//
	$cli=$_REQUEST['hc'];
	$coti=$secuencialpedido;
	TotalPedidoC($xtotal,$xtotal,$xtotal,$xtotal,$c_numped);
	//$ImpresionCotizaciones=Ver_CotizacionesC($cli,$coti);
//		include('../MVC_Vista/Cotizaciones/Detalle_Cotizacion.php');		
include('../MVC_Vista/Cotizaciones/print/imprimircoti.php');
	//include('../MVC_Vista/Cotizaciones/rutas.php');	

}



function GuardaPedidoCabFusiC($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$n_swfu){
$resultado=GuardaPedidoCabFusiM($c_numped,$c_codcia,$c_codtda,$c_numpd,$c_codcli,
$c_nomcli,$c_contac,$c_telef,$c_nextel,$c_email,$c_asunto,
$c_codven,$d_fecped,$d_fecvig,$c_tipped,$n_bruto,$n_dscto,
$n_neta,$n_neti,$n_facisc,$n_swint,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_codpga,$c_codpgf,$c_estado,$c_obsped,$d_fecent,$c_lugent,$n_swtendv,
$n_swtfac,$n_swtapr,$c_uaprob,$c_motivo,$n_idreg,$d_fecrea,$c_opcrea,$d_fecreg,
$c_oper,$c_precios,$c_tiempo,$c_validez,$c_desgral,$c_tipocoti,$b_inlgv,$c_codtit,$c_gencrono,$c_swfirma,$n_swfu);
	}



function GuardaPedidoDetFusionC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,$c_descr2,$c_obsdoc,$codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$n_idreg,$d_fecreg,$c_oper,$n_apbpre,$c_numpedfu){
	 $r=GuardaPedidoDetFusionM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_codund,$c_descr2,$c_obsdoc,$codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$c_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$n_idreg,$d_fecreg,$c_oper,$n_apbpre,$c_numpedfu);}


function GuardaCopiaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_descr2,$c_obsdoc,$c_codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$n_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$d_fecreg,$c_oper,$n_apbpre,$n_iddef){
	 $r=GuardaCopiaPedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,$c_codprd,$c_desprd,$c_descr2,$c_obsdoc,$c_codcont,$c_fecini,$c_fecfin,
$c_tipped,$n_preprd,$n_dscto,$n_canprd,$n_prelis,$n_prevta,$n_precrd,
$n_costo,$n_totimp,$n_canfac,$n_canbaj,$c_codafe,$c_codlp,$c_tiprec,
$n_intprd,$d_fecreg,$c_oper,$n_apbpre,$n_iddef);}


// cerrar coti 09/04/2014
if($_GET["acc"] == "cerrarcrono") // GUARDAR COTIZACION
{
	
	$c_obs=$_GET['obs'];$c_ucierra=$_GET['udni'];$c_fcierra=date("d/m/Y H:i:s");$c_cotipadre=$_GET['nro'];

$busqueda=Ver_cronogramaC($c_cotipadre);
foreach($busqueda as $item ){
	$coti=$item['c_nroped'];
	
	//aqui cambia de estado aquellas cotizaciones que se encuentren en estado cero 
	actualizarhijoscronogramaM($coti,$c_cotipadre);
	
	}


	CerrarCronogramaM($c_obs,$c_ucierra,$c_fcierra,$c_cotipadre);
	
	
	
	$mensaje='Cronograma Cerrado';
	print "<script>alert('$mensaje')</script>";
	include('../MVC_Vista/Cotizaciones/printcrono.php');
	
	
	}


if($_GET["acc"] == "cropen") // GUARDAR COTIZACION vercronpen
{
	$udni=$_GET['udni'];
	$reporte=listacronogramaM();
		include('../MVC_Vista/Cotizaciones/Listacronopend.php');
}
if($_GET["acc"] == "vercronpen") // GUARDAR COTIZACION vercronpen
{
	include('../MVC_Vista/Cotizaciones/printcrono.php');
}

///asignacion de equipos 10/07/2015
if($_GET["acc"] == "ver_coti_guia_Asig") // MOSTRAR: Formulario Nuevo Registro
{
	
	$coti=$_GET['coti'];$cli=$_GET['cli'];
	$valida=buscacotcabguiaM($coti);
	if($valida!=NULL){
	foreach($valida as $item){
		$serie=$item['c_serdoc'];
		$num=$item['c_nume'];
		$numguia=$serie.'-'.$num;
		}
	}
	if($valida==NULL){
	
		$Obtenercotizaciones=Ver_CotizacionesC($cli,$coti);
	$obteneritemscotiza=listacotizacionesDet_guiaM($coti);
include('../MVC_Vista/Inventario/AsignacionesEquipo.php');
	}else{
		$mensaje="Cotizacion ya registrado en la guia Nro:".$numguia;
		print "<script>alert('$mensaje')</script>";	
		
		}
	
}


//MODIFICADO
	
function BusquedaautodescripcionCotiPrecioC($descripcion){ return  BusquedaautodescripcionCotiPrecioM($descripcion);}

if($_GET["acc"] == "proautocoti2") 
{
 $texto =strtoupper($_REQUEST["q"]);
 $busquedapacienteauto = BusquedaautodescripcionCotiPrecioC($texto);
 
    $cambio=$_GET['cambio'];
	$moneda=$_GET['moneda'];
	 if($busquedapacienteauto!=NULL)
	{
		foreach ($busquedapacienteauto as $item)
		{	
		   if($moneda==''){
			  $pre1  =0; 		
		   }else if($moneda=='0' && $item["c_codmon"]=='1'){ //nuevos soles
				$pre1  =  $item["n_preprd"]*$cambio;	
				//$pre1=round($prex, 3);		
			}elseif($moneda=='1' && $item["c_codmon"]=='0'){
				 $pre1  =  $item["n_preprd"]/$cambio;
			}else{
				 $pre1  = $item["n_preprd"];
				}
					
			$cod  =  $item["IN_CODI"];
			$desc =  $item["IN_ARTI"];			
			$uni  =  $item["IN_UVTA"];			
			$tip=$item["tp_codi"];			
			$c_catprd=$item["c_catprd"];
			$c_conprd=$item["c_conprd"];
			$pre  =  $item["n_preprd"];			
			$c_codmon=$item["c_codmon"];
			if($c_codmon=='0'){$c_codmon1='S/';}else{$c_codmon1='$';}			
			$glosa=$c_conprd.' '.$c_catprd;					
			$decod=$cod.' '.$desc.' '.$c_conprd.' '.$c_catprd.' '.$c_codmon1.$pre;
			echo "$decod|$cod|$desc|$pre1|$uni|$tip|$glosa|$c_codmon\n";			
		}
	}
	
}	
	
	
	if($_GET["acc"] == "verarti") 
	{
		
		include('../MVC_Vista/Cotizaciones/ver_articulos.php');
		//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
	}
	
	if($_GET["acc"] == "framearti")
	{
		$moneda=$_GET['moneda'];
		$cambio=$_GET['cambio'];
		include('../MVC_Vista/Cotizaciones/frame_articulos.php');
	}
	



?>