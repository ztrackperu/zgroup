
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->
</head>

<body>

<p>Usted Cuenta con los siguientes vencimientos Favor de verificar: </p>
<br>Para Actualizar el reporte favor de ingresar a
comercial/cotizaciones/cronograma alquiler</br>
<br>Buscar el cronograma por numero de cotizacion y en la opcion accion selecciona ver detalle</br>
<br></br>
<?php 
//require_once '../controller/login/login.controller.php';

?>
<div id="info">
<table width="756" border="1" align="center">
  <tr>
  <th width="126" scope="col">#</th>
    <th width="126" scope="col">Cotizacion Padre</th>
    <th width="353" scope="col">Cliente</th>
    <th width="55" scope="col">Cuota</th>
    
    <th width="94" scope="col">Vencimiento</th>
    <th width="94" scope="col">&nbsp;</th>
	<th width="94" scope="">link</th>
  </tr>
  <?php 
  

  
  foreach($this->model5->ListarVencimientosCronograma() as $r):
	$i++;
	$dias=dias_transcurridos(substr ($r->d_fecven,0,10),date("Y-m-d"));
	
	if($dias<0){
		
		$color="#FF0000";
		$texto="#FFFFFF";
		}else if($dias >0 and $dias<=2){
		$color="#FFFF00";	
		$texto="#000000";		
			}else if($dias >=3){
		$color="#006600";
		$texto="#FFFFFF";				
				}
	
	
	 ?>
    <tr bgcolor="<?php echo $color?>" style="color:<?php echo $texto  ?>">
    <td><?php echo $i ?></td>
    <td><?php echo $r->C_NUMPED ?></td>
    <td><?php echo $r->C_NOMCLI ?></td>
    <td><?php echo $r->NroCuota ?></td>
    <td><?php echo vfecha(substr ($r->d_fecven,0,10))?></td>
    <td><?php 
	
	
	echo $dias;
	

	
	 ?></td>
	 
	 <td><a href="indexa.php?c=05&a=ListCuotasCronograma&ncoti=<?php echo $r->C_NUMPED?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" target="_blank">ACTUALIZAR</a></td>
	 
	 
  </tr>
  <?php endforeach; ?>
</table>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="200" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#006600">&nbsp;</td>
    <td bgcolor="#FFFF00">&nbsp;</td>
    <td bgcolor="#FF0000">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<script>
$(document).ready(function() {
      var refreshId =  setInterval( function(){
    $('#info2').load('view/facturadorelectronico/CronogramaVcto.php');//actualizas el div
   }, 1000 );
});

</script>
</body>
</html>