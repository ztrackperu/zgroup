<?php 
function ListarNosotrosM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_listar_nosotros();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerNosotrosM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_obtener_nosotros('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizar_nosotrosM($xid,$xtitulo,$xdescripcion,$xfoto ,$xestado,$xusuario)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_update_nosotros('".$xid
																	."','".$xtitulo
																	."','".$xdescripcion
																	."','".$xfoto
																	."','".$xestado
																	."','".$xusuario
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}

// formulario data de empresa

function ListardataM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_listas_data();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerdataM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_obtener_data('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizar_dataM($id ,$direccion,$telefono,$correo,$nextel,$rpm,$tel_informes,$resp_informes,$correo_informes, $tel_ventas,$resp_ventas,$correo_ventas, $estado, $usuario, $empresa)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_update_data('".$id
																	."','".$direccion
																	."','".$telefono
																	."','".$correo
																	."','".$nextel
																	."','".$rpm
																	."','".$tel_informes
																	."','".$resp_informes
																	."','".$correo_informes
																	."','".$tel_ventas
																	."','".$resp_ventas
																	."','".$correo_ventas
																	."','".$estado
																	."','".$usuario
																	."','".$empresa
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}


function ListarcategoriaM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_lista_categoria();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ListarsubcategoriaM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_lista_subcategoria();")or die("Error: ".    mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ListardetalleM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_lista_detalle();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerDetalleM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_obtener_detalle('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function registrar_detalleM($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det  , $estadodet , $usuariodet, $fecharegdet)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_registrar_detalle('".$id_detalle														
  ."','".$id_categoria  
  ."','".$id_subcategoria  
  ."','".$titulodet 
  ."','".$descripciondet 
  ."','".$foto1det 
  ."','".$estadodet 
  ."','".$usuariodet
  ."','".$fecharegdet."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function update_detalleM($id_detalle  ,$id_categoria  , $id_subcategoria  , $titulodet , $descripciondet , $foto1det , $estadodet , $usuariodet, $fecharegdet)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_update_detalle('".$id_detalle														
  ."','".$id_categoria  
  ."','".$id_subcategoria  
  ."','".$titulodet 
  ."','".$descripciondet 
  ."','".$foto1det 
  ."','".$estadodet 
  ."','".$usuariodet
  ."','".$fecharegdet
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}


function ObtenersubdetalleM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_obtener_subdetalle('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ListasubdetalleM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_lista_subdetalle();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function update_subdetalleM($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_update_subdetalle('".$idsubde														
  ."','".$titulo  
  ."','".$descripcion  
  ."','".$foto 
  ."','".$foto2 
  ."','".$estado 
  ."','".$usuarioreg 
  ."','".$fechareg	
  ."','".$id_cat	
  ."','".$id_subcat	
  ."','".$id_det																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function graba_subdetalleM($idsubde,$titulo ,$descripcion  ,$foto  ,$foto2  , $estado  ,$usuarioreg  ,$fechareg,$id_cat,$id_subcat,$id_det)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_web_graba_subdetalle('".$idsubde														
  ."','".$titulo  
  ."','".$descripcion  
  ."','".$foto 
  ."','".$foto2 
  ."','".$estado 
  ."','".$usuarioreg 
  ."','".$fechareg	
    ."','".$id_cat	
  ."','".$id_subcat	
  ."','".$id_det																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
?>