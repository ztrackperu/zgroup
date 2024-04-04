<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>

<script languaje="javascript">
function recarga_padre_y_cierra_ventana(){
window.opener.location.reload();
//parent.opener.document.formElem.location.reload();
window.close();
//parent.window.close();

}
</script>
</head>
<body>

<form id="form1" name="form1" method="post" action="">

<fieldset class="fieldset legend">
   
  <legend style="color:#03C"><strong>Datos del Transportista</strong></legend>
  <table width="753">
  <tr>
    <td width="105" bgcolor="#FFFFFF"><strong>Empresa</strong></td>
    <td bgcolor="#FFFFFF"><label for="empresa"></label>
      <input name="empresa" type="text" id="empresa" size="35"  class="texto"/></td>
    <td bgcolor="#FFFFFF"> <strong>Ruc
        <label for="ructransporte"></label>
    </strong></td>
    <td bgcolor="#FFFFFF"><input name="ructransporte" type="text" id="ructransporte" size="12" class="texto" /></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Placa Vehiculo</strong></td>
    <td width="210" bgcolor="#FFFFFF"><input type="text" name="placa" id="placa" class="texto" /></td>
    <td width="169" bgcolor="#FFFFFF"><strong>Mtc</strong></td>
    <td width="249" bgcolor="#FFFFFF"><input type="text" name="mtc" id="mtc" class="texto"/></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Chofer</strong></td>
    <td bgcolor="#FFFFFF"><input name="chofer" type="text" class="texto" id="chofer" size="30"/></td>
    <td bgcolor="#FFFFFF"><strong>Licencia</strong></td>
    <td bgcolor="#FFFFFF"><input type="text" name="licencia" id="licencia" class="texto"/></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Movil Chofer</strong></td>
    <td bgcolor="#FFFFFF"><input type="text" name="movilchofer" id="movilchofer" class="texto"/></td>
    <td bgcolor="#FFFFFF"><strong>Cord. de Transporte</strong></td>
    <td bgcolor="#FFFFFF"><input type="text" name="coordinador" id="coordinador" class="texto"/></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Observaciones</strong></td>
    <td colspan="3" bgcolor="#FFFFFF"><input name="obst" type="text" id="obst" size="85" class="texto"/></td>
    </tr>
  <tr>
    <td colspan="4" bgcolor="#FFFFFF"><label for="obst"></label>
      <hr /></td>
    </tr>
  <tr>
    <td height="31" colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="Grabar" /> <input type="reset" name="button2" id="button2" value="Limpiar" /> <input type="button" name="button3" id="button3" value="Botón" onclick="window.opener.location.reload(); window.close();"/></td>
    </tr>
    </table>

</fieldset>
</form>
</body>
</html>