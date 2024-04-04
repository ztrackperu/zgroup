<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
</head>

<body>

<h2>LISTADO DE CUENTAS</h2>

<table width="400" border="1" bordercolor="#0066FF" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>1</td>
    <td bgcolor="#66FFFF">2</td>
    <td bgcolor="#66FFFF">3</td>
    <td bgcolor="#FFFF99">4</td>
    <td bgcolor="#FFFF99">5</td>
    <td bgcolor="#FFFF99">6</td>
    <td bgcolor="#FFFF99">7</td>
    <td>8</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Periodo</td>
    <td bgcolor="#66FFFF">Código de la Cuenta Contable</td>
    <td bgcolor="#66FFFF">Descripción de la Cuenta Contable</td>
    <td bgcolor="#FFFF99">Código del Plan de Cuenta</td>
    <td bgcolor="#FFFF99">Descripción del Plan de Cuentas</td>
    <td bgcolor="#FFFF99">6</td>
    <td bgcolor="#FFFF99">7</td>
    <td>Estado</td>
  </tr>
  
  <?php 
  
  	$reporte=$listaCuentas;
	$i=1;
	if($reporte!=""){
		$contador=01;
		
		foreach($reporte as $liveitem){
			$periodo=$ano.$mes.'01';	
			$dos=$liveitem['c_codcta'];
			$tres=utf8_encode($liveitem['c_descta']);
			$cuatro='02';
			$cinco='-';
			$seis='1';		
  
  ?>
  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $periodo ?></td>
    <td bgcolor="#66FFFF"><?php echo $dos; ?></td>
    <td bgcolor="#66FFFF"><?php echo $tres; ?></td>
    <td bgcolor="#FFFF99"><?php echo $cuatro; ?></td>
    <td bgcolor="#FFFF99"><?php echo $cinco; ?></td>
    <td bgcolor="#FFFF99"></td>
    <td bgcolor="#FFFF99"></td>
    <td><?php echo $seis; ?></td>
  </tr>
  
  
  <?php $i++;}
		
	}  ?>

</table>







</body>
</html>
