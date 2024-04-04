<?php
function Obtener_MenuM($idRol)
{
	require('cn/db_conexion.php');
    $resultado = mysqli_query($conexion, "call usp_MENU_Obtener('".$idRol."');")or die("Error: ".mysqli_error($conexion));
	while ($fila = mysqli_fetch_array($resultado))
	{
		$menu[] = $fila;
	}	
	mysqli_close($conexion);
	return $menu;
}
?>
