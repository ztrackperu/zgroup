<!--require_once 'view/principal/header.php';-->
<?php 
foreach($this->maestro->ListarTipCambio(date('d/m/Y')) as $tc):
$tcambio=$tc->tc_cmp;
$tfec=$tc->tc_fecha;
endforeach
?>
<div class="container-fluid">
<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE COTIZACIONES.</div>
</div>
<table  class="table table-hover" id="tabla" style="font-size:12px">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Cliente</th>
            <th>Ruc</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Contacto</th>
            <th>Asunto</th>
            <th>Fecha</th>
			<th>Descripcion</th>
			<th>Glosa</th>
			<th>Cod Equipo</th>
			<th>Clase</th>
			<th>Cantidad</th>
			<th>Moneda</th>
			<th>INCLUYE IGV/</th>
			<th>Precio</th>
			<th>Dscto</th>
			<th>Total</th>
			<th>Forma Pago</th>
			<th>Usu crea</th>
			<th>Usu aprueba</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListaReporteCotizacionesFiltros($xsw,$zsw,$cli,$fi,$ff) as $r): ?>
        <tr>
            <td><?php echo $r->c_numped; ?></td>
            <td><?php echo $r->c_nomcli; ?></td>
            <td><?php echo $r->cc_nruc; ?></td>
            <td><?php echo $r->c_email; ?></td>
            <td><?php echo $r->c_telef; ?></td>
            <td><?php echo $r->c_contac; ?></td>
            <td><?php echo utf8_encode($r->c_asunto); ?></td>            
            <td><?php  echo vfecha(substr(($r->d_fecped),0,10)); ?></td>
			<td><?php /*?><a href="?c=Alumno&a=Crud&id=<?php echo $r->c_numguia; ?>"><?php */?>
			<?php echo $r->c_desprd; ?><!--</a>--></td>
			<td><?php echo utf8_encode($r->c_obsdoc); ?></td>
			<td><?php echo $r->c_codcont; ?></td>
			<td><?php echo $r->tc_desc; ?></td>
			<td><?php echo $r->n_canprd; ?></td>
			<td><?php			
			if($r->c_codmon=="0"){
				$moneda="SOLES";
			}else{
				$moneda="DOLARES";
			}; 
			echo $moneda; 
			?></td>
			<td><?php			
			if($r->c_precios=="001"){
				$incligv="NO INCLUYE";
			}else if($r->c_precios=="002"){
				$incligv="SI INCLUYE";
			}else{
				$incligv="INAFECTO IGV";
			}
			echo $incligv;
			?></td>
			<td><?php echo $r->n_preprd; ?></td>
			<td><?php echo $r->n_dscto; ?></td>
			<td><?php echo $r->n_totped; ?></td>
			<td><?php echo $r->tp_desc; ?></td>
			<td><?php echo $r->c_opcrea; ?></td>
			<td><?php echo $r->c_uaprob; ?></td>
            <td>
            <?php if($r->n_swtapr==0 && $r->c_estado==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			  }elseif($r->n_swtapr==1 && $r->c_estado==0){ echo '<strong style="color:#060">Aprobado</strong>';
			  }elseif($r->c_estado==1 || $r->c_estado==2 && $r->n_swtapr==1){ echo '<strong style="color:#FF0000">Facturado</strong>';}elseif($r->c_estado==5){ echo '<strong style="color:#9900FF">Fusionado</strong>';}  ?>
                     
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</div> 
<script>
$(document).ready(function() {
    $('#tabla').DataTable({
		dom: 'Bfrtip',
			buttons: [
        'copy', 'excel', 'pdf'
    ]
		
	});

} );
</script>
 </body>