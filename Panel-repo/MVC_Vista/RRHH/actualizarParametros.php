<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.titulo1 {
	color: #F00;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<script type="text/javascript" src="../js/jquery.js"></script>   
<script type="text/javascript" src="../js/main.js"></script>
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script src="../js/jquery.html5form-1.5-min.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="../css/datepicker.css" />
<script type="text/javascript" src="../js/datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<style type="text/css">
textarea {
	resize: none;
}
</style>
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
</head>

<body>
<h3 class="titulo1">ACTUALIZAR PARAMETROS</h3>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=actualizaParametros&udni=<?php echo $_GET['udni']; ?>">
<p>&nbsp;</p>

<?php 
	$i = 1;
	if($resulta!=NULL)
	{
		foreach($resulta as $item)
		{
?>

<table width="323" border="1" bordercolor="#0000FF" cellpadding="0" cellspacing="0">
  <tr>
    <td width="77">Descripcion</td>
    <td width="240">
    <input type="hidden"  name="id_param"  class="texto" id="id_param" value="<?php echo $item["id_param"] ?>"   />
      <input type="text"  name="des_param"  class="texto" id="desc" value="<?php echo utf8_encode( $item["des_param"]) ?>"   />
      
    </td>
    </tr>
  <tr>
    <td>Periodo</td>
    <td>
   <?php  $fecha= vfecha(substr($item["periodo"],0,10)); ?>
      <input name="periodo"  class="texto" id="periodo" type="text" onkeyup = "this.value=formateafecha(this.value); "  value="<?php echo  $fecha; ?>" />
      <img src="../images/calendario.jpg" name="Im" id="Im" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "periodo",
					ifFormat   : "%d/%m/%Y",
					button     : "Im"
					  }
					);
		 </script>
      
    </td>
    </tr>
  
    <tr>
      <td>Valor</td>
      <td><input type="text"  name="val1_param"  class="texto" id="val1_param"   value="<?php echo $item["val1_param"] ?>"  /></td>
    </tr>
    <tr>
      <td  >Usuario</td>
      <td  ><input type="text"  name="usuario"  class="texto" id="usuario"   value="<?php echo $_GET['udni']?>"  readonly="readonly" /></td>
    </tr>
    <tr>
      <td height="65" >Observacion</td>
      <td  > 
      <textarea name="observacion" cols="26" rows="3" id="observacion"  ><?php echo utf8_encode($item["observacion"]) ?> </textarea>
      
      
      </td>
    </tr>
 
</table>

<?php }}   ?>
<input type="submit" name="button" id="button" value="Guardar" />

<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
</html>
