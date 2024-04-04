<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zgroup </title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/formulario.css" type="text/css" rel="stylesheet">

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="815" height="120" border="1">
    <tr>
      <td align="center">REPORTE DE CONTABILIDAD</td>
    </tr>
    <tr>
      <td height="23">1.- <a href="../MVC_Controlador/ContabilidadC.php?acc=Ap01&udni=<?php echo $_GET['udni']; ?>">REPORTE 1</a></td>
    </tr>
    <tr>
      <td height="23">2.- <a href="../MVC_Controlador/ContabilidadC.php?acc=Ap02&udni=<?php echo $_GET['udni']; ?>">REPORTE 2</a></td>
    </tr>
    <tr>
      <td height="23">3.- <a href="../MVC_Controlador/ContabilidadC.php?acc=Ap03&udni=<?php echo $_GET['udni']; ?>">REPORTE INGRESOS / GASTOS</a></td>
    </tr>
    <tr>
      <td height="23">4.- <a href="../MVC_Controlador/ContabilidadC.php?acc=Ap04&udni=<?php echo $_GET['udni']; ?>">REPORTE FACTURAS X CLIENTE</a></td>
    </tr>
    <tr>
      <?php /*?><td height="23">2.- <a href="../MVC_Controlador/cajaC.php?acc=repcot1&udni=<?php echo $_GET['udni']; ?>">GRAFICO TOTAL COTIZACIONES</a></td>
    </tr>
    <tr>
      <td height="23">3.- <a href="../MVC_Controlador/cajaC.php?acc=repcot2&udni=<?php echo $_GET['udni']; ?>">GRAFICO TOTAL COTIZACIONES APROBADAS Y FACTURADAS</a></td>
    </tr>
    <tr>
      <td height="23">4.- <a href="../MVC_Controlador/cajaC.php?acc=repcot4&udni=<?php echo $_GET['udni']; ?>">COTIZACIONES APROBADAS</a></td>
    </tr>
    <tr>
      <td height="23">5.- <a href="../MVC_Controlador/cajaC.php?acc=repcot5&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">LISTADO DE COTIZACIONES GENERAL.</a></td>
    </tr>
    <tr>
      <td height="23">6.-<a href="../MVC_Controlador/cajaC.php?acc=repcot6&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">SITUACION DE EQUIPO APROBADOS</a></td>
    </tr>
    <tr>
      <td height="23">7.-<a href="../MVC_Controlador/cajaC.php?acc=repcot7&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">LISTA DE EQUIPOS POR SITUACION</a></td><?php */?>
    </tr>
  </table>
</form>
</body>
</html>