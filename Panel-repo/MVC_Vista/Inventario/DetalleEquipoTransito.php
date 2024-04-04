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
<table width="709" height="66" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="144" height="38" bgcolor="#CCCCCC">Nro Nota</td>
    <td width="133" bgcolor="#CCCCCC">Fecha Documento</td>
    <td width="118" bgcolor="#CCCCCC">Nro de Eir/guia</td>
    <td width="276" bgcolor="#CCCCCC">Otros Datos</td>
  </tr>
  <?php    $i = 1;
                    foreach($reporte as $item)
                    { ?>
  <tr>
    <td><?php echo $item["NT_NDOC"];?></td>
    <td><?php echo vfecha(substr($item["NT_FDOC"],0,10));?></td>
    <td><?php echo $item["NT_DOCR"];?></td>
    <td><?php echo $item["NT_OBS"];?></td>
  </tr>
  <?php }
  
  ?>
</table>
</body>
</html>