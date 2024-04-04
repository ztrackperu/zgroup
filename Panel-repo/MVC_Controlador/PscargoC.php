<?php 
ini_set('error_reporting',0);//para xamp
$fw=$_REQUEST['fw'];
require("../MVC_Modelo/PscargoM.php"); 
require('../php/Funciones/Funciones.php');
require("../MVC_Modelo/usuariosM.php"); 
if($_GET["acc"] == "v01") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/verforwarder.php');	
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
$reporte=ListarForwarderM();
include('../MVC_Vista/Pscargo/verforwarder.php');	 
}
if($_GET["acc"] == "v02") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/VerCartaEntrega.php');	
}
if($_GET["acc"] == "ver2") // MOSTRAR: Formulario Nuevo Registro
{
	$fwd=$_REQUEST["fwd"];
	$reporte=listaentregacartas($fwd);
	
include('../MVC_Vista/Pscargo/ImprimirCartaEntrega.php');	
}

if($_GET["acc"] == "nombauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = listanombrecartaentM($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$nombre =   utf8_encode($item["nombre"]);
		echo "$nombre\n";
	}
}
	
}
//28032015
if($_GET["acc"] == "vercli") // MOSTRAR: Formulario Modificar Registro
{
	include('../MVC_Vista/Pscargo/VerClientes.php');
}


if($_GET["acc"] == "entauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; Ent_Codi,Ent_Rsoc,Ent_Ruc,Ent_Dire
 $busquedapacienteauto = ListaCliAutoM($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$clinom =   utf8_encode($item["Ent_Rsoc"]);
		$cliruc=$item["Ent_Ruc"];
		$clicod=$item["Ent_Codi"];
		$clidir=$item["Ent_Dire"];
		$concatena=$clinom;
		echo "$concatena|$clinom|$cliruc|$clicod|$clidir|\n";
	}
}
	
}

if($_GET["acc"] == "verentidades") // MOSTRAR: Formulario Modificar Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);	
	$cliruc=$_REQUEST['cliruc'];
	$clicod=$_REQUEST['clicod'];
	$clidire=$_REQUEST['clidire'];
	$nomcli=$_REQUEST['nomcli'];	
	include('../MVC_Vista/Pscargo/UpdateEntidad.php');
}
if($_GET["acc"] == "updatecliente") // MOSTRAR: Formulario Modificar Registro
{
	$cliruc=$_REQUEST['cliruc'];
	$clicod=$_REQUEST['clicod'];
	$razon=strtoupper($_REQUEST['nomcli']);
	$xclidire=utf8_encode(strtoupper($_REQUEST['clidire']));
	$clidire=htmlspecialchars($xclidire, ENT_QUOTES,'UTF-8');
	//htmlspecialchars
	$nomcli=$_REQUEST['nomcli'];	
	$udni=$_REQUEST['udni'];//usuario que modifica
	$fechamod=date("Y-m-d H:i:s");
	UpdateEntidadesM($clicod,$razon,$clidire,$udni,$fechamod);
	$mensaje="Datos de Cliente Actualizado";
	print "<script>alert('$mensaje')</script>";	
	include('../MVC_Vista/Pscargo/VerClientes.php');	
}

if($_GET["acc"] == "verfac") // MOSTRAR: Formulario Modificar Registro
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Pscargo/anularfactura.php');
}

if($_GET["acc"] == "anulfac") // MOSTRAR: Formulario Modificar Registro
{
	
	$documento=$_REQUEST['serie'].'-'.$_REQUEST['numero'];
	$usermod=$_REQUEST['udni'];
	$fechamod=date("Y-m-d H:i:s");
	
	$busca=BuscarFactM($documento);
	if($busca!=NULL)
	{
	AnularFacM($documento,$usermod,$fechamod);
	$mensaje="Documento Anulado Correctamente";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Pscargo/anularfactura.php');
	}else{
	$mensaje="Documento No Existe Revise";
	print "<script>alert('$mensaje')</script>";	
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Pscargo/anularfactura.php');
		
		}
}

///18052015 new report

if($_GET["acc"] == "verpago") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/Reportes/ver_rep_pagosprov.php');	
}
if($_GET["acc"] == "vpagprov"){
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
		
		$prov=$_REQUEST['codprov'];
		$fini=$_REQUEST['textfield'];
		$ffin=$_REQUEST['textfield2'];
		$sw=$_REQUEST['chkprov'];
		
$reporte=fwd_Reporte_pago_prov($prov,$fini,$ffin,$sw);
include('../MVC_Vista/Pscargo/Reportes/ver_rep_pagosprov.php');	
	}
if($_GET["acc"] == "verfacs") // MOSTRAR: Formulario Nuevo Registro 
{
	$udni=$_GET['udni'];	
include('../MVC_Vista/Pscargo/ListaFacSicoz.php');	
}
if($_GET["acc"] == "verfacsis") 
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	
	 $fw=$_REQUEST['fw'];
	//$reporte=listafacturafwM($fw);
	
	if($fw==""){
		$mensaje="INGRESE FORWARDER...!";			
		print "<script>alert('$mensaje')</script>";	
		include('../MVC_Vista/Pscargo/ListaFacSicoz.php');	
		
	}else {
		
		 $reporte=listafacturafwM($fw);
		if($reporte!=""){		
		include('../MVC_Vista/Pscargo/Verfacturas.php');
		}else{
			$mensaje="FW ". $fw. " NO EXISTE...!";			
		    print "<script>alert('$mensaje')</script>";	
		    include('../MVC_Vista/Pscargo/ListaFacSicoz.php');
		}
    }	

}

if($_GET["acc"] == "verdetafac") 
{
	$fac=$_GET['cod'];
	$reporte=listadetallefacM($fac);	
		include('../MVC_Vista/Pscargo/detallefactura.php');
    
}


if($_GET["acc"] == "guardarCoti") 
{
	
$i = 1;
//$fw=$_REQUEST['fw'];
$fw=$fw;
	do{

$cod=$_REQUEST['cod'.$i];		
$c_asunto=$_REQUEST['c_asunto'.$i];
$c_desgral=$_REQUEST['c_asunto'.$i];
$n_neta=$_REQUEST['n_neta'.$i]; //ya esta descontado de n_dscto

$n_dscto=$_REQUEST['n_dscto'.$i];$n_bruto=$_REQUEST['n_neta'.$i]+$n_dscto;
$n_totigv=$_REQUEST['n_totigv'.$i];$n_tasigv=$_REQUEST['n_tasigv'.$i]*100;

if($n_totigv=='0'){$b_IncIgv='-1';}else{$b_IncIgv='0';}

$n_totped=$_REQUEST['n_totped'.$i];//$n_neta+$n_totigv

$d_fecped=$_REQUEST['fecha'.$i];

/*$secuencia=NropedidoM();
if($secuencia!=NULL)
{
	foreach ($secuencia as $item)
	{
		$secuencialpedido = $item["cod"]+1;
		}
}	*/

$secuencialpedido =$_REQUEST['c_numped'.$i];

$secuencia2=Nropedido2M();
if($secuencia2!=NULL)
{
	foreach ($secuencia2 as $item)
	{
		$secuencialidreg = $item["cod"]+1;
		}
}
	
$c_numped=$secuencialpedido;
$c_numpd=substr($secuencialpedido,4,8);	
$n_idreg=$secuencialidreg;

$d_fecrea=date('d/m/Y');
$d_fecreg=date('d/m/Y');
$c_opcrea=$_GET['udni'];$c_oper=$_GET['udni'];
$n_facisc='0';$c_estado='0';$c_codcia='01';$c_codtda='000';$n_swtfac='0';

		$ruc=$_REQUEST['ruc'.$i];
	
		$datoscliente=datosClienteM($ruc);
			if($datoscliente!= "" && $ruc!= ""){
				foreach($datoscliente as $item2)
					{ 
				$c_nomcli=strtoupper($item2['CC_RAZO']);$c_codcli=$item2['CC_RUC'];
				$c_contac=strtoupper($item2['CC_RESP']);$c_telef=$item2['CC_TELE'];$c_email=strtoupper($item2['CC_EMAI']);				
					}
			}else{	
				$c_nomcli=$_REQUEST['c_nomcli'.$i];$c_codcli="0";
				$c_contac="";$c_telef="";$c_email="";
			}
		
$n_tcamb=$_REQUEST['n_tcamb'.$i];
$moneda=$_REQUEST['moneda'.$i];
if($moneda=='USD'){ $c_codmon='1';}else{$c_codmon='0';}
$n_swtapr='1';
$d_fecapr=date('d/m/Y');
$c_uaprob=$_GET['udni'];

$c_codven='000';
$c_tipped='019';
$c_precios='001';
$c_tiempo='INMEDIATO';
$c_validez='15 DIAS';
$c_tipocoti='019';
$c_meses='0';
                $condicionPago=listarCondicionPagoM($c_codcli);
                               if($condicionPago!= ""){
                                               foreach($condicionPago as $item4){                     
                                                               $cc_pago=$item4['cc_pago'];
                                                               $c_codpga=$cc_pago;
                                                               $c_codpgf=$cc_pago;
                                               }
                               }else{
								   
								   $c_codpga="01";
                                   $c_codpgf="01";
								   
							   }


/**fecha vigencia**/
 $fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$d_fecvig=vfecha($nuevafecha);
/*fin fecha*/


$Cxc_swcot=$_REQUEST['Cxc_swcot'.$i];


if($ruc!=""){
if($Cxc_swcot<>'1'){	
if($_REQUEST['guia_remis'.$i]!='1'){
$result=GuardaPedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,
$c_nomcli,$c_asunto,$d_fecped,$d_fecvig,$n_bruto,$n_dscto,
$n_neta,$n_facisc,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_estado,
$n_swtfac,$n_idreg,$d_fecrea,$d_fecreg,$c_desgral,$c_opcrea,$c_oper,$c_codcli,$c_contac,$c_telef,
$c_email,$n_swtapr,$d_fecapr,$c_uaprob,$c_codven,$c_tipped,$c_precios,$c_tiempo,$c_validez,$c_tipocoti,
$c_meses,$c_codpga,$c_codpgf,$b_IncIgv,$fw);
}
$actualizafw=UpdateDocCotSISPACM($c_numped);	
	}else{			
		 $mensaje2="FACTURA ".$c_numped." ha sido procesada";			
		  print "<script>alert('$mensaje2')</script>";				
	}
////***FIN CABECERA***///
////***INICIO DETALLE***///


$fac=$_REQUEST['cod'.$i];
$reporte=listadetallefacM($fac);
foreach($reporte as $item){ 
	$c_numped=$c_numped;
	$secuencia3=NropedidoDetM();
	if($secuencia3!=NULL)
	{
		foreach ($secuencia3 as $itemx)
		{
			$secuenciareg3 = $itemx["cod"]+1;
			}
	}

	$n_idreg2=$secuenciareg3;
	$c_codcia='01';$c_codtda='000';$n_item=$item['Ccd_Item'];
	
	if($n_totigv=='0'){
	$c_codprd='XNDND0105';
	$c_desprd='VENTAS NO GRAVADAS';
	
	}else{
	$c_codprd='XNDND0103';
	$c_desprd='OTROS SERVICIOS';	
		
	}
	
$c_obsdoc=strtoupper($item['Ccd_Desc']);
$c_codund='UND';
$n_canprd=$item['Ccd_Cant'];
$n_preprd=$item['Ccd_Vuni'];

//$n_dscto=$item['dscto'];//cantidad de descuento 
$n_prelis=$item['Ccd_Tota'];
$n_prevta=$item['Ccd_Tota'];
$n_precrd=$item['Ccd_Tota'];

$n_totimp=$item['Ccd_Vuni'];

$c_codafe='001';
$d_fecreg=date('d/m/Y');
$c_oper=$_GET['udni'];

//$sum=$sum+$item["Ccd_Vuni"];
    // $k += 1;
    
$n_apbpre='1';
$c_usuapb=$_GET['udni'];
$c_fecapb=date('d/m/Y');
	
$c_descr2=$c_asunto;
$c_codlp='0011';
$c_tiprec='N';
$c_codcla='019';
$c_tipped2='019';


if($_REQUEST['guia_remis'.$i]!='1'){
GuardaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,
$c_codprd,$c_desprd,$n_canprd,$n_preprd,
$n_prelis,$n_prevta,$n_precrd,$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,
$c_oper,$n_apbpre,$c_usuapb,$c_fecapb,$n_idreg2,$c_codund,$c_descr2,$c_codlp,$c_tiprec,$c_codcla,$c_tipped2);
}
	

}
	
////***FIN DETALLE***///
		

$i +=1;
		$seguir2 = true;
	
	
	
	
	}else{			
				$seguir2 = false;
				
		}
	
	}while($seguir2);
	
	
			
			if($mensaje2==""){
			$mensaje="DATOS REGISTRADOS CORRECTAMENTE...!";			
			print "<script>alert('$mensaje')</script>";			
			}
			$reporte=listafacturafwM($fw);			
		    include('../MVC_Vista/Pscargo/Verfacturas.php');
			
}

	function GuardaPedidoCabC($c_numped,$c_codcia,$c_codtda,$c_numpd,
	$c_nomcli,$c_asunto,$d_fecped,$d_fecvig,$n_bruto,$n_dscto,
	$n_neta,$n_facisc,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_estado,
	$n_swtfac,$n_idreg,$d_fecrea,$d_fecreg,$c_desgral,$c_opcrea,$c_oper,$c_codcli,$c_contac,$c_telef,$c_email,$n_swtapr,$d_fecapr,$c_uaprob,$c_codven,$c_tipped,$c_precios,$c_tiempo,$c_validez,$c_tipocoti,
$c_meses,$c_codpga,$c_codpgf,$b_IncIgv,$fw){
	$resultado=GuardaPedidoCabM($c_numped,$c_codcia,$c_codtda,$c_numpd,
	$c_nomcli,$c_asunto,$d_fecped,$d_fecvig,$n_bruto,$n_dscto,
	$n_neta,$n_facisc,$n_tasigv,$n_totigv,$n_totped,$n_tcamb,$c_codmon,$c_estado,
	$n_swtfac,$n_idreg,$d_fecrea,$d_fecreg,$c_desgral,$c_opcrea,$c_oper,$c_codcli,$c_contac,$c_telef,$c_email,$n_swtapr,$d_fecapr,$c_uaprob,$c_codven,$c_tipped,$c_precios,$c_tiempo,$c_validez,$c_tipocoti,
$c_meses,$c_codpga,$c_codpgf,$b_IncIgv,$fw);
		}
		
		function GuardaPedidoDetC($c_numped,$c_codcia,$c_codtda,$n_item,
$c_codprd,$c_desprd,$n_canprd,$n_preprd,
$n_prelis,$n_prevta,$n_precrd,$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,
$c_oper,$n_apbpre,$c_usuapb,$c_fecapb,$n_idreg2,$c_codund,$c_descr2,$c_codlp,$c_tiprec,$c_codcla,$c_tipped2){
	$resultado=GuardaPedidoDetM($c_numped,$c_codcia,$c_codtda,$n_item,
$c_codprd,$c_desprd,$n_canprd,$n_preprd,
$n_prelis,$n_prevta,$n_precrd,$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,
$c_oper,$n_apbpre,$c_usuapb,$c_fecapb,$n_idreg2,$c_codund,$c_descr2,$c_codlp,$c_tiprec,$c_codcla,$c_tipped2);
		}

	if($_GET["acc"] == "vercoti") 
	{
		$fac=$_GET['fac'];
		$reporte=detallecotizacionM($fac);
		if($reporte!= ""){
			include('../MVC_Vista/Pscargo/detallecotizacion.php');	
		}else{
			$mensaje="FALTA PROCESAR LA FACTURA...!";
			print "<script>alert('$mensaje')</script>";
		
			$reporte=listafacturafwM($fw);			
		    include('../MVC_Vista/Pscargo/Verfacturas.php');
			
		}
		
	}
	
	if($_GET["acc"] == "eliminarcoti") 
	{
	   $fac=$_GET['fac'];
		//echo $fac;
		$validar=listarfacturaM($fac);
				
		if($validar==NULL){
		$eliminacab=eliminarcabeCotiM($fac);
		eliminardetaCotiM($fac);
		UpdateDocM($fac);	
		$mensaje="FACTURA ELIMINADO...!";
			print "<script>alert('$mensaje')</script>";
		
			$reporte=listafacturafwM($fw);			
		    include('../MVC_Vista/Pscargo/Verfacturas.php');

		}else if($validar!=NULL){
			$mensaje="NO SE PUEDE ELIMINAR PORQUE ESTA FACTURADO...!";
			print "<script>alert('$mensaje')</script>";
		
			$reporte=listafacturafwM($fw);			
		    include('../MVC_Vista/Pscargo/Verfacturas.php');
			
		}		
	}
	
	
	
	if($_GET["acc"] == "listaReportes") 
	{
		  include('../MVC_Vista/Pscargo/listaReportes.php');
	}
	
	if($_GET["acc"] == "ListarForwarderDet") 
	{
		 $ListarForwarderDet= ListarForwarderDetM();
		 echo json_encode($ListarForwarderDet);	
	}
	
	if($_GET["acc"] == "ListarForwarder") 
	{
		  include('../MVC_Vista/Pscargo/ListarForwarder.php');
	}
	
	if($_GET["acc"] == "generarexcelForwarder") 
	{
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteForwarder.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
		$ListarForwarderDet= ListarForwarderDet2M();
		include('../MVC_Vista/Pscargo/ListarForwarder2.php');		  
	}
	
if($_GET["acc"] == "verdctos") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Pscargo/iniciointerface.php');	
}	
if($_GET["acc"] == "vercomp") // MOSTRAR: Formulario Nuevo Registro
{
$tipoexporta=$_REQUEST['tipoexporta'];
	if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteGastos.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$resultado=ListarComprobantesM($_REQUEST['fecha'],$_REQUEST['c_codasi'],$_REQUEST['vou'],$_REQUEST['anno'],$_REQUEST['mes']);
include('../MVC_Vista/Pscargo/RegistroGastos.php');	
   		}
		

		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteProfit.html");
			header("Pragma: no-cache");
			header("Expires: 0");
		$resultado=ListarComprobantesM($_REQUEST['fecha'],$_REQUEST['c_codasi'],$_REQUEST['vou'],$_REQUEST['anno'],$_REQUEST['mes']);
include('../MVC_Vista/Pscargo/interface.php');		
   		}
//$resultado=ListarComprobantesM($_REQUEST['fecha'],$_REQUEST['c_codasi'],$_REQUEST['vou'],$_REQUEST['anno'],$_REQUEST['mes']);
//include('../MVC_Vista/Pscargo/interface.php');	
}
if($_GET['acc']=='updatevou'){
	
	for($i=1;$i<=900;$i++){
		
		$c_numvou=$_REQUEST['c_numvou'.$i];$c_numeOP=$_REQUEST['c_numeOP'.$i];$c_anovou=$_REQUEST['c_anovou'.$i];$c_mesvou=$_REQUEST['c_mesvou'.$i];
		UpdateComprobanteM($c_numvou,$c_numeOP,$c_anovou,$c_mesvou);
	}
	
	$mensaje="Se actualizo correctamente comprobantes de pscargo";
		print "<script>alert('$mensaje')</script>";
	include('../MVC_Vista/Pscargo/iniciointerface.php');	
	}

if($_GET["acc"]=="vermigracion"){
include('../MVC_Vista/Pscargo/fwtoaccess.php');	
	}
	
if($_GET["acc"] == "migracionfw") // frmprofit
{
//$listafw=ListarForwarderM();
$fec=date("d/m/Y");

$RetornaData=ListarForwarderM(); 
			//$RetornaData=SIGESA_CertificadoMedico_BuscarDiagnosticos_LCO($Filtro);
	 				for ($i = 0; $i < count($RetornaData); $i++) {
							
							//'IdDiagnostico'=>$RetornaData[$i]["IdDiagnostico"],
						$fw=$RetornaData[$i]["Fwd_Codi"];
						$fecoc=$RetornaData[$i]["Fcre"];
						$obtfw=ObtenercabocfwM($fw);
							if($obtfw==NULL){
									//insertamos el fw en cabe oc SI EL FW NO EXISTE
							
									InsertfwincabeocM($fw,$fecoc,$fec); 
							}
							//'Descripcion' => mb_strtoupper($RetornaData[$i]["Descripcion"])
            			
       				 }

	$mensaje="Procesado Correctamente Forwarder de pscargo";
	print "<script>alert('$mensaje')</script>";
	include('../MVC_Vista/Pscargo/iniciointerface.php');
}
if($_GET["acc"] == "frmprofit") // 
{
	include('../MVC_Vista/Pscargo/profit.php');	
}
if($_GET["acc"] == "verfrmprofit") // 
{
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteProfit.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="WORD"){
			header("Content-type: application/vnd.ms-works ; name='word'");
			header("Content-Disposition: filename=ReporteProfit.doc");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		
		if($tipoexporta=="PDF"){
			header("Content-type: application/pdf; name='pdf'");
			header("Content-Disposition: filename=ReporteProfit.pdf");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
		if($tipoexporta=="WEB"){
			header("Content-type: text/html; name='html'");
			header("Content-Disposition: filename=ReporteProfit.html");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
	$fw=$_REQUEST['fw'];
	$reportesql=ListarIngProfM($fw);
	$reporteacc=ListarGasProdM($fw);
		include('../MVC_Vista/Pscargo/detalleProfit.php');	
}
if($_GET["acc"] == "repgastotesoria") 
{
include('../MVC_Vista/Pscargo/Reportes/frmrepgastos.php');		
}

if($_GET["acc"] == "listarepgastotesoria") 
{
	
	 /*$fecha=$_REQUEST['txtfecha'];//22/01/2015
	$variable = explode ('/',$fecha); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
	$fec = $variable [1].'/'.$variable [0].'/'.$variable [2];
	
		 $fechafin=$_REQUEST['txtfechafin'];//22/01/2015
	$variablefin = explode ('/',$fechafin); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
	$fecfin = $variablefin [1].'/'.$variablefin [0].'/'.$variablefin [2];
	$sw=$_REQUEST['rango'];*/
	
	
	if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reptesoria.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   	}
		
$mes=$_REQUEST['cmbmes'];$anno=$_REQUEST['cmbanno'];
$reportetesoria=ListargastotesoriaM($mes,$anno);
include('../MVC_Vista/Pscargo/Reportes/frmrepgastos.php');		
}
//ventas
if($_GET["acc"] == "repingtesoria") 
{
include('../MVC_Vista/Pscargo/Reportes/frmrepingresos.php');		
}
if($_GET["acc"] == "listarepingtesoria") 
{
	  $fecha=$_REQUEST['txtfecha'];//22/01/2015
	$variable = explode ('/',$fecha); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
	$fec = $variable [1].'/'.$variable [0].'/'.$variable [2];
	
		 $fechafin=$_REQUEST['txtfechafin'];//22/01/2015
	$variablefin = explode ('/',$fechafin); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
	$fecfin = $variablefin [1].'/'.$variablefin [0].'/'.$variablefin [2];
	 $sw=$_REQUEST['rango'];
	if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reptesoria.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}

$reportetesoria=ListaringresostesoriaM($sw,$fec,$fecfin);
include('../MVC_Vista/Pscargo/Reportes/frmrepingresos.php');		
}


?>