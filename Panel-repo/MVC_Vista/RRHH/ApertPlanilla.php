<?php

//obtenerUitM
if($resultado2!=NULL){	
	foreach($resultado2 as $item2){
		$uit=$item2['val1_param'];
	}
}

//obtenerSeguroM
if($resultado3!=NULL){	
	foreach($resultado3 as $item3){
		$psalud=$item3['val1_param'];
	}
}

//obtenerRentaMenor27M
if($renta1!=NULL){	
	foreach($renta1 as $item4){
		$prenta1=$item4['val1_param'];
	}
}

//obtenerRenta27a54M
if($renta2!=NULL){	
	foreach($renta2 as $item5){
		$prenta2=$item5['val1_param'];
	}
}

//obtenerRentaMayor54M
if($renta3!=NULL){	
	foreach($renta3 as $item6){
		$prenta3=$item6['val1_param'];
	}
}


if($resultado!=NULL)
{
$cantDiagnosticos = 0;
foreach($resultado as $itemD)
{
	$cantDiagnosticos += 1;
}
}else{
	$cantDiagnosticos = 1;
}

if($vall!=null){
	foreach($vall as $items){
		
		$total=$items['total'];
				
	}
}

if($vall!=null){
	foreach($vall as $items){
		
		$dia=$items['di'];
		$sueldob=$items['sueldob'];
		$asigf=$items['asigf'];
		$userid=$items['userid'];
		
		
	}
}




function UltimoDia($ano,$mes){ 
   if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) { 
       $dias_febrero = 29; 
   } else { 
       $dias_febrero = 28; 
   } 
   switch($mes) { 
       case 1: return 31; break; 
       case 2: return $dias_febrero; break; 
       case 3: return 31; break; 
       case 4: return 30; break; 
       case 5: return 31; break; 
       case 6: return 30; break; 
       case 7: return 31; break; 
       case 8: return 31; break; 
       case 9: return 30; break; 
       case 10: return 31; break; 
       case 11: return 30; break; 
       case 12: return 31; break; 
   } 
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
<script src="../../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
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

<script type="text/javascript">

var INPUT_NAME_PREFIX = 'userid'; // this is being set via script a
var INPUT_NAME_DES = 'd_trab'; // this is being set via script b
var INPUT_NAME_GLO = 'd_falt'; // this is being set via script g  TotalRemuB
var INPUT_NAME_CLA = 'basico'; // this is being set via script h
var INPUT_NAME_PRE = 'asig_fam'; // this is being set via script c
var INPUT_NAME_DSC = 'Otros_Ing'; // this is being set via script d
var INPUT_NAME_DSC2 = 'TotalRemuB'; // this is being set via script d
var INPUT_NAME_DSC3 = 'SistemaP'; // this is being set via script d
var INPUT_NAME_DSC4 = 'AprtObl'; // this is being set via script d
var INPUT_NAME_DSC5 = 'ComiRA'; // this is being set via script d       
var INPUT_NAME_DSC6 = 'PrmSeg'; // this is being set via script d       
var INPUT_NAME_DSC7 = 'DescToPen'; // this is being set via script d       
var INPUT_NAME_DSC8 = 'desc_falt'; // this is being set via script d       
//var INPUT_NAME_DSC9 = 'desc_prest'; // this is being set via script d       
var INPUT_NAME_DSC10 = 'desc_adel'; // this is being set via script d       
var INPUT_NAME_DSC11 = 'desc_quinta'; // this is being set via script d       
var INPUT_NAME_DSC12 = 'd_pagos'; // this is being set via script d       
var INPUT_NAME_DSC13 = 'total_pag'; // this is being set via script d       
var INPUT_NAME_DSC14 = 'AE_Salud'; // this is being set via script d       
var INPUT_NAME_DSC15 = 'AE_Sctr'; // this is being set via script d       horast
var INPUT_NAME_DSC16 = 'AE_TotalA';
var INPUT_NAME_DSC17 = 'horast'; // this is being set via script d       

var TABLE_NAME = 'tblSample'; // this should be named in the HTML
var ROW_BASE = 1; // first number (for display)
var hasLoaded = false;

window.onload=fillInRows;

function fillInRows()
{
	hasLoaded = true;

		
}






function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho,nueve,diez,once,doce,
								trece,catorce,quince,diecisesis,diesiciete,dieciocho,diecinueve,veinte,veintiuno,veintidos)
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
	this.catorce=catorce;
	this.quince=quince;
	this.diecisesis=diecisesis;
	this.diesiciete=diesiciete;
	this.dieciocho=dieciocho;
	this.diecinueve=diecinueve;
	this.veinte=veinte
	this.veintiuno=veintiuno;
		this.veintidos=veintidos;
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
	//alert('hola');userid,basico,asig_fam,Otros_Ing,TotalRemuB,SistemaP

	var codigo=document.getElementById("userid").value
	var des=document.getElementById("d_trab").value
	var glo=document.getElementById("d_falt").value
	var cla=document.getElementById("basico").value
	var pre=document.getElementById("asig_fam").value
	var dsc=document.getElementById("Otros_Ing").value
	var dsc2=document.getElementById("TotalRemuB").value
	var dsc3=document.getElementById("SistemaP").value
	var dsc4=document.getElementById("AprtObl").value
	var dsc5=document.getElementById("ComiRA").value	
	
		var dsc6=document.getElementById("PrmSeg").value	
		
		var dsc7=document.getElementById("DescToPen").value			
		
		var dsc8=document.getElementById("desc_falt").value	
//		var dsc9=document.getElementById("desc_prest").value	
		var dsc10=document.getElementById("desc_adel").value	
		var dsc11=document.getElementById("desc_quinta").value	
		var dsc12=document.getElementById("d_pagos").value	
		var dsc13=document.getElementById("total_pag").value	
		var dsc14=document.getElementById("AE_Salud").value	
		var dsc15=document.getElementById("AE_Sctr").value	
		var dsc16=document.getElementById("AE_TotalA").value	
				var dsc17=document.getElementById("horast").value	
		
		
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
		txtInpa.setAttribute('size', '4');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		//txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
			var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '4');
	txtInpb.setAttribute('value', des); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
	txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
	txtInpb.setAttribute('class', 'texto'); 
	
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_GLO + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_GLO + iteration);
		txtInpc.setAttribute('size', '4');
	txtInpc.setAttribute('value', glo); // iteration included for debug purposes
	//txtInpc.setAttribute('class', 'texto'); 
	//txtInpc.setAttribute('readonly', 'readonly');
		cell3.appendChild(txtInpc);
		

			var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_CLA + iteration);
		txtInpd.setAttribute('size', '4');
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
		
		
		var cell7 = row.insertCell(7);
		var txtInpf2 = document.createElement('input');
		txtInpf2.setAttribute('type', 'text');
		txtInpf2.setAttribute('name', INPUT_NAME_DSC2 + iteration);
		txtInpf2.setAttribute('id', INPUT_NAME_DSC2 + iteration);
		txtInpf2.setAttribute('size', '5');
		txtInpf2.setAttribute('value', dsc2); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell7.appendChild(txtInpf2);
		
		var cell8 = row.insertCell(8);
		var txtInpf3 = document.createElement('input');
		txtInpf3.setAttribute('type', 'text');
		txtInpf3.setAttribute('name', INPUT_NAME_DSC3 + iteration);
		txtInpf3.setAttribute('id', INPUT_NAME_DSC3 + iteration);
		txtInpf3.setAttribute('size', '5');
		txtInpf3.setAttribute('value', dsc3); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell8.appendChild(txtInpf3);
		
		var cell9 = row.insertCell(9);
		var txtInpf4 = document.createElement('input');
		txtInpf4.setAttribute('type', 'text');
		txtInpf4.setAttribute('name', INPUT_NAME_DSC4 + iteration);
		txtInpf4.setAttribute('id', INPUT_NAME_DSC4 + iteration);
		txtInpf4.setAttribute('size', '5');
		txtInpf4.setAttribute('value', dsc4); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell9.appendChild(txtInpf4);
		
		var cell10 = row.insertCell(10);
		var txtInpf5 = document.createElement('input');
		txtInpf5.setAttribute('type', 'text');
		txtInpf5.setAttribute('name', INPUT_NAME_DSC5 + iteration);
		txtInpf5.setAttribute('id', INPUT_NAME_DSC5 + iteration);
		txtInpf5.setAttribute('size', '5');
		txtInpf5.setAttribute('value', dsc5); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell10.appendChild(txtInpf5);
		
				var cell11 = row.insertCell(11);
		var txtInpf6 = document.createElement('input');
		txtInpf6.setAttribute('type', 'text');
		txtInpf6.setAttribute('name', INPUT_NAME_DSC6 + iteration);
		txtInpf6.setAttribute('id', INPUT_NAME_DSC6 + iteration);
		txtInpf6.setAttribute('size', '5');
		txtInpf6.setAttribute('value', dsc6); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell11.appendChild(txtInpf6);
		
				var cell12 = row.insertCell(12);
		var txtInpf7 = document.createElement('input');
		txtInpf7.setAttribute('type', 'text');
		txtInpf7.setAttribute('name', INPUT_NAME_DSC7 + iteration);
		txtInpf7.setAttribute('id', INPUT_NAME_DSC7 + iteration);
		txtInpf7.setAttribute('size', '5');
		txtInpf7.setAttribute('value', dsc7); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell12.appendChild(txtInpf7);
		
				var cell13 = row.insertCell(13);
		var txtInpf8 = document.createElement('input');
		txtInpf8.setAttribute('type', 'text');
		txtInpf8.setAttribute('name', INPUT_NAME_DSC8 + iteration);
		txtInpf8.setAttribute('id', INPUT_NAME_DSC8 + iteration);
		txtInpf8.setAttribute('size', '5');
		txtInpf8.setAttribute('value', dsc8); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell13.appendChild(txtInpf8);
		
				var cell14 = row.insertCell(14);
		var txtInpf9 = document.createElement('input');
		txtInpf9.setAttribute('type', 'text');
		txtInpf9.setAttribute('name', INPUT_NAME_DSC9 + iteration);
		txtInpf9.setAttribute('id', INPUT_NAME_DSC9 + iteration);
		txtInpf9.setAttribute('size', '5');
		txtInpf9.setAttribute('value', dsc9); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell14.appendChild(txtInpf9);
		
				var cell15 = row.insertCell(15);
		var txtInpf10 = document.createElement('input');
		txtInpf10.setAttribute('type', 'text');
		txtInpf10.setAttribute('name', INPUT_NAME_DSC10 + iteration);
		txtInpf10.setAttribute('id', INPUT_NAME_DSC10 + iteration);
		txtInpf10.setAttribute('size', '5');
		txtInpf10.setAttribute('value', dsc10); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell15.appendChild(txtInpf10);
		
				var cell16 = row.insertCell(16);
		var txtInpf11 = document.createElement('input');
		txtInpf11.setAttribute('type', 'text');
		txtInpf11.setAttribute('name', INPUT_NAME_DSC11 + iteration);
		txtInpf11.setAttribute('id', INPUT_NAME_DSC11 + iteration);
		txtInpf11.setAttribute('size', '5');
		txtInpf11.setAttribute('value', dsc11); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell16.appendChild(txtInpf11);
		
		var cell17 = row.insertCell(17);
		var txtInpf12 = document.createElement('input');
		txtInpf12.setAttribute('type', 'text');
		txtInpf12.setAttribute('name', INPUT_NAME_DSC12 + iteration);
		txtInpf12.setAttribute('id', INPUT_NAME_DSC12 + iteration);
		txtInpf12.setAttribute('size', '5');
		txtInpf12.setAttribute('value', dsc12); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell17.appendChild(txtInpf12);
		
		var cell18 = row.insertCell(18);
		var txtInpf13 = document.createElement('input');
		txtInpf13.setAttribute('type', 'text');
		txtInpf13.setAttribute('name', INPUT_NAME_DSC13 + iteration);
		txtInpf13.setAttribute('id', INPUT_NAME_DSC13 + iteration);
		txtInpf13.setAttribute('size', '5');
		txtInpf13.setAttribute('value', dsc13); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell18.appendChild(txtInpf13);
		
		var cell19 = row.insertCell(19);
		var txtInpf14 = document.createElement('input');
		txtInpf14.setAttribute('type', 'text');
		txtInpf14.setAttribute('name', INPUT_NAME_DSC14 + iteration);
		txtInpf14.setAttribute('id', INPUT_NAME_DSC14 + iteration);
		txtInpf14.setAttribute('size', '5');
		txtInpf14.setAttribute('value', dsc14); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell19.appendChild(txtInpf14);
		
				var cell20 = row.insertCell(20);
		var txtInpf15 = document.createElement('input');
		txtInpf15.setAttribute('type', 'text');
		txtInpf15.setAttribute('name', INPUT_NAME_DSC15 + iteration);
		txtInpf15.setAttribute('id', INPUT_NAME_DSC15 + iteration);
		txtInpf15.setAttribute('size', '5');
		txtInpf15.setAttribute('value', dsc15); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell20.appendChild(txtInpf15);
		
		
		var cell21 = row.insertCell(21);
		var txtInpf16 = document.createElement('input');
		txtInpf16.setAttribute('type', 'text');
		txtInpf16.setAttribute('name', INPUT_NAME_DSC16 + iteration);
		txtInpf16.setAttribute('id', INPUT_NAME_DSC16 + iteration);
		txtInpf16.setAttribute('size', '5');
		txtInpf16.setAttribute('value', dsc16); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell21.appendChild(txtInpf16);
		
		var cell23 = row.insertCell(22);
		var txtInpf17 = document.createElement('input');
		txtInpf17.setAttribute('type', 'hidden');
		txtInpf17.setAttribute('name', INPUT_NAME_DSC17 + iteration);
		txtInpf17.setAttribute('id', INPUT_NAME_DSC17 + iteration);
		txtInpf17.setAttribute('size', '5');
		txtInpf17.setAttribute('value', dsc17); // iteration included for debug purposes
		//txtInpf.setAttribute('class', 'texto'); 
		//txtInpf.setAttribute('readonly', 'readonly'); 
		cell23.appendChild(txtInpf17);
		
				
		// cell 2 - input button
		var cell22 = row.insertCell(23);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell22.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpf,txtInpf2,txtInpf3,txtInpf4,txtInpf5,txtInpf6,txtInpf7,txtInpf8,
													txtInpf9,txtInpf10,txtInpf11,txtInpf12,txtInpf13,txtInpf14,txtInpf15,txtInpf16,txtInpf17);
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
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_DSC2 + count;
				
				
				tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_DSC3 + count;
				tbl.tBodies[0].rows[i].myRow.diez.name = INPUT_NAME_DSC4 + count;
				tbl.tBodies[0].rows[i].myRow.once.name = INPUT_NAME_DSC5 + count;
				tbl.tBodies[0].rows[i].myRow.doce.name = INPUT_NAME_DSC6 + count;
				tbl.tBodies[0].rows[i].myRow.trece.name = INPUT_NAME_DSC7 + count;
				tbl.tBodies[0].rows[i].myRow.catorce.name = INPUT_NAME_DSC8 + count;
				tbl.tBodies[0].rows[i].myRow.quince.name = INPUT_NAME_DSC9 + count;
				tbl.tBodies[0].rows[i].myRow.diecisesis.name = INPUT_NAME_DSC10 + count;
				tbl.tBodies[0].rows[i].myRow.dieciocho.name = INPUT_NAME_DSC11 + count;
				tbl.tBodies[0].rows[i].myRow.diecinueve.name = INPUT_NAME_DSC12 + count;
				tbl.tBodies[0].rows[i].myRow.veinte.name = INPUT_NAME_DSC13 + count;
				tbl.tBodies[0].rows[i].myRow.veintiuno.name = INPUT_NAME_DSC14 + count;
				tbl.tBodies[0].rows[i].myRow.veintidos.name = INPUT_NAME_DSC15 + count;
				tbl.tBodies[0].rows[i].myRow.veintitres.name = INPUT_NAME_DSC16 + count;
																																												
				//tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_CAN + count;
				//tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_IMP + count;	this.quince=quince;

				
			
				
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
		/*var uss=validarUserid();
		//validarUserid();
	//	alert(uss);
//		addRowToTable();	
			
		var tbl = document.getElementById('tblSample');
		var rowToInsertAt = tbl.tBodies[0].rows.length;
	
		//alert(rowToInsertAt);
	
	if(rowToInsertAt==0){
	addRowToTable();
	}
	var u=document.getElementById('userid').value;
	var uss=validarUserid();
//	alert(uss);
	if(u==uss)
	{
		alert('El empleado ya ah sido añadido ..');
		
			}else{addRowToTable();}


	
	*/
	
		
		
		
//	Limpiar();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
}
	
function validarUserid(){
		var u=document.getElementById('userid').value;
		var tbl = document.getElementById('tblSample');
		var rowToInsertAt = tbl.tBodies[0].rows.length;
		for (var i=0; i<tbl.tBodies[0].rows.length; i++) {
			//alert(rowToInsertAt);
		var us=tbl.tBodies[0].rows[i].myRow.two.value

		 if (us==u) {
				return us;		
		 }			
		}
}
</script>




	  
	  
<!--<script type="text/javascript">
$(document).ready(function() {
    $('#useri').change(function(){
		 ano=document.getElementById("anio").value;
		  mes=document.getElementById("mess").value;
		  codigo=document.getElementById("useri").options[document.getElementById("useri").selectedIndex].value;
        $("#form1").load("../MVC_Controlador/rrhhC.php?acc=llenarc"+"&cod="+codigo+"&an="+ano+"&me="+mes)
    });
    
});

</script>-->

<!--<script language="javascript">
$(function(){

	 $("#useri").change(function(){
	 var ano=document.getElementById("anio").value;
		 var  mes=document.getElementById("mess").value;
		  var codigo=document.getElementById("useri").options[document.getElementById("useri").selectedIndex].value;
 var url ="../MVC_Controlador/rrhhC.php?acc=llenarc"+"&cod="+codigo+"&an="+ano+"&me="+mes; // El script a dónde se realizará la petición.
    $.ajax({
           type: "GET",
           url: url,
           data: $("#form1").serialize(), // Adjuntar los campos del formulario enviado.
		   success: function(data)
		{
               $("#
               
               
               ").html(data);

           }

	});
    return false; // Evitar ejecutar el submit del formulario.
 });
});
</script>-->




<script type="text/javascript">
function abreVentana(){
			ano=document.getElementById("anio").value
	 		mes=document.getElementById("mess").value
			emp=document.getElementById("em").value
			miPopup = window.open("../MVC_Controlador/rrhhC.php?acc=listaPPP"+"&an="+ano+"&me="+mes+"&em="+emp,"miwin",
			"width=700,height=380,toolbar=no,status=yes,scrollbars=yes, Location=no"); return false;
			miPopup.focus();
			}
		
</script>


<script type="text/javascript">
function calcular(obj){
	
	var cant=obj;
	
    var suel = cant.substring(7,10);
	var asif = cant.substring(7,10);
	var otroi= cant.substring(7,10);
	var im=cant.substring(7,10);
	var im2=cant.substring(7,10);
	var im3=cant.substring(7,10);
	var im4=cant.substring(7,10);
	var im5=cant.substring(7,10);
	var im6=cant.substring(7,10);
	var im7=cant.substring(7,10);
	var im8=cant.substring(7,10);
	var im9=cant.substring(7,10);
	var im10=cant.substring(7,10);
	
	var apo=cant.substring(7,10);
	var prim=cant.substring(7,10);
	var comira=cant.substring(7,10);
	var diaf=cant.substring(7,10);
	
	var DescToP=cant.substring(7,10);
	var	descfal=cant.substring(7,10);
	//var	descprest=cant.substring(7,10);
	var	descadel=cant.substring(7,10);
	var	descquinta=cant.substring(7,10);
	
	var	despagos=cant.substring(7,10);
	var	fec=cant.substring(7,10);
	
	var Sueldob=document.getElementById("basico"+suel).value;
	var asif=document.getElementById("asig_fam"+asif).value;
	var otroi=document.getElementById("Otros_Ing"+otroi).value;
	
	
	var aporteo=document.getElementById("AprtObl"+apo).value;
	var primase=document.getElementById("PrmSeg"+prim).value;
	var cmira=document.getElementById("ComiRA"+comira).value;
	var dif=document.getElementById("d_falt"+diaf).value;
	
	var dit=document.getElementById("d_tard"+diaf).value;
	
	var DescToPen=document.getElementById("DescToPen"+DescToP).value;
	var desc_falt=document.getElementById("desc_falt"+descfal).value;
	//var desc_prest=document.getElementById("desc_prest"+descprest).value;
	var desc_adel=document.getElementById("desc_adel"+descadel).value;
	var desc_quinta=document.getElementById("desc_quinta"+descquinta).value;

	var trb=(parseFloat(Sueldob)+parseFloat(asif)+parseFloat(otroi));
	document.getElementById("TotalRemuB"+im).value=trb;
	//document.getElementById("AprtObl"+im2).value=(parseFloat(aporteo)/100)*trb;
	//document.getElementById("PrmSeg"+im3).value=(parseFloat(primase)/100)*trb;
	//document.getElementById("ComiRA"+im4).value=(parseFloat(cmira)/100)*trb;
	var dt=((parseFloat(aporteo)+parseFloat(primase)+parseFloat(cmira))/100)*trb;
	document.getElementById("DescToPen"+im5).value=Math.round(dt*100)/100;
	var dscf1=(parseFloat(Sueldob)/30)*dif;
	
	
	
//medio sueldo por 3 tardanzas acumuladas
	var desctar= Math.floor(dit/3);
  var dsct=(parseFloat(Sueldob)/60) * desctar;
  
  //descuento de faltas y tardanzas
   var dscf=dscf1+dsct;
	
	
	document.getElementById("desc_falt"+im6).value=Math.round(dscf*100)/100;
	
	
	
	
	var d_pagos=(dt+dscf+parseFloat(desc_adel)+parseFloat(desc_quinta));
	document.getElementById("d_pagos"+im7).value=Math.round(d_pagos*100)/100;
	
	//var porcsalud=document.formElem.psalud.value;
	
     var porcsalud=<?php echo $psalud; ?>;

	
	
	var salud=(parseFloat(trb)-(parseFloat(desc_falt)+parseFloat(desc_adel)))*(porcsalud/100);  
	document.getElementById("AE_Salud"+im10).value=Math.round(salud*100)/100;
	
	var remu=trb-d_pagos;
	document.getElementById("total_pag"+im8).value=Math.round(remu*100)/100;
	
	//////Descuento renta quinta categoria//////
	var fecha=document.getElementById("FechaIngEm"+fec).value;
	var anio = fecha.substring(6,10);
	var mes = fecha.substring(3,5);
	var d = new Date(); //obtiene la fecha actual
	var fecActual=d.getFullYear();//año actual
	//var uit=3800;
	
	//var uit =document.formElem.uit.value;
	 var uit=<?php echo $uit; ?>;
	
	var nmeses=0;
	var remeses=0;

	if(anio!=fecActual ){ //año que ingreso el empleado es diferente al año actual
		 nmeses=14;
		 remeses=12;	

	}else
	if(anio==fecActual && mes>=7){ //si el empleado ingresa en julio o despues
		 nmeses=13-mes; // 1 sueldo mas, si ingreso el 09 nmeses=4
		 remeses=12-mes;
	}else
	if(anio==fecActual && mes<7){ //si ingresa antes de julio
		nmeses=14-mes+1; //15 sueldos(diciembre, julio y diciembre)-mes que ingesa
		remeses=12-mes+1;
	}
		 
	 var remubrutaproyectada=(parseFloat(Sueldob)+parseFloat(otroi))*nmeses;
	 var deduuit=uit*7;

	 if(remubrutaproyectada >deduuit)
	 {
		 var rentaAquinta=remubrutaproyectada-deduuit;
	  }else{
	  	 var rentaAquinta=0;
	  }
	  
	  
		var porcrenta1=<?php echo $prenta1; ?>; //15
		var porcrenta2=<?php echo $prenta2; ?>; //21
		var porcrenta3=<?php echo $prenta3; ?>; //30
	  
	  
	    
	   if(rentaAquinta<=(27*uit)){
	    	var impuestoa=rentaAquinta*(porcrenta1/100);
	   }
	   if(rentaAquinta>(27*uit) && rentaAquinta<=(54*uit) ){
		    var impuestoa=rentaAquinta*(porcrenta2/100);
	   }
	    if(rentaAquinta>(54*uit) ){
		    var impuestoa=rentaAquinta*(porcrenta3/100);
	   }
	   
		var   impuestoquinta=impuestoa/remeses;	 	
    
		document.getElementById("desc_quinta"+im9).value=Math.round(impuestoquinta*100)/100;
	
		
}
	
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
        // Change es un evento que se ejecuta cada vez que se cambia el valor de un elemento (input, select, etc).
        $('#SistemaP').change(function(e) {
			if($(this).find(':selected').text()=='1')
			{
				$('#DescToPen').val($('#TotalRemuB')*0.13);
			}
		
          $('#TotalRemuB').val();
        });
      });
	  
	  
</script>


<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo=valor+1;
function agregarUsuario(){
	    nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
			
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='userid"+posicionCampo+"' type='text' id='userid"+posicionCampo+ "' size='5' readonly='readonly' class='texto'></td>"; 
		
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='nombre"+posicionCampo+"' type='text' id='nombre"+posicionCampo+ "' size='5' readonly='readonly' class='texto'></td>"; 
		 
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='d_trab"+posicionCampo+"' type='text' id='d_trab"+posicionCampo+ "' size='6' readonly='readonly' class='texto'></td> ";
		 
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='d_falt"+posicionCampo+"' type='text'  id='d_falt"+posicionCampo+"'  size='6'  class='texto'/>";
		
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='basico"+posicionCampo+"' type='text'  id='basico"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='asig_fam"+posicionCampo+"' type='text'  id='asig_fam"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='Otros_Ing"+posicionCampo+"' type='text'  id='Otros_Ing"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='TotalRemuB"+posicionCampo+"' type='text'  id='TotalRemuB"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='SistemaP"+posicionCampo+"' type='text'  id='SistemaP"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='AprtObl"+posicionCampo+"' type='text'  id='AprtObl"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='ComiRA"+posicionCampo+"' type='text'  id='ComiRA"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='PrmSeg"+posicionCampo+"' type='text'  id='PrmSeg"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='DescToPen"+posicionCampo+"' type='text'  id='DescToPen"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='desc_falt"+posicionCampo+"' type='text'  id='desc_falt"+posicionCampo+"'  size='6'  class='texto'/>";
		
				/*nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='desc_prest"+posicionCampo+"' type='text'  id='desc_prest"+posicionCampo+"'  size='6'  class='texto'/>";*/
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='desc_adel"+posicionCampo+"' type='text'  id='desc_adel"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='desc_quinta"+posicionCampo+"' type='text'  id='desc_quinta"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='d_pagos"+posicionCampo+"' type='text'  id='d_pagos"+posicionCampo+"'  size='6'  class='texto'/>";
		
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='total_pag"+posicionCampo+"' type='text'  id='total_pag"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='AE_Salud"+posicionCampo+"' type='text'  id='AE_Salud"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='AE_Sctr"+posicionCampo+"' type='text'  id='AE_Sctr"+posicionCampo+"'  size='6'  class='texto'/>";
		
				nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='AE_TotalA"+posicionCampo+"' type='text'  id='AE_TotalA"+posicionCampo+"'  size='6'  class='texto'/>";
		
		nuevaCelda=nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'></td> ";
		
escribirDiagnostico(posicionCampo);
		posicionCampo++;	
    }
function escribirDiagnostico(posicionCampo){
	
			userid = document.getElementById("userid" + posicionCampo);
			userid.value = document.formElem.userid.value;
			
			nombre = document.getElementById("nombre" + posicionCampo);
			nombre.value = document.formElem.nombre.value;
			
			d_trab = document.getElementById("d_trab" + posicionCampo);
			d_trab.value = document.formElem.d_trab.value;
			
			d_falt = document.getElementById("d_falt" + posicionCampo);
			d_falt.value = document.formElem.d_falt.value;	
			
			basico = document.getElementById("basico" + posicionCampo);
			basico.value = document.formElem.basico.value;	
			
			asig_fam = document.getElementById("asig_fam" + posicionCampo);
			asig_fam.value = document.formElem.asig_fam.value;	
			
			Otros_Ing = document.getElementById("Otros_Ing" + posicionCampo);
			Otros_Ing.value = document.formElem.Otros_Ing.value;	
			
			TotalRemuB = document.getElementById("TotalRemuB" + posicionCampo);
			TotalRemuB.value = document.formElem.TotalRemuB.value;	
			
			SistemaP = document.getElementById("SistemaP" + posicionCampo);
			SistemaP.value = document.formElem.SistemaP.value;	
			
			AprtObl = document.getElementById("AprtObl" + posicionCampo);
			AprtObl.value = document.formElem.AprtObl.value;	
			
			ComiRA = document.getElementById("ComiRA" + posicionCampo);
			ComiRA.value = document.formElem.ComiRA.value;	
			
			PrmSeg = document.getElementById("PrmSeg" + posicionCampo);
			PrmSeg.value = document.formElem.PrmSeg.value;	
			
			DescToPen = document.getElementById("DescToPen" + posicionCampo);
			DescToPen.value = document.formElem.DescToPen.value;	
			
			desc_falt = document.getElementById("desc_falt" + posicionCampo);
			desc_falt.value = document.formElem.desc_falt.value;	
			
		/*	desc_prest = document.getElementById("desc_prest" + posicionCampo);
			desc_prest.value = document.formElem.desc_prest.value;	*/
			
			desc_adel = document.getElementById("desc_adel" + posicionCampo);
			desc_adel.value = document.formElem.desc_adel.value;	
			
			desc_quinta = document.getElementById("desc_quinta" + posicionCampo);
			desc_quinta.value = document.formElem.desc_quinta.value;	
			
			d_pagos = document.getElementById("d_pagos" + posicionCampo);
			d_pagos.value = document.formElem.d_pagos.value;	
			
			total_pag = document.getElementById("total_pag" + posicionCampo);
			total_pag.value = document.formElem.total_pag.value;	
			
			AE_Salud = document.getElementById("AE_Salud" + posicionCampo);
			AE_Salud.value = document.formElem.AE_Salud.value;	
			
			AE_Sctr = document.getElementById("AE_Sctr" + posicionCampo);
			AE_Sctr.value = document.formElem.AE_Sctr.value;	
			
			AE_TotalA = document.getElementById("AE_TotalA" + posicionCampo);
			AE_TotalA.value = document.formElem.AE_TotalA.value;		
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
	
	
function CerrarPlanilla(){
		
			anio=document.formElem.anioo.value;
			mes=document.formElem.mess.value;			
			emp=document.formElem.empresaa.value;
			location.href="../MVC_Controlador/rrhhC.php?acc=cerrarp"+"&an="+anio+"&me="+mes+"&em="+emp;
			}
		
</script>	
	


   <?php 
						
						function domingos_del_mes($mes, $anho){
    
    $fecha1 = strtotime($anho.'-'.$mes.'-01'); 
    $fecha2 = strtotime($anho.'-'.$mes.'-'.date("t",mktime(0,0,0,$mes,1,$anho))); 
    $s=0;
    for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 
        if((strcmp(date('D',$fecha1),'Sun')==0)){
            $do[] = date('Y-m-d',$fecha1);
			$s++;
        }
    }

    return $s;
}



    $dm=(domingos_del_mes($mes,$anno));
	



						
						
						 ?>


<title>Documento sin título</title>


<script type="text/javascript" language="javascript">
function abreVentana(user,mes,ano){


	var u=user;
	var a=ano;
	var m=mes;
			miPopup = window.open("../MVC_Controlador/rrhhC.php?acc=detalleingresos&user="+u+"&ann="+a+"&mes="+m,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
		
		}
		
function abreVentana2(user,mes,ano){


	var u=user;
	var a=ano;
	var m=mes;
			miPopup = window.open("../MVC_Controlador/rrhhC.php?acc=detalledesc&user="+u+"&ann="+a+"&mes="+m,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
		
		}		
</script>



<script type="text/javascript">
function marcar(source)
{
	checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
	var tamaño=checkboxes.length;
	for(i=0;i<tamaño;i++) //recoremos todos los controles
	{
		if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
		{
		//si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
		checkboxes[i].checked=source.checked;
		//calcular(this.name);
		
		
		 
		
		}
	}
}
</script>



</head>

<body>
<div id="dresa"></div>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/rrhhC.php?acc=IngresaPlani">

 <table width="1459" height="153" border="1" cellspacing="0" id="tablaDiagnostico">
          <thead>
            <tr>
              <th colspan="21"  bgcolor="#66CCCC">
              <div align="center">
              	               
                <input type="hidden" name="anioo" id="anioo" value="<?php echo $_GET['an'];?>" />

                <input type="hidden" name="mess" id="mess" value="<?php echo $_GET['me'];?>" />

                <input type="hidden" name="empresaa" id="empresaa" value="<?php echo $_GET['em'];?>"/>
               PLANILLA - <label>PERIODO  </label><label><?php echo $_GET['nm'].'-'.$_GET['an'];?></label><label>EMPRESA: <?PHP echo $_GET['emp']?></label></div>
              </th>
            </tr>
           
            <tr>
              <th width="20"  bgcolor="#66CCCC">Marque<input name="todo"  id="todo" type="checkbox" value="" onclick="marcar(this);" onkeyup="" /></th>
              <th width="52" bgcolor="#66CCCC">Usuario</th>
              <th width="144" bgcolor="#66CCCC">Empleado</th>
              <th width="36" bgcolor="#66CCCC">Dias Trab.</th>
              <th width="36" bgcolor="#66CCCC">Dias Falt.</th>
              <th width="49" bgcolor="#66CCCC">Dias Tard.</th>
              <th width="49" bgcolor="#66CCCC">Sueldo Basico</th>
              <th width="60" bgcolor="#66CCCC">Asig. Familiar</th>
              <th width="102" bgcolor="#66CCCC">Otros Ingr.</th>
              <th width="42" bgcolor="#66CCCC">Total de Rem. Bruta</th>
              <th width="57" bgcolor="#66CCCC">Sistema de Pensi.</th>
              <th width="88" bgcolor="#66CCCC">Aporte Obligatorio</th>
              <th width="66" bgcolor="#66CCCC">Comisión Sobre R.A.</th>
              <th width="60" bgcolor="#66CCCC">Prima de Seguro</th>
              <th width="59" bgcolor="#66CCCC">Desc Pensión</th>
              <th width="48" bgcolor="#66CCCC">Desc. Falt. y Tard.</th>
              <th width="84" bgcolor="#66CCCC">Otros Desc.</th>
              <th width="66" bgcolor="#66CCCC">Desc. Quinta Categoria</th>
              <th width="48" bgcolor="#66CCCC">Desc. Total</th>
              <th width="48" bgcolor="#66CCCC">Remu. Neta</th>
              <th width="48" bgcolor="#66CCCC">Salud</th>
   <!--           <th width="27" bgcolor="#66CCCC">Sctr</th>
              <th width="53" bgcolor="#66CCCC">Total de Aportes</th>-->

            </tr>
    </thead>
    <?php 
	
    $dm=(domingos_del_mes($mes,$anno));

							if($resultado != NULL)
							{		
								$i = 1;
								foreach($resultado as $itemD)
								{
									
							?>
                            
                          
          <tr>
          <td><?php echo $i ?><input name="<?php echo "validar".$i; ?>" type="checkbox" id="<?php echo "validar".$i; ?>"  onclick="calcular(this.name)" />
           </td>
          <td height="48"><input name="<?php echo "userid".$i; ?>" type="text" id="<?php echo "userid".$i; ?>" value="<?php echo $itemD["Dni"];  ?>"  class="texto" size="8" readonly="readonly" /></td>
          <td><label for="textfield"></label>
            <input type="text" name="<?php echo "nombre".$i; ?>" id="<?php echo "nombre".$i; ?>" value="<?php echo $itemD["nombre"];  ?>" class="texto" readonly="readonly"/></td>
          <td><input name="<?php echo "d_trab".$i; ?>" type="text"  class="texto" id="<?php echo "d_trab".$i; ?>"  value="<?php echo '30'//$nif=$itemD["di"]; echo $df=$nif+$dm;?>" size="6" onkeyup="calcular(this.name)" readonly="readonly"/></td>
          <td><input name="<?php echo "d_falt".$i; ?>" type="text" class="texto" id="<?php echo "d_falt".$i; ?>"  value="<?php echo '0'// echo $valor=(UltimoDia($ano,$mes)-$df);?>" size="6" onkeyup="calcular(this.name)" /></td>
          <td><input name="<?php echo "d_tard".$i; ?>" type="text" class="texto" id="<?php echo "d_tard".$i; ?>"  value="<?php echo '0'// echo $valor=(UltimoDia($ano,$mes)-$df);?>" size="6" onkeyup="calcular(this.name)" /></td>
          <td height="48"><input name="<?php echo "basico".$i; ?>" type="text" id="<?php echo "basico".$i; ?>" value="<?php echo $sb=$itemD["sueldob"];  ?>" readonly="readonly" class="texto"  size="6" onkeyup="calcular(this.name)"/></td>
          <td><input name="<?php echo "asig_fam".$i; ?>" type="text" id="<?php echo "asig_fam".$i; ?>" value="<?php $as=$itemD["asigf"]; if($as==1){echo $as=75;}else{echo $as=0;} ?>" readonly="readonly"  class="texto" size="8" onkeyup="calcular(this.name)"/></td>
          
          
          <td><input name="<?php echo "Otros_Ing".$i; ?>" type="text" size="6" readonly="readonly"  class="texto" id="<?php echo "Otros_Ing".$i; ?>"  value="<?php $t=$itemD["total"]; if($t==NULL){echo '0';}else{echo $itemD['total'];}?>" /><a href="#" onclick="abreVentana('<?php echo $itemD["userid"];?>','<?php echo $_GET['me'];?>','<?php echo $_GET['an'];?>')"><img src="../images/buscar.png" width="14" title="Ver Detalle" height="16" border="0" /></a> </td>
           
           
           
           
          <td><input name="<?php echo "TotalRemuB".$i; ?>" type="text"  class="texto" id="<?php echo "TotalRemuB".$i; ?>"
           value="0" onkeyup="calcular(this.name)" size="6"/></td>
		  <td><input name="<?php echo "SistemaP".$i; ?>" type="text" class="texto" id="<?php echo "SistemaP".$i; ?>" value="<?php echo $itemD["n_codP"];?>"  size="6" readonly="readonly" /></td>
          <td><input name="<?php echo "AprtObl".$i; ?>" type="text" class="texto" id="<?php echo "AprtObl".$i; ?>" onkeyup="calcular()" value="<?php echo  $itemD["n_aporteObl"];?>" size="8" readonly="readonly"/></td>
          <td><input name="<?php echo "ComiRA".$i; ?>" type="text" class="texto" id="<?php echo "ComiRA".$i; ?>" onkeyup="calcular()" value="<?php echo $itemD["n_comisionVar"];?>"  size="8" readonly="readonly"/></td>
          <td><input name="<?php echo "PrmSeg".$i; ?>" type="text" class="texto" id="<?php echo "PrmSeg".$i; ?>" onkeyup="calcular()" value="<?php  echo $itemD["n_primaSeg"];?>" size="10" readonly="readonly"/></td>
          <td>     <input name="<?php echo "DescToPen".$i; ?>" type="text" class="texto" id="<?php echo "DescToPen".$i; ?>" onkeyup="calcular()" value="0" size="8"/></td>
          <td height="48"><input name="<?php echo "desc_falt".$i; ?>" type="text"  class="texto" id="<?php echo "desc_falt".$i; ?>" value="0" onkeyup="calcular()" size="8"/></td>
          <td><input name="<?php echo "desc_adel".$i; ?>" type="text" id="<?php echo "desc_adel".$i; ?>" value="<?php $t=$itemD["total2"]; if($t==NULL){echo '0';}else{echo $itemD['total2'];} ?>"   class="texto" onkeyup="calcular()" size="8"/><a href="#" onclick="abreVentana2('<?php echo $itemD["userid"];?>','<?php echo $_GET['me'];?>','<?php echo $_GET['an'];?>')"><img src="../images/buscar.png" title="Ver Detalle" width="14" height="16" border="0" /></a></td>
          <td><input name="<?php echo "desc_quinta".$i; ?>" type="text" id="<?php echo "desc_quinta".$i; ?>" value="0"   class="texto" onkeyup="calcular()" size="8"/></td>
          <td><input name="<?php echo "d_pagos".$i; ?>" type="text" class="texto" id="<?php echo "d_pagos".$i; ?>" value="0" onkeyup="calcular()"  size="8"/></td>
          <td><input name="<?php echo "total_pag".$i; ?>" type="text"  class="texto" id="<?php echo "total_pag".$i; ?>" value="0" onkeyup="calcular()"/ size="8"></td>
             <td width="48" height="48"><label for="textfield22"></label>
      <input name="<?php echo "AE_Salud".$i; ?>" type="text"  class="texto" id="<?php echo "AE_Salud".$i; ?>" value="0" size="8"/></td>
    <td width="17">

      <input type="hidden" name="<?php echo "FechaIngEm".$i; ?>" id="<?php echo "FechaIngEm".$i; ?>"  value="<?php echo $itemD["FechaIngEm"]; ?>"/>
      <input name="<?php echo "AE_Sctr".$i; ?>" type="hidden" class="texto" id="<?php echo "AE_Sctr".$i; ?>" value="0" size="8" /></td>
    <td width="17"><label for="textfield24"></label>
      <input name="<?php echo "AE_TotalA".$i; ?>" type="hidden" class="texto" id="<?php echo "AE_TotalA".$i; ?>" value="0" size="8" /></td>
      <td width="65"><input type="button" name="button3" id="button3" value="delete" onclick="eliminarUsuario(this)" /></td>
          </tr>
          
      <?php 	
								$i++;
								}			
							}
						?>
  </table>
  <input type="submit" name="button" id="button" value="Guardar" />
    <input type="button" name="button2" id="button2" value="Cerrar Planilla" onclick="CerrarPlanilla()" />
</form>


</body>
</html>