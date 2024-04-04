
<?php
include("../MVC_Modelo/usuariosM.php");

$usuario = Obtener_UsuarioC($_GET["udni"]);
include("../MVC_Vista/cabeceraV.php");

function Obtener_UsuarioC($udni)
{
	return Obtener_UsuarioM($udni);	
}
?>