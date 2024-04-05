	
    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Chofer y/o Brevete" />
          </td>
        </tr>
        <tr>
            <th style="width:100px;">Brevete</th> 
            <th>Chofer</th>       
            <th>Marca</th>
            <th>Placa Tracto<?php //echo  $_REQUEST['c_ructra'] ?></th> 
            <th>P.Carreta</th>                     
            <th>Sel.</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 
			
		foreach($this->maestro->ListarChoferes($_REQUEST['c_ructra']) as $chof){ //copiar en maestros?>	
	
        <tr style="font-size:9px;">
          <td><?php echo $c_brevete=$chof->c_brevete; ?></td>
          <td><?php echo $c_chofer=utf8_encode($chof->c_chofer); ?></td>
          <td><?php echo $c_marca=$chof->c_marca; ?></td>
          <td><?php echo $c_placa=$chof->c_placa; ?></td> 
          <td><?php echo $c_placa2=$chof->c_carreta; ?></td>         
          <td> <a href="javascript:pon_prefijo('<?php echo $c_brevete?>','<?php echo $c_chofer?>','<?php echo $c_marca?>','<?php echo $c_placa?>','<?php echo $c_placa2?>' )"><span class="glyphicon glyphicon-check"></span></a> </td>          
          
        </tr>
    <?php } ?>    	
   
    </tbody>
        
<script>
document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tablaTrans", this.value);
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
	
	function pon_prefijo(c_brevete,c_chofer,c_marca,c_placa,c_placa2) {	
		document.getElementById('c_licenci').value=c_brevete;
		document.getElementById('c_chofer').value=c_chofer;
		document.getElementById('c_marca').value=c_marca;
		document.getElementById('c_placa').value=c_placa;
		document.getElementById('c_placa2').value=c_placa2;		
		$('#my_modalTrans').modal('toggle');	//cerrar		
	}
</script>
