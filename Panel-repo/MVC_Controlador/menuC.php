<?php
//ini_set('error_reporting',0);//para xamp

require('../MVC_Modelo/menuM.php');
include("../MVC_Modelo/usuariosM.php");

$usuario = Obtener_UsuarioC($_GET["udni"]);
foreach($usuario as $item)
{
	$idRol = $item["IdRol"];
}
$menu = Obtener_MenuM($idRol);	
include("../MVC_Vista/menuV.php");

function Obtener_UsuarioC($udni)
{
	return Obtener_UsuarioM($udni);	
}
?>