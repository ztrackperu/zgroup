<?php  
$coticrono=$_GET['coti'];
$cli=$_GET['cli'];
$codcli=$_GET['codcli'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">-->
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/custom_blue.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
	$("#hiddenField").autocomplete("../MVC_Controlador/cajaC.php?acc=clicautocrono", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#hiddenField").result(function(event, data, formatted) {
	$("#hiddenField").val(data[3]);
	$("#coti").val(data[3]);
	$("#cli").val(data[1]);
	$("#nom").val(data[2]);	
	});
});
function focu()
{
document.getElementById('hiddenField').focus();
	}
</script>

<title></title>
</head>

<body onload="focu()">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=vercronograma&udni=<?php echo $_GET['udni']; ?>">
   <div class="column_left" align="center">
     <div class="header"> <span><strong>ADMINISTRAR ALQUILERES</strong></span></div>
<table width="564" border="0" class="data">
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td width="203">Busque Cliente y/o Cotizacion :</td>
    <td width="327"><input name="hiddenField" type="text" id="hiddenField" value="<?php echo $coticrono; ?>" size="40" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="hidden" name="coti" id="coti" size="5" value="<?php echo $coticrono; ?>" />
      <input type="hidden" name="cli" id="cli" size="25" value="<?php echo $codcli; ?>"/>  <input name="nom" type="text" disabled="disabled" id="nom" size="70" readonly="readonly" style="border:none; text-align:center" value="<?php echo $cli ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Ver Cronograma Pago" /></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFCC">Solo filtra aquellos clientes que tienen generado su cronograma al momento de aprobar su cotizacion.</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#CCCCFF">Fecha Proceso
      <label for="fecproceso"></label>
      <input name="fecproceso" type="text" id="fecproceso" value="<?php echo $fecactual=date('d/m/Y'); ?>" size="10" readonly="readonly" />      <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecproceso",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script>
    </td>
  </tr>
</table>
</div>
</form>
</body>
</html>