<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
		$udni=$item['login'];
	}
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


$().ready(function() {
	$("#c_tecnico").autocomplete("../MVC_Controlador/OrdenTrabajoC.php?acc=Proautotecnico", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_tecnico").result(function(event, data, formatted) {
	$("#c_tecnico").val(data[0]);
		
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
			if (codigo=="") {
				alert ("Debe Introducir Codigo Equipo");
			} else {
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigos&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
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

function insertRowToTable(){
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
		
		var c_tecnico=document.form1.c_tecnico.value;
	
		var n_cant=document.form1.n_cant.value;
		
	var tdoc=document.form1.tdoc.options[document.form1.tdoc.selectedIndex].value;
	var ndoc=document.form1.ndoc.value
	var fdoc=document.form1.fdoc.value	
	var monto=document.form1.n_pre.value 
	
    var xmontop=parseFloat(document.form1.n_cant.value)*parseFloat(document.form1.n_pre.value)
	 
	var montop=monto	// monto pactado

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
		txtInpb.setAttribute('value', c_nomprov); 
		
		// iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		
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
		//                                                                 txtInpg.setAttribute('onkeyup','actualizar_importe(this.name)');
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
function copiatext(){
	document.form1.codigoequipo.value=document.form1.unidad.value;
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
	var cod=document.form1.c_codmon.options[document.form1.c_codmon.selectedIndex].text;
	var td=document.form1.tdoc.options[document.form1.tdoc.selectedIndex].text;
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
	if(document.form1.c_subcat.value==""){
		alert('Ingrese Detalle del trabajo');
		document.form1.c_subcat.focus();
		return 0;
		}
	if(document.form1.tdoc.options[document.form1.tdoc.selectedIndex].text=='.::SELECCIONE::.'){
		alert('ingrese tipo documento')
		return 0;
		}
	addRowToTable();
	limpiar();
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
	
function validartecnico(){
		var tecnico=document.form1.c_tecnico.options[document.form1.c_tecnico.selectedIndex].text;
		var theTable = document.getElementById('tablaDiagnostico');
		var cantFilas = theTable.rows.length;
	if(cantFilas==1){
//		alert('no hay detalle')
		addRowToTable();
		return 0;
	}else{
		for(var y = 1;y <=20;y++){	
			if(document.getElementById('c_tecnico'+y).value==tecnico)	{
			alert('Tecnico Ya tiene Asignado Trabajo Para esta Orden');
			break;
			
			}else{
				addRowToTable();
				}
		}
	}
}
function guardar(){	
if(document.form1.unidad.value==''){
	alert('ingrese codigo equipo');
return 0;
}			
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
if(confirm("Seguro de Grabar Orden De Trabajo ?")){
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

</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=registraot">
  <div id="TabbedPanels1" class="TabbedPanels" style="width:1550px"  >
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Cabecera OT</li>
      <li class="TabbedPanelsTab" tabindex="0">Detalle OT</li>
      <li class="TabbedPanelsTab" tabindex="0">Ver Detalle N/S OT</li>
</ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="890" border="0">
          <tr>
            <td width="154">Nro Orden Trabajo</td>
            <td width="325">
            <input name="c_numot" type="text"  class="texto" id="c_numot" value="AUTOGENERADO" size="25" readonly="readonly"/>
            </td>
            <td width="145">&nbsp;</td>
            <td width="10"></td>
            <td width="219">
       </td>
            <td width="18">&nbsp;</td>
          </tr>
          <tr>
            <td>Fecha de Generacion</td>
            <td>
            <input type="text" name="d_fecdcto" id="d_fecdcto"  class="texto"size="12"  value="<?php echo date('d/m/Y');?>" onkeyup = "this.value=formateafecha(this.value); "/>
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
           
   <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
            <?php }	?>
            </select>  
          <input name="xc_codmod" type="hidden" id="xc_codmod" size="5"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Trabajo a realizar </td>
            <td>
            <?php $ven = ListaTipoConceptoM();?>
              <select name="c_treal" id="c_treal" class="combo texto">
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["descripcion"]?>"><?php echo utf8_decode($item["descripcion"])?></option>
            <?php }	?>
            </select>
            </td>
            <td>Ref Cotizacion</td>
            <td></td>
            <td><input name="c_refcot" type="text"  class="texto" id="c_refcot" onfocus="validamoneda()" size="25" maxlength="11" onKeyPress="return isNumberKey(event);" required="required"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Asunto (opcional)</td>
            <td><label for="c_asunto"></label>
            <input name="c_asunto" type="text" id="c_asunto" size="52" class="texto" 
            onfocus="validamoneda()"/></td>
            <td>Supervisado por</td>
            <td>&nbsp;</td>
            <td><?php $ven = ListaSupervisaOrdenM();?>
              <select name="c_supervisa" id="c_supervisa" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_decode($item["c_desitm"])?></option>
            <?php }	?>
            </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Solicitado por:</td>
            <td>
              
              <?php $ven = ListaSolicitanteOrdenM();?>
              <select name="c_solicita" id="c_solicita" class="combo texto"   >
              <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_decode($item["c_desitm"])?></option>
            <?php }	?>
            </select></td>
            <td>Lugar Trabajo</td>
            <td>&nbsp;</td>
            <td>
              
                <select name="c_lugartab" id="c_lugartab"  class="combo texto">
                  <option value="Almacen Zgroup">Almacen Zgroup</option>
                  <option value="Instalacion Cliente">Instalacion Cliente</option>
				  <option value="Oficina Olivos">Oficina Olivos</option>
                  <option value="Almacen Sullana">Almacen Sullana</option>
                  <option value="Almacen Ecuador">Almacen Ecuador</option>
                  <option value="Almacen USA">Almacen USA</option>
                </select>
              </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Ejecutado por:</td>
            <td>
            <input name="c_ejecuta" type="text"  class="texto" id="c_ejecuta" size="25" required="required"  onfocus="validamoneda()"/></td>
            <td>Referencia Lugar</td>
            <td><label for="c_cliente"></label></td>
            <td><input name="c_cliente" type="text" class="texto" id="c_cliente" size="25" required="required" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Fecha de entrega:</td>
            <td>
            <input type="text" name="d_fecentrega" id="d_fecentrega"  class="texto" size="12"  value="<?php echo date('d/m/Y');?>" onkeyup = "this.value=formateafecha(this.value); "/>
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
            <td>Usuario Registrador</td>
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
            <td colspan="4">
            <textarea name="c_osb" cols="40" rows="7" id="c_osb"></textarea></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent" >
        <table width="867" border="0">
          <tr>
            <td width="256"><strong>Proveedor</strong></td>
            <td width="247">
            <input name="c_nomprov" type="text"  class="texto" id="c_nomprov" size="35"/></td>
            <td width="109"><strong>Ruc</strong></td>
            <td width="224">
            <input name="c_rucprov" type="text"  class="texto" id="c_rucprov" size="35"/></td>
          </tr>
          <tr>
            <td><strong>Descripcion Equipo</strong></td>
            <td><input name="c_desequipo" type="text"  class="texto" id="c_desequipo" size="35"/>
            <input type="hidden" name="cod_des" id="cod_des" /></td>
            <td><strong>Codigo Equipo</strong></td>
            <td><input name="unidad" type="text" required="required"  class="texto" id="unidad" onclick="abreVentana(this.name)" size="35" onkeypress="copiatext()" onblur="copiatext()"/><input name="codigoequipo" type="hidden" id="codigoequipo" size="5" readonly="readonly" class="texto" /></td>
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
              <?php /*?><select name="c_tecnico" id="c_tecnico" class="combo texto"   >
               <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_decode($item["c_desitm"])?></option>
            <?php }	?>
            </select><?php */?>
            <input name="c_tecnico" type="text" id="c_tecnico" size="35" class="texto" required="required" />
            </td>
          </tr>
          <tr>
            <td><strong>Precio Unitario Pactado </strong></td>
            <td colspan="3">
              <input name="n_pre" type="text" id="n_pre" size="10"  class="texto"/> 
            <strong>Cantidad
           
            <input name="n_cant" type="text" class="texto" id="n_cant" value="1" size="5" />
            Tipo Documento
           
            <select name="tdoc" id="tdoc" class="combo texto">
              <option value="1">.::SELECCIONE::.</option>
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
            <td>&nbsp;</td>
            <td align="right"><input type="button" name="button" id="button" value="Adicionar" onclick="accion()" /></td>
          </tr>
        </table>
        <table width="867" border="1" cellpadding="0" cellspacing="0" bordercolor="#003366" bgcolor="#FFFFFF" id="tablaDiagnostico" style="font-size:12px">
          <tr>
            <td width="36" align="center" valign="middle" bgcolor="#FFFFCC"><strong>N°</strong></td>
            <td align="center" valign="middle" bgcolor="#FFFFCC"></td>
            <td width="338" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Proveedor</strong></td>
            <td width="243" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Concepto</strong></td>
            <td width="72" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Tecnico Encargado</strong></td>
            <td width="72" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Tipo Dcto</strong></td>
            <td width="75" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Nro Dcto</strong></td>
            <td width="70" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Fecha Dcto</strong></td>
            <td width="73" align="center" valign="middle" bgcolor="#99CCFF"><strong>Monto Unit.Dcto</strong></td>
            <td width="77" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Cant Dcto</strong></td>
            <td width="77" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Igv Dcto</strong></td>
            <td width="77" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Total Dcto</strong></td>
            <td width="77" align="center" valign="middle" bgcolor="#99CCFF"><strong>Precio Unit.Pact</strong></td>
            <td width="95" align="center" valign="middle" bgcolor="#FFFFCC"><strong>Delete</strong></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </div>
      <div class="TabbedPanelsContent"></div>
</div>
  </div>
  <table width="462" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
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