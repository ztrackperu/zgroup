<div class="container-fluid"> 
 <div class="panel panel-success">
        <div class="panel-heading">Seleccion tipo de producto.</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Seleccione tipo de Equipo</label>
						<div class="col-lg-4">
						  <select class="form-control input-sm" name="tipo_producto" id="tipo_producto" > 
								<option value="000">SELECCIONE</option>
								<option value="001">DRY</option>
								<option value="002">REEFER</option>
								<option value="026">ISOTERMICO</option>
								<option value="003">GENERADORES</option>
								<option value="030">GPS</option>
								<option value="012">TRANSFORMADOR</option>
								<option value="004">CARRETA</option>
								<option value="015">MODULOS</option>
								<option value="021">MAQUINAS</option>
								<option value="022">MADURADOR</option>
								<option value="005">EQUIPO AIRE ACONDICIONADO</option>
								<option value="000">OTROS PRODUCTOS</option>
								<option value="012">POWER PACK</option>								
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnMostrar">Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE PRODUCTOS DETALLADOS</div>
	<div id="FacturasListaLoadMSG">           
    </div>
    <div class="panel-body" id="MostrarInformacion" style="display:none">			
			</br>
			<div class="row">
				<div class="col-lg-12">
					<div class="box-body table-responsive no-padding">
						 <table id="example2" class="table table-bordered table-striped" style="width: 100%;">
								<thead>
								   <tr>
									 <td>Nº</td>
									 <td>Codigo</td>
									 <td>Producto</td>
									 <td>Dispo</td>             
									 <td>Alqui</td>
									 <td>Ruta</td>
									 <td>Activo Disponible</td>
									 <td>Activo Alquilado</td>
									 <td>No Habido</td>
									 <td>Almacenaje</td>
									</tr>
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
</div>
</body>
   
<script>
  $(document).ready(function(){
		 $("#MostrarInformacion").hide();	
			$("#btnMostrar").click(function(){
				$("#example2").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var tipo_producto=$("#tipo_producto").val();			 				 	
			  var udni=$("#udni").val();			 	
					var tabla=$('#example2').dataTable( {
					  "ajax": {
						"url": "indexinv.php?c=rep01&a=ProductoDetalladoBuscar",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"tipo_producto": tipo_producto,
							"dni": udni
						  } );
						}	
					  },
					"language": idioma_espanol,  	  
	  
	  
	    dom			: 'Bfrtip',
	  ordering: true,
	  pageLength: 20,
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
		});	
	var idioma_espanol = {    
       "sProcessing":      "Procesando...",
           "sLengthMenu":      "Mostrar _MENU_ registros",
           "sZeroRecords":     "No se encontraron resultados",
           "sEmptyTable":      "Ning?n dato disponible en esta tabla",
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
                   "sLast":      "?ltimo",
                   "sNext":      "Siguiente",
                   "sPrevious": "Anterior"    
       },
           "oAria": {        
           "sSortAscending":   ": Activar para ordenar la columna de manera ascendente",
                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"    
       }
   }	
//$link2 = 'indexinv.php?c=inv01&a=Editar&mod=1&udni='.$udni.'&data-id='.$data[$i]->c_idequipo.'&data-ref='.$data[$i]->c_fisico2.'&data-pti='.$data[$i]->pti.'&data-c_codalm='.$data[$i]->c_codalm.'&data-tipo='.$data[$i]->tipo.'&data-c_codmar='.$data[$i]->c_codmar.'&data-c_anno='.$data[$i]->c_anno;
  })
</script>