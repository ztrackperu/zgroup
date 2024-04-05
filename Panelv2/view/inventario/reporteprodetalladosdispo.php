<body>
<div class="container-fluid"> 
<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE EQUIPOS DISPONIBLES</div>
	<div id="FacturasListaLoadMSG">           
    </div>
    <div class="panel-body" id="MostrarInformacion">			
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
									 <td>Disponibles</td>                     
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
var udni=$("#udni").val();
var mod=$("#mod").val();
  $(document).ready(function(){
	$("#example2").dataTable().fnDestroy();
		var table = $('#example2').DataTable( {
			//ajax: "data.json"
			 "ajax": {
					"url": "indexinv.php?c=rep04&a=ProductoDetalladoDisponible",
					"data": function ( d ) {
					return $.extend( {}, d, {
						"udni": udni,
						"mod": mod
					 } ); 
					}	
					  },
			"language": idioma_espanol,  	  	  
					dom			: 'Bfrtip',
					ordering: true,
					pageLength: 20,
					buttons: [
						'copyHtml5',
						'excelHtml5',
						'csvHtml5',
								{//valores por defecto orientation:'portrait' and pageSize:'A4',
						extend: 'pdfHtml5',
						orientation: 'landscape',
						pageSize: 'A4'
					},
					],		  
					"paging": false
		} );

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