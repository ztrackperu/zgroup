<script>
$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});

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
							url: '?c=inv02&a=DesbloquearEquiposQuit',
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
		location.href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegGuia";		
	}

}

function validartipo(){
	xc_tipped=document.getElementById('xc_tipped').value;
	c_estaequipo=document.getElementById('c_estaequipo').value;
	if(xc_tipped=='000' || c_estaequipo==''){
		var mensje = "Seleccione un tipo de Servicio ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
		document.getElementById("xc_tipped").focus();
		return 0;
	}

}

function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
} 

function validaNumero(){
		var n_canprd=document.getElementById('n_canprd').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(n_canprd)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_canprd').value='';
		document.getElementById('n_canprd').focus();
		return false;
		}
}

// VALIDAR NUMERO DE GUIA
function ponerCeros(obj) {
	if(obj.value!="" && obj.value!="0" ){
  		while (obj.value.length<8)
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
               ObtDatos("?c=inv04&a=validarNumGuia2&cod=" + input.value + "&serie=" + $("#c_serdoc").val());
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
<script src="/assets/js/bootbox.min.js"></script>

<script type="text/javascript">

//LISTAR PROVINCIAS DEL LUGAR DE PARTIDA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    //$("#c_propartida").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_deppartida").change(function(){
        // Guardamos el select de provincias
        var provincias = $("#c_propartida");
		var distritos = $("#c_dispartida");
        // Guardamos el select de departamentos
        var departamentos = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : departamentos.val() },
                url:   '?c=inv04&a=ListaProvincias',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    departamentos.prop('disabled', true);
                },
                success:  function (r) 
                {
                    departamentos.prop('disabled', false);

                    // Limpiamos el select
                    provincias.find('option').remove();					
 					distritos.find('option').remove();
					distritos.val('00');
                    $(r).each(function(i, v){ // indice, valor
                        provincias.append('<option value="' + v.NOMBRE_PROV + '">' + v.NOMBRE_PROV + '</option>');
                    })

                    provincias.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    departamentos.prop('disabled', false);
                }
            });
        }
        else
        {
            provincias.find('option').remove();
            provincias.prop('disabled', true);
        }
    })

});

//LISTAR DISTRITOS DEL LUGAR DE PARTIDA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    //$("#c_dispartida").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_propartida").change(function(){
        // Guardamos el select de provincias
        var distritos = $("#c_dispartida");

        // Guardamos el select de departamentos
		var departamentos = $(this);
        var provincias = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : provincias.val() },
                url:   '?c=inv04&a=ListaDistritos',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    provincias.prop('disabled', true);
                },
                success:  function (r) 
                {
                    provincias.prop('disabled', false);

                    // Limpiamos el select
                    distritos.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        distritos.append('<option value="' + v.NOMBRE_DISTRITO + '">' + v.NOMBRE_DISTRITO + '</option>');
                    })

                    distritos.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    provincias.prop('disabled', false);
                }
            });
        }
        else
        {
            distritos.find('option').remove();
            distritos.prop('disabled', true);
        }
    })

});
///////////////////////////////////////////////////////////

//LISTAR PROVINCIAS DEL LUGAR DE ENTREGA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    $("#c_proentrega").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_depentrega").change(function(){
        // Guardamos el select de provincias
        var provincias = $("#c_proentrega");
		var distritos = $("#c_disentrega");
        // Guardamos el select de departamentos
        var departamentos = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : departamentos.val() },
                url:   '?c=inv04&a=ListaProvincias',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    departamentos.prop('disabled', true);
                },
                success:  function (r) 
                {
                    departamentos.prop('disabled', false);

                    // Limpiamos el select
                    provincias.find('option').remove();					
 					distritos.find('option').remove();
					distritos.val('00');
                    $(r).each(function(i, v){ // indice, valor
                        provincias.append('<option value="' + v.NOMBRE_PROV + '">' + v.NOMBRE_PROV + '</option>');
                    })

                    provincias.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    departamentos.prop('disabled', false);
                }
            });
        }
        else
        {
            provincias.find('option').remove();
            provincias.prop('disabled', true);
        }
    })

});

//LISTAR DISTRITOS DEL LUGAR DE ENTREGA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    $("#c_disentrega").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_proentrega").change(function(){
        // Guardamos el select de provincias
        var distritos = $("#c_disentrega");

        // Guardamos el select de departamentos
		var departamentos = $(this);
        var provincias = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : provincias.val() },
                url:   '?c=inv04&a=ListaDistritos',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    provincias.prop('disabled', true);
                },
                success:  function (r) 
                {
                    provincias.prop('disabled', false);

                    // Limpiamos el select
                    distritos.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        distritos.append('<option value="' + v.NOMBRE_DISTRITO + '">' + v.NOMBRE_DISTRITO + '</option>');
                    })

                    distritos.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    provincias.prop('disabled', false);
                }
            });
        }
        else
        {
            distritos.find('option').remove();
            distritos.prop('disabled', true);
        }
    })

});

function limpiar(){
	document.Frmregcoti.c_codprd.value='';
	document.Frmregcoti.c_desprd.value='';
	document.Frmregcoti.c_tipped.value='';
	}

function OnchangeTipCot(){
	limpiar();	
var tipocoti=document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;
	document.Frmregcoti.c_tipped.value=tipocoti;
	if(tipocoti=='001'){
		document.getElementById('c_estaequipo').value='V';
	}else if(tipocoti=='017'){
		document.getElementById('c_estaequipo').value='A';
	}else if(tipocoti=='015'){
		document.getElementById('c_estaequipo').value='M';
	}else if(tipocoti=='002'){
		document.getElementById('c_estaequipo').value='R';
	}else if(tipocoti=='019'){
		document.getElementById('c_estaequipo').value='Z';//SERVICIO DE ALMACENAJE
		document.Frmregcoti.c_tipped.value='001';
	}
	
	
	document.Frmregcoti.c_desprd.focus();
	}
	
var INPUT_NAME_PREFIX = 'c_codprd'; // this is being set via script a
var INPUT_NAME_TIPPED = 'c_tipped'; // this is being set via script a
var INPUT_NAME_DES = 'c_desprd'; // this is being set via script b
var INPUT_NAME_CAN = 'n_canprd'; // this is being set via script c
var INPUT_NAME_OBS = 'c_obsprd'; // this is being set via script e
var INPUT_NAME_ESTA = 'c_estaequipo';
var INPUT_NAME_EQP = 'c_codcont'; // this is being set via script g
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
	var c_tipped=document.getElementById("c_tipped").value
	var des=document.getElementById("c_desprd").value	
	var can=document.getElementById("n_canprd").value
	var serie=document.getElementById("c_codcont").value	
	var obs=document.getElementById("c_obsprd").value
	var c_estaequipo=document.getElementById("c_estaequipo").value
		
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
		txtInpb2.setAttribute('type', 'number');
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
		txtInpde.setAttribute('value', c_estaequipo); // iteration included for debug purposes 
		txtInpde.setAttribute('readonly', 'readonly');
		txtInpde.setAttribute('class', 'form-control input-sm'); 		
		cell5.appendChild(txtInpde);		
		
		// cell 1 - input text
		var cell6 = row.insertCell(7);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'hidden');
		txtInpf.setAttribute('name', INPUT_NAME_TIPPED + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_TIPPED + iteration);
		txtInpf.setAttribute('size', '2');
		txtInpf.setAttribute('value', c_tipped); // iteration included for debug purposes
		txtInpf.setAttribute('readonly', 'readonly');
		txtInpf.setAttribute('class', 'class="form-control input-sm"'); 
		cell6.appendChild(txtInpf);
		

		var cell7 = row.insertCell(8);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.setAttribute('class', 'btn btn-danger btn-sm'); 
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell6.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpb2,txtInpc,txtInpd,txtInpde,txtInpf);
	
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
					url: '?c=inv02&a=DesbloquearEquiposQuit',
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
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_TIPPED + count;		
				
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

function agregar(){
	
	var tipocoti=document.Frmregcoti.xc_tipped.options[document.Frmregcoti.xc_tipped.selectedIndex].value;		
		if(tipocoti=="000"){
		var mensje = "Falta Seleccionar Tipo de Servicio";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("xc_tipped").focus();		
			
		}else if((document.Frmregcoti.c_codprd.value)==""){
			mensje = "Falta Ingresar Descripcion";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("c_desprd").focus();
			
		}else if((document.Frmregcoti.n_canprd.value)=="0" || (document.Frmregcoti.n_canprd.value)==""){
			mensje = "Falta Ingresar Cantidad";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
		}else if( (document.Frmregcoti.c_codcont.value)=="" && (document.Frmregcoti.detallado.value)=="1" ){
			mensje = "Falta Ingresar Codigo de Equipo";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			//document.getElementById("c_codcont").focus();		
			
		}else if(((document.Frmregcoti.n_canprd.value)!="1" ) && (document.Frmregcoti.detallado.value)=="1" ){
			mensje = "Producto detallado cantidad debe ser 1";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);	
			//document.Frmregcoti.n_canprd.value=="1";
		}else if((document.Frmregcoti.c_estaequipo.value)==""){
			mensje = "Falta Seleccionar Estado del Equipo";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			document.getElementById("c_estaequipo").focus();
			
		}else{        
			addRowToTable();		
			$("#c_codprd").val('');
			$("#c_desprd").val('');	
			$("#n_canprd").val('0');		
			$("#c_codcont").val('');
			$("#c_obsprd").val('');
			
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
   $( "#d_fecgui" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });
   $( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });
 
  function validarguardar(){
	  //validar numero de guia
	   var c_nume=document.getElementById('c_nume').value;  	   
	    var c_serdoc = document.getElementById('c_serdoc').value;
	    	   if(c_nume==''){			
			var mensje = "Falta Ingresar Nro guia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nume").focus();
			return 0;
		}
	var campaña = document.getElementById('campaña').value;
     if (campaña == '00') {
         var mensje = "Falta Seleccionar el tipo de campaña...!!!";
         $('#alertone').modal('show');
         $('#mensaje').val(mensje);
         document.getElementById("campaña").focus();
         return 0;
     }
	       
         ObtDatos("?c=inv04&a=validarNumGuia2&cod="+ c_nume +"&serie=" + c_serdoc);
		 var seguir=document.getElementById('seguir').value;  
		  //alert(seguir);  
		  if(seguir=="<div class='alert_error'>Guia Ya Registrada</div>"){
			  var mensje = "Guia ya Registrada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			  document.getElementById("c_nume").focus();
			  return 0;
		  }
		
     
	   var c_nomdes=document.getElementById('c_nomdes').value;
 	   if(c_nomdes==''){			
			var mensje = "Falta Buscar Cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomdes").focus();
			return 0;
		}
		
	   var c_coddes=document.getElementById('c_coddes').value;
 	   if(c_coddes==''){			
			var mensje = "Falta Buscar y Seleccionar Cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomdes").focus();
			return 0;
		}
			
	   var c_ructra=document.getElementById('c_ructra').value;
 	   if(c_ructra==''){			
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtra").focus();
			return 0;
		}
			
		var c_chofer=document.getElementById('c_chofer').value;			
		if(c_chofer==''){
			var mensje = "Falta Buscar Chofer ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_chofer").focus();
			return 0;
		}
			
		var c_placa=document.getElementById('c_placa').value;		 					
		if(c_placa==''){
			var mensje = "Falta Ingresar Placa Tracto ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa").focus();
			return 0;
		}
		
		var c_placa2=document.getElementById('c_placa2').value;	 					
		if(c_placa2==''){
			var mensje = "Falta Ingresar Placa Carreta ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa2").focus();
			return 0;
		}
		
		//INICIA VALIDAR PARTIDA Y ENTREGA
		var c_deppartida=document.getElementById('c_deppartida').value;	 					
		if(c_deppartida=='00'){
			var mensje = "Falta Seleccionar Departamento de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_deppartida").focus();
			return 0;
		}
		var c_propartida=document.getElementById('c_propartida').value;	 					
		if(c_propartida=='[ Provincia ]' || c_propartida=='00'){
			var mensje = "Falta Seleccionar Provincia de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_propartida").focus();
			return 0;
		}
		var c_dispartida=document.getElementById('c_dispartida').value;	 					
		if(c_dispartida=='00'){
			var mensje = "Falta Seleccionar Distrito de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_dispartida").focus();
			return 0;
		}
		
		var c_depentrega=document.getElementById('c_depentrega').value;	 					
		if(c_depentrega=='00'){
			var mensje = "Falta Seleccionar Departamento de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_depentrega").focus();
			return 0;
		}
		var c_proentrega=document.getElementById('c_proentrega').value;	 					
		if(c_proentrega=='[ Provincia ]' || c_proentrega=='00'){
			var mensje = "Falta Seleccionar Provincia de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_proentrega").focus();
			return 0;
		}
		var c_disentrega=document.getElementById('c_disentrega').value;	 					
		if(c_disentrega=='00'){
			var mensje = "Falta Seleccionar Distrito de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_disentrega").focus();
			return 0;
		}		
		//FIN VALIDAR PARTIDA Y ENTREGA	
			
		var c_llega=document.getElementById('c_llega').value;	 					
		if(c_llega==''){
			var mensje = "Falta Ingresar Lugar de entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_llega").focus();
			return 0;
			 					
		}
		var theTable = document.getElementById('tblSample');
		cantFilas = theTable.rows.length;
		if(cantFilas==1){
			mensje = "Falta Detalle de Guia";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);	
			document.getElementById("c_desprd").focus();
			return 0;		
		}
		if(confirm("Seguro de Registrar Guia ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }

//ver series
function abrirmodalEqp(){
	$('#my_modal').modal('show');				
	var c_codprd=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("c_codprd = " + c_codprd);
	 $('#tabla').load("?c=inv04&a=VerEquiposDispo",{c_codprd:c_codprd});	
}

//BUSCAR CHOFER
function abrirmodalTrans(){	
	 var c_nomtra=document.getElementById('c_nomtra').value;
	 var c_ructra=document.getElementById('c_ructra').value;
	 if(c_nomtra==''||c_ructra==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtra").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtra;
	 	$('#tablaTrans').load("?c=inv04&a=VerChoferes",{c_nomtra:c_nomtra,c_ructra:c_ructra});	
	 }
}

function abrirmodalForwarder(){	
		$('#my_modalForwarder').modal('show');	 	
	 	$('#tablaForwarder').load("?c=inv04&a=VerForwarder");		 
}

</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $titulo; ?></div>
 <div>  
 
 <!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR CHOFER-->
 
 <!--modal de ver equipos-->
<form class="form-horizontal" id="frmequipo" name="frmequipo">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles.</h4>
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
 
   <!--modal de BUSCAR Forwarder-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalForwarder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Listado de Forwarder <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaForwarder" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR Forwarder-->
 
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

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarRegGuia" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" onClick="cancelar();">Cancelar</a>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
     &nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;
    </div>
    
 <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a  href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab"  >Datos Destinatario</a></li>
    <li role="presentation"> <a  href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
    <li role="presentation"><a  href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab"  >Datos Detalle</a></li>
  </ul> 
  
  <div class="tab-content">     
	<div role="tabpanel" id="cabecera"  class="tab-pane active"   >
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
          <label class="control-label col-xs-1">Nº Cotiz.</label>
          <div class="col-xs-2">
             <input type="text" name="c_numped" id="c_numped" value="<?php echo $c_numped; ?>" class="form-control input-sm" readonly="readonly" />  
          </div>
          <label class="control-label col-xs-2">Nº Asign.</label>
          <div class="col-xs-2">
             <input type="text" name="n_idasig" id="n_idasig" value="<?php echo $n_idasig; ?>" class="form-control input-sm" readonly="readonly" />  
          </div>
          <label class="control-label col-xs-1">Motivo</label>
          <div class="col-xs-2">
             <input type="text" name="c_motivo" id="c_motivo" value="<?php echo $c_motivo; ?>" class="form-control input-sm" readonly="readonly" />  
          </div>
            
        </div>
        
        <!--fila 2-->
       <div class="form-group">
       		<label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecgui" id="d_fecgui" value="<?php echo date('d/m/Y'); ?>" class="form-control datepicker input-sm" placeholder="Fecha y Hora" data-validacion-tipo="requerido" />
        	</div>           
            <label class="control-label col-xs-2">Serie </label>
            <div class="col-xs-2">
                <select name="c_serdoc" id="c_serdoc" class="form-control input-sm">
                    <option value="001">001</option>
                    <option value="G07" selected="selected">G07</option>
                    <option value="002">002</option>
                    <option value="003">003</option>
                    <option value="004">004</option>
                    <option value="005">005</option>
                    <option value="006">006</option>
                </select>	
               
            </div>                   
            <label class="control-label col-xs-1">N° Guia </label>
            <div class="col-xs-2">
            	<input type="text" name="c_nume" id="c_nume" value="<?php //echo $c_nume; ?>" class="form-control input-sm" 
                 maxlength="7" onblur="ponerCeros(this)"  onkeyup="compUsuario(event)" onkeypress="return isNumberKey(event)"   /> 
                 <?php echo 'Ultima Guia Generada Verifique en Fisico :'.$c_nume; ?> 
                <div id="DivDestino" style="width:150px">&nbsp;                  
                </div>
                <input type="hidden" name="seguir" id="seguir" />
        	</div>   
        </div>
   <!--fila 3-->
   		<div class="form-group">         	 
           <label class="control-label col-xs-1">Transaccion </label>
            <div class="col-xs-2">
               <select name="c_codtra" id="c_codtra" class="form-control input-sm"> 
                <option value="7">TRANSFERENCIA SALIDA</option>
                <option value="8">TRANSFERENCIA INGRESO</option>
               </select>          	
            </div>   
            <label class="control-label col-xs-2">Dcto Ref.</label>
            <div class="col-xs-2">
             <input type="text" id="c_docref" name="c_docref" class="form-control input-sm"    />  
            </div>
            <label class="control-label col-xs-1">Forwarder</label>
            <div class="col-xs-2">
             <input type="text" id="n_forwarder" name="n_forwarder" class="form-control input-sm" onFocus="abrirmodalForwarder();"     />  
            </div>                  	
              
        </div> 
            
       <hr />
       <!--fila 3-->
       <div class="form-group">
           <label class="control-label col-xs-1">Cliente</label>
                <div class="col-xs-3"><?PHP// $var1=""; $var2=""; $var3=""; ?>
                    <!--<SELECT name="c_nomdes" id="c_nomdes" class="form-control input-sm select2"> 
                                    <?php //foreach($this->maestro->ListarClientes() as $r): $var1=$r->CC_RUC; $var2=$r->CC_RAZO;  $var3=$r->CC_NRUC; ?> 
                        <option value="<?php //echo $var1;  ?>"> <?php // echo $var2; ?> </option>
                                    <?php // endforeach; ?>
                    </SELECT> -->      
                    <input type="text" id="c_nomdes" name="c_nomdes" value="<?php echo $c_nomdes; ?>" class="form-control input-sm" placeholder="Cliente" <?php if($c_nomdes!=''){ ?>  readonly="readonly" <?php } ?> />
                </div>                     
            <label class="control-label col-xs-1">Codigo</label>
                <div class="col-xs-2">
                    <input type="text" id="c_coddes" name="c_coddes" value="<?php echo $c_coddes; ?>" class="form-control input-sm" placeholder="Nro ruc" <?php if($c_coddes!=''){ ?>  readonly="readonly" <?php } ?>  />  
                </div>
            <label class="control-label col-xs-1">RUC</label>
                <div class="col-xs-2">
                    <input type="text" id="c_rucdes" name="c_rucdes" value="<?php echo $c_rucdes; ?>" class="form-control input-sm" placeholder="Nro ruc" <?php if($c_rucdes!=''){ ?>  readonly="readonly" <?php } ?>  />  
                </div>            
        </div> 
		<div class="form-group">
                            <label class="control-label col-xs-1">Campaña</label>
                            <div class="col-xs-3">
                                <select name="campaña" id="campaña" class="select2 form-control input-sm">
                                    <option value="00">SELECCIONE</option>
                                    <option value="NO DEFINIDO">NO DEFINIDO</option>
                                    <option value="SAN FERNANDO 2019">SAN FERNANDO 2019</option>
                                </select>
                            </div>
                        </div>
    </div>
        
        <div role="tabpanel" id="transporte"  class="tab-pane"   >  
        
           <div class="form-group">
           <label class="control-label col-xs-1"></label>
           </div> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Transportista </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtra" id="c_nomtra" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructra" name="c_ructra" value=""  /> 		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_chofer" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />  
            
             </div>
         	<label class="control-label col-xs-1">Licencia</label>
            <div class="col-xs-2">
            <input type="text" name="c_licenci" id="c_licenci" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido|email" /> 
        	</div>   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marca" id="c_marca" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-2">Placa </label>
            <div class="col-xs-1">
             <input name="c_placa" id="c_placa" type="text" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input name="c_placa2" id="c_placa2" type="text" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
            <label class="control-label col-xs-1">F. Traslado </label>
            <div class="col-xs-2">
             <input type="text" name="d_fecref" id="d_fecref" value="<?php echo date('d/m/Y'); ?>" class="form-control datepicker input-sm" placeholder="Fecha Traslado" data-validacion-tipo="requerido" />
        	</div>        	  
        </div>
        <hr />         
         <!--fila 7--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Lugar de Partida</label>
            <div class="col-xs-3">
             <!--<textarea name="c_partida" id="c_partida" class="form-control input-sm" rows="2" placeholder="Lugar de Partida" >AV NESTOR GAMBETTA KM 7, CALLAO</textarea>-->
             <input name="c_parti" id="c_parti" type="text" class="form-control input-sm"   value="AV NESTOR GAMBETTA KM 7.5, CALLAO"  />
        	</div>               
            <div class="col-xs-2">
              <select id="c_deppartida" name="c_deppartida"  class="form-control input-sm" >
                   <option selected value="00">[ Departamento ]</option>                    
                   <?php foreach($this->maestro->ListaDepartamentos() as $depa):	 ?>                                   
                   <option value="<?php echo $depa->NOMBRE_DEPTO; ?>" <?php echo $depa->NOMBRE_DEPTO == 'CALLAO' ? 'selected' : ''; ?>  > <?php echo $depa->NOMBRE_DEPTO; ?> </option>
                   <?php  endforeach;	 ?>                         
               </select>
           </div>           
           <div class="col-xs-2">
              <select id="c_propartida" name="c_propartida"  class="form-control input-sm" >
                   <option selected value="00">[ Provincia ]</option>  
                   <option value="<?php echo 'CALLAO' ?>" selected="selected"  > <?php echo 'CALLAO' ?> </option>                     
               </select>
           </div>
           <div class="col-xs-2">
              <select id="c_dispartida" name="c_dispartida"  class="form-control input-sm" >
                   <option selected value="00">[ Distrito ]</option> 
                   <option value="<?php echo 'CALLAO' ?>" selected="selected"  > <?php echo 'CALLAO' ?> </option>                        
               </select>
           </div>        	   
        </div> 
        
        <!--fila 8--> 
         <div class="form-group">  
            <label class="control-label col-xs-2">Lugar de Entrega</label>          
            <div class="col-xs-3">
            <!-- <textarea name="c_llega" id="c_llega" class="form-control input-sm" rows="1" placeholder="Lugar de Entrega" ></textarea>-->
             <input type="text" name="c_llega" id="c_llega" value="" class="form-control input-sm" placeholder="Lugar de Entrega"  />  
          	 </div> 
             <div class="col-xs-2">
               <select id="c_depentrega" name="c_depentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Departamento ]</option>                    
                   <?php foreach($this->maestro->ListaDepartamentos() as $depa):	 ?>                                   
                   <option value="<?php echo $depa->NOMBRE_DEPTO; ?>"  > <?php echo $depa->NOMBRE_DEPTO; ?> </option>
                   <?php  endforeach;	 ?>                         
                </select>            
               </div>  
               <div class="col-xs-2">
              <select id="c_proentrega" name="c_proentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Provincia ]</option>                       
               </select>
           </div>
           <div class="col-xs-2">
              <select id="c_disentrega" name="c_disentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Distrito ]</option>                         
               </select>
           </div>               	   
        </div> 
         <!--fila 8--> 
         <div class="form-group">     
            <label class="control-label col-xs-2">Observacion </label>
            <div class="col-xs-5">
            <!-- <textarea name="c_glosa" id="c_glosa" class="form-control input-sm" rows="2" placeholder="Observacion" ></textarea>-->
             <input type="text" name="c_glosa" id="c_glosa" value="" class="form-control input-sm" placeholder="Observacion"  />  
        	</div>  
            <label class="control-label col-xs-1">Selva </label>
            <div class="col-xs-1">
            <input type="checkbox" name="sw_selva" id="sw_selva" value="1" class="input-sm" />  
        	</div> 
                  	   
        </div>            
        
    </div> <!--end div  role="tabpanel" id="cabecera"-->
	
	<div  role="tabpanel"  id="detalle" class="tab-pane"  > 
       <div class="well well-sm">
    <div class="row">
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Tipo</label>
            </div>
            <div class="col-xs-3">
            <label class="control-label col-xs-1">Descripcion</label>
            </div>
            <div class="col-xs-1">
            <label class="control-label col-xs-1">Cant</label>
            </div>
            <div class="col-xs-2"> 
            <label class="control-label col-xs-1">Codigo</label>
            </div>
            <div class="col-xs-2">
            <label class="control-label col-xs-1">Observacion</label>
            </div>  
            <div class="col-xs-1">
            <label class="control-label col-xs-1">Estado</label>
            </div>                        
       </div>    
    
       <div class="row">
            <div class="col-xs-2"> 
              <select  id="xc_tipped" name="xc_tipped" class="form-control input-sm" onchange="OnchangeTipCot()">
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                <option value="<?php echo $a->tc_codi; ?>"> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>		
        	</div>   
             <input id="c_tipped" name="c_tipped" type="hidden"  value="" />
                
                    <div class="col-xs-3">
                        <input id="c_codprd" name="c_codprd" type="hidden" />
                        <input id="detallado" name="detallado" type="hidden" value="" />
                        <input autocomplete="off" id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Nombre del producto" onclick="validartipo();" />
                    </div>
                    <div class="col-xs-1">
                        <input name="n_canprd" type="text" class="form-control input-sm"  id="n_canprd" value="0" onBlur="validaNumero();" onkeypress="return validaDecimal(event)"  /> 
                        <!--<input name="idequipo" type="text" id="idequipo"   />-->
                    </div>
                    <div class="col-xs-2">
                        <input name="c_codcont" type="text" class="form-control input-sm"  id="c_codcont" onFocus="abrirmodalEqp();" readonly  /> 
                        <!--<input name="idequipo" type="text" id="idequipo"   />-->
                    </div>
                    <div class="col-xs-2">
                        <input name="c_obsprd" type="text" class="form-control input-sm" id="c_obsprd" placeholder="Observacion"  />
                    </div>
                    <div class="col-xs-1"> 
                    	<input name="c_estaequipo" type="text" class="form-control input-sm" id="c_estaequipo" placeholder="Estado"  />                    	
                     <?php /*?><select  id="c_estaequipo" name="c_estaequipo" class="form-control input-sm" >
                       <option value="">SELECCIONE</option>
                       <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                       <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                       <?php  endforeach;	 ?>       
                    </select><?php */?>	
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
      <th>Cantidad</th>      
      <th>Codigo Equipo</th>     
      <th>Observacion</th> 
      <th>Estado</th>    
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

$(document).ready(function(){   
    
    /* Autocomplete de c_nomtra, jquery UI */
    $("#c_nomtra").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ProveedorBuscar', //en procesosinv.controller.php
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtra").val(ui.item.id);
			$("#c_ructra").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Cliente
$(document).ready(function(){     
    /* Autocomplete de cliente, jquery UI */
    $("#c_nomdes").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar', //en procesosinv.controller.php
				//contentType: "application/x-www-form-urlencoded;charset=utf-8",
				//contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
				                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.CC_RUC,
                            value: item.CC_RAZO,
							ruc:item.CC_NRUC                          
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {			
            $("#c_coddes").val(ui.item.id);
			$("#c_rucdes").val(ui.item.ruc);
           
        }
    })
})

</script>

<!--autocomplete producto-->
<script>
$(document).ready(function(){   
    $("#c_desprd").autocomplete({
		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=inv02&a=ProductoBuscar&tp='+document.Frmregcoti.c_tipped.value,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
                            id: item.IN_CODI,
                            value: item.IN_ARTI,
							c_equipo: item.c_equipo
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			$("#c_codprd").val(ui.item.id);
			$("#detallado").val(ui.item.c_equipo);
			$("#c_codcont").val('');
            //$("#c_codcont").focus();
        }
    })
})
</script>