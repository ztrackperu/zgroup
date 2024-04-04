<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=verreport">
  <table width="200" border="1">
    <tr>
      <td>Seleccione </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Empresa</td>
      <td><label for="select3"></label>
        <select name="select3" id="select3">
          <option value="1" selected="selected">Zgroup</option>
          <option value="2">PsCargo</option>
      </select></td>
    </tr>
    <tr>
      <td>Año</td>
      <td><label for="select"></label>
        <select name="select" id="select">
          <option value="2013">2013</option>
          <option value="2014" selected="selected">2014</option>
      </select></td>
    </tr>
    <tr>
      <td>Mes</td>
      <td><label for="select2"></label>
        <select name="select2" id="select2">
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7" selected="selected">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
      </select></td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="Enviar" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>



</body>
</html>