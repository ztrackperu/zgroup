
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
			$c_serie=$itemT['c_serieequipo'];
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
      $obs=$itemT['c_osb'];
      $horI=$itemT['h_inicio'];
      $horF=$itemT['h_fin'];
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
<title>Orden de trabajo - Zgroup sac.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

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
        <td width="453" rowspan="3"><img src="../images/logo-z.png" width="145" height="50" /></td>
        <td width="250" align="right"><strong>Fecha de Impresion</strong></td>
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
      <tr>
        <td>&nbsp;</td>
        <td align="right"><strong>Aprobado/Cerrado Por</strong></td>
        <td>:</td>
        <td align="right"><?php echo strtoupper($c_uaprobx); ?>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="4" align="center"  class="t_titulo"><strong>ORDEN DE TRABAJO</strong></td>
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
        <td width="131"><?php echo  $factura?></td>
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
	  <tr>
        <td><strong>Serie Equipo</strong></td>
        <td><strong>:</strong></td>
        <td colspan="4"><?php echo $c_serie ?>&nbsp;</td>
      </tr>
	  <tr>
        <td><strong>Hora Inicio</strong></td>
        <td><strong>:</strong></td>
        <td colspan="4"><?php echo $horI ?>&nbsp;</td>
        <td><strong>Hora Fin</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $$horF ?>&nbsp;</td>
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
     
    <td colspan="4">
	 <a class="btn btn-default" id="export2-btn">Export</a>
	<table width="813" border="1" cellpadding="0" cellspacing="0" style="font-size:10px" id="resultsTable2">
      <tr>
        <td width="80" align="center" bgcolor="#CCCCCC"><strong>Nro Orden de Trabajo</strong></td>
        <td width="53" align="center" bgcolor="#CCCCCC"><strong>Ruc</strong></td>
        <td width="106" align="center" bgcolor="#CCCCCC"><strong>Proveedor</strong></td>
        <td width="116" align="center" bgcolor="#CCCCCC"><strong>Trabajo Realizado</strong></td>
        <td width="95" align="center" bgcolor="#CCCCCC"><strong>Tecnico Encargado</strong></td>
        <td width="54" align="center" bgcolor="#CCCCCC"><strong>Tipo Dcto</strong></td>
        <td width="55" align="center" bgcolor="#CCCCCC"><strong>Nro Dcto</strong></td>
        <td width="51" align="center" bgcolor="#CCCCCC"><strong>Fecha Dcto</strong></td>
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
        <td align="center"><?php echo $item['c_numot']; ?></td>
        <td align="center"><?php echo $item['c_rucprov']; ?></td>
        <td align="center"><?php echo strtoupper($item['c_nomprov']); ?></td>
        <td align="center"><?php echo strtoupper($item['concepto']); ?></td>
        <td align="center"><?php echo strtoupper($item['c_tecnico']); ?></td>
        <td align="center"><?php echo strtoupper($item['tdoc']); ?></td>
        <td align="center"><?php echo $item['ndoc']; ?></td>
        <td align="center"><?php echo $item['fdoc']; ?></td>
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
    <td><strong>Observaciones</strong></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><?php echo $obs; ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>IMPORTANTE</strong></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">-El numero de la presente orden, la forma de pago: contado o crédito debe figurar en su factura. Si la forma de pago es crédito: Días de crédito, monto a pagar
	y fecha de vencimiento.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Para la aceptacion de su factura deberá enviar por correo el presente documento, Guia electrónica, XML, CDR; si tuviese gui física acercarse a la oficina para la entrega de su
	factura y guia correspondiente. Se recuerda que la documentacion tendrá que ser enviada por correo proveedores@zgroup.com.pe y a nuestras oficinas si fuere el caso.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	ZGROUP no se responsabiliza por la demora en el pago por error documentario por parte del proveedor.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Para entrega de su mercaderia o prestación de servicio es indispensable la presentación del presente documento.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Recepcion de facturas todos los jueves de 2 pm. a 5pm.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Lugar de Recepcion: Oficina administrativa (Cal. Ordoner Vargas 142 Villasol - Los Olivos).
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Atencion de llamadas de proveedores: miercoles 2:30 pm a 5:30 pm.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Contacto: Norma Velasquez.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Celular: 970583695.
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
	- Correos: finanzas@zgroup.com.pe / proveedores@zgroup.com.pe / galfaro@zgroup.com.pe
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">
<div class="row">
  <div class="col-md-2">
    <a class="btn btn-default" id="export-btn">Export</a>
  </div>
  <div class="col-md-10"></div>
</div>
	<table width="812" border="0" id="resultsTable" >
      <tr>
        <td colspan="4"><strong>Insumos Y repuestos Utilizados Para este Trabajo</strong></td>
		<input type="hidden" name="numOT"  id="numOT" value="<?php echo $_GET["ot"]?>"/>
        </tr>
      <tr>
        <td width="50"  align="center" bgcolor="#CCCCCC"><strong>Item.</strong></td>
        <td width="100" align="center" bgcolor="#CCCCCC"><strong>Nota Salida</strong></td>
        <td width="350" align="center" bgcolor="#CCCCCC"><strong>Cod producto</strong></td>
        <td width="350" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
        <td width="350" align="center" bgcolor="#CCCCCC"><strong>Moneda</strong></td>
        <td width="100" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
        <td width="100" align="center" bgcolor="#CCCCCC"><strong>Unidad Medida</strong></td>
        <td width="80"  align="center" bgcolor="#CCCCCC"><strong>Precio UNID.</strong></td>
        <td width="90"  align="center" bgcolor="#CCCCCC"><strong>Precio TOTAL</strong></td>
        <td width="90"  align="center" bgcolor="#CCCCCC"><strong>Precio TOTAL + IGV</strong></td>
        <td width="200" align="center" bgcolor="#CCCCCC"><strong>Responsable</strong></td>
        <td width="200" align="center" bgcolor="#CCCCCC"><strong>Fecha de NS</strong></td>
        <td width="200" align="center" bgcolor="#CCCCCC"><strong>Motivo</strong></td>
        </tr>
           <?php $i=0;
                if($reportens != NULL)
                {
					$TOTAL=0;
                        foreach($reportens as $item)
                        {   $i = $i + 1;						
                            $c_codpropre = $item['NT_CART'];
						?>
						<tr>
							<td align="center"><?php   echo $i; ?></td>       
							<td align="center"><?php   echo $item['NT_NDOC']; ?></td>
							<td align="center"><?php   echo $item['NT_CART']; ?></td>
							<td align="left"  ><?php   echo $item['IN_ARTI']; ?></td>

						<?php		
                                $precio = ListarPreciosNotasSalidasM($c_codpropre);
								$TOTIGV=0;	
								$CAN=$item['NT_CANT'];								
                                    foreach ($precio as $prelis){
										if($prelis != NULL){
											if($prelis['c_codmon']=="0"){
												$moneda="soles";
											}else{
												$moneda="dolares";
											}
										$PRE=$prelis['n_preprd'];	
										}else{
											$moneda=" ";
											$PRE=0;	
										}
									
									//$PRE=$prelis['n_preprd'];
									$TOT=$CAN*$PRE;
									$TOTIGV=($TOT*1.18)." <BR>";
									$TOTAL+=$TOT;
									$TOTALIGV+=$TOTIGV;	
            ?>   <td align="left"  ><?php   echo $moneda; ?></td>
				<td align="center"><?php   echo $item['NT_CANT']; ?></td>  
				<td align="center"><?php   echo $item['NT_CUND']; ?></td>      
				<td align="center"><?php   echo $PRE;//$prelis['n_preprd']; ?></td>
				<td align="center"><?php   echo $TOT; ?></td>
				<td align="center"><?php   echo $TOT*1.18; ?></td>
						<?php 
					//echo $TOTAL;
				}
				?>
        <td><?php echo !empty($item['NT_RESPO'])?$item['NT_RESPO']:"<B>EQUIPOS ZGROUP</B>"; ?></td>
		<td align="center"><?php   echo $item['NT_FDOC']; ?></td> 
		<td align="center"><?php   echo $item['c_motivo']; ?></td> 
    </tr>	

		<?php
		}
		
		?>
	
			<tr>
		<td colspan="6" align="right">Total sin IGV   : </td>
		<td ><?php   echo $TOTAL; ?> </td>
		<td colspan="2" align="right">Total + IGV   : </td>
		<td ><?php   echo $TOTALIGV; ?> </td>
	</tr>
	<?php
		}
	?>
    </table>	
	</td>
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
    <td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>NOMBRE Y FIRMA </strong></td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><strong>NOMBRE Y FIRMA </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>SUPERVISOR</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
<script>
jQuery(document).ready(function() {
    
    $('#export-btn').on('click', function(e){
        e.preventDefault();
        ResultsToTable();
    });
	$('#export2-btn').on('click', function(e){
        e.preventDefault();
        ResultsToTable2();
    });
    
    function ResultsToTable(){    
        $("#resultsTable").table2excel({
           exclude: ".noExl",
					name: "Excel Document Name",
					filename: $("#numOT").val()+"-"+"Insumos-repuestos ",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
        });
    }
	 function ResultsToTable2(){    
        $("#resultsTable2").table2excel({
           exclude: ".noExl",
					name: "Excel Document Name",
					filename: $("#numOT").val()+"-"+"Detalle ",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
        });
    }
	
	$("export-btn22").click(function(){
  $("#resultsTable").table2excel({
    // exclude CSS class
    //exclude: ".noExl",
    name: "Worksheet Name",
    //filename: "SomeFile" //do not include extension
  });
});

});
</script>
<script>
			$(function() {
				$(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
		</script>
</html>
