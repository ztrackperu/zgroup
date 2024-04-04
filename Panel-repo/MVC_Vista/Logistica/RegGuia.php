<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Ingreso Paquete</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
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
<!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#hc").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at1", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#hc").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#nom").val(data[1]);
		$("#ruc").val(data[2]);
		$("#dir").val(data[3]);
		$("#codi").val(data[4]);
		document.getElementById("descripcion2").value='1ER TRAMO PUNTO PARTIDA'+document.getElementById("dir").value;
	document.formElem.hc2.focus();
	});
})
;
</script>
<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#hc2").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at1", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#hc2").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#nom2").val(data[1]);
		$("#ruc2").val(data[2]);
		$("#dir2").val(data[3]);
		$("#codi2").val(data[4]);
		document.getElementById("descripcion7").value='3ER TRAMO PUNTO LLEGADA'+document.getElementById("dir2").value;
	document.formElem.textfield.focus();
	});
})
;
</script>

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield3").val(data[1]);
		$("#textfield4").val(data[2]);
		$("#textfield5").val(data[3]);
		$("#textfield11").val(data[4]);
		$("#textfield10").val(data[5]);
	document.formElem.textfield2.focus();
	});
})
;
</script>

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield2").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at3", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield2").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield7").val(data[1]);
		$("#textfield8").val(data[2]);
		$("#textfield9").val(data[3]);
		
	document.formElem.textfield12.focus();
	});
})
;
</script>


<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield12").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at4", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield12").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield12").val(data[1]);	
	document.formElem.textfield13.focus();
	});
})
;
</script>
<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield13").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at4", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield13").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield13").val(data[1]);	
	document.formElem.descripcion.focus();
	});
})
;
</script>
<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#descripcion").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at4", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#descripcion").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#descripcion").val(data[1]);	
	//document.formElem.descripcion.focus();
	});
})
;
</script>
<script type="text/javascript">
sec = 1;
function agregarDiagnostico() {
	if(document.getElementById("descripcion" + sec).value != "")
	{
		sec += 1;
		//codigo = "codigo" + sec;
		descripcion = "descripcion" + sec;
		
		/*um="um" + sec;
		codigo="codigo" + sec;
		uni="uni" + sec;*/
		tabla = document.getElementById("tablaDiagnostico");
		var tr = document.createElement("tr");
		tr.id = "fila" + sec;

		tr.innerHTML = "<td bgcolor='#CCCCCC'>" + sec + " <input type='hidden' id='" + sec + "' name='" + sec + "' readonly size='10'/> </td>";
tr.innerHTML += "<td bgcolor='#CCCCCC'><textarea name='" + descripcion + "' type='text' ' id='" + descripcion + "' cols='75'  class='texto'/></textarea></td>";



<!--tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + um + "' type='hidden' ' id='" + um + "' size='2' readonly='readonly'/></td>";-->

/*tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + r + "' type='hidden' ' id='" + r + "' size='2' readonly='readonly'/></td>";
tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + f + "' type='hidden' ' id='" + f + "' size='2' readonly='readonly'/></td>";
tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + c + "' type='hidden' ' id='" + c + "' size='2' readonly='readonly'/></td>";*/
		tabla.appendChild(tr);
	}
	else
	{
		//alert("Falta Datos");
	}
}

function escribirDiagnostico()
{
	for(i=1; i<=sec; i++)
	{
		if(document.getElementById("descripcion" + i).value == "")
		{
			descripcion = document.getElementById("descripcion" + i);
			
			//var tramo=document.formElem.select3.options[document.formElem.select3.selectedIndex].text;
		//var partida=document.formElem.select2.options[document.formElem.select2.selectedIndex].text;
			
			var des=document.formElem.descripcion.value;
			//var opt=document.formElem.textfield14.value;
			//var concatena=tramo+' '+partida+' '+des+' '+opt;
			descripcion.value = des;
			
			/*codigo=document.getElementById("codigo" + i);
			
			var refer=document.formElem.refer.options[document.formElem.refer.selectedIndex].text;
			var filas=document.formElem.filas.options[document.formElem.filas.selectedIndex].text;
			var col=document.formElem.col.options[document.formElem.col.selectedIndex].text;
			r = document.getElementById("r" + i);
			r.value=refer;
			f = document.getElementById("f" + i);
			f.value=filas;
			c = document.getElementById("c" + i);
			c.value=col;
			
			var texto=refer+filas+col;
			codigo.value=texto;
			
			uni= document.getElementById("uni" + i);
			uni.value =  document.formElem.uniM.options[document.formElem.uniM.selectedIndex].text;*/
			
			/*um=document.getElementById("um" + i);
			um.value =  document.formElem.uniM.options[document.formElem.uniM.selectedIndex].value;*/
			break;
		}
	}
}
function eliminarDiagnosticos()
{
	if (sec > 1)
	{
		document.getElementById("tablaDiagnostico").deleteRow(sec + 1);
		sec = sec - 1;
	}
	else
	{
		alert("No hay filas para eliminar");
		document.getElementById("descripcion1").value="";
		document.getElementById("codigo1").value="";
		document.getElementById("uni1").value="";
	}
}
function add(){
	agregarDiagnostico();
	escribirDiagnostico();
	document.formElem.descripcion.value="";
	document.formElem.select3.value="";
	document.formElem.select2.value="";
	document.formElem.textfield14.value="";
	document.formElem.select3.focus();
	}
function validagraba(){
	if(((document.getElementById("hc").value)=="") || ((document.getElementById("descripcion1").value)=="") ){
	alert("Faltan datos");
document.getElementById("hc").focus();
}else{
	linkgraba();
}
}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Grabar Guia  ?")){
	document.getElementById("formElem").submit();
			 }
	}
function limpiarfom(formElem) {
	frm = document.getElementById("formElem");
	if (!frm) return;
	for(i=0; i<frm.elements.length; i++){
		if (frm.elements[i].type == 'text')
			frm.elements[i].value = '';
	}
	document.getElementById("hc").focus();
}

function activa()
 {
if(document.getElementById("checkbox").checked==true){;
document.getElementById("descripcion").value='1ER TRAMO PUNTO PARTIDA'+document.getElementById("dir").value;
add();}else{
document.getElementById("descripcion").value='';
} }

function activa2()
 {
if(document.getElementById("checkbox2").checked==true){;
document.getElementById("descripcion").value='3ER TRAMO PUNTO LLEGADA'+document.getElementById("dir2").value;
}else{
document.getElementById("descripcion").value='';
add();} }

function activa3()
 {
if(document.getElementById("checkbox3").checked==true){;
document.getElementById("descripcion").value='1ER TRAMO PUNTO LLEGADA PUERTO PUCALLPA SN CALLERIA CORONEL PORTILLO UCAYALI';
add();}else{
document.getElementById("descripcion").value='';
} }

function activa4()
 {
if(document.getElementById("checkbox4").checked==true){;
document.getElementById("descripcion").value='2DO TRAMO PUNTO PARTIDA PUERTO PUCALLPA SN CALLERIA CORONEL PORTILLO UCAYALI';

add();}else{
document.getElementById("descripcion").value='';
} }


function activa5()
 {
if(document.getElementById("checkbox5").checked==true){;
document.getElementById("descripcion").value='2DO TRAMO PUNTO LLEGADA PUERTO ENAPU PUNCHAWA-MAYNAS-LORETO';
add();}else{
document.getElementById("descripcion").value='';
} }
function activa6()
 {
if(document.getElementById("checkbox6").checked==true){;
document.getElementById("descripcion").value='3ER TRAMO PUNTO PARTIDA PUERTO ENAPU PUNCHAWA-MAYNAS-LORETO';
add();
}else{
document.getElementById("descripcion").value='';
} }


function activa7()
 {
if(document.getElementById("checkbox7").checked==true){;
document.getElementById("descripcion").value='SERVICIO DE TRANSPORTE DE PRODUCTOS REFRIGERADOS';
add();
}else{
document.getElementById("descripcion").value='';
} }

function seleccionar_todo(){
	for (i=0;i<document.formElem.elements.length;i++)
		if(document.formElem.elements[i].type == "checkbox")	
			document.formElem.elements[i].checked=1
}
function deseleccionar_todo(){
	for (i=0;i<document.formElem.elements.length;i++)
		if(document.formElem.elements[i].type == "checkbox")	
			document.formElem.elements[i].checked=0
}

function llenar(){
activa();
activa2();
activa3();
activa4();
activa5();
activa6();
activa7();
}

</script>
</head>
<body>
<div style="color:#036">REGISTRO DE GUIA</div>
<form id="formElem" name="formElem"  method="post" 
action="../MVC_Controlador/LogisticaC.php?acc=g1&udni=<?php echo $_GET['udni'];?>">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="554" height="308" border="0">

    <tr>
      <td height="24" bgcolor="#00CC66">Traslado</td>
      <td><label for="textfield6"></label>
        <input name="textfield6" type="text" id="textfield6" size="10" /><img src="../images/icon_calendar.png" alt="" name="lanzador" width="16" height="16" border="0" id="lanzador" title="Fecha de Emoci&oacute;n"  />
        <script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "textfield6",     // id del campo de texto 
     ifFormat     :     "%d/%m/%Y",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador"     // el id del bot&oacute;n que lanzar&aacute; el calendario 
}); 
//document.getElementById("hc").focus();
            </script> </td>
      <td colspan="2">Serie
        <label for="select"></label>
        <select name="select" id="select">
          <option value="  "> </option>
          <option value="001">001</option>
          <option value="002">002</option>
          <option value="003">003</option>
          <option value="004">004</option>
          <option value="005">005</option>
          <option value="006">006</option>
          <option value="007">007</option>
        </select> 
        Nro
        <label for="textfield16"></label>
        <input type="text" name="textfield16" id="textfield16" /></td>
      </tr>
    <tr>
      <td width="107" height="24" bgcolor="#99CCCC"><strong>REMITENTE</strong></td>
      <td width="150" bgcolor="#99CCCC"><input name="hc" type="text" id="hc" size="20" class="texto" />
        <input name="codi" type="hidden" id="codi" size="25" readonly="readonly" />        <!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>--></td>
      <td width="128" bgcolor="#99CCCC"><strong>DESTINATARIO</strong></td>
      <td width="151" bgcolor="#99CCCC"><label for="hc2"></label>
        <input name="hc2" type="text" class="texto" id="hc2" size="20"/>        <label for="codi">
          <input name="codi2" type="hidden" id="codi2" readonly="readonly" />
        </label></td>
    </tr>
    <tr>
      <td height="24">Razon Social
        
        </td>
      <td>
        <input name="nom" type="text" id="nom"  size="20" readonly="readonly" /></td>
      <td>Razon Social
        
       </td>
      <td><label for="nom2"></label>
        <input name="nom2" type="text" id="nom2" size="20" readonly="readonly" />        <label for="hora"></label></td>
    </tr>
    <tr>
      <td height="24">Ruc</td>
      <td><input name="ruc" type="text" id="ruc"  size="20" readonly="readonly" /></td>
      <td>Ruc</td>
      <td><label for="ruc2"></label>
        <input name="ruc2" type="text" id="ruc2" size="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td height="24">Direccion        </td>
      <td><input name="dir" type="text" id="dir"  size="20" readonly="readonly" /></td>
      <td>Direccion        </td>
      <td><label for="dir2"></label>
        <input name="dir2" type="text" id="dir2" size="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td height="24" bgcolor="#FFCC99"><strong>TRANSPORTE</strong></td>
      <td bgcolor="#FFCC99"><label for="textfield"></label>
        <input name="textfield" type="text" class="texto" id="textfield" size="20" />
        <input name="textfield3" type="hidden" id="textfield3" readonly="readonly" /></td>
      <td bgcolor="#FFCC99"><strong>CONDUCTOR</strong></td>
      <td bgcolor="#FFCC99"><label for="textfield2"></label>
        <input name="textfield2" type="text" class="texto" id="textfield2" size="20"/>
        <input name="textfield7" type="hidden" id="textfield7" readonly="readonly" /></td>
    </tr>
    <tr>
      <td height="24">Marca</td>
      <td><label for="textfield3">
        <input name="textfield4" type="text" id="textfield4" size="20" readonly="readonly" />
        </label></td>
      <td>Nombre</td>
      <td><label for="textfield7">
        <input name="textfield8" type="text" id="textfield8" size="20" readonly="readonly" />
        </label></td>
    </tr>
    <tr>
      <td height="24">Placa</td>
      <td><label for="textfield4">
        <input name="textfield5" type="text" id="textfield5" size="20" readonly="readonly" />
      </label></td>
      <td>Licencia</td>
      <td><label for="textfield9"></label>
        <input name="textfield9" type="text" id="textfield9" size="20" readonly="readonly" />        <label for="textfield8"></label></td>
    </tr>
    <tr>
      <td height="24">Conf. Veh.</td>
      <td><label for="textfield11"></label>
        <input name="textfield11" type="text" id="textfield11" size="20" /></td>
      <td bgcolor="#FF0000" style="color:#FFF">Observacion</td>
      <td><label for="textfield12"></label></td>
    </tr>
    <tr>
      <td height="24">Certf. insp.</td>
      <td><label for="textfield10"></label>
        <input name="textfield10" type="text" id="textfield10" size="20" readonly="readonly" />        <label for="textfield5"></label></td>
      <td colspan="2" style="color:#FFF"><input name="textfield12" type="text" id="textfield12" value="" size="35" class="texto" /></td>
      </tr>
    <tr>
      <td height="11" bgcolor="#99FFFF">Emp. Sub Nom.</td>
      <td bgcolor="#99FFFF"><input type="text" name="textfield13" id="textfield13" /></td>
      <td bgcolor="#99FFFF" >RUC</td>
      <td bgcolor="#99FFFF" ><label for="textfield15"></label>
        <input type="text" name="textfield15" id="textfield15" />        <label for="textfield13"></label></td>
      </tr>
    </table>
</fieldset>
<fieldset class="fieldset legend">
    
    <legend style="color:#03C"><strong>Detalle</strong></legend>
    <table id="tablaDiagnostico" width="555" border="0">
      <tr>
        <!--<td height="31" colspan="2">Tramo
        
          <input name="textfield12" type="text" id="textfield12" size="10" />
          <label for="select3"></label>
          <select name="select3" id="select3" >
            <option> </option>
<option value="1ER TRAMO">1ER TRAMO</option>
            <option value="2DO TRAMO">2DO TRAMO</option>
            <option value="3ER TRAMO">3ER TRAMO</option>
            <option value="4TO TRAMO">4TO TRAMO</option>
            <option value="5TO TRAMO">5TO TRAMO</option>
          </select>
          Punto
          
          <input name="textfield13" type="text" id="textfield13" size="10" />
          <label for="select2"></label>
          <select name="select2" id="select2" >
            <option value="   "> </option>
<option value="PUNTO PARTIDA">PUNTO PARTIDA</option>
            <option value="PUNTO LLEGADA">PUNTO LLEGADA</option>
          </select>
           Concepto 
          <input name="checkbox7" type="checkbox" id="checkbox7"onclick="activa7(),add()" />
          <label for="checkbox7"></label>
          T1
          <input name="checkbox" type="checkbox" id="checkbox" onclick="activa(),add()"/>
          --
          <input name="checkbox3" type="checkbox" id="checkbox3" onclick="activa3(),add()" />
          Tramo2 Partida
          
          <input name="checkbox4" type="checkbox" id="checkbox4" onclick="activa4(),add()"/>

          Tramo 2 Llega
           <input name="checkbox5" type="checkbox" id="checkbox5" onclick="activa5(),add()" />
          
          Tramo 3 Partida
          <input name="checkbox6" type="checkbox" id="checkbox6" onclick="activa6(),add()" />
          --
          
       
          <input name="checkbox2" type="checkbox" id="checkbox2" onclick="activa2(),add()" />
          Descripcion
<input name="descripcion" type="text" id="descripcion" size="27" class="texto" />
          Opcional
          <input name="textfield14" type="text" id="textfield14" size="20" class="texto" />
          
  <a href="#" onclick="add();"><img src="../images/agregar.png" width="20" height="20" border="0" />&nbsp;</a><a href="#" onclick="eliminarDiagnosticos();"><img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" /></a>
  <label for="textfield14"></label></td>-->
    <!--  </tr>
      <tr>
        <td >&nbsp;</td>
        <td >LLenar Guia 
         <a href="javascript:seleccionar_todo()">Marcar todos</a> | 
        <a href="javascript:deseleccionar_todo()">Marcar ninguno</a></label> <input type="button" name="button" id="button" value="Botón" onclick="llenar()" /></td>
      </tr>-->
      <tr>
        <td width="35" bgcolor="#000000" style="color:#FFF"><strong>Nro</strong></td>
        <td bgcolor="#000000" style="color:#FFF"><strong>Descripcion de la Guia</strong></td>
        <!--	 <td width="25" bgcolor="#000000" style="color:#FFF">&nbsp;</td>
 		<td width="24" bgcolor="#000000" style="color:#FFF">&nbsp;</td>
 		<td width="60" bgcolor="#000000" style="color:#FFF">&nbsp;</td>-->
      </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">1</td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="descripcion1" type="text" class="texto" id="descripcion1" value="SERVICIO DE TRANSPORTE DE PRODUCTOS REFRIGERADOS" size="80" />
      <label for="descripcion2"></label>
    </strong><strong>
        <!-- <input name="codigo1" type="text" id="codigo1" size="10" readonly="readonly"/>-->
        
        </strong><strong>
          <!--<input name="uni1" type="text"  id="uni1" size="15" readonly="readonly" />-->
          <!--<input name="r1" type="hidden" id="r1" size="2" />
      <input name="f1" type="hidden" id="f1" size="2" />
      <input name="c1" type="hidden" id="c1" size="2" />-->
          <!--<input type="hidden" name="um1" id="um1" />-->
          <label for="textfield18"></label>
          <label for="descripcion3"></label>
          <label for="descripcion4"></label>
          <label for="descripcion5"></label>
        </strong></td>
    <!--<td bgcolor="#CCCCCC">&nbsp;</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>-->
    </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">2</td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="descripcion2" type="text"  class="texto" id="descripcion2" value="" size="80" />
    </strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">3</td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="descripcion3" type="text" class="texto" id="descripcion3" value="1ER TRAMO PUNTO LLEGADA PUERTO PUCALLPA SN CALLERIA CORONEL PORTILLO UCAYALI" size="80" />
    </strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">4</td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="descripcion4" type="text" class="texto"  id="descripcion4" value="2DO TRAMO PUNTO PARTIDA PUERTO PUCALLPA SN CALLERIA CORONEL PORTILLO UCAYALI" size="80" />
    </strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">5</td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="descripcion5" type="text" class="texto"  id="descripcion5" value="2DO TRAMO PUNTO LLEGADA PUERTO ENAPU PUNCHAWA-MAYNAS-LORETO" size="80" />
    </strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">6</td>
    <td bgcolor="#CCCCCC"><label for="descripcion6"></label>
      <input name="descripcion6" type="text" class="texto"  id="descripcion6" value="3ER TRAMO PUNTO PARTIDA PUERTO ENAPU PUNCHAWA-MAYNAS-LORETO" size="80" /></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">7</td>
    <td bgcolor="#CCCCCC"><label for="descripcion7"></label>
      <input name="descripcion7" type="text" class="texto"  id="descripcion7" size="80" /></td>
  </tr>
    </table>
</fieldset>
<table border="0" align="center">
  <tr>
    <td><div class="buttons" align="center">
      <button type="button" class="positive" name="save" onclick="validagraba();" onblur="sumarcolumnatabla();"> <img src="../images/icon_accept.png" alt=""/>Grabar</button>
           <a href="#" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a></div></td>
  </tr>
</table>
</form>

</body>
</html>
