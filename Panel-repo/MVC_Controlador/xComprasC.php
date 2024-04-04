<?php 
require("../MVC_Modelo/CajaM.php"); 
require("../MVC_Modelo/MaestrosM.php"); 
require("../MVC_Modelo/ComprasM.php"); 
require("../MVC_Modelo/usuariosM.php"); 
require('../php/Funciones/Funciones.php');




if($_GET["acc"] == "formos") // MOSTRAR: Formulario Nuevo Registro
{
	///10>
	$descripcion="";$sw="";
	$resulos=BusquedaOSM($descripcion,$sw);
	foreach($resulos as $item){
	if($item['n_swaprb']==0 && $item['c_estado']==0){
		$cont++;
		}
		}
	
	if($cont>=10)
	{
		$mensaje="HAY ORDENES PENDIENTES POR APROBAR...!";
		print "<script>alert('$mensaje')</script>";	
		
	}else{
		$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Compras/Regodc.php');	
	}
	
	

}

if($_GET["acc"] == "veroc") // MOSTRAR: Formulario Nuevo Registro despues de buscar
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['des'];
	//$resulos=listaordenservM();
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Compras/AdminOC.php');
}





if($_GET["acc"] == "duplicaoc") // MOSTRAR: Formulario DUPLICANDO LOS DATOS DE LA OC SELECCIONADO
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_numeoc=$_GET['os'];
	$resultado=listaactualizarosM($c_numeoc);
	include('../MVC_Vista/Compras/DuplicaOC.php');
}



if($_GET["acc"] == "co01") // MOSTRAR: Formulario Modificar Registro
{
	/*$correlativo=GenCorreOcC();
	if($correlativo!=NULL){
	foreach($correlativo as $item){
			$xnrooc=$item['cod']+1;
		}
	}else{
		include('../MVC_Vista/Compras/error.php');
		}*/
//	include('../MVC_Vista/EnConstruccionV.php');
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['des'];
	//$resulos=listaordenservM();
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaOSM($descripcion,$sw);
	$resultado=Obtener_UsuarioM($udni);
//include('../MVC_Vista/Compras/regodc.php');
include('../MVC_Vista/Compras/AdminOC.php');
}

if($_GET["acc"] == "rep01") // MOSTRAR: Formulario Modificar Registro 
{

	include('../MVC_Vista/Compras/reportes.php');
}
if($_GET["acc"] == "reporte01") // MOSTRAR: Formulario Modificar Registro reporte01
{
	include('../MVC_Vista/Compras/ReporteConsultaxProducto.php');
}
if($_GET["acc"] == "reporte02") // MOSTRAR: Formulario Modificar Registro reporte01
{
	include('../MVC_Vista/Compras/ReporteOC-NI.php');
}

if($_GET["acc"] == "verreporte1") // MOSTRAR: Formulario Modificar Registro reporte01
{
	
	$descripcion=utf8_encode($_REQUEST['asunto']);
	
	$reporte=consultaprecioocM($descripcion);
	include('../MVC_Vista/Compras/ReporteConsultaxProducto.php');
}
if($_GET["acc"] == "verreporte2") // MOSTRAR: Formulario Modificar Registro reporte01
{
	
//	$descripcion=$_REQUEST['cod'];
	
	$reporte=consultaOCsinNIM();
	include('../MVC_Vista/Compras/ReporteOC-NI.php');
}
function ListaMonedaC(){return ListaMonedaM();}
function ListaPlazoocC(){return ListaPlazoocM();}
function consultaOCsinNIC(){return consultaOCsinNIM();}
function ListaProveedoresC(){return ListaProveedorIM();}

function ListaConceptoC(){ return  ListaConceptoM();}
function ListaTipoC(){return ListaTipoM();}
function ListaTipoOC(){return ListaTipoOCM();}
function ListatipocambioC(){return ListatipocambioM();}

function BusquedaautoproveC($descripcion){ return BusquedaautoproveM($descripcion);}
function BusquedaautodescripcionOCC($descripcion){ return  BusquedaautodescripcionOCM($descripcion);}

if($_GET["acc"] == "proautocoti") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; //busqueda cotizacion en lista de precios lpreciosd.
 $busquedapacienteauto = BusquedaautodescripcionOCC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		//tp_codi,in_codi,IN_ARTI,IN_UVTA
		$cod  =  $item["in_codi"];
		$desc =  utf8_decode($item["IN_ARTI"]);
		$pre  =  0;
		$uni  =  $item["IN_UVTA"]; //medida
		//$tip=$item["in_codi"];
		$tipo=$item["C_TIPITM"];
		//$dir =$item["CC_DIR1"];
		$decod=$desc;
		echo "$decod|$cod|$desc|$pre|$uni|$tipo\n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}


if($_GET["acc"] == "lugarauto2") // MOSTRAR EL LUGAR DE ATENCION
{
 $texto =strtoupper($_REQUEST["q"]);
 $busquedapacienteauto = BusquedaautolugaratencionC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["C_CODTAB"];
		$num = $item["C_NUMITM"];
		$razon = utf8_encode($item["C_DESITM"]);
		$decod=''.$razon;	
		

		echo "$decod|$cod|$num|$razon\n";
				//0		1	2	 3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

function BusquedaautolugaratencionC($descripcion){ return BusquedaautolugaratencionM($descripcion);}






if($_GET["acc"] == "lugarauto") // MOSTRAR EL LUGAR
{
 $texto =strtoupper($_REQUEST["q"]);
 $busquedapacienteauto = BusquedaautolugarateC($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod =   $item["C_CODTAB"];
		$num = $item["C_NUMITM"];
		$razon = utf8_encode($item["C_DESITM"]);
		$decod=''.$razon;	
		

		echo "$decod|$cod|$num|$razon\n";
				//0		1	2	 3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

function BusquedaautolugarateC($descripcion){ return BusquedaautolugarateM($descripcion);}

if($_GET["acc"] == "RegistraOC") // MOSTRAR: Formulario Modificar Registro reporte01
{

$c_codmon=$_POST['c_codmon'];




}
function BusquedaproveC($descripcion){return  BusquedaproveM($descripcion);}
if($_GET["acc"] == "proveauto") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busquedapacienteauto = BusquedaproveC($texto);
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
		$con5=$item["pr_decl"];

		echo "$decod|$cod|$razon|$con1|$con2|$con3|$con5\n";
 //0	  1		2	3      array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
if($_GET["acc"] == "grabaroc") // MOSTRAR: Formulario Modificar Registro
{	
	$c_seroc='001';
	//calculamos el correlativo oc
	$correlativo=GenCorreOcC();
	if($correlativo!=NULL){
	foreach($correlativo as $item){
			$zxnrooc=$item['cod']+1;
			$xnrooc=str_pad($zxnrooc, 7, '0', STR_PAD_LEFT);
		}
	}else{
		include('../MVC_Vista/Compras/error.php');
		}
		
	$idgenerado =$c_seroc.$xnrooc;
	$c_numeoc =$idgenerado;
	$c_numoc=$xnrooc;
	$c_ocmain=$c_seroc.$xnrooc;
	
	$c_codcon=$_REQUEST['idconcepto'];
	

$c_codprv=$_REQUEST['hc'];
$c_nomprv=$_REQUEST['c_nomprov'];
$d_fecoc=$_REQUEST['fecha'];
$n_bruafe=$_REQUEST['st'];	
$n_desafe=$_REQUEST['dsctof'];
$n_netafe=$_REQUEST['sub'];

$n_facisc=0;
$n_totisc=0;

$n_porigv=$_REQUEST['porigv'];	
$n_igvafe=$_REQUEST['igv'];
$n_totoc=$_REQUEST['bi'];	
$n_tcoc=$_REQUEST['nomtipo'];	
	
$c_codmon=$_REQUEST['idmoneda'];
$c_codpag=$_REQUEST['c_codpag'];

$c_codcc='000';



$c_codlug=$_REQUEST['lat'];
$c_deslug=$_REQUEST['idatencion'];

$c_estado='0';	//0=Generado, 1=Atencion Parcial, 2=Atencion Total, 4=Anulado
$c_obsoc=$_REQUEST['c_obsoc'];

$d_fecent=$_REQUEST['c_fecentrega'];
$c_lugent= strtoupper($_REQUEST['c_nomlug']);
$b_swtenv='0';

$c_codtran=$_REQUEST['hc1'];
$c_nomtran=$_REQUEST['c_nomtran'];

$n_swtofi=1;


$d_fecreg=date("d/m/Y H:i:s");
$c_oper= $_REQUEST['c_oper']; 
$d_date=date("d/m/Y H:i:s");
$c_tipooc=$_REQUEST['idtipooc']; 
$c_claoc='O';
$c_codcia='01';
$c_codtda='000';

if($_REQUEST['xc_rh']==NULL){
$b_importac=0; 
}else{
$b_importac= $_REQUEST['xc_rh']; 
	}
$b_cierreOP=0;

$c_refcoti=$_REQUEST['c_refcoti']; 




GuardaComprasCabC($c_numeoc,$c_seroc,$c_numoc,$c_ocmain,$c_codcon,$c_codprv,$c_nomprv,$d_fecoc,$n_bruafe,$n_desafe,$n_netafe,$n_facisc,$n_totisc,$n_porigv,$n_igvafe,$n_totoc,$n_tcoc,$c_codmon,$c_codpag,
$c_codcc,$c_codlug,$c_deslug,$c_estado,$c_obsoc,$d_fecent,$c_lugent,$b_swtenv,$c_codtran,$c_nomtran,$n_swtofi,
$d_fecreg,$c_oper,$d_date,$c_tipooc,$c_claoc,$c_codcia,$c_codtda,$b_importac,$b_cierreOP,$c_refcoti);	
////***FIN CABECERA***///
////***INICIO DETALLE***///
$i = 1;
$ztotal=0;
	do{
$c_numeoc=$idgenerado;	
$n_item=$i;
$c_codprd=$_REQUEST['codigo'.$i];
$c_tipomv='C';
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);
$c_codund=$_REQUEST['um'.$i];
$n_canprd=$_REQUEST['cantidad'.$i];
$n_canund=$_REQUEST['cantidad'.$i];
$n_factor=1;
$n_preprd=$_REQUEST['precio'.$i];
$n_dscto=$_REQUEST['dscto'.$i];//cantidad de descuento en %
$totaldescuento=($n_dscto*$n_preprd)/100; //cantidad de descuento en soles
$n_totimp=($n_preprd-$totaldescuento)*$n_canprd; //total por producto sin IGV
//$n_canalm=0;
//$n_canfac=0;
$c_codafe='001'; //Prueba 
$c_obsdoc=strtoupper($_REQUEST['glosa'.$i]);
$d_fecreg=$_REQUEST['fecha'];
$c_oper=$_REQUEST['c_oper'];
$c_codcia='01';
$c_codtda='000';
$c_nroserie=strtoupper($_REQUEST['serie'.$i]);		
	////***FIN DETALLE***///
if($c_codprd != "")
		{
GuardaComprasDetC($c_numeoc,$n_item,$c_codprd,$c_tipomv,$c_desprd,
$c_codund,$n_canprd,$n_canund,$n_factor,$n_preprd,$n_dscto,
$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,$c_oper,
$c_codcia,$c_codtda,$c_nroserie);
$i +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);
///** PARA LA IMPRESION DEL DOCUMENTO **//
	$total=$n_totimp;
	$ztotal+=$total;
	$cli=$_REQUEST['hc'];
	$coti=$idgenerado;
	TotalPedidoC($ztotal,$ztotal,$ztotal,$ztotal,$c_numeoc);
	//ACTUALIZA REGISTRO EN TAB_DOCU CORRELATIVO
	actucorrdocuocM($xnrooc);	
//include('../MVC_Vista/Compras/print/imprimircoti.php');
    $mensaje="ORDEN DE COMPRA REGISTRADA CORRECTAMENTE...!";
	print "<script>alert('$mensaje')</script>";	
	$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Compras/AdminOC.php');
}

function GuardaComprasCabC($c_numeoc,$c_seroc,$c_numoc,$c_ocmain,$c_codcon,$c_codprv,$c_nomprv,$d_fecoc,$n_bruafe,$n_desafe,$n_netafe,$n_facisc,$n_totisc,$n_porigv,$n_igvafe,$n_totoc,$n_tcoc,$c_codmon,$c_codpag,
$c_codcc,$c_codlug,$c_deslug,$c_estado,$c_obsoc,$d_fecent,$c_lugent,$b_swtenv,$c_codtran,$c_nomtran,$n_swtofi,
$d_fecreg,$c_oper,$d_date,$c_tipooc,$c_claoc,$c_codcia,$c_codtda,$b_importac,$b_cierreOP,$c_refcoti){

$resultado=GuardaComprasCabM($c_numeoc,$c_seroc,$c_numoc,$c_ocmain,$c_codcon,$c_codprv,$c_nomprv,$d_fecoc,$n_bruafe,$n_desafe,$n_netafe,$n_facisc,$n_totisc,$n_porigv,$n_igvafe,$n_totoc,$n_tcoc,$c_codmon,$c_codpag,
$c_codcc,$c_codlug,$c_deslug,$c_estado,$c_obsoc,$d_fecent,$c_lugent,$b_swtenv,$c_codtran,$c_nomtran,$n_swtofi,
$d_fecreg,$c_oper,$d_date,$c_tipooc,$c_claoc,$c_codcia,$c_codtda,$b_importac,$b_cierreOP,$c_refcoti); 	
}

function GuardaComprasDetC($c_numeoc,$n_item,$c_codprd,$c_tipomv,$c_desprd,
$c_codund,$n_canprd,$n_canund,$n_factor,$n_preprd,$n_dscto,
$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,$c_oper,
$c_codcia,$c_codtda,$c_nroserie){
$resultado=GuardaComprasDetM($c_numeoc,$n_item,$c_codprd,$c_tipomv,$c_desprd,
$c_codund,$n_canprd,$n_canund,$n_factor,$n_preprd,$n_dscto,
$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,$c_oper,
$c_codcia,$c_codtda,$c_nroserie);
} 



function GenCorreOcC(){ return  GenCorreOcM();}

function TotalPedidoC($n_bruafe,$n_totoc,$n_totoc,$n_totoc,$c_numeoc){
	$resu=TotalPedidoM($n_bruafe,$n_totoc,$n_totoc,$n_totoc,$c_numeoc);
}


if($_GET["acc"] == "updateoc") // MOSTRAR: Formulario Actualizar OC
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$c_numeoc=$_GET['os'];
	$resultado=listaactualizarosM($c_numeoc);
	include('../MVC_Vista/Compras/updateOC.php');
}


if($_GET["acc"] == "actualizaos") // ACTUALIZAR OC
{
	
	//OBTENER DATOS DE LA CABECERA

$c_numeoc =$_REQUEST['c_numeoc'];

//$c_codprv=$_REQUEST['hc'];
//$c_nomprv=$_REQUEST['c_nomprov'];
$d_fecmod=date('d/m/Y');
$c_opermd=$_REQUEST['c_oper']; 
//$n_porigv=$_REQUEST['porigv'];

	

$n_tcoc=$_REQUEST['nomtipo'];	
	
$c_codmon=$_REQUEST['idmoneda'];
$c_codpag=$_REQUEST['c_codpag'];

$c_codlug=$_REQUEST['lat'];
$c_deslug=$_REQUEST['idatencion'];

$c_estado='0';	
$c_obsoc=$_REQUEST['c_obsoc'];

$d_fecent=$_REQUEST['c_fecentrega'];
$c_lugent= strtoupper($_REQUEST['c_nomlug']);
//$b_swtenv='0';

$c_codtran=$_REQUEST['hc1'];
$c_nomtran=$_REQUEST['c_nomtran'];

//$n_swtofi=1;

//$d_fecreg=date('d/n/Y');
//$d_date=date('d/n/Y');
$c_tipooc=$_REQUEST['idtipooc']; 
$c_refcoti=$_REQUEST['c_refcoti']; 

		
UpdateCabComprasM($c_numeoc,$d_fecmod,$c_opermd,$n_tcoc,$c_codmon,$c_codpag,$c_codlug,$c_deslug,$c_estado,$c_obsoc,$d_fecent,$c_lugent,$c_codtran,$c_nomtran,$c_tipooc,$c_refcoti);	
	

DeleterocM($c_numeoc);

// inicio detalle 
for($i=1;$i<=20;$i++){
	
$c_numeoc =$_REQUEST['c_numeoc'];
$n_item=$i;
$c_codprd=$_REQUEST['codigo'.$i];
$c_tipomv='C';
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);
$c_codund=$_REQUEST['um'.$i];
$n_canprd=$_REQUEST['cantidad'.$i];
$n_canund=$_REQUEST['cantidad'.$i];
$n_factor=1;
$n_preprd=$_REQUEST['precio'.$i];

$n_dscto=$_REQUEST['dscto'.$i];//cantidad de descuento en %
$totaldescuento=($n_dscto*$n_preprd)/100; //cantidad de descuento en soles

$n_totimp=($n_preprd-$totaldescuento)*$n_canprd; //total por producto sin IGV


//$n_canalm=0;
//$n_canfac=0;
$c_codafe='001'; //Prueba 
$c_obsdoc=strtoupper($_REQUEST['glosa'.$i]);
$d_fecreg=$_REQUEST['fecha'];
$c_oper=$_REQUEST['c_oper'];

$c_codcia='01';
$c_codtda='000';
$c_nroserie=strtoupper($_REQUEST['serie'.$i]);	





if($c_codprd != "")
		{
GuardaComprasDetM($c_numeoc,$n_item,$c_codprd,$c_tipomv,$c_desprd,
$c_codund,$n_canprd,$n_canund,$n_factor,$n_preprd,$n_dscto,
$n_totimp,$c_codafe,$c_obsdoc,$d_fecreg,$c_oper,
$c_codcia,$c_codtda,$c_nroserie);

}	

}

$n_bruafe=$_REQUEST['st'];	
$n_desafe=$_REQUEST['dsctof'];
$n_netafe=$_REQUEST['sub'];	
$n_igvafe=$_REQUEST['igv'];
$n_totoc=$_REQUEST['bi'];


updateCabocM($n_bruafe,$n_desafe,$n_netafe,$n_igvafe,$n_totoc,$c_numeoc);

	//include('../MVC_Vista/Compras/guardar.php');
	$mensaje="DATOS ACTUALIZADOS CORRECTAMENTE...!";
	print "<script>alert('$mensaje')</script>";	
	
	$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Compras/AdminOC.php');
}

if($_GET["acc"] == "verimpresion") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numeoc=$_REQUEST['c_numeoc'];
	include('../MVC_Vista/Compras/Reportes/imprimiros.php');
}

if($_GET["acc"] == "veraprobacion") // MOSTRAR: Formulario apruebaOC
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_numeoc=$_GET['os'];
	$resultado=listaactualizarosM($c_numeoc);
	include('../MVC_Vista/Compras/apruebaOC.php');
}

if($_GET["acc"] == "aprobacionos") // Aprobar la orden de compra
{
	$d_feaprb=date("d/m/Y H:i:s");
    $c_uaprb=$_REQUEST['c_oper'];
	$c_numeoc=$_REQUEST['c_numeoc'];
	$c_obaprb=$_REQUEST['c_obaprb'];
	ApruebaosM($c_numeoc,$c_uaprb,$d_feaprb,$c_obaprb);
	$mensaje="Orden de Compra Aprobado";
		print "<script>alert('$mensaje')</script>";
		
		$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Compras/AdminOC.php');
	
}

if($_GET["acc"] == "verliberacionos") // MOSTRAR: Formulario Liberar
{
	$udni=$_GET['udni'];
	$resultados=Obtener_UsuarioM($udni);
	$c_numeoc=$_GET['os'];
	$resultado=listaactualizarosM($c_numeoc);
	include('../MVC_Vista/Compras/LiberaOrdCompras.php');
}


if($_GET["acc"] == "liberaos") // Liberar OC
{
	$c_numeoc=$_REQUEST['c_numeoc'];
	$d_feaprb=date("d/m/Y H:i:s");
    $c_uaprb=$_REQUEST['c_oper'];	
   
	$c_obaprb=$_REQUEST['c_obaprb'];
	 $busquedaOrdServ = BuscaLibComprasM($c_numeoc);
 if($busquedaOrdServ!=NULL)
{
	LiberaosM($c_numeoc,$d_feaprb,$c_uaprb,$c_obaprb);
	$mensaje="Orden de Compra Liberado";
		print "<script>alert('$mensaje')</script>";
		
		$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Compras/AdminOC.php');
	
}else{
		$mensaje="Orden de Compra  No se Puede Liberar";
		print "<script>alert('$mensaje')</script>";
	
	}
}


if($_GET["acc"] == "eliminaroc") // Eliminar la orden de compra(cambiar el estado a 4)
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	foreach($resultado as $item){
		$user=$item['login'];
		}
	
	
$os=$_GET['os'];
$obs=$user.'  '.date("d/m/Y H:i:s");
	EliminarocM($os,$obs);
	
	$mensaje=" Eliminado click Aceptar";
		print "<script>alert('$mensaje')</script>";
	
	$resulos=BusquedaOSM($descripcion,$sw);
		include('../MVC_Vista/Compras/AdminOC.php');
}

if($_GET["acc"] == "verimpresionpdfoc") // MOSTRAR: Formulario Nuevo Registro
{
	//$c_numeoc=$_get['os'];
	include('../MVC_Vista/Compras/Reportes/impoc.php');
}

if($_GET["acc"] == "verarti") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Compras/ver_articulos.php');
	//include('../MVC_Vista/Cotizaciones/frame_clientes.php');
}
if($_GET["acc"] == "framearti") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Compras/frame_articulos.php');
}

if($_GET["acc"] == "ver_ultimasoc") // MOSTRAR: Formulario Nuevo Registro
{
	//$codigop=$_REQUEST['codigo'];
	
	include('../MVC_Vista/Compras/ver_ultimasoc.php');
}

//exporta a excel 23/06/2015
if($_GET["acc"] == "verexcel") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numeoc=$_GET['oc'];
	$resultado=listaactualizarosM($c_numeoc);
	include('../MVC_Vista/Compras/ocexcel.php');
}
if($_GET['acc']=="exportaoc")
{
	$tipoexporta='EXCEL';
	$oc=$_REQUEST['hiddenField'];
	$name='OC-'.$oc;
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=$name.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
   		}
	$resultado=listaactualizarosM($oc);
	include('../MVC_Vista/Compras/ocexcel.php');	
	
}
function reporteocC(){return reporteocM();}

if($_GET["acc"] == "reporte03") 
{
	echo $c_codprd=$_REQUEST['c_codprd']; //todos los productos	
		
	$reporte2=reporteUltimasocM($c_codprd); //los 5 ultimas oc
		

	include('../MVC_Vista/Compras/reporteUltimasoc.php');
}

?>