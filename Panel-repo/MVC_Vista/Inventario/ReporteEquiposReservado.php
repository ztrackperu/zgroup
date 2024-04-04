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
<script>
function LiberaReserva(id,cod){
	var nro=id;
	var c=cod
		
	
	var mensaje='Seguro de Liberar Reserva Nro: '+nro+' '+'del Equipo: '+c+' Para su despacho';
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/InventarioC.php?acc=LiberarRes&id="+nro+"&cod="+c;
 }else{
	 return false;
	}
	
	}
function eliminarreserva(id,cod){
	
	var nro=id;
	var c=cod
		
	
	var mensaje='Seguro de Eliminar La Reserva Nro: '+nro+' '+'del Equipo: '+c;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/InventarioC.php?acc=eliminaresv&id="+nro+"&cod="+c;
 }else{
	 return false;
	}
 
 
 
}
</script>

<title>Documento sin título</title>
</head>

<body onload="">
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=rep01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
<table width="95%" border="1" align="" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center">
    <tr>
      <td height="113"><table width="200" border="1">
        <tr>
          <td><?php $nombreempresa;?></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td><?php $rucempresa;?></td>
          <td><?php $usuario;?></td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="8" bgcolor="#00FFFF"><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a>&nbsp;</td>
            </tr>
            <tr align="center">
              <td colspan="8" bgcolor="#00FFFF">REPORTE EQUIPOS RESERVADOS<a href="#nogo" onclick="window.print();" class="nover"><b></b></a></td>
            </tr>
            <tr align="center">
              <td width="45" bgcolor="#CCCCCC">Nro</td>
              <td width="149" bgcolor="#CCCCCC">Descripcion</td>
              <td width="156" bgcolor="#CCCCCC">Equipo</td>
              <td width="287" bgcolor="#CCCCCC">Cliente</td>
              <td width="135" bgcolor="#CCCCCC">Tipo</td>
              <td width="135" bgcolor="#CCCCCC">Liberar Reserva</td>
              <td width="135" bgcolor="#CCCCCC">Fecha Reservado</td>
              <td width="135" bgcolor="#CCCCCC"> Anular reserva</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
					if ($reporte!=NULL){
                    foreach($reporte as $item)
                    { 
	
            ?>
            <tr onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php echo  $i;?></td>
              <td align="center" ><?php echo $item["descripcion"];?></td>
              <td align="center" ><?php echo $item["c_nserie"];?></td>
              <td align="center" ><?php echo $item["c_nomcli"];?></td>
              <td align="center"><?php echo  $item["tipo"]; ?></td>
              <td align="center"><a href="#" onclick="LiberaReserva('<?php echo $item['idreserva'] ?>','<?php echo $item['c_idequipo'] ?>')"><img src="../images/download.png" width="20" height="20" title="Liberar Reserva" /></a>&nbsp;</td>
              <td align="center"><?php  echo $item["c_fechora"];
			 ?></td>
              <td align="center"> <a href="#" onclick="eliminarreserva('<?php echo $item['idreserva'] ?>','<?php echo $item['c_idequipo'] ?>')"><img src="../images/errorr.png" width="20" height="20" title="Anular Reserva" /></a></td>
              
              <!--  aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $i += 1;
					}}
            ?>
          </tbody>
      </table></td>
    </tr>


  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>