<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTADO DE NOTAS DE SALIDA/INGRESO.</div>

<table id="tabla" class="table table-hover" style="font-size:12px;">
    <thead>
    	 <tr>
          <td colspan="8">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />
          </td>
        </tr>
        <tr>
        	<th style="width:50px;">N°</th> 
            <th style="width:100px;">Codigo</th>        
            <th style="width:200px;">Descripcion</th>
            <th style="width:40px;">Serie Equipo</th> 
            <th>Cant</th>          
            <th>Fecha</th>
            <th style="width:25px;">T/M</th> 
            <th style="width:25px;">T/D</th>
            <th style="width:50px;">Numero</th>           
            <th style="width:50px;">Remision</th>
            <th style="width:50px;">O/Compra</th>
            <th style="width:50px;">Cod/Rem</th>
            <th style="width:50px;">Usuario</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarNotas() as $r){
			$d_fecreg=$r->NT_FDOC;
			$i++;
	 ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r->IN_CODI; ?></td>
          <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
          <td><?php echo $r->c_idequipo; ?></td>
          <td><?php echo $r->NT_CANT; ?></td>
          <td><?php echo vfecha(substr($d_fecreg,0,10)); ?></td>
          <td><?php echo $r->NT_TRAN; ?></td>            
          <td><?php echo $r->NT_TDOC; ?></td>
          <td><?php echo utf8_encode($r->NT_NDOC); ?></td> 
          <td><?php echo utf8_encode($r->NT_REMI); ?></td>
          <td><?php echo $r->NT_NOC; ?></td>
          <td><?php echo $r->NT_CCLI; ?></td>          
          <td><?php echo $r->NT_OPER; ?></td>
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

