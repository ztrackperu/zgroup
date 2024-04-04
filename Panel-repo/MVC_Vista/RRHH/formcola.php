<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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




 <link rel="stylesheet" media="screen" type="text/css" href="../css/datepicker.css" />
<script type="text/javascript" src="../js/datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="../css/formulario.css">




<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">
</head>

<script type="text/javascript">


var INPUT_NAME_PREFIX = 'c_Paren'; // this is being set via script a
var INPUT_NAME_DES = 'c_NombreC'; // this is being set via script b
var INPUT_NAME_GLO = 'c_Ocup'; // this is being set via script g
var INPUT_NAME_CLA = 'c_Telef'; // this is being set via script h
var INPUT_NAME_PRE = 'c_TrabajaA'; // this is being set via script c
var INPUT_NAME_DSC = 'c_Direc';
var INPUT_NAME_DSC1 = 'telefonoemer';
var INPUT_NAME_DSC2 = 'edad'; // this is being set via script d
var TABLE_NAME = 'tblSample'; // this should be named in the HTML
var ROW_BASE = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows;

function fillInRows()
{
	hasLoaded = true;

		
}


function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
	this.cinco=cinco;
	this.seis=seis;
	this.siete=siete;
	this.ocho=ocho;
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
	var pre23=document.getElementById("c_TrabajaA").value
	var dsc=document.getElementById("c_Direc").value
	var dsc1=document.getElementById("telefonoemer").value
	var dsc2=document.getElementById("edad").value
	
	
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
		txtInpa.setAttribute('size', '40');
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
		txtInpc.setAttribute('size', '20');
	txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	txtInpc.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		

			var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('size', '8');
		txtInpd.setAttribute('value', cla); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'texto'); 
		//txtInpd.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpd);
		
		
			var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_PRE + iteration);
		txtInpe.setAttribute('size', '8');
		txtInpe.setAttribute('value', pre23); // iteration included for debug purposes
		txtInpe.setAttribute('class', 'texto');
		txtInpe.setAttribute('readonly', 'readonly'); 
		cell5.appendChild(txtInpe);
		
		var cell6 = row.insertCell(6);
		var txtInpe1 = document.createElement('input');
		txtInpe1.setAttribute('type', 'text');
		txtInpe1.setAttribute('name', INPUT_NAME_DSC1 + iteration);
		txtInpe1.setAttribute('id', INPUT_NAME_DSC1 + iteration);
		txtInpe1.setAttribute('size', '8');
		txtInpe1.setAttribute('value', dsc1); // iteration included for debug purposes
		txtInpe1.setAttribute('class', 'texto');
		//txtInpe.setAttribute('readonly', 'readonly'); 
		cell6.appendChild(txtInpe1);
		
		
		
		var cell7 = row.insertCell(7);
		var txtInpe2 = document.createElement('input');
		txtInpe2.setAttribute('type', 'text');
		txtInpe2.setAttribute('name', INPUT_NAME_DSC2 + iteration);
		txtInpe2.setAttribute('id', INPUT_NAME_DSC2 + iteration);
		txtInpe2.setAttribute('size', '8');
		txtInpe2.setAttribute('value', dsc2); // iteration included for debug purposes
		txtInpe2.setAttribute('class', 'texto');
		//txtInpe.setAttribute('readonly', 'readonly'); 
		cell7.appendChild(txtInpe2);
		
						
		var cell8 = row.insertCell(8);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_DSC + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_DSC + iteration);
		txtInpf.setAttribute('size', '8');
		txtInpf.setAttribute('value', dsc); // iteration included for debug purposes
		txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell8.appendChild(txtInpf);
		
		
				
		// cell 2 - input button
		var cell9 = row.insertCell(9);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell9.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpe1,txtInpe2,txtInpf);
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
				//tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_DSC1 + count;
//				tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_DSC2 + count;
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
function guardar(){
	
		if(confirm("Seguro de empleado ?")){
	//document.getElementById.formElem.submit();
	document.getElementById("formElem").submit();
	 }
	}
</script>




<script type="text/javascript">



var INPUT_NAME_PREFIX2 = 'c_nivel'; // this is being set via script a
var INPUT_NAME_DES2 = 'c_CentroE'; // this is being set via script b
var INPUT_NAME_GLO2 = 'c_UltiAa'; // this is being set via script g
var INPUT_NAME_CLA2 = 'carrera'; // this is being set via script h
/*var INPUT_NAME_PRE2 = 'c_TrabajaA'; // this is being set via script c
var INPUT_NAME_DSC2 = 'c_Direc';*/ // this is being set via script d
var TABLE_NAME2 = 'tblSample2'; // this should be named in the HTML
var ROW_BASE2 = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows2;

function fillInRows2()
{
	hasLoaded = true;

		
}


function myRowObject2(one,two,tres,cuatro)
{
	this.one = one; // text object
	this.two = two; // input text object
	this.tres=tres;
	this.cuatro=cuatro;
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
	var glo2=document.getElementById("carrera").value
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
		txtInpa.setAttribute('class', 'texto'); 
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
		var txtInpc2 = document.createElement('input');
		txtInpc2.setAttribute('type', 'text');
		txtInpc2.setAttribute('name', INPUT_NAME_CLA2 + iteration);
		txtInpc2.setAttribute('id', INPUT_NAME_CLA2 + iteration);
		txtInpc2.setAttribute('size', '30');
	txtInpc2.setAttribute('value', glo2); // iteration included for debug purposes
	txtInpc2.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc2);
	
	
	var cell4 = row.insertCell(4);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO2 + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO2 + iteration);
		txtInpc.setAttribute('size', '40');
	txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	txtInpc.setAttribute('class', 'combo texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell4.appendChild(txtInpc);

			
		
		
				
		// cell 2 - input button
		var cell5 = row.insertCell(5);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow2(this)};
		cell5.appendChild(btnEl);
		
		row.myRow = new myRowObject2(textNode,txtInpa,txtInpb,txtInpc,txtInpc2);
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

<script language="javascript">
function accion4(){
	
	addRowToTable4();
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




var INPUT_NAME_PREFIX4 = 'c_tdesc'; // this is being set via script a
var INPUT_NAME_DES4 = 'n_cantDesc'; // this is being set via script b
var INPUT_NAME_GLO4 = 'c_motivoDesc'; // this is being set via script g

var TABLE_NAME4 = 'tblSample4'; // this should be named in the HTML
var ROW_BASE4 = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows4;

function fillInRows4()
{
	hasLoaded = true;

		
}


function myRowObject4(one,two,tres)
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
function insertRowToTable4()
{
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME4);
		var rowToInsertAt = tbl.tBodies[0].rows.length;
		for (var i=0; i<tbl.tBodies[0].rows.length; i++) {
			if (tbl.tBodies[0].rows[i].myRow) {
				rowToInsertAt = i;
				break;
			}
		}
		addRowToTable4(rowToInsertAt);
reorderRows4(tbl, rowToInsertAt);
	}
}


function addRowToTable4(num)
{
	//alert('hola');

	var codigo=document.getElementById("c_tdesc").value
	var des=document.getElementById("n_cantDesc").value
	var glo=document.getElementById("c_motivoDesc").value


	
	
	if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME4);
		var nextRow = tbl.tBodies[0].rows.length;
		var iteration = nextRow + ROW_BASE4;
		if (num == null) { 
			num = nextRow;
		} else {
			iteration = num + ROW_BASE4;
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
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX4 + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX4 + iteration);
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		//txtInpa.setAttribute('readonly', 'readonly');
		//txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
			var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES4 + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES4 + iteration);
		txtInpb.setAttribute('size', '40');
		txtInpb.setAttribute('value', des); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
	//txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
	//txtInpb.setAttribute('class', 'texto'); 
	
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO4 + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO4 + iteration);
		txtInpc.setAttribute('size', '40');
		txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	//txtInpc.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		
	

			
		
		
				
		// cell 2 - input button
		var cell4 = row.insertCell(4);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow4(this)};
		cell4.appendChild(btnEl);
		
		row.myRow = new myRowObject4(textNode,txtInpa,txtInpb,txtInpc);
	}
}


// If there isn't an element with an onclick event in your row, then this function can't be used.
function deleteCurrentRow4(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		deleteRows4(rowArray);
		reorderRows4(tbl, rIndex);
	  //calculartotales();
	}
}

function reorderRows4(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE4;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.one.data = count; // text
				
				// CONFIG: next line is affected by myRowObject settings
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX4 + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES4 + count;
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_GLO4 + count;
			
				
				
			
				
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

function deleteRows4(rowObjArray)
{
	if (hasLoaded) {
		for (var i=0; i<rowObjArray.length; i++) {
			var rIndex = rowObjArray[i].sectionRowIndex;
			rowObjArray[i].parentNode.deleteRow(rIndex);
		}
	}
}

function openInNewWindow4(frm)
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

<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#ciudad").change(function(){dependencia_distrito();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
	$("#distrito").attr("disabled",true);
});


function validar()
{


selec=formElem.pais.selectedIndex

if (formElem.pais.options[selec].value=="0"){
alert ("debe seleccionar un pais")
}


selec1=formElem.estado.selectedIndex
if (formElem.estado.options[selec1].value=="0"){
alert ("debe seleccionar una provincia")
}

selec2=formElem.ciudad.selectedIndex
if (formElem.ciudad.options[selec2].value=="0"){
alert ("debe seleccionar una ciudad")
}

selec3=formElem.pensiones.selectedIndex
if (formElem.pensiones.options[selec3].value=="0"){
alert ("debe seleccionar una ciudad")
}

/////////////////////////////////////////////

selec4=formElem.bancosueldo.selectedIndex
if (formElem.bancosueldo.options[selec4].value=="0"){
alert ("ddebe ingresar el banco del la cuenta Sueldo")
}

selec5=formElem.modedabanco.selectedIndex
if (formElem.modedabanco.options[selec5].value=="0"){
alert ("debe seleccionar el tipo de moneda de la cuenta Sueldo")
}


selec6=formElem.bancocts.selectedIndex
if (formElem.bancocts.options[selec6].value=="0"){
alert ("debe seleccionar el banco de la cuenta CTS")
}

selec7=formElem.monedacts.selectedIndex
if (formElem.monedacts.options[selec7].value=="0"){
alert ("debe seleccionar el tipo de moneda de la cuenta CTS")
}


}

function cargar_paises()
{
	$.get("../scripts/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("../scripts/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)		
			{
				alert("Error");
			}
			else
			{
				$("#estado").attr("disabled",false);
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code = $("#estado").val();
	$.get("../scripts/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}

function dependencia_distrito()
{
	var code = $("#ciudad").val();
	$.get("../scripts/dependencia-distrito.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#distrito").attr("disabled",false);
			document.getElementById("distrito").options.length=1;
			$('#distrito').append(resultado);			
		}
	});	
	
}






</script>



<script type="text/javascript">
jQuery(document).ready(function($) {
        // Change es un evento que se ejecuta cada vez que se cambia el valor de un elemento (input, select, etc).
  $('#pensiones').change(function(e) {
          //$('#textfield2').val($(this).find(':selected').text());
 	if($('#pensiones').val()=="2"  ||  $('#pensiones').val()=="3" || $('#pensiones').val()=="4" || $('#pensiones').val()=="5")
		  {
			  alert("Ingrese el codigo de afliacion del empleado");
			  $('#c_codAfi').attr('disabled','');
			  $('#c_codAfi').css("border", "2px solid red");
			  $('#c_codAfi').focus();
			}else{
				$('#c_codAfi').attr('disabled','disabled');
				 $('#c_codAfi').css("border", "0px solid black");
				}
        });
      });
</script>



<!--<script type="text/javascript">
jQuery(document).ready(function($) {
        // Change es un evento que se ejecuta cada vez que se cambia el valor de un elemento (input, select, etc).
  $('#brevete').change(function(e) {
          //$('#textfield2').val($(this).find(':selected').text());
 	if($('#brevete').val()=="SI")
		  {
			  alert("Ingrese la clase de brevete");
			  $('#catebreve').attr('disabled','');
			  $('#catebreve').css("border", "2px solid red");
			  $('#catebreve').focus();
			}else{
				$('#catebreve').attr('disabled','disabled');
				 $('#catebreve').css("border", "0px solid black");
				}
        });
      });
</script>
-->





<body>


<form action="../MVC_Controlador/rrhhC.php?acc=IngresaEmpl" method="post" enctype="multipart/form-data" name="formElem" id="formElem" onSubmit="return validar(this)" >
<fieldset class="step">
<div>
<div>
<div>


  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Datos Personales</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Economicos</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Academicos</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Pariente</li>
<li class="TabbedPanelsTab" tabindex="0">Experiencia Laboral</li>
<li class="TabbedPanelsTab" tabindex="0">Información Economica</li>
<!--<li class="TabbedPanelsTab" tabindex="0">Datos Salariales</li>-->
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
      <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Complete La Información</strong></legend>
        <table width="960" border="0" class="contacto">
          <tr>
            <td width="160">Apellido Paterno</td>
            <td width="180"><label for="textfield3"></label>
              <input type="text" name="apepat" id="apepat" class="texto" placeholder="Apellido paterno" required /></td>
            <td colspan="2">Apellido Materno</td>
            <td colspan="2"><label for="textfield7" required></label>
              <input type="text" name="apemat" id="apemat"class="texto" required placeholder="Apellido materno"/>
              <label for="c_NombreC"></label></td>
          </tr>
          <tr>
            <td>Primer Nombre</td>
            <td><label for="textfield4"></label>
              <input type="text" name="pnombre" id="pnombre" class="texto"  required placeholder="Primer nombre"/></td>
            <td colspan="2">Segundo Nombre</td>
            <td colspan="2"><label for="c_NombreC"></label>
              <input type="text" name="snombre" id="snombre" class="texto"  placeholder="Segundo nombre"/></td>
          </tr>
          <tr>
            <td>Lugar de Nacimiento:</td>
            <td><input type="text" name="textfield4" id="textfield4" class="texto" required placeholder="lugar de nacimiento"/></td>
            <td colspan="2">Fecha de Nacimiento:</td>
            <td colspan="2"><input name="FchaN"  class="texto" id="FchaN" type="text" onkeyup = "this.value=formateafecha(this.value); " required  placeholder="Ingrese fecha->" />
              <img src="../images/calendario.jpg" name="Im" id="Im" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" /></td>
            <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "FchaN",
					ifFormat   : "%Y/%m/%d",
					button     : "Im"
					  }
					);
		 </script>
          </tr>
          <tr>
            <td>Dcto de Identidad:</td>
            <td><label for="textfield2"></label>
              <label>
                <input name="textfield2" id="textfield2" class="texto" type="text" required placeholder="DNI -->"/>
              </label></td>
            <td colspan="2">Relacionado con:</td>
            <td colspan="2"><label for="FchaN"></label>
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
            <td colspan="2">Teléfono Movil:</td>
            <td colspan="2"><input type="text" name="textfield6" id="textfield6" class="texto" placeholder="telefono móvil" /></td>
          </tr>
          <tr>
            <td>Correo electronico:</td>
            <td><input type="text" name="email" id="email" class="texto" placeholder="Example@zgroup.com.pe"/></td>
            <td colspan="2">Fecha de Ingreso</td>
            <td colspan="2"><input name="FechaIngEm" type="text" class="texto" id="FechaIngEm" onkeyup = "this.value=formateafecha(this.value); " />
              <img src="../images/calendario.jpg" name="Imagen" id="Imagen" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
              <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "FechaIngEm",
					ifFormat   : "%Y/%m/%d",
					button     : "Imagen"
					  }
					);
		 </script></td>
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
            <td colspan="2">Empresa:</td>
            <td colspan="2"><label for="textfield8">
              <select name="Sempresa" id="Sempresa" class="combos texto" required="required">
                <option value="1">zgroup</option>
                <option value="2">pscargo</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td>Pais:</td>
            <td><!-- ssssssssssssssssssssssssssssss-->
              <dl>
                <dt>
                  <select id="pais" name="pais" class="Combos texto" required="required">
                    <option value="0">Selecciona Uno...</option>
                  </select>
                </dt>
              </dl></td>
            <td colspan="2">Ciudad::</td>
            <td colspan="2"><select id="ciudad" name="ciudad" class="Combos texto" required="required">
              <option value="0">Selecciona Uno...</option>
            </select></td>
          </tr>
          <tr>
            <td>Provincia:</td>
            <td><label for="textfield9">
              <select id="estado" name="estado" class="Combos texto" required="required" >
                <option value="0">Selecciona Uno...</option>
              </select>
            </label></td>
            <td width="158">Distrito:</td>
            <td width="3">&nbsp;</td>
            <td colspan="2"><select id="distrito" name="distrito" class="Combos texto" required="required">
              <option value="0">Selecciona Uno...</option>
            </select></td>
          </tr>
          <tr>
            <td>Domicilio:</td>
            <td colspan="5"><input name="textfield7" type="text" id="textfield7"  class="texto" size="90" required="required" placeholder="Ingrese la direccion de su domicilio"/></td>
          </tr>
       
          <tr>
            
          </tr>
          <tr>
            <td colspan="6"><hr /></td>
          </tr>
         
          <tr>
            <td>Genero</td>
            <td><select name="genero" id="genero" class="combo texto">
              <option value="Hombre">Hombre</option>
              <option value="Mujer">Mujer</option>
            </select></td>
            <td>Foto</td>
            <td></td>
            <td><input type="file" name="foto" id="foto"  /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Brevete</td>
            <td>
            <?php $ven = listarClaseBreveteC(); ?>
              <select name="catebreve" id="catebreve" class="Combos texto"  required="required" >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select>
            </td>
            <td>Nro Brevete</td>
            <td></td>
            <td><label for="textfield"></label>
              <input name="brevete" type="text" class="texto" id="brevete" value="123"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Tipo de Empleado</td>
            <td>
            <?php $ven = listarTipoEmpleC(); ?>
              <select name="tipoemple" id="tipoemple" class="Combos texto"  required="required" >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select>
            </td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Documentos</td>
            <td><p>
              <input name="antp" type="checkbox" id="checkbox" value="1" class="texto" />
              Antecedentes Policiales </p></td>
            <td colspan="4"><label for="fileField"></label>
              <input type="file" name="fileField" id="fileField"  /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="doc_antPenal" type="checkbox" id="doc_antPenal" value="1" />
              <label for="checkbox7">Antenedentes Penales</label></td>
            <td colspan="4"><label for="fileField7"></label>
              <input type="file" name="fileField7" id="fileField7" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="cv" type="checkbox" id="checkbox2" value="1" />
              <label for="checkbox2"></label>
              Curriculum Vitae </td>
            <td colspan="4"><label for="fileField2"></label>
              <input type="file" name="fileField2" id="fileField2" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="copiar" type="checkbox" id="checkbox3" value="1" />
              <label for="checkbox3"></label>
              Copia de recibo de servicio publico</td>
            <td colspan="4"><label for="fileField3"></label>
              <input type="file" name="fileField3" id="fileField3" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="copiad" type="checkbox" id="checkbox4" value="1" />
              <label for="checkbox4"></label>
              Fotocopia de Dni</td>
            <td colspan="4"><input type="file" name="fileField4" id="fileField4" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="fotoa" type="checkbox" id="checkbox5" value="1" />
              <label for="checkbox5"></label>
              Foto Actualizada</td>
            <td colspan="4"><label for="fileField5"></label>
              <input type="file" name="fileField5" id="fileField5" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="croquisd" type="checkbox" id="checkbox6" value="1" />
              <label for="checkbox6"></label>
              Croquis de Domicilio</td>
            <td colspan="4"><label for="fileField6"></label>
              <input type="file" name="fileField6" id="fileField6" /></td>
          </tr>
        </table>
        </fieldset>
      </div>
      <div class="TabbedPanelsContent">
        <table width="62%" border="0">
          <tr>
            <td colspan="6">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">Cta. Sueldo
              </td>
            <td colspan="3">Cta CTS</td>
            <td width="1%">&nbsp;</td>
          </tr>
          <tr>
            <td width="21%">Banco</td>
            <td width="24%"><?php $ven = ListarBancoC(); ?>
              <select name="bancosueldo" id="bancosueldo" class="Combos texto"  >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo utf8_encode($item["descripcion"])?></option>
                <?php }	?>
              </select></td>
            <td width="27%">Banco</td>
            <td width="1%">&nbsp;</td>
            <td width="23%"><?php $ven = ListarBancoC(); ?>
              <select name="bancocts" id="bancocts" class="Combos texto"  >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo utf8_encode($item["descripcion"])?></option>
                <?php }	?>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Moneda</td>
            <td><?php $ven = ListarMonedaC(); ?>
              <select name="modedabanco" id="modedabanco" class="Combos texto"  >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>Moneda</td>
            <td>&nbsp;</td>
            <td><?php $ven = ListarMonedaC(); ?>
              <select name="monedacts" id="monedacts" class="Combos texto"  >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Cta Cte.</td>
            <td><input type="text" name="ctabanco" id="ctabanco" class="texto" required="required"/></td>
            <td>Cta Cte.</td>
            <td>&nbsp;</td>
            <td><input type="text" name="ctacts" id="ctacts" class="texto" required="required"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6"><hr /></td>
          </tr>
           <tr>
            <td>Sueldo Basico</td>
            <td><label for="textfield15"></label>
              <input type="text" name="SueldoB" id="textfield15" required="required"  class="texto" placeholder="S/.00000"/></td>
            <td>Area</td>
            <td>&nbsp;</td>
            <td width="23%"><?php $ven = ListarAreaC(); ?>
              <select name="Area" id="Area" class="Combos texto"  required="required">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td width="1%">&nbsp;</td>
          </tr>
          <tr>
            <td>Asignación Familiar</td>
            <td><select name="AsigF" id="AsigF" class="combos texto">
              <option value="1">SI</option>
              <option value="2">NO</option>
            </select></td>
            <td>Cargo</td>
            <td>&nbsp;</td>
            <td><?php $ven = ListarCargoC(); ?>
              <select name="cargo" id="cargo" class="Combos texto"  required="required">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sistema de pensiones</td>
            <td><?php $ven = listarPensionesC(); ?>
              <select name="pensiones" id="pensiones" class="Combos texto"  required="required" onchange="validarpen()">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["n_codP"]?>"><?php echo $item["c_nombre"]?></option>
                <?php }	?>
              </select></td>
            <td>Codigo Afiliacion:</td>
            <td></td>
            <td><label for="textfield10"></label>
              <input name="c_codAfi" type="text" disabled="disabled"  required="required" class="texto" id="c_codAfi"/></td>
            <td>&nbsp;</td>
            <td width="3%">&nbsp;</td>
          </tr>
          <tr>
            <td>Seguro de Salud</td>
            <td><label for="c_seguroS"></label>
              <select name="c_seguroS" id="c_seguroS" class="combo texto">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
              </select></td>
            <td>Seguro Contra Todo riesgo</td>
            <td></td>
            <td><p>
              <select name="C_seguroCTR" id="C_seguroCTR" class="combo texto">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
              </select>
              
            </p>
              <p>
                <label for="C_seguroCTR"></label>
              </p></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="975" border="0">
          <tr>
            <td width="175">Nivel Academico:</td>
            <td width="185">Centro de Estudios</td>
            <td width="190">Carrera</td>
            <td width="189">Ultimo Año Aprobado</td>
            <td width="70">&nbsp;</td>
            <td width="48">&nbsp;</td>
            <td width="88">&nbsp;</td>
          </tr>
          <tr>
            <td><select name="c_nivel" id="c_nivel" class="combos texto">
              <option value="1">Primaria</option>
              <option value="2">Secundaria</option>
              <option value="3">Instituto</option>
              <option value="4">Universidad</option>
              <option value="5">Otros</option>
            </select></td>
            <td><input type="text" name="c_CentroE" id="c_CentroE" class="texto"  				placeholder="Centro de estudios"/></td>
            <td><label for="textfield5"></label>
              <input type="text" name="carrera" id="carrera" class="texto"/></td>
            <td><input  name="c_UltiAa" id="c_UltiAa"  class="texto"  type="number" 						placeholder="Ingrese ultimo año academico" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="#" onclick="accion2()"><img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
          </tr>
        </table>
        <table width="974" height="22" border="0" cellspacing="0" id="tblSample2">
          <thead>
            <tr>
              <th width="64"  bgcolor="#66CCCC">#</th>
              <th width="163" bgcolor="#66CCCC">Nivel Academico</th>
              <th width="298" bgcolor="#66CCCC">Centro de Estudios</th>
              <th width="246" bgcolor="#66CCCC">Carrera</th>
              <th width="193" bgcolor="#66CCCC">Ultimo Año Aprobado</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
      <div class="TabbedPanelsContent">
        <table width="975" border="0">
          <tr>
            <td width="73">Parentesco</td>
            <td width="150"><label for="apepat"></label>
              <?php $ven = ListaParienteC();?>
              <select name="c_Paren" id="c_Paren" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td width="141">Nombre:</td>
            <td width="146"><label for="c_tdesc"></label>
              <label for="c_NombreC"></label>
              <input type="text" name="c_NombreC" id="c_NombreC" class="texto" placeholder="Nombre pariente"/>
            <td width="110">Ocupacion:</td>
            <td width="212"><input type="text" name="c_Ocup" id="c_Ocup" class="texto"  placeholder="Ingrese su ocupacion"/></td>
            <td width="113">&nbsp;</td>
            <td width="113">&nbsp;</td>
          </tr>
          <tr>
            <td>Teléfono:</td>
            <td><label for="textfield2">
              <input type="tel" name="c_Telef" id="c_Telef" class="texto" placeholder="telefono"/>
            </label></td>
            <td>Trabaja en Zgroup</td>
            <td align="left"><p>
              <!--<label>
                <input name="c_TrabajaA" type="radio" class="texto" id="c_TrabajaA" value="1" />
                SI </label>
              <label>
                <input name="c_TrabajaA" type="radio" class="texto" id="c_TrabajaA" value="0" />
                No </label>
              <label for="select"></label>-->
              <select name="c_TrabajaA" id="c_TrabajaA" class="combo texto">
                <option value="1">Si</option>
                <option value="0" selected="selected">No</option>
              </select>
              <br />
            </p></td>
            <td>Telefono en caso de emergencia:</td>
            <td><label for="textfield11"></label>
              <input type="text" name="telefonoemer" id="telefonoemer" class="texto" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Domicilio:</td>
            <td colspan="3"><input name="c_Direc" type="text" id="c_Direc" size="60" class="texto" placeholder="iNGRESE DIRECCION DE DOMICILIO" /></td>
            <td>Edad</td>
            <td><label for="textfield14"></label>
              <input type="text" name="edad" id="edad" class="texto"/></td>
            <td><a href="#" onclick="accion()"><img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
            <td>&nbsp;</td>
          </tr>
       
        </table>
        <table width="969" height="22" border="0" cellspacing="0" id="tblSample">
          <thead>
            <tr>
              <th width="16"  bgcolor="#66CCCC">#</th>
              <th width="78" bgcolor="#66CCCC">Parentesco</th>
              <th width="83" bgcolor="#66CCCC">Nombre</th>
              <th width="85" bgcolor="#66CCCC">Ocupación</th>
              <th width="66" bgcolor="#66CCCC">Telf</th>
              <th width="164" bgcolor="#66CCCC">Trabaja en Zgroup</th>
              <th width="144" bgcolor="#66CCCC">Telef Emergencia</th>
              <th width="88" bgcolor="#66CCCC">Edad</th>
              <th width="227" bgcolor="#66CCCC">Domicilio</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
<div class="TabbedPanelsContent">
        <table width="1064" border="0">
          <tr>
            <td width="107">Empresa:</td>
            <td width="173"><label for="n_IngMpro"></label>
            <input type="tel" name="c_Empr" id="c_Empr" class="texto"  placeholder="Ingrese el telefono"/></td>
            <td width="59">Cargo:</td>
            <td width="165"><label for="ctabanco"></label>
              <input type="text" name="c_Cargo" id="c_Cargo" class="texto"  placeholder="iNGRESE SU CARGO" /></td>
            <td width="99">Fecha Ingreso:</td>
            <td width="171"><label for="d_FechaI"></label>
              <input name="d_FechaI" type="text" class="texto" id="d_FechaI" readonly="readonly" placeholder="fecha de ingreso" />
              
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
            <td width="176"><input name="d_FechaC" type="text" class="texto" id="d_FechaC" readonly="readonly" placeholder="Fecha de cese"/>
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
            <td><input type="text" name="c_JefeInm" id="c_JefeInm" class="texto"  placeholder="Jefe inmediato"/></td>
            <td>Telefono:</td>
            <td><label for="FchaN">
              <input type="tel" name="C_Telef" id="C_Telef" class="texto"  />
            </label></td>
            <td>Motivo Cese:</td>
            <td><label for="C_MotC"></label>
              <input type="text" name="C_MotC" id="C_MotC" class="texto"  placeholder="Motivo de cese"/>
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
        <input type="number" name="n_IngMpro" id="n_IngMpro" class="texto"  placeholder="S/. ingrso mensual "/></td>
      <td width="172">Gasto Mensual(promedio):</td>
      <td width="162"><label for="n_GasMPro"></label>
        <input type="number" name="n_GasMPro" id="n_GasMPro" class="texto"  placeholder="s/.Gastos mensuales"/></td>
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
<!--<div class="TabbedPanelsContent">
  <table width="969" border="1">
    <tr>
      <td width="154">Tipo de Descueno</td>
      <td colspan="2"><label for="select2"></label>
        <select name="c_tdesc" id="c_tdesc">
        </select>        <label for="textfield12"></label></td>
      </tr>
    <tr>
      <td>Cantidad Desc</td>
      <td colspan="2"><label for="textfield14"></label>
        <input type="text" name="n_cantDesc" id="n_cantDesc" /></td>
      </tr>
    <tr>
      <td>Motivo</td>
      <td width="739"><label for="textfield16"></label>
        <input type="text" name="c_motivoDesc" id="c_motivoDesc" /></td>
      <td width="54"><a href="#" onclick="accion4()"><img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
      </tr>
    
  </table>
  
   <table width="974" height="22" border="0" cellspacing="0" id="tblSample4">
          <thead>
            <tr>
              <th width="22"  bgcolor="#66CCCC">#</th>
              <th width="123" bgcolor="#66CCCC">Tipo Descuento</th>
              <th width="123" bgcolor="#66CCCC">Cantidad Desc</th>
              <th width="110" bgcolor="#66CCCC">Motivo</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
</div>
-->    </div>
    
    
  </div>
  <p>
    <div class="buttons">
    <button type="button" class="positive" name="save" onclick="guardar()">
        <img src="../images/icon_accept.png" alt=""/>
        Guardar
    </button>

 <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>

    <button type="button" class="negative" name="cancel">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
       </button>
</div></p>
  
  
   </fieldset>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>
