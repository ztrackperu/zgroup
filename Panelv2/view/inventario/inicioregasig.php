<script type="text/javascript">
	function habilitarcoti() {
		document.getElementById('cotizacion').readOnly = false;
		document.getElementById('motivo').value = '';
		document.getElementById('motivo').readOnly = true;
		document.getElementById('eiring').value = '';
		document.getElementById('eiring').readOnly = true;
		document.getElementById('cotizacion').focus();
		document.getElementById('valorcambio').value = 1;
	}

	function habilitarmoti() {
		document.getElementById('motivo').readOnly = false;
		document.getElementById('cotizacion').value = '';
		document.getElementById('ncoti').value = '';
		document.getElementById('cotizacion').readOnly = true;
		document.getElementById('eiring').value = '';
		document.getElementById('eiring').readOnly = true;
		document.getElementById('motivo').focus();
		document.getElementById('valorcambio').value = 2;
	}

	function habilitareiring() {
		document.getElementById('eiring').readOnly = false;
		document.getElementById('cotizacion').value = '';
		document.getElementById('ncoti').value = '';
		document.getElementById('cotizacion').readOnly = true;
		document.getElementById('motivo').value = '';
		document.getElementById('motivo').readOnly = true;
		document.getElementById('eiring').focus();
		document.getElementById('valorcambio').value = 3;
	}

	function focuscotizacion() {
		document.getElementById('cotizacion').focus();
		document.getElementById('valorcambio').value = 1;
		//desbloquearEquipos
		jQuery.ajax({
			url: '?c=inv02&a=desbloEquiDiaspas',
			type: "post",
			dataType: "json"
		})
	}

	function validar() {
		var valorcambio = document.getElementById('valorcambio').value;
		cotizacion = document.getElementById('cotizacion').value;
		ncoti = document.getElementById('ncoti').value;
		if (valorcambio == '1' && cotizacion == '') {
			//alert('Falta Ingresar Nro de cotizacion');
			var mensje = "Falta Ingresar Nro de cotizacion ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("cotizacion").focus();
			return 0;
		}
		if (valorcambio == '1' && ncoti == '') {
			//alert('Falta Ingresar Nro de cotizacion');
			var mensje = "Falta Buscar y Seleccionar Nro de cotizacion ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("cotizacion").focus();
			return 0;
		}
		motivo = document.getElementById('motivo').value;
		if (valorcambio == '2' && motivo == '') {
			//alert('Falta Ingresar el motivo');
			var mensje = "Falta Ingresar el motivo ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("motivo").focus();
			return 0;
		}
		eiring = document.getElementById('eiring').value;
		eir = document.getElementById('eir').value;
		if (valorcambio == '3' && eiring == '') {
			//alert('Falta Ingresar el motivo');
			var mensje = "Falta Ingresar Nº EIR Ingreso ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("eiring").focus();
			return 0;
		}
		if (valorcambio == '3' && eir == '') {
			//alert('Falta Ingresar el motivo');
			var mensje = "Falta Ingresar y Seleccionar Nº EIR Ingreso ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("eiring").focus();
			return 0;
		}
		//Confirmación
		if (confirm("¿Seguro de Generar asignacion ?")) {
			//ncoti=document.getElementById('ncoti').value;
			c_nomcli = document.getElementById('c_nomcli').value;
			if (ncoti != "" && c_nomcli != "") {
				document.getElementById("frm_inicioasig").submit();
				//location.href="?c=inv02&a=RegAsig&ncoti="+ncoti+"&c_nomcli="+c_nomcli+""; 
			} else if (eiring != '') {
				location.href = "?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegAsigConEir&eir=" + eir;
			} else {
				motivo = document.getElementById('motivo').value;
				location.href = "?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegAsigSinCoti&motivo=" +
					motivo;
			}
		}
	}
</script>

<body onLoad="focuscotizacion()">
	<!-- Inicio Modal -->
	<div id="alertone" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Mensaje del Sistema</h5>
				</div>
				<div class="alert alert-warning">
					<input name="mensaje" id="mensaje" type="text" 
					style="background-color: #FAF3D1; border: 0px solid #A8A8A8;width:500px;" readonly />
					<span id="mensaje" class="label label-default"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--fin modal alertas info-->
	<div class="container-fluid">
		<div class="panel panel-primary">
			<!-- Default panel contents -->
			<div class="panel-heading">REGISTRO DE ASIGNACION</div>
			<form class="form-horizontal" id="frm_inicioasig" name="frm_inicioasig" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegAsig">
				<table class="table">
					<tr>
						<td width="156"><input name="sw" type="radio" id="sw" onClick="habilitarcoti()" value="1" checked="CHECKED"> Con Nro Cotiz.</td>
						<td width="117">Numero de Cotizacion</td>
						<td width="176">
							<!--<input autocomplete="off" id="cotizacion" class="form-control" type="text" placeholder="Busqueda de Cotizacion Aprobada"  />-->
							<select id="cotizacion" name="cotizacion" class="select2 form-control input-sm" onChange="cambiarcoti()">
									<option value="">SELECCIONE</option>
								<?php 
									$ListarLineaMaritima=$this->model->BuscarCotizacionesNoAsignadasFiltro(); 
									foreach ($ListarLineaMaritima as $lineamar){
								?>
									<option value="<?= utf8_encode($lineamar->datoscoti); ?>" ><?= utf8_encode($lineamar->cliente); ?></option>
							<?php } 
							?>
							</select>
							<input id="ncoti" name="ncoti" type="hidden" />
							<input id="c_nomcli" name="c_nomcli" type="hidden" />
							<input id="c_codcli" name="c_codcli" type="hidden" />
							<input id="c_ruccli" name="c_ruccli" type="hidden" />
							<input id="valorcambio" name="valorcambio" type="hidden" />
						</td>
						<td width="169"></td>
					</tr>
					<tr>
						<td><input name="sw" id="sw" type="radio" value="3" onClick="habilitareiring()">Por cambio de Equipo.</td>
						<td>Nº EIR Ingreso</td>
						<td>
							<input id="eiring" name="eiring" class="form-control" type="text" placeholder="Filtrado Eir Ingreso por cambio de Equipo"
							    readOnly />
							<input id="eir" name="eir" type="hidden" />
						</td>
					</tr>
					<tr>
						<td width="156"> <input name="sw" id="sw" type="radio" value="2" onClick="habilitarmoti()"> Sin Nro Cotiz.</td>
						<td width="117">Motivo</td>
						<td width="176">
							<input id="motivo" name="motivo" class="form-control" type="text" placeholder="Motivo de Ingreso" readOnly />
						</td>
						<td width="169">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="4" align="center">
							<a class="btn btn-success" onClick="validar()">Generar Asignacion</a>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font color="#FF0000">Notas:</font><br>
							<strong>1.Si la cotizacion se encuentra facturada no se podra asignar.<br>
         2.Recuerde no tener EIR Salida Pendientes no podrá Asignar y te redireccionará a Registrar EIR Salida Pendientes.</strong>
						</td>
					</tr>
				</table>

			</form>
		</div>
	</div>

<script type="text/javascript">
	function cambiarcoti() {
		var cadena = document.frm_inicioasig.cotizacion.options[document.frm_inicioasig.cotizacion.selectedIndex].value;
		//var cadena=document.Frmregcoti.xc_nomcli.value;
		//alert(cadena);                      
		arreglo = cadena.split("|");
		c_codcli = arreglo[0];
		c_nomcli = arreglo[1].toUpperCase();
		c_ruccli = arreglo[2];
		ncoti = arreglo[3];
		/*c_contac=arreglo[3].toUpperCase();    
		c_email=arreglo[4].toUpperCase();    */

		document.frm_inicioasig.c_codcli.value = c_codcli;
		document.frm_inicioasig.c_nomcli.value = c_nomcli;
		document.frm_inicioasig.c_ruccli.value = c_ruccli;
		document.frm_inicioasig.ncoti.value = ncoti;
		/*document.Frmregcoti.c_contac.value=c_contac;   
		document.Frmregcoti.c_email.value=c_email; */

	}
</script>

<script>
	$(document).ready(function () {
		/* Autocomplete de producto, jquery UI */
		$("#eiring").autocomplete({
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					url: '?c=dev01&a=BuscarEirDevolucion',
					type: "post",
					dataType: "json",
					data: {
						criterio: request.term
					},
					success: function (data) {
						response($.map(data, function (item) {
							return {
								id: item.c_numeir,
								value: item.c_numeir + ' ' + item.c_nomcli,
								clie: item.c_nomcli,
							}
						}))
					}
				})
			},
			select: function (e, ui) {
				$("#eir").val(ui.item.id);
				$("#c_nomcli").val(ui.item.clie);
			}
		})
	})
</script>

</body>