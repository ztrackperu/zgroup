<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-danger">
        <div class="panel-heading">Buscar Cronograma por Rango de Fechas de Vencimiento</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Numero de Ruc</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Cliente o num de Ruc, espere el autocompletado....">
						  <input type="hidden" class="form-control" id="txtCodcli" name="txtCodcli" placeholder="Numero de Ruc">
						</div>
					</div>
					<div class="form-group hide">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnMostrar">Buscar por Cliente</button>
						  <button type="button" class="btn btn-success" id="btnMostrarTodos">Buscar Todos</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Fecha Inicial</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control" id="txtFechaI" value="01/01/2020" name="txtFechaI" required placeholder="Fecha Inicial">
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Fecha Final</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control" value="01/01/2020" id="txtFechaF" name="txtFechaF" required placeholder="Fecha Inicial">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">						
						  <button type="button" class="btn btn-success" id="btnRango">Buscar</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<div class="panel panel-success">
        <div class="panel-heading"> Datos de los Cronogramas </div>
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
								<th>Id</th>
								<th>Item</th>
								<th>Num Cotizacion</th>
								<th>Cliente</th>
								<th>Meses</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Usuario</th>
								<th>Producto</th>
								<th>Codigo</th>
								<th>Moneda</th>
								<th>Importe</th>
								<th>Glosa</th>
								<th>Fecha Venc</th>
								<th>Num Factura</th>
								<th>Facturado</th>
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
	
<div class="modal fade" id="my_modaltc" tabindex="-1" role="document" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-lg modal-dialog-centered">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Detalle de Cronograma</h4>
            </div>
            <div class="modal-body">
			<input type="hidden" class="form-control" id="numped" name="numped">
              <form>
						<table id="example2" data-page-length='6' class="table table-bordered table-striped">              
							<thead>
								<th>Item</th>
								<th>Producto</th>
								<th>Codigo</th>
								<th>Importe</th>
								<th>Glosa</th>
								<th>Fec. Venc</th>
								<th>Num Factura</th>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							</tfoot>
						</table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" >Procesar</button>
              </form>
            </div>
          </div>
        </div>
</div>	
</div>
<style>
.modal-body {
       max-height:500px;
       overflow:auto;
}
.modal-dialog {
    width: 900px;
    margin: 70px auto;
}
</style>
<script>
  $(document).ready(function(){
	$('#my_modaltc').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var numped = button.data('numped') // Extract info from data-* attributes 
  var modal = $(this)
  modal.find('.modal-body  #numped').val(numped) 
  	$("#example2").dataTable().fnDestroy();			 		 	
		var tabla=$('#example2').dataTable( {
		"ajax": {
		"url": "indexa.php?c=15&a=BuscarDetCronograma",
		"data": function ( d ) {
		return $.extend( {}, d, {
		"busqueda": numped
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

})

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
							CC_RUC: item.CC_RUC
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtCliente").val(ui.item.CC_RAZO);
            $("#txtCodcli").val(ui.item.CC_RUC);

          
        }
    })

		 $("#MostrarInformacion").hide();	
			$("#btnMostrar").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var codcli=$("#txtCodcli").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexa.php?c=15&a=BuscarCronogramaxRuc",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"busqueda": codcli
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

			$("#btnMostrarTodos").click(function(){
			$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var codcli=$("#txtCodcli").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexa.php?c=15&a=BuscarCronogramaTodos",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"busqueda": codcli
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
	
	$("#btnRango").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var txtFechaI=$("#txtFechaI").val();			 	
			  var txtFechaF=$("#txtFechaF").val();			 	
			  var txtCodcli=$("#txtCodcli").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexa.php?c=15&a=BuscarCronogramaxRango",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"txtFechaI": txtFechaI,
							"txtFechaF": txtFechaF,
							"txtCodcli": txtCodcli
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
<script>
 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
//  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
      $( "#txtFechaF" ).datepicker();
   	  $( "#txtFechaI" ).datepicker();

 });
</script>