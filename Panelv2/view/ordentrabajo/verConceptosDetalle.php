<!--usado para registrar asignacion sin cotizacion y guia sin doc-->	
    <thead>        	 
        <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Serie y/o Codigo de Equipo" />
          </td>
        </tr>
        <tr>
           
            <th>Codigo </th>       
            <th>Descripcion</th>                                           
            <th>Seleccionar</th>          
            
        </tr>        
        
    </thead>
    <tbody>
    
    <?php 		
		//$n_item=$_REQUEST['n_item'];
		$docu='ORDEN TRABAJO'; //Asig o Guia
		foreach($this->model->ListraConceptosDetalleOTM($_REQUEST['c_codtarea']) as $equi){?>	
	
        <tr>
          <td><?php echo $codigo=$equi->codigo; ?></td>
          <td><?php echo $descrip=strtoupper($equi->descrip); ?></td>                 
          <td> <a href="javascript:pon_prefijo('<?php echo $codigo?>','<?php echo strtoupper($descrip)?>')"><span class="glyphicon glyphicon-check"></span></a> </td>          
          
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
        $TableFilter("#tablaconceptodet", this.value);
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
	
	
	function pon_prefijo(codigo,descrip) {		
		
	
		document.getElementById('c_codtareadet').value=codigo;
		document.getElementById('c_destareadet').value=descrip;
		//document.getElementById('C_SITUANT').value=c_codsitalm;
		$('#my_modalconceptosdet').modal('toggle');	//cerrar
		
	}
</script>
