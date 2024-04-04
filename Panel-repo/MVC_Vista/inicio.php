<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sistema Intranet | Zgroup</title>
<link rel="shortcut icon" href="../images/favicon.ico" /> 
<link rel="bookmark icon" href="../images/favicon.ico" /> 
</head>
<?php 
foreach($usuario as $item)
{
	$id = $item["IdUsuario"];
	$usuario = $item["Usuario"];
	$idRol = $item["IdRol"];
	$rol = $item["Rol"];
	
	$udni=$item["udni"];
	$nombre = $item["Paterno"]." ".$item["Materno"].", ".$item["Nombres"];
	$mod=$item["clave2"];
	$sw=$item["clave3"];
	//echo $id." ".$usuario." ".$idRol." ".$rol." ".$nombre . " " . $udni;
}
?>
<frameset rows="92,*" cols="*" framespacing="0" frameborder="no"  border="0">
    <frame src="../MVC_Controlador/cabeceraC.php?udni=<?php echo $udni;?>&mod=<?php echo $mod;?>&sw=<?php echo $sw?>" name="encabezado" frameborder="No" scrolling="No" id="encabezado"/>
    <frameset cols="216,*" frameborder="no" border="0" framespacing="0">
        <frame src="../MVC_Controlador/menuC.php?udni=<?php echo $udni;?>&mod=<?php echo $mod;?>&sw=<?php echo $sw?>" name="indice" frameborder="No" scrolling="Auto" id="indice"/>
        <frame src="../MVC_Controlador/contenidoC.php?udni=<?php echo $udni;?>&mod=<?php echo $mod;?>&sw=<?php echo $sw?>" name="contenido" id="contenido"  title="Cabecera" />
    </frameset>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
