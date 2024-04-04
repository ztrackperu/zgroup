<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />


<title>Documento sin título</title>
</head>
<script language="javascript">
function evia(){
	document.getElementById("form1").submit();
	
	}
</script>
<body onload="">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=rep01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
<div class="column_left">
 <div class="header"><strong>LISTA DE DERIVACIONES ATENDIDOS</strong></div>
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center">
    <tr>
      <td height="113">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
        <thead>
          <tr align="center">
              <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td width="2091" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
              <thead>
      <tr align="center">
        <td colspan="13"></td>
      </tr>
      <tr align="center">
        <td width="34"  bgcolor="#CCCCCC">Nro</td>
        <td width="76"  bgcolor="#CCCCCC">Empresa</td>
        <td width="105" bgcolor="#CCCCCC">Contacto</td>
        <td width="70"  bgcolor="#CCCCCC">Telefono</td>
        <td width="61"  bgcolor="#CCCCCC">Correo</td>
        <td width="99"  bgcolor="#CCCCCC">Producto</td>
        <td width="90"  bgcolor="#CCCCCC">Consulta</td>
        <td width="91"  bgcolor="#CCCCCC">Derivado a </td>
        <td width="91"  bgcolor="#CCCCCC">Fecha Derivacion</td>
        <td width="91"  bgcolor="#CCCCCC">Fecha Atencion</td>
        <td width="91"  bgcolor="#CCCCCC">Ultima Cotizacion Valida</td>
        <td width="64"  bgcolor="#CCCCCC">Estado</td>
        <td width="64"  bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
    <tbody>
      <?php 
                    $reporte="";
                    $i = 1;
					if ($reporte!=NULL){
                    foreach($reporte as $item)
                    { 
            ?>
      <tr onmouseover="this.style.backgroundColor='#FFFF99';" onmouseout="this.style.backgroundColor='#ffffff';">
        <td align="center"><?php  echo $i;?></td>
        <td align="center" bgcolor="#FFFFCC" ><?php echo utf8_decode($item["c_empresa"]);?></td>
        <td align="center" ><?php echo utf8_decode($item["c_nombre"]);?></td>
        <td align="center" ><?php echo !empty($item["c_telefono"])?$item["c_telefono"]:"";?></td>
        <td align="center" ><?php echo $item["c_email"];?>&nbsp;</td>
        <td align="center" ><?php echo $item["c_producto"];?>&nbsp;</td>
        <td align="center" ><?php echo $item["c_consulta"];?>&nbsp;</td>
        <td align="center" ><?php echo $item["c_derivado"]; ?>&nbsp;</td>
        <td align="center" bgcolor="#FFFFCC"><?php echo $item["c_fecderiva"]; ?>&nbsp;</td>
        <td align="center" bgcolor="#99CCFF"><?php echo $item["c_fecderiva"]; ?></td>
        <td align="center" ><?php echo $item["c_fecderiva"]; ?></td>
        <td align="center" ><?php echo $item["c_fecderiva"]; ?></td>
        <td align="center" >&nbsp;</td>
        <!-- aqui vizualizar cotizacion -->
        </tr>
      <?php
                     $i += 1;
					}}
            ?>
    </tbody>
</table>
          </form>
       
</body>
</html>