<script>
/*$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});*/

function cambiaAlmacen(){
	document.Frmregcoti.c_codalm.value=document.Frmregcoti.almacen.options[document.Frmregcoti.almacen.selectedIndex].value;	
}

function cambiacliente(){                  
 var cadena=document.Frmregcoti.xc_nomcli.options[document.Frmregcoti.xc_nomcli.selectedIndex].value; 
 //var cadena=document.Frmregcoti.xc_nomcli.value;
         //alert(cadena);                      
arreglo=cadena.split("|");
c_codcli=arreglo[0];
c_nomcli=arreglo[1].toUpperCase();
c_ruccli=arreglo[2];  

document.Frmregcoti.NT_CCLI.value=c_ruccli;//c_codcli
document.Frmregcoti.c_nomcli.value=c_nomcli;
document.Frmregcoti.c_ruccli.value=c_ruccli;    
document.Frmregcoti.NT_RESPO.value=''; 

}

function salir(){	  
		location.href="?c=not02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>";	

}

function validartipo(){
	/*xc_tipped=document.getElementById('xc_tipped').value;
	NT_CUND=document.getElementById('NT_CUND').value;
	if(xc_tipped=='000' || NT_CUND==''){
		var mensje = "Seleccione un tipo de Servicio ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		document.getElementById("xc_tipped").focus();
		return 0;
	}*/
}

// VALIDAR NUMERO DE GUIA
function ponerCeros(obj) {
	if(obj.value!="" && obj.value!="0" ){
  		while (obj.value.length<7)
    	obj.value = '0'+obj.value;
	}
}

function ponerCerosserie(obj) {
	if(obj.value!="" && obj.value!="0" ){
  		while (obj.value.length<3)
    	obj.value = '0'+obj.value;
	}
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

function compUsuario(Tecla) {
     Tecla = (Tecla) ? Tecla: window.event;
     input = (Tecla.target) ? Tecla.target : 
     Tecla.srcElement;
     if (Tecla.type == "keyup") {
          var DivDestino = document.getElementById("DivDestino");
          DivDestino.innerHTML = "<div><div class='alert_info'>	<img src='../images/icon_info.png' alt='delete' class='mid_align'/>Continue</div>	</div>";
          if (input.value) {
               ObtDatos("?c=not01&a=validarNumGuia&cod=" + input.value);
          } 
     }
}

function createRequestObject(){
      var peticion;
      var browser = navigator.appName;
            if(browser == "Microsoft Internet Explorer"){
                  peticion = new ActiveXObject("Microsoft.XMLHTTP");
            }else{
                  peticion = new XMLHttpRequest();
}
return peticion;
}
var http = new Array();
	function ObtDatos(url){
      var act = new Date();
      http[act] = createRequestObject();
      http[act].open('get', url);
      http[act].onreadystatechange = function() {
      if (http[act].readyState == 4) {
            if (http[act].status == 200 || http[act].status == 304) {
  		var texto
		texto = http[act].responseText
                    var DivDestino = document.getElementById("DivDestino");
                    DivDestino.innerHTML = "<div id='error'>"+texto+"</div>";     
					document.getElementById("seguir").value=texto;
                             
}
}
}
http[act].send(null);
}
//FIN VALIDAR NUMERO DE GUIA
</script>


<!--GRILLA DETALLE ASIGNACION-->
<script src="assets/js/bootbox.min.js"></script>

<script type="text/javascript">

function limpiar(){
	document.Frmregcoti.c_codprd.value='';
	document.Frmregcoti.c_desprd.value='';
	//document.Frmregcoti.NT_PREC.value='';
	}

/*function OnchangeTipCot(){
	limpiar();	
var tipocoti=document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;
	document.Frmregcoti.NT_PREC.value=tipocoti;
	if(tipocoti=='001'){
		document.getElementById('NT_CUND').value='V';
	}else if(tipocoti=='017'){
		document.getElementById('NT_CUND').value='A';
	}else if(tipocoti=='015'){
		document.getElementById('NT_CUND').value='M';
	}else if(tipocoti=='002'){
		document.getElementById('NT_CUND').value='R';
	}else if(tipocoti=='019'){
		document.getElementById('NT_CUND').value='Z';//SERVICIO DE ALMACENAJE
		document.Frmregcoti.NT_PREC.value='001';
	}
	
	
	document.Frmregcoti.c_desprd.focus();
	}*/
	
var INPUT_NAME_PREFIX = 'c_codprd'; // this is being set via script a
var INPUT_NAME_NT_PREC = 'NT_PREC'; // this is being set via script a
var INPUT_NAME_DES = 'c_desprd'; // this is being set via script b
var INPUT_NAME_CAN = 'n_canprd'; // this is being set via script c
var INPUT_NAME_OBS = 'c_obsprd'; // this is being set via script e
var INPUT_NAME_ESTA = 'NT_CUND';
var INPUT_NAME_EQP = 'c_codcont'; // this is being set via script g
var INPUT_NAME_PRODUCTO = 'c_producto'; // this is being set via script g

var TABLE_NAME = 'tblSample'; // this should be named in the HTML
var ROW_BASE = 1; // first number (for display)
var hasLoaded = false;
window.onload=fillInRows;
function fillInRows()
{
	hasLoaded = true;	
}
// CONFIG:
// myRowObject is an object for storing information about the table rows
function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho,nueve)
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
	var codigo=document.getElementById("c_codprd").value
	var NT_PREC=document.getElementById("NT_PREC").value
	var des=document.getElementById("c_desprd").value	
	var can=document.getElementById("n_canprd").value
	var serie=document.getElementById("c_codcont").value	
	var obs=document.getElementById("c_obsprd").value
	var NT_CUND=document.getElementById("NT_CUND").value
	var c_producto=document.getElementById("c_producto").value
		
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
		txtInpa.setAttribute('size', '5');
		txtInpa.setAttribute('value', codigo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'class="form-control input-sm"'); 
		cell1.appendChild(txtInpa);	
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_DES + iteration);
		txtInpb.setAttribute('size', '40');
	    txtInpb.setAttribute('value', des); // iteration included for debug purposes 
	    txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug 
	    txtInpb.setAttribute('class', 'form-control input-sm'); 	
		cell2.appendChild(txtInpb);	
		
		var cell22 = row.insertCell(3);
		var txtInpb2 = document.createElement('input');
		txtInpb2.setAttribute('type', 'text');
		txtInpb2.setAttribute('name', INPUT_NAME_CAN + iteration);
		txtInpb2.setAttribute('id', INPUT_NAME_CAN + iteration);
		txtInpb2.setAttribute('size', '3');
	    txtInpb2.setAttribute('value', can); // iteration included for debug purposes 
	    txtInpb2.setAttribute('class', 'form-control input-sm'); 	
		cell22.appendChild(txtInpb2);				
				

		var cell3 = row.insertCell(4);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_EQP + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_EQP + iteration);
		txtInpc.setAttribute('size', '10');
	    txtInpc.setAttribute('value', serie); // iteration included for debug purposes	    
	    txtInpc.setAttribute('readonly', 'readonly');
		txtInpc.setAttribute('class', 'form-control input-sm'); 
		//txtInpc.setAttribute('onFocus','abrirmodalEqp(this.name)');		
		cell3.appendChild(txtInpc);	
		
		
		
		var cell4 = row.insertCell(5);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_OBS + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_OBS + iteration);
		txtInpd.setAttribute('size', '5');
		txtInpd.setAttribute('value', obs); // iteration included for debug purposes 
		//txtInpd.setAttribute('readonly', 'readonly');
		txtInpd.setAttribute('class', 'form-control input-sm'); 		
		cell4.appendChild(txtInpd);	
		
		var cell5 = row.insertCell(6);
		var txtInpde = document.createElement('input');
		txtInpde.setAttribute('type', 'text');
		txtInpde.setAttribute('name', INPUT_NAME_ESTA + iteration);
		txtInpde.setAttribute('id', INPUT_NAME_ESTA + iteration);
		txtInpde.setAttribute('size', '5');
		txtInpde.setAttribute('value', NT_CUND); // iteration included for debug purposes 
		txtInpde.setAttribute('readonly', 'readonly');
		txtInpde.setAttribute('class', 'form-control input-sm'); 		
		cell5.appendChild(txtInpde);		
		
		// cell 1 - input text
		var cell6 = row.insertCell(7);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'hidden');
		txtInpf.setAttribute('name', INPUT_NAME_NT_PREC + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_NT_PREC + iteration);
		txtInpf.setAttribute('size', '2');
		txtInpf.setAttribute('value', NT_PREC); // iteration included for debug purposes
		txtInpf.setAttribute('readonly', 'readonly');
		txtInpf.setAttribute('class', 'class="form-control input-sm"'); 
		cell6.appendChild(txtInpf);
		
		// cell 1 - input text
		var cell7 = row.insertCell(8);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'hidden');
		txtInpg.setAttribute('name', INPUT_NAME_PRODUCTO + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_PRODUCTO + iteration);
		txtInpg.setAttribute('size', '2');
		txtInpg.setAttribute('value', c_producto); // iteration included for debug purposes
		txtInpg.setAttribute('readonly', 'readonly');
		txtInpg.setAttribute('class', 'class="form-control input-sm"'); 
		cell7.appendChild(txtInpg);
		

		var cell8 = row.insertCell(9);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.setAttribute('class', 'btn btn-danger btn-sm'); 
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell6.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpb2,txtInpc,txtInpd,txtInpde,txtInpf,txtInpg);
	
	}
}

function deleteCurrentRow(obj)
{	
	if (hasLoaded) {			
		var delRow = obj.parentNode.parentNode;
		var tbl = delRow.parentNode.parentNode;
		var rIndex = delRow.sectionRowIndex;		
		var rowArray = new Array(delRow);
		
		DesbloquearEquiposQuit(rIndex);//desbloqueo equipo		
		deleteRows(rowArray);		
	    reorderRows(tbl, rIndex);
		
	}
}

function DesbloquearEquiposQuit(rIndex){		
			//recuperar codigos a desbloquear
			nitem=parseInt(rIndex)+1;
			serie=document.getElementsByName("c_codcont"+nitem)[0].value;
			alert('El equipo'+serie+' con item'+nitem+' Fue quitado');
			//serie='hola';
			//alert(serie+i);
				 jQuery.ajax({
					url: '?c=not01&a=DesbloquearEquiposQuit',
					type: "post",
					dataType: "json",
					data: {
						//idequipo: idequipo, //codsel
						c_codcont:serie //codanterior
						//ncoti:ncoti
					}
				})	
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
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_CAN + count;	
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_EQP + count;			
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_OBS + count;					
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_ESTA + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_NT_PREC + count;		
				tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_PRODUCTO + count;
				
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

//validar numeros
 function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
} 

function validarnumero(){		
	var n_canprd=document.getElementById('n_canprd').value;
	var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_canprd)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_canprd').value='';
		document.getElementById('n_canprd').focus();
		return false;
		}
		
}

function validarcantidad(){		
		var descripcion=document.getElementById('descripcion').value;
		var c_codprd=document.getElementById('c_codprd').value;
		if(descripcion==""){
			var mensje = "Falta Ingresar un Producto ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById('n_canprd').value='0';
		}else if(c_codprd==""){
			var mensje = "Busque y Seleccione un Producto ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById('n_canprd').value='0';
		}else{		
			var n_canprd=document.getElementById('n_canprd').value;
			var patron=/^\d+(\.\d{1,2})?$/;
				if(!patron.test(n_canprd)){		
				//window.alert('monto ingresado incorrecto');
				document.getElementById('n_canprd').value='0';
				document.getElementById('n_canprd').focus();
				return false;
				}
		}		
}

function agregar(){
	
	  var theTable = document.getElementById('tblSample');
		cantFilas = theTable.rows.length;//a partir de cantFilas==2 la tabla esta llena
		if(cantFilas>1){
			for(i=1;i<cantFilas;i++){
				if((document.Frmregcoti.c_desprd.value)==document.getElementsByName("c_desprd"+i)[0].value && document.Frmregcoti.c_producto.value!="1"){
					//alert('hola'+i);
					mensje = "Producto Seleccionado ya está en el Registro";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					return 0;
				}
				
			}
		}//end if
	
	    if((document.Frmregcoti.c_codprd.value)==""){
			mensje = "Falta Ingresar Descripcion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("c_desprd").focus();			
		}else if((document.Frmregcoti.n_canprd.value)=="0" || (document.Frmregcoti.n_canprd.value)==""){
			mensje = "Falta Ingresar Cantidad";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
		}else if(parseFloat(document.Frmregcoti.IN_STOK.value)=="0"){ //validar stock
				var mensje = "No tiene stock del producto seleccionado ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
				document.getElementById('n_canprd').value='0';
		}else if( parseFloat(document.Frmregcoti.IN_STOK.value)<parseFloat(document.Frmregcoti.n_canprd.value) ){//validar stock
			var mensje = "La cantidad solicitada debe ser menor o igual al stock ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById('n_canprd').value='0';
		}else if(((document.Frmregcoti.n_canprd.value)!="1" ) && (document.Frmregcoti.c_producto.value)=="1" ){ //Producto detallado
			mensje = "Producto detallado cantidad debe ser 1";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
			document.Frmregcoti.n_canprd.focus();	
		}else if( (document.Frmregcoti.c_codcont.value)=="" && (document.Frmregcoti.c_producto.value)=="1" ){//Producto detallado
		mensje = "Falta Ingresar Codigo de Equipo";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		document.getElementById("c_codcont").focus();		
		}else if((document.Frmregcoti.NT_CUND.value)==""){
			mensje = "Falta Seleccionar Estado del Equipo";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("NT_CUND").focus();
			
		}else{        
			addRowToTable();		
			$("#c_codprd").val('');
			$("#c_desprd").val('');	
			$("#n_canprd").val('0');		
			$("#c_codcont").val('');
			$("#c_obsprd").val('');
			$("#c_producto").val('');
			$("#IN_STOK").val('');
			$("#NT_PREC").val('');		
			$("#descripcion").val('');
			$("#NT_CUND").val('');
		}	
	}
	
</script>
<!--FIN GRILLA-->


<script>
 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   $( "#d_fecapecont" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });
   $( "#NT_FDOC" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });  
   $( "#NT_FRP" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });  
   
 });
 
  function validarguardar(){  
		
	   var c_mes=document.getElementById('c_mes').value;
	   if(c_mes==''){			
			var mensje = "Falta Seleccionar mes a Aperturar ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_mes").focus();
			return 0;
		}
		
		var d_fecapecont=document.getElementById('d_fecapecont').value;
	   if(d_fecapecont==''){			
			var mensje = "Falta Ingresar Fecha de Apertura ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecapecont").focus();
			return 0;
		}
	
		if(confirm("Seguro de Aperturar el Mes seleccionado ?")){
		   document.getElementById("Frmregcoti").submit();		
		}	
 }

//ver series
function abrirmodalEqp(){
	if(document.Frmregcoti.c_desprd.value=="" ){	
		var mensje = "Falta Seleccionar un Producto ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
	}else if(document.Frmregcoti.c_producto.value!="1"){	
		var mensje = "El Producto Seleccionado no es Detallado ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
	}else{	
		$('#my_modal').modal('show');				
		var c_codprd=document.getElementById('c_codprd').value;
		//document.frmequipo.codpro.value=idequi;				
		//document.write("c_codprd = " + c_codprd);
		 $('#tabla').load("?c=not01&a=VerEquiposDispo",{c_codprd:c_codprd});	
	}
}

function abrirmodalProd(){
	document.frmproducto.criterio.value="";
	almacen=document.Frmregcoti.almacen.value;
	   if(almacen==''){			
			var mensje = "Falta seleccionar Almacen en Datos Destinatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("almacen").focus();
			return 0;
		}	
	$('#my_modalProd').modal('show');				
	var alm=document.Frmregcoti.c_codalm.value;
	//var buscar=document.frmproducto.buscar.value;				
	//document.write("c_codprd = " + c_codprd);
	 $('#tablaProd').load("?c=not01&a=VerProductosDispo",{alm:alm});	
}

function abrirmodalProd2(){
	$('#my_modalProd').modal('show');				
	var alm=document.Frmregcoti.c_codalm.value;
	var criterio=document.frmproducto.criterio.value;				
	//document.write("c_codprd = " + c_codprd);
	 $('#tablaProd').load("?c=not01&a=VerProductosDispo",{alm:alm,criterio:criterio});	
}

</script>
<div class="container-fluid"> 

<div class="panel panel-primary" style="width:700px;text-align:center;margin-left:20%;">
  <!-- Default panel contents -->
  <div class="panel-heading">APERTURAR MES</div>
 <div>    
 
 <!-- Inicio Modal alerts -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;width:500px;" readonly />
    <span id="mensaje" class="label label-default"></span>
 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->   

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=cont01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=guardaApertura" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Aperturar"/>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
     <!--&nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;-->
    </div>  
        
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
           <label class="control-label col-xs-3">Año</label>
            <div class="col-xs-2">
            	<input type="text" id="c_anno" name="c_anno" value="<?php echo date('Y'); ?>" class="form-control input-sm" readonly="readonly"  /> 
            	<?php /*?><select name="c_anno" id="c_anno" class="form-control input-sm">
                    <option value=""></option>            		
                    <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                    <option value="<?php echo $a->tm_codi; ?>" <?php echo date('Y') == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
            	 </select><?php */?>             	
            </div>                     
            <label class="control-label col-xs-2">Mes</label>
            <div class="col-xs-3">
            	<input type="text" id="c_mes" name="c_mes" value="<?php echo date('m'); ?>" class="form-control input-sm"  /> 
            	<?php /*?><select name="c_mes" id="c_mes" class="form-control input-sm">
                    <option value=""></option> 
                    <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                    <option value="<?php echo $mes->tm_codi; ?>"  > <?php echo $mes->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
            	 </select><?php */?>
         </div>   
      </div>        
   <!--fila 2-->
   <div class="form-group">                     
            <label class="control-label col-xs-3">Usuario</label>
            <div class="col-xs-2">
                 <input type="text" id="c_userape" name="c_userape" value="<?php echo $login; ?>" class="form-control input-sm" readonly="readonly"  />          
       	     </div>  
          
           <label class="control-label col-xs-2">Fecha Apert.</label>
            <div class="col-xs-3">
               <input type="text" id="d_fecapecont" name="d_fecapecont" class="form-control datepicker input-sm" placeholder="Fecha"  />              
       	    </div>         
      </div>  
      <!--FILA 3-->
       <div class="form-group">                           
            <label class="control-label col-xs-3">Observacion</label>
            <div class="col-xs-7">
             <input type="text" id="c_obsape" name="c_obsape"  class="form-control input-sm" placeholder="Observacion"  />  
             </div> 
      </div>     
       
       
         
</form>   		                

</div>
</div>
</div>
   
<script>

//Buscar Transportista
$(document).ready(function(){       
    // Autocomplete de c_nomtra, jquery UI 
    $("#c_nomtra").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=not01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_nomtra").val(ui.item.id);
			$("#NT_CTR").val(ui.item.ruc);
          
        }
    })
	// Fin Autocomplete de producto, jquery UI 
})



</script>


<script>
<!--autocomplete producto-->
/*$(document).ready(function(){   
    $("#descripcion").autocomplete({
		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=not01&a=ProductoBuscar&alm='+document.Frmregcoti.c_codalm.value,
				//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
                            id: item.IN_CODI,
                            value: item.descripcion,
							c_equipo: item.c_equipo,
							IN_STOK: item.IN_STOK,
							IN_COST: item.IN_COST,
							c_desprd: item.IN_ARTI,
							IN_UVTA: item.IN_UVTA
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			$("#c_codprd").val(ui.item.id);
			$("#c_producto").val(ui.item.c_equipo);
			$("#IN_STOK").val(ui.item.IN_STOK);
			$("#NT_PREC").val(ui.item.IN_COST);
			$("#c_desprd").val(ui.item.c_desprd);
			$("#NT_CUND").val(ui.item.IN_UVTA);
			$("#c_codcont").val('');
            //$("#c_codcont").focus();
        }
    })
})*/
//Responsables de la empresa del cliente
$(document).ready(function(){   
    $("#NT_RESPO").autocomplete({		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=not01&a=ResponsableBuscar&c_ruccli='+document.Frmregcoti.c_ruccli.value,
				//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
                            id: item.c_respo,
                            value: item.c_respo
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			//$("#c_codprd").val(ui.item.id);
            //$("#c_codcont").focus();
        }
    })
})

function validarot(){
	if(document.Frmregcoti.NT_DOCR.value==""){	
		var mensje = "Falta Ingresar Nro de Orden de Trabajo ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			return 0; 
	}
}

//empresas de la orden de trabajo
	$(document).ready(function(){ 	 
		$("#NT_NOC").autocomplete({		
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					
					url: '?c=not02&a=OrdenCompraBuscar&NT_CCLI='+document.Frmregcoti.NT_CCLI.value,
					//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
					type: "post",
					dataType: "json",
					data: {
						criterio: request.term
					},
					success: function (data) {
						response($.map(data, function (item) {
							return { //
								id: item.c_numeoc,
								value: item.c_numeoc
								//c_rucprov: item.c_rucprov,
								//fecha: item.fecha
							}
						}))
					}
				})
			},
			select: function (e, ui) {
				$("#NT_NOC").val(ui.item.id);
				//$("#NT_CTR").val(ui.item.c_rucprov);
				//$("#NT_FGUI").val(ui.item.fecha);
				
			}
		})
	})


</script>