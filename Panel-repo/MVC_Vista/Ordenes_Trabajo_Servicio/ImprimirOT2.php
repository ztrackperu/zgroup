
<?php
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Viernes 24 de Febrero del 2012
	if($reporteot!=NULL){
		foreach ($reporteot as $itemT) 
		{
			$c_numot=$itemT['ot'];
			$c_codmon=$itemT['c_codmon'];
			$c_desequipo=$itemT['c_desequipo'];
			$unidad=$itemT['unidad'];
			$c_treal=$itemT['c_treal'];
			$c_supervisa=$itemT['c_supervisa'];
			$c_solicita=$itemT['c_solicita'];
			$c_lugartab=$itemT['c_lugartab'];
			$d_fecdcto=$itemT['d_fecdcto'];
			$c_usrcrea=$itemT['c_usrcrea'];
			$c_uaprobx=$itemT['c_usrcierra'];
			$c_refcot=$itemT['c_refcot'];
			$factura=$itemT['facturaprov'];
			$add1=$itemT['add1'];
			$add2=$itemT['add2'];
      $obs=$itemT['c_osb'];
      if($itemT['c_codmon']=='0'){$moneda='SOLES';}else{$moneda='DOLARES';}
    }//Fin if
  }// fin foreach
 
  $reporteotcot = Listar_CotizacionesxNroM($c_refcot,'','','','');
  
  if($reporteotcot!=NULL){
		foreach ($reporteotcot as $itemTc) 
		{
			
		$cliente=$itemTc['c_nomcli'];	
		$coti=$itemTc['c_numped'];			
			
		}
  }
  
  
  
 
 /* $resultados=Obtener_UserOTM($c_uaprobx);
  foreach($resultados as $user){
    $c_uaprob=$user['Usuario'];
  }// fin foreach*/
  
  
						
	$c_uaprob=$c_uaprobx;									
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orden de Trabajo - Zgroup sac.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">

</head>
<style type="text/css" media="print">
.nover {display:none}
</style>
<body class="control">
<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir.</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="Egresoc.php?acc=h1&udni=<?php echo $udni ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
<div class="cuerpo1">
<form id="frmImpresion" name="formElem" method="post" >

<table width="745" border="0" align="left" cellpadding="0" cellspacing="0" style="font-family: 'Arial Narrow', Arial, sans-serif;font-size:12px">
  <tr>
    <td colspan="4"><table width="816" border="0" cellpadding="0" cellspacing="0" style="font-family: 'Arial Narrow', Arial, sans-serif;font-size:12px">
      <tr>
        <td width="453" rowspan="3"><img src="../images/imgeir.png" width="139" height="36" /></td>
        <td width="250" align="right"><strong>Fecha de Impresion</strong></td>
        <td width="10"><strong>:</strong></td>
        <td width="108" align="right"><?php echo date("d/m/y")." ".date("H:i:s");?>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Nro Orden Servicio</strong></td>
        <td><strong>:</strong></td>
        <td align="right"><?php echo $c_numot ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Generado Por</strong></td>
        <td><strong>:</strong></td>
        <td align="right"><?php echo $c_usrcrea ?>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><strong>Aprobado/Cerrado Por</strong></td>
        <td>:</td>
        <td align="right"><?php echo strtoupper($c_uaprobx); ?>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="4" align="center"  class="t_titulo"><strong>ORDEN DE SERVICIO</strong></td>
    </tr>
  <tr>
    <td colspan="4"><hr /></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="813" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="131"><strong>Trabajo A Realizar</strong></td>
        <td><strong>:</strong></td>
        <td colspan="7"><?php echo $c_treal ?>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Fecha Orden</strong></td>
        <td width="3"><strong>:</strong></td>
        <td width="187"><?php echo vfecha(substr($d_fecdcto,0,10)) ?>&nbsp;</td>
        <td width="105"><strong>Moneda </strong></td>
        <td width="7"><strong>:</strong></td>
        <td width="141"><?php echo $moneda ?>&nbsp;</td>
        <td width="97"><strong>Ref Documento</strong></td>
        <td width="5"><strong>:</strong></td>
        <td width="131"><?php echo $factura?></td>
      </tr>
      <tr>
        <td><strong>Solicitado Por</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_solicita ?>&nbsp;</td>
        <td><strong>Supervisado por</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_supervisa ?>&nbsp;</td>
        <td><strong>Lugar Trabajo</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_lugartab ?>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Equipo</strong></td>
        <td><strong>:</strong></td>
        <td colspan="4"><?php echo $c_desequipo. ' Cliente: '.$cliente.'-'.$coti ?>&nbsp;</td>
        <td><strong>Codigo Equipo</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $unidad ?>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="4"><hr /></td>
    </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><table width="813" border="1" cellpadding="0" cellspacing="0" style="font-size:10px">
      <tr>
        <td width="53" align="center" bgcolor="#CCCCCC"><strong>Ruc</strong></td>
        <td width="106" align="center" bgcolor="#CCCCCC"><strong>Proveedor</strong></td>
        <td width="116" align="center" bgcolor="#CCCCCC"><strong>Trabajo Realizado</strong></td>
        <td width="95" align="center" bgcolor="#CCCCCC"><strong>Tecnico Encargado</strong></td>
        <td width="54" align="center" bgcolor="#CCCCCC"><strong>Monto Unitario</strong></td>
        <td width="53" align="center" bgcolor="#CCCCCC"><strong>Cant Dcto</strong></td>
        <td width="56" align="center" bgcolor="#CCCCCC"><strong>Igv Dcto</strong></td>
        <td width="58" align="center" bgcolor="#CCCCCC"><strong>Total Dcto</strong></td>
        <td width="65" align="center" bgcolor="#CCCCCC"><strong>Monto Unit. Pactado</strong></td>
      </tr>
         <?php 
							if($reporteot != NULL)
							{		
								$i = 1;
								foreach($reporteot as $item)
								{
							
							?>
      <tr>
        <td align="center"><?php echo $item['c_rucprov']; ?></td>
        <td align="center"><?php echo strtoupper($item['c_nomprov']); ?></td>
        <td align="center"><?php echo strtoupper($item['concepto']); ?></td>
        <td align="center"><?php echo strtoupper($item['c_tecnico']); ?></td>
        <td align="center"><?php echo $item['monto']; ?></td>
        <td align="center"><?php echo $item['n_cant']; ?>&nbsp;</td>
        <td align="center"><?php echo $item['n_igvd']; ?>&nbsp;</td>
        <td align="center"><?php echo $item['n_totd']; ?>&nbsp;</td>
        <td align="center"><?php echo $item['montop']; ?></td>
      </tr>
      <?php }}?>
    </table></td>
    </tr>	
  <tr>
    <td width="106">&nbsp;</td>
    <td width="149">&nbsp;</td>
    <td width="325">&nbsp;</td>
    <td width="236">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><hr /></td>
    </tr>
	<tr>
        <td width="131"><strong>Detalle de Pago</strong></td>
        <td><strong>:</strong></td>
        <td colspan="7"><?php echo $add1 ?>&nbsp;</td>
    </tr>
	<tr>
        <td width="131"><strong>Condicion</strong></td>
        <td><strong>:</strong></td>
        <td colspan="7"><?php echo $add2 ?>&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Observaciones</strong></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><?php echo $obs; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>NOMBRE Y FIRMA </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>SUPERVISOR</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
</body>
</html>
