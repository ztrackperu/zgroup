<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <?php
  	 setlocale(LC_TIME, 'spanish');  
	 $nombremes=strftime("%B",mktime(0, 0, 0, $_GET['c_mes'], 1, 2000)); 
  ?>
  <div class="panel-heading">STOCK DE INSUMOS DEL MES DE <?php echo strtoupper($nombremes) ?> DEL <?php echo $_GET['c_anno'] ?>  (tabla invstkalmInsumos) </div>

<table id="tabla" class="table table-hover" style="font-size:12px;">
    <thead>
    	 <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />
          </td>
        </tr>
        <tr>
        	<th width="50" style="width:50px;">N°</th> 
            <th width="100" style="width:50px;">Codigo</th>        
            <th width="200" style="width:50px;">Descripcion</th>
            <th width="63" style="width:90px;">Stock</th>
            <th width="63" style="width:90px;">Usuario</th>
            <th width="63" style="width:90px;">Fecha Proceso</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($ListarStockMesInsumos as $r){
			
			$i++;
	 ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r->IN_CODI; ?></td>
          <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
          <td><?php echo $r->IN_STOK ?></td>
          <td><?php echo $r->IN_OPER ?></td>
          <td><?php echo vfecha(substr($r->IN_DATE,0,10)); ?></td>
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
    
    $TableFilter = function(id, value){
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
    }
</script>

