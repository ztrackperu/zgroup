<?php
ini_set('error_reporting',0);//para xamp
require("../MVC_Modelo/CajaM.php"); 
require("../MVC_Modelo/TransporteM.php");
require('../php/Funciones/Funciones.php');
require("../MVC_Modelo/OrdenM.php"); 

function Ver_usuarioC($udni){ return ObtenerUsuarioM($udni);}

if($_GET["acc"] == "regotra") // MOSTRAR: Formulario Nuevo Registro 
{
	
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	include("../MVC_Vista/Ordenes_Trabajo_Servicio/RegistrarOTra.php");
	
	}

if($_GET["acc"] == "admot") // MOSTRAR: Formulario Nuevo Registro regotra
{
	
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	$listaot=ListaOrdenTrabajoM();
	include("../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOTrab.php");
	
	}

if($_GET["acc"] == "veros") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	$descripcion=$_REQUEST['des'];
	//$resulos=listaordenservM();
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOS.php');
	//include("../MVC_Vista/EnConstruccionV.php");
}

if($_GET["acc"] == "verotra") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	$descripcion=$_REQUEST['des'];
	//$resulos=listaordenservM();
	$sw=$_REQUEST['sw'];
	$listaot=BusquedaOTRAM($descripcion,$sw);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOTrab.php');
}





if($_GET["acc"] == "formos") // MOSTRAR: Formulario Nuevo Registro
{       
        $udni=!empty($_GET['udni'])?$_GET['udni']:"";
	$resultado=Ver_usuarioC($udni);
include('../MVC_Vista/Ordenes_Trabajo_Servicio/RegOrdServ.php');


}


if($_GET["acc"] == "formosplantilla") // MOSTRAR: Formulario Nuevo Registro
{$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/RegOrdServ_Plantilla.php');
}


if($_GET["acc"] == "proautocoti") // MOSTRAR: Formulario auto busqueda de proveedor
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; //busqueda cotizacion en lista de precios lpreciosd.
 $busquedapacienteauto = BusquedaautoserviciosM($texto);
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

// GUARDAR COTIZACION
if($_GET["acc"] == "guardaos"){
	//$udni=$_GET['udni'];
	//$resultado=Ver_usuarioC($udni);
	//Obtiene el nuevo cod de orden de servicio
	$secuencia=NroOrdenServicioM();
	if($secuencia!=NULL){
		foreach ($secuencia as $item){
			$secuencialpedido = $item["cod"]+1;
		}
	}

	//registra cabecera
	$c_numos=$secuencialpedido;$c_codcia='01';$c_codtda='000';
	$c_tipos=$_REQUEST['c_tipos'];
	$c_asunto=strtoupper($_REQUEST['c_asunto']);
	$c_contacto=strtoupper($_REQUEST['c_contacto']);
	$c_refcoti=$_REQUEST['c_refcoti'];
	$c_codprov=$_REQUEST['c_codprov'];
	$c_nomprov=strtoupper($_REQUEST['c_nomprov']);
	$d_fecos=$_REQUEST['d_fecos'];
	$n_tcamb=$_REQUEST['n_tcamb'];
	$c_codmod=$_REQUEST['xc_codmod'];
	$c_codpgf=$_REQUEST['c_codpgf'];
	$c_tratopag=$_REQUEST['c_tratopag'];
	$c_estado='0';
	//$c_obs=strtoupper($_REQUEST['c_obs']);
	$c_forpag=$_REQUEST['xc_codpgf'];
	$d_fecre=date("d/m/Y");$c_opcrea=$_REQUEST['c_opcrea'];$d_fecreg=date("d/m/Y H:i:s");
	$c_obs=nl2br(utf8_decode(strip_tags($_REQUEST['c_obs'])));
	$c_fecinicio=$_REQUEST['c_fecinicio'];$c_fecentrega=$_REQUEST['c_fecentrega'];
	$c_rh=$_REQUEST['c_rh'];
	RegistraCabOrdenServicioM($c_numos,$c_codcia,$c_codtda,$c_tipos,$c_asunto,$c_contacto,$c_refcoti,
	$c_codprov,$c_nomprov,$d_fecos,$n_tcamb,$c_codmod,$c_codpgf,$c_tratopag,$c_estado,$c_obs,$d_fecre,$c_opcrea,$c_forpag,$d_fecreg,$c_fecinicio,$c_fecentrega,$c_rh);
	// fin cabecera

	// inicio detalle 
	$i = 1;
	$ztotal=0;
	$igv=0;
	$tot=0;
	//do{
	for($i=1;$i<=20;$i++){
		//$IdTar=$_POST['codigo'.$i];
		$c_numos=$secuencialpedido;
		$n_item=$i;
		$c_codprd=$_REQUEST['codigo'.$i];
		$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);
		$c_glosa=strtoupper($_REQUEST['glosa'.$i]);
		$n_canprd=$_REQUEST['cantidad'.$i];
		$precio=$_REQUEST['precio'.$i];
		$preuni=$precio;
		$n_preprd=$preuni;
		/*fin*/
		/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
		//$precioigv=$_REQUEST['precio'.$i]*1.18;
		$n_prevta=($precio)*1.18;
		/*fin*/
		/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
		$total=($precio)*$n_canprd;
		$n_totimp=$total;
		/*fin*/
		$ztotal+=$n_totimp; // sub total
		$xigv=$ztotal*1.18;
		$igv=$xigv-$ztotal; // igv
		$tot=$ztotal+$igv; /// total
		$n_bruto=$ztotal;$n_totigv=$igv;$n_totos=$tot;
		$d_fecreg=date("d/m/Y H:i:s");

		if($c_codprd != ""){
			RegistraDetOrdenServicioM($c_numos,$n_item,$c_codprd,$c_desprd,$c_glosa,$n_canprd,$n_preprd,$n_totimp);
			//$i +=1;
					/*$seguir = true;
			}else{
					$seguir = false;
					}
				}while($seguir);*/
		}
	}
	$c_numos=$secuencialpedido;
	$xn_bruto=$_REQUEST['st'];$xn_totigv=$_REQUEST['igv'];$xn_totos=$_REQUEST['bi'];
	updateCabosM($xn_bruto,$xn_totigv,$xn_totos,$c_numos);
	//include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/imprimiros.php');
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/guardar.php');
	// fin detalle 	
}

if($_GET["acc"] == "duplicaos") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numos=$_GET['os'];
	$resultado=listaactualizarosM($c_numos);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/DuplicaOS.php');
}


if($_GET["acc"] == "verimpresionpdf") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/veros.php');
}
if($_GET["acc"] == "verimpresion") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numos=$_REQUEST['c_numos'];
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/imprimiros.php');
}

if($_GET["acc"] == "eliminaros") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
$os=$_GET['os'];
	EliminarosM($os);
	
	$mensaje=" Eliminado click Aceptar";
		print "<script>alert('$mensaje')</script>";
	
	$resulos=BusquedaOSM($descripcion);
		include('../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOS.php');
}


if($_GET["acc"] == "updateos") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numos=$_GET['os'];
	$resultado=listaactualizarosM($c_numos);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/UpdateOrdServ.php');
}
if($_GET["acc"] == "actualizaos") // MOSTRAR: Formulario Nuevo Registro
{

$c_numos=$_REQUEST['c_numos'];$c_codcia='01';$c_codtda='000';$c_asunto=$_REQUEST['c_asunto'];$c_contacto=$_REQUEST['c_contacto'];$c_refcoti=$_REQUEST['c_refcoti'];
$c_codprov=$_REQUEST['c_codprov'];$c_nomprov=$_REQUEST['c_nomprov'];$c_codpgf=$_REQUEST['c_codpgf'];
$c_tratopag=$_REQUEST['c_tratopag'];
$c_obs=nl2br(utf8_decode(strip_tags($_REQUEST['c_obs'])));
$d_fecmod=date("d/m/Y H:i:s");
$c_opmod=$_REQUEST['c_opcrea'];$c_forpag=$_REQUEST['xc_codpgf'];
$c_fecinicio=$_REQUEST['c_fecinicio'];$c_fecentrega=$_REQUEST['c_fecentrega'];
UpdateCabOrdenServicioM($c_numos,$c_codcia,$c_codtda,$c_asunto,$c_contacto,$c_refcoti,
$c_codprov,$c_nomprov,$c_codpgf,$c_tratopag,$c_obs,$d_fecmod,$c_opmod,$c_forpag,$c_fecinicio,$c_fecentrega);

DeleterosM($c_numos);

// inicio detalle 
//$i = 1;
$ztotal=0;
$igv=0;
$tot=0;
//do{
	//$IdTar=$_POST['codigo'.$i];
//$c_numos=$secuencialpedido;
$j=0;
for($i=1;$i<=50;$i++){


$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);
$c_glosa=strtoupper($_REQUEST['glosa'.$i]);
$n_canprd=$_REQUEST['cantidad'.$i];
$precio=$_REQUEST['precio'.$i];
$preuni=$precio;
$n_preprd=$preuni;
/*fin*/
/*GUARDAR PRECIO UNITARIO (INCLUIDO IGV)*/
//$precioigv=$_REQUEST['precio'.$i]*1.18;

$n_prevta=($precio)*1.18;
/*fin*/
/*GUARDAR VALOR DE VENTA  (PRECIO UNITARIO - DESCUENTO * CANTIDAD) (SIN IGV)*/
$total=($precio)*$n_canprd;
$n_totimp=$total;
/*fin*/
$ztotal+=$n_totimp; // sub total
$xigv=$ztotal*1.18;
$igv=$xigv-$ztotal; // igv
$tot=$ztotal+$igv; /// total
$n_bruto=$ztotal;$n_totigv=$igv;$n_totos=$tot;
$d_fecreg=date("d/m/Y H:i:s");

if($c_desprd != "")
		{
			$j=$j+1;
RegistraDetOrdenServicioM($c_numos,$j,$c_codprd,$c_desprd,$c_glosa,$n_canprd,$n_preprd,$n_totimp);
//$i +=1;
		//$seguir = true;
		
}
}

$xn_bruto=$_REQUEST['st'];$xn_totigv=$_REQUEST['igv'];$xn_totos=$_REQUEST['bi'];

//n_bruto,n_totigv,n_totos
updateCabosM($xn_bruto,$xn_totigv,$xn_totos,$c_numos);
//updateCabosM($n_bruto,$n_totigv,$n_totos,$c_numos);
//include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/imprimiros.php');
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/guardar.php');
}

if($_GET["acc"] == "veraprobacion") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numos=$_GET['os'];
	$resultado=listaactualizarosM($c_numos);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/ApruebaOrdServ.php');
}
if($_GET["acc"] == "verupdaterefcot") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numos=$_GET['os'];
	$resultado=listaactualizarosM($c_numos);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/UpdateRefOs.php');
}

if($_GET["acc"] == "verliberacionos") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numos=$_GET['os'];
	$resultado=listaactualizarosM($c_numos);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/LiberaOrdServ.php');
}

if($_GET["acc"] == "aprobacionos") // MOSTRAR: Formulario Nuevo Registro
{
	$d_fecapr=date("d/m/Y H:i:s");
    $c_uaprob=$_REQUEST['c_opcrea'];
	$c_numos=$_REQUEST['c_numos'];
	$c_codpgf=$_REQUEST['c_codpgf'];$c_tratopag=$_REQUEST['c_tratopag'];
	$c_forpag=$_REQUEST['xc_codpgf'];
	ApruebaosM($c_numos,$c_uaprob,$d_fecapr,$c_codpgf,$c_tratopag,$c_forpag);
	$mensaje="Orden de Servicio Aprobado";
	print "<script>alert('$mensaje')</script>";
	Header("Location: OrdenTrabajoC.php?acc=veros&udni=".$_REQUEST['udni']."&mod=1");
	exit;
}


if($_GET["acc"] == "liberaos") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numos=$_REQUEST['c_numos'];
	$c_feclibe=date("d/m/Y H:i:s");
	$c_oplibe=$_REQUEST['c_opcrea'];
	$c_motivo=$_REQUEST['c_motivo'];
	$busquedaOrdServ = BuscaServinTrabajoM($c_numos);
	if($busquedaOrdServ==NULL){
		LiberaosM($c_numos,$c_oplibe,$c_feclibe,$c_motivo);
		$mensaje="Orden de Servicio Liberado";
		print "<script>alert('$mensaje')</script>";
	}else{
		$mensaje="Orden de Servicio Asociado A Orden Trabajo No se Puede Eliminar";
		print "<script>alert('$mensaje')</script>";
	}
	Header("Location: OrdenTrabajoC.php?acc=veros&udni=".$_REQUEST['udni']."&mod=1");
	exit;
}


/*
ordenes de trabajo 
*/


if($_GET["acc"] == "verot") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	$resulos=BusquedaOTM($descripcion);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOT.php');
}


if($_GET["acc"] == "formot") // MOSTRAR: Formulario Nuevo Registro
{$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/RegOrdTrab.php');
}



if($_GET["acc"] == "ventanaos") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$moneda=$_GET['c'];
	$resultado=Ver_usuarioC($udni);
	$resultadordserv=listaOrdServM($moneda);
	
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/BuscaOS.php');
}


if($_GET["acc"] == "guardaotrabajo") // GUARDAR COTIZACION
{
	//$udni=$_GET['udni'];
	//$resultado=Ver_usuarioC($udni);
	$secuencia=GenNroOrdenTrabajoM();
if($secuencia!=NULL){foreach ($secuencia as $item){$secuencialpedido = $item["cod"]+1;}}

//registra cabecera


$c_numot=$secuencialpedido;$c_codcia='01';$c_codtda='000';
$c_tipos=$_REQUEST['c_tipos'];$c_asunto=strtoupper($_REQUEST['c_asunto']);$c_contacto=strtoupper($_REQUEST['c_contacto']);$c_refcoti=$_REQUEST['c_refcoti'];
$c_codprov=$_REQUEST['c_codprov'];$c_nomprov=strtoupper($_REQUEST['c_nomprov']);$d_fecot=$_REQUEST['d_fecos'];$n_tcamb=$_REQUEST['n_tcamb'];$c_codmod=$_REQUEST['xc_codmod'];$c_codpgf=$_REQUEST['c_codpgf'];$c_tratopag=$_REQUEST['c_tratopag'];$c_estado='0';$c_obs=strtoupper($_REQUEST['c_obs']);$c_forpag=$_REQUEST['xc_codpgf'];
$d_fecre=date("d/m/Y");$c_opcrea=$_REQUEST['c_opcrea'];$d_fecreg=date("d/m/Y H:i:s");
$c_solicita=$_REQUEST['c_solicita'];$c_supervisa=$_REQUEST['c_supervisa'];$c_ejecuta=$_REQUEST['c_ejecuta'];$c_lugar=$_REQUEST['c_lugar'];
$d_fecent=$_REQUEST['d_fecent'];
$c_sn=$_REQUEST['c_sn'];

RegistraCabOrdenTrabajoM($c_numot,$c_codcia,$c_codtda,$c_tipos,$c_asunto,$c_contacto,$c_refcoti,
$c_codprov,$c_nomprov,$d_fecot,$n_tcamb,$c_codmod,$c_estado,$c_obs,$d_fecre,$c_opcrea,$d_fecreg,$c_solicita,$c_supervisa,$c_ejecuta,$c_lugar,$d_fecent,$c_sn);
// fin cabecera

// inicio detalle 
$i = 1;
$ztotal=0;
$igv=0;
$tot=0;
do{
	//$IdTar=$_POST['codigo'.$i];
$c_numot=$secuencialpedido;
$n_item=$i;

$c_numos=$_REQUEST['codigo'.$i];
$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);
$c_glosa=strtoupper($_REQUEST['glosa'.$i]);
$n_totimp=$_REQUEST['cantidad'.$i];
$n_preprd=$_REQUEST['precio'.$i];
$n_canprd=$_REQUEST['cantidad'.$i];
$n_canfac=$_REQUEST['imp'.$i];
/*fin*/

/*fin*/

$d_fecreg=date("d/m/Y H:i:s");

if($c_desprd != "")
		{
RegistraDetOrdenTrabajoM($c_numot,$c_numos,$n_item,$c_codprd,$c_desprd,$c_glosa,$n_canprd,$n_preprd,$n_totimp,$n_canfac);
$i +=1;
		$seguir = true;
}else{
		$seguir = false;
		}
	}while($seguir);

$c_numot=$secuencialpedido;


//include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/imprimiros.php');
	//include('../MVC_Vista/Ordenes_Trabajo_Servicio/guardar.php');

// fin detalle
	
}


if($_GET["acc"] == "updateotrabajo") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numot=$_GET['ot'];
	$resultado=listaactualizarotCabM($c_numot);
	$resultadodet=listaactualizarotDetM($c_numot);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/UpdateOrdTrab.php');
}


if($_GET["acc"] == "actualizaotrabajo") // MOSTRAR: Formulario Nuevo Registro
{

$c_numot=$_REQUEST['c_numos'];$c_codcia='01';$c_codtda='000';$c_asunto=$_REQUEST['c_asunto'];
$c_contacto=$_REQUEST['c_contacto'];$c_refcoti=$_REQUEST['c_refcoti'];
$c_codprov=$_REQUEST['c_codprov'];$c_nomprov=$_REQUEST['c_nomprov'];$c_codpgf=$_REQUEST['c_codpgf'];
$c_tratopag=$_REQUEST['c_tratopag'];$c_obs=$_REQUEST['c_obs'];$d_fecmod=date("d/m/Y H:i:s");
$c_opmod=$_REQUEST['c_opcrea'];$c_forpag=$_REQUEST['xc_forpag'];
$c_solicita=$_REQUEST['c_solicita'];$c_supervisa=$_REQUEST['c_supervisa'];$c_ejecuta=$_REQUEST['c_ejecuta'];$c_lugar=$_REQUEST['c_lugar'];
$d_fecent=$_REQUEST['d_fecent'];
UpdateCabOrdenTrabajoM($c_numot,$c_codcia,$c_codtda,$c_asunto,$c_contacto,$c_refcoti,
$c_codprov,$c_nomprov,$c_codpgf,$c_tratopag,$c_obs,$d_fecmod,$c_opmod,$c_forpag,$c_solicita,$c_supervisa,$c_ejecuta,$c_lugar,$d_fecent);

DeleterotM($c_numot);

// inicio detalle 
for($i=1;$i<=100;$i++){
	//$IdTar=$_POST['codigo'.$i];
//$c_numos=$secuencialpedido;

$c_numot=$_REQUEST['c_numos'];
$n_item=$i;

$c_numos=$_REQUEST['codigo'.$i];
$c_codprd=$_REQUEST['codigo'.$i];
$c_desprd=strtoupper($_REQUEST['descripcion'.$i]);
$c_glosa=strtoupper($_REQUEST['glosa'.$i]);
$n_totimp=$_REQUEST['cantidad'.$i];
$n_preprd=$_REQUEST['precio'.$i];
$n_canprd=$_REQUEST['cantidad'.$i];
$n_canfac=$_REQUEST['imp'.$i];
/*fin*/

/*fin*/

$d_fecreg=date("d/m/Y H:i:s");

if($c_codprd != "")
		{
RegistraDetOrdenTrabajoM($c_numot,$c_numos,$n_item,$c_codprd,$c_desprd,$c_glosa,$n_canprd,$n_preprd,$n_totimp,$n_canfac);
//$i +=1;
		}
}
$mensaje=" Actualizado Orden Trabajo";
		print "<script>alert('$mensaje')</script>";

//include('../MVC_Vista/Ordenes_Trabajo_Servicio/Reportes/imprimiros.php');
	//include('../MVC_Vista/Ordenes_Trabajo_Servicio/guardar.php');
}
if($_GET["acc"] == "veraprobacionot") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numot=$_GET['os'];
		$resultado=listaactualizarotCabM($c_numot);
	$resultadodet=listaactualizarotDetM($c_numot);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/ApruebaOrdTrab.php');
}
if($_GET["acc"] == "aprobacionosot") // MOSTRAR: Formulario Nuevo Registro
{
	$d_fecapr=date("d/m/Y H:i:s");
    $c_uaprob=$_REQUEST['c_opcrea'];
	$c_numot=$_REQUEST['c_numos'];
	ApruebaotM($c_numos,$c_uaprob,$d_fecapr);
	$mensaje="Orden de Trabajo Aprobado";
		print "<script>alert('$mensaje')</script>";
	
}




if($_GET["acc"] == "eliminarot") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
$os=$_GET['os'];
	EliminarotM($os);
	
	$mensaje=" Eliminado click Aceptar";
		print "<script>alert('$mensaje')</script>";
	
	$resulos=BusquedaOTM($descripcion);
		include('../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOT.php');
}


if($_GET["acc"] == "verliberacionot") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numot=$_GET['os'];
		$resultado=listaactualizarotCabM($c_numot);
	$resultadodet=listaactualizarotDetM($c_numot);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/LiberaOrdTrab.php');
}



if($_GET["acc"] == "verordentrabajo") // MOSTRAR: Formulario Nuevo Registro
{
	$udni=$_GET['udni'];
	$resultados=Ver_usuarioC($udni);
	$c_numot=$_GET['ot'];
	$resultado=listaactualizarotCabM($c_numot);
	$resultadodet=listaactualizarotDetM($c_numot);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/VerOrdTrab.php');
}






if($_GET["acc"] == "cn00") // MOSTRAR: Formulario Nuevo Registro
{
	include('../MVC_Vista/Orden_Trabajo/index.php');
}
if($_GET["acc"] == "cn02") // MOSTRAR: Formulario Nuevo Registro
{
	
if($_REQUEST['tipo']=='SERVICIO'){
$c_tipord='2';
}else{
$c_tipord='1';			
}
	
	include('../MVC_Vista/Orden_Trabajo/inicio.php');
}
if($_GET["acc"]=="cn01"){
	
	$tipo=$_REQUEST['tipo'];
	if($tipo=='ZGROUP'){ $ot='Z'; $mensaje='ZGROUP SAC';}else{ $ot='T';$mensaje='';}
	
	include('../MVC_Vista/Orden_Trabajo/RegOrdTrab.php');
	}

if($_GET["acc"] == "serieautonotsalida") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"];
 $busqueda = ListaNotaSalidaM($texto);
 if($busqueda!=NULL)
{
	foreach ($busqueda as $item)
	{
	$doc =   $item["nt_ndoc"];
	$decod=$doc;
	echo "$decod|$doc\n";
	}
}
	
}




if($_GET["acc"] == "guardaot") // MOSTRAR: Formulario Modificar Registro
{
	
	$c_tipord=$_REQUEST['c_tipord'];
	
$secuencia=NroordentrabajoC($c_tipord);

	foreach ($secuencia as $item)
	{
		
			$ot=$item["cod"]+1;
		}
		
$n_subtotat=$_REQUEST['st'];
$n_igv=$_REQUEST['igv'];
$n_total=$_REQUEST['total'];		
		
	$c_estadoc=	$_REQUEST['estado'];
$coti=$_REQUEST['coti'];
$c_nroos=strtoupper($_REQUEST['notsalida']);$c_lugtrab=strtoupper($_REQUEST['lugtrab']);
$ot_nro=$ot;$ot_descr=strtoupper($_REQUEST['textfield']);$ot_equipo=strtoupper($_REQUEST['descripcion']);$ot_mar=strtoupper($_REQUEST['textfield7']);$ot_mod=strtoupper($_REQUEST['textfield8']);$ot_serie=strtoupper($_REQUEST['codequipo']);$ot_soli=strtoupper($_REQUEST['textfield5']);
$ot_res=strtoupper($_REQUEST['textfield10']);$ot_fecejc=$_REQUEST['fecha'];$ot_aut=strtoupper($_REQUEST['textfield6']);$ot_sup=strtoupper($_REQUEST['textfield11']);$ot_personal=strtoupper($_REQUEST['textfield22']);$ot_h1=$_REQUEST['textfield23'];$ot_h2=$_REQUEST['textfield24'];$ot_h3=$_REQUEST['textfield25'];$ot_med=strtoupper($_REQUEST['textfield20']);
$ot_obs=strtoupper($_REQUEST['textfield21']);$ot_costo=1;$ot_est='1';$ot_usuario=$_REQUEST['hiddenField'];$otfecreg=date("d/m/Y"); $ot_id='';
$ot_tipo=$_REQUEST['tipo'];
$c_prov=$_REQUEST['c_prov'];
GuardaOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$otfecreg,$ot_tipo,$c_nroos,$c_lugtrab,$coti,$n_subtotat,
$n_igv,$n_total,$c_estadoc,$c_prov,$c_tipord);
for($i=0;$i<=30;$i++){
 	$ot_tarea=strtoupper($_REQUEST['tarea'.$i]);$ot_h1=$_REQUEST['timees'.$i];$ot_h2=$_REQUEST['timere'.$i];$ot_estado='1';
	
	
 		if($ot_tarea != "")
		{
Guardaordtrabde1C($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado,$c_tipord);
			
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
Guardaordtrabde2C($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado,$c_tipord);
			
		}
}

//ActualizaInvC($ot_nro,$ot_serie,$cos,$cosdol);

$imprimeotcab=imprimeotcabC($ot_nro,$c_tipord);
$imprimeotde1=imprimeotde1C($ot_nro,$c_tipord);
$imprimeotde2=imprimeotde2C($ot_nro,$c_tipord);

$detnot=listadetnotsal($ot_nro);

if($ot_tipo=='T'){include('../MVC_Vista/Orden_Trabajo/imprimirOT.php');}else{
include('../MVC_Vista/Orden_Trabajo/imprimirOTZ.php');}

}
if($_GET["acc"] == "verots")
{
$ot_nro=$_GET['nro'];
$ot_tipo=$_GET['tipo'];
$notsal=$_GET['notsal'];
$c_tipord=$_GET['ctipord'];
$imprimeotcab=imprimeotcabC($ot_nro,$c_tipord);
$imprimeotde1=imprimeotde1C($ot_nro,$c_tipord);
$imprimeotde2=imprimeotde2C($ot_nro,$c_tipord);
$detnot=listadetnotsal($notsal);
if($ot_tipo=='T'){include('../MVC_Vista/Orden_Trabajo/imprimirOT.php');}else{
include('../MVC_Vista/Orden_Trabajo/imprimirOTZ.php');}
}
if($_GET["acc"] == "ventot") // MOSTRAR: Formulario Nuevo Registro
{
$imprimeotcab=imprimeotcabC($_GET['nro']);
$imprimeotde1=imprimeotde1C($_GET['nro']);
$imprimeotde2=imprimeotde2C($_GET['nro']);
include('../MVC_Vista/Orden_Trabajo/imprimirOT.php');
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
include('../MVC_Vista/Orden_Trabajo/Verordentrabajo.php');	 
}



if($_GET["acc"] == "verotupdateot")
{
$ot_nro=$_GET['nro'];
$c_tipord=$_GET['ctipord'];
$imprimeotcab=imprimeotcabC($ot_nro,$c_tipord);
$imprimeotde1=imprimeotde1C($ot_nro,$c_tipord);
$imprimeotde2=imprimeotde2C($ot_nro,$c_tipord);
include('../MVC_Vista/Orden_Trabajo/actualizaot.php');
}
function UpdatesitOTC($ot_nro,$c_tipord){ $re=UpdatesitOTM($ot_nro,$c_tipord); }

function UpdateOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo,$c_coti,
$c_prov,
$c_lugtrab,$n_subtotat,
$n_igv,$n_total,$c_tipord){ 
$resul=UpdateOrdenTrabajoCabM($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo,$c_coti,
$c_prov,
$c_lugtrab,$n_subtotat,
$n_igv,$n_total,$c_tipord);}
function deleteOTC($ot_nro,$c_tipord){ $resul=deleteOTM($ot_nro,$c_tipord);}
function delete2OTC($ot_nro,$c_tipord){ $resul=delete2OTM($ot_nro,$c_tipord);}
function validaotcerradaC($ot_nro,$c_tipord){ return validaotcerradaM($ot_nro,$c_tipord);}
if($_GET["acc"] == "updateot") // MOSTRAR: Formulario Modificar Registro
{
$ot_nro=$_POST['ot_nro'];
$c_tipord=$_REQUEST['c_tipord'];
$validaot=validaotcerradaC($ot_nro,$c_tipord);

if($validaot==NULL){


$c_coti=$_REQUEST['coti'];
$c_prov=$_REQUEST['textfield2'];
$c_lugtrab=$_REQUEST['textfield12'];


$n_subtotat=$_REQUEST['st'];
$n_igv=$_REQUEST['igv'];
$n_total=$_REQUEST['total'];	

$ot_descr=strtoupper($_POST['textfield']);$ot_equipo=strtoupper($_POST['descripcion']);$ot_mar=strtoupper($_REQUEST['textfield7']);$ot_mod=strtoupper($_REQUEST['textfield8']);$ot_serie=strtoupper($_REQUEST['codequipo']);$ot_soli=strtoupper($_REQUEST['textfield5']);
$ot_res=strtoupper($_REQUEST['textfield10']);$ot_fecejc=$_REQUEST['fecha'];$ot_aut=strtoupper($_REQUEST['textfield6']);$ot_sup=strtoupper($_REQUEST['textfield11']);$ot_personal=strtoupper($_REQUEST['textfield22']);$ot_h1=$_REQUEST['textfield23'];$ot_h2=$_REQUEST['textfield24'];$ot_h3=$_REQUEST['textfield25'];$ot_med=strtoupper($_REQUEST['textfield20']);
$ot_obs=strtoupper($_REQUEST['textfield21']);$ot_costo=1;$ot_est='1';$ot_usuario=$_POST['hiddenField'];
$otfecreg=date("d/m/Y"); $ot_id='';
$ot_tipo=$_REQUEST['tipo'];

UpdateOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$ot_tipo,$c_coti,
$c_prov,
$c_lugtrab,$n_subtotat,
$n_igv,$n_total,$c_tipord);

if($_REQUEST['estado']=='1'){
	UpdatesitOTC($ot_nro,$c_tipord);
	}

//


deleteOTC($ot_nro,$c_tipord);
delete2OTC($ot_nro,$c_tipord);

for($i=0;$i<=30;$i++){
 	$ot_tarea=strtoupper($_REQUEST['tarea'.$i]);$ot_h1=$_REQUEST['timees'.$i];$ot_h2=$_REQUEST['timere'.$i];$ot_estado='1';
	
	
 		if($ot_tarea != "")
		{
Guardaordtrabde1C($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado,$c_tipord);
			
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
Guardaordtrabde2C($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado,$c_tipord);
			
		}
}
$imprimeotcab=imprimeotcabC($ot_nro,$c_tipord);
$imprimeotde1=imprimeotde1C($ot_nro,$c_tipord);
$imprimeotde2=imprimeotde2C($ot_nro,$c_tipord);
include('../MVC_Vista/Orden_Trabajo/imprimirOT.php');

}else{
	
		$mensaje="Orden de Trabajo Esta Cerrado No se Puede Modificar...!";
		print "<script>alert('$mensaje')</script>";	
	}
}
function verotrabajoC($f1,$f2){ return verotrabajo($f1,$f2);}
function NroordentrabajoC($c_tipord){ return NroordentrabajoM($c_tipord);}
function imprimeotcabC($ot_nro,$c_tipord){ return imprimeotcab($ot_nro,$c_tipord);}
function imprimeotde1C($ot_nro,$c_tipord){ return imprimeotde1($ot_nro,$c_tipord);}
function imprimeotde2C($ot_nro,$c_tipord){ return imprimeotde2($ot_nro,$c_tipord);}
function GuardaOrdenTrabajoCabC($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$otfecreg,$ot_tipo,$c_nroos,$c_lugtrab,$coti,$n_subtotat,
$n_igv,$n_total,$c_estadoc,$c_prov,$c_tipord){
$resultado=GuardaOrdenTrabajoCabM($ot_nro,$ot_descr,$ot_equipo,$ot_mar,$ot_mod,$ot_serie,$ot_soli,
$ot_res,$ot_fecejc,$ot_aut,$ot_sup,$ot_personal,$ot_h1,$ot_h2,$ot_h3,$ot_med,
$ot_obs,$ot_costo,$ot_est,$ot_usuario,$otfecreg,$ot_tipo,$c_nroos,$c_lugtrab,$coti,$n_subtotat,
$n_igv,$n_total,$c_estadoc,$c_prov,$c_tipord);
	}
function Guardaordtrabde1C($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado,$c_tipord){
$resul=Guardaordtrabde1M($ot_nro,$ot_tarea,$ot_h1,$ot_h2,$ot_estado,$c_tipord);
	}
function Guardaordtrabde2C($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado,$c_tipord){
$resul=Guardaordtrabde2M($ot_nro,$ot_material,$ot_uni,$ot_cant1,$cant2,$ot_costo,$ot_costodol,$ot_estado,$c_tipord);
}

function ActualizaInvC($c_nroot,$c_nserie,$c_nronis,$c_costotr,$codprod){$resul=ActualizaInvM($c_nroot,$c_nserie,$c_nronis,$c_costotr,$codprod);}



if($_GET["acc"] == "registraot") // MOSTRAR: Formulario Modificar Registro
{
	
	//$c_tipord=$_REQUEST['c_tipord'];
	
$secuencia=GenerarNroOrdenTrabajoM();

	foreach ($secuencia as $item)
	{
		
			$ot=$item["cod"]+1;
		}
$c_numot=$ot;
///insert a cabecera ot
$c_desequipo=strtoupper($_REQUEST['c_desequipo']);$unidad=strtoupper($_REQUEST['codigoequipo']);$d_fecdcto=$_REQUEST['d_fecdcto'];$c_codmon=$_REQUEST['xc_codmod'];$c_treal=strtoupper($_REQUEST['c_treal']);$c_asunto=strtoupper($_REQUEST['c_asunto']);
$c_supervisa=strtoupper($_REQUEST['c_supervisa']);$c_solicita=strtoupper($_REQUEST['c_solicita']);$c_lugartab=strtoupper($_REQUEST['c_lugartab']);$c_ejecuta=strtoupper($_REQUEST['c_ejecuta']);$c_cliente=strtoupper($_REQUEST['c_cliente']);$d_fecentrega=strtoupper($_REQUEST['d_fecentrega']);
$c_usrcrea=strtoupper($_REQUEST['c_usrcrea']);
$d_fcrea=date("d/m/Y H:i:s");$c_estado='1';$c_refcot=$_REQUEST['c_refcot'];
$c_osb=nl2br(utf8_decode(strip_tags($_REQUEST['c_osb'])));
InsertCabOrdenTrabajoM($c_numot,$c_desequipo,$unidad,$d_fecdcto,$c_codmon,$c_treal,$c_asunto,
$c_supervisa,$c_solicita,$c_lugartab,$c_ejecuta,$c_cliente,$d_fecentrega,$c_usrcrea,
$d_fcrea,$c_estado,$c_refcot,$c_osb);

//ACTUALIZA ESTADO DE EQUIPO DE DISPONIBLE A REPARACION DE D=>R

ActualizaEstadoEQM($unidad);


/// grabando detalle

for($i=1;$i<=20;$i++){
	
	$c_rucprov=$_REQUEST['c_rucprov'.$i];
	$c_nomprov=$_REQUEST['c_nomprov'.$i];
	$concepto=$_REQUEST['concepto'.$i];
	$tdoc=$_REQUEST['tdoc'.$i];
	$ndoc=$_REQUEST['ndoc'.$i];
	$fdoc=$_REQUEST['fdoc'.$i];
	$monto=$_REQUEST['monto'.$i];
	$n_cant=$_REQUEST['n_cant'.$i];
	$n_igvd=$_REQUEST['n_igvd'.$i];
	$n_totd=$_REQUEST['n_totd'.$i];
	$montop=$_REQUEST['montop'.$i];
	$c_tecnico=$_REQUEST['c_tecnico'.$i];
	if($c_nomprov != "")
		{
	
	InsertDetOrdenTrabajoM($c_numot,$i,$c_rucprov,$c_nomprov,$concepto,$tdoc,$ndoc,$fdoc,$monto,$n_cant,$n_igvd,$n_totd,$montop,$c_tecnico);
			}
	}
	$mensaje="Orden de Trabajo Grabado Correctamente...!";
		print "<script>alert('$mensaje')</script>";	
		
	//	$reporteot=CargaOrdenTrabajoM($c_numot);
		
include('../MVC_Vista/Ordenes_Trabajo_Servicio/MensajeParaNotasSalidas.php');
}

if($_GET["acc"] == "actualizaot") // MOSTRAR: Formulario Modificar Registro actualizaot
{
	
	$c_numot=$_REQUEST['c_numot'];
///insert a cabecera ot
$c_desequipo=strtoupper($_REQUEST['c_desequipo']);$unidad=strtoupper($_REQUEST['codigoequipo']);$d_fecdcto=$_REQUEST['d_fecdcto'];$c_codmon=$_REQUEST['xc_codmod'];$c_treal=strtoupper($_REQUEST['c_treal']);$c_asunto=strtoupper($_REQUEST['c_asunto']);
$c_supervisa=strtoupper($_REQUEST['c_supervisa']);$c_solicita=strtoupper($_REQUEST['c_solicita']);$c_lugartab=strtoupper($_REQUEST['c_lugartab']);$c_ejecuta=strtoupper($_REQUEST['c_ejecuta']);$c_cliente=strtoupper($_REQUEST['c_cliente']);$d_fecentrega=strtoupper($_REQUEST['d_fecentrega']);
$c_usrmod=strtoupper($_REQUEST['c_usrcrea']);
$d_fmod=date("d/m/Y H:i:s");$c_estado='1';$c_refcot=$_REQUEST['c_refcot'];
$c_osb=nl2br(utf8_decode(strip_tags($_REQUEST['c_osb'])));
	
UpdateCabeOrdenTrabajoM($c_numot,$c_desequipo,$unidad,$d_fecdcto,$c_codmon,$c_treal,$c_asunto,$c_supervisa,$c_solicita,$c_lugartab,$c_ejecuta,
$c_cliente,$d_fecentrega,$c_usrmod,$d_fmod,$c_refcot,$c_osb);	
	
	DeletedetalleOrdenTrabajoM($c_numot);
	
	
	/// grabando detalle

for($i=1;$i<=20;$i++){
	
	$c_rucprov=$_REQUEST['c_rucprov'.$i];
	$c_nomprov=$_REQUEST['c_nomprov'.$i];
	$concepto=$_REQUEST['concepto'.$i];
	$tdoc=$_REQUEST['tdoc'.$i];
	$ndoc=$_REQUEST['ndoc'.$i];
	$fdoc=$_REQUEST['fdoc'.$i];
	$monto=$_REQUEST['monto'.$i];
	$n_cant=$_REQUEST['n_cant'.$i];
	$n_igvd=$_REQUEST['n_igvd'.$i];
	$n_totd=$_REQUEST['n_totd'.$i];
	$montop=$_REQUEST['montop'.$i];
	$c_tecnico=$_REQUEST['c_tecnico'.$i];
	if($c_nomprov != "")
		{
	
	InsertDetOrdenTrabajoM($c_numot,$i,$c_rucprov,$c_nomprov,$concepto,$tdoc,$ndoc,$fdoc,$monto,$n_cant,$n_igvd,$n_totd,$montop,$c_tecnico);
			}
	}
	$mensaje="Orden de Trabajo Actulizado Correctamente...!";
		print "<script>alert('$mensaje')</script>";	
		
	//	$reporteot=CargaOrdenTrabajoM($c_numot);
		
include('../MVC_Vista/Ordenes_Trabajo_Servicio/MensajeParaNotasSalidas.php');
	
	
	}


if($_GET["acc"] == "veroTra") // MOSTRAR: Formulario Modificar Registro
{
	$c_numot=$_GET['ot'];
	
	$reporteot=CargaOrdenTrabajoM($c_numot);

	$c_not=$c_numot;
	
	$reportens=ListarNotasSalidasM($c_not);
		//echo $c_not;
include('../MVC_Vista/Ordenes_Trabajo_Servicio/ImprimirOT.php');
}

if($_GET["acc"] == "VerGenOS") // MOSTRAR: Formulario Modificar Registro
{
	$c_numot=$_GET['ot'];

	$reporteot=CargaOrdenTrabajoM($c_numot);
		
include('../MVC_Vista/Ordenes_Trabajo_Servicio/GenerarServOT.php');
}

if($_GET["acc"] == "GenOS") // MOSTRAR: Formulario Modificar Registro
{
	$c_numot=$_GET['ot'];
	$c_rucprov=$_GET['ruc'];
	$n_id=$_GET['id'];
	
	$id=str_pad($n_id, 2, "0", STR_PAD_LEFT);
	$c_not=substr($c_numot,5,6);
	$ot_num=$c_not.$id;
	$reportens=ListarNotasSalidasTM($ot_num);
	
	
	$reporteot=CargaOrdenTrabajoGenOServM($c_numot,$c_rucprov,$n_id);
		
include('../MVC_Vista/Ordenes_Trabajo_Servicio/ImprimirServOT.php');
}

if($_GET["acc"] == "VERupdateOT") // MOSTRAR: Formulario Modificar Registro 
{
	$c_numot=$_GET['ot'];
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	$reporteot=CargaOrdenTrabajoM($c_numot);
    //    $countOT = count($reporteot);

	include("../MVC_Vista/Ordenes_Trabajo_Servicio/ActualizaOTra.php");
	
	}
	
if($_GET["acc"] == "eliminaotrab") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numot=$_GET['ot'];
	$c_idequipo=$_GET['id'];
	ZActualizaEstadoEQM($c_idequipo);
	$d_fechadelete=date("d/m/Y H:i:s");$c_usrdelete=$_GET['udni'];
	AnularOrdenTrabajoM($c_numot,$d_fechadelete,$c_usrdelete);
	
	$mensaje=" Eliminado......";
		print "<script>alert('$mensaje')</script>";
	
	$udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	$listaot=ListaOrdenTrabajoM();
	include("../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOTrab.php");
	
}
if($_GET["acc"] == "VercerrarOTrab") // MOSTRAR: Formulario Nuevo Registro
{
	$c_numot=$_GET['ot'];

	$reporteot=CargaOrdenTrabajoM($c_numot);

	$c_not=substr($c_numot,5,6);
	
	$reportens=ListarNotasSalidasM($c_not);
        
        $udni=$_GET['udni'];
	$resultado=Ver_usuarioC($udni);
	include("../MVC_Vista/Ordenes_Trabajo_Servicio/CloseOTrab.php");
}
if($_GET["acc"] == "CerrarOTrab") // MOSTRAR: Formulario Nuevo Registro
{
	
	 $c_numot=$_REQUEST['c_numot'];
	 $c_usrcierra=$_REQUEST['c_usrcrea'];
	 $d_feccierra=date("d/m/Y");
	 $c_idequipo=$_REQUEST['unidad'];
	cerrarOTM($c_numot,$d_feccierra,$c_usrcierra);
	ZActualizaEstadoEQM($c_idequipo);
	$mensaje="Orden Trabajo Cerrado......";
	print "<script>alert('$mensaje')</script>";
	$redirect = "<script>window.location.href='OrdenTrabajoC.php?acc=admot&mod=1&udni=".$c_usrcierra."&sw=1';</script>";
	print $redirect;
	exit();
	///$unidad=
	
}


if($_GET["acc"] == "Proautotecnico") // MOSTRAR: Formulario auto busqueda de proveedor
{
 $texto =strtoupper($_REQUEST["q"]);
 //$seguro=$_GET["seguro"]; //busqueda cotizacion en lista de precios lpreciosd.
 $busquedapacienteauto = ListaTecnicoM($texto);
 if($busquedapacienteauto!=NULL)
{
	foreach ($busquedapacienteauto as $item)
	{
		$cod  =  $item["c_tecnico"];
		
		//$dir =$item["CC_DIR1"];
		$decod=$cod.' '.$desc.' '.$des;
		echo "$cod \n";
				//0		1		2	3 array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
if($_GET["acc"] == "verfrmref") // MOSTRAR: Formulario auto busqueda de proveedor
{	
include("../MVC_Vista/Ordenes_Trabajo_Servicio/RegReferencias.php");
}
if($_GET["acc"] == "guardarefos") // MOSTRAR: Formulario auto busqueda de proveedor
{	
	$c_numos=$_REQUEST['c_numos'];
	$c_tipdoc=$_REQUEST['c_tipdoc'];
	$c_serdoc=$_REQUEST['c_serdoc'];
	$c_nrodoc=$_REQUEST['c_nrodoc'];
	$d_fecudp=date("d/m/Y H:i:s");
	$c_usrudp=$_REQUEST['c_usrudp'];
	UpdateReferenciaOSM($c_numos,$c_tipdoc,$c_serdoc,$c_nrodoc,$c_usrudp,$d_fecudp);
		$mensaje="Se Actualizo Referencia......";
	print "<script>alert('$mensaje')</script>";
	$sw="1";
	$descripcion='';
	$resulos=BusquedaOSM($descripcion,$sw);
	include('../MVC_Vista/Ordenes_Trabajo_Servicio/AdminOS.php');
}

?>