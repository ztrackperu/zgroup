	
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
            <th>Placa <?php //echo  $_REQUEST['c_ructransporte'] ?></th>                     
            <th>Seleccionar</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 
			
		foreach($this->model->ListarChoferes($_REQUEST['c_ructransporte']) as $chof){ //copiar en maestros?>	
	
        <tr>
          <td><?php echo $c_brevete=$chof->c_brevete; ?></td>
          <td><?php echo $c_chofer=$chof->c_chofer; ?></td>
          <td><?php echo $c_marca=$chof->c_marca; ?></td>
          <td><?php echo $c_placa=$chof->c_placa; ?></td>          
          <td> 
          	<?php if($_REQUEST['tipo']=='salida'){?>
         	 <a href="javascript:pon_prefijo('<?php echo $c_brevete?>','<?php echo $c_chofer?>','<?php echo $c_marca?>','<?php echo $c_placa?>' )"><span class="glyphicon glyphicon-check"></span></a> 
          	<?php }else if($_REQUEST['tipo']=='ingreso'){?>
             <a href="javascript:pon_prefijob('<?php echo $c_brevete?>','<?php echo $c_chofer?>','<?php echo $c_marca?>','<?php echo $c_placa?>' )"><span class="glyphicon glyphicon-check"></span></a>
            <?php } else if($_REQUEST['tipo']=='local'){?>
             <a href="javascript:pon_prefijol('<?php echo $c_brevete?>','<?php echo $c_chofer?>','<?php echo $c_marca?>','<?php echo $c_placa?>' )"><span class="glyphicon glyphicon-check"></span></a>
            <?php } else if($_REQUEST['tipo']=='salidaimpo'){?>
             <a href="javascript:pon_prefijosalidaimpo('<?php echo $c_brevete?>','<?php echo $c_chofer?>','<?php echo $c_marca?>','<?php echo $c_placa?>' )"><span class="glyphicon glyphicon-check"></span></a>
            <?php } else if($_REQUEST['tipo']=='ingresoimpo'){?>
             <a href="javascript:pon_prefijoingresoimpo('<?php echo $c_brevete?>','<?php echo $c_chofer?>','<?php echo $c_marca?>','<?php echo $c_placa?>' )"><span class="glyphicon glyphicon-check"></span></a>
            <?php } ?>    
          </td>          
          
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
	
	function pon_prefijo(c_brevete,c_chofer,c_marca,c_placa) {	
		document.getElementById('c_licenci').value=c_brevete;
		document.getElementById('c_chofer').value=c_chofer;
		document.getElementById('c_marca').value=c_marca;
		document.getElementById('c_placa').value=c_placa;		
		$('#my_modalTrans').modal('toggle');	//cerrar		
	}
	
	function pon_prefijob(c_brevete,c_chofer,c_marca,c_placa) {	
		document.getElementById('c_licencib').value=c_brevete;
		document.getElementById('c_choferb').value=c_chofer;
		document.getElementById('c_marcab').value=c_marca;
		document.getElementById('c_placab').value=c_placa;		
		$('#my_modalTrans').modal('toggle');	//cerrar		
	}
	
	function pon_prefijol(c_brevete,c_chofer,c_marca,c_placa) {	
		document.getElementById('c_licencil').value=c_brevete;
		document.getElementById('c_choferl').value=c_chofer;
		document.getElementById('c_marcal').value=c_marca;
		document.getElementById('c_placal').value=c_placa;		
		$('#my_modalTrans').modal('toggle');	//cerrar		
	}
	
	function pon_prefijosalidaimpo(c_brevete,c_chofer,c_marca,c_placa) {	
		document.getElementById('c_licenciI').value=c_brevete;
		document.getElementById('c_choferI').value=c_chofer;
		document.getElementById('c_marcaI').value=c_marca;
		document.getElementById('c_placaI').value=c_placa;	
		$('#my_modalTrans').modal('toggle');	//cerrar		
	}
	
	function pon_prefijoingresoimpo(c_brevete,c_chofer,c_marca,c_placa) {	
		document.getElementById('c_licencibI').value=c_brevete;
		document.getElementById('c_choferbI').value=c_chofer;
		document.getElementById('c_marcabI').value=c_marca;
		document.getElementById('c_placabI').value=c_placa;		
		$('#my_modalTrans').modal('toggle');	//cerrar		
	}
</script>
