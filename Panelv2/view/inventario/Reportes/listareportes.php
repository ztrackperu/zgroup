<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ReportesGuias</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="list-group">
  <a href="#" class="list-group-item active">
   REPORTE DE GUIAS
  </a>
  <a href="indexinv.php?c=inv07&a=VerReporteGuiaGeneral&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" class="list-group-item">Listado guias general</a>
  <a href="indexinv.php?c=inv07&a=VerReporteGuiadetallado&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" class="list-group-item">Listado guia detallado</a>
  <a href="indexinv.php?c=inv07&a=VerReporteListaEqSitu&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" class="list-group-item">Reporte de equipos por situacion</a>
<!--  <a href="#" class="list-group-item">Reporte Salida Equipos Post-Venta</a>-->
</div>
</form>
</body>
</html>