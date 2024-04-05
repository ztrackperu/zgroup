<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">STOCK ACTUAL INSUMOS(invstkalmInsumos)..</div>
  </BR>
<table id="example" class="table table-bordered table-hover table-striped dt-responsive"> 
    <thead>
        <tr>
        	<th>N°</th> 
            <th>Codigo</th>        
            <th>Descripcion</th>
            <th>Unidad</th>
            <th>Stock</th>
            <th>Tipo</th>
			<th>PART NUMBER</th>
            <th>PART NUMBER 2</th>
            <th>PART NUMBER 3</th>
            <th>PART NUMBER 4</th>
            <th>PART NUMBER 5</th>
            <th>MARCA</th>
            <th>UBICACION</th>
            <th>ROTACION</th>
            <th>ALMACEN</th>
            <th>RACK</th>
            <th>ANAQUEL</th>
            <th>PISO</th>
            <th>CITU</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarStockActualInsumos() as $r){
			
			$i++;
	 ?>
        <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $r->IN_CODI; ?></td>
         <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
         <td><?php echo $r->IN_UVTA ?></td>
         <td><?php echo $r->IN_STOK ?></td>
         <td><?php echo $r->C_DESITM ?></td>
         <td><?php echo $r->PART_NUMBER; ?></td>
         <td><?php echo $r->PART_N2; ?></td>
         <td><?php echo $r->PART_N3; ?></td>
         <td><?php echo $r->PART_N4; ?></td>
         <td><?php echo $r->PART_N5; ?></td>
         <td><?php echo $r->MARCA; ?></td>
         <td><?php echo $r->UBICACION; ?></td>
         <td><?php echo $r->ROTACION; ?></td>
         <td><?php echo $r->ALMACEN; ?></td>
         <td><?php echo $r->RACK; ?></td>
         <td><?php echo $r->ANAQUEL; ?></td>
         <td><?php echo $r->PISO; ?></td>
         <td><?php echo $r->CITU; ?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>
   		                
</div>

   
  <script> 
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
	
	

    document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tabla", this.value);
    }
    
/*     $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    } */
</script>
<script>
  $(function () {
    $('#example2').DataTable({
		'ordering'    : false,
	})
    $('#example').DataTable({
		
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
</script>
