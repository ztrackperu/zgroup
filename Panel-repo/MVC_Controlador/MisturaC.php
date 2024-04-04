<?php require('../MVC_Modelo/MisturaM.php');require('../php/Funciones/Funciones.php');

if($_GET["acc"] == "m1")
{
include ("../MVC_Vista/Mistura/VerContenedores.php");
}
if($_GET["acc"] == "m2")
{
$dato=$_GET['dato'];
	$obtenercontenedor=ObtenerContenedorC($dato);
include ("../MVC_Vista/Mistura/UpdateContenedor.php");
}
if($_GET["acc"] == "m3")
{
	$id_contenedor=$_REQUEST['hiddenField'];
    $descripcion_contenedor=strtoupper($_REQUEST['textfield']); 
	$placa_contenedor =strtoupper($_REQUEST['textfield2']);
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$resul=actualizarContenedorC($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,   $usuarioreg);
 $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerContenedores.php");
}
if($_GET["acc"] == "m4")
{
include ("../MVC_Vista/Mistura/RegContenedor.php");
}
if($_GET["acc"] == "m5")
{
	$id_contenedor='';
	$descripcion_contenedor=strtoupper($_REQUEST['textfield']); 
	$placa_contenedor =strtoupper($_REQUEST['textfield2']);
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$resul=RegistrarContenedorC($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg);
 $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerContenedores.php");
}
function ListaContenedor2C()
{return ListaContenedor2M();}
function ListaContenedorC($idx)
{return ListaContenedorM($idx);}
function ObtenerContenedorC($id)
{return ObtenerContenedorM($id);}
function actualizarContenedorC($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg)
{$resul=actualizarContenedorM($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg);}
function RegistrarContenedorC($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg)
{$resul=RegistrarContenedorM($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg);}


/////////////
if($_GET["acc"] == "m6")
{
include ("../MVC_Vista/Mistura/VerGrupo.php");
}
if($_GET["acc"] == "m7")
{
$dato=$_GET['dato'];
$obtenergrupo=ObtenergruporC($dato);
include ("../MVC_Vista/Mistura/UpdateGrupo.php");
}
if($_GET["acc"] == "m8")
{
	$id_grupo=$_REQUEST['hiddenField'];
    $nombre_grupo=strtoupper($_REQUEST['textfield']); 
	$descripcion_grupo =strtoupper($_REQUEST['textfield2']);
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$fechareg=date("Y-m-d");
	$resul=actualizargrupoC($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg);
 $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerGrupo.php");
}
if($_GET["acc"] == "m9")
{
include ("../MVC_Vista/Mistura/RegGrupo.php");
}
if($_GET["acc"] == "m10")
{
	$id_grupo='';
	$nombre_grupo=strtoupper($_REQUEST['textfield']); 
	$descripcion_grupo =strtoupper($_REQUEST['textfield2']);
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$fechareg=date("Y-m-d");
	$resul=RegistrargrupoC($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg);
 $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerGrupo.php");
}


function ListagrupoC()
{ return ListagrupoM();}
function ObtenergruporC($id)
{ return ObtenergruporM($id);}
function actualizargrupoC($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg)
{$resul=actualizargrupoM($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg);}
function RegistrargrupoC($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg)
{$resul=RegistrargrupoM($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg);}

//////



if($_GET["acc"] == "m11")
{
include ("../MVC_Vista/Mistura/VerUsuarios.php");
}
if($_GET["acc"] == "m12")
{
	$dato=$_GET['dato'];
	$obtenerusuario=ObtenerUsuarioC($dato);
include ("../MVC_Vista/Mistura/UpdateUsuarios.php");
}

if($_GET["acc"] == "m13")
{
	$id_usuario=$_REQUEST['hiddenField'];
    $nombre_usuario=strtoupper($_REQUEST['textfield']); 
	$stand_usuario =strtoupper($_REQUEST['textfield2']);
	$contacto_usuario =strtoupper($_REQUEST['textfield3']);
	$telefono1_usuario =strtoupper($_REQUEST['textfield4']);
	$telefono2_usuario =strtoupper($_REQUEST['textfield5']);
	$email_usuario =strtoupper($_REQUEST['textfield6']);
	$grupo_usuario_id_grupo =$_REQUEST['grupo'];
	$estado =$_REQUEST['selectestado'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$fechareg=date("Y-m-d");
	$resul=actualizarUsuarioC($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado);
 $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerUsuarios.php");
}
if($_GET["acc"] == "m14")
{
include ("../MVC_Vista/Mistura/RegUsuario.php");
}
if($_GET["acc"] == "m15")
{
	$id_usuario=$_REQUEST['codigo'];
    $nombre_usuario=strtoupper($_REQUEST['textfield']); 
	$stand_usuario =strtoupper($_REQUEST['textfield2']);
	$contacto_usuario =strtoupper($_REQUEST['textfield3']);
	$telefono1_usuario =strtoupper($_REQUEST['textfield4']);
	$telefono2_usuario =strtoupper($_REQUEST['textfield5']);
	$email_usuario =strtoupper($_REQUEST['textfield6']);
	$grupo_usuario_id_grupo =$_REQUEST['grupo'];
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$fechareg=date("Y-m-d");
	$resul=RegistrarUsuarioC($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado);
 $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerUsuarios.php");
}



function ListaUsuarioC()
{ return ListaUsuarioM();}
function ObtenerUsuarioC($id)
{ return ObtenerUsuarioM($id);}
function actualizarUsuarioC($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado)
{$resul=actualizarUsuarioM($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado);}
function RegistrarUsuarioC($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado)
{$resul=RegistrarUsuarioM($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado);}


if($_GET["acc"] == "m16")
{
include ("../MVC_Vista/Mistura/VerUniMed.php");
}
if($_GET["acc"] == "m17")
{
	
$dato=$_GET['dato'];
	$obtenermedida=ObtenerunidadmedidaC($dato);
include ("../MVC_Vista/Mistura/UpdateUniMed.php");
}

if($_GET["acc"] == "m18")
{
	$id_medida=$_REQUEST['hiddenField'];
	$nombre_medida=strtoupper($_REQUEST['textfield']); 
	$descripcion =strtoupper($_REQUEST['textfield2']);
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$resul=actualizarunidadmedidaC($id_medida  ,$nombre_medida  ,$descripcion ,$estado  , $usuarioreg);
 $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerUniMed.php");
}
if($_GET["acc"] == "m19")
{
include ("../MVC_Vista/Mistura/RegUniMed.php");
}
if($_GET["acc"] == "m20")
{
	$id_medida='';
	$nombre_medida=strtoupper($_REQUEST['textfield']); 
	$descripcion =strtoupper($_REQUEST['textfield2']);
	$estado =$_REQUEST['select'];
	$usuarioreg=$_REQUEST['hiddenField2'];
	$resul=RegistrarunidadmedidaC($id_medida  ,$nombre_medida  ,$descripcion ,$estado  , $usuarioreg);
 $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/VerUniMed.php");
}




function ListaunidadmedidaC()
{ return ListaunidadmedidaM();}
function ObtenerunidadmedidaC($id)
{ return ObtenerunidadmedidaM($id);}
function actualizarunidadmedidaC($id_medida  ,$nombre_medida  ,$descripcion ,$estado  , $usuarioreg  )
{$resul=actualizarunidadmedidaM($id_medida  ,$nombre_medida  ,$descripcion ,$estado  , $usuarioreg  );}
function RegistrarunidadmedidaC($id_medida  ,$nombre_medida  ,$descripcion ,$estado  , $usuarioreg  )
{$resul=RegistrarunidadmedidaM($id_medida  ,$nombre_medida  ,$descripcion ,$estado  , $usuarioreg  );}


///////////////
/*****************************/
/*** AUTO COMPLETAR       ***/
/****************************/
 if($_GET["acc"] == "at1") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedaclienteC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["id_usuario"];
		$nombre = $item["nombre_usuario"];
		$stand =$item["stand_usuario"];
		$contacto =$item["contacto_usuario"];
		$decod=$cod.'-'.$nombre;
		echo "$decod|$nombre|$stand|$contacto|$cod\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
 if($_GET["acc"] == "at2") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedapaquetM($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["id_paquete"];
	
		$decod=$cod;
		echo "$decod|$cod|\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}
if($_GET["acc"] == "m21")
{
echo $nombre_host = $_GET['mod'];
$resultadolista=ListaContenedorC($nombre_host);
include ("../MVC_Vista/Mistura/RegIngreso.php");
}
if($_GET["acc"] == "m22")
{
 $id_paquete='';
 $id_usuario   =$_POST['codi'];
 $id_empleado  =$_GET['udni'];

$modulo=$_POST['hiddenField'];
//para obtener hora del servidor
$obtenerhorafecha = ObtenerHorafechaServerC();
 if($obtenerhorafecha!=NULL)
{
	foreach ($obtenerhorafecha as $item)
	{
		$horaserv=$item["hora"];
		$fechaserv=$item["fecha"];
	}
}
//
 $fecha =$fechaserv;
 $hora =$horaserv;
 $check_ingreso= '1';
 $estado='A';
 $check_egreso='0';
//

/*$i = 1;
	do{*/
	for($i=0;$i<=100;$i++){
 	$detalle_paquete =$_POST['descripcion'.$i];
 	$fila_paquete  =$_POST['f'.$i];
 	$columna_paquete  =$_POST['c'.$i];
 	$id_medida  =$_REQUEST['um'.$i];
 	$id_contenedor  =$_POST['r'.$i];
		$estado_impresion='0';
		$estado_impresion_out='0';
 		if($detalle_paquete != "")
		{
RegistrarpaqueteC($id_paquete ,$detalle_paquete ,$fila_paquete  ,$columna_paquete  ,$id_medida  ,$id_contenedor  ,$id_usuario  ,$id_empleado  , $fecha , $hora , $check_ingreso,$check_egreso,	$estado_impresion,
		$estado_impresion_out , $estado,$modulo );
			
		}
		else
		{
			
		}
	/*}while($seguir);*/
	}
/*$mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";*/
//include ("../MVC_Vista/Mistura/ImpIngreso.php");
 // print "<script> <a href='../MVC_Vista/Mistura/print/print.php' target='_blank'> 
  include ("../MVC_Vista/Mistura/print/print1.php");
  
//include ("../MVC_Vista/Mistura/RegIngreso.php");
// $ImpresionFac=ImprimepreFacturacionC($Id);
 //include('../MVC_Vista/Caja/ImpPreFactura.php');	
//include ("../MVC_Vista/Mistura/VerUsuarios.php");
}

if($_GET["acc"] == "m23")
{
include ("../MVC_Vista/Mistura/RegEgreso.php");
}
if($_GET["acc"] == "m24")
{
	$dato=$_GET['id'];
	$obtnerusuario=ObtenerUsuarioC($dato);
	$Obtenerpaquetedaregreso=ObtenerpaquetedaregresoC($dato);
include ("../MVC_Vista/Mistura/RegEgreso.php");

}

if($_GET["acc"] == "m25")
{
	 $id_usuario  =$_POST['codi'];
 $id_empleado  = $_POST['hiddenField'];
	//para obtener hora del servidor
$obtenerhorafecha = ObtenerHorafechaServerC();
 if($obtenerhorafecha!=NULL)
{
	foreach ($obtenerhorafecha as $item)
	{
		$horaserv=$item["hora"];
		$fechaserv=$item["fecha"];
	}
}
//
	
	$i = 1;
	do{
		$fecha_egreso =$fechaserv;
		$hora_egreso =$horaserv;
		$id_empleado_out  =$id_empleado;
		$check_egreso ='1';
		//$estado_impresion ='0';
		//$estado_impresion_out='0'; 
		$id_usuario=$_POST['codi'];
		$id_paquete =$_POST['re'.$i];
		$descripcion=$_POST['descripcion'.$i];
 		if($descripcion != "")
		{
RegistrarpaqueteoutC($fecha_egreso ,$hora_egreso ,$id_empleado_out  ,$check_egreso ,$id_paquete ,$id_usuario );
			$i +=1;
			$seguir = true;
		}
		else
		{
			$seguir = false;
		}
	}while($seguir);
	 include ("../MVC_Vista/Mistura/print/print2.php");
/*$mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Mistura/logo.php");*/
}

function RegistrarpaqueteC($id_paquete ,$detalle_paquete ,$fila_paquete  ,$columna_paquete  ,$id_medida  ,$id_contenedor  ,$id_usuario  ,$id_empleado  , $fecha , $hora , $check_ingreso,$check_egreso,$estado_impresion,$estado_impresion_out , $estado,$modulo )
{$resul=RegistrarpaqueteM($id_paquete ,$detalle_paquete ,$fila_paquete  ,$columna_paquete  ,$id_medida  ,$id_contenedor  ,$id_usuario  ,$id_empleado  , $fecha , $hora , $check_ingreso,$check_egreso,$estado_impresion,$estado_impresion_out , $estado,$modulo );}
function RegistrarpaqueteoutC($fecha_egreso ,$hora_egreso ,$id_empleado_out  ,$check_egreso ,$id_paquete ,$id_usuario ){
	$resul= RegistrarpaqueteoutM($fecha_egreso ,$hora_egreso ,$id_empleado_out  ,$check_egreso ,$id_paquete ,$id_usuario );
	}
 function BusquedapaquetC($texto)
{
	return BusquedapaquetM($texto);	
}
 function BusquedaclienteC($texto)
{
	return BusquedaclienteM($texto);	
}
 function ObtenerHorafechaServerC()
{
	return ObtenerHorafechaServerM();	
}
 function ObtenerpaquetedaregresoC($id)
{
	return ObtenerpaquetedaregresoM($id);	
}

// REPORTES
if($_GET["acc"] == "m26")
{
include ("../MVC_Vista/Mistura/Reporte1.php");
}
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
$cod=$_REQUEST["textfield"];
$reporte=Reporte1C($cod);
include ("../MVC_Vista/Mistura/Reporte1.php");	 
}

if($_GET["acc"] == "m28")
{
include ("../MVC_Vista/Mistura/Reporte2.php");
}
if($_GET["acc"] == "m29")
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
$reporte=Reporte2C($cod);	
include ("../MVC_Vista/Mistura/Reporte2.php");
}
if($_GET["acc"] == "m30")
{include ("../MVC_Vista/Mistura/Reporte3.php");}
if($_GET["acc"] == "m31")
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
$sw=$_REQUEST["checkbox"];
$reporte=Reporte3C($cod,$sw);	
	
include ("../MVC_Vista/Mistura/Reporte3.php");
}




 function Reporte3C($id,$sw)
{
	return Reporte3M($id,$sw);	
}
 function Reporte2C($id)
{
	return Reporte2M($id);	
}
 function Reporte1C($id)
{
	return Reporte1M($id);	
}
?>