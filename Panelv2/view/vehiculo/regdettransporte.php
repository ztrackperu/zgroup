
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
	$( "#d_fecguiatranslle" ).datepicker();
	$( "#d_fecguiatransva" ).datepicker();
	
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

 <!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
  <div class="panel-heading">DETALLE DE SERVICIO DE TRANSPORTE</div>
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

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarDetTransporte" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>  
       
  	 
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" <?php if($c_tipmov=='I'){?> class="active"<?php } ?> ><a <?php if($c_tipmov=='I'){?> href="#impo" aria-controls="impo" role="tab" data-toggle="tab" <?php }?> >Importacion</a></li>
        <li role="presentation" <?php if($c_tipmov=='E'){?> class="active"<?php } ?> ><a <?php if($c_tipmov=='E'){?> href="#expo" aria-controls="expo" role="tab" data-toggle="tab" <?php }?> >Exportacion</a></li>
      	<li role="presentation" <?php if($c_tipmov=='L'){?> class="active"<?php } ?> ><a <?php if($c_tipmov=='L'){?> href="#local" aria-controls="local" role="tab" data-toggle="tab" <?php }?> >Local</a></li>
        <li role="presentation"  ><a  href="#otros" aria-controls="otros" role="tab" data-toggle="tab" >Otros Datos</a></li>
      </ul> 
     
    <!-- Inicia Tab panes -->
	<div class="tab-content">      
	<div role="tabpanel"  <?php if($c_tipmov=='I'){ ?> id="impo"  class="tab-pane active"  <?php }else{ ?> class="tab-pane"<?php } ?>  >
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"> <a href="#fw" aria-controls="fw" role="tab" data-toggle="tab"  >Datos Forwarder</a></li>
        <li role="presentation"  ><a  href="#conten" aria-controls="conten" role="tab" data-toggle="tab"  >Datos Contenedor</a></li>
        <li role="presentation"  ><a  href="#alm" aria-controls="alm" role="tab" data-toggle="tab"  >Datos Almacen</a></li>
        <li role="presentation"  ><a  href="#sal" aria-controls="sal" role="tab" data-toggle="tab"  >Datos Terminal Salida</a></li>
        <li role="presentation"  ><a  href="#ingreso" aria-controls="ingreso" role="tab" data-toggle="tab"  >Datos Terminal Ingreso</a></li>
        <li role="presentation"  ><a  href="#prov" aria-controls="prov" role="tab" data-toggle="tab"  >Datos Factura</a></li>
      	<li role="presentation"  ><a  href="#adu" aria-controls="adu" role="tab" data-toggle="tab"  >Datos Aduana</a></li>
      </ul> 
      <!-- Inicia Tab panes importacion -->
	  <div class="tab-content">      
        <div role="tabpanel" id="fw" class="tab-pane active" >
        	
      	   <div class="form-group">       	  
           <label class="control-label col-xs-1"></label>
            <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"   />
           </div>
            <!--fila 1-->
         <div class="form-group">
          <label class="control-label col-xs-2">Forwarder</label>
          <div class="col-xs-2">
           <input name="c_nrofw" id="c_nrofw" class="form-control input-sm"  type="text" value="<?php echo $c_nrofw; ?>" readonly  />
          </div>
          <label class="control-label col-xs-1">Servicio</label>
          <div class="col-xs-2">
             <input type="text" name="Id_servicio" id="Id_servicio"  class="form-control input-sm"  value="<?php echo $Id_servicio; ?>" readonly />            
          </div>
          <label class="control-label col-xs-1">Icoterm</label>
          <div class="col-xs-2">
             <input type="text" name="c_icoterm" id="c_icoterm"  class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fwd_Inco; ?>" />            
          </div>
                 
        </div>              
           <!--fila 2-->
         <div class="form-group">
          <label class="control-label col-xs-2">Consignatario</label>
          <div class="col-xs-3">
           <?php /*?><input name="c_codconsig" id="c_codconsig" class="form-control input-sm"  type="text" value="<?php echo $listarDetForwarder->Fwd_Csne; ?>"   />                       
          <?php */?>
           <select id="c_codconsig" name="c_codconsig"  class="form-control input-sm" onChange="cambiarconsig()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarEntidades=$this->model->ListarEntidades(); 
			    foreach ($ListarEntidades as $enti){
			  ?>
              <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$listarDetForwarder->Fwd_Csne){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
              <?php } ?>
              </select>
              <input name="c_nomconsig" id="c_nomconsig" class="form-control input-sm"  type="hidden" value="<?php echo utf8_encode($listarDetForwarder->Ent_Rsoc); ?>"   />
          
          </div>
         
          <label class="control-label col-xs-2">N° BL master </label>
          <div class="col-xs-2">
             <input type="text" name="c_nblmaster" id="c_nblmaster"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fwd_NBL1; ?>" placeholder="Numero BL master"  />  
          </div> 
                 
        </div>   
        
         <!--fila 3-->
         <div class="form-group">            
          <label class="control-label col-xs-2">N° BL hijo</label>
          <div class="col-xs-2">
             <input type="text" name="c_nblhijo" id="c_nblhijo"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fwd_NBL2; ?>" placeholder="Numero BL hijo"  />  
          </div> 
          <label class="control-label col-xs-2">Linea Maritima</label>
            <div class="col-xs-3">
             <?php /*?><input type="text" name="c_idlinemar" id="c_idlinemar" class="form-control input-sm" placeholder="Codigo"   value="<?php echo $listarDetForwarder->Fwd_Lin1; ?>"   /> 	
            <?php */?>
            <select id="c_idlinemar" name="c_idlinemar"  class="form-control input-sm" onChange="cambiarlineaimpo()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarLineaMaritima=$this->model->ListarLineaMaritima(); 
			    foreach ($ListarLineaMaritima as $lineamar){
			  ?>
              <option value="<?php echo $lineamar->Lin_Codi; ?>" <?php if($lineamar->Lin_Codi==$listarDetForwarder->Fwd_Lin1){?>selected<?php }?>><?php echo utf8_encode($lineamar->Lin_Desc); ?></option>
              <?php } ?>
              </select>
               <input type="hidden" name="c_nomlineamar"  id="c_nomlineamar" class="form-control input-sm" placeholder="Nombre" value="<?php echo $listarDetForwarder->Lin_Desc; ?>"   />            
            </div>            
        </div> 
       
       <!--fila 4-->        
       <div class="form-group">        	      		                 
            <label class="control-label col-xs-2">Fec Pago MBL </label>
            <div class="col-xs-2">
               <input type="text" name="d_fecpagblm" id="d_fecpagblm"  class="form-control input-sm" placeholder="Fecha Pago MBL"   />  
            </div> 
            <label class="control-label col-xs-2">Fec Pago HBL</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecpagblh" id="d_fecpagblh"  class="form-control input-sm" placeholder="Fecha Pago HBL"  />
        	</div>              
        </div>
        <!--fin fila 4-->    
        <!--fila 5-->
       <div class="form-group"> 
       		<label class="control-label col-xs-2">Nave</label>
            <div class="col-xs-2">
            <?php /*?><input type="text" name="c_idnave" id="c_idnave" class="form-control input-sm" value="<?php echo $listarDetForwarder->Vje_Nave; ?>" placeholder="Codigo"   /> <?php */?>
              <select id="c_idnave" name="c_idnave"  class="form-control input-sm" onChange="cambiarnaveimpo()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarNaves=$this->model->ListarNaves(); 
			    foreach ($ListarNaves as $nave){
			  ?>
              <option value="<?php echo $nave->Nav_Codi; ?>" <?php if($nave->Nav_Codi==$listarDetForwarder->Vje_Nave){?>selected<?php }?>><?php echo utf8_encode($nave->Nav_Desc); ?></option>
              <?php } ?>
              </select>
              <input type="hidden" name="c_nomnave" id="c_nomnave"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Nav_Desc; ?>" placeholder="Nombre"   />             
            </div>             
            <label class="control-label col-xs-2">N°viaje</label>
            <div class="col-xs-1">            
             <input type="text" name="n_numviaje" id="n_numviaje"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Vje_Nvia; ?>" placeholder="N° Viaje" onkeypress="return validaEntero(event)"   />                                               
            </div>      		
            <label class="control-label col-xs-1">Fec ETD Origen </label>
            <div class="col-xs-2">
               <input type="text" name="d_fecetdorig" id="d_fecetdorig"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Vje_Fzar; ?>"  />  
            </div> 
         </div>
         <!--fila 6--> 
          <div class="form-group">
       		<label class="control-label col-xs-2">Fec ETA Callao</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecetdodest" id="d_fecetdodest"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Vje_Farr; ?>" />
        	</div>          
                              
            <label class="control-label col-xs-2">N° manifiesto</label>
            <div class="col-xs-1">
             <input type="text" name="c_nummanifiesto"  id="c_nummanifiesto" class="form-control input-sm" value="<?php echo $listarDetForwarder->Fwd_NroManifiesto; ?>"     />            
            </div> 
            <label class="control-label col-xs-1">Fec HBL</label>
            <div class="col-xs-2">
               <input type="text" name="d_fectransblm" id="d_fectransblm"  class="form-control input-sm" placeholder="Fecha Transmision" />  
            </div> 
        </div>
        <!--fin fila 6-->   
        </div> <!-- Fin div fw -->
        
        <div role="tabpanel" id="conten" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 7-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Cond. Embarque</label>
            <div class="col-xs-1">
             <input type="text" name="c_condemb" id="c_condemb"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fwd_Cemb; ?>" />
        	</div>          
                              
            <label class="control-label col-xs-2">Consolidador</label>
            <div class="col-xs-3" >
            <?php /*?> <input type="text" name="c_idconsolidador"  id="c_idconsolidador" class="form-control input-sm" value="<?php echo $listarDetForwarder->idconsolidador; ?>"  /><?php */?><!-- solo en importacion-->            
             <select id="c_idconsolidador" name="c_idconsolidador"  class="form-control input-sm" onChange="cambiarconsolidador()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarEntidades=$this->model->ListarEntidades(); 
			    foreach ($ListarEntidades as $enti){
			  ?>
              <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$listarDetForwarder->idconsolidador){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
              <?php } ?>
              </select>
              <input type="hidden" name="c_nomconsolidador"  id="c_nomconsolidador" class="form-control input-sm" value="<?php echo $listarDetForwarder->nomconsolidador; ?>"  /><!-- solo en importacion-->            
			 </div>   
            
            <label class="control-label col-xs-2">Tipo Servicio</label>
            <div class="col-xs-1">
               <input type="text" name="c_tipserv" id="c_tipserv"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fwd_Cemb; ?>" />  
            </div>      
        	 
         </div>
        <!--fin fila 7-->  
         <!--fila8 -->
       <div class="form-group">  		         
             <label class="control-label col-xs-2">N° Conten.</label>
            <div class="col-xs-2">
             <input type="text" name="c_numequipo" id="c_numequipo"  class="form-control input-sm" placeholder="N° Equipo" value="<?php echo $listarDetForwarder->c_numequipo; ?>" />
        	</div> 
             <label class="control-label col-xs-2">Tipo de Contenedor</label>
            <div class="col-xs-2">
            <select id="c_codtiprod" name="c_codtiprod"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarTipoProducto=$this->model->ListarTipoProducto(); 
			    foreach ($ListarTipoProducto as $tipprod){
			  ?>
              <option value="<?php echo $tipprod->C_NUMITM; ?>" ><?php echo $tipprod->C_DESITM; ?></option>
              <?php } ?>
              </select>
              </div>
              <label class="control-label col-xs-1">Tamaño</label>
            <div class="col-xs-2">
            <select id="c_tamequipo" name="c_tamequipo"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarTamanoEquipo=$this->model->ListarTamanoEquipo(); 
			    foreach ($ListarTamanoEquipo as $tam){
			  ?>
              <option value="<?php echo $tam->C_DESITM; ?>" ><?php echo $tam->C_DESITM; ?></option>
              <?php } ?>
              </select>
              </div>
        </div>
        <div class="form-group">                  
            <label class="control-label col-xs-2">Peso Carga</label>
            <div class="col-xs-1">
             <input type="text" name="n_peso"  id="n_peso" class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fdc_Peso; ?>" onBlur="validaPeso();" onkeypress="return validaDecimal(event)"   />            
            </div>
            <div class="col-xs-1">
             <?php /*?><input type="text" name="um_peso"  id="um_peso" class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fdc_Upes; ?>"   /> <?php */?>
               <select name="um_peso" id="um_peso" class="form-control input-sm"> 
                <option value=""></option>
                <option value="kgs" <?php echo trim($listarDetForwarder->Fdc_Upes) == 'kgs' ? 'selected' : ''; ?> >kgs</option>
                <option value="qm"  <?php echo trim($listarDetForwarder->Fdc_Upes) == 'qm' ? 'selected' : ''; ?> >qm</option>
                <option value="ton" <?php echo trim($listarDetForwarder->Fdc_Upes) == 'ton' ? 'selected' : ''; ?> >ton</option>
               </select> 
            </div> 
            <label class="control-label col-xs-2">Volumen</label>
            <div class="col-xs-1">
               <input type="text" name="n_volumen" id="n_volumen"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fdc_Vol; ?>" onBlur="validaVolumen();" onkeypress="return validaDecimal(event)"  />  
            </div> 
            <div class="col-xs-1">
               <?php /*?><input type="text" name="um_volumen" id="um_volumen"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fdc_Uvol; ?>"  /> <?php */?> 
            	<select name="um_volumen" id="um_volumen" class="form-control input-sm"> 
                <option value=""></option>
                <option value="m3"     <?php echo trim($listarDetForwarder->Fdc_Uvol) == 'm3' ? 'selected' : ''; ?> >m3</option>
                <option value="kg/vol" <?php echo trim($listarDetForwarder->Fdc_Uvol) == 'kg/vol' ? 'selected' : ''; ?> >kg/vol</option>
               </select> 
            </div>
        </div>
        <!--fin fila 8-->  
        
         <!--fila9 -->
       <div class="form-group">    
            <label class="control-label col-xs-2">Peso Bruto</label>
            <div class="col-xs-1">
             <input type="text" name="n_pesobru"  id="n_pesobru" class="form-control input-sm" onBlur="validaPesobru();" onkeypress="return validaDecimal(event)"  />            
            </div>
            <div class="col-xs-1">
               <select name="um_pesobru" id="um_pesobru" class="form-control input-sm"> 
                <option value=""></option>
                <option value="kgs" >kgs</option>
                <option value="qm" >qm</option>
                <option value="ton" >ton</option>
               </select> 
            </div> 
            <label class="control-label col-xs-1">Tara</label>
            <div class="col-xs-2">
             <input type="text" name="n_tara"  id="n_tara" class="form-control input-sm" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />            
            </div>
            <div class="col-xs-1">
               <select name="um_tara" id="um_tara" class="form-control input-sm" > 
                <option value=""></option>
                <option value="kgs">kgs</option>
                <option value="lbs">lbs</option>
                <option value="ton">ton</option>
               </select> 
            </div> 
            <label class="control-label col-xs-1">Payload</label>
            <div class="col-xs-1">
             <input type="text" name="n_payload"  id="n_payload" class="form-control input-sm" onBlur="validaPayload();" onkeypress="return validaDecimal(event)"  />            
            </div>
            <div class="col-xs-1">
               <select name="um_payload" id="um_payload" class="form-control input-sm"> 
                <option value=""></option>
                <option value="kgs" >kgs</option>
                <option value="lbs" >lbs</option>
                <option value="ton" >ton</option>
               </select> 
            </div> 
        </div>
        <!--fin fila 9-->       
        
        </div><!--fin div conte--> 
        
        <div role="tabpanel" id="alm" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 9-->        
       <div class="form-group">
       		<label class="control-label col-xs-3">Almacen</label>
            <div class="col-xs-2">
            <!-- <input type="text" name="c_idalmacen" id="c_idalmacen"  class="form-control input-sm" placeholder="Codigo" />   -->          
        	 <select id="c_idalmacen" name="c_idalmacen"  class="form-control input-sm" onChange="cambiaralmacen()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarDepositos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
             <input type="hidden" name="c_nomalmacen" id="c_nomalmacen"  class="form-control input-sm" placeholder="Nombre" />
            </div>              
           
            <label class="control-label col-xs-2">Agente Maritimo</label>
            <div class="col-xs-4">
              <?php /*?> <input type="text" name="c_codagenmari" id="c_codagenmari" class="form-control input-sm" value="<?php echo $listarDetForwarder->idconsolidador; ?>" placeholder="Codigo"   />  <?php */?>
               <select id="c_codagenmari" name="c_codagenmari"  class="form-control input-sm" onChange="cambiaragentemar()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarEntidades=$this->model->ListarEntidades(); 
			    foreach ($ListarEntidades as $enti){
			  ?>
              <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$listarDetForwarder->idconsolidador){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
              <?php } ?>
              </select>
              <input type="hidden" name="c_nomagemari" id="c_nomagemari"  class="form-control input-sm" value="<?php echo $listarDetForwarder->nomconsolidador; ?>" placeholder="Nombre"   /> 
            
            </div> 
          
        	 
         </div>
        <!--fin fila 9--> 
        <!--fila 10-->        
       <div class="form-group">
       		<label class="control-label col-xs-3">Fecha Pago Almacen</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecpagalm"  id="d_fecpagalm" class="form-control input-sm" placeholder="Fecha Pago"   />            
            </div>   		        
             <label class="control-label col-xs-2">Datos THC</label>
            <div class="col-xs-2">
             <input type="text" name="n_impthc" id="n_impthc"  class="form-control input-sm"  placeholder="Importe THC" onBlur="validaImporteThc();" onkeypress="return validaDecimal(event)"  />
        	</div>               
            <div class="col-xs-2">
             <input type="text" name="d_fecpagthc"  id="d_fecpagthc" class="form-control input-sm" placeholder="Fecha Pago THC"   />            
            </div>   
                  
        	 
         </div>
        <!--fin fila 10-->  
         <!--fila11 -->
       <div class="form-group">  		         
            
            <label class="control-label col-xs-2">Datos VB</label>
            <div class="col-xs-1">
               <input type="text" name="n_impvb" id="n_impvb"  class="form-control input-sm" placeholder="Importe VB" onBlur="validaImporteVb();" onkeypress="return validaDecimal(event)"  />  
            </div>            
            <div class="col-xs-2">
             <input type="text" name="d_fecpagvb" id="d_fecpagvb"  class="form-control input-sm" placeholder="Fecha Pago VB"  />
        	</div>
       
            <label class="control-label col-xs-2">Dias Libres</label>
            <div class="col-xs-2">
             <input type="text" name="n_dlibres"  id="n_dlibres" class="form-control input-sm" placeholder="Sobreestadia" onkeypress="return validaEntero(event)"   />            
            </div>             
            <div class="col-xs-2">
             <input type="text" name="n_dlibelect" id="n_dlibelect"  class="form-control input-sm" placeholder="Electricidad" onkeypress="return validaEntero(event)"   />
        	</div>   
             
        </div>
        <!--fin fila 11--> 
        <!--fila12-->
       <div class="form-group"> 
       		<label class="control-label col-xs-3">Fecha Max Dev. vacio</label>
            <div class="col-xs-2">
               <input type="text" name="d_fecmaxdev" id="d_fecmaxdev"  class="form-control input-sm" placeholder="Fecha Max Dev. vacio"  />  
            </div> 		         
                
        </div>
        <!--fin fila 12--> 
        </div><!--fin div alm--> 
        
         <div role="tabpanel" id="sal" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 7-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Terminal Retiro Vacio</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="c_codtermret" id="c_codtermret"  class="form-control input-sm" placeholder="Codigo"  /><?php */?>
        	 <select id="c_codtermretI" name="c_codtermretI"  class="form-control input-sm" onChange="cambiarterminalvacioI()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarDepositos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
               <input type="hidden" name="c_nomtermretI"  id="c_nomtermretI" class="form-control input-sm" placeholder="Nombre"   />
            </div>                     
                              
            <label class="control-label col-xs-2">Fecha y Hora</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecretiroI"  id="d_fecretiroI" class="form-control input-sm" placeholder="Fecha Retiro"  />            
            </div>   
            <div class="col-xs-1">
             <input type="text" name="horaretiroI"  id="horaretiroI" class="form-control input-sm time-format" placeholder="Hora Retiro" style="width:85px;"  />            
            </div>    
        	 
         </div>
        <!--fin fila 7--> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Empresa Transporte </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtranspoteI" id="c_nomtranspoteI" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructransporteI" name="c_ructransporteI" value=""  />  
             </div>
             <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_choferI" id="c_choferI" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransI();" readonly />  
            </div>
            <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferI();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>          	   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
         	<label class="control-label col-xs-2">Licencia Chofer</label>
            <div class="col-xs-2">
            <input type="text" name="c_licenciI" id="c_licenciI" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" /> 
        	</div>         	 
           <label class="control-label col-xs-1">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marcaI" id="c_marcaI" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placas</label>
            <div class="col-xs-2">
             <input type="text" name="c_placaI" id="c_placaI" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_placa2I" id="c_placa2I" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
                  	  
        </div> 
         <!--fila8 -->
       <div class="form-group">
       		<label class="control-label col-xs-2">Telefono</label>
            <div class="col-xs-2">
             <input type="text" name="c_telefonoI" id="c_telefonoI"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        	</div> 
       		 <label class="control-label col-xs-1">Generadores</label>
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador1I" id="c_generador1I" value="" class="form-control input-sm" placeholder="Principal" />  
        	</div>            
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador2I" id="c_generador2I" value="" class="form-control input-sm" placeholder="Reserva" />  
        	</div>             
            <label class="control-label col-xs-2">Guia Transporte</label>
            <div class="col-xs-1">
               <input type="text" name="c_serguiatraI" id="c_serguiatraI"  class="form-control input-sm" placeholder="Serie"  />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_nroguiatraI"  id="c_nroguiatraI" class="form-control input-sm" placeholder="Numero"    />            
            </div>                
        </div>
        <!--fin fila 8-->  
               
        
        </div><!--fin div sal--> 
        
        <div role="tabpanel" id="ingreso" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 9-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Terminal de Ingreso</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="c_codterming" id="c_codterming"  class="form-control input-sm" placeholder="Codigo" /> <?php */?>            
        	  <select id="c_codtermingI" name="c_codtermingI"  class="form-control input-sm" onChange="cambiarterminalingI()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarDepositos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
              <input type="hidden" name="c_nomtermingI" id="c_nomtermingI"  class="form-control input-sm" placeholder="Nombre" />  
            </div>
            
            <label class="control-label col-xs-2">Fecha y Hora</label>
            <div class="col-xs-1">
             <input type="text" name="d_fecingresoI" id="d_fecingresoI"  class="form-control input-sm" style="width:85px;" placeholder="Fecha Ingreso" />
        	</div> 
            <div class="col-xs-1">   
             <input type="text" name="horaingresoI"  id="horaingresoI" class="form-control input-sm time-format" placeholder="Hora Ingreso" style="width:85px;"  />    
             </div>
                    
            <label class="control-label col-xs-1">Puerto</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="c_nompuerto" id="c_nompuerto"  class="form-control input-sm" placeholder="Puerto de Ingreso" /><?php */?>
        	 <select id="c_nompuertoI" name="c_nompuertoI"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarPuertos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_DESITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
            </div>            
         </div>
        <!--fin fila 9--> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Empresa Transporte </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtranspotebI" id="c_nomtranspotebI" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructransportebI" name="c_ructransportebI" value=""  />  
             </div>
             <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_choferbI" id="c_choferbI" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransbI();" readonly />  
            </div>
            <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferbI();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>          	   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
         	<label class="control-label col-xs-2">Licencia Chofer</label>
            <div class="col-xs-2">
            <input type="text" name="c_licencibI" id="c_licencibI" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" /> 
        	</div>         	 
           <label class="control-label col-xs-1">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marcabI" id="c_marcabI" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placas</label>
            <div class="col-xs-2">
             <input type="text" name="c_placabI" id="c_placabI" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_placa2bI" id="c_placa2bI" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
                  	  
        </div> 
        <!--fila 10-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Telefono</label>
            <div class="col-xs-2">
             <input type="text" name="c_telefonobI" id="c_telefonobI"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        	</div> 
       		 <label class="control-label col-xs-1">Generadores</label>
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador1bI" id="c_generador1bI" value="" class="form-control input-sm" placeholder="Principal" />  
        	</div>            
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador2bI" id="c_generador2bI" value="" class="form-control input-sm" placeholder="Reserva" />  
        	</div>  	        
            <label class="control-label col-xs-2">Guia Transporte</label>
            <div class="col-xs-1">
             <input type="text" name="c_serguiatrabI" id="c_serguiatrabI"  class="form-control input-sm"  placeholder="Serie"  />
        	</div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_nroguiatrabI" id="c_nroguiatrabI"  class="form-control input-sm"  placeholder="Numero"  />
        	</div>               
        </div>
        <!--fin fila 10--> 
      
        </div><!--fin div ingreso--> 
        
        
        <div role="tabpanel" id="prov" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 13-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Factura Proveedor</label>
            <div class="col-xs-1" >
             <input type="text" name="c_serfacprov" id="c_serfacprov"  class="form-control input-sm" placeholder="Serie" />
            </div>
             <div class="col-xs-2"> 
        	  <input type="text" name="c_numfacprov" id="c_numfacprov" class="form-control input-sm" placeholder="Numero" />
            </div>        
                              
            <label class="control-label col-xs-1">Traduccion Factura</label>
            <div class="col-xs-2">
             <input type="text" name="c_tradfac"  id="c_tradfac" class="form-control input-sm" placeholder="Traduccion Factura"    />            
            </div> 
            <label class="control-label col-xs-1">Polisa de seguro</label>
            <div class="col-xs-1">
               <input type="text" name="c_nropolizaseg" id="c_nropolizaseg"  class="form-control input-sm" placeholder="Polisa"  />  
            </div>              
         </div>         
        <!--fin fila 13-->  
         <!--fila14 -->
       <div class="form-group">  		         
             <label class="control-label col-xs-2">Fecha BL Endosado</label>     
        	<div class="col-xs-2">
               <input type="text" name="d_fecendose" id="d_fecendose"  class="form-control input-sm" placeholder="Fecha BL Endosado"  />  
            </div>                
            
        </div>
        <!--fin fila 14--> 
        </div><!--fin div prov--> 
        
         <div role="tabpanel" id="adu" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 15-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Agente Aduana</label>
            <div class="col-xs-1">
            	<input type="text" name="c_codageaduana" id="c_codageaduana" class="form-control input-sm" placeholder="Codigo"   />             
             </div>
             <div class="col-xs-2">
             	<input type="text" name="c_nomageaduana" id="c_nomageaduana" class="form-control input-sm" placeholder="Nombre"  />
        	 </div>          
                              
            <label class="control-label col-xs-1">Valor Aduana</label>
            <div class="col-xs-1">
             <input type="text" name="c_valaduana"  id="c_valaduana" class="form-control input-sm" placeholder="Valor"   />            
            </div> 
            <label class="control-label col-xs-1">Fecha Volante</label>
            <div class="col-xs-2">
               <input type="text" name="d_fecvolante" id="d_fecvolante"  class="form-control input-sm" placeholder="Fecha Volante"  />  
            </div>              
         </div>         
        <!--fin fila 15-->  
         <!--fila16 -->
       <div class="form-group">  		         
             <label class="control-label col-xs-2">Fecha Num. DUA</label>     
        	<div class="col-xs-2">
               <input type="text" name="d_fecnumdua" id="d_fecnumdua"  class="form-control input-sm" placeholder="Fecha Num. DUA"  />  
            </div> 
             <label class="control-label col-xs-1">Canal</label>     
        	<div class="col-xs-2">
               <input type="text" name="c_canal" id="c_canal"  class="form-control input-sm" placeholder="Canal"  />  
            </div>  
             <label class="control-label col-xs-1">Observacion</label>     
        	<div class="col-xs-2">
               <input type="text" name="c_observacion" id="c_observacion"  class="form-control input-sm" placeholder="Observacion" />  
            </div>                  
            
        </div>
        <!--fin fila 16--> 
        </div><!--fin div adu--> 
      </div>
    <!-- Fin Tab panes importacion -->   
          
 	 </div> <!--fin div impo-->
     
     <div role="tabpanel"  <?php if($c_tipmov=='L'){ ?> id="local"  class="tab-pane active"  <?php }else{ ?> class="tab-pane"<?php } ?>  >
       <div class="form-group">
       <label class="control-label col-xs-1"></label>       
       </div>
       <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"> <a href="#doc" aria-controls="doc" role="tab" data-toggle="tab"  >Datos Documentos</a></li>
        <li role="presentation"  ><a  href="#contenlocal" aria-controls="contenlocal" role="tab" data-toggle="tab"  >Datos Equipo</a></li>
        <li role="presentation"  ><a  href="#translocal" aria-controls="translocal" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
      </ul> 
      <!-- Inicia Tab panes local -->
	  <div class="tab-content">      
        <div role="tabpanel" id="doc" class="tab-pane active" >
        	
      	   <div class="form-group">       	  
           <label class="control-label col-xs-1"></label>          
           </div>
            <!--fila 1-->
         <div class="form-group">
          <label class="control-label col-xs-2">Cotizacion</label>
          <div class="col-xs-2">
           <input name="c_numped" id="c_numped" class="form-control input-sm"  type="text" value="<?php echo $c_numped; ?>" readonly  />
          </div>
          <label class="control-label col-xs-1">Servicio</label>
          <div class="col-xs-2">
             <input type="text" name="LId_servicio" id="LId_servicio"  class="form-control input-sm"  value="<?php echo $Id_servicio; ?>" readonly />            
          </div>
          <label class="control-label col-xs-2">Guia Remision</label>
          <div class="col-xs-2">
             <input type="text" name="c_numguia" id="c_numguia"  class="form-control input-sm"  value="<?php echo $listarDetCoti->c_numguia; ?>" />            
          </div>
                 
        </div>              
           <!--fila 2-->
         <div class="form-group">
          <label class="control-label col-xs-2">Cliente</label>
          <div class="col-xs-3">                    
          <select id="clientelocal" name="clientelocal"  class="form-control input-sm" onChange="cambiarclientelocal();" >
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarCliente=$this->model->ListarCliente(); 
			    foreach ($ListarCliente as $cli){
			  ?>
              <option value="<?php echo $cli->CC_NRUC; ?>" <?php if($cli->CC_NRUC==$listarDetCoti->CC_NRUC){?>selected<?php }?>><?php echo utf8_encode($cli->CC_RAZO); ?></option>
              <?php } ?>
              </select>
                <input name="Lc_nomclie" id="Lc_nomclie" class="form-control input-sm"  type="hidden" value="<?php echo utf8_encode($listarDetCoti->CC_RAZO); ?>"   />
          </div>
          <label class="control-label col-xs-1">RUC </label>
          <div class="col-xs-2">
             <input type="text" name="Lc_rucclie" id="Lc_rucclie"  class="form-control input-sm" value="<?php echo $listarDetCoti->CC_NRUC; ?>" placeholder="Numero de RUC"  />  
          </div> 
          <label class="control-label col-xs-1">Contacto </label>
          <div class="col-xs-2">
             <input type="text" name="Lc_contactocli" id="Lc_contactocli"  class="form-control input-sm" value="<?php echo utf8_encode($listarDetCoti->CC_RESP); ?>" placeholder="Contacto"  />  
          </div> 
                 
        </div>   
        <hr>
         <!--fila3 -->
       <div class="form-group">  		         
            
            <label class="control-label col-xs-2">Factura</label>
            <div class="col-xs-1">
               <input type="text" name="c_seriefac" id="c_seriefac"  class="form-control input-sm"  placeholder="Serie"  />  
            </div>            
            <div class="col-xs-2">
             <input type="text" name="c_numerofac" id="c_numerofac"  class="form-control input-sm"  placeholder="Numero"  />
        	</div>  
            <label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecfac"  id="d_fecfac" class="form-control input-sm"  placeholder="Fecha Factura"   />            
            </div>            
        </div>
        <!--fin fila 3--> 
               
       </div> <!-- Fin div doc -->
        
        <div role="tabpanel" id="contenlocal" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>  
       <!--fila7 -->
       <div class="form-group">  		         
             <label class="control-label col-xs-2">N° EIR Conten.</label>
            <div class="col-xs-2">
             <input type="text" name="c_eirconten" id="c_eirconten"  class="form-control input-sm" value="" placeholder="N° EIR" />
        	</div>
            <label class="control-label col-xs-3">Descripcion Contenedor</label>
            <div class="col-xs-3">
             <input type="text" name="c_desconten" id="c_desconten"  class="form-control input-sm" value="" placeholder="Descripcion Contenedor" />
        	</div>
        </div>      
         <!--fila8 -->
       <div class="form-group">  		         
             <label class="control-label col-xs-2">N° Conten.</label>
            <div class="col-xs-2">
             <input type="text" name="Lc_numequipo" id="Lc_numequipo"  class="form-control input-sm"  placeholder="N° Equipo" />
        	</div>  
             <label class="control-label col-xs-2">Tipo de Contenedor</label>
            <div class="col-xs-2">
            <select id="Lc_codtiprod" name="Lc_codtiprod"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarTipoProducto=$this->model->ListarTipoProducto(); 
			    foreach ($ListarTipoProducto as $tipprod){
			  ?>
              <option value="<?php echo $tipprod->C_NUMITM; ?>" ><?php echo utf8_encode($tipprod->C_DESITM); ?></option>
              <?php } ?>
              </select>
              </div>
              <label class="control-label col-xs-1">Tamaño</label>
            <div class="col-xs-2">
            <select id="Lc_tamequipo" name="Lc_tamequipo"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarTamanoEquipo=$this->model->ListarTamanoEquipo(); 
			    foreach ($ListarTamanoEquipo as $tam){
			  ?>
              <option value="<?php echo $tam->C_DESITM; ?>" ><?php echo $tam->C_DESITM; ?></option>
              <?php } ?>
              </select>
              </div>
        </div>    
        <!--fin fila 8--> 
        <!--fila9 -->
       <div class="form-group">    
            <label class="control-label col-xs-2">N° EIR Generador</label>
            <div class="col-xs-2">
             <input type="text" name="c_eirgen" id="c_eirgen"  class="form-control input-sm" value="" placeholder="N° EIR" />
        	</div>
            <label class="control-label col-xs-2">Descripcion Gen.</label>
            <div class="col-xs-2">
             <input type="text" name="c_desgen" id="c_desgen"  class="form-control input-sm" value="" placeholder="Descripcion Generador" />
        	</div>
            <label class="control-label col-xs-1">Generador</label>
            <div class="col-xs-2">
             <input type="text" name="c_numgen" id="c_numgen"  class="form-control input-sm" value="" placeholder="N° Generador" />
        	</div> 
        </div>
        <!--fin fila 9-->        
        
        </div><!--fin div contenlocal--> 
        
        <div role="tabpanel" id="translocal" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 9-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Nº Transportation</label>
            <div class="col-xs-2">
             <input type="text" name="c_nrotransp" id="c_nrotransp"  class="form-control input-sm" placeholder="Nº Transportation" />
            </div> 
            <label class="control-label col-xs-2">Guia Transp. lleno</label>
            <div class="col-xs-2">
              <input type="text" name="c_guiatranslleno" id="c_guiatranslleno"  class="form-control input-sm" placeholder="Guia Transportista lleno"   /> 
            </div>           
        	 <label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecguiatranslle"  id="d_fecguiatranslle" class="form-control input-sm"  placeholder="Fecha Guia T. lleno"   />            
            </div> 
         </div>
        <!--fin fila 9--> 
        <!--fila 10-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Guia Transp. vacio</label>
            <div class="col-xs-2">
              <input type="text" name="c_guiatransvacio" id="c_guiatransvacio"  class="form-control input-sm" placeholder="Guia Transportista vacio"   /> 
            </div>           
        	 <label class="control-label col-xs-2">Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecguiatransva"  id="d_fecguiatransva" class="form-control input-sm"  placeholder="Fecha Guia T. vacio"   />            
            </div>                
        </div>
        <!--fin fila 10--> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Empresa Transporte </label>
            <div class="col-xs-2">
             <input autocomplete="off" type="text" name="c_nomtranspotel" id="c_nomtranspotel" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructransportel" name="c_ructransportel" value=""  />  
             </div>
             <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_choferl" id="c_choferl" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransl();" readonly />  
            </div>
            <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferl();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div> 
             <label class="control-label col-xs-1">Telefono </label>
            <div class="col-xs-2">
             <input type="text" style="width:100px;" name="c_telefonol" id="c_telefonol" value="" class="form-control input-sm" placeholder="Telefono"  />  
            </div>         	   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
         	<label class="control-label col-xs-2">Licencia Chofer</label>
            <div class="col-xs-2">
            <input type="text" name="c_licencil" id="c_licencil" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" /> 
        	</div>         	 
           <label class="control-label col-xs-1">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marcal" id="c_marcal" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placas</label>
            <div class="col-xs-2">
             <input type="text" name="c_placal" id="c_placal" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_placa2l" id="c_placa2l" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
                  	  
        </div> 
        <!--fila 10-->         
          <!--fila 11-->
         <div class="form-group">            
          <label class="control-label col-xs-2">Direccion Salida</label>
          <div class="col-xs-3">
             <input type="text" name="c_diresal" id="c_diresal"  class="form-control input-sm" value="<?php echo utf8_encode($listarDetCoti->c_parti); ?>" placeholder="Direccion Salida"  />  
          </div> 
          <label class="control-label col-xs-2">Direccion Llegada</label>
            <div class="col-xs-3">
             <input type="text" name="c_direlle" id="c_direlle"  class="form-control input-sm" value="<?php echo utf8_encode($listarDetCoti->c_llega); ?>" placeholder="Direccion Llegada"  />  
            </div>         
        </div>  
         <!--fila 12-->
         <div class="form-group">            
          <label class="control-label col-xs-2">Observacion</label>
          <div class="col-xs-6">
             <input type="text" name="Lc_observacion" id="Lc_observacion"  class="form-control input-sm"  placeholder="Observacion"  />  
          </div>        
        </div> 
              
        </div><!--fin div translocal-->
        
      </div>
    <!-- Fin Tab panes local -->           
 	 </div> <!-- Fin role="tabpanel" id="local" --> 
     
     <div role="tabpanel"  <?php if($c_tipmov=='E'){ ?> id="expo"  class="tab-pane active"  <?php }else{ ?> class="tab-pane"<?php } ?>  >
     	<div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"> <a href="#fwexpo" aria-controls="fwexpo" role="tab" data-toggle="tab"  >Datos Forwarder</a></li>
        <li role="presentation"  ><a  href="#contenedor" aria-controls="contenedor" role="tab" data-toggle="tab"  >Datos Contenedor</a></li>
        <li role="presentation"  ><a  href="#retiro" aria-controls="retiro" role="tab" data-toggle="tab"  >Datos Terminal Salida</a></li>
        <li role="presentation"  ><a  href="#ing" aria-controls="ing" role="tab" data-toggle="tab"  >Datos Terminal Ingreso</a></li>
        <li role="presentation"  ><a  href="#fac" aria-controls="fac" role="tab" data-toggle="tab"  >Datos Factura</a></li>
      	<li role="presentation"  ><a  href="#aduexpo" aria-controls="aduexpo" role="tab" data-toggle="tab"  >Datos Aduana</a></li>
      </ul> 
      <!-- Inicia Tab panes exportacion -->
	  <div class="tab-content">      
        <div role="tabpanel" id="fwexpo" class="tab-pane active" >
        	
      	   <div class="form-group">       	  
           <label class="control-label col-xs-1"></label>
           </div>
            <!--fila 1-->
         <div class="form-group">
          <label class="control-label col-xs-2">Servicio</label>
          <div class="col-xs-1">
           <input type="text" style="width:80px;" name="EId_servicio" id="EId_servicio"  class="form-control input-sm"  value="<?php echo $Id_servicio; ?>" readonly />            
          </div>
          <label class="control-label col-xs-1">Forwarder</label>
          <div class="col-xs-1">
           <input type="text" name="Ec_nrofw" id="Ec_nrofw" class="form-control input-sm"  value="<?php echo $c_nrofw; ?>" readonly  />
          </div>
          <label class="control-label col-xs-1">Booking</label>
          <div class="col-xs-2">
           <input type="text" name="c_nrobooking" id="c_nrobooking" class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fwd_Bkng; ?>" readonly  />
          </div>          
          <label class="control-label col-xs-1">Embarcadero</label>          
          	 <input type="hidden" name="c_idembar" id="c_idembar"  class="form-control input-sm"  value="<?php echo $listarDetForwarder->idembarcadero; ?>" placeholder="Codigo" /> 
          <div class="col-xs-2">   
             <input type="text" name="c_nomembar" id="c_nomembar"  class="form-control input-sm"  value="<?php echo utf8_encode($listarDetForwarder->nomembarcadero); ?>" placeholder="Nombre" />            
          </div>
                 
        </div>              
           <!--fila 2-->
         <div class="form-group">
          <label class="control-label col-xs-2">Cliente</label>
          <div class="col-xs-1">
           <input name="c_codclie" id="c_codclie" class="form-control input-sm"  type="text" value="<?php echo $listarDetForwarder->Fwd_ClienteFinal; ?>"   />                       
          </div>
          <div class="col-xs-3">
           <input name="c_nomclie" id="c_nomclie" class="form-control input-sm"  type="text" value="<?php echo utf8_encode($listarDetForwarder->Fwd_DescripcionClienteFinal); ?>"   />
          </div>
          <label class="control-label col-xs-2">Linea Maritima </label>
          <div class="col-xs-3">
             <!-- <input type="text" name="Ec_idlinemar" id="Ec_idlinemar"  class="form-control input-sm" value="<?php //echo $listarDetForwarder->Fwd_Lin1; ?>" placeholder="Codigo"  />  -->
             <select id="Ec_idlinemar" name="Ec_idlinemar"  class="select2 form-control input-sm" onChange="cambiarlineaexpo()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarLineaMaritima=$this->model->ListarLineaMaritima(); 
			    foreach ($ListarLineaMaritima as $lineamar){
			  ?>
              <option value="<?php echo $lineamar->Lin_Codi; ?>" <?php if($lineamar->Lin_Codi==$listarDetForwarder->Fwd_Lin1){?>selected<?php }?>><?php echo utf8_encode($lineamar->Lin_Desc); ?></option>
              <?php } ?>
              </select>
               <input type="hidden" name="Ec_nomlineamar" id="Ec_nomlineamar"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Lin_Desc; ?>"  placeholder="Nombre"  />  
          </div>           
        </div>   
        
         <!--fila 3-->
         <div class="form-group">            
          <label class="control-label col-xs-2">Fecha de Zarpe</label>
          <div class="col-xs-2">
             <input type="text" name="d_feczarpe" id="d_feczarpe"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Vje_Fzar; ?>" placeholder="Fecha de Zarpe"  />  
          </div> 
          <label class="control-label col-xs-2">Nave</label>
            <div class="col-xs-2">
              <select id="Ec_idnave" name="Ec_idnave"  class="form-control input-sm" onChange="cambiarnaveexpo()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarNaves=$this->model->ListarNaves(); 
			    foreach ($ListarNaves as $nave){
			  ?>
              <option value="<?php echo $nave->Nav_Codi; ?>" <?php if($nave->Nav_Codi==$listarDetForwarder->Vje_Nave){?>selected<?php }?>><?php echo $nave->Nav_Desc; ?></option>
              <?php } ?>
              </select>
            <!-- <input type="text" name="Ec_idnave" id="Ec_idnave" class="form-control input-sm" value="<?php //echo $listarDetForwarder->Vje_Nave; ?>" placeholder="Codigo"  /> -->
            	<input type="hidden" name="Ec_nomnave" id="Ec_nomnave"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Nav_Desc; ?>" placeholder="Nombre"   />             
            </div>
            
             <label class="control-label col-xs-1">N° Viaje</label>
             <div class="col-xs-1">
             <input type="text" name="En_numviaje" id="En_numviaje"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Vje_Nvia; ?>" placeholder="N° Viaje"  />             
             </div>       
        </div>        
      
        </div> <!-- Fin div fw -->
        
        <div role="tabpanel" id="contenedor" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>        	
         <!--fila8 -->
       <div class="form-group">  		         
            <label class="control-label col-xs-2">N° Conten.</label>
            <div class="col-xs-2">
             <input type="text" name="Ec_numequipo" id="Ec_numequipo"  class="form-control input-sm" placeholder="N° Equipo" value="<?php echo $listarDetForwarder->c_numequipo; ?>"  />
        	</div>  
             <label class="control-label col-xs-2">Tipo de Contenedor</label>
            <div class="col-xs-2">
            <select id="Ec_codtiprod" name="Ec_codtiprod"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarTipoProducto=$this->model->ListarTipoProducto(); 
			    foreach ($ListarTipoProducto as $tipprod){
			  ?>
              <option value="<?php echo $tipprod->C_NUMITM; ?>" ><?php echo $tipprod->C_DESITM; ?></option>
              <?php } ?>
              </select>
              </div>
              <label class="control-label col-xs-1">Tamaño</label>
            <div class="col-xs-2">
            <select id="Ec_tamequipo" name="Ec_tamequipo"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarTamanoEquipo=$this->model->ListarTamanoEquipo(); 
			    foreach ($ListarTamanoEquipo as $tam){
			  ?>
              <option value="<?php echo $tam->C_DESITM; ?>" ><?php echo $tam->C_DESITM; ?></option>
              <?php } ?>
              </select>
              </div>
        </div>
        <div class="form-group">               
            <label class="control-label col-xs-2">Peso Carga</label>
            <div class="col-xs-2">
             <input type="text" name="En_peso"  id="En_peso" class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fdc_Peso; ?>" onBlur="validaPesoE();" onkeypress="return validaDecimal(event)"   />            
            </div>
            <div class="col-xs-1">
             <?php /*?><input type="text" name="um_peso"  id="um_peso" class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fdc_Upes; ?>"   /> <?php */?>
               <select name="Eum_peso" id="Eum_peso" class="form-control input-sm"> 
                <option value="">SELECCIONE</option>
                <option value="kgs" <?php echo trim($listarDetForwarder->Fdc_Upes) == 'kgs' ? 'selected' : ''; ?> >kgs</option>
                <option value="qm"  <?php echo trim($listarDetForwarder->Fdc_Upes) == 'qm' ? 'selected' : ''; ?> >qm</option>
                <option value="ton" <?php echo trim($listarDetForwarder->Fdc_Upes) == 'ton' ? 'selected' : ''; ?> >ton</option>
               </select> 
            </div> 
            <label class="control-label col-xs-1">Volumen</label>
            <div class="col-xs-1">
               <input type="text" name="En_volumen" id="En_volumen"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fdc_Vol; ?>"  onBlur="validaVolumenE();" onkeypress="return validaDecimal(event)"  />  
            </div> 
            <div class="col-xs-1">
               <?php /*?><input type="text" name="um_volumen" id="um_volumen"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fdc_Uvol; ?>"  /> <?php */?> 
            	<select name="Eum_volumen" id="Eum_volumen" class="form-control input-sm"> 
                <option value="">SELECCIONE</option>
                <option value="m3"     <?php echo trim($listarDetForwarder->Fdc_Uvol) == 'm3' ? 'selected' : ''; ?> >m3</option>
                <option value="kg/vol" <?php echo trim($listarDetForwarder->Fdc_Uvol) == 'kg/vol' ? 'selected' : ''; ?> >kg/vol</option>
               </select> 
            </div>
        </div>
        <!--fin fila 8--> 
         <!--fila9 -->
       <div class="form-group">    
            <label class="control-label col-xs-2">Peso Bruto</label>
            <div class="col-xs-1">
             <input type="text" name="En_pesobru"  id="En_pesobru" class="form-control input-sm"  onBlur="validaPesobruE();" onkeypress="return validaDecimal(event)" />            
            </div>
            <div class="col-xs-1">
               <select name="Eum_pesobru" id="Eum_pesobru" class="form-control input-sm"> 
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="qm">qm</option>
                <option value="ton">ton</option>
               </select> 
            </div> 
            <label class="control-label col-xs-1">Tara</label>
            <div class="col-xs-2">
             <input type="text" name="En_tara"  id="En_tara" class="form-control input-sm"  onBlur="validaTaraE();" onkeypress="return validaDecimal(event)" />            
            </div>
            <div class="col-xs-1">
               <select name="Eum_tara" id="Eum_tara" class="form-control input-sm"> 
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="lbs">lbs</option>
                <option value="ton">ton</option>
               </select> 
            </div> 
            <label class="control-label col-xs-1">Payload</label>
            <div class="col-xs-1">
             <input type="text" name="En_payload"  id="En_payload" class="form-control input-sm"  onBlur="validaPayloadE();" onkeypress="return validaDecimal(event)" />            
            </div>
            <div class="col-xs-1">
               <select name="Eum_payload" id="Eum_payload" class="form-control input-sm"> 
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="lbs">lbs</option>
                <option value="ton">ton</option>
               </select> 
            </div> 
        </div>
        <!--fin fila 9-->       
        
        </div><!--fin div contenedor-->
        
        <div role="tabpanel" id="retiro" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 7-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Terminal Retiro Vacio</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="c_codtermret" id="c_codtermret"  class="form-control input-sm" placeholder="Codigo"  /><?php */?>
        	 <select id="c_codtermret" name="c_codtermret"  class="form-control input-sm" onChange="cambiarterminalvacio()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarDepositos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
               <input type="hidden" name="c_nomtermret"  id="c_nomtermret" class="form-control input-sm" placeholder="Nombre"   />
            </div>                     
                              
            <label class="control-label col-xs-2">Fecha y Hora</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecretiro"  id="d_fecretiro" class="form-control input-sm" placeholder="Fecha Retiro"  />            
            </div>   
            <div class="col-xs-1">
             <input type="text" name="horaretiro"  id="horaretiro" class="form-control input-sm time-format" placeholder="Hora Retiro" style="width:85px;"  />            
            </div>           
            <label class="control-label col-xs-1">Nº EIR</label>
            <div class="col-xs-1">
               <input type="text" name="c_numeir" id="c_numeir"  class="form-control input-sm" placeholder="EIR"  />  
            </div>     
        	 
         </div>
        <!--fin fila 7--> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Empresa Transporte </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtranspote" id="c_nomtranspote" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructransporte" name="c_ructransporte" value=""  />  
             </div>
             <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_chofer" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />  
            </div>
            <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChofer();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>          	   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
         	<label class="control-label col-xs-2">Licencia Chofer</label>
            <div class="col-xs-2">
            <input type="text" name="c_licenci" id="c_licenci" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" /> 
        	</div>         	 
           <label class="control-label col-xs-1">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marca" id="c_marca" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placas</label>
            <div class="col-xs-2">
             <input type="text" name="c_placa" id="c_placa" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_placa2" id="c_placa2" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
                  	  
        </div> 
         <!--fila8 -->
       <div class="form-group">
       		<label class="control-label col-xs-2">Telefono</label>
            <div class="col-xs-2">
             <input type="text" name="c_telefono" id="c_telefono"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        	</div> 
       		 <label class="control-label col-xs-1">Generadores</label>
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador1" id="c_generador1" value="" class="form-control input-sm" placeholder="Principal" />  
        	</div>            
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador2" id="c_generador2" value="" class="form-control input-sm" placeholder="Reserva" />  
        	</div>             
            <label class="control-label col-xs-2">Guia Transporte</label>
            <div class="col-xs-1">
               <input type="text" name="c_serguiatra" id="c_serguiatra"  class="form-control input-sm" placeholder="Serie"  />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_nroguiatra"  id="c_nroguiatra" class="form-control input-sm" placeholder="Numero"    />            
            </div>                
        </div>
        <!--fin fila 8-->  
               
        
        </div><!--fin div conte--> 
        
        <div role="tabpanel" id="ing" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 9-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Terminal de Ingreso</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="c_codterming" id="c_codterming"  class="form-control input-sm" placeholder="Codigo" /> <?php */?>            
        	  <select id="c_codterming" name="c_codterming"  class="form-control input-sm" onChange="cambiarterminaling()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarDepositos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
              <input type="hidden" name="c_nomterming" id="c_nomterming"  class="form-control input-sm" placeholder="Nombre" />  
            </div>
            
            <label class="control-label col-xs-2">Fecha y Hora</label>
            <div class="col-xs-1">
             <input type="text" name="d_fecingreso" id="d_fecingreso"  class="form-control input-sm" style="width:85px;" placeholder="Fecha Ingreso" />
        	</div> 
            <div class="col-xs-1">   
             <input type="text" name="horaingreso"  id="horaingreso" class="form-control input-sm" placeholder="Hora Ingreso" style="width:85px;"  />    
             </div>
                    
            <label class="control-label col-xs-1">Puerto</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="c_nompuerto" id="c_nompuerto"  class="form-control input-sm" placeholder="Puerto de Ingreso" /><?php */?>
        	 <select id="c_nompuerto" name="c_nompuerto"  class="form-control input-sm">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarDepositos=$this->model->ListarPuertos(); 
			    foreach ($ListarDepositos as $dep){
			  ?>
              <option value="<?php echo $dep->C_DESITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
              <?php } ?>
              </select>
            </div>            
         </div>
        <!--fin fila 9--> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Empresa Transporte </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtranspoteb" id="c_nomtranspoteb" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructransporteb" name="c_ructransporteb" value=""  />  
             </div>
             <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_choferb" id="c_choferb" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransb();" readonly />  
            </div>
            <div class="col-xs-1">
                <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferb();"> 
                	<i class="glyphicon glyphicon-plus"></i>
                </button>		
            </div>          	   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
         	<label class="control-label col-xs-2">Licencia Chofer</label>
            <div class="col-xs-2">
            <input type="text" name="c_licencib" id="c_licencib" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" /> 
        	</div>         	 
           <label class="control-label col-xs-1">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marcab" id="c_marcab" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placas</label>
            <div class="col-xs-2">
             <input type="text" name="c_placab" id="c_placab" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_placa2b" id="c_placa2b" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
                  	  
        </div> 
        <!--fila 10-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Telefono</label>
            <div class="col-xs-2">
             <input type="text" name="c_telefonob" id="c_telefonob"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        	</div> 
       		 <label class="control-label col-xs-1">Generadores</label>
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador1b" id="c_generador1b" value="" class="form-control input-sm" placeholder="Principal" />  
        	</div>            
            <div class="col-xs-1">
             <input type="text" style="width:90px;" name="c_generador2b" id="c_generador2b" value="" class="form-control input-sm" placeholder="Reserva" />  
        	</div>  	        
            <label class="control-label col-xs-2">Guia Transporte</label>
            <div class="col-xs-1">
             <input type="text" name="c_serguiatrab" id="c_serguiatrab"  class="form-control input-sm"  placeholder="Serie"  />
        	</div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_nroguiatrab" id="c_nroguiatrab"  class="form-control input-sm"  placeholder="Numero"  />
        	</div>               
        </div>
        <!--fin fila 10-->  
         <!--fila11 -->
       <div class="form-group">  		         
            <label class="control-label col-xs-2">Guia Cliente</label>
            <div class="col-xs-1">
             <input type="text" name="c_serguiaclie" id="c_serguiaclie"  class="form-control input-sm"  placeholder="Serie"  />
        	</div> 
            <div class="col-xs-1">
             <input type="text" style="width:100px;" name="c_numguiaclie" id="c_numguiaclie"  class="form-control input-sm"  placeholder="Numero"  />
        	</div> 
            <label class="control-label col-xs-2">Agente de Aduana</label>
            <div class="col-xs-2">
               <?php /*?><input type="text" name="c_codageaduana" id="c_codageaduana"  class="form-control input-sm" placeholder="Codigo"  /> <?php */?> 
            	<select id="Ec_codageaduana" name="Ec_codageaduana"  class="form-control input-sm" onChange="cambiarageadu()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarEntidades=$this->model->ListarEntidades(); 
			    foreach ($ListarEntidades as $enti){
			  ?>
              <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$listarDetForwarder->Fwd_Csne){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
              <?php } ?>
              </select>
               <input type="hidden" name="Ec_nomageaduana" id="Ec_nomageaduana"  placeholder="Nombre"  value="<?php echo $listarDetForwarder->Ent_Rsoc; ?>" />
            </div>  
            <label class="control-label col-xs-1">F. Refrendo</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecrefrendo"  id="d_fecrefrendo" class="form-control input-sm" placeholder="Fecha Refrendo"   />            
            </div>             
        </div>
        <!--fin fila 11--> 
        <!--fila12-->
       <div class="form-group">
       	    <label class="control-label col-xs-2">N° DAM</label>          
            <div class="col-xs-2">
             <input type="text" name="c_numdam" id="c_numdam"  class="form-control input-sm" placeholder="N° DAM"  />
        	</div>  
       		<label class="control-label col-xs-1">Tipo Canal</label>
            <div class="col-xs-2">
               <input type="text" name="c_tipcanal" id="c_tipcanal"  class="form-control input-sm" placeholder="Tipo Canal"  />  
            </div> 		         
                
        </div>
        <!--fin fila 12--> 
        </div><!--fin div alm--> 
        <div role="tabpanel" id="fac" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 13-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Factura ZGROUP</label>
            <div class="col-xs-1" >
             <input type="text" name="c_serfacfw" id="c_serfacfw"  class="form-control input-sm" placeholder="Serie" />
            </div>
             <div class="col-xs-2"> 
        	  <input type="text" name="c_numfacfw" id="c_numfacfw" class="form-control input-sm" placeholder="Numero" />
            </div>        
                              
            <label class="control-label col-xs-2">Fecha Factura</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecfactura"  id="d_fecfactura" class="form-control input-sm" placeholder="Fecha Factura"    />            
            </div>
                         
         </div>         
        <!--fin fila 13--> 
        <!--fila 14-->        
       <div class="form-group">
       		<label class="control-label col-xs-2">Factura PSCARGO</label>
            <div class="col-xs-1" >
             <input type="text" name="c_serfacfwpsc" id="c_serfacfwpsc"  class="form-control input-sm" placeholder="Serie" />
            </div>
             <div class="col-xs-2"> 
        	  <input type="text" name="c_numfacfwpsc" id="c_numfacfwpsc" class="form-control input-sm" placeholder="Numero" />
            </div>        
                              
            <label class="control-label col-xs-2">Fecha Factura</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecfacturapsc"  id="d_fecfacturapsc" class="form-control input-sm" placeholder="Fecha Factura"    />            
            </div>
                         
         </div>         
        <!--fin fila 14--> 
        
        </div><!--fin div prov--> 
        
         <div role="tabpanel" id="aduexpo" class="tab-pane" >
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
        	<!--fila 15-->        
         <div class="form-group">
       		<label class="control-label col-xs-2">Agente Maritimo</label>
            <div class="col-xs-2">
            	<?php /*?><input type="text" name="Ec_codagemari" id="c_codagemari" class="form-control input-sm" placeholder="Codigo"  value="<?php echo $listarDetForwarder->idconsolidador; ?>"  />  <?php */?>           
              <select id="Ec_codagemari" name="Ec_codagemari"  class="form-control input-sm" onChange="cambiaragemari()">
              <option value="">SELECCIONE</option>
              <?php 
			  	$ListarEntidades=$this->model->ListarEntidades(); 
			    foreach ($ListarEntidades as $enti){
			  ?>
              <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$listarDetForwarder->idconsolidador){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
              <?php } ?>
              </select>
                <input type="hidden" name="Ec_nomagemari" id="Ec_nomagemari" placeholder="Nombre" value="<?php echo $listarDetForwarder->nomconsolidador; ?>"   />
        	 </div>          
                              
            <label class="control-label col-xs-1">Fec Pago de VB</label>
            <div class="col-xs-2">
             <input type="text" name="Ed_fecpagvb"  id="Ed_fecpagvb" class="form-control input-sm" placeholder="Fecha Pago de VB"   />            
            </div> 
            <label class="control-label col-xs-1">Fec Recepcion</label>
            <div class="col-xs-2">
               <input type="text" name="d_fecrecpfac" id="d_fecrecpfac"  class="form-control input-sm" placeholder="FR Fact. Comercial"  />  
            </div>              
         </div>         
        <!--fin fila 15-->  
         <!--fila16 -->
       <div class="form-group">  		         
             <label class="control-label col-xs-2">Fec Entrega</label>     
        	<div class="col-xs-2">
               <input type="text" name="d_fecentread" id="d_fecentread"  class="form-control input-sm" placeholder="FE Ag. Aduana"  />  
            </div> 
             <label class="control-label col-xs-1">Observacion</label>     
        	<div class="col-xs-2">
               <input type="text" name="Ec_observacion" id="Ec_observacion"  class="form-control input-sm" placeholder="Observacion"  />  
            </div> 
                             
            
        </div>
        <!--fin fila 16--> 
        </div><!--fin div adu--> 
      </div>
    <!-- Fin Tab panes exportacion --> 
     </div> <!--fin div expo-->   
	 
	 <div role="tabpanel"  id="otros"  class="tab-pane">
     	 <div class="form-group">
           <label class="control-label col-xs-1"></label>
         </div>
		 <!--fila 1-->        
         <div class="form-group">
       		<label class="control-label col-xs-2">Precinto Vacio</label>
            <div class="col-xs-2">
            	<input type="text" name="c_precivacio" id="c_precivacio" class="form-control input-sm" placeholder="Precinto Vacio"   />             
            </div>                   
            <label class="control-label col-xs-1" style="width:150px;">Precinto Aduana</label>
            <div class="col-xs-2">
             <input type="text" name="c_preciaduana"  id="c_preciaduana" class="form-control input-sm" placeholder="Precinto Aduana" value="<?php echo $listarDetForwarder->Fdc_Prad; ?>"   />            
            </div> 
            <label class="control-label col-xs-1" style="width:150px;">Precinto Zgroup</label>
            <div class="col-xs-2">
            	<input type="text" name="c_precizgroup" id="c_precizgroup" class="form-control input-sm" placeholder="Precinto Zgroup"  />             
            </div>                         
         </div>
         <!--fila 1-->        
         <div class="form-group">
       		<label class="control-label col-xs-2">Precinto Linea 1</label>
            <div class="col-xs-2">
               <input type="text" name="c_precilinea" id="c_precilinea"  class="form-control input-sm" placeholder="Precinto Linea 1" value="<?php echo $listarDetForwarder->Fdc_Prli; ?>"  />  
            </div>                   
            <label class="control-label col-xs-1" style="width:150px;">Precinto Linea 2</label>
            <div class="col-xs-2">
             <input type="text" name="c_precilinea2"  id="c_precilinea2" class="form-control input-sm" placeholder="Precinto Linea 2"   />            
            </div> 
            <label class="control-label col-xs-1" style="width:150px;">Precinto Linea 3</label>
            <div class="col-xs-2">
               <input type="text" name="c_precilinea3" id="c_precilinea3"  class="form-control input-sm" placeholder="Precinto Linea 3"  />  
            </div>              
         </div>
		<!--fila 2-->        
         <div class="form-group">       		                  
            <label class="control-label col-xs-2">Cod. Termoreg.1</label>
            <div class="col-xs-2">
             <input type="text" name="c_codterm1"  id="c_codterm1" class="form-control input-sm" placeholder="Cod. Termoregistrador 1"   />            
            </div> 
            <label class="control-label col-xs-1" style="width:150px;">Cod. Termoreg.2</label>
            <div class="col-xs-2">
               <input type="text" name="c_codterm2" id="c_codterm2"  class="form-control input-sm" placeholder="Cod. Termoregistrador 2"  />  
            </div>              
         </div>
		 <!--fila 3-->        
         <div class="form-group">
       		<label class="control-label col-xs-2">Temperatura</label>
            <div class="col-xs-2">
            	<input type="text" name="c_temp" id="c_temp" class="form-control input-sm" placeholder="Temperatura"  />             
            </div>                   
            <label class="control-label col-xs-1" style="width:150px;">Ventilacion</label>
            <div class="col-xs-2">
             <input type="text" name="c_venti"  id="c_venti" class="form-control input-sm" placeholder="Ventilacion"   />            
            </div> 
            <label class="control-label col-xs-1" style="width:150px;">Humedad</label>
            <div class="col-xs-2">
               <input type="text" name="c_humedad" id="c_humedad"  class="form-control input-sm" placeholder="Humedad"  />  
            </div>              
         </div>
		 <!--fila 4-->        
         <div class="form-group">
       		<label class="control-label col-xs-2">%Oxigeno(O2)</label>
            <div class="col-xs-2">
            	<input type="text" name="c_oxigeno" id="c_oxigeno" class="form-control input-sm" placeholder="%Oxigeno"   />             
            </div>                   
            <label class="control-label col-xs-1" style="width:150px;">%Diox.Carb.(CO2)</label>
            <div class="col-xs-2">
             <input type="text" name="c_dioxido"  id="c_dioxido" class="form-control input-sm" placeholder="%Dioxido de Carbono"   />            
            </div> 
            <label class="control-label col-xs-1" style="width:150px;">Codigo Purfresh</label>
            <div class="col-xs-2">
               <input type="text" name="c_codpurfresh" id="c_codpurfresh"  class="form-control input-sm" placeholder="Codigo Purfresh"  />  
            </div>              
         </div>
	 </div> <!--fin div otros-->
	 
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
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=regprov","miwin",
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
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
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
		//miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		 miPopup = window.open("indexm.php?c=prov01&a=UpdProveedor&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&id="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
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
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#Ec_idlinemar").select2();
    });
</script>

