<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
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
	//var sw=document.formElem.vcombo.value;
//	var sw=document.getElementById("vcombo").value
//	var sw=document.getElementById("vcombo").value;
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
	//document.formElem.precio.focus();
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

tr.innerHTML += "<td ><input name='" + descripcion + "' type='text'  id='" + descripcion + "' size='40' /><input name='" + glosa + "' type='text'  id='" + glosa + "' size='30' /><input name='" + clase + "' type='text'  id='" + clase + "' size='10' /></td>";

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
function actualizar_importe()
			{
				//tecla = (document.all) ? e.keyCode : e.which;
//				if (tecla == 13)
//	{
sumar=0;

for(var i=1; i<=sec; i++)
	{
	var	valor=(parseFloat(document.getElementById("cantidad"+i).value)*parseFloat(document.getElementById("precio"+i).value)-
		parseFloat(document.getElementById("dscto"+i).value)) ;	




document.getElementById("imp"+i).value=valor.toFixed(2);

	}

}	
function sumarcolumnatabla(){
sumar=0;

	for(var i=1; i<=sec; i++)
	{
sumar+=parseFloat(document.getElementById("precio"+i).value)*parseFloat(document.getElementById("cantidad"+i).value)-
		parseFloat(document.getElementById("dscto"+i).value);	

	}
	//wsumar=parseFloat(sumar).toFixed(2);
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
	if(document.getElementById('descripcion1').value==""){
		
		alert ('Falta Detalle de Cotizacion');
		document.formElem.descripcion.focus() 
		return 0;
		}
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
<body onload="cargaload();">
<strong align="center">SEGUIMIENTO DE SERVICIO DE TRANSPORTE</strong>
<form action="../MVC_Controlador/cajaC.php?acc=guardacoti"  method="post" enctype="multipart/form-data" name="formElem" id="formElem">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos del Servicio</strong></legend>
    
    <table width="1030" border="0">
  <tr>
    <td bgcolor="#99CC99">N° Servicio      </td>
    <td bgcolor="#99CC99"><input name="doc" type="text" class="texto"  disabled="disabled" id="doc" value="AUTOGENERADO"  /></td>
    <td width="139" bgcolor="#99CC99">Fecha Solicitud</td>
    <td width="109" bgcolor="#99CC99"><label for="fecsolicitus"></label>
      <input name="fecsolicitus" type="text" id="fecsolicitus" size="12"  class="texto"/></td>
    <td width="195" bgcolor="#99CC99">Cotizacion      </td>
    <td width="275" bgcolor="#99CC99"><input name="referencia" type="text" id="referencia" size="40"  class="texto" /></td>
    </tr>
  <tr>
    <td width="142" bgcolor="#99CC99">Fecha de Registro</td>
    <td width="144" bgcolor="#99CC99"><label for="fecini">
      <input name="fregistro" type="text" id="fregistro" size="12" class="texto"   value="<?php echo date("d/m/Y G:i:s") ?>"/>
    </label></td>
    <td bgcolor="#99CC99"><label for="solicitante"></label>
      <label for="tipotrans">Fecha Inicio</label></td>
    <td bgcolor="#99CC99"><input name="fecini" type="text" id="fecini" size="12" class="texto" /></td>
    <td bgcolor="#99CC99">Descripcion de Mercaderia.
      <label for="descmer"></label>
      <label for="select3"></label></td>
    <td bgcolor="#99CC99"><input type="text" name="descmer" id="descmer" class="texto"/></td>
    </tr>
  <tr>
    <td bgcolor="#99CC99">Solicitante</td>
    <td bgcolor="#99CC99"><select name="solicitante" id="solicitante" class="Combos texto">
      </select></td>
    <td bgcolor="#99CC99">Tipo Transporte</td>
    <td bgcolor="#99CC99"><select name="tipotrans" id="tipotrans"  class="Combos texto">
      </select></td>
    <td bgcolor="#99CC99">Tipo de Ruta</td>
    <td bgcolor="#99CC99"><select name="tiporuta" id="tiporuta"  class="Combos texto">
      </select></td>
  </tr>
  </table>

  </fieldset>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos del Cliente</strong></legend>
    <table width="1035" height="80" border="0">

    <tr>
      <td width="68" height="24" bgcolor="#CCCCCC"><strong>Cliente</strong></td>
      <td width="247" bgcolor="#CCCCCC"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
        <a href="#"> 
          <input name="razon" type="text" id="razon" value="" size="35"  class="texto" onfocus="validacombos()"/>
          <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/></a></td>
      <td width="53" bgcolor="#CCCCCC">Ruc </td>
      <td width="90" bgcolor="#CCCCCC"><input name="rucdni" class="texto" type="text" id="rucdni" size="12" maxlength="12" /></td>
      <td width="96" bgcolor="#CCCCCC">Codigo</td>
      <td width="177" bgcolor="#CCCCCC"><input name="hc" type="text" id="hc" size="15" class="texto"/></td>
      <td width="58" bgcolor="#CCCCCC">Direccion</td>
      <td width="212" bgcolor="#CCCCCC"><input name="direc" type="text" id="direc" size="35" class="texto" /></td>
      </tr>
    <tr>
      <td height="24" bgcolor="#CCCCCC">Contacto</td>
      <td bgcolor="#CCCCCC"><input name="contacto" type="text" class="texto" id="contacto" size="15" /></td>
      <td bgcolor="#CCCCCC">Correo</td>
      <td bgcolor="#CCCCCC"><input name="correo" type="text" class="texto" id="correo" size="15"/></td>
      <td bgcolor="#CCCCCC">Telefono</td>
      <td bgcolor="#CCCCCC"><input name="telefono" type="text" class="texto" id="telefono" size="8" /></td>
      <td bgcolor="#CCCCCC">Nextel</td>
      <td bgcolor="#CCCCCC"><input name="nextel" type="text" class="texto" id="nextel" size="9" /></td>
      </tr>
    <tr>
      <td height="24" bgcolor="#CCCCCC">Asunto</td>
      <td colspan="7" bgcolor="#CCCCCC"><input name="asunto" type="text" class="texto" id="asunto" size="40" /></td>
      </tr>
    </table>
  </fieldset>
<!-- -->
<fieldset class="fieldset legend">
   
    <legend style="color:#03C"><strong>Datos del Transportista</strong></legend>
    <table width="1040">
  <tr>
    <td width="136" bgcolor="#0099FF">Empresa</td>
    <td bgcolor="#0099FF"><label for="empresa"></label>
      <input name="empresa" type="text" id="empresa" size="35"  class="texto"/>      Ruc
      <label for="ructransporte"></label>
      <input name="ructransporte" type="text" id="ructransporte" size="12" class="texto" /></td>
    <td bgcolor="#0099FF">Placa Vehiculo </td>
    <td bgcolor="#0099FF"><input type="text" name="placa" id="placa" class="texto" /></td>
    <td bgcolor="#0099FF">Mtc</td>
    <td bgcolor="#0099FF"><input type="text" name="mtc" id="mtc" class="texto"/></td>
    </tr>
  <tr>
    <td bgcolor="#0099FF">Chofer</td>
    <td width="333" bgcolor="#0099FF"><input name="chofer" type="text" class="texto" id="chofer" size="30"/></td>
    <td width="109" bgcolor="#0099FF">Licencia</td>
    <td width="144" bgcolor="#0099FF"><input type="text" name="licencia" id="licencia" class="texto"/></td>
    <td width="133" bgcolor="#0099FF">Movil Chofer</td>
    <td width="157" bgcolor="#0099FF"><label for="movilchofer"></label>
      <input type="text" name="movilchofer" id="movilchofer" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">Observaciones</td>
    <td colspan="5" bgcolor="#0099FF"><label for="obst"></label>
      <input name="obst" type="text" id="obst" size="100" class="texto"/>
      Cord. de Transporte
      <input type="text" name="coordinador" id="coordinador" class="texto"/></td>
  </tr>
    </table>

</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Entrega</strong></legend>
    <table  width="1036" border="0">
      <tr>
        <td width="116" height="24" bgcolor="#9999CC">Tipo Contenedor          </td>
        <td width="272" height="24" bgcolor="#9999CC"> <a href="#"> 
          <input name="descripcion" type="text" id="descripcion" size="35" class="texto"  />
        <img src="../images/search.png" alt="2" width="16" height="16" border="0"  title="Buscar Articulo"  onclick="ventanaArticulos()" onmouseover="style.cursor=cursor"/></a><input name="codigo" type="hidden"  id="codigo" size="15" readonly="readonly" class="texto" /></td>
        <td width="131" height="24" bgcolor="#9999CC">Codigo Contenedor
          <label for="codigocontenedor2"></label>
        <label for="select2"></label></td>
        <td width="120" height="24" bgcolor="#9999CC"><input name="codigocontenedor" type="text" class="texto" id="codigocontenedor" size="20"/></td>
        <td width="375" height="24" colspan="2" bgcolor="#9999CC">Generador
          <select name="select" id="select">
            <option value="000">Ninguno</option>
            <option value="001">Clip-on</option>
            <option value="002">Undermound</option>
        </select>
          Combustible
          <label for="combustible"></label>
          <input name="combustible" type="text" id="combustible" size="10" class="texto" /></td>
      </tr>
      <tr>
        <td height="24" colspan="6" bgcolor="#9999CC">Codigo Generador 
          <label for="codgenerador"></label>
          <input type="text" name="codgenerador" id="codgenerador" class="texto"/>
          Punto Partida
<label for="partida"></label>
          <label for="llegada"></label>
        <label for="textfield"></label>
        <input type="text" name="partida" id="partida" class="texto"/>          
        Punto Llegada
          <input type="text" name="llegada" id="llegada" class="texto"/>          Precinto Nro 
        <input type="text" name="preciento" id="precinto" class="texto" /></td>
      </tr>
      <tr>
        <td height="24" colspan="6" bgcolor="#9999CC">
          Observaciones
<label for="obse"></label>
        <input name="obse" type="text" id="obse" size="100" class="texto"/></td>
      </tr>
      <tr>
        <td colspan="6" ></td>
      </tr>
    </table>
</fieldset>

<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Seguimiento</strong></legend>
    <table width="1035" border="0">
  <tr>
    <td width="93" bgcolor="#99CC99">Tarifa Pactada</td>
    <td width="234" bgcolor="#99CC99"><label for="tarifapactada"></label>
      <input type="text" name="tarifapactada" id="tarifapactada" class="texto"/></td>
    <td width="113" bgcolor="#99CC99">Adelanto</td>
    <td width="183" bgcolor="#99CC99"><label for="adelanto"></label>
      <input type="text" name="adelanto" id="adelanto"class="texto"/></td>
    <td width="79" bgcolor="#99CC99">Restante</td>
    <td width="208" bgcolor="#99CC99"><label for="restante"></label>
      <input type="text" name="restante" id="restante" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#99CC99">Banco</td>
    <td bgcolor="#99CC99"><label for="banco"></label>
      <select name="banco" id="banco" class="combo texto">
      </select></td>
    <td bgcolor="#6699CC">Cta Cte</td>
    <td bgcolor="#99CC99"><label for="ctapago"></label>
      <input type="text" name="ctapago" id="ctapago" class="texto"/></td>
    <td bgcolor="#99CC99">Titular</td>
    <td bgcolor="#99CC99"><label for="titular"></label>
      <input type="text" name="titular" id="titular" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#99CC99">Observaciones</td>
    <td colspan="5" bgcolor="#99CC99"><label for="obspago"></label>
      <input name="obspago" type="text" id="obspago" size="100" class="texto"/></td>
    </tr>
</table>

  </fieldset>



<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Resultado de Servicio</strong></legend>
    <table width="1031" border="0">
  <tr>
    <td width="164" bgcolor="#CC99FF">Nro de Guia Remision</td>
    <td bgcolor="#CC99FF"><label for="guiaremision"></label>
      <input type="text" name="guiaremision" id="guiaremision" class="texto" />
      Fecha GR
      <label for="fecrm"></label>
      <input name="fecrm" type="text" id="fecrm" size="10" class="texto" /><img src="../images/calendario.jpg" name="Imagefg" id="Imagefg" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecrm",
					ifFormat   : "%d/%m/%Y",
					button     : "Imagefg"
					  }
					);
		 </script>Nro Guia Transportista
      <label for="guiatransporte"></label>
      <input type="text" name="guiatransporte" id="guiatransporte" class="texto"/>
      Fecha GT
      <label for="fecgt"></label>
      <input name="fecgt" type="text" id="fecgt" size="10" class="texto" /><img src="../images/calendario.jpg" name="fecgt2" id="fecgt2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecgt",
					ifFormat   : "%d/%m/%Y",
					button     : "fecgt2"
					  }
					);
		 </script></td>
    </tr>
  <tr>
    <td bgcolor="#CC99FF">Resultado De Servicio</td>
    <td bgcolor="#CC99FF"><label for="select3"></label>
      <select name="select2" id="select3" class="combo texto">
      </select></td>
    </tr>
  <tr>
    <td bgcolor="#CC99FF">Observaciones</td>
    <td bgcolor="#CC99FF"><label for="obsresultado"></label>
      <input name="obsresultado" type="text" id="obsresultado" size="100" /></td>
    </tr>
</table>

  </fieldset>





<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Seguimiento</strong></legend>
    <table width="1033" height="60" border="0" id="tablaDiagnostico">
      <tr>
        <td height="31" colspan="6">Tipo Fecha Hora Ubicacion Descrip.Seguimiento Descrip Incidencia<a href="#" onclick="add();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;</a><a href="#" onclick="eliminarDiagnosticos();"><img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" /></a></td>
      </tr>
      <tr>
        <td width="40" height="21"  bgcolor="#000000" style="color:#FFF"><strong>Item</strong></td>
        <td width="98"  bgcolor="#000000" style="color:#FFF"><strong>TIPO Seguimiento</strong></td>
        <td width="110"  bgcolor="#000000" style="color:#FFF"><strong>Fecha y Hora Seguimiento</strong></td>
        <td width="143"  bgcolor="#000000" style="color:#FFF"><strong>Ubicacion</strong></td>
        <td width="194"  bgcolor="#000000" style="color:#FFF"><strong>Descripcion Seguimiento</strong></td>
        <td width="422"  bgcolor="#000000" style="color:#FFF"><strong>Descripcion de Incidencia </strong></td>

      </tr>
  <tr>
  
    </tr>
</table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"></legend>
    <table width="1020" border="0" align="">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><span class="buttons">
       <input type="reset" name="button4" id="button4" value="NUEVO" class="button" />
      <input type="button" name="GUARDAR" id="GUARDAR" value="GUARDAR" class="button" onclick="grabaform()" />
      <input type="button" name="button5" id="button5" value="CERRAR DOCUMENTO" class="button" />
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
