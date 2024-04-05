<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Buscar Cotizacion por Numero de Ruc</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Numero de Ruc</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Cliente o num de Ruc, espere el autocompletado....">
						  <input type="hidden" class="form-control" id="txtRuc" name="txtRuc" placeholder="Numero de Ruc">
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
	 <div class="panel panel-success">
        <div class="panel-heading"> Datos del Ruc Ingresado</div>
		<div id="FacturasListaLoadMSG">           
        </div>
		<form class="form-horizontal" role="form">
        <div class="panel-body" id="MostrarInformacion" style="display:none">			
			</br>
			<div class="row">
				<div class="col-lg-12">			
					<div class="box-body table-responsive no-padding">
						<table id="example" class="table table-bordered table-striped">              
							<thead>
								<th>Item</th>
								<th>Num Cotizacion</th>
								<th>Ruc</th>
								<th>Cliente</th>
								<th>Asunto</th>
								<th>Fecha</th>
								<th>Usuario Crea</th>
								<th>Usuario Aprueba</th>
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
	</form>		
	</div>
</div>

<script>
  $(document).ready(function(){

		$("#txtCliente").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				 url: '?c=14&a=ClienteBuscar2', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
					console.log(data);
                    response($.map(data, function (item) {
                        return {							
                            id: item.CC_NRUC,
                            value:item.CC_NRUC+"-"+item.CC_RAZO,
							CC_RAZO: item.CC_RAZO,
							CC_NRUC: item.CC_NRUC
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtCliente").val(ui.item.CC_RAZO);
            $("#txtRuc").val(ui.item.CC_NRUC);

          
        }
    })


		 $("#MostrarInformacion").hide();	
			$("#btnMostrar").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var ruc=$("#txtRuc").val();			 	
			  var dni=$("#dni").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexa.php?c=14&a=BuscarCotizacionxRuc",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"busqueda": ruc,
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
</script>