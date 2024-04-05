
<script>
//////validar Importe
function validaDecimal(e) { //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which; //obtenemos el codigo ascii de la tecla
	if (tecla == 8) return true; //backspace en ascii es 8
	patron = /[0-9\.]/;
	te = String.fromCharCode(tecla); //convertimos el codigo ascii a string
	return patron.test(te);
}

function validaImporte() {
	var n_importe = document.getElementById('n_importe').value;
	var patron = /^\d+(\.\d{1,2})?$/;
	if (!patron.test(n_importe)) {
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_importe').value = '';
		document.getElementById('n_importe').focus();
		return false;
	}
	/*else{
			window.alert('monto correcto');
			}*/
}

function cambiarnom() {
	var c_idconcepto = document.Frmregcoti.c_idconcepto.options[document.Frmregcoti.c_idconcepto.selectedIndex].text;
	document.getElementById('c_nomconcepto').value = c_idconcepto;

	/*if(c_idconcepto=='PEAJE'){
		//Buscar peajes	
		// Autocomplete de c_nomtranspote, jquery UI 
		$("#c_descripcion").autocomplete({
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					url: '?c=01&a=PeajeBuscar', //en procesosinv.controller.php
					type: "post",
					dataType: "json",
					data: {
						criterio: request.term
					},
					success: function (data) {
						response($.map(data, function (item) {
							return { 
								id: item.descripcion,
								value: item.descripcion,
								c_codpeaje: item.c_codpeaje
							}
						}))
					}
				})
			},<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
			select: function (e, ui) {
				$("#c_coddes").val(ui.item.c_codpeaje);
				$("#c_descripcion").val(ui.item.descripcion);         
			}
		})
		// Fin Autocomplete de EIR, jquery UI 		
	} else{
		$("#c_descripcion").autocomplete({
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					url: '?c=01&a=xxxxxxxx'
				})
			}
		})
	}//end else*/
} //end function

$(function () {
	//Array para dar formato en español
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: 'Previo',
		nextText: 'Próximo',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
			'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
		],
		monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
			'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
		],
		monthStatus: 'Ver otro mes',
		yearStatus: 'Ver otro año',
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		initStatus: 'Selecciona la fecha',
		isRTL: false
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);

	//miDate: fecha de comienzo D=días | M=mes | Y=año
	//maxDate: fecha tope D=días | M=mes | Y=año
	$("#d_fecsol").datepicker();
	$("#d_fecdeposito").datepicker();
	//$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });  
});

function validarguardar() {
	var c_ususolic = document.getElementById('c_ususolic').value;
	if (c_ususolic == '') {
		var mensje = "Falta Ingresar el Solicitante ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_ususolic").focus();
		return 0;
	}
	var c_usuaut = document.getElementById('c_usuaut').value;
	if (c_usuaut == '') {
		var mensje = "Falta Ingresar el Usuario que autoriza ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_usuaut").focus();
		return 0;
	}
	var c_personal = document.getElementById('c_personal').value;
	if (c_personal == '') {
		var mensje = "Falta Ingresar el Personal ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_personal").focus();
		return 0;
	}
	/*var c_idconcepto=document.getElementById('c_idconcepto').value;
 	   if(c_idconcepto=='SELECCIONE'){			
			var mensje = "Falta Seleccionar el Concepto ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idconcepto").focus();
			return 0;
		}*/
	var c_descripcion = document.getElementById('c_descripcion').value;
	if (c_descripcion == '') {
		var mensje = "Falta Ingresar la Descripcion del Viatico ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_descripcion").focus();
		return 0;
	}
	/*var c_coddes=document.getElementById('c_coddes').value;
	if(c_idconcepto=='001' && c_coddes==''){			
		var mensje = "Falta Buscar y Seleccionar una Descripcion de Peaje ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		document.getElementById("c_descripcion").focus();
		return 0;
	}*/
	var d_fecsol = document.getElementById('d_fecsol').value;
	if (d_fecsol == '') {
		var mensje = "Falta Ingresar la Fecha de Solicitud ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("d_fecsol").focus();
		return 0;
	}
	var c_tipo = document.getElementById('c_tipo').value;
	if (c_tipo == 'SELECCIONE') {
		var mensje = "Falta Seleccionar el Tipo de Transferencia...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_tipo").focus();
		return 0;
	}
	var c_moneda = document.getElementById('c_moneda').value;
	if (c_moneda == 'SELECCIONE') {
		var mensje = "Falta Seleccionar el Tipo de Moneda...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_moneda").focus();
		return 0;
	}
	var n_importe = document.getElementById('n_importe').value;
	if (n_importe == '') {
		var mensje = "Falta Ingresar el Importe...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("n_importe").focus();
		return 0;
	}
	if (confirm("Seguro de Registrar el Detalle de Viaticos ?")) {
		document.getElementById("Frmregcoti").submit();
	}
}
</script>
<div class="container-fluid">
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">DETALLE DE VIATICOS DE LA SOLICITUD N° <?php echo $Id_viatico; ?> </div>
		<div>
			<!-- Inicio Modal alerts -->
			<div id="alertone" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h5 class="modal-title">Mensaje del Sistema</h5>
						</div>
						<div class="alert alert-warning">
							<input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;width:500px;" readonly />
							<span id="mensaje" class="label label-default"></span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--fin modal alertas info-->
			<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarDetViaticos">
				<div class="form-control-static" align="right">
					<!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
					<input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar" /> &nbsp;
					<a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>&nbsp;
					<a class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
				</div>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#alm" aria-controls="alm" role="tab" data-toggle="tab">Datos Generales</a>
					</li>
					<li role="presentation">
						<a href="#con" aria-controls="con" role="tab" data-toggle="tab">Datos Deposito</a>
					</li>
				</ul>
				<!-- Inicia Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" id="alm" class="tab-pane active">
						<div class="form-group">
							<label class="control-label col-xs-1"></label>
							<input type="hidden" name="Id_viatico" id="Id_viatico" value="<?php echo $Id_viatico; ?>" />
						</div>
						<!--fila 1-->
						<div class="form-group">
							<label class="control-label col-xs-2">Solicitado Por</label>
							<div class="col-xs-2">
								<input type="text" name="c_ususolic" id="c_ususolic" class="form-control input-sm" placeholder="Solicitado Por" />
							</div>
							<label class="control-label col-xs-2">Autorizado Por</label>
							<div class="col-xs-2">
								<input type="text" name="c_usuaut" id="c_usuaut" class="form-control input-sm" placeholder="Autorizado Por" />
							</div>
							<label class="control-label col-xs-1">Personal</label>
							<div class="col-xs-2">
								<input type="text" name="c_personal" id="c_personal" class="form-control input-sm" placeholder="Personal" />
							</div>
						</div>

						<!--fila 2-->
						<div class="form-group">
							<?php /*?>
							<label class="control-label col-xs-2">Concepto</label>
							<div class="col-xs-2">
								<select id="c_idconcepto" name="c_idconcepto" class="form-control input-sm" onChange="cambiarnom();">
									<option value="SELECCIONE">SELECCIONE</option>
									<?php 
										$conceptoviaticos=$this->model->ListarConceptoViaticos(); 
										foreach ($conceptoviaticos as $convia){
									?>
									<option value="<?php echo $convia->C_NUMITM; ?>">
										<?php echo $convia->C_DESITM; ?>
									</option>
									<?php } ?>
								</select>
								<input type="hidden" id="c_nomconcepto" name="c_nomconcepto" />
							</div>
							<?php */?>
							<label class="control-label col-xs-2">Descripcion</label>
							<div class="col-xs-6">
								<input type="hidden" name="c_coddes" id="c_coddes" />								
								<input type="text" name="c_descripcion" id="c_descripcion" class="form-control input-sm" placeholder="Descripcion General del Deposito"/>
							</div>
							<label class="control-label col-xs-1">Fecha</label>
							<div class="col-xs-2">
								<input type="text" name="d_fecsol" id="d_fecsol" value="" class="form-control datepicker input-sm" />
							</div>
						</div>
						<!--fila 3-->
						<div class="form-group">
							<label class="control-label col-xs-2">Tipo</label>
							<div class="col-xs-2">
								<select id="c_tipo" name="c_tipo" class="form-control input-sm">
									<option value="SELECCIONE">SELECCIONE</option>
									<?php 
			  					$tipopago=$this->model->ListarTipoPagoViaticos(); 
									foreach ($tipopago as $tippag){
			  					?>
									<option value="<?php echo $tippag->C_NUMITM; ?>">
									<?php echo $tippag->C_DESITM; ?>
									</option>
									<?php } ?>
								</select>
							</div>
							<label class="control-label col-xs-2">Moneda</label>
							<div class="col-xs-2">
								<select id="c_moneda" name="c_moneda" class="form-control input-sm">
									<option value="SELECCIONE">SELECCIONE</option>
									<?php 
			  					$tipomoneda=$this->model->ListarMoneda(); 
									foreach ($tipomoneda as $tipmon){
									?>
									<option value="<?php echo $tipmon->C_NUMITM; ?>">
										<?php echo $tipmon->C_DESITM; ?>
									</option>
									<?php } ?>
								</select>
							</div>
							<label class="control-label col-xs-1">Importe</label>
							<div class="col-xs-2">
								<input type="text" name="n_importe" id="n_importe" class="form-control input-sm" placeholder="Importe" onBlur="validaImporte();"
								  onkeypress="return validaDecimal(event)" />
							</div>
						</div>
					</div>
					<!-- Fin Tab panes alm -->
					<div role="tabpanel" id="con" class="tab-pane">
						<div class="form-group">
							<label class="control-label col-xs-1"></label>
						</div>
						<!--fila 4-->
						<div class="form-group">
							<label class="control-label col-xs-2">Ref Deposito/Transf.</label>
							<div class="col-xs-2">
								<input type="text" name="c_refdeposito" id="c_refdeposito" class="form-control input-sm" placeholder="Referencia Deposito"
								/>
							</div>
							<label class="control-label col-xs-2">Fecha Deposito</label>
							<div class="col-xs-2">
								<input type="text" name="d_fecdeposito" id="d_fecdeposito" class="form-control datepicker input-sm" placeholder="Fecha Deposito"
								/>
							</div>
						</div>
					</div>
					<!-- Fin Tab panes con -->
				</div>
				<!-- Fin Tab panes -->
			</form>
		</div>
	</div>
</div>