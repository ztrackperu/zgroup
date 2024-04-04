<?php 
function secuencialguiaM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_gen_nrocorrelativo_guia();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}

function registrarguiacabM(  $id_guia  ,$serie_guia  ,$nro_guia  ,$remitente  ,$destinatario  ,$transporte  , $conductor , $fectraslado  ,$usuarioreg  ,$fechareg  ,$obs , $nomempsub  , $rucempsub,$estado)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_graba_cabguia('".$id_guia												
  ."','".$serie_guia  
  ."','".$nro_guia  
  ."','".$remitente  
  ."','".$destinatario  
  ."','".$transporte  
  ."','".$conductor  
  ."','".$fectraslado  
  ."','".$usuarioreg  
  ."','".$fechareg  
  ."','".$obs 
  ."','".$nomempsub  
  ."','".$rucempsub
  ."','".$estado   
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}

function registrarguiadetM(    $id_guiadet ,$id_guiacab  , $detalle ,$estado  ,$usuarioreg ,$fechareg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_graba_detguia('".$id_guiadet												
  ."','".$id_guiacab  
  ."','".$detalle  
  ."','".$estado  
  ."','".$usuarioreg  
  ."','".$fechareg  
   
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}



function ListaclienteM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_lista_cliente();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function Obtenercliente2M($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_obtener_cliente_remitente_destinatario('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ImprimeguiaM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_imprime_guia('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizarclienteM($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_update_cliente('".$id_cliente												
  ."','".$nom_cli  
  ."','".$telefono_cli  
  ."','".$ruc_cli  
  ."','".$correo_cli  
  ."','".$contacto  
  ."','".$ubicacion_cli  
  ."','".$dir_cli  
  ."','".$estado_cli  
  ."','".$usuarioreg  
  ."','".$fechareg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarclienteM($id_cliente ,$nom_cli  ,$telefono_cli  ,$ruc_cli  ,$correo_cli  ,$contacto  ,$ubicacion_cli  ,$dir_cli  ,$estado_cli  ,$usuarioreg  ,$fechareg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_graba_cliente('".$id_cliente												
  ."','".$nom_cli  
  ."','".$telefono_cli  
  ."','".$ruc_cli  
  ."','".$correo_cli  
  ."','".$contacto  
  ."','".$ubicacion_cli  
  ."','".$dir_cli  
  ."','".$estado_cli  
  ."','".$usuarioreg  
  ."','".$fechareg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function ListachoferM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_lista_choferes();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerchoferM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_obtener_choferes('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizarchoferM($id_chofer  ,
  $nombre_chofer  ,
  $dni_chofer  ,
  $direccion  ,
  $telefono  ,
  $brevete  ,
  $estado  ,
  $usuarioreg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_update_chofer('".$id_chofer												
  ."','".$nombre_chofer  
  ."','".$dni_chofer  
  ."','".$direccion  
  ."','".$telefono  
  ."','".$brevete  
  ."','".$estado  
  ."','".$usuarioreg  
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarchoferM($id_chofer,$nombre_chofer,$dni_chofer,$direccion,$telefono,$brevete,$estado,$usuarioreg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_graba_chofer('".$id_chofer												
  ."','".$nombre_chofer  
  ."','".$dni_chofer  
  ."','".$direccion  
  ."','".$telefono  
  ."','".$brevete  
  ."','".$estado  
  ."','".$usuarioreg  
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function ListaunidadtrasporteM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_lista_unidadtrasporte();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerunidadtrasporteM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_obtener_unidadtrasporte('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizarunidadtrasporteM($id_unitras ,
  $tipo  ,
  $placa  ,
  $estado  ,
  $usuarioreg  ,
  $sw,$marca  ,
  $config  ,
  $certificadoinsp )
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_update_unidadtransporte('".$id_unitras												
  ."','".$tipo  
  ."','".$placa  
  ."','".$estado  
  ."','".$usuarioreg  
  ."','".$sw     ."','".$marca 
    ."','".$config 
	 ."','".$certificadoinsp 
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarunidadtrasporteM($id_unitras ,$tipo  ,$placa  ,$estado  ,$usuarioreg  ,$sw,$marca  ,
  $config  ,$certificadoinsp )
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_graba_unidadtrasporte('".$id_unitras												
  ."','".$tipo  
  ."','".$placa  
  ."','".$estado  
  ."','".$usuarioreg  
  ."','".$sw  
   ."','".$marca 
    ."','".$config 
	 ."','".$certificadoinsp 
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}

function BusquedaautounidadM($texto)
{
	require('cn/db_conexion.php');
	$sql="select id_unitras,tipo,placa,marca,config,certificadoinsp from unidadtrasporte where estado='1' and
concat(placa,' ',marca,' ',tipo) like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}
function BusquedaautoclienteM($texto)
{
	require('cn/db_conexion.php');
	$sql="select id_cliente,nom_cli,ruc_cli,dir_cli,
(SELECT nombre_depto FROM ubigeo where codigo_dpto=SUBSTRING(u.ubicacion_cli,1,2) limit 1) as dep_cli,
(SELECT nombre_prov FROM ubigeo where codigo_dpto=SUBSTRING(u.ubicacion_cli,1,2) and codigo_prov=SUBSTRING(u.ubicacion_cli,3,2) limit 1)as prov_cli,
(SELECT nombre_distrito FROM ubigeo where codigo_dpto=SUBSTRING(u.ubicacion_cli,1,2) and codigo_prov=SUBSTRING(u.ubicacion_cli,3,2) and codigo_distrito=SUBSTRING(u.ubicacion_cli,5,2))as dis_cli
from cliente as u where estado_cli='1' and
concat(nom_cli,' ',ruc_cli) like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}


function BusquedaautochoferM($texto)
{
	require('cn/db_conexion.php');
	$sql="select id_chofer,nombre_chofer,brevete from choferes where estado='1' and
 concat(nombre_chofer,' ',brevete) like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}

function BusquedaautoconceptoM($texto)
{
	require('cn/db_conexion.php');
	$sql="select id_concepto,des_concepto from conceptos where estado='1' and
des_concepto  like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}

?>