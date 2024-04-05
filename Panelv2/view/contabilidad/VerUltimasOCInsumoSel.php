<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ULTIMAS COMPRAS DE INSUMOS</div>
</br>
<table id="tabla" class="table table-bordered table-hover table-striped dt-responsive">
    <thead>
        <tr>
        	<th width="50" style="width:50px;">N°</th> 
            <th width="100" style="width:50px;">Codigo</th>        
            <th width="200" style="width:50px;">Descripcion</th>
            <th width="63" style="width:90px;">Nª Orden Compra</th>
            <th width="63" style="width:90px;">RUC Proveedor</th>
            <th width="63" style="width:90px;">Nombre Proveedor</th>
            <th width="63" style="width:90px;">Fecha</th>
            <th width="63" style="width:90px;">Precio Unitario</th>
            <th width="63" style="width:90px;">Cantidad</th>
            <th width="63" style="width:90px;">Unidad Medida</th>
            <th width="63" style="width:90px;">Descuento(%)</th>
            <th width="63" style="width:90px;">Total Sin IGV</th>
            <th width="63" style="width:90px;">&nbsp;</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->VerUltimasOCInsumoSel($IN_CODI) as $r){
			$i++;
			$c_codmon=$r->c_codmon;
			$ListarDatosMoneda=$this->maestro->ListarDatosMoneda($c_codmon);
			$moneda=$ListarDatosMoneda->TM_DESC;
			$simbolo=$ListarDatosMoneda->TM_SIMB;
			
			$d_fecoc=vfecha(substr($r->d_fecoc,0,10));
	 ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r->c_codprd; ?></td>
          <td><?php echo utf8_encode($r->c_desprd); ?></td>
          <td><?php echo $r->c_numeoc ?></td>
          <td><?php echo $r->c_codprv ?></td>
          <td><?php echo utf8_encode($r->c_nomprv) ?></td>
          <td><?php echo $d_fecoc ?></td>
          <td><?php echo $simbolo.' '.$r->n_preprd ?></td>
          <td><?php echo $r->n_canprd ?></td>
          <td><?php echo $r->IN_UVTA ?></td>
          <td><?php echo $r->n_dscto.' '.' %'; ?></td>
          <td><?php echo $simbolo.' '.$r->n_totimp ?></td>
          <td>&nbsp;</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
   		                
</div>

   
  <script> 
  
   $(function () {
    $('#tabla2').DataTable({
		'ordering'    : false,
	})
    $('#tabla').DataTable({
		
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	    dom: 'Bfrtip',
	  'buttons': [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
  })
  
  function modalmotielim(c_motivo){
	$('#my_motielim').modal('show'); 
	frm_motivo.c_motivo.value=c_motivo;	 
  }//fin modalmotielim
  
  function EliminarEquipoTemporal(serie){
		$('#my_modalelim').modal('show');
		document.getElementById('serie').value=serie;	
	}//fin EliminarEquipoTemporal	
	
  $(document).ready(function(){
        $("#frm_eliminarEquipo").submit(function(){
            return $(this).validate();
        });
    })
	

</script>

