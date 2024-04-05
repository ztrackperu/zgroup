
<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-todos-equipos-container">
    <div class="panel panel-success">
        <div class="panel-heading">Historial de Equipo buscado</div>
		<form class="form-horizontal" role="form">
        <div class="panel-body">			
			</br>
			<div class="row">
				<div class="col-lg-12">			
					<div class="box-body table-responsive no-padding">
						<table id="example" class="table table-bordered table-striped table-hover">              
							<thead  class="active">
								<th>N°</th>
								<th>Id Equipo</th>
								<th>Descripcion</th>
								<th>Codigo Anterior</th>
								<th>Estado Sistema</th>
								<th>Estado Almacen</th>
								<th>Categoria</th>								
								<th>Tipo de Corte</th>								
								<th>Maquina</th>								
								<th>Estado Maquina</th>								
								<th>Destino</th>								
								<th>Luminaria</th>								
								<th>Cortinas</th>								
								<th>Circulina</th>								
								<th>Zona Origen</th>															
								<th>Ubicacion Origen</th>
								<th>Zona Actual</th>															
								<th>Ubicacion Actual</th>
								<th>Fecha</th>
								<th>Motivo</th>
							</thead>
							<tbody>
							<tr>
								<?php
								$i=1;
								foreach($this->model->EquiposBuscarxHistorial($_REQUEST["cod"],$_REQUEST["equipo"],$_REQUEST["serieant"]) as $Historial):?>
								<td><?php echo $i ?></td>
								<td><?php echo $Historial->c_idequipo ?></td> 
								<td><?php echo $Historial->nombre_producto ?></td> 
								<td><?php echo $Historial->c_serieant ?></td> 
								<td><?php echo $Historial->c_codsit ?></td> 
								<td><?php echo $Historial->c_codsitalm ?></td> 
								<td><?php echo $Historial->categoria ?></td> 
								<td><?php echo $Historial->u_tipo_corte ?></td> 
								<td><?php echo $Historial->u_maquina ?></td> 
								<td><?php echo $Historial->u_estado_maquina ?></td> 
								<td><?php echo $Historial->u_destino ?></td> 
								<td><?php echo $Historial->u_luminaria ?></td> 
								<td><?php echo $Historial->u_cortinas ?></td> 
								<td><?php echo $Historial->u_circulina ?></td> 
								<td><?php echo $Historial->zona_origen ?></td> 
								<td><?php echo $Historial->u_origen ?></td> 
								<td><?php echo $Historial->zona_actual ?></td> 
								<td><?php echo $Historial->u_actual ?></td> 
								<td><?php echo $Historial->fecha ?></td> 
								<td><?php echo $Historial->motivo ?></td> 
							</tr>
								<?php
								$i++;
								endforeach;
								?>
							</tbody>
							<tfoot>
							</tfoot>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</form>		
	</div>
</div>
<script>
  $(document).ready(function(){
	$("#example").dataTable().fnDestroy();		
		var tabla=$('#example').dataTable( {
		"language": idioma_espanol,  	  	  
		dom			: 'Bfrtip',
		ordering: true,
		 // title			:'ListaPersonal'
		 buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			//'pdfHtml5',
			{//valores por defecto orientation:'portrait' and pageSize:'A4',
						extend: 'pdfHtml5',
					//	title: 'ListaPersonal'
						orientation: 'landscape',
						pageSize: 'A4'
			},
			]
			});	
		
	var idioma_espanol = {    
       "sProcessing":      "Procesando...",
           "sLengthMenu":      "Mostrar _MENU_ registros",
           "sZeroRecords":     "No se encontraron resultados",
           "sEmptyTable":      "Ningún dato disponible en esta tabla",
           "sInfo":            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
           "sInfoEmpty":       "Mostrando registros del 0 al 0 de un total de 0 registros",
           "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
           "sInfoPostFix":     "",
           "sSearch":          "Buscar:",
           "sUrl":             "",
           "sInfoThousands":   ",",
           "sLoadingRecords": "Cargando...",
           "oPaginate": {        
           "sFirst":     "Primero",
                   "sLast":      "Último",
                   "sNext":      "Siguiente",
                   "sPrevious": "Anterior"    
       },
           "oAria": {        
           "sSortAscending":   ": Activar para ordenar la columna de manera ascendente",
                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"    
       }
   }	
	
    });			

    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
</script>

