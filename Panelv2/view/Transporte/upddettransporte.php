
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
//    $("#horaretiro").mask("hi:mn");
//    $("#horaingreso").mask("hi:mn");
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
		if(confirm("Seguro de Actualizar el Detalle del Transporte ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }
</script>

<!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
    <div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
                </div>
                <div class="modal-body">
                <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
                <!--Contenido se encuentra en verEquiposDispo.php-->
                </table>
                </div>
            </div>
        </div>
    </div>
</form>
<!--fin modal de BUSCAR CHOFER-->
 
<div class="container-fluid"> 
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">ACTUALIZAR DETALLE DE SERVICIO DE TRANSPORTE <?php echo $Id_servicio ?></div>
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
                            <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
                    border: 0px solid #A8A8A8;width:500px;" readonly />
                            <span id="mensaje" class="label label-default"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin modal alertas info-->
            <?php
//            var_dump($ListarDetalleUpd);
            ?>
            <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarUpdDetTransporte" >
 	            <div class="form-control-static" align="right">
                <?php if($c_tipmov=='I'){//Importaciones?>
   	 	            <a class="btn btn-primary" onclick="actualizarfwimpo();" >OBTENER DATOS FW IMPO</a>
                    <input type="hidden" name="c_icotermX" id="c_icotermX"    value="<?php echo $listarDetForwarder->Fwd_Inco; ?>" />
                    <input name="c_codconsigX" id="c_codconsigX"   type="hidden" value="<?php echo $listarDetForwarder->Fwd_Csne; ?>"   />
                    <input name="c_nomconsigX" id="c_nomconsigX"   type="hidden" value="<?php echo utf8_encode($listarDetForwarder->Ent_Rsoc); ?>"   />
                    <input type="hidden" name="c_nblmasterX" id="c_nblmasterX"   value="<?php echo $listarDetForwarder->Fwd_NBL1; ?>"  />
                    <input type="hidden" name="c_nblhijoX" id="c_nblhijoX"   value="<?php echo $listarDetForwarder->Fwd_NBL2; ?>"  />
                    <input type="hidden" name="c_idlinemarX" id="c_idlinemarX"  placeholder="Codigo"   value="<?php echo $listarDetForwarder->Fwd_Lin1; ?>"   />
                    <input type="hidden" name="c_nomlineamarX"  id="c_nomlineamarX"  placeholder="Nombre" value="<?php echo $listarDetForwarder->Lin_Desc; ?>"   />
                    <input type="hidden" name="c_idnaveX" id="c_idnaveX"  value="<?php echo $listarDetForwarder->Vje_Nave; ?>" />
                    <input type="hidden" name="c_nomnaveX" id="c_nomnaveX"   value="<?php echo $listarDetForwarder->Nav_Desc; ?>"    />
                    <input type="hidden" name="n_numviajeX" id="n_numviajeX"   value="<?php echo $listarDetForwarder->Vje_Nvia; ?>"   />
                    <input type="hidden" name="d_fecetdorigX" id="d_fecetdorigX"   value="<?php echo $listarDetForwarder->Vje_Fzar; ?>"  />
                    <input type="hidden" name="d_fecetdodestX" id="d_fecetdodestX"   value="<?php echo $listarDetForwarder->Vje_Farr; ?>" />
                    <input type="hidden" name="c_nummanifiestoX"  id="c_nummanifiestoX"  value="<?php echo $listarDetForwarder->Fwd_NroManifiesto; ?>"     />
                    <input type="hidden" name="c_condembX" id="c_condembX"   value="<?php echo $listarDetForwarder->Fwd_Cemb; ?>" />
                    <input type="hidden" name="c_idconsolidadorX"  id="c_idconsolidadorX"  value="<?php echo $listarDetForwarder->idconsolidador; ?>"  />
                    <input type="hidden" name="c_nomconsolidadorX"  id="c_nomconsolidadorX"  value="<?php echo $listarDetForwarder->nomconsolidador; ?>"  />
                    <input type="hidden" name="c_tipservX" id="c_tipservX"   value="<?php echo $listarDetForwarder->Fwd_Cemb; ?>" />
                    <input type="hidden" name="c_numequipoX" id="c_numequipoX"   placeholder="N° Equipo" value="<?php echo $listarDetForwarder->c_numequipo; ?>" />
                    <input type="hidden" name="n_pesoX"  id="n_pesoX"   value="<?php echo $listarDetForwarder->Fdc_Peso; ?>"  />
                    <input type="hidden" name="um_pesoX"  id="um_pesoX"   value="<?php echo $listarDetForwarder->Fdc_Upes; ?>"   />
                    <input type="hidden" name="n_volumenX" id="n_volumenX"   value="<?php echo $listarDetForwarder->Fdc_Vol; ?>"  />
                    <input type="hidden" name="um_volumenX" id="um_volumenX"   value="<?php echo $listarDetForwarder->Fdc_Uvol; ?>"  />
                    <input type="hidden" name="c_codagenmariX" id="c_codagenmariX"  value="<?php echo $listarDetForwarder->idconsolidador; ?>"   />
                    <input type="hidden" name="c_nomagemariX" id="c_nomagemariX"   value="<?php echo $listarDetForwarder->nomconsolidador; ?>"   />
                    <input type="hidden" name="c_codageaduanaX" id="c_codageaduanaX"   value="<?php echo utf8_encode($listarDetForwarder->Fwd_Agad); ?>"   />
                    <input type="hidden" name="c_nomageaduanaX" id="c_nomageaduanaX"   value="<?php echo utf8_encode($listarDetForwarder->nomagente); ?>"  />
                    <input type="hidden" name="c_preciaduanaX"  id="c_preciaduanaX"  value="<?php echo $listarDetForwarder->Fdc_Prad; ?>"   />
                    <input type="hidden" name="c_precilineaX" id="c_precilineaX"   value="<?php echo $listarDetForwarder->Fdc_Prli; ?>"  />
	            <?php } else if($c_tipmov=='E'){//Exportaciones?>
                    <a class="btn btn-primary" onclick="actualizarfwexpo();" >OBTENER DATOS FW EXPO</a>
                    <input type="hidden" name="c_nrobookingX" id="c_nrobookingX"   value="<?php echo $listarDetForwarder->Fwd_Bkng; ?>"   />
                    <input type="hidden" name="c_idembarX" id="c_idembarX"    value="<?php echo utf8_encode($listarDetForwarder->idembarcadero); ?>"  />
                    <input type="hidden" name="c_nomembarX" id="c_nomembarX"    value="<?php echo utf8_encode($listarDetForwarder->nomembarcadero); ?>"  />
                    <input type="hidden"  name="c_codclieX" id="c_codclieX"  value="<?php echo utf8_encode($listarDetForwarder->Fwd_ClienteFinal); ?>"   />
                    <input type="hidden" name="c_nomclieX" id="c_nomclieX"    value="<?php echo utf8_encode($listarDetForwarder->Fwd_DescripcionClienteFinal); ?>"   />
                    <input type="hidden" name="Ec_idlinemarX" id="Ec_idlinemarX"   value="<?php echo $listarDetForwarder->Fwd_Lin1; ?>"   />
                    <input type="hidden" name="Ec_nomlineamarX" id="Ec_nomlineamarX"   value="<?php echo $listarDetForwarder->Lin_Desc; ?>"    />
                    <input type="hidden" name="d_feczarpeX" id="d_feczarpeX"   value="<?php echo $listarDetForwarder->Vje_Fzar; ?>"   />
                    <input type="hidden" name="Ec_nomnaveX" id="Ec_nomnaveX"   value="<?php echo $listarDetForwarder->Nav_Desc; ?>"  />
                    <input type="hidden" name="En_numviajeX" id="En_numviajeX"   value="<?php echo $listarDetForwarder->Vje_Nvia; ?>"   />
                    <input type="hidden" name="Ec_numequipoX" id="Ec_numequipoX"  value="<?php echo $listarDetForwarder->c_numequipo; ?>"  />
                    <input type="hidden" name="En_pesoX"  id="En_pesoX"   value="<?php echo $listarDetForwarder->Fdc_Peso; ?>"  />
                    <input type="hidden" name="Eum_pesoX"  id="Eum_pesoX"   value="<?php echo $listarDetForwarder->Fdc_Upes; ?>"   />
                    <input type="hidden" name="En_volumenX" id="En_volumenX"   value="<?php echo $listarDetForwarder->Fdc_Vol; ?>"  />
                    <input type="hidden" name="Eum_volumenX" id="Eum_volumenX"   value="<?php echo $listarDetForwarder->Fdc_Uvol; ?>"  />
                    <input type="hidden" name="Ec_codageaduanaX" id="Ec_codageaduanaX"  value="<?php echo utf8_encode($listarDetForwarder->Fwd_Agad); ?>"   />
                    <input type="hidden" name="Ec_nomageaduanaX" id="Ec_nomageaduanaX" value="<?php echo utf8_encode($listarDetForwarder->nomagente); ?>" />
                    <input type="hidden" name="Ec_codagemariX" id="c_codagemariX"  value="<?php echo $listarDetForwarder->idconsolidador; ?>"  />
                    <input type="hidden" name="Ec_nomagemariX" id="Ec_nomagemariX" value="<?php echo $listarDetForwarder->nomconsolidador; ?>"   />
                    <input type="hidden" name="c_preciaduanaX"  id="c_preciaduanaX"  value="<?php echo $listarDetForwarder->Fdc_Prad; ?>"   />
                    <input type="hidden" name="c_precilineaX" id="c_precilineaX"   value="<?php echo $listarDetForwarder->Fdc_Prli; ?>"  />
	            <?php } ?>
                    <!-- Boton Actualizar -->
                    <input class="btn btn-success" type="button" onclick="validarguardar()" value="Actualizar"/>
                    <!-- Boton Cancelar -->
                    <a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>
                    <!-- Boton Refrescar -->
                    <a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
                </div>
                <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"   />
                <input name="n_item"   id="n_item" type="hidden" value="<?php echo $n_item; ?>"  />
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
                    <li role="presentation"  ><a  href="#otros" aria-controls="otros" role="tab" data-toggle="tab" >Otros Datos</a></li>
                </ul>
                <!-- Inicia Tab panels -->
	            <div class="tab-content">
                    <?php if($c_tipmov=='I'){ ?>
                    <!-- Inicia Tab panes importacion -->
	                <div role="tabpanel" id="impo" class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#fw" aria-controls="fw" role="tab" data-toggle="tab">Datos Forwarder</a></li>
                            <li role="presentation"><a href="#conten" aria-controls="conten" role="tab" data-toggle="tab">Datos Contenedor</a></li>
                            <li role="presentation"><a href="#alm" aria-controls="alm" role="tab" data-toggle="tab">Datos Almacen</a></li>
                            <li role="presentation"><a href="#sal" aria-controls="sal" role="tab" data-toggle="tab">Datos Terminal Salida</a></li>
                            <li role="presentation"><a href="#ingreso" aria-controls="ingreso" role="tab" data-toggle="tab">Datos Terminal Ingreso</a></li>
                            <li role="presentation"><a href="#prov" aria-controls="prov" role="tab" data-toggle="tab">Datos Factura</a></li>
                            <li role="presentation"><a href="#adu" aria-controls="adu" role="tab" data-toggle="tab">Datos Aduana</a></li>
                        </ul>
	                    <div class="tab-content">
                            <?php
                            require_once 'update/importaciones/forwarder_tab.php';
                            require_once 'update/importaciones/contenedor_tab.php';
                            require_once 'update/importaciones/almacen_tab.php';
                            require_once 'update/importaciones/terminal_salida_tab.php';
                            require_once 'update/importaciones/terminal_ingreso_tab.php';
                            require_once 'update/importaciones/factura_tab.php';
                            require_once 'update/importaciones/aduana_tab.php';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($c_tipmov=='E'){ ?>
                    <!-- Inicia Tab panes exportacion -->
                    <div role="tabpanel" id="expo"  class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#fwexpo" aria-controls="fwexpo" role="tab" data-toggle="tab">Datos Forwarder</a></li>
                            <li role="presentation"><a href="#contenedor" aria-controls="contenedor" role="tab" data-toggle="tab">Datos Contenedor</a></li>
                            <li role="presentation"><a href="#retiro" aria-controls="retiro" role="tab" data-toggle="tab">Datos Terminal Salida</a></li>
                            <li role="presentation"><a href="#ing" aria-controls="ing" role="tab" data-toggle="tab">Datos Terminal Ingreso</a></li>
                            <li role="presentation"><a href="#fac" aria-controls="fac" role="tab" data-toggle="tab">Datos Factura</a></li>
                            <li role="presentation"><a href="#aduexpo" aria-controls="aduexpo" role="tab" data-toggle="tab">Datos Aduana</a></li>
                        </ul>
	                    <div class="tab-content">
                        <?php
                        require_once 'update/exportaciones/forwarder_tab.php';
                        require_once 'update/exportaciones/contenedor_tab.php';
                        require_once 'update/exportaciones/terminal_salida_tab.php';
                        require_once 'update/exportaciones/terminal_ingreso_tab.php';
                        require_once 'update/exportaciones/factura_tab.php';
                        require_once 'update/exportaciones/aduana_tab.php';
                        ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($c_tipmov=='L'){ ?>
                    <!-- Inicia Tab panes local -->
                    <div role="tabpanel" id="local" class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#doc" aria-controls="doc" role="tab" data-toggle="tab">Datos Documentos</a></li>
                            <li role="presentation"><a href="#contenlocal" aria-controls="contenlocal" role="tab" data-toggle="tab">Datos Equipo</a></li>
                            <li role="presentation"><a href="#translocal" aria-controls="translocal" role="tab" data-toggle="tab">Datos Transporte</a></li>
                        </ul>
                        <div class="tab-content">
                            <?php
                            require_once 'update/locales/documentos_tab.php';
                            require_once 'update/locales/equipo_tab.php';
                            require_once 'update/locales/transporte_tab.php';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Inicia Tab panes otros datos -->
	                <div role="tabpanel"  id="otros"  class="tab-pane">
     	                <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <?php
                        include_once 'update/otros/otros_datos_tab.php';
                        ?>
	                </div>
                </div> <!-- fin Tab panes -->
            </form>
        </div>
    </div>
</div>

<script>

//Buscar Transportista Salida
$(document).ready(function(){     
    /* Autocomplete de c_nomtranspote, jquery UI */
    $("#c_nomtranspote").autocomplete({
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspote").val(ui.item.id);
			$("#c_ructransporte").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Ingreso
$(document).ready(function(){     
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspoteb").val(ui.item.id);
			$("#c_ructransporteb").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Local
$(document).ready(function(){     
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspotel").val(ui.item.id);
			$("#c_ructransportel").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar EIR contenedor
$(document).ready(function(){     
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_desconten").val(ui.item.c_codprd);
			$("#Lc_numequipo").val(ui.item.c_nserie);
          
        }
    })
	/* Fin Autocomplete de EIR, jquery UI */
})

//Buscar EIR contenedor
$(document).ready(function(){     
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_desgen").val(ui.item.c_codprd);
			$("#c_numgen").val(ui.item.c_nserie);
          
        }
    })
	/* Fin Autocomplete de EIR, jquery UI */
})

//IMPORTACION
//Buscar Transportista Salida
$(document).ready(function(){     
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspoteI").val(ui.item.id);
			$("#c_ructransporteI").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Ingreso
$(document).ready(function(){     
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspotebI").val(ui.item.id);
			$("#c_ructransportebI").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

function agregarEmpTrans(){
		/*miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=regprov","miwin",
		"width=800,height=400,scrollbars=yes");*/
		miPopup = window.open("indexm.php?c=prov02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>","miwin",		
		"width=800,height=400,scrollbars=yes");
}

//IMPORTACION
//CHOFER SALIDA
function abrirmodalTransI(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspoteI').value;
	 var c_ructransporte=document.getElementById('c_ructransporteI').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspoteI").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'salidaimpo'});	
	 }
}

function abrirmodalTransbI(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspotebI').value;
	 var c_ructransporte=document.getElementById('c_ructransportebI').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspotebI").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'ingresoimpo'});	
	 }
}

function agregarChoferI(){
	c_ructransporte=document.getElementById('c_ructransporteI').value;
	c_nomtranspote=document.getElementById('c_nomtranspoteI').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspoteI").focus();
			return 0; 
	 }else{
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}

function agregarChoferbI(){
	c_ructransporteb=document.getElementById('c_ructransportebI').value;
	c_nomtranspoteb=document.getElementById('c_nomtranspotebI').value;
	 if(c_nomtranspoteb==''||c_ructransporteb==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspotebI").focus();
			return 0; 
	 }else{
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		 miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}

//FIN DATOS IMPORTACION 

//CHOFER SALIDA
function abrirmodalTrans(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspote').value;
	 var c_ructransporte=document.getElementById('c_ructransporte').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspote").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'salida'});	
	 }
}

function agregarChofer(){
	c_ructransporte=document.getElementById('c_ructransporte').value;
	c_nomtranspote=document.getElementById('c_nomtranspote').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspote").focus();
			return 0; 
	 }else{
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}

//CHOFER INGRESO
function agregarChoferb(){
	c_ructransporteb=document.getElementById('c_ructransporteb').value;
	c_nomtranspoteb=document.getElementById('c_nomtranspoteb').value;
	 if(c_nomtranspoteb==''||c_ructransporteb==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspoteb").focus();
			return 0; 
	 }else{
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}
function abrirmodalTransb(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspoteb').value;
	 var c_ructransporte=document.getElementById('c_ructransporteb').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspoteb").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'ingreso'});	
	 }
}

//CHOFER LOCAL
function agregarChoferl(){
	c_ructransportel=document.getElementById('c_ructransportel').value;
	c_nomtranspotel=document.getElementById('c_nomtranspotel').value;
	 if(c_nomtranspotel==''||c_ructransportel==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspotel").focus();
			return 0; 
	 }else{
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransportel+"&nom="+c_nomtranspotel,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}

function abrirmodalTransl(){
	 var c_nomtranspote=document.getElementById('c_nomtranspotel').value;
	 var c_ructransporte=document.getElementById('c_ructransportel').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspotel").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'local'});	
	 }
}

function actualizarfwexpo(){	
		var c_nrobookingX=document.getElementById('c_nrobookingX').value;
		document.getElementById('c_nrobooking').value=c_nrobookingX;		
		var c_idembarX=document.getElementById('c_idembarX').value;
		document.getElementById('c_idembar').value=c_idembarX;		
		var c_nomembarX=document.getElementById('c_nomembarX').value;
		document.getElementById('c_nomembar').value=c_nomembarX;		
		var c_codclieX=document.getElementById('c_codclieX').value;
		document.getElementById('c_codclie').value=c_codclieX;		
		var c_nomclieX=document.getElementById('c_nomclieX').value;
		document.getElementById('c_nomclie').value=c_nomclieX;
		
		var Ec_idlinemarX=document.getElementById('Ec_idlinemarX').value;
		document.getElementById('Ec_idlinemar').value=Ec_idlinemarX;	
		var Ec_nomlineamarX=document.getElementById('Ec_nomlineamarX').value;
		document.getElementById('Ec_nomlineamar').value=Ec_nomlineamarX;	
		var d_feczarpeX=document.getElementById('d_feczarpeX').value;
		document.getElementById('d_feczarpe').value=d_feczarpeX;	
		var Ec_nomnaveX=document.getElementById('Ec_nomnaveX').value;
		document.getElementById('Ec_nomnave').value=Ec_nomnaveX;	
		var En_numviajeX=document.getElementById('En_numviajeX').value;
		document.getElementById('En_numviaje').value=En_numviajeX;		
		
		var Ec_numequipoX=document.getElementById('Ec_numequipoX').value;
		document.getElementById('Ec_numequipo').value=Ec_numequipoX;
		var En_pesoX=document.getElementById('En_pesoX').value;
		document.getElementById('En_peso').value=En_pesoX;
		var Eum_pesoX=document.getElementById('Eum_pesoX').value;
		document.getElementById('Eum_peso').value=Eum_pesoX;
		var En_volumenX=document.getElementById('En_volumenX').value;
		document.getElementById('En_volumen').value=En_volumenX;	
		
		//var Eum_volumenX=document.getElementById('Eum_volumenX').value;
		//document.getElementById('Eum_volumen').value=Eum_volumenX;	
	
		var Ec_codageaduanaX=document.getElementById('Ec_codageaduanaX').value;
		document.getElementById('Ec_codageaduana').value=Ec_codageaduanaX;
		var Ec_nomageaduanaX=document.getElementById('Ec_nomageaduanaX').value;
		document.getElementById('Ec_nomageaduana').value=Ec_nomageaduanaX;	
		/*var Ec_codagemariX=document.getElementById('Ec_codagemariX').value;
		document.getElementById('Ec_codagemari').value=Ec_codagemariX;*/	
		var Ec_nomagemariX=document.getElementById('Ec_nomagemariX').value;
		document.getElementById('Ec_nomagemari').value=Ec_nomagemariX;
		
		//Otros Datos
		var c_preciaduanaX=document.getElementById('c_preciaduanaX').value;
		document.getElementById('c_preciaduana').value=c_preciaduanaX;		
		var c_precilineaX=document.getElementById('c_precilineaX').value;
		document.getElementById('c_precilinea').value=c_precilineaX;
	
	//alert('hola');
}

function actualizarfwimpo(){
	var c_icotermX=document.getElementById('c_icotermX').value;
	document.getElementById('c_icoterm').value=c_icotermX;	
	
	var c_codconsigX=document.getElementById('c_codconsigX').value;
	document.getElementById('c_codconsig').value=c_codconsigX;
	var c_nomconsigX=document.getElementById('c_nomconsigX').value;
	document.getElementById('c_nomconsig').value=c_nomconsigX;	
	
	var c_nblmasterX=document.getElementById('c_nblmasterX').value;
	document.getElementById('c_nblmaster').value=c_nblmasterX;
	var c_nblhijoX=document.getElementById('c_nblhijoX').value;
	document.getElementById('c_nblhijo').value=c_nblhijoX;
	var c_idlinemarX=document.getElementById('c_idlinemarX').value;
	document.getElementById('c_idlinemar').value=c_idlinemarX;
	var c_nomlineamarX=document.getElementById('c_nomlineamarX').value;
	document.getElementById('c_nomlineamar').value=c_nomlineamarX;	

	var c_idnaveX=document.getElementById('c_idnaveX').value;
	document.getElementById('c_idnave').value=c_idnaveX;
	var c_nomnaveX=document.getElementById('c_nomnaveX').value;
	document.getElementById('c_nomnave').value=c_nomnaveX;
	
	var n_numviajeX=document.getElementById('n_numviajeX').value;
	document.getElementById('n_numviaje').value=n_numviajeX;
	var d_fecetdorigX=document.getElementById('d_fecetdorigX').value;
	document.getElementById('d_fecetdorig').value=d_fecetdorigX;
	var d_fecetdodestX=document.getElementById('d_fecetdodestX').value;
	document.getElementById('d_fecetdodest').value=d_fecetdodestX;	
	var c_nummanifiestoX=document.getElementById('c_nummanifiestoX').value;
	document.getElementById('c_nummanifiesto').value=c_nummanifiestoX;
		
	var c_condembX=document.getElementById('c_condembX').value;
	document.getElementById('c_condemb').value=c_condembX;
	var c_idconsolidadorX=document.getElementById('c_idconsolidadorX').value;
	document.getElementById('c_idconsolidador').value=c_idconsolidadorX;	
	var c_nomconsolidadorX=document.getElementById('c_nomconsolidadorX').value;
	document.getElementById('c_nomconsolidador').value=c_nomconsolidadorX;
	
	var c_tipservX=document.getElementById('c_tipservX').value;
	document.getElementById('c_tipserv').value=c_tipservX;
	var c_numequipoX=document.getElementById('c_numequipoX').value;
	document.getElementById('c_numequipo').value=c_numequipoX;

	var n_pesoX=document.getElementById('n_pesoX').value;
	document.getElementById('n_peso').value=n_pesoX;	
	var um_pesoX=document.getElementById('um_pesoX').value;
	document.getElementById('um_peso').value=um_pesoX;	
	var n_volumenX=document.getElementById('n_volumenX').value;
	document.getElementById('n_volumen').value=n_volumenX;	
	var um_volumenX=document.getElementById('um_volumenX').value;
	document.getElementById('um_volumen').value=um_volumenX; 
	var c_codagenmariX=document.getElementById('c_codagenmariX').value;
	
	document.getElementById('c_codagenmari').value=c_codagenmariX;
	var c_nomagemariX=document.getElementById('c_nomagemariX').value;
	document.getElementById('c_nomagemari').value=c_nomagemariX;	
	var c_codageaduanaX=document.getElementById('c_codageaduanaX').value;
	document.getElementById('c_codageaduana').value=c_codageaduanaX;
	var c_nomageaduanaX=document.getElementById('c_nomageaduanaX').value;
	document.getElementById('c_nomageaduana').value=c_nomageaduanaX;
	
	//Otros Datos
	var c_preciaduanaX=document.getElementById('c_preciaduanaX').value;
	document.getElementById('c_preciaduana').value=c_preciaduanaX;		
	var c_precilineaX=document.getElementById('c_precilineaX').value;
	document.getElementById('c_precilinea').value=c_precilineaX;
	
	//alert('hola');	
	
}
</script>

