
<?php
require('../MVC_Modelo/menuM.php');
include("../MVC_Modelo/usuariosM.php");
require('../MVC_Modelo/CajaM.php');


$usuario = Obtener_UsuarioC($_GET["udni"]);
foreach($usuario as $item)
{
	$idRol = $item["IdRol"];
}
$menu = Obtener_MenuM($idRol);	
//include("../MVC_Vista/contenidoV.php?");


function Obtener_UsuarioC($udni)
{
	return Obtener_UsuarioM($udni);	
}


$dni=$_GET['udni'];
$sw=$_GET['sw'];
if($sw=='1'){
$reporte=AlertaAvisoFacturarM();
include("../MVC_Vista/RepCotFac.php");
}elseif($sw=='2'){
$reporte=AlertaAvisoCotiAproM();
include("../MVC_Vista/RepCotAprob.php");
}else{
include("../MVC_Vista/contenidoV.php");
}

 
?>