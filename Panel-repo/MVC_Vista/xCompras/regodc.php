<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
		$udni=$item['login'];
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registro de Orden de Compra</title>
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
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script type="text/javascript">
<!--Buscar proveedor-->
$().ready(function() {
	$("#c_nomprov").autocomplete("../MVC_Controlador/ComprasC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomprov").result(function(event, data, formatted) {
	
		 $("#c_nomprov").val(data[2]);
		$("#c_codprov").val(data[1]);
		
		$("#hc").val(data[1]);		
		$("#xc_rh").val(data[6]);
		//$("#porigv").val(data[6]);

		if(document.getElementById('xc_rh').value=='1'){
			
			document.getElementById('c_rh').checked=true;
			document.getElementById('porigv').value=0;
			document.getElementById('c_rh').disabled=true;

			}else{
				document.getElementById('c_rh').checked=false;
				document.getElementById('porigv').value=18;
				document.getElementById('c_rh').disabled=true;
				
				}
	});
});


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



<!--Buscar lugar de entrega-->
$().ready(function() {
	$("#c_nomlug").autocomplete("../MVC_Controlador/ComprasC.php?acc=lugarauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomlug").result(function(event, data, formatted) {
		$("#c_nomlug").val(data[3]);
		
		$("#hc2").val(data[1]);
		
	});
});

<!--Buscar lugar de atencion-->
$().ready(function() {
	$("#c_nomate").autocomplete("../MVC_Controlador/ComprasC.php?acc=lugarauto2", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomate").result(function(event, data, formatted) {
		$("#c_nomate").val(data[3]);
		
		
		
	});
});




</script>


<script type="text/javascript">	
//$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=at1&seguro="+seguro, {
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
		$("#tipo").val(data[5]);
		
	});
	
});
			
</script>







<script type="text/javascript">

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


function ValidaEntero(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


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



//VALIDAR QUE SE REGISTRE UN PROVEEDOR 
function validarclie(){
	
	var codigo=document.getElementById("hc").value;
			if (codigo=="") {
	jAlert('debe introducir un proveedor', 'Mensaje del Sistema')
	//return 0;
	document.getElementById("descripcion").value="";
	document.getElementById("codigo").value="";	
	document.getElementById("medida").value="";
	document.getElementById("precio").value="";
	document.getElementById("dscto").value="0";
	document.getElementById("cantidad").value="1";
			}
	}
	
	//VALIDAR QUE SSELECCIONE TIPOOC, MOENDA Y CONCEPTO 
	function validarcombos(){
	
	var tipooc=document.getElementById("c_tipooc").value;
	var concepto=document.getElementById("c_nomcon").value;
	var moneda=document.getElementById("moneda").value;
	
	
	
		if (tipooc=="" || concepto=="" || moneda=="" ) {
		jAlert('debe seleccionar un tipo de orden de OC, moneda y concepto', 'Mensaje del Sistema')
		//return 0;
		document.getElementById("hc").value="";
		document.getElementById("c_nomprov").value="";	
		}		
				
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








</script>


<script type="text/javascript">


var INPUT_NAME_PREFIX = 'codigo'; // this is being set via script a
var INPUT_NAME_DES = 'descripcion'; // this is being set via script b
var INPUT_NAME_UM = 'um'; // this is being set via script b
var INPUT_NAME_SER = 'serie'; // this is being set via script g
var INPUT_NAME_GLO = 'glosa'; // this is being set via script g

var INPUT_NAME_CAN = 'cantidad'; // this is being set via script e
var INPUT_NAME_PRE = 'precio';
var INPUT_NAME_DESC = 'dscto';
var INPUT_NAME_IMP = 'imp'; // this is being set via script f
var INPUT_NAME_IMPF = 'impf';
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
function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho,nueve,diez,once)
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
	var um=document.getElementById("medida").value
	var serie=document.getElementById("serie").value
	var desc=document.getElementById("dscto").value	
	
	var pre=document.getElementById("precio").value
	var can=document.getElementById("cantidad").value
	var imp=document.getElementById("imp").value
	var glo=document.getElementById("glosa").value	
	
	var impf=document.getElementById("impf").value
	/*var	valor=parseFloat(pre)-parseFloat(dsc);	
	var valor2=parseFloat(valor)*parseFloat(can);	
*/

//document.getElementById("imp"+i).value=valor.toFixed(2);
	var	valor=parseFloat(pre)*parseFloat(can);	
	var	nudes=(parseFloat(valor)*parseFloat(desc))/100;	
	var	valorf=parseFloat(valor)-nudes;	
	
	
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
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '35');
		txtInpb.setAttribute('value', des); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpb.setAttribute('class', 'texto'); 
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_UM + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_UM + iteration);
		txtInpc.setAttribute('size', '7');
		txtInpc.setAttribute('value', um); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		txtInpc.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpc.setAttribute('class', 'texto'); 
		cell3.appendChild(txtInpc);
		
		var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_SER + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_SER + iteration);
		txtInpd.setAttribute('size', '10');
		txtInpd.setAttribute('value', serie); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		txtInpd.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'texto'); 
		cell4.appendChild(txtInpd);
						
		
		
		
		var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_GLO + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_GLO + iteration);
		txtInpe.setAttribute('size', '20');
		txtInpe.setAttribute('value', glo); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		//txtInpg.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpe.setAttribute('class', 'texto'); 
		cell5.appendChild(txtInpe);
		
		
		
		var cell6 = row.insertCell(6);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_CAN  + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_CAN  + iteration);
		txtInpf.setAttribute('size', '5');
		txtInpf.setAttribute('value', can); // iteration included for debug purposes
		txtInpf.setAttribute('class', 'texto');
		txtInpf.setAttribute('onkeyup','actualizar_importe(this.name)');	 
		cell6.appendChild(txtInpf);
		
						
		var cell7 = row.insertCell(7);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'text');
		txtInpg.setAttribute('name', INPUT_NAME_PRE  + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_PRE  + iteration);
		txtInpg.setAttribute('size', '5');
		txtInpg.setAttribute('value', pre); 
		
		txtInpg.setAttribute('class', 'texto');	
		txtInpg.setAttribute('onkeyup','actualizar_importe(this.name)');	 
		//txtInpg.setAttribute('readonly', 'readonly');			
		cell7.appendChild(txtInpg);
		
		
		
		var cell8 = row.insertCell(8);
		var txtInph = document.createElement('input');
		txtInph.setAttribute('type', 'text');
		txtInph.setAttribute('name', INPUT_NAME_IMP  + iteration);
		txtInph.setAttribute('id', INPUT_NAME_IMP  + iteration);
		txtInph.setAttribute('size', '5');
		txtInph.setAttribute('value', valor); // devuelve el importe calculado 		
		txtInph.setAttribute('class', 'texto'); 
		txtInph.setAttribute('readonly', 'readonly');		
		cell8.appendChild(txtInph);
		
		
		var cell9 = row.insertCell(9);
		var txtInpi = document.createElement('input');
		txtInpi.setAttribute('type', 'text');
		txtInpi.setAttribute('name', INPUT_NAME_DESC + iteration);
		txtInpi.setAttribute('id', INPUT_NAME_DESC + iteration);
		txtInpi.setAttribute('size', '5');
		txtInpi.setAttribute('value', desc); // iteration included for debug purposes
		txtInpi.setAttribute('class', 'texto'); 
		txtInpi.setAttribute('onkeyup','actualizar_importe(this.name)');	 
		//txtInpi.setAttribute('readonly', 'readonly');
		cell9.appendChild(txtInpi);
		
		var cell10 = row.insertCell(10);
		var txtInpj = document.createElement('input');
		txtInpj.setAttribute('type', 'text');
		txtInpj.setAttribute('name', INPUT_NAME_IMPF  + iteration);
		txtInpj.setAttribute('id', INPUT_NAME_IMPF  + iteration);
		txtInpj.setAttribute('size', '5');
		txtInpj.setAttribute('value', valorf); // devuelve el importe final calculado 
		
		txtInpj.setAttribute('class', 'texto'); 
		txtInpj.setAttribute('readonly', 'readonly');		
		cell10.appendChild(txtInpj);
		
		
		// cell 2 - input button
		var cell11 = row.insertCell(11);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell11.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpf,txtInpg,txtInph,txtInpi,txtInpj);
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
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_UM + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_SER + count;				
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_GLO + count;
				
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_CAN + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_PRE + count;				
				tbl.tBodies[0].rows[i].myRow.nueve.name =  INPUT_NAME_DESC + count;
				tbl.tBodies[0].rows[i].myRow.diez.name = INPUT_NAME_IMP + count;
				tbl.tBodies[0].rows[i].myRow.once.name = INPUT_NAME_IMPF + count;
				
				
			
				
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


function Cambiamoneda(){
document.getElementById('idmoneda').value=document.form1.moneda.options[document.form1.moneda.selectedIndex].value;
	//alert('hola');

	}
	
	function Cambiatipooc(){
document.getElementById('idtipooc').value=document.form1.c_tipooc.options[document.form1.c_tipooc.selectedIndex].value;
	//alert('hola');

	}
	
	function conceptooc(){
document.getElementById('idconcepto').value=document.form1.c_nomcon.options[document.form1.c_nomcon.selectedIndex].value;
	//alert('hola');

	}

function Cambialugarate(){
document.getElementById('idatencion').value=document.form1.lat.options[document.form1.lat.selectedIndex].text;
	//alert('hola');

	}
	
function rh(){
	if(document.form1.c_rh.checked==true){
	document.getElementById('xc_rh').value=document.form1.c_rh.value;
	}else{
		document.getElementById('xc_rh').value='0';
		}
	}
	
	function rhtrans(){
	if(document.form1.c_rhtrans.checked==false){
	document.getElementById('xc_rhtrans').value=document.form1.c_rhtrans.value='1';
	document.getElementById('c_nomtran').disabled=false;
	}else{
		document.getElementById('xc_rhtrans').value='0';
		document.getElementById('c_nomtran').value='';
		document.getElementById('hc1').value='';
		
		document.getElementById('c_nomtran').disabled=true;
		
		
		}
		
		
		
	}
	
	
	
function formapago(){
	document.getElementById('idc_codpag').value=document.form1.c_codpag.options[document.form1.c_codpag.selectedIndex].value;
	
	}

function accion(){	

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
		
		
		
	//desabilitar COMBOS
	document.getElementById("moneda").disabled = true;
	document.getElementById("c_nomcon").disabled = true;
	document.getElementById("c_tipooc").disabled = true;
	
	addRowToTable();
	sumarcolumnatabla();
	limpiadatosdetalle();//limpia los datos despues de agregar la fila
	
	
	
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
var v1=dscto2/100;
var des=parseFloat(tot)*(1+v1); ///total*1.dscto
var de=parseFloat(des)-parseFloat(tot); //monto de descuento
var subdes=de+parseFloat(dscto3);

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

	document.getElementById("st").value=(Math.floor(subt*100))/100; //importe
	document.getElementById("dsctof").value=(Math.floor(subdes*100))/100; //descuento  final
	document.getElementById("sub").value=(Math.floor(subt2*100))/100;  //subtotal
	document.getElementById("igv").value=(Math.floor(subigv*100))/100;
	document.getElementById("bi").value=(Math.floor(total*100))/100; //total
	

}




function calculartotales(){
var hc=document.getElementById('xc_rh').value;
sumar=0;
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
descu+=parseFloat(document.getElementById("dscto"+i).value); //30 el descuento no se acumula
var v2=descu/100;
var des1=parseFloat(sumar)*(1+v2);
var de=parseFloat(des1)-parseFloat(sumar);
//numero.toFixed(2);
var subt=sumar-de;
if(hc==0){
 ig1=subt*1.18;
}else{
	 ig1=subt*1;
}
var igv=ig1-subt;
var total=subt+igv;
}
}
limpiatotales();
document.getElementById("st").value=(Math.floor(sumar*100))/100; 
document.getElementById("dsctof").value=(Math.floor(de*100))/100;
document.getElementById("sub").value=(Math.floor(subt*100))/100;  
document.getElementById("igv").value=(Math.floor(igv*100))/100;
document.getElementById("bi").value=(Math.floor(total*100))/100; 
}	

function limpiatotales(){
	
document.getElementById("st").value='';
document.getElementById("dsctof").value='';
document.getElementById("sub").value='';
document.getElementById("igv").value='';
document.getElementById("bi").value='';
	
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

//document.getElementById("xdscto"+p).value=ndesc;	//obtener en un campo oculto xdscto el acumulativo de descuento en cantidad
		
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

function concatena() {
	var origen=document.form1.origen.options[document.form1.origen.selectedIndex].text;
	var destino=document.form1.destino.options[document.form1.destino.selectedIndex].text;
	var escala=document.form1.escala.options[document.form1.escala.selectedIndex].text;
	var kg=document.getElementById("kg").value;
	//var vkg='';
	//var vkg='';
	//var 
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
function guardar(){
//var longitud=document.getElementById("c_refcoti").value.length;
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

jConfirm("¿Seguro de Grabar Orden de Compra?", "Mensaje Confirmacion", function(r) {
			if(r) {
				//document.form1.submit();
				document.getElementById("form1").submit();
			} else {
				return 0;
			}
		});


	}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

</script>

<style>
#tablaDiagnostico td, th { padding: 0.2em; }
#tablaDiagnostico tr:nth-child(even) {background: #6CC }
#tablaDiagnostico tr:nth-child(odd) {background: #FFF}
</style>

</head>
<body>

 <strong align="center">ORDEN DE COMPRA  =&gt;<?php echo $_GET['udni'];  ?></strong>
 <form id="form1" name="form1" method="post" action="../MVC_Controlador/ComprasC.php?acc=grabaroc&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
    <fieldset class="fieldset legend">
    <legend style="color:#00F"><strong>Encabezado Orden de Compra</strong></legend>
   
   <table width="1044" height="80" border="0" cellpadding="0" cellspacing="0" >
  
		<tr>
		  <td width="89" height="30">Nro de Dcto:</td>
		  <td width="249">
			<input name="textfield" type="text" disabled="disabled" class="texto" id="textfield" value="001" size="5" maxlength="3" readonly="readonly" />
			<input name="c_numos" type="text" disabled="disabled"  class="texto" id="c_numos" value="Autogenerado" readonly="readonly"/>
            			
		  </td>
			
		  <td width="110">Tipo de OC:</td>
		  <td width="182">
			
			<?php $ven = ListaTipoOC();
			$c_tipooc='001';	
			//$c_desitm='NORMAL';
			
			?>
			<select name="c_tipooc" id="c_tipooc" class="Combos texto" onchange="Cambiatipooc()" >
				   <option value="">.::SELECCIONE::.</option>
			<?php foreach($ven as $item){?>
			  <option value="<?php echo $item["c_numitm"]?>" <?php if($item["c_numitm"]==$c_tipooc){?>selected<?php }?> ><?php echo utf8_encode($item["c_desitm"]) ?></option>
		  <?php }	?>
			</select>
            <input name="idtipooc" type="hidden" id="idtipooc" value="001"   />
            
		  </td>
		 
		  <td width="157">Concepto:</td>
		  <td><label for="select"></label>
		<?php $ven = ListaConceptoC();?>
			<select name="c_nomcon" id="c_nomcon" class="Combos texto" onchange="conceptooc()" >
					   <option value="">.::SELECCIONE::.</option>
			  <?php foreach($ven as $item){?>
			  <option value="<?php echo $item["c_numitm"]?>" selected="selected"><?php echo utf8_encode($item["c_desitm"])?></option>
			  <?php }	?>
			</select>
            
             <input type="hidden" name="idconcepto" id="idconcepto" value="001"   />
            
		 </td>  
		</tr>
        
		<tr>
		  <td height="24">Moneda:</td>
		  <td>
			  <?php $ven = ListaMonedaC();  
			  ?>
				
			  <select name="moneda" id="moneda" class="Combos texto" onchange="Cambiamoneda()" >
			    <option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){
				 $nombremoneda=$item["c_desitm"];
			     $idmoneda=$item["c_numitm"];	
				?>
			   
				<option value="<?php echo $idmoneda?>"><?php echo $nombremoneda?></option>
				<?php }	?>
			  </select>
			 	  
              <input type="hidden" name="idmoneda" id="idmoneda"   />
              
		  </td>
		  
		  <td>Fecha:</td>
		  <td>
			<label for="fecha"></label>
			<input name="fecha"  type="text" class="texto"  id="fecha" size="12" maxlength="12" value="<?php echo date('d/m/Y');?>" /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
			<script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fecha",
						ifFormat   : "%d/%m/%Y",
						button     : "Image1"
						  }
						);
			 </script>
			
			  <input type="hidden" name="xsum" id="xsum" />
			  <input name="hora" type="hidden" id="hora" size="8" />
			  <input name="xsumar" type="hidden" id="xsumar" size="10" />
			
		  </td> 
          <td>T/Cambio:</td>
 <td width="196">
              <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			?>
            <input name="nomtipo" class="texto" type="text" id="nomtipo" value="<?php echo $tipocambio ?>" size="14" readonly="readonly" />   
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
			
		  
            
          <td height="26">Proveedor:</td>    
		  <td>
		  <input name="c_nomprov" type="text"  class="texto" id="c_nomprov" size="40"  placeholder="Digite para Busqueda Proveedor " required/ onclick="validarcombos();" onkeypress="validarcombos()">
        
          
		<!--<input type="text" name="c_codprov" id="c_codprov" />-->
		  </td>      
		  <td>Ruc Proveedor:</td>    
		  <td><input type="text" name="hc" id="hc"  class="texto" readonly="readonly"/> <br />
           
          
          
          </td>
		<td>Decl. de Imp.:  
        	<input name="c_rh" type="checkbox" id="c_rh" value="1" onclick="rh()"  />
     
          <input type="hidden" size="5" name="xc_rh" id="xc_rh" />
          <input type="hidden" size="5" name="porigv" id="porigv" />
          
        
        </td>		
		  <td>          
                 
			
            
             Usuario:
        <input name="c_oper" type="text" id="c_oper" value="<?php echo $udni; ?>" readonly="readonly" class="texto" size="10"/></td>    
			
	   <td width="1"></td>
        
      </tr>    
		
			  
	</table>
	
	</fieldset>		

       
  
<!-------------------------------------------------------------------------------------------------------------- -->


  
  <fieldset class="fieldset legend">
  <legend style="color:#C33"><strong>Detalle Orden de Compra</strong></legend>
  <table width="1043"  border="0" cellpadding="1" cellspacing="1">
	 <tr>
      <td width="114">Descripcion: </td>
	  <td width="265">        
          <input name="descripcion" type="text" id="descripcion" size="25" class="texto"   onclick="validarclie();" onkeypress="validarclie();" placeholder="Digite el Producto" />
        <a href="#">  <img src="../images/search.png" width="15" height="15"  border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>
      </td>
	  <td width="333" >Codigo :
	 
          <input name="codigo" type="text"  id="codigo" size="10" readonly="readonly" class="texto" />
         
          <input name="medida" type="text" id="medida" size="4" class="texto" readonly="readonly"/>
          <input name="tipo" type="text" id="tipo" size="2" class="texto" />
          
		 
		</td>
		<td width="100" align="center">
		Cant.:
	  
          <label for="cantidad"></label>
        <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="3"  />
                 
     
	  
	  </td>
	  
	  
	  <td width="100" align="center">Precio U.:
	
        
        <input name="precio" type="text" id="precio" size="4"  class="texto"  onkeypress="return ValidarPrecio(event)" onclick="return ValidarPrecio(event)" />       
	  </td>
	  
	  <td width="112">	%Dscto:   
        <input name="dscto" type="text"  class="texto" id="dscto" value="0"   size="3" onkeypress="return ValidarDes(event)" onclick="return ValidarDes(event)" />
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
       <td colspan="2" ><input type="button" value="Ver ultimas OC"  style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;" onClick="ultimasoc();"/>
         <input name="imp" type="hidden" id="imp" value="0" size="5" />      &nbsp; 
         <input name="impf" type="hidden" id="impf" value="0" size="5"/>       </td>
      </tr>
   
	 
    </table>
  <table width="1040" border="0" cellspacing="0" cellpadding="0" id="tablaDiagnostico">
    <tr>
      <td width="37" align="center" bgcolor="#CCCCCC"><strong>Item</strong></td>
      <td  height="40" width="99" align="center" bgcolor="#CCCCCC"><strong>Codigo</strong></td>
      <td width="190" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
      <td width="62" align="center" bgcolor="#CCCCCC"><strong>U.M</strong></td>
      <td width="150" align="center" bgcolor="#CCCCCC"><strong>Serie de Equipo</strong></td>
      <td width="150" align="center" bgcolor="#CCCCCC"><strong>Glosa</strong></td>
      <td width="62" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
      <td width="89" align="center" bgcolor="#CCCCCC"><strong>Precio</strong></td>
      <td width="102" align="center" bgcolor="#CCCCCC"><strong>Costo</strong></td>
      <td width="89" align="center" bgcolor="#CCCCCC"><strong>%Dscto:</strong></td>     
      <td width="102" align="center" bgcolor="#CCCCCC"><strong>Importe</strong></td> 
      <td width="200" bgcolor="#CCCCCC"><strong>Eliminar</strong></td>
    </tr>
         
    
    </table>
    
    
    
    
    
  </fieldset>
  
  
   <fieldset class="fieldset legend">
    <legend style="color:#C33"><strong>Adicionales Orden de Compra</strong></legend>
  <table width="1039" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Condicion de Pago</td>
      <td><?php $ven = ListaPlazoocM();?>
        <select name="c_codpag" id="c_codpag"  class="Combos texto" onchange="formapago()" >
         <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numitm"]?>" > <?php echo utf8_encode($item["c_desitm"])?></option>
          <?php }	?>
        </select>
        <input type="hidden" name="idc_codpag" id="idc_codpag" /></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Lugar de atencion:</td>
      
       <td><?php $ven = BusquedaautolugaratencionM();?>
        <select name="lat" id="lat"  class="Combos texto" onchange="Cambialugarate();"  >
         <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){
			  
			  
		 ?>
          <option value="<?php echo $item["C_NUMITM"]?>"><?php echo utf8_encode($item["C_DESITM"])?></option>
          <?php 
		  
		  }	?>
        </select>
        <input type="hidden" size="5" name="idatencion" id="idatencion" />
</td>      
        <!--<input name="c_nomate" type="text"  class="texto" id="c_nomate" size="35"  placeholder="Digite el lugar" required/>-->
        



        
      <td width="165" align="right">
		  <strong style="color:#F00">
			Importe
		  </strong>
	  </td>
      <td width="9">:</td>
      <td width="282">
        <input name="st" type="text" class="texto" id="st" value="0" size="10" readonly="readonly"/>
	  </td>
    </tr>
	
    <tr>
      <td width="149">Transportista:</td>
     
      <td width="383">        
        <input  name="c_nomtran" type="text"  class="texto" id="c_nomtran" size="28"  placeholder="Digite el Transportista" required/>
        <input type="text" size="20" name="hc1" id="hc1" placeholder="RUC"  readonly="readonly" class="texto"/>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        <input name="c_rhtrans" type="checkbox" id="c_rhtrans" value="1" onclick="rhtrans()"  /> Sin transportista
    <input name="xc_rhtrans" type="hidden" id="xc_rhtrans"    />
      </td> 
		
	  <td align="right"><strong style="color:#F00">Descuento</strong></td>      
      <td>:</td>
      <td>
		<input name="dsctof" type="text" class="texto" id="dsctof" value="0" size="10" readonly="readonly"/>	
        
	  </td>
    </tr>
	
    <tr>
      <td>Fecha de entrega:</td>
     
      <td><input name="c_fecentrega" type="text" class="texto" id="c_fecentrega" onkeyup = "this.value=formateafecha(this.value); " size="12"  onChange="ValidarFecha()"   /><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'"     >
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "c_fecentrega",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script> lugar de entrega
		 <input name="c_nomlug" type="text"  class="texto" id="c_nomlug" size="20"  placeholder="Digite el lugar" required/>
         <input name="hc2" type="hidden"  class="texto" id="hc2" size="20"  required/>
        </td>


       
      
      <td align="right"><strong style="color:#F00">Subtotal</strong></td>
      <td>:</td>
      <td>
        <input name="sub" type="text" class="texto" id="sub" value="0" size="10" readonly="readonly"/>
	  </td>
    </tr>
     <tr>
      <td> Docum. de Refer.:</td>
     
      <td ><input name="c_refcoti" type="text"  class="texto" id="c_refcoti" maxlength="11" 
onKeyPress="return isNumberKey(event);"
placeholder="Ingrese Cotizacion" required/></td>

      <td align="right"><strong style="color:#F00">Igv (18%)</strong></td>
      <td>:</td>
      <td>
        <input name="igv" type="text" class="texto" id="igv" value="0" size="10" readonly="readonly"/>
	  </td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
     
      <td>&nbsp;</td>
      <td align="right"><strong style="color:#F00">Total</strong></td>
      <td>:</td>
      <td>
        <input name="bi" type="text" class="texto" id="bi" value="0" size="10" readonly="readonly"/></td>
      
      </tr>
    <tr>
      <td align="center"><strong style="color:#06C">Observaciones:</strong></td>
      <td align="center"><textarea name="c_obsoc" id="c_obsoc" cols="40" rows="3"></textarea></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td width="4" align="center">&nbsp;</td>
    </tr>
    
  </table>
  </fieldset>
  
  
  
  
  
  
  <table width="1042" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="24">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td> <div class="buttons">
    <button type="button" class="positive" name="save" onclick="guardar()">
        <img src="../images/icon_accept.png" alt=""/>
        Guardar
    </button>

 <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>

    <button type="reset" class="negative" name="cancel" onClick="location.reload();">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
       </button>
       
       
    </tr>
  </table>
   
   
   
</form>
</body>
</html>