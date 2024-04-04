<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<link href="../css/tabla1.css" rel="stylesheet" type="text/css" media="all">-->
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<script type="text/javascript" src="../js/jquery.js"></script>   
<script type="text/javascript" src="../js/main.js"></script>
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script src="../js/jquery.html5form-1.5-min.js"></script>
<script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
         document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
      }
   </script>


 <link rel="stylesheet" media="screen" type="text/css" href="../css/datepicker.css" />
<script type="text/javascript" src="../js/datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="../css/formulario.css">

<!--<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
<script type='text/javascript' src='../js/funcionesvali.js'></script>-->




<!--<style type="text/css">

.error{
    background-color: #BC1010;
    border-radius: 4px 4px 4px 4px;
    color: white;
    font-weight: bold;
    margin-left: 16px;
    margin-top: 6px;
    padding: 6px 12px;
    position: absolute;
}
.error:before{
    border-color: transparent #BC1010 transparent transparent;
    border-style: solid;
    border-width: 6px 8px;
    content: "";
    display: block;
    height: 0;
    left: -16px;
    position: absolute;
    top: 8px;
    width: 0;
}


</style>-->


<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">
</head>
estilovali
<script type="text/javascript">


var INPUT_NAME_PREFIX = 'c_Paren'; // this is being set via script a
var INPUT_NAME_DES = 'c_NombreC'; // this is being set via script b
var INPUT_NAME_GLO = 'c_Ocup'; // this is being set via script g
var INPUT_NAME_CLA = 'c_Telef'; // this is being set via script h
var INPUT_NAME_PRE = 'c_TrabajaA'; // this is being set via script c
var INPUT_NAME_DSC = 'c_Direc'; // this is being set via script d
var TABLE_NAME = 'tblSample'; // this should be named in the HTML
var ROW_BASE = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows;

function fillInRows()
{
	hasLoaded = true;

		
}


function myRowObject(one,two,tres,cuatro,cinco,seis)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	//this.siete=siete;
	//this.ocho=ocho;
	//this.nueve=nueve;
	
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


function addRowToTable(num)
{
	//alert('hola');

	var codigo=document.getElementById("c_Paren").value
	var des=document.getElementById("c_NombreC").value
	var glo=document.getElementById("c_Ocup").value
	var cla=document.getElementById("c_Telef").value
	var pre=document.getElementById("c_TrabajaA").value
	var dsc=document.getElementById("c_Direc").value

	
	
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
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		//txtInpa.setAttribute('class', 'texto'); 
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
	//txtInpc.setAttribute('class', 'texto'); 
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
		//txtInpd.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpd);
		
		
			var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('size', '5');
		txtInpe.setAttribute('value', pre); // iteration included for debug purposes
		//txtInpe.setAttribute('class', 'texto');
		//txtInpe.setAttribute('readonly', 'readonly'); 
		cell5.appendChild(txtInpe);
						
		var cell6 = row.insertCell(6);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_DSC + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_DSC + iteration);
		txtInpf.setAttribute('size', '5');
		txtInpf.setAttribute('value', dsc); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell6.appendChild(txtInpf);
		
		
				
		// cell 2 - input button
		var cell7 = row.insertCell(7);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell7.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpf);
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
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_CLA + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_PRE + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_DSC + count;
				//tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_CAN + count;
				//tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_IMP + count;
				
				
			
				
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

</script>

<script language="javascript">
function accion(){
	
	addRowToTable();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
	}
</script>




<script type="text/javascript">



var INPUT_NAME_PREFIX2 = 'c_nivel'; // this is being set via script a
var INPUT_NAME_DES2 = 'c_CentroE'; // this is being set via script b
var INPUT_NAME_GLO2 = 'c_UltiAa'; // this is being set via script g
/*var INPUT_NAME_CLA2 = 'c_Telef'; // this is being set via script h
var INPUT_NAME_PRE2 = 'c_TrabajaA'; // this is being set via script c
var INPUT_NAME_DSC2 = 'c_Direc';*/ // this is being set via script d
var TABLE_NAME2 = 'tblSample2'; // this should be named in the HTML
var ROW_BASE2 = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows2;

function fillInRows2()
{
	hasLoaded = true;

		
}


function myRowObject2(one,two,tres)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;

	//this.siete=siete;
	//this.ocho=ocho;
	//this.nueve=nueve;
	
	//this.three = three; // input checkbox object
	//this.four = four; // input radio object
}

/*
 * insertRowToTable
 * Insert and reorder
 */
function insertRowToTable2()
{
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME2);
		var rowToInsertAt = tbl.tBodies[0].rows.length;
		for (var i=0; i<tbl.tBodies[0].rows.length; i++) {
			if (tbl.tBodies[0].rows[i].myRow) {
				rowToInsertAt = i;
				break;
			}
		}
		addRowToTable2(rowToInsertAt);
reorderRows2(tbl, rowToInsertAt);
	}
}


function addRowToTable2(num)
{
	//alert('hola');

	var codigo=document.getElementById("c_nivel").value
	var des=document.getElementById("c_CentroE").value
	var glo=document.getElementById("c_UltiAa").value
	

	
	
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME2);
		var nextRow = tbl.tBodies[0].rows.length;
		var iteration = nextRow + ROW_BASE;
		if (num == null) { 
			num = nextRow;
		} else {
			iteration = num + ROW_BASE2;
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
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX2 + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX2 + iteration);
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		//txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
			var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES2 + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES2 + iteration);
		txtInpb.setAttribute('size', '40');
	txtInpb.setAttribute('value', des); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
	txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
	txtInpb.setAttribute('class', 'texto'); 
	
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO2 + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO2 + iteration);
		txtInpc.setAttribute('size', '40');
	txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	//txtInpc.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		

			
		
		
				
		// cell 2 - input button
		var cell7 = row.insertCell(4);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow2(this)};
		cell7.appendChild(btnEl);
		
		row.myRow = new myRowObject2(textNode,txtInpa,txtInpb,txtInpc);
	}
}


// If there isn't an element with an onclick event in your row, then this function can't be used.
function deleteCurrentRow2(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		deleteRows2(rowArray);
		reorderRows2(tbl, rIndex);
	  //calculartotales();
	}
}

function reorderRows2(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE2;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.one.data = count; // text
				
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX2 + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES2 + count;
		
				//tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_CAN + count;
				//tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_IMP + count;
				
				
			
				
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

function deleteRows2(rowObjArray)
{
	if (hasLoaded) {
		for (var i=0; i<rowObjArray.length; i++) {
			var rIndex = rowObjArray[i].sectionRowIndex;
			rowObjArray[i].parentNode.deleteRow(rIndex);
		}
	}
}

function openInNewWindow2(frm)
{
	// open a blank window
	var aWindow = window.open('', 'TableAddRow2NewWindow',
	'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
	
	// set the target to the blank window
	frm.target = 'TableAddRow2NewWindow';
	
	// submit
	frm.submit();
}

</script>


<script language="javascript">
function accion2(){
	
	addRowToTable2();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
	}
</script>


<script language="javascript">
function accion3(){
	
	addRowToTable3();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
	}
</script>



<script type="text/javascript">




var INPUT_NAME_PREFIX3 = 'c_Empr'; // this is being set via script a
var INPUT_NAME_DES3 = 'c_Cargo'; // this is being set via script b
var INPUT_NAME_GLO3 = 'd_FechaI'; // this is being set via script g
var INPUT_NAME_CLA3 = 'd_FechaC'; // this is being set via script h
var INPUT_NAME_PRE3 = 'c_JefeInm'; // this is being set via script c
var INPUT_NAME_DSC3 = 'C_Telef'; // this is being set via script d
var INPUT_NAME_TEL3 = 'C_MotC'; // this is being set via script d
var TABLE_NAME3 = 'tblSample3'; // this should be named in the HTML
var ROW_BASE3 = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows3;

function fillInRows3()
{
	hasLoaded = true;

		
}


function myRowObject3(one,two,tres,cuatro,cinco,seis,siete)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	this.siete=siete;
	

	//this.siete=siete;
	//this.ocho=ocho;
	//this.nueve=nueve;
	
	//this.three = three; // input checkbox object
	//this.four = four; // input radio object
}

/*
 * insertRowToTable
 * Insert and reorder
 */
function insertRowToTable3()
{
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME3);
		var rowToInsertAt = tbl.tBodies[0].rows.length;
		for (var i=0; i<tbl.tBodies[0].rows.length; i++) {
			if (tbl.tBodies[0].rows[i].myRow) {
				rowToInsertAt = i;
				break;
			}
		}
		addRowToTable3(rowToInsertAt);
reorderRows3(tbl, rowToInsertAt);
	}
}


function addRowToTable3(num)
{
	//alert('hola');

	var codigo=document.getElementById("c_Empr").value
	var des=document.getElementById("c_Cargo").value
	var glo=document.getElementById("d_FechaI").value
	var cla=document.getElementById("d_FechaC").value
	var pre=document.getElementById("c_JefeInm").value
	var dsc=document.getElementById("C_Telef").value
	var dsc2=document.getElementById("C_MotC").value
	

	
	
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME3);
		var nextRow = tbl.tBodies[0].rows.length;
		var iteration = nextRow + ROW_BASE3;
		if (num == null) { 
			num = nextRow;
		} else {
			iteration = num + ROW_BASE3;
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
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX3 + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX3 + iteration);
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		//txtInpa.setAttribute('readonly', 'readonly');
		//txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
			var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES3 + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES3 + iteration);
		txtInpb.setAttribute('size', '40');
		txtInpb.setAttribute('value', des); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
	//txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
	//txtInpb.setAttribute('class', 'texto'); 
	
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO3 + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO3 + iteration);
		txtInpc.setAttribute('size', '40');
		txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	//txtInpc.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		
		var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_CLA3 + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_CLA3 + iteration);
		txtInpd.setAttribute('size', '5');
		txtInpd.setAttribute('value', cla); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'texto'); 
		//txtInpd.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpd);
		
		
			var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_PRE3 + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_PRE3 + iteration);
		txtInpe.setAttribute('size', '5');
		txtInpe.setAttribute('value', pre); // iteration included for debug purposes
		//txtInpe.setAttribute('class', 'texto');
		//txtInpe.setAttribute('readonly', 'readonly'); 
		cell5.appendChild(txtInpe);
						

		var cell6 = row.insertCell(6);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_DSC3 + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_DSC3 + iteration);
		txtInpf.setAttribute('size', '5');
		txtInpf.setAttribute('value', dsc); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell6.appendChild(txtInpf);
		
		
		
		var cell7 = row.insertCell(7);
		var txtInpfe = document.createElement('input');
		txtInpfe.setAttribute('type', 'text');
		txtInpfe.setAttribute('name', INPUT_NAME_TEL3 + iteration);
		txtInpfe.setAttribute('id', INPUT_NAME_TEL3 + iteration);
		txtInpfe.setAttribute('size', '5');
		txtInpfe.setAttribute('value', dsc2); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell7.appendChild(txtInpfe);
		

			
		
		
				
		// cell 2 - input button
		var cell8 = row.insertCell(8);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow3(this)};
		cell8.appendChild(btnEl);
		
		row.myRow = new myRowObject3(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpf,txtInpfe);
	}
}


// If there isn't an element with an onclick event in your row, then this function can't be used.
function deleteCurrentRow3(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		deleteRows3(rowArray);
		reorderRows3(tbl, rIndex);
	  //calculartotales();
	}
}

function reorderRows3(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE3;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.one.data = count; // text
				
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX3 + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES3 + count;
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_GLO3 + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_CLA3 + count;
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_PRE3 + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_DSC3 + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_TEL3 + count;
				
				
			
				
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

function deleteRows3(rowObjArray)
{
	if (hasLoaded) {
		for (var i=0; i<rowObjArray.length; i++) {
			var rIndex = rowObjArray[i].sectionRowIndex;
			rowObjArray[i].parentNode.deleteRow(rIndex);
		}
	}
}

function openInNewWindow3(frm)
{
	// open a blank window
	var aWindow = window.open('', 'TableAddRow2NewWindow',
	'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
	
	// set the target to the blank window
	frm.target = 'TableAddRow2NewWindow';
	
	// submit
	frm.submit();
}

</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
        // Change es un evento que se ejecuta cada vez que se cambia el valor de un elemento (input, select, etc).
        $('#useri').change(function(e) {
          $('#textfield2').val($(this).find(':selected').text());
        });
      });
</script>















<!--<script type="text/javascript">
//Pequeño script que se encarga de validar el formulario antes de ser enviado
function validar(formElem){
    
	/*if(formElem.apepat.value.length == 0){
	    alert ("¡Escribe el apellido paterno!");
		formElem.apepat.focus();
		return (false);
		}

	

    
	if(formElem.apemat.value.length == 0){
	    alert ("¡Escribe el apellido materno!");
		formElem.apemat.focus();
		return (false);
		}
		

    
	if(formElem.pnombre.value.length == 0){
	    alert ("¡Escribe el primer nombre!");
		formElem.pnombre.focus();
		return (false);
		}*/
 
	if(formElem.textfield4.value.length == 0){
	    alert ("¡Ingresa el lugar de nacimiento!");
		formElem.textfield4.focus();
		return (false);
		}
		
	

    
	if(formElem.textfield9.value.length == 0){
	    alert ("¡Ingresa la ciudad de origen!");
		formElem.textfield9.focus();
		return (false);
		}
		


    
	if(formElem.textfield8.value.length == 0){
	    alert ("¡Ingresa pais de origen!");
		formElem.textfield8.focus();
		return (false);
		}
	
	if(formElem.textfield11.value.length == 0){
	    alert ("¡Ingresa tu distrito!");
		formElem.textfield11.focus();
		return (false);
		}
	if(formElem.textfield7.value.length == 0){
	    alert ("¡Ingresa tu domicilio!");
		formElem.textfield7.focus();
		return (false);
		}		
	
	
}	
</script>-->

<body>


<form action="../MVC_Controlador/rrhhC.php?acc=listaemple" method="post" enctype="multipart/form-data" name="formElem" id="formElem" onSubmit="return validar(this)" >
<fieldset class="step">
<div>
<div>
<div>


  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Datos Personales</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Academicos</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Pariente</li>
<li class="TabbedPanelsTab" tabindex="0">Experiencia Laboral</li>
      <li class="TabbedPanelsTab" tabindex="0">Información Economica</li>
     
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="960" border="0" class="contacto">
          <tr>
            <td width="164">Apellido Paterno</td>
            <td width="280"><label for="textfield3"></label>
              <input type="text" name="apepat" id="apepat" class="texto" placeholder="Apellido paterno" required /></td>
            <td width="194">Apellido Materno</td>
            <td width="304"><label for="textfield7" required></label>
              <input type="text" name="apemat" id="apemat"class="texto" required placeholder="Apellido materno"/>
              <label for="c_NombreC"></label></td>
          </tr>
          <tr>
            <td>Primer Nombre</td>
            <td><label for="textfield4"></label>
              <input type="text" name="pnombre" id="textfield4" class="texto"  required placeholder="Primer nombre"/></td>
            <td>Segundo Nombre</td>
            <td><label for="c_NombreC"></label>
              <input type="text" name="snombre" id="textfield12" class="texto" required placeholder="Segundo nombre"/></td>
          </tr>
          <tr>
            <td>Lugar de Nacimiento:</td>
            <td><input type="text" name="textfield4" id="textfield4" class="texto" required placeholder="lugar de nacimiento"/></td>
            <td>Fecha de Nacimiento:</td>
            <td><input name="textfield5"  class="texto" id="textfield5" type="date" readonly="readonly" required  placeholder="Ingrese fecha->" />
             <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "textfield5",
					ifFormat   : "%Y/%m/%d",
					button     : "Image1"
					  }
					);
		 </script>
              <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" /></td>
          </tr>
          <tr>
            <td>Dcto de Identidad:</td>
            <td><label for="textfield2"></label>
              <input name="textfield2" id="textfield2" readonly class="texto" type="text" required placeholder="DNI -->"/></td>
            <td>Relacionado con:</td>
            <td><label for="textfield5"></label>
             
              <?php $ven = listarxuserinfoC(); ?>
              <select name="useri" id="useri" class="Combos texto" onchange="pasardatos()" >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["userid"]?>"><?php echo $item["DNI"]?></option>
                <?php }	?>
              </select></td>
          </tr>
          <tr>
            <td>Teléfono Fijo:</td>
            <td><input type="tel" name="textfield3" id="textfield3" class="texto" placeholder="Telefono Fijo"/></td>
            <td>Teléfono Movil:</td>
            <td><input type="text" name="textfield6" id="textfield6" class="texto" placeholder="telefono móvil" /></td>
          </tr>
          <tr>
            <td>Estado Civil</td>
            <td><select name="select2" id="select2" class="Combos texto">
              <option value="1" selected="selected">Soltero</option>
              <option value="2">Conviviente</option>
              <option value="3">Divorciado</option>
              <option value="4">Casado</option>
              <option value="5">Viudo</option>
            </select></td>
            <td>Pais:</td>
            <td><label for="textfield8"></label>
              <input type="text" name="textfield8" id="textfield8" class="texto" required="required" placeholder="pais"/></td>
          </tr>
          <tr>
            <td>Ciudad:</td>
            <td><input name="textfield9" type="text" id="textfield9"class="texto" required="required" placeholder="ciudad"/></td>
            <td>Pronvincia:</td>
            <td><input type="text" name="textfield10" id="textfield10" class="texto" required="required" placeholder="provincia"/></td>
          </tr>
          <tr>
            <td>Distrito:</td>
            <td><label for="textfield11"></label>
              <input type="text" name="textfield11" id="textfield11" class="texto" required="required" placeholder="distrito"/>
              <label for="textfield9"></label></td>
            <td>Empresa:</td>
            <td><label for="textfield10"></label>
              <label for="Sempresa"></label>
              <select name="Sempresa" id="Sempresa" class="combos texto">
                <option value="1">zgroup</option>
                <option value="2">pscargo</option>
              </select>
              <label for="textfield6"></label></td>
          </tr>
          <tr>
            <td>Domicilio:</td>
            <td colspan="3"><input name="textfield7" type="text" id="textfield7" size="90" class="texto" required="required" placeholder="Ingrese la direccion de su domicilio"/></td>
          </tr>
          <tr>
            <td>Documentos</td>
            <td><p>
              <input name="antp" type="checkbox" id="checkbox" value="1" class="texto" />
              Antecedentes Policiales
            </td>
            <td colspan="2"><label for="fileField"></label>
              <input type="file" name="fileField" id="fileField"  /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="cv" type="checkbox" id="checkbox2" value="1" />
              <label for="checkbox2"></label>
              Curriculum Vitae </td>
            <td colspan="2"><label for="fileField2"></label>
              <input type="file" name="fileField2" id="fileField2" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="copiar" type="checkbox" id="checkbox3" value="1" />
              <label for="checkbox3"></label>
              Copia de recibo de servicio publico</td>
            <td colspan="2"><label for="fileField3"></label>
              <input type="file" name="fileField3" id="fileField3" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="copiad" type="checkbox" id="checkbox4" value="1" />
              <label for="checkbox4"></label>
              Fotocopia de Dni</td>
            <td colspan="2"><input type="file" name="fileField4" id="fileField4" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="fotoa" type="checkbox" id="checkbox5" value="1" />
              <label for="checkbox5"></label>
              Foto Actualizada</td>
            <td colspan="2"><label for="fileField5"></label>
              <input type="file" name="fileField5" id="fileField5" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="croquisd" type="checkbox" id="checkbox6" value="1" />
              <label for="checkbox6"></label>
              Croquis de Domicilio</td>
            <td colspan="2"><label for="fileField6"></label>
              <input type="file" name="fileField6" id="fileField6" />
              <input type="text" name="textfield" id="textfield" /></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="975" border="0">
          <tr>
            <td width="113">Nivel Academico:</td>
            <td width="104"><label for="apepat">
              <select name="c_nivel" id="c_nivel" class="combos texto">
                <option value="1">Primari</option>
                <option value="2">Secundaria</option>
                <option value="3">Instituto</option>
                <option value="4">Universidad</option>
                <option value="5">Otros</option>
              </select>
            </label></td>
            <td width="122">Centro de Estudios</td>
            <td width="160"><input type="text" name="c_CentroE" id="c_CentroE" class="texto" required="required" placeholder="Centro de estudios"/></td>
            <td width="160"><label for="c_NombreC">Ultimo Año Aprobado</label></td>
            <td width="176"><input  name="c_UltiAa" id="c_UltiAa"  class="texto" required="required" type="number" placeholder="Ingrese ultimo año academico" /></td>
            <td width="94"><a href="#" onclick="accion2()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
          </tr>
        </table>
        <table width="974" height="22" border="0" cellspacing="0" id="tblSample2">
          <thead>
            <tr>
              <th width="33"  bgcolor="#66CCCC">#</th>
              <th width="85" bgcolor="#66CCCC">Nivel Academico</th>
              <th width="156" bgcolor="#66CCCC">Centro de Estudios</th>
              <th width="72" bgcolor="#66CCCC">Ultimo Año Aprobado</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="975" border="0">
          <tr>
            <td width="72">Parentesco</td>
            <td width="146"><label for="apepat"></label>
              <select name="c_Paren" id="c_Paren" class="combos texto" >
                <option value="Madre" selected="selected">Madre</option>
                <option value="Padre">Padre</option>
                <option value="Hijo">Hijo</option>
                <option value="Esposo(a)">Esposo(a)</option>
                <option value="Otros">Otros</option>
              </select></td>
            <td width="139">Nombre:</td>
            <td width="144"><label for="select"></label>
              <label for="c_NombreC"></label>
              <input type="text" name="c_NombreC" id="c_NombreC" class="texto" required="required" placeholder="Nombre pariente"/>
            <td width="69">Ocupacion:</td>
            <td width="144"><input type="text" name="c_Ocup" id="c_Ocup" class="texto" required="required" placeholder="Ingrese su ocupacion"/></td>
            <td width="215">&nbsp;</td>
          </tr>
          <tr>
            <td>Teléfono:</td>
            <td><label for="textfield2">
              <input type="tel" name="c_Telef" id="c_Telef" class="texto" placeholder="telefono"/>
            </label></td>
            <td>Trabaja en Zgroup</td>
            <td align="left"><p>
              <label>
                <input type="radio" name="c_TrabajaA" value="1" id="c_TrabajaA" class="texto" required="required"/>
                SI </label>
              <label>
                <input type="radio" name="c_TrabajaA" value="0" id="c_TrabajaA" class="texto" required="required"/>
                No </label>
              <br />
            </p></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Domicilio:</td>
            <td colspan="5"><input name="c_Direc" type="text" id="c_Direc" size="90" class="texto" placeholder="iNGRESE DIRECCION DE DOMICILIO" required="required"/></td>
            <td><a href="#" onclick="accion()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
          </tr>
        </table>
        <table width="974" height="22" border="0" cellspacing="0" id="tblSample">
          <thead>
            <tr>
              <th width="33"  bgcolor="#66CCCC">#</th>
              <th width="85" bgcolor="#66CCCC">Parentesco</th>
              <th width="123" bgcolor="#66CCCC">Nombre</th>
              <th width="105" bgcolor="#66CCCC">Ocupación</th>
              <th width="120" bgcolor="#66CCCC">Telf</th>
              <th width="131" bgcolor="#66CCCC">Trabaja en Zgroup</th>
              <th width="359" bgcolor="#66CCCC">Domicilio</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
<div class="TabbedPanelsContent">
        <table width="1056" border="0">
          <tr>
            <td width="107">Empresa:</td>
            <td width="172"><label for="n_IngMpro"></label>
            <input type="tel" name="c_Empr" id="c_Empr" class="texto" required="required" placeholder="Ingrese el telefono"/></td>
            <td width="59">Cargo:</td>
            <td width="164"><label for="c_NombreC">
              <select name="c_Cargo" id="c_Cargo" class="combos texto">
                <option value="1">Soltero</option>
                <option value="2">Conviviente</option>
                <option value="3">Divorciado</option>
                <option value="4">Casado</option>
                <option value="5">Viudo</option>
              </select>
            </label></td>
            <td width="99">Fecha Ingreso:</td>
            <td width="170"><label for="d_FechaI"></label>
              <input name="d_FechaI" type="date" class="texto" id="d_FechaI" readonly="readonly" placeholder="fecha de ingreso" />
              
              <img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
              <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_FechaI",
					ifFormat   : "%Y/%m/%d",
					button     : "Image2"
					  }
					);
		 </script>
              </td>
            <td width="80">Fecha Cese:</td>
            <td width="164"><input name="d_FechaC" type="text" class="texto" id="d_FechaC" readonly="readonly" placeholder="Fecha de cese"/>
            <img src="../images/calendario.jpg" name="Image3" id="Image3" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
              <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_FechaC",
					ifFormat   : "%Y/%m/%d",
					button     : "Image3"
					  }
					);
		 </script></td>
          </tr>
          <tr>
            <td>Jefe Inmediato:</td>
            <td><input type="text" name="c_JefeInm" id="c_JefeInm" class="texto" required="required" placeholder="Jefe inmediato"/></td>
            <td>Telefono:</td>
            <td><label for="textfield5">
              <input type="tel" name="C_Telef" id="C_Telef" class="texto"  placeholder="Ingrese su telefono"/>
            </label></td>
            <td>Motivo Cese:</td>
            <td><label for="C_MotC"></label>
              <input type="text" name="C_MotC" id="C_MotC" class="texto" required="required" placeholder="Motivo de cese"/>
              <label for="textfield17"></label></td>
            <td>&nbsp;</td>
            <td><a href="#" onclick="accion3()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
          </tr>
        </table>
        <table width="974" height="22" border="0" cellspacing="0" id="tblSample3">
          <thead>
            <tr>
              <th width="23"  bgcolor="#66CCCC">#</th>
              <th width="75" bgcolor="#66CCCC">Empresa</th>
              <th width="91" bgcolor="#66CCCC">Cargo</th>
              <th width="118" bgcolor="#66CCCC">Fecha Ingreso</th>
              <th width="105" bgcolor="#66CCCC">Fecha Cese</th>
              <th width="194" bgcolor="#66CCCC">Jefe Inmediato</th>
              <th width="169" bgcolor="#66CCCC">Telefono</th>
              <th width="183" bgcolor="#66CCCC">Motivo Cese</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="1039" border="0">
          <tr>
            <td width="128">Ingreso Economico Mensual(promedio)</td>
            <td width="152"><label for="n_IngMpro"></label>
              <input type="number" name="n_IngMpro" id="n_IngMpro" class="texto" required="required" placeholder="S/. ingrso mensual "/></td>
            <td width="172">Gasto Mensual(promedio):</td>
            <td width="162"><label for="n_GasMPro"></label>
              <input type="number" name="n_GasMPro" id="n_GasMPro" class="texto" required="required" placeholder="s/.Gastos mensuales"/></td>
            <td width="164">Vivienda</td>
            <td width="235"><label for="d_FechaI"></label>
              <select name="c_Viv" id="c_Viv" class="combos texto" >
                <option value="1">Propia</option>
                <option value="2">Familiar</option>
                <option value="3">Arrendada</option>
                <option value="4">Otros</option>
              </select></td>
          </tr>
          <tr>
            <td>Vehiculo:</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label for="C_MotC"></label>
              <label for="textfield17"></label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Marca:</td>
            <td><label for="c_Marca"></label>
              <input type="text" name="c_Marca" id="c_Marca" class="texto" placeholder="Marca de vehiculo"/></td>
            <td>Placa:</td>
            <td><label for="c_Placa"></label>
              <input type="text" name="c_Placa" id="c_Placa" class="texto" placeholder="Placa e vehiculo"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Modelo</td>
            <td><label for="c_Vehi"></label>
              <input type="text" name="c_Vehi" id="c_Vehi" class="texto" placeholder="Modelo de vehiculo"/></td>
            <td>Valor Comercial</td>
            <td><label for="n_ValorC"></label>
              <input type="number" name="n_ValorC" id="n_ValorC" class="texto" placeholder="S/. Valor omercial"/></td>
            <td>&nbsp;</td>
          </tr>
</table>
      </div>
    </div>
    
    
  </div>
  <p>
    <input type="submit" name="button" id="button" value="Enviar" class="submit" />
    
    <label for="textfield"></label>
  </p>
  
  
   </fieldset>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>
