<?php
require("../MVC_Modelo/MaestrosM.php"); 
require("../MVC_Modelo/NotaM.php"); 
require("../MVC_Modelo/usuariosM.php"); 
require('../php/Funciones/Funciones.php');

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
		$con5=$item["pr_decl"];
		$con6=utf8_encode($item["pr_dir1"]);

		echo "$decod|$cod|$razon|$con1|$con2|$con3|$con5|$con6\n";
	}
}
	
}


if($_GET["acc"] == "registrarNotaSalida") 
{	

	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	

	
include('../MVC_Vista/Notas/RegSalida.php');
}

function ListatipocambioC(){return ListatipocambioM();}
function ListaMonedaC(){return ListaMonedaM();}
function transacSalidaC(){ return transacSalidaM();}
function docuC(){ return docuM();}


if($_GET["acc"] == "adminns") 
{	
	//$idr=$_REQUEST['IdRol'];
    $udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['transaccion']; 
	$resulos=BusquedaNotaSalidaM($descripcion);

	include('../MVC_Vista/Notas/AdminNotaSalida.php');

}

if($_GET["acc"] == "imprimirNotaSalida") 
{	

	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$nt_ndoc=$_GET['os'];
	$resulos=cabeceraNotaM($nt_ndoc);
	$resulos1=detalleNotaM($nt_ndoc);
	
include('../MVC_Vista/Notas/reporteEstandar.php');
}

if($_GET["acc"] == "imprimirticket") 
{	

	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$nt_ndoc=$_GET['os'];
	$resulos=cabeceraNotaM($nt_ndoc);
	$resulos1=detalleNotaM($nt_ndoc);
	
include('../MVC_Vista/Notas/reporteTicket.php');
}

if($_GET["acc"] == "verarti") 
{
	$almacen=$_GET['almacen'];
	
	for($i=1;$i<=10;$i++){	
		
	$c_codprd=$_REQUEST['codigo'.$i];

		if($c_codprd != "")
		{
			echo "holaaaaa". $c_codprd;
		//GuardaComprasDetM($c_codprd);		
		}
	}
	
 include('../MVC_Vista/Notas/ver_articulos.php');

}

if($_GET["acc"] == "framearti")
{
	//$idalmacen=$_REQUEST['idalmacen']; 

	
	include('../MVC_Vista/Notas/frame_articulos.php');
}


if($_GET["acc"] == "verserie") 
{	

$codigo=$_GET["codigo"];
$resultado=verserieM($codigo);

	include('../MVC_Vista/Notas/frame_serie.php');

}

if($_GET["acc"] == "grabarns") // MOSTRAR: Formulario Modificar Registro
{	
	$c_seroc='S';
	//calculamos el correlativo oc
	$correlativo=GenCorreOrdenSalidaC();
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
	
	$c_codcon='001';
	

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


$d_fecreg=date('d/n/Y');
$c_oper= $_REQUEST['c_oper']; 
$d_date=date('d/n/Y');
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


function GenCorreOrdenSalidaC(){ return  GenCorreOrdenSalidaM();}



if($_GET["acc"] == "guardarTemporal") 
{	

	
	//$id_nid=$_REQUEST[''];
$id_nid=1;
$codigo=$_GET['codigo'];
$descripcion=$_GET['descripcion'];
$medida=$_GET['medida'];
$tipo=$_GET['tipo'];
$precio=$_GET['precio'];
$serie=$_GET['serie'];
$cantidad=$_GET['cantidad'];
$udni=$_GET['udni'];	


$resultado=insertarTemporalNotmovC($id_nid,$codigo,$descripcion,$medida,$tipo,$precio,$serie,$cantidad,$udni);
	
	//$resultado=Obtener_UsuarioM($nt_oper);	

	
	
//include('../MVC_Vista/Notas/RegSalida.php');
}

function insertarTemporalNotmovC($id_nid,$codigo,$descripcion,$medida,$tipo,$precio,$serie,$cantidad,$udni){
$resultado=insertarTemporalNotmovM($id_nid,$codigo,$descripcion,$medida,$tipo,$precio,$serie,$cantidad,$udni);
} 

?>
