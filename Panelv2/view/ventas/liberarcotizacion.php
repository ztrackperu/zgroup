<?php 

$data_coti = $this->model->ObtenerDataCotizacion($_GET['ncoti']);
$cantitems = 0;
foreach($data_coti as $r):
		$c_numped=$r->c_numped;
		$c_codmon=$r->c_codmon;
		$c_tipped=$r->c_tipped;
		$c_asunto=$r->c_asunto;
		$c_codven=$r->c_codven;
		$c_nomcli=$r->c_nomcli;
		$cc_nruc=$r->cc_nruc;
		//$xdireccion=$r->c_nomcli;
		//$nextel=$r->c_nextel;
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
		//$c_desgral=$r->c_desgral;
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
		//$c_meses=$r->c_meses;
		//$c_gencrono=$r->c_gencrono;		//$c_precios=c_precios;
		$cantitems++;
endforeach;
//echo $obtcotiitems->total; 
?>

<!--grilla update cotizaciones-->
<script type="text/javascript">
 var valor = <?= $cantitems; ?>;
 var posicionCampo = valor + 1;

 function agregardetalle() {
   nuevaFila = document.getElementById("tblSample").insertRow(-1);
   nuevaFila.id = posicionCampo;
   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td> <input name='c_codprd" + posicionCampo + "' type='hidden' id='c_codprd" + posicionCampo + "' size='5' readonly='readonly' class='form-control input-sm'></td>";
   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td> <input  name='c_desprd" + posicionCampo + "' type='text' id='c_desprd" + posicionCampo + "' size='40' readonly='readonly' class='form-control input-sm'></td> ";
   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='glosa" + posicionCampo + "' type='text'  id='glosa" + posicionCampo + "'  size='40'  class='form-control input-sm'/>";
   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='c_tipped" + posicionCampo + "' type='hidden'  id='c_tipped" + posicionCampo + "'  size='5'  class='form-control input-sm' readonly='readonly'/>";
   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='c_codcont" + posicionCampo + "' readonly='readonly' type='text'  id='c_codcont" + posicionCampo + "'  size='18'  class='form-control input-sm' />";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='c_fecini" + posicionCampo + "' type='text'  id='c_fecini" + posicionCampo + "'  size='10'  class='form-control input-sm'  onclick='abreVentanaF(this.name)'/>";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='c_fecfin" + posicionCampo + "' type='text'  id='c_fecfin" + posicionCampo + "'  size='10'  class='form-control input-sm'/>";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='n_preprd" + posicionCampo + "' type='text'  id='n_preprd" + posicionCampo + "'  size='10'  class='form-control input-sm' style='text-align:right'/>";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='n_dscto" + posicionCampo + "' type='text'  id='n_dscto" + posicionCampo + "'  size='10'  class='form-control input-sm' style='text-align:right'/>";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='n_canprd" + posicionCampo + "' type='text'  id='n_canprd" + posicionCampo + "'  size='10' onkeyup='actualizar_importe(this.name);' class='form-control input-sm'/>";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td><input name='imp" + posicionCampo + "' type='text'  id='imp" + posicionCampo + "'  size='10' readonly='readonly' class='form-control input-sm' style='text-align:right'/>";

   nuevaCelda = nuevaFila.insertCell(-1);
   nuevaCelda.innerHTML = "<td bgcolor='#CCCCCC'> <input value='Delete' type='button'  class='btn btn-danger btn-sm' onclick='eliminarUsuario(this)'></td> ";

   escribirdetalle(posicionCampo);
   posicionCampo++;
}


 function escribirdetalle(posicionCampo) {
   //calcularimporte();
   c_codprd = document.getElementById("c_codprd" + posicionCampo);
   c_codprd.value = document.Frmregcoti.c_codprd.value;

   c_desprd = document.getElementById("c_desprd" + posicionCampo);
   c_desprd.value = document.Frmregcoti.c_desprd.value;

   /*			glosa = document.getElementById("glosa" + posicionCampo);
   			glosa.value = document.formElem.glosa.value;*/

   c_tipped = document.getElementById("c_tipped" + posicionCampo);
   c_tipped.value = document.Frmregcoti.c_tipped.value;

   n_preprd = document.getElementById("n_preprd" + posicionCampo);
   n_preprd.value = parseFloat(document.Frmregcoti.n_preprd.value).toFixed(2);

   n_dscto = document.getElementById("n_dscto" + posicionCampo);
   n_dscto.value = parseFloat(document.Frmregcoti.n_dscto.value).toFixed(2);

   n_canprd = document.getElementById("n_canprd" + posicionCampo);
   n_canprd.value = document.Frmregcoti.n_canprd.value;

   var impdscto = parseFloat(document.Frmregcoti.n_preprd.value) - parseFloat(document.Frmregcoti.n_dscto.value);
   var importe = parseFloat(impdscto) * parseFloat(document.Frmregcoti.n_canprd.value);

   imp = document.getElementById("imp" + posicionCampo);
   imp.value = importe.toFixed(2);
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
     if (!document.getElementById("imp" + i)) {} else {
       subtot += parseFloat(document.getElementById("n_preprd" + i).value) * parseFloat(document.getElementById("n_canprd" + i).value);
       dscto += parseFloat(document.getElementById("n_dscto" + i).value) * parseFloat(document.getElementById("n_canprd" + i).value);;
       tot += parseFloat(document.getElementById("imp" + i).value);
       //alert("exite");
     }
   }
   document.getElementById("n_bruto").value = subtot.toFixed(2);
   document.getElementById("tn_dscto").value = dscto.toFixed(2);
   document.getElementById("n_neta").value = tot.toFixed(2);
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
   var cant = obj;
   var pre = cant.substring(8, 10);
   var dscto = cant.substring(8, 10);
   var canti = cant.substring(8, 10);
   var im = cant.substring(8, 10);
   var valor = (parseFloat(document.getElementById("n_preprd" + pre).value) -
     parseFloat(document.getElementById("n_dscto" + dscto).value)) * parseFloat(document.getElementById("n_canprd" + canti).value);
   document.getElementById("imp" + im).value = valor.toFixed(2);;
   recalculartotales();
 }

 function agregar() {
   var c_codmon = document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
   var tipocoti = document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
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
     //addRowToTable();
     agregardetalle();
     SumarTotales();
     document.getElementById("c_codmon").disabled = true;
     $("#c_codprd").val('');
     $("#c_desprd").val('');
     $("#n_preprd").val('');
     $("#n_canprd").val('1');
     $("#n_dscto").val('0.00');
   }
 }

 function guardar() {
   if (document.Frmregcoti.c_motivolib.value.length <= 10) {
     mensje = "Motivo de Liberacion no cumple el requerimiento minimo";
     $('#alertone').modal('show');
     $('#mensaje').val(mensje);
     //return 0;
   } else {
     if (confirm("Seguro de Liberar Cotizacion  ?")) {
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
              <!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
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
            }
          }))
        }
      })
    },
    select: function (e, ui) {
      $("#c_codprd").val(ui.item.id);
      $("#n_preprd").focus();
    }
  })
})
</script>
<script>
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
   //  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   //   $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
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
  /*	$("#c_desgral").html($(this).code());
  var cod=	document.Frmregcoti.c_desgral.value;
  alert($('.summernote').summernote(cod));
  alert($('.summernote').val());
        $('descglosa').on('change', function (e) {
          e.preventDefault();
          alert($('.summernote').summernote('code'));
          alert($('.summernote').val());
        });*/
});

  </script>
<script>
function llenarglosa() {
  document.Frmregcoti.c_desgral.value = document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;

}

function OnchangeTipCot() {
  limpiar()
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
function abrir() {
  $('#my_modal').modal('show');
  var producto = document.Frmregcoti.c_codprd.value;
  var xtipocot = document.Frmregcoti.c_tipped.value;
  document.Frmregcoti.xnomprd.value = producto;
  document.Frmregcoti.ztipocot.value = xtipocot;
  //	$('#xnomprd').val(producto);ztipocot   zcodprd c_tipped
}

function test() {}

function limpiar() {
  document.Frmregcoti.c_codprd.value = '';
  document.Frmregcoti.c_desprd.value = '';
  document.Frmregcoti.c_tipped.value = '';
}
</script>
<script>
 $(document).ready(function () {
   $('#my_modal').on('show.bs.modal', function (e) {
     var rowid = $(e.relatedTarget).data('id');
     $.ajax({
       type: 'post',
       url: '?c=03&a=UltCotListar&tp=' + document.Frmregcoti.c_tipped.value + '&cod=' + document.Frmregcoti.c_codprd.value, //Here you will fetch records 
       //  data :  'rowid='+ rowid, //Pass $id
       success: function (data) {
         $('.fetched-data').html(data); //Show fetched data from database
       }
     });
   });
 });
 
</script>

<?php /*?><!--para text area-->
<link rel="stylesheet" type="text/css" href="assets/jseditor/lib/css/prettify.css"></link>

<link rel="stylesheet" type="text/css" href="assets/jseditor/src/bootstrap-wysihtml5.css"></link>
<script src="assets/jseditor/lib/js/wysihtml5-0.3.0.js"></script>
<!--<script src="assets/jseditor/lib/js/jquery-1.7.2.min.js"></script>-->
<script src="assets/jseditor/lib/js/prettify.js"></script>
<script src="assets/jseditor/lib/js/bootstrap.min.js"></script>
<script src="assets/jseditor/src/bootstrap-wysihtml5.js"></script>

<script>
	$('.textarea').wysihtml5();

</script>

<script type="text/javascript" charset="utf-8">
//	$(prettyPrint);
</script>
<!--fin tex area--><?php */?>
<script>

/**
 * Funcion que devuelve la fecha actual y la fecha modificada n dias
 * Tiene que recibir el numero de dias en positivo o negativo para sumar o 
 * restar a la fecha actual.
 * Ejemplo:
 *  mostrarFecha(-10) => restara 10 dias a la fecha actual
 *  mostrarFecha(30) => añadira 30 dias a la fecha actual
 */
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

function xcal() {
  var fec = document.Frmregcoti.fechacal1.value;
  var dia = document.Frmregcoti.cmbdia.options[document.Frmregcoti.cmbdia.selectedIndex].value;
  var fecha = sumaFecha(dia, fec);
  document.Frmregcoti.fechacal2.value = fecha;
}

function pon_prefijo() {

  var cant = document.getElementById('valorfecha').value;

  var valor = cant.substring(8, 10);
  document.getElementById('c_fecini' + valor).value = document.Frmregcoti.fechacal1.value
  document.getElementById('c_fecfin' + valor).value = document.Frmregcoti.fechacal2.value

}
</script>
<script>
function recargar() {
  document.Frmregcoti.c_desgral.value = document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;
  var variable_post = document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;
  $.post("?c=03&a=UpdCotizaciones", {
    variable: variable_post
  }, function (data) {
    //// Verificamos la rpta entregada por miscript.php
    document.Frmregcoti.c_desgral.value = variable_post;
  });
}

function valcheckcrono() {
  var valcheck = document.getElementById("c_gencrono").value;

  if (document.getElementById("c_gencrono").checked == true) {
    document.getElementById("xc_meses").disabled = false;
    document.getElementById("xc_gencrono").value = 1;

  } else {
    document.getElementById("xc_meses").disabled = true;
    document.Frmregcoti.c_meses.value = '';
    document.getElementById("xc_gencrono").value = 0;
  }


}

function Onchangedias() {
  var xc_meses = document.Frmregcoti.xc_meses.options[document.Frmregcoti.xc_meses.selectedIndex].value;
  document.Frmregcoti.c_meses.value = xc_meses;
}

//para aprobar

function limpiarvalida() {
  document.getElementById("valdata").value = "0";
}

function recorregrid() {

  for (var y = 1; y <= 50; y++) {

    if (document.getElementById('re' + y).checked == true) {
      if (document.getElementById('c_tipped' + y).value == '017' && document.getElementById('c_codcont' + y).value == '') {
        //alert('Falta Codigo de Equipo')
        mensje = "Falta Codigo de Equipo";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        //document.getElementById('codcont'+y).focus();
        document.getElementById('valdata').value = '0';
        return 0;

      } else if (document.getElementById('c_tipped' + y).value == '017' && document.getElementById('c_fecini' + y).value == '') {
        document.getElementById('valdata').value = '1';
        //alert('Falta Fechas Alquiler')
        mensje = "Falta Fechas Alquiler";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        //document.getElementById('codcont'+y).focus();
        document.getElementById('valdata').value = '0';
        return 0;
        //alert ('todo ok')}
      } else {
        document.getElementById('valdata').value = '1';
      }
    }
    /*if( document.getElementById('re'+y).checked==true && document.getElementById('codcont'+y).value!='' && document.getElementById('fini'+y).value==''){
    	alert('Falta Periodo de Alquiler')
    	document.getElementById('fini'+y).focus();
    			return 0;
    			
    	}*/
  } //fin for

  //alert('hola') validadata onLoad="focusc_nomcli()"
}

function focusc_motivo() {
  document.getElementById('c_motivolib').focus();
  //document.getElementById('valorcambio').value=1;
}
</script>
<body onLoad="focusc_motivo()">
  <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=03&a=LiberarCotizacion&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">
    <!--modal fechas-->
    <!-- Modal -->
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
                <input name="fechacal1" type="text" class="form-control datepicker input-sm" id="fechacal1" size="12" maxlength="12" value=""/>
                <input name="valorfecha" id="valorfecha" type="hidden" />
              </td>
              <td>
                <select class="form-control input-sm" name="cmbdia" id="cmbdia">  
                  <option value="10">10</option>
                  <option value="30">30</option>
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
            <input name="mensaje" id="mensaje" type="text" size="50" disabled="disabled" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;"/>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">5 Ultimas Cotizaciones</h4>
            </div>
            <div class="modal-body">
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
                <tr>
                  <td><?= $c_numped; ?></td>
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
        <div class="panel-heading">LIBERACION DE COTIZACIONES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Tipo Cambio=<?= $tcambio ?>)
          <input name="n_tcamb" id="n_tcamb" type="hidden" value="<?= $tcambio ?>" />
        </div>
        <div>
          <div class="form-control-static" align="right">
            <!--<a class="btn btn-default" onClick="recorregrid()" >Validar</a>&nbsp;-->
            <a class="btn btn-success" onClick="guardar()">Liberar</a>&nbsp;
            <a class="btn btn-danger" href="?c=03&a=LibCotizaciones&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Cancelar</a>&nbsp;
            <a class="btn btn-warning" href="?c=03&a=LibCotizaciones&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Refrescar</a>&nbsp;
            <a class="btn btn-info" href="indexa.php?c=02&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Salir</a>&nbsp;
          </div>
		  <input type="hidden" class="form-control" id="swz" name="swz" value="<?php echo $_REQUEST["sw"]?>">
		 <input type="hidden" class="form-control" id="valorz" name="valorz" value="<?php echo $_REQUEST["valor"]?>">
         <input type="hidden" class="form-control" id="udniz" name="udniz" value="<?php echo $_REQUEST["udni"]?>">
         <input type="hidden" class="form-control" id="modz" name="modz" value="<?php echo $_REQUEST["mod"]?>">
          <div class="form-control-static">
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Cliente</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Detalle</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terminos y Condiciones</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Glosa y Observacion</a></li>
            <!--    <li role="presentation"><a href="#data" aria-controls="settings" role="tab" data-toggle="tab">Datos Adicionales</a></li>-->
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Datos del Cliente Tab -->
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="form-group">
                <label class="control-label col-xs-1"></label>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-1">Nro</label>
                <div class="col-xs-2">
                  <input name="c_numped" type="text" class="form-control input-sm" id="c_numped" placeholder=" Nro autogenerado" value="<?= $c_numped ?>"
                    readonly data-validacion-tipo="requerido" />
                  <input type="hidden" name="login" id="login" value="<?= $login ?>  " /></div>
                <label class="control-label col-xs-2">Moneda</label>
                <div class="col-xs-2">
                  <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" disabled> 
                    <option value="">.:SELECCIONE:.</option> 
                    <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                    <option value="<?= $moneda->TM_CODI; ?>"<?= $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?= $moneda->TM_DESC; ?></option>
                    <?php  endforeach;	 ?>
                  </select>
                  <input type="hidden" name="xc_codmon" id="xc_codmon" value="<?= $c_codmon?>" />
                </div>
                    <label class="control-label col-xs-1">Tipo</label>
                    <div class="col-xs-2">
                      <select name="ac_tipped" id="ac_tipped" class="form-control input-sm" onChange="OnchangeTipCotizacion()" disabled>	
                      <?php 
                        $cot_type = $this->maestro->ListarTipCot();
                        foreach($cot_type as $a):	 
                      ?>  
                        <!-- FIX: Notice: Undefined property: stdClass::$c_numitm -->
                        <option value="<?= $a->tc_codi; ?>"<?= $c_tipped == $a->tc_codi ? 'selected' : ''; ?>> <?= $a->tc_desc; ?> </option>
                      <?php  endforeach;	 ?>
                      </select>
                      <input type="hidden" name="xac_tipped" id="xac_tipped" value="<?= $c_tipped?>" />
                    </div>
                  </div>
                  <!--fila 2-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Cliente</label>
                    <div class="col-xs-3">
                      <input name="c_nomcli" type="text" class="form-control input-sm" id="c_nomcli" placeholder="Cliente" autocomplete="off" value="<?= $c_nomcli ?>"
                        readonly/>
                    </div>
                    <label class="control-label col-xs-1">Codigo</label>
                    <div class="col-xs-2">
                      <input type="text" id="c_codcli" name="c_codcli" value="<?= $c_codcli ?>" class="form-control input-sm" placeholder="Nro ruc"
                        data-validacion-tipo="requerido" readonly />

                    </div>
                    <label class="control-label col-xs-1">C. Via</label>
                    <div class="col-xs-2">
                      <select name="c_cmesfab" id="c_cmesfab" class="form-control input-sm">
              <option value="000">.:SELECCIONE:.</option>
              <option value="001">Contacto Web</option>  
              <option value="002">Telefono</option>
              <option value="003">Facebook</option>              
             </select>
                    </div>
                  </div>
                  <!--fila 3-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Contact</label>
                    <div class="col-xs-3">
                      <input name="c_contac" type="text" class="form-control input-sm" id="c_contac" placeholder="Contacto" value="<?= utf8_encode($c_contac) ?>"
                        readonly data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">Telf</label>
                    <div class="col-xs-2">
                      <input name="c_telef" type="text" class="form-control input-sm" id="c_telef" placeholder="Telefono" value="<?= $c_telef ?>"
                        readonly data-validacion-tipo="requerido" />

                    </div>
                    <label class="control-label col-xs-1">Correo</label>
                    <div class="col-xs-3">
                      <input name="c_email" type="text" class="form-control input-sm" id="c_email" placeholder="Correo" value="<?= $c_email ?>"
                        readonly data-validacion-tipo="requerido|email" />
                    </div>
                  </div>
                  <!--fila 4-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Asunto</label>
                    <div class="col-xs-6">
                      <input name="c_asunto" type="text" class="form-control input-sm" id="c_asunto" placeholder="Asunto" value="<?= utf8_encode($c_asunto) ?>"
                        readonly data-validacion-tipo="requerido" />
                    </div>

                    <label class="control-label col-xs-1">Fecha</label>
                    <div class="col-xs-2">
                      <input name="datepicker" type="text" class="form-control datepicker input-sm" id="datepicker" placeholder="Fecha Pedido"
                        value="<?= vfecha(substr($d_fecped,0,10)) ?>" readonly data-validacion-tipo="requerido" />
                    </div>
                  </div>
                  <!--fila 5-->
                  <div class="form-group">
                    <label class="control-label col-xs-1">Motivo</label>
                    <div class="col-xs-6">
                      <input name="c_motivolib" type="text" class="form-control input-sm" id="c_motivolib" placeholder="Ingrese Motivo Liberación"
                        value="" data-validacion-tipo="requerido" />
                    </div>
                  </div>
                </div>
                <!-- Datalle Tab -->
                <div role="tabpanel" class="tab-pane" id="profile">
                  <div class="well well-sm">
                    <div class="row">
                      <div class="col-xs-2">
                        <label class="control-label col-xs-1">Tipo</label>
                      </div>
                      <div class="col-xs-4">
                        <label class="control-label col-xs-1">Descripcion</label>
                      </div>
                      <div class="col-xs-1">
                        <label class="control-label col-xs-1">Cant.</label>
                      </div>
                      <div class="col-xs-2">
                        <label class="control-label col-xs-1">Dscto</label>
                      </div>
                      <div class="col-xs-2">
                        <label class="control-label col-xs-1">Precio</label>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-xs-2">
                        <select id="xc_tipped" name="xc_tipped" class="form-control input-sm" onChange="OnchangeTipCot()">
                          <option value="000">.:SELECCIONE:.</option> 
                          <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                          <option value="<?= $a->tc_codi; ?>"> <?= $a->tc_desc; ?> </option>
                          <?php  endforeach;	 ?>
                        </select>
                      </div>
                      <input id="c_tipped" name="c_tipped" type="hidden" value="" />
                      <div class="col-xs-4">
                        <input id="c_codprd" name="c_codprd" type="hidden" />
                        <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto"/>
                        <input id="glosa" name="glosa" type="hidden" />
                      </div>
                      <div class="col-xs-1">
                        <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="1"
                          maxlength="3" />
                      </div>
                      <div class="col-xs-2">
                        <input name="n_dscto" type="text" class="form-control input-sm" id="n_dscto" placeholder="Dscto" autocomplete="off" value="0"
                        />
                      </div>
                      <div class="col-xs-2">
                        <input autocomplete="off" id="n_preprd" name="n_preprd" class="form-control input-sm" type="text" placeholder="Precio" />

                      </div>
                      <div class="col-xs-1">
                        <!--                        <button class="btn btn-success btn-sm" id="btn-agregar" 
                        type="button" onClick="agregar();">
                             <i class="glyphicon glyphicon-plus"></i>
                        </button>-->

                      </div>
                    </div>
                  </div>
                  <hr />
                  <table id="tblSample" class="table table-striped">
                    <tr>
                      <th></th>
                      <th>Descripcion</th>
                      <th>Glosa</th>
                      <th>&nbsp;</th>
                      <th>CodEquipo</th>
                      <th>F.Ini Alq</th>
                      <th>F.Fin Alq</th>
                      <th>Precio</th>
                      <th>Dscto</th>
                      <th>Cant</th>
                      <th>Importe</th>
                      <th>Delete</th>
                    </tr>
                    <?php 
		$i=0;
	//	echo 'aqui nrocot'.$_GET['ncoti'];
		foreach($data_coti as $itemD):
		/*$c_codprd=$r->c_codprd;	
		$ncoti=$c_numped;
		$n_item=$r->n_item;	 
		$tipo=$r->c_tipped;	*/
		$i=$i+1;
	?>
                    <tr>
                      <th>
                        <input type="hidden" id="<?= " c_codprd ".$i; ?>" name="<?= " c_codprd ".$i; ?>" readonly
                        value="<?= $itemD->c_codprd ?>" class='form-control input-sm' />
                      </th>
                      <th>
                        <input name="<?= " c_desprd ".$i; ?>" type="text" id="<?= " c_desprd ".$i; ?>" value="<?= $itemD->c_desprd ?>"
                        class="form-control input-sm" size="40" readonly /></th>
                      <th>
                        <input type="text" id="<?= " c_obsdoc ".$i; ?>" name="<?= " c_obsdoc ".$i; ?>" value="<?= utf8_encode($itemD->c_obsdoc); ?>"
                        class="form-control input-sm" size="40" /></th>
                      <th> 
                        <input name="<?= " c_tipped ".$i; ?>" type="hidden" id="<?= " c_tipped ".$i; ?>" value="<?= $itemD->clase; ?>"
                        readonly/> &nbsp;
                      </th>
                      <th>
                        <input name="<?= " c_codcont ".$i; ?>" type="text" id="<?= " c_codcont ".$i; ?>" value="<?= $itemD->c_codcont ?>"
                        size="18" readonly class="form-control input-sm" /></th>
                      <th>
                        <input name="<?= " c_fecini ".$i; ?>" type="text" id="<?= " c_fecini ".$i; ?>" value="<?= $itemD->c_fecini;  ?>"
                        class='form-control input-sm' onClick="abreVentanaF(this.name)" /></th>
                      <th>
                        <input name="<?= " c_fecfin ".$i; ?>" type="text" id="<?= " c_fecfin ".$i; ?>" value="<?= $itemD->c_fecfin;  ?>"
                        class='form-control input-sm' /></th>
                      <th> 
                        <input type="text" id="<?= " n_preprd ".$i; ?>" name="<?= " n_preprd ".$i; ?>" value="<?= $itemD->n_preprd; ?>"
                        class='form-control input-sm' size="8" style="text-align:right">
                      </th>
                      <th> 
                        <input type="text" id="<?= " n_dscto ".$i; ?>" name="<?= " n_dscto ".$i; ?>" value="<?= $itemD->n_dscto; ?>"
                        class='form-control input-sm' size="5" style="text-align:right">
                      </th>
                      <th>
                        <input type="text" id="<?= " n_canprd ".$i; ?>" name="<?= " n_canprd ".$i; ?>" value="<?= $itemD->n_canprd; ?>"
                        onKeyUp="actualizar_importe(this.name)" class='form-control input-sm' size="5">
                      </th>
                      <th> 
                        <input type="text" id="<?= " imp ".$i; ?>" name="<?= " imp ".$i; ?>" value="<?= $itemD->n_totimp; ?>"
                        class='form-control input-sm' size="7" style="text-align:right" />
                      </th>
                      <th>
                        <input type="button" name="button3" id="button3" value="delete" class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)"/>
                      </th>
                    </tr>
                    <?php  endforeach; ?>
                  </table>
                  <table class="table">
                    <tr>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="53" align="right">&nbsp;</td>
                      <td width="26" align="right">&nbsp;</td>
                      <td width="77" align="right">Sub Total:</td>
                      <td width="101" align="right"><input name="n_bruto" id="n_bruto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?= $n_bruto ?>" /></td>
                      <td width="43" align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">Total Dscto:</td>
                      <td align="right"><input name="tn_dscto" id="tn_dscto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?= $n_dscto ?>" /></td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td align="right">Total:</td>
                      <td align="right"><input name="n_neta" id="n_neta" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"
                          value="<?= $n_neta ?>" /></td>
                      <td align="right">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <!--Terminos y Conticiones Tab -->
                <div role="tabpanel" class="tab-pane" id="messages">
                  <div class="form-group">
                    <label class="control-label col-xs-1"></label>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">L.Entrega</label>
                    <div class="col-xs-2">
                      <input name="c_lugent" type="text" class="form-control input-sm" id="c_lugent" placeholder="Lugar de Entrega" value="<?= utf8_encode($c_lugent) ?>"
                        readonly data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">T.Entrega</label>
                    <div class="col-xs-2">
                      <input name="c_tiempo" type="text" class="form-control input-sm" id="c_tiempo" placeholder="Tiempo de  Entrega" value="<?= utf8_encode($c_tiempo) ?>"
                        readonly data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">F.Pago</label>
                    <div class="col-xs-2">
                      <select disabled name="c_codpga" id="c_codpga" class="form-control input-sm" onChange="OnchangeTipfpago()">
                        <option value="000">.:SELECCIONE:.</option> 
                        <?php foreach($this->maestro->ListarFpago() as $a): ?>
                        <option value="<?= $a->TP_CODI; ?>"<?= $c_codpga == $a->TP_CODI ? 'selected' : ''; ?>> <?= $a->TP_DESC; ?> 
                        </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input name="xc_codpga" id="xc_codpga" type="hidden" value="<?= $c_codpga ?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">Precios</label>
                    <div class="col-xs-2">
                      <select name="c_precios" id="c_precios" class="form-control input-sm" onChange="OnchangeTipprecio()" disabled>
                        <option value="000">.:SELECCIONE:.</option> 
                        <?php 
                          $precio_type = $this->maestro->ListarTipPrecio();
                          foreach($precio_type as $a):	 
                        ?>
                        <option value="<?= $a->c_numitm; ?>"<?= $c_precios == $a->c_numitm ? 'selected' : ''; ?>> <?= $a->c_desitm; ?> </option>
                        <?php  endforeach;	 ?>
                      </select>
                      <input name="xc_precios" id="xc_precios" type="hidden" value="<?= $c_precios ?>" />
                    </div>
                    <label class="control-label col-xs-1">V. Oferta</label>
                    <div class="col-xs-2">
                      <input name="c_validez" type="text" class="form-control input-sm" id="c_validez" placeholder="Validez de Oferta" value="<?= utf8_encode($c_validez) ?>"
                        readonly data-validacion-tipo="requerido" />
                    </div>
                    <label class="control-label col-xs-1">Ref Dcto</label>
                    <div class="col-xs-2">
                      <input name="c_numocref" type="text" class="form-control input-sm" id="c_numocref" placeholder="Referencia Nro Dcto Cliente"
                        value="<?= $c_numocref ?>" readonly data-validacion-tipo="requerido" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-1">Cronograma</label>
                    <div class="col-xs-2">
                      <input type="checkbox" value="1" id="c_gencrono" name="c_gencrono" onClick="valcheckcrono()" <?= ($c_gencrono=='1' )?"checked=\"checked\"":""?>>
                      <input name="xc_gencrono" id="xc_gencrono" type="hidden" value="<?= $c_gencrono ?>" />
                    </div>
                    <label class="control-label col-xs-1">Nro Meses</label>
                    <div class="col-xs-2">
                      <select disabled name="xc_meses" id="xc_meses" class="form-control input-sm" onChange="Onchangedias()">
                        <option value="000">.:SELECCIONE:.</option> 
                        <?php foreach($this->maestro->Listardias() as $a):	 ?>                                 
                        <option value="<?= $a->tm_codi; ?>"<?= $c_meses == $a->tm_codi ? 'selected' : ''; ?>> <?= $a->tm_desc; ?> </option>
                        <?php  endforeach;	 ?>              
                      </select>
                      <input name="c_meses" id="c_meses" type="hidden" value="<?= $c_meses ?>" /> <input name="valdata"
                        type="hidden" id="valdata" value="0" size="5" />
                    </div>
                    <label class="control-label col-xs-1">F. Entrega</label>
                    <div class="col-xs-2">
                      <input name="d_fecent" type="text" class="form-control input-sm" id="d_fecent" placeholder="Fecha Entrega" value="<?= vfecha(substr($d_fecent,0,10)) ?>"
                        readonly />
                    </div>
                  </div>
                </div>
                <!-- Glosa y Observacion Tab -->
                <div role="tabpanel" class="tab-pane" id="settings">
                  <div class="form-group">
                    <label class="control-label col-xs-2">Descripcion</label>
                    <div class="col-xs-2">
                      <select name="descglosa" id="descglosa" class="form-control" onChange="recargar()">
                        <?php foreach($this->maestro->ListarGlosa() as $a):	 ?>                                 
                        <option value="<?= utf8_encode(strip_tags($a->descripcion)); ?>"> <?= $a->titulo; ?> </option>
                        <?php  endforeach;	 ?>
                      </select>
                    </div>
                    <div class="col-xs-10">
                      <textarea class="summernote" id="c_desgral" name="c_desgral"><?= utf8_encode(($c_desgral)) ?></textarea>
                      <textarea class="summernote" id="zc_desgral" name="zc_desgral">Zgroup Sac</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!--fin tab-->
  </form>
</body>
  <!--require_once 'view/principal/footer.php';-->
