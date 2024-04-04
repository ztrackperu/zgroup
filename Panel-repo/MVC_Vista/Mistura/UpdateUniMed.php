<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if($obtenermedida!=NULL)
{
	foreach ($obtenermedida as $item)
	{
  $id_medida =$item['id_medida'];
  $nombre_medida =$item['nombre_medida'];
  $descripcion  =$item['descripcion'];
  $estado =$item['estado'];
  $usuarioreg =$item['usuarioreg'];
	
	}
}

?>
<html><head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<!--[if IE]>
	<link href="../css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="../js/excanvas.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript">
function valida_envia(){
	document.form1.submit();
	
	}
</script>


<title>Modificar Contenido Nosotros</title>
</head>

<body>
<form name="form1" id="form1" method="post" 
 action="../MVC_Controlador/MisturaC.php?acc=m18">
<table width="531" border="0">
  <tr>
    <td style="color:#039">MODIFICACION DATOS DE UNIDADES DE MEDIDAS</td>
  </tr>
</table>
<fieldset class="fieldset legend">
  <legend style="color:#C63">INGRESO DE DATOS</legend>
<table width="532" border="0">
  <tr>
    <td width="159">Nombre</td>
    <td width="518"><input name="textfield"  class="texto" type="text" id="textfield" value="<?=$nombre_medida?>" size="25">
      <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $id_medida?>">
      <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $_GET['udni'];?>"></td>
  </tr>
  <tr>
    <td width="159">descripcion</td>
    <td><input name="textfield2"  class="texto" type="text" value="<?=$descripcion?>" size="25"></td>
  </tr>
  <tr>
    <td width="159">Estado</td>
    <td><label for="select"></label>
      <select name="select" id="select">
        <option value="1">Activo</option>
        <option value="0">No Activo</option>
        </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><table border="0" align="center">
      <tr>
        <td><div class="buttons" align="center">
          <button type="button" class="positive" name="save" onClick="valida_envia()"> <img src="../images/icon_accept.png" alt=""/>Actualizar</button>
          <a href="../MVC_Controlador/WebC.php?acc=g1&udni=<?php echo $udni;?>" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a> </div></td>
      </tr>
    </table></td>
    </tr>
  
</table>
</fieldset>


</form>
<p>&nbsp;</p>
</body>
</html>