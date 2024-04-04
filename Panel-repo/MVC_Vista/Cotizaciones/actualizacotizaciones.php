<?php 
if($Obtenercotizaciones!=NULL)
{
	foreach ($Obtenercotizaciones as $item)
	{
		$cotizacion=$item['c_numped'];
		$moneda=$item['c_codmon'];
		$tipo=$item['c_tipped'];
		$asunto=$item['c_asunto'];
		$vendedor=$item['c_codven'];
		$razon=$item['c_nomcli'];
		$ruc=$item['cc_nruc'];
		$xdireccion=$item['c_nomcli'];
		$nextel=$item['c_nextel'];
		$mail=$item['c_email'];
		$contacto=$item['c_contac'];
		$codcli=$item['c_codcli'];
		$tipocambio=$item['n_tcamb'];
		$telefono=$item['c_telef'];
		$lugarentrega=$item['c_lugent'];
		$tiempoentrega=$item['c_tiempo'];
		$validez=$item['c_validez'];
		$plazoentrega=$item['c_codpgf']; 
		$precios=$item['c_precios'];
		$descrip=$item['c_desgral'];
		$obs=$item['c_obsped'];
		$glosa=$item['c_desgral'];
		$n_idreg=$item['n_idreg'];
		$tipocoti=$item['c_tipped'];
		$n_bruto=$item['n_bruto'];
		$n_dscto=$item['n_dscto'];
		$n_neta=$item['n_neta'];
		$n_neti=$item['n_neti'];
		$c_obsdoc=$item['c_obsdoc'];
		$c_gencro=$item['c_gencrono'];
		$c_swfirma=$item['c_swfirma'];
		$c_gencrono=$item['c_gencrono'];
		$c_meses=$item['c_meses'];
		$d_fecped=$item['d_fecped'];
		$d_fecreg=$item['d_fecreg'];
		$c_numocref=$item['c_numocref'];
	}
}
if($obteneritemscotiza!=NULL)
	{
		$cantDiagnosticos = 0;
		foreach($obteneritemscotiza as $itemD)
		{
	$cantDiagnosticos += 1;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Cotizaciones - Actualizacion</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
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
$().ready(function() {
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
		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});
			
</script>

<script language="javascript">
 function cambiotitulo(){
		var cod=document.formElem.variodescrip.options[document.formElem.variodescrip.selectedIndex].text;
		var porcion = cod.substring(0,3);
		document.formElem.codtitulo.value=porcion;
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
	
	




function accion(){

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
var tip=document.getElementById("clase").value;
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

/*if(tip=='002' && porcion=='NDND' || porcion=='RNDN' || porcion=='RNDND'){
	alert('no puede facturar repuestos como Flete');
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.formElem.descripcion.focus();
	return 0;
	}*/

/*if(tip=='015' && porcion=='NDND' || porcion=='RNDN'){
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
	
	alert('no puede facturar repuestos\n como Serv. Alquiler');
	return 0;
	}
	
	
if(cad=='RNDND' && tip=='019'){
	
	alert('no puede facturar repuestos\n como Vta Otros Servicios');
	return 0;
	}

if(cad=='RNDND' && tip=='015'){
	
	alert('no puede facturar repuestos\n como Serv. Mantenimiento');
	return 0;
	}

if(cad=='RNDND' && tip=='002'){
	
	alert('no puede facturar repuestos\n como Serv. Flete');
	return 0;
	}

if(cad=='RNDND' && tip=='017'){
	
	alert('no puede facturar repuestos\n como Serv. Alquiler');
	return 0;
	}



/*if(glo=='003' && tip=='001'){
	alert('no puede facturar un servicio\n como producto');
	return 0;
}*/


if(cod=='XNDND0102' && tip!='002'){
	alert('Cambie a Concepto\n VENTA DE SERVICIOS FLETE');
	return 0;
	}

if(cod=='NDND0000' && tip!='002'){
	alert('Cambie a Concepto\n VENTA DE SERVICIOS FLETE');
	return 0;
	}
if(cod=='CNDND0019' && tip!='002'){
	
	alert('Cambie a Concepto\n VENTA DE SERVICIOS FLETE');
	return 0;
	}
//validar manipuleo

if(cod=='NDND0006' && tip!='019'){
	
	alert('Cambie a Concepto\n VENTA OTROS SERVICIOS');
	return 0;
	}
//validar producto


/*if(glo=='001' &&  tip=='001'){
	
	alert('Cambie a Concepto VENTA PRODUCTOS');
	return 0;
	}*/


	agregarUsuario();
	//sumarcolumnatabla();
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		
		//document.getElementById("glosa").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.getElementById("imp").value="";
		document.getElementById("dscto").value="0.00";
		document.formElem.descripcion.focus();
	
	}
function eliminarDiagnosticos(){
if(sec > 1)
	{
	//	document.getElementById("tablaDiagnosticos").deleteRow(sec+1);
	document.getElementById("tablaDiagnostico").deleteRow(sec);
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
		
		document.getElementById("st").value="0.00";
		document.getElementById("im").value="0.00";
		
		document.getElementById("bi").value="0.00";
alert("No hay filas para eliminar");
	}
}
function actualizar_importe(obj){
//alert('msg');
var cant=obj;
var precio;var dscto;
var pre1 = cant.substring(8,10);
var dscto= cant.substring(8,10);
var canti= cant.substring(8,10);
var im=cant.substring(8,10);
var	valor=(parseFloat(document.getElementById("precio"+pre1).value)-
parseFloat(document.getElementById("dscto"+dscto).value))*parseFloat(document.getElementById("cantidad"+canti).value) ;	
document.getElementById("imp"+im).value=valor;
}	
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
	document.getElementById("descripcion").value="";
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
	//sumarcolumnatabla();
    }


function sumar1(){
 sumar=0;

	for(var i=1; i<=20; i++)
	{
		
	sumar+=parseFloat(document.getElementById("precio"+i).value)*parseFloat(document.getElementById("cantidad"+i).value);	
alert(sumar);
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
	cambiotitulo();
			}
	
}
function llenardescrip2(){
var codigo=document.getElementById("hc").value;
	if (codigo==""){
				alert ("Debe introducir el codigo del cliente");
		}else{
	document.formElem.area3.value =document.formElem.tipoobs.options[document.formElem.tipoobs.selectedIndex].value;
    	}
}
</script>                 
<script language="JavaScript"> 
function abreVentana(obj,codprod,clase){
	var codigo=document.getElementById("fecha").value;
	var cod=codprod
	var clas=clase
	var sw='1';
	var xsw='2';
	var valor=obj
			if (codigo=="") {
				alert ("Debe introducir Fecha");
			} else {
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigos&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"&clase="+clas,"miwin",
			"width=700,height=380,scrollbars=yes");
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
//fin funcion}	
function copia(){
	//document.getElementById("formulario_lineas").submit();
document.getElementById('imp').value = document.getElementById('precio').value;
//actualizacant();
}
function copia1(){

document.getElementById('formglosa').submit();
//OPCION 1
//document.getElementById('xglosa').value = document.getElementById('glosa').value;
//OPCION 2
//document.getElementById('xglosa').value = document.getElementById("glosa").value;
//OPCION 3
//document.getElementById(
		
//actualizacant();
}
function actualizacant(){
	
var cant=document.getElementById('cantidad').value;
var precio=document.getElementById('precio').value;
var dscto=document.getElementById('dscto').value;

tot1=cant*precio;
tot2=tot1-dscto;
document.getElementById('imp').value=tot2;

	
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

/*function aplicacambiodolaresasoles(){
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
}*/
	
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
function cerrar() {

div = document.getElementById('contenido_a_mostrar');
div2=document.getElementById('contenido_a_mostrar2');
div.style.display='none';
div2.style.display='none';
document.getElementById("area2").disabled='disabled';
document.getElementById("area3").disabled='disabled';

}
</script>
<script language="javascript">
function mesescambia(){
	document.formElem.xmeses.value=document.formElem.meses.options[document.formElem.meses.selectedIndex].value;
	}
function grabaform(){
	/*document.getElementById('iglosa1').contentWindow.graba1();
	document.getElementById('iglosa2').contentWindow.graba2();  */

	
		var cod=document.formElem.xmeses.value;
	    
		if(cod!=0 && document.getElementById("gencrono").checked==false){
		alert('Marque Check de Cronograma');
		return 0;
		}
	
	
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
/*	if(document.getElementById('descripcion1').value==""){
		
		alert ('Falta Detalle de Cotizacion');
		document.formElem.descripcion.focus() 
		return 0;
		}*/
	 if(confirm("Seguro de Actualizar Cotizacion ?")){
	//document.getElementById.formElem.submit();
	document.getElementById("formElem").submit();
	 }
	}
function graba1(){
document.getElementById("fo3").submit();
	
	}
function habilitar_combos(){

if (document.getElementById("checkbox").checked==true){
	
	//document.getElementById("variodescrip").disabled='';
	//document.getElementById("area2").disabled='';
	}else{
		//	document.getElementById("variodescrip").disabled='disabled';
			//document.getElementById("area2").value='';
//document.getElementById("area2").disabled='disabled';
		
		}
}
function habilitar_combos2(){

if (document.getElementById("checkbox2").checked==true){
	
	//document.getElementById("tipoobs").disabled='';
	//document.getElementById("area3").disabled='';
	}else{
		//document.getElementById("area3").disabled='disabled';
		//	document.getElementById("tipoobs").disabled='disabled';
			//document.getElementById("area3").value='';
			//	document.getElementById("area2").disabled='disabled';
		}
}

function combochanger(){

	var cod=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].value;
	//document.getElementById.formElem.tt.value=cod;
	document.getElementById('clase').value=cod

	}
	function abreVentanaF(obj){

	var valor=obj
			if (codigo=="") {
				alert ("Debe introducir Fecha");
			} else {
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verfechas&udni=<?php echo $udni;?>&val="+valor,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
			
}
</script>



<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo=valor+1;

function agregarUsuario(){
	
	
	nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='codigo"+posicionCampo+"' type='text' id='codigo"+posicionCampo+ "' size='5' readonly='readonly' class='texto'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='descripcion"+posicionCampo+"' type='text' id='descripcion"+posicionCampo+ "' size='40' readonly='readonly' class='texto'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='glosa"+posicionCampo+"' type='text'  id='glosa"+posicionCampo+"'  size='40'  class='texto'/>";
		
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='codcont"+posicionCampo+"' readonly='readonly' type='text'  id='codcont"+posicionCampo+"'  size='15'  class='texto' />";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='clase"+posicionCampo+"' type='text'  id='clase"+posicionCampo+"'  size='5'  class='texto' readonly='readonly'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='precio"+posicionCampo+"' type='text'  id='precio"+posicionCampo+"'  size='10'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='dscto"+posicionCampo+"' type='text'  id='dscto"+posicionCampo+"'  size='10'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='cantidad"+posicionCampo+"' type='text'  id='cantidad"+posicionCampo+"'  size='10' onkeyup='actualizar_importe(this.name);' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='imp"+posicionCampo+"' type='text'  id='imp"+posicionCampo+"'  size='10' readonly='readonly' class='texto'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'>del<input name='fini"+posicionCampo+"' type='text'  id='fini"+posicionCampo+"'  size='10' readonly='readonly' class='texto'  onclick='abreVentanaF(this.name)'/>al<input name='ffin"+posicionCampo+"' type='text'  id='ffin"+posicionCampo+"'  size='10' readonly='readonly' class='texto'/>";
		
		
		
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		

escribirDiagnostico(posicionCampo);
		posicionCampo++;
	
		
    }


function escribirDiagnostico(posicionCampo)
{
	calcularimporte();
			codigo = document.getElementById("codigo" + posicionCampo);
			codigo.value = document.formElem.codigo.value;
			
			descripcion = document.getElementById("descripcion" + posicionCampo);
			descripcion.value = document.formElem.descripcion.value;
			
			glosa = document.getElementById("glosa" + posicionCampo);
			glosa.value = document.formElem.glosa.value;
			
			clase = document.getElementById("clase" + posicionCampo);
			clase.value = document.formElem.clase.value;
			
			precio = document.getElementById("precio" + posicionCampo);
			precio.value = document.formElem.precio.value;
			
			dscto = document.getElementById("dscto" + posicionCampo);
			dscto.value = document.formElem.dscto.value;
			
			cantidad = document.getElementById("cantidad" + posicionCampo);
			cantidad.value = document.formElem.cantidad.value;
			
			imp = document.getElementById("imp" + posicionCampo);
			imp.value = document.formElem.imp.value;
			
}


function calcularimporte(){
	var precio=document.getElementById("precio").value;
	var dscto=document.getElementById("dscto").value;
	var cant=document.getElementById("cantidad").value;
	var par =parseFloat(precio)-parseFloat(dscto);
	var total=parseFloat(par)*parseFloat(cant);
	document.formElem.imp.value=total;

	}
function cierraform(){
}
</script>




</head>
<style>
#tablaDiagnostico td, th { padding: 0.2em; }
#tablaDiagnostico tr:nth-child(even) {background: #89abcd }
#tablaDiagnostico tr:nth-child(odd) {background: #234567}

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
<body>
<strong align="center">ACTUALIZA COTIZACIONES</strong>
<form id="formElem" name="formElem"  method="post" action="../MVC_Controlador/cajaC.php?acc=updatecoti&gral=<?php echo ($_GET['gral'])?>&obs=<?php echo ($_GET['obs']);?>&udni=<?php echo $_GET['udni']; ?>">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="1189" height="449" border="0">

    <tr>
      <td height="26" bgcolor="#CCCCCC">Nro de Dcto</td>
      <td width="191" bgcolor="#CCCCCC"><label for="doc"></label>
        <input name="doc"  type="text" class="texto" id="doc" value="<?php echo $cotizacion;?>" readonly="readonly" />
        <input type="hidden" name="n_idreg" id="n_idreg" value="<?php echo $n_idreg; ?>" /></td>
      <td width="68" bgcolor="#CCCCCC">Moneda</td>
      <td width="181" bgcolor="#CCCCCC"><?php $venMO = ListaMonedaC();?>
      
          <select name="moneda" id="moneda" class="Combos texto">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($venMO as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$moneda){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
            </select>&nbsp;</td>
      <td width="71" bgcolor="#CCCCCC">Estado</td>
      <td colspan="3" bgcolor="#CCCCCC">Fecha
        <label for="fecha"></label>
        <input name="fecha"  type="text" class="texto"  id="fecha" size="12" maxlength="12" value="<?php echo date('d/m/Y');?>" /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
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
<option value="1">Aprobado</option>
<option value="0">No Aprobado</option>
        </select></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#CCCCCC">Vendedor</td>
      <td bgcolor="#CCCCCC"><label for="vendedor"></label>
	  <?php $ven = ListaVendedorC();?>
        <select name="vendedor" id="vendedor" class="Combos texto">
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
           <option value="<?php echo $item["tv_codi"]?>"<?php if($item["tv_codi"]==$vendedor){?>selected<?php }?>><?php echo $item["tv_nomb"]?></option>
          <?php }	?>
        </select></td>
      <td bgcolor="#CCCCCC">Tipo</td>
      <td bgcolor="#CCCCCC"><label for="tipo"></label><?php $ven = ListaTipoC();?>
        <select name="tipo" id="tipo" class="Combos texto"  >
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          
          <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$tipocoti){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          <?php echo $tipocoti ?>
        
          <?php }?>
        </select>&nbsp;</td>
      <td bgcolor="#CCCCCC">IGV</td>
      <td width="102" bgcolor="#CCCCCC"><input name="igv" type="text" disabled="disabled" id="igv" value="0.18" size="5" maxlength="5" readonly="readonly" />
        %
        <input name="codvendedor" type="hidden" id="codvendedor" value="<?php echo $_GET['udni']; ?>" readonly="readonly"  />
        <input type="hidden" name="d_fecreg" id="d_fecreg" value="<?php echo $d_fecreg; ?>" /></td>
      <td width="154" bgcolor="#CCCCCC">Asigne Contacto Via</td>
      <td width="243" bgcolor="#CCCCCC"> <?php $ven = listaderivacionxusuarioM($_GET['udni']);?>
      <select name="cmbcontacto" id="cmbcontacto" class="Combos texto">
      <option value="1">[Telefono]</option>
      <?php foreach($ven as $item){?>
          <option value="<?php echo $item["Id"]?>"><?php echo 'Web=>'.$item["Id"].' '.$item["c_empresa"]?>
          </option>
          <?php }?>
        <!--  <option value="0">[Otros Especificar]</option>-->
          </select>&nbsp;</td>
      </tr>
    <tr>
      <td width="145" height="24" bgcolor="#CCCCCC"><strong>Razon Social</strong></td>
      <td colspan="7" bgcolor="#CCCCCC"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
        
        <input name="razon" type="text" id="razon"  size="35"  class="texto" value="<?php echo $razon?>" /><a href="#"> 
        <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/></a>Ruc
        <input name="rucdni" class="texto" type="text" id="rucdni" size="12" maxlength="12" value="<?php echo $ruc; ?>"/>         
        Codigo
        
        <input name="hc" type="text" id="hc" size="10" class="texto" value="<?php echo $codcli; ?>"/>
        Direccion
        <input name="direc" type="text" id="direc" size="30" class="texto"value="<?php echo $direccion; ?>" />Dcto Ref
     
        <input type="text" size="10" name="c_numocref" id="c_numocref"  class="texto" value="<?php echo $c_numocref ?>" /></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#999966">Asunto</td>
      <td colspan="7" bgcolor="#999966"><label for="ruc">
        <input name="asunto" type="text" class="texto" id="asunto" size="40" value="<?php echo $asunto; ?>"/>
        Contacto
          <input name="contacto" type="text" class="texto" id="contacto" size="15" value="<?php echo $contacto; ?>" />
        Correo
        <input name="correo" type="text" class="texto" id="correo" size="15" value="<?php echo $mail; ?>"/>
        Telefono
        <input name="telefono" type="text" class="texto" id="telefono" size="8" value="<?php echo $telefono; ?>" />
        Nextel
        <input name="nextel" type="text" class="texto" id="nextel" size="9" value="<?php echo $nextel; ?>" />
      </label></td>
    </tr>
    <tr>
      <!--<form action="" method="get" name="glosa">-->
      <?php /*?><td height="26" bgcolor="#FFFFFF">Descripcion General</td>
      <td colspan="2" bgcolor="#FFFFFF"> <?php $ven = ListaCotiVariosCotiC();?>
          <select name="variodescrip" id="variodescrip" onchange="llenardescrip()">
            <?php foreach($ven as $item){?>
            <option value="<?php echo $descrip=$item["descripcion"]?>"><?php echo $item["titulo"]?></option>
            <?php }	?>
        </select>
        <input type="button" name="button3" id="button3" value="Bot�n" onclick="linki()"/></td>
    </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF">
        
        <textarea name="area2" id="area2" cols="70" rows="5"><?php echo $descrip ?></textarea>
        
        <input type="text" name="ppp" id="ppp" /></td><?php */?>
      
   <!--   </form>-->
      </tr>
    <tr>
      <td height="26" colspan="8" bgcolor="#FFFFFF">
      <a style='cursor: pointer;' onClick="muestra_oculta('contenido_a_mostrar')" title="">VER GLOSA DETALLE<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>
<div id="contenido_a_mostrar">
<table width="1050" bgcolor="#CCCCCC">
    <tr>
      <td width="374" height="26" bgcolor="#FFFFFF" style="color:#F00">Descripcion General <?php $ven = ListaCotiVariosCoti2C();?>
        Si desea cambiar glosa active el check y copie el contenido caso contrario desactivar el check</td>
      <td width="664" height="26" bgcolor="#FFFFFF"><select   name="variodescrip" id="variodescrip" onchange="llenardescrip()" class="Combos texto">
        <option value="0">.::SELECCIONE::.</option><?php $ven = ListaCotiVariosCoti2C();?>
        <?php foreach($ven as $item){?>
        <option    value="<?php echo $descrip=utf8_encode(strip_tags($item["descripcion"]))?>"><?php echo utf8_encode($item["id"].' '.$item["titulo"])?></option>
        <?php }	?>
      </select>
        <input name="checkbox" type="checkbox" id="checkbox"   onclick="habilitar_combos()" value="1" />
        Cambiar Glosa<input type="hidden" name="codtitulo" id="codtitulo" size="5" />
        <label for="checkbox2"></label></td>
      </tr>
    <tr>
      <td height="26" colspan="2" valign="top" bgcolor="#FFFFFF"><textarea name="area2" cols="120" rows="15" id="area2">
	  
	  <?php //echo str_replace("<br />","\n",utf8_encode($glosa));
	  $valoe='<pre>'.$glosa.'</pre>';
	  $patron = "(<br />)+";//Patrón de búsqueda, que mediante expresión regular busca varios saltos seguidos
   $sustituto = " ";//sustituye por un solo salto
  // echo $cadenasalida2=eregi_replace($patron,$sustituto,(utf8_encode($glosa)));
//echo strip_tags(utf8_encode($glosa))
	//echo str_replace("<br />","\n",(utf8_encode($valoe)));
	echo (strip_tags(nl2br(utf8_encode($glosa))));
//	$valor= htmlentities($glosa);
	//echo html
 //echo $valoe
	  //echo str_replace("<br />","\n",(utf8_encode($valor)));
	  
	  ?>
       </textarea>        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo utf8_decode($_GET['gral']);?>" /></td>
      <!--   </form>-->
    </tr>
    </table>
</td>
    </tr>
    </table>
  </fieldset>
<!-- -->
<fieldset class="fieldset legend">
   
    <legend style="color:#03C"><strong>Detalle (001=Venta Prod || 017=Serv. Alquiler || 015=Serv. Mantenimiento|| 002=Serv. Flete || 019 Venta Serv. Otro)</strong></legend>
    <table id="tablaDiagnosticox" width="1050" border="0">
      <tr>
        <td width="1007" height="31" colspan="6" bgcolor="#CCCCCC"><table width="1045" border="0">
            <tr>
              <td width="35">Tipo</td>
              <td height="26"><?php $ven = ListaTipoC();?>
<select name="tipo2" id="tipo2"  class="Combos texto" onchange="combochanger();" >
                           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
            <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_numitm"].'-'.$item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;
          <input name="clase" type="text" id="clase" size="5" readonly="readonly" />
          Pto Alquiler
          <label for="select"></label>
          <select name="select" id="select">
          </select>
          Cronograma de Pago
<input name="gencrono" type="checkbox" id="gencrono" onclick="prodform()" value="1" 
		<?php if($c_gencrono=='1'){?> checked="checked"<?php }?>/>
		 Meses
		 
		 <select name="meses" id="meses" onchange="mesescambia()" >
            <option value="0">0</option>
    <?php $venMO=ListadiasC();?>
 
      <?php foreach($venMO as $item){?>
      
       <option value="<?php echo $item["tm_codi"]?>"<?php if($item["tm_codi"]==$c_meses){?>selected<?php }?>><?php echo $item["tm_desc"]?></option>  
      <?php }	?>
    </select>
		 <input type="hidden" size="5" name="xmeses" id="xmeses" />
<input name="nomtipo" class="textos" type="text" id="nomtipo" value="Tipo Cambio" size="14" readonly="readonly" />
            <?php 
			$tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			$tipocambio=$item["tc_cmp"];
			}
			?>   
  <label for="prueba"></label>
  <input type="text" name="prueba" class="texto" size="10" id="prueba" value="<?php echo $tipocambio  ?>"/>
  <label for="aplicartipo"></label>
  <input type="radio" name="radio" id="tsoles" value="tsoles" onclick="aplicacambiosolesadolares();" />  <input type="radio" name="radio" id="tipodolares" value="tipodolares" onclick="aplicacambiodolaresasoles();" />              </td>
              <?php /*?><td width="178"><?php $ruta = RutasListaC();?><select name="rutas" id="rutas" onchange="llenarcombo();" class="Combos texto">
               <option value="0">.::SELECCIONE::.</option>
                 <?php foreach($ruta as $item){?>
				 //ventas precio por cada origen.
            <option value="<?php echo $item["r_precio"]?>"><?php echo $item["r_origen"].'-'.$item["r_destino"]?></option>
            <?php }	?>
              </select>
               </td>
              <td width="117"><input name="ta" type="text" class="textos" id="ta" value="Termino Alquiler" size="18" />               </td>
              <td width="89"><input name="fecalquiler" type="text" id="fecalquiler" size="12" /></td><?php */?>
            </tr>
        </table></td>
      </tr>
      <tr>
    <td height="24" colspan="6" bgcolor="#CCCCCC">
          
          Concepto
<input name="descripcion" type="text" id="descripcion" size="35" class="texto"  onchange="validarclie();"/>
      <a href="#"> <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>Cod
      <input name="codigo" type="text"  id="codigo" size="15" readonly="readonly" class="texto" />
      <input name="glosa" type="text" id="glosa" size="25"class="texto" />
<label></label>
      Precio <!--   -->
      <input name="precio" type="text" id="precio" size="10" onkeyup="copia();" class="texto" />
      <label for="textfield3"></label>
      
      Dscto
 		
      <input name="dscto" type="text" class="texto" id="dscto" value="0.00" size="10"/>
      Cantidad
      <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="5" />
      <label for="checkbox"></label>
      <input type="hidden" name="zzglosa" id="zzglosa" />
      <input name="imp" type="hidden" id="imp" size="10"  class="texto"/>
      <input type="hidden" name="impo" id="impo" />
      <input type="hidden" name="codigofamilia" id="codigofamilia" />
      <input type="hidden" name="descuentox" id="descuentox" />      
     <a href="#" onclick="accion()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a><a href="#" onclick="eliminarDiagnosticos();"><!--<img align="top" src="../images/errorr.png" width="16" height="16" border="0" />-->
     <input type="hidden" name="fini" id="fini" />
     <input type="hidden" name="ffin" id="ffin" />
     </a></td>
    </tr>
      <tr>
        <td colspan="6" >
        <table width="1378" border="0" id="tablaDiagnostico">
          <tr>
            <td width="51" bgcolor="#66CCCC"><strong>Codigo</strong></td>
            <td width="252" bgcolor="#66CCCC"><strong>Descripcion</strong></td>
            <td width="252" bgcolor="#66CCCC"><strong>Glosa</strong></td>
            <td width="44" bgcolor="#66CCCC"><strong>Codigo</strong></td>
            <td width="44" bgcolor="#66CCCC"><strong>Clase</strong></td>
            <td width="68"bgcolor="#66CCCC"><strong>Precio</strong></td>
            <td width="71"bgcolor="#66CCCC"><strong>Dscto</strong></td>
            <td width="76"bgcolor="#66CCCC"><strong>Cantidad</strong></td>
            <td width="85"bgcolor="#66CCCC"><strong>Importe</strong></td>
            <td width="253"bgcolor="#66CCCC"><strong>Fecha Inicio Alquiler</strong></td>
            <td width="16"bgcolor="#66CCCC"><strong>Delete</strong></td>
            </tr>
            <?php 
							if($Obtenercotizaciones != NULL)
							{		
								$i = 1;
								foreach($Obtenercotizaciones as $itemD)
								{
									$total+=$itemD["n_totimp"];
							?>
          <tr>
            <td ><input type="text" id="<?php echo "codigo".$i; ?>"  name="<?php echo "codigo".$i; ?>" readonly  size="5" value="<?php echo $itemD["c_codprd"]; ?>" class='texto' /></td>
            <td ><strong>
              <input  name="<?php echo "descripcion".$i; ?>" type="text" id="<?php echo "descripcion".$i; ?>" value="<?php echo $itemD["c_desprd"]; ?>"  size="40" readonly="readonly" class='texto' />
            </strong></td>
            <td ><strong>
              <input type="text" id="<?php echo "glosa".$i; ?>"  name="<?php echo "glosa".$i; ?>"  size="40" value="<?php echo $itemD["c_obsdoc"]; ?>" class="texto" />
            </strong></td>
            <td ><input  name="<?php echo "codcont".$i; ?>" type="text" id="<?php echo "codcont".$i; ?>" onclick="abreVentana(this.name,'<?php echo $itemD["c_codprd"]; ?>','<?php echo $itemD["clase"]; ?>')" value="<?php echo substr($itemD["c_codcont"],2,20); ?>"  size="15" readonly="readonly" class="texto" />
              <input type="hidden" name="<?php echo "codequipo".$i; ?>" id="<?php echo "codequipo".$i; ?>" value="<?php echo $itemD["c_codcont"]; ?>" size="5" />              &nbsp;</td>
             <td height="24" ><strong>
               <input name="<?php echo "clase".$i; ?>" type="text" id="<?php echo "clase".$i; ?>" size="5" value="<?php echo utf8_encode($itemD["clase"]); ?>" class='texto' readonly="readonly"/>
             </strong></td>
    <td ><strong>
      <input type="text" id="<?php echo "precio".$i; ?>"  name="<?php echo "precio".$i; ?>"  size="10" value="<?php echo $itemD["n_preprd"]; ?>" class='texto'>
    </strong></td>
      
       <td ><strong>
       <input type="text" id="<?php echo "dscto".$i; ?>"  name="<?php echo "dscto".$i; ?>"  size="10" value="<?php echo $itemD["n_dscto"]; ?>" class='texto'>
      </strong></td>
      
    <td><strong>
      <input type="text" id="<?php echo "cantidad".$i; ?>"  name="<?php echo "cantidad".$i; ?>"  size="10" value="<?php echo $itemD["n_canprd"]; ?>" onkeyup="actualizar_importe(this.name)" class='texto'>
      </strong></td>
    <td><strong>
      <input type="text" id="<?php echo "imp".$i; ?>"  name="<?php echo "imp".$i; ?>"  size="10" value="<?php echo $itemD["n_totimp"]; ?>" class='texto' />
    </strong></td>
    <td>
    del
    <input name="<?php echo "fini".$i; ?>" type="text" id="<?php echo "fini".$i; ?>" size="10" onclick="abreVentanaF(this.name)" value="<?php echo $itemD["c_fecini"];  ?>" class='texto'/>
     al <img src="../images/calendario.jpg" id="<?php echo "ImageQ".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fini"+<?php echo $i ?>,
					ifFormat   : "%d/%m/%Y",
					button     : "ImageQ"+<?php echo $i ?>
					  }
					);
		 </script><input name="<?php echo "ffin".$i; ?>" type="text" id="<?php echo "ffin".$i; ?>" size="10"  value="<?php echo $itemD["c_fecfin"];  ?>" class='texto'/>
      <img src="../images/calendario.jpg" id="<?php echo "Images".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'"/>
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "ffin"+<?php echo $i ?>,
					ifFormat   : "%d/%m/%Y",
					button     : "Images"+<?php echo $i ?>
					  }
					);
		 </script>
      
      
      </td>
    <td><input type="button" name="button3" id="button3" value="delete" onclick="eliminarUsuario(this)" /></td>
    </tr>
             <?php 	
						$i++;
					}			
				}
			?>
        </table>
        </td>
      </tr>
    </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Entrega</strong></legend><table width="1050" border="0">
  <tr>
    <td colspan="2" bgcolor="#CCCCCC">Fecha
      <label for="xfecha"></label>
      <input name="xfecha" type="text" id="xfecha" size="12" class="texto" value="<?php echo date('d/m/Y');?>"/><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
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
      <input name="lugar" type="text" id="lugar" size="35" class="texto"value="<?php echo $lugarentrega; ?>" />
       Tiempo de entrega      
      <input name="tiempo" type="text" id="tiempo" size="35" class="texto" value="<?php echo $tiempoentrega; ?>"/></td>
    </tr>
  <tr>
    <td width="119" bgcolor="#CCCCCC">Plazo de Entrega</td>
    <td width="927" bgcolor="#CCCCCC"><?php $ven = ListaPlazoC();?>
      <select name="plazo" id="plazo" lass="Combos texto">
        <?php foreach($ven as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$plazoentrega){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>      
      Precios
      <label for="zprecio"></label>
     
      <select name="zprecio" id="zprecio"><?php $con = ListaCondicionC();?>
       <?php foreach($con as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$precios){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>   
             Validez
      <input name="validez" type="text" class="texto" id="validez" size="20" value="<?php echo $validez; ?>"/>
      Incluir Firma Digital
		 <input name="c_swfirma" type="checkbox" id="c_swfirma" value="1"  
		 <?php if($c_swfirma=='1'){ ?> <?php }?> /> 
      
      </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">  <a style='cursor: pointer;' onClick="muestra_oculta2('contenido_a_mostrar2')" title="">VER OBSERVACIONES<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>      
      <div id="contenido_a_mostrar2">
<table width="1050" bgcolor="#CCCCCC">
      <tr>
        <td width="537" height="26" bgcolor="#FFFFFF" style="color:#F00">Condiciones Si desea cambiar la observacion active el check y copie el contenido caso contrario desactivar el check</td>
        <td colspan="3" bgcolor="#FFFFFF"><?php $ven = ListaCotiVariosCoti3C();?>
          <select name="tipoobs"  id="tipoobs" onchange="llenardescrip2()" class="Combos texto">
            <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
            <option value="<?php echo $descrip=utf8_encode(strip_tags($item["descripcion"]))?>"><?php echo $item["titulo"]?></option>
            <?php }	?>
            </select>
          <input name="checkbox2" type="checkbox" id="checkbox2"  onclick="habilitar_combos2()" value="1" />
          Cambiar Condiciones
          <label for="checkbox2"></label>          <label for="radio"></label></td>
        </tr>
    <tr>
      <td height="26" colspan="4" valign="top" bgcolor="#FFFFFF">
        
        <textarea name="area3" id="area3" cols="120" rows="15">
		
		<?php //echo str_replace("<br />","\n",utf8_encode($obs));
		
		
			  $patron = "(<br />)+";//Patrón de búsqueda, que mediante expresión regular busca varios saltos seguidos
    $sustituto = "\n";//sustituye por un solo salto
   $cadenasalida=eregi_replace ($patron,$sustituto,utf8_encode($obs));
	//	echo str_replace("<br />"," ",($cadenasalida));
	echo strip_tags(utf8_encode($obs))
	
		
		?>
        
		</textarea>
        &nbsp;
        <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo utf8_decode($_GET['obs']);?>" /></td>
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
    <td align="center" bgcolor="#CCCCCC"><strong>Sub Total</strong>      <input name="st" type="text" id="st"  size="10" readonly="readonly" class="texto"  value="0"/></td>
    <td align="center" bgcolor="#CCCCCC"><strong></strong><input name="im" class="texto" type="hidden" id="im" value="0" size="10" readonly="readonly" />
      <label for="glosa1"></label>      Dscto<input name="descuento" class="texto" type="text" id="descuento" value="0" size="10" /></td>
    <td width="219" align="center" bgcolor="#CCCCCC"><label for="textfield7"></label>      <label for="bi"><strong>Total
          <input name="bi" type="text" id="bi" class="texto" value="<?php echo $total ?>" size="10" readonly="readonly" />
    </strong></label>
      <label for="textfield2"></label></td>
  </tr>
  </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Operaciones</strong></legend>
   <table width="1020" border="0" align="">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930">Marque el Check Para Alertar Si desea que se Apruebe
      <input name="c_aprvend" type="checkbox" id="c_aprvend" value="1" />
      <label for="aproba"></label></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><span class="buttons">
      <input type="button" name="button" class="button" id="button" value="Actualizar" onclick="grabaform()" />
      <input type="reset" name="button2" id="button2" class="button" value="Cancelar" />
    </span></td>
  </tr>
  <tr>
    <td align="center" valign="middle"></td>
  </tr>
  <tr>
    <td><div class="buttons" align="center"></div></td>
  </tr>
</table>
</fieldset>
<p>&nbsp;</p>

</form>
<?php /*?><form id="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=adiciona&cod=<?php echo $codcli;?>&coti=<?php echo $cotizacion;?>&udni=<?php echo $_GET['udni'];?>">
  <input type="submit" name="button3" id="button3" value="Actualizar y Aprobar" />
</form>
<a href="../MVC_Controlador/cajaC.php?acc=adiciona&cod=<?php echo $codcli;?>&coti=<?php echo $cotizacion;?>&udni=<?php echo $_GET['udni'];?>"><img src="../images/Coherence.png" width="25" height="25" title="Agregar Datos Alquiler" />Aprobar</a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p><?php */?>
</body>
</html>
