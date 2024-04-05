<!--usado para registrar asignacion sin cotizacion y guia sin doc-->	
    <thead>        	 
        <!--<tr>
          <td colspan="7">
            <input id="buscar" name="buscar" value="dry" type="text" class="form-control" placeholder="Ingrese Descripcion y/o Codigo de Producto" onkeyup="enviar()"  />
          </td>
        </tr>-->
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
		foreach($ProductoBuscar as $equi){
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
          <td><?php echo $IN_CODI=$equi->IN_CODI; ?></td>
          <td><?php echo $IN_ARTI=utf8_encode($idequipo=$equi->IN_ARTI); ?></td>
          <td><?php echo $IN_UVTA=$equi->IN_UVTA; ?></td>
          <td><?php echo $IN_STOK=$equi->IN_STOK; ?></td> 
          <td><?php echo $tipoprod; ?></td>                   
          <td> <a href="javascript:pon_prefijo('<?php echo $IN_CODI?>','<?php echo $IN_ARTI?>','<?php echo $IN_UVTA?>','<?php echo $IN_STOK?>','<?php echo $IN_COST?>','<?php echo $c_equipo?>','<?php echo $COD_CLASE?>')"><span class="glyphicon glyphicon-check"></span></a> </td>          
          
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
	
	function pon_prefijo(IN_CODI,IN_ARTI,IN_UVTA,IN_STOK,IN_COST,c_equipo,COD_CLASE) {		
		//var c_codcontedi= document.getElementById('c_codcont').value;//codigo anterior editado	
		//var ncoti=docu;	//Asig o Guia
		  /* jQuery.ajax({
                url: '?c=not01&a=ActualizarEstEquipo',
                type: "post",
                dataType: "json",
                data: {
                    idequipo: idequipo, //codsel
					c_codcont:c_codcontedi, //codanterior
					ncoti:ncoti
                }
            })*/	
	
		document.getElementById('c_codprd').value=IN_CODI;	
		document.getElementById('c_desprd').value=IN_ARTI;
		document.getElementById('descripcion').value=IN_ARTI;
		document.getElementById('NT_CUND').value=IN_UVTA;
		document.getElementById('IN_STOK').value=IN_STOK;
		document.getElementById('NT_PREC').value=IN_COST;
		document.getElementById('c_producto').value=c_equipo;
		document.getElementById('COD_CLASE').value=COD_CLASE;
		$('#my_modalProd').modal('toggle');	//cerrar
		
	}
</script>
