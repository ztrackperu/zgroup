<script>
$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});
</script>

<script>

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
c_ruccli=arreglo[5];  

document.Frmregcoti.NT_CCLI.value=c_codcli;
document.Frmregcoti.c_nomcli.value=c_nomcli;
document.Frmregcoti.c_ruccli.value=c_ruccli;    
document.Frmregcoti.NT_RESPO.value=''; 

}

function cancelar(){
	//var cancelar=document.getElementById('cancelar').value;
	var theTable = document.getElementById('tblSample');
        cantFilas = theTable.rows.length;
			//if(cantFilas==1)
	var maxitem=parseInt(cantFilas)-1;
		for(var y = 1;y <=maxitem;y++){ 
				if(document.getElementById('c_codcont'+y).value!=''){					
				   		//recuperar codigos a desbloquear	
						serie=document.getElementById('c_codcont'+y).value;						
						//alert(document.getElementById('c_codcont'+i).value);
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
		}//fin for 
		
	//borrar las filas de la tabla
	$("#tblSample").find("tr:gt(0)").remove();
	
	//document.getElementById('cancelar').value='1';
}

function salir(){
	//var cancelar=document.getElementById('cancelar').value;
	var theTable = document.getElementById('tblSample');
        cantFilas = theTable.rows.length;
			//if(cantFilas==1)
	if(parseInt(cantFilas)>1){
		var mensje = "Cancele su operacion ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
		//alert('Cancele su operacion');	
	}else{
		//url volver  
		location.href="?c=not01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ListarNotas";		
	}

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
			   if(document.getElementById("NT_TREM").value!='G'){
               	  ObtDatos("?c=not01&a=validarNumGuia&cod=" + input.value);//validar Orden de trabajo
			   }else{
				 document.getElementById("NT_CTR").readOnly=false;  
			   }
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
var INPUT_NAME_CLASE = 'COD_CLASE'; // this is being set via script g

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
function myRowObject(one,two,tres,cuatro,cinco,seis,siete,ocho,nueve,diez)
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
	var COD_CLASE=document.getElementById("COD_CLASE").value
		
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
		
		var cell4 = row.insertCell(3);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_OBS + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_OBS + iteration);
		txtInpd.setAttribute('size', '5');
		txtInpd.setAttribute('value', obs); // iteration included for debug purposes 
		//txtInpd.setAttribute('readonly', 'readonly');
		txtInpd.setAttribute('class', 'form-control input-sm'); 		
		cell4.appendChild(txtInpd);			
					
		var cell22 = row.insertCell(4);
		var txtInpb2 = document.createElement('input');
		txtInpb2.setAttribute('type', 'text');
		txtInpb2.setAttribute('name', INPUT_NAME_CAN + iteration);
		txtInpb2.setAttribute('id', INPUT_NAME_CAN + iteration);
		txtInpb2.setAttribute('size', '3');
	    txtInpb2.setAttribute('value', can); // iteration included for debug purposes 
	    txtInpb2.setAttribute('class', 'form-control input-sm'); 
		txtInpb2.setAttribute('onkeyup','validarcambiocantidad(this.name)');	
		cell22.appendChild(txtInpb2);		

		var cell3 = row.insertCell(5);
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
		
		// cell 1 - input text
		var cell8 = row.insertCell(9);
		var txtInph = document.createElement('input');
		txtInph.setAttribute('type', 'hidden');
		txtInph.setAttribute('name', INPUT_NAME_CLASE + iteration);
		txtInph.setAttribute('id', INPUT_NAME_CLASE + iteration);
		txtInph.setAttribute('size', '2');
		txtInph.setAttribute('value', COD_CLASE); // iteration included for debug purposes
		txtInph.setAttribute('readonly', 'readonly');
		txtInph.setAttribute('class', 'class="form-control input-sm"'); 
		cell8.appendChild(txtInph);
		

		var cell9 = row.insertCell(10);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.setAttribute('class', 'btn btn-danger btn-sm'); 
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell6.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpb2,txtInpc,txtInpd,txtInpde,txtInpf,txtInpg,txtInph);
	
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
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_OBS + count;
				
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_CAN + count;	
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_EQP + count;			
									
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_ESTA + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_NT_PREC + count;		
				tbl.tBodies[0].rows[i].myRow.nueve.name = INPUT_NAME_PRODUCTO + count;
				tbl.tBodies[0].rows[i].myRow.diez.name = INPUT_NAME_CLASE + count;
				
				// CONFIG: next line is affected by myRowObject settings
				var tempVal = tbl.tBodies[0].rows[i].myRow.two.value.split(' '); 
			    tbl.tBodies[0].rows[i].className = 'classy' + (count % 2);
				
				count++;
				
			}
		}
	}
}

function validarcambiocantidad(obj){
	var cant=obj;//cantidadX
	var condicion=cant.substring(0, 8);//devuelve n_canprd
	//var condicion2=cant.substring(0, 6);
	
	if(condicion=='n_canprd'){
		var nc=cant.substring(8,10);//devuelve index n_canprd		
	}
	/*else if(condicion2=='c_producto'){
		var np=cant.substring(6,10);		
	}*/
	
	var canti=document.getElementById("n_canprd"+nc).value; //cantidad de producto
	var tipopod=document.getElementById("c_producto"+nc).value;
	if(tipopod=='1' && canti!='1'){
		alert('Kardex Detallado cantidad debe ser 1');
		document.getElementById("n_canprd"+nc).value='1';
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
			$("#COD_CLASE").val('');
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
   var f = new Date();
   diaactual=f.getDate();
   $( "#NT_FDOC").datepicker({ minDate: "-"+diaactual+"D", maxDate: "+1M +10D" });    
   $( "#NT_FGUI" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });   
   
 });
 
  function validarguardar(){	  
	  var NT_FDOC=document.getElementById('NT_FDOC').value;
	   if(NT_FDOC==''){			
			var mensje = "Falta Ingresar Fecha de la Nota de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("NT_FDOC").focus();
			return 0;
		}
	  
	  var NT_TRAN=document.getElementById('NT_TRAN').value;
	   if(NT_TRAN==''){			
			var mensje = "Falta Seleccionar tipo de Transaccion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("NT_TRAN").focus();
			return 0;
		}
		
	  var c_motivo=document.getElementById('c_motivo').value;
	   if(c_motivo==''){			
			var mensje = "Falta Ingresar Motivo  de la Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_motivo").focus();
			return 0;
		}
		
		var CCOSTO=document.getElementById('ccosto').value;
	   if(NT_RESPO==''){			
			var mensje = "Falta Seleccionar el Centro de Costo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("NT_RESPO").focus();
			return 0;
		}
			
	  //validar numero de Orden de Trabajo
	   var NT_DOCR=document.getElementById('NT_DOCR').value;  
	   if(NT_DOCR==''){			
			var mensje = "Falta Ingresar Dcto Referencia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("NT_DOCR").focus();
			return 0;
		}
		
		if(document.getElementById("NT_TREM").value!='G'){	
		   ObtDatos("?c=not01&a=validarNumGuia&cod=" + NT_DOCR); 
			 var seguir=document.getElementById('seguir').value;  
			  //alert(seguir);  
			  if(seguir=="<div class='alert_error'>Orden No existe</div>"){
				  var mensje = "Orden de Trabajo No existe ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				  document.getElementById("NT_DOCR").focus();
				  return 0;
			  }
		}
		
	   var NT_CTR=document.getElementById('NT_CTR').value;
 	   if(NT_CTR==''){			
			var mensje = "Falta Buscar Proveedor del Dcto Referencia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtra").focus();
			return 0;
		}	
		
	   var NT_FGUI=document.getElementById('NT_FGUI').value;
	   if(NT_FGUI==''){			
			var mensje = "Falta Ingresar Fecha del Dcto de Referencia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("NT_FGUI").focus();
			return 0;
		}		
		
		var theTable = document.getElementById('tblSample');
		cantFilas = theTable.rows.length;
		if(cantFilas==1){
			mensje = "Falta Detalle de la Nota de Salida";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);	
			document.getElementById("c_desprd").focus();
			return 0;		
		}
		if(confirm("Seguro de Registrar la Nota de Salida ?")){
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

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE NOTA DE SALIDA POR ORDEN DE TRABAJO.</div>
 <div>   
 
 <!--modal de ver equipos-->
<form class="form-horizontal" id="frmequipo" name="frmequipo">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles</h4>        
      </div>
      	<div class="modal-body">
            <table id="tabla" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de ver equipos-->
 
  <!--modal de ver productos-->
<div class="modal fade" id="my_modalProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<form class="form-horizontal" id="frmproducto" name="frmproducto" action="?c=not01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerProductosDispo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Stock Disponible..</h4>
        <!--<input name="c_codalm" id="c_codalm" type="text"  />-->
        <input type="text" id="criterio" name="criterio" class="form-control" placeholder="Busque por Descripcion y/o Codigo de Producto" onKeyPress="abrirmodalProd2()"  />
        
      </div>
      	<div class="modal-body">
            <table id="tablaProd" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
    </form>
  </div>
 <!--fin modal de ver productos-->
 
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

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=not01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=guardaNotaSalida" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" onClick="cancelar();">Cancelar</a>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
     &nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;
    </div>
    
 <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a  href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab"  >Datos Destinatario</a></li>
    <li role="presentation"> <a  href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab"  >Datos Dcto Referencia</a></li>
    <li role="presentation"><a  href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab"  >Datos Detalle</a></li>
  </ul> 
  
  <div class="tab-content">     
	<div role="tabpanel" id="cabecera"  class="tab-pane active"   >
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
           <label class="control-label col-xs-2">Nro</label>
            <div class="col-xs-2">
             <input type="text" name="autogenerado" id="autogenerado"  class="form-control input-sm" value="Autogenerado" disabled="disabled" />  	
            </div>                     
            <label class="control-label col-xs-2">Fecha Salida</label>
            <div class="col-xs-2">
             <input type="text" id="NT_FDOC" name="NT_FDOC" class="form-control datepicker input-sm" placeholder="Fecha Documento" data-validacion-tipo="requerido" />  
             
         </div>
         	<label class="control-label col-xs-1">Tipo</label>
            <div class="col-xs-2">
              <input type="text"  value="NOTA DE SALIDA" class="form-control input-sm" readonly="readonly" />  
              <input type="hidden" id="NT_TDOC" name="NT_TDOC" value="S"  />  
            </div>   
      </div>        
   <!--fila 2-->
   <div class="form-group">
           <label class="control-label col-xs-2">Almacen</label>
        <div class="col-xs-3">
          <select name="almacen" id="almacen" class="form-control input-sm" onchange="cambiaAlmacen()" >
          	  <option value="">SELECCIONE</option>
			  <option value="000002">ALMACEN LOS OLIVOS</option>			
			  <option value="000001" selected="selected">ALM. NESTOR GAMBETA</option>
              <option value="000003">NUEVO ALM. GAMBETA</option>			
			</select>            
          <input name="c_codalm" type="hidden" id="c_codalm" value="000001"   />         	
            </div>                     
            <label class="control-label col-xs-1">Transaccion</label>
            <div class="col-xs-2">
             <select id="NT_TRAN" name="NT_TRAN"  class="form-control input-sm" o  >
                 <option value="">SELECCIONE</option>
                  <?php 
                    $listar=$this->model->ListartransacSalidaM(); 
                    foreach ($listar as $listarval){
                    ?>
                  <option value="<?php echo $listarval->TT_CODI; ?>" ><?php echo utf8_encode($listarval->TT_DESC); ?></option>
                  <?php } ?>
			 </select>               
       	  </div>  
          
           <label class="control-label col-xs-1">Usuario</label>
            <div class="col-xs-2">
               <input type="text" id="login" name="login" value="<?php echo $login; ?>" class="form-control input-sm" readonly="readonly" />              
       	    </div>         
      </div>  
      <!--FILA 3-->
       <div class="form-group">
           <label class="control-label col-xs-2">Razon Social</label>
            <div class="col-xs-3">
             <input type="hidden" name="c_nomcli" id="c_nomcli"  class="form-control input-sm" />
             <select id="xc_nomcli" name="xc_nomcli"  class="form-control input-sm" onchange="cambiacliente()"  >
                 <option value="">SELECCIONE</option>
                  <?php 
                    $ListarLineaMaritima=$this->maestro->listarClientefiltro(); 
                    foreach ($ListarLineaMaritima as $lineamar){
                    ?>
                  <option value="<?php echo utf8_encode($lineamar->datos); ?>" <?php if($lineamar->CC_RAZO=='ZGROUP SAC'){?>selected<?php }?> ><?php echo utf8_encode($lineamar->CC_RAZO); ?></option>
                  <?php } ?>
			 </select>
  
        	
            </div>                     
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="NT_CCLI" name="NT_CCLI" value="CLI00000298" class="form-control input-sm" placeholder="Codigo" readonly="readonly" />  
             
         </div>
         	<label class="control-label col-xs-1">Ruc</label>
            <div class="col-xs-2">
              <input type="text" id="c_ruccli" name="c_ruccli" value="20521180774" class="form-control input-sm" placeholder="Ruc" readonly="readonly" />  
                
            </div>   
      </div>       
       
        <!--fila 4-->
        <div class="form-group">
           <label class="control-label col-xs-2">Moneda</label>
            <div class="col-xs-3">
             <select name="NT_MONE" id="NT_MONE" class="form-control input-sm" > 
              <option value="">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>" <?php ?> <?php if($moneda->TM_CODI=='0'){?>selected<?php }?> ><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select> 
        	</div>    
              <?php
				  $fecha=date('d/m/Y');
				  foreach($this->maestro->ListarTipCambio($fecha) as $tipcam):
						 $tcambio=$tipcam->tc_cmp;	
				  endforeach;?>                   
            <label class="control-label col-xs-1">T/C</label>
            <div class="col-xs-1">
             <input type="text" id="NT_TCAMB" name="NT_TCAMB" value="<?php echo $tcambio; ?>" class="form-control input-sm" readonly="readonly" />  
        	</div>  
             <label class="control-label col-xs-2">Motivo</label>
            <div class="col-xs-2">
              <select name="c_motivo" id="c_motivo" class="form-control input-sm">
          	  <option value="">SELECCIONE</option>
			  <option value="ENTREGA">ENTREGA</option>			
			  <option value="REPOSICION">REPOSICION</option>
              <option value="PERDIDA">PERDIDA</option>			
			</select>              
        	</div>              
        </div>
		<div class="form-group">
		 <label class="control-label col-xs-2">Observacion</label>
            <div class="col-xs-2">
             <input type="text" id="NT_OBS" name="NT_OBS"  class="form-control input-sm" />              
        	</div> 
           <label class="control-label col-xs-2">Centro de Costo</label>
            <div class="col-xs-3">
             <select name="ccosto" id="ccosto" class="form-control input-sm" > 
              <option value="">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarCentroCosto() as $centro_costo):	 ?>                                 
                <option value="<?php echo $centro_costo->id_ccosto; ?>" <?php ?> <?php if($centro_costo->id_ccosto=='0'){?>selected<?php }?> ><?php echo $centro_costo->descripcion; ?></option>
                <?php  endforeach;	 ?>
             </select> 
        	</div>                 
        </div>
        
</div><!--fin tab 1-->
        
        <div role="tabpanel" id="transporte"  class="tab-pane"   >  
        
           <div class="form-group">
           <label class="control-label col-xs-1"></label>
           </div> 
           <!--fila 5-->
        <div class="form-group">
        	<label class="control-label col-xs-2">Dcto Refer.</label>
            <div class="col-xs-2">
             <select name="NT_TREM" id="NT_TREM" class="form-control input-sm"  > 
              <option value="">.:SELECCIONE:.</option> 
              <?php foreach($this->model->ListarDocuSalidaM() as $moneda):	 ?>                                 
                <option value="<?php echo utf8_encode($moneda->TD_CODI); ?>" selected="selected" ><?php echo $moneda->TD_DESC; ?></option>
                <?php  endforeach;	 ?>
                <option value="G">GUIA DE REMISION</option>
                 <option value="O">OTROS</option>
             </select>  
        	</div>
           <label class="control-label col-xs-2">Serie Dcto</label>
            <div class="col-xs-1">
             <select name="NT_SERIR" id="NT_SERIR" class="form-control input-sm"  > 
              <option value="">.:SELECCIONE:.</option> 
              <option value="000" selected="selected">000</option>
              <option value="001">001</option>
              <option value="002">002</option>
             </select> 
        	</div>                   
            <label class="control-label col-xs-2">Nro Dcto</label>
            <div class="col-xs-2">
             <!--<input type="text" id="NT_DOCR" name="NT_DOCR" class="form-control input-sm" placeholder="Nro Orden de Trabajo"
             data-validacion-tipo="requerido" /> --> 
             <input type="text" name="NT_DOCR" id="NT_DOCR" value="" class="form-control input-sm" 
               maxlength="7" onblur="ponerCeros(this)" onkeyup = "compUsuario(event)" onkeypress="return isNumberKey(event)"  /> 
               <div id="DivDestino" style="width:150px">&nbsp;</div>
                <input type="hidden" name="seguir" id="seguir" />
        	</div>   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Proveedor </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtrax" id="c_nomtrax" value="" class="form-control input-sm" placeholder="Nombre o RUC" onclick="validarot();" onkeypress="validarot();" />  
        	 <input type="hidden" name="c_nomtra" id="c_nomtra" />
            </div>
            <label class="control-label col-xs-1">RUC </label>
            <div class="col-xs-2">
             <input type="text" id="NT_CTR" name="NT_CTR" class="form-control input-sm" value="" readonly="readonly"  /> 		
            </div> 
            <label class="control-label col-xs-1">Fecha </label>
            <div class="col-xs-2">
            <input type="text" id="NT_FGUI" name="NT_FGUI" class="form-control datepicker input-sm" placeholder="Fecha Dcto Referencia" readonly="readonly" />
        	</div>           
        </div>  
        
         <!--fila 7--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Responsable </label>
            <div class="col-xs-3">
              <input type="text" id="NT_RESPO" name="NT_RESPO" value="" class="form-control input-sm" placeholder="Responsable"  />  
        	</div>           
        </div>              
                   
        
    </div> <!--end div  role="tabpanel" id="cabecera"-->
	
	<div  role="tabpanel"  id="detalle" class="tab-pane"  > 
       <div class="well well-sm">
    <div class="row">
            <!--<div class="col-xs-2"> 
            <label class="control-label col-xs-1">Tipo</label>
            </div>-->
            <div class="col-xs-3">
            <label class="control-label col-xs-1">Descripcion</label>
            </div>
            <div class="col-xs-1">
            <label class="control-label col-xs-1">Cant</label>
            </div>
            <div class="col-xs-1">
            <label class="control-label col-xs-1">Medida</label>
            </div> 
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Codigo</label>
            </div>
            <div class="col-xs-2">
            <label class="control-label col-xs-1">Glosa</label>
            </div>  
                                   
       </div>    
    
       <div class="row">
            <?php /*?><div class="col-xs-2"> 
              <select  id="xc_tipped" name="xc_tipped" class="form-control input-sm" onchange="OnchangeTipCot()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                <option value="<?php echo $a->tc_codi; ?>"> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
        	</div> <?php */?>  
            <!-- <input id="NT_PREC" name="NT_PREC" type="hidden"  value="" />-->
                
                    <div class="col-xs-3">
                        <input  id="COD_CLASE" name="COD_CLASE" type="hidden"  />
                        <input id="c_codprd" name="c_codprd" type="hidden" /><!--NT_CART-->
                        <input id="c_producto" name="c_producto" type="text" value="" />
                        <input id="IN_STOK" name="IN_STOK" type="hidden" value="" />
                        <input id="NT_PREC" name="NT_PREC" type="hidden" value="" /> <!--IN_COST-->
                        <input  id="c_desprd" name="c_desprd"  type="hidden"  />
                        <input autocomplete="off" id="descripcion" name="descripcion" class="form-control input-sm" type="text" placeholder="Nombre del producto"  onFocus="abrirmodalProd();" readonly="readonly" />
                    </div>
                    <div class="col-xs-1">
                        <input name="n_canprd" type="text" class="form-control input-sm"  id="n_canprd" value="0" onkeypress="return validaDecimal(event)"  onblur="validarcantidad();"  /> 
                        <!--<input name="idequipo" type="text" id="idequipo"   />-->
                    </div>
                    <div class="col-xs-1"> 
                    	<input name="C_SITUANT" type="hidden"  id="C_SITUANT"  placeholder="Estado Ant"  />  
                    	<input name="NT_CUND" type="text" class="form-control input-sm" id="NT_CUND"  /> <!--IN_UVTA-->                   	
                     <?php /*?><select  id="NT_CUND" name="NT_CUND" class="form-control input-sm" >
                       <option value="">SELECCIONE</option>
                       <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                       <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                       <?php  endforeach;	 ?>       
                    </select><?php */?>	
                    </div> 
                    <div class="col-xs-2">
                        <input name="c_codcont" type="text" class="form-control input-sm"  id="c_codcont" onFocus="abrirmodalEqp();" readonly  /> 
                        <!--<input name="idequipo" type="text" id="idequipo"   />-->
                    </div>
                    <div class="col-xs-2">
                        <input name="c_obsprd" type="text" class="form-control input-sm" id="c_obsprd" placeholder="Observacion"  />
                    </div>
                                       
                    <div class="col-xs-1">
                        <button class="btn btn-success btn-sm" id="btn-agregar" 
                        type="button" onclick="agregar();">
                             <i class="glyphicon glyphicon-plus"></i>
                        </button>
                        
                    </div>
                </div>            
      </div>
             <hr />
<table  id="tblSample" class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th>Descripcion</th> 
      <th>Glosa</th>  
      <th>Cantidad</th>      
      <th>Codigo Equipo</th>       
      <th>Medida</th>    
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>  
       
	</div><!--end div  role="tabpanel" id="detalle"-->
</div><!--end div class="tab-content"-->  
</form>   		                

</div>
</div>
</div>
   
<script>

//Buscar Transportista
/*$(document).ready(function(){       
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
})*/



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
		$("#c_nomtrax").autocomplete({		
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					
					url: '?c=not01&a=ProveedorBuscarOT&NT_DOCR='+document.Frmregcoti.NT_DOCR.value,
					//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
					type: "post",
					dataType: "json",
					data: {
						criterio: request.term
					},
					success: function (data) {
						response($.map(data, function (item) {
							return { //
								id: item.descripcion,
								value: item.descripcion,
								c_nomtra:item.c_nomprov,
								c_rucprov: item.c_rucprov,
								fecha: item.fecha,
								c_tecnico:item.c_tecnico
							}
						}))
					}
				})
			},
			select: function (e, ui) {
				$("#c_nomtrax").val(ui.item.id);
				$("#c_nomtra").val(ui.item.c_nomtra);
				$("#NT_CTR").val(ui.item.c_rucprov);
				$("#NT_FGUI").val(ui.item.fecha);
				$("#NT_RESPO").val(ui.item.c_tecnico);
				//$("#c_codcont").focus();
			}
		})
	})


</script>