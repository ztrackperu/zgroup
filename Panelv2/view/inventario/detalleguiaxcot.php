<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Buscar Detalles Guia por Numero de Cotizacion</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Numero de Cotizacion</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Num Cotizacion, espere el autocompletado....">
						  <input type="hidden" class="form-control" id="txtnumped" name="txtnumped" placeholder="Numero de cot">
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
        <div class="panel-heading"> Guias del detalle de cotizacion</div>
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
								<th>Num Guia</th>
								<th>Fecha Guia</th>
								<th>Cliente</th>
								<th>EIR</th>
								<th>Equipo</th>
								<th>Cantidad</th>
								<th>Producto</th>
								<th>Obs Prod</th>	
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
				 url: '?c=inv12&a=BuscarCotizacion', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
					console.log(data);
                    response($.map(data, function (item) {
                        return {							
                            id: item.c_numped,
                            value:item.c_numped+"-"+item.c_nomcli,
							c_nomcli: item.c_nomcli,
							c_numped: item.c_numped
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtCliente").val(ui.item.c_nomcli);
            $("#txtnumped").val(ui.item.c_numped);

          
        }
    })


		 $("#MostrarInformacion").hide();	
			$("#btnMostrar").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var txtnumped=$("#txtnumped").val();			 	
			  var dni=$("#dni").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexinv.php?c=inv12&a=BuscarGuiaxCot",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"busqueda": txtnumped,
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