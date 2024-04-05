<?php 

/*foreach($this->model->ObtenerDataCotizacion($_GET['ncoti']) as $r):
echo $cotizacion=$r->c_numped;
endforeach*/
if($arreglo1!=NULL)
{
	foreach ($arreglo1 as $item1)
	{
		$cotizacion=$item1[0];
	}
}
foreach($this->model->ObtenerDataCotizacion($cotizacion) as $r):
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
		$c_gencro='0';
		$c_swfirma=$r->c_swfirma;
		$c_gencrono='0';
		$c_meses='0';
		$d_fecped=$r->d_fecped;
		$d_fecreg=$r->d_fecreg;
		$d_fecent=$r->d_fecent;
		$c_numocref=$r->c_numocref;
		$c_via=$r->c_via;
		//$c_meses=$r->c_meses;
		//$c_gencrono=$r->c_gencrono;		//$c_precios=c_precios;
		$cantitems++;

endforeach
//echo $obtcotiitems->total; 
?>

<!--grilla update cotizaciones-->
<script type="text/javascript">
function OnchangecVia(){
var c_via=document.Frmregcoti.xc_via.options[document.Frmregcoti.xc_via.selectedIndex].value;
	document.Frmregcoti.c_via.value=c_via
}
 var valor=<?php echo $cantitems; ?>;
 var posicionCampo=valor+1;

function agregardetalle(){
	
	
		nuevaFila = document.getElementById("tblSample").insertRow(-1);
		nuevaFila.id=posicionCampo;
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td> <input name='c_codprd_"+posicionCampo+"' type='hidden' id='c_codprd_"+posicionCampo+ "' size='5' readonly='readonly' class='form-control input-sm'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td> <input  name='c_desprd_"+posicionCampo+"' type='text' id='c_desprd_"+posicionCampo+ "' size='40' readonly='readonly' class='form-control input-sm'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='glosa_"+posicionCampo+"' type='text'  id='glosa_"+posicionCampo+"'  size='40'  class='form-control input-sm'/>";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_tipped_"+posicionCampo+"' type='hidden'  id='c_tipped_"+posicionCampo+"'  size='5'  class='form-control input-sm' readonly='readonly'/>";
			nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_codcont_"+posicionCampo+"' readonly='readonly' type='text'  id='c_codcont_"+posicionCampo+"'  size='18'  class='form-control input-sm' />";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_fecini_"+posicionCampo+"' type='text'  id='c_fecini_"+posicionCampo+"'  size='10'  class='form-control input-sm'  onclick='abreVentanaF(this.name)'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='c_fecfin_"+posicionCampo+"' type='text'  id='c_fecfin_"+posicionCampo+"'  size='10'  class='form-control input-sm'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='n_preprd_"+posicionCampo+"' type='text'  id='n_preprd_"+posicionCampo+"'  size='10'  class='form-control input-sm' style='text-align:right'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='n_dscto"+posicionCampo+"' type='text'  id='n_dscto"+posicionCampo+"'  size='10'  class='form-control input-sm' style='text-align:right'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='n_canprd_"+posicionCampo+"' type='text'  id='n_canprd_"+posicionCampo+"'  size='10' onkeyup='actualizar_importe(this.name);' class='form-control input-sm'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td><input name='imp_"+posicionCampo+"' type='text'  id='imp_"+posicionCampo+"'  size='10' readonly='readonly' class='form-control input-sm' style='text-align:right'/>";
		
		
		
		//<input value='Delete' type='button'  class='btn btn-danger btn-sm' onclick='eliminarUsuario(this)'>
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> </td> ";
		

		escribirdetalle(posicionCampo);
		posicionCampo++;
	
		
    }


function escribirdetalle(posicionCampo)
{
	//calcularimporte();
			c_codprd = document.getElementById("c_codprd_" + posicionCampo);
			c_codprd.value = document.Frmregcoti.c_codprd.value;
			
			c_desprd = document.getElementById("c_desprd_" + posicionCampo);
			c_desprd.value = document.Frmregcoti.c_desprd.value;
			
/*			glosa = document.getElementById("glosa" + posicionCampo);
			glosa.value = document.formElem.glosa.value;*/
			
			c_tipped = document.getElementById("c_tipped_" + posicionCampo);
			c_tipped.value = document.Frmregcoti.c_tipped.value;
			
			n_preprd = document.getElementById("n_preprd_" + posicionCampo);
			n_preprd.value = parseFloat(document.Frmregcoti.n_preprd.value).toFixed(2);
			
			n_dscto = document.getElementById("n_dscto_" + posicionCampo);
			n_dscto.value = parseFloat(document.Frmregcoti.n_dscto.value).toFixed(2);
			
			n_canprd = document.getElementById("n_canprd_" + posicionCampo);
			n_canprd.value = document.Frmregcoti.n_canprd.value;
			
			
			var	impdscto=parseFloat(document.Frmregcoti.n_preprd.value)-parseFloat(document.Frmregcoti.n_dscto.value);	
			var importe=parseFloat(impdscto)*parseFloat(document.Frmregcoti.n_canprd.value);	

			imp = document.getElementById("imp_" + posicionCampo);
			imp.value = importe.toFixed(2);;
			
}
function eliminarUsuario(obj){

    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
 	}
    var root = oTr.parentNode;
    root.removeChild(oTr);
	recalculartotales();
}

<!--fin grilla update cotizaciones-->
//calulcar totales
function recalculartotales(){
subtot=0;
dscto=0;
tot=0;
	for(var i=1; i<=80; i++)
	{
		if(!document.getElementById("imp_"+i)){
		}else{
	subtot+=parseFloat(document.getElementById("n_preprd_"+i).value)*parseFloat(document.getElementById("n_canprd_"+i).value);
	dscto+=parseFloat(document.getElementById("n_dscto_"+i).value)*parseFloat(document.getElementById("n_canprd_"+i).value);;
	tot+=parseFloat(document.getElementById("imp_"+i).value);
			
	//alert("exite");
		}
	}
document.getElementById("n_bruto").value=subtot.toFixed(2);
document.getElementById("tn_dscto").value=dscto.toFixed(2);
document.getElementById("n_neta").value=tot.toFixed(2);
}

function SumarTotales(){
var xn_bruto=document.getElementById("n_bruto").value;
var xn_dscto=document.getElementById("tn_dscto").value;
var xn_neta=document.getElementById("n_neta").value;

var zn_bruto=parseFloat(document.getElementById("n_preprd").value)*parseFloat(document.getElementById("n_canprd").value)

var zn_dscto=parseFloat(document.getElementById("n_dscto").value);

var zn_neta=parseFloat(document.getElementById("n_preprd").value)*parseFloat(document.getElementById("n_canprd").value)-
		parseFloat(document.getElementById("n_dscto").value);	
		
var fn_bruto=zn_bruto+parseFloat(xn_bruto);
var fn_dscto=zn_dscto+parseFloat(xn_dscto);
var fn_neta=zn_neta+parseFloat(xn_neta);

	document.getElementById("n_bruto").value=fn_bruto.toFixed(2);
	document.getElementById("tn_dscto").value=fn_dscto.toFixed(2);
	document.getElementById("n_neta").value=fn_neta.toFixed(2);

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
function agregar(){
	var c_codmon=document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
	var tipocoti=document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
		if(c_codmon=="000"){
		var mensje = "Falta Ingresar Tipo Moneda";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);		
			
		}else if(tipocoti=="000"){
		var mensje = "Falta Ingresar Tipo Cotización";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);		
			
		}else if((document.Frmregcoti.c_nomcli.value)==""){
				
			var mensje = "Falta Ingresar Datos del Cliente";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			
		}else if((document.Frmregcoti.c_asunto.value)==""){
			mensje = "Falta Ingresar Asunto de Cotizacion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			
		}else if((document.Frmregcoti.c_codprd.value)==""){
			mensje = "Falta Ingresar Descripcion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else if((document.Frmregcoti.n_preprd.value)==""){
			mensje = "Falta Ingresar Precio";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else{        
			//addRowToTable();
			agregardetalle();
			SumarTotales();
			document.getElementById("c_codmon").disabled=true;
			$("#c_codprd").val('');
			$("#c_desprd").val('');
			$("#n_preprd").val('');
			$("#n_canprd").val('1');
			$("#n_dscto").val('0.00');
		}	
	}
function guardar(){
	var theTable = document.getElementById('tblSample');
	cantFilas = theTable.rows.length;
	if(cantFilas==1){
		mensje = "Falta Detalle de Cotizacion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
	}else if(document.Frmregcoti.c_contac.value==""){
		mensje = "Falta Ingresar Nombre de Contacto";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
	}else if((document.Frmregcoti.c_telef.value)==""){
		mensje = "Falta Ingresar Telefono de Contacto";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
	}else if((document.Frmregcoti.c_email.value)==""){
		mensje = "Falta Ingresar Email de Contacto";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);										
	}else if((document.Frmregcoti.c_lugent.value)==""){
		mensje = "Falta Ingresar Lugar Entrega";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
	}else if((document.Frmregcoti.c_tiempo.value)==""){
		mensje = "Falta Ingresar Tiempo Entrega";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);			
	}else if((document.Frmregcoti.c_validez.value)==""){
		mensje = "Falta Ingresar Validez Cotización";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);				
	}else if((document.Frmregcoti.xc_codpga.value)==""){			
		mensje = "Falta Ingresar Forma Pago";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		}else if((document.Frmregcoti.xc_precios.value)==""){	
		mensje = "Falta Ingresar Precios Con y/o Sin Igv";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
					
	}else{
			if(confirm("Seguro de Guardar Cotizacion ?")){
				document.getElementById("Frmregcoti").submit();
	 		}		
   }
}
	
</script>


<!--FIN GRILLA-->
<script>
$(document).ready(function(){   
    
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
							contacto:item.CC_RESP,
							telefono:item.CC_TELE,
							email:item.CC_EMAI
                          //  precio: item.Precio
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
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

$(document).ready(function(){   
    $("#c_desprd").autocomplete({
		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=03&a=ProductoBuscar&tp='+document.Frmregcoti.c_tipped.value,
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
//  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
//   $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   $( "#datepicker" ).datepicker();
   $( "#fechacal1" ).datepicker();
    $( "#d_fecent" ).datepicker();
   
 });
</script>
<link rel="stylesheet" href="assets/dist/summernote.css">

  <script type="text/javascript" src="assets/dist/summernote.js"></script>
<script type="text/javascript">
$('.c_desgral').on("blur", function(){
var editor = $(this).closest('.note-editor').siblings('textarea.zc_desgral');
editor.html(editor.code());
});
    $(function() {
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
function llenarglosa(){
		document.Frmregcoti.c_desgral.value =document.Frmregcoti.descglosa.options[document.Frmregcoti.descglosa.selectedIndex].value;

	}
function OnchangeTipCot(){
	limpiar()
var tipocoti=document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;
	document.Frmregcoti.c_tipped.value=tipocoti
	document.Frmregcoti.c_desprd.focus();
	}
function OnchangeTipMoneda(){
var c_codmon=document.Frmregcoti.c_codmon.options[document.Frmregcoti.c_codmon.selectedIndex].value;
	document.Frmregcoti.xc_codmon.value=c_codmon
	//document.Frmregcoti.c_desprd.focus();
	}	
function OnchangeTipCotizacion(){
var ac_tipped=document.Frmregcoti.ac_tipped.options[document.Frmregcoti.ac_tipped.selectedIndex].value;
	document.Frmregcoti.xac_tipped.value=ac_tipped
	//document.Frmregcoti.c_desprd.focus();
	}	

function OnchangeTipfpago(){
var c_codpga=document.Frmregcoti.c_codpga.options[document.Frmregcoti.c_codpga.selectedIndex].value;
	document.Frmregcoti.xc_codpga.value=c_codpga
}

function OnchangeTipprecio(){
var c_precios=document.Frmregcoti.c_precios.options[document.Frmregcoti.c_precios.selectedIndex].value;
	document.Frmregcoti.xc_precios.value=c_precios
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
 function xcal(){
	 var fec=document.Frmregcoti.fechacal1.value;
	 var dia=document.Frmregcoti.cmbdia.options[document.Frmregcoti.cmbdia.selectedIndex].value;
	 var fecha = sumaFecha(dia,fec);
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
</script>

<body onLoad="recalculartotales()">
<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=05&a=GuardarCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
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
   		<table class="table table-striped" >
    <tr>
      <td> Fecha Inicio </td>
      <td>Dias</td>
    </tr>
    <tr>
      <td>
       <input name="fechacal1"  type="text"  class="form-control datepicker input-sm"  id="fechacal1" size="12" maxlength="12" value="" />
       <input name="valorfecha" id="valorfecha" type="hidden" /></td>
      <td>
      <select  class="form-control input-sm" name="cmbdia" id="cmbdia" >
   
 
      <option value="10">10</option>
      <option value="30">30</option>
     
    </select></td>
    </tr>
    <tr>
      <td>Fecha Fin</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <input name="fechacal2" type="text" id="fechacal2" size="12" value=""   class='form-control input-sm'/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="button" name="button" id="button" class="btn btn-primary" value="Calcular" onClick="xcal()" /></td>
      <td><?php /*?><a href="javascript:pon_prefijo('<?php echo   $xd_fecreg;?>','<?php echo $fecha2;?>','<?php echo $val ?>')"></a><?php */?></td>
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
    <input name="mensaje" id="mensaje" type="text" size="35" disabled="disabled" 
    style="background-color: #FAF3D1;border: 0px solid #A8A8A8;" />

 
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
       <!-- <form>-->
        <div class="form-group">
            <label for="recipient-name" class="control-label">Producto</label>
            <input type="text" class="form-control" id="xnomprd" name="xnomprd" value="">
            <input type="hidden" name="swfusion" id="swfusion">
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
    <td><?php echo $item->c_numped; ?></td>
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
		endforeach;?>
  <!--fin ver ultimas cotizaciones-->
<div class="container-fluid">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">FUSION DE COTIZACIONES
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Tipo Cambio=<?php echo $tcambio ?>)<input name="n_tcamb"  id="n_tcamb" type="hidden" value="<?php echo $tcambio ?>" /></div>
  <div>
<div class="form-control-static" align="right">
<a class="btn btn-success" onClick="guardar()" href="#">Guardar</a>&nbsp;<a class="btn btn-danger" href="?c=03&a=FusionarCotizaciones&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cancelar</a>&nbsp;<a class="btn btn-warning" href="?c=05&a=FusionarCotizaciones&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Refrescar</a>&nbsp;<a class="btn btn-info" href="indexa.php?c=06&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
</div>
<div class="form-control-static">
</div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Cliente</a>
    </li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Detalle</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Terminos y Condiciones</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Glosa y Observacion</a></li>
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
             <input type="text" name="c_numped" id="c_numped" value="Autogenerado" class="form-control input-sm" placeholder=" Nro autogenerado" data-validacion-tipo="requerido" />  
        	 <input type="hidden" name="n_swtapr" id="n_swtapr" value="1" />
              <input name="c_cotipadre" type="hidden" id="c_cotipadre" value=""/>
              <input type="hidden" name="regfus" id="regfus" value="1">
              <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
            </div>                       
            <label class="control-label col-xs-2">Moneda</label>
            <div class="col-xs-2">
             <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" disabled > 
              <option value="">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>"<?php echo $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select>	
             
             <input type="hidden" name="xc_codmon" id="xc_codmon" value="<?php echo $c_codmon?>" />
            </div>
         	<label class="control-label col-xs-1">Tipo</label>
            <div class="col-xs-2">
              <select name="ac_tipped" id="ac_tipped" class="form-control input-sm" onChange="OnchangeTipCotizacion()">	
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                <option value="<?php echo $a->tc_codi; ?>"<?php echo $c_tipped == $a->tc_codi ? 'selected' : ''; ?>> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
              <input type="hidden" name="xac_tipped" id="xac_tipped" value="<?php echo $c_tipped?>" />
        	</div>   
      </div>
   <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-1">Cliente</label>
            <div class="col-xs-3">
             <input name="c_nomcli" type="text" class="form-control input-sm" id="c_nomcli" placeholder="Cliente" autocomplete="off" value="<?php echo $c_nomcli ?>" readonly/>  
        	</div>                     
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $c_codcli ?>" class="form-control input-sm" placeholder="Nro ruc" data-validacion-tipo="requerido" readonly />  
             
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
             <input type="text" id="c_contac" name="c_contac" value="<?php echo utf8_encode($c_contac) ?>" class="form-control input-sm" placeholder="Contacto" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Telf</label>
            <div class="col-xs-2">
             <input type="text" id="c_telef" name="c_telef" value="<?php echo $c_telef ?>" class="form-control input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />  
            
         </div>
         	<label class="control-label col-xs-1">Correo</label>
            <div class="col-xs-3">
            <input type="text" id="c_email" name="c_email" value="<?php echo $c_email ?>" class="form-control input-sm" placeholder="Correo" data-validacion-tipo="requerido|email" /> 
        	</div>   
      </div>
        <!--fila 4-->
        <div class="form-group">
           <label class="control-label col-xs-1">Asunto</label>
            <div class="col-xs-6">
             <input type="text" id="c_asunto" name="c_asunto" value="<?php echo utf8_encode($c_asunto) ?>" class="form-control input-sm"
             placeholder="Asunto" data-validacion-tipo="requerido" />  
        	</div>                       
            
         	<label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
              <input name="datepicker" type="text" class="form-control datepicker input-sm" id="datepicker" placeholder="Fecha Pedido" value="<?php echo vfecha(substr($d_fecped,0,10)) ?>" readonly data-validacion-tipo="requerido" 
               />
            <input name="valdata" type="hidden" id="valdata" value="0" size="5" /></div>   
        </div>
</div><!--fin tab 1-->
    
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
              <select  id="xc_tipped" name="xc_tipped" class="form-control input-sm" onChange="OnchangeTipCot()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                <option value="<?php echo $a->tc_codi; ?>"> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
	
        	</div>   
             <input id="c_tipped" name="c_tipped" type="hidden"  value="" />
                
                    <div class="col-xs-4">
                        <input id="c_codprd" name="c_codprd" type="hidden" />
                        <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto" />
                        <input id="glosa" name="glosa" type="hidden" />
                    </div>
                    <div class="col-xs-1">
                        <input name="n_canprd" type="text" class="form-control input-sm" id="n_canprd" placeholder="Cant" autocomplete="off" value="1" maxlength="3" />
                    </div>
                    <div class="col-xs-2">
                        <input name="n_dscto" type="text" class="form-control input-sm" id="n_dscto" placeholder="Dscto" autocomplete="off" value="0" />
                    </div>
                    <div class="col-xs-2">
<input autocomplete="off" id="n_preprd" name="n_preprd" class="form-control input-sm" type="text" 
placeholder="Precio"   />
                        
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
<table  id="tblSample" class="table table-striped">
    <tr>
      <th></th>
      <th>Descripcion</th>
      <th>Glosa</th>
      <th>&nbsp;</th>
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
		foreach($this->model->ListaDetFusionados($c_oper) as $itemD):
		/*$c_codprd=$r->c_codprd;	
		$ncoti=$c_numped;
		$n_item=$r->n_item;	 
		$tipo=$r->c_tipped;	*/
		$i=$i+1;
		$st=0;$tcd=0;$dscto=0;
		//$xst=$itemD->n_preprd*$itemD->n_canprd;
		//$st +=$xst; no valido
		$dscto +=($itemD->n_dscto);
		$tcd +=((($itemD->n_preprd)-($itemD->n_dscto))*($itemD->n_canprd));
		//fin no valido ver onload recalcular totales
	?>
   <tr>
      <th>
      <input type="hidden" id="<?php echo "c_numpedfus_".$i; ?>"  name="<?php echo "c_numpedfus_".$i; ?>" readonly  size="7" value="<?php echo $itemD->c_numped; ?>" class="texto" />
      <input type="hidden" id="<?php echo "c_codprd_".$i; ?>"  name="<?php echo "c_codprd_".$i; ?>" readonly  value="<?php echo $itemD->c_codprd ?>" class='form-control input-sm' /></th>

      <th><input  name="<?php echo "c_desprd_".$i; ?>" type="text" id="<?php echo "c_desprd_".$i; ?>" 
      value="<?php echo $itemD->c_desprd ?>"    class="form-control input-sm" size="40" readonly /></th>
      <th><input type="text" id="<?php echo "c_obsdoc_".$i; ?>"  name="<?php echo "c_obsdoc_".$i; ?>"   value="<?php echo utf8_encode($itemD->c_obsdoc); ?>" class="form-control input-sm" size="40" /></th>
      <th><input type="hidden" name="<?php echo "c_codcla_".$i; ?>" id="<?php echo "c_codcla_".$i; ?>" value="<?php echo $itemD->c_codcla ?>">
      
      
      <input type="hidden" name="<?php echo "c_almdesp_".$i; ?>" id="<?php echo "c_almdesp_".$i; ?>" value="<?php echo $itemD->c_almdesp ?>" class="form-control input-sm">
      
      
            <input type="hidden" name="<?php echo "c_numguiadesp_".$i; ?>" id="<?php echo "c_numguiadesp_".$i; ?>" value="<?php echo $itemD->c_numguiadesp ?>" class="form-control input-sm">
      
      
      &nbsp;</th>
      <th> <input name="<?php echo "c_tipped_".$i; ?>" type="text" id="<?php echo "c_tipped_".$i; ?>"  value="<?php echo $itemD->c_tipped; ?>" class="form-control input-sm" size="5" readonly/>
&nbsp;</th>
      <th><input  name="<?php echo "c_codcont_".$i; ?>" type="text" id="<?php echo "c_codcont_".$i; ?>"  value="<?php echo $itemD->c_codcont ?>"  size="18" readonly class="form-control input-sm" /></th>
      <th><input name="<?php echo "c_fecini_".$i; ?>" type="text" id="<?php echo "c_fecini_".$i; ?>"   value="<?php echo $itemD->c_fecini;  ?>" class='form-control input-sm' onClick="abreVentanaF(this.name)"/></th>
      <th><input name="<?php echo "c_fecfin_".$i; ?>" type="text" id="<?php echo "c_fecfin_".$i; ?>"   value="<?php echo $itemD->c_fecfin;  ?>" class='form-control input-sm'/></th>
      <th> <input type="text" id="<?php echo "n_preprd_".$i; ?>"  name="<?php echo "n_preprd_".$i; ?>"   value="<?php echo $itemD->n_preprd; ?>" class='form-control input-sm' size="8" style="text-align:right">
    </th>
      <th> <input type="text" id="<?php echo "n_dscto_".$i; ?>"  name="<?php echo "n_dscto_".$i; ?>"  value="<?php echo $itemD->n_dscto; ?>" class='form-control input-sm' size="5" style="text-align:right">
</th>
      <th> <input type="text" id="<?php echo "n_canprd_".$i; ?>"  name="<?php echo "n_canprd_".$i; ?>"   value="<?php echo $itemD->n_canprd; ?>" onKeyUp="actualizar_importe(this.name)"  class='form-control input-sm' size="5" >
</th>
      <th> <input type="text" id="<?php echo "imp_".$i; ?>"  name="<?php echo "imp_".$i; ?>"   value="<?php echo $itemD->n_totimp; ?>" class='form-control input-sm' size="7" style="text-align:right"/>
</th>
      <th><input type="button" name="button3" id="button3" value="delete"  class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)" /></th>
    </tr>
    <?php 
		$xst=0;
		$xst +=$itemD->n_preprd*$itemD->n_canprd;
	 endforeach; ?>  
  

</table>
<table  class="table">
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
    <td width="101" align="right"><input name="n_bruto" id="n_bruto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"  value="<?php echo $$xst ?>"/></td>
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
    <td align="right"><input name="tn_dscto" id="tn_dscto" type="text" class="form-control input-sm" size="5" readonly style="text-align:right"  value="<?php echo $dscto ?>"/></td>
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
    <td align="right"><input name="n_neta" id="n_neta" type="text"  class="form-control input-sm" size="5" readonly style="text-align:right"  value="<?php echo $tcd ?>"/></td>
    <td align="right">&nbsp;</td>
    </tr>
</table>

           <!-- <ul id="facturador-detalle" class="list-group"></ul>-->
            
            
    </div><!--fin tab 2-->
    <div role="tabpanel" class="tab-pane" id="messages">
    <div class="form-group">
       <label class="control-label col-xs-1"></label>
      </div>
       <div class="form-group">
           <label class="control-label col-xs-1">L.Entrega</label>
            <div class="col-xs-2">
             <input type="text" name="c_lugent" id="c_lugent" value="<?php echo utf8_encode($c_lugent) ?>" class="form-control input-sm" placeholder="Lugar de Entrega" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">T.Entrega</label>
            <div class="col-xs-2">
             <input type="text" name="c_tiempo" id="c_tiempo" value="<?php echo utf8_encode($c_tiempo) ?>" class="form-control input-sm" placeholder="Tiempo de  Entrega" data-validacion-tipo="requerido" />  
        	</div> 
         	<label class="control-label col-xs-1">F.Pago</label>
            <div class="col-xs-2">
              <select name="c_codpga" id="c_codpga" class="form-control input-sm" onChange="OnchangeTipfpago()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarFpago() as $a): ?>
                <option value="<?php echo $a->TP_CODI; ?>"<?php echo $c_codpga == $a->TP_CODI ? 'selected' : ''; ?>> <?php echo $a->TP_DESC; ?> 
               </option>
                <?php  endforeach;	 ?>
             </select>	
             <input name="xc_codpga" id="xc_codpga" type="hidden" value="<?php echo $c_codpga ?>" />
        	</div> 
            
             
       </div>
       <div class="form-group">
       
           <label class="control-label col-xs-1">Precios</label>
            <div class="col-xs-2">
             <select name="c_precios" id="c_precios" class="form-control input-sm" onChange="OnchangeTipprecio()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarTipPrecio() as $a):	 ?>                                 
                <option value="<?php echo $a->c_numitm; ?>"<?php echo $c_precios == $a->c_numitm ? 'selected' : ''; ?>> <?php echo $a->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select>
               <input name="xc_precios" id="xc_precios" type="hidden" value="<?php echo $c_precios ?>" />
        	</div>                       
            <label class="control-label col-xs-1">V. Oferta</label>
            <div class="col-xs-2">
             <input type="text" name="c_validez" id="c_validez" value="<?php echo utf8_encode($c_validez) ?>" class="form-control input-sm" placeholder="Validez de Oferta" data-validacion-tipo="requerido" />  
        	</div> 
         	<!--<label class="control-label col-xs-1">Obs.</label>
            <div class="col-xs-4">
              <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="Observacion" data-validacion-tipo="requerido" /> 	
        	</div>  --> 
            <label class="control-label col-xs-1">Ref Dcto</label>
            <div class="col-xs-2">
              <input type="text" name="c_numocref" id="c_numocref"  class="form-control input-sm" placeholder="Referencia Nro Dcto Cliente"  value="Pago cuota"/> 	
        	</div> 
      </div>
        
        
         <div class="form-group">
       
  <?php /*?>         <label class="control-label col-xs-1">Cronograma</label>
            <div class="col-xs-2">
          	
  			<input type="checkbox" value="1" id="c_gencrono" name="c_gencrono" onClick="valcheckcrono()"
            <?php if($c_gencrono=='1'){ ?> checked="checked"<?php }?>>
			
       	   </div>   <?php */?>          
           <input name="xc_gencrono" id="xc_gencrono" type="hidden" value="<?php echo $c_gencrono ?>" />          
            <!--<label class="control-label col-xs-1">Nro Meses</label>-->
           <!-- <div class="col-xs-1">-->
              <?php /*?><select name="xc_meses" id="xc_meses" class="form-control input-sm" onChange="Onchangedias()"  >

                          <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->Listardias() as $a):	 ?>                                 
                <option value="<?php echo $a->tm_codi; ?>"<?php echo $c_meses == $a->tm_codi ? 'selected' : ''; ?>> <?php echo $a->tm_desc; ?> </option>
                 <?php  endforeach;	 ?>
                
             </select> <?php */?>
             <input name="c_meses" id="c_meses" type="hidden" value="<?php echo $c_meses ?>" />
        	<!--</div> -->
         	<label class="control-label col-xs-1">F. Entrega</label>
            <div class="col-xs-2">
              <input type="text" name="d_fecent" id="d_fecent" value="<?php echo date("d/m/Y") ?>" class="form-control input-sm" placeholder="Fecha Entrega" /> 	
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
                <option value="<?php echo utf8_encode(strip_tags($a->descripcion)); ?>"> <?php echo $a->titulo; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
        	</div>   
    <div class="col-xs-10">
    <!--class="summernote"--> 
    
       <textarea  class="summernote"  id="c_desgral" name="c_desgral"><?php echo utf8_encode(($c_desgral)) ?></textarea>
      
    <textarea  class="summernote" id="zc_desgral" name="zc_desgral">Zgroup Sac
    </textarea>
    </div>
  </div>
    </div><!--fin tab 4-->
    
     <!--inicio tab 5-->
    <!--  <div role="tabpanel" class="tab-pane" id="data">
    <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <div class="form-group">
           <label class="control-label col-xs-2">Temp.Min °C</label>
            <div class="col-xs-1">
             <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="°C"/>  
        	</div>                       
            <label class="control-label col-xs-2">Temp.Max °C</label>
            <div class="col-xs-1">
             <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="°C" data-validacion-tipo="requerido" />  
        	</div> 
         	<label class="control-label col-xs-2">Tipo Producto</label>
            <div class="col-xs-2">
              <select name="x" id="x" class="form-control input-sm">
              <option value="000">PESCADO</option>
              <option value="000">FRUTAS</option> 
              <option value="000">POLLO</option>               
              <option value="000">HELADOS</option>
              <option value="000">CARNE</option>
              <option value="000">HORTALIZAS</option>
                                            
           
        	</div> 
            
             
       </div>
      <div class="form-group">
         	<label class="control-label col-xs-2">Obs.</label>
            <div class="col-xs-4">
              <input type="text" name="c_cfabri" value="" class="form-control input-sm" placeholder="Observacion" data-validacion-tipo="requerido" /> 	
        	</div>   
        </div>
    </div>--><!--fin tab 5-->
    
    
    
  </div><!--fin tab-->


<script type="text/javascript">
$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>

  </form>
  </body>
  <!--require_once 'view/principal/footer.php';-->
