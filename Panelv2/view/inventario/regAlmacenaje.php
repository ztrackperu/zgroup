		<div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mensaje Sistema</h4>
              </div>
              <div class="modal-body">
                <div id="mensaje"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Aceptar</button>               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Datos para registrar Almacenaje Zgroup</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form" id="formulario">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Fecha Registro:</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control" id="txtFecha" name="txtFecha" value="<?php echo date(" d/m/Y ") ?>">					
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Seleccione un Técnico:</label>
						<div class="col-lg-2">
						  <select name="cboTecnicos" id="cboTecnicos" class="select2 form-control">
							<option value="">.:SELECCIONE:.</option>
							<?php foreach($this->maestro->ListaTecnicos() as $a):	 ?>
							<option value="<?php echo $a->C_DESITM; ?>">
							  <?php echo  utf8_encode($a->C_DESITM); ?> </option>
							<?php  endforeach;	 ?>
						  </select>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Codigo de Equipo:</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control" id="txtCodigoE" name="txtCodigoE">					
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Codigo de Maquina:</label>
						<div class="col-lg-2">
						  <input type="text" class="form-control" id="txtCodigoM" name="txtCodigoM">					
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Temperatura SUP:</label>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtTs2" name="txtTs2" placeholder="02:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtTs6" name="txtTs6" placeholder="06:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtTs10" name="txtTs10" placeholder="10:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtTs14" name="txtTs14" placeholder="14:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtTs18" name="txtTs18" placeholder="18:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtTs22" name="txtTs22" placeholder="22:00 HRS">					
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Temperatura RET:</label>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtR2" name="txtR2" placeholder="02:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtR6" name="txtR6" placeholder="06:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtR10" name="txtR10" placeholder="10:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtR14" name="txtR14" placeholder="14:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtR18" name="txtR18" placeholder="18:00 HRS">					
						</div>
						<div class="col-lg-1">
						  <input type="text" class="form-control" id="txtR22" name="txtR22" placeholder="22:00 HRS">					
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-success" id="btnRegistrar">Registrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	 <div class="panel panel-success">
        <div class="panel-heading"> Datos Registrados</div>
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
								<th>Fecha</th>
								<th>Tecnico</th>
								<th>Cod Contenedor</th>
								<th>Cod Maquina</th>
								<th>Temp SUP 2:00 HRS</th>
								<th>Temp RET 2:00 HRS</th>
								<th>Temp SUP 6:00 HRS</th>
								<th>Temp RET 6:00 HRS</th>
								<th>Temp SUP 10:00 HRS</th>
								<th>Temp RET 10:00 HRS</th>
								<th>Temp SUP 14:00 HRS</th>
								<th>Temp RET 14:00 HRS</th>
								<th>Temp SUP 18:00 HRS</th>
								<th>Temp RET 18:00 HRS</th>
								<th>Temp SUP 22:00 HRS</th>
								<th>Temp RET 22:00 HRS</th>
							</thead>
							<tbody>
							<tr>
							<?php  
							$item=1;
							foreach($this->model->VerAlmacenaje() as $almacenaje):
							?>
								<td><?php echo $item++ ?></td>
								<td><?php echo $almacenaje->fecha ?></td>
								<td><?php echo $almacenaje->tecnico ?></td>
								<td><?php echo $almacenaje->cod_equipo ?></td>
								<td><?php echo $almacenaje->cod_maquina ?></td>
								<td><?php echo $almacenaje->sup2 ?></td>
								<td><?php echo $almacenaje->ret2 ?></td>
								<td><?php echo $almacenaje->sup6 ?></td>
								<td><?php echo $almacenaje->ret6 ?></td>
								<td><?php echo $almacenaje->sup10 ?></td>
								<td><?php echo $almacenaje->ret10 ?></td>
								<td><?php echo $almacenaje->sup14 ?></td>
								<td><?php echo $almacenaje->ret14 ?></td>
								<td><?php echo $almacenaje->sup18 ?></td>
								<td><?php echo $almacenaje->ret18 ?></td>
								<td><?php echo $almacenaje->sup22 ?></td>								
								<td><?php echo $almacenaje->ret22 ?></td>																
							</tr>
							 <?php
							 endforeach;?>
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
			$("#btnRegistrar").click(function(){
				 var txtFecha=$("#txtFecha").val();
				 var cboTecnicos=$("#cboTecnicos").val();
				 var txtCodigoE=$("#txtCodigoE").val();
				 var txtCodigoM=$("#txtCodigoM").val();
				 var txtTs2=$("#txtTs2").val();
				 var txtTs6=$("#txtTs6").val();
				 var txtTs10=$("#txtTs10").val();
				 var txtTs14=$("#txtTs14").val();
				 var txtTs18=$("#txtTs18").val();
				 var txtTs22=$("#txtTs22").val();
				 var txtR2=$("#txtR2").val();
				 var txtR6=$("#txtR6").val();
				 var txtR10=$("#txtR10").val();
				 var txtR14=$("#txtR14").val();
				 var txtR18=$("#txtR18").val();
				 var txtR22=$("#txtR22").val();
				
				var error = false;
				var msg = "";	
				if(cboTecnicos=='.:SELECCIONE:.'){
					 msg += 'Seleccione Tecnico responsable.<br>';
					error = true;
				}
				if(txtCodigoE==''){
					 msg += 'Ingrese codigo de equipo.<br>';
					error = true;
				}
				if(txtCodigoM==''){
					 msg += 'Ingrese codigo de maquina.<br>';
					error = true;
				}
				if (error == true) {
				$("#mensaje").html(msg);
				$('#modal-warning').modal('show');
				return 0;
				}
				else {
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 				 
				 var parametros = {
                "txtFecha" : txtFecha,
                "cboTecnicos" : cboTecnicos,
                "txtCodigoE" : txtCodigoE,
                "txtCodigoM" : txtCodigoM,
                "txtTs2" : txtTs2,
                "txtTs6" : txtTs6,
                "txtTs10" : txtTs10,
                "txtTs14" : txtTs14,
                "txtTs18" : txtTs18,
                "txtTs22" : txtTs22,
                "txtR2" : txtR2,
                "txtR6" : txtR6,
                "txtR10" : txtR10,
                "txtR14" : txtR14,
                "txtR18" : txtR18,
                "txtR22" : txtR22
			};
			$.ajax({
					data:  parametros, //datos que se envian a traves de ajax
					url:   '?c=inv11&a=GuardarAlmacenaje', //archivo que recibe la peticion
					type:  'post', //método de envio
					beforeSend: function () {
							$("#FacturasListaLoadMSG").html("Procesando, espere por favor...");
					},
					success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
						 var d = new Date();
						var strDate =  d.getDate()+ "/" + (d.getMonth()+1) + "/" + d.getFullYear();		
						$('#cboTecnicos').val(null).trigger('change');
							 $("#formulario")[0].reset();	
						/*  $("#txtFecha").val(strDate);
						 $("#cboTecnicos").val(".:SELECCIONE:.");
						 $("#txtCodigoE").val("");
						 $("#txtCodigoM").val("");
						 $("#txtTs2").val("");
						 $("#txtTs6").val("");
						 $("#txtTs10").val("");
						 $("#txtTs14").val("");
						 $("#txtTs18").val("");
						 $("#txtTs22").val("");
						 $("#txtR2").val("");
						 $("#txtR6").val("");
						 $("#txtR10").val("");
						 $("#txtR14").val("");
						 $("#txtR18").val("");
						 $("#txtR22").val("");	 */
						 $("#FacturasListaLoadMSG").html(response);
					}
			});
			  
			    $('#example').DataTable({
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
					
				})  			 			 			 			  
			 	
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
  $(function () {

    //Array para dar formato en espa�ol
    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: 'Previo',
      nextText: 'Proximo',

      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
      ],
      monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
      ],
      monthStatus: 'Ver otro mes',
      yearStatus: 'Ver otro a�o',
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi�rcoles', 'Jueves', 'Viernes', 'S�bado'],
      dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
      dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
      dateFormat: 'dd/mm/yy',
      firstDay: 0,
      initStatus: 'Selecciona la fecha',
      isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#txtFecha").datepicker();
  });
</script>
