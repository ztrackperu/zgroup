<div class="container-fluid"> 
 <div class="panel panel-success">
        <div class="panel-heading">AJUSTE DE INVENTARIO</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Buscar Producto</label>
						<div class="col-lg-3">
						  <input type="text" class="form-control" id="txtProducto"  name="txtProducto" required placeholder="Buscar Producto">
						  <input type="hidden" class="form-control" id="txtCodigo"  name="txtCodigo">
						  <input type="hidden" class="form-control" id="txtUnidadMedida"  name="txtUnidadMedida">
						  <input type="hidden" class="form-control" id="txtClase"  name="txtClase">
						   <input type="hidden" id="login" name="login" value="<?php echo $login; ?>" class="form-control input-sm"/>
						</div>
						  <button type="button" class="btn btn-success" id="btnMostrar">Mostrar movimientos de producto</button>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Stock Actual</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control"  id="txtStockActual" name="txtStockActual" required placeholder="Stock Actual" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Stock Ajuste</label>
						<div class="col-lg-2">
						  <input type="number" class="form-control"  id="txtStockAjuste" name="txtStockAjuste"  placeholder="Stock Ajustado" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-primary" id="btnAjustar">Realizar Ajuste de Inventario</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</div>
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE MOVIMIENTOS DE PRODUCTO SELECCIONADO</div>
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
									<th>N°</th> 
									<th>Codigo</th>        
									<th>Descripcion</th>
									<th>Serie Equipo</th> 
									<th>Tipo de Producto</th> 
									<th>UM</th> 
									<th>Cant</th>          
									<th>Observacion</th>          
									<th>Moneda</th>          
									<th>Costo Unitario</th>               
									<th>Num Ot</th>
									<th>Num Cotizac.</th>
									<th>Cliente</th>
									<th>Fecha</th>
									<th>T/M</th> 
									<th>T/D</th>
									<th>Numero</th>           
									<th>Remision</th>
									<th>Razon Social</th>
									<th>Ruc</th>
									<th>Ejecuta</th>
									<th>O/Compra</th>
									<th>Cod/Rem</th>
									<th>Usuario</th>
									<th>Motivo</th>
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
	  
	
	$("#txtProducto").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				 url: '?c=con2&a=ProductoBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
					console.log(data);
                    response($.map(data, function (item) {
                        return {							
                            id: item.IN_CODI,
                            value: item.IN_ARTI,
							IN_CODI: item.IN_CODI,
							IN_UVTA: item.IN_UVTA,
							COD_CLASE: item.COD_CLASE,
							IN_STOK: item.IN_STOK
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtProducto").val(ui.item.id);
            $("#txtStockActual").val(ui.item.IN_STOK);
            $("#txtCodigo").val(ui.item.IN_CODI);
            $("#txtUnidadMedida").val(ui.item.IN_UVTA);
            $("#txtClase").val(ui.item.COD_CLASE);         
        }
    })
  
  
	$("#MostrarInformacion").hide();
	
	$("#btnAjustar").click(function(){
		var txtCodigo=$("#txtCodigo").val();	
		var txtStockActual=$("#txtStockActual").val();	
		var txtStockAjuste=$("#txtStockAjuste").val();			 
		var txtUnidadMedida=$("#txtUnidadMedida").val();			 
		var txtClase=$("#txtClase").val();			 
		var login=$("#login").val();			 
			if(txtStockActual > txtStockAjuste){
				 var stock_insert= Number(txtStockAjuste - txtStockActual).toFixed(2);
			}else{
				 var stock_insert= Number(txtStockAjuste - txtStockActual).toFixed(2);
			}				
		
			if(txtStockAjuste=='' || txtStockAjuste < 0){
				alert("La cantidad a ajustar debe ser mayor a Cero o no debe estar vacia");
				
			}
			else{	
			alert("La cantidad a Ajustar es: " + stock_insert + "\n" + "El stock Actual es :" + txtStockAjuste);	
			$("#example2").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
				
 					var tabla=$('#example2').dataTable( {
					  "ajax": {
						"url": "?c=con2&a=BuscarNotasxCodigo",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"txtCodigo": txtCodigo,
							"txtStockActual": txtStockActual,
							"txtStockAjuste": txtStockAjuste,
							"stock_insert": stock_insert,
							"txtUnidadMedida": txtUnidadMedida,
							"txtClase": txtClase,
							"login": login
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
		$("#txtCodigo").val('');	
		$("#txtProducto").val('');	
		$("#txtStockActual").val('');	
		$("#txtStockAjuste").val('');			 
		$("#txtUnidadMedida").val('');			 
		$("#txtClase").val('');			
				
			}
		
		});	
		
		$("#btnMostrar").click(function(){
		var txtCodigo=$("#txtCodigo").val();				 				
			if(txtCodigo=='' ){
				alert("La descripcion del producto no debe estar vacia");
				
			}
			else{	
			$("#example2").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 				
 					var tabla=$('#example2').dataTable( {
					  "ajax": {
						"url": "?c=con2&a=BuscarSoloNotasxCodigo",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"txtCodigo": txtCodigo
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