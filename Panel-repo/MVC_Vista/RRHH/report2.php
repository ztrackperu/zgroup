<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/estiloformulario.css" type="text/css" rel="stylesheet">
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
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<title>Documento sin título</title>

</head>

<body>

<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=veraistencia">
  <table width="457" border="0">
    <tr>
      <td> refrigerio inicio:</td>
      <td><label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" value="12:30" /></td>
    </tr>
    <tr>
      <td> refrigerio inicio:</td>
      <td><label for="textfield2"></label>
      <input name="textfield2" type="text" id="textfield2" value="13:00" /></td>
    </tr>
    <tr>
      <td> refrigerio fin:</td>
      <td><label for="textfield3"></label>
      <input name="textfield3" type="text" id="textfield3" value="13:30" /></td>
    </tr>
    <tr>
      <td> refrigerio fin:</td>
      <td><label for="textfield4"></label>
      <input name="textfield4" type="text" id="textfield4" value="14:30" /></td>
    </tr>
    <tr>
      <td>Ingreso inicio</td>
      <td><label for="textfield5"></label>
      <input name="textfield5" type="text" id="textfield5" value="08:00" /></td>
    </tr>
    <tr>
      <td>Ingreso inicio</td>
      <td><label for="textfield6"></label>
      <input name="textfield6" type="text" id="textfield6" value="08:30" /></td>
    </tr>
    <tr>
      <td>salida fin </td>
      <td><label for="textfield7"></label>
      <input name="textfield7" type="text" id="textfield7" value="17:30" /></td>
    </tr>
    <tr>
      <td>salida fin</td>
      <td><label for="textfield8"></label>
      <input name="textfield8" type="text" id="textfield8" value="20:00" /></td>
    </tr>
    <tr>
      <td>mes</td>
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
      <td>año</td>
      <td><label for="select"></label>
        <select name="select" id="select">
          <option value="2013">2013</option>
          <option value="2014" selected="selected">2014</option>
      </select></td>
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
      <td>Ver Asistencias</td>
      <td><input type="submit" name="button" id="button" value="Enviar" /></td>
    </tr>
  </table>
</form>

</body>
</html>