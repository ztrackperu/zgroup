<?php 
ini_set('error_reporting',0);//para xamp

require("../MVC_Modelo/ContabilidadM.php");
require("../MVC_Modelo/CajaM.php");
require('../php/Funciones/Funciones.php');
require('../php/Funciones/clsletras.php');
require("../MVC_Modelo/OrdenM.php"); 
require("../MVC_Modelo/usuariosM.php"); 

if($_GET['acc']=='mostrarcb'){
	$Ringresos=listaingresosM($_REQUEST['txtbusca']);
	$Rgastos=listagastosM($_REQUEST['txtbusca']);	
	include('../MVC_Vista/Contabilidad/DetalleCB.php');
}
if($_GET['acc']=='updatevou'){
	
	//for($i=1;$i<=100;$i++){
		
		$c_numvou=!empty($_REQUEST['c_numvou1'])?$_REQUEST['c_numvou1']:"";
                $c_numeOP=!empty($_REQUEST['c_numeOP1'])?$_REQUEST['c_numeOP1']:"";				
				$c_NumOT=!empty($_REQUEST['c_NumOT1'])?$_REQUEST['c_NumOT1']:"";
				
				
                $c_anovou=!empty($_REQUEST['c_anovou1'])?$_REQUEST['c_anovou1']:"";
                $c_mesvou=!empty($_REQUEST['c_mesvou1'])?$_REQUEST['c_mesvou1']:"";
		UpdateComprobanteM($c_numvou,$c_numeOP,$c_anovou,$c_mesvou,$c_NumOT);
	//}
	
	$mensaje="Se actualizo correctamente";
		print "<script>alert('$mensaje')</script>";
	
	}

if($_GET["acc"] == "buscacoti") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/buscacoti.php');	
}
if($_GET["acc"] == "buscaOT") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/buscarot.php');	
}

if($_GET["acc"] == "cargar_OT") // MOSTRAR: Formulario Nuevo Registro
{
	$texto =strtoupper($_REQUEST["q"]);
	
 $busquedapacienteauto=BusquedaOTRACOMPROBANTEM($texto);
 if($busquedapacienteauto!=NULL)
{
		
	
	foreach ($busquedapacienteauto as $item)
	{


		$guianum=$item["c_numot"];
		$ncli=$item["c_numot"];
		$ccli=$item["c_numot"];
		$asu=$item["c_numot"];
		$decod=$guianum.' '.$ncli;
		echo "$decod|$guianum|$ncli|$ccli|$asu\n";
		
	
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}

}

if($_GET["acc"] == "v01") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/iniciointerface.php');	
}
if($_GET["acc"] == "actcompot") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/inicioActualizaCompOT.php');	
}
if($_GET["acc"] == "actcompotBUSCAR") // MOSTRAR: Formulario Nuevo Registro
{
	$nro_ot = $_REQUEST['nro_ot'];
	$reporteot = CargaOrdenTrabajoM($nro_ot);
	$reporteot = array_utf8_encode($reporteot);
	header('Content-Type: application/json');
	echo json_encode(['nro_ot'=>$nro_ot, 'data'=>$reporteot]);
}
if($_GET["acc"] == "actcompotUPDATE") // ACTUALIZA DATOS DE DETALLE ORDEN DE TRABAJO
{
	$datos = [
		'Id' => $_REQUEST['id'],
		'ndoc' => $_REQUEST['ndoc'],
		'fdoc' => $_REQUEST['fdoc']
	];
	$response = actualizaDatosDetOT($datos);
	$response = array_utf8_encode($response);
	header('Content-Type: application/json');
	echo json_encode(['success'=>$response]);
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
if($_GET["acc"] == "Ap04") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Contabilidad/RepFacxCli.php');	
	
}
if($_GET["acc"] == "ver4")
{
$tipoexporta=$_REQUEST["tipoexporta"];
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteFacturaxCliente.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteFacturaxCliente.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteFacturaxCliente.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteCompras.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
 $cli=$_REQUEST["codcli"];
 $sw=$_REQUEST["sw"];

 $reporte=reporte3facxcliM($cli,$sw);

//$reporte=verguiasremisionC($fecha1,$fecha2);
include('../MVC_Vista/Contabilidad/RepFacxCli.php');	 
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
			header("Content-Disposition: filename=Reporte.xls");
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

if($_GET["acc"] == "vertcPs")
{
	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Contabilidad/vertcPs.php');	
}

if($_GET["acc"] == "updatetc") // MOSTRAR: Formulario Modificar Registro
{
	$TipoDoc=$_REQUEST['tipodocu'];
	$documento=$TipoDoc.$_REQUEST['serie'].$_REQUEST['numero'];
	$usermod=$_REQUEST['udni'];
	$fechamod=date("Y-m-d H:i:s");
	$tc=$_REQUEST['tc'];
	$busca=BuscarFacM($documento);
	if($busca!=NULL)
	{
	updatetc1M($tc,$TipoDoc,$_REQUEST['serie'],$_REQUEST['numero']);
	updatetc2M($tc,$TipoDoc,$_REQUEST['serie'],$_REQUEST['numero']);
	updatetc3M($tc,$TipoDoc,$_REQUEST['serie'],$_REQUEST['numero']);
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
if($_GET["acc"] == "updatetcps") // MOSTRAR: Formulario Modificar Registro
{
	$TipoDoc=$_REQUEST['tipodocu'];
	$documento=$TipoDoc.$_REQUEST['serie'].$_REQUEST['numero'];
	$usermod=$_REQUEST['udni'];
	$fechamod=date("Y-m-d H:i:s");
	$tc=$_REQUEST['tc'];
	$busca=BuscarFacMPs($documento);
	if($busca!=NULL)
	{
	updatetc1MPs($tc,$TipoDoc,$_REQUEST['serie'],$_REQUEST['numero']);
	updatetc2MPs($tc,$TipoDoc,$_REQUEST['serie'],$_REQUEST['numero']);
	updatetc3MPs($tc,$TipoDoc,$_REQUEST['serie'],$_REQUEST['numero']);
	guardamodtcMPs($usermod,$fechamod,$documento,$tc);
	$mensaje="Documento Actualizado... Necesita Correr Proceso Registro Venta";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	include('../MVC_Vista/Contabilidad/vertcPs.php');	
	}else{
	$mensaje="Documento No Existe Revise";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Contabilidad/vertcPs.php');	
		
		}
}







//**** 06042015 registro de letras
if($_GET["acc"] == "verlet") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$des=utf8_decode(!empty($_REQUEST['des'])?$_REQUEST['des']:"");
	$resulet=listaletrasM($des);
	include('../MVC_Vista/Contabilidad/Adminletra.php');		
}
if($_GET["acc"] == "formlet") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Contabilidad/Regletra.php');		
}	

////////MODIFICADO
if($_GET["acc"] == "reglet") 
{
	/*$CorreLetra= GenCorreLetrasM();
	if($CorreLetra!=""){
		foreach ($CorreLetra as $itemCorre){
			$c_nume=$itemCorre['cod']+1;
		}
	}else{
		$c_nume='1';
	}*/
	
	$xc_nume=$_REQUEST['num'];
	$c_nume=(int)$xc_nume;
		
$c_codcia='01';$c_codtda='000';//$c_nume=$_REQUEST['num'];

//$resultado = str_replace("0", "", $c_nume);

$c_numlet='L'.str_pad($c_nume, 7, '0', STR_PAD_LEFT);

$c_numfac=$_REQUEST['ref'];
$c_numcont=$_REQUEST['contrato'];
$c_numcoti=$_REQUEST['coti'];
$c_lugarg= ltrim(strtoupper(utf8_decode($_REQUEST['lugar'])));
$d_fecemi=$_REQUEST['fgiro'];
if(trim($d_fecemi)==""){
	$d_fecemi='NULL';	
}
$d_fecven=$_REQUEST['fvcto'];
$c_codmon=$_REQUEST['moneda'];
$n_implet=round($_REQUEST['monto'],2);
$c_codcli=$_REQUEST['codcli'];
$c_nomcli=ltrim(strtoupper(utf8_decode($_REQUEST['cliente'])));
$c_docli=$_REQUEST['ruc'];
$c_dircli=ltrim(strtoupper(utf8_decode($_REQUEST['dire'])));
$c_telcli=$_REQUEST['c_telcli'];
$c_oper=$_REQUEST['udni'];
$d_fcrea=date("Y-m-d H:i:s");
if($c_codmon==0){$mo='SOLES';}else{$mo='DOLARES AMERICANOS';}
$zc_imppal=num2letras($n_implet,$mo);
$c_imppal=strtoupper($zc_imppal);
$c_nomava=ltrim(strtoupper(utf8_decode($_REQUEST['c_nomava'])));
$c_docava=$_REQUEST['c_docava'];
$c_telava=$_REQUEST['c_telava'];
$c_dirava=ltrim(strtoupper(utf8_decode($_REQUEST['c_dirava'])));

$busca=buscaLetraM($c_nume);
	if($busca==NULL)
	{
		GuardaLetraM($c_codcia,$c_codtda,$c_nume,$c_numlet,$c_numfac,$c_numcont,$c_numcoti,$c_lugarg,$d_fecemi,
		$d_fecven,$c_codmon,$n_implet,$c_codcli,$c_nomcli,$c_docli,$c_dircli,$c_oper,$d_fcrea,$c_imppal,$c_telcli,$c_nomava,$c_docava,$c_telava,$c_dirava);
		$mensaje="Guardado Correctamente";		
	}else{
		$udni=$_GET['udni'];
		$resultados=Obtener_UsuarioM($udni);
		$mensaje="Nro de Letra Ya Existe Revise";
		print "<script>alert('$mensaje')</script>";	
		//include('../MVC_Vista/Contabilidad/Regletra.php');		
	}
	//LISTAR LETRA
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$des=$_REQUEST['des'];
	$resulet=listaletrasM($des);
	include('../MVC_Vista/Contabilidad/Adminletra.php');
}
if($_GET["acc"] == "updateletra") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_GET['ot'];
	$cargaletra=buscaLetraM($c_nume);
	
	include('../MVC_Vista/Contabilidad/updateletra.php');	
}


if($_GET["acc"] == "guardarupdlet") 
{			
//$c_codcia='01';$c_codtda='000';
$c_nume=$_REQUEST['c_nume'];
//$resultado = str_replace("0", "", $c_nume);
//$c_numlet='L'.str_pad($c_nume, 7, '0', STR_PAD_LEFT);

$c_numfac=$_REQUEST['ref'];
$c_numcont=$_REQUEST['contrato'];
$c_numcoti=$_REQUEST['coti'];
$c_lugarg=ltrim(strtoupper(utf8_decode($_REQUEST['lugar'])));
$d_fecemi=$_REQUEST['fgiro'];
if(trim($d_fecemi)==""){
	$d_fecemi='NULL';	
}
$d_fecven=$_REQUEST['fvcto'];
$c_codmon=$_REQUEST['moneda'];
$n_implet=round($_REQUEST['monto'],2);
$c_codcli=$_REQUEST['codcli'];
$c_nomcli=ltrim(strtoupper(utf8_decode($_REQUEST['cliente'])));
$c_docli=$_REQUEST['ruc'];
$c_dircli=ltrim(strtoupper(utf8_decode($_REQUEST['dire'])));
$c_telcli=$_REQUEST['c_telcli'];
$c_opermod=$_REQUEST['c_opermod'];
$d_fmod=date("Y-m-d H:i:s");
if($c_codmon==0){$mo='NUEVOS SOLES';}else{$mo='DOLARES AMERICANOS';} 

$zc_imppal=num2letras($n_implet,$mo);$c_imppal=strtoupper($zc_imppal);//CANTIDAD EN TEXTO

$c_nomava=ltrim(strtoupper(utf8_decode($_REQUEST['c_nomava'])));
$c_docava=$_REQUEST['c_docava'];
$c_telava=$_REQUEST['c_telava'];
$c_dirava=ltrim(strtoupper(utf8_decode($_REQUEST['c_dirava'])));

GuardaUpdLetraM($c_nume,$c_numfac,$c_numcont,$c_numcoti,$c_lugarg,$d_fecemi,
$d_fecven,$c_codmon,$n_implet,$c_codcli,$c_nomcli,$c_docli,$c_dircli,$c_imppal,$c_opermod,$d_fmod,$c_telcli,$c_nomava,$c_docava,$c_telava,$c_dirava);
	$mensaje="Actualizado Correctamente";
	//LISTAR LETRA
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$des=$_REQUEST['des'];
	$resulet=listaletrasM($des);
	include('../MVC_Vista/Contabilidad/Adminletra.php');	
}

if($_GET["acc"] == "eliminarlet") // MOSTRAR: Formulario Nuevo Registro
{
	$c_nume=$_GET['c_nume'];
	$c_operelim=$_GET['udni'];
	$eliminarLet=eliminarletM($c_nume,$c_operelim);
	
	//LISTAR LETRA
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$des=$_REQUEST['des'];
	$resulet=listaletrasM($des);
	include('../MVC_Vista/Contabilidad/Adminletra.php');		
}

if($_GET["acc"] == "veraprobacionlet") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_GET['ot'];
	$cargaletra=buscaLetraM($c_nume);
	
	include('../MVC_Vista/Contabilidad/AprobacionLetra.php');	
}

if($_GET["acc"] == "apruebalet") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_REQUEST['c_nume'];
	$c_operapr=$_REQUEST['c_operapr'];
	$d_fapr=date("Y-m-d H:i:s");
	$cargaletra=apruebaletM($c_nume,$c_operapr,$d_fapr);
	
	//LISTAR LETRA
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$des=$_REQUEST['des'];
	$resulet=listaletrasM($des);
	include('../MVC_Vista/Contabilidad/Adminletra.php');	
}

if($_GET["acc"] == "verliberacionlet") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_GET['ot'];
	$cargaletra=buscaLetraM($c_nume);
	
	include('../MVC_Vista/Contabilidad/LiberacionLetra.php');	
}

if($_GET["acc"] == "liberalet") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_REQUEST['c_nume'];
	$c_operapr=$_REQUEST['c_operapr'];
	$d_fapr=date("Y-m-d H:i:s");
	$cargaletra=liberaletM($c_nume,$c_operapr,$d_fapr);
	
	//LISTAR LETRA
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$des=$_REQUEST['des'];
	$resulet=listaletrasM($des);
	include('../MVC_Vista/Contabilidad/Adminletra.php');	
}

if($_GET["acc"] == "generarletra") 
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_nume=$_GET['ot'];
	$cargaletra=buscaLetraM($c_nume);
	
	include('../MVC_Vista/Contabilidad/generarletra.php');	
}

?>