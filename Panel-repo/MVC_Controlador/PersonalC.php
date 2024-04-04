<?php require('../MVC_Modelo/PersonalM.php');require('../php/Funciones/Funciones.php');

if($_GET["acc"] == "p1") //formulario de ingreso
{
include ("../MVC_Vista/Personal/Index.php");
}
if($_GET["acc"] == "g1") //graba hora de ingreso
{
$id='';
$udni=$_GET['udni'];
$fecha=$_REQUEST['fecha'];
$hora=$_REQUEST['hora'];
$tipo=$_REQUEST['select'];
$salida='0';$ri='0';$rf='0';
if($tipo=='1'){
	$opcion='Entrada';
	}elseif($tipo=='2'){
		$opcion='Inicio Refrigerio';
	}elseif($tipo=='3'){
			$opcion='Fin Refrigerio';
	}else{
			$opcion='Salida';
		}
			

$obtenerE = ObtenerEntradanC($udni,$fecha,$tipo);
$obtenerRI = ObtenerriC($udni,$fecha,$tipo);
$obtenerRF = ObtenerrfC($udni,$fecha,$tipo);
$obtenerS = ObtenersalidaC($udni,$fecha,$tipo);
/* if($obtenerhorafecha!=NULL)
{*/
if ($tipo=='3' && $obtenerRF==NULL){
    GrabaAsistencia3C($udni,$fecha,$hora,$tipo);
  $mensaje="Registrado->Hora de Fin de Refrigerio ";
  print "<script>alert('$mensaje')</script>";
  include ("../MVC_Vista/Personal/Index.php");
}elseif ($tipo=='4' && $obtenerS==NULL){
    GrabaAsistencia4C($udni,$fecha,$hora,$tipo);
	$mensaje="Registrado->Hora de Salida";
  print "<script>alert('$mensaje')</script>";
 include ("../MVC_Vista/Personal/Index.php");
}elseif ($tipo=='2' && $obtenerRI==NULL){
	GrabaAsistencia2C($udni,$fecha,$hora,$tipo);
	 $mensaje="Registrado->Hora de Inicio de Refrigerio ";
  print "<script>alert('$mensaje')</script>";
  include ("../MVC_Vista/Personal/Index.php");
}elseif ($tipo=='1' && $obtenerE==NULL){
	GrabaAsistencia1C($id,$udni,$fecha,$hora,$fecha,$tipo,$salida,$ri,$rf);
	 $mensaje="Registrado->Hora de Ingreso";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Personal/Index.php");
}else{
	
	 $mensaje="Alert !! $opcion ya Registrado";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Personal/Index.php");
	}


}

//grabaciones
function GrabaAsistencia1C($id,$udni,$fecha,$entrada,$fecreg,$tipo,$salida,$ri,$rf)
{$resultado=GrabaAsistencia1M($id,$udni,$fecha,$entrada,$fecreg,$tipo,$salida,$ri,$rf);}
function GrabaAsistencia2C($udni,$fecha,$refri1,$tipo)
{$resultado=GrabaAsistencia2M($udni,$fecha,$refri1,$tipo);}
function GrabaAsistencia3C($udni,$fecha,$refri2,$tipo)
{$resultado=GrabaAsistencia3M($udni,$fecha,$refri2,$tipo);}
function GrabaAsistencia4C($udni,$fecha,$salida,$tipo)
{$resultado=GrabaAsistencia4M($udni,$fecha,$salida,$tipo);}
//obtenciones
function ObtenerEntradanC($udni,$fecha,$tipo)
{return ObtenerEntradanM($udni,$fecha,$tipo);}
function ObtenerriC($udni,$fecha,$tipo)
{return ObtenerriM($udni,$fecha,$tipo);}
function ObtenerrfC($udni,$fecha,$tipo)
{return ObtenerrfM($udni,$fecha,$tipo);}
function ObtenersalidaC($udni,$fecha,$tipo)
{return ObtenersalidaM($udni,$fecha,$tipo);}


if($_GET["acc"] == "v1")
{include ("../MVC_Vista/Personal/AsistenciaDiaria.php");}
if($_GET["acc"] == "r1")
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
$cod=$_REQUEST["textfield"];
$reporte=Reporte1C(gfecha($cod));
include ("../MVC_Vista/Personal/AsistenciaDiaria.php");	 
}
function Reporte1C($fecha)
{return Reporte1M($fecha);}


if($_GET["acc"] == "v2")
{include ("../MVC_Vista/Personal/AsistenciaMensual.php");}

if($_GET["acc"] == "r2")
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
$ano=$_REQUEST["select"];
$mes=$_REQUEST["select2"];
$empresa=$_REQUEST["select3"];
$reporte=Reporte2C($ano,$mes,$empresa);
include ("../MVC_Vista/Personal/AsistenciaMensual.php");	 
}

function Reporte2C($ano,$mes,$empresa)
{return Reporte2M($ano,$mes,$empresa);}

if($_GET["acc"] == "c2")
{
	include ("../MVC_Vista/Personal/CambioPassword.php");
	
	}

if($_GET["acc"] == "actpass"){

	$udni=$_REQUEST['textfield'];
	$clave=$_REQUEST['textfield2'];
	$pass=$_REQUEST['textfield3'];
	$valida=ObtenerUsuarioC($udni,$clave);
	
	if($valida!=NULL){
	UpdateUsuarioC($udni,$pass);
	$mensaje="Contraseña Actualizada";
  print "<script>alert('$mensaje')</script>";
  
	include ("../MVC_Vista/Personal/CambioPassword.php");
	}else{
		 $mensaje="Dni y/o Clave anterior No es Correcto";
  print "<script>alert('$mensaje')</script>";
	include ("../MVC_Vista/Personal/CambioPassword.php");
	}
}

function ObtenerUsuarioC($udni,$clave)
{return ObtenerUsuarioM($udni,$clave);}
function UpdateUsuarioC($udni,$pass)
{$resul=UpdateUsuarioM($udni,$pass);}
?>