<div class="container-fluid"> 
 <div class="panel panel-danger">
        <div class="panel-heading">Notas por rango de fecha</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese fecha de inicio</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control" id="txtFechaI"  name="txtFechaI" required placeholder="Fecha Inicial">
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese fecha Final</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control"  id="txtFechaF" name="txtFechaF" required placeholder="Fecha Final">
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

<div class="panel panel-warning">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE NOTAS DE SALIDA POR FECHA</div>
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
									<th>Moneda</th>          
									<th>Costo Unitario</th>          
									<th>Total</th>          
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
	$("#MostrarInformacion").hide();	
	$("#btnMostrar").click(function(){
				$("#example2").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var txtFechaI=$("#txtFechaI").val();			 	
			  var txtFechaF=$("#txtFechaF").val();			 		 			 		 	
					var tabla=$('#example2').dataTable( {
					  "ajax": {
						"url": "indexn.php?c=not02&a=BuscarNotasxFechas",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"txtFechaI": txtFechaI,
							"txtFechaF": txtFechaF
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