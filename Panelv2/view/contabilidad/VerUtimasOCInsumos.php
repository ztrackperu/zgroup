<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTADO DE INSUMOS</div>
</br>
<table id="tabla" class="table table-bordered table-hover table-striped dt-responsive">
    <thead>
        <tr>
        	<th width="50" style="width:50px;">N°</th> 
            <th width="100" style="width:50px;">Codigo</th>        
            <th width="200" style="width:50px;">Descripcion</th>
            <th width="63" style="width:90px;">Tipo Producto</th>
            <th width="63" style="width:90px;">Ver Ultimas Compras</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarStockActualInsumos() as $r){
			$IN_CODI=$r->IN_CODI;
			$i++;
	 ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r->IN_CODI; ?></td>
          <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
          <td><?php echo 'INSUMOS'; ?></td>
          <td>
          	 <div class="dropdown">
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                    Accion <span class="caret"></span>
                  </a> 
                  <ul class="dropdown-menu" role="menu">
                  	<li><a href="?c=cont01&a=VerUltimasOCInsumoSel&IN_CODI=<?php echo $r->IN_CODI; ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" >Ver ultimas 5 compras</a></li> 
                  </ul>
              </div>
          </td>
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

