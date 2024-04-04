<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />-->
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/formulario.css" type="text/css" rel="stylesheet">-->
<title>Ordenes Trabajo</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=ver&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"><strong>PROCESO DE ENTRADA Y SALIDA DE EQUIPOS EXISTENTE</strong></div>
  <table width="479" height="30" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td width="123" align="center"><input type="submit" name="tipo" id="tipo" value="INGRESO" /></td>
      <td width="133" align="center"><input type="submit" name="tipo" id="tipo" value="SALIDA" /></td>
    </tr>
  </table>
  </div>
  
</form>
</P>
<form action="" method="post">
  <div class="column_left">
    <div class="header"><strong>PROCESO PARA EL INGRESO DE EQUIPOS RECIEN COMPRADOS</strong></div>
<table width="479" border="0">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><a href="../MVC_Controlador/InventarioC.php?acc=ingnewequipo">en proceso de actualizacion </a></td>
  </tr>
  </table>
</div>
</form>
</body>
</html>
