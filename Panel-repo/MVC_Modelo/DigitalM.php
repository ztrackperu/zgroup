<?php
function BuscarImagenM($nombreimg){
require('cn/db_conexion.php');
	$sql="select * FROM imagephp where nombre='$nombreimg'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function guardaimgM($anchura,$altura,$tipo,$ubicacion,$nombre,$descripcion,$fechaReg){
require('cn/db_conexion.php');
$sql="INSERT INTO imagephp (anchura,altura,tipo,ubicacion,nombre,descripcion,fechaReg) VALUES ('$anchura','$altura','$tipo','$ubicacion','$nombre','$descripcion','$fechaReg')";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}

function VerImagenesM($buscar){
require('cn/db_conexion.php');
	$sql="SELECT * FROM imagephp where nombre like '%$buscar%'  ORDER BY id desc";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
function eliminarimgM($id){
require('cn/db_conexion.php');
$sql="delete FROM imagephp where id='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}
?>