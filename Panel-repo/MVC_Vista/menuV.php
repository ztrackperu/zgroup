<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 
<!-- Website Title --> 
<title>INTRANET | ZGROUP</title>

<!-- Meta data for SEO -->
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Template stylesheet -->
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<!-- Jquery and plugins -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../js/hint.js"></script>
<script type="text/javascript" src="../js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../js/custom_blue.js"></script>
</head>
<?php
$udni = $mod = $sw = "";
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

function AgregarHijos($MenuN, $h_IdMenu, $h_Nombre, $h_URL, $h_Icono,$udni,$mod,$sw)
{   
	$cad .= "<ul>";
	foreach($MenuN as $itemN) 
    {
		if($itemN["IdPadre"] == $h_IdMenu and $itemN["IdMenu"] != $itemN["IdPadre"])
		{
			$cad .= "<li><a href='".$itemN["URL"]."&udni=".$udni."&mod=".$mod."&sw=".$sw."' target='contenido'>".$itemN["Nombre"]."</a></li>";
			AgregarHijos($MenuN, $itemN["IdMenu"], $itemN["Nombre"], $itemN["URL"], $itemN["Icono"],$udni,$mod,$sw);
		}
	}
	$cad .= "</ul>";
	return $cad;
}
?>
<body>
<div id="left_menu">
 
    <ul id="main_menu">
    <li>
    	<a href="login_blue.html"><img src="../images/icon_home.png" alt="Home"/>Menú Principal.</a>
	</li>
    <?php 
	foreach($menu as $item) 
    {
        if($item["IdMenu"] == $item["IdPadre"])
        {
    ?>
            <li>
                <a id="menu_pages" href="">
                    <img src="<?php echo $item["Icono"];?>" width="18" height="18" alt="Pages"/><?php echo $item["Nombre"]?>
                </a>
        <?php 
			echo AgregarHijos($menu, $item["IdMenu"], $item["Nombre"], $item["URL"], $item["Icono"],$udni,$mod,$sw);
        }
        ?>
        </li>
    <?php 
	} 
	?>
            
    </ul>
    <br class="clear"/>
    <!-- Begin left panel calendar -->
    <div id="calendar"></div>
    <!-- End left panel calendar -->
</div>


</body>
</html>
<!--
<li>
    <a href="login_blue.html"><img src="../images/icon_home.png" alt="Home"/>Menú Principal</a>
</li>
<li> 
	<a href=""><img src="../images/icon_posts.png" alt="Posts"/>Reporte</a>
    <ul>
        <li><a href="Emergencia/emergenciaV.php"  target="contenido">Registro X Emergencia</a></li>
        <li><a href="">Edit Post</a></li>
        <li><a href="">Delete Post</a></li>
    </ul>
</li>
<li>
	<a href=""><img src="../images/Reportes.png" alt="Media"/>Estadística</a>
	<ul>
        <li><a href="">Add new Media</a></li>
        <li><a href="">Edit Media</a></li>
        <li><a href="">Delete Media</a></li>
	</ul>
</li>
<li>
	<a href=""><img src="../images/icon_users.png" alt="Users"/>Otros</a>
   	<ul>
        <li><a href="">Add new Users</a></li>
        <li><a href="">Edit Users</a></li>
        <li><a href="">Delete Users</a></li>
    </ul>
</li>
 -->