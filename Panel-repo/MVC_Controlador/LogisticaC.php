<?php  require('../MVC_Modelo/LogisticaM.php');require('../php/Funciones/Funciones.php');
if($_GET["acc"] == "ET1")
{
include ("../MVC_Vista/Logistica/estamostrabajando.php");
}
if($_GET["acc"] == "m1")
{
include ("../MVC_Vista/Logistica/VerCliente.php");
}
if($_GET["acc"] == "m2")
{
	
$dato=$_GET['dato'];
	$obtenercliente=ObtenerclienteC($dato);
include ("../MVC_Vista/Logistica/UpdateCliente.php");
}
if($_GET["acc"] == "m3")
{
include ("../MVC_Vista/Logistica/RegCliente.php");
}
if($_GET["acc"] == "m4")
{
  $id_cliente ='';
  $nom_cli   =strtoupper($_REQUEST['textfield']);
  $telefono_cli   =strtoupper($_REQUEST['textfield2']);
  $ruc_cli   =strtoupper($_REQUEST['textfield3']);
  $correo_cli   =strtoupper($_REQUEST['textfield4']);
  $contacto   =strtoupper($_REQUEST['textfield5']);
  $ubicacion_cli =$_REQUEST['cmbDep'].$_REQUEST['cmbPro'].$_REQUEST['cmbDist'];  
  $dir_cli  =strtoupper($_REQUEST['textfield8']);
  $estado_cli  ='1';
  $usuarioreg  =$_GET['udni'];
  $fechareg =date("Y-m-d");
  $resul=RegistrarclienteC($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg);
   $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Logistica/VerCliente.php");
  
}

if($_GET["acc"] == "m5")
{
  $id_cliente =$_REQUEST['hiddenField'];
  $nom_cli   =strtoupper($_REQUEST['textfield']);
  $telefono_cli   =strtoupper($_REQUEST['textfield2']);
  $ruc_cli   =strtoupper($_REQUEST['textfield3']);
  $correo_cli   =strtoupper($_REQUEST['textfield4']);
  $contacto   =strtoupper($_REQUEST['textfield5']);
  $ubicacion_cli =$_REQUEST['cmbDep'].$_REQUEST['cmbPro'].$_REQUEST['cmbDist'];  
  $dir_cli  =strtoupper($_REQUEST['textfield8']);
  $estado_cli  ='1';
  $usuarioreg  =$_GET['udni'];
  $fechareg =date("Y-m-d");
  $resul=actualizarclienteC($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg);
   $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";
include ("../MVC_Vista/Logistica/VerCliente.php");
  
}


function ListaclienteC()
{ return ListaclienteM(); }
function ObtenerclienteC($id)
{ return ObtenerclienteM($id); }
function RegistrarclienteC($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg)
{$resul=RegistrarclienteM($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg);}
function actualizarclienteC($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg)
{$resul=actualizarclienteM($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg);}
if($_GET["acc"] == "m6")
{
include ("../MVC_Vista/Logistica/VerChoferes.php");
}
if($_GET["acc"] == "m7")
{$dato=$_GET['dato'];
	$obtenerchofer=ObtenerchoferC($dato);
include ("../MVC_Vista/Logistica/UpdateChoferes.php");
}

if($_GET["acc"] == "m8")
{
include ("../MVC_Vista/Logistica/RegChoferes.php");
}
if($_GET["acc"] == "m9")
{
  $id_chofer ='';
  $nombre_chofer   =strtoupper($_REQUEST['textfield']);
  $dni_chofer   =strtoupper($_REQUEST['textfield2']);
  $direccion   =strtoupper($_REQUEST['textfield3']);
  $telefono   =strtoupper($_REQUEST['textfield4']);
  $brevete   =strtoupper($_REQUEST['textfield5']);
  $estado  =$_REQUEST['select'];
  $usuarioreg  =$_GET['udni'];
  
  $resul=RegistrarchoferC($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg);
   $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";

include ("../MVC_Vista/Logistica/VerChoferes.php");
}
if($_GET["acc"] == "m10")
{
  $id_chofer =$_REQUEST['hiddenField'];
  $nombre_chofer   =strtoupper($_REQUEST['textfield']);
  $dni_chofer   =strtoupper($_REQUEST['textfield2']);
  $direccion   =strtoupper($_REQUEST['textfield3']);
  $telefono   =strtoupper($_REQUEST['textfield4']);
  $brevete   =strtoupper($_REQUEST['textfield5']);
  $estado  =$_REQUEST['select'];
  $usuarioreg  =$_GET['udni'];
  
  $resul=actualizarchoferC($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg);
   $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";

include ("../MVC_Vista/Logistica/VerChoferes.php");
}
function ListachoferC()
{ return ListachoferM(); }
function ObtenerchoferC($id)
{ return ObtenerchoferM($id); }
function RegistrarchoferC($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg)
{$resul=RegistrarchoferM($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg);}
function actualizarchoferC($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg)
{$resul=actualizarchoferM($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg);}




if($_GET["acc"] == "m11")
{
include ("../MVC_Vista/Logistica/VerUnidadTransp.php");
}
if($_GET["acc"] == "m12")
{$dato=$_GET['dato'];
	$obtenerchofer=ObtenerunidadtrasporteC($dato);
include ("../MVC_Vista/Logistica/UpdateUnidadTransp.php");
}

if($_GET["acc"] == "m13")
{
include ("../MVC_Vista/Logistica/RegUnidadTransp.php");
}

if($_GET["acc"] == "m14")
{
  $id_unitras ='';
  $tipo    =$_REQUEST['select2'];
  $placa    =strtoupper($_REQUEST['textfield']);
    $marca    =$_REQUEST['select3'];;
	  $config    =strtoupper($_REQUEST['textfield2']);
	    $certificadoinsp    =strtoupper($_REQUEST['textfield3']);
  $estado  =$_REQUEST['select'];
  $usuarioreg  =$_GET['udni'];
  $sw='1';
  $resul=RegistrarunidadtrasporteC($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp);
   $mensaje="Datos Registrados Correctamente";
  print "<script>alert('$mensaje')</script>";

include ("../MVC_Vista/Logistica/VerUnidadTransp.php");
}
if($_GET["acc"] == "m15")
{
  $id_unitras =$_REQUEST['hiddenField'];
  $tipo    =$_REQUEST['select2'];
  $placa    =strtoupper($_REQUEST['textfield']);
   $marca    =$_REQUEST['select3'];;
	  $config    =strtoupper($_REQUEST['textfield2']);
	    $certificadoinsp    =strtoupper($_REQUEST['textfield3']);
  $estado  =$_REQUEST['select'];
  $usuarioreg  =$_GET['udni'];
  $sw='1';
  $resul=actualizarunidadtrasporteC($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp);
   $mensaje="Datos Actualizados Correctamente";
  print "<script>alert('$mensaje')</script>";

include ("../MVC_Vista/Logistica/VerUnidadTransp.php");
}

function ListaunidadtrasporteC()
{ return ListaunidadtrasporteM(); }
function ObtenerunidadtrasporteC($id)
{ return ObtenerunidadtrasporteM($id); }
function RegistrarunidadtrasporteC($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp)
{$resul=RegistrarunidadtrasporteM($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp);}
function actualizarunidadtrasporteC($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp)
{$resul=actualizarunidadtrasporteM($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp);}



if($_GET["acc"] == "m16")
{
include ("../MVC_Vista/Logistica/RegGuia.php");
}
///////////////
/*****************************/
/*** AUTO COMPLETAR       ***/
/****************************/
 if($_GET["acc"] == "at1") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = Busquedaautoclientec($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["id_cliente"];
		$nombre = $item["nom_cli"];
		$ruc =$item["ruc_cli"];
		$dir =$item["dir_cli"].' - '.$item["dis_cli"].' - '.$item["prov_cli"].' - '.$item["dep_cli"];
		$decod=$cod.'-'.$nombre;
		echo "$decod|$nombre|$ruc|$dir|$cod\n";
		//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}


if($_GET["acc"] == "at2") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedaautounidadC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["id_unitras"];
		$tipo= $item["tipo"];
		$marca = $item["marca"];
		$placa =$item["placa"];
		$conf =$item["config"];
		$cert =$item["certificadoinsp"];
		$decod=$placa.'-'.$tipo.'-'.$marca;
		echo "$decod|$cod|$marca|$placa|$conf|$cert|$tipo\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}


if($_GET["acc"] == "at3") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedaautochoferC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["id_chofer"];
		$nombre = $item["nombre_chofer"];
		$brevete =$item["brevete"];
		
		$decod=$cod.'-'.$nombre;
		echo "$decod|$cod|$nombre|$brevete\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

if($_GET["acc"] == "at4") // MOSTRAR: Formulario Modificar Registro
{
 $texto =strtoupper($_REQUEST["q"]);
 $obtenercli = BusquedaautoconceptoC($texto);
 if($obtenercli!=NULL)
{
	foreach ($obtenercli as $item)
	{
		$cod=$item["id_concepto"];
		$nombre = $item["des_concepto"];
		
		
		$decod=$cod.'-'.$nombre;
		echo "$decod|$nombre|$cod\n";
				//0		1		2	array
		//NOTA: la primara variable esta concatenado el $paterno , cada uno de ellos formar un arrar 
	}
}
	
}

if($_GET["acc"] == "g1") // MOSTRAR: Formulario Modificar Registro
{
	$secuencia=secuencialguiaC();
//$secuencialfac = $secuencia[0][0];
	if($secuencia!=NULL)
    {
	foreach ($secuencia as $item)
	{
	$secuencialguia = $item["guia"];
	}
    }
  $id_guia=$secuencialguia;
  $serie_guia  =$_REQUEST['select'];
  $nro_guia  =$_REQUEST['textfield16'];
  $remitente =$_REQUEST['codi'];
  $destinatario =$_REQUEST['codi2']; 
  $transporte  =$_REQUEST['textfield3'];
  $conductor  =$_REQUEST['textfield7'];
  $fectraslado =gfecha( $_REQUEST['textfield6']);
  $usuarioreg  =$_GET['udni'];
  $fechareg  =date("Y-m-d");
  $obs =$_REQUEST['textfield12'];
  $nomempsub  =$_REQUEST['textfield13'];
  $rucempsub =$_REQUEST['textfield15'];
  $estado='A';
  registrarguiacabC($id_guia  ,$serie_guia  ,$nro_guia  ,$remitente  ,$destinatario  ,$transporte  , $conductor , $fectraslado  ,$usuarioreg  ,$fechareg  ,$obs , $nomempsub  , $rucempsub,$estado);
$i = 1;
  $id_guiadet='';
  $id_guiacab=$id_guia;
  $estado ='1';
  $usuarioreg =$_GET['udni'];
  $fechareg =date("Y-m-d");
	do{
 	$detalle =$_POST['descripcion'.$i];
 		if($detalle != "")
		{
registrarguiadetC($id_guiadet ,$id_guiacab  , $detalle ,$estado  ,$usuarioreg ,$fechareg);
			$i +=1;
			$seguir = true;
		}
		else
		{
			$seguir = false;
		}
	}while($seguir);  
 //$mensaje="Datos Registrados Correctamente";
  
  
  $imprimeguia=ImprimeguiaC($id_guia);
  $impremi=Obtenercliente2C($remitente);
  $impdest=Obtenercliente2C($destinatario);
  
include ("../MVC_Vista/Logistica/ImprimirGuia.php");  
//include ("../MVC_Vista/Logistica/print/imprimirguia.php");  
	
	}
function ImprimeguiaC($id)
{ return ImprimeguiaM($id); }
function Obtenercliente2C($id)
{ return Obtenercliente2M($id); }
function secuencialguiaC()
{return secuencialguiaM(); }
function registrarguiacabC($id_guia  ,$serie_guia  ,$nro_guia  ,$remitente  ,$destinatario  ,$transporte  , $conductor , $fectraslado  ,$usuarioreg  ,$fechareg  ,$obs , $nomempsub  , $rucempsub,$estado)
{$resul=registrarguiacabM($id_guia  ,$serie_guia  ,$nro_guia  ,$remitente  ,$destinatario  ,$transporte  , $conductor , $fectraslado  ,$usuarioreg  ,$fechareg  ,$obs , $nomempsub  , $rucempsub,$estado);}

function registrarguiadetC($id_guiadet ,$id_guiacab  , $detalle ,$estado  ,$usuarioreg ,$fechareg)
{$resul=registrarguiadetM($id_guiadet ,$id_guiacab  , $detalle ,$estado  ,$usuarioreg ,$fechareg);}


 function BusquedaautoconceptoC($texto)
{
	return BusquedaautoconceptoM($texto);	
}
 function Busquedaautoclientec($texto)
{
	return BusquedaautoclienteM($texto);	
}
 function BusquedaautounidadC($texto)
{
	return BusquedaautounidadM($texto);	
}
 function BusquedaautochoferC($texto)
{
	return BusquedaautochoferM($texto);	
}
?>