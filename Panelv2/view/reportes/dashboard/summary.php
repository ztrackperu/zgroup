<div id="salesSummaryPanel" class="panel-group">
  <div class="panel panel-warning">
    <div class="panel-heading">Ventas</div>
		<div class="panel-body">
		  <?php
			//var_dump($ventas_totales);
		  ?>
		  <div id="salesSummaryMSG" style="display:none;text-align:center;">
			Cargando...
			<br>
			<img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
		  </div>
		  <div id="salesSummaryMSGEmpty" style="display:none;text-align:center;color:#ff0000;">
			<strong>Sin Resultados</strong>
		  </div>
		  <table id="salesSummaryTable" class="table table-bordered table-hover table-striped" style="font-size: 0.8em; text-align:center;">
		  </table>
		</div>
  </div>
</div>
<div class="modal fade" id="my_modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="AgregarNota" name="AgregarNota" class="form-horizontal" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Agregar Nota de Cotizacion N° <span id="cotizacion"></span></h5>
                </div>
                <div class="modal-body">
					<div class="alert alert-primary" role="alert" id="mensaje2" style="display:none">
						</div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Tipo de Actividad</label>
                        <div class="col-xs-8">
						<input type="hidden" class="form-control" id="txtCotizacion" name="txtCotizacion" />
						<input type="hidden" class="form-control" id="txtDni" name="txtDni" value="<?php echo $_GET['udni']?>" />
                           <select name="cboActividad" id="cboActividad" class="form-control">
									<option value="SELECCIONE">SELECCIONE</option>           
									<option value="LLAMADA">LLAMADA</option>           
									<option value="ACTIVIDAD2">ACTIVIDAD2</option>           
									<option value="ACTIVIDAD3">ACTIVIDAD2</option>           
							</select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Nota</label>
                        <div class="col-xs-8">
                           <textarea type="text" class="form-control" id="txtNota" name="txtNota"  placeholder="Descripcion" required></textarea>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Fecha</label>
                        <div class="col-xs-8">
                           <input type="date" class="form-control" id="txtFecha" name="txtFecha"required />
                        </div>
                    </div>					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-success" >Agregar</button>
					</div>
            </form>
				</div>
        </div>
    </div>
</div>
<div class="modal fade" id="my_modalver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="VerNota" name="VerNota" class="form-horizontal" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel">Notas de la Cotizacion N° <span id="cotizacion2"></span></h5>
                </div>
                <div class="modal-body">
					<div class="alert alert-primary" role="alert" id="mensaje2" style="display:none">
					</div>
					<div class="box-body table-responsive no-padding">
						<table id="ModalNotas" class="table table-hover table-bordered">              
							<thead>
								<th class="active info"><h6>Fecha</h6></th>
								<th class="active info"><h6>Nota</h6></th>
								<th class="active info"><h6>Actividad</h6></th>
								<th class="active info"><h6>Usuario</h6></th>
							</thead>
							<tbody>
							</tbody>	
            </form>
				</div>
        </div>
    </div>
</div>
<script>
$('#my_modalagregar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var cotizacion = button.data('cotizacion') // Extract info from data-* attributes
  
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-header #cotizacion').html(cotizacion)
  modal.find('.modal-body #txtCotizacion').val(cotizacion)
})
$('#my_modalver').on('show.bs.modal', function (event) {
  var button2 = $(event.relatedTarget) // Button that triggered the modal
  var cotizacionVer = button2.data('cotizacion2') // Extract info from data-* attributes
  
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-header #cotizacion2').html(cotizacionVer)
    
	var d ='';
	
 $.ajax({
     type: "POST",
     url: '?c=07&a=MostrarDetalleNotas', //en procesosinv.controller.php
	 dataType: "json",
     data: {cotizacion:cotizacionVer},
     async : false, //espera la respuesta antes de continuar
     success: function(data) {
		console.log(data);
		 for (var i = 0; i < data.length; i++) {		 
				  d+= '<tr>'+
				 '<td><h6>'+data[i].cotizacion+'<h6></td>'+
				 '<td><h6>'+data[i].actividad+'<h6></td>'+
				 '<td><h6>'+data[i].des_nota+'<h6></td>'+
				 '<td><h6>'+data[i].fecha+'<h6></td>'+
				 '<td><h6>'+data[i].fecha+'</td>'+
				 '</tr>';
				 }
				 $("#ModalNotas").append(d);				 
     },	 
   });
 $("#my_modalver").on('hidden.bs.modal', function () {
			$("#ModalNotas>tbody >tr").html('');
    });
  
  
})
 $("#AgregarNota").submit(function(e){
	//alert();
	e.preventDefault();
	var datos=new FormData(this);
	$.ajax({
	url: '?c=06&a=AgregarNota',
	data: datos,				
	processData:false,
	contentType:false,
	type: "post",
	beforeSend:function(){
		$("#mensaje2").html('Espere');
	},
	success: function(mensaje){		
		$('#mensaje2').css('display','block');
		$("#mensaje2").html(mensaje);
/* 		 setTimeout(function() {
			$(".mensaje").fadeIn(1500);
			},6000);
			 */
			setTimeout(function() {
				$("#mensaje2").fadeOut(1500);
			},3000);
		$('#descripcion').val('');
		$('#precio').val('');
		$('#medida').val('');
		$('#partNumber').val('');
		$('#replace').val('');
		$('#hh').val('0');	
		}
	});
	
	
});
</script>