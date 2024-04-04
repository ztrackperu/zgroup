<?php
ini_set('error_reporting',0);//para xamp

function Validar_UsuarioM($user, $pwd)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_USUARIO_Validar('".$user."','".$pwd."');")or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$validar[] = $fila;
	}
	mysqli_close($conexion);
	return $validar;
}

function Obtener_UsuarioM($udni)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion,"CALL usp_USUARIO_Obtener('".$udni."');")or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
}

function ValidaM($sw,$val)
{
	require('cn/db_conexion.php');
	
//or  mac='$mac
	if($sw=='0'){
	$sql="SELECT nombrepc FROM accesoip where mac='$val'";
	}else{
	$sql="SELECT nombrepc FROM accesoip where ippublica='$val'";		
		}
			$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
}

function Valida2M($clave)
{
	require('cn/db_conexion.php');
	
//or  mac='$mac
	
	$sql="SELECT nombrepc FROM accesoip where clave='$clave'";
	
			$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$usuario[] = $fila;
	}	
	mysqli_close($conexion);
	return $usuario;
}


?>