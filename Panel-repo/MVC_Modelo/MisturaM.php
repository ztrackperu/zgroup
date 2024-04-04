<?php 
function ListaContenedor2M()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_lista_contenedor2();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ListaContenedorM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_lista_contenedor('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerContenedorM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_obtener_contenedor('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizarContenedorM($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_update_contenedor('".$id_contenedor
																	."','".$descripcion_contenedor
																	."','".$placa_contenedor
																	."','".$estado
																	."','".$usuarioreg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarContenedorM($id_contenedor ,$descripcion_contenedor ,$placa_contenedor ,$estado ,$usuarioreg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_graba_contenedor('".$id_contenedor
																	."','".$descripcion_contenedor
																	."','".$placa_contenedor
																	."','".$estado
																	."','".$usuarioreg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}



function ListagrupoM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_lista_grupousuario();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenergruporM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_obtener_grupousuario('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizargrupoM($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_update_grupousuario('".$id_grupo
																	."','".$nombre_grupo
																	."','".$descripcion_grupo
																	."','".$estado
																	."','".$usuarioreg
																	."','".$fechareg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrargrupoM($id_grupo  ,$nombre_grupo  , $descripcion_grupo ,$estado  , $usuarioreg  , $fechareg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_graba_grupousuario('".$id_grupo
																	."','".$nombre_grupo
																	."','".$descripcion_grupo
																	."','".$estado
																	."','".$usuarioreg
																	."','".$fechareg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}




function ListaUsuarioM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_lista_musuario();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerUsuarioM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_obtener_musuario('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizarUsuarioM($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_update_musuario('".$id_usuario
																	."','".$nombre_usuario
																	."','".$stand_usuario
																	."','".$contacto_usuario
																	."','".$telefono1_usuario
																	."','".$telefono2_usuario
																	."','".$email_usuario
																	."','".$grupo_usuario_id_grupo
																	."','".$usuarioreg
																	."','".$fechareg
																	."','".$estado
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarUsuarioM($id_usuario  ,$nombre_usuario  ,$stand_usuario  ,$contacto_usuario ,$telefono1_usuario  ,$telefono2_usuario  , $email_usuario  , $grupo_usuario_id_grupo , $usuarioreg  , $fechareg,$estado)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_graba_musuario('".$id_usuario
																	."','".$nombre_usuario
																	."','".$stand_usuario
																	."','".$contacto_usuario
																	."','".$telefono1_usuario
																	."','".$telefono2_usuario
																	."','".$email_usuario
																	."','".$grupo_usuario_id_grupo
																	."','".$usuarioreg
																	."','".$fechareg
																	."','".$estado
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}


function ListaunidadmedidaM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_lista_unidadmedida();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function ObtenerunidadmedidaM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_obtener_unidadmedida('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function actualizarunidadmedidaM($id_medida  ,$nombre_medida  ,$descripcion  ,$estado ,$usuarioreg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_update_unidadmedida('".$id_medida
																	."','".$nombre_medida
																	."','".$descripcion
																	."','".$estado
																	."','".$usuarioreg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarunidadmedidaM($id_medida  ,$nombre_medida  ,$descripcion  ,$estado ,$usuarioreg)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_graba_unidadmedida('".$id_medida
																	."','".$nombre_medida
																	."','".$descripcion
																	."','".$estado
																	."','".$usuarioreg
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function BusquedaclienteM($texto)
{
	require('cn/db_conexion.php');
	$sql="SELECT id_usuario,nombre_usuario,stand_usuario,contacto_usuario from musuario where estado='1' and
concat(id_usuario,' ',nombre_usuario) like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}
function RegistrarpaqueteM($id_paquete ,$detalle_paquete ,$fila_paquete  ,$columna_paquete  ,$id_medida  ,$id_contenedor  ,$id_usuario  ,$id_empleado  , $fecha , $hora , $check_ingreso,$check_egreso,$estado_impresion,$estado_impresion_out,  $estado,$modulo )
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_graba_paqueteIN('".$id_paquete
															 ."','".$detalle_paquete 
  ."','".$fila_paquete  
  ."','".$columna_paquete  
  ."','".$id_medida  
  ."','".$id_contenedor  
  ."','".$id_usuario  
  ."','".$id_empleado  
  ."','".$fecha 
  ."','".$hora 
  ."','".$check_ingreso 
  ."','".$check_egreso 
   ."','".$estado_impresion 
  ."','".$estado_impresion_out 
  ."','".$estado
  ."','".$modulo
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}
function RegistrarpaqueteoutM($fecha_egreso ,$hora_egreso ,$id_empleado_out  ,$check_egreso ,$id_paquete ,$id_usuario )
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_graba_paqueteOUT('".$fecha_egreso
															 ."','".$hora_egreso 
  																."','".$id_empleado_out  
																  ."','".$check_egreso  
															
																  ."','".$id_paquete  
																  ."','".$id_usuario  
																	."');")or die("Error: ".mysqli_error($conexion));
	return $resultado;
}


function ObtenerHorafechaServerM()
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_obtener_hora_fecha_servidor();")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}

function ObtenerpaquetedaregresoM($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_obtener_paquete_daregreso('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function Reporte1M($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_reporte1_estado_paquete('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function Reporte2M($id)
{
	require('cn/db_conexion.php');
	$resultado = mysqli_query($conexion, "call usp_mistura_reporte2_historial_usuario('".$id."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function Reporte3M($id,$sw)
{
	require('cn/db_conexion.php');
	
	$resultado = mysqli_query($conexion, "call usp_mistura_reporte3_historialinout('".$id."','".$sw."');")or die("Error: ".mysqli_error($conexion));

	while ($fila = mysqli_fetch_array($resultado))
	{
		$Nosotros[] = $fila;
	}	
	mysqli_close($conexion);
	return $Nosotros;
}
function BusquedapaquetM($texto)
{
	require('cn/db_conexion.php');
	$sql="SELECT * from mpaquete where id_paquete like '%$texto%'";

	 $resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	
	while ($fila = mysqli_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	mysqli_close($conexion);
	return $Paciente;
}
?>