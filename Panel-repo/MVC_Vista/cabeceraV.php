 <?php require('../php/Funciones/Funciones.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>INTRANET | ZGROUP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="../js/hide_menu.js"></script>

<link href="../css/menu.css" rel="stylesheet" type="text/css" />
</head>
	
<body>
<div id="hit_area" onmouseover="toggleDown();">
<?php foreach($usuario as $item){ ?>
<table border="0">
<tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle" ><img src="../images/Usuarios/<?php echo $item["Usuario"];?>.jpg" width="70" height="81" /></td>
    <td>&nbsp;</td>
    <td colspan="2" align="left" valign="middle">
        <font color="#FFFFFF"><strong>
            DNI:<?php echo $udni=$item["udni"];?><br />
            Nombre:<?php echo $item["Paterno"]." ".$item["Materno"].", ".$item["Nombres"];?>
            <?php echo $item["clave2"];?><br/>
            Conectado Desde=><?php  // Terminal(); ?>
        </strong></font>
	</td>
</tr>
</table>
<?php }?>
</div>
   <div id="menu_holder">
      <div id="nav">
           <ul>
           <li><a href="http://www.zgroup.com.pe" target="_blank" >Web Zgroup</a></li>
           <li><a href="http://ww1.sunat.gob.pe/cl-ti-itmrconsruc/jcrS00Alias" title="Sunat" target="_blank" >Ruc Sunat</a></li>
           <li><a href="http://www.camaralima.org.pe/" target="_blank" >CCL</a></li>
           <li><a href="http://www.bascperu.org/" target="_blank" >Basc</a></li>
           <li><a href="http://www.gmail.com/" target="_blank" >Gmail</a></li>
           <li><a href="../MVC_Controlador/UsuarioC.php?acc=login"  target="_parent">Cerrar</a></li>
           </ul> 
      </div>
</div>
</body>
</html>
