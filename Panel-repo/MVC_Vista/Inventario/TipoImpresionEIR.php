<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFCC"><strong>IMPRESION EIR</strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCFF"><strong>TICKET</strong></td>
    </tr>
    <tr>
<td colspan="2" align="center"><a href="../MVC_Controlador/InventarioC.php?acc=impv2&eir=<?php echo $c_numeir; ?>&udni=<?php echo $_GET['udni']; ?>&equipo=<?php echo $c_idequipo; ?>"><img src="../images/ticket.png" width="82" height="87" /></a></td>
    </tr>
    <tr>
      <td width="92"><input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $c_numeir ?>" /></td>
      <td width="92"><input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $c_idequipo ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
<td colspan="2" align="center">
<a href="../MVC_Controlador/DigitalC.php?acc=frmfoto&equipo=<?php echo $c_nserie ?>&sw=1">Click aqui toma de foto</a>
</td>
  </tr>
  </table>
</form>
</body>
</html>