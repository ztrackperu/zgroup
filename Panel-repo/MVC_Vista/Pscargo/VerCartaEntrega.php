<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta De Entrega Forwarder</title>
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



<script type="text/javascript">
$().ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/PscargoC.php?acc=nombauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[0]);
	});
});
</script>

</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=ver2">
  <table width="586" border="0">
    <tr>
      <td colspan="3"><strong>IMPRESION DE CARTAS DE ENTREGA</strong></td>
    </tr>
    <tr>
      <td colspan="3"><hr /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>INGRESE FECHA  </strong></td>
      <td><strong>:</strong></td>
      <td>
      <input name="d_fecdcto" type="text" class="texto" id="d_fecdcto" readonly="readonly" required="required" value="<?php echo date("Y/m/d") ?>"/><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_fecdcto",
					ifFormat   : "%Y/%m/%d",
					button     : "Image1"
					  }
					);
		 </script></td>
    </tr>
    <tr>
      <td width="212"><strong>INGRESE NRO DE FW </strong></td>
      <td width="15"><strong>:</strong></td>
      <td width="345"><label for="fwd"></label>
        <input type="text" name="fwd" id="fwd" class="texto" />
      <strong>(EJEMPLO 89)</strong></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><em>Solo en caso que no figure nombre a quien va dirigido la carta:</em></td>
    </tr>
    <tr>
      <td><strong>Filtrar Nombre</strong></td>
      <td><strong>:</strong></td>
      <td>
      <input name="descripcion" type="text" class="texto" id="descripcion" size="45" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input type="submit" name="button" id="button" value="Imprimir" />
      <input type="reset" name="button2" id="button2" value="Restablecer" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>