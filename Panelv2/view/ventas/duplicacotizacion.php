<?php 

/*foreach($this->model->ObtenerDataCotizacion($_GET['ncoti']) as $r):
echo $cotizacion=$r->c_numped;
endforeach*/
foreach($this->model->ObtenerDataCotizacion($_GET['ncoti']) as $r):
		$c_numped=$r->c_numped;
		$c_codmon=$r->c_codmon;
		$c_tipped=$r->c_tipped;
		$c_asunto=$r->c_asunto;
		$c_codven=$r->c_codven;
		if($_GET['swdupadd']=='1'){
      $c_nomcli=$r->c_nomcli;
      $cc_nruc=$r->cc_nruc;
      $c_codcli=$r->c_codcli;
      $c_email=$r->c_email;
      $c_contac=$r->c_contac;
      $c_telef=$r->c_telef;
		}elseif($_GET['swdupadd']=='0'){
      $c_nomcli="";
      $cc_nruc="";
      $c_codcli="";
      $c_email="";
      $c_contac="";
      $c_telef="";	
		}
		//$xdireccion=$r->c_nomcli;
		//$nextel=$r->c_nextel;

		
		$n_tcamb=$r->n_tcamb;
		
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
		$c_via=$r->c_via;
		//$c_meses=$r->c_meses;
		//$c_gencrono=$r->c_gencrono;		//$c_precios=c_precios;
		$cantitems++;
endforeach;
//echo $obtcotiitems->total; 
?>

<!--grilla update cotizaciones-->
<script type="text/javascript">
function OnchangecVia() {
  var c_via = document.Frmregcoti.xc_via.options[document.Frmregcoti.xc_via.selectedIndex].value;
  document.Frmregcoti.c_via.value = c_via
}
var valor = <?php echo $cantitems; ?>;
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
  nuevaCelda.innerHTML = "<td><input name='imp_" + posicionCampo + "' type='text'  id='imp_" + posicionCampo + "'  size='10' readonly='readonly' class='form-control input-sm' style='text-align:right' disabled/>";

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

// <!--fin grilla update cotizaciones-->
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
  document.getElementById("imp" + pre).value = valor.toFixed(2);;
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
    var cant_dupl = document.Frmregcoti.cant_dupl.value 
    for(var i = 0; i < cant_dupl; i++){
      agregardetalle();
      SumarTotales();
    }
    document.getElementById("c_codmon").disabled = true;
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
    if (confirm("Seguro de Duplicar Cotizacion ?")) {
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
   const espannol = {
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

 function cambiacliente() {

   var cadena = document.Frmregcoti.xc_nomcli.options[document.Frmregcoti.xc_nomcli.selectedIndex].value;
   //alert(cadena);                      
   arreglo = cadena.split("|");
   c_codcli = arreglo[0];
   c_nomcli = arreglo[1].toUpperCase();
   c_telef = arreglo[2];
   c_contac = arreglo[3].toUpperCase();
   c_email = arreglo[4].toUpperCase();
   document.Frmregcoti.c_codcli.value = c_codcli;
   document.Frmregcoti.c_nomcli.value = c_nomcli;
   document.Frmregcoti.c_telef.value = c_telef;
   document.Frmregcoti.c_contac.value = c_contac;
   document.Frmregcoti.c_email.value = c_email;
 }
</script>

<script>

/**
 * Funcion que devuelve la fecha actual y la fecha modificada n dias
 * Tiene que recibir el numero de dias en positivo o negativo para sumar o 
 * restar a la fecha actual.
 * Ejemplo:
 *  mostrarFecha(-10) => restara 10 dias a la fecha actual
 *  mostrarFecha(30) => añadira 30 dias a la fecha actual
 */
sumaFecha = function(d, fecha)
{
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +0) + "/" + Fecha.getFullYear());
 var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
 fecha= new Date(fecha);
 fecha.setDate(fecha.getDate()+parseInt(d));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth()+1;
 var dia= fecha.getDate()-1;
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+mes+sep+anno;
 return (fechaFinal);
 }
 function abreVentanaF(obj){
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
	
 function xcal(){
	 var fec=document.Frmregcoti.fechacal1.value;
	 var dia=document.Frmregcoti.cmbdia.options[document.Frmregcoti.cmbdia.selectedIndex].value;
	 var xdia=dia-1;
	 var fecha = nuevaFecha(fec,'+'+xdia);
	document.Frmregcoti.fechacal2.value=fecha;
	 }
function pon_prefijo(){

	var cant=document.getElementById('valorfecha').value;

	var valor = cant.substring(8,10);
	document.getElementById('c_fecini'+valor).value=document.Frmregcoti.fechacal1.value
	document.getElementById('c_fecfin'+valor).value=document.Frmregcoti.fechacal2.value
	
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

function duplicarGrupo(){
  var tblSample = document.getElementById('tblSample');
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

<body onLoad="valcheckcrono()">
  <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=07&a=GuardarCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
    <!--modal fechas-->
    <!-- Modal -->
    <input name="tra_coti" id="tra_coti" type="hidden" value="<?= $_GET['sw'] ?>">
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
                <input name="valorfecha" id="valorfecha" type="hidden" /></td>
              <td>
                <select id="cmbdia" name="cmbdia" class="form-control input-sm">
                  <option value="000">.:SELECCIONE:.</option> 
                  <?php foreach($this->maestro->Listardias() as $a):?>                        
                  <option value="<?php echo $a->tm_codi; ?>"> <?php echo $a->tm_codi; ?> </option>
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
                <input name="fechacal2" type="text" id="fechacal2" size="12" value="" class='form-control input-sm' /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input type="button" name="button" id="button" class="btn btn-primary" value="Calcular" onClick="xcal()" /></td>
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
            <input name="mensaje" id="mensaje" type="text" size="35" disabled="disabled" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;"/>
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
                  <td>
                    <?php echo $item->c_numped; ?>
                  </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
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
		    endforeach;?>
        <!--fin ver ultimas cotizaciones-->
        <div class="container-fluid">
          <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">DUPLICADO DE COTIZACIONES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Tipo Cambio=
              <?php echo $tcambio ?>)<input name="n_tcamb" id="n_tcamb" type="hidden" value="<?php echo $tcambio ?>" /></div>
            <div>
              <div class="form-control-static" align="right">
                <!--<a class="btn btn-success" onClick="guardar()" href="#">Registrar</a>-->
                <input class="btn btn-success" type="button" onClick="guardar()" value="Registrar" /> &nbsp;
                <a class="btn btn-danger" href="?c=07&a=DuplicarCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cancelar</a>&nbsp;
                <a class="btn btn-warning" href="?c=07&a=DuplicarCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Refrescar</a>&nbsp;
                  <!--si la cotizacion viene de formulario de transporte-->
                  <?php if($_GET['sw']=='tra_coti'){?>
                  <a class="btn btn-info" href="indext.php?c=02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
                  <?php }else{?>
                  <a class="btn btn-info" href="indexa.php?c=02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
                  <?php }?>
              </div>
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
              <?php
              require_once 'cotizacion/duplicar/datos_cliente.php';
              require_once 'cotizacion/duplicar/detalle.php';
              require_once 'cotizacion/duplicar/terminos_condiciones.php';
              require_once 'cotizacion/duplicar/glosa_observacion.php';
              ?>
              </div>
              <!--fin tab-->
</form>
</body>
