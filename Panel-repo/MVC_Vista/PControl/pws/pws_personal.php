<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {
	color: #000000;
	font-weight: bold;
}
.Estilo2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="Gpws_personal.php">
  <table width="552" border="0" align="center">
    <tr>
      <td colspan="2"><div align="center" class="Estilo1">MODIFICACIÓN  CLAVES DE CONTROL DE ASISTENCIA </div></td>
    </tr>
    <tr>
      <td width="139" class="textfieldValidState"><span class="Estilo2">INGRESE DNI:</span></td>
      <td width="403"><span id="sprytextfield1">
        <label>
        <input type="text" name="dni" id="dni" />
        </label>
      <span class="textfieldRequiredMsg">Ingrese DNI Correcto.</span></span></td>
    </tr>
    <tr>
      <td class="textfieldValidState"><span class="Estilo2">CLAVE ANTERIOR:</span></td>
      <td><span id="sprytextfield2">
        <label>
        <input type="password" name="pwsant" id="pwsant" />
        </label>
      <span class="textfieldRequiredMsg">Ingrese Clave anterior Correcto.</span></span></td>
    </tr>
    <tr>
      <td class="textfieldValidState"><span class="Estilo2">NUEVA CLAVE:</span></td>
      <td><span id="sprytextfield3">
        <label>
        <input type="password" name="pwsnuv" id="pwsnuv" />
        </label>
      <span class="textfieldRequiredMsg">Ingrese Nueva clase correcto</span></span></td>
    </tr>
    <tr>
      <td class="textfieldValidState"><span class="Estilo2">REPITA NUEVA CLAVE:</span></td>
      <td><span id="sprytextfield4">
        <label>
        <input type="password" name="pwsrep" id="pwsrep" />
        </label>
      <span class="textfieldRequiredMsg">Repita nueva clave </span></span></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center">
          <input type="submit" name="button" id="button" value="MODIFICAR CONTRASEÑA" />
          </div>
          <font color="#FF0000"></font>
      </label></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
</body>
</html>
