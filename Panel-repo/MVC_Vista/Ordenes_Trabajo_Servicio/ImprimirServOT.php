<?php
 
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
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
	$id=$itemT['n_id'];
	
	if($itemT['c_codmon']=='0'){$moneda='SOLES';}else{$moneda='DOLARES';}
	}
		}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orden de Trabajo - Zgroup</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
<style type="text/css">
body {
	margin-left: 0px;
}
</style>
</head>
<style type="text/css" media="print">
.nover {display:none}
</style>
<body class="control">
<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="Egresoc.php?acc=h1&udni=<?php echo $udni?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
<div class="cuerpo1">
<form id="frmImpresion" name="formElem" method="post" >

<table width="745" border="0" align="left" cellpadding="0" cellspacing="0" style="font-family: 'Arial Narrow', Arial, sans-serif;font-size:12px">
  <tr>
    <td colspan="4"><table width="816" border="0" cellpadding="0" cellspacing="0" style="font-family: 'Arial Narrow', Arial, sans-serif;font-size:12px">
      <tr>
        <td width="453" rowspan="3"><img src="../images/imgeir.png" width="139" height="36" /></td>
        <td width="250" align="right"><strong>Fecha de Impresión</strong></td>
        <td width="10"><strong>:</strong></td>
        <td width="108" align="right"><?php echo date("d/m/y")." ".date("H:i:s");?>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Nro Orden Trabajo</strong></td>
        <td><strong>:</strong></td>
        <td align="right"><?php echo $c_numot ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Generado Por</strong></td>
        <td><strong>:</strong></td>
        <td align="right"><?php echo $c_usrcrea ?>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="4" align="center"  class="t_titulo"><strong>ORDEN DE SERVICIO * <?php 
	$id=str_pad($id, 2, "0", STR_PAD_LEFT);
	
	echo $c_numot.$id ?></strong></td>
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
        <td width="97"><strong>Lugar Trabajo</strong></td>
        <td width="5"><strong>:</strong></td>
        <td width="131"><?php echo $c_lugartab ?></td>
      </tr>
      <tr>
        <td><strong>Solicitado Por</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_solicita ?>&nbsp;</td>
        <td><strong>Supervisado por</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_supervisa ?>&nbsp;</td>
        <td><strong>Codigo Equipo</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $unidad ?></td>
      </tr>
      <tr>
        <td><strong>Equipo</strong></td>
        <td><strong>:</strong></td>
        <td colspan="4"><?php echo $c_desequipo ?>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>:</strong></td>
        <td>&nbsp;</td>
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
    <td colspan="4"><table width="814" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="106" align="center" bgcolor="#CCCCCC"><strong>Ruc</strong></td>
        <td width="243" align="center" bgcolor="#CCCCCC"><strong>Proveedor</strong></td>
        <td width="255" align="center" bgcolor="#CCCCCC"><strong>Trabajo Realizado</strong></td>
        <td width="210" align="center" bgcolor="#CCCCCC"><strong>Tecnico Encargado</strong></td>
        </tr>
         <?php 
							if($reporteot != NULL)
							{		
								$i = 1;
								foreach($reporteot as $item)
								{
							//$n_cant,$n_igvd,$n_totd
							?>
      <tr>
        <td align="center"><?php echo $item['c_rucprov']; ?></td>
        <td align="center"><?php echo strtoupper($item['c_nomprov']); ?></td>
        <td align="center"><?php echo strtoupper($item['concepto']); ?></td>
        <td align="center"><?php echo strtoupper($item['c_tecnico']); ?></td>
        </tr>
      <?php }}?>
    </table></td>
    </tr>
  <tr>
    <td width="106">&nbsp;</td>
    <td width="149">&nbsp;</td>
    <td width="280">&nbsp;</td>
    <td width="281">&nbsp;</td>
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
    <td colspan="4"><table width="814" border="0" >
      <tr>
        <td colspan="5"><strong><em>Insumos Entregados Al Tecnico</em></strong></td>
        </tr>
      <tr>
        <td width="119" align="center" bgcolor="#CCCCCC"><strong>Nota Salida</strong></td>
        <td width="79" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
        <td width="418" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
        <td width="140" align="center" bgcolor="#CCCCCC"><strong>Obs</strong></td>
        <td width="36" align="center" bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
      <?php 
							if($reportens != NULL){		
								$i = 1;
								foreach($reportens as $item)
								{
							?>
      <tr>
        <td><?php echo $item['NT_NDOC']; ?></td>
        <td align="center"><?php echo $item['NT_CANT']; ?></td>
        <td><?php echo $item['IN_ARTI']; ?></td>
        <td><?php echo $item['NT_OBS']; ?></td>
        <td><?php echo $item['']; ?></td>
        </tr>
      <?php 					}
												}
		?>
      </table>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="814" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
      <tr>
        <td><strong>Espacio Para ser Llenado por el Tecnico:</strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
    <td>&nbsp;</td>
    <td><hr /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>NOMBRE Y FIRMA</strong></td>
    <td>&nbsp;</td>
    <td align="center"><strong>NOMBRE Y FIRMA </strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>TECNICO</strong></td>
    <td>&nbsp;</td>
    <td align="center"><strong>SOLICITANTE</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</form>
</div>
</body>
</html>