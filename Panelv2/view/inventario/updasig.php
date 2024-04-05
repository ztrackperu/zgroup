<script>
////descloquea los equipos disponibles bloqueados otros dias que no sean hoy
function desbloquearEquipos() { 
	jQuery.ajax({
		url: '?c=inv02&a=desbloEquiDiaspas',
		type: "post",
		dataType: "json"
	})

}

$(document).ready(function () {
	window.location.hash = "no-back-button";
	window.location.hash = "Again-No-back-button" //chrome
	window.onhashchange = function () {
		window.location.hash = "no-back-button";
	}
});
</script>

<script type="text/javascript">
function cargarDetEquiAprob() {
	ncoti = document.getElementById('ncoti').value;
	c_nomcli = document.getElementById('c_nomcli').value;
	if (ncoti != "" && c_nomcli != "") {
		location.href = "?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=UpdAsig&ncoti=" + ncoti + "&c_nomcli=" + c_nomcli + "";
	}
}

function abrirmodalEqp(c_codprd, i, c_codcont, ncoti) {
	$('#my_modal').modal('show');
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("c_codprd = " + c_codprd);
	$('#tabla').load("?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEquiposDispoCoti", {
		c_codprd: c_codprd,
		i: i,
		c_codcont: c_codcont,
		ncoti: ncoti
	});
}

function cancelar() {
	var cancelar = document.getElementById('cancelar').value;
	var maxitem = document.getElementById('maxitem').value;
	for (var y = 1; y <= maxitem; y++) {

		if (document.getElementById('c_codcont' + y).value != document.getElementById('c_codcontini' + y).value) {
			//recuperar codigos a desbloquear	
			serie = document.getElementById('c_codcont' + y).value;
			//alert(document.getElementById('c_codcont'+i).value);
			jQuery.ajax({
				url: '?c=inv02&a=DesbloquearEquiposQuit',
				type: "post",
				dataType: "json",
				data: {
					//idequipo: idequipo, //codsel
					c_codcont: serie //codanterior
					//ncoti:ncoti
				}
			})

		} //END IF
		//volver a todos los codigos iniciales
		c_codcontini = document.getElementById('c_codcontini' + y).value;
		document.getElementById('c_codcont' + y).value = c_codcontini;
		//desmarcar los item que no tenian codigo
		if (document.getElementById('re' + y).className != 'inicial') {
			document.getElementById('re' + y).checked = false;
		} else {
			document.getElementById('re' + y).checked = true;
		}
		//FIN desmarcar los item que no tenian codigo				

	} //fin for 
	document.getElementById('cancelar').value = '1';
}

function salir() {
	var cancelar = document.getElementById('cancelar').value;
	if (cancelar == '0') {
		var mensje = "Cancele su operacion ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0;
		//alert('Cancele su operacion');	
	} else {
		//url volver  
		location.href = "?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>";
	}

}

function actualizarAsig() {
	var maxitem = document.getElementById('maxitem').value; //2
	var ncoti = document.getElementById('ncoti').value;
	var cantasig = 0;
	for (i = 1; i <= maxitem; i++) {
		c_codcont = document.getElementById('c_codcont' + i);
		re = document.getElementById('re' + i);
		if (c_codcont.value != '') {
			cantasig = 1;
		}
		if (c_codcont.value == '' && re.checked == true) {
			var mensje = "Falta codigo de Equipo o Desmarque check ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			return 0;
		}
	}
	if (cantasig == '0') {
		var mensje = "Falta Seleccionar Codigo de Equipo ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0;
	} else {
		if (confirm("Seguro de Actualizar la asignacion de la Cotizacion " + ncoti + " ?")) {
			document.getElementById("frm-pedidet").submit();
		}
	}
}

function borrarserie(nitem) {
	var maxitem = document.getElementById('maxitem').value; //2
	//var ncoti=document.getElementById('ncoti').value;		
	var mycheck = document.getElementById('re' + nitem)
	var elemento = document.getElementById('c_codcont' + nitem);
	serie = elemento.value;
	if (mycheck.checked == false) {
		if(elemento != null){
			jQuery.ajax({
				url: '?c=inv02&a=DesbloquearEquiposQuit',
				type: "post",
				dataType: "json",
				data: {
					//idequipo: idequipo, //codsel
					c_codcont: serie //codanterior
					//ncoti:ncoti
				}
			})
			//borrar text
			elemento.value = '';
		}
	} else {
		if(serie == ""){
			alert("Debe asignar un equipo")
			mycheck.checked = false;
		}
	}
} //fin borrarserie
function comprobarStockInsumo(id, cod, cant, clase) {
	if (jQuery("#" + id).is(":checked")) {
		jQuery.ajax({
			url: '?c=inv02&a=comprobarStockInsumo',
			type: "post",
			dataType: "json",
			data: {
				cod,
				cant,
				clase,
				returnAjax: true,
			},
			success: function (response) {
				if (response.error == true) {
					alert(response.msg);
					jQuery("#" + id).attr('checked', false);
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				console.log("Request: ", XMLHttpRequest);
				console.log("Error: ", textStatus);
				console.log("Error: ", errorThrown);
			}
		});
	}
}
</script>

<body onLoad="desbloquearEquipos()" > 
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
					<input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1; border: 0px solid #A8A8A8;width:500px;" readonly />
					<span id="mensaje" class="label label-default"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--fin modal alertas info-->

	<!--modal de ver equipos-->
	<form class="form-horizontal" id="frmequipo" name="frmequipo">
		<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles</h4>
					</div>
					<div class="modal-body">
						<table id="tabla" class="table table-hover" style="font-size:12px;">
							<!--Contenido se encuentra en verEquiposDispo.php-->
						</table>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--fin modal de ver equipos-->

	<!--modal de eliminacion de asignacion-->
	<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="exampleModalLabel"> Seguro de Eliminar las asignaciones seleccionadas? </h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary">Eliminar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<!--fin modal eliminacion de asignacion-->
<div class="container-fluid">
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">ACTUALIZACION DE ASIGNACIONES (Solo detalles sin guia)</div>
	</div>
	<div class="form-control-static" align="right">
		<!--<a class="btn btn-success" onClick="actualizarAsig();">Actualizar</a>-->
		<input class="btn btn-success" type="button" onClick="actualizarAsig()" value="Actualizar" />&nbsp;
		<a class="btn btn-danger" onClick="cancelar();">Cancelar</a>&nbsp;
		<a class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
		<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;
	</div>

	<form class="form-horizontal" id="frm-pedidet" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ActualizarAsignacion&IdAsig=<?php echo $_GET['IdAsig']; ?>">
		<?php if($_GET['IdAsig']!=''){ ?>
		<table id="tablas" class="table table-hover" style="font-size:12px;">
			<thead>
				<tr>
					<th style="width:100px;">Item</th>
					<th>Descripcion</th>
					<th>Tipo </th>
					<th>N° Cotizacion</th>
					<th>N° Guia</th>
					<th>Cod. Equipo</th>
					<th style="width:110px;"> Asignar </th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$i=0;
			$ListarDetAsig = $this->model->ListarDetAsig($_GET['IdAsig']);
			// var_dump($ListarDetAsig);
			foreach($ListarDetAsig as $r):
				$c_codprd=$r->c_codprd;	
				$ncoti=$r->c_numped;
				$n_item=$r->n_item;	 
				$tipo=$r->c_tipcoti;
				$motivo=$r->c_motivo;	
				$c_numguiadesp=$r->c_numguiadesp;	
				$c_codcla = $r->c_codcla;
				$i=$i+1;
			?>
				<tr>
					<td>
						<input type="hidden" name="ncoti" id="ncoti" value="<?php echo $ncoti ?>" readonly="readonly" />
						<input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item; ?>" readonly="readonly"/>
						<input type="hidden" name="<?php echo 'c_codcla'.$i; ?>" id="<?php echo 'c_codcla'.$i; ?>" value="<?php echo $c_codcla; ?>" readonly="readonly"/>
						<input type="hidden" name="<?php echo 'n_itemdet'.$i; ?>" id="<?php echo 'n_itemdet'.$i; ?>" value="<?php echo $r->n_itemdet; ?>" readonly="readonly"/>
						<?php echo $r->n_itemdet; ?>
					</td>
					<td>
						<input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $r->c_codprd; ?>" readonly="readonly" />
						<input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo $r->c_desprd; ?>" readonly="readonly" />
						<?php echo $r->c_desprd; ?>
					</td>
					<td>
						<input type="hidden" name="<?php echo 'c_tipped'.$i; ?>" id="<?php echo 'c_tipped'.$i; ?>" value="<?php echo $tipo; ?>" readonly="readonly"/>
					<?php  
				  if($tipo!=""){ 
					  if($tipo=='001'){ $tipocot='VENTA';}
					  else if($tipo=='002'){ $tipocot='FLETE';}
					  else if($tipo=='015'){ $tipocot='MANTENIMIENTO';}
					  else if($tipo=='017'){ $tipocot='ALQUILER';}
					  else if($tipo=='019'){ $tipocot='OTROS';}
					  echo $tipocot;
				  }else{
					  echo $motivo;				  
				  }
					?>
					</td>
					<td>
					<?php 
					if($ncoti!=""){
						echo $ncoti;
					}else{
						echo 'S/C';
					}  
					?>
					</td>
					<td>
						<?php echo $c_numguiadesp;?>
					</td>
					<td>
						<input type="hidden" name="<?php echo 'c_codcontini'.$i; ?>" id="<?php echo 'c_codcontini'.$i; ?>" value="<?php echo $c_codcont=$r->c_idequipo; ?>" readonly="readonly" />
						<?php if($c_codcla=='010'):?>
						<input type="hidden" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?= $r->c_idequipo?>"/>
						<?= 'Cantidad: '.$r->n_canprd; ?>
						<?php else:?>
						<input type="text" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?= $r->c_idequipo; ?>"
						  onFocus="abrirmodalEqp('<?php echo $c_codprd ?>','<?php echo $i ?>','<?php echo $c_codcont ?>','<?php echo $ncoti ?>' );" readonly />
						<?php endif;?>
					</td>
					<td>
						<?php if($c_codcla!='010'):?>
						<input name="<?= 're'.$i ?>" type="checkbox" id="<?= 're'.$i ?>" value="<?= $i ?>" onChange="borrarserie(<?= $i ?>);" <?php if($r->c_idequipo!=''){?>checked class="inicial" <?php }?> />
						<?php else:?>
						<input name="<?= 're'.$i ?>" type="checkbox" id="<?= 're'.$i ?>" value="<?= $i ?>" onChange="comprobarStockInsumo('<?= 're'.$i ?>','<?=$r->c_idequipo;?>',<?=$r->n_canprd;?>,'<?=$c_codcla?>');" <?php if($r->c_idequipo!=''){?>checked class="inicial" <?php }?> />
						<?php endif;?>
					</td>
				</tr>
				<?php endforeach; ?>
				<input type="hidden" name="maxitem" id="maxitem" value="<?php echo $i; ?>" />
				<input type="hidden" name="cancelar" id="cancelar" value="1" />
			</tbody>
		</table>
	</form>
	<?php }else{  } ?>
</div>
   
<script>
$(document).ready(function () {
	/* Autocomplete de producto, jquery UI */
	$("#cotizacion").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=inv02&a=Buscar',
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.c_numped,
							value: item.cliente,
							clie: item.c_nomcli
						}
					}))
				}
			})
		},
		select: function (e, ui) {
			$("#ncoti").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
		}
	})
})
</script>

</body>