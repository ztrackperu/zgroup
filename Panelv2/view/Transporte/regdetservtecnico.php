<script>
function validaEntero(e){	 //solo acepta numeros y punto
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
}

function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
}
////////VALIDAR NUMEROS IMPORTACION
function validaPeso(){
	var n_peso=document.getElementById('n_peso').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_peso)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_peso').value='';
		document.getElementById('n_peso').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaVolumen(){
	var n_volumen=document.getElementById('n_volumen').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_volumen)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_volumen').value='';
		document.getElementById('n_volumen').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaPesobru(){
	var n_pesobru=document.getElementById('n_pesobru').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_pesobru)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_pesobru').value='';
		document.getElementById('n_pesobru').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaTara(){
	var n_tara=document.getElementById('n_tara').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_tara)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_tara').value='';
		document.getElementById('n_tara').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaPayload(){
	var n_payload=document.getElementById('n_payload').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_payload)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_payload').value='';
		document.getElementById('n_payload').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaImporteThc(){
	var n_impthc=document.getElementById('n_impthc').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_impthc)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_impthc').value='';
		document.getElementById('n_impthc').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaImporteVb(){
	var n_impvb=document.getElementById('n_impvb').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_impvb)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_impvb').value='';
		document.getElementById('n_impvb').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}
////////VALIDAR NUMEROS EXPORTACION 
function validaPesoE(){
	var n_peso=document.getElementById('En_peso').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_peso)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('En_peso').value='';
		document.getElementById('En_peso').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaVolumenE(){
	var n_volumen=document.getElementById('En_volumen').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_volumen)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('En_volumen').value='';
		document.getElementById('En_volumen').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaPesobruE(){
	var n_pesobru=document.getElementById('En_pesobru').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_pesobru)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('En_pesobru').value='';
		document.getElementById('En_pesobru').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaTaraE(){
	var n_tara=document.getElementById('En_tara').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_tara)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('En_tara').value='';
		document.getElementById('En_tara').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

function validaPayloadE(){
	var n_payload=document.getElementById('En_payload').value;	
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_payload)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('En_payload').value='';
		document.getElementById('En_payload').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/	
}

jQuery(function($){
	$.mask.definitions['h'] = "[0-2]";
	$.mask.definitions['i'] = "[0-9]";
	$.mask.definitions['m'] = "[0-5]"; 
	$.mask.definitions['n'] = "[0-9]";
	//$.mask.definitions['x'] = "[AP]";
    //$("#horaretiro").mask("hi:mn xM");
	//EXPO
//    $("#horaretiro").mask("hi:mn");
//    $("#horaingreso").mask("hi:mn");
   //IMPO
//    $("#horaretiroI").mask("hi:mn");
//    $("#horaingresoI").mask("hi:mn");
});

function cambiarnaveexpo(){	
	var Ec_idnave=document.Frmregcoti.Ec_idnave.options[document.Frmregcoti.Ec_idnave.selectedIndex].text;
	document.getElementById('Ec_nomnave').value=Ec_idnave;
}

function cambiarnaveimpo(){
	var c_idnave=document.Frmregcoti.c_idnave.options[document.Frmregcoti.c_idnave.selectedIndex].text;
	document.getElementById('c_nomnave').value=c_idnave;
}

function cambiarlineaexpo(){
	var Ec_idlinemar=document.Frmregcoti.Ec_idlinemar.options[document.Frmregcoti.Ec_idlinemar.selectedIndex].text;
	document.getElementById('Ec_nomlineamar').value=Ec_idlinemar;
}

function cambiarlineaimpo(){
	var c_idlinemar=document.Frmregcoti.c_idlinemar.options[document.Frmregcoti.c_idlinemar.selectedIndex].text;
	document.getElementById('c_nomlineamar').value=c_idlinemar;
}

function cambiarconsig(){
	var c_codconsig=document.Frmregcoti.c_codconsig.options[document.Frmregcoti.c_codconsig.selectedIndex].text;
	document.getElementById('c_nomconsig').value=c_codconsig;
}

function cambiarconsolidador(){
	var c_idconsolidador=document.Frmregcoti.c_idconsolidador.options[document.Frmregcoti.c_idconsolidador.selectedIndex].text;
	document.getElementById('c_nomconsolidador').value=c_idconsolidador;
}

function cambiaragentemar(){
	var c_codagenmari=document.Frmregcoti.c_codagenmari.options[document.Frmregcoti.c_codagenmari.selectedIndex].text;
	document.getElementById('c_nomagemari').value=c_codagenmari;
}

function cambiaralmacen(){
	var c_idalmacen=document.Frmregcoti.c_idalmacen.options[document.Frmregcoti.c_idalmacen.selectedIndex].text;
	document.getElementById('c_nomalmacen').value=c_idalmacen;
}

function cambiarterminalvacio(){
	var c_codtermret=document.Frmregcoti.c_codtermret.options[document.Frmregcoti.c_codtermret.selectedIndex].text;
	document.getElementById('c_nomtermret').value=c_codtermret;
}
function cambiarterminaling(){
	var c_codterming=document.Frmregcoti.c_codterming.options[document.Frmregcoti.c_codterming.selectedIndex].text;
	document.getElementById('c_nomterming').value=c_codterming;
}
function cambiarageadu(){
	var Ec_codageaduana=document.Frmregcoti.Ec_codageaduana.options[document.Frmregcoti.Ec_codageaduana.selectedIndex].text;
    document.getElementById('Ec_nomageaduana').value=Ec_codageaduana;	
}
function cambiaragemari(){
	var Ec_codagemari=document.Frmregcoti.Ec_codagemari.options[document.Frmregcoti.Ec_codagemari.selectedIndex].text;
    document.getElementById('Ec_nomagemari').value=Ec_codagemari;
}

function cambiarclientelocal(){
	var  Lc_rucclie=document.getElementById('clientelocal').value
	 document.getElementById('Lc_rucclie').value=Lc_rucclie;
	var Lc_nomclie=document.Frmregcoti.clientelocal.options[document.Frmregcoti.clientelocal.selectedIndex].text;
    document.getElementById('Lc_nomclie').value=Lc_nomclie;
}

//DATOS IMPORTACION
function cambiarterminalvacioI(){
	var c_codtermret=document.Frmregcoti.c_codtermretI.options[document.Frmregcoti.c_codtermretI.selectedIndex].text;
	document.getElementById('c_nomtermretI').value=c_codtermret;
}

function cambiarterminalingI(){
	var c_codterming=document.Frmregcoti.c_codtermingI.options[document.Frmregcoti.c_codtermingI.selectedIndex].text;
	document.getElementById('c_nomtermingI').value=c_codterming;
}

$(function() {
     //Array para dar formato en español
     var defaults_es = {
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
         initStatus: 'Selecciona la fecha', isRTL: false
     };
     $.datepicker.setDefaults(defaults_es);

    //miDate: fecha de comienzo D=días | M=mes | Y=año
    //maxDate: fecha tope D=días | M=mes | Y=año
   //IMPORTACION
    $( "#d_fecpagblm" ).datepicker();
    $( "#d_fecpagblh" ).datepicker();
    $( "#d_fecetdorig" ).datepicker();
    $( "#d_fecetdodest" ).datepicker();
    $( "#d_fectransblm" ).datepicker();
    $( "#d_fecpagalm" ).datepicker();
    $( "#d_fecpagthc" ).datepicker();
    $( "#d_fecpagvb" ).datepicker();
    $( "#d_fecmaxdev" ).datepicker();
    $( "#d_fecendose" ).datepicker();
    $( "#d_fecvolante" ).datepicker();
    $( "#d_fecnumdua" ).datepicker();
    $( "#d_fecretiroI" ).datepicker();
    $( "#d_fecingresoI" ).datepicker();
   
    //EXPORTACION 
    $( "#d_feczarpe" ).datepicker();
	$( "#d_fecretiro" ).datepicker();
	$( "#d_fecingreso" ).datepicker();
	$( "#d_fecrefrendo" ).datepicker();
	$( "#d_fecfactura" ).datepicker();
	$( "#Ed_fecpagvb" ).datepicker();
	$( "#d_fecrecpfac" ).datepicker();
	$( "#d_fecentread" ).datepicker(); 	
	$( "#d_fecfacturapsc" ).datepicker(); 
	
	//LOCAL
	$( "#d_fecfac" ).datepicker();
	$( "#d_fecfac" ).datepicker();
	$( "#d_fecguiatranslle" ).datepicker();
	$( "#d_fecguiatransva" ).datepicker();
	$( "#d_fecguia" ).datepicker();
	
 });
 
  function validarguardar(){
	  /*var c_icoterm=document.getElementById('c_icoterm').value;
 	   if(c_icoterm==''){			
			var mensje = "Falta Registrar Icoterm ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_icoterm").focus();
			return 0;
		}
		
	   var c_codconsig=document.getElementById('c_codconsig').value;
 	   if(c_codconsig==''){			
			var mensje = "Falta Buscar Consignatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_codconsig").focus();
			return 0;
		}
	   var c_nomconsig=document.getElementById('c_nomconsig').value;
 	   if(c_nomconsig==''){			
			var mensje = "Falta Buscar y Seleccionar Consignatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomconsig").focus();
			return 0;
		}
		
	   var c_nblmaster=document.getElementById('c_nblmaster').value;
 	   if(c_nblmaster==''){			
			var mensje = "Falta Ingresar BL Master ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nblmaster").focus();
			return 0;
		}	
		var c_nblhijo=document.getElementById('c_nblhijo').value;
 	   if(c_nblhijo==''){			
			var mensje = "Falta Ingresar BL Hijo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nblhijo").focus();
			return 0;
		}
		
	   var c_idlinemar=document.getElementById('c_idlinemar').value;
 	   if(c_idlinemar==''){			
			var mensje = "Falta Buscar Linea Maritima ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idlinemar").focus();
			return 0;
		}
		
		var c_nomlineamar=document.getElementById('c_nomlineamar').value;
 	   if(c_nomlineamar==''){			
			var mensje = "Falta Buscar y Seleccionar Linea Maritima ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomlineamar").focus();
			return 0;
		}
		
		var d_fecpagblm=document.getElementById('d_fecpagblm').value;
 	   if(d_fecpagblm==''){			
			var mensje = "Falta Ingresar Fecha de Pago de Flete Maritimo MBL ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecpagblm").focus();
			return 0;
		}
		var d_fecpagblh=document.getElementById('d_fecpagblh').value;
 	   if(d_fecpagblh==''){			
			var mensje = "Falta Ingresar Fecha de Pago de Flete Maritimo HBL ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecpagblh").focus();
			return 0;
		}
		
		  var c_idnave=document.getElementById('c_idnave').value;
 	   if(c_idnave==''){			
			var mensje = "Falta Buscar Nave ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idnave").focus();
			return 0;
		}
		
		var c_nomnave=document.getElementById('c_nomnave').value;
 	   if(c_nomnave==''){			
			var mensje = "Falta Buscar y Seleccionar Nave ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomnave").focus();
			return 0;
		}*/	
		
		//
		if(confirm("Seguro de Registrar el Detalle del Transporte ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }
</script>
    <form class="form-horizontal" id="frmequipo" name="frmequipo">
        <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles</h4>
                    </div>
                    <div class="modal-body">
                        <table id="tabla" class="table table-hover" style="font-size:12px;">
                            <!--Contenido se encuentra en verEquiposDispoCoti.php-->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

<div class="container-fluid">
    <div class="panel panel-danger">
        <!-- Default panel contents -->
        <div class="panel-heading">REGISTRAR DETALLE DE SERVICIO TECNICO.</div>
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
            <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarDetTransporte" >
 	            <div class="form-control-static" align="right">
                    <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
                    <a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>
                    <a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
                </div>
                <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"/>
				<input name="c_numped" id="c_numped" type="hidden" value="<?php echo $c_numped ?>"/>				
                <!-- Tabs principales -->
                <ul class="nav nav-tabs" role="tablist">
                    <?php
                    switch ($c_tipmov){
                        case 'I':
                            $tab_id = 'impo';
                            $tab_label = 'Importacion';
                            break;
                        case 'E':
                            $tab_id = 'expo';
                            $tab_label = 'Exportacion';
                            break;
                        default:
                            $tab_id = 'local';
                            $tab_label = 'Local';
                            break;
                    }
                    ?>
                    <li role="presentation" class="active">
                        <a href="#<?= $tab_id;?>" aria-controls="<?= $tab_id;?>" role="tab" data-toggle="tab"><?= $tab_label;?></a>
                    </li>
                </ul>
                <!-- Inicia Tab panes -->
                <div class="tab-content">
                    <?php if($c_tipmov=='L'){ ?>
                    <!-- Inicia Tab panes local -->
                    <div role="tabpanel" id="local" class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a  href="#contenlocal" aria-controls="contenlocal" role="tab" data-toggle="tab"  >Datos Equipo</a></li>
                            <li role="presentation"><a  href="#translocal" aria-controls="translocal" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
                        </ul>
                        <div class="tab-content">
						<div role="tabpanel" id="contenlocal" class="tab-pane active" >
							<div class="form-group">
								<label class="control-label col-xs-1"></label>
							</div>
							<!--fila7 -->
							<div class="form-group">
								<label class="control-label col-xs-2">Producto</label>
								<div class="col-xs-2">
									 <select id="Lc_codtiprod" name="Lc_codtiprod"  class="form-control input-sm select2">
										<option value="">SELECCIONE</option>
										<?php
										$ListarTipoProducto=$this->model->ListarProd();
										foreach ($ListarTipoProducto as $tipprod){
											?>
											<option value="<?php echo $tipprod->IN_CODI; ?>" ><?php echo utf8_encode($tipprod->IN_ARTI); ?></option>
										<?php } ?>
									</select>
								</div>
								<label class="control-label col-xs-3">Codigo de Equipo</label>
								<div class="col-xs-3">
									<input type="text" name="c_codequipo" id="c_codequipo"  class="form-control input-sm" onFocus="abrirmodalEqp()"/>
									<input type="hidden" name="c_codequipo2" id="c_codequipo2"  class="form-control input-sm" />
								</div>
							</div>
							<!--fin fila 8-->
							<div class="form-group">
								<label class="control-label col-xs-2">N° EIR Generador</label>
								<div class="col-xs-2">
									<input type="text" name="c_eirgen" id="c_eirgen"  class="form-control input-sm" value="" placeholder="N° EIR" disabled/>
								</div>
								<label class="control-label col-xs-2">Descripcion Gen.</label>
								<div class="col-xs-2">
									<input type="text" name="c_desgen" id="c_desgen"  class="form-control input-sm" value="" placeholder="Escriba el Codigo del Equipo" disabled/>
								</div>
								<label class="control-label col-xs-1">Generador</label>
								<div class="col-xs-2">
									<input type="text" name="c_numgen" id="c_numgen"  class="form-control input-sm" value="" placeholder="N° Generador"  disabled/>
								</div>
							</div>
							<!--fila9 -->

						</div>
                            <?php
                            require_once 'regdet/locales/transporte_tab2.php';
                            ?>
                        </div>
 	                </div>
                    <?php } ?>
                    <!-- Inicia Tab panes otros datos -->
                </div> <!-- fin Tab panes -->
            </form>
        </div>
    </div>
</div>

<script>
	function abrirmodalEqp() {
        $('#my_modal').modal('show');
        $('#tabla').load("?c=c03&a=verEquipos", {
            tipo: $('select[id=Lc_codtiprod]').val()
        });
    }	

//Buscar Transportista Salida
$(document).ready(function () {
	$("#Lc_codtiprod").change(function(){
            //alert($('select[id=c_codmar2]').val());
			var combo=$('select[id=Lc_codtiprod]').val();
			alert(combo);
/* 	  if($(".listado-todos-equipos-container").length > 0){
    consultarTodosEquiposAJAX('consultarTodosEquipos',combo);
} */

})
	/* Autocomplete de c_nomtranspote, jquery UI */
	
	$("#c_codequipo1").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=03&a=BuscarEquipo', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term,
					combo:$('select[id=Lc_codtiprod]').val()
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.PR_RAZO,
							value: item.PR_RAZO,
							ruc: item.PR_NRUC
						}
					}))
				}
			})
		}, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_codequipo").val(ui.item.id);
			$("#c_ructransporte").val(ui.item.ruc);

		}
	})
	/* Fin Autocomplete de producto, jquery UI */
	
})

//Buscar Transportista Ingreso
$(document).ready(function () {
	/* Autocomplete de c_nomtranspote, jquery UI */
	$("#c_nomtranspoteb").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.PR_RAZO,
							value: item.PR_RAZO,
							ruc: item.PR_NRUC
						}
					}))
				}
			})
		}, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_nomtranspoteb").val(ui.item.id);
			$("#c_ructransporteb").val(ui.item.ruc);

		}
	})
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Local
$(document).ready(function () {
	/* Autocomplete de c_nomtranspote, jquery UI */
	$("#c_nomtranspotel").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.PR_RAZO,
							value: item.PR_RAZO,
							ruc: item.PR_NRUC
						}
					}))
				}
			})
		}, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_nomtranspotel").val(ui.item.id);
			$("#c_ructransportel").val(ui.item.ruc);

		}
	})
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar EIR contenedor
$(document).ready(function () {
	/* Autocomplete de c_nomtranspote, jquery UI */
	$("#c_eirconten").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=01&a=EirBuscar', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.c_numeir,
							value: item.c_numeir,
							c_nserie: item.c_nserie,
							c_codprd: item.c_codprd
						}
					}))
				}
			})
		}, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_desconten").val(ui.item.c_codprd);
			$("#Lc_numequipo").val(ui.item.c_nserie);

		}
	})
	/* Fin Autocomplete de EIR, jquery UI */
})

//Buscar EIR contenedor
$(document).ready(function () {
	/* Autocomplete de c_nomtranspote, jquery UI */
	$("#c_eirgen").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=01&a=EirBuscar', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.c_numeir,
							value: item.c_numeir,
							c_nserie: item.c_nserie,
							c_codprd: item.c_codprd
						}
					}))
				}
			})
		}, <!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_desgen").val(ui.item.c_codprd);
			$("#c_numgen").val(ui.item.c_nserie);

		}
	})
	/* Fin Autocomplete de EIR, jquery UI */
})

//IMPORTACION
//Buscar Transportista Salida
$(document).ready(function () {
	/* Autocomplete de c_nomtranspote, jquery UI */
	$("#c_nomtranspoteI").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.PR_RAZO,
							value: item.PR_RAZO,
							ruc: item.PR_NRUC
						}
					}))
				}
			})
		}, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_nomtranspoteI").val(ui.item.id);
			$("#c_ructransporteI").val(ui.item.ruc);

		}
	})
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Ingreso
$(document).ready(function () {
	/* Autocomplete de c_nomtranspote, jquery UI */
	$("#c_nomtranspotebI").autocomplete({
		dataType: 'JSON',
		source: function (request, response) {
			jQuery.ajax({
				url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
				type: "post",
				dataType: "json",
				data: {
					criterio: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							id: item.PR_RAZO,
							value: item.PR_RAZO,
							ruc: item.PR_NRUC
						}
					}))
				}
			})
		}, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
		select: function (e, ui) {
			$("#c_nomtranspotebI").val(ui.item.id);
			$("#c_ructransportebI").val(ui.item.ruc);

		}
	})
	/* Fin Autocomplete de producto, jquery UI */
})

function agregarEmpTrans() {
	//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=regprov","miwin",
	miPopup = window.open("indexm.php?c=prov02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>", "miwin",
		"width=800,height=400,scrollbars=yes");
}

//IMPORTACION
//CHOFER SALIDA
function abrirmodalTransI() {
	var c_nomtranspote = document.getElementById('c_nomtranspoteI').value;
	var c_ructransporte = document.getElementById('c_ructransporteI').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspoteI").focus();
		return 0;
	} else {
		$('#my_modalTrans').modal('show');
		document.getElementById('empresa').value = c_nomtranspote;
		$('#tablaTrans').load("?c=01&a=VerChoferes", {
			c_nomtranspote: c_nomtranspote,
			c_ructransporte: c_ructransporte,
			tipo: 'salidaimpo'
		});
	}
}

function abrirmodalTransbI() {
	var c_nomtranspote = document.getElementById('c_nomtranspotebI').value;
	var c_ructransporte = document.getElementById('c_ructransportebI').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspotebI").focus();
		return 0;
	} else {
		$('#my_modalTrans').modal('show');
		document.getElementById('empresa').value = c_nomtranspote;
		$('#tablaTrans').load("?c=01&a=VerChoferes", {
			c_nomtranspote: c_nomtranspote,
			c_ructransporte: c_ructransporte,
			tipo: 'ingresoimpo'
		});
	}
}

function agregarChoferI() {
	c_ructransporte = document.getElementById('c_ructransporteI').value;
	c_nomtranspote = document.getElementById('c_nomtranspoteI').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspoteI").focus();
		return 0;
	} else {
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id=" + c_ructransporte + "&nom=" + c_nomtranspote, "miwin",
			"width=800,height=400,scrollbars=yes");
	}
}

function agregarChoferbI() {
	c_ructransporteb = document.getElementById('c_ructransportebI').value;
	c_nomtranspoteb = document.getElementById('c_nomtranspotebI').value;
	if (c_nomtranspoteb == '' || c_ructransporteb == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspotebI").focus();
		return 0;
	} else {
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id=" + c_ructransporteb + "&nom=" + c_nomtranspoteb, "miwin",
			"width=800,height=400,scrollbars=yes");
	}
}
//FIN DATOS IMPORTACION 
//CHOFER SALIDA
function abrirmodalTrans() {
	var c_nomtranspote = document.getElementById('c_nomtranspote').value;
	var c_ructransporte = document.getElementById('c_ructransporte').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspote").focus();
		return 0;
	} else {
		$('#my_modalTrans').modal('show');
		document.getElementById('empresa').value = c_nomtranspote;
		$('#tablaTrans').load("?c=01&a=VerChoferes", {
			c_nomtranspote: c_nomtranspote,
			c_ructransporte: c_ructransporte,
			tipo: 'salida'
		});
	}
}

function agregarChofer() {
	c_ructransporte = document.getElementById('c_ructransporte').value;
	c_nomtranspote = document.getElementById('c_nomtranspote').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspote").focus();
		return 0;
	} else {
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id=" + c_ructransporte + "&nom=" + c_nomtranspote, "miwin",
			"width=800,height=400,scrollbars=yes");
	}
}

//CHOFER INGRESO
function agregarChoferb() {
	c_ructransporteb = document.getElementById('c_ructransporteb').value;
	c_nomtranspoteb = document.getElementById('c_nomtranspoteb').value;
	if (c_nomtranspoteb == '' || c_ructransporteb == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspoteb").focus();
		return 0;
	} else {
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id=" + c_ructransporteb + "&nom=" + c_nomtranspoteb, "miwin",
			"width=800,height=400,scrollbars=yes");
	}
}

function abrirmodalTransb() {
	var c_nomtranspote = document.getElementById('c_nomtranspoteb').value;
	var c_ructransporte = document.getElementById('c_ructransporteb').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspoteb").focus();
		return 0;
	} else {
		$('#my_modalTrans').modal('show');
		document.getElementById('empresa').value = c_nomtranspote;
		$('#tablaTrans').load("?c=01&a=VerChoferes", {
			c_nomtranspote: c_nomtranspote,
			c_ructransporte: c_ructransporte,
			tipo: 'ingreso'
		});
	}
}

//CHOFER LOCAL
function agregarChoferl() {
	c_ructransportel = document.getElementById('c_ructransportel').value;
	c_nomtranspotel = document.getElementById('c_nomtranspotel').value;
	if (c_nomtranspotel == '' || c_ructransportel == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspotel").focus();
		return 0;
	} else {
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod=" + c_ructransportel + "&nom=" + c_nomtranspotel, "miwin",
			"width=800,height=400,scrollbars=yes");
	}
}

function abrirmodalTransl() {
	var c_nomtranspote = document.getElementById('c_nomtranspotel').value;
	var c_ructransporte = document.getElementById('c_ructransportel').value;
	if (c_nomtranspote == '' || c_ructransporte == '') {
		var mensje = "Falta Buscar Transportista ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_nomtranspotel").focus();
		return 0;
	} else {
		$('#my_modalTrans').modal('show');
		document.getElementById('empresa').value = c_nomtranspote;
		$('#tablaTrans').load("?c=01&a=VerChoferes", {
			c_nomtranspote: c_nomtranspote,
			c_ructransporte: c_ructransporte,
			tipo: 'local'
		});
	}
}
</script>

