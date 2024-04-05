    <!--usado para registrar asignacion sin cotizacion y guia sin doc-->	
    <thead>        	 
        <tr>
            <th>Codigo Producto</th> 
            <th>Descripcion</th>       
            <th>Unidad</th>
            <th>Stock</th>
            <th>Tipo</th>                                            
            <th>Seleccionar</th>          
        </tr>        
        
    </thead>
    <tbody>
        <?php 		
		//$n_item=$_REQUEST['n_item'];
		$docu='NOTA DE SALIDA'; //Asig o Guia
		$tipoprod = "";
		foreach($ProductoBuscar["result"] as $equi){
		$c_equipo=$equi->c_equipo;
			if($c_equipo=='1'){
				$tipoprod='<font color="#FF0000">Kardex Detallado</font>';
			}else if($c_equipo=='2'){
				$tipoprod='Repuestos';
			}else if($c_equipo=='3'){
				$tipoprod='Insumos';
			}
			$IN_COST=$equi->IN_COST;
			$COD_CLASE=$equi->COD_CLASE;
		?>     
        <tr>
          <td><?= $IN_CODI=$equi->IN_CODI; ?></td>
          <td><?= $IN_ARTI=htmlspecialchars(utf8_encode($idequipo=$equi->IN_ARTI)); ?></td>
          <td><?= $IN_UVTA=$equi->IN_UVTA; ?></td>
          <td><?= $IN_STOK=$equi->IN_STOK; ?></td> 
          <td><?= $tipoprod; ?></td>                   
          <td> <a href="javascript:pon_prefijo('<?= $IN_CODI;?>','<?= $IN_ARTI;?>','<?= $IN_UVTA;?>','<?= $IN_STOK;?>','<?= $IN_COST;?>','<?= $c_equipo;?>','<?= $COD_CLASE;?>')"><span class="glyphicon glyphicon-check"></span></a> </td>                    
        </tr>
    <?php } ?>    	   
    </tbody>
    <div style="display:none;"><pre><?= $ProductoBuscar['sql']; ?></pre></div>
<script>
	function pon_prefijo(IN_CODI,IN_ARTI,IN_UVTA,IN_STOK,IN_COST,c_equipo,COD_CLASE) {		
		document.getElementById('c_codprd').value=IN_CODI;	
		document.getElementById('c_desprd').value=IN_ARTI;
		document.getElementById('descripcion').value=IN_ARTI;
		document.getElementById('NT_CUND').value=IN_UVTA;
		document.getElementById('IN_STOK').value=IN_STOK;
		document.getElementById('NT_PREC').value=IN_COST;
		document.getElementById('c_producto').value=COD_CLASE;
		document.getElementById('COD_CLASE').value=COD_CLASE;
		$('#my_modalProd').modal('toggle');	//cerrar		
	}
</script>
