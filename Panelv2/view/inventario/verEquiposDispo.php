<!--usado para registrar asignacion sin cotizacion y guia sin doc-->	
    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese a Serie y/o Codigo de Equipo.." />
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
		//$n_item=$_REQUEST['n_item'];
		$docu=$doctemporal; //Asig o Guia

		foreach($this->model->ListarEquipos($_REQUEST['c_codprd']) as $equi){?>	
	
        <tr>
          <td><?php echo $c_nserie=$equi->c_nserie; ?></td>
          <td><?php echo $idequipo=$equi->c_idequipo; ?></td>
          <td><?php echo $equi->IN_ARTI; ?></td>
          <td><?php echo $equi->c_fisico2; ?></td>
          <td><?php echo $refnaci=$equi->c_refnaci; if($refnaci==""){ echo '<font color="#FF0000">SIN NACIONALIZAR';} ?></td>
          <td><?php echo $equi->c_codsit; ?></td> 
          <td><?php echo $equi->c_codsitalm; ?></td>                   
          <td> 
          
          
          <a href="javascript:pon_prefijo('<?php echo $c_nserie?>','<?php echo $idequipo?>','<?php echo $docu?>')"><span class="glyphicon glyphicon-check"></span></a> </td>          
         
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
	
	
	function pon_prefijo(c_nserie,idequipo,docu) {		
		var c_codcontedi= document.getElementById('c_codcont').value;//codigo anterior editado	
		var ncoti=docu;	//Asig o Guia
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
	
		document.getElementById('c_codcont').value=idequipo;	
		//document.getElementById('c_nserie').value=c_nserie;
		$('#my_modal').modal('toggle');	//cerrar
		
	}
</script>
