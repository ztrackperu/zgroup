
  <!--fin modal cerrar servicio de transporte-->
  <input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
  <input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
  <div id="mainAdminTransporte" class="container-fluid">
    <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">REPORTE DETALLADO SERVICIO DE TRANSPORTE </div>
      <div class="panel-body table-responsive">
        <table id="example" class="table table-bordered table-striped">        
            <thead>
                <tr>
					<th>FW / COTI / ROUTING</th>
					<th>ITEM</th>
					<th>CLIENTE</th>
					<th>EQUIPO</th>
					<th>GUIA REMISIÓN</th>
					<th>FECHA GUIA REMISIÓN</th>
					<th>PLACA / CARRETA</th>
					<th>DIRECCION DE SALIDA</th>
					<th>DIRECCION DE LLEGADA</th>
					<th>CHOFER SALIDA</th>
					<th>GUIA LLENO</th>
					<th>GUIA VACIO</th>
					<th>FECHA</th>
					<th>PERSONAL</th>
					<th>DESCRIPCION DEL DEPOSITO</th>
					<th>IMPORTE</th>
					<th>IMP.GASTADO</th>
					<th>FECHA SOLICITADO</th>
                </tr>
            </thead>
			<tbody>
				<?php  foreach($this->model->ListarDetServicioTodos() as $Reporte):
				$doc=$Reporte->c_nrofw;
				$n_item=$Reporte->n_item;					
					if($doc==''){
						 $doc=$Reporte->c_numped;	
						}
				$c_nomcli=utf8_encode($Reporte->c_nomclie);	
				$c_numequipo=$Reporte->c_numequipo;	
				$d_fecguia=$Reporte->d_fecguia;
				$d_fectran=$Reporte->d_fecguiatranslle;	
				$placa=$Reporte->c_placa ;	
					?>
				<tr>
                    
					
						<td><?php echo $doc ?></td>
						<td><?php echo $n_item ?></td>
						<td><?php echo $c_nomcli ?></td>
						<td><?php echo $c_numequipo ?></td>
						<td><?php echo $Reporte->c_numguia; ?></td>
						<td><?php echo vfecha(substr($d_fecguia,0,10));?></td>
						<td><?php echo $placa . " / ".$Reporte->c_placa2; ?></td>
						<td><?php echo $Reporte->c_diresal;?></td>  
						<td><?php echo $Reporte->c_direlle;?></td>  
						<td><?php echo $Reporte->c_chofer;?></td>  
						<td><?php echo $Reporte->c_guiatranslleno;?></td>  
						<td><?php echo $Reporte->c_guiatransvacio; ?></td>  
						<!--<td><?php //echo $estado; ?></td>  -->
						<td><?php echo vfecha(substr($d_fectran,0,10)); ?></td>  
						<td><?php echo $Reporte->c_personal; ?></td>  
						<td><?php echo $Reporte->c_descripcion; ?></td>   
						<td><?php echo $Reporte->n_importe; ?></td>   
						<td><?php echo $Reporte->n_impogastot; ?></td>   
						<td><?php echo vfecha(substr($Reporte->d_fecsol,0,10)); ?></td>  
                </tr>
                    <?php endforeach;?>
			</tbody>
                        <tfoot>
                        </tfoot>
        </table>   
      </div>
    </div>   
  </div>
<script>
  $(function () {
    $('#example').DataTable({
		'ordering'    : true,
		dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
	})
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
	   dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    })
  })
</script>