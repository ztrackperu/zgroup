<?php 
require("../MVC_Modelo/buzonM.php");
require('../php/Funciones/Funciones.php');
if($_GET["acc"] == "vercweb")
{
	
$reporte=ListaContactoM();
	
include ("../MVC_Vista/Bandeja/Entradacorreo.php");
}

if($_GET["acc"] == "deriva")
{
include ("../MVC_Vista/Bandeja/Derivacontacto.php");	
}
if($_GET["acc"] == "guardasol")
{
	
$c_empresa=!empty($_REQUEST['hiddenField'])?$_REQUEST['hiddenField']:"";
$c_nombre=!empty($_REQUEST['hiddenField2'])?$_REQUEST['hiddenField2']:"";
$c_fono=!empty($_REQUEST['hiddenField3'])?$_REQUEST['hiddenField3']:"";
$c_email=!empty($_REQUEST['hiddenField4'])?$_REQUEST['hiddenField4']:"";
$c_ruc=!empty($_REQUEST[''])?$_REQUEST['']:"";
$c_producto=!empty($_REQUEST['hiddenField5'])?$_REQUEST['hiddenField5']:"";
$c_consulta=!empty($_REQUEST['hiddenField6'])?$_REQUEST['hiddenField6']:"";
$c_estado='2';
$fecsol=!empty($_REQUEST['hiddenField7'])?$_REQUEST['hiddenField7']:"";
$c_derivado=!empty($_REQUEST['hiddenField8'])?$_REQUEST['hiddenField8']:"";
$c_usrderivo=!empty($_REQUEST['cmbderiva'])?$_REQUEST['cmbderiva']:"";
$c_fecderiva=date("d/m/Y");
$c_usrderiva=!empty($_REQUEST['udni'])?$_REQUEST['udni']:"";
$id=$_REQUEST['id'];	

RegistroContactoweb($c_empresa,$c_nombre,$c_fono,$c_email,$c_ruc,$c_producto,$c_consulta,$c_estado,$fecsol,$c_derivado,$c_usrderivo,$c_fecderiva,$c_usrderiva);

UpdateContacto($id);

$mensaje='Derivacion Realizado Correctamente';

print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Bandeja/Verdirvaciones.php");	
//include ("../MVC_Vista/Bandeja/Entradacorreo.php");	
}
if($_GET["acc"] == "verderiva")
{
$reporte=ListaDerivacionesM();
include ("../MVC_Vista/Bandeja/Verdirvaciones.php");	
}

?>