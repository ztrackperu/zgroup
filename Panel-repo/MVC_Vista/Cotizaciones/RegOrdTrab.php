<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Registro de Orden Trabajo</title>
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
	$("#textfield").autocomplete("../MVC_Controlador/cajaC.php?acc=tareasauto", {
		width: 400, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield").result(function(event, data, formatted) {
	
		$("#textfield").val(data[2]);
		$("#hiddenField2").val(data[3]);
		//document.getElementById('textfield3').focus();
	});
	
});

</script>
<script type="text/javascript">
$().ready(function() {
	$("#tarea").autocomplete("../MVC_Controlador/cajaC.php?acc=tareasauto", {
		width: 400, 
		matchContains: true,
		selectFirst: false
	});	
	$("#tarea").result(function(event, data, formatted) {
		$("#tarea").val(data[2]);
		$("#hiddenField3").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
	});

</script>


<script type="text/javascript">
$().ready(function() {
	$("#textfield3").autocomplete("../MVC_Controlador/cajaC.php?acc=serieauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield3").result(function(event, data, formatted) {
	
		$("#textfield9").val(data[1]);
		$("#textfield3").val(data[0]);
		//$("#textfield7").val(data[5]);
		//$("#textfield8").val(data[5]);
		
		
		

		document.getElementById('textfield3').focus();
	});
	
});

</script>
<script type="text/javascript">
$().ready(function() {
	
	
	$("#textfield5").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield5").result(function(event, data, formatted) {
		$("#textfield5").val(data[2]);
		//document.getElementById('textfield3').focus();
	});
});
</script>
<script type="text/javascript">	
$().ready(function() {
	$("#material").autocomplete("../MVC_Controlador/cajaC.php?acc=proauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#material").result(function(event, data, formatted) {
		$("#material").val(data[2]);
		$("#costo").val(data[3]);
		$("#unidad").val(data[4]);
		//$("#material").val(data[1]);
		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});		
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
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='material"+posicionCampo2+"' type='text' id='material"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='unidad"+posicionCampo2+"' type='text' id='unidad"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='cant"+posicionCampo2+"' type='text' id='cant"+posicionCampo2+ "' size='5' readonly='readonly' class='texto'></td> ";
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='cantutil"+posicionCampo2+"' type='text' id='cantutil"+posicionCampo2+ "' size='5' readonly='readonly' class='texto'></td> "; 
		 
		nuevaCelda=nuevaFila.insertCell(-1);
nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='costo"+posicionCampo2+"' type='text'  id='costo"+posicionCampo2+"'  size='5' readonly='readonly' class='texto'/></td>";


nuevaCelda=nuevaFila.insertCell(-1);
nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='costodol"+posicionCampo2+"' type='text'  id='costodol"+posicionCampo2+"'  size='5' readonly='readonly' class='texto'/><a href='#'> <img src='../images/user_logout.png' value='Eliminar'  onclick='eliminarUsuario2(this)'></a>  ";
escribirDiagnostico2(posicionCampo2);
		posicionCampo2++;
    }
	
function dolares(){
	var monto=parseFloat(document.formElem.costo.value)/parseFloat(document.formElem.hiddenField4.value);
	//var fin=monto*100;
	
	document.getElementById("costodol").value=Math.round(monto*100)/100;
	
	//document.getElementById("costodol").value=monto;
	
	
	
	
	}
function escribirDiagnostico2(posicionCampo2)
{
			material = document.getElementById("material" + posicionCampo2);
			material.value = document.formElem.material.value;
			
			
			unidad = document.getElementById("unidad" + posicionCampo2);
			unidad.value = document.formElem.unidad.value;
			
			
			cant = document.getElementById("cant" + posicionCampo2);
			cant.value = document.formElem.cant.value;
			cantutil = document.getElementById("cantutil" + posicionCampo2);
			cantutil.value = document.formElem.cantutil.value;
			
			costo = document.getElementById("costo" + posicionCampo2);
			costo.value = document.formElem.costo.value;
			costodol=document.getElementById("costodol" + posicionCampo2);
			
			costodol.value = document.formElem.costodol.value;
			
		
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
	dolares();
	agregarUsuario2();
	document.getElementById("material").value="";
	document.getElementById("cantutil").value="";
	document.getElementById("unidad").value="";
	document.getElementById("costo").value="";
	document.getElementById("costodol").value="";
	

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
	if((document.getElementById("textfield").value)==""){
	alert("Faltan Datos");
document.getElementById("txtcodigo").focus();
}else{
	linkgraba();
}
}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Grabar Orden Trabajo ?")){
	document.getElementById("formElem").submit();
			 }
	}
	
function validatipo(){
	
	 var t=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text
	
	if(t=='TERCERO'){
		
		document.getElementById("tarea").value="Realizado por Tercero"
		document.getElementById("material").value="Materiales por Tercero"
		document.getElementById("cant").value="1"
		document.getElementById("cantutil").value="1"
		var costo=parseFloat(document.formElem.hiddenField2.value);
		var tc=parseFloat(document.formElem.hiddenField4.value);
		var resul=costo/tc;
		document.getElementById("costo").value=costo
		document.getElementById("costodol").value=Math.round(resul*100)/100;
		document.getElementById("unidad").value="UND"
		add2();
		add();
		}else{	
		document.getElementById("tarea").value=""
		document.getElementById("material").value=""
		document.getElementById("cant").value="1"
		document.getElementById("cantutil").value=""
		document.getElementById("costo").value=""
		document.getElementById("costodol").value=""
		document.getElementById("unidad").value=""	
		location.href="../MVC_Controlador/cajaC.php?acc=cn00";	
			
			}
	
	
	}
	</script>
<body>
Registro de Orden de Trabajo
<form action="../MVC_Controlador/cajaC.php?acc=guardaot"  method="post"  name="formElem" id="formElem">
<fieldset class="fieldset legend" style="width:100%">
  <legend style="color:#03C"><strong>DATOS DE ORDEN</strong></legend>
<table width="910" height="162" border="0">
  <tr>
    <td colspan="5" align="center"></td>
  </tr>
  <tr>
    <td width="134" height="26">Trabajo a Realizar</td>
    <td colspan="3"><label for="textfield"></label>
      <input name="textfield"  class="texto" type="text" id="textfield" size="70" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $_GET['udni']; ?>"/></td>
    <td width="266" bgcolor="#FFFFFF">Nro de Orden
      <input name="textfield2"  type="text" disabled="disabled" class="texto" id="textfield2" value="autogenedado" size="15" readonly="readonly" />      <input type="hidden" name="hiddenField" id="hiddenField" /></td>
  </tr>
  <tr>
    <td>REALIZADO POR</td>
    <td><select name="tipo" id="tipo" onchange="validatipo()">
      
      <option value="Z">ZGROUP</option>
      <option value="T">TERCERO</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="266" rowspan="3" bgcolor="#00FF00">Nota la busqueda de equipo es ejmp zgruxxxxx crluxxxx trndxxxxx etc el cual figura en la factura de compra </td>
  </tr>
  <tr>
    <td>Buscar Equipo</td>
    <td width="240">
      <input name="textfield3"  class="texto" type="text" id="textfield3" size="40" />
   </td>
    <td width="111">Marca</td>
    <td width="137"><input name="textfield7"  class="texto" type="text" id="textfield7" size="20" /></td>
    </tr>
  <tr>
    <td>Serie</td>
    <td><input name="textfield9"  class="texto" type="text" id="textfield9" size="40" /></td>
    <td>Modelo</td>
    <td><input name="textfield8"  class="texto" type="text" id="textfield8" size="20" /></td>
    </tr>
  <tr>
    <td>Solicitado Por</td>
    <td colspan="4">
      <input name="textfield5"  class="texto" type="text" id="textfield5" size="30" />
      Resp.de Ejecucion</label>
      
      <input name="textfield10"  class="texto" type="text" id="textfield10" size="30" />
      Fecha  ejecucion
<input name="fecha"  type="text" class="texto" id="fecha" size="12" readonly="readonly" value="<?php echo date('d/m/Y');?>"/>
      </label><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
  </tr>
  <tr>
    <td>Autorizado Por</td>
    <td colspan="4"><input name="textfield6"  class="texto" type="text" id="textfield6" size="30" />
      Sup Ejecucion&nbsp;&nbsp;&nbsp;  
      <label for="textfield11"></label>
      <input name="textfield11"  class="texto" type="text" id="textfield11" size="30" />  Ref. Tipo Cambio:
       <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			echo $tipocambio;
			?>
       <input type="hidden" name="hiddenField4" id="hiddenField4" value="<?php echo $tipocambio ?>"/></td>
  </tr>
  </table>
    <script language="javascript" type="text/javascript">
<!--
data = ['CARRIER',
'THERMO KING',
'STAR COLD',
'MITSUBISHI',
'DAYKIN',
'JINDO',
'HYNDAI',
'GRAFF',
'STAR COLD',
'OTRO'].sort();

    AutoComplete_Create('textfield7', data);
    AutoComplete_Create('textfield8', ['CARRIER',
'THERMO KING',
'STAR COLD',
'MITSUBISHI',
'DAYKIN',
'JINDO',
'HYNDAI',
'GRAFF',
'STAR COLD',
'OTRO'].sort(), 10);
// -->
</script>
  </fieldset>
<fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>DESCRIPCION DE LA TAREA</strong></legend>
<table width="909" border="0" id="tablaDiagnostico">
  <tr>
    <td width="263">Tarea
      <input type="hidden" name="hiddenField3" id="hiddenField3" />      <input name="tarea"  class="texto" type="text" id="tarea" size="50" /></td>
    <td width="134">Tiempo estimado
      <input name="timees" type="text" class="texto"  id="timees" value="00:00" size="10" /></td>
    <td width="115">Tiempo Real
      <input name="timere" type="text" class="texto"  id="timere" value="00:00" size="10" /></td>
    <td width="392"><a href="#" onclick="add();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;</a><a href="#" onclick="eliminarDiagnosticos();"><img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" /></a>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><label for="textfield12">Tarea</label></td>
    <td bgcolor="#CCCCCC"><label for="textfield13">Tiempo Estimado</label></td>
    <td bgcolor="#CCCCCC"><label for="textfield14">Tiempo Real</label></td>
    <td>&nbsp;</td>
    </tr>
</table>
</fieldset>
<fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>REPUESTOS REQUERIDO</strong></legend>
<table width="728" border="0"  id="tablaDiagnostico2">
  <tr>
    <td width="152">Material
      <input name="material" type="text"  class="texto" id="material" size="25" /></td>
    <td width="131">Unidad
      <input name="unidad" type="text" class="texto"  id="unidad" size="20" /></td>
    <td width="59">Cantidad
      <input name="cant" type="text" class="texto"  id="cant" value="1" size="5" /></td>
    <td width="109">Cant. util.
      <input name="cantutil" type="text" class="texto"  id="cantutil" value="1" size="5" /></td>
    <td width="86">Costo Tot.S/.
      <input name="costo" type="text"  class="texto" id="costo" size="10" onblur="dolares()" onkeyup="dolares()" onfocus="dolares()" onchange="dolares()" /></td>
    <td width="82">Costo Tot.$
      <label for="costodol"></label>
      <input name="costodol" type="text"  class="texto" id="costodol" size="10" /></td>
    <td width="79"><a href="#" onclick="add2();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;</a><a href="#" onclick="eliminarDiagnosticos2();"><img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" /></a>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><label for="textfield15">Material</label></td>
    <td bgcolor="#CCCCCC"><label for="textfield16">Unidad</label></td>
    <td bgcolor="#CCCCCC"><label for="textfield17">Cantidad</label></td>
    <td bgcolor="#CCCCCC"><label for="textfield18">Cant util.</label></td>
    <td bgcolor="#CCCCCC"><label for="textfield19">Costo S/.</label></td>
    <td bgcolor="#CCCCCC">Costo $</td>
    <td>&nbsp;</td>
    </tr>
</table>
</fieldset>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>PERSONAL NECESARIO PARA EL TRABAJO</strong></legend>
<table width="858" border="0">
  <tr>
    <td width="173">Categoria</td>
    <td width="273">Hrs. Req.</td>
    <td width="188">Hrs. Normal</td>
    <td width="176">Hrs. Festivos</td>
    <td width="14">&nbsp;</td>
  </tr>
  <tr>
    <td><label for="textfield22"></label>
    <input type="text" name="textfield22"  class="texto" id="textfield22" /></td>
    <td><label for="textfield23"></label>
    <input type="text" name="textfield23"  class="texto" id="textfield23" /></td>
    <td><label for="textfield24"></label>
    <input type="text" name="textfield24"  class="texto" id="textfield24" /></td>
    <td><label for="textfield25"></label>
    <input type="text" name="textfield25"  class="texto" id="textfield25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>MEDIDAS DE SEGURIDA</td>
    <td colspan="4"><label for="textfield20"></label>
    <input name="textfield20" type="text"  class="texto" id="textfield20" size="60" /></td>
  </tr>
  <tr>
    <td>OBSERVACIONES</td>
    <td colspan="4"><label for="textfield21"></label>
    <input name="textfield21" type="text"  class="texto" id="textfield21" size="60" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</fieldset>
<p>
  <input type="button" name="Grabar" id="Grabar" value="GRABAR ORDEN" onclick="validagraba()" />
  <input type="reset" name="button" id="button" value="CANCELAR" />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
</html>
