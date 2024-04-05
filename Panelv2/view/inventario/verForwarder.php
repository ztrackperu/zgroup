	
    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Forwarder y/o Cliente" />
          </td>
        </tr>
        <tr>
            <th style="width:80px;">Forwarder</th> 
            <th>RUC cliente</th>       
            <th>Nombre cliente</th>                               
            <th>Seleccionar</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 
			
		foreach($this->modelsql->ListarForwarder() as $chof){ ?>	
	
        <tr>
          <td><?php echo $Fwd_Codi=$chof->Fwd_Codi; ?></td>
          <td><?php echo $ruccliente=$chof->Ent_Ruc; ?></td>
          <td><?php echo $nombrecliente=$chof->Fwd_DescripcionClienteFinal; ?></td>                  
          <td> <a href="javascript:pon_prefijo('<?php echo $Fwd_Codi?>')"><span class="glyphicon glyphicon-check"></span></a> </td>          
          
        </tr>
    <?php } ?>    	
   
    </tbody>
        
<script>
document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tablaForwarder", this.value);
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
	
	function pon_prefijo(n_forwarder) {	
		document.getElementById('n_forwarder').value=n_forwarder;			
		$('#my_modalForwarder').modal('toggle');	//cerrar		
	}
</script>
