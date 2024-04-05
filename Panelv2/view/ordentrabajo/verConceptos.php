    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Serie y/o Codigo de Equipo" />
          </td>
        </tr>
        <tr>
            
            <th>Codigo</th>       
            <th>Descripcion</th>                                           
            <th>Seleccionar</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 		
		foreach($this->model->ListraConceptosOTM() as $equi){?>	
	
        <tr>
          <td><?php echo $codigo=$equi->codigo; ?></td>
          <td><?php echo $descripcion=$equi->descripcion; ?></td>                
          <td> <a href="javascript:pon_prefijo('<?php echo $codigo?>','<?php echo $descripcion?>')"><span class="glyphicon glyphicon-check"></span></a> </td>          
          
        </tr>
    <?php } ?>    	
   
    </tbody>
<script>
document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tablaconcepto", this.value);
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
	
	
	function pon_prefijo(codigo,descripcion) {		
	document.getElementById('c_codtarea').value=codigo;
		document.getElementById('c_destarea').value=descripcion;
		//document.getElementById('C_SITUANT').value=c_codsitalm;
		$('#my_modalconceptos').modal('toggle');	//cerrar
		
	}
</script>
