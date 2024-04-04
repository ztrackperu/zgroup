<?php 
if($resultado1!=NULL)
{
	foreach ($resultado1 as $item1)
	{
		$udni=$item1['login'];
	}
}
?>
<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
	$c_numeoc=$item['c_numeoc'];
	$c_tipooc=$item['c_tipooc'];	
	$c_codmon=$item['c_codmon'];	
	
	$c_codcon=$item['c_codcon'];	
	$n_tcoc=$item['n_tcoc'];
	
	$c_nomprov=$item['c_nomprv'];
	$c_codprov=$item['c_codprv'];
	$b_importac=$item['b_importac']; //0 - 1
	$n_porigv=$item['n_porigv'];
	
	//$c_oper=$item['c_oper'];	
	
		
	$d_fecoc=$item['d_fecoc'];	
	$c_codpag=$item['c_codpag'];
	
	$c_codlug=$item['c_codlug'];
	$c_deslug=$item['c_deslug'];
	
	$c_codtran=$item['c_codtran'];
	$c_nomtran=$item['c_nomtran'];
	
	
	$d_fecent=$item['d_fecent'];
	$c_lugent=$item['c_lugent'];
	$c_obsoc=$item['c_obsoc'];
	
	$c_pais=$item['c_pais'];
	$c_icote=$item['c_icote'];
	$c_puerto=$item['c_puerto'];
	$c_depo=$item['c_depo'];
	
	///////////////////////////////////////
		
	$n_bruafe=$item["n_bruafe"];
	$n_desafe=$item["n_desafe"];
	$n_netafe=$item["n_netafe"];
	$n_igvafe=$item["n_igvafe"];
	$n_totoc=$item["n_totoc"];	
	
	$n_totimp=$item["n_totimp"]; //detalle no se muestra en el formulario
	
	$cantDiagnosticos += 1;
	
	}
}




 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Registro Orden De Compra</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
<script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>

<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script type="text/javascript">

function Cambiatipooc(){
document.getElementById('idtipooc').value=document.form1.c_tipooc.options[document.form1.c_tipooc.selectedIndex].value;
	//alert('hola');

	}
	
	
	<!--Buscar Referencia de cotizacion
$().ready(function() {
	$("#c_refcoti").autocomplete("../MVC_Controlador/cajaC.php?acc=cargar_coti_guia", {
		width: 400, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_refcoti").result(function(event, data, formatted) {
	
		$("#c_refcoti").val(data[1]);
		//$("#idcli").val(data[3]);
		//$("#idcoti").val(data[1]);
		//$("#hiddenField2").val(data[3]);
		//document.getElementById('textfield3').focus();nombreguia
	});
	
});
	
	<!--Buscar transportista (proveedor)-->
$().ready(function() {
	$("#c_nomtran").autocomplete("../MVC_Controlador/ComprasC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomtran").result(function(event, data, formatted) {
		$("#c_nomtran").val(data[2]);
		$("#hc1").val(data[1]);
		
		
		
	});
});

// PARA BUSCAR EL PRODUCTO
$().ready(function() {
	//realiza la funcion de autocompletar mientras se digita
	$("#descripcion").autocomplete("../MVC_Controlador/ComprasC.php?acc=proautocoti", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	
	//coloca los datos en el formulario
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
		$("#medida").val(data[4]);
		$("#tipo").val(data[6]);
		
	});
	
});

//funcion para desabilitar el transportista y se guarde sin transportista
	function rhtrans(){
	if(document.form1.c_rhtrans.checked==false){
	document.getElementById('xc_rhtrans').value=document.form1.c_rhtrans.value='1';
	document.getElementById('c_nomtran').disabled=false;
	}else{
		document.getElementById('xc_rhtrans').value='0';
		document.getElementById('c_nomtran').value='';
		document.getElementById('hc1').value='';
		
		document.getElementById('c_nomtran').disabled=true;
		document.getElementById('hc1').disabled=true;
		
		}
	
	}
	
	
	function ValidarPrecio(){
	var valor = document.getElementById("precio").value;
    if( isNaN(valor) ) {		
    //var val= false;				
				
			jAlert('El numero ingresado no es valido', 'Mensaje del Sistema');
			
		     document.getElementById("precio").value="";
			 document.getElementById("precio").focus();
			
    }else{
	//var val= true;	
	        //document.getElementById("precio").value=valor;
	}
	
	
}
	
function ValidarDes(){
	var valor = document.getElementById("dscto").value;
    if( isNaN(valor) ) {		
    //var val= false;				
				
			jAlert('El numero ingresado no es valido', 'Mensaje del Sistema');
			
		     document.getElementById("dscto").value="0";
			 document.getElementById("dscto").focus();
			
    }else{
	//var val= true;	
	        //document.getElementById("precio").value=valor;
	}
	
	
}	
	
	
	
	
	//funcion para validar que la fecha de entrega debe ser mayor a la fecha de registro
function ValidarFecha(){
	var fech1 = document.getElementById("fecha").value;
	var fech2 = document.getElementById("c_fecentrega").value;

	if((Date.parse(fech2)) < (Date.parse(fech1))){
	jAlert('La fecha Entrega no puede ser Menor a la fecha Registro', 'Mensaje del Sistema');
	//document.getElementById("c_fecentrega").select();
	document.getElementById("c_fecentrega").value="";
	document.getElementById("c_fecentrega").focus();
	}
}
	

function moneda(){
	document.getElementById('idmoneda').value=document.form1.c_codmod.options[document.form1.c_codmod.selectedIndex].value;
	
	}
	
		
function formapago(){
	document.getElementById('idc_codpag').value=document.form1.c_codpag.options[document.form1.c_codpag.selectedIndex].value;
	
	}
	
function Cambialugarate(){
document.getElementById('idatencion').value=document.form1.lat.options[document.form1.lat.selectedIndex].text;
	//alert('hola');

	}	
	
	
	
	
	
	
	
function accion(){
	
	
	//VALIDAR QUE SE HAYA SELECCIONADO UNA MONEDA

var cod=document.form1.c_codmod.options[document.form1.c_codmod.selectedIndex].text;
var codserv=document.getElementById('codigo').value;


if(cod=='.::SELECCIONE::.'){
	jAlert('Ingrese Moneda', 'Mensaje del Sistema');
		document.form1.c_codmod.options[document.form1.c_codmod.selectedIndex].focus;
	return 0;
	}
	
	//VALIDAR QUE SE HAYA ESCRITO UNA DESCRIPCION Y UN PRECIO
	
	if(document.getElementById("codigo").value==""){
	jAlert('Codigo del Producto No Existe', 'Mensaje del Sistema');
		document.getElementById("descripcion").focus();
	return 0;
}
	
	if(document.getElementById('precio').value==''){
		jAlert('Ingrese Precio Unitario', 'Mensaje del Sistema');
		document.getElementById('precio').focus();
		return 0;
		}
		
		
		//PRODUCTO KARDEX DETALLADO;
		
		if(document.getElementById('tipo').value=='D' && document.getElementById('cantidad').value>1){
		
	jAlert('Producto Kardex detallado/n Cantidad debe ser 1', 'Mensaje del Sistema')
	
		document.getElementById("cantidad").value="";
		document.getElementById("cantidad").focus();
		return 0;
		//limpiadatosdetalle();
	
		}
		
		
		if(document.getElementById('tipo').value=='D' && document.getElementById('serie').value==''){			
		jAlert('Producto Kardex detallado/n Requiere serie de Equipo', 'Mensaje del Sistema')
		
		document.getElementById("serie").focus();
		return 0;
			
		}	
	
	
	agregarUsuario();
	sumarcolumnatabla();
	limpiadatosdetalle();	
	
	
}

function limpiadatosdetalle(){
		
	document.getElementById("codigo").value="";
	document.getElementById("descripcion").value="";
	document.getElementById("medida").value="";	
	document.getElementById("tipo").value="";		
	
	document.getElementById("precio").value="";
	document.getElementById("cantidad").value="1";	
	document.getElementById("dscto").value="0";
	
	document.getElementById("serie").value="";
	document.getElementById("glosa").value="";
	
	document.getElementById("descripcion").focus();	

	//document.getElementById("c_codmod").disabled = true;
	//document.getElementById("c_rh").disabled = true;
	//return 0;
	}

</script>



<script type="text/javascript">	

function sumarcolumnatabla(){
sumar=0;
calculo=0;
var hc=document.getElementById('xc_rh').value; //con igv o sin igv
var iniciost=document.getElementById("st").value; //importe
var dscto3=document.getElementById("dsctof").value; //descuentofinal
var xsub=document.getElementById("sub").value; //subtotal
var ig2=document.getElementById("igv").value;
var inicio=document.getElementById("bi").value; //total


var dscto2=document.getElementById("dscto").value; //captura el descuento ingresado


var tot=parseFloat(document.getElementById("precio").value)*parseFloat(document.getElementById("cantidad").value);	
//descuentos
/*var v1=dscto2/100;
var des=parseFloat(tot)*(1+v1); ///total*1.dscto
var de=parseFloat(des)-parseFloat(tot); //monto de descuento
var subdes=de+parseFloat(dscto3); //descuento final
*/
var de= (tot*dscto2)/100;
var subdes=de+parseFloat(dscto3); //descuento final



//subtotales
var subt=tot+parseFloat(iniciost);
//var subt2=subt-subdes;
var subt2=subt-subdes;

//igv

if(hc==0){ //sin importacion o sin check
var igv=parseFloat(subt2)*1.18;
}else{ // importacion o con check
var igv=parseFloat(subt2)*1;	
}
var ig=parseFloat(igv)-parseFloat(subt2);
var subigv=ig;//+parseFloat(ig2);

//total
var total=subt2+subigv;

	document.getElementById("st").value=(Math.floor(subt*100))/100;
	document.getElementById("dsctof").value=(Math.floor(subdes*100))/100; 
	document.getElementById("sub").value=(Math.floor(subt2*100))/100;
	document.getElementById("igv").value=(Math.floor(subigv*100))/100;
	document.getElementById("bi").value=(Math.floor(total*100))/100; 

}
function calculartotales(){
var hc=document.getElementById('xc_rh').value;
sumar=0;
xdescu=0;
igv=0;
total=0;
descu=0;
subt=0;
des1=0;
v2=0;
de=0;

for(var i=1; i<=50; i++)
{
if(!document.getElementById("imp"+i)){
}else{
	
	//descuentos
	
	
sumar+=parseFloat(document.getElementById("imp"+i).value);
xdescu+=parseFloat(document.getElementById("xdscto"+i).value); //30 el descuento no se acumula
/*var v2=descu/100;
var des1=parseFloat(sumar)*(1+v2);
var de=parseFloat(des1)-parseFloat(sumar);*/

var subt=sumar-xdescu;
if(hc==0){
 ig1=subt*1.18;
}else{
	 ig1=subt*1;
}
var igv=ig1-subt;
var total=subt+igv;
}
}
//limpiatotales();
document.getElementById("st").value=(Math.floor(sumar*100))/100; 
document.getElementById("dsctof").value=(Math.floor(xdescu*100))/100;
document.getElementById("sub").value=(Math.floor(subt*100))/100;  
document.getElementById("igv").value=(Math.floor(igv*100))/100;
document.getElementById("bi").value=(Math.floor(total*100))/100; 
}	


function actualizar_importe(obj){

var cant=obj;//cantidadX
var condicion=cant.substring(0, 8);
var condicion2=cant.substring(0, 6);

if(condicion=='cantidad'){
//var dscto;
var p=cant.substring(8,10);
}else if(condicion2=='precio'){
var p=cant.substring(6,8);
	}else{
	var p=cant.substring(5,7);
	
		}



//*/importe
var pr=parseFloat(document.getElementById("precio"+p).value)
var ca=parseFloat(document.getElementById("cantidad"+p).value)
var de=parseFloat(document.getElementById("dscto"+p).value);

var	valor=pr*ca;
		
		

//importe de la tabla		
document.getElementById("imp"+p).value=valor; 


//calcular la cantidad de descuento en soles	
ndesc=(valor*de)/100;	

document.getElementById("xdscto"+p).value=ndesc;	//obtener en un campo oculto xdscto el acumulativo de descuento en cantidad
		
var valorf=valor-ndesc; //importe - descuentos
document.getElementById("impf"+p).value=valorf;


calculartotales();	

}	

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
function cerrar() {

div = document.getElementById('contenido_a_mostrar');
//div2=document.getElementById('contenido_a_mostrar2');
div.style.display='none';
//div2.style.display='none';

//document.getElementById("area2").disabled='disabled';
//document.getElementById("area3").disabled='disabled';

}


</script>


<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo=valor+1;

function agregarUsuario(){
	
	nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='codigo"+posicionCampo+"' type='text' id='codigo"+posicionCampo+ "' size='13' readonly='readonly' class='texto'></td>";  
		 
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='descripcion"+posicionCampo+"' type='text' id='descripcion"+posicionCampo+ "' size='27' readonly='readonly' class='texto'></td> ";
		
		nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='medida"+posicionCampo+"' type='text' id='medida"+posicionCampo+ "' size='10' readonly='readonly' class='texto'></td> ";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='serie"+posicionCampo+"' type='text'  id='serie"+posicionCampo+"'  size='22'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='glosa"+posicionCampo+"' type='text'  id='glosa"+posicionCampo+"'  size='20'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='cantidad"+posicionCampo+"' type='text'  id='cantidad"+posicionCampo+"'  size='5' onkeyup='actualizar_importe(this.name);' class='texto'/>";
				
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='precio"+posicionCampo+"' type='text' onkeyup='actualizar_importe(this.name);'   id='precio"+posicionCampo+"'  size='5'  class='texto'/>";

		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='imp"+posicionCampo+"' type='text'  id='imp"+posicionCampo+"'  size='5' readonly='readonly' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='dscto"+posicionCampo+"' type='text' onkeyup='actualizar_importe(this.name);'   id='dscto"+posicionCampo+"'  size='5'  class='texto'/><td bgcolor='#CCCCCC'><input name='xdscto"+posicionCampo+"' type='hidden'  id='xdscto"+posicionCampo+"'  size='5'  class='texto' />";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='impf"+posicionCampo+"' type='text'  id='impf"+posicionCampo+"'  size='5'  class='texto'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		

		escribirDiagnostico(posicionCampo);
		posicionCampo++;
	
		
    }


function escribirDiagnostico(posicionCampo)
{
	calcularimporte();

			codigo = document.getElementById("codigo" + posicionCampo);
			codigo.value = document.form1.codigo.value;
			
			descripcion = document.getElementById("descripcion" + posicionCampo);
			descripcion.value = document.form1.descripcion.value;
			
			medida = document.getElementById("medida" + posicionCampo);
			medida.value = document.form1.medida.value;
			
			serie = document.getElementById("serie" + posicionCampo);
			serie.value = document.form1.serie.value;
						
			
			glosa = document.getElementById("glosa" + posicionCampo);
			glosa.value = document.form1.glosa.value;
			
		
			cantidad = document.getElementById("cantidad" + posicionCampo);
			cantidad.value = document.form1.cantidad.value;
			
			precio = document.getElementById("precio" + posicionCampo);
			precio.value = document.form1.precio.value;
			
			imp = document.getElementById("imp" + posicionCampo);
			imp.value = document.form1.imp.value;
			
			dscto = document.getElementById("dscto" + posicionCampo);
			dscto.value = document.form1.dscto.value;
			
			
			xdscto = document.getElementById("xdscto" + posicionCampo);
			xdscto.value = document.form1.xdscto.value;
			
			
			
			impf = document.getElementById("impf" + posicionCampo);
			impf.value = document.form1.impf.value;
			
			
			
}


function calcularimporte(){ // calcula los campos de abajo
	//importe
	var precio=document.getElementById("precio").value;
	//var dscto=document.getElementById("dscto").value;
	var cant=document.getElementById("cantidad").value;
	
	 
	 var total=parseFloat(precio)*parseFloat(cant);
	
	document.form1.imp.value=total; //importe
	
	
	var desc=document.getElementById("dscto").value;
	var des=parseFloat(desc);
	
	 var ndesc=(total*des)/100;
	 
	 document.form1.xdscto.value=ndesc; //muestra en un campo oculto (xdscto) la suma en cantidad de descuento.
	 
	  var imported=total-ndesc;
	//importe  - descuento
	document.form1.impf.value=imported;	
	
		
	}
	
	
  function eliminarUsuario(obj){

  var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
	//sumarcolumnatabla();
	calculartotales();
    }
function copia(){
	//document.getElementById("formulario_lineas").submit();
document.getElementById('imp').value = document.getElementById('precio').value;
//actualizacant();
}

function cambiaricoterms(){
		var id=document.getElementById('idicote').value=document.form1.c_icote.options[document.form1.c_icote.selectedIndex].value;
		if(id=='001'){
			
			document.getElementById('c_puerto').disabled=false;
			document.getElementById('c_depo').disabled=true;
		}else if(id=='002'){
			document.getElementById('c_depo').disabled=false;
			document.getElementById('c_puerto').disabled=true;
		}else{
			document.getElementById('c_depo').disabled=true;
			document.getElementById('c_puerto').disabled=true;
		}
}
function guarda(){
	
	if(document.getElementById('c_pais').value==''){
		jAlert ('Seleccione un pais', 'Mensaje del Sistema');
		return 0;
		}
		
		if(document.getElementById('c_icote').value==''){
		jAlert ('Seleccione un Icoterms', 'Mensaje del Sistema');
		return 0;
		}
		
		else if(document.getElementById('c_icote').value=='001' && document.getElementById('c_puerto').value==''){
		jAlert ('Seleccione un puerto', 'Mensaje del Sistema');
		return 0;
		}
		
		else if(document.getElementById('c_icote').value=='002' && document.getElementById('c_depo').value==''){
		jAlert ('Seleccione un Deposito', 'Mensaje del Sistema');
		return 0;
		}
	
	var theTable = document.getElementById('tablaDiagnostico');

cantFilas = theTable.rows.length;

		if(cantFilas==1){
		jAlert ('Falta Detalle de Orden de Compra', 'Mensaje del Sistema');
		return 0;
				}
	
	if(document.form1.c_codpag.options[document.form1.c_codpag.selectedIndex].text=='.::SELECCIONE::.'){
		jAlert ('Falta Condicion de Pago', 'Mensaje del Sistema');
		return 0;
		}
		
if(document.form1.lat.options[document.form1.lat.selectedIndex].text=='.::SELECCIONE::.'){
		jAlert ('Falta Lugar de Atencion', 'Mensaje del Sistema');
		return 0;
		}
if(document.getElementById('c_fecentrega').value==''){
		jAlert ('Seleccione la fecha de entrega', 'Mensaje del Sistema');
		return 0;
		}
	
	
	jConfirm("¿Seguro de Registrar Orden de Compra?", "Mensaje Confirmacion", function(r) {
			if(r) {
				//document.form1.submit();
				document.getElementById("form1").submit();
			} else {
				return 0;
			}
		});
	 
	 
	 
	
	}
	function ventanaArticulos(){
			var codigo=document.getElementById("hc").value;
			if (codigo=="") {
				jAlert ("debe introducir un proveedor", 'Mensaje del Sistema');
			} else {
				miPopup = window.open("../MVC_Controlador/ComprasC.php?acc=verarti&udni=<?php echo $udni;?>","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}
		
		
function ultimasoc(){
			var codigo=document.getElementById("codigo").value;
			if (codigo=="") {
				jAlert ("debe introducir un producto", 'Mensaje del Sistema');
			} else {
				miPopup = window.open("../MVC_Controlador/ComprasC.php?acc=ver_ultimasoc&udni=<?php echo $udni;?>&cod="+codigo,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}
	
		
		
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

function regresar(){
			location.href="../MVC_Controlador/ComprasC.php?acc=co01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>&sw=<?php echo $_GET['sw']; ?>"; 
}
</script>
<style>
#tablaDiagnostico td, th { padding: 0.2em; }
#tablaDiagnostico tr:nth-child(even) {background: #6CC }
#tablaDiagnostico tr:nth-child(odd) {background: #FFF}
</style>
</head>

<body topmargin="0" marginheight="0" onload="cambiaricoterms();">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ComprasC.php?acc=grabaroc&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
<strong style="text-align:center">DUPLICAR ORDEN DE COMPRA</strong>=&gt;<?php echo $_GET['udni'];  ?>

 <fieldset class="fieldset legend">
    <legend style="color:#00F"><strong>Encabezado Orden de Compra</strong></legend>
   
   <table width="990" height="90" border="0" cellpadding="0" cellspacing="0" >
  
		<tr>
		  <td width="89" height="30">Nro de Dcto:</td>
		  <td width="237">
			<input name="textfield" type="text" disabled="disabled" class="texto" id="textfield" value="001" size="5" maxlength="3" readonly="readonly" />
			<input name="c_numos" type="text" disabled="disabled"  class="texto" id="c_numos" value="Autogenerado" readonly="readonly"/>
            <input name="c_numeocant" type="hidden"  id="c_numeocant" value="<?php echo $c_numeoc ?>"/>			
		  </td>
			
		  <td width="108">Tipo de OC:</td>
		 <td width="180">
          <?php $ven = ListaTipoOC();?>
          <select name="c_tipooc" id="c_tipooc" class="Combos texto" onchange="Cambiatipooc()" >
           <option value="">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>    
   <option value="<?php echo $item["c_numitm"]?>" <?php if($item["c_numitm"]==$c_tipooc){?>selected<?php }?> ><?php echo $item["c_desitm"]?></option>
            <?php }	?>
        </select>
     <input type="hidden" name="idtipooc" id="idtipooc" value="<?php echo $c_tipooc ;?>"   />
        
        </td>
		 
		  <td width="177">Concepto:</td>
		  <td><label for="select"></label>
		<?php $ven = ListaConceptoC();?>
			<select name="c_nomcon" id="c_nomcon" class="Combos texto" onchange="conceptooc()" >
					   <option value="">.::SELECCIONE::.</option>
			  <?php foreach($ven as $item){?>
			  <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codcon){?>selected<?php }?> ><?php echo utf8_encode($item["c_desitm"])?></option>
			  <?php }	?>
			</select>
            
             <input type="hidden" name="idconcepto" id="idconcepto" value="<?php echo $c_codcon ?>"    />
            
		 </td>  
		</tr>
        
		<tr>
		  <td height="30">Moneda:</td>
		  <td>
			  <?php $ven = ListaMonedaC();  
			  ?>
				
			  <select name="c_codmod" id="c_codmod" class="Combos texto" onchange="moneda()">
           <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmon){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>
            <input type="hidden" name="idmoneda" id="idmoneda" value="<?php echo $c_codmon ; ?>"   />
			 	  
            
              
		  </td>
		  
		  <td>Fecha:</td>
		  <td>
			<label for="fecha"></label>
            
            
            
			<input name="fecha"  type="text" class="texto"  id="fecha" size="15" maxlength="12" value="<?php echo vfecha(substr($d_fecoc,0,10)) ?>" readonly="readonly"  /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
			<script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fecha",
						ifFormat   : "%d/%m/%Y",
						button     : "Image1"
						  }
						);
			 </script>
			
			
		  </td> 
          <td>T/Cambio:</td>
 <td width="192">
              <?php 
			// $tcambio = ListatipocambioC();
			//foreach($tcambio as $item){
			 //$tipocambio=$item["tc_cmp"];
			//}
			?>
            <input name="nomtipo" class="texto" type="text" id="nomtipo" value="<?php echo $n_tcoc ?>" size="14" readonly="readonly" />   
          </td> 
	  </tr>
          
		 
		<tr>		
		   <!--<td>Estado:</td>
		   <td>
			<label for="estado" type="hidden" ></label>
				<select   name="estado" id="estado" class="Combos texto"  >
			<option value="1">Generado</option>
			<option value="0">Anulado</option>
				</select>
			</td>-->		
			
		  
            
          <td height="22">Proveedor:</td>    
		  <td>
		  
         <input name="c_nomprov" type="text"  class="texto" id="c_nomprov" size="35"  value="<?php echo $c_nomprov; ?>"  />
          
		<!--<input type="text" name="c_codprov" id="c_codprov" />-->
		  </td>      
		  <td>Ruc Proveedor:</td>    
		  <td><!--<input type="text" name="hc" id="hc"  class="texto" readonly="readonly"/>-->
          <input type="text" name="hc" id="hc"  class="texto" value="<?php echo $c_codprov; ?>"    /> 
          
           <br />
           
          
          
          </td>
		<td>Decl. de Imp.: 
        
          <input type="hidden" size="5" name="xc_rh" id="xc_rh" value="<?php echo $b_importac; ?>" />
          <input type="hidden" size="5" name="porigv" id="porigv" value="<?php echo $n_porigv; ?>" />
        	&nbsp;&nbsp; &nbsp;&nbsp;<input name="c_rh" type="checkbox" id="c_rh" value="1" disabled="disabled"   />
     
         
         <script type="text/javascript">
		 
		 if(document.getElementById('xc_rh').value=='1'){
			
			document.getElementById('c_rh').checked=true;
									
			}else{
				document.getElementById('c_rh').checked=false;
										
			}		 
		 
		 </script>
          
        
        </td>		
		  <td>        
                 
			
            
             Usuario:
         <input name="c_oper" type="text" class="texto" id="c_oper" value="<?php echo $udni; ?>" size="10" readonly="readonly"/></td>    
			
	   <td width="7"></td>
        
      </tr> 
      
      <tr>
      	<td>Pais</td>
        <td> 
        	<?php $ven = listarPaisM();?>
        	<select name="c_pais" id="c_pais" class="Combos texto">
            	<option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){				
				?>
			   
				<option value="<?php echo $item["Code"];?>"<?php if($item["Code"]==$c_pais){?>selected<?php }?> ><?php echo $item["Name"];?></option>
				<?php }	?>
            </select>
        </td>
        <td>Icoterms</td>
        <td>
        <?php $ven = ListaIcotermsM();?>
        	<select name="c_icote" id="c_icote" class="Combos texto" onchange="cambiaricoterms();">
            	<option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){				
				?>
			   
				<option value="<?php echo $item["c_numitm"];?>"<?php if($item["c_numitm"]==$c_icote){?>selected<?php }?>  > <?php echo $item["c_desitm"];?></option>
				<?php }	?>
            </select>
            <input type="hidden" name="idicote" id="idicote"   />
        </td>
        <td>Puerto
         
        </td>
        <td><?php $ven = ListaPuertosM();?>
        	<select name="c_puerto" id="c_puerto" class="Combos texto" disabled="disabled">
            	<option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){				
				?>
			   
				<option value="<?php echo $item["c_numitm"]; ?>" <?php if($item["c_numitm"]==$c_puerto){?>selected<?php }?> ><?php echo $item["c_desitm"];	?></option>
				<?php }	?>
            </select></td>
        <td>Deposito       
        	
        </td>
        <td><?php $ven = ListaDepositosM();?>
        	<select name="c_depo" id="c_depo" class="Combos texto" disabled="disabled">
            	<option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){				
				?>
			   
				<option value="<?php echo $item["c_numitm"];?>" <?php if($item["c_numitm"]==$c_depo){?>selected<?php }?>  ><?php echo $item["c_desitm"];?></option>
				<?php }	?>
            </select></td>
      <tr>   
		
			  
	</table>
	
	</fieldset>		


  
  
  
  <fieldset class="fieldset legend">
    <legend style="color:#C33"><strong>Detalle Orden de Compra</strong></legend>
  
  <table width="990"  border="0" cellpadding="1" cellspacing="1">
	 <tr>
      <td width="108">Descripcion: </td>
	  <td width="216">        
            <input name="descripcion" type="text" id="descripcion" size="30" class="texto"  onchange="validarclie();" placeholder="Digite el Producto" readonly="readonly" />
          	<font color="#FF0000"> click en lupa </font><a href="#">  <img src="../images/search.png" width="15" height="15"  border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>
      </td>
	  <td width="303" >Codigo:
	 
          <input name="codigo" type="text"  id="codigo" size="15" readonly="readonly" class="texto" />
         
          <input name="medida" type="text" id="medida" size="4" class="texto" readonly="readonly"/>
          <input name="tipo" type="text" id="tipo" size="2" class="texto" readonly="readonly" />
          
		 
		</td>
		<td width="100" align="center">
		Cant.:
	  
          <label for="cantidad"></label>
        <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="5"  />
                 
     
	  
	  </td>
	  
	  
	  <td width="119" align="center">Precio U.:
	
        
        <input name="precio" type="text" id="precio" size="5"  class="texto"  onkeypress="return ValidarPrecio(event)" onclick="return ValidarPrecio(event)" />       
	  </td>
	  
	  <td width="125">	%Dscto:   
         <input name="dscto" type="text"  class="texto" id="dscto" value="0"   size="5" onkeypress="return ValidarDes(event)" onclick="return ValidarDes(event)" />
	  </td>	  
     </tr>
	  
	<tr>
	   <td>	Serie de equipo:	</td>					  
		<td>			
			  <input name="serie" type="text" class="texto" id="serie" size="23" />
	  </td>
	  <td valign="bottom">	Glosa: 
			
			  <label for="glosa"></label>
			<input name="glosa" type="text" class="texto" id="glosa" size="25" />&nbsp;&nbsp;<a href="#" onclick="accion()"><img src="../images/agregar.png" width="22" height="22" border="0" /></a>
	  </td>
      <td ><input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/> </td>
      
       <td ><input type="button" value="Ver ultimas OC"  style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;" onClick="ultimasoc();"/></td>
       
      <td>
      <input type="hidden" name="imp" id="imp" size="5" value="0"/>      &nbsp; 
	  <input type="hidden" name="impf" id="impf" value="0"/>
      
        <input name="xdscto" type="hidden" id="xdscto" size="5" value="0"/>
      
      </td>
    </tr>
   
	 
    </table>
  
  
  <table width="990" border="0" cellspacing="0" cellpadding="0" id="tablaDiagnostico">
     <tr>
     
      <td  height="40" width="101" align="center" bgcolor="#CCCCCC"><strong>Codigo</strong></td>
      <td width="191" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
      <td width="66" align="center" bgcolor="#CCCCCC"><strong>U.M</strong></td>
      <td width="153" align="center" bgcolor="#CCCCCC"><strong>Serie de Equipo</strong></td>
      <td width="155" align="center" bgcolor="#CCCCCC"><strong>Glosa</strong></td>
      <td width="67" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
      <td width="87" align="center" bgcolor="#CCCCCC"><strong>Precio</strong></td>
       <td width="98" align="center" bgcolor="#CCCCCC"><strong>Costo</strong></td> 
      <td width="90" align="center" bgcolor="#CCCCCC"><strong>%Dscto:</strong></td>
       <td width="90" align="center" bgcolor="#CCCCCC"><strong>Importe:</strong></td>  
        
      <td width="309" bgcolor="#CCCCCC"><strong>Eliminar</strong></td>
    </tr>
    

        <?php 
							if($resultado != NULL)
							{		
								$i = 1;
								foreach($resultado as $itemD)
								{
									$total+=$itemD["n_totimp"];
							?>
    <tr>
      <td>
        <input name="<?php echo "codigo".$i; ?>" type="text" id="<?php echo "codigo".$i; ?>"  value="<?php echo $itemD["c_codprd"]; ?>" class="texto" size="13" readonly="readonly" /></td>
      <td>
        <input name="<?php echo "descripcion".$i; ?>" type="text" class="texto" id="<?php echo "descripcion".$i; ?>" value="<?php echo $itemD["c_desprd"]; ?>" size="27" readonly="readonly"  /></td>
        
        <td>
        <input name="<?php echo "medida".$i; ?>" type="text" class="texto" id="<?php echo "medida".$i; ?>"  value="<?php echo $itemD["c_codund"]; ?>" size="10" readonly="readonly" /></td>
      
      <td>
        <input name="<?php echo "serie".$i; ?>" type="text" class="texto" id="<?php echo "serie".$i; ?>"  value="<?php echo $itemD["c_nroserie"]; ?>" size="22"/></td>
      
      
      
      <td>
        <input name="<?php echo "glosa".$i; ?>" type="text" class="texto" id="<?php echo "glosa".$i; ?>"  value="<?php echo $itemD["c_obsdoc"]; ?>" /></td>
        
        <td>
        <input name="<?php echo "cantidad".$i; ?>" type="text" id="<?php echo "cantidad".$i; ?>" size="5" value="<?php echo $itemD["n_canprd"]; ?>" onkeyup="actualizar_importe(this.name)" class='texto'/></td>
        
      <td>
        <input name="<?php echo "precio".$i; ?>" type="text" id="<?php echo "precio".$i; ?>" size="5" value="<?php echo $itemD["n_preprd"]; ?>" class='texto'  onkeyup="actualizar_importe(this.name)"/></td>
        
        <?php 
				
		$importe=$itemD["n_preprd"]*$itemD["n_canprd"]; //no se guarda en la base de datos		
		
		 ?>
        
        <td>
        <input name="<?php echo "imp".$i; ?>" type="text" id="<?php echo "imp".$i; ?>" size="5"   class='texto' value="<?php echo $importe ; ?>" readonly="readonly" /></td>
        
                
        <td>
        <input name="<?php echo "dscto".$i; ?>" type="text" id="<?php echo "dscto".$i; ?>" size="5"  value="<?php echo $itemD["n_dscto"]; ?>" class='texto' onkeyup="actualizar_importe(this.name)"/>
           <?php 
		
		$ndesc=($importe*$itemD["n_dscto"])/100;
		$imported=$importe-$ndesc;
		//$imported=(100-$itemD["n_dscto"])*$importe/100;		
		
		 ?>
        
        <input name="<?php echo "xdscto".$i; ?>" type="hidden" id="<?php echo "xdscto".$i; ?>" size="5" value="<?php echo $ndesc ; ?>" /></td>
        
        <td>
     
        <input name="<?php echo "impf".$i; ?>" type="text" id="<?php echo "impf".$i; ?>" size="5"  value="<?php echo $imported ; ?>" class='texto' readonly="readonly"/></td>
      
      
        
      <td><input type="button" name="delete" id="delete" value="Delete"   onclick="eliminarUsuario(this)"/></td>
    </tr>
    <?php 
					$i++;			}
								}
	?>
    </table>
    
  </fieldset>
  
  
  <fieldset class="fieldset legend">
    <legend style="color:#C33"><strong>Adicionales Orden de Compra</strong></legend>
  <table width="990" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Condicion de Pago</td>
      <td><?php $ven = ListaPlazoocM();?>
        <select name="c_codpag" id="c_codpag"  class="Combos texto" onchange="formapago()" >
         <option value="">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numitm"] ?>" <?php if($item["c_numitm"]==$c_codpag){?>selected<?php }?> > <?php echo utf8_encode($item["c_desitm"])?></option>
          <?php }	?>
        </select>
        
        
        <input type="hidden" name="idc_codpag" id="idc_codpag" value="<?php echo $c_codpag  ?>" /></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Lugar de atencion:</td>
      
       <td><?php $ven = BusquedaautolugaratencionM();?>
        <select name="lat" id="lat"  class="Combos texto" onchange="Cambialugarate();"  >
         <option value="">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){
			  
			  
		 ?>
          <option value="<?php echo $item["C_NUMITM"]?>" <?php if($item["C_NUMITM"]==$c_codlug){?>selected<?php }?>><?php echo utf8_encode($item["C_DESITM"])?></option>
          <?php 
		  
		  }	?>
        </select>
        <input type="hidden" size="5" name="idatencion" id="idatencion" value="<?php echo $c_deslug  ?>" />
</td>      
        <!--<input name="c_nomate" type="text"  class="texto" id="c_nomate" size="35"  placeholder="Digite el lugar" required/>-->
        



        
      <td width="205" align="right">
		  <strong style="color:#F00">
			Importe
		  </strong>
	  </td>
      <td width="7">:</td>
      <td width="274">
        <input name="st" type="text" class="texto" id="st" size="10" readonly="readonly" value="<?php echo $n_bruafe ; ?>"  />
	  </td>
    </tr>
	
    <tr>
      <td width="147">Transportista:</td>
     
      <td width="335">        
               
        <input  name="c_nomtran" type="text"  class="texto" id="c_nomtran" size="35"  placeholder="Digite el Transportista" value="<?php echo $c_nomtran; ?>" />
        &nbsp;&nbsp;<input type="text" size="20" name="hc1" id="hc1" placeholder="RUC"  class="texto" readonly="readonly" value="<?php echo $c_codtran; ?>"  />
         <input name="c_rhtrans" type="checkbox" id="c_rhtrans" value="1" onclick="rhtrans()"  /> Sin transportista
    <input name="xc_rhtrans" type="hidden" id="xc_rhtrans"    />
      </td> 
		
	  <td align="right"><strong style="color:#F00">Descuento</strong></td>      
      <td>:</td>
      <td>
		<input name="dsctof" type="text" class="texto" id="dsctof"  size="10" readonly="readonly" value="<?php echo $n_desafe ; ?>"/>	
        
	  </td>
    </tr>
	
    <tr>
      <td>Fecha de entrega:</td>
     
      <td><input name="c_fecentrega" type="text" class="texto" id="c_fecentrega" value="<?php echo vfecha(substr($d_fecent,0,10)) ?>"  onkeyup = "this.value=formateafecha(this.value); " size="10"    /><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'"     >
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "c_fecentrega",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script>
         
         &nbsp;&nbsp;
         
          lugar de entrega
		 <input name="c_nomlug" type="text"  class="texto" id="c_nomlug" size="15"  placeholder="Digite el lugar" value="<?php echo $c_lugent; ?>" required/>
        
        </td>


       
      
      <td align="right"><strong style="color:#F00">Subtotal</strong></td>
      <td>:</td>
      <td>
        <input name="sub" type="text" class="texto" id="sub"  size="10" readonly="readonly" value="<?php echo $n_netafe ; ?>"/>
	  </td>
    </tr>
     <tr>
      <td>Docum. de Refer.:</td>
     
      <td ><input name="c_refcoti" type="text"  class="texto" id="c_refcoti" maxlength="11" 
onKeyPress="return isNumberKey(event);"
placeholder="Ingrese Cotizacion" required/></td>

      <td align="right"><strong style="color:#F00">Igv (18%)</strong></td>
      <td>:</td>
      <td>
        <input name="igv" type="text" class="texto" id="igv"  size="10" readonly="readonly" value="<?php echo $n_igvafe ; ?>"/>
	  </td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
     
      <td>&nbsp;</td>
      <td align="right"><strong style="color:#F00">Total</strong></td>
      <td>:</td>
      <td>
        <input name="bi" type="text" class="texto" id="bi" value="<?php echo $n_totoc ; ?>" size="10" readonly="readonly" /></td>
      
      </tr>
    <tr>
      <td align="center"><strong style="color:#06C">Observaciones:</strong></td>
      <td align="center"><textarea name="c_obsoc" id="c_obsoc" height="50" width="100"><?php echo $c_obsoc ; ?></textarea></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td width="16" align="center">&nbsp;</td>
    </tr>
    
  </table>
  </fieldset>
  
  
  
  <p>
    <div class="buttons">
    <button type="button" class="positive" name="save" onclick="guarda()">
        <img src="../images/icon_accept.png" alt=""/>
        Registrar
    </button>

 <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>

    <button type="button" class="negative" name="save" onclick="regresar();">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
       </button>
</div>
  </p>
  <p>&nbsp;</p>
</form>
</body>
</html>