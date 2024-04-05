<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="?c=01&a=Verfacturas&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
  <table width="489" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="3" scope="col">Generar Archivos Texto Sunat (Factura Electronica)</th>
    </tr>
    <tr>
      <td colspan="3">Ingrese un rango de fechas para exportar Facturas</td>
    </tr>
    <tr>
      <td width="161" height="33">Fecha Inicial (dd/mm/aaaa)</td>
      <td width="235" colspan="2"><label for="txtfinicio"></label>
      <input type="text" name="txtfinicio" id="txtfinicio" /></td>
    </tr>
    <tr>
      <td height="39">Fecha Final</td>
      <td colspan="2"><label for="txtffin"></label>
      <input type="text" name="txtffin" id="txtffin" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="submit" name="button" id="button" value="CONSULTAR FACTURAS" /></td>
    </tr>
  </table>
</form>
<p>******************************************************</p>
<form id="form2" name="form2" method="post" action="">
  <table width="1145" border="1">
    <tr>
      <th scope="col">Rango de Fecha Documentos</th>
      <th scope="col">Nro Documentos Generados</th>
      <th scope="col">Nro Documentos Procesados</th>
      <th scope="col">Nro Documentos Pendientes por Procesar Sunat</th>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
