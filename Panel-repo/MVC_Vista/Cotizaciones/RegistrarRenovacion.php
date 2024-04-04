<?php 
function dameFecha($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86000;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
function diasEntreFechas($fechainicio, $fechafin){
    return ((strtotime($fechafin)-strtotime($fechainicio))/86400);
}
if($ObtenercotizacionesCab!=NULL)
{
	foreach ($ObtenercotizacionesCab as $item)
	{
		$cotizacion=$item['c_numped'];
		$moneda=$item['c_codmon'];
		$tipo=$item['c_tipped'];
		$asunto=$item['c_asunto'];
		$vendedor=$item['c_codven'];
		$razon=$item['c_nomcli'];
		$ruc=$item['cc_nruc'];
		$direccion=$item['c_nomcli'];
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
<title>Cotizaciones - Generacion Cotizacion</title>
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
		$("#precio").val(data[3]);
			//$("#precio").val(data[3]);
		$("#glosa").val(data[6]);
		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});
			
</script>
<script language="javascript">
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
sec = <?php echo $cantDiagnosticos; ?>;
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
		
		clase="clase"+sec;
		
		tabla = document.getElementById("tablaDiagnostico");
		var tr = document.createElement("tr");
		tr.id = "fila" + sec;
	
tr.innerHTML = "<td bgcolor='#CCCCCC'>" + sec + " <input type='hidden' id='" + codigo + "' name='" + codigo + "' readonly size='10'/> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + descripcion + "' type='text'  id='" + descripcion + "' size='40' readonly='readonly'/><input name='" + glosa + "' type='text'  id='" + glosa + "' size='30' /><input name='" + clase + "' type='text'  id='" + clase + "' size='10' /></td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + codcont + "' type='text'  id='" + codcont + "' size='15' /></td>";
tr.innerHTML += "<td bgcolor='#CCCCCC'></td>";


tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + precio + "' type='text'  id='" + precio + "' size='5' /></td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + dscto + "' type='text'  id='" + dscto + "' size='5' onkeyup='actualizar_importe()' /> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + cantidad + "' type='text' id='" + cantidad + "' size='5' onkeyup='actualizar_importe();'/> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input  value='0' name='" + imp + "' type='text'  id='" + imp + "' size='5' readonly='readonly' />  </td>";
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
			
			codcont = document.getElementById("codcont" + i);
			codcont.value = document.formElem.codcont.value;
			
			
			precio = document.getElementById("precio" + i);
		    precio.value=document.formElem.precio.value;
			
			dscto = document.getElementById("dscto" + i);
			dscto.value=document.formElem.dscto.value;
			
			cantidad = document.getElementById("cantidad" + i);
			cantidad.value=document.formElem.cantidad.value;
			
			imp = document.getElementById("imp"+ i);
			imp.value=document.formElem.imp.value;
			
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
		
var tip=document.getElementById("clase").value;
var glo=document.getElementById("zzglosa").value;
var cod=document.getElementById("codigo").value;

/*if(tip=='001' && glo=='003'){
	
	alert('Concepto es Servcio no Venta de Producto Cambie'); || cod=='NDND0000' || cod=='CNDND0019' 
	return 0;
	}*/
	
//validar transporte

/////////////////


if(glo=='003' && tip=='001'){
		alert('no puede facturar un servicio como producto');
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
//validar producto


/*if(glo=='001' &&  tip=='001'){
	
	alert('Cambie a Concepto VENTA PRODUCTOS');
	return 0;
	}*/


		agregarUsuario();
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		
		//document.getElementById("glosa").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.getElementById("imp").value="";
		document.getElementById("dscto").value="0.00";
		document.formElem.descripcion.focus();
	/*		
		}else{
	
		
		alert('Item Ya Existe');
		
		}
		}*/
	//limpiar();
	
	}
function eliminarDiagnosticos(){
	//alert(sec);
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
		document.getElementById("dscto").value="0.00";
		document.getElementById("st").value="0.00";
		document.getElementById("im").value="0.00";
		document.getElementById("bi").value="0.00";
		alert("No hay filas para eliminar");
	}
	

}

function actualizar_importe(obj){

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

	for(var i=1; i<=sec; i++)
	{
sumar+=parseFloat(document.getElementById("precio"+i).value)*parseFloat(document.getElementById("cantidad"+i).value);	

	}
	document.getElementById("xsum").value=sumar;
	//document.getElementById("st").value=sumar;
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
function cerrar() {

div = document.getElementById('contenido_a_mostrar');
div2=document.getElementById('contenido_a_mostrar2');
div.style.display='none';
div2.style.display='none';

document.getElementById("area2").disabled='disabled';
document.getElementById("area3").disabled='disabled';

}

</script>
<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo=valor+1;

function agregarUsuario(){
	// alert('hola');
	
	/*codigo = "codigo" + sec;
		descripcion = "descripcion" + sec;
		precio = "precio" + sec;
		cantidad = "cantidad" + sec;
		dscto = "dscto" + sec;
		imp = "imp" + sec;
		glosa="glosa" + sec;
		clase="clase" + sec;*/
	
	
	nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='codigo"+posicionCampo+"' type='text' id='codigo"+posicionCampo+ "' size='5' readonly='readonly' class='texto'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='descripcion"+posicionCampo+"' type='text' id='descripcion"+posicionCampo+ "' size='40' readonly='readonly' class='texto'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='glosa"+posicionCampo+"' type='text'  id='glosa"+posicionCampo+"'  size='40'  class='texto'/>";
		
		
		
			nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='codcont"+posicionCampo+"' type='text'  id='codcont"+posicionCampo+"'  size='15'  class='texto'/></td>";
		
		
	
		
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='clase"+posicionCampo+"' type='text'  id='clase"+posicionCampo+"'  size='5' readonly='readonly' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='precio"+posicionCampo+"' type='text'  id='precio"+posicionCampo+"'  size='5'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='dscto"+posicionCampo+"' type='text'  id='dscto"+posicionCampo+"'  size='5'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='cantidad"+posicionCampo+"' type='text'  id='cantidad"+posicionCampo+"'  size='5' onkeyup='actualizar_importe(this.name);' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='imp"+posicionCampo+"' type='text'  id='imp"+posicionCampo+"'  size='5' readonly='readonly' class='texto'/>";
		
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
</script>
<script language="javascript">
function grabaform(){
	/*document.getElementById('iglosa1').contentWindow.graba1();
	document.getElementById('iglosa2').contentWindow.graba2();  */
	//parent.iglosa1.graba1();
	//window.iglosa1.graba1();
	//window.iglosa2.graba2()
		var theTable = document.getElementById('tablaDiagnostico');
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
	//if(document.getElementById('descripcion1').value==""){
//		
//		alert ('Falta Detalle de Cotizacion');
//		document.formElem.descripcion.focus() 
//		return 0;
//		}
	 if(confirm("Seguro de Grabar Cotizacion ?")){
	//document.getElementById.formElem.submit();
	document.getElementById("formElem").submit();
}
	
}
function graba1(){
document.getElementById("fo3").submit();
	
	}
function habilitar_combos(){

if (document.getElementById("checkbox").checked==true){
	
	document.getElementById("variodescrip").disabled='';
	document.getElementById("area2").disabled='';
	}else{
			document.getElementById("variodescrip").disabled='disabled';
						document.getElementById("area2").value='';
						document.getElementById("area2").disabled='disabled';
		}
}
function habilitar_combos2(){

if (document.getElementById("checkbox2").checked==true){
	
	document.getElementById("tipoobs").disabled='';
	document.getElementById("area3").disabled='';
	}else{
			document.getElementById("tipoobs").disabled='disabled';
			document.getElementById("area3").value='';
			document.getElementById("area2").disabled='disabled';
		}
		
}

function combochanger(){

	var cod=document.formElem.tipo2.options[document.formElem.tipo2.selectedIndex].value;
	//document.getElementById.formElem.tt.value=cod;
	document.getElementById('clase').value=cod

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
<body onload="cerrar();">
<strong align="center">REGISTRAR RENOVACION CORRESPONDIENTE AL PERIODO <?php echo $_GET['fi'].' AL '.$_GET['ff']; ?></strong>
<form id="formElem" name="formElem"  method="post" action="../MVC_Controlador/cajaC.php?acc=renovarcoti&gral=<?php echo ($_GET['gral'])?>&obs=<?php echo ($_GET['obs']);?>">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="1050" height="144" border="0">

    <tr>
      <td height="26" bgcolor="#CCCCCC">Nro de Dcto</td>
      <td width="194" bgcolor="#CCCCCC"><label for="doc"></label>
        <input name="doc"  type="text" class="texto" id="doc" value="<?php echo $_GET['doc']; ?>" readonly="readonly" />
        <input type="hidden" name="idreg" id="idreg" value="<?php echo $_GET['idreg']; ?>" size="6"/>
        <input type="hidden" name="codvendedor" id="codvendedor" value="<?php echo $_GET['udni']; ?>"  />
        <input type="hidden" name="n_idreg" id="n_idreg" value="<?php echo $n_idreg; ?>" /></td>
      <td width="51" bgcolor="#CCCCCC">Moneda</td>
      <td width="201" bgcolor="#CCCCCC"><?php $venMO = ListaMonedaC();?>
      
          <select name="moneda" id="moneda" class="Combos texto">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($venMO as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$moneda){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
      <td width="62" bgcolor="#CCCCCC">Estado</td>
      <td width="406" bgcolor="#CCCCCC">Fecha
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
        <select name="tipo" id="tipo" class="Combos texto" >
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          
          <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$tipocoti){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          <?php echo $tipocoti ?>
        
          <?php }?>
        </select>&nbsp;</td>
      <td bgcolor="#CCCCCC">IGV</td>
      <td bgcolor="#CCCCCC"><input name="igv" type="text" disabled="disabled" id="igv" value="0.18" size="5" maxlength="5" readonly="readonly" />
        %Cotizacion Padre
          <label for="c_cotipadre"></label>
        <input name="c_cotipadre" type="text" id="c_cotipadre" value="<?php echo $coti; ?>" readonly="readonly" /></td>
      </tr>
    <tr>
      <td width="110" height="24" bgcolor="#CCCCCC"><strong>Razon Social</strong></td>
      <td colspan="5" bgcolor="#CCCCCC"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
        <a href="#"> 
        <input name="razon" type="text" id="razon"  size="35"  class="texto" value="<?php echo $razon; ?>" />
        <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/></a>Ruc
        <input name="rucdni" class="texto" type="text" id="rucdni" size="12" maxlength="12" value="<?php echo $ruc; ?>"/>         
        Codigo
        
        <input name="hc" type="text" id="hc" size="15" class="texto" value="<?php echo $codcli; ?>"/>
        Direccion
        <input name="direc" type="text" id="direc" size="35" class="texto"value="<?php echo $direccion; ?>" />
        usuario:
       
        <input name="usr" type="text" id="usr" size="5" value="<?php echo $_GET['udni']; ?>" /></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#999966">Asunto</td>
      <td colspan="5" bgcolor="#999966"><label for="ruc">
        <input name="asunto" type="text" class="texto" id="asunto" size="40" value="<?php echo $asunto ?>"/>
        Contacto
          <input name="contacto" type="text" class="texto" id="contacto" size="15" value="<?php echo $contacto; ?>" />
        Correo
        <input name="correo" type="text" class="texto" id="correo" size="15" value="<?php $mail; ?>"/>
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
        <input type="button" name="button3" id="button3" value="Botón" onclick="linki()"/></td>
    </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF">
        
        <textarea name="area2" id="area2" cols="70" rows="5"><?php echo $descrip ?></textarea>
        
        <input type="text" name="ppp" id="ppp" /></td><?php */?>
      
   <!--   </form>-->
      </tr>
    <tr>
      <td height="26" colspan="6" bgcolor="#FFFFFF">
      <a style='cursor: pointer;' onClick="muestra_oculta('contenido_a_mostrar')" title="">VER GLOSA DETALLE<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>
<div id="contenido_a_mostrar">
<table width="1050" bgcolor="#CCCCCC">
    <tr>
      <td height="26" bgcolor="#CCCCCC" style="color:#F00">Descripcion General Nota: Si desea cambiar glosa active el check y copie el contenido caso contrario desactivar el check</td>
      <td height="26" bgcolor="#FFFFFF"><select disabled="disabled"   name="variodescrip" id="variodescrip" onchange="llenardescrip()" class="Combos texto">
        <option value="0">.::SELECCIONE::.</option><?php $ven = ListaCotiVariosCoti2C();?>
        <?php foreach($ven as $item){?>
        <option    value="<?php echo $descrip=utf8_encode(strip_tags($item["descripcion"]))?>"><?php echo $item["titulo"]?></option>
        <?php }	?>
      </select>
        <input name="checkbox" type="checkbox" id="checkbox"   onclick="habilitar_combos()" value="1" />
        Cambiar Glosa
        <label for="checkbox2"></label></td>
      </tr>
    <tr>
      <td width="374" height="26" valign="top" bgcolor="#FFFFFF"><textarea name="area2" id="area2" cols="70" rows="15">
        <?php /*?><?php echo  (strip_tags(utf8_decode($glosa))) ?><?php */?>
		<?php 
		
//		$valor=preg_replace('/<br \/>/','\n', $_GET['gral']); 
                               //echo $val=WriteHTML( $_GET['gral']);

		//echo nl2br(strip_tags(utf8_decode(($valor)))); ?></textarea>
        
      </td>
      <td width="664" height="26" valign="top" bgcolor="#FFFFFF">
	  <?php echo (($_GET['gral']));?>
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo utf8_decode($_GET['gral']);?>" /></td>
        
      
      <!--   </form>-->
    </tr>
    </table>
</td>
    </tr>
    </table>
  </fieldset>
<!-- -->
<fieldset class="fieldset legend">
   
    <legend style="color:#03C"><strong>Detalle (01=Venta Prod || 17=Serv. Alquiler || 15=Serv. Mantenimiento|| 02=Serv. Flete || 19 Venta Serv. Otro)</strong></legend>
    <table id="tablaDiagnosticox" width="1051" border="0">
      <tr>
        <td width="1361" height="31" colspan="6" bgcolor="#CCCCCC"><table width="1045" border="0">
            <tr>
              <td width="35">Tipo</td>
              <td width="218" height="26"><?php $ven = ListaTipoC();?>
                <select name="tipo2" id="tipo2" onchange="combochanger();" class="Combos texto" >
                           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
            <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_numitm"].'-'.$item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
              <td width="178"><?php /*?><?php $ruta = RutasListaC();?><select name="rutas" id="rutas" onchange="llenarcombo();" class="Combos texto">
               <option value="0">.::SELECCIONE::.</option>
                 <?php foreach($ruta as $item){?>
            <option value="<?php echo $item["r_precio"]?>"><?php echo $item["r_origen"].'-'.$item["r_destino"]?></option>
            <?php }	?>
              </select><?php */?>
              <input type="hidden" name="clase" id="clase" />
              <input type="hidden" name="zzglosa" id="zzglosa" /></td>
              <td width="117"><!--<input type="hidden" name="codcont" id="codcont" />--></td>
              <td width="89">&nbsp;</td>
              <td width="31">&nbsp;</td>
              <td width="91"><input name="nomtipo" class="textos" type="text" id="nomtipo" value="Tipo Cambio" size="14" readonly="readonly" />   
			  <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			?></td>
              <td width="64">

<label for="prueba"></label>
<input type="text" name="prueba" class="texto" size="10" id="prueba" value="<?php echo $tipocambio  ?>"/>
<label for="aplicartipo"></label></td>
              <td width="27">&nbsp;</td>
              <td width="153"><input type="radio" name="radio" id="tsoles" value="tsoles" onclick="aplicacambiosolesadolares();" />                <input type="radio" name="radio" id="tipodolares" value="tipodolares" onclick="aplicacambiodolaresasoles();" />
         </td>
            </tr>
        </table></td>
      </tr>
      <tr>
    <td height="24" colspan="6" bgcolor="#CCCCCC">
          
          Concepto
<input name="descripcion" type="text" id="descripcion" size="35" class="texto"  onchange="validarclie();"/>
      <a href="#"> <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>Cod
      <input name="codigo" type="text"  id="codigo" size="15" readonly="readonly" class="texto" />
      <label></label>
      Precio <!--   -->
      <input name="precio" type="text" id="precio" size="10" onkeyup="copia();" class="texto" />
      <label for="textfield3"></label>
      
      Dscto
 		
      <input name="dscto" type="text" class="texto" id="dscto" value="0.00" size="10"/>
      Cantidad
      <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="5" />
      
      <input name="glosa" type="text" id="glosa" size="5" />
<label for="checkbox"></label>
      <input name="imp" type="hidden" id="imp" size="10"  class="texto"/>
      <input type="hidden" name="impo" id="impo" />
      <input type="hidden" name="codigofamilia" id="codigofamilia" />
      <input type="hidden" name="descuentox" id="descuentox" />      
     <a href="#" onclick="accion()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a><a href="#" onclick="eliminarDiagnosticos();"><!--<img align="top" src="../images/errorr.png" width="16" height="16" border="0" />--></a></td>
    </tr>

      <tr>
        <td colspan="6" >
        <table width="1462" border="0" id="tablaDiagnostico">
          <tr>
            <th width="30"  bgcolor="#66CCCC"><strong>Cod<strong></th>
            <th width="210" bgcolor="#66CCCC"><strong>Descripcion</strong></th>
            <th width="210" bgcolor="#66CCCC"><strong>Glosa</strong></th>
            <th width="107" bgcolor="#66CCCC"><strong>Equipo</strong></th>
            <th width="296" bgcolor="#66CCCC"><strong>Periodo</strong></th>
            <th width="34"  bgcolor="#66CCCC"><strong>clase</strong></th>
            <th width="42"  bgcolor="#66CCCC"><strong>Precio</strong></th>
            <th width="39"  bgcolor="#66CCCC"><strong>Dscto</strong></th>
            <th width="32"  bgcolor="#66CCCC"><strong>Cant</strong></th>
            <th width="53"  bgcolor="#66CCCC"><strong>Importe</strong></th>
            <th width="363" align="left"bgcolor="#66CCCC"><strong>Delete</strong></th>
            </tr>
            <?php 
			if($Obtenercotizaciones != NULL){		
					$i = 1;
					foreach($Obtenercotizaciones as $itemD){
						
							?>
          <tr>
            <td bgcolor="#CCCCCC"><input type="checkbox" name="<?php echo "re".$i;?>" id="<?php echo "re".$i;?>" 
 value="<?php echo $itemD['n_idreg'];?>" checked="checked" />
 
 <input type="hidden" id="<?php echo "codigo".$i; ?>"  name="<?php echo "codigo".$i; ?>" readonly  size="5" value="<?php echo $itemD["c_codprd"]; ?>" class="texto" /></td>
            <td bgcolor="#CCCCCC"><strong>
              <input type="text" id="<?php echo "descripcion".$i; ?>"  name="<?php echo "descripcion".$i; ?>"  size="35" value="<?php echo $itemD["c_desprd"]; ?>" class="texto" />
            </strong></td>
             <td height="24" bgcolor="#CCCCCC"><strong>
               <input type="text" id="<?php echo "glosa".$i; ?>"  name="<?php echo "glosa".$i; ?>"  size="35" value="<?php echo 'DEL '.$itemD["d_finicio"].' AL '.$itemD["d_ffin"]; ?>" class="texto" />
             </strong></td>
             <td bgcolor="#CCCCCC"><input type="text" class="texto" id="<?php echo "codcont".$i; ?>"  name="<?php echo "codcont".$i; ?>"  size="15" value="<?php echo $itemD["c_codequipo"]; ?>"  />
             
              <input type="hidden" id="<?php echo "codequipo".$i; ?>"  name="<?php echo "codequipo".$i; ?>" value="<?php echo $itemD["c_codequipo"]; ?>" />
             &nbsp;</td>
             <td bgcolor="#CCCCCC">
             
      del
        <input name="<?php echo "fini".$i; ?>" type="text" class="texto" id="<?php echo "fini".$i; ?>" size="10" value="<?php echo $fi=$itemD["d_finicio"];  ?>"/>
     <?php /*?> <img src="../images/calendario.jpg" id="<?php echo "ImageQ".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" /><?php */?>
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fini"+<?php echo $i ?>,
					ifFormat   : "%d-%m-%Y",
					button     : "ImageQ"+<?php echo $i ?>
					  }
					);
		 </script>
      al
     
      <input name="<?php echo "ffin".$i; ?>" type="text" class="texto" id="<?php echo "ffin".$i; ?>" size="10" value="<?php echo $ff=$itemD["d_ffin"];  ?>" />
     <?php /*?> <img src="../images/calendario.jpg" id="<?php echo "Images".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'"/><?php */?>
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "ffin"+<?php echo $i ?>,
					ifFormat   : "%d-%m-%Y",
					button     : "Images"+<?php echo $i ?>
					  }
					);
		 </script>&nbsp;
         
         <?php 

$fini=$fi;
$ffin=$ff;
		 
$fi = explode ('/',$fini);
$xfi= $fi[0].-$fi[1].-$fi[2];

$ff = explode ('/',$ffin);
$xff= $ff[0].-$ff[1].-$ff[2];

$dias=diasEntreFechas($xfi,$xff)+1;

echo 'dias: '.number_format($dias,0);


?>
         
         
         
         </td>
    <td bgcolor="#CCCCCC"><strong>
      <label for="textfield4"></label>
      <!--<input name="glosa1" type="text" id="glosa1" size="30" />--><input type="text" id="<?php echo "clase".$i; ?>"  name="<?php echo "clase".$i; ?>"  size="5" value="<?php echo $itemD["c_clase"]; ?>" class="texto">
    </strong></td>
    <td bgcolor="#CCCCCC"><strong>
       <input type="text" id="<?php echo "precio".$i; ?>"  name="<?php echo "precio".$i; ?>"  size="5" value="<?php echo $itemD["n_importe"]; ?>" class="texto">
      </strong></td>
      
       <td bgcolor="#CCCCCC"><strong>
       <input type="text" id="<?php echo "dscto".$i; ?>"  name="<?php echo "dscto".$i; ?>"  size="5" value="<?php if($itemD["n_dscto"]==""){ echo '0.0';}else{echo $itemD["n_dscto"];}; ?>" class="texto">
      </strong></td>
      
    <td bgcolor="#CCCCCC"><strong>
      <input type="text" id="<?php echo "cantidad".$i; ?>"  name="<?php echo "cantidad".$i; ?>"  size="5" value="<?php echo $itemD["n_cant"]; ?>" onkeyup="actualizar_importe(this.name);" class="texto">
      </strong></td>
    <td bgcolor="#CCCCCC"><strong>
      <input type="text" id="<?php echo "imp".$i; ?>"  name="<?php echo "imp".$i; ?>"  size="5" value="<?php echo $itemD["n_importe"]; ?>" class="texto" />
    </strong></td>
    <td bgcolor="#CCCCCC"><input type="button" name="button3" id="button3" value="delete" onclick="eliminarUsuario(this)" /></td>
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
      <input name="lugar" type="text" id="lugar" size="35" class="texto"value="" />
       Tiempo de entrega      
      <input name="tiempo" type="text" id="tiempo" size="35" class="texto" value="<?php echo $tiempoentrega; ?>"/></td>
    </tr>
  <tr>
    <td width="131" bgcolor="#CCCCCC">Plazo de Entrega</td>
    <td width="915" bgcolor="#CCCCCC"><?php $ven = ListaPlazoC();?>
      <select name="plazo" id="plazo" lass="Combos texto">
        <?php foreach($ven as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$plazoentrega){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>      
      Precios
           <select name="C_PRECIOS" id="C_PRECIOS"><?php $con = ListaCondicionC();?>
       <?php foreach($con as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$precios){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>   
             Validez
      <input name="validez" type="text" class="texto" id="validez" size="20" value="<?php echo $validez; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">  <a style='cursor: pointer;' onClick="muestra_oculta2('contenido_a_mostrar2')" title="">VER OBSERVACIONES<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>      
      <div id="contenido_a_mostrar2">
<table width="1050" bgcolor="#CCCCCC">
      <tr>
        <td width="590"  height="26" bgcolor="#CCCCCC" style="color:#F00">Observaciones Nota: Si desea cambiar la observacion active el check y copie el contenido caso contrario desactivar el check</td>
        <td colspan="3"  bgcolor="#FFFFFF"><?php $ven = ListaCotiVariosCoti3C();?>
          <select name="tipoobs" disabled="disabled" id="tipoobs" onchange="llenardescrip2()" class="Combos texto">
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
      <td height="26" colspan="2" valign="top" bgcolor="#FFFFFF">
        
        <textarea name="area3" id="area3" cols="80" rows="15">
		</textarea>
        </td>
      <td width="447" height="26" colspan="2" valign="top" bgcolor="#FFFFFF"><?php echo ($_GET['obs']);?>&nbsp;
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
    <legend style="color:#03C"><strong></strong></legend><table width="1020" border="0">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><input name="st" type="hidden" id="st"  size="10" readonly="readonly" class="texto"  value="0"/></td>
    <td align="center" bgcolor="#CCCCCC"><input name="im" class="texto" type="hidden" id="im" value="0" size="10" readonly="readonly" />
      <label for="glosa1"></label>      <input name="descuento" type="hidden" id="descuento" value="0" size="10" /></td>
    <td width="219" align="center" bgcolor="#CCCCCC"><label for="textfield7"></label>      <label for="bi"><strong>
          <input name="bi" type="hidden" id="bi" class="texto" value="0" size="10" readonly="readonly" />
    </strong></label>
      <label for="textfield2"></label></td>
  </tr>
  </table>
  
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Operaciones</strong></legend>
   <table width="1020" border="0" align="">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><span class="buttons">
      <input type="button" name="button" class="boton" id="button" value="GRABAR" onclick="grabaform()" />
      <input type="reset" name="button2" id="button2" class="boton" value="CANCELAR" />
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
