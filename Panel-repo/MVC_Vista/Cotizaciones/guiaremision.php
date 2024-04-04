<?php 
$ven = NroguiacabC();
    
  foreach($ven as $item){
	  $nro=$item['cod']+1;
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Registro de Guias Remision</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
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

<link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
<script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>
<script type="text/javascript">
$().ready(function() {
	$("#textfield3").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield3").result(function(event, data, formatted) {
		$("#textfield3").val(data[2]);
		$("#textfield7").val(data[3]);
		//$("#lentrega").val(data[4]);
		$("#xlentrega").val(data[4]);
		$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#transportista").autocomplete("../MVC_Controlador/cajaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#transportista").result(function(event, data, formatted) {
		$("#transportista").val(data[2]);
		$("#hiddenField2").val(data[1]);
			$("#chofer").val(data[4]);
				$("#placa").val(data[3]);
				$("#licencia").val(data[5]);
								//$("#marca").val(data[6]);	
		//document.getElementById('textfield3').focus();
	});
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#chofer").autocomplete("../MVC_Controlador/cajaC.php?acc=autotransportista", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#chofer").result(function(event, data, formatted) {
		$("#chofer").val(data[0]);
		$("#licencia").val(data[1]);
		$("#placa").val(data[2]);
	});
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#prov").autocomplete("../MVC_Controlador/cajaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#prov").result(function(event, data, formatted) {
		$("#prov").val(data[2]);
		$("#textfield7").val(data[1]);
	});
});
</script>
<script type="text/javascript">	
$().ready(function() {
	$("#material").autocomplete("../MVC_Controlador/cajaC.php?acc=proautoguia", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#material").result(function(event, data, formatted) {
		$("#material").val(data[2]);
		$("#codigorepuesto").val(data[1]);
		$("#hiddenField3").val(data[1]);
		//$("#unidad").val(data[1]);
		$("#hiddenField5").val(data[1]);

		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});

function copiarcodigo(){
	document.formElem.unidad.value=document.formElem.hiddenField3.value;
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
		
</script>

<script type="text/javascript">	
//$().ready(function() {
//	$("#unidad").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
//		width: 260, 
//		matchContains: true,
//		selectFirst: false
//	});	
//	$("#unidad").result(function(event, data, formatted) {
////		$("#material").val(data[2]);
//		$("#unidad").val(data[0]);
//		$("#hiddenField3").val(data[0]);
//	document.formElem.precio.focus();
//	});
//	
//});
			
</script>

<script type="text/javascript">

var  posicionCampo=1;
function agregarUsuario(){
	
		nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='tarea"+posicionCampo+"' type='text' id='tarea"+posicionCampo+ "' size='30' readonly='readonly' class='texto'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='timees"+posicionCampo+"' type='text' id='timees"+posicionCampo+ "' size='10' readonly='readonly' class='texto'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='timere"+posicionCampo+"' type='text'  id='timere"+posicionCampo+"'  size='10' readonly='readonly' class='texto'/><a href='#'> <img src='../images/user_logout.png' value='Eliminar'  onclick='eliminarUsuario(this)'></a>  ";
escribirDiagnostico(posicionCampo);
		posicionCampo++;
    }
function escribirDiagnostico(posicionCampo)
{
			tarea = document.getElementById("tarea" + posicionCampo);
			tarea.value = document.formElem.tarea.value;
			
			
			timees = document.getElementById("timees" + posicionCampo);
			timees.value = document.formElem.timees.value;
			
			
			timere = document.getElementById("timere" + posicionCampo);
			timere.value = document.formElem.timere.value;
			
		
}
function eliminarDiagnosticos()
{
	if (posicionCampo > 1)
	{
		document.getElementById("tablaDiagnostico").deleteRow(posicionCampo + 1);
		posicionCampo = posicionCampo - 1;
	}
	else
	{
		alert("No hay filas para eliminar");
		document.getElementById("tarea").value="";
		document.getElementById("time1").value="";
		document.getElementById("time2").value="";
	}       
}
function add(){
	agregarUsuario();
	//escribirDiagnostico();
	document.getElementById("tarea").value="";
		document.getElementById("time1").value="";
		document.getElementById("time2").value="";
	document.getElementById("tarea").focus();
	}
	
	
	

//****************************/
var  posicionCampo2=1;
function agregarUsuario2(){
	
		nuevaFila = document.getElementById("tablaDiagnostico2").insertRow(-1);
		nuevaFila.id=posicionCampo2;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='material"+posicionCampo2+"' type='text' id='material"+posicionCampo2+ "' size='40' readonly='readonly' class='texto'></td>";  
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='codigorepuesto"+posicionCampo2+"' type='hidden' id='codigorepuesto"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";		
		
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='unidad"+posicionCampo2+"' type='text' id='unidad"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='cant"+posicionCampo2+"' type='text' id='cant"+posicionCampo2+ "' size='5' readonly='readonly' class='texto'></td> ";
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='cantutil"+posicionCampo2+"' type='text' id='cantutil"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> "; 
		 
		nuevaCelda=nuevaFila.insertCell(-1);
nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='estaequi"+posicionCampo2+"' type='text'  id='estaequi"+posicionCampo2+"'  size='5' readonly='readonly' class='texto'/><a href='#'> <img src='../images/user_logout.png' value='Eliminar'  onclick='eliminarUsuario2(this)'></a>  ";
escribirDiagnostico2(posicionCampo2);
		posicionCampo2++;
    }
function escribirDiagnostico2(posicionCampo2)
{
			material = document.getElementById("material" + posicionCampo2);
			material.value = document.formElem.material.value;
				codigorepuesto = document.getElementById("codigorepuesto" + posicionCampo2);
			codigorepuesto.value = document.formElem.codigorepuesto.value;
			
			unidad = document.getElementById("unidad" + posicionCampo2);
			unidad.value = document.formElem.unidad.value;
			
			
			cant = document.getElementById("cant" + posicionCampo2);
			cant.value = document.formElem.cant.value;
			
			cantutil = document.getElementById("cantutil" + posicionCampo2);
			cantutil.value = document.formElem.cantutil.value;
			
			
			estaequi=document.getElementById("estaequi" + posicionCampo2);
			estaequi.value =  document.formElem.estaequi.options[document.formElem.estaequi.selectedIndex].value;
			
			//estaequi = document.getElementById("estaequi" + posicionCampo2);
			//estaequi.value = document.formElem.estaequi.value;
		
}
function eliminarDiagnosticos2()
{
	if (posicionCampo > 1)
	{
		document.getElementById("tablaDiagnostico").deleteRow(posicionCampo2 + 1);
		posicionCampo2 = posicionCampo2 - 1;
	}
	else
	{
		alert("No hay filas para eliminar");
		document.getElementById("tarea").value="";
		document.getElementById("time1").value="";
		document.getElementById("time2").value="";
	}       
}
function add2(){
	
	if(document.formElem.estaequi.options[document.formElem.estaequi.selectedIndex].text=='DISPONIBLE'){
		alert('Ingrese Estado');
		return 0;
	}
	if(document.formElem.unidad.value=='-' || document.formElem.unidad.value=='.' || document.formElem.unidad.value==',' || document.formElem.unidad.value=='0'){
		alert('Codigo no Valido\n sino cuenta con codigo regularize');
		return 0;
	}
		
	if(document.formElem.unidad.value==''){
		alert('Codigo no puede ser campo vacio');
		return 0;
	}

	agregarUsuario2();
	document.getElementById("material").value="";
	document.getElementById("unidad").value="0";
	document.formElem.unidad.value='';
	document.getElementById("cantutil").value="";
	document.getElementById("material").focus();
	

	}
function eliminarUsuario2(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }
function eliminarUsuario(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }
function validagraba(){
	var pedido=document.getElementById("c_numped").value;
	var pedidolen=document.getElementById("c_numped").length;
	var sw=document.getElementById('swcoti').checked;
	
	if(pedido!='S/C' && sw==true){
		alert('ingreso cotizacion');
	}
/*	if(pedidolen!=11 && sw!='1'){
		
		alert('cotizacion debe tener 11 digitos');
	}*/
	if(pedido=='10020' && sw!='1'){
	alert('Complete el nro de cotizacion');
	}
	
	
if((document.getElementById("textfield7").value)==""){
		
		alert('Falta Ruc Cliente');
		return 0;
	}
	if((document.getElementById("transportista").value)==""){
		
		alert('Falta datos de Transportista');
		return 0;
	}
	
		if((document.getElementById("textfield3").value)=="CLIENTE"){
		
		alert('Falta Nombre del Cliente');
		return 0;
	}
	if(posicionCampo2<=1){
		alert('Falta Detalle de Guia remision')
		return 0;
		}
	 if(confirm("Seguro de Grabar Guia de Remision ?")){
	document.getElementById("formElem").submit();
			 }

}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Grabar Guia de Remision ?")){
	document.getElementById("formElem").submit();
			 }
	}
	

function activa1()
 {
	 var t=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text
	 if(t=='CLIENTE'){
	 document.getElementById("textfield3").value="CLIENTE";
	 document.getElementById("textfield3").style.visibility="visible";
	 document.getElementById("prov").style.visibility="hidden";
	 document.getElementById('apDiv1').style.display = 'none'; 
	 
	 }
else
 {
	 document.getElementById("prov").value="PROVE";
	 document.getElementById("prov").style.visibility="visible";
	 document.getElementById("textfield3").style.visibility="hidden";
	 document.getElementById('apDiv1').style.display = 'block'; 
	 
	 }}


function abreVentanachofer(){
	var codigo=document.getElementById("transportista").value;
	var cod=document.getElementById("hiddenField2").value;
			if (codigo=="") {
				alert ("Debe introducir Transportista");
				document.getElementById("transportista").focus();
				return 0;
			} else {
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verchoferes&udni=<?php echo $udni;?>&cod="+cod,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}
function abreVentana(obj){
var codigo=document.getElementById("hiddenField5").value;
	var cod=codigo
	var sw='1';
	var xsw='1';
	var valor=obj
			if (codigo=="") {
				alert ("Debe Introducir Codigo Equipo");
			} else {
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigosGUIA&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}		
function copiarllegada(){ //funcion ok 19-02-2014

	if(document.getElementById('copiar').checked==true){
	document.getElementById("lentrega").value=document.getElementById("lpartida").value;
	}else{
		document.getElementById("lentrega").value=document.getElementById("xlentrega").value;
		
		}
	
	}
	
function refcotizacion(){
	if(document.getElementById('swcoti').checked==true){
		document.getElementById("c_numped").value='S/C';
		document.getElementById("c_numped").readOnly = true;
		}else{
		document.getElementById("c_numped").value='10020';
		document.getElementById("c_numped").readOnly = false;

			}
	
	}
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
// alert('Solo Se Acepta Numeros');
return false;

return true;
}
	</script>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 163px;
	top: 84px;
}
</style>
<body onload="activa1()">
Registro Guia de Remision (Salida,Ingreso de reefer,dry,carreta,generadores,furgon) 
<form action="../MVC_Controlador/cajaC.php?acc=guardaguia&udni=<?php echo $_GET['udni']; ?>"  method="post"  name="formElem" id="formElem">
<fieldset class="fieldset legend" style="width:100%">
  <legend style="color:#03C"><strong>DATOS DEL DESTINATARIO</strong>
</legend>
  <table width="901" border="0">
  <tr>
    <td width="143" bgcolor="#FFCCCC" >Tipo</td>
    <td width="737" colspan="3" bgcolor="#FFCCCC"><label for="textfield"></label>
      <!--<input name="textfield"  class="texto" type="text" id="textfield" size="40" />-->
      <label for="tipo"></label>
      <select name="tipo" id="tipo" onchange="activa1()">
        <option value="1">CLIENTE</option>
        <option value="2">PROVEEDOR</option>
        </select>
      &nbsp;&nbsp;&nbsp;Serie Guia
      <label for="select3"></label>
      <select name="select3" id="select3">
<option value="002">002</option>
<option value="001">001</option>
        <option value="003">003</option>
        <option value="004">004</option>
        <option value="005">005</option>
        <option value="006">006</option>
      </select>
      Nro Guia
    
        <input name="textfield2"  type="text" class="texto" id="textfield2" size="10" value="<?php echo '000'.$nro?>"/>
        <input type="hidden" name="hiddenField" id="hiddenField" />
        <input type="hidden" name="oper" id="oper" value="<?php echo $_GET['udni']; ?>"/>
        Nro Cotizacion
      
<input name="c_numped" type="text" class="texto" id="c_numped" value="10020" maxlength="11" onkeypress="return isNumberKey(event)" />
      <input name="swcoti" type="checkbox" id="swcoti" onclick="refcotizacion()" value="1" />
      S/N</td>
    </tr>
  <tr>
    <td bgcolor="#FFCCCC">Nombre o Ruc</td>
    <td colspan="3" bgcolor="#FFCCCC">
      <input name="textfield3" type="text"  class="texto" id="textfield3" value="CLIENTE" size="40" />    
      <div id="apDiv1"><input name="prov" type="text" class="texto" id="prov" value="PROVE" size="40" /></div>
      <input type="hidden" name="textfield" id="textfield" />
<input type="hidden" name="hiddenField4" id="hiddenField4" />
<label for="select2">Fecha
  <input name="fecha"  type="text" class="texto" id="fecha" size="12" readonly="readonly"  value="<?php echo date('d/m/Y');?>"/>
      </label><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></label></td>
    </tr>
  <tr>
    <td bgcolor="#FFCCCC" >Ruc</td>
    <td colspan="3" bgcolor="#FFCCCC"><input name="textfield7"  class="texto" type="text" id="textfield7" size="20" />      Dcto Referencia
      <input name="textfield6" type="text"  class="texto" id="textfield6" value="S/N" size="10" />
      Transaccion
      <select name="select2" id="select2">
        <option value="7">TRANSFERENCIA SALIDA</option>
        <option value="8">TRANSFERENCIA INGRESO</option>
        </select> &nbsp;&nbsp; &nbsp;&nbsp;<input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/></td>
  </tr>
  </table> 
  </fieldset>
 <fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>DATOS DEL TRANSPORTISTA</strong>
    </legend><table width="903" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="109" bgcolor="#99CC99">Nombre o Ruc</td>
    <td width="326" bgcolor="#99CC99">
      <input name="transportista" class="texto" type="text" id="transportista" size="50" />
      <input type="hidden" name="hiddenField2" size="5" id="hiddenField2" /></td>
    <td width="108" bgcolor="#99CC99"><a href="#" onClick="abreVentanachofer()">Busque Chofer</a></td>
    <td width="360" bgcolor="#99CC99"><input name="chofer" class="texto"  type="text" id="chofer" size="50" /></td>
  </tr>
  <tr>
    <td bgcolor="#99CC99">Licencia</td>
    <td colspan="3" bgcolor="#99CC99">
      <input type="text" name="licencia" class="texto"  id="licencia" />
      Marca
     
      <input type="text" name="marca"  class="texto" id="marca" />
      Placa
      
      <input type="text" name="placa" class="texto"  id="placa" /></td>
    </tr>
</table>
    <label for="textfield4"></label>
 </fieldset>
  <fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>DATOS DEL TRASLADO</strong>
    </legend>
 <table width="903" border="0">
  <tr>
    <td width="125" bgcolor="#99CCFF">Lugar de Partida</td>
    <td colspan="2" bgcolor="#99CCFF">
      <input name="lpartida" type="text"  class="texto" id="lpartida" value="AV NESTOR GAMBETTA KM 7, CALLAO " size="40" />
      <input type="hidden" name="xlentrega" id="xlentrega" />
      Lugar de Entrega
      <input name="lentrega" type="text" class="texto"  id="lentrega" value="AV NESTOR GAMBETTA KM 7, CALLAO" size="40" />
      <input type="checkbox" name="copiar" id="copiar" onclick="copiarllegada()" /></td>
  </tr>
  <tr>
    <td bgcolor="#99CCFF">Observacion</td>
    <td width="471" bgcolor="#99CCFF">
      <input name="obs" type="text" id="obs" class="texto"  size="50" /></td>
    <td width="293" bgcolor="#99CCFF">Fecha Traslado
      
      <input name="ftraslado" type="text"  class="texto" id="ftraslado" size="12" value="<?php echo date('d/m/Y');?>"/><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "ftraslado",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script></td>
  </tr>
 </table>

 </fieldset>
<fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>DETALLE DEL TRASLADO</strong>
</legend>
  <table width="1036" border="0"  id="tablaDiagnostico2">
  <tr>
    <td width="216"><input type="hidden" name="codigorepuesto" id="codigorepuesto" value="000" />
      Descripcion
        <input type="hidden" name="hiddenField3" id="hiddenField3" />
        <input name="material" type="text"  class="texto" id="material" size="40" />      
      <!--<a href="#"> <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/>--></td>
    <td width="10">&nbsp;</td>
    <td width="226">Busque aqui codigo.
      <input name="unidad" type="text" class="texto"  id="unidad" onclick="abreVentana(this.name)" size="25" onkeypress="return ValidaEntero(event)"/>
      <?php /*?>   <?php $ven = ListarSerieC();?>
        <select name="unidad" id="unidad" class="Combos texto" >
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_nserie"]?>"><?php echo $item["c_nserie"]?></option>
  
          <?php }	?>
        </select><?php */?>
    <input type="hidden" name="hiddenField5" id="hiddenField5" size="5" />
    <input name="codigoequipo" type="hidden" id="codigoequipo" size="25" readonly="readonly" class="texto" /></td>
    <td width="72">Cant.
      <input name="cant" type="text" class="texto"  id="cant" value="1" size="2" /></td>
    <td width="150">Observacion
      <input name="cantutil" type="text" class="texto"  id="cantutil" size="70" /></td>
    <td width="147">.Estado
      <label for="select"></label>
      <?php $ven = ListaestadoequipoC();?>
        <select name="estaequi" id="estaequi" class="Combos texto" >
          <?php foreach($ven as $item){?>
          <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>          
          
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
        </select><!--<input name="costo" type="text"  class="texto" id="costo" size="10" />--></td>
    <td width="185"><a href="#" onclick="add2();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;</a><a href="#" onclick="eliminarDiagnosticos2();"><img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" /></a>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"><strong>
      <label for="textfield16">Equipo</label>
    </strong></td>
    <td bgcolor="#CCCCCC"><strong>
      <label for="textfield17">Cant</label>
    </strong></td>
    <td bgcolor="#CCCCCC"><strong>Observacion </strong></td>
    <td bgcolor="#CCCCCC">Otro datos</td>
    <td>&nbsp;</td>
    </tr>
</table>
</fieldset>
 
<p>
  <input type="button" name="Grabar" id="Grabar" value="GRABAR GUIA" onclick="validagraba()" />
  <input type="reset" name="button" id="button" value="CANCELAR" />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
</html>
