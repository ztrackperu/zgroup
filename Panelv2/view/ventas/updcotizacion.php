<?php 
$DataCotizacion = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
$cantitems = 0;
foreach($DataCotizacion as $r):
		$c_numped=$r->c_numped;
		$c_codmon=$r->c_codmon;
		$c_tipped=$r->c_tipped;
		$c_asunto=$r->c_asunto;
		$c_codven=$r->c_codven;
		$c_nomcli=$r->c_nomcli;
		$cc_nruc=$r->cc_nruc;
		$c_email=$r->c_email;
		$c_contac=$r->c_contac;
		$c_codcli=$r->c_codcli;
		$n_tcamb=$r->n_tcamb;
		$c_telef=$r->c_telef;
		$c_lugent=$r->c_lugent;
		$c_tiempo=$r->c_tiempo;
		$c_validez=$r->c_validez;
		$c_codpgf=$r->c_codpgf; 
		$c_precios=$r->c_precios;
		$c_desgral=$r->c_desgral;
		$c_obsped=$r->c_obsped;
		$n_idreg=$r->n_idreg;
		$c_codpga=$r->c_codpga;
		$n_bruto=$r->n_bruto;
		$n_dscto=$r->n_dscto;
		$n_neta=$r->n_neta;
		$n_neti=$r->n_neti;
		$c_obsdoc=$r->c_obsdoc;
		$c_gencro=$r->c_gencrono;
		$c_swfirma=$r->c_swfirma;
		$c_gencrono=$r->c_gencrono;
		$c_meses=$r->c_meses;
		$d_fecped=$r->d_fecped;
		$d_fecreg=$r->d_fecreg;
		$d_fecent=$r->d_fecent;
		$c_numocref=$r->c_numocref;
		$c_via=$r->c_via;
    $c_estasig=$r->c_estasig;
		$asignacion=(isset($r->n_idasig)?$r->n_idasig:'');
		$cantitems++;
endforeach

?>

<script>
function abrirmodalEqp(c_desprd, i, c_codcla) {
  $('#my_modalframeprod').modal('show');
  $('#tabla').load("?c=03&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>&a=VerFrameproductos", {
    c_desprd: c_desprd,
    i: i,
    c_codcla: c_codcla
  });
}

function abirModalClases(c_clase, c_item) {
  $('#my_modalClases').modal('show');
  $("#xc_tippedxc").val(c_clase);
  $("#indice_clase").val(c_item);
};
</script>

<!--grilla update cotizaciones-->
<script type="text/javascript">
function OnchangecVia() {
  var c_via = document.Frmregcoti.xc_via.options[document.Frmregcoti.xc_via.selectedIndex].value;
  document.Frmregcoti.c_via.value = c_via
}
var valor = <?= $cantitems; ?>;
var posicionCampo = valor + 1;

function agregardetalle(mynewrow = false) {

  nuevaFila = document.getElementById("tblSample").insertRow(-1);
  nuevaFila.id = posicionCampo;
  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td> <input name='c_codprd_" + posicionCampo + "' type='hidden' id='c_codprd_" + posicionCampo + "' size='5' readonly='readonly' class='form-control input-sm'></td>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td> <input  name='c_desprd_" + posicionCampo + "' type='text' id='c_desprd_" + posicionCampo + "' size='40' readonly='readonly' class='form-control input-sm'></td> ";
  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='c_obsdoc_" + posicionCampo + "' type='text'  id='c_obsdoc_" + posicionCampo + "'  size='40'  class='form-control input-sm'/>";


  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='c_codcla_" + posicionCampo + "' type='hidden'  id='c_codcla_" + posicionCampo + "'  size='5'  class='form-control input-sm'/>";


  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='c_tipped_" + posicionCampo + "' type='text'  id='c_tipped_" + posicionCampo + "'  size='5'  class='form-control input-sm' readonly='readonly'/>";
  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='c_codcont_" + posicionCampo + "' readonly='readonly' type='text'  id='c_codcont_" + posicionCampo + "'  size='18'  class='form-control input-sm' />";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='c_fecini_" + posicionCampo + "' type='text'  id='c_fecini_" + posicionCampo + "'  size='10'  class='form-control input-sm'  onclick='abreVentanaF(this.name)'/>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='c_fecfin_" + posicionCampo + "' type='text'  id='c_fecfin_" + posicionCampo + "'  size='10'  class='form-control input-sm'/>";


  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='n_preprd_" + posicionCampo + "' type='text'  id='n_preprd_" + posicionCampo + "'  size='10' onkeyup='actualizar_importe(this.name);' class='form-control input-sm' style='text-align:right'/>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='n_dscto_" + posicionCampo + "' type='text'  id='n_dscto_" + posicionCampo + "'  size='10' onkeyup='actualizar_importe(this.name);' class='form-control input-sm' style='text-align:right'/>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='n_canprd_" + posicionCampo + "' type='text'  id='n_canprd_" + posicionCampo + "'  size='10' onkeyup='actualizar_importe(this.name);' class='form-control input-sm'/>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input name='imp_" + posicionCampo + "' type='text'  id='imp_" + posicionCampo + "'  size='10' readonly='readonly' class='form-control input-sm' style='text-align:right'/>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td bgcolor='#CCCCCC'> <input value='Delete' type='button'  class='btn btn-danger btn-sm' onclick='eliminarUsuario(this)'></td> ";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td bgcolor='#CCCCCC'> <input type='checkbox' name='dpcheck"+posicionCampo+"' id='dpcheck"+posicionCampo+"' value='"+posicionCampo+"'></td> ";
  
  escribirdetalle(posicionCampo, mynewrow);
  posicionCampo++;
}


function escribirdetalle(posicionCampo, mynewrow = false) {
  //calcularimporte();
  c_codprd = document.getElementById("c_codprd_" + posicionCampo);
  c_codprd.value = (!mynewrow? document.Frmregcoti.c_codprd.value:mynewrow.cells[0].children[0].value);

  c_desprd = document.getElementById("c_desprd_" + posicionCampo);
  c_desprd.value = (!mynewrow? document.Frmregcoti.c_desprd.value:mynewrow.cells[1].children[0].value);

  c_codcla = document.getElementById("c_codcla_" + posicionCampo);
  c_codcla.value = (!mynewrow? document.Frmregcoti.c_codcla.value:mynewrow.cells[3].children[0].value);


  c_tipped = document.getElementById("c_tipped_" + posicionCampo);
  c_tipped.value = (!mynewrow? document.Frmregcoti.c_tipped.value:mynewrow.cells[4].children[0].value);

  n_preprd = document.getElementById("n_preprd_" + posicionCampo);
  n_preprd.value = (!mynewrow? parseFloat(document.Frmregcoti.n_preprd.value).toFixed(2):mynewrow.cells[8].children[0].value);

  n_dscto = document.getElementById("n_dscto_" + posicionCampo);
  n_dscto.value = (!mynewrow? parseFloat(document.Frmregcoti.n_dscto.value).toFixed(2):mynewrow.cells[9].children[0].value);;

  n_canprd = document.getElementById("n_canprd_" + posicionCampo);
  n_canprd.value = (!mynewrow?document.Frmregcoti.n_canprd.value:mynewrow.cells[10].children[0].value);;


  var impdscto = parseFloat(document.Frmregcoti.n_preprd.value) - parseFloat(document.Frmregcoti.n_dscto.value);
  var importe = parseFloat(impdscto) * parseFloat(document.Frmregcoti.n_canprd.value);

  imp = document.getElementById("imp_" + posicionCampo);
  imp.value = (!mynewrow?importe.toFixed(2):mynewrow.cells[11].children[0].value);

}

function eliminarUsuario(obj) {
  var oTr = obj;
  while (oTr.nodeName.toLowerCase() != 'tr') {
    oTr = oTr.parentNode;
  }
  var root = oTr.parentNode;
  root.removeChild(oTr);
  recalculartotales();
}

//<!--fin grilla update cotizaciones-->
//calulcar totales
function recalculartotales() {
  subtot = 0;
  dscto = 0;
  tot = 0;
  for (var i = 1; i <= 50; i++) {
    if (!document.getElementById("imp_" + i)) {

    } else {
      subtot += parseFloat(document.getElementById("n_preprd_" + i).value) * parseFloat(document.getElementById("n_canprd_" + i).value);
      dscto += parseFloat(document.getElementById("n_dscto_" + i).value) * parseFloat(document.getElementById("n_canprd_" + i).value);;
      tot += parseFloat(document.getElementById("imp_" + i).value);
    }
  }
  document.getElementById("n_bruto").value = subtot.toFixed(2);
  document.getElementById("tn_dscto").value = dscto.toFixed(2);
  document.getElementById("n_neta").value = tot.toFixed(2);
}
function calcularTodosImportes(){
    //n_preprd_1 precio
    //n_dscto_1 descuento
    //n_canprd_1 cantidad
    //imp_1 importe
    var cantidad = $('[id^=n_preprd_]').length;
    console.log(cantidad);
    /*for (var i = 1; i <= 50; i++) {
    if (!document.getElementById("imp_" + i)) {

    } else {
      subtot += parseFloat(document.getElementById("n_preprd_" + i).value) * parseFloat(document.getElementById("n_canprd_" + i).value);
      dscto += parseFloat(document.getElementById("n_dscto_" + i).value) * parseFloat(document.getElementById("n_canprd_" + i).value);;
      tot += parseFloat(document.getElementById("imp_" + i).value);
    }
  }*/
}
function SumarTotales() {
  var xn_bruto = document.getElementById("n_bruto").value;
  var xn_dscto = document.getElementById("tn_dscto").value;
  var xn_neta = document.getElementById("n_neta").value;

  var zn_bruto = parseFloat(document.getElementById("n_preprd").value) * parseFloat(document.getElementById("n_canprd").value)

  var zn_dscto = parseFloat(document.getElementById("n_dscto").value);

  var zn_neta = parseFloat(document.getElementById("n_preprd").value) * parseFloat(document.getElementById("n_canprd").value) -
    parseFloat(document.getElementById("n_dscto").value);

  var fn_bruto = zn_bruto + parseFloat(xn_bruto);
  var fn_dscto = zn_dscto + parseFloat(xn_dscto);
  var fn_neta = zn_neta + parseFloat(xn_neta);

  document.getElementById("n_bruto").value = fn_bruto.toFixed(2);
  document.getElementById("tn_dscto").value = fn_dscto.toFixed(2);
  document.getElementById("n_neta").value = fn_neta.toFixed(2);

}

function actualizar_importe(obj) {
  var pre = obj.substring(obj.lastIndexOf('_'), obj.length);
  var precio_prod = parseFloat(document.getElementById("n_preprd" + pre).value);
  var valor_dscto = parseFloat(document.getElementById("n_dscto" + pre).value);
  var cant_prod = parseFloat(document.getElementById("n_canprd" + pre).value);
  var valor =  (precio_prod - valor_dscto) * cant_prod;
  document.getElementById("imp" + pre).value = valor.toFixed(2);
  recalculartotales();
}

window.agregar = function() {
  var c_codmon = document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
  var tipocoti = document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
  var clase = document.getElementById("c_codcla").value
  if (c_codmon == "000") {
    var mensje = "Falta Ingresar Tipo Moneda";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);

  } else if (tipocoti == "000") {
    var mensje = "Falta Ingresar Tipo Cotización";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);

  } else if ((document.Frmregcoti.c_nomcli.value) == "") {

    var mensje = "Falta Ingresar Datos del Cliente";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);

  } else if ((document.Frmregcoti.c_asunto.value) == "") {
    mensje = "Falta Ingresar Asunto de Cotizacion";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);

  } else if ((document.Frmregcoti.c_codprd.value) == "") {
    mensje = "Falta Ingresar Descripcion";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.n_preprd.value) == "") {
    mensje = "Falta Ingresar Precio";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else {
    var cant_dupl = document.Frmregcoti.cant_dupl.value 
    for(var i = 0; i < cant_dupl; i++){
      agregardetalle();
      SumarTotales();
    }
    document.getElementById("c_codmon").disabled = true;
    limpiaritems();
  }
}

function limpiaritems() {
  // var chk=document.getElementById('chkborrar').value;
  if (document.getElementById("chkborrar").checked == false) {
    $("#c_codprd").val('');
    $("#c_desprd").val('');
    $("#n_preprd").val('');
    $("#n_canprd").val('1');
    $("#n_dscto").val('0.00');
    $("#cant_dupl").val('1');
  }

}

function guardar() {
  var theTable = document.getElementById('tblSample');
  cantFilas = theTable.rows.length;
  if (cantFilas == 1) {
    mensje = "Falta Detalle de Cotizacion";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if (document.Frmregcoti.c_contac.value == "") {
    mensje = "Falta Ingresar Nombre de Contacto";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.c_telef.value) == "") {
    mensje = "Falta Ingresar Telefono de Contacto";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.c_email.value) == "") {
    mensje = "Falta Ingresar Email de Contacto";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.c_lugent.value) == "") {
    mensje = "Falta Ingresar Lugar Entrega";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.c_tiempo.value) == "") {
    mensje = "Falta Ingresar Tiempo Entrega";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.c_validez.value) == "") {
    mensje = "Falta Ingresar Validez Cotización";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.xc_codpga.value) == "") {
    mensje = "Falta Ingresar Forma Pago";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);
  } else if ((document.Frmregcoti.xc_precios.value) == "") {
    mensje = "Falta Ingresar Precios Con y/o Sin Igv";
    $('#alertone').modal('show');
    $('#mensaje').val(mensje);

  } else {
    if (confirm("Seguro de Actualizar Cotizacion ?")) {
      document.getElementById("Frmregcoti").submit();
    }
  }
}
    
</script>

<!--FIN GRILLA-->
<script>
$(document).ready(function () {

  /* Autocomplete de producto, jquery UI */
  $("#c_nomcli").autocomplete({
    dataType: 'JSON',
    source: function (request, response) {
      jQuery.ajax({
        url: '?c=03&a=ClienteBuscar',
        type: "post",
        dataType: "json",
        data: {
          criterio: request.term
        },
        success: function (data) {
          response($.map(data, function (item) {
            return { //
              //<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
              id: item.CC_RUC,
              value: item.CC_RAZO,
              contacto: item.CC_RESP,
              telefono: item.CC_TELE,
              email: item.CC_EMAI
              //  precio: item.Precio
            }
          }))
        }
      })
    }, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
    select: function (e, ui) {
      $("#c_codcli").val(ui.item.id);
      $("#c_contac").val(ui.item.contacto);
      $("#c_telef").val(ui.item.telefono);
      $("#c_email").val(ui.item.email);
      //$("#c_desgral").val(ui.item.id);
      $("#c_asunto").focus();
    }
  })
  /*var tn_dscto = document.getElementById('tn_dscto');
  function obtenerDescuentoTotal(){
    var cantidad = $('[id^=n_dscto_]').length;
    n_canprd_1
    for (var i = 1; i <= cantidad; i++) {
      if (document.getElementById("imp_" + i)) {
    }
    }*/
})
</script>
<script>
$(document).ready(function () {

  /* Autocomplete de producto, jquery UI */
  $("#c_nomclileasig").autocomplete({
    dataType: 'JSON',
    source: function (request, response) {
      jQuery.ajax({
        url: '?c=03&a=ClienteBuscar',
        type: "post",
        dataType: "json",
        data: {
          criterio: request.term
        },
        success: function (data) {
          response($.map(data, function (item) {
            return { //
              //<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
              id: item.CC_RUC,
              value: item.CC_RAZO,
              contacto: item.CC_RESP,
              telefono: item.CC_TELE,
              email: item.CC_EMAI
              //  precio: item.Precio
            }
          }))
        }
      })
    },// <!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
    select: function (e, ui) {
      $("#c_codclileasig").val(ui.item.id);

    }
  })
})
</script>

<!--autocomplete producto-->
<script>
$(document).ready(function () {
  $("#c_desprd").autocomplete({
    dataType: 'JSON',
    source: function (request, response) {
      jQuery.ajax({
        url: '?c=03&a=ProductoBuscar&tp=' + document.Frmregcoti.c_tipped.value,
        type: "post",
        dataType: "json",
        data: {
          criterio: request.term
        },
        success: function (data) {
          response($.map(data, function (item) {
            return { //
              id: item.IN_CODI,
              value: item.IN_ARTI,
              cod_clase: item.COD_CLASE,
            }
          }))
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          console.log("Request: ", XMLHttpRequest);
          console.log("Error: ", textStatus);
          console.log("Error: ", errorThrown);
        }
      })
    },
    select: function (e, ui) {
      $("#c_codprd").val(ui.item.id);
      $("#c_codcla").val(ui.item.cod_clase);
      $("#n_preprd").focus();
    }
  })
  recalculartotales();
})
</script>
<script>
 $(function () {
   //Array para dar formato en español
   var espannol = {
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
   $.datepicker.setDefaults(espannol);

   $("#datepicker").datepicker();
   $("#fechacal1").datepicker();
   $("#d_fecent").datepicker();

 });
</script>
<link rel="stylesheet" href="assets/vendor/css/summernote.css">
<script type="text/javascript" src="assets/vendor/js/summernote.js"></script>

<script type="text/javascript">
$('.c_desgral').on("blur", function () {
  var editor = $(this).closest('.note-editor').siblings('textarea.zc_desgral');
  editor.html(editor.code());
});
$(function () {
  $('.summernote').summernote({
    height: 200
  });
});

</script>
<script>
function llenarglosa() {
  document.Frmregcoti.c_desgral.value = document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;

}

function OnchangeTipCot() {
  limpiar()
  var xc_tippedxc = $("#xc_tippedxc").val();
  var indice_clase = $("#indice_clase").val();
  // console.log('indice', indice_clase)
  $("#c_tipped_"+indice_clase).val(xc_tippedxc);
  var tipocoti = document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;
  document.Frmregcoti.c_tipped.value = tipocoti
  document.Frmregcoti.c_desprd.focus();
}

function OnchangeTipMoneda() {
  var c_codmon = document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
  document.Frmregcoti.xc_codmon.value = c_codmon
  //document.Frmregcoti.c_desprd.focus();
}

function OnchangeTipCotizacion() {
  var ac_tipped = document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
  document.Frmregcoti.xac_tipped.value = ac_tipped
  //document.Frmregcoti.c_desprd.focus();
}

function OnchangeTipfpago() {
  var c_codpga = document.Frmregcoti.c_codpga.options[document.Frmregcoti.c_codpga.selectedIndex].value;
  document.Frmregcoti.xc_codpga.value = c_codpga
}

function OnchangeTipprecio() {
  var c_precios = document.Frmregcoti.c_precios.options[document.Frmregcoti.c_precios.selectedIndex].value;
  document.Frmregcoti.xc_precios.value = c_precios
}
</script>

<!--ventana ver ultimas cotizaciones-->

<script>
function abrir(){
	$('#my_modal').modal('show');
	var producto=document.Frmregcoti.c_codprd.value;
	var xtipocot=document.Frmregcoti.c_tipped.value;
	document.Frmregcoti.xnomprd.value=producto;
	document.Frmregcoti.ztipocot.value=xtipocot;
//	$('#xnomprd').val(producto);ztipocot   zcodprd c_tipped
	}
function test(){
	}	
function limpiar(){
	document.Frmregcoti.c_codprd.value='';
	document.Frmregcoti.c_desprd.value='';
	document.Frmregcoti.c_tipped.value='';
	}
function abrir(){
                $('#my_modal1').modal('show');                                                              
               // var c_codprd=document.getElementById('c_codprd').value;
				var c_codprd=document.Frmregcoti.c_codprd.value;
				var xtipocot=document.Frmregcoti.c_tipped.value;
                //document.frmequipo.codpro.value=idequi;                                                
                //document.write("c_codprd = " + c_codprd);
                $('#tabla').load("?c=03&a=VerUltimasCotizaciones",{c_codprd:c_codprd,xtip:xtipocot});            
}

 function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
} 
 
function validaNumero(){
	// var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
		var n_canprd=document.getElementById('n_canprd').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_canprd)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_canprd').value='';
		document.getElementById('n_canprd').focus();
		return false;
		}
		
			var n_preprd=document.getElementById('n_preprd').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_preprd)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_preprd').value='';
		document.getElementById('n_preprd').focus();
		return false;
		}
		
		
		var n_dscto=document.getElementById('n_dscto').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_dscto)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_dscto').value='';
		document.getElementById('n_dscto').focus();
		return false;
		}
		
		
}		
</script>
<script>
 $(document).ready(function(){
    $('#my_modal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url: '?c=03&a=UltCotListar&tp='+document.Frmregcoti.c_tipped.value+'&cod='+document.Frmregcoti.c_codprd.value, //Here you will fetch records 
          //  data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});
 
</script>

<script>
sumaFecha = function (d, fecha) {
  var Fecha = new Date();
  var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() + 0) + "/" + Fecha.getFullYear());
  var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
  var aFecha = sFecha.split(sep);
  var fecha = aFecha[2] + '/' + aFecha[1] + '/' + aFecha[0];
  fecha = new Date(fecha);
  fecha.setDate(fecha.getDate() + parseInt(d));
  var anno = fecha.getFullYear();
  var mes = fecha.getMonth() + 1;
  var dia = fecha.getDate() - 1;
  mes = (mes < 10) ? ("0" + mes) : mes;
  dia = (dia < 10) ? ("0" + dia) : dia;
  var fechaFinal = dia + sep + mes + sep + anno;
  return (fechaFinal);
}

function abreVentanaF(obj) {
  $('#modalfecha').modal('show');
  $('#valorfecha').val(obj);

}

function nuevaFecha(fecha, intervalo) {
  var arrayFecha = fecha.split('/');
  var interv = intervalo.substring(1, intervalo.length);
  var operacion = intervalo.substring(0, 1);
  var dia = arrayFecha[0];
  var mes = arrayFecha[1];
  var anio = arrayFecha[2];
  var fechaInicial = new Date(anio, mes - 1, dia);
  var fechaFinal = fechaInicial;

  if (operacion == "+")
    fechaFinal.setDate(fechaInicial.getDate() + parseInt(intervalo));
  else
    fechaFinal.setDate(fechaInicial.getDate() - parseInt(intervalo));

  dia = fechaFinal.getDate();
  mes = fechaFinal.getMonth() + 1;
  anio = fechaFinal.getFullYear();

  dia = (dia.toString().length == 1) ? "0" + dia.toString() : dia;
  mes = (mes.toString().length == 1) ? "0" + mes.toString() : mes;

  return dia + "/" + mes + "/" + anio;
}

function xcal() {
  var fec = document.Frmregcoti.fechacal1.value;
  var dia = document.Frmregcoti.cmbdia.options[document.Frmregcoti.cmbdia.selectedIndex].value;
  var xdia = dia - 1;
  var fecha = nuevaFecha(fec, '+' + xdia);
  document.Frmregcoti.fechacal2.value = fecha;
}

function pon_prefijo() {
	
 	var fechaInicio=$("#fechacal1").val();
	var fechaFinal=$("#fechacal2").val();

	var cant =$('#valorfecha').val();
	console.log(cant);
	var valor = cant.substring(8, 20);//c_fecini_43
	console.log(valor);
	
	$("#c_fecini"+valor).val(fechaInicio);
	$("#c_fecfin"+valor).val(fechaFinal); 
 
/*   var cant = document.getElementById('valorfecha').value;
	console.log(cant);
  var valor = cant.substring(8, 10);
  console.log(valor);
  document.getElementById('c_fecini' + valor).value = document.Frmregcoti.fechacal1.value
  document.getElementById('c_fecfin' + valor).value = document.Frmregcoti.fechacal2.value  */

}
</script>
<script>
function recargar(){    
document.Frmregcoti.c_desgral.value =document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;
    var variable_post=document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;
    $.post("?c=03&a=UpdCotizaciones", { variable: variable_post }, function(data){
        //// Verificamos la rpta entregada por miscript.php
        document.Frmregcoti.c_desgral.value=variable_post;
    });         
}

function valcheckcrono(){
	var valcheck=document.getElementById("c_gencrono").value;
	
	if(document.getElementById("c_gencrono").checked==true){
		document.getElementById("xc_meses").disabled=false;
		document.getElementById("xc_gencrono").value=1;
		
		}else{
		document.getElementById("xc_meses").disabled=true;			
		document.Frmregcoti.c_meses.value='';
		document.getElementById("xc_gencrono").value=0;		
			}
	
	
	}	
function Onchangedias(){
var xc_meses=document.Frmregcoti.xc_meses.options[document.Frmregcoti.xc_meses.selectedIndex].value;
	document.Frmregcoti.c_meses.value=xc_meses;
}


function cambiacliente(){    
                
 var cadena=document.Frmregcoti.xc_nomcli.options[document.Frmregcoti.xc_nomcli.selectedIndex].value; 
         //alert(cadena);                      
arreglo=cadena.split("|");
c_codcli=arreglo[0];
c_nomcli=arreglo[1].toUpperCase();
c_telef=arreglo[2]; 
c_contac=arreglo[3].toUpperCase();    
c_email=arreglo[4].toUpperCase();            
document.Frmregcoti.c_codcli.value=c_codcli;
document.Frmregcoti.c_nomcli.value=c_nomcli;
document.Frmregcoti.c_telef.value=c_telef;
document.Frmregcoti.c_contac.value=c_contac;   
document.Frmregcoti.c_email.value=c_email;
}
</script>

<script type="text/javascript"> 
  $(document).ready(function() { 
    $("#xc_nomcli").select2(); 
  });
</script> 
<script>
  $(document).ready(function () {
    calcularTodosImportes();
  });
  function duplicarGrupo(){
  var tblSample = document.getElementById('tblSample');
  // console.log('table', tblSample)
  var rows = tblSample.tBodies[0].children;
  if(rows.length > 0){
    // console.log(rows)
    var tam = rows.length
    var rowsToAdd = '';
    var count = tam;
    for(var i = 0; i < tam; i++){
      var myrow = rows[i];
      // console.log('voy por ', myrow)
      if(myrow.children[13].children[0].checked){
        agregardetalle(myrow);
        recalculartotales();
        count++;
      }
    }
  }else{
    alert('Debe ingresar al menos un detalle')
  }
}
</script>
<!--modal de ver equipos-->
<form class="form-horizontal" id="frmequipo" name="frmequipo">
  <div class="modal fade" id="my_modalframeprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Productos</h4>
        </div>
        <div class="modal-body">
          <table id="tabla" class="table table-hover" style="font-size:11px;">
            <!--Contenido se encuentra en verEquiposDispo.php-->
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onClick="pon_prefijo()" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!--fin modal de ver equipos-->

<!-- Modal Clases -->
<form class="form-horizontal" id="frmclase" name="frmclase">
  <div class="modal fade" id="my_modalClases" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Clases</h4>
        </div>
        <div class="modal-body">
          <div>
            <select id="xc_tippedxc" name="xc_tippedxc" class="form-control input-sm" onChange="OnchangeTipCot()">
              <option value="000">.:SELECCIONE:.</option>
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>
              <option value="<?= $a->tc_codi; ?>">
                <?= $a->tc_desc; ?>
              </option>
              <?php  endforeach;	 ?>
            </select>
            <input type="hidden" name="indice_clase" id="indice_clase" value=""/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onClick="pon_prefijo()" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal Clases -->

<body onLoad="valcheckcrono()">
  <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=03&a=UpdateCotizacion&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">
    <!--modal fechas-->
    <!-- Modal -->
    <input name="tra_coti" id="tra_coti" type="hidden" value="<?= isset($_GET['sw'])?$_GET['sw']:"" ?>">
    <div id="modalfecha" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Calculadora Fechas Alquiler</h5>
          </div>
          <table class="table table-striped">
            <tr>
              <td> Fecha Inicio </td>
              <td>Dias</td>
            </tr>
            <tr>
              <td>
                <input name="fechacal1" type="text" class="form-control datepicker input-sm" id="fechacal1" size="12" maxlength="12" value=""
                />
                <input name="valorfecha" id="valorfecha" type="text" />
              </td>
              <td>

                <select id="cmbdia" name="cmbdia" class="form-control input-sm">
                  <option value="000">.:SELECCIONE:.</option>
                  <?php foreach($this->maestro->Listardias() as $a):?>
                  <option value="<?= $a->tm_codi; ?>">
                    <?= $a->tm_codi; ?>
                  </option>
                  <?php  endforeach;	 ?>
                </select>


              </td>
            </tr>
            <tr>
              <td>Fecha Fin</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>
                <input name="fechacal2" type="text" id="fechacal2" size="12" value="" class='form-control input-sm' />
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>
                <input type="button" name="button" id="button" class="btn btn-primary" value="Calcular" onClick="xcal()" />
              </td>
            </tr>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onClick="pon_prefijo()" data-dismiss="modal">Seleccionar</button>
          </div>
        </div>

      </div>
    </div>
    <!--fin modal alertas info-->
    <!-- Modal -->
    <div id="alertone" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Mensaje del Sistema</h5>
          </div>
          <div class="alert alert-warning">
            <input name="mensaje" id="mensaje" type="text" size="35" disabled="disabled" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;"
            />


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!--fin modal alertas info-->

    <div class="container-fluid">
      <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="exampleModalLabel">5 Ultimas Cotizaciones</h4>
            </div>
            <div class="modal-body">
              <!-- <form>-->
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producto</label>
                <input type="text" class="form-control" id="xnomprd" name="xnomprd" value="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Tipo Cot</label>
                <input type="text" class="form-control" id="ztipocot" name="ztipocot" value="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cod Prod</label>
                <input type="text" class="form-control" id="zcodprd" name="zcodprd" value="">
              </div>

              <table class="table table-striped">
                <tr>
                  <td>Nro</td>
                  <td>Cliente</td>
                  <td>Fecha</td>
                  <td>Moneda</td>
                  <td>Cant.</td>
                  <td>P.Unit.</td>
                </tr>
                <?php 
 // if($this->model->UltCotListar()!=NULL){
 //foreach($this->model->UltCotListar() as $item): ?>
                <tr>
                  <td>
                    <?= isset($item->c_numped)?$item->c_numped:''; ?>
                  </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <?php //  endforeach;?>
              </table>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

              <!--</form>-->
            </div>
          </div>
        </div>
      </div>
      <?php
$fecha=date('d/m/Y');
  foreach($this->maestro->ListarTipCambio($fecha) as $tipcam):
		 $tcambio=$tipcam->tc_cmp;	
		endforeach;
    ?>
        <!--fin ver ultimas cotizaciones-->
        <div class="container-fluid">
          <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">ACTUALIZACION DE COTIZACIONES. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Tipo Cambio=
              <?= $tcambio ?>)
                <input name="n_tcamb" id="n_tcamb" type="hidden" value="<?= $tcambio ?>" />
            </div>
            <div>
              <div class="form-control-static" align="right">
                <!--<a class="btn btn-success" onClick="guardar()" href="#">Actualizar</a>-->
                <input class="btn btn-success" type="button" onClick="guardar()" value="Actualizar" /> &nbsp;

                <a class="btn btn-danger" href="?c=03&a=UpdCotizaciones&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Cancelar</a>&nbsp;
                <a class="btn btn-warning" href="?c=03&a=UpdCotizaciones&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Refrescar</a>&nbsp;
                <a class="btn btn-info" href="indexa.php?c=02&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Salir</a>&nbsp;
              </div>
              <div class="form-control-static">
              </div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Cliente</a>
                </li>
                <li role="presentation">
                  <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Detalle</a>
                </li>
                <li role="presentation">
                  <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terminos y Condiciones</a>
                </li>
                <li role="presentation">
                  <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Glosa y Observacion</a>
                </li>

                <li role="presentation">
                  <a href="#leasing" aria-controls="leasing" role="tab" data-toggle="tab">Cliente Leasing</a>
                </li>
                <!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <div class="form-group">
                    <label class="control-label col-xs-1"></label>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">Nro</label>
                    <div class="col-xs-2">
                      <input type="text" name="c_numped" id="c_numped" value="<?= $c_numped ?>" class="form-control input-sm" placeholder=" Nro autogenerado"
                        data-validacion-tipo="requerido" />
                      <input type="hidden" name="n_swtapr" id="n_swtapr" value="0" />
                      <input type="hidden" name="login" id="login" value="<?= $login ?>  " />
                    </div>
                    <label class="control-label col-xs-2">Moneda</label>
                    <div class="col-xs-2">
                      <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" >
                        <option value="">.:SELECCIONE:.</option>
                        <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>
                        <option value="<?= $moneda->TM_CODI; ?>" <?=$c_codmon==$moneda->TM_CODI ? 'selected' : ''; ?>>
                          <?= $moneda->TM_DESC; ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>

                      <input type="hidden" name="xc_codmon" id="xc_codmon" value="<?= $c_codmon?>" />
                    </div>
                    <label class="control-label col-xs-1">Tipo</label>
                    <div class="col-xs-2">
                      <select name="ac_tipped" id="ac_tipped" class="form-control input-sm" onChange="OnchangeTipCotizacion()">
                        <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>
                        <option value="<?= $a->tc_codi; ?>" <?=$c_tipped==$a->tc_codi ? 'selected' : ''; ?>>
                          <?= $a->tc_desc; ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input type="hidden" name="xac_tipped" id="xac_tipped" value="<?= $c_tipped?>" />
                    </div>
                  </div>
                  <!--fila 2-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Cliente</label>
                    <div class="col-xs-3">
                      <input name="c_nomcli" type="hidden" class="form-control input-sm" id="c_nomcli" placeholder="Cliente" autocomplete="off"
                        value="<?= utf8_encode($c_nomcli) ?>" />
                      <select id="xc_nomcli" name="xc_nomcli" class="select2 form-control input-sm" onChange="cambiacliente()">
                        <?php if($asignacion!=NULL){?> disabled
                        <?php }?> >
                        <option value="">SELECCIONE</option>
                        <?php 
                          $ListarLineaMaritima=$this->maestro->listarClientefiltro(); 
                          foreach ($ListarLineaMaritima as $lineamar){
                        ?>
                        <option value="<?= utf8_encode($lineamar->datos); ?>" <?=$c_codcli==$lineamar->CC_RUC ? 'selected' : ''; ?>>
                          <?= utf8_encode($lineamar->CC_RAZO); ?>
                        </option>
                        <?php } ?>
                      </select>
                      <script>
                        $("#xc_nomcli").select2();
                      </script>
                    </div>
                    <label class="control-label col-xs-1">Codigo</label>
                    <div class="col-xs-2">
                      <input name="c_codcli" type="text" class="form-control input-sm" id="c_codcli" placeholder="Nro ruc" value="<?= $c_codcli ?>" 
                        data-validacion-tipo="requerido" />

                    </div>
                    <label class="control-label col-xs-1">C. Via</label>
                    <div class="col-xs-2">
                      <select name="xc_via" id="xc_via" class="form-control input-sm" onChange="OnchangecVia()">
                        <option value="000">.:SELECCIONE:.</option>
                        <?php foreach($this->maestro->ListaTipoContacto() as $a):	 ?>
                        <option value="<?= $a->c_numitm; ?>" <?=$c_via==$a->c_numitm ? 'selected' : ''; ?>>
                          <?= utf8_encode($a->c_desitm); ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input name="c_via" id="c_via" type="hidden" value="" />
                    </div>
                  </div>
                  <!--fila 3-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Contact</label>
                    <div class="col-xs-3">
                      <input type="text" id="c_contac" name="c_contac" value="<?= utf8_encode($c_contac) ?>" class="form-control input-sm" placeholder="Contacto"
                        data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">Telf</label>
                    <div class="col-xs-2">
                      <input type="text" id="c_telef" name="c_telef" value="<?= $c_telef ?>" class="form-control input-sm" placeholder="Telefono"
                        data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">Correo</label>
                    <div class="col-xs-3">
                      <input type="text" id="c_email" name="c_email" value="<?= $c_email ?>" class="form-control input-sm" placeholder="Correo"
                        data-validacion-tipo="requerido|email" />
                    </div>
                  </div>
                  <!--fila 4-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Asunto</label>
                    <div class="col-xs-6">
                      <input type="text" id="c_asunto" name="c_asunto" value="<?= utf8_encode($c_asunto) ?>" class="form-control input-sm" placeholder="Asunto"
                        data-validacion-tipo="requerido" />
                    </div>

                    <label class="control-label col-xs-1">Fecha</label>
                    <div class="col-xs-2">
                      <input name="datepicker" type="text" class="form-control datepicker input-sm" id="datepicker" placeholder="Fecha Pedido"
                        value="<?= vfecha(substr($d_fecped,0,10)) ?>" readonly data-validacion-tipo="requerido" />
                      <input name="valdata" type="hidden" id="valdata" value="0" size="5" />
                    </div>
                  </div>
                </div>
                <!--fin tab 1-->

                <div role="tabpanel" class="tab-pane" id="profile">
                  <div class="well well-sm">
                    <div class="row">
                      <div class="col-xs-2">
                        <label class="control-label col-xs-1">Tipo</label>
                      </div>
                      <div class="col-xs-3">
                        <label class="control-label col-xs-1">Descripcion</label>
                      </div>
                      <div class="col-xs-1">
                        <label class="control-label col-xs-1">Cant.</label>
                      </div>
                      <div class="col-xs-1">
                        <label class="control-label col-xs-1">Dscto</label>
                      </div>
                      <div class="col-xs-2">
                        <label class="control-label col-xs-1">Precio</label>
                      </div>
                      <div class="col-xs-1">
                        <label class="control-label col-xs-1">Cant. Crear</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-2">
                        <select id="xc_tipped" name="xc_tipped" class="form-control input-sm" onChange="OnchangeTipCot()">
                          <option value="000">.:SELECCIONE:.</option>
                          <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>
                          <option value="<?= $a->tc_codi; ?>">
                            <?= $a->tc_desc; ?>
                          </option>
                          <?php  endforeach;	 ?>
                        </select>
                      </div>
                      <input id="c_tipped" name="c_tipped" type="hidden" value="" />

                      <div class="col-xs-3">
                        <input id="c_codprd" name="c_codprd" type="hidden" />
                        <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto"
                        />
                        <input id="glosa" name="glosa" type="hidden" />
                        <input type="hidden" name="c_codcla" id="c_codcla">
                      </div>
                      <div class="col-xs-1">
                        <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="1"
                          maxlength="3" onKeyUp="abrir()" onBlur="validaNumero();" onKeyPress="return validaDecimal(event)"
                        />
                      </div>
                      <div class="col-xs-1">
                        <input name="n_dscto" type="text" class="form-control input-sm" id="n_dscto" placeholder="Dscto" autocomplete="off" value="0"
                          onBlur="validaNumero();" onKeyPress="return validaDecimal(event)" />
                      </div>
                      <div class="col-xs-2">
                        <input autocomplete="off" id="n_preprd" name="n_preprd" class="form-control input-sm" type="text" placeholder="Precio" onBlur="validaNumero();"
                          onKeyPress="return validaDecimal(event)" />
                      </div>
                      <div class="col-xs-1">
                        <input id="cant_dupl" name="cant_dupl" class="form-control input-sm" type="text" value="1" <?=( $login=="SISTEMAS" || $login=="MATILDE"
                          || $login=="SOPORTE" || $login=="VANESA" ||$login=="SISTEMAS" ||$login=="MBLAS"  )? "": "readonly"?>/>
                      </div>
                      <div class="col-xs-1">
                        <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onClick="agregar();">
                          <i class="glyphicon glyphicon-plus"></i>
                        </button>
                        <input name="chkborrar" id="chkborrar" type="checkbox" value="1">
                        <button class="btn btn-info btn-sm" id="btn-agregar" type="button" onClick="duplicarGrupo();">
                          DP
                        </button>
                      </div>
                      <?php if($c_estasig=='1'){?>
                      <div class="col-xs-1">
                        <input name="libasig" id="libasig" type="checkbox" value="1"> Actualiza Despacho
                      </div>
                      <?php }?>
                    </div>
                  </div>
                  <hr />
                  <table id="tblSample" class="table table-striped">
                    <thead>  
                      <tr>
                        <th></th>
                        <th>Descripcion</th>
                        <th>Glosa</th>
                        <th>&nbsp;</th>
                        <th>Clase</th>
                        <th>CodEquipo</th>
                        <th>F.Ini Alq</th>
                        <th>F.Fin Alq</th>
                        <th>Precio</th>
                        <th>Dscto</th>
                        <th>Cant</th>
                        <th>Importe</th>
                        <th>Borrar</th>
                        <th>DP</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                  		$i=0;
                    //	echo 'aqui nrocot'.$_GET['ncoti'];
                      $detaCoti = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
                      foreach($detaCoti as $itemD):
					  
					  
						$Itemsfacturados=$this->model->ObtenerItemsFacturadoM($_GET['ncoti'],$itemD->c_codprd,$itemD->n_item);
				      if($Itemsfacturados!=NULL){
						
							foreach($Itemsfacturados as $itemsFac):
								
								$NroFactura=$itemsFac->PE_NDOC;
							//$this->model->UpdateItemCotiFacM($itemD->n_canprd,$_GET['ncoti'],$itemD->c_codprd,$itemD->n_item,$NroFactura);
							endforeach;
						
					  }
					 
					  

                      $i=$i+1;
                    ?>
                    <tr>
                      <td>
						<?PHP echo $i; ?>
                        <input type="hidden" id="<?= "c_codprd_".$i; ?>" name="<?= "c_codprd_".$i; ?>" readonly value="<?= $itemD->c_codprd ?>"
                          class='form-control input-sm' />
						<input type="hidden" id="<?= "n_apbpre_".$i; ?>" name="<?= "n_apbpre_".$i; ?>" readonly value="<?= $itemD->n_apbpre ?>"
                          class='form-control input-sm' />  
                      </td>
                      <td>
                        <input name="<?= "c_desprd_".$i; ?>" type="text" id="<?= "c_desprd_".$i; ?>" value="<?= $itemD->c_desprd ?>" class="form-control input-sm"
                          size="40" readonly onClick="abrirmodalEqp('<?= $itemD->c_desprd ?>','<?= $i ?>','<?= $itemD->clase ?>' );"
                        />
                      </td>
                      <td>
                        <input type="text" id="<?= "c_obsdoc_".$i; ?>" name="<?= "c_obsdoc_".$i; ?>" value="<?= utf8_encode($itemD->c_obsdoc); ?>"
                          class="form-control input-sm" size="40" />
                      </td>
                      <td>
                        <input type="hidden" name="<?= "c_codcla_".$i; ?>" id="<?= "c_codcla_".$i; ?>" value="<?= $itemD->c_codcla ?>">
                        <input type="hidden" name="<?= "c_almdesp_".$i; ?>" id="<?= "c_almdesp_".$i; ?>" value="<?= $itemD->c_almdesp ?>" class="form-control input-sm">
                        <input type="hidden" name="<?= "c_numguiadesp_".$i; ?>" id="<?= "c_numguiadesp_".$i; ?>" value="<?= $itemD->c_numguiadesp ?>"
                          class="form-control input-sm">
                      </td>
                      <td>
                        <input name="<?= "c_tipped_".$i; ?>" type="text" id="<?= "c_tipped_".$i; ?>" value="<?= $itemD->clase; ?>" class="form-control input-sm"
                          readonly onClick="abirModalClases('<?= $itemD->clase; ?>', '<?= $i ?>');" />
                        <input name="<?= "xh_tipped_".$i;?>" id="<?= "xh_tipped_".$i;?>" type="hidden" value="" /> &nbsp;
                      </td>
                      <td>
                        <input name="<?= "c_codcont_".$i; ?>" type="text" id="<?= "c_codcont_".$i; ?>" value="<?= $itemD->c_codcont ?>" size="18"
                          readonly class="form-control input-sm" />
                      </td>
                      <td>
					 
                        <input name="<?= "c_fecini_".$i; ?>" 
						
						<?php if($itemD->FactuCoti==''){?>
						
						type="text" 
						
						 <?php }else{?>
						
						type="hidden" 

						<?php 
						
						} ?>
						
						id="<?= "c_fecini_".$i; ?>" value="<?= $itemD->c_fecini;  ?>" class='form-control input-sm'
                          onClick="abreVentanaF(this.name)" />
						  	<?php if($itemD->FactuCoti!=''){
							echo $itemD->c_fecini;
						}
							?>
						  
                      </td>
                      <td>
                        <input name="<?= "c_fecfin_".$i; ?>" 
						<?php if($itemD->FactuCoti==''){?>
						
						type='text'
						 <?php }else{?>
						
						type='hidden' 

						<?php } ?>
						
						
						id="<?= "c_fecfin_".$i; ?>" value="<?= $itemD->c_fecfin;  ?>" class='form-control input-sm'/>
						<?php if($itemD->FactuCoti!=''){
							echo $itemD->c_fecfin;
						}
							?>
						
						
						
                      </td>
                      <td>
                        <input type="text" id="<?= "n_preprd_".$i; ?>" name="<?= "n_preprd_".$i; ?>" value="<?= $itemD->n_preprd; ?>" onKeyUp="actualizar_importe(this.name)"
                          class='form-control input-sm' size="8" style="text-align:right" >
                      </td>
                      <td>
                        <input type="text" id="<?= "n_dscto_".$i; ?>" name="<?= "n_dscto_".$i; ?>" value="<?= $itemD->n_dscto; ?>" onKeyUp="actualizar_importe(this.name)"
                          class='form-control input-sm' size="5" style="text-align:right" >
                      </td>
                      <td>
                        <input type="text" id="<?= "n_canprd_".$i; ?>" name="<?= "n_canprd_".$i; ?>" value="<?= $itemD->n_canprd; ?>" onKeyUp="actualizar_importe(this.name)"
                          class='form-control input-sm' size="5" >
                      </td>
                      <td>
                        <input type="text" id="<?= "imp_".$i; ?>" name="<?= "imp_".$i; ?>" value="<?= $itemD->n_totimp; ?>" class='form-control input-sm' size="7" style="text-align:right" disabled/>
                      </td>
                      <td>
                        
						
						<?php 
						
						$Itemsfacturados=$this->model->ObtenerItemsFacturadoM($_GET['ncoti'],$itemD->c_codprd,$itemD->n_item);
				      if($Itemsfacturados!=NULL){
						
							foreach($Itemsfacturados as $itemsFac):
								
								echo $NroFactura=$itemsFac->PE_NDOC;
							//$this->model->UpdateItemCotiFacM($itemD->n_canprd,$_GET['ncoti'],$itemD->c_codprd,$itemD->n_item,$NroFactura);
							
							
							
							
							
							endforeach;
					  }
						?>
						
						
						
						<?php
						if($itemD->FactuCoti!='' || $itemD->c_codcont!='' ){
							echo 'Item con Codigo Asignado o Facturado';
                                }else{
							
							?>
						<input type="button" name="button3" id="button3" value="delete"  class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)" /></th>
						
								<?php } ?>
						
                      </td>
                      <td><input type="checkbox" name="<?= "dpcheck".$i; ?>" id="<?= "dpcheck".$i; ?>" value="<?= $i;?>"></td>
                    </tr>
                    <?php  endforeach; ?>
                    </tbody>
                  </table>
                  <table class="table">
                    <tr>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td colspan="5" align="right">Indica Sub Total del precio unitario</td>
                      <td width="77" align="right">Sub Total:</td>
                      <td width="101" align="right">
                        <input name="n_bruto" id="n_bruto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?= $n_bruto ?>" />
                      </td>
                      <td width="43" align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="5" align="right">Indica el total descuento</td>
                      <td align="right"> Dscto:</td>
                      <td align="right">
                        <input name="tn_dscto" id="tn_dscto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="" />
                      </td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="5" align="right">Indica Total resta de sub total - Dscto</td>
                      <td align="right">Total :</td>
                      <td align="right">
                        <input name="n_neta" id="n_neta" type="text" class="form-control input-sm" size="5" readonly style="text-align:right" value="<?= $n_neta ?>"
                        />
                      </td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="26" align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <!--fin tab 2-->
                <div role="tabpanel" class="tab-pane" id="messages">
                  <div class="form-group">
                    <label class="control-label col-xs-1"></label>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">L.Entrega</label>
                    <div class="col-xs-2">
                      <input type="text" name="c_lugent" id="c_lugent" value="<?= utf8_encode($c_lugent) ?>" class="form-control input-sm" placeholder="Lugar de Entrega"
                        data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">T.Entrega</label>
                    <div class="col-xs-2">
                      <input type="text" name="c_tiempo" id="c_tiempo" value="<?= utf8_encode($c_tiempo) ?>" class="form-control input-sm" placeholder="Tiempo de  Entrega"
                        data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">F.Pago</label>
                    <div class="col-xs-2">
                      <select name="c_codpga" id="c_codpga" class="form-control input-sm" onChange="OnchangeTipfpago()">
                        <option value="000">.:SELECCIONE:.</option>
                        <?php foreach($this->maestro->ListarFpago() as $a): ?>
                        <option value="<?= $a->TP_CODI; ?>" <?=$c_codpga==$a->TP_CODI ? 'selected' : ''; ?>>
                          <?= $a->TP_DESC; ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input name="xc_codpga" id="xc_codpga" type="hidden" value="<?= $c_codpga ?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">Precios</label>
                    <div class="col-xs-2">
                      <select name="c_precios" id="c_precios" class="form-control input-sm" onChange="OnchangeTipprecio()">
                        <option value="000">.:SELECCIONE:.</option>
                        <?php foreach($this->maestro->ListarTipPrecio() as $a):	 ?>
                        <option value="<?= $a->c_numitm; ?>" <?=$c_precios==$a->c_numitm ? 'selected' : ''; ?>>
                          <?= $a->c_desitm; ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input name="xc_precios" id="xc_precios" type="hidden" value="<?= $c_precios ?>" />
                    </div>
                    <label class="control-label col-xs-1">V. Oferta</label>
                    <div class="col-xs-2">
                      <input type="text" name="c_validez" id="c_validez" value="<?= utf8_encode($c_validez) ?>" class="form-control input-sm" placeholder="Validez de Oferta"
                        data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">Ref Dcto</label>
                    <div class="col-xs-2">
                      <input type="text" name="c_numocref" id="c_numocref" class="form-control input-sm" placeholder="Referencia Nro Dcto Cliente"
                        data-validacion-tipo="requerido" value="<?= $c_numocref ?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">Cronograma</label>
                    <div class="col-xs-2">
                      <input type="checkbox" value="1" id="c_gencrono" name="c_gencrono" onClick="valcheckcrono()" <?=($c_gencrono=='1' )?
                        'checked="checked"': '';?>>
                      <input name="xc_gencrono" id="xc_gencrono" type="hidden" value="<?= $c_gencrono ?>" />
                    </div>
                    <label class="control-label col-xs-1">Nro Meses</label>
                    <div class="col-xs-2">
                      <select name="xc_meses" id="xc_meses" class="form-control input-sm" onChange="Onchangedias()">
                        <option value="000">.:SELECCIONE:.</option>
                        <?php foreach($this->maestro->Listardias() as $a):	 ?>
                        <option value="<?= $a->tm_codi; ?>" <?=$c_meses==$a->tm_codi ? 'selected' : ''; ?>>
                          <?= $a->tm_desc; ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input name="c_meses" id="c_meses" type="hidden" value="<?= $c_meses ?>" />
                    </div>
                    <label class="control-label col-xs-1">F. Entrega</label>
                    <div class="col-xs-2">
                      <input type="text" name="d_fecent" id="d_fecent" value="<?=($d_fecent!=" ")?vfecha(substr($d_fecent,0,10)):""?>" class="form-control input-sm" placeholder="Fecha Entrega" />
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="settings">
                  <div class="form-group">
                    <label class="control-label col-xs-2">Descripcion</label>
                    <div class="col-xs-2">
                      <select name="descglosa" id="descglosa" class="form-control" onChange="recargar()">
                        <!--<option value="000">.:SELECCIONE:.</option>-->
                        <?php foreach($this->maestro->ListarGlosa() as $a):	 ?>
                        <option value="<?= utf8_encode(strip_tags($a->descripcion)); ?>">
                          <?= $a->titulo; ?>
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                    </div>
                    <div class="col-xs-10">
                      <!--class="summernote"-->
                      <textarea name="c_desgral" cols="100" rows="10" id="c_desgral">
                        <?php 	   
	                      echo (strip_tags(nl2br(utf8_encode(addslashes($c_desgral)))));
	                      ?>
                      </textarea>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="leasing">
                  <div class="form-group">
                    <br>
					<label class="control-label col-xs-1">Facturar a:</label>
                    <div class="col-xs-1">
                      <input name="validarFacturacion" type="checkbox" class="form-control input-sm" id="validarFacturacion" />
                    </div>
                    <label class="control-label col-xs-1">Cliente</label>
                    <div class="col-xs-3">
                      <input name="c_nomclileasig" type="text" class="form-control input-sm" id="c_nomclileasig" placeholder="Cliente Leasing"
                        value="<?= $itemD->c_nomclileasig; ?>"/>
                    </div>
                    <label class="control-label col-xs-1">Codigo</label>
                    <div class="col-xs-2">
                      <input type="text" id="c_codclileasig" name="c_codclileasig"  value="<?= $itemD->c_codclileasig; ?>" class="form-control input-sm" placeholder="Nro ruc Cliente Leasing"/>
                    </div>
                  </div>
                </div>
                <!--fin tab 4-->
              </div>
              <!--fin tab-->
  </form>
</body>
