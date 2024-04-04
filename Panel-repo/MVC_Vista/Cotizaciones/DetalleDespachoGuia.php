<?php 
foreach($reporte as $item){
	$guia=$item['guia'];
	$cliente=$item['c_nomdes'];	
	$fecha=$item['d_fecgui'];
	$equipo=$item['c_codprd'];
	}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>

<body>
<table width="533" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Equipo</td>
    <td><?php echo $equipo ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="130">Guia Remision</td>
    <td width="321"><?php echo $guia ?>&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td width="42">&nbsp;</td>
  </tr>
  <tr>
    <td>Cliente</td>
    <td><?php echo $cliente ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fecha Despacho</td>
    <td><?php echo substr($fecha,0,10) ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>