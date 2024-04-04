<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
		$udni=$item['login'];
	}
}

if($reporteot!=NULL){
foreach ($reporteot as $itemT) 
{
	$cantDiagnosticos += 1;
	$c_numot=$itemT['ot'];
	$c_codmon=$itemT['c_codmon'];
	$c_desequipo=$itemT['c_desequipo'];
	$c_unidad=$itemT['c_cliente'];
	$unidad=$itemT['unidad'];
	$c_treal=$itemT['c_treal'];
	$c_supervisa=$itemT['c_supervisa'];
	$c_solicita=$itemT['c_solicita'];
	$c_lugartab=$itemT['c_lugartab'];
	$d_fecdcto=$itemT['d_fecdcto'];
	$c_usrcrea=$itemT['c_usrcrea'];
	$c_codmon=$itemT['c_codmon'];
	$coti=$itemT["c_refcot"];
	$c_asunto=$itemT["c_asunto"];
	$c_ejecuta=$itemT["c_ejecuta"];
	$c_nroreporte=$itemT["c_nroreporte"];
	$c_serieequipo=$itemT["c_serieequipo"];
	$add1=$itemT["add1"];
	$add2=$itemT["add2"];
	$h_inicio=$itemT["h_inicio"];
	$nro_guia=$itemT["nro_guia"];
	$nro_ticket=$itemT["nro_ticket"];
	$d_fecentrega=$itemT["d_fecentrega"];
	$obs=utf8_encode(strip_tags($itemT['c_osb']));
	if($itemT['c_codmon']=='0'){$moneda='SOLES';}else{$moneda='DOLARES';}

	}
		}else{
	$cantDiagnosticos = 1;
		}


	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/botones.css" type="text/css" rel="stylesheet">
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
	$("#c_refcot").autocomplete("../MVC_Controlador/cajaC.php?acc=cargar_coti_guia", {
		width: 400, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_refcot").result(function(event, data, formatted) {
	
		$("#c_refcot").val(data[1]);
		//$("#idcli").val(data[3]);
		//$("#idcoti").val(data[1]);
		//$("#hiddenField2").val(data[3]);
		//document.getElementById('textfield3').focus();nombreguia
	});
	
});
$().ready(function() {
	$("#c_nomprov").autocomplete("../MVC_Controlador/cajaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomprov").result(function(event, data, formatted) {
		$("#c_nomprov").val(data[2]);
		$("#c_rucprov").val(data[1]);
	});
});
function moneda(){//jquery-1.4.2.min.js
	document.getElementById('xc_codmod').value=document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].value;
	//document.getElementById("c_codmod").disabled = true; cod_concepto
	
	}
	
function concepto(){//jquery-1.4.2.min.js
	document.getElementById('cod_concepto').value=document.form1.c_cate.options[document.form1.c_cate.selectedIndex].value;
	//document.getElementById("c_codmod").disabled = true; cod_concepto
	
	}
function abreVentana(obj){
var codigo=document.getElementById("cod_des").value;
	var cod=codigo
	var sw='1';
	var xsw='1';
	var valor=obj
			//if (codigo=="") {
			//	alert ("Debe Introducir Codigo Equipo");
			//} else {
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigos&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw,"miwin",
			"width=700,height=500,scrollbars=yes");
			miPopup.focus();
			//}
		}	

</script>

<script type="text/javascript">
		
$().ready(function() {
	$("#c_desequipo").autocomplete("../MVC_Controlador/cajaC.php?acc=proautoguia", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_desequipo").result(function(event, data, formatted) {
		$("#c_desequipo").val(data[2]);
		$("#cod_des").val(data[1]);
		$("#unidad").val(data[1]);
		//$("#hiddenField3").val(data[1]);
		//$("#unidad").val(data[1]);
		//$("#hiddenField5").val(data[1]);

		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	//document.formElem.precio.focus();
	});
	
});
function abreConcepto(){
	concepto()
var codigo=document.form1.cod_concepto.value;
//alert('hola');
			miPopup = window.open("../MVC_Controlador/InventarioC.php?acc=verconcepto&udni=<?php echo $udni;?>&cat="+codigo,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			
		}	
</script>


<script type="text/javascript">

// tabledeleterow.js version 1.2 2006-02-21
// mredkj.com

// CONFIG notes. Below are some comments that point to where this script can be customized.
// Note: Make sure to include a <tbody></tbody> in your table's HTML
var INPUT_NAME_PREFIX = 'c_rucprov'; // this is being set via script a C ODIGO PROVEEDOR
var INPUT_NAME_DES = 'c_nomprov'; // this is being set via script b NOMBRE PROVEEDOR
var INPUT_NAME_GLO = 'concepto'; // CONCEPTO this is being set via script g
var INPUT_NAME_TEC = 'c_tecnico'; // CONCEPTO this is being set via script g

var INPUT_NAME_PRE = 'tdoc';
var INPUT_NAME_CAN = 'ndoc'; // this is being set via script e
var INPUT_NAME_IMP = 'fdoc'; // this is being set via script f
var INPUT_NAME_MONTO = 'monto'; // this is being set via script f
var INPUT_NAME_CTD = 'n_cant'; // this is being set via script f
var INPUT_NAME_IGV = 'n_igvd'; // this is being set via script f
var INPUT_NAME_TOT = 'n_totd'; // this is being set via script f

var INPUT_NAME_MONTOP = 'montop'; // this is being set via script f

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
function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho,nueve,diez,once,doce,trece)
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
	this.diez=diez;
	this.once=once;
	this.doce=doce;
	this.trece=trece;
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
	//alert(' hi hola');
	var c_rucprov=document.form1.c_rucprov.value
	var c_nomprov=document.form1.c_nomprov.value
	var moneda=document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].text;
	var concepto='';
	var igv=0;
	var total=0;
	if(document.form1.c_cate.options[document.form1.c_cate.selectedIndex].text==document.form1.c_subcat.value){
	
	concepto=document.form1.c_cate.options[document.form1.c_cate.selectedIndex].text;
	}else{
		concepto=document.form1.c_cate.options[document.form1.c_cate.selectedIndex].text+' '+document.form1.c_subcat.value;
		}
		
		var c_tecnico=document.form1.c_tecnico.options[document.form1.c_tecnico.selectedIndex].text;
	
		var n_cant=document.form1.n_cant.value;
		
	var tdoc=document.form1.tdoc.options[document.form1.tdoc.selectedIndex].value;
	var ndoc=document.form1.ndoc.value
	var fdoc=document.form1.fdoc.value	
	var monto=document.form1.n_pre.value  //monto documento = monto pactado	
	var montop=document.form1.n_pre.value	// monto pactado
	
	
	var tot=parseFloat(monto)*parseFloat(n_cant);	// sub total
	//**calculo de igv y total*/
	if(tdoc=='FACTURA'){
	//	igv=monto
		var igv=parseFloat(tot)*1.18;
		
		}else{
			
		var igv=parseFloat(tot)*1;
		
			}
	

	
	 var igv=parseFloat(igv)-parseFloat(tot); //el igv
	 var total=parseFloat(tot)+parseFloat(igv); // total
	 

	//var subigv=ig+parseFloat(ig2);
	//var total=subt+subigv;
	
	var xtot=(Math.floor(tot*100))/100;
	var xigv=(Math.floor(igv*100))/100;
	var xtotal=(Math.floor(total*100))/100;
	
	/*var	valor=parseFloat(pre)-parseFloat(dsc);	
	var valor2=parseFloat(valor)*parseFloat(can);	
*/

//document.getElementById("imp"+i).value=valor.toFixed(2);
	//var	valor=parseFloat(pre)*parseFloat(can);	
	
	
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
		txtInpa.setAttribute('type', 'hidden');
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('size', '8');
		txtInpa.setAttribute('value', c_rucprov); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '35');
		txtInpb.setAttribute('value', c_nomprov); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpb.setAttribute('class', 'texto'); 
		cell2.appendChild(txtInpb);
		
		var cell3 = row.insertCell(3);
		var txtInpgl = document.createElement('input');
		txtInpgl.setAttribute('type', 'text');
		txtInpgl.setAttribute('name', INPUT_NAME_GLO + iteration);
		txtInpgl.setAttribute('id', INPUT_NAME_GLO + iteration);
		txtInpgl.setAttribute('size', '35');
		txtInpgl.setAttribute('value', concepto); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		txtInpgl.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpgl.setAttribute('class', 'texto'); 
		cell3.appendChild(txtInpgl);
		
		
		
			var cell4 = row.insertCell(4);
		var txtInptec = document.createElement('input');
		txtInptec.setAttribute('type', 'text');
		txtInptec.setAttribute('name', INPUT_NAME_TEC + iteration);
		txtInptec.setAttribute('id', INPUT_NAME_TEC + iteration);
		txtInptec.setAttribute('size', '12');
		txtInptec.setAttribute('value', c_tecnico); // iteration included for debug purposes
		txtInptec.setAttribute('class', 'texto');
		txtInptec.setAttribute('readonly', 'readonly'); 
		cell4.appendChild(txtInptec);
		
		
		
		var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('size', '8');
		txtInpe.setAttribute('value', tdoc); // iteration included for debug purposes
		txtInpe.setAttribute('class', 'texto');
		txtInpe.setAttribute('readonly', 'readonly'); 
		cell5.appendChild(txtInpe);
		
		
		
		
		var cell6 = row.insertCell(6);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'text');
		txtInpg.setAttribute('name', INPUT_NAME_CAN + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_CAN + iteration);
		txtInpg.setAttribute('size', '8');
		txtInpg.setAttribute('value', ndoc); // iteration included for debug purposes onkeyup='actualizar_importe(this.name);'
		
		txtInpg.setAttribute('class', 'texto'); 
		//                                                                                                                                                                                      txtInpg.setAttribute('onkeyup','actualizar_importe(this.name)');
		//txtInpg.setAttribute('onkeyup','actualizar_importe()');
		cell6.appendChild(txtInpg);
		
		
		var cell7 = row.insertCell(7);
		var txtInph = document.createElement('input');
		txtInph.setAttribute('type', 'text');
		txtInph.setAttribute('name', INPUT_NAME_IMP + iteration);
		txtInph.setAttribute('id', INPUT_NAME_IMP + iteration);
		txtInph.setAttribute('size', '8');
		txtInph.setAttribute('value', fdoc); // iteration included for debug purposes
		txtInph.setAttribute('class', 'texto'); 
		//txtInph.setAttribute('readonly', 'readonly');
		cell7.appendChild(txtInph);
		
		
		
		
		var cell8 = row.insertCell(8);
		var txtInpm = document.createElement('input');
		txtInpm.setAttribute('type', 'text');
		txtInpm.setAttribute('name', INPUT_NAME_MONTO + iteration);
		txtInpm.setAttribute('id', INPUT_NAME_MONTO + iteration);
		txtInpm.setAttribute('size', '8');
		txtInpm.setAttribute('value', xtot); // iteration included for debug purposes
		txtInpm.setAttribute('class', 'texto'); 
		//txtInpm.setAttribute('readonly', 'readonly');
		cell8.appendChild(txtInpm);
		
		var cell9 = row.insertCell(9);
		var txtIncant = document.createElement('input');
		txtIncant.setAttribute('type', 'text');
		txtIncant.setAttribute('name', INPUT_NAME_CTD  + iteration);
		txtIncant.setAttribute('id', INPUT_NAME_CTD  + iteration);
		txtIncant.setAttribute('size', '8');
		txtIncant.setAttribute('value', n_cant); // iteration included for debug purposes
		txtIncant.setAttribute('class', 'texto'); 
		//txtInpm.setAttribute('readonly', 'readonly');
		cell9.appendChild(txtIncant);
		
		var cell10 = row.insertCell(10);
		var txtInigv = document.createElement('input');
		txtInigv.setAttribute('type', 'text');
		txtInigv.setAttribute('name', INPUT_NAME_IGV  + iteration);
		txtInigv.setAttribute('id', INPUT_NAME_IGV  + iteration);
		txtInigv.setAttribute('size', '8');
		txtInigv.setAttribute('value', xigv); // iteration included for debug purposes
		txtInigv.setAttribute('class', 'texto'); 
		//txtInpm.setAttribute('readonly', 'readonly');
		cell10.appendChild(txtInigv);
		
		var cell11 = row.insertCell(11);
		var txtIntod = document.createElement('input');
		txtIntod.setAttribute('type', 'text');
		txtIntod.setAttribute('name', INPUT_NAME_TOT  + iteration);
		txtIntod.setAttribute('id', INPUT_NAME_TOT  + iteration);
		txtIntod.setAttribute('size', '8');
		txtIntod.setAttribute('value', xtotal); // iteration included for debug purposes
		txtIntod.setAttribute('class', 'texto'); 
		//txtInpm.setAttribute('readonly', 'readonly');
		cell11.appendChild(txtIntod);
		
		
		
		var cell12 = row.insertCell(12);
		var txtInpmp = document.createElement('input');
		txtInpmp.setAttribute('type', 'text');
		txtInpmp.setAttribute('name', INPUT_NAME_MONTOP + iteration);
		txtInpmp.setAttribute('id', INPUT_NAME_MONTOP + iteration);
		txtInpmp.setAttribute('size', '8');
		txtInpmp.setAttribute('value', montop); // iteration included for debug purposes
		txtInpmp.setAttribute('class', 'texto'); 
		txtInpmp.setAttribute('readonly', 'readonly');
		cell12.appendChild(txtInpmp);
		
		// cell 2 - input button
		var cell13 = row.insertCell(13);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell13.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpgl,txtInptec,txtInpe,txtInpg,txtInph,txtInpm,txtIncant,txtInigv,txtIntod,txtInpmp);
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
		 //calculartotales();
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
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_TEC + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_PRE + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_CAN + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_IMP + count;
				tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_MONTO + count;
				
				tbl.tBodies[0].rows[i].myRow.diez.name = INPUT_NAME_CTD  + count;
				tbl.tBodies[0].rows[i].myRow.once.name = INPUT_NAME_IGV  + count;
				tbl.tBodies[0].rows[i].myRow.doce.name = INPUT_NAME_TOT  + count;
				
				tbl.tBodies[0].rows[i].myRow.trece.name = INPUT_NAME_MONTOP + count;
				
				
			
				
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

function validamoneda(){
	
		var cod=document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].text;
	if(cod=='.::SELECCIONE::.'){
	alert('Ingrese Moneda');
		document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].focus;
	return 0;
	}
	
	}

function accion(){
	//alert('accion');
	var cod=document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].text;
	if(cod=='.::SELECCIONE::.'){
	alert('Ingrese Moneda');
		document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].focus;
	return 0;
	}
	if(document.form1.c_nomprov.value==""){
		alert ('ingrese proveedor')
		document.form1.c_nomprov.focus();
		return 0;

		}
	if(document.form1.c_desequipo.value==""){
		alert('ingrese Descripcion de equipo');
		document.form1.c_desequipo.focus();
		return 0;
		}	
	if(document.form1.unidad.value==""){
		alert('ingrese Codigo de equipo');
		document.form1.unidad.focus();
		return 0;
		}
	if(tdoc=document.form1.tdoc.options[document.form1.tdoc.selectedIndex].value=='.::SELECCIONE::.'){
		alert('ingrese tipo documento')
		return 0;
		}

	agregarUsuario();
	//limpiar();
	}
function limpiar(){
	document.form1.c_nomprov.value="";  
	document.form1.c_rucprov.value="";
	document.form1.n_pre.value="";
	document.form1.c_subcat.value="";
	document.getElementById("c_codmon").disabled = true;

	document.getElementById("unidad").readOnly=true
		document.getElementById("c_desequipo").readOnly=true
	}
function guardar(){
	
if(document.form1.c_treal.options[document.form1.c_treal.selectedIndex].text=='.::SELECCIONE::.'){
	alert('ingrese Trabajo A realizar')
	return 0;
	}
if(document.form1.c_solicita.options[document.form1.c_solicita.selectedIndex].text=='.::SELECCIONE::.'){
	alert('ingrese Solicitante');
	return 0;
	}
if(document.form1.c_supervisa.options[document.form1.c_supervisa.selectedIndex].text=='.::SELECCIONE::.'){
	alert('ingrese Supervisor');
	return 0;
	}
if(document.form1.c_refcot.value==""){
	alert('ingrese Dcto Referencia');
	ocument.form1.c_refcot.focus();
	return 0;
	}
	var theTable = document.getElementById('tablaDiagnostico');
	var cantFilas = theTable.rows.length;
		
if(cantFilas==1){
		alert ('Falta Detalle de Orden Trabajo');
		return 0;
	}
if(confirm("Seguro de Actualizar Orden De Trabajo ?")){
	document.getElementById("form1").submit();
	 }
}
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

</script>

<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 
 
 
 var posicionCampo=valor+1;

function agregarUsuario(){
	
	nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_rucprov"+posicionCampo+"' type='hidden' id='c_rucprov"+posicionCampo+ "' size='5' readonly='readonly' class='texto'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='c_nomprov"+posicionCampo+"' type='text' id='c_nomprov"+posicionCampo+ "' size='35' readonly='readonly' class='texto'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='concepto"+posicionCampo+"' type='text'  id='concepto"+posicionCampo+"'  size='35'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='c_tecnico"+posicionCampo+"' type='text'  id='c_tecnico"+posicionCampo+"'  size='12'  class='texto'/>";

		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='tdoc"+posicionCampo+"' type='text'  id='tdoc"+posicionCampo+"'  size='8' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='ndoc"+posicionCampo+"' type='text'  id='ndoc"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='fdoc"+posicionCampo+"' type='text'  id='fdoc"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='monto"+posicionCampo+"' type='text'  id='monto"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='n_cant"+posicionCampo+"' type='text'  id='n_cant"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";
				
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='n_igvd"+posicionCampo+"' type='text'  id='n_igvd"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='n_totd"+posicionCampo+"' type='text'  id='n_totd"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='montop"+posicionCampo+"' type='text'  id='montop"+posicionCampo+"'  size='8' readonly='readonly' class='texto'/>";														
		
		
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		

escribirDiagnostico(posicionCampo);
		posicionCampo++;
	
		
    }

function calcularimporte(){
	
	var concepto='';
	var igv=0;
	var total=0;
	if(document.form1.c_cate.options[document.form1.c_cate.selectedIndex].text==document.form1.c_subcat.value){
	
	concepto=document.form1.c_cate.options[document.form1.c_cate.selectedIndex].text;
	}else{
		concepto=document.form1.c_cate.options[document.form1.c_cate.selectedIndex].text+' '+document.form1.c_subcat.value;
		}
	
	
	document.form1.concepto.value=concepto;
	
	var tdoc=document.form1.tdoc.options[document.form1.tdoc.selectedIndex].value;
	var monto=document.form1.n_pre.value  //monto documento = monto pactado	
	var montop=document.form1.n_pre.value	// monto pactado
	var n_cant=document.form1.n_cant.value;
	
	var tot=parseFloat(monto)*parseFloat(n_cant);	// sub total
	//**calculo de igv y total*/
	if(tdoc=='FACTURA'){
	//	igv=monto
		var igv=parseFloat(tot)*1.18;
		
		}else{
			
		var igv=parseFloat(tot)*1;
		
			}
	

	
	 var igv=parseFloat(igv)-parseFloat(tot); //el igv
	 var total=parseFloat(tot)+parseFloat(igv); // total
	 

	//var subigv=ig+parseFloat(ig2);
	//var total=subt+subigv;
	
	var xtot=(Math.floor(tot*100))/100;
	var xigv=(Math.floor(igv*100))/100;
	var xtotal=(Math.floor(total*100))/100;
	document.form1.n_igvd.value=xigv;
	document.form1.n_totd.value=xtotal;
	document.form1.monto.value=xtot;
	document.form1.montop.value=xtot;
	}
function escribirDiagnostico(posicionCampo)
{
			calcularimporte();
			c_rucprov = document.getElementById("c_rucprov" + posicionCampo);
			c_rucprov.value = document.form1.c_rucprov.value;
			
			c_nomprov = document.getElementById("c_nomprov" + posicionCampo);
			c_nomprov.value = document.form1.c_nomprov.value;
			
			concepto = document.getElementById("concepto" + posicionCampo);
			concepto.value = document.form1.concepto.value;

			c_tecnico = document.getElementById("c_tecnico" + posicionCampo);
			c_tecnico.value = document.form1.c_tecnico.value;
			
			tdoc = document.getElementById("tdoc" + posicionCampo);
			tdoc.value = document.form1.tdoc.value;

			ndoc = document.getElementById("ndoc" + posicionCampo);
			ndoc.value = document.form1.ndoc.value;
			
			fdoc = document.getElementById("fdoc" + posicionCampo);
			fdoc.value = document.form1.fdoc.value;
			
			monto = document.getElementById("monto" + posicionCampo);
			monto.value = document.form1.monto.value;			
			
			n_cant = document.getElementById("n_cant" + posicionCampo);
			n_cant.value = document.form1.n_cant.value;			
			
			n_igvd = document.getElementById("n_igvd" + posicionCampo);
			n_igvd.value = document.form1.n_igvd.value;			
			
			n_totd = document.getElementById("n_totd" + posicionCampo);
			n_totd.value = document.form1.n_totd.value;			
			
			montop = document.getElementById("montop" + posicionCampo);
			montop.value = document.form1.montop.value;			
			
}


function sumarcolumnatabla(){
sumar=0;
calculo=0;
var ig2=document.getElementById("igv").value;
var iniciost=document.getElementById("st").value;
var inicio=document.getElementById("bi").value;
var ig2=document.getElementById("igv").value;
var hc=document.getElementById('c_rh').checked;
var tot=parseFloat(document.getElementById("precio").value)*parseFloat(document.getElementById("cantidad").value);	
if(hc==false){
var igv=parseFloat(tot)*1.18;
}else{
var igv=parseFloat(tot)*1;	
}

var ig=parseFloat(igv)-parseFloat(tot);
var subt=tot+parseFloat(iniciost);

var subigv=ig+parseFloat(ig2);
var total=subt+subigv;

	document.getElementById("igv").value=(Math.floor(subigv*100))/100;
	document.getElementById("bi").value=(Math.floor(total*100))/100;
	document.getElementById("st").value=(Math.floor(subt*100))/100;

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
	function copiatext(){
	document.form1.codigoequipo.value=document.form1.unidad.value;
	}
</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=actualizaot&udni=<?php echo $_GET['udni'];?>">
  <div id="TabbedPanels1" class="TabbedPanels" style="width:1550px">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Actualiza Cabecera OT (Ver. 052017)</li>
      <li class="TabbedPanelsTab" tabindex="0">Actualiza Detalle OT</li>
      <li class="TabbedPanelsTab" tabindex="0">Ver Detalle N/S OT</li>
	</ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="890" border="0">
          <tr>
            <td width="154">Nro Orden Trabajo.</td>
            <td width="325">
            <input name="c_numot" type="text"  class="texto" id="c_numot" value="<?php echo $c_numot ?>" size="25"/>
            </td>
            <td width="145">Hora inicio OT.</td>
            <td width="10"></td>
            <td width="219">
				<input type="text" class="texto" name="h_inicio"  value="<?php echo $h_inicio ?>" step="1" readonly>
       </td>
            <td width="18">&nbsp;</td>
          </tr>
		  <tr>
            <td width="154">Nro de Reporte</td>
            <td width="325">
            <input name="c_numeroReporte" type="text"  class="texto" id="c_numeroReporte" value="<?php echo $c_nroreporte ?>" required/>
            </td>
            <td width="145">Serie de Equipo</td>
            <td width="10"></td>
            <td width="219">
				<input name="c_serieEquipo" type="text"  class="texto" id="c_serieEquipo" value="<?php echo $c_serieequipo ?>" required />
			</td>
            <td width="18">&nbsp;</td>
          </tr>
		  <tr>
            <td width="154">Nro de Guia</td>
            <td width="325">
            <input name="nro_guia" type="text"  class="texto" id="nro_guia" value="<?php echo $nro_guia ?>" />
            </td>
            <td width="145">Serie Ticket</td>
            <td width="10"></td>
            <td width="219">
				<input name="nro_ticket" type="text"  class="texto" id="nro_ticket" value="<?php echo $nro_ticket ?>"  />
			</td>
            <td width="18">&nbsp;</td>
          </tr>
          <tr>
            <td>Fecha de Generacion</td>
            <td>
			<?php
			//echo $d_fecdcto;
			$anio = substr($d_fecdcto, 0,4);
			$mes = substr($d_fecdcto, 5,2);
			$dia = substr($d_fecdcto, 8,2);
			?>
            <input type="text" name="d_fecdcto" id="d_fecdcto"  class="texto"size="12"  value="<?php echo $dia."/".$mes."/".$anio;?>" onkeyup = "this.value=formateafecha(this.value); "/>
<img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_fecdcto",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
            <td>Moneda</td>
            <td>&nbsp;</td>
            <td> <?php $ven = ListaMonedaM();?>
            <select name="c_codmon" id="c_codmon" class="combo texto"  onchange="moneda()">
             <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
           
            
            <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmon){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            
            
               <?php }	?>
            </select>  
          <input name="xc_codmod" type="text" id="xc_codmod" size="4" value="<?php echo $c_codmon ?>"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Trabajo a realizar </td>
            <td>
            <?php $ven = ListaTipoConceptoM();?>
              <select name="c_treal" id="c_treal" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           

   
         <option value="<?php echo $item["descripcion"]?>"<?php if($item["descripcion"]==$c_treal){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
   
   
            <?php }	?>
            
            
            
            </select>
            </select></td>
            <td>Ref Cotizacion</td>
            <td>&nbsp;</td>
            <td><input name="c_refcot" type="text"  class="texto" id="c_refcot" onfocus="validamoneda()" size="25" maxlength="11" onKeyPress="return isNumberKey(event);" required="required" value="<?php echo $coti?>"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Asunto (opcional)</td>
            <td><label for="c_asunto"></label>
            <input name="c_asunto" type="text" id="c_asunto" size="52" class="texto"  value="<?php echo $c_asunto ?>"
            onfocus="validamoneda()"/></td>
            <td>Supervisado por</td>
            <td>&nbsp;</td>
            <td><?php $ven = ListaSupervisaOrdenM();?>
              <select name="c_supervisa" id="c_supervisa" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           
     
   <option value="<?php echo $item["c_desitm"]?>"<?php if($item["c_desitm"]==$c_supervisa){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
            </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Solicitado por:</td>
            <td><?php $ven = ListaSolicitanteOrdenM();?>
              <select name="c_solicita" id="c_solicita" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
				<option value="<?php echo $item["c_desitm"]?>"<?php if($item["c_desitm"]==$c_solicita){?>selected<?php }?>><?php echo $item["c_desitm"]?></option> 
            <?php }	?>
            </select></td>
            <td>Lugar Trabajo</td>
            <td>&nbsp;</td>
            <td>
              
                <select name="c_lugartab" id="c_lugartab"  class="combo texto">
                  <option value="Almacen Zgroup">Almacen Zgroup</option>
                  <option value="Oficina Olivos">Oficina Olivos</option>
                  <option value="Instalacion Cliente">Instalacion Cliente</option>
                  <option value="Almacen Sullana">Almacen Sullana</option>
                  <option value="Almacen Ecuador">Almacen Ecuador</option>
                  <option value="Almacen USA">Almacen USA</option>
                </select>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Ejecutado por:</td>
			<td><?php $ven = ListaEjecutorOrdenM();?>
              <select name="c_ejecuta" id="c_ejecuta" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
				<option value="<?php echo $item["c_desitm"]?>"<?php if($item["c_desitm"]==$c_ejecuta){?>selected<?php }?>><?php echo $item["c_desitm"]?></option> 
            <?php }	?>
            </select></td>
            <td>Unidad</td>
            <td><label for="c_cliente"></label></td>
            <td><input name="c_cliente" type="text" class="texto" id="c_cliente" size="25" required="required"  value="<?php echo $c_unidad?>"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Fecha de entrega:</td>
            <td>
			<?php
			//echo $d_fecdcto;
			$anio2 = substr($d_fecentrega, 0,4);
			$mes2 = substr($d_fecentrega, 5,2);
			$dia2 = substr($d_fecentrega, 8,2);
			?>
            <input type="text" name="d_fecentrega" id="d_fecentrega"  class="texto" size="12"  value="<?php echo $dia2."/".$mes2."/".$anio2;?>" onkeyup = "this.value=formateafecha(this.value); "/>
<img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_fecentrega",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script></td>
            <td>Usuario Modifica</td>
            <td>&nbsp;</td>
            <td>
            <input name="c_usrcrea" type="text"  class="texto" id="c_usrcrea" size="25" readonly="readonly" required="required" value="<?php echo $udni; ?>"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Observacion</td>
            <td colspan="4">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4"><label for="c_osb"></label>
            <textarea name="c_osb" cols="40" rows="7" id="c_osb"><?= $obs?></textarea></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent" >
        <table width="1124" border="0">
          <tr>
            <td width="256"><strong>Proveedor</strong></td>
            <td width="247">
            <input name="c_nomprov" type="text"  class="texto" id="c_nomprov" size="35"/></td>
            <td width="109"><strong>Ruc</strong></td>
            <td width="224">
            <input name="c_rucprov" type="text"  class="texto" id="c_rucprov" size="35"/></td>
          </tr>
          <tr>
			<td><strong>Codigo Equipo</strong></td>
            <td><input name="unidad" type="text" required="required"  class="texto" id="unidad" 
			onclick="abreVentana(this.name)" size="35" value="<?php echo $unidad ?>" onkeypress="copiatext()" 
			onblur="copiatext()"/><input name="codigoequipo" type="hidden" id="codigoequipo" size="5" readonly="readonly" 
			class="texto" value="<?php echo $unidad ?>"/></td>
            <td><strong>Descripcion Equipo</strong></td>
            <td><input name="c_desequipo" type="text"  class="texto" id="c_desequipo" size="35" value="<?php echo $c_desequipo ?>"/>
            <input type="hidden" name="cod_des" id="cod_des" value="" /></td>
           
          </tr>
          <tr>
            <td colspan="4"><hr /></td>
          </tr>
          <tr>
            <td><strong>Concepto del Trabajo</strong></td>
            <td>
            
             <?php $ven = ListaTipoConceptoM();?>
              <select name="c_cate" id="c_cate" class="combo texto"  onchange="abreConcepto();" >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["codigo"]?>"><?php echo utf8_decode($item["descripcion"])?></option>
            <?php }	?>
             </select>
              
             <input type="hidden" name="cod_concepto" id="cod_concepto"  size="3"/></td>
            <td><strong>Detalle</strong></td>
            <td>
          <input name="c_subcat" type="text" id="c_subcat" size="35" class="texto" required="required" /></td>
          </tr>
          <tr>
            <td><strong>Tecnico Encargado</strong></td>
            <td colspan="3">
              
              
                <?php $ven = ListaEjecutorOrdenM();?>
              <select name="c_tecnico" id="c_tecnico" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>          
				<option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_decode($item["c_desitm"])?>
				</option>
            <?php }	?>
            </select></td>
          </tr>
          <tr>
            <td><strong>Precio Unitario Pactado </strong></td>
            <td colspan="3">
              <input name="n_pre" type="text" id="n_pre" size="10"  class="texto"/> 
            <strong>Cantidad
            <label for="n_cant"></label>
            <input name="n_cant" type="text" class="texto" id="n_cant" value="1" size="5" />
            Tipo Documento
           
            <select name="tdoc" id="tdoc" class="combo texto">
              <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <option value="FACTURA">FACTURA</option>
              <option value="REC. HONORARIO">REC. HONORARIO</option>
            </select>
            </strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="concepto" type="hidden" id="concepto" value="concepto" />
            <input name="fdoc" type="hidden" id="fdco" />
            <input name="ndoc" type="hidden" id="ndco" />
            <input name="montop" type="hidden" id="montop" value="0.0" />
<!--            <input type="hidden" name="n_igvd" id="n_igvd" />
            <input type="hidden" name="n_totd" id="n_totd" />--></td>
            <td><input type="hidden" name="n_igvd" id="n_igvd" />
            <input type="hidden" name="n_totd" id="n_totd" />
            <input type="hidden" name="monto" id="monto" /></td>
            <td align="right"><input type="button" name="button" id="button" value="Adicionar" onclick="accion()" /></td>
          </tr>
        </table>
        <table width="1117" border="1" cellpadding="0" cellspacing="0" bordercolor="#003366" bgcolor="#FFFFFF" id="tablaDiagnostico" style="font-size:12px">
          <tr>
            <td width="17" align="center" valign="middle" bgcolor="#FFFFCC"></td>
            <td width="228" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Proveedor</strong></td>
            <td width="210" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Concepto</strong></td>
            <td width="72" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Tecnico Encargado</strong></td>
            <td width="48" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Tipo Dcto</strong></td>
            <td width="48" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Nro Dcto</strong></td>
            <td colspan="2" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Fecha Dcto</strong></td>
            <td width="50" align="center" valign="middle" bgcolor="#99CCFF"><strong>Monto Unit.Dcto</strong></td>
            <td width="48" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Cant Dcto</strong></td>
            <td width="48" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Igv Dcto</strong></td>
            <td width="48" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Total Dcto</strong></td>
            <td width="48" align="center" valign="middle" bgcolor="#99CCFF"><strong>Monto Unit.Pact</strong></td>
            <td width="52" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Delete</strong></td>
          </tr>
                  <?php 
							if($reporteot != NULL)
							{		
								$i = 1;
								foreach($reporteot as $itemD)
								{
							
							?>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFCC"><input type="hidden" name="<?php echo "c_rucprov".$i; ?>" id="<?php echo "c_rucprov".$i; ?>" value="<?php echo $itemD["c_rucprov"]; ?>"  /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC"><input name="<?php echo "c_nomprov".$i; ?>" type="text" class="texto" id="<?php echo "c_nomprov".$i; ?>" value="<?php echo $itemD["c_nomprov"]; ?>" size="35" /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "concepto".$i; ?>" type="text" class="texto" id="<?php echo "concepto".$i; ?>" value="<?php echo $itemD["concepto"]; ?>" size="35" /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "c_tecnico".$i; ?>" type="text" class="texto" id="<?php echo "c_tecnico".$i; ?>"/ value="<?php echo $itemD["c_tecnico"]; ?>" size="12" ></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "tdoc".$i; ?>" type="text" id="<?php echo "tdoc".$i; ?>" size="8" class="texto"value="<?php echo $itemD["tdoc"]; ?>"  /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "ndoc".$i; ?>" type="text" id="<?php echo "ndoc".$i; ?>" size="8" class="texto"value="<?php echo $itemD["ndoc"]; ?>"  /></td>
            <td valign="middle" bgcolor="#FFFFCC">
              
              
              <input name="<?php echo "fdoc".$i; ?>" type="text" id="<?php echo "fdoc".$i; ?>" size="8" class="texto"  value="<?php echo $itemD["fdoc"]; ?>"  />
             
              
              
              
            </td>
            <td width="50" align="center" valign="middle" bgcolor="#FFFFCC"> <img src="../images/calendario.jpg" id="<?php echo "ImageQ".$i; ?>" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
              <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fdoc"+<?php echo $i ?>,
					ifFormat   : "%d/%m/%Y",
					button     : "ImageQ"+<?php echo $i ?>
					  }
					);
		 </script></td>
            <td align="center" valign="middle" bgcolor="#99CCFF">
            <input name="<?php echo "monto".$i; ?>" type="text" id="<?php echo "monto".$i; ?>" size="5" class="texto"value="<?php echo $itemD["monto"]; ?>"  /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "n_cant".$i; ?>" type="text" id="<?php echo "n_cant".$i; ?>" size="5" class="texto" value="<?php echo $itemD["n_cant"]; ?>"  /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "n_igvd".$i; ?>" type="text" id="<?php echo "n_igvd".$i; ?>" size="5" class="texto" value="<?php echo $itemD["n_igvd"]; ?>"  /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC">
            <input name="<?php echo "n_totd".$i; ?>" type="text" id="<?php echo "n_totd".$i; ?>" size="5" class="texto" value="<?php echo $itemD["n_totd"]; ?>" /></td>
            <td align="center" valign="middle" bgcolor="#99CCFF">
            <input name="<?php echo "montop".$i; ?>" type="text" id="<?php echo "montop".$i; ?>" size="5" class="texto" value="<?php echo $itemD["montop"]; ?>" /></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC"><input type="button" name="button2" id="button2" value="Delete" onclick="eliminarUsuario(this)" /></td>
          </tr>
          <?php
		  $i++;
		   		}
		  
		  	}
			?>
        </table>
        <p>&nbsp;</p>
		<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Adicionales Orden Trabajo</strong></legend>
		  <table width="990" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="90">&nbsp;&nbsp;Trato Pago</td>
			  <td width="7">&nbsp;</td>
			  <td width="287">
				<?php $ven = ListaFormaPagoM();?>
				<select name="c_tratopag" id="c_tratopag" class="Combos texto">
				  <option value="0">.::SELECCIONE::.</option>
				  <?php foreach($ven as $item){?>          
				   <option value="<?php echo $item["c_desitm"]?>"<?php if($item["c_desitm"]==$add1){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
				  <?php }	?>
				  
			</tr>
			<tr>
			  <td>Factura Pago</td>
			  <td>&nbsp;</td>
			  <td><?php $ven = ListaPlazoM();?>
				<select name="c_codpgf" id="c_codpgf"  class="Combos texto" onchange="formapago();">
					<option value="0">.::SELECCIONE::.</option>
				  <?php foreach($ven as $item){?>
				  <option value="<?php echo $item["c_desitm"]?>"<?php if($item["c_desitm"]==$add2){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
				  <?php }	?>
				</select>
			</tr>
			<tr>
			  <td><strong style="color:#06C">Observaciones</strong></td>
			  <td>:</td>
			  <td colspan="4"><textarea name="c_obs" id="c_obs" cols="60"></textarea></td>
			  </tr>
			<tr>
			  <td colspan="6" align="center">&nbsp;</td>
			</tr>
		  </table>
  </fieldset>
		
      </div>
      <div class="TabbedPanelsContent"></div>
</div>
  </div>
  <table width="462" border="0" align="center">
  <tr>
    <td><?php  ?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <div class="buttons">
      <button type="button" class="positive" name="save" onclick="guardar()">
        <img src="../images/icon_accept.png" alt=""/>
        Guardar
        </button>
      

      
      <button type="button" class="negative" name="cancel">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
        </button>
  </div>
  </td>
  </tr>
  </table>

</form>
<p>&nbsp; </p>
<p>&nbsp;</p>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
  </script>
</body>
</html>