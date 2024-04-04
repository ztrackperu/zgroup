<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registro de Cotizaciones</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>




<script type="text/javascript">
$().ready(function() {
	$("#obs").autocomplete("../MVC_Controlador/cajaC.php?acc=variosauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#obs").result(function(event, data, formatted) {
		$("#area2").val(data[2]);
	});
	
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#razon").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#razon").result(function(event, data, formatted) {
		$("#hc").val(data[1]);
		$("#razon").val(data[2]);
		$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);
		$("#lugar").val(data[4]);
		
		$("#contacto").val(data[6]);
		$("#correo").val(data[7]);
		$("#telefono").val(data[5]);
		document.formElem.asunto.focus();
	});
	
});
</script>
<script type="text/javascript">	
//$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=at1&seguro="+seguro, {
$().ready(function() {
	//var sw=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text;
	var sw=document.formElem.vcombo.value;
//	var sw=document.getElementById("vcombo").value
//	var sw=document.getElementById("vcombo").value;
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=proautocoti", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
		$("#zzglosa").val(data[5]);
		$("#precio").val(data[3]);
		$("#glosa").val(data[6]);
		document.formElem.precio.focus();
	});
});			
</script>
<script language="javascript">
function copiarvalor(){
	//var sw=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text;
	
	//document.formElem.vcombo.value=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text;
	document.getElementById("vcombo").value=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].value;
	}

function validarcombos(){
	var m=document.formElem.moneda.options[document.formElem.moneda.selectedIndex].text;
	var t=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text;
	var v=document.formElem.vendedor.options[document.formElem.vendedor.selectedIndex].text;
if(m=='.::SELECCIONE::.'){alert('Seleccione Moneda')}
if(t=='.::SELECCIONE::.'){alert('Seleccione Tipo Cotizacion')}
if(v=='.::SELECCIONE::.'){alert('Seleccione Vendedor')}
	
	
	}


function validarclie(){
	
	var codigo=document.getElementById("hc").value;
			if (codigo=="") {
	alert('debe introducir codigo de cliente')
	document.getElementById("descripcion").value="";
	document.getElementById("codigo").value="";
	//document.getElementById("glosa").value="";
	document.getElementById("precio").value="";
	document.getElementById("dscto").value="0.00";
	document.getElementById("cantidad").value="1";
			}
	}
</script>
<script language="javascript">
sec = 1;
function agregarDiagnosticos(){
if(document.getElementById("codigo" + sec).value != "")
	{
		sec += 1;
		
		codigo = "codigo" + sec;
		
		descripcion = "descripcion" + sec;
		
		precio = "precio" + sec;
		
		cantidad = "cantidad" + sec;
		
		dscto = "dscto" + sec;
		
		imp = "imp" + sec;
		
		glosa="glosa" + sec;
		
		clase="clase" + sec;
		
		tabla = document.getElementById("tablaDiagnosticos");
		var tr = document.createElement("tr");
		tr.id = "fila" + sec;
	
tr.innerHTML = "<td >" + sec + " <input type='hidden' id='" + codigo + "' name='" + codigo + "' readonly size='10'/> </td>";

tr.innerHTML += "<td ><input name='" + descripcion + "' type='text'  id='" + descripcion + "' size='40' readonly='readonly' /><input name='" + glosa + "' type='text'  id='" + glosa + "' size='30' /><input name='" + clase + "' type='text'  id='" + clase + "' size='10' /></td>";

tr.innerHTML += "<td ><input name='" + precio + "' type='text'  id='" + precio + "' size='10' /></td>";

tr.innerHTML += "<td ><input name='" + dscto + "' type='text'  id='" + dscto + "' size='10' /> </td>";

tr.innerHTML += "<td><input name='" + cantidad + "' type='text' id='" + cantidad + "' size='10' onkeyup='actualizar_importe()'/> </td>";

tr.innerHTML += "<td ><input  value='0' name='" + imp + "' type='text' ' id='" + imp + "' size='10' />  </td>";
		tabla.appendChild(tr);
		}
	else
	{
		//alert("Falta Datos");
	}
 }
function escribirDiagnosticos()
{
		for(i=1; i<=sec; i++)
	{
		if(document.getElementById("codigo" + i).value == "")
		{
			
			clase=document.getElementById("clase" +i);
			clase.value=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].value;
			
			codigo=document.getElementById("codigo" +i);
			codigo.value=document.formElem.codigo.value;
			
			descripcion = document.getElementById("descripcion" + i);
			descripcion.value = document.formElem.descripcion.value;
			
			
			glosa = document.getElementById("glosa" + i);
			glosa.value = document.formElem.glosa.value;
			
			precio = document.getElementById("precio" + i);
		    precio.value=document.formElem.precio.value;
			
			dscto = document.getElementById("dscto" + i);
			dscto.value=document.formElem.dscto.value;
			
			cantidad = document.getElementById("cantidad" + i);
			cantidad.value=document.formElem.cantidad.value;
			
			imp = document.getElementById("imp"+ i);
			imp.value=document.formElem.imp.value;
		//	document.getElementById("contacto").value=sec;
			sumarcolumnatabla();
//imp2+=parseFloat(document.formElem.bi.value)+parseFloat(document.formElem.imp.value);	
imp2=parseFloat(document.formElem.xsum.value);

igv=parseFloat(document.formElem.igv.value)*imp2;
result=Math.round(igv*100)/100 
st=Math.round((imp2-igv)*100)/100
							i++;
						    actualizar_importe();
							document.formElem.st.value=imp2;
							//document.formElem.im.value=result; //igv
							document.formElem.bi.value=imp2
							;
				
		}
	}
		
}

function eliminarDiagnosticos(){
	if(sec > 1)
	{
		
	//	document.getElementById("tablaDiagnosticos").deleteRow(sec+1);
	document.getElementById("tablaDiagnosticos").deleteRow(sec);
	//tabla.deleteRow();
	sec = sec - 1;
	
		
			}
			
	else
	
	{
		
		
		document.getElementById("codigo1").value="";
		document.getElementById("descripcion1").value="";
		document.getElementById("precio1").value="";
		document.getElementById("glosa1").value="";
		document.getElementById("cantidad1").value="";
		document.getElementById("imp1").value="";
		document.getElementById("dscto").value="0.00";
		document.getElementById("st").value="0.00";
		document.getElementById("im").value="0.00";


		document.getElementById("bi").value="0.00";
		alert("No hay filas para eliminar");
	}
	

}


function accion(){
/*	for(i=1; i<=sec; i++)
	{
		if(document.getElementById("codigo").value !=document.getElementById("codigo" + i).value )
		{*/
		var tipo=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].text;
		var pre=document.getElementById("precio").value;
		var cant=document.getElementById("cantidad").value;
		var codi=document.getElementById("codigo").value;
		
if(tipo=='.::SELECCIONE::.' || pre=="" || cant=="" || codi=="" ){
		alert('Ingrese Tipo Cotizacion / y/o precio o cantidad, codigo producto');
		return 0;
}

if(pre=='0.0'){
alert('Ingrese precio')
return 0;
	}
		
var tip=document.getElementById("tt").value;
var glo=document.getElementById("zzglosa").value;
var cod=document.getElementById("codigo").value;
var porcion = cod.substring(0,4);
var cad = cod.substring(0,5);
/*if(tip=='001' && glo=='003'){
	
	alert('Concepto es Servcio no Venta de Producto Cambie'); || cod=='NDND0000' || cod=='CNDND0019' 
	return 0;
	}*/
	
//validar transporte
//alert(porcion)
/////////////////

/*if(tip=='002' && porcion=='NDND' || porcion=='RNDN'){
	alert('no puede facturar repuestos como Flete');
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.formElem.descripcion.focus();
	return 0;
	}

if(tip=='015' && porcion=='NDND' || porcion=='RNDN'){
	alert('no puede facturar repuestos como Mantenimiento');
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.formElem.descripcion.focus();
	return 0;
	}

if(tip=='017' && porcion=='NDND' || porcion=='RNDN'){
	alert('no puede facturar repuestos como Alquiler');
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.formElem.descripcion.focus();
	return 0;
	}
if(tip=='019' && porcion=='NDND' || porcion=='RNDN'){
	alert('no puede facturar repuestos como Otros Servicios');
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.formElem.descripcion.focus();
	return 0; RNDND
	}*/

/*if(glo=='003' && tip=='001'){
		alert('no puede facturar un servicio como producto');
			document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		
		//document.getElementById("glosa").value=""; INDND
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.formElem.descripcion.focus();
	return 0;
}*/


if(cad=='INDND' && tip=='019'){
	
	alert('no puede facturar repuestos como Vta Otros Servicios');
	return 0;
	}

if(cad=='INDND' && tip=='015'){
	
	alert('no puede facturar repuestos como Serv. Mantenimiento');
	return 0;
	}

if(cad=='INDND' && tip=='002'){
	
	alert('no puede facturar repuestos Serv. Flete');
	return 0;
	}

if(cad=='INDND' && tip=='017'){
	
	alert('no puede facturar repuestos Serv. Alquiler');
	return 0;
	}
	
	
if(cad=='RNDND' && tip=='019'){
	
	alert('no puede facturar repuestos como Vta Otros Servicios');
	return 0;
	}

if(cad=='RNDND' && tip=='015'){
	
	alert('no puede facturar repuestos como Serv. Mantenimiento');
	return 0;
	}

if(cad=='RNDND' && tip=='002'){
	
	alert('no puede facturar repuestos Serv. Flete');
	return 0;
	}

if(cad=='RNDND' && tip=='017'){
	
	alert('no puede facturar repuestos Serv. Alquiler');
	return 0;
	}


	
	

if(cod=='XNDND0102' && tip!='002'){
	
	alert('Cambie a Concepto VENTA DE SERVICIOS FLETE');
	return 0;
	}

if(cod=='NDND0000' && tip!='002'){
	
	alert('Cambie a Concepto VENTA DE SERVICIOS FLETE');
	return 0;
	}
if(cod=='CNDND0019' && tip!='002'){
	
	alert('Cambie a Concepto VENTA DE SERVICIOS FLETE');
	return 0;
	}
//validar manipuleo

if(cod=='NDND0006' && tip!='019'){
	
	alert('Cambie a Concepto VENTA OTROS SERVICIOS');
	return 0;
	}

var glosa=document.getElementById("glosa").value;
if(glosa=='' && tip=='002'){
	
	//alert('Cambie a Concepto VENTA OTROS SERVICIOS');
	alert('Ingrese en glosa RUTA y equipos a transportar y  \n(dry,reefer..etc)');
	document.formElem.glosa.focus();
	return 0;
	
	}
//validar producto size="5"


//if(glo!='001' &&  tip=='001'){
//	
//	//alert('Cambie a Concepto VENTA PRODUCTOS');
//	alert('CONCEPTO CORRECTO ES SERVICIO DE ALQUILER');
//		document.getElementById("codigo").value="";
//		document.getElementById("descripcion").value="";
//		
//		//document.getElementById("glosa").value="";
//		document.getElementById("precio").value="";
//		document.getElementById("cantidad").value="1";
//		document.formElem.descripcion.focus();
//	return 0;
//	}
/*if(glo=='003' &&  tip=='002' && cod!='XNDND0102'){
	
	alert('Cambie a Otro Concepto ');
	return 0;
	}

if(glo=='003' &&  tip=='002' && cod!='NDND0000'){
	
	alert('Cambie a Otro Concepto ');
	return 0;
	}

if(glo=='003' &&  tip=='002' && cod!='CNDND0019'){
	
	alert('Cambie a Otro Concepto ');
	return 0;
	}*/


		addRowToTable();
		sumarcolumnatabla();
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("glosa").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.getElementById("imp").value="";
		document.getElementById("dscto").value="0.00";
		document.formElem.descripcion.focus();
	}
	
function actualizar_importe(obj){

var cant=obj;
var precio;
var dscto;
var pre1 = cant.substring(8,10);
var dscto= cant.substring(8,10);
var canti= cant.substring(8,10);
var im=cant.substring(8,10);
var	valor=(parseFloat(document.getElementById("precio"+pre1).value)-
		parseFloat(document.getElementById("dscto"+dscto).value))*parseFloat(document.getElementById("cantidad"+canti).value) ;	

document.getElementById("imp"+im).value=valor;

}	


<!--
function calculartotales(){
sumar=0;
for(var i=1; i<=50; i++)
{
if(!document.getElementById("imp"+i)){
}else{
sumar+=parseFloat(document.getElementById("imp"+i).value);	
//alert("exite");
}
}
document.getElementById("bi").value=sumar;
document.getElementById("st").value=sumar;
}
//-->

function sumarcolumnatabla(){
sumar=0;
calculo=0;
var inicio=document.getElementById("bi").value;

var tot=parseFloat(document.getElementById("precio").value)*parseFloat(document.getElementById("cantidad").value)-
		parseFloat(document.getElementById("dscto").value);	
		
var total=tot+parseFloat(inicio);

	document.getElementById("bi").value=total;
	document.getElementById("st").value=total;

}
function rutas(){
		miPopup = window.open("../MVC_Controlador/cajaC.php?acc=c03","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
	
	}
function limpiar(){
	
	//escribirDiagnostico();
	document.getElementById("descripcion").value="";
	//	document.getElementById("glosa").value="";
	document.getElementById("codigo").value="";
	document.getElementById("precio").value="";
	document.getElementById("dscto").value="0.00";
	document.getElementById("cantidad").value="1";
	document.getElementById("imp").value="";
	document.getElementById("descripcion").focus();
	}
  function eliminarUsuario(obj){

  var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }


function sumar1(){
sumar=0;

	for(var i=1; i<=20; i++)
	{
		
	sumar+=parseFloat(document.getElementById("precio"+i).value)*parseFloat(document.getElementById("cantidad"+i).value);	
	
		//sumar+=parseFloat(document.getElementById("imp"+i).value);
		
		//2501414
		//alert(posicionCampo);	
alert(sumar);
//break;
	}

	document.getElementById("xsum").value=sumar;
	document.getElementById("bi").value=sumar;
		}
function llenarcombo(){
	
	var codigo=document.getElementById("hc").value;
			if (codigo=="") {
				alert ("Debe introducir el codigo del cliente");
			} else {
	document.getElementById("descripcion").value=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].text+' '+document.formElem.rutas.options[document.formElem.rutas.selectedIndex].text;
	document.getElementById("precio").value=document.formElem.rutas.options[document.formElem.rutas.selectedIndex].value;
	document.getElementById("codigo").value=document.formElem.rutas.options[document.formElem.rutas.selectedIndex].text;
	
			}
	
	}
function llenardescrip(){
	
	var codigo=document.getElementById("hc").value;
			if (codigo=="") {
				alert ("Debe introducir el codigo del cliente");
			} else {
	document.formElem.area2.value =document.formElem.variodescrip.options[document.formElem.variodescrip.selectedIndex].value;
/*alert(document.formElem.variodescrip.options[document.formElem.variodescrip.selectedIndex].value);*/
cambiotitulo();
	
			}
	
	}
function llenardescrip2(){
	
	var codigo=document.getElementById("hc").value;
			if (codigo=="") {
				alert ("Debe introducir el codigo del cliente");
			} else {
	document.formElem.area3.value =document.formElem.tipoobs.options[document.formElem.tipoobs.selectedIndex].value;
/*alert(document.formElem.variodescrip.options[document.formElem.variodescrip.selectedIndex].value);*/
	
			}
	
	}

</script>


                    
<script language="JavaScript"> 

function abreVentana(){
	var codigo=document.getElementById("fecha").value;
			if (codigo=="") {
				alert ("Debe introducir Fecha");
			} else {
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=vercli&udni=<?php echo $udni;?>","miwin",
			"width=700,height=380,toolbar=no,status=yes,scrollbars=yes, Location=no"); return false;
			miPopup.focus();
			}
		}
function ventanaArticulos(){
			var codigo=document.getElementById("hc").value;
			if (codigo=="") {
				alert ("Debe introducir el codigo del cliente");
			} else {
				miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verarti&udni=<?php echo $udni;?>","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}
function ventanaglosa(){
			var codigo=document.getElementById("precio").value;
			if (codigo=="") {
				alert ("Debe introducir el precio");
			} else {
				var items=document.getElementById("descripcion").value;
				miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verglosa&item="+items+"&udni=<?php echo $udni;?>","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
		}	
}
function actualizacant(){
var cant=document.getElementById('cantidad').value;
var precio=document.getElementById('precio').value;
var dscto=document.getElementById('dscto').value;
tot1=cant*precio;
tot2=tot1-dscto;
document.getElementById('imp').value=tot2;
	}
function limpiarfom(formElem) {
	frm = document.getElementById("formElem");
	if (!frm) return;
	for(i=0; i<frm.elements.length; i++){
		if (frm.elements[i].type == 'text')
			frm.elements[i].value = '';
	}
	document.getElementById("textfield").focus();
}

function datos(val1){
    document.getElementById('glosa').value = val1;

}
function tiporubro(){
	var cod=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].text;
	if(cod=='ALQUILER'){
		
		/*document.getElementById('rutas').style.display='block';
		fecalquiler document.getElementById('image').style.display='block';*/
			document.getElementById('fecalquiler').style.display='block';		
			document.getElementById('ta').style.display='block';
		document.getElementById('Image3').style.display='block';	
		}else{
		//document.getElementById('rutas').style.display='none'
//		document.getElementById('image').style.display='none'
	document.getElementById('ta').style.display='none'
	document.getElementById('fecalquiler').style.display='none';
		document.getElementById('Image3').style.display='none'
		}
		if(cod=='TRANSPORTE'){
		
		document.getElementById('rutas').style.display='block';
		document.getElementById('image').style.display='block';
		
		}else{
		document.getElementById('rutas').style.display='none'
		document.getElementById('image').style.display='none'

		}
	
	
	}
function tipoalquiler(){
	var cod=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].text;
	if(cod=='TRANSPORTE'){
	document.getElementById('rutas').style.display='block';
	document.getElementById('image').style.display='block';		
	}else{
	document.getElementById('rutas').style.display='none'
	document.getElementById('image').style.display='none'
		}
	}
function tipomoneda(){
	var mon=document.formElem.moneda.options[document.formElem.moneda.selectedIndex].text;
	if(mon=='NUEVOS SOLES'){
		
		//document.getElementById('prueba').value='';
		document.getElementById('nomtipo').style.display='block';
		document.getElementById('prueba').style.display='block';
		
		}else{
		document.getElementById('nomtipo').style.display='none';
		document.getElementById('prueba').style.display='none'
		document.getElementById('prueba').value='1';
		
		}
	}
function cargaload(){
	tiporubro();tipomoneda()
	}
function aplicacambiosolesadolares(){

 p=parseFloat(document.getElementById('precio').value);
 d=parseFloat(document.getElementById('dscto').value);
 i=parseFloat(document.getElementById('imp').value);
 tc=parseFloat(document.getElementById('prueba').value);
	dp=(p/tc);
	dp1=Math.round(dp*100)/100;
	//Math.round(dp*100)/100
	dd=(d/tc);
	if(dd=='0'){
	dd1=Math.round(dd*100)/100;
	}else{dd1='0.00'}
	di=(i/tc);
    di1=Math.round(di*100)/100;
	
	document.getElementById('precio').value=dp1;
	document.getElementById('dscto').value=dd1;
	document.getElementById('imp').value=di1;
}
	
	//}

function aplicacambiodolaresasoles(){
//if(document.getElementById("aplicartipo").checked==true){;	
	//if(document.getElementById("aplicartipo")){}else{}
 p=parseFloat(document.getElementById('precio').value);
 d=parseFloat(document.getElementById('dscto').value);
 i=parseFloat(document.getElementById('imp').value);
 tc=parseFloat(document.getElementById('prueba').value);
	dp=(p*tc);
	dp1=Math.round(dp*100)/100;
	//Math.round(dp*100)/100
	dd=(d*tc);
	if(dd=='0'){
	dd1=Math.round(dd*100)/100;
	}else{dd1='0.00'}
	di=(i*tc);
    di1=Math.round(di*100)/100;
	
	document.getElementById('precio').value=dp1;
	document.getElementById('dscto').value=dd1;
	document.getElementById('imp').value=di1;
}
	
	//}

</script>
<script language="JavaScript">

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
</script>
<script language="JavaScript">

function muestra_oculta2(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
</script>
<script language="javascript">
function grabaform(){
	var theTable = document.getElementById('tblSample');
cantFilas = theTable.rows.length;
	
	if(document.getElementById('razon').value==""){
		
		alert ('Falta Datos del Cliente');
		document.formElem.razon.focus() 
		return 0;
		}
	if(document.getElementById('asunto').value==""){
		
		alert ('Falta Asunto');
		document.formElem.asunto.focus() 
		return 0;
		}
		if(cantFilas==1){
		
		alert ('Falta Detalle de Cotizacion');
		document.formElem.descripcion.focus() 
		return 0;
		}
	/*if(document.getElementById('descripcion1').value==""){
		
		alert ('Falta Detalle de Cotizacion');
		document.formElem.descripcion.focus() 
		return 0;
		}*/
	 if(confirm("Seguro de Grabar Cotizacion ?")){
	//document.getElementById.formElem.submit();
	document.getElementById("formElem").submit();
	 }
	
	}
function grabaformprueba(){
	
	/*document.getElementById('iglosa1').contentWindow.graba1();
	document.getElementById('iglosa2').contentWindow.graba2();  */
	//parent.iglosa1.graba1();
	//window.iglosa1.graba1();
	//window.iglosa2.graba2()
	if(confirm("Seguro de Grabar Cotizacion ?")){
	//document.getElementById.formElem.submit();
	document.getElementById("formElem").submit();
	 }
	}
function graba1(){
document.getElementById("fo3").submit();
	
	}
function validacombos(){
	
	
	var mon=document.formElem.moneda.options[document.formElem.moneda.selectedIndex].text
	var tip=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text
	var ven=document.formElem.vendedor.options[document.formElem.vendedor.selectedIndex].text
	/*var mon=document.getElementById("moneda").value;
	var tip=document.getElementById("tipo").value;
	var ven=document.getElementById("vendedor").value;*/
if(mon=='.::SELECCIONE::.' || tip=='.::SELECCIONE::.' || ven=='.::SELECCIONE::.' ){
	alert("complete datos Moneda , Tipo ó Vendedor ");
	}

	}


function combochanger(){

	var cod=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].value;
	//document.getElementById.formElem.tt.value=cod;
	document.getElementById('tt').value=cod

	}
</script>
<script type="text/javascript">
$().ready(function() {
	$("#asunto").autocomplete("../MVC_Controlador/cajaC.php?acc=cliasunto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#asunto").result(function(event, data, formatted) {
		$("#asunto").val(data[0]);
		//$("#asunto").val(data[1]);		
	});	
});
</script>



</head>
<style>
.textos {
	background-color:transparent;
	border:none;}
.boton{
        font-size:10px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#638cb5;
        border:0px;
        width:80px;
        height:19px;
       
}
</style>
<script type="text/javascript">
// tabledeleterow.js version 1.2 2006-02-21
// mredkj.com
// CONFIG notes. Below are some comments that point to where this script can be customized.
// Note: Make sure to include a <tbody></tbody> in your table's HTML
var INPUT_NAME_PREFIX = 'codigo'; // this is being set via script a
var INPUT_NAME_DES = 'descripcion'; // this is being set via script b
var INPUT_NAME_GLO = 'glosa'; // this is being set via script g
var INPUT_NAME_CLA = 'clase'; // this is being set via script h
var INPUT_NAME_PRE = 'precio'; // this is being set via script c
var INPUT_NAME_DSC = 'dscto'; // this is being set via script d
var INPUT_NAME_CAN = 'cantidad'; // this is being set via script e
var INPUT_NAME_IMP = 'imp'; // this is being set via script f
//var RADIO_NAME = 'totallyrad'; // this is being set via script
var TABLE_NAME = 'tblSample'; // this should be named in the HTML
var ROW_BASE = 1; // first number (for display)
var hasLoaded = false;
window.onload=fillInRows;
function fillInRows()
{
	hasLoaded = true;	
}
// CONFIG:
// myRowObject is an object for storing information about the table rows
function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho,nueve)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	this.siete=siete;
	this.ocho=ocho;
	this.nueve=nueve;
	//this.three = three; // input checkbox object
	//this.four = four; // input radio object
}
/*
 * insertRowToTable
 * Insert and reorder
 */
function insertRowToTable()
{
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME);
		var rowToInsertAt = tbl.tBodies[0].rows.length;
		for (var i=0; i<tbl.tBodies[0].rows.length; i++) {
			if (tbl.tBodies[0].rows[i].myRow) {
				rowToInsertAt = i;
				break;
			}
		}
		addRowToTable(rowToInsertAt);
reorderRows(tbl, rowToInsertAt);
	}
}

/*
 * addRowToTable
 * Inserts at row 'num', or appends to the end if no arguments are passed in. Don't pass in empty strings.
 */
function addRowToTable(num)
{
	//alert('hola');
	var codigo=document.getElementById("codigo").value
	var des=document.getElementById("descripcion").value
	var glo=document.getElementById("glosa").value
	var cla=document.getElementById("tt").value
	var pre=document.getElementById("precio").value
	var dsc=document.getElementById("dscto").value
	var can=document.getElementById("cantidad").value

	
	
	var	valor=parseFloat(pre)-parseFloat(dsc);	
	var valor2=parseFloat(valor)*parseFloat(can);	


//document.getElementById("imp"+i).value=valor.toFixed(2);
	
	
	
	var imp=valor2;
	
	
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME);
		var nextRow = tbl.tBodies[0].rows.length;
		var iteration = nextRow + ROW_BASE;
		if (num == null) { 
			num = nextRow;
		} else {
			iteration = num + ROW_BASE;
		}
		
		// add the row
		var row = tbl.tBodies[0].insertRow(num);
		
		// CONFIG: requires classes named classy0 and classy1
		row.className = 'classy' + (iteration % 2);
	
		// CONFIG: This whole section can be configured
		
		// cell 0 - text
		var cell0 = row.insertCell(0);
		var textNode = document.createTextNode(iteration);
		cell0.appendChild(textNode);
		
		// cell 1 - input text
		var cell1 = row.insertCell(1);
		var txtInpa = document.createElement('input');
		txtInpa.setAttribute('type', 'text');
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('size', '5');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
			var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '40');
	txtInpb.setAttribute('value', des); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
	txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
	txtInpb.setAttribute('class', 'texto'); 
	
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO + iteration);
		txtInpc.setAttribute('size', '40');
	txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	txtInpc.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		
		
			var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('size', '5');
		txtInpd.setAttribute('value', cla); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'texto'); 
		txtInpd.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpd);
		
		
			var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('size', '5');
		txtInpe.setAttribute('value', pre); // iteration included for debug purposes
		txtInpe.setAttribute('class', 'texto');
		//txtInpe.setAttribute('readonly', 'readonly'); 
		cell5.appendChild(txtInpe);
		
		var cell6 = row.insertCell(6);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_DSC + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_DSC + iteration);
		txtInpf.setAttribute('size', '5');
		txtInpf.setAttribute('value', dsc); // iteration included for debug purposes
		txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell6.appendChild(txtInpf);
		
		
			var cell7 = row.insertCell(7);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'text');
		txtInpg.setAttribute('name', INPUT_NAME_CAN + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_CAN + iteration);
		txtInpg.setAttribute('size', '5');
		txtInpg.setAttribute('value', can); // iteration included for debug purposes onkeyup='actualizar_importe(this.name);'
		
		txtInpg.setAttribute('class', 'texto'); 
		txtInpg.setAttribute('onkeyup','actualizar_importe(this.name)');
		//txtInpg.setAttribute('onkeyup','actualizar_importe()');
		cell7.appendChild(txtInpg);
		
		
		var cell8 = row.insertCell(8);
		var txtInph = document.createElement('input');
		txtInph.setAttribute('type', 'text');
		txtInph.setAttribute('name', INPUT_NAME_IMP + iteration);
		txtInph.setAttribute('id', INPUT_NAME_IMP + iteration);
		txtInph.setAttribute('size', '5');
	txtInph.setAttribute('value', imp); // iteration included for debug purposes
	txtInph.setAttribute('class', 'texto'); 
	txtInph.setAttribute('readonly', 'readonly');
		cell8.appendChild(txtInph);
		
		
		// cell 2 - input button
		var cell9 = row.insertCell(9);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell9.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpf,txtInpg,txtInph);
	}
}


// If there isn't an element with an onclick event in your row, then this function can't be used.
function deleteCurrentRow(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		deleteRows(rowArray);
		reorderRows(tbl, rIndex);
	  calculartotales();
	}
}

function reorderRows(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.one.data = count; // text
				
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES + count;
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_GLO + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_CLA + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_PRE + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_DSC + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_CAN + count;
				tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_IMP + count;
				
				
			
				
				// CONFIG: next line is affected by myRowObject settings
				var tempVal = tbl.tBodies[0].rows[i].myRow.two.value.split(' '); 
				/*tbl.tBodies[0].rows[i].myRow.two.value = count + ' was' + tempVal[0]; // for debug purposes
				tbl.tBodies[0].rows[i].myRow.tres.value = count + ' was' + tempVal[0];
				tbl.tBodies[0].rows[i].myRow.cuatro.value = count + ' was' + tempVal[0]; // for debug purposes
				tbl.tBodies[0].rows[i].myRow.cinco.value = count + ' was' + tempVal[0];
				tbl.tBodies[0].rows[i].myRow.seis.value = count + ' was' + tempVal[0]; // for debug purposes
				tbl.tBodies[0].rows[i].myRow.siete.value = count + ' was' + tempVal[0];
				tbl.tBodies[0].rows[i].myRow.ocho.value = count + ' was' + tempVal[0]; // for debug purposes
				tbl.tBodies[0].rows[i].myRow.nueve.value = count + ' was' + tempVal[0];
				*/
				// for debug purposes
				//tbl.tBodies[0].rows[i].myRow.two.value = count + ' was' + tempVal[0]; // for debug purposes
				
				// CONFIG: next line is affected by myRowObject settings
				//tbl.tBodies[0].rows[i].myRow.four.value = count; // input radio
				
				// CONFIG: requires class named classy0 and classy1
				tbl.tBodies[0].rows[i].className = 'classy' + (count % 2);
				
				count++;
				
			}
		}
	}
}

function deleteRows(rowObjArray)
{
	if (hasLoaded) {
		for (var i=0; i<rowObjArray.length; i++) {
			var rIndex = rowObjArray[i].sectionRowIndex;
			rowObjArray[i].parentNode.deleteRow(rIndex);
		}
	}
}

function openInNewWindow(frm)
{
	// open a blank window
	var aWindow = window.open('', 'TableAddRow2NewWindow',
	'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
	
	// set the target to the blank window
	frm.target = 'TableAddRow2NewWindow';
	
	// submit
	frm.submit();
}
function prodform(){
	alert('Habilitado ok');
	}
</script>
<script type="text/javascript">
//window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "Ha intentado salir de esta pagina. Si ha realizado algun cambio en los campos sin hacer clic en el boton Guardar, los cambios se perderan. Seguro que desea salir de esta pagina? ";
  }
 function cambiotitulo(){
		var cod=document.formElem.variodescrip.options[document.formElem.variodescrip.selectedIndex].text;
		var porcion = cod.substring(0,3);
		document.formElem.codtitulo.value=porcion;
	}
function cerrar() {

div = document.getElementById('contenido_a_mostrar');
div2=document.getElementById('contenido_a_mostrar2');
div.style.display='none';
div2.style.display='none';
document.getElementById("area2").disabled='disabled';
document.getElementById("area3").disabled='disabled';

}



function ultimasoc(){
			var codigo=document.getElementById("codigo").value;
			var tipo=document.getElementById("tt").value;
			if (codigo=="") {
				jAlert ("debe introducir un producto", 'Mensaje del Sistema');
			} else {
				miPopup = window.open("../MVC_Controlador/cajaC.php?acc=ver_ultimascoti&udni=<?php echo $udni;?>&cod="+codigo+"&tip="+tipo,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}
</script>
<style type="text/css">
<!--
#tblSample td, th { padding: 0.2em; }
.classy0 { background-color: #234567; color: #89abcd; }
.classy1 { background-color: #89abcd; color: #234567; }
-->
</style>
<body>

<strong align="center">COTIZACIONES // VENDEDOR=&gt;<?php echo $_GET['udni'];  ?></strong>
<form action="../MVC_Controlador/cajaC.php?acc=guardacoti"  method="post" enctype="multipart/form-data" name="formElem" id="formElem">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="986" height="144" border="0">

    <tr>
      <td height="26" bgcolor="#CCCCCC">Nro de Dcto</td>
      <td width="144" bgcolor="#CCCCCC"><label for="doc"></label>
        <input name="doc" type="text" class="texto"  disabled="disabled" id="doc" value="AUTOGENERADO" /></td>
      <td width="54" bgcolor="#CCCCCC">Moneda</td>
      <td width="190" bgcolor="#CCCCCC"><?php $ven = ListaMonedaC();?>
          <select name="moneda" id="moneda" class="Combos texto">
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
      <td width="42" bgcolor="#CCCCCC">Estado</td>
      <td colspan="3" bgcolor="#CCCCCC">Fecha
        <label for="fecha"></label>
        <input name="fecha"  type="text" class="texto"  id="fecha" size="12" maxlength="12" value="<?php echo date('d/n/Y');?>" /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script>
        
          <input type="hidden" name="xsum" id="xsum" />
          <input name="hora" type="hidden" id="hora" size="8" />
        <input name="xsumar" type="hidden" id="xsumar" size="10" />
        <label for="estado"></label>
        <select name="estado" id="estado" class="Combos texto">
<option value="1">Generado</option>
<option value="0">-</option>
        </select></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#CCCCCC">Vendedor</td>
      <td bgcolor="#CCCCCC"><label for="vendedor"></label>
	  <?php $ven = ListaVendedorC();?>
        <select name="vendedor" id="vendedor" class="Combos texto" >
                   
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["tv_codi"]?>"><?php echo $item["tv_nomb"]?></option>
          <?php }	?>
        </select></td>
      <td bgcolor="#CCCCCC">Tipo</td>
      <td bgcolor="#CCCCCC"><label for="tipo"></label><?php $ven = ListaTipoC();?>
        <select name="tipo" id="tipo" class="Combos texto" onchange="copiarvalor()" >
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
          <?php }?>
        </select>&nbsp;
        <label for="textfield4"></label>
        <input type="hidden" name="vcombo" id="vcombo" /></td>
      <td bgcolor="#CCCCCC">IGV</td>
      <td width="76" bgcolor="#CCCCCC"><input name="codvendedor" type="hidden" id="codvendedor" value="<?php echo $_GET['udni']; ?>" readonly="readonly"  />
        
        
        <input name="igv" type="text" disabled="disabled" id="igv" value="0.18" size="5" maxlength="5" readonly="readonly" />
        % </td>
      <td width="145" bgcolor="#CCCCCC">Asigne Contacto Via</td>
      <td width="196" bgcolor="#CCCCCC">
      <?php $ven = listaderivacionxusuarioM($_GET['udni']);?>
      <select name="cmbcontacto" id="cmbcontacto" class="Combos texto">
      <option value="1">[Telefono]</option>
      <?php foreach($ven as $item){?>
          <option value="<?php echo $item["Id"]?>"><?php echo 'Web=>'.$item["Id"].' '.$item["c_empresa"]?>
          </option>
          <?php }?>
         <!-- <option value="0">[Otros Especificar]</option>-->
          </select></td>

      </tr>
    <tr>
      <td width="105" height="24" bgcolor="#CCCCCC"><strong>Razon Social</strong></td>
      <td colspan="7" bgcolor="#CCCCCC"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
        
        <input name="razon" type="text" id="razon" value="" size="35"  class="texto" onfocus="validacombos()"/>
        <a href="#"> 
        <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/></a>Ruc
        <input name="rucdni" class="texto" type="text" id="rucdni" size="12" maxlength="12" />         
        Codigo        
        <input name="hc" type="text" id="hc" size="15" class="texto"/>
        Direccion
        <input name="direc" type="text" id="direc" size="35" class="texto" /></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#999966">Asunto</td>
      <td colspan="7" bgcolor="#999966">
      	<input name="asunto" type="text" class="texto" id="asunto" size="40" />
        Contacto
        <input name="contacto" type="text" class="texto" id="contacto" size="15" />
        Correo
        <input name="correo" type="text" class="texto" id="correo" size="15"/>
        Telefono
        <input name="telefono" type="text" class="texto" id="telefono" size="8" />
        Nextel
        <input name="nextel" type="text" class="texto" id="nextel" size="9" />
     </td>
    </tr>
    <tr>
      <td height="26" colspan="8" bgcolor="#FF0000" style="color:#0F0">NOTA:EN LA GLOSA NO SE ACEPTA CARACTER APOSTOFE ( ´ ) Ejm: 40' y/o 40´</td>
    </tr>
    <tr>
      <td height="26" colspan="8" bgcolor="#FFFFFF">
        <a style='cursor: pointer;' onClick="muestra_oculta('contenido_a_mostrar')" title="">GLOSA CONTRAER<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>
  <div id="contenido_a_mostrar">
  <table bgcolor="#CCCCCC">
    <td height="26" bgcolor="#FFFFFF">Descripcion General</td>
      <td colspan="2" bgcolor="#FFFFFF"> <?php $ven = ListaCotiVariosCoti2C();?>
        <select name="variodescrip" id="variodescrip" onchange="llenardescrip()" class="Combos texto">  <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $descrip=utf8_encode(strip_tags($item["descripcion"]))?>">
		  <?php echo utf8_encode($item["id"].' '.$item["titulo"])?></option>
          <?php }	?>
          </select><input type="hidden" name="codtitulo" id="codtitulo" size="5" /></td>
      </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF">
        
        <textarea name="area2" id="area2" cols="100" rows="15"></textarea></td>
      
      <!--   </form>-->
      </tr>
    </table></td>
    </tr>
    </table>
  </fieldset>
<!-- -->
<fieldset class="fieldset legend">
   
    <legend style="color:#03C"><strong>Detalle (001=Venta Prod || 017=Serv. Alquiler || 015=Serv. Mantenimiento|| 002=Serv. Flete || 019 Venta Serv. Otro)</strong></legend>
    <table  width="1060" border="0">
      <tr>
        <td width="1054" height="31" colspan="6" bgcolor="#CCCCCC"><table width="1045" border="0">
            <tr>
              <td width="35">Tipo</td>
              <td width="218" height="26"><?php $ven = ListaTipoC();?>
                <select name="tipo2" id="tipo2"  class="Combos texto" onchange="combochanger();" >
                           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
            <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_numitm"].'-'.$item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;<input name="tt" type="text" id="tt" size="5" readonly="readonly" /></td>
              <td width="194"><?php $ruta = RutasListaC();?>
                <?php /*?><select name="rutas" id="rutas" onchange="llenarcombo();" class="Combos texto">
               <option value="0">.::SELECCIONE::.</option>
                 <?php foreach($ruta as $item){?>
            <option value="<?php echo $item["r_precio"]?>"><?php echo $item["r_origen"].'-'.$item["r_destino"]?></option>
            <?php }	?>
              </select><?php */?>
                <?php /*?><select name="tiporuta" id="tiporuta"  class="Combos texto">
          <?php $trut= ListaTipoRutaC();?>
     <?php foreach($trut as $item){ ?>
      <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
      <?php }	?>
      </select><?php */?>                <input name="ta" type="hidden" class="textos" id="ta" value="Termino Alquiler" size="18" />               <input name="fecalquiler" type="hidden" id="fecalquiler" size="12" /> <!--<img src="../images/calendario.jpg" name="Image3" id="Image3" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">-->
              <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecalquiler",
					ifFormat   : "%d/%m/%Y",
					button     : "Image3"
					  }
					);

		 </script>&nbsp;
<input type="checkbox" name="gencrono" id="gencrono" onclick="prodform()" />
		 </td>
              <td width="151"><input name="nomtipo" class="textos" type="text" id="nomtipo" value="Tipo Cambio" size="14" readonly="readonly" />   
              <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			?></td>
              <td width="132">
                
  <label for="prueba"></label>
  <input type="text" name="prueba" class="texto" size="10" id="prueba" value="<?php echo $tipocambio  ?>"/>
  <label for="aplicartipo"></label></td>
              <td width="289"><!--<input type="radio" name="radio" id="tsoles" value="tsoles" onclick="aplicacambiosolesadolares();" />                <input type="radio" name="radio" id="tipodolares" value="tipodolares" onclick="aplicacambiodolaresasoles();" />-->
              <a href="#" onclick="ultimasoc()">Ver ultimos Prod Vendidos</a></td>
            </tr>
        </table></td>
      </tr>
      <tr>
    <td height="24" colspan="6" bgcolor="#CCCCCC">
          
          Conceptos
<input name="descripcion" type="text" id="descripcion" size="35" class="texto"  onchange="validarclie();"/>
      <a href="#"> <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>Cod
      <input name="codigo" type="text"  id="codigo" size="15" readonly="readonly" class="texto" />
      Glosa
      <input name="glosa" type="text" id="glosa" size="25" class="texto"/>
<label></label>
      Precio <!--   -->
      <input name="precio" type="text" id="precio" size="7"  class="texto" onkeyup="<?php number_format(this,2)?>" onchange="oNumero(this)" />
      <label for="textfield3"></label>
   
      Dscto
 		
      <input name="dscto" type="text" class="texto" id="dscto" value="0.00" size="7"/>
      Cantidad
      <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="5" />
      
      <input type="hidden" name="zzglosa" id="zzglosa" size="5"/>
      <label for="checkbox"></label>
      <input name="imp" type="hidden" id="imp" size="10"  class="texto"/>
      <input type="hidden" name="impo" id="impo" />
      <input type="hidden" name="codigofamilia" id="codigofamilia" />
      <input type="hidden" name="descuentox" id="descuentox" />      
     <a href="#" onclick="accion()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a>
    </td>
    </tr>
      <tr>
        <td colspan="6" >
        
        </td>
      </tr>
    </table>
    
<table width="1038" border="0" cellspacing="0" id="tblSample">
  <thead>
    <tr>
      <th width="26"  bgcolor="#66CCCC">#</th>
      <th width="98" bgcolor="#66CCCC">codigo</th>
      <th width="172" bgcolor="#66CCCC">Descripcion</th>
      <th width="316" bgcolor="#66CCCC">Glosa</th>
      <th width="60" bgcolor="#66CCCC">Clase</th>
      <th width="74" bgcolor="#66CCCC">Precio</th>
      <th width="51" bgcolor="#66CCCC">Dscto</th>
      <th width="64" bgcolor="#66CCCC">Cantidad</th>
      <th width="75" bgcolor="#66CCCC">Importe</th>
      <th width="82" bgcolor="#66CCCC">Delete</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<!--<table width="1020" border="0" id="tablaDiagnosticos" >
          <tr>
            <td width="29"  bgcolor="#66CCCC"><strong>#</strong></td>
            <td width="561" bgcolor="#66CCCC"><strong>Descripcion</strong></td>
            <td width="91"  bgcolor="#66CCCC"><strong>Precio</strong></td>
            <td width="110" bgcolor="#66CCCC"><strong>Dscto</strong></td>
            <td width="95"  bgcolor="#66CCCC"><strong>Cantidad</strong></td>
            <td width="108" bgcolor="#66CCCC"><strong>Importe</strong></td>
            </tr>
          <tr>
            <td >1<input name="codigo1" type="hidden" id="codigo1" size="10" /></td>
            <td >
              <input name="descripcion1" type="text" id="descripcion1" size="40" readonly="readonly" />
              <input name="glosa1" type="text" id="glosa1" value="" size="30" />
            
              <input type="text" name="clase1" id="clase1" size="5" /></td>
            <td >
              <input name="precio1" type="text" id="precio1" size="12" /></td>
            <td >
              <input name="dscto1" type="text" id="dscto1" size="12" /></td>
            <td >
              <input name="cantidad1" type="text" id="cantidad1" size="12" onkeyup="actualizar_importe()"/></td>
            <td >
              <input name="imp1" type="text" id="imp1" size="12" /></td>
            </tr>
        </table>-->
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Entrega</strong></legend><table width="1050" border="0">
  <tr>
    <td colspan="2" bgcolor="#CCCCCC">Fecha
      <label for="xfecha"></label>
      <input name="xfecha" type="text" id="xfecha" size="12" class="texto" value="<?php echo date('d/n/Y');?>"/><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "xfecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);

		 </script>
      <label for="lugar"></label>
       Lugar de Entrega
      <input name="lugar" type="text" id="lugar" size="35" class="texto" />
       Tiempo de entrega      
      <input name="tiempo" type="text" id="tiempo" size="35" class="texto"/></td>
    </tr>
  <tr>
    <td width="130" bgcolor="#CCCCCC">Plazo de Entrega</td>
    <td width="910" bgcolor="#CCCCCC"><?php $ven = ListaPlazoC();?>
      <select name="plazo" id="plazo" lass="Combos texto" class="Combos texto">
        <?php foreach($ven as $item){?>
        <option value="<?php echo utf8_encode($item["c_numitm"])?>"><?php echo utf8_encode($item["c_desitm"])?></option>
        <?php }	?>
        </select>      
      Precios
   
   
      <select name="C_PRECIOS" id="C_PRECIOS" class="Combos texto">
        <option value="001">NO INCLUYE IGV</option>
        <option value="002">INCLUYE IGV</option>
      </select>
Validez
<input name="validez" type="text" class="texto" id="validez" size="20" /> <label for="checkbox">Incluir Firma Digital</label><input name="c_swfirma" type="checkbox" id="c_swfirma" value="1" />
</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">  <a style='cursor: pointer;' onClick="muestra_oculta2('contenido_a_mostrar2')" title="">OBSERVACION DESGLOSAR<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>      
  <div id="contenido_a_mostrar2">
<table bgcolor="#CCCCCC">
      <td height="26" bgcolor="#FFFFFF">Condiciones</td>
      <td colspan="2" bgcolor="#FFFFFF"> <?php $ven = ListaCotiVariosCoti3C();?>
        <select name="tipoobs" id="tipoobs" onchange="llenardescrip2()" class="Combos texto">
           <option value="0">.::SELECCIONE::.</option> <?php foreach($ven as $item){?>
          <option value="<?php echo $descrip=utf8_encode(strip_tags($item["descripcion"]))?>"><?php echo utf8_encode($item["titulo"])?></option>
          <?php }	?>
        </select></td>
    </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF"><?php echo $titulo ?></td>
    </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF">
        
        <textarea name="area3" id="area3" cols="120" rows="15"></textarea>
        </td>
      
   <!--   </form>-->
   

      </tr>
    </table>
  </div>&nbsp;
</td>
  </tr>
    </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Totales</strong></legend><table width="1020" border="0">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><strong>Sub Total</strong>      <input name="st" type="text" id="st" value="0" size="10" readonly="readonly" class="texto" /></td>
    <td align="center" bgcolor="#CCCCCC"><strong></strong><input name="im" class="texto" type="hidden" id="im" value="0" size="10" readonly="readonly" />
      <label for="textfield"></label>
     
     Dscto <input name="descuento" type="text" id="descuento" value="0" size="10" class="texto" /></td>
    <td width="219" align="center" bgcolor="#CCCCCC"><label for="textfield7"></label>      <label for="bi"><strong>Total
          <input name="bi" type="text" id="bi" class="texto" value="0" size="10" readonly="readonly" />
    </strong></label>
      <label for="textfield2"></label></td>
  </tr>
  </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Operaciones</strong></legend>
   <table width="1020" border="0" align="">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><input type="checkbox" name="checkbox" id="checkbox" />
      Guardar </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><span class="buttons">
       <input type="reset" name="button4" id="button4" value="NUEVO" class="button" />
      <input type="button" name="GUARDAR" id="GUARDAR" value="GUARDAR" class="button" onclick="grabaform()" />
      <input type="reset" name="button5" id="button5" value="CANCELAR" class="button" />
    </span></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><!--<div class="buttons" align="center"><button type="button" class="positive" name="save" onclick="validagraba()" onKeyPress="return tabular(event,this)"/> <img src="../images/icon_accept.png" alt=""/>Guardar</button>

      <a href="#" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a>
      <button type="button" class="negative" name="save" onclick="linkianul()"> <img src="../images/icon_delete.png" alt=""/>Ver Documento</button> <button type="button" class="positive" name="update" onclick="linki()"> <img src="../images/icon_accept.png" alt=""/>Generar Factura con Pre-Factura</button></div>--></td>
  </tr>
  <tr>
    <td><div class="buttons" align="center"></div></td>
  </tr>
</table>
</fieldset>
<p>&nbsp;</p>



</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
