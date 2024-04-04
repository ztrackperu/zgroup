<?php 
require("../MVC_Modelo/InventarioM.php"); 
require("../MVC_Modelo/CajaM.php"); 
require('../php/Funciones/Funciones.php');
if($_GET["acc"] == "verconcepto") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/ver_conceptos.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "frameconcepto") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/frame_concepto.php');
}
if($_GET["acc"] == "verchoferes") // MOSTRAR: Formulario Nuevo Registro regprov
{
    include('../MVC_Vista/Inventario/ver_choferes.php');
}
if($_GET["acc"] == "framechofer") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Inventario/frame_choferes.php');
}

if($_GET["acc"] == "newcode") // MOSTRAR: Formulario Nuevo Registro
{
	$equipo=$_GET['eq'];
	
	include('../MVC_Vista/Inventario/Newequipo.php');}

if($_GET["acc"] == "verinicio") // MOSTRAR: Formulario Nuevo Registro
{include('../MVC_Vista/Inventario/inicio.php');}

if($_GET["acc"] == "ver") // MOSTRAR: Formulario Nuevo Registro
{
	
	$tipo=$_REQUEST['tipo'];
	if($tipo=='INGRESO'){ $tiping='1';}else{$tiping='2';}
	include('../MVC_Vista/Inventario/index.php');}

if($_GET["acc"] == "tipoing") // MOSTRAR: Formulario Nuevo Registro
{
	$tipoio=$_REQUEST['hiddenField'];
	$tiping=$_REQUEST['tiping'];
	$equipo=$_REQUEST['EQUIPO'];
	include('../MVC_Vista/Inventario/codigoingreso.php');}
if($_GET["acc"] == "vertipo") // MOSTRAR: Formulario Nuevo Registro
{
	
	$equipo=$_REQUEST['hiddenField2'];
	include('../MVC_Vista/Inventario/codigoingreso.php');}

if($_GET["acc"] == "serieequipoauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busqueda = busquedaequipoautoM($texto);
 if($busqueda!=NULL)
{
	foreach ($busqueda as $item)
	{
		//c_idequipo,c_codprd,c_codsit
		$id_equipo =   $item["c_idequipo"];
		$c_nserie = $item["c_nserie"];
		$decod=$c_nserie;
		$des=$item['in_arti'];
		$tipo=$item['c_codsit'];
		echo "$decod|$c_nserie|$id_equipo|$des|$tipo\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
//$resul=EquipoInvequipoC($idequipo);
if($_GET["acc"] == "verdetalleequipo") // MOSTRAR: Formulario Modificar Registro
{
	$tipoio=$_REQUEST['tipoio'];
	$tipo=$_REQUEST['hiddenField5'];
	$nombreprod=$_REQUEST['textfield2'];
	$idequipo=$_REQUEST['codigoequipo'];
	$equipo=$_REQUEST['unidad'];
	$tiping=$_REQUEST['tiping'];
	if($tipo=='001'){ //muestra formulario DRY
	$resul=CodEquipoInvequipoC($idequipo);
		include('../MVC_Vista/Inventario/RegDryS.php');
		} 
	if($tipo=='002'){ //muestra formulario REEFER/ REEFER EVERFRESH
	$resul=CodEquipoInvequipoC($idequipo);
	include('../MVC_Vista/Inventario/RegReeferS.php');
		} 
	if($tipo=='003'){ //muestra formulario GENERADORES
	$resul=CodEquipoInvequipoC($idequipo);	
	include('../MVC_Vista/Inventario/RegGeneradorS.php');
		} 	
	if($tipo=='004' || $tipo=='005'){ //muestra formulario CARRETA/PLATAFORMAS
	$resul=CodEquipoInvequipoC($idequipo);	
	include('../MVC_Vista/Inventario/RegCarretaS.php');
		} 		
	if($tipo=='012'){ //muestra formulario TRANSFORMADORES
	$resul=CodEquipoInvequipoC($idequipo);
	include('../MVC_Vista/Inventario/RegTransformadorS.php');	
		} 
}

if($_GET["acc"] == "seriemodeloauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busqueda = listamodeloautoC($texto);
 if($busqueda!=NULL)
{
	foreach ($busqueda as $item)
	{
		//c_idequipo,c_codprd,c_codsit
		$id =   $item["c_numitm"];
		$name = $item["c_desitm"];
		$decod=$name;
		
		echo "$decod|$id|$name\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}


if($_GET["acc"] == "resv01") // MOSTRAR: Formulario Modificar Registro
{
	
	include('../MVC_Vista/Inventario/Reserva.php');	
}

if($_GET["acc"] == "guareserv") // MOSTRAR: Formulario Modificar Registro
{
	$c_codcli=$_REQUEST['codcli'];
	$c_nomcli=$_REQUEST['descripcion'];
	$c_idequipo=$_REQUEST['codigoequipo'];
	$c_fechora=date("d-m-Y H:i:s");
	$c_user=$_GET['udni'];
	$descripcion=$_REQUEST['material'];
	$equipo=$_REQUEST['unidad'];
	$tipo=$_REQUEST['tipo'];
	GuardareservaeqM($c_codcli,$c_nomcli,$c_idequipo,$c_fechora,$c_user,$descripcion,$tipo);
	updateinveequipoalertaM($c_idequipo);
		
	$reserva=bus_eq_nacionalM($equipo);
	if($tipo=='Venta'){
//	include('../MVC_Vista/Cotizaciones/envioautomatico.php');		
include('../MVC_Vista/Inventario/formenvio.php');		
	}	
}

if($_GET["acc"] == "lisResv") // MOSTRAR: Formulario Modificar Registro
{
	$reporte=ListaEquipoReservaM();
	include('../MVC_Vista/Inventario/ReporteEquiposReservado.php');		
}

if($_GET["acc"] == "eliminaresv") // MOSTRAR: Formulario Modificar Registro LiberarRes
{
	
	$id=$_GET['id'];
	$cod=$_GET['cod'];
	eliminarReservaM($id);
	ElimnaResevINVEquipoM($cod);
	$mensaje=" Eliminado......";
		print "<script>alert('$mensaje')</script>";
	
$reporte=ListaEquipoReservaM();
	include('../MVC_Vista/Inventario/ReporteEquiposReservado.php');		
	
}
if($_GET["acc"] == "LiberarRes") // MOSTRAR: Formulario Modificar Registro 
{
	
	$id=$_GET['id'];
	$cod=$_GET['cod'];
	//eliminarReservaM($id);
	ElimnaResevINVEquipoM($cod);
	$mensaje=" Liberar Ahora Proceda A despachar......";
		print "<script>alert('$mensaje')</script>";
	
$reporte=ListaEquipoReservaM();
	include('../MVC_Vista/Inventario/ReporteEquiposReservado.php');		
	
}


function listamodeloautoC($descrip){ return listamodeloautoM($descrip);}
function CodEquipoInvequipoC($cod){ return  CodEquipoInvequipoM($cod);}



function TamanoCarretaC(){ return TamanoCarretaM($cod);}
function EjesCarretaC(){ return  EjesCarretaM();}
function listamaterialC(){ return  listamaterialM(); }
function listamesC() { return  listamesM();}
function listaannoC(){ return  listaannoM();}
function listamodeloC(){ return listamodeloM();}
function listamarcaXC(){ return listamarcaXM();}
function listacolorC(){  return  listacolorM();}
function listamquinaC(){ return  listamquinaM();}
function EquipoInvequipoC($cod){ return  EquipoInvequipoM($cod);}
function EquipoestadoC(){ return  EquipoestadoM();}
function ListaProveedorIC(){ return  ListaProveedorIM();}
function ListaMarcaCajaC(){ return  ListaMarcaCajaM();}
function ListaMarcaMaqC(){ return ListaMarcaMaqM();}
function NroEirC(){ return  NroEirM();}
/**INICIO REGISTRO DE EIR*/
if($_GET["acc"] == "regeir") // MOSTRAR: Formulario Modificar Registro
{
$secuencia=NroEirC();
if($secuencia!=NULL){foreach ($secuencia as $item){$nroeir = $item["cod"]+1;}}	
$c_tipoio=$_REQUEST['c_tipoio']; 
$c_numeir=$nroeir;
$c_codcli=$_REQUEST['c_codcli'];
$c_nomcli=$_REQUEST['c_nomcli'];
$c_nomcli2=$_REQUEST['c_nomcli2'];
$c_nomtec=$_REQUEST['c_nomtec'];
$c_fecdoc=$_REQUEST['c_fecdoc'];
$c_placa1=$_REQUEST['c_placa1'];
$c_placa2=$_REQUEST['c_placa2'];
$c_chofer=$_REQUEST['c_chofer'];
$c_fechora=$_REQUEST['c_fechora'];
$c_condicion=$_REQUEST['co'];
$c_tipois=$_REQUEST['c_tipois'];
$c_tipo=$_REQUEST['c_tipo'];
$c_tipo2=$_REQUEST['c_tipo2'];
$c_tipo3=$_REQUEST['c_tipo3'];
$c_obs=$_REQUEST['c_obs'];
$c_combu=$_REQUEST['c_combu'];
$c_usuario=$_GET['udni'];
$c_precinto=$_REQUEST['c_precinto'];
$c_almacen=$_REQUEST['c_almacen'];
$c_fechorareg=date("d-m-Y H:i:s");
$tipoclase=$_REQUEST['tipoclase'];
$c_precintocli=$_REQUEST['c_precintocli'];
$psalida=$_REQUEST['psalida'];$pllegada=$_REQUEST['pllegada'];$ptosalida=$_REQUEST['ptosalida'];
$ptollegada=$_REQUEST['ptollegada'];$c_obseir=$_REQUEST['c_obseir'];$c_serie=$_REQUEST['c_serie'];

RegistraCabEIRM($c_tipoio,$c_numeir,$c_codcli,$c_nomcli,$c_nomcli2,$c_nomtec,$c_fecdoc,$c_placa1,$c_placa2,$c_chofer,
$c_fechora,$c_condicion,$c_tipois,$c_tipo,$c_tipo2,$c_tipo3,$c_obs,$c_combu,$c_usuario,$c_precinto,$c_almacen,$c_fechorareg,$c_precintocli,$psalida,$pllegada,$ptosalida,$ptollegada,$c_obseir,$c_serie,$tipoclase);

/* guardando detalle */

$c_numeir=$nroeir;$c_idequipo=$_REQUEST['c_idequipo'];$c_codprd=$_REQUEST['c_codprd'];$c_nserie=$_REQUEST['c_nserie'];$codmar=$_REQUEST['codmar'];$c_codmod=$_REQUEST['c_codmod'];$c_codcol=$_REQUEST['c_codcol'];$c_anno=$_REQUEST['c_anno'];$c_control=$_REQUEST['c_control'];$c_codcat=$_REQUEST['c_codcat'];$c_tiprop=$_REQUEST['c_tiprop'];$c_mcamaq=$_REQUEST['c_mcamaq'];$c_procedencia=$_REQUEST['c_procedencia'];$c_nroejes=$_REQUEST['c_nroejes'];$c_tamCarreta=$_REQUEST['c_tamCarreta'];$c_serieequipo=$_REQUEST['c_serieequipo'];$c_peso=$_REQUEST['c_peso'];$c_tara=$_REQUEST['c_tara'];
$c_seriemotor=$_REQUEST['c_seriemotor'];$c_canofab=$_REQUEST['c_canofab'];$c_cmesfab=$_REQUEST['c_cmesfab'];$c_cfabri=$_REQUEST['c_cfabri'];$c_cmodel=$_REQUEST['c_cmodel'];$c_ccontrola=$_REQUEST['c_ccontrola'];$c_tipgas=$_REQUEST['c_tipgas'];$c_nacional="";$c_refnaci="";
$c_material=$_REQUEST['material'];
$c_fabcaja=$_REQUEST['c_fabcaja'];
RegistraDetEir($c_numeir,$c_idequipo,$c_codprd,$c_nserie,$codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_material);	
	
	$c_fecnac='';
/*Actualiza en invequipo*/

UpdateVerDataInvequipoM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_fecnac,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod,$c_fabcaja);

/*Fin Actualiza en invequipo*/	
/*actualiza si el equipo regresa por flete y/o alquiler*/
	if($c_tipoio=='1'){
		updateestadoalmM($c_idequipo) ;
		}
	
/*IMPRESION DE EIR*/

$resultado=ImprimirEirM($c_numeir);

	include('../MVC_Vista/Inventario/ImprimirEir.php');	
}
/*FIN DE REGISTRO EIR*/

if($_GET["acc"] == "imp")
{
$resultado=ImprimirEirM($_GET['eir']);
$resultado2=fichaequipoM($_GET['equipo']);
	include('../MVC_Vista/Inventario/ImprimirEir.php');	
	
	//"../MVC_Vista/Inventario/print/ImprimirEirTicketV1.php">
}
	
if($_GET["acc"] == "impv2"){
	
$resultado2=fichaequipoM($_GET['equipo']);
$resultado=ImprimirEirM($_GET['eir']);
	include('../MVC_Vista/Inventario/print/ImprimirEirTicketV1.php');	
	
	//"../MVC_Vista/Inventario/print/ImprimirEirTicket.php">
}
	
if($_GET["acc"] == "admot") // MOSTRAR: Formulario Nuevo Registro
{
	include("../MVC_Vista/Ordenes_Trabajo_Servicio/RegistrarOTra.php");
	
//	include('../MVC_Vista/Inventario/Reporte.php');
//include("../MVC_Vista/Ordenes_Trabajo_Servicio/RegistrarOTra.php");
}
if($_GET["acc"] == "reporte") // MOSTRAR: Formulario Nuevo Registro
{include('../MVC_Vista/Inventario/ReporteEquipoTransito.php');}

if($_GET["acc"] == "verreporte1") // MOSTRAR: Formulario Nuevo Registro
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
	
	
	 $clase=$_POST['claseprod'];
 	 $situ='FLET';
	

$reporte=ListaEquipoTransitoM($situ);
	//$reporte2=Listar_CotizacionesAprobadasC($cli,$ff,$sw);
	include('../MVC_Vista/Inventario/ReporteEquipoTransito.php');
	
	}
if($_GET["acc"] == "verdetalleequi") // MOSTRAR: Formulario Nuevo Registro
{
	
	$idequipo=$_GET['cod'];
		$reporte= ListaDetalleEquipoTransitoM($idequipo);
		include('../MVC_Vista/Inventario/DetalleEquipoTransito.php');
}
if($_GET["acc"] == "listaeir") // MOSTRAR: Formulario Nuevo Registro
{
		$listaeir=listaeirM();
		include('../MVC_Vista/Inventario/ListaEirGeneradas.php');
}


/* fguia de transporte**/

if($_GET["acc"] == "imprimeguiaT") // MOSTRAR: Formulario Nuevo Registro
{
	/*valida si la guia remision ya tiene guia de transportista*/
	$cguia=$_POST['textfield'];
	$valida=ValidaguiaTdetM($cguia);
	//if($valida==NULL){
	 $guia=$_GET['codi'];
	 $cabecera=imprimeguiacabeM($guia);
	 $detalle=imprimeguiadetaM($guia);
	 include('../MVC_Vista/Inventario/RegGuiaTransporte.php');
	/*}else{
	 $mensaje="Guia de Remision Ya tiene Guia de Transporte";
	 print "<script>alert('$mensaje')</script>";		
		}*/
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "guardaguiat") // MOSTRAR: Formulario Nuevo Registro
{
	$c_serdoc=$_REQUEST['c_serdoc'];$c_nume=$_REQUEST['c_nume'];
	$c3=str_pad($_REQUEST['c_nume'], 7, '0', STR_PAD_LEFT);
	$c_numguia=$_REQUEST['c_serdoc'].$c3;
 	//valida que no se repita la guia de transporte
	$valida=validaguiaTraM($c_numguia);
	if($valida==NULL){
	
$c_tipodoc='G';$d_fecguia=$_REQUEST['d_fecgui'];$c_nomdes=$_REQUEST['c_nomdes'];$c_rucdes=$_REQUEST['c_rucdes'];
$c_rucrem=$_REQUEST['c_rucrem'];$c_desrem=$_REQUEST['c_desrem'];$c_parti=$_REQUEST['c_parti'];$c_llega=$_REQUEST['c_llega'];$c_ructra=$_REQUEST['hiddenField2'];$c_chofer=$_REQUEST['chofer'];$c_placa=$_REQUEST['placa'];$c_marca=$_REQUEST['marca'];$c_licencia=$_REQUEST['licencia'];$c_estado='1';$c_glosa=$_REQUEST['c_glosa'];$c_nomtra=$_REQUEST['transportista'];$c_confveh=$_REQUEST['c_confveh'];$c_certcir=$_REQUEST['c_certcir'];$c_deprem=$_REQUEST['cmbDep'];$c_provrem=$_REQUEST['cmbPro'];$c_distrem=$_REQUEST['cmbDist'];$c_depdes=$_REQUEST['xcmbDep'];$c_provdes=$_REQUEST['xcmbPro'];$c_distdes=$_REQUEST['xcmbDist'];
$c_empsub=$_REQUEST['c_empsub'];$c_rucempsub=$_REQUEST['c_rucempsub'];	
$c_numped=$_REQUEST['guiaremison'];
$xc_numgr=$_REQUEST['ggrr'];
$c_numgr='G'.$xc_numgr;
$d_fecreg=date("d-m-Y H:i:s");
$c_oper=$_GET['udni'];

//completar con ceros las guias


RegistraCabGuiaTraM($c_numguia,$c_tipodoc,$c_serdoc,$c_nume,$d_fecguia,$c_nomdes,$c_rucdes,
$c_rucrem,$c_desrem,$c_parti,$c_llega,$c_ructra,$c_chofer,$c_placa,$c_marca,$c_licencia,$c_estado,$c_glosa,$c_nomtra,$c_confveh,$c_certcir,$c_deprem,$c_provrem,$c_distrem,$c_depdes,$c_provdes,$c_distdes,
$c_empsub,$c_rucempsub,$c_numped,$c_numgr,$d_fecreg,$c_oper);	
//actualiza en cabecera de la guia remison el nro de guia de transporte.
updcabgrM($c_numgr,$c_numguia);


for($i=0;$i<=50;$i++){
$c_desprd=nl2br(utf8_decode(strip_tags($_REQUEST['des'.$i])));
if($c_desprd != "")
		{
			RegistraDetGuiaTraM($i,$c_numguia,$c_desprd);	
		}
	}//fin for	

	$cabecera=imprimeguiaTcabM($c_numguia);
	$detalle=imprimeguiaTdetM($c_numguia);
	include('../MVC_Vista/Inventario/ImprimirGuiaTransporte.php');
	}else{
		
	 $mensaje="Alerta Guia de Transportista Ya Existe Cuidado!!!! Presione la tecla retroceso";
		print "<script>alert('$mensaje')</script>";	
		
		}//fin fi valida
}
if($_GET["acc"] == "imprimeguiatransporte") // MOSTRAR: Formulario Nuevo Registro

{
	$c_numguia=$_POST['zvendedor'];
	$cabecera=imprimeguiaTcabM($c_numguia);
	$detalle=imprimeguiaTdetM($c_numguia);
		include('../MVC_Vista/Inventario/ImprimirGuiaTransportex.php');
}
if($_GET["acc"] == "ximprimeguiatransporte") // MOSTRAR: Formulario Nuevo Registro

{
	$c_numguia=$_POST['zvendedor'];
	$cabecera=imprimeguiaTcabM($c_numguia);
	$detalle=imprimeguiaTdetM($c_numguia);
		include('../MVC_Vista/Inventario/ImprimirGuiaTransportex.php');
}	
/*07012015***/

if($_GET["acc"] == "ingnewequipo") // MOSTRAR: Formulario Modificar Registro
{
	
include('../MVC_Vista/Inventario/Newequipo.php');
	
}
if($_GET["acc"] == "eliminaeir") // MOSTRAR: Formulario Nuevo Registro
{
$nro=$_GET['nroeir'];
	EliminarEIRM($nro);
	
	$mensaje=" Eliminado EIR......";
		print "<script>alert('$mensaje')</script>";

	//include('../MVC_Vista/Cotizaciones/Lista_Cotizacion.php');
}
if($_GET["acc"] == "ver0123") // MOSTRAR: Formulario Nuevo Registro
{
	
include('../MVC_Vista/Inventario/IngresoEIR.php');	
}

if($_GET["acc"] == "Admingr") // MOSTRAR: Formulario Nuevo Registro
{
	actualizaestadoalminvM();
	$des='';
	$sw='0';
	
	$resulgr=listaguiaremiM($des,$sw);
include('../MVC_Vista/Inventario/AdminGuia.php');	
}
if($_GET["acc"]=="verguiar"){
	//lista guia remison.	
		$udni=$_GET['udni'];
	//$resultado=Ver_usuarioC($udni);
	 $des=$_REQUEST['des'];
	//$resulos=listaordenservM();
	 $sw=$_REQUEST['sw'];
	$resulgr=listaguiaremiM($des,$sw);
	include('../MVC_Vista/Inventario/AdminGuia.php');
}

if($_GET["acc"] == "imprimeguia") // MOSTRAR: Formulario Nuevo Registro

{
	$guia=$_GET['guia'];
	$cabecera=ImprimeGuiaCabeM($guia);
	$detalle=ImprimeGuiaDetaM($guia);
	
//	include('../MVC_Vista/Cotizaciones/imprimiguiaremision.php');
	//include('../MVC_Vista/Cotizaciones/I_imprimirguia2.php');

	$i = 0;
	//if($detalle!=0){
	foreach($detalle as $itemD){
		$i+=1;
//echo ($i);
		//}
	}
		
	//include('../MVC_Vista/Inventario/Reporte/I_impreguia.php');
if($i==1){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia1.php');
}elseif($i==2){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia2.php');
}elseif($i==3){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia.php');
}elseif($i==4){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia3.php');
}elseif($i==5){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia4.php');
}elseif($i==6){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia5.php');
}elseif($i==7){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia5.php');
}elseif($i>=7){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia6.php');}

}


if($_GET["acc"] == "eliminarguiaremision") // MOSTRAR: Formulario Nuevo Registro
{
$guia=$_GET['guia'];
	
	$validaeri=obtenerEirguia($guia);
	//if($validaeri==NULL){
		eliminarguiaM($guia);
	$detalle=ImprimeGuiaDetaM($guia);
	$i = 1;
	foreach($detalle as $item){
		$c_codprd=$item["c_codprd"];
		$c_estaequipo='D';$c_estaequipo='D';
		
	actuinvxguiaremisionM($c_codprd,$c_estaequipo,$c_estaequipo); 
	$i++;
	}
	
	
	$mensaje=" Eliminado Guia Click en Aceptar......";
		print "<script>alert('$mensaje')</script>";	
		include('../MVC_Vista/Inventario/AdminGuia.php');
			
	//}else{
	//	$mensaje="Guia cuenta con eir salida realize su regularizacion de ingreso y vuelva a generar su nueva guia";
	
			
		
		//}
	//include('../MVC_Vista/Cotizaciones/ListaGuiaRemision.php');
}
if($_GET["acc"] == "regguia") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numguia="";
	$item="";
	$listaitem=lista_guia_genEirM($c_numguia,$item);
	foreach($listaitem as $itemG){
		$i++;
		}
		if($i<=10){
			
	include('../MVC_Vista/Inventario/guiaremision.php');
		}else{
			$mensaje="Existen Eir Pendientes por Regularize......";
		print "<script>alert('$mensaje')</script>";	
		$lista_guia_genEIR=lista_guia_genEirM($c_numguia,$item);
	include("../MVC_Vista/Inventario/ListaGuiaEir.php");
		}
	//include('../MVC_Vista/Cotizaciones/guiaremision.php');
}
/*if($_GET["acc"] == "verchoferes") // MOSTRAR: Formulario Nuevo Registro regprov
{
	include('../MVC_Vista/Inventario/ver_choferes.php');
	}*/
if($_GET["acc"] == "verccodigosGUIA") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Inventario/ver_codigosguia.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "framecodigosguia") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Inventario/frame_codigosguia.php');
}

if($_GET["acc"] == "guardaguiaremi") // MOSTRAR: Formulario Modificar Registro
{
	
$c_numped=$_REQUEST['c_numped'];
$c_numguia='G'.$_REQUEST["select3"].$_REQUEST["textfield2"];

$valida=buscacabguiaM($c_numguia);
if($valida==NULL){


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
$secuencia=NroidguiaM();
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
grabacabeguiaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$c_rucdes,$c_parti
,$c_llega,$c_docref,$d_fecref,$c_codtra,$c_ructra,$c_chofer,$c_placa,$c_licenci,$c_marca,$c_estado,$c_glosa,$n_idreg ,$d_fecreg
,$c_oper,$c_tipo,$n_origen,$c_tope,$c_codcia,$c_codtda,$c_nomtra,$c_numped);

updcabcotigrM($c_numped,$c_numguia);
//actualiza guia remision en cotizacion:

for($j=0;$j<=30;$j++){ //reemplazar por  do while

$c_cod=$_REQUEST['codigorepuesto'.$j];	
$c_codprd=$_REQUEST['unidad'.$j]; //codigo de equipo	
$codigoequipo=$_REQUEST['codigoequipo'.$j]; // id equipo
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

grabadetaguiaM($guiadet,$n_item,$c_codprd,$codigoequipo,$c_desprd,$c_codund,$n_canprd ,$c_estaequipo   
   ,$c_obsprd,$c_oper,$d_fecreg,$c_codcia,$c_codtda,$c_cod);

 //  ActualizastockC($n_canprd,$c_cod);
actuinvxguiaremisionM($c_codprd,$c_estaequipo,$c_estaequipo); 
 	//$j +=1;
		//$seguir = true;
		}
	}	
		


$cabecera=ImprimeGuiaCabeM($c_numguia);
$detalle=ImprimeGuiaDetaM($c_numguia);

	$i = 0;
	foreach($detalle as $itemD){
		$i+=1;
//echo ($i);
		}
//	include('../MVC_Vista/Cotizaciones/imprimiguiaremision.php');
if($i==1)     {include('../MVC_Vista/Inventario/Reporte/I_imprimirguia1.php');
}elseif($i==2){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia2.php');
}elseif($i==3){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia.php');
}elseif($i==4){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia3.php');
}elseif($i==5){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia4.php');
}elseif($i==6){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia5.php');
}elseif($i==7){include('../MVC_Vista/Inventario/Reporte/I_imprimirguia5.php');}

}else{
	$mensaje="Guia Remision Nro=>".$c_numguia.' ya se encuentra registrado';
		print "<script>alert('$mensaje')</script>";	
	
	}

}//fin graba
if($_GET["acc"] == "veranulguia") // MOSTRAR: Formulario Nuevo Registro
{
include('../MVC_Vista/Inventario/AnularGuia.php');
}
if($_GET["acc"] == "anularguia") // MOSTRAR: Formulario Nuevo Registro
{
	$secuencia=NroidguiaM();
if($secuencia!=NULL)
{
foreach ($secuencia as $item)
{
	$n_idreg = $item["cod"]+1;
}
}
	$c_tipdoc='G';
	$c_serdoc=$_REQUEST['serie'];
	$c_nume=$_REQUEST['c_numeguia'];
	$c_numguia=$c_tipdoc.$c_serdoc.$c_nume;
	$verifica=ImprimeGuiaCabeM($c_numguia);
	$c_glosa=$_REQUEST['c_osb'];
	if($verifica==NULL)
	{
	 	$d_fecgui=$_REQUEST['d_fecguia'];
		$c_coddes='00000000';
		$c_nomdes='****ANULADO****';
		$d_fecreg=date("d/m/Y");
		$c_oper=$_GET['udni'];
		anularguianoregistradaM($c_numguia,$c_tipdoc,$c_serdoc,$c_nume,$d_fecgui,$c_coddes,$c_nomdes,$d_fecreg,$c_oper,$c_glosa,$n_idreg);	
		$mensaje=" Guia Anulada Correctamente......";
		print "<script>alert('$mensaje')</script>";		
	}else{
		$mensaje=" Guia No puede Ser anulada por este modulo......";
		print "<script>alert('$mensaje')</script>";		
	}
}


/*GUIA CON COTIZACION*/

if($_GET["acc"] == "gc001") // MOSTRAR: Formulario Nuevo Registro
{
	
	$c_numguia="";
	$item="";
	$listaitem=lista_guia_genEirM($c_numguia,$item);
	foreach($listaitem as $itemG){
		$i++;
		}
		if($i<=10){
			
	include('../MVC_Vista/Inventario/guiaremisionconcoti.php');
		}else{
			$mensaje="Existen Eir Pendientes por Regularize......";
		print "<script>alert('$mensaje')</script>";	
		$lista_guia_genEIR=lista_guia_genEirM($c_numguia,$item);
	include("../MVC_Vista/Inventario/ListaGuiaEir.php");
		}
	
	//include('../MVC_Vista/Cotizaciones/guiaremision.php');
}
if($_GET["acc"]=="impguiaT"){

$c_numguia=$_GET["guia"];

	$cabecera=imprimeguiaTcabM($c_numguia);
	$detalle=imprimeguiaTdetM($c_numguia);
	include('../MVC_Vista/Inventario/ImprimirGuiaTransporte.php');
 }
 ///08/04/2014
 
if($_GET["acc"]=="repinvm"){
include('../MVC_Vista/Inventario/ReporteStockMensual.php');	
}
if($_GET["acc"] == "verrepstock") // MOSTRAR: Formulario Nuevo Registro
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
	
	

	

$reporte=ListaStockMensualM($_REQUEST['anno'],$_REQUEST['mes']);
	//$reporte2=Listar_CotizacionesAprobadasC($cli,$ff,$sw);
include('../MVC_Vista/Inventario/ReporteStockMensual.php');	
	
	}
if($_GET["acc"] == "listaguiaeir") {
	actualizaestadoalminvM();
	$c_numguia="";
	$item="";
	$lista_guia_genEIR=lista_guia_genEirM($c_numguia,$item);
	include("../MVC_Vista/Inventario/ListaGuiaEir.php");	
}
	
if($_GET["acc"] == "regeirsal") {	
	$c_numguia=$_GET['guia'];
	$item=$_GET['item'];
	$carga_guia_genEIR=lista_guia_genEirM($c_numguia,$item);
	foreach($carga_guia_genEIR as $itemL){
		$codtipo=$itemL['cod_tipo'];
		$idequipo=$itemL['c_codequipo'];
		$des=$itemL['c_desprd'];
	$resul=CodEquipoInvequipoM($idequipo);
	$resulv2=CodEquipoInvequipov2M($idequipo);
		}
	
	//opcion a obtener datos de clase.
	
	include("../MVC_Vista/Inventario/RegistroEIRequipo.php");	
}
if($_GET["acc"] == "regeisinguia") {
    //echo var_dump($_REQUEST);
    $sw = $_REQUEST['sw'];
    $oc = !empty($_GET['oc'])?$_GET['oc']:"";
    $guia = !empty($_GET['guia'])?$_GET['guia']:"";
    $c_codequipo = !empty($_GET['c_codequipo'])?$_GET['c_codequipo']:"";
    $nom = !empty($_GET['nom'])?$_GET['nom']:"";
    $coprod = !empty($_GET['coprod'])?$_GET['coprod']:"";
    $itemG  = !empty($_GET['item'])?$_GET['item']:"";
	//$c_numguia="";
	//$carga_guia_genEIR=lista_guia_genEirM($c_numguia);	
	include("../MVC_Vista/Inventario/RegistroEIRequipo.php");	
}	
if($_GET["acc"] == "listaguiaeirSAL") {
	$c_numguia="";
	$des=$_REQUEST['des'];
	$sw=$_GET['sw'];
	if($sw=='0'){
	$carga_sal_genEIR=Filtra_eirsal_genEirM($des);	
	}else{
	$carga_sal_genEIR=lista_eirsal_genEirM($c_numguia);
	}
	actualizaestadoalminvM();
	include("../MVC_Vista/Inventario/ListaGuiaEirIngreso.php");	
}
if($_GET["acc"] == "regeirent") {	
	$c_numeirsalida=$_GET['guia'];
	//$carga_guia_genEIR=lista_guia_genEirM($c_numguia);
	$carga_guia_genEIR=lista_eirsal_genEirM($c_numeirsalida);
		foreach($carga_guia_genEIR as $itemL){
		$codtipo=$itemL['cod_tipo'];
		$idequipo=$itemL['c_codequipo'];
		$des=$itemL['c_desprd'];
	$resul=CodEquipoInvequipoM($idequipo);
	$resulv2=CodEquipoInvequipov2M($idequipo);
		}
	include("../MVC_Vista/Inventario/RegistroEIRequipo.php");	
}	
/**INICIO REGISTRO DE EIR version 2 06/07/2015*/
if($_GET["acc"] == "regeirv2") // MOSTRAR: Formulario Modificar Registro
{
	
$c_tipoio=$_REQUEST['c_tipoio']; 
$secuencia=NroEirV2M($tipo);
if($secuencia!=NULL){foreach ($secuencia as $item){$nroeir = $item["cod"]+1;}}	
if($c_tipoio=='1'){
	$c_nroeiring=$nroeir;
	//$c_nroeirsal=$_REQUEST['eirsal'];
	}else{
	$c_nroeiring="0";
		
	}
if($c_tipoio=='2'){
	$c_nroeirsal=$nroeir;
	}else{
	$c_nroeirsal="0";	
	}	
$c_numguia=$_REQUEST['c_numguia'];	
$c_tipoio=$_REQUEST['c_tipoio']; 

/*if($_GET['nis']=='0')
{$c_numeir=0;}else{*/

$c_numeir=$nroeir;

//}

$c_codcli=$_REQUEST['c_codcli'];
$c_nomcli=$_REQUEST['c_nomcli'];
$c_nomcli2=$_REQUEST['c_nomcli2'];
$c_nomtec=$_REQUEST['c_nomtec'];
$c_fecdoc=$_REQUEST['c_fecdoc'];
$c_placa1=$_REQUEST['c_placa1'];
$c_placa2=$_REQUEST['c_placa2'];
$c_chofer=$_REQUEST['c_chofer'];
$c_fechora=$_REQUEST['c_fechora'];
$c_condicion=$_REQUEST['co'];
$c_tipois=$_REQUEST['c_tipois'];
$c_tipo=$_REQUEST['c_tipo'];
$c_tipo2=$_REQUEST['c_tipo2'];
$c_tipo3=$_REQUEST['c_tipo3'];
$c_obs=$_REQUEST['c_obs'];
$c_combu=$_REQUEST['c_combu'];
$c_usuario=$_GET['udni'];
$c_precinto=$_REQUEST['c_precinto'];
$c_almacen=$_REQUEST['c_almacen'];
$c_fechorareg=date("d-m-Y H:i:s");
$c_fecdoc=date("d-m-Y H:i:s");
$tipoclase=$_REQUEST['hiddenField5'];//tipoclase
$c_precintocli=$_REQUEST['c_precintocli'];
$psalida=$_REQUEST['psalida'];$pllegada=$_REQUEST['pllegada'];$ptosalida=$_REQUEST['ptosalida'];
$ptollegada=$_REQUEST['ptollegada'];$c_obseir=$_REQUEST['c_obseir'];$c_serie=$_REQUEST['c_serie'];
$transportista=$_REQUEST['transportista'];$c_licencia=$_REQUEST['c_licencia'];
$c_ructra=$_REQUEST['c_ructra'];

RegistraCabV2EIRM($c_tipoio,$c_numeir,$c_numguia,$c_nroeiring,$c_nroeirsal,$c_codcli,$c_nomcli,$c_nomcli2,$c_nomtec,$c_fecdoc,$c_placa1,$c_placa2,$c_chofer,
$c_fechora,$c_condicion,$c_tipois,$c_tipo,$c_tipo2,$c_tipo3,$c_obs,$c_combu,$c_usuario,$c_precinto,$c_almacen,$c_fechorareg,$c_precintocli,$psalida,$pllegada,$ptosalida,$ptollegada,$c_obseir,$c_serie,$tipoclase,$transportista,$c_ructra,$c_licencia);

/* guardando detalle */
$c_numeir=$nroeir;$c_idequipo=$_REQUEST['c_idequipo'];
$c_codprod=$_REQUEST['c_codprod'];
$c_sitalm=$_REQUEST['estaequi'];
$c_codprd=$_REQUEST['c_codprd'];$c_nserie=$_REQUEST['c_nserie'];$codmar=$_REQUEST['codmar'];$c_codmod=$_REQUEST['c_codmod'];$c_codcol=$_REQUEST['c_codcol'];$c_anno=$_REQUEST['c_anno'];$c_control=$_REQUEST['c_control'];$c_codcat=$_REQUEST['c_codcat'];$c_tiprop=$_REQUEST['c_tiprop'];$c_mcamaq=$_REQUEST['c_mcamaq'];$c_procedencia=$_REQUEST['c_procedencia'];$c_nroejes=$_REQUEST['c_nroejes'];$c_tamCarreta=$_REQUEST['c_tamCarreta'];$c_serieequipo=$_REQUEST['c_serieequipo'];$c_peso=$_REQUEST['c_peso'];$c_tara=$_REQUEST['c_tara'];
$c_seriemotor=$_REQUEST['c_seriemotor'];$c_canofab=$_REQUEST['c_canofab'];$c_cmesfab=$_REQUEST['c_cmesfab'];$c_cfabri=$_REQUEST['c_cfabri'];$c_cmodel=$_REQUEST['c_cmodel'];$c_ccontrola=$_REQUEST['c_ccontrola'];$c_tipgas=$_REQUEST['c_tipgas'];$c_nacional="";$c_refnaci="";
$c_material=$_REQUEST['material'];
$c_fabcaja=$_REQUEST['c_fabcaja'];

RegistraDetV2EirM($c_numeir,$c_idequipo,$c_sitalm,$c_codprod,$c_codprd,$c_nserie,$codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_material);	


$item=$_REQUEST['item'];
if($c_tipoio=='2'){
updatedetguiaM($c_numguia,$item,$c_nroeirsal);
}

	//$c_fecnac='';
/*Actualiza en invequipo*/

/*UpdateVerDataInvequipoM($codmar,$c_codmod,$c_codcol,$c_anno,$c_control,$c_codcat,$c_tiprop,$c_mcamaq
,$c_procedencia,$c_nroejes,$c_tamCarreta,$c_serieequipo,$c_peso,$c_tara,
$c_seriemotor,$c_canofab,$c_cmesfab,$c_cfabri,$c_cmodel,$c_ccontrola,$c_tipgas,$c_nacional,$c_refnaci,$c_fecnac,$c_compresormaq,$c_idequipo,$c_opermod,
$c_fecmod,$c_fabcaja);*/



/*Fin Actualiza en invequipo*/	

	if($c_tipoio=='1'){
		updateestadoalmM($c_idequipo) ;
		}
/*actualiza si el equipo regresa por flete y/o alquiler*/
$eirsal=$_REQUEST['eirsal'];
$ingdirecto=$_REQUEST['ingdirec'];
if($c_tipoio=='1' && $ingdirecto!='0'){
	updateEIRsalidaM($eirsal,$c_numeir);
}

/*actualiza si el equipo regresa por flete y/o alquiler*/


/*IMPRESION DE EIR*/
$resultado=ImprimirEirM($c_numeir);
	include('../MVC_Vista/Inventario/TipoImpresionEIR.php');	
	//include('../MVC_Vista/Inventario/ImprimirEir.php');	
}
if($_GET['acc'] == 'eliminaeirv2'){
		 $sw=$_GET['sw'];
		 $c_numeir=$_GET['nroeir'];
		 $idequipo=$_GET['equipo'];
		 $estado=$_GET['situ'];
	//ELIMINA TABLA CABEIR
	eliminarEIRv2M($c_numeir);
	//ELIMINA DATOS DE DETGUIA
	eliminarEIRinguiav2M($c_numeir,$idequipo);
	//EN CASO QUE ES INGRESO SE REVERSA LA SITUACION DE EQUIPO AL ESTADO ORIGINAL
if($sw=='ENTRADA'){
	reversaupdateequipov2M($idequipo,$estado);
}
	$mensaje=" EIR $sw Anulada Correctamente......";
	print "<script>alert('$mensaje')</script>";	
	
}

/// 10/07/2015
//asignacion de equipos if($_GET["acc"] == "regeirent") {	
if($_GET["acc"] == "frmasig"){	
include('../MVC_Vista/Inventario/AsignacionesEquipo.php');
}


///03/08/2015
//GENERACION DE EIR X OC
if($_GET["acc"] == "regingxoc"){
		
	$cod=$_REQUEST['des'];
	
	if($_GET['sw']=='0'){$flag='0';}else if($_GET['sw']=='1'){$flag='1';}
	
	
	
	$carga_list_xoc=ListaEquipoxocM($flag,$cod);
	include('../MVC_Vista/Inventario/ListaIngresoEirxNotaIn.php');
}
if($_GET["acc"]=="registroxoc"){
	
	 $cod=$_GET['c_codequipo'];
	 $flag=$_GET['flag'];
	 $carga_guia_genEIR=ListaEquipoxocM($flag,$cod); 
	 include("../MVC_Vista/Inventario/RegistroEIRequipo.php");
	
	}
if($_GET["acc"] == "frmfoto"){
	 include("../MVC_Vista/Digital/index.php");
}

/////////////cambios a agregar///////

if($_GET["acc"] == "deleteguiaremision") 
{
$guia=$_GET['guia'];
///ACTUALIZAR A DISPONIBLE LOS EQUIPOS
$detalle=ImprimeGuiaDetaM($guia);
	$i = 1;
	foreach($detalle as $item){
		$c_codprd=$item["c_codprd"];
		$c_estaequipo='D';$c_estaequipo='D';
		
	actuinvxguiaremisionM($c_codprd,$c_estaequipo,$c_estaequipo); 
	$i++;
	}
//INSERTAR A TEMPORAL LA GUIA	
	insertarCabguiaelimM($guia);
	insertarDetguiaelimM($guia);
	$udni=$_GET['udni'];
	$d_fecreg=date("d/m/Y");
	actualizarFechaUsuarioElim($guia,$udni,$d_fecreg);
//ELIMINAR LA GUIA 
	deletedetguiaM($guia);
	deletecabguiaM($guia);	
	
	$mensaje=" Eliminado Guia Click en Aceptar......";
		print "<script>alert('$mensaje')</script>";	
	//listar
	
	//actualizaestadoalminvM();
	$des='';
	$sw='0';	
	$resulgr=listaguiaremiM($des,$sw);
	include('../MVC_Vista/Inventario/AdminGuia.php');	
}

if($_GET["acc"] == "listagt") 
{
	$lista_guia_transporte=ListaguiaTraM();
	include('../MVC_Vista/Inventario/ListaguiaTransporte.php');
}

///////INICIO añadido el 08/02/2016 por mahali huaman
if($_GET["acc"] == "repequimul")
{
	include('../MVC_Vista/Inventario/RepEquiposMultiples.php');
}

if($_GET["acc"] == "buscarcodigos")
{
	$xcodigos=nl2br($_REQUEST['codigos']);
	//list($mes, $día, $año)=split(',', $codigos);
	$codigos=explode("<br />", $xcodigos);	
	//echo 	$codigos[0].$codigos[1];	
	//echo var_dump($codigos);
	/*foreach ($codigos as $indicex => $valorx)
	{		
	echo "Linea ".$indicex."  Con el valor: ".$valorx."<br />".$codigos[0];	
	}*/
	// echo var_dump( $codigos ); 
	 		
	$canti=count($codigos);//3	
	foreach ($codigos as $indicex => $valorx){					
		 $codi=trim($valorx); 		
		 $result=listaserieeirM($codi);	
		 if($result!=""){
			 $eval=1;	 
			 foreach ($result as $itemser)	{
			   $c_idequipo= $itemser['c_idequipo'];
			   $c_codprd=$itemser['c_codprd'];
			   $c_almacen=$itemser['c_almacen'];
			   $c_numeir= $itemser['c_numeir'];
			   $c_fechora=$itemser['c_fechora'];
			   $c_docpdf=$itemser['c_docpdf'];
			   $c_nserie=$itemser['c_nserie'];			  		  	
			$arreglos[]=array($c_idequipo,$c_codprd,$c_almacen,$c_numeir,$c_fechora,$c_docpdf,$c_nserie);				
		  //echo var_dump( $arreglos ).'<br />';		
			}
		 } 		 
	}	
	
	if( $eval==''){ //no encuentra ningun equipo
		$mensaje="Los equipos no estan registrados";
	    print "<script>alert('$mensaje')</script>";	 
	    include('../MVC_Vista/Inventario/RepEquiposMultiples.php');			 
	}else{
		include('../MVC_Vista/Inventario/ListaEquiposMultiples.php');	 
	}
	
}

if($_GET["acc"] == "ExportarEirExcel")
{	
	header("Content-type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: filename=ReporteEirEquipos.xls");
	header("Pragma: no-cache");
	header("Expires: 0");		
	echo $_POST['datos_a_enviar'];
}

if($_GET["acc"] == "repmovequi")
{
	include('../MVC_Vista/Inventario/RepMovimientosEquipos.php');
}

if($_GET["acc"] == "vermovimientos")
{
	$fechainicial=gfecha($_REQUEST['fechainicial']);
	$fechafinal=gfecha($_REQUEST['fechafinal']);
	$resultado=listaMovimientosEquiposM($fechainicial,$fechafinal);	
	include('../MVC_Vista/Inventario/ListaMovimientosEquipos.php');
}

if($_GET["acc"] == "impfotos"){		
	$resultadoimpfotos=ImprimirEirM($_GET['c_numeir']);	
	include('../MVC_Vista/Inventario/printfotoseir/ImprimirEirfotos.php');
	
}

///////FIN añadido el 08/02/2016 por mahali huaman

if($_GET["acc"] == "repsituequi")
{
	$c_idequipo=$_REQUEST['c_idequipo'];
	$listaEquipos=listaSituEquiposM($c_idequipo);	
	include('../MVC_Vista/Inventario/Repsituequipo.php');
}

if($_GET["acc"] == "detallesituequipo")
{
	$c_idequipo=$_REQUEST['c_idequipo'];
	$listaEquipos=listaSituEquiposM($c_idequipo);	
	include('../MVC_Vista/Inventario/detallesituequipo.php');
}


?>