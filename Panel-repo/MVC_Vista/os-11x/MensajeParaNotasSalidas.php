<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<p>EL NRO DE ORDEN DE TRABAJO ES:<?php echo $c_numot ?></p>
<p>NOTA:</p>
<p>AL MOMENTO DE REALIZAR LA NOTA DE SALIDA DE INSUMOS SEGUIR ESTA INTRUCCION </p>
<p>-Generar la Orden de Servicio a cada proveedor con su tecnico</p>
<p>ejm. 10000101 tecnico 1</p>
<p>ejm 10000102 tecnico 2</p>
<p>&nbsp;</p>
<p>en la nota de salida colocar asi 999-101</p>
<a href="OrdenTrabajoC.php?acc=admot&mod=1&udni=<?= $_GET['udni'];?>&sw=1">Regresar a ordenes de trabajo</a>
</body>
</html>