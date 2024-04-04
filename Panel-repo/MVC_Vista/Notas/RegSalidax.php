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
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script type="text/javascript">

<!--Buscar proveedor-->
$().ready(function() {
	$("#c_nomprov").autocomplete("../MVC_Controlador/NotaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomprov").result(function(event, data, formatted) {
	
		 $("#c_nomprov").val(data[2]);
		$("#c_codprov").val(data[1]);
		
		$("#hc").val(data[1]);		
		$("#xc_rh").val(data[6]);
		$("#dir").val(data[7]);
		$("#NT_CCCLI").val(data[1]);
		//$("#porigv").val(data[6]);
		
		
		//DECLARANTE DE IMPORTACION
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



<!--Buscar transportista-->
$().ready(function() {
	$("#c_nomtran").autocomplete("../MVC_Controlador/NotaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomtran").result(function(event, data, formatted) {
	
		 $("#c_nomtran").val(data[2]);	
		 $("#ruc").val(data[1]);		
	
		
	});
});



<!--Buscar documento de Referencia de cotizacion
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

</script>

<script type="text/javascript">

function validar_num(){
    num = document.form1.cantidad.value;
    if(isNaN(num)){
        alert("El dato ingresado debe ser un número");
        document.form1.cantidad.value = "";
    }else{
          document.form1.cantidad.value=num;
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

  

	function ventanaArticulos(){		
		
		var rucx=document.getElementById("hc").value;
		var monedax=document.getElementById("idmoneda").value;
		var docux=document.getElementById("iddocu").value;	
			
		var seriedx=document.getElementById("seried").value;
		var numerodx=document.getElementById("numerod").value;				
		//var seriepx=document.getElementById("seriep").value;
		//var numeropx=document.getElementById("numerop").value;	
		
		var almacen=document.getElementById("c_nomcon").value;	
		
									
			//if (rucx==""||monedax==""||docux==""||seriedx==""||numerodx=="" ) {
				//jAlert('Falta Datos', 'Mensaje del Sistema');
								
			//} else {
				miPopup = window.open("../MVC_Controlador/NotaC.php?acc=verarti&udni=<?php echo $udni;?>&almacen="+almacen,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			//}
		}
		
			function ventanaSeries(){
				
			var codigo=document.getElementById("codigo").value;	
			var descripcion=document.getElementById("descripcion").value;			
			var stock=document.getElementById("stock").value;		
			
			if(codigo!="" ){
				 if(stock==0 || stock=="" || stock<0){
				jAlert ("No hay stock disponible", 'Mensaje del Sistema');
				
				
				}else{
				miPopup = window.open("../MVC_Controlador/NotaC.php?acc=verserie&udni=<?php echo $udni;?>&codigo="+codigo+"&descripcion="+descripcion,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
				}
			}else{
			jAlert ("Debe seleccionar un producto", 'Mensaje del Sistema');
			}
		}

</script>


<script type="text/javascript">


var INPUT_NAME_PREFIX = 'codigo'; 
var INPUT_NAME_DES = 'descripcion'; 
var INPUT_NAME_UM = 'um';
var INPUT_NAME_SER = 'serie'; 
//var INPUT_NAME_GLO = 'glosa'; 

var INPUT_NAME_CAN = 'cantidad'; 
var INPUT_NAME_PRE = 'precio';
//var INPUT_NAME_STOCK = 'stock';
//var INPUT_NAME_DESC = 'dscto';
//var INPUT_NAME_IMP = 'imp'; 
//var INPUT_NAME_IMPF = 'impf';

var TABLE_NAME = 'tablaDiagnostico'; 
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
	var um=document.getElementById("medida").value
	var serie=document.getElementById("idserie").value
	//var desc=document.getElementById("dscto").value		
	var pre=document.getElementById("precio").value
	var can=document.getElementById("cantidad").value
	//var stock=document.getElementById("stock").value
	//var imp=document.getElementById("imp").value
	//var glo=document.getElementById("glosa").value	
	
	//var impf=document.getElementById("impf").value


	//var	valor=parseFloat(pre)*parseFloat(can);	
	//var	nudes=(parseFloat(valor)*parseFloat(desc))/100;	
	//var	valorf=parseFloat(valor)-nudes;	
	
	
	
if (hasLoaded) {
		var tbl = document.getElementById(TABLE_NAME);
		var nextRow = tbl.tBodies[0].rows.length;
		var iteration = nextRow + ROW_BASE;
		if (num == null) { 
			num = nextRow;
		} else {
			iteration = num + ROW_BASE;
		}
		

		var row = tbl.tBodies[0].insertRow(num);
		

		row.className = 'classy' + (iteration % 2);
	

		var cell0 = row.insertCell(0);
		var textNode = document.createTextNode(iteration);
		cell0.appendChild(textNode);
		

		var cell1 = row.insertCell(1);
		var txtInpa = document.createElement('input');
		txtInpa.setAttribute('type', 'text');
		txtInpa.setAttribute('name', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_PREFIX + iteration);
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', codigo); 
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '35');
		txtInpb.setAttribute('value', des); 
		txtInpb.setAttribute('readonly', 'readonly'); 
		txtInpb.setAttribute('class', 'texto'); 
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_UM + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_UM + iteration);
		txtInpc.setAttribute('size', '7');
		txtInpc.setAttribute('value', um); 
		txtInpc.setAttribute('readonly', 'readonly'); 
		txtInpc.setAttribute('class', 'texto'); 
		cell3.appendChild(txtInpc);
		
		/*var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_STOCK + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_STOCK + iteration);
		txtInpd.setAttribute('size', '7');
		txtInpd.setAttribute('value', stock); 
		txtInpd.setAttribute('readonly', 'readonly'); 
		txtInpd.setAttribute('class', 'texto'); 
		cell4.appendChild(txtInpd);*/
		
		var cell5 = row.insertCell(4);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_SER + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_SER + iteration);
		txtInpe.setAttribute('size', '15');
		txtInpe.setAttribute('value', serie); 
		txtInpe.setAttribute('readonly', 'readonly');
		txtInpe.setAttribute('class', 'texto'); 
		cell5.appendChild(txtInpe);	
		
		var cell6 = row.insertCell(5);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_CAN  + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_CAN  + iteration);
		txtInpf.setAttribute('size', '5');
		txtInpf.setAttribute('value', can); 		
		txtInpf.setAttribute('class', 'texto');		 
		cell6.appendChild(txtInpf);
		
						
		var cell7 = row.insertCell(6);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'text');
		txtInpg.setAttribute('name', INPUT_NAME_PRE  + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_PRE  + iteration);
		txtInpg.setAttribute('size', '5');
		txtInpg.setAttribute('value', pre); 
		txtInpg.setAttribute('readonly', 'readonly');		
		txtInpg.setAttribute('class', 'texto');			
		cell7.appendChild(txtInpg);
		
		

		var cell8 = row.insertCell(7);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell8.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpe,txtInpf,txtInpg);
	}
}


function deleteCurrentRow(obj)
{
	if (hasLoaded) {
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;
		var rowArray = new Array(delRow);
		deleteRows(rowArray);
		reorderRows(tbl, rIndex);
			// calculartotales();
	}
}

function reorderRows(tbl, startingIndex)
{
	if (hasLoaded) {
		if (tbl.tBodies[0].rows[startingIndex]) {
			var count = startingIndex + ROW_BASE;
			for (var i=startingIndex; i<tbl.tBodies[0].rows.length; i++) {
			
	
				tbl.tBodies[0].rows[i].myRow.one.data = count;			

				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_PREFIX + count;
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_DES + count;				
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_UM + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_SER + count;				
				//tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_GLO + count;
				
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_CAN + count;
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_PRE + count;				
				//tbl.tBodies[0].rows[i].myRow.nueve.name =  INPUT_NAME_DESC + count;
				//tbl.tBodies[0].rows[i].myRow.diez.name = INPUT_NAME_IMP + count;
				//tbl.tBodies[0].rows[i].myRow.once.name = INPUT_NAME_IMPF + count;	
				
					
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


//VALIDAR QUE SELECCIONE UNA TRANSACCION
	function validarcombos(){
	
	var tipooc=document.getElementById("idtransac").value;	
		if (tipooc=="") {						
		jAlert('Debe seleccionar una transaccion de salida')
		return 0;	
		}
			
		if (tipooc!="05" /*tipooc=="07" || tipooc=="08"|| tipooc=="15"|| tipooc=="17"|| tipooc=="19"*/) {
			
		document.getElementById("c_nomprov").value="ZGROUP";
		document.getElementById("dir").value="CALLE ORDONER VARGAS 142 URB. VILLA SOL";
		document.getElementById("hc").value="20521180774";
		document.getElementById("NT_CCCLI").value="CLI00000298";	
		document.getElementById('xc_rh').value=='0';	
		document.form1.c_rh.checked==false
		document.getElementById('c_rh').disabled=true;			
		return 0;
		
		}		
				
	}



//CAMBIAR COMBOS
function Cambiamoneda(){
document.getElementById('idmoneda').value=document.form1.moneda.options[document.form1.moneda.selectedIndex].value;
	//alert('hola');

	}	
	
function cambiatransaccion(){
document.getElementById('idtransac').value=document.form1.transaccion.options[document.form1.transaccion.selectedIndex].value;

		if(document.getElementById('idtransac').value=="")	{
		document.getElementById("c_nomprov").value="";
		document.getElementById("dir").value="";
		document.getElementById("hc").value="";
		document.getElementById("NT_CCCLI").value="";
		return 0;
			
			}
	

	}	
	
	function cambiaAlmacen(){
document.getElementById('idalmacen').value=document.form1.c_nomcon.options[document.form1.c_nomcon.selectedIndex].value;	

	}
	
	
	function cambiadocu(){
document.getElementById('iddocu').value=document.form1.docu.options[document.form1.docu.selectedIndex].value;	

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
	document.getElementById('seriet').disabled=false;
	document.getElementById('numerot').disabled=false;
	document.getElementById('fecha3').disabled=false;
	
	}else{
		document.getElementById('xc_rhtrans').value='0';
		document.getElementById('c_nomtran').value='';
		document.getElementById('ruc').value='';
		
		document.getElementById('c_nomtran').disabled=true;
		document.getElementById('seriet').disabled=true;
		document.getElementById('numerot').disabled=true;
		document.getElementById('fecha3').disabled=true;
		
		
		}
		
		
		
	}
	

	
	
	
	
	
	
	
function accion(){
	
//VALIDAR QUE SE HAYA SELECCCIONADO UN PRODUCTO
	codigox=document.getElementById("codigo").value
	if(codigox==""){
	jAlert('Codigo del Producto No Existe', 'Mensaje del Sistema');
		//document.getElementById("descripcion").focus();
	return 0;
}
	
//VALIDAR QUE EXISTE STOCK
var estoc=document.getElementById("stock").value;
if(estoc==""||estoc==0 || estoc<0 ){
	jAlert('No hay stock disponible', 'Mensaje del Sistema');
		
	return 0;
}
	
	
var cantix=parseFloat(document.getElementById("cantidad").value);	
//VALIDAR QUE LA CANTIDAD NO SEA CERO, NI NEGATIVO
if(cantix<0 || cantix==0 ){
	jAlert('Cantidad no puede ser cero o negativo', 'Mensaje del Sistema');
	return 0;
	
}	
	
//VALIDAR QUE LA CANTIDAD SEA MENOR QUE EL STOCK DISPONIBLE	
if(cantix > estoc){
	jAlert('Cantidad solicitada debe ser menor o igual al stock', 'Mensaje del Sistema');
	return 0;
	
}

//VALIDAR QUE SEAN NUMEROS
    if(isNaN(cantix)){
		jAlert('Cantidad solicitada debe ser un número', 'Mensaje del Sistema');
		return 0;       
	}
	
		
		
		//PRODUCTO KARDEX DETALLADO;
			
		if(document.getElementById('tipo').value=='D' && document.getElementById('cantidad').value>1){
			
		jAlert('Producto Kardex detallado/n Cantidad debe ser 1', 'Mensaje del Sistema')
		
			document.getElementById("cantidad").value="";
			document.getElementById("cantidad").focus();
			return 0;	
		
			}
		
		seriex=document.getElementById('serie').value;
		if(document.getElementById('tipo').value=='D' && seriex==''){
			
			jAlert('Producto Kardex detallado/n Seleccione una serie de Equipo', 'Mensaje del Sistema')
			
			document.getElementById("serie").focus();
			return 0;			
		}
		
		
		
	descripcionx=document.getElementById("descripcion").value
	medidax=document.getElementById("medida").value
	tipox=document.getElementById("tipo").value
	preciox=document.getElementById("precio").value
	cantidadx=document.getElementById("cantidad").value	
	
udni=<?php echo $_GET['udni'] ?>;		
	agregartemporal(codigox,seriex,udni,descripcionx,medidax,tipox,preciox,cantidadx);	
	
	desabilitarCabecera();
	
	
	else{
		
		location.href="../MVC_Controlador/NotaC.php?acc=holaaa";
		
		
		}
	
	
	
	
	
	//validarequipo();
	//addRowToTable();
	//limpiadatosdetalle();
	
	
}


	function agregartemporal(codigox,seriex,udni,descripcionx,medidax,tipox,preciox,cantidadx){
		location.href="../MVC_Controlador/NotaC.php?acc=guardarTemporal&codigo="+codigox+"&serie="+seriex+"&udni="+udni+"&descripcion="+descripcionx+"&medida="+medidax+"&tipo="+tipox+"&precio="+preciox+"&cantidad="+cantidadx;
		
	}


	function validarequipo(){	
	
	
	var theTable = document.getElementById('tablaDiagnostico');
	cantFilas = theTable.rows.length;	
	
	
		var codz=document.getElementById("codigo").value;
		var seriez=document.getElementById("idserie").value;
		var tipoz=document.getElementById('tipo').value;	
		
	if(cantFilas>=2){
					
	     for(i=1; i<=5;i++){	
		
		 			
				if(tipoz=="" && codz==document.getElementById('codigo'+i).value){
					mensaje=jAlert('Producto ya esta seleccionado', 'Mensaje del Sistema')	
					//contc=1;					
					return 0;	
							
					}				
				else if(tipoz=="D" && seriez!="" && seriez==document.getElementById('serie'+i).value){
					mensaje=jAlert('Equipo ya esta seleccionado', 'Mensaje del Sistema')	
					//contc=1;			
					return 0;	
									
				}/*else{
					mensaje=1;
					accion();
					//return 0;
				}*/
		
				
		}//end for			
			
			
 	}else { accion();return 0; }   //end else 

		
}	


	function limpiadatosdetalle(){	
		
	document.getElementById("codigo").value="";
	document.getElementById("descripcion").value="";
	document.getElementById("medida").value="";	
	document.getElementById("tipo").value="";		
	document.getElementById("precio").value="";
	document.getElementById("cantidad").value="1";	
	
	document.getElementById("serie").value="";
	document.getElementById("idserie").value="";
	document.getElementById("stock").value="";
	

	}
	
	
	
	
	function desabilitarCabecera(){	
	
	document.getElementById("idtipo").disabled = true;
	document.getElementById("c_nomcon").disabled = true;
	document.getElementById("transaccion").disabled = true;
	document.getElementById("usuario").disabled = true;
	document.getElementById("c_nomprov").disabled = true;
	document.getElementById("dir").disabled = true;
	document.getElementById("hc").disabled = true;
	document.getElementById("moneda").disabled = true;	
		
	document.getElementById("fecha").disabled = true;
	document.images['Image1'].disabled=true;
	
	//document.getElementById("Image1").disabled = true;
	
	
	}
	
	
	
	
	
	
	
	

</script>




<script type="text/javascript">	

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
}
function cerrar() {

div = document.getElementById('contenido_a_mostrar');
div.style.display='none';
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
		jAlert ('Falta Detalle de Nota de Salida', 'Mensaje del Sistema');
		return 0;
				}
	

jConfirm("¿Seguro de Grabar la Nota de Salida?", "Mensaje Confirmacion", function(r) {
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

 <strong align="center">NOTA DE SALIDA  =&gt;<?php echo $_GET['udni'];  ?></strong>
 <form id="form1" name="form1" method="post" action="../MVC_Controlador/NotaC.php?acc=grabarns&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
    <fieldset class="fieldset legend">
    <legend style="color:#00F"><strong>Encabezado Nota de Salida de Almacen</strong></legend>
   
   <table width="984" height="270" border="0" cellpadding="0" cellspacing="0" >
  
		<tr>
		  <td width="98" height="30">Nro de Dcto:</td>
		  <td width="224">
			<input name="textfield" type="text" disabled="disabled" class="texto" id="textfield" value="001" size="3" maxlength="3" readonly="readonly" />
			<input name="c_numos" type="text" disabled="disabled"  class="texto" id="c_numos" value="Autogenerado" readonly="readonly" size="19"/>
            			
		  </td>
			
		  <td width="109">Fecha:</td>
		  <td width="207"><input name="fecha"  type="text" class="texto"  id="fecha" size="17" maxlength="10" value="<?php echo date('d/m/Y');?>"   />
		    <img src="../images/calendario.jpg" name="Image1"  width="18" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
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
		    <input name="xsumar" type="hidden" id="xsumar" size="10" /></td>
		 
         
          <td width="98">Tipo de I/S:</td>
		  <td width="248">
			
            <input class="texto" name="idtipo" type="text" id="idtipo" value="<?php echo "NOTA DE SALIDA" ?>" readonly="readonly" size="21"   />
            
		  </td>

         
         
         
		  
		</tr>
        
		<tr>
        <td width="98">Almacen:</td>
		  <td>	
			<select name="c_nomcon" id="c_nomcon" class="Combos texto" onchange="cambiaAlmacen()" style="width:192px" >
					   <option value="000003">ALMACEN LOS OLIVOS</option>
			
			  <option value="000001" selected="selected">ALMACEN NESTOR GAMBETA</option>
              <option value="000002" >NUEVO ALMACEN NESTOR GAMBETA</option>
			
			</select>
            
           <input name="idalmacen" type="text" id="idalmacen" value="001"   />   
            
            
		 </td>  
		  <td height="30">Transaccion:</td>
          <?php $ven1 = transacSalidaC();  
			  ?>
		  <td><select name="transaccion" id="transaccion" class="Combos texto" onchange="cambiatransaccion()" style="width:180px"  >
					  <option value="">.::SELECCIONE::.</option>
              <?php foreach($ven1 as $item1){
				 $tt_codi=$item1["TT_CODI"];
			     $tt_desc=$item1["TT_DESC"];	
				?>
              <option value="<?php echo $tt_codi?>"><?php echo $tt_desc?></option>
              <?php }	?>
             
			</select>
             <input type="text" name="idtransac" id="idtransac"   />
          </td>
		  
		  <td>Usuario:</td>
		  <td><input type="text" name="usuario" id="usuario"  class="texto" readonly="readonly" value="<?php echo $_GET["udni"] ?>" size="21" /></td>
          
         
	  </tr>
		<tr>
		  <td height="30">Razon Social:</td>
		  <td><input name="c_nomprov" type="text"  class="texto" id="c_nomprov" size="27"  placeholder="Digite el Cliente "  onclick="validarcombos();" onkeypress="validarcombos()" /></td>
		  <td>Direccion:</td>
		  <td colspan="2"><input type="text" name="dir" id="dir"  class="texto" readonly="readonly" size="20"/>
		  <input type="text" name="hc" id="hc"  class="texto" readonly="readonly" size="13"/>
           <input type="text" name="NT_CCCLI" id="NT_CCCLI"  class="texto" readonly="readonly" size="13"/>
          </td>
		  <td>Imp.:
            <input name="c_rh" type="checkbox" id="c_rh" value="1" onclick="rh()"  />
            <input type="hidden" size="5" name="xc_rh" id="xc_rh" />
          <input type="hidden" size="5" name="porigv" id="porigv" /></td>
	  </tr>
		<tr>
		  <td height="30">Moneda:</td>
		  <td><?php $ven = ListaMonedaC();  
			  ?>
            <select name="moneda" id="moneda" class="Combos texto" onchange="Cambiamoneda()" style="width:150px" >
              <option value="">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){
				 $nombremoneda=$item["c_desitm"];
			     $idmoneda=$item["c_numitm"];	
				?>
              <option value="<?php echo $idmoneda?>"><?php echo $nombremoneda?></option>
              <?php }	?>
            </select>
          <input type="hidden" name="idmoneda" id="idmoneda"   />
          
          <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			?>
           
          <input name="nomtipo" class="texto" type="text" id="nomtipo" value="<?php echo $tipocambio ?>" size="2" readonly="readonly" />
          
          </td>
		  <td><b>Docum. de Refer.:</b></td>
		  <td><?php $ven2 = docuC();  
			  ?>
		    <select name="docu" id="docu" class="Combos texto" onchange="cambiadocu()" style="width:174px"  >
		      <option value="">.::SELECCIONE::.</option>
		      <?php foreach($ven2 as $item2){
				 $tt_codi=$item2["TD_CODI"];
			     $tt_desc=$item2["TD_DESC"];	
				?>
		      <option value="<?php echo $tt_codi?>"><?php echo $tt_desc?></option>
		      <?php }	?>
          </select>
	      <input type="hidden" name="iddocu" id="iddocu"   /></td>
		  <td><b>Serie/Numero:</b></td>
		  <td><input class="texto" type="text" size="3" name="seried" id="seried" onkeypress="return ValidaEntero(event)" />
          <input class="texto" type="text" size="12" name="numerod" id="numerod" onkeypress="return ValidaEntero(event)" /></td>
	  </tr>
		<tr>
		  <td height="30" colspan="6"><strong >Datos de la Guia del Proveedor:</strong></td>
	  </tr>
		<tr>
		  <td height="30">Fecha Emision:</td>
		  <td><input name="fecha2"  type="text" class="texto"  id="fecha2" size="12" maxlength="12" value="<?php echo date('d/m/Y');?>">
            <img src="../images/calendario.jpg" id="Image2" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
            <script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fecha2",
						ifFormat   : "%d/%m/%Y",
						button     : "Image2"
						  }
						);
			 </script>
            <input type="hidden" name="xsum2" id="xsum2" />
            <input name="hora2" type="hidden" id="hora2" size="8" />
          <input name="xsumar2" type="hidden" id="xsumar2" size="10" /></td>
		  <td>Serie/Numero:</td>
		  <td><input class="texto" type="text" size="3" name="seriep" id="seriep" onkeypress="return ValidaEntero(event)" />
		    <input class="texto" type="text" size="12" name="numerop" id="numerop" onkeypress="return ValidaEntero(event)" /></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
		<tr>
		  <td height="30" colspan="6"><strong >Datos de la Guia del Transportista:</strong></td>
	  </tr>
		<tr>
		  <td height="30">Transportista:</td>
		  <td><input  name="c_nomtran" type="text"  class="texto" id="c_nomtran" size="22"  placeholder="Digite el Transportista" />
	      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
	      <input type="hidden" size="8" name="ruc" id="ruc" placeholder="RUC"  readonly="readonly" class="texto"/>
	      <input name="c_rhtrans" type="checkbox" id="c_rhtrans" value="1" onclick="rhtrans()"  /> Sin transportista
    <input name="xc_rhtrans" type="hidden" id="xc_rhtrans"    /></td>
		  <td>Serie/Numero:</td>
		  <td><input class="texto" type="text" size="3" name="seriet" id="seriet" onkeypress="return ValidaEntero(event)" />
		    <input class="texto" type="text" size="12" name="numerot" id="numerot" onkeypress="return ValidaEntero(event)" /></td>
		  <td><strong style="color:#F00">  Fecha Recep: </strong></td>
 <td width="248">&nbsp;
   <input name="fecha3"  type="text" class="texto"  id="fecha3" size="12" maxlength="12" value="<?php echo date('d/m/Y');?>">
   <img src="../images/calendario.jpg" id="Image3" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" />
   <script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fecha3",
						ifFormat   : "%d/%m/%Y",
						button     : "Image3"
						  }
						);
			 </script>
   <input type="hidden" name="xsum3" id="xsum3" />
   <input name="hora3" type="hidden" id="hora3" size="8" />
   <input name="xsumar3" type="hidden" id="xsumar3" size="10" /></td> 
	  </tr>
          
		 
	  </table>
	
	</fieldset>		

       
  
<!-------------------------------------------------------------------------------------------------------------- -->

  
  <fieldset class="fieldset legend">
  <legend style="color:#00F"><strong>Detalle <strong> Nota de Salida de Almacen</strong></strong></legend>
  <table width="984"  border="0" cellpadding="0" cellspacing="0">
	 <tr>
      <td width="114">Descripcion: </td>
	  <td width="206">        
          <input name="descripcion" type="text" id="descripcion" size="20" class="texto"    placeholder="Seleccione Producto" readonly="readonly" />          
      <a href="#">  <img src="../images/search.png" width="15" height="15"  border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>
        
       <!-- <button type="submit" name="save" onclick="ventanaArticulos()"> 
       <img src="../images/search.png" width="15" height="15"  border="0"  title="Buscar Articulo"/>
    </button>-->
        
        
      </td>
      <td width="62">Codigo : </td>
	  <td width="207" >
	 
          <input name="codigo" type="text"  id="codigo" size="10" readonly="readonly" class="texto" />
         
          <input name="medida" type="text" id="medida" size="3" class="texto" readonly="readonly"/>
          <input style="color:#F00" name="tipo" type="text" id="tipo" size="2" class="texto" readonly="readonly" />
          
		 
		</td>
		<td width="135">Precio U.: <br />
	    <input name="precio" type="text" id="precio" size="8"  class="texto"  readonly="readonly" /></td>
		<td width="260">Serie de equipo: <br />
		  
		  <input name="serie" type="text" class="texto" id="serie" size="23" readonly="readonly" />  
		  <input name="idserie" type="hidden" class="texto" id="idserie" size="23" readonly="readonly" />   
		  
		  <a href="#">  <img src="../images/search.png" width="15" height="15"  border="0"  title="Seleccionar Serie"  onClick="ventanaSeries()" onMouseOver="style.cursor=cursor"/></a>	    </td>
	  </tr>
	  
	<tr>
	   <td>	Total ==&gt;</td>					  
		<td>Stock: 
	      <input name="stock" type="text"  id="stock" size="6" readonly="readonly" class="texto" value="0" /></td>
      <td align="right"> Cant.:
        </td>
	  <td>
	    <input name="cantidad" type="text"  class="texto" id="cantidad" value="1" size="5" onclick="validar_num()" onkeypress="validar_num()"  />
	    </a></td>
      <td  ><input type="button" value="Refrescar" onclick="location.reload();" style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/></td>
      <td align="center" >
      
       <!--<a href="#" onclick="accion()">      
        <img src="../images/agregar.png" width="22" height="22" border="0" /></a> --> 
            
    <input type="button" name="agregax" id="agregax" value="AGREGAR" onclick="accion()" />
       <!--<button  name="agregax" onclick="accion()"> AGREGAR</button>-->
                             
		<!--    <input type="button" name="validax" id="validax" value="VALIDAR" onclick="validarequipo()" />-->
      
      </td>
      </tr>
   
	 
    </table>
  <table width="984" border="0" cellspacing="0" cellpadding="0" id="tablaDiagnostico" >
    <tr>
      <td width="37" align="center" bgcolor="#CCCCCC"><strong>Item</strong></td>
      <td  height="40" width="99" align="center" bgcolor="#CCCCCC"><strong>Codigo</strong></td>
      <td width="190" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
      <td width="62" align="center" bgcolor="#CCCCCC"><strong>U.M</strong></td>
      <!-- <td width="20" align="center" bgcolor="#CCCCCC"><strong>Stock</strong></td>-->
      <td width="130" align="center" bgcolor="#CCCCCC"><strong>Serie de Equipo</strong></td>
      <td width="65" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
      <td width="65" align="center" bgcolor="#CCCCCC"><strong>Precio</strong></td>
      <td width="221" bgcolor="#CCCCCC"><strong>Eliminar</strong></td>
    </tr>
       
 </table>       
    <?php 
	
/*	$resulos=listaTemporalM();	
		$i = 1;
		
		if($resulos!=NULL)
		{
			foreach($resulos as $item)
			{ */
	
	
	 ?>   
       
      
       
    <!--<table width="984" border="0" cellspacing="0" cellpadding="0" id="data" >     
       
       
         
     <tr>
      <td width="37" align="center" ><?php echo $i ?></td>
      <td  height="40" width="99" align="center" ><?php echo $item['NT_CART'] ?> </td>
      <td width="190" align="center"><?php echo $item['C_NPRODUCTO'] ?></td>
      <td width="62" align="center"><?php echo $item['NT_CUND'] ?></td>
      <!-- <td width="20" align="center" bgcolor="#CCCCCC"><strong>Stock</strong></td>
      <td width="130" align="center" ><?php echo $item['C_IDEQUIPO'] ?></td>
      <td width="65" align="center" ><?php echo $item['N_CANT'] ?></td>
      <td width="65" align="center" ><?php echo $item['N_PRECIO'] ?></td>
      <td width="221" ></td>
    </tr>
   </table>-->
    
        <?php   
		/*$i += 1;		
		}
	}*/	
	 ?> 
    
    
    
   <div id="lineaResultado">
					<iframe width="100%" height="150" id="frame_lineas" name="frame_lineas" frameborder="0" >
						<ilayer width="100%" height="250" id="frame_lineas" name="frame_lineas"></ilayer>
					</iframe>
   </div> 
    
    
    
    
    
    
    
  </fieldset>
  </form>
  
   <fieldset class="fieldset legend">
    
  <table width="984" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2">&nbsp;</td>
      </tr>
      
    
    <tr>
      <td width="108" >Observacion:</td>
      
      <td>&nbsp;
        <input  name="observacion" type="text"  class="texto" id="observacion" size="105"  /></td>   
      </tr>
    
    <tr>
      <td align="center">&nbsp;</td>
      <td width="218" align="center">&nbsp;</td>
      </tr>
    
  </table>
  </fieldset>
  

  
  
  
  
  <table width="984" border="0" cellspacing="0" cellpadding="0">
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