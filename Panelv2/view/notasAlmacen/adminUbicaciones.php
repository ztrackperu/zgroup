<style>
/*
Full screen Modal 
*/
.modal-dialog-full {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content-full {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}

</style>

<!--modal de eliminacion de Equipo Temporal-->
<div class="modal fade" id="open_my_modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="liberarUbicacion" class="form-horizontal" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel">Liberar  Ubicacion</h5>
                </div>
                <div class="modal-body bg-danger">
					<div class="form-group">
                        <label class="control-label col-xs-4">Equipo:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="c_idequipo" name="c_idequipo" placeholder="serie" readonly />
                           <input type="hidden" class="form-control" id="c_codprd" name="c_codprd" readonly />
                           <input type="hidden" class="form-control" id="c_serieant" name="c_serieant" readonly />
                           <input type="hidden" class="form-control" id="c_codsit" name="c_codsit" readonly />
                           <input type="hidden" class="form-control" id="c_codsitalm" name="c_codsitalm" readonly />
                           <input type="hidden" class="form-control" id="categoria" name="categoria" readonly />
                           <input type="hidden" class="form-control" id="u_tipo_corte" name="u_tipo_corte" readonly />
                           <input type="hidden" class="form-control" id="u_maquina" name="u_maquina" readonly />
                           <input type="hidden" class="form-control" id="u_estado_maquina" name="u_estado_maquina" readonly />
                           <input type="hidden" class="form-control" id="u_destino" name="u_destino" readonly />
                           <input type="hidden" class="form-control" id="u_luminaria" name="u_luminaria" readonly />
                           <input type="hidden" class="form-control" id="u_cortinas" name="u_cortinas" readonly />
                           <input type="hidden" class="form-control" id="u_circulina" name="u_circulina" readonly />
                           <input type="hidden" class="form-control" id="id_ubicacion" name="id_ubicacion" readonly />
                           <input type="hidden" class="form-control" id="codigo_cliente_alquilado" name="codigo_cliente_alquilado" readonly />
                           <input type="hidden" class="form-control" id="zona_actual" name="zona_actual" readonly />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Descripcion de equipo:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="producto" name="producto"  placeholder="descripcion" readonly />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Ubicacion:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="des_ubicacion" name="des_ubicacion"  placeholder="Ubicacion" readonly />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Cliente:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="cliente_alquilado" name="cliente_alquilado"  placeholder="Ubicacion" readonly />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Liberar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--fin modal eliminacion de Equipo Temporal-->

<!--modal de eliminacion de Equipo Temporal-->
<div class="modal fade" id="open_my_modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="actualizarUbicacion" class="form-horizontal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar  Ubicacion</h5>
                </div>
                <div class="modal-body bg-info">
					<div class="form-group">
                        <label class="control-label col-xs-4">Equipo:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="c_idequipo" name="c_idequipo" placeholder="serie" readonly />
                           <input type="hidden" class="form-control" id="c_codprd" name="c_codprd" readonly />
                           <input type="hidden" class="form-control" id="c_serieant" name="c_serieant" readonly />
                           <input type="hidden" class="form-control" id="c_codsit" name="c_codsit" readonly />
                           <input type="hidden" class="form-control" id="c_codsitalm" name="c_codsitalm" readonly />
                           <input type="hidden" class="form-control" id="categoria" name="categoria" readonly />
                           <input type="hidden" class="form-control" id="u_tipo_corte" name="u_tipo_corte" readonly />
                           <input type="hidden" class="form-control" id="u_maquina" name="u_maquina" readonly />
                           <input type="hidden" class="form-control" id="u_estado_maquina" name="u_estado_maquina" readonly />
                           <input type="hidden" class="form-control" id="u_destino" name="u_destino" readonly />
                           <input type="hidden" class="form-control" id="u_luminaria" name="u_luminaria" readonly />
                           <input type="hidden" class="form-control" id="u_cortinas" name="u_cortinas" readonly />
                           <input type="hidden" class="form-control" id="u_circulina" name="u_circulina" readonly />
                           <input type="hidden" class="form-control" id="id_ubicacion" name="id_ubicacion" readonly />
                           <input type="hidden" class="form-control" id="zona_actual" name="zona_actual" readonly />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Descripcion de equipo:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="producto" name="producto"  placeholder="descripcion" readonly />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Ubicacion Actual:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="des_ubicacion" name="des_ubicacion"  placeholder="Ubicacion" readonly />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Seleccione Zona nueva:</label>
                        <div class="col-xs-8">
                           	<select name="c_zona_cambiar" id="c_zona_cambiar" class="form-control input-sm" >
								<option value="">.:SELECCIONE:.</option>
								<?php foreach($this->maestro->ListarUbicacionesZonas() as $ubicacion_zona):	 ?>
								<option value="<?php echo $ubicacion_zona->zona; ?>">
								  <?php echo $ubicacion_zona->zona; ?>
								</option>
								<?php  endforeach;	 ?>
						  </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Seleccione ubicacion nueva:</label>
                        <div class="col-xs-8">
                           	<select name="c_ubicacion_cambiar" id="c_ubicacion_cambiar" class="form-control input-sm" disabled>
						  </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Motivo:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="motivo_cambio" name="motivo_cambio"  placeholder="Motivo" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--fin modal eliminacion de Equipo Temporal-->
<!--modal de eliminacion de Equipo Temporal-->
<div class="modal fade" id="my_modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="registrarUbicacion" class="form-horizontal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Ubicacion</h5>
                </div>
                <div class="modal-body bg-primary">
					<div class="form-group">
                        <label class="control-label col-xs-4">Zona:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="txtZona" name="txtZona" placeholder="Zona" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Ubicacion:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="txtUbicacion" name="txtUbicacion"  placeholder="Ubicacion" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Registrar Ubicacion</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--fin modal eliminacion de Equipo Temporal-->

<!--modal de eliminacion de Equipo Temporal-->
<div class="modal fade fullscreen-modal" id="my_modalVerUbicaciones" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h5 class="modal-title" id="exampleModalLabel">Ver Ubicaciones</h5>
			</div>
			<div class="modal-body">
				<div class="box-body table-responsive no-padding">
					<table id="ubicaciones" class="table table-bordered table-striped table-hover">              
						<thead  class="active">
							<th>N°</th>
							<th>Zona</th>
							<th>Descripcion</th>
							<th>Estado</th>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
						</tfoot>
					</table>
				</div>	
			</div>		
        </div>
    </div>
</div>
<!--fin modal eliminacion de Equipo Temporal-->

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid listado-todos-equipos-container">

	<div class="panel panel-danger">
			<div class="panel-heading">Accion</div>
				<div class="panel-body">
					<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#my_modalagregar">Agregar Ubicaciones Nuevas</button>
					<button type="button" id="btn-ubicaciones" class="btn btn-warning" data-toggle="modal" data-target="#my_modalVerUbicaciones">Ver Ubicaciones</button>
				</div>
	</div>
    <div class="panel panel-danger">
        <div class="panel-heading">Buscar Equipos por Zona</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Seleccione la Zona</label>
						<div class="col-lg-4">
						  <select name="c_zona" id="c_zona" class="form-control input-sm">
							<option value="">.:SELECCIONE:.</option>
							<?php foreach($this->maestro->ListarUbicaciones() as $ubicacion):	 ?>
							<option value="<?php echo $ubicacion->zona; ?>">
							  <?php echo $ubicacion->zona; ?>
							</option>
							<?php  endforeach;	 ?>
						  </select>
						</div>
					</div>
					<input type="hidden" class="form-control" id="dni"  name="dni" value="<?php echo $udni ?>  ">
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnMostrar">Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <div class="panel panel-danger">
        <div class="panel-heading"> Datos de los Equipos Buscados por Zona</div>
		<div id="FacturasListaLoadMSG">           
        </div>
		<form class="form-horizontal" role="form">
        <div class="panel-body" id="MostrarInformacion" style="display:none">			
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
								<th>Ubicacion</th>															
								<th>Acciones</th>
							</thead>
							<tbody>
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

	$('#my_modalVerUbicaciones').on('show.bs.modal', function (e) {
		alert("Modal Mostrada con Evento de Boostrap");
		CargarTablaUbicaciones();
	})
  
	  
		 $("#MostrarInformacion").hide();							
			$("#btnMostrar").click(function(){
				var c_zona=$("#c_zona").val();
				var dni=$("#dni").val();
			if(c_zona =='000' || c_zona ==''){
				alert("Debe seleccionar una Zona");		
			}
			else
			{
				$("#example").dataTable().fnDestroy();
				$('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 		  		 				 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "?c=con3&a=EquiposBuscarxZona",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"c_zona": c_zona,
							"dni": dni
						  } );
						}	
					  },
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
				$('#FacturasListaLoadMSG').fadeIn(1000).html('');		
				$("#MostrarInformacion").show();
				
			
			}		
				
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
<script>
      $("#c_ubicacion").prop('disabled', true);        
        // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
        $("#c_zona_cambiar").change(function(){
            // Guardamos el select de cursos
           var c_ubicacion_cambiar = $("#c_ubicacion_cambiar");           
            // Guardamos el select de c_zona_cambiar
            var c_zona_cambiar = $(this);
            
            if($(this).val() != '')
            {
                $.ajax({
                    data: { id : c_zona_cambiar.val() },
                    url:   '?c=con3&a=ListarUbicacionesDisponiblesxZona',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () 
                    {
                        c_zona_cambiar.prop('disabled', true);
                    },
                    success:  function (r) 
                    {
                        c_zona_cambiar.prop('disabled', false);
                        
                        // Limpiamos el select
                        c_ubicacion_cambiar.find('option').remove();
                        
                        $(r).each(function(i, v){ // indice, valor
                            c_ubicacion_cambiar.append('<option value="' + v.id_ubicacion + '">' + v.des_ubicacion + '</option>');
                        })
                        
                        c_ubicacion_cambiar.prop('disabled', false);
                    },
                    error: function()
                    {
                        alert('Ocurrio un error en el servidor ..');
                        c_zona_cambiar.prop('disabled', false);
                    }
                });
            }
            else
            {
                c_ubicacion_cambiar.find('option').remove();
                c_ubicacion_cambiar.prop('disabled', true);
            }
        })


$('#open_my_modal4').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var c_idequipo = button.data('c_idequipo'); // Extract info from data-* attributes
  var c_codprd = button.data('c_codprd'); // Extract info from data-* attributes
  var producto = button.data('producto'); // Extract info from data-* attributes
  var c_serieant = button.data('c_serieant'); // Extract info from data-* attributes
  var c_codsit = button.data('c_codsit'); // Extract info from data-* attributes
  var c_codsitalm = button.data('c_codsitalm'); // Extract info from data-* attributes
  var categoria = button.data('categoria'); // Extract info from data-* attributes
  var u_tipo_corte = button.data('u_tipo_corte'); // Extract info from data-* attributes
  var u_maquina = button.data('u_maquina'); // Extract info from data-* attributes
  var u_estado_maquina = button.data('u_estado_maquina'); // Extract info from data-* attributes
  var u_destino = button.data('u_destino'); // Extract info from data-* attributes
  var u_luminaria = button.data('u_luminaria'); // Extract info from data-* attributes
  var u_cortinas = button.data('u_cortinas'); // Extract info from data-* attributes
  var u_circulina = button.data('u_circulina'); // Extract info from data-* attributes
  var des_ubicacion = button.data('des_ubicacion'); // Extract info from data-* attributes
  var id_ubicacion = button.data('id_ubicacion'); // Extract info from data-* attributes
  var cliente_alquilado = button.data('cliente'); // Extract info from data-* attributes
  var codigo_cliente_alquilado = button.data('codigo_cliente_alquilado'); // Extract info from data-* attributes 
  var zona_actual = button.data('zona_actual'); // Extract info from data-* attributes 
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-body #c_idequipo').val(c_idequipo);
  modal.find('.modal-body #c_codprd').val(c_codprd); 
  modal.find('.modal-body #producto').val(producto);
  modal.find('.modal-body #c_serieant').val(c_serieant);
  modal.find('.modal-body #c_codsit').val(c_codsit);
  modal.find('.modal-body #c_codsitalm').val(c_codsitalm);
  modal.find('.modal-body #categoria').val(categoria);
  modal.find('.modal-body #u_tipo_corte').val(u_tipo_corte);
  modal.find('.modal-body #u_maquina').val(u_maquina);
  modal.find('.modal-body #u_estado_maquina').val(u_estado_maquina);
  modal.find('.modal-body #u_destino').val(u_destino);
  modal.find('.modal-body #u_luminaria').val(u_luminaria);
  modal.find('.modal-body #u_cortinas').val(u_cortinas);
  modal.find('.modal-body #u_circulina').val(u_circulina);
  modal.find('.modal-body #des_ubicacion').val(des_ubicacion);
  modal.find('.modal-body #id_ubicacion').val(id_ubicacion);
  modal.find('.modal-body #cliente_alquilado').val(cliente_alquilado);
  modal.find('.modal-body #codigo_cliente_alquilado').val(codigo_cliente_alquilado); 
  modal.find('.modal-body #zona_actual').val(zona_actual); 
})

$('#open_my_modal5').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var c_idequipo = button.data('c_idequipo'); // Extract info from data-* attributes
  var c_codprd = button.data('c_codprd'); // Extract info from data-* attributes
  var producto = button.data('producto'); // Extract info from data-* attributes
  var c_serieant = button.data('c_serieant'); // Extract info from data-* attributes
  var c_codsit = button.data('c_codsit'); // Extract info from data-* attributes
  var c_codsitalm = button.data('c_codsitalm'); // Extract info from data-* attributes
  var categoria = button.data('categoria'); // Extract info from data-* attributes
  var u_tipo_corte = button.data('u_tipo_corte'); // Extract info from data-* attributes
  var u_maquina = button.data('u_maquina'); // Extract info from data-* attributes
  var u_estado_maquina = button.data('u_estado_maquina'); // Extract info from data-* attributes
  var u_destino = button.data('u_destino'); // Extract info from data-* attributes
  var u_luminaria = button.data('u_luminaria'); // Extract info from data-* attributes
  var u_cortinas = button.data('u_cortinas'); // Extract info from data-* attributes
  var u_circulina = button.data('u_circulina'); // Extract info from data-* attributes
  var des_ubicacion = button.data('des_ubicacion'); // Extract info from data-* attributes
  var id_ubicacion = button.data('id_ubicacion'); // Extract info from data-* attributes
  var zona_actual = button.data('zona_actual'); // Extract info from data-* attributes
 
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-body #c_idequipo').val(c_idequipo);
  modal.find('.modal-body #c_codprd').val(c_codprd); 
  modal.find('.modal-body #producto').val(producto);
  modal.find('.modal-body #c_serieant').val(c_serieant);
  modal.find('.modal-body #c_codsit').val(c_codsit);
  modal.find('.modal-body #c_codsitalm').val(c_codsitalm);
  modal.find('.modal-body #categoria').val(categoria);
  modal.find('.modal-body #u_tipo_corte').val(u_tipo_corte);
  modal.find('.modal-body #u_maquina').val(u_maquina);
  modal.find('.modal-body #u_estado_maquina').val(u_estado_maquina);
  modal.find('.modal-body #u_destino').val(u_destino);
  modal.find('.modal-body #u_luminaria').val(u_luminaria);
  modal.find('.modal-body #u_cortinas').val(u_cortinas);
  modal.find('.modal-body #u_circulina').val(u_circulina);
  modal.find('.modal-body #des_ubicacion').val(des_ubicacion);
  modal.find('.modal-body #id_ubicacion').val(id_ubicacion);
  modal.find('.modal-body #zona_actual').val(zona_actual);
})
function CargarTabla() {
	$("#example").dataTable().fnDestroy();
	var c_zona_cargar=$("#c_zona").val();
	var tabla_cargar=$('#example').dataTable( {
	 "ajax": {
	"url": "?c=con3&a=EquiposBuscarxZona",
	"data": function ( d ) {
		return $.extend( {}, d, {
			"c_zona": c_zona_cargar
		} );
						}	
		},
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
		
}
function CargarTablaUbicaciones() {
	$("#ubicaciones").dataTable().fnDestroy();
	var tabla_cargar=$('#ubicaciones').dataTable( {
	 "ajax": {
	"url": "?c=con3&a=CargarUbicaciones",
		},
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
		
}
function LimpiarCampos() {
  $('#c_idequipo').val(c_idequipo);
  $('#c_codprd').val(''); 
  $('#producto').val('');
  $('#c_serieant').val('');
  $('#c_codsit').val('');
  $('#categoria').val('');
  $('#u_tipo_corte').val('');
  $('#u_maquina').val('');
  $('#u_estado_maquina').val('');
  $('#u_luminaria').val('');
  $('#u_cortinas').val('');
  $('#u_circulina').val('');
  $('#des_ubicacion').val('');
  $('#id_ubicacion').val('');
  $('#cliente_alquilado').val('');
  $('#codigo_cliente_alquilado').val(''); 
  $('#cliente_alquilado').val(''); 
  $('#codigo_cliente_alquilado').val(''); 
  $('#c_ubicacion').val(''); 
  $('#c_zona_cambiar').val(''); 
  $('#c_ubicacion_cambiar').val(''); 
  $('#c_ubicacion_cambiar').find('option').remove(); 
  $('#c_ubicacion_cambiar').prop('disabled', true);
  $('#motivo_cambio').val(''); 
	
}

	$("#actualizarUbicacion").submit(function(e){
		e.preventDefault();
		var datos=new FormData(this);
		$.ajax({
			url: '?c=con3&a=ActualizarUbicacion',
			data: datos,				
			processData:false,
			contentType:false,
			type: "post",
			success: function(str){		
				alert("Se actualizó correctamente");	
				$('#open_my_modal5').modal('hide');
				LimpiarCampos()
				CargarTabla();
				}
		}); 
	});
	
	$("#liberarUbicacion").submit(function(e){
		e.preventDefault();
		var datos=new FormData(this);
		$.ajax({
			url: '?c=con3&a=liberarUbicacionEquipoNoDisponible',
			data: datos,				
			processData:false,
			contentType:false,
			type: "post",
			success: function(str){		
				alert("Se actualizó correctamente");	
				$('#open_my_modal4').modal('hide');
				LimpiarCampos()
				CargarTabla();
				}
		}); 
	});
	
	$("#registrarUbicacion").submit(function(e){
		e.preventDefault();
		var datos=new FormData(this);
		$.ajax({
			url: '?c=con3&a=registrarUbicacion',
			data: datos,				
			processData:false,
			contentType:false,
			type: "post",
			success: function(str){							
				$('#my_modalagregar').modal('hide');
				alert("Se actualizó correctamente");
				 location.reload();
				}
		}); 
	}); 
</script>
