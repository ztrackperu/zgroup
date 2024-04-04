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
		$c_obsdoc=$item['c_obsdoc'];
		$c_gencrono=$item['c_gencrono'];
		$c_meses=$item['c_meses'];
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
	$("#codcont1").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont1").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont1").val(data[0]);
		$("#codequipo1").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>
<script type="text/javascript">	
	$().ready(function() {
	$("#codcont2").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont2").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont2").val(data[0]);
		$("#codequipo2").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>
<script type="text/javascript">	
	$().ready(function() {
	$("#codcont3").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont3").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont3").val(data[0]);$("#codequipo3").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>
<script type="text/javascript">	
	$().ready(function() {
	$("#codcont4").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont4").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont4").val(data[0]);$("#codequipo4").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>

<script type="text/javascript">	
	$().ready(function() {
	$("#codcont5").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont5").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont5").val(data[0]);$("#codequipo5").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>


<script type="text/javascript">	
	$().ready(function() {
	$("#codcont6").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont6").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont6").val(data[0]);$("#codequipo6").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>



<script type="text/javascript">	
	$().ready(function() {
	$("#codcont7").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont7").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont7").val(data[0]);$("#codequipo7").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>

<script type="text/javascript">	
	$().ready(function() {
	$("#codcont8").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont8").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont8").val(data[0]);$("#codequipo8").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>


<script type="text/javascript">	
	$().ready(function() {
	$("#codcont9").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont9").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont9").val(data[0]);$("#codequipo9").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>


<script type="text/javascript">	
	$().ready(function() {
	$("#codcont10").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont10").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont10").val(data[0]);$("#codequipo10").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>
<script type="text/javascript">	
	$().ready(function() {
	$("#codcont10").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codcont10").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#codcont10").val(data[0]);$("#codequipo10").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>


<script type="text/javascript">

		
$().ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=proauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
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
		
		tabla = document.getElementById("tablaDiagnostico");
		var tr = document.createElement("tr");
		tr.id = "fila" + sec;
	
tr.innerHTML = "<td bgcolor='#CCCCCC'>" + sec + " <input type='hidden' id='" + codigo + "' name='" + codigo + "' readonly size='10'/> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + descripcion + "' type='text'  id='" + descripcion + "' size='40' readonly='readonly'/><input name='" + glosa + "' type='text'  id='" + glosa + "' size='30' readonly='readonly' /></td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + precio + "' type='text'  id='" + precio + "' size='10' readonly='readonly'/></td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + dscto + "' type='text'  id='" + dscto + "' size='10' readonly='readonly'/> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + cantidad + "' type='text' id='" + cantidad + "' size='10'/> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input  value='0' name='" + imp + "' type='text'  id='" + imp + "' size='10' readonly='readonly' />  </td>";
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
				agregarDiagnosticos();
		escribirDiagnosticos();
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
function eliminarDiagnosticos()
{
/*if(document.getElementById("codigo" + sec).value == "")
	{
		escribirDiagnostico();
	}*/
	
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
		
		document.getElementById("st").value="0.00";
		document.getElementById("im").value="0.00";
		
		document.getElementById("bi").value="0.00";
alert("No hay filas para eliminar");
	}
	

}
function actualizar_importe()
			{
				//tecla = (document.all) ? e.keyCode : e.which;
//				if (tecla == 13)
//	{
sumar=0;

for(var i=1; i<=sec; i++)
	{
		valor=parseFloat(document.getElementById("cantidad"+i).value)*parseFloat(document.getElementById("precio"+i).value)-parseFloat(document.getElementById("dscto"+i).value);	

document.getElementById("imp"+i).value=valor;

	}

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
	
function limpiarvalida(){
	
	document.getElementById("valdata").value="0";
	}

</script>


                    
<script language="JavaScript"> 

function xxxabreVentana(){
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

}
</script>
<script language="javascript">
function grabaform(){
/*for(i=1;i<=15;i++){
	var checkboxes = document.getElementById("re"+i).value;
	var cont = 0; 
 
for (var x=0; x < checkboxes.length; x++) {
 if (checkboxes[x].checked) {
  cont = cont + 1;
 }
}
}
if(cont<=0){
alert ("No ha seleccionado ningun Item a Facturar");
return 0;

}*/
	
	/*document.getElementById('iglosa1').contentWindow.graba1();
	document.getElementById('iglosa2').contentWindow.graba2();  */
	//parent.iglosa1.graba1();
	//window.iglosa1.graba1();
	//window.iglosa2.graba2()
/*if(!document.getElementById('contrato').checked && !document.getElementById('letra').checked && !document.getElementById('carta').checked && document.getElementById('feccond').value=="" && document.getElementById('ca').value=='1' ){
	alert("Si no cuenta con requisitos coloque fecha de regularizacion");
	alert('NO OLVIDE EL TIPO DE PAGO');
	document.formElem.feccond.focus() 
		return 0;
		}
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}*/

if(document.getElementById('ca').checked=='1'){
		document.getElementById('feccond').disabled=false;
	document.getElementById('obscond').disabled=false;
	document.getElementById('letra').disabled=false;
		document.getElementById('carta').disabled=false;
	document.getElementById('contrato').disabled=false;
	document.getElementById('cronograma').disabled=false;
		document.getElementById('meses').disabled=false;
	//alert('selecciono si');
	
	}else{
		
	//alert('selecciono no');	
		document.getElementById('cronograma').disabled=true;
		document.getElementById('meses').disabled=true;
	document.getElementById('letra').disabled=true;
	document.getElementById('carta').disabled=true;
	document.getElementById('contrato').disabled=true;
	document.getElementById('letra').checked=false;
	document.getElementById('carta').checked=false;
	document.getElementById('contrato').checked=false;
	document.getElementById('feccond').disabled=true;
	document.getElementById('obscond').disabled=true;
	document.getElementById('feccond').value=="";
	document.getElementById('obscond').value=="";
		}

if( !document.getElementById('contrato').checked && !document.getElementById('letra').checked && !document.getElementById('carta').checked && document.getElementById('feccond').value=="" && document.getElementById('ca').value=='1' ){
	alert("Si no cuenta con requisitos coloque fecha de regularizacion");
	alert('NO OLVIDE EL TIPO DE PAGO');
	document.formElem.feccond.focus() 
		return 0;
		}
}





function contar() {
 /*<!-- var checkboxes = document.getElementById("formElem").re; //Array que contiene los checkbox

  var cont = 0; //Variable que lleva la cuenta de los checkbox pulsados

  for (var x=0; x < checkboxes.length; x++) {
   if (checkboxes[x].checked) {
    cont = cont + 1;
   }
  }
 
  alert ("El número de checkbox pulsados es " + cont);-->*/
 // document.getElementById("formElem").submit();&& document.getElementById('fini'+y).value=='' 
 }
function recorretext(){

	for(var y = 1;y <=20;y++){	
		
if(document.getElementById('re'+y).checked==true){
if(document.getElementById('clase'+y).value=='017' && document.getElementById('codcont'+y).value=='' ){
		alert('Falta Codigo de Equipo')
		//document.getElementById('codcont'+y).focus();
		document.getElementById('valdata').value='0';
				return 0;
				
		}else if(document.getElementById('clase'+y).value=='017' &&  document.getElementById('fini'+y).value=='' ){
			document.getElementById('valdata').value='1';
				alert('Falta Fechas Alquiler')
		//document.getElementById('codcont'+y).focus();
		document.getElementById('valdata').value='0';
				return 0;
			//alert ('todo ok')}
}else{
	document.getElementById('valdata').value='1';
	}
	}
	/*if( document.getElementById('re'+y).checked==true && document.getElementById('codcont'+y).value!='' && document.getElementById('fini'+y).value==''){
		alert('Falta Periodo de Alquiler')
		document.getElementById('fini'+y).focus();
				return 0;
				
		}*/
		}//fin for
	
//alert('hola') validadata
}

function validar(){
		var cod=document.formElem.meses.options[document.formElem.meses.selectedIndex].text
	    
		if(cod!=0 && document.getElementById("cronograma").checked==false){
		alert('Marque Check de Cronograma');
		return 0;
		}
		
	if(document.getElementById('valdata').value=='0'){
		alert ('Aun Falta Datos Por Validar / Presione El Boton Validar Datos');
		return 0;
	}else{
		if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
		}
}

function graba1(){
	if(sec==1){
		
if( document.getElementById('re1').checked==false ){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}

	if(sec==2){
		
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}

	if(sec==3){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false ){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}
	if(sec==4){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}
	if(sec==5){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
  && document.getElementById('re5').checked==false){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}	

	if(sec==6){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}

	if(sec==7){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
     && document.getElementById('re7').checked==false ){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}
	if(sec==8){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}


if(sec==9){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}

if(sec==10){
if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
 && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false){
	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
	return 0;
	}

//
//if(sec==11){
//if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
// && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
//  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
//     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false && document.getElementById('re11').checked==false){
//	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
//	return 0;
//	}
//
//
//if(sec==12){
//if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
// && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
//  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
//     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false && document.getElementById('re11').checked==false && document.getElementById('re12').checked==false){
//	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
//	return 0;
//	}
//if(sec==13){
//if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
// && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
//  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
//     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false && document.getElementById('re11').checked==false && document.getElementById('re12').checked==false && document.getElementById('re13').checked==false){
//	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
//	return 0;
//	}
//	
//if(sec==14){
//if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
// && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
//  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
//     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false && document.getElementById('re11').checked==false && document.getElementById('re12').checked==false && document.getElementById('re13').checked==false && document.getElementById('re14').checked==false){
//	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
//	return 0;
//	}
//
//if(sec==15){
//if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
// && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
//  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
//     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false && document.getElementById('re11').checked==false && document.getElementById('re12').checked==false && document.getElementById('re13').checked==false && document.getElementById('re14').checked==false && document.getElementById('re15').checked==false){
//	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
//	return 0;
//	}
//	
//if(sec==16){
//if( document.getElementById('re1').checked==false && document.getElementById('re2').checked==false
// && document.getElementById('re3').checked==false && document.getElementById('re4').checked==false
//  && document.getElementById('re5').checked==false && document.getElementById('re6').checked==false
//     && document.getElementById('re7').checked==false && document.getElementById('re8').checked==false && document.getElementById('re9').checked==false && document.getElementById('re10').checked==false && document.getElementById('re11').checked==false && document.getElementById('re12').checked==false && document.getElementById('re13').checked==false && document.getElementById('re14').checked==false && document.getElementById('re15').checked==false && document.getElementById('re16').checked==false){
//	alert('Seleccione Un Item a Facturar En caso Alquiler Codigo Equipo / Fechas');
//	return 0;
//	}
	
	if(confirm("Seguro de Actualizar Cotizacion  ?")){
	document.getElementById("formElem").submit();
	}
	}	


}// fin funcion ///


function habilitar_combos(){

if (document.getElementById("checkbox").checked==true){
	
	document.getElementById("variodescrip").disabled='';
	}else{
			document.getElementById("variodescrip").disabled='disabled';
						document.getElementById("area2").value='';
		}
}
function habilitar_combos2(){

if (document.getElementById("checkbox2").checked==true){
	
	document.getElementById("tipoobs").disabled='';
	}else{
			document.getElementById("tipoobs").disabled='disabled';
			document.getElementById("area3").value='';
		}
}

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
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigos&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"clase="+clas,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
			
}

function prodform(){
	alert('Seleccione numero de meses');
	}
	

function abreVentanaF(obj){

	var valor=obj
		
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verfechas&udni=<?php echo $udni;?>&val="+valor,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			
			
}
</script>

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


</head>
<body onload="cerrar();">
<strong align="center">APROBACION / FACTURACION DE COTIZACIONES</strong>
<form id="formElem" name="formElem"  method="post" action="../MVC_Controlador/cajaC.php?acc=adicionacoti&gral=<?php echo ($_GET['gral'])?>&obs=<?php echo ($_GET['obs']);?>">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="1050" height="144" border="0">
    <tr>
      <td height="26" bgcolor="#CCCCCC">Nro de Dcto</td>
      <td width="194" bgcolor="#CCCCCC"><label for="doc"></label>
        <input name="doc"  type="text" class="texto" id="doc" value="<?php echo $cotizacion;?>" readonly="readonly" />
        <input type="hidden" name="codvendedor" id="codvendedor" value="<?php echo $_GET['udni']; ?>"  />
        <input type="hidden" name="n_idreg" id="n_idreg" value="<?php echo $n_idreg; ?>" /></td>
      <td width="51" bgcolor="#CCCCCC">Moneda</td>
      <td width="201" bgcolor="#CCCCCC"><?php $venMO = ListaMonedaC();?>
      
          <select name="moneda" id="moneda" class="Combos texto" disabled="disabled">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($venMO as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$moneda){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
            </select>&nbsp;</td>
      <td width="62" bgcolor="#CCCCCC">Estado</td>
      <td width="406" bgcolor="#CCCCCC">Fecha
        <label for="fecha"></label>
        <input name="fecha"  type="text" class="texto"  id="fecha" value="<?php echo date('d/n/Y');?>" size="12" maxlength="12" readonly="readonly" /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
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
 <select name="vendedor" id="vendedor" class="Combos texto" disabled="disabled">
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
           <option value="<?php echo $item["tv_codi"]?>"<?php if($item["tv_codi"]==$vendedor){?>selected<?php }?>><?php echo $item["tv_nomb"]?></option>
          <?php }	?>
        </select></td>
      <td bgcolor="#CCCCCC">Tipo</td>
      <td bgcolor="#CCCCCC"><label for="tipo"></label><?php $ven = ListaTipoC();?>
        <select name="tipo" id="tipo" class="Combos texto" disabled="disabled">
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>       
          <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$tipocoti){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          <?php echo $tipocoti ?>        
          <?php }?>
        </select>&nbsp;</td>
      <td bgcolor="#CCCCCC">IGV</td>
      <td bgcolor="#CCCCCC"><input name="igv" type="text" disabled="disabled" id="igv" value="0.18" size="5" maxlength="5" readonly="readonly" />
        %
          <label for="useraprob"></label>
        <input name="useraprob" type="text" id="useraprob" value="<?php echo $_GET['udni']; ?>" readonly="readonly" /></td>

      </tr>
    <tr>
      <td width="110" height="24" bgcolor="#CCCCCC"><strong>Razon Social</strong></td>
      <td colspan="5" bgcolor="#CCCCCC"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
        <a href="#"> 
        <input name="razon" type="text"  class="texto" id="razon" value="<?php echo $razon?>"  size="35" readonly="readonly" />
        <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/></a>Ruc
        <input name="rucdni" type="text" class="texto" id="rucdni" value="<?php echo $ruc; ?>" size="12" maxlength="12" readonly="readonly"/>         
        Codigo
        
        <input name="hc" type="text" class="texto" id="hc" value="<?php echo $codcli; ?>" size="15" readonly="readonly"/>
        Direccion
        <input name="direc" type="text" class="texto" id="direc"value="<?php echo $direccion; ?>" size="35" readonly="readonly" />Dcto Ref
     
        <input type="text" size="10" name="c_numocref" id="c_numocref"  class="texto" value="<?php echo $c_numocref ?>" /></td>
      </tr>
    <tr>
      <td height="26" bgcolor="#999966">Asunto</td>
      <td colspan="5" bgcolor="#999966"><label for="ruc">
        <input name="asunto" type="text" class="texto" id="asunto" value="<?php echo $asunto; ?>" size="40" readonly="readonly"/>
        Contacto
          <input name="contacto" type="text" class="texto" id="contacto" value="<?php echo $contacto; ?>" size="15" readonly="readonly" />
        Correo
        <input name="correo" type="text" class="texto" id="correo" value="<?php echo $mail; ?>" size="15" readonly="readonly"/>
        Telefono
        <input name="telefono" type="text" class="texto" id="telefono" value="<?php echo $telefono; ?>" size="8" readonly="readonly" />
        Nextel
        <input name="nextel" type="text" class="texto" id="nextel" value="<?php echo $nextel; ?>" size="9" readonly="readonly" />
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
      <td height="26" colspan="6" bgcolor="#FFFFFF">
      <a style='cursor: pointer;' onClick="muestra_oculta('contenido_a_mostrar')" title="">VER GLOSA DETALLE<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>
<div id="contenido_a_mostrar">
<table width="1050" bgcolor="#CCCCCC">
    <tr>
      <td height="26" bgcolor="#FFFFFF" style="color:#F00">Descripcion General <?php $ven = ListaCotiVariosCoti2C();?>
        Si desea cambiar glosa active el check y copie el contenido caso contrario desactivar el check</td>
      <td height="26" bgcolor="#FFFFFF"><select disabled="disabled"   name="variodescrip" id="variodescrip" onchange="llenardescrip()" class="Combos texto">
        <option value="0">.::SELECCIONE::.</option><?php $ven = ListaCotiVariosCoti2C();?>
        <?php foreach($ven as $item){?>
        <option    value="<?php echo $descrip=utf8_encode(strip_tags($item["descripcion"]))?>"><?php echo utf8_encode($item["titulo"])?></option>
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
		//echo nl2br(strip_tags(utf8_decode(($valor)))); 
		
		?></textarea>
        
      </td>
      <td width="664" height="26" valign="top" bgcolor="#FFFFFF">
	  <?php // echo (($_GET['gral']));?>
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
    <table id="tablaDiagnosticox" width="1300" border="0">
      <tr>
        <td width="6042" colspan="6" >
        <table width="1242" border="0" id="tablaDiagnostico">
          <tr>
            <td width="57" height="21" bgcolor="#66CCCC">#</td>
            <td width="557" bgcolor="#66CCCC"><strong>Descripcion</strong></td>
            <td width="142"bgcolor="#66CCCC"><strong>Codigo Equipo</strong></td>
            <td width="43"bgcolor="#66CCCC"><strong>Clase</strong></td>
            <td width="270"bgcolor="#66CCCC"><strong>Fechas de alquiler</strong></td>
            <td width="147"bgcolor="#66CCCC"><strong>Importe</strong></td>
            </tr>
            <?php 
							if($Obtenercotizaciones != NULL)
							{		
							$i = 1;
							foreach($Obtenercotizaciones as $itemD)
							{
							?>
          <tr>
             <td height="24" bgcolor="#CCCCCC"><?php echo $i ?>
               <input type="checkbox" name="<?php echo "re".$i;?>" id="<?php echo "re".$i;?>" 
 value="<?php echo $itemD['n_id'];?>" onclick="limpiarvalida();"/>
      </td>
    <td bgcolor="#CCCCCC"><strong>
      <input type="hidden" id="<?php echo "codigo".$i;?>"  name="<?php echo "codigo".$i;?>" readonly  size="5" value="<?php echo $itemD["c_codprd"];?>" />
      <input type="text" id="<?php echo "descripcion".$i; ?>"  name="<?php echo "descripcion".$i; ?>"  size="35" value="<?php echo $itemD["c_desprd"]; ?>">
      <label for="textfield4"></label>
      
      <input  name="<?php echo "glosa".$i; ?>" type="text" id="<?php echo "glosa".$i; ?>" value="<?php echo $itemD["c_obsdoc"]; ?>"  size="35" readonly="readonly">

    </strong></td>
    <td bgcolor="#CCCCCC"><strong>
      <input  name="<?php echo "codcont".$i; ?>" type="text" id="<?php echo "codcont".$i; ?>" onclick="abreVentana(this.name,'<?php echo $itemD["c_codprd"]; ?>','<?php echo $itemD["clase"]; ?>')"  value="<?php echo $itemD["c_codcont"]; ?>"  size="15" readonly="readonly" />
      <input type="hidden" id="<?php echo "codequipo".$i; ?>"  name="<?php echo "codequipo".$i; ?>" value="<?php echo $itemD["c_codcont"]; ?>" />
    </strong></td>
    <td bgcolor="#CCCCCC"><?php /*?><select name="<?php echo "tipo".$i; ?>" id="<?php echo "tipo".$i; ?>"><?php $ven = ListaTipoC();?>
      <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
          <?php }?>
        </select><?php */?>
        <label for="clase"></label>
<input type="text" size="5"  name="<?php echo "clase".$i; ?>"  id="<?php echo "clase".$i; ?>" value="<?php echo $itemD["clase"]; ?>" readonly="readonly"/>
        
        </td>
    <td bgcolor="#CCCCCC">
      del
        <input name="<?php echo "fini".$i; ?>" type="text" id="<?php echo "fini".$i; ?>" size="10" value="<?php echo $itemD["c_fecini"]; ?>" onclick="abreVentanaF(this.name)" />
      <img src="../images/calendario.jpg" id="<?php echo "ImageQ".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fini"+<?php echo $i ?>,
					ifFormat   : "%d/%m/%Y",
					button     : "ImageQ"+<?php echo $i ?>
					  }
					);
		 </script>
      al
     
      <input name="<?php echo "ffin".$i; ?>" type="text" id="<?php echo "ffin".$i; ?>" size="10"  value="<?php echo $itemD["c_fecfin"]; ?>" />
      <img src="../images/calendario.jpg" id="<?php echo "Images".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'"/>
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "ffin"+<?php echo $i ?>,
					ifFormat   : "%d/%m/%Y",
					button     : "Images"+<?php echo $i ?>
					  }
					);
		 </script></td>
      
       <td bgcolor="#CCCCCC"><strong>
         <input type="text" id="<?php echo "imp".$i; ?>"  name="<?php echo "imp".$i; ?>"  size="7" 
         value="<?php echo   $itemD["n_totimp"]; ?>">
         <input type="hidden" name="<?php echo "dscto".$i; ?>" id="<?php echo "dscto".$i; ?>" 
         value="<?php echo $itemD["n_dscto"]; ?>" size="3">
         <input type="hidden" name="<?php echo "cant".$i; ?>" id="<?php echo "cant".$i; ?>" 
         value="<?php echo $itemD["n_canprd"]; ?>" size="3">
         
       </strong></td>
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
    <legend style="color:#03C">
    
    Condiciones Alquiler
Si
<input type="radio" name="ca" id="ca" value="1" onclick="grabaform()" />
| No 
<input name="ca" type="radio" id="ca" value="0" checked="checked" onclick="grabaform()" />
</legend>
<table width="1197" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
 <td height="29" bgcolor="#FFCCCC"><input name="contrato" type="checkbox" id="contrato" value="001" disabled="disabled"/>
        Contrato 
      <input name="letra" type="checkbox" id="letra" value="002" disabled="disabled" />
        Letra Garantia
        <input name="carta" type="checkbox" id="carta" value="003" disabled="disabled"/>
        Carta Fianza | Generar/Actualizar Cronograma Alquiler
        <input name="cronograma" type="checkbox"  id="cronograma" onclick="" value="1"  <?php if($c_gencrono=='1'){?> checked="checked"<?php }?>/>
        Meses 
         <select name="meses" id="meses" >
           <option value="0">0</option>
    <?php $venMO=ListadiasC();?>
 
      <?php foreach($venMO as $item){?>
      
    
 <option value="<?php echo $item["tm_codi"]?>"<?php if($item["tm_codi"]==$c_meses){?>selected<?php }?>><?php echo $item["tm_desc"]?></option>     
      
      
      <?php }	?>
    </select>
        Fecha Inicio Alquiler<input name="fecalq" type="text" class="texto" id="fecalq" size="12" /><img src="../images/calendario.jpg" name="xfecalq" id="xfecalq" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecalq",
					ifFormat   : "%d/%m/%Y",
					button     : "xfecalq"
					  }
					);

		 </script></td>
    </tr>
  <tr>
    <td height="27" bgcolor="#CCCCCC">Fecha de Regularizacion en caso de no contar con los requisito 
   
      <input name="feccond" type="text" disabled="disabled" class="texto" id="feccond" size="12" /><img src="../images/calendario.jpg" name="Ifeccond" id="Ifeccond" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "feccond",
					ifFormat   : "%d/%m/%Y",
					button     : "Ifeccond"
					  }
					);

		 </script></td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC">Observacion 
      <label for="obscond"></label>
      <input name="obscond" type="text" disabled="disabled" class="texto" id="obscond" size="150" /></td>
    </tr>
</table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C">Datos de Entrega</legend><table width="1050" border="0">
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
      <input name="lugar" type="text" class="texto" id="lugar"value="<?php echo $lugarentrega; ?>" size="35" readonly="readonly" />
       Tiempo de entrega      
      <input name="tiempo" type="text" class="texto" id="tiempo" value="<?php echo $tiempoentrega; ?>" size="35" readonly="readonly"/></td>
    </tr>
  <tr>
    <td width="119" bgcolor="#CCCCCC">Facturar a:</td>
    <td width="927" bgcolor="#CCCCCC"><?php $ven = ListaPlazoC();?>
      <select name="plazo" id="plazo" lass="Combos texto">
        <?php foreach($ven as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$plazoentrega){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>      
      Precios
      <label for="zprecio"></label>
     
      <select name="zprecio" id="zprecio" disabled="disabled"><?php $con = ListaCondicionC();?>
       <?php foreach($con as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$precios){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>   
             Validez
      <input name="validez" type="text" class="texto" id="validez" value="<?php echo $validez; ?>" size="20" readonly="readonly"/></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">  <a style='cursor: pointer;' onClick="muestra_oculta2('contenido_a_mostrar2')" title="">VER OBSERVACIONES<img src="../images/Transfer Document.png" alt="" width="32" height="32" /></a>      
      <div id="contenido_a_mostrar2">
<table width="1050" bgcolor="#CCCCCC">
      <tr>
 <td width="537" height="26" bgcolor="#FFFFFF" style="color:#F00">Condiciones Si desea cambiar la observacion active el check y copie el contenido caso contrario desactivar el check</td>
        <td colspan="3" bgcolor="#FFFFFF"><?php $ven = ListaCotiVariosCoti3C();?>
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
      <td width="500" height="26" colspan="2" valign="top" bgcolor="#FFFFFF"><?php //echo ($_GET['obs']);?>&nbsp;
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
    <legend style="color:#03C"></legend>
    </fieldset>
    <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Operaciones</strong></legend>
    <table width="1020" border="0" align="">
    <tr>
      <td align="center" bgcolor="#CCCCCC" style="color:#930"><input name="validadata" type="button" id="validadata" onclick="recorretext();" value="Validar Datos" />
        <label for="checkbox3">
          <input name="valdata" type="text" id="valdata" value="0" size="5" />
        </label>
        
        
        </td>
    </tr>
    <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><span class="buttons">
    <input type="button" name="button" class="button" id="button" value="Facturar" onclick="validar()" />
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
</form>
<p></p>
</body>
</html>
