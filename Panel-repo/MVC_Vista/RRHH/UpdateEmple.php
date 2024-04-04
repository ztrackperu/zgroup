<?php 
if($resultado!=NULL){
	foreach( $resultado as $item){
		
		$codigo=$item['USERID'];
		$nom1=$item["NomC"];$nom2=$item["NomC2"];$pat=$item["ApePat"];$mat=$item["ApeMat"];
		$lugarn=$item["LugarN"];$fechan=$item["FchaN"];$dni=$item["Dni"];
		$telf=$item["TelF"];
		$telm=$item["TelM"];
		$estadoc=$item["EstadoC"];
		$pais=$item["Pais"];
		$ciudad=$item["Ciudad"];
		$prov=$item["Prov"];
		$distrito=$item["Dist"];
		$empresa=$item["Empresa"];
		$domicilio=$item["Direc"];
		$antece=$item["Doc_Antp"];
		$cv=$item["Doc_cuV"];
		$copiaR=$item["Doc_CopR"];
		$copiadni=$item["Doc_CopDni"]; 
		$fotoa=$item["Doc_FotoA"];
		$croquisd=$item["Doc_CroD"];
		$ingresom=$item["n_IngMpro"];
		$gastom=$item["n_GasMPro"];
		$vivi=$item["c_Viv"];
		$vehivulo=$item["c_Vehi"];
		$placa=$item["c_Placa"];
		$marca=$item["c_Marca"];
		$valor=$item["n_VlorC"];
		$pensiones=$item["pensiones"];
		$sueldob=$item["SueldoB"];
		$pension=$item["pensiones"];
		$codafi=$item["c_codAfi"];
		$segctr=$item["C_seguroCTR"];
		$segC=$item["c_seguroS"];
		$area=$item["Area"];
		$cargo=$item["Cargo"];
		$email=$item["email"];
		$asig=$item["AsigF"];
		$bancos=$item["BancoSueldo"];
		$monedas=$item["MonedaSueldo"];
		$ctas=$item["CtaSueldo"];
		$bancocts=$item["BancoCTS"];
		$monedacts=$item["MonedaCTS"];
		$ctacts=$item["CtaCTS"];
		$brevete=$item["brevete"];
		$catebreve=$item["catebreve"];

		$fechaCese=$item["fechaCese"];
		$motivoCese=$item["motivoCese"];
		$tipoemple=$item["tipoemple"];
		$doc_antPenal=$item["Doc_antPenal"];
		}
	
	}
	
if($resultado2!=NULL)
{
$cantDiagnosticos = 0;
foreach($resultado2 as $itemD)
{
	$cantDiagnosticos += 1;
}
}else{
	$cantDiagnosticos = 1;
	
	}
	
	
	

if($resultado3!=NULL)
{
$cantDiagnosticos2 = 0;
foreach($resultado3 as $itemD)
{
	$cantDiagnosticos2 += 1;
}
}else{
	$cantDiagnosticos2 = 1;
	
	}
	
	
	

if($resultado4!=NULL)
{
$cantDiagnosticos3 = 0;
foreach($resultado4 as $itemD)
{
	$cantDiagnosticos3 += 1;
}
}else{
	$cantDiagnosticos3 = 1;
	
	}

?>














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
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

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
		agregarUsuario();
//	addRowToTable2();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
	}
</script>


<script language="javascript">
function accion3(){
		agregarUsuario2();
	//addRowToTable3();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
	}

</script>

<script language="javascript">
function accion4(){
		agregarUsuario3();
	//addRowToTable3();
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


function eliminarUsuario(obj){
  var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
	//sumarcolumnatabla();
    }

</script>



<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo=valor+1;
function agregarUsuario(){
	nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_nivel"+posicionCampo+"' type='text' id='c_nivel"+posicionCampo+ "' size='10' readonly='readonly' class='texto'></td>"; 
		 
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='c_CentroE"+posicionCampo+"' type='text' id='c_CentroE"+posicionCampo+ "' size='40' readonly='readonly' class='texto'></td> ";
		 
		 nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='carrera"+posicionCampo+"' type='text'  id='carrera"+posicionCampo+"'  size='40'  class='texto'/>";
		
		 
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='c_UltiAa"+posicionCampo+"' type='text'  id='c_UltiAa"+posicionCampo+"'  size='40'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		
escribirDiagnostico(posicionCampo);
		posicionCampo++;	
    }
function escribirDiagnostico(posicionCampo)
{
			c_nivel = document.getElementById("c_nivel" + posicionCampo);
			c_nivel.value = document.formElem.c_nivel.value;
			
			c_CentroE = document.getElementById("c_CentroE" + posicionCampo);
			c_CentroE.value = document.formElem.c_CentroE.value;
			
			c_UltiAa = document.getElementById("c_UltiAa" + posicionCampo);
			c_UltiAa.value = document.formElem.c_UltiAa.value;		
			
			carrera = document.getElementById("carrera" + posicionCampo);
			carrera.value = document.formElem.carrera.value;		
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
</script>

<script type="text/javascript">

 
  var valor=<?php echo $cantDiagnosticos2; ?>;
 var posicionCampox=valor+1;
function agregarUsuario2(){
	nuevaFila = document.getElementById("tablaDiagnostico2").insertRow(-1);
		nuevaFila.id=posicionCampox;  
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_Paren"+posicionCampox+"' type='text' id='c_Paren"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_NombreC"+posicionCampox+"' type='text' id='c_NombreC"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_Ocup"+posicionCampox+"' type='text' id='c_Ocup"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_Telef"+posicionCampox+"' type='text' id='c_Telef"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
		

		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_TrabajaA"+posicionCampox+"' type='text' id='c_TrabajaA"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
		
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_telemer"+posicionCampox+"' type='text' id='c_telemer"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
	
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_edad"+posicionCampox+"' type='text' id='c_edad"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 

		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_Direc"+posicionCampox+"' type='text' id='c_Direc"+				        posicionCampox+ "' size='5' readonly='readonly' class='texto'></td>"; 
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		 
		 
		 
		 
		
escribirDiagnostico2(posicionCampox);
		posicionCampox++;	
    }
function escribirDiagnostico2(posicionCampox)
{
			c_Paren = document.getElementById("c_Paren" + posicionCampox);
			c_Paren.value = document.formElem.c_Paren.value;
			
			c_NombreC = document.getElementById("c_NombreC" + posicionCampox);
			c_NombreC.value = document.formElem.c_NombreC.value;
			
			c_Ocup = document.getElementById("c_Ocup" + posicionCampox);
			c_Ocup.value = document.formElem.c_Ocup.value;	
			
			c_Telef = document.getElementById("c_Telef" + posicionCampox);
			c_Telef.value = document.formElem.c_Telef.value;	
			
			c_TrabajaA = document.getElementById("c_TrabajaA" + posicionCampox);
			c_TrabajaA.value = document.formElem.c_TrabajaA.value;
						
			c_telemer = document.getElementById("c_telemer" + posicionCampox);
			c_telemer.value = document.formElem.c_telemer.value;
			
			c_edad = document.getElementById("c_edad" + posicionCampox);
			c_edad.value = document.formElem.c_edad.value;	
			
			c_Direc = document.getElementById("c_Direc" + posicionCampox);
			c_Direc.value = document.formElem.c_Direc.value;
			


}

</script>


<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos3; ?>;
 var posicionCampo3=valor+1;
function agregarUsuario3(){
	nuevaFila = document.getElementById("tablaDiagnostico3").insertRow(-1);
		nuevaFila.id=posicionCampo3;  
												
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_Empr"+posicionCampo3+"' type='text' id='c_Empr"+posicionCampo3+ "' size='5' readonly='readonly' class='texto'></td>";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_Cargo"+posicionCampo3+"' type='text' id='c_Cargo"+posicionCampo3+ "' size='5' readonly='readonly' class='texto'></td>"; 
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='d_FechaI"+posicionCampo3+"' type='text' id='d_FechaI"+posicionCampo3+ "' size='5' readonly='readonly' class='texto'></td>";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='d_FechaC"+posicionCampo3+"' type='text' id='d_FechaC"+posicionCampo3+ "' size='5' readonly='readonly' class='texto'></td>";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='c_JefeInm"+posicionCampo3+"' type='text' id='c_JefeInm"+posicionCampo3+ "' size='5' readonly='readonly' class='texto'></td>"; 
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='C_Telef"+posicionCampo3+"' type='text' id='C_Telef"+posicionCampo3+ "' size='40'  class='texto'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='C_MotC"+posicionCampo3+"' type='text'  id='C_MotC"+posicionCampo3+"'  size='40'  class='texto'/>";
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		
escribirDiagnostico3(posicionCampo3);
		posicionCampo3++;	
    }
function escribirDiagnostico3(posicionCampo3)
{
			c_Empr = document.getElementById("c_Empr" + posicionCampo3);
			c_Empr.value = document.formElem.c_Empr.value;
			
			c_Cargo = document.getElementById("c_Cargo" + posicionCampo3);
			c_Cargo.value = document.formElem.c_Cargo.value;
			
			d_FechaI = document.getElementById("d_FechaI" + posicionCampo3);
			d_FechaI.value = document.formElem.d_FechaI.value;
			
			d_FechaC = document.getElementById("d_FechaC" + posicionCampo3);
			d_FechaC.value = document.formElem.d_FechaC.value;	
			
			c_JefeInm = document.getElementById("c_JefeInm" + posicionCampo3);
			c_JefeInm.value = document.formElem.c_JefeInm.value;	
			
			C_Telef = document.getElementById("C_Telef" + posicionCampo3);
			C_Telef.value = document.formElem.C_Telef.value;
			
			C_MotC = document.getElementById("C_MotC" + posicionCampo3);
			C_MotC.value = document.formElem.C_MotC.value;	
			

			


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

 
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
    $("input[name=c_TrabajaA2]").click(function () {  
	 // hiddenField 
	  document.formElem.c_TrabajaA.value=$('input:radio[name=c_TrabajaA2]:checked').val();
      //  alert("La edad seleccionada es: " + $('input:radio[name=c_TrabajaA]:checked').val());
        //alert("La edad seleccionada es: " + $(this).val());
    });
});
</script>





<body>


<form action="../MVC_Controlador/rrhhC.php?acc=updateEmpl" method="post" name="formElem" id="formElem" enctype="multipart/form-data">
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
      <li class="TabbedPanelsTab" tabindex="0">Cese Empleado</li>
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="960" border="0" class="contacto">
          <tr>
            <td width="130">Apellido Paterno</td>
            <td width="262"><label for="textfield3"></label>
              <input type="text" name="apepat" id="apepat" class="texto" value="<?php echo $pat ?>" /></td>
            <td colspan="3">Apellido Materno</td>
            <td colspan="2"><label for="textfield7"></label>
              <input type="text" name="apemat" id="apemat"class="texto" value="<?php echo $mat ?>"/>
              <label for="c_NombreC"></label>
              <?php /*?><?php echo $codigo;?><?php */?></td>
          </tr>
          <tr>
            <td>Primer Nombre</td>
            <td><label for="textfield4"></label>
              <input type="text" name="pnombre" id="textfield4" class="texto"   value="<?php echo $nom1 ?>"/></td>
            <td colspan="3">Segundo Nombre</td>
            <td colspan="2"><label for="c_NombreC"></label>
              <input type="text" name="snombre" id="textfield12" class="texto"  value="<?php echo $nom2 ?>"/></td>
          </tr>
          <tr>
            <td>Lugar de Nacimiento:</td>
            <td><input type="text" name="textfield4" id="textfield4" class="texto" value="<?php echo $lugarn ?>"/></td>
            <td colspan="3">Fecha de Nacimiento:</td>
            <td colspan="2"><input name="textfield5" onkeyup = "this.value=formateafecha(this.value); "   class="texto" id="textfield5" value="<?php  echo $f=(date("d/m/Y",strtotime($fechan))); 
			//echo vfecha($f);
			?>"/>
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
            <td height="28">Dcto de Identidad:</td>
            <td><label for="textfield2"></label>
              <input name="textfield2" id="textfield2" readonly class="texto" type="text" value="<?php echo $dni ?>"/></td>
            <td colspan="3">Relacionado con:</td>
            <td colspan="2"><label for="textfield5"></label>
              <?php $ven = listarxuserinfoC(); ?>
              <?php /*?><select name="useri" id="useri" class="Combos texto" onchange="pasardatos()" >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["userid"]?>"><?php echo $item["DNI"]?></option>
                <?php }	?>
              </select><?php */?>
              <label for="textfield6"></label>
              <input type="hidden" name="useri" id="useri" value="<?php echo $codigo; ?>" /></td>
          </tr>
          <tr>
            <td>Teléfono Fijo:</td>
            <td><input type="tel" name="textfield3" id="textfield3" class="texto" value="<?php echo $telf ?>"/></td>
            <td colspan="3">Teléfono Movil:</td>
            <td colspan="2"><input type="text" name="textfield6" id="textfield6" class="texto" value="<?php echo $telm ?>" /></td>
          </tr>
          <tr>
            <td>Correo electronico:</td>
            <td><input type="text" name="email" id="email" class="texto" value="<?php echo $email ?>"/></td>
            <td colspan="3">Estado:</td>
            <td colspan="2"><select name="estado2" id="estado2" class="combo texto">
              <option value="1">Activo</option>
              <option value="2">Inactivo</option>
            </select></td>
          </tr>
          <tr>
            <td>Estado Civil</td>
            <td><?php $ven = ListaEstadoCivilC();?>
              <select name="select2" id="select2" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["n_Cod"]?>"<?php if($item["n_Cod"]==$estadoc){?>selected<?php }?>><?php echo $item["c_Descr"]?></option>
                <?php }	?>
              </select></td>
            <td colspan="3">Empresa:</td>
            <td colspan="2">
              <select name="Sempresa" id="Sempresa" class="combos texto">
                <option value="1">zgroup</option>
                <option value="2">pscargo</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Pais:</td>
            <td><?php $ven1 = ListarPaisesC();?>
              <select name="textfield8" id="textfield8" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven1 as $item1){?>
                <option value="<?php echo $item1["Code"]?>"<?php if($item1["Code"]==$pais){?>selected<?php }?>><?php echo $item1["Name"]?></option>
                <?php }	?>
              </select></td>
            <td colspan="3">Ciudad:</td>
            <td colspan="2"><?php $ven2=ListarCiudadC();?>
              <select name="textfield9" id="textfield9" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven2 as $item2){?>
                <option value="<?php echo $item2["Name"]?>"<?php if($item2["Name"]==$ciudad){?>selected<?php }?>><?php echo $item2["Name"]?></option>
                <?php }	?>
              </select></td>
          </tr>
          <tr>
            <td>Pronvincia:</td>
            <td><?php $ven3 = ListarProvinciasC();?>
              <select name="textfield10" id="textfield10" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven3 as $item3){?>
                <option value="<?php echo $item3['Name']?>"<?php if($item3['Name']==$prov){?>selected<?php }?>><?php echo $item3["Name"]?></option>
                <?php }	?>
              </select></td>
            <td colspan="3">Distrito:</td>
            <td colspan="2"><?php $ven4 = ListarDistritoC();?>
              <select name="textfield11" id="textfield11" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven4 as $item4){?>
                <option value="<?php echo $item4["Name"]?>"<?php if(str_replace(' ', '', $item4["Name"])== str_replace(' ', '', $distrito)){?>selected<?php }?>><?php echo $item4["Name"]?></option>
                <?php }	?>
              </select></td>
          </tr>
          <tr>
            <td>Domicilio:</td>
            <td colspan="6"><input name="textfield7" type="text" id="textfield7" size="90" class="texto" value="<?php echo $domicilio;?>"/></td>
          </tr>
          <tr>
            <td colspan="6"><hr /></td>
          </tr>
          
          <tr>
          <td>Brevete</td>
            <td>
            <?php $ven = listarClaseBreveteC(); ?>
              <select name="catebreve" id="catebreve" class="Combos texto"  required="required" >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$catebreve){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select>
            </td>
            <td width="118">Nro Brevete</td>
            <td width="6"></td>
            <td colspan="3"><label for="textfield"></label>
              <input name="brevete" type="text" class="texto" id="brevete" value="<?php echo $brevete; ?>"/></td>
            </tr>
          <tr>
            <td>Tipo de Empleado</td>
            <td>
                    
              <?php $ven = listarTipoEmpleC(); ?>
              <select name="tipoemple" id="tipoemple" class="Combos texto"  required="required" >
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$tipoemple){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select>
            </td>
            <td>&nbsp;</td>
            <td></td>
            <td colspan="3">&nbsp;</td>
            </tr>
          <td>Documentos</td>
            <td><p>
              <?php if($antece==1){ 
              echo "<input name='antp' type='checkbox' id='checkbox' value='1' class='texto' checked='checked' />";
				}else
				echo "<input name='antp' type='checkbox' id='checkbox' value='1' class='texto'/>";
				?>
              Antecedentes Policiales </p></td>
            <td colspan="5"><label for="fileField"></label>
              <input type="file" name="fileField" id="fileField"  /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><p>
              <?php if($doc_antPenal==1){ 
              echo "<input name='doc_antPenal' type='checkbox' id='checkbox' value='1' class='texto' checked='checked' />";
				}else
				echo "<input name='doc_antPenal' type='checkbox' id='checkbox' value='1' class='texto'/>";
				?>
              Antecedentes Penales </p></td>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php if($cv==1){ 
            echo "<input name='cv' type='checkbox' id='checkbox2' value='1' checked='checked' />";
			}else
			echo "<input name='cv' type='checkbox' id='checkbox2' value='1' />";
			?>
              <label for="checkbox2"></label>
              Curriculum Vitae </td>
            <td colspan="5"><label for="fileField2"></label>
              <input type="file" name="fileField2" id="fileField2" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php if($copiaR==1){
            echo "<input name='copiar' type='checkbox' id='checkbox3' value='1' checked='checked'/>";
			}else
			echo "<input name='copiar' type='checkbox' id='checkbox3' value='1' />";
			?>
              <label for="checkbox3"></label>
              Copia de recibo de servicio publico</td>
            <td colspan="5"><label for="fileField3"></label>
              <input type="file" name="fileField3" id="fileField3" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php if($copiadni==1){
			echo "<input name='copiad' type='checkbox' id='checkbox4' value='1' checked='checked' />";
            }else
			echo "<input name='copiad' type='checkbox' id='checkbox4' value='1' />";
            ?>
              <label for="checkbox4"></label>
              Fotocopia de Dni</td>
            <td colspan="5"><input type="file" name="fileField4" id="fileField4" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php if($fotoa==1){
            echo "<input name='fotoa' type='checkbox' id='checkbox5' value='1' checked='checked' />";
            }else
            echo "<input name='fotoa' type='checkbox' id='checkbox5' value='1' />";
            ?>
              <label for="checkbox5"></label>
              Foto Actualizada</td>
            <td colspan="5"><label for="fileField5"></label>
              <input type="file" name="fileField5" id="fileField5" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php if($croquisd==1){
            echo "<input name='croquisd' type='checkbox' id='croquisd' value='1' checked='checked' />";
            }else
			echo "<input name='croquisd' type='checkbox' id='croquisd' value='1' />";
            ?>
              <label for="checkbox6"></label>
              Croquis de Domicilio</td>
            <td colspan="5"><label for="fileField6"></label>
              <input type="file" name="fileField6" id="fileField6" /></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
      <table>
      <tr>
            <td colspan="2">Cta. Sueldo
              <label for="select2"></label></td>
            <td colspan="4">Cta CTS</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Banco</td>
            <td><?php $ven = ListarBancoC();?>
              <select name="bancosueldo" id="bancosueldo" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$bancos){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>Banco</td>
            <td>&nbsp;</td>
            <td colspan="2"><?php $ven = ListarBancoC();?>
              <select name="bancocts" id="bancocts" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$bancocts){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Moneda</td>
            <td><?php $ven = ListarMonedaC();?>
              <select name="modedabanco" id="modedabanco" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$monedas){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>Moneda</td>
            <td>&nbsp;</td>
            <td colspan="2"><?php $ven = ListarMonedaC();?>
              <select name="monedacts" id="monedacts" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$monedacts){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Cta Cte.</td>
            <td><input type="text" name="ctabanco" id="ctabanco" class="texto" value="<?php echo $ctas;?>"/></td>
            <td>Cta Cte.</td>
            <td>&nbsp;</td>
            <td colspan="2"><input type="text" name="ctacts" id="ctacts" class="texto" value="<?php echo $ctacts;?>" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6"><hr /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sueldo Basico:</td>
            <td><input type="text" name="SueldoB" id="textfield15"   class="texto" value="<?php echo $sueldob ?>" /></td>
            <td width="130">Area:</td>
            <td width="3">&nbsp;</td>
            <td colspan="2"><?php $ven = ListarAreaC();?>
              <select name="Area" id="Area" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$area){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td width="5">&nbsp;</td>
          </tr>
          <tr>
            <td>Asignación Familiar:</td>
            <td><select name="AsigF" id="AsigF" class="combos texto">
              <option value="1" <?php  if($asig=='1'){ ?> selected <?php }?>>SI</option>
              <option value="2" <?php  if($asig=='2'){ ?> selected <?php }?>>NO</option>
            </select></td>
            <td>Cargo:</td>
            <td>&nbsp;</td>
            <td colspan="2"><?php $ven = ListarCargoC();?>
              <select name="Cargo" id=" Cargo" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$cargo){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sistema de pensiones:</td>
            <td><?php $ven = ListaPensionesC();?>
              <select name="pensiones" id="pensiones" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["n_codP"]?>"<?php if($item["n_codP"]==$pension){?>selected<?php }?>><?php echo $item["c_nombre"]?></option>
                <?php }	?>
              </select></td>
            <td>Codigo Afiliacion:</td>
            <td>&nbsp;</td>
            <td colspan="2"><input type="text" name="c_codAfi" id="c_codAfi"   class="texto" value="<?php echo $codafi?>"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Seguro de Salud</td>
            <td><p>&nbsp;</p>
              <p>
                
                
                <select name="c_seguroS" id="c_seguroS" class="combo texto">
                  
                <?php
					if($segC=='SI'){
                  echo "<option value='SI' selected='selected'>SI</option>";
                  echo "<option value='NO'>NO</option>";
					}else
					if($segC=='NO'){
						echo "<option value='SI'>SI</option>";
		                echo "<option value='NO'  selected='selected'>NO</option>";
						}else {
							echo "<option value='SI'>SI</option>";
		                echo "<option value='NO'  selected='selected'>NO</option>";
							
							}
				  ?>
                </select>
              </p></td>
            <td>Seguro Contra Todo riesgo</td>
            <td>&nbsp;</td>
            <td width="1">&nbsp;</td>
            <td width="462"><p>&nbsp;</p>
              <p>
                
                <select name="C_seguroCTR" id="C_seguroCTR" class="combo texto">
                <?php
					if($segC=='SI'){
                  echo "<option value='SI' selected='selected'>SI</option>";
                  echo "<option value='NO'>NO</option>";
					}else
					if($segC=='NO'){
						echo "<option value='SI'>SI</option>";
		                echo "<option value='NO'  selected='selected'>NO</option>";
						}else{
							echo "<option value='SI'>SI</option>";
		                echo "<option value='NO'  selected='selected'>NO</option>";
							
							}
				  ?>
                </select>
              </p></td>
          </tr>
      </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="975" border="0">
          <tr>
            <td width="182">Nivel Academico:</td>
            <td width="180">Centro de Estudios
              asdasd
              
            
            </td>
            <td width="168">Carrera</td>
            <td width="166">Ultimo Año Aprobado</td>
            <td width="28">&nbsp;</td>
            <td width="144">&nbsp;</td>
            <td width="77">&nbsp;</td>
          </tr>
          <tr>
            <td>
              <?php $ven = ListaNivelC();?>
          <select name="c_nivel" id="c_nivel" class="Combos texto">
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){?>
           
   <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
            <?php }	?>
          </select>
            </td>
            <td><input type="text" name="c_CentroE" id="c_CentroE" class="texto" /></td>
            <td><label for="textfield"></label>
              <input type="text" name="carrera" id="carrera" class="texto"/></td>
            <td><input  name="c_UltiAa" id="c_UltiAa"  class="texto"  type="number" /></td>
            <td>&nbsp;</td>
            <td><a href="#" onclick="accion2()"><img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <table width="1052" border="0" id="tablaDiagnostico">
          <tr>
            <td width="50" bgcolor="#66CCCC"><strong>Nivel</strong></td>
            <td width="253" bgcolor="#66CCCC"><strong>Centro Estudio</strong></td>
            <td width="253" bgcolor="#66CCCC"><strong>Carrera</strong></td>
            <td width="253" bgcolor="#66CCCC"><strong>Ultimo Año Aprobado</strong></td>
            <td width="221"bgcolor="#66CCCC"><strong>Delete</strong></td>
            </tr>
          <?php 
							if($resultado2 != NULL)
							{		
								$i = 1;
								foreach($resultado2 as $itemD)
								{
									
							?>
          <tr>
            <td height="24" >
              
              
              <select name="<?php echo "c_nivel".$i; ?>" id="<?php echo "c_nivel".$i; ?>" class="Combos texto">
                
                <option value="0">.::SELECCIONE::.</option>
                <?php
			$venMO=ListaNivelC();
			 foreach($venMO as $item){?>
                
                <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$itemD['c_nivel']){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td ><strong>
              <input  name="<?php echo "c_CentroE".$i; ?>" type="text" id="<?php echo "c_CentroE".$i; ?>" value="<?php echo $itemD["c_CentroE"]; ?>"  size="40" readonly="readonly" class='texto' />
              </strong></td>
            <td ><strong>
              <input  name="<?php echo "carrera".$i; ?>2" type="text" id="<?php echo "carrera".$i; ?>2" value="<?php echo $itemD["c_Carrera"]; ?>"  size="40" readonly="readonly" class='texto' />
            </strong></td>
            <td ><strong>
              <input type="text" id="<?php echo "c_UltiAa".$i; ?>"  name="<?php echo "c_UltiAa".$i; ?>"  size="40" value="<?php echo $itemD["c_UltiAa"]; ?>" class="texto" />
              </strong></td>
            <td><input type="button" name="button3" id="button3" value="delete" onclick="eliminarUsuario(this)" /></td>
            </tr>
          <?php 	
								$i++;
								}			
							}
						?>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="959" border="0" id="tablaDiagnostico">
          <tr>
            <td width="72">Parentesco</td>
            <td width="146"><?php $ven = ListaParienteC();?>
              <select name="c_Paren" id="c_Paren" class="Combos texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
            <td width="139">Nombre:</td>
            <td width="144"><label for="c_seguroS"></label>
              <label for="c_NombreC"></label>
              <input type="text" name="c_NombreC" id="c_NombreC" class="texto" r/></td>
            <td width="69">Ocupacion:</td>
            <td width="144"><input type="text" name="c_Ocup" id="c_Ocup" class="texto" r/></td>
            <td width="215">&nbsp;</td>
          </tr>
          <tr>
            <td>Teléfono:</td>
            <td><label for="textfield2">
              <input type="tel" name="c_Telef" id="c_Telef" class="texto" placeholder="telefono"/>
            </label></td>
            <td>Trabaja en Zgroup</td>
            <td align="left"><p>
             <!-- <label>
                <input type="radio" name="c_TrabajaA2" value="1" id="c_TrabajaA2" class="texto" />
                SI </label>
              <label>
                <input type="radio" name="c_TrabajaA2" value="0" id="c_TrabajaA2" class="texto" />
                No </label>-->
              <label for="c_TrabajaA"></label>
              <select name="c_TrabajaA" id="c_TrabajaA">
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
              <br />
            </p></td>
            <td>Telefonoen caso de emergencia:</td>
            <td><label for="select3"></label>
              <!--<select name="c_TrabajaA" id="c_TrabajaA">
                <option value="SI">SI</option>
                <option value="NO">NO</option>
              </select>-->
              <label for="textfield13"></label>
              <input type="text" name="c_telemer" id="c_telemer" class="texto"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Domicilio:</td>
            <td colspan="3"><input name="c_Direc" type="text" id="c_Direc" size="60" class="texto" placeholder="iNGRESE DIRECCION DE DOMICILIO" /></td>
            <td>Edad</td>
            <td>
              <input type="text" name="c_edad" id="c_edad" /></td>
            <td><a href="#" onclick="accion3()"><img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
          </tr>
     
        </table>
        <table width="1096" border="0" id="tablaDiagnostico2">
          <tr>
            <td width="138" bgcolor="#66CCCC"><strong>Parentesco</strong></td>
            <td width="138" bgcolor="#66CCCC"><strong>Nombre</strong></td>
            <td width="138" bgcolor="#66CCCC"><strong>Ocupación</strong></td>
            <td width="134"bgcolor="#66CCCC"><strong>Telefono</strong></td>
            <td width="134"bgcolor="#66CCCC"><strong>Trabaja en Zgroup?</strong></td>
            <td width="65"bgcolor="#66CCCC"><strong>Telef Emergencia</strong></td>
            <td width="50"bgcolor="#66CCCC"><strong>Edad</strong></td>
            <td width="192"bgcolor="#66CCCC"><strong>Dirección</strong></td>
          </tr>
          <?php 
							if($resultado3 != NULL)
							{		
								$i = 1;
								foreach($resultado3 as $itemD)
								{
									
							?>
          <tr>
            <td height="24" ><select name="<?php echo "c_paren".$i; ?>" id="<?php echo "c_paren".$i; ?>" class="Combos texto">
              <option value="0">.::SELECCIONE::.</option>
              <?php
			$venMO=ListaParienteC();
			 foreach($venMO as $item){?>
              <option value="<?php echo $item["codigo"]?>"<?php if($item["codigo"]==$itemD['c_Paren']){?>selected<?php }?>><?php echo $item["descripcion"]?></option>
              <?php }	?>
            </select></td>
            
            
            <td >
            
              <input  name="<?php echo "c_NombreC".$i; ?>" type="text" id="<?php echo "c_NombreC".$i; ?>" value="<?php echo $itemD["c_NombreC"]; ?>"  size="10" readonly="readonly" class='texto' />
              
              
           </td>
            <td >
              <input  name="<?php echo "c_Ocup".$i; ?>" type="text" id="<?php echo "c_Ocup".$i; ?>" value="<?php echo $itemD["c_Ocup"]; ?>"  size="10" readonly="readonly" class='texto' />
              
              
            </strong></td>
            <td ><strong>
            
              <input  name="<?php echo "c_Telef".$i; ?>" type="text" id="<?php echo "c_Telef".$i; ?>" value="<?php echo $itemD["c_Telef"]; ?>"  size="15" readonly="readonly" class='texto' />
              
              
            </strong></td>
            <td ><strong>
              <input type="text" id="<?php echo "c_TrabajaA".$i; ?>"  name="<?php echo "c_TrabajaA".$i; ?>"  size="15" 
              value="<?php echo $itemD["c_TrabajaA"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input type="text" id="<?php echo "c_telemer".$i; ?>"  name="<?php echo "c_telemer".$i; ?>"  size="15" 
              value="<?php echo $itemD["c_telemer"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input type="text" id="<?php echo "c_edad".$i; ?>"  name="<?php echo "c_edad".$i; ?>"  size="15" 
              value="<?php echo $itemD["c_edad"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input  name="<?php echo "c_Direc".$i; ?>" type="text" id="<?php echo "c_Direc".$i; ?>" value="<?php echo $itemD["c_Direc"]; ?>"  size="15" readonly="readonly" class='texto' />
            </strong></td>
            <td width="69"><input type="button" name="button3" id="button3" value="delete" onclick="eliminarUsuario(this)" /></td>
          </tr>
          <?php 	
								$i++;
								}			
							}
						?>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="1056" border="0">
          <tr>
            <td width="107">Empresa:</td>
            <td width="172"><label for="n_IngMpro"></label>
              <input type="tel" name="c_Empr" id="c_Empr" class="texto" placeholder="Ingrese el telefono"/></td>
            <td width="59">Cargo:</td>
            <td width="164"><input type="text" name="c_Cargo" id="c_Cargo" class="texto"/></td>
            <td width="99">Fecha Ingreso:</td>
            <td width="170"><label for="d_FechaI"></label>
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
		      </script></td>
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
            <td><input type="text" name="c_JefeInm" id="c_JefeInm" class="texto"  placeholder="Jefe inmediato"/></td>
            <td>Telefono:</td>
            <td><label for="ffff">
              <input type="tel" name="C_Telef" id="C_Telef" class="texto"  placeholder="Ingrese su telefono"/>
            </label></td>
            <td>Motivo Cese:</td>
            <td><label for="C_MotC"></label>
              <input type="text" name="C_MotC" id="C_MotC" class="texto"  placeholder="Motivo de cese"/>
              <label for="textfield17"></label></td>
            <td><a href="#" onclick="accion4()"> <img src="../images/agregar.png" width="22" height="22" border="0" /></a></td>
            <td></td>
          </tr>
        </table>
        <table width="795" border="0" id="tablaDiagnostico3">
          <tr>
            <td width="50" bgcolor="#66CCCC"><strong>Empresa</strong></td>
            <td width="253" bgcolor="#66CCCC"><strong>Cargo</strong></td>
            <td width="253" bgcolor="#66CCCC"><strong>Fecha Ingreso</strong></td>
            <td width="221"bgcolor="#66CCCC"><strong>Fecha Cese</strong></td>
            <td width="221"bgcolor="#66CCCC"><strong>Jefe Inmediato</strong></td>
            <td width="221"bgcolor="#66CCCC"><strong>Telefono</strong></td>
            <td width="221"bgcolor="#66CCCC"><strong>Motivo Cese</strong></td>
          </tr>
          <?php
							if($resultado4 != NULL)
							{		
								$i = 1;
								foreach($resultado4 as $itemD)
								{
									
							?>
          <tr>
            <td ><strong>
              <input width="50" type="text" id="<?php echo "c_Empr".$i; ?>"  name="<?php echo "c_Empr".$i; ?>"  size="40" value="<?php echo $itemD["c_Empr"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input width="253" name="<?php echo "c_Cargo".$i; ?>" type="text" id="<?php echo "c_Cargo".$i; ?>" value="<?php echo $itemD["c_Cargo"]; ?>"  size="40" readonly="readonly" class='texto' />
            </strong></td>
            <td ><strong>
              <input  width="253" type="text" id="<?php echo "d_FechaI".$i; ?>"  name="<?php echo "d_FechaI".$i; ?>"  size="40" value="<?php echo $itemD["d_FechaI"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input width="221" type="text" id="<?php echo "d_FechaC".$i; ?>"  name="<?php echo "d_FechaC".$i; ?>"  size="40" value="<?php echo $itemD["d_FechaC"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input width="221" type="text" id="<?php echo "c_JefeInm".$i; ?>"  name="<?php echo "c_JefeInm".$i; ?>"  size="40" value="<?php echo $itemD["c_JefeInm"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input width="221" type="text" id="<?php echo "C_Telef".$i; ?>"  name="<?php echo "C_Telef".$i; ?>"  size="40" value="<?php echo $itemD["C_Telef"]; ?>" class="texto" />
            </strong></td>
            <td ><strong>
              <input width="221" type="text" id="<?php echo "C_MotC".$i; ?>"  name="<?php echo "C_MotC".$i; ?>"  size="40" value="<?php echo $itemD["C_MotC"]; ?>" class="texto" />
            </strong></td>
            <td><input type="button" name="button3" id="button3" value="delete" onclick="eliminarUsuario(this)" /></td>
          </tr>
          <?php 	
								$i++;
								}			
							}
						?>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="1039" border="0">
          <tr>
            <td width="128">Ingreso Economico Mensual(promedio)</td>
            <td width="152"><label for="n_IngMpro"></label>
              <input type="number" name="n_IngMpro" id="n_IngMpro" class="texto" value="<?php echo $ingresom ?>"/></td>
            <td width="172">Gasto Mensual(promedio):</td>
            <td width="162"><label for="n_GasMPro"></label>
              <input type="number" name="n_GasMPro" id="n_GasMPro" class="texto" value="<?php echo $gastom ?>"/></td>
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
              <input type="text" name="c_Marca" id="c_Marca" class="texto" value="<?php echo $marca ?>"/></td>
            <td>Placa:</td>
            <td><label for="c_Placa"></label>
              <input type="text" name="c_Placa" id="c_Placa" class="texto" value="<?php echo $placa ?>"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Modelo</td>
            <td><label for="c_Vehi"></label>
              <input type="text" name="c_Vehi" id="c_Vehi" class="texto" value="<?php echo $vehivulo ?>"/></td>
            <td>Valor Comercial</td>
            <td><label for="n_ValorC"></label>
              <input type="number" name="n_ValorC" id="n_ValorC" class="texto" value="<?php echo $valor ?>"/></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
      <table width="327" border="1">
    <tr>
      <td colspan="4">Fecha de cese</td>
      </tr>
    <tr>
      <td width="62">&nbsp;</td>
      <td width="88">&nbsp;</td>
      <td width="1">&nbsp;</td>
      <td width="21">&nbsp;</td>
    </tr>
    <tr>
      <td>Fecha</td>
      <td>
      <input name="fechacesee"  class="texto" id="fechacesee" type="text" onkeyup = "this.value=formateafecha(this.value); "   placeholder="Ingrese fecha->" value="<?php echo $fechaCese; ?>" />
             <img src="../images/calendario.jpg" name="Im" id="Im" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" /></td>
             <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechacesee",
					ifFormat   : "%Y/%m/%d",
					button     : "Im"
					  }
					);
		 </script>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Motivo</td>
      <td><textarea name="motivoCese"  cols="20" rows="3" id="motivoCese" class="texto"><?php echo $motivoCese; ?></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
      </div>
    </div>
    
    
  </div>
  <p>
  <input type="hidden" name="codigo_emple" id="codigo_emple" value=<?php echo $_REQUEST["cod"]?> />
  
    <input type="submit" name="button" id="button" value="Enviar" class="submit" />
  </p>
  
  
  
   </fieldset>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
</body>
</html>
