<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<p></p>
<p><a href="../MVC_Controlador/cajaC.php?acc=repguia01&udni=<?php echo $_GET['udni'] ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE GUIAS SIMPLE</a></p>
<p><a href="../MVC_Controlador/cajaC.php?acc=repguia02&udni=<?php echo $_GET['udni'] ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE GUIAS DETALLADO</a></p>
<p><a href="../MVC_Controlador/InventarioC.php?acc=repinvm&udni=<?php echo $_GET['udni'] ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE STOCK MENSUAL</a></p>
<a href="../MVC_Controlador/cajaC.php?acc=repcot7&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE DE EQUIPOS POR SITUACION</a>
<p><a href="../MVC_Controlador/InventarioC.php?acc=repequimul&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE DE EQUIPOS MULTIPLES</a></p>
<p><a href="../MVC_Controlador/InventarioC.php?acc=repmovequi&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE DE MOVIMIENTOS DE EQUIPOS POR FECHA</a></p>
<p><a href="../MVC_Controlador/InventarioC.php?acc=repsituequi&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">REPORTE EIR SALIDA DE EQUIPOS ALQUILADOS/VENDIDOS</a></p>
<p>&nbsp;</p>
</body>
</html>