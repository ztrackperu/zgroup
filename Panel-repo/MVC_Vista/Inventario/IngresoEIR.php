<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
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
	$("#descripcion").autocomplete("../MVC_Controlador/InventarioC.php?acc=serieequipoauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[3]);
		$("#estado").val(data[4]);
			});
	
});
			
</script>

<body>
          <div class="column_left" align="center">
            <div class="header"> <span>REGISTRO DE EIR</span></div>
       			<span> <br class="clear"/>
   					<div class="content">
<table width="522" height="126" border="1" >
  <tr>
    <td height="23" colspan="3"><strong>Busque Equipo Para Generar EIR</strong></td>
    <td width="85" rowspan="3" align="center"><input type="reset" name="button2" id="button2" value="Generar EIR" /></td>
  </tr>
  <tr>
    <td width="97"><strong>Equipo</strong></td>
    <td width="220" height="23"><input type="text" name="descripcion" id="descripcion" /></td>
    <td width="92"><input type="text" name="estado" id="estado" /></td>
    </tr>
  <tr>
    <td width="97"><strong>Descripcion</strong></td>
    <td height="26" colspan="2"><input type="text" size="40" name="codigo" id="codigo" /></td>
    </tr>
  <tr>
    <td colspan="4" align="center"><strong><a href="#">Click Aqui Registro de Nuevo Equipo</a></strong></td>
  </tr>
</table>
</div>
</span>
</div>

</body>
</html>