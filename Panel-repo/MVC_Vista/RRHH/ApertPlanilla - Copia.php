<?php

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
var INPUT_NAME_DSC9 = 'desc_prest'; // this is being set via script d       
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
		var dsc9=document.getElementById("desc_prest").value	
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
		var uss=validarUserid();
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


	
	
	
		
		
		
//	Limpiar();
	//alert('Proceso aun en desarrollo Pronto Estará Habilitado');
	}
	
	function validarUserid()
	{
		

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
function calcular(){
	
	var Sueldob=document.getElementById("basico").value;
	var diaF=document.getElementById("d_falt").value;
	var asif=document.getElementById("asig_fam").value;
	var otroi=document.getElementById("Otros_Ing").value;
	var AprtObl=document.getElementById("AprtObl").value;
	var ComiRA=document.getElementById("ComiRA").value;
	var PrmSeg=document.getElementById("PrmSeg").value;
	var desc_falt=document.getElementById("desc_falt").value;
	var desc_prest=document.getElementById("desc_prest").value;
	var desc_adel=document.getElementById("desc_adel").value;
	var desc_quinta=document.getElementById("desc_quinta").value;      
	var DescToPen=document.getElementById("DescToPen").value;
	



	var trb=(parseFloat(Sueldob)+parseFloat(asif)+parseFloat(otroi));
	var dfa=(parseFloat(Sueldob)/30)*parseFloat(diaF);
	var totald=(parseFloat(DescToPen)+parseFloat(desc_falt)+parseFloat(desc_prest)+parseFloat(desc_adel)+parseFloat(desc_quinta));
	var totalPago=(trb-totald);
	
	
	document.formElem.desc_falt.value=dfa;
	document.formElem.TotalRemuB.value=trb;  
	document.formElem.d_pagos.value=totald;
	document.formElem.total_pag.value=totalPago;

	
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
	  
	  TotalRemuB
</script>

<!--<script type="text/javascript">
function Limpiar(){
/*	document.formElem.basico.value=' ';
	document.formElem.asig_fam.value=' ';
	document.formElem.d_trab.value=' ';
	document.formElem.d_falt.value=' ';		
	document.formElem.desc_falt.value=' ';
	document.formElem.d_pagos.value=' ';
	document.formElem.total_pag.value=' ';*/
	document.formElem.userid.value=' ';
	document.formElem.desc_adel.value='0';
	document.formElem.desc_afp.value='0';
	document.formElem.desc_quinta.value='0';
	document.formElem.desc_onp.value='0';
	document.formElem.desc_prest.value='0';		
					
}
</script>
-->

<title>Documento sin título</title>

</head>

<body>
<div id="dresa"></div>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/rrhhC.php?acc=IngresaPlani">
<table width="1086" height="471" border="0" bgcolor="#EEEEEE">
  
  <tr>
    <td height="73" colspan="18"><div align="center">PLANILLA - <label>PERIODO  </label><label><?php echo $_GET['nm'].'-'.$_GET['an'];?></label><label>EMPRESA: <?PHP echo $_GET['emp']?></label></div>
      <input type="hidden" name="mess" value="<?php echo $mes;?>" id="mess" />
      <input type="hidden" name="anio" value="<?php echo $anno;?>" id="anio" />
            <input type="hidden" name="em" value="<?PHP echo $_GET['em']?>" id="em" />
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
      <label for="textfield6"></label>
      <input type="text" name="usd" id="usd" /></td>
  </tr>
  <tr>
    <td width="203">Seleccione Empleado:
      <td width="144" height="30">sueldo Basico</td>
    <td width="148"><label for="select">Asignacion Familiar</label></td>
    <td width="181">Otros Ingresos</td>
    <td width="162">Total Rem.Bruta</td>
    <td width="42">&nbsp;</td>
    <td width="28">&nbsp;</td>
    <td width="2"><label for="pens"></label></td>
    <td colspan="2" rowspan="4"><img src="" width="70" height="81"  name="imag" id="imag"/></td></td>
    <td width="38">&nbsp;</td>
    
  </tr>
  <tr>
    <td><input type="text" name="useri" id="useri" class="texto" />
      <?php /*?><?php $ven = listaruserinfoC(); ?>
      <select name="useri" id="useri" class="Combos texto"  onchange="linki()" >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["USERID"]  ?>" |"<?php echo $items["Nomc"]?>"><?php echo $item["NomC"].' '. $item["ApePat"];?></option>
                
        <?php }	?>
      </select><?php */?>  
      <img src="../images/buscar.png" alt="" width="16" height="16" onclick="abreVentana()" />
    <td height="30"><input name="basico" type="text" id="basico" value="0" readonly="readonly" class="texto"  size="10"/></td>
    <td><input name="asig_fam" type="text" id="asig_fam" value="<?php if($asigf==1){echo $as=75;}else{echo $as=0;} ?>" readonly="readonly"  class="texto" /></td>
    <td><input name="Otros_Ing" type="text"  class="texto" id="Otros_Ing" value="0"/></td>
    <td><input name="TotalRemuB" type="text"  class="texto" id="TotalRemuB" value="0" onkeypress="calcularimporte();"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Empleado</td>
    <td>Fecha de registro</td>
    <td>Dias Trabajados</td>
    <td>Horas TRabaja</td>
    <td>Dias Faltados</td>
    <td><label for="pens"></label></td>
    <td>&nbsp;</td>
    <td><label for="textfield4"></label></td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td height="28"><input name="userid" type="text" id="userid" value=""  class="texto"/></td>
    <td><input type="text" name="fec_reg" id="fec_reg" class="texto" value="<?php  echo date("Y-m-d");?>"/></td>
    <td><input name="d_trab" type="text"  class="texto" id="d_trab" onkeyup="calcular()" value="0"/></td>
    <td><label for="textfield"></label>
      <input name="horast" type="text" id="horast" value="0" onkeyup="calcular()" class="texto"/></td>
    <td><input name="d_falt" type="text" class="texto" id="d_falt" onkeyup="calcular()" value="0" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="11">DESCUENTOS:      </td>
  </tr>
  <tr>
    <td height="28">Sistema de Pensiones</td>
    <td>Aporte Oligatorio</td>
    <td>Comisión % Sobre R.A.</td>
    <td>Prima de Seguro</td>
    <td>Descuento Pensión</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28"><?php $ven = listarPensionesC(); ?>
      <?php /*?><select name="SistemaP" id="SistemaP" class="Combos texto" onchange="calcular()"   >
        <option value="0"  size="10">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["n_codP"]  ?>" ><?php echo $item["c_nombre"].'-'.$item["n_totald"];?></option>
        <?php }	?>
      </select><?php */?>
      <label for="textfield7"></label>
      <input type="text" name="pens" id="pens" class="texto" />
      <label for="textfield8"></label>
      <input type="hidden" name="SistemaP" id="SistemaP" /></td>
    <td><input name="AprtObl" type="text" class="texto" id="AprtObl" value="0" onkeyup="calcular()" /></td>
    <td><input name="ComiRA" type="text" class="texto" id="ComiRA" value="0" onkeyup="calcular()" /></td>
    <td><input name="PrmSeg" type="text" class="texto" id="PrmSeg" value="0" onkeyup="calcular()" /></td>
    <td><label for="textfield3"></label>
      <input name="DescToPen" type="text" class="texto" id="DescToPen" onkeyup="calcular()" value="0"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">Descuento Faltas</td>
    <td><label for="pens">Descuento Prestamo</label></td>
    <td>Descuento Adelanto</td>
    <td>Descuento Quinta Categoria</td>
    <td>Descuento Total</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label for="textfield20"></label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28"><input name="desc_falt" type="text"  class="texto" id="desc_falt" value="0" onkeyup="calcular()"/></td>
    <td><input name="desc_prest" type="text" id="desc_prest" value="0"  class="texto" onkeyup="calcular()"/></td>
    <td><input name="desc_adel" type="text" id="desc_adel" value="0"   class="texto" onkeyup="calcular()"/></td>
    <td><input name="desc_quinta" type="text" id="desc_quinta" value="0"   class="texto" onkeyup="calcular()"/></td>
    <td><input name="d_pagos" type="text" class="texto" id="d_pagos" value="0" onkeyup="calcular()" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="11">APORTES DEL EMPLEADOR</td>
    </tr>

  <tr>
    <td height="28">Salud</td>
    <td>Sctr</td>
    <td>Total Aportes</td>
    <td>Remuneracion Neta =</td>
    <td><label for="codigopen"></label>
      <input name="total_pag" type="text"  class="texto" id="total_pag" value="0" onkeyup="calcular()"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28"><label for="textfield22"></label>
      <input name="AE_Salud" type="text"  class="texto" id="AE_Salud" value="0" size="10"/></td>
    <td><label for="textfield23"></label>
      <input name="AE_Sctr" type="text" class="texto" id="AE_Sctr" value="0" size="10" /></td>
    <td><label for="textfield24"></label>
      <input name="AE_TotalA" type="text" class="texto" id="AE_TotalA" value="0" size="10" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28"><img src="../images/agregar.png" alt="" width="23" height="22" border="0" onclick="accion();" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  
  
</table>
 <table width="1090" height="108" border="1" cellspacing="0" id="tblSample">
          <thead>
            <tr>
              <th width="8"  bgcolor="#66CCCC">#</th>
              <th width="52" bgcolor="#66CCCC">Usuario</th>
              <th width="36" bgcolor="#66CCCC">Dias Trab.</th>
              <th width="38" bgcolor="#66CCCC">Dias Falt.</th>
              <th width="49" bgcolor="#66CCCC">Sueldo Basico</th>
              <th width="55" bgcolor="#66CCCC">Asig. Familiar</th>
              <th width="42" bgcolor="#66CCCC">Otros Ingr.</th>
              <th width="42" bgcolor="#66CCCC">Total de Rem. Bruta</th>
              <th width="58" bgcolor="#66CCCC">Sistema de Pensi.</th>
              <th width="75" bgcolor="#66CCCC">Aporte Obligatorio</th>
              <th width="66" bgcolor="#66CCCC">Comisión Sobre R.A.</th>
              <th width="47" bgcolor="#66CCCC">Prima de Seguro</th>
              <th width="47" bgcolor="#66CCCC">Desc Pensión</th>
              <th width="42" bgcolor="#66CCCC">Desc. Faltas</th>
              <th width="63" bgcolor="#66CCCC">Desc. Prestamo</th>
              <th width="60" bgcolor="#66CCCC">Desc. Adelanto</th>
              <th width="66" bgcolor="#66CCCC">Desc. Quinta Categoria</th>
              <th width="42" bgcolor="#66CCCC">Desc. Total</th>
              <th width="48" bgcolor="#66CCCC">Remu. Neta</th>
              <th width="37" bgcolor="#66CCCC">Salud</th>
              <th width="27" bgcolor="#66CCCC">Sctr</th>
              <th width="53" bgcolor="#66CCCC">Total de Aportes</th>

            </tr>
    </thead>
          <tbody>
          </tbody>
  </table>
  <input type="submit" name="button" id="button" value="Ingresar" />
</form>


</body>
</html>