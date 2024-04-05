<div class="container-fluid"> 
<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTADO DE NOTAS DE SALIDA/INGRESO DEL AÑO. <?php echo date('Y') ?></div>	
	<div id="FacturasListaLoadMSG">           
    </div>  
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
									<th>Cant</th>          
									<th>Moneda</th>          
									<th>Costo Unitario</th>          
									<th>Total</th>          
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
							<?php 
								$i=0;
								foreach($this->model->ListarNotasxAnio() as $r){//preocesosnotingM.php
									$d_fecreg=$r->NT_FDOC;
									$i++;
									if($r->c_codmon==0){
									$moneda="SOLES";
									}else{
									$moneda="DOLARES";
									}
							 ?>
								<tr>
								  <td><?php echo $i; ?></td>
								  <td><?php echo $r->IN_CODI; ?></td>
								  <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
								  <td><?php echo $r->c_idequipo; ?></td>
								  <td><?php echo $r->C_DESITM; ?></td>
								  <td><?php echo $r->NT_CANT; ?></td>
								  <td><?php echo $moneda; ?></td>
								  <td><?php echo $r->n_preciocost; ?></td>
								  <td><?php echo $r->NT_CANT * $r->n_preciocost; ?></td>
								  <td><?php echo vfecha(substr($d_fecreg,0,10)); ?></td>
								  <td><?php echo $r->NT_TRAN; ?></td>            
								  <td><?php echo $r->NT_TDOC; ?></td>
								  <td><?php echo utf8_encode($r->NT_NDOC); ?></td> 
								  <td><?php echo utf8_encode($r->NT_GPRV); ?></td>
								  <td><?php echo utf8_encode($r->c_nomprv); ?></td>
								  <td><?php echo utf8_encode($r->c_codprv); ?></td>
								  <td><?php echo utf8_encode($r->c_ejecuta); ?></td>
								  <td><?php echo $r->NT_NOC; ?></td>
								  <td><?php echo $r->NT_CCLI; ?></td>          
								  <td><?php echo $r->NT_OPER; ?></td>
								  <td><?php echo $r->c_motivo; ?></td>
								</tr>
							<?php } ?>
							</tbody>								   								   
						 </table>
					</div>
				</div>
			</div>
</div>
</div>
</body>
   
<script>
  $(document).ready(function(){
				$("#example2").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 		 		 			 		 	
					var tabla=$('#example2').dataTable( {
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