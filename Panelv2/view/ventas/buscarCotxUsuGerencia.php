<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<input type="hidden" name="txtusuario" id="txtusuario" value="<?=$user?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Buscar Cotizacion</div>
        <div class="panel-body">
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
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Usuario</label>
						<div class="col-lg-2">
						  <select class="form-control input-sm" name="txtusuario2" id="txtusuario2" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="MATILDE">MATILDE AMENERO</option>
								<option value="LEIDY">LEIDY ESPIRITU Z.</option>
								<option value="HEIDY">HEIDY ZABARBURU</option>
								<option value="FLORENT">FLORENT PHILIPPOT</option>
								<option value="JLINARES">JOEL LINARES</option>
								<option value="MYOGHI">MEYBI YOGHI</option>
								<option value="DGIRON">DEYSI GIRON</option>
								<option value="CSAIRE">CRISTOFER SAIRE</option>
								<option value="SMEZA">SEBASTIAN MEZA</option>
								<option value="LESPINOZA">LESLIE ESPINOZA</option>																				
								<option value="LJANAMPA"> LUZ JANAMPA</option>																				
								<option value="SDELGADO"> STEFANY DELGADO</option>																				
								<option value="ISANCHEZ"> ILIANA SANCHEZ</option>																				
								<option value="LQUEZADA"> LIZBETH QUEZADA </option>																				
								<option value="AZABARBURU"> ANGIE ZABARBURU</option>																				
								<option value="CCUBAS"> CAMILA CUBAS</option>
								<option value="PORSI"> ORSI PATRICIA</option>																				
								<option value="KCASTILLO">KIARA CASTILLO</option>																				
								<option value="SCASTILLO"> KATHERINE CASTILLO</option>																				
								<option value="RTACSI"> TACSI RENZO</option>																						
								<option value="CMORAN"> MORAN C</option>																						
								<option value="KAREVALO"> KARINA AREVALO</option>																						
								<option value="VMARTINEZ"> VANIA MARTINEZ</option>																						
								<option value="NCORDOVA"> NAYELI CORDOVA</option>																						
								<option value="AMORALES"> AXEL MORALES</option>																						
								<option value="TODOS">TODOS</option>																				
							</select>
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
        <div class="panel-heading"> Datos de la busqueda Ingresada</div>
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
								<th>Contacto</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Asunto</th>
								<th>Fecha</th>
								<th>Usuario Crea</th>
								<th>Usuario Aprueba</th>
								<th>Fecha de Aprobacion</th>
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
		 $("#MostrarInformacion").hide();	
	$("#btnRango").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var txtFechaI=$("#txtFechaI").val();			 	
			  var txtFechaF=$("#txtFechaF").val();			 		 	
			  var txtusuario=$("#txtusuario").val();			 		 	
			  var txtusuario2=$("#txtusuario2").val();			 		 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexa.php?c=17&a=BuscarCotizacionxUsuGerencia",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"txtFechaI": txtFechaI,
							"txtFechaF": txtFechaF,
							"txtusuario": txtusuario,
							"txtusuario2": txtusuario2
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