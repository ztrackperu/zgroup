<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
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
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
<script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ContabilidadC.php?acc=vercomp&udni=<?php echo $_GET['udni']; ?>">
  <table width="446" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3">Actualizacion Registros de Comprobantes</td>
    </tr>
    <tr>
      <td width="231">Fecha de Registro de Documentos</td>
      <td width="103"><input name="fecha"  type="text" class="texto" id="fecha" size="12" readonly="readonly"  value="<?php echo date('d/m/Y');?>"/>
      </label><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></label>&nbsp;</td>
      <td width="16">&nbsp;</td>
    </tr>
    <tr>
      <td>Año y Mes</td>
      <td><label for="anno"></label>
        <select name="anno" id="anno" class="combo texto">
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
        </select>

        -
        <label for="mes"></label>
        <select name="mes" id="mes" class="combo texto">
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Filtrar Por Asiento</td>
      <td><label for="c_codasi"></label>
        <select name="c_codasi" id="c_codasi" class="combo texto">
          <option value="015">015</option>
          <option value="016">016</option>
          <option value="019">019</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Numero de Comprobante</td>
      <td><label for="vou"></label>
      <input type="text" name="vou" id="vou"  class="texto" required/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><div class="buttons">
    <button type="submit" class="positive" name="save" onclick="guardar()">
        <img src="../images/icon_accept.png" alt=""/>
        Ir A Procesar
    </button>
    <button type="button" class="negative" name="cancel">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
    </button>
</div>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>