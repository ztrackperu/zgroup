<!--usado para registrar asignacion sin cotizacion y guia sin doc-->	
    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese descripcion" value="<?php echo $c_desprd.'-'.$c_codcla.'-'.$i ?>" />
            
          <input type="hidden" name="clase" id="clase"></td>
        </tr>
        <tr>
            <th>Codigo Producto</th> 
            <th>Descripcion</th>       
            <th>Clase</th>
            <th></th>
            <th></th>
            <th></th>                                            
            <th>Seleccionar</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 	
	//BuscarProducto($criterio,$id)	
		foreach($this->maestro->BuscarProductoframe($c_codcla) as $equi):?>	
	
        <tr>
          <td><?php echo $in_codi=$equi->IN_CODI; ?></td>
          <td><?php echo $in_arti=$equi->IN_ARTI; ?></td>
          <td><?php echo $cod_clase=$equi->cod_clase; //clase producto  ?></td>
          <td></td>
          <td></td> 
          <td></td>                   
          <td> 
          <a href="javascript:pon_prefijo('<?php echo $in_codi?>','<?php echo $i ?>','<?php echo $in_arti?>','<?php echo $cod_clase?>')"><span class="glyphicon glyphicon-check"></span></a> </td>            
        </tr>
    <?php endforeach; ?>    	
   
    </tbody>
<script>
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
	
	
	function pon_prefijo(in_codi,i,in_arti,clase) {		
		document.getElementById('c_codprd_'+i).value=in_codi;
		document.getElementById('c_desprd_'+i).value=in_arti;
		document.getElementById('c_codcla_'+i).value=clase;	
		//document.getElementById('c_nserie').value=c_nserie;
		$('#my_modalframeprod').modal('toggle');	//cerrar
		
	}
</script>
