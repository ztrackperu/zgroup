<?php 
if($resultados!=NULL)
{
	foreach ($resultados as $item)
	{
		$udnix=$item['login'];
	}
}
?>
<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
	$c_numos=$item['c_numos'];
	//$c_codcia=$item[''];
	//$c_codtda=$item[''];
	$c_tipos=$item['c_tipos'];
	$c_asunto=$item['c_asunto'];
	$c_contacto=$item['c_contacto'];
	$c_refcoti=$item['c_refcoti'];
	$c_codprov=$item['c_codprov'];
	$c_nomprov=$item['c_nomprov'];
	$d_fecos=$item['d_fecos'];
	$n_tcamb=$item['n_tcamb'];
	$c_codmod=$item['c_codmod'];
	$c_codpgf=$item['c_codpgf'];
	$c_tratopag=$item['c_tratopag'];
	$c_costo=$item['c_costo'];
	//$c_estado=$item[''];
	$c_obs=$item['c_obs'];
	//$d_fecre=$item[''];
	$cantDiagnosticos += 1;
	$st=$item['n_bruto'];
		$igv=$item['n_totigv'];
			$tp=$item['n_totos'];
	
	$xc_codpgf=$item['c_forpag'];
	$c_fecinicio=$item['c_fecinicio'];
	$c_fecentrega=$item['c_fecentrega'];
	$c_rh=$item['c_rh'];
	$tip_igv=$item['tip_igv'];
	$ocompra=$item['c_ocompra'];
	}
}




 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Registro Orden De Servicio</title>
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

<script type="text/javascript">
$().ready(function() {
	$("#c_nomprov").autocomplete("../MVC_Controlador/cajaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomprov").result(function(event, data, formatted) {
		$("#c_nomprov").val(data[2]);
		$("#c_codprov").val(data[1]);
	});
});
</script>


<script type="text/javascript">

// tabledeleterow.js version 1.2 2006-02-21
// mredkj.com

// CONFIG notes. Below are some comments that point to where this script can be customized.
// Note: Make sure to include a <tbody></tbody> in your table's HTML




var INPUT_NAME_PREFIX = 'codigo'; // this is being set via script a
var INPUT_NAME_DES = 'descripcion'; // this is being set via script b
var INPUT_NAME_GLO = 'glosa'; // this is being set via script g
var INPUT_NAME_PRE = 'precio';
var INPUT_NAME_CAN = 'cantidad'; // this is being set via script e
var INPUT_NAME_IMP = 'imp'; // this is being set via script f

//var RADIO_NAME = 'totallyrad'; // this is being set via script
var TABLE_NAME = 'tablaDiagnostico'; // this should be named in the HTML
var ROW_BASE = 0; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows;

function fillInRows()
{
	hasLoaded = true;

		
}

// CONFIG:
// myRowObject is an object for storing information about the table rows
function myRowObject(one,two,tres,cuatro,cinco,seis,siete)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	this.siete=siete;
	
}

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

function addRowToTable(num)
{
	//alert('hola');
	var codigo=document.getElementById("codigo").value
	var des=document.getElementById("descripcion").value
	var pre=document.getElementById("precio").value
	var can=document.getElementById("cantidad").value
	var imp=document.getElementById("imp").value
	var glo=document.getElementById("glosa").value	
	/*var	valor=parseFloat(pre)-parseFloat(dsc);	
	var valor2=parseFloat(valor)*parseFloat(can);	
*/

//document.getElementById("imp"+i).value=valor.toFixed(2);
	var	valor=parseFloat(pre)*parseFloat(can);	
	
	
	//var imp=valor2;
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
		var txtInpgl = document.createElement('input');
		txtInpgl.setAttribute('type', 'text');
		txtInpgl.setAttribute('name', INPUT_NAME_GLO + iteration);
		txtInpgl.setAttribute('id', INPUT_NAME_GLO + iteration);
		txtInpgl.setAttribute('size', '40');
		txtInpgl.setAttribute('value', glo); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		//txtInpg.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpgl.setAttribute('class', 'texto'); 
		cell3.appendChild(txtInpgl);
		
		
		
		var cell4 = row.insertCell(4);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('size', '5');
		txtInpe.setAttribute('value', pre); // iteration included for debug purposes
		txtInpe.setAttribute('class', 'texto');
		//txtInpe.setAttribute('readonly', 'readonly'); 
		cell4.appendChild(txtInpe);
		
		
		
		
		var cell5 = row.insertCell(5);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'text');
		txtInpg.setAttribute('name', INPUT_NAME_CAN + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_CAN + iteration);
		txtInpg.setAttribute('size', '5');
		txtInpg.setAttribute('value', can); // iteration included for debug purposes onkeyup='actualizar_importe(this.name);'
		
		txtInpg.setAttribute('class', 'texto'); 
		txtInpg.setAttribute('onkeyup','actualizar_importe(this.name)');
		//txtInpg.setAttribute('onkeyup','actualizar_importe()');
		cell5.appendChild(txtInpg);
		
		
		var cell6 = row.insertCell(6);
		var txtInph = document.createElement('input');
		txtInph.setAttribute('type', 'text');
		txtInph.setAttribute('name', INPUT_NAME_IMP + iteration);
		txtInph.setAttribute('id', INPUT_NAME_IMP + iteration);
		txtInph.setAttribute('size', '5');
		txtInph.setAttribute('value', valor); // iteration included for debug purposes
		txtInph.setAttribute('class', 'texto'); 
		txtInph.setAttribute('readonly', 'readonly');
		cell6.appendChild(txtInph);
		
		
		// cell 2 - input button
		var cell7 = row.insertCell(7);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell7.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpgl,txtInpe,txtInpg,txtInph);
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
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_PRE + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_CAN + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_IMP + count;
				
				
			
				
				// CONFIG: next line is affected by myRowObject settings
				var tempVal = tbl.tBodies[0].rows[i].myRow.two.value.split(' '); 
		
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


function moneda(){
	document.getElementById('xc_codmod').value=document.form1.c_codmod.options[document.form1.c_codmod.selectedIndex].value;
	
	}
function formapago(){
	document.getElementById('xc_codpgf').value=document.form1.c_codpgf.options[document.form1.c_codpgf.selectedIndex].text;
	
	}
function accion(){
	var prov=document.getElementById('c_nomprov').value;
var cod=document.form1.c_codmod.options[document.form1.c_codmod.selectedIndex].text;
var tip_igv=document.form1.tip_igv.options[document.form1.tip_igv.selectedIndex].text;
var codserv=document.getElementById('codigo').value;

if(prov==''){
	alert('ingrese proveedor');
	document.getElementById('c_nomprov').focus;
	return 0;
	}


if(cod=='.::SELECCIONE::.'){
	alert('Ingrese Moneda');
		document.form1.c_codmod.options[document.form1.c_codmod.selectedIndex].focus;
	return 0;
	}
if(tip_igv=='.::SELECCIONE::.'){
	alert('Ingrese Si esta Afecto a igv');
		document.form1.tip_igv.options[document.form1.tip_igv.selectedIndex].focus;
	return 0;
	}	
	
if(document.getElementById("codigo").value==""){
	alert('Codigo Servicio No Existe');
		document.getElementById("descripcion").focus();
	return 0;
}
	
	agregarUsuario();
	sumarcolumnatabla();
		document.getElementById("codigo").value="";
		document.getElementById("descripcion").value="";
		
		document.getElementById("glosa").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="1";
		document.getElementById("descripcion").focus();
		document.getElementById("c_codmod").disabled = true;
		document.getElementById("c_rh").disabled = true;
	//}
}
</script>

<script type="text/javascript">	
$('document').ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/OrdenTrabajoC.php?acc=proautocoti", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codigo").val(data[1]);
		//$("#glosa").val(data[5]);
		$("#precio").val(data[3]);
		//$("#glosa").val(data[6]);
		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.form1.precio.focus();
	});
	
});
function sumarcolumnatabla(){
sumar=0;
calculo=0;
var ig2=document.getElementById("igv").value;
var iniciost=document.getElementById("st").value;
var inicio=document.getElementById("bi").value;
var ig2=document.getElementById("igv").value;
var hc=document.getElementById('c_rh').checked;
var tip_igv=document.getElementById('tip_igv').value;
var tot=parseFloat(document.getElementById("precio").value)*parseFloat(document.getElementById("cantidad").value);	
if(tip_igv==0){
var igv=parseFloat(tot)*1.18;
}else{
var igv=parseFloat(tot)*1;	
}

var ig=parseFloat(igv)-parseFloat(tot);
var subt=tot+parseFloat(iniciost);

var subigv=ig+parseFloat(ig2);
var total=subt+subigv;

	document.getElementById("igv").value=(Math.floor(subigv*100)).toFixed(2)/100;
	document.getElementById("bi").value=(Math.floor(total*100))/100;
	document.getElementById("st").value=(Math.floor(subt*100)).toFixed(2)/100;

}
function calculartotales(){
	var hc=document.getElementById('c_rh').checked;
	var tip_igv=document.getElementById('tip_igv').value;
	var higv=document.getElementById('igv').value;
sumar=0;
igv=0;
total=0;
for(var i=1; i<=50; i++)
{
if(!document.getElementById("imp"+i)){
}else{
sumar+=parseFloat(document.getElementById("imp"+i).value);	

var subt=sumar;
if(tip_igv==0){
 ig1=subt*1.18;
}else{
	 ig1=subt*1;
}
var igv=ig1-subt;
var total=subt+igv;

//alert("exite");
}
}
document.getElementById("bi").value=(Math.floor(total*100))/100;
document.getElementById("st").value=(Math.floor(sumar*100)).toFixed(2)/100;
document.getElementById("igv").value=(Math.floor(igv*100)).toFixed(2)/100;
}	


function actualizar_importe(obj){

var cant=obj;
var precio;
//var dscto;
var pre1 = cant.substring(8,10);
//var dscto= cant.substring(8,10);
var canti= cant.substring(8,10);
var im=cant.substring(8,10);
var	valor=(parseFloat(document.getElementById("precio"+pre1).value))
		*parseFloat(document.getElementById("cantidad"+canti).value) ;	

document.getElementById("imp"+im).value=valor;
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

function concatena() {
	var origen=document.form1.origen.options[document.form1.origen.selectedIndex].text;
	var destino=document.form1.destino.options[document.form1.destino.selectedIndex].text;
	var escala=document.form1.escala.options[document.form1.escala.selectedIndex].text;
	var kg=document.getElementById("kg").value;
	//var vkg='';
	if(kg==''){ vkg='';}else{  vkg='Peso Carga (TN)'; }
	
	
	var cadena=origen+' - '+escala+' - '+destino+' / '+vkg+'  '+kg;
	
	document.getElementById("glosa").value=cadena;
		document.getElementById("glosa").readOnly =true;
	}
function habilita(){
	if(document.getElementById("activa").checked==true){
	concatena();
	}else{
	document.getElementById("glosa").value="";
	document.getElementById("glosa").readOnly =false;
		
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
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='glosa"+posicionCampo+"' type='text'  id='glosa"+posicionCampo+"'  size='40'  class='texto' />";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='precio"+posicionCampo+"' type='text'  id='precio"+posicionCampo+"'  size='5'  class='texto'/>";

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
			codigo.value = document.form1.codigo.value;
			
			descripcion = document.getElementById("descripcion" + posicionCampo);
			descripcion.value = document.form1.descripcion.value;
			
			glosa = document.getElementById("glosa" + posicionCampo);
			val=document.form1.glosa.value+posicionCampo;
			glosa.value = val;
			

			
			precio = document.getElementById("precio" + posicionCampo);
			precio.value = document.form1.precio.value;
			
			
			cantidad = document.getElementById("cantidad" + posicionCampo);
			cantidad.value = document.form1.cantidad.value;
			
			imp = document.getElementById("imp" + posicionCampo);
			imp.value = document.form1.imp.value;
			
}


function calcularimporte(){
	var precio=document.getElementById("precio").value;
//	var dscto=document.getElementById("dscto").value;
	var cant=document.getElementById("cantidad").value;
	
	 var par =parseFloat(precio);
	 var total=parseFloat(par)*parseFloat(cant);
	
	document.form1.imp.value=total;
	
	
	
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
function guarda(){
	
	var longitud=document.getElementById("c_refcoti").value.length;
	
	if(document.getElementById("c_refcoti").value==''){
	//alert('Ingrese Nro de Cotizacion')
	jAlert('Ingrese Nro de Cotizacion', 'Mensaje del Sistema');
	return 0;
	}
if(longitud<11){
		jAlert('Nro de Cotizacion no valido', 'Mensaje del Sistema');
	//alert('Nro de Cotizacion no valido')
	return 0;
	}
	
	
	 if(confirm("Seguro de Actualizar Orden Servicio ?")){
	//document.getElementById.formElem.submit();
	document.getElementById("form1").submit();
	 }
	
	}
function rh(){
	if(document.form1.c_rh.checked==true){
	document.getElementById('xc_rh').value=document.form1.c_rh.value;
	}else{
		document.getElementById('xc_rh').value='0';
		}
	}
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

function compUsuario2(Tecla2) {
     Tecla2 = (Tecla2) ? Tecla2: window.event;
     input = (Tecla2.target) ? Tecla2.target : 
     Tecla2.srcElement;
     if (Tecla2.type == "keyup") {
          var DivDestino2 = document.getElementById("DivDestino2");
          DivDestino2.innerHTML = "<div><div class='alert_info'>	<img src='../images/icon_info.png' alt='delete' class='mid_align'/>Continue</div>	</div>";
          if (input.value) {
               ObtDatos2("../MVC_Controlador/ValidacotOSComp.php?&cod2=" + input.value);
          } 
     }
}
	function ObtDatos2(url){
      var act = new Date();
      http[act] = createRequestObject();
      http[act].open('get', url);
      http[act].onreadystatechange = function() {
      if (http[act].readyState == 4) {
            if (http[act].status == 200 || http[act].status == 304) {
  		var texto
		texto = http[act].responseText
                    var DivDestino = document.getElementById("DivDestino2");
                    DivDestino.innerHTML = "<div id='error'>"+texto+"</div>";                
}
}
}
http[act].send(null);
}

$().ready(function() {
	$("#c_refcoti2").autocomplete("../MVC_Controlador/cajaC.php?acc=cargar_ocompra", {
		width: 400, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_refcoti2").result(function(event, data, formatted) {
	
		$("#c_refcoti2").val(data[1]);
		//$("#idcli").val(data[3]);
		//$("#idcoti").val(data[1]);
		//$("#hiddenField2").val(data[3]);
		//document.getElementById('textfield3').focus();nombreguia
	});
	
});
</script>
<style>
#tablaDiagnostico td, th { padding: 0.2em; }
#tablaDiagnostico tr:nth-child(even) {background: #6CC }
#tablaDiagnostico tr:nth-child(odd) {background: #FFF}
</style>
</head>

<body topmargin="0" marginheight="0">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=actualizaos&udni=<?php echo $_GET['udni']; ?>">
<strong style="text-align:center">ACTUALIZAR ORDEN SERVICIO.</strong>
<fieldset class="fieldset legend">
    <legend style="color:#C33"><strong>Encabezado Orden Servicio</strong></legend>
  <table width="1220" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="151">Nº Ord. Serv.</td>
      <td width="10">:</td>
      <td width="241">
      <input name="c_numos" type="text"  class="texto" id="c_numos" value="<?php echo $c_numos ?>" readonly="readonly"/></td>
      <td width="14">&nbsp;</td>
      <td width="159"><!--<select name="c_concepto" id="c_concepto"  class="Combos texto">
      </select>-->Ref. Cotizacion</td>
      <td width="14">:</td>
      <td width="549">
        <input name="c_refcoti" type="text" required="required"  class="texto" id="c_refcoti" value="<?php echo $c_refcoti ?>" maxlength="11" onKeyPress="return isNumberKey(event);"/>
        Usuario:
        <input name="c_opcrea" type="text" id="c_opcrea" value="<?php echo $udnix; ?>" readonly="readonly" class="texto"/></td>
    </tr>
    <tr>
      <td>Tipo Ord. Serv.</td>
      <td>:</td>
      <td>
          <?php $ven = ListaTipoOrdenM();?>
          <select name="c_tipos" id="c_tipos" class="Combos texto">
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>    
   <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_tipos){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
        </select></td>
      <td></td>
      <td>Fecha Ord. Serv.</td>
      <td>:</td>
      <td><input name="d_fecos" type="text"  class="texto" id="d_fecos" size="12"  value="<?php echo date("d/m/Y", strtotime($d_fecos))?>" onkeyup = "this.value=formateafecha(this.value); "/><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_fecos",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
    </tr>
    <tr>
      <td>Moneda</td>
      <td>:</td>
      <td>
        <?php $ven = ListaMonedaM();?>
          <select name="c_codmod" id="c_codmod" class="Combos texto" onchange="moneda()">
           <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmod){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>
          
          <input name="xc_codmod" type="hidden" id="xc_codmod" size="5" value="<?php echo $c_codmod ?>"/></td>
      <td>&nbsp;</td>
      <td>Tipo Cambio</td>
      <td>:</td>
      <td>
       <?php 
			 $tcambio = xListatipocambioM();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			?><label for="n_tcamb"></label>
      <input type="text" name="n_tcamb" id="n_tcamb" value="<?php echo $n_tcamb; ?>"  class="texto"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/></td>
    </tr>
    <tr>
      <td>Proveedor</td>
      <td>:</td>
      <td>
      <input name="c_nomprov" type="text"  class="texto" id="c_nomprov"  value="<?php echo $c_nomprov; ?>" size="40" readonly="readonly"/>
     </td>
      <td>&nbsp;</td>
      <td>Ruc Proveedor</td>
      <td>:</td>
      <td>
      <input name="c_codprov" type="text"  class="texto" id="c_codprov" value="<?php echo $c_codprov; ?>" readonly="readonly"/> Fecha Inicio <input name="c_fecinicio" type="text" id="c_fecinicio" size="12" class="texto" onkeyup = "this.value=formateafecha(this.value); " value="<?php echo $c_fecinicio ?>" /><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "c_fecinicio",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script></td>
    </tr>
    <tr>
      <td>Asunto</td>
      <td>:</td>
      <td><input name="c_asunto" type="text"  class="texto" id="c_asunto" size="40" value="<?php echo $c_asunto; ?>"/></td>
      <td>&nbsp;</td>
      <td>Contacto</td>
      <td>:</td>
      <td><label for="c_contacto"></label>
        <input type="text" name="c_contacto" id="c_contacto" class="texto" value="<?php echo $c_contacto ?>" /> Fecha Entrega
        <input name="c_fecentrega" type="text" id="c_fecentrega" class="texto" size="12" onkeyup = "this.value=formateafecha(this.value); "  value="<?php echo $c_fecentrega ?>"/><img src="../images/calendario.jpg" name="Image3" id="Image3" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "c_fecentrega",
					ifFormat   : "%d/%m/%Y",
					button     : "Image3"
					  }
					);
		 </script></td>
    </tr>
	<tr>
      <td><font color="#FF0000"> Centro de Costos </font> </td>
	  <td>:</td>
	  <td>
		<?php $ven = ListaCentroCostoM();?>
			<select name="ccosto" id="ccosto" class="Combos texto" >
				<option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){?>
				<option value="<?php echo $item["id_ccosto"];?>" <?php if($item["id_ccosto"]==$c_costo){?>selected<?php }?>  ><?php echo $item["descripcion"];?></option>
				<?php }	?>
			</select>
		</td>
		<td>&nbsp;</td>
	
    </tr>
	<tr>
	<td> Igv </td>
	<td>:</td>
	<td>
        <select name="tip_igv" id="tip_igv" class="Combos texto" >
            <option value="">.::SELECCIONE::.</option>
            <?php
			$arran_tip_igv = array("0","1");
			$arran_tip = array("Afecto","Inafecto");
			foreach($arran_tip_igv as $valor){
				if($valor==$tip_igv){
					if($valor==0){
						$valor2="Afecto";
						}else{
						$valor2="Inafecto";
						}
						echo "<option value=\"$valor\" selected>$valor2</option>";
						}else{
						if($valor==0){
							$valor2="Afecto";
						}else{
							$valor2="Inafecto";
							}
						echo "<option value=\"$valor\">$valor2</option>";
						}
		}
			?> 
        </select>
    </td>
    </tr>
	<tr>
      		<td>Ref.OC</td>
			<td>:</td>
			<td>
			<input name="c_refcoti2" type="text"  class="texto" id="c_refcoti2" size="10"
				onkeypress="return isNumberKey(event);"
				onkeyup = "compUsuario2(event)" tabindex="1" autocomplete="off" value="<?php echo $ocompra ?>"/>
			</td>
			<td>
				<div id="DivDestino2" style="width:150px">
				</div>
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
	</tr>
</table>
 <a style='cursor: pointer;' onClick="muestra_oculta('contenido_a_mostrar')" title=""><strong style="color:#60F">Datos Adicionales Para Glosa Servicio</strong> <img src="../images/Transfer Document.png" alt="" width="18" height="18" /></a>
        <div id="contenido_a_mostrar">
  <table width="1220" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="75" bgcolor="#FFFF33">Origen</td>
      <td width="196" bgcolor="#FFFF33"><?php $ven = ListalugarM();?>
        <select name="origen" id="origen" class="Combos texto">
           <option value=""></option>
            <?php foreach($ven as $item){?>
           
   <option value="<?php echo utf8_encode($item["c_desitm"]);?>"><?php echo utf8_encode($item["c_desitm"]);?></option>
            <?php }	?>
          </select></td>
      <td width="59" bgcolor="#FFFF33">Escala</td>
      <td width="166" bgcolor="#FFFF33"><?php $ven = ListalugarM();?>
        <select name="escala" id="escala" class="Combos texto">
          <option value=""></option>
          <?php foreach($ven as $item){?>
          
          
          <option value="<?php echo utf8_encode($item["c_desitm"]);?>"><?php echo utf8_encode($item["c_desitm"])?></option>
          <?php }	?>
        </select>&nbsp;</td>
      <td width="54" bgcolor="#FFFF33">Destino</td>
      <td width="177" bgcolor="#FFFF33"><label for="destino"></label><?php $ven = ListalugarM();?>
        <select name="destino" id="destino" class="Combos texto">
          <option value=""></option>
          <?php foreach($ven as $item){?>
          
          
          <option value="<?php echo utf8_encode($item["c_desitm"]);?>"><?php echo utf8_encode($item["c_desitm"])?></option>
          <?php }	?>
        </select></td>
      <td width="42" bgcolor="#FFFF33">TN</td>
      <td width="215" bgcolor="#FFFF33">
        <input name="kg" type="text" id="kg" size="10" class="texto"/>
        <input type="checkbox" name="activa" id="activa" onclick="habilita()"/>
        <strong style="color:#00F">Click Aqui </strong></td>
    </tr>
    </table>
          
          
  </div>
  </fieldset>
  <fieldset class="fieldset legend">
    <legend style="color:#C33"><strong>Detalle Orden Servicio</strong></legend>
  <table width="1220"  border="0" cellpadding="1" cellspacing="1">
    <tr>
      <td>Concepto</td>
      <td>
        <input name="descripcion" type="text"  class="texto" id="descripcion" size="40"/>
        Glosa
        
        <input name="glosa" type="text" class="texto" id="glosa" size="40" />
        <input type="hidden" size="5" name="codigo" id="codigo" />        Precio Unitario
       
        <input name="precio" type="text" id="precio" size="5"  class="texto"  onkeyup="copia();"/>        Cantidad
        
        <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="5" />
        <input type="hidden" name="imp" id="imp" size="5"/> <a href="#" onclick="accion()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a>&nbsp;<input name="c_rh" type="hidden" id="c_rh" onclick="rh()" value="1" <?php if($igv=="0.0"){ ?> checked="checked"<?php }?> />
        <label for="c_rh">R/H
          <input type="hidden" size="5" name="xc_rh" id="xc_rh" />
        </label></td>
      </tr>
    </table>
  <table width="1220" border="0" cellspacing="0" cellpadding="0" id="tablaDiagnostico">
    <tr>
      <td width="99" align="center" bgcolor="#CCCCCC"><strong>Codigo</strong></td>
      <td width="190" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
      <td width="150" align="center" bgcolor="#CCCCCC"><strong>Glosa</strong></td>
      <td width="62" align="center" bgcolor="#CCCCCC"><strong>Precio</strong></td>
      <td width="89" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
      <td width="102" align="center" bgcolor="#CCCCCC"><strong>Importe</strong></td>
      <td width="369" bgcolor="#CCCCCC"><strong>Eliminar</strong></td>
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
        <input name="<?php echo "codigo".$i; ?>" type="text" id="<?php echo "codigo".$i; ?>" size="5" value="<?php echo $itemD["c_codprd"]; ?>" class="texto" /><?php echo $i;?></td>
      <td>
        <input name="<?php echo "descripcion".$i; ?>" type="text" class="texto" id="<?php echo "descripcion".$i; ?>" value="<?php echo $itemD["c_desprd"]; ?>" size="40"/></td>
      <td>
        <input name="<?php echo "glosa".$i; ?>" type="text" class="texto" id="<?php echo "glosa".$i; ?>"  value="<?php echo $itemD["c_glosa"]; ?>" size="40"/></td>
      <td>
        <input name="<?php echo "precio".$i; ?>" type="text" id="<?php echo "precio".$i; ?>" size="5" value="<?php echo $itemD["n_preprd"]; ?>" class='texto'/></td>
      <td>
        <input name="<?php echo "cantidad".$i; ?>" type="text" id="<?php echo "cantidad".$i; ?>" size="5" value="<?php echo $itemD["n_canprd"]; ?>" onkeyup="actualizar_importe(this.name)" class='texto'/></td>
      <td>
        <input name="<?php echo "imp".$i; ?>" type="text" id="<?php echo "imp".$i; ?>" size="5"  value="<?php echo $itemD["n_totimp"]; ?>" class='texto'/></td>
      <td><input type="button" name="delete" id="delete" value="Delete"   onclick="eliminarUsuario(this)"/></td>
    </tr>
    <?php 
							$i++;	}
								}
	?>
    </table>
    
  </fieldset>
  <fieldset class="fieldset legend">
    <legend style="color:#C33"><strong>Adicionales Orden Servicio</strong></legend>
  <table width="1220" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="90">&nbsp;&nbsp;Trato Pago</td>
      <td width="7">&nbsp;</td>
      <td width="287">
        <?php $ven = ListaFormaPagoM();?>
        <select name="c_tratopag" id="c_tratopag" class="Combos texto">
          <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          
          <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_tratopag){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          <?php }	?>
        </select></td>
      <td width="256" align="right"><strong style="color:#00F">
        Sub Total
      </strong></td>
      <td width="11">:</td>
      <td width="339"><label for="st"></label>
        <input name="st" type="text" class="texto" id="st" value="<?php echo $st ?>" size="10" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Factura Pago</td>
      <td>&nbsp;</td>
      <td><?php $ven = ListaPlazoM();?>
        <select name="c_codpgf" id="c_codpgf"  class="Combos texto" onchange="formapago();">
          <?php foreach($ven as $item){?>
          <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if($item["c_numitm"]==$c_codpgf){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>
          <?php }	?>
        </select>
        <input type="hidden" name="xc_codpgf" id="xc_codpgf" value="<?php echo $xc_codpgf ?>" /></td>
      <td align="right"><strong style="color:#00F">Igv (18%)</strong></td>
      <td>:</td>
      <td><label for="igv"></label>
        <input name="igv" type="text" class="texto" id="igv" value="<?php echo $igv ?>" size="10" readonly="readonly"/></td>
    </tr>
    <tr>
      <td colspan="3"><label for="c_obs"></label></td>
      <td align="right"><strong style="color:#00F">Total</strong></td>
      <td>:</td>
      <td>
      <input name="bi" type="text" class="texto" id="bi" value="<?php echo $tp ?>" size="10" readonly="readonly"/></td>
      </tr>
      <tr>
      <td><strong style="color:#390">Observaciones</strong></td>
      <td>:</td>
      <td colspan="4"><textarea name="c_obs" id="c_obs" cols="60" rows="8">
	  <?php 
	echo  str_replace("<br />","",$c_obs);
	 ?>
      </textarea></td>
      </tr>
      <tr>
      <td colspan="6" align="center">&nbsp;</td>
      </tr>
      </table>
  </fieldset>
  <p>
    <div class="buttons">
    <button type="button" class="positive" name="save" onclick="guarda()">
        <img src="../images/icon_accept.png" alt=""/>
        Actualizar
    </button>

 <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>

    <button type="button" class="negative" name="save">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
       </button>
</div>
  </p>
  <p>&nbsp;</p>
</form>
</body>
</html>