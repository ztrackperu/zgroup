<?php 

function deletecombM($id){
	require('cn/db_conexion.php');
	$sql="delete from combustible where id='$id'";
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));
return $resultado;
}


function GrabaCombustibleM(  $id,$unidad  ,$fechacomb  ,$nrodcto  ,$Responsable  ,$ubicaciongrifo  ,$kilometraje  ,$recorrido  ,$promedio  ,$galones  ,$precio ,$estado  ,$usuarioreg  ,$fechareg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_logistica_graba_combustible('".$id
													  ."','".$unidad  
													  ."','".$fechacomb  
													  ."','".$nrodcto  
													  ."','".$Responsable  
													  ."','".$ubicaciongrifo  
													  ."','".$kilometraje  
													  ."','".$recorrido  
													  ."','".$promedio  
													  ."','".$galones  
													  ."','".$precio 
													  ."','".$estado  
													  ."','".$usuarioreg  
													  ."','".$fechareg
													  ."');")or die("Error: ".mysqli_error($conexion));				                                                      return $resultado;
}
function ObtenerCombustibleM($id)
{
require('cn/db_conexion.php');
$resultado = mysqli_query($conexion, "call usp_logistica_combustible_obtener('".$id."');")or die("Error: ".    mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
	$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function listarCombustibleM($id)
{
require('cn/db_conexion.php');
$resultado = mysqli_query($conexion, "call usp_logistica_lista_combustible('".$id."');")or die("Error: ".    mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
	$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function BusquedubicacionM($texto)
{
	require('cn/db_conexion.php');
	$sql="SELECT * from varios where GRUPO='UB' AND DESCRIPCION like '%$texto%'";
//DESCRIPCION
	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}
function BusquedaresponsableM($texto)
{
	require('cn/db_conexion.php');
	$sql="SELECT * from varios where GRUPO='RS' AND DESCRIPCION like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}
function BusquedaunidadM($texto)
{
	require('cn/db_conexion.php');
	$sql="select * from combustible where estado='1' and unidad like '%$texto%' order by  fechacomb DESC limit 1;";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}

function ListaCombustibleM($uni,$fini,$ffin)
{
	
	if ($uni=='1'){
		
		$sql="select id,unidad,round(promedio,2) as prome,kilometraje,fechacomb,nrodcto,Responsable,ubicaciongrifo,galones,precio from combustible where fechacomb between '$fini' and '$ffin' and estado='1' order by fechacomb asc";
		}else{
	$sql="select id,unidad,round(promedio,2) as prome,kilometraje,fechacomb,nrodcto,Responsable,ubicaciongrifo,galones,precio from combustible where unidad='$uni'
and fechacomb between '$fini' and '$ffin' and estado='1'  order by fechacomb asc";
	}
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion,$sql)or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}


function grafico1M($uni,$mes,$anio)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion,
	 "call usp_logistica_grafico1_combustible('".$uni."','".$mes."','".$anio."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
?>