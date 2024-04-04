<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Orden de Compra</title>
	
      
</head>
<body>

<h3>REPORTES PSCARGO</h3>

   <p><a style="text-decoration:none" href="../MVC_Controlador/PscargoC.php?acc=ListarForwarder&udni=<?php echo $_GET['udni'] ?>">1. REPORTE FORWARDER DETALLADO</a></p>
   <p><a style="text-decoration:none" href="../MVC_Controlador/PscargoC.php?acc=frmprofit&udni=<?php echo $_GET['udni'] ?>">2. REPORTE DE PROFIT X FORWARDER</a></p>
      <p><a style="text-decoration:none" href="../MVC_Controlador/PscargoC.php?acc=repgastotesoria&udni=<?php echo $_GET['udni'] ?>">3. REPORTE GASTOS TESORERIA</a></p>
  <p><a style="text-decoration:none" href="../MVC_Controlador/PscargoC.php?acc=repingtesoria&udni=<?php echo $_GET['udni'] ?>">3. REPORTE INGRESOS TESORERIA</a></p>
</body>
</html>