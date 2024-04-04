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
<title>Registro de Precios</title>
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
//cliente
$().ready(function() {
	
	$("#clie").autocomplete("../MVC_Controlador/ControlDocC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#clie").result(function(event, data, formatted) {
		$("#clie").val(data[2]);
		//$("#ruc").val(data[3]);		
		//$("#dir").val(data[4]);
		//$("#textfield7").val(data[1]);		
		$("#idremitente").val(data[1]);
		$("#nombreremitente").val(data[2]);
				
	});
});

//proveedor

$().ready(function() {
	$("#prov").autocomplete("../MVC_Controlador/ControlDocC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#prov").result(function(event, data, formatted) {
		$("#prov").val(data[2]);
		$("#idremitente").val(data[1]);	
		$("#nombreremitente").val(data[2]);				
		//$("#xc_rh").val(data[6]);
		//$("#dir").val(data[7]);
		//$("#NT_CCLI").val(data[1]);//guarda desabilitado
		
				
		
	});
});


function cambiadocu(){
		document.getElementById('iddocu').value=document.form1.docu.options[document.form1.docu.selectedIndex].value;	

	}
      
function cambiadestinatario(){
		document.getElementById('iddestinatario').value=document.form1.destinatario.options[document.form1.destinatario.selectedIndex].value;	
		document.getElementById('nombredestinatario').value=document.form1.destinatario.options[document.form1.destinatario.selectedIndex].text;	

	}
  		
function cambiaremitente(){
	
	 var t=document.form1.tiporemitente.options[document.form1.tiporemitente.selectedIndex].value;
		 
	 if(t=='PROVEEDOR'){	  
		 //document.getElementById("prov").value="PROVE";
		 document.getElementById("prov").style.visibility="visible";
		 document.getElementById('apDiv1').style.display = 'block';
		 document.getElementById("clie").style.visibility="hidden";		 
		  		 
		 limpiarDatosCP();	  
	 }
	else
 	 {
	  	 //document.getElementById("clie").value="CLIENTE";		
		 document.getElementById("clie").style.visibility="visible";
		 document.getElementById("prov").style.visibility="hidden";
		 document.getElementById('apDiv1').style.display = 'none'; 	 
		 limpiarDatosCP();		 
	 }		
	
	
		document.getElementById('idtipo').value=document.form1.tiporemitente.options[document.form1.tiporemitente.selectedIndex].value;

		if(document.getElementById('idtipo').value==""){		  
		limpiarDatosCP();			
		}
	}
	
	function limpiarDatosCP(){	
		document.getElementById("prov").value="";
		document.getElementById("clie").value="";
		//document.getElementById("dir").value="";
		document.getElementById("idremitente").value="";
		document.getElementById("nombreremitente").value="";
		//document.getElementById("NT_CCLI").value="";	
	}
	
function validarcombos(){
	
	var tipooc=document.getElementById("idtipo").value;	
		if (tipooc=="") {						
		jAlert('Debe seleccionar un tipo de destinatario')
		return 0;	
		}
		
				
}
	
	
	
	
		function guardar(){		
		
		var theTable = document.getElementById('tablaDiagnostico');

		cantFilas = theTable.rows.length;

			if(cantFilas==1){
			jAlert ('Falta Detalle del Documento', 'Mensaje del Sistema');
			return 0;
			}
		
		
			
	/*		var codigo = document.getElementById("codigo").value;
			
			if(document.getElementById('precio').value==''){
					jAlert ('Ingrese Precio', 'Mensaje del Sistema');
					return 0;
					}*/	
		

			jConfirm("¿Seguro de Grabar el Documento?", "Mensaje Confirmacion", function(r) {
						if(r) {
							//document.form1.submit();
							document.getElementById("form1").submit();
						} else {
							return 0;
						}
					});


	   }
 
	   
		
	
				
</script>


<script type="text/javascript">
//VALIDACIONES

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

 ////////INICIO AUTOCOMPLETAR CON CEROS
  
 function completar1(){
      var seried=document.getElementById("seried").value;
	  cadcero='';
		for(i=0;i<(4-seried.length);i++){
		cadcero+='0';
		}
	  document.getElementById("seried").value=cadcero+seried;   
	}
	
  function completarNum1(){
	  var numerod=document.getElementById("numerod").value;
	  cadcero='';
		for(i=0;i<(7-numerod.length);i++){
		cadcero+='0';
		}
	document.getElementById("numerod").value=cadcero+numerod;   
  }



</script>

<!--Llenar tabla-->
<script type="text/javascript">	

function accion(){	

//VALIDAR QUE SE HAYAN ESCRITO LOS DATOS

if(document.getElementById('iddocu').value==''){
		jAlert('Seleccione un tipo de documento', 'Mensaje del Sistema');
		document.getElementById('iddocu').focus();
		return 0;
		}
		
	if(document.getElementById('seried').value==''){
		jAlert('Ingrese serie de documento', 'Mensaje del Sistema');
		document.getElementById('seried').focus();
		return 0;
		}
		
	if(document.getElementById('numerod').value==''){
		jAlert('Ingrese numero de documento', 'Mensaje del Sistema');
		document.getElementById('numerod').focus();
		return 0;
		}
		
	if(document.getElementById("iddestinatario").value==""){
	jAlert('Ingrese un Destinatario', 'Mensaje del Sistema');
		document.getElementById("iddestinatario").focus();
	return 0;
	}
	
	if(document.getElementById("idremitente").value==""){
		jAlert('Ingrese un Remitente', 'Mensaje del Sistema');
		document.getElementById("idremitente").focus();
		return 0;
	}	

			
	//desabilitar COMBOS
	//document.getElementById("moneda").disabled = true;
	//document.getElementById("c_nomcon").disabled = true;
	
	
	addRowToTable();
	//sumarcolumnatabla();
	limpiadatosdetalle();
	
	
	
}

	function limpiadatosdetalle(){
		
		
		
		//document.form1.docu.selectedIndex=0;	
		document.getElementById('iddocu').value='';	
		document.getElementById("docu").options[0].selected='true';
		document.form1.docu.selected='true';	
		document.getElementById('seried').value='';		
		document.getElementById('numerod').value='';	
		
			
		//document.form1.destinatario.selectedIndex=0;	
		document.getElementById("iddestinatario").value="";			
		document.getElementById("destinatario").options[0].selected='true';
		document.getElementById("nombredestinatario").value="";	
		document.getElementById("idremitente").value="";
		document.getElementById("clie").value="";
		document.getElementById("prov").value="";
		document.getElementById("nombreremitente").value="";
		document.getElementById("n_copias").value="1";
		
		document.getElementById("seried").focus();
		
		
	}











</script>

<script type="text/javascript">


var INPUT_NAME_TIPO = 'tipo'; // this is being set via script a
var INPUT_NAME_SERIE = 'serie'; // this is being set via script b
var INPUT_NAME_NDOC = 'ndoc'; // this is being set via script b
var INPUT_NAME_DESTI = 'desti'; // this is being set via script g
var INPUT_NAME_REMI = 'remi'; // this is being set via script g

var INPUT_NAME_FECHA = 'fecha2'; // this is being set via script e
var INPUT_NAME_NCOPIAS = 'n_copias'; 

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
	
	var tipo=document.getElementById("iddocu").value
	var serie=document.getElementById("seried").value
	var ndoc=document.getElementById("numerod").value
	var desti=document.getElementById("nombredestinatario").value
	var remi=document.getElementById("nombreremitente").value	
	
	var fecha=document.getElementById("fecha2").value
	var n_copias=document.getElementById("n_copias").value
	/*var can=document.getElementById("cantidad").value
	var imp=document.getElementById("imp").value
	var glo=document.getElementById("glosa").value	
	
	var impf=document.getElementById("impf").value

	var	valor=parseFloat(pre)*parseFloat(can);	
	var	nudes=(parseFloat(valor)*parseFloat(desc))/100;	
	var	valorf=parseFloat(valor)-nudes;	*/
	
	
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
		txtInpa.setAttribute('name', INPUT_NAME_TIPO + iteration);
		txtInpa.setAttribute('id', INPUT_NAME_TIPO + iteration);
		txtInpa.setAttribute('size', '10');
		txtInpa.setAttribute('value', tipo); // iteration included for debug purposes
		txtInpa.setAttribute('readonly', 'readonly');
		txtInpa.setAttribute('class', 'texto'); 
		cell1.appendChild(txtInpa);
		
		
		var cell2 = row.insertCell(2);
		var txtInpb = document.createElement('input');
		txtInpb.setAttribute('type', 'text');
		txtInpb.setAttribute('name', INPUT_NAME_SERIE + iteration);
		txtInpb.setAttribute('id', INPUT_NAME_SERIE + iteration);
		txtInpb.setAttribute('size', '17');
		txtInpb.setAttribute('value', serie); 
		//txtInpb.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpb.setAttribute('class', 'texto'); 
		cell2.appendChild(txtInpb);
		
		
		var cell3 = row.insertCell(3);
		var txtInpc = document.createElement('input');
		txtInpc.setAttribute('type', 'text');
		txtInpc.setAttribute('name', INPUT_NAME_NDOC + iteration);
		txtInpc.setAttribute('id', INPUT_NAME_NDOC + iteration);
		txtInpc.setAttribute('size', '7');
		txtInpc.setAttribute('value', ndoc); 
		txtInpc.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpc.setAttribute('class', 'texto'); 
		cell3.appendChild(txtInpc);
		
		var cell4 = row.insertCell(4);
		var txtInpd = document.createElement('input');
		txtInpd.setAttribute('type', 'text');
		txtInpd.setAttribute('name', INPUT_NAME_DESTI + iteration);
		txtInpd.setAttribute('id', INPUT_NAME_DESTI + iteration);
		txtInpd.setAttribute('size', '20');
		txtInpd.setAttribute('value', desti); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		txtInpd.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpd.setAttribute('class', 'texto'); 
		cell4.appendChild(txtInpd);
						
		
		
		
		var cell5 = row.insertCell(5);
		var txtInpe = document.createElement('input');
		txtInpe.setAttribute('type', 'text');
		txtInpe.setAttribute('name', INPUT_NAME_REMI + iteration);
		txtInpe.setAttribute('id', INPUT_NAME_REMI + iteration);
		txtInpe.setAttribute('size', '25');
		txtInpe.setAttribute('value', remi); // iteration included for debug purposes txtInpf.setAttribute('value', dsc); // iteration included for debug purposes //readonly='readonly' class="texto"
		//txtInpg.setAttribute('readonly', 'readonly'); // iteration included for debug purposes
		txtInpe.setAttribute('class', 'texto'); 
		cell5.appendChild(txtInpe);
		
		
		
		var cell6 = row.insertCell(6);
		var txtInpf = document.createElement('input');
		txtInpf.setAttribute('type', 'text');
		txtInpf.setAttribute('name', INPUT_NAME_FECHA  + iteration);
		txtInpf.setAttribute('id', INPUT_NAME_FECHA  + iteration);
		txtInpf.setAttribute('size', '10');
		txtInpf.setAttribute('value', fecha); 
		txtInpf.setAttribute('class', 'texto');
		//txtInpf.setAttribute('onkeyup','actualizar_importe(this.name)');	 
		cell6.appendChild(txtInpf);
		
		
	    var cell7 = row.insertCell(7);
		var txtInpg = document.createElement('input');
		txtInpg.setAttribute('type', 'text');
		txtInpg.setAttribute('name', INPUT_NAME_NCOPIAS + iteration);
		txtInpg.setAttribute('id', INPUT_NAME_NCOPIAS  + iteration);
		txtInpg.setAttribute('size', '5');
		txtInpg.setAttribute('value', n_copias); 
		txtInpg.setAttribute('class', 'texto');
		//txtInpf.setAttribute('onkeyup','actualizar_importe(this.name)');	 
		cell7.appendChild(txtInpg);
		
		// cell 2 - input button
		var cell8 = row.insertCell(8);
		var btnEl = document.createElement('input');
		btnEl.setAttribute('type', 'button');
		btnEl.setAttribute('value', 'Delete');
		btnEl.onclick = function () {deleteCurrentRow(this)};
		cell8.appendChild(btnEl);
		
		row.myRow = new myRowObject(textNode,txtInpa,txtInpb,txtInpc,txtInpd,txtInpe,txtInpf,txtInpg);
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
				tbl.tBodies[0].rows[i].myRow.two.name = INPUT_NAME_TIPO + count; // input text
				tbl.tBodies[0].rows[i].myRow.tres.name = INPUT_NAME_SERIE + count;				
				tbl.tBodies[0].rows[i].myRow.cuatro.name = INPUT_NAME_NDOC + count;
				tbl.tBodies[0].rows[i].myRow.cinco.name = INPUT_NAME_DESTI + count;				
				tbl.tBodies[0].rows[i].myRow.seis.name = INPUT_NAME_REMI + count;				
				tbl.tBodies[0].rows[i].myRow.siete.name = INPUT_NAME_FECHA + count;
				tbl.tBodies[0].rows[i].myRow.ocho.name = INPUT_NAME_NCOPIAS + count;
				
				
				
			
				
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



	



function copiatext(){
	document.form1.nombreremitente.value=document.form1.clie.value;
	}

</script>






<style>
#tablaDiagnostico td, th { padding: 0.2em; }
#tablaDiagnostico tr:nth-child(even) {background: #6CC }
#tablaDiagnostico tr:nth-child(odd) {background: #FFF}


</style>

<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 140px;
	height: 40px;
	z-index: 1;
	left: 106;
	top: 173px;	
	visibility:hidden;
}
</style>
</head>
<body> 

 <strong align="center">REGISTRO DE DOCUMENTOS  =&gt;<?php echo $_GET['udni'];  ?></strong>
 <form id="form1" name="form1" method="post" action="../MVC_Controlador/ControlDocC.php?acc=grabarDoc&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
    <fieldset class="fieldset legend">
    <legend style="color:#00F"><strong>Encabezado del Registro de Documentos</strong></legend>
   
   <table width="988" height="54" border="0" cellpadding="0" cellspacing="0" >
  
		<tr>
		  <td width="95" height="54">Nro Envio:</td>
		  <td width="130">			
			<input name="c_numpre"  type="text" disabled="disabled"  class="texto" id="c_numpre" value="Autogenerado" size="12" readonly="readonly"/>
            			
		  </td>
			
		  <td width="130">Fecha de Registro: </td>
		  <td width="168">
			
           <label for="fecha"></label>
			<input name="fecha"  type="text" class="texto"  id="fecha" size="12" maxlength="12" value="<?php echo date('d/m/Y');?>" /> &nbsp;<img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
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
		 
		  <td width="80">Usuario:</td>
		  <td width="130">
		    <input name="c_oper" type="text" id="c_oper" value="<?php echo $udni; ?>" readonly="readonly" class="texto" size="12"/>
		  </td> 
          <td width="100">Observacion:</td> 
          <td width="155"><textarea name="c_obsdoc" id="c_obsdoc" class="texto" cols="15" rows="2"></textarea></td>  
		</tr>
        
	  </table>
	
	</fieldset>		

       
  
<!-------------------------------------------------------------------------------------------------------------- -->


  
  <fieldset class="fieldset legend">
  <legend style="color:#C33"><strong>Detalle del Registro de Documentos</strong></legend>
  <table width="986"  border="0" cellpadding="0" cellspacing="0">
   <tr>
         <td height="32">Tipo Doc.: </td>
	   
		  <td>          
           <?php $ven2 = docuC();  
			  ?>
		    <select name="docu" id="docu" class="Combos texto" onchange="cambiadocu()" style="width:130px"  >
		      <option value="" selected="selected">.::SELECCIONE::.</option>
		      <?php foreach($ven2 as $item2){
				  $tt_codi=$item2["C_NUMITM"];
			     $tt_desc=$item2["C_DESITM"];	
				?>
		      <option value="<?php echo $tt_codi?>"><?php echo $tt_desc?></option>
		      <?php }	?>
          </select>
	      <input type="hidden" name="iddocu" id="iddocu"   />
         	 
         </td>
		  <td width="115"><b>Serie/Numero:</b></td>
	  
	   <td width="191"><input class="texto" type="text" size="5" name="seried" id="seried" onkeypress="return ValidaEntero(event)"  onchange="completar1()" maxlength="3" />
         	 <input class="texto" type="text" size="12" name="numerod" id="numerod" onkeypress="return ValidaEntero(event)" onchange="completarNum1()" maxlength="7" />
            
          </td >
        <td>Destinatario:</td>
        <td width="154">
        	<?php $ven2 = destinatarioC();  
			  ?>
		    <select name="destinatario" id="destinatario" class="Combos texto" onchange="cambiadestinatario()" style="width:105px"  >
		      <option value="" selected="selected">SELECCIONE</option>
		      <?php foreach($ven2 as $item2){
				 $udni=$item2["udni"];
			     $usuario=$item2["usuario"];	
				?>
		      <option value="<?php echo $udni?>"><?php echo $usuario?></option>
		      <?php }	?>
          </select> &nbsp;</td>
       <td width="177">Nº de copias
         <input class="texto" size="5" type="text" name="n_copias" id="n_copias" value="1" />
       </td> 
        
      </tr>
	 <tr>
	   <td width="95">Remitente: </td>
	   <td width="159" height="32">
           <select name="tiporemitente" id="tiporemitente" class="Combos texto" onchange="cambiaremitente()" style="width:130px"  >                                
                  <option value="CLIENTE">CLIENTE</option>
                  <option value="PROVEEDOR">PROVEEDOR</option>              
                 
            </select>
        <input type="hidden" name="idtipo" id="idtipo" value="CLIENTE"   />
       
       </td>
	   <td colspan="2"> 
         <input name="clie" type="text"  class="texto" id="clie" placeholder="Digite Cliente"  size="20" onclick="validarcombos();" onkeypress="validarcombos(),copiatext()"  onblur="copiatext()"/>    
         <div id="apDiv1"><input name="prov" type="text" class="texto" id="prov"  placeholder="Digite Proveedor" size="20" onclick="validarcombos();" onkeypress="validarcombos(),copiatext()"  onblur="copiatext()"/></div>
          &nbsp;
        <input name="idremitente"  class="texto" type="text" id="idremitente" size="15" placeholder="Codigo Remitente" /> 
           <input name="nombreremitente"  class="texto" type="hidden"  id="nombreremitente" size="15" placeholder="Nombre Remitente" readonly="readonly" />
        
        <input class="texto"  type="hidden" size="4" name="iddestinatario" id="iddestinatario"  readonly="readonly"  />
        <input class="texto"  type="hidden" size="4" name="nombredestinatario" id="nombredestinatario"  readonly="readonly"  /></td>
	   <td width="95">Fecha dcto: </td>
		  <td>
          			
			<input name="fecha2"  type="text" class="texto"  id="fecha2" size="12" maxlength="12" value="<?php echo date('d/m/Y');?>" /> &nbsp;<img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
			<script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fecha2",
						ifFormat   : "%d/%m/%Y",
						button     : "Image2"
						  }
						);
			 </script>
			
			<input type="hidden" name="xsum" id="xsum" />
			<input name="hora" type="hidden" id="hora" size="8" />
		    <input name="xsumar" type="hidden" id="xsumar" size="10" /> &nbsp; &nbsp; &nbsp;
            </td>
            
            <td>            
            <a href="#" onclick="accion()"><img src="../images/agregar.png" width="22" height="22" border="0"  /></a> &nbsp;&nbsp;
            <!--<input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>-->
            
		  </td>
      
      </tr>
      
      
	  
	</table>
    
     <table width="986" border="0" cellspacing="0" cellpadding="0" id="tablaDiagnostico">
    <tr>
      <td width="52" align="center" bgcolor="#CCCCCC"><strong>Item</strong></td>
      <td  height="40" width="65" align="center" bgcolor="#CCCCCC"><strong>Tipo Doc</strong></td>
      <td width="70" align="center" bgcolor="#CCCCCC"><strong>Serie Doc</strong></td>
      <td width="100" align="center" bgcolor="#CCCCCC"><strong>N° Doc</strong></td>
      <td width="191" align="center" bgcolor="#CCCCCC"><strong>Destinatario</strong></td>
      <td width="150" align="center" bgcolor="#CCCCCC"><strong>Remitente</strong></td>
      <td width="112" align="center" bgcolor="#CCCCCC"><strong>Fecha</strong></td> 
      <td width="100" bgcolor="#CCCCCC"><strong>Nº Copias</strong></td>
      <td width="159" bgcolor="#CCCCCC"><strong>Eliminar</strong></td>
    </tr>
         
    
    </table>
    
    
    
  </fieldset>
  

  
  
  
  
  
  
  <table width="996" border="0" cellspacing="0" cellpadding="0">
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
     </div>   
       
    </tr>
  </table>
   
   
   
</form>
</body>
</html>