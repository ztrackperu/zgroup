	<!--usado solo para registrar asignacion con cotizacion-->
    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese ae Serie y/o Codigo de Equipo <?php echo $tipo=$_REQUEST['tipo']; ?>" />
          </td>
        </tr>
        <tr>
            <th>Serie</th> 
            <th>Codigo Equipo</th>       
            <th>Descripcion</th>
            <th>Des</th>
            <th>Dua</th>
            <th>Estado</th>
            <th>Est.Alm</th>                     
            <th>Seleccionar</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 	
	echo 'DATOS'	;
		//$n_item=$_REQUEST['n_item'];
		echo $tipo=$_REQUEST['tipo'];
		//echo $clase=$_REQUEST['clase'];
		foreach($this->model->ListarEquipos($_REQUEST['c_codprd'], $clase) as $equi){
			$nombre= $equi->c_nomgen;
			?>	
			
        <tr>
          <td><?php echo $equi->c_nserie; ?></td>
          <td><?php echo $idequipo=$equi->c_idequipo; ?></td>
          <td><?php echo $equi->IN_ARTI; ?></td>
          <td><?php echo $equi->c_fisico2; ?></td>
          <td><?php echo $refnaci=$equi->c_refnaci; 
		  if($refnaci=="" ){ echo '<font color="#FF0000">SIN NACIONALIZAR';} ?></td>
          <td><?php echo $equi->c_codsit; ?></td> 
          <td><?php echo $equi->c_codsitalm; ?></td>          
          <td> 
          <?php 
		  //&& $tipo=='001' && $clase=='001'
		  if($equi->c_refnaci=="" &&  $tipo=='001' & ($clase!='001' || $clase!='003')){ 
		            	 echo 'venta y sin dua';
		  ?>
          
 
		  <?php 
		  }else{ 
		  
		  ?>
          <a href="javascript:pon_prefijo('<?php echo $idequipo?>','<?php echo $_REQUEST['i']?>','<?php echo $_REQUEST['c_codcont']?>','<?php echo $_REQUEST['ncoti']?>' )">
          <span class="glyphicon glyphicon-check"></span></a>
                   
           </td>          
          <?php }?>
        </tr>
    <?php } ?>    	
   
    </tbody>
   
<?php

//echo $c_codprd=$_REQUEST['c_codprd'];
/*require_once 'model/inventario/procesosasigM.php';
$this->model = new Procesosasig();
$ListaEquipo = $this->model->ListarEquipos($c_codprd);	*/	
?>

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
	
	
	function pon_prefijo(idequipo,i,c_codcont,ncoti) {
				
		var c_codcontedi= document.getElementById('c_codcont'+i).value;//codigo anterior editado		
		//location.href="?c=inv02&a=ActualizarEstEquipo&idequipo="+idequipo; 	
		   jQuery.ajax({
                url: '?c=inv02&a=ActualizarEstEquipo',
                type: "post",
                dataType: "json",
                data: {
                    idequipo: idequipo, //codsel
					c_codcont:c_codcontedi, //codanterior
					ncoti:ncoti
                }
            })
			
		document.getElementById('c_codcont'+i).value=idequipo;
		document.getElementById('re'+i).checked=true;
		document.getElementById('cancelar').value='0';	
		$('#my_modal').modal('toggle');	//cerrar
		
	}
</script>
