<?php
foreach ($resultadolista as $itemx)
	{
		$modulox=$itemx['idmodulo'];
	}
?> 
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
	$("#hc").autocomplete("../MVC_Controlador/MisturaC.php?acc=at1", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#hc").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#nom").val(data[1]);
		$("#stand").val(data[2]);
		$("#contacto").val(data[3]);
		$("#codi").val(data[4]);
	document.formElem.descripcion.focus();
	});
})
;
</script>
<script type="text/javascript">
var  posicionCampo=1;
function agregarUsuario(){
	
		nuevaFila = document.getElementById("tablaDiagnostico").insertRow(-1);
		nuevaFila.id=posicionCampo;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'>"+posicionCampo+"</td>";
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='descripcion"+posicionCampo+"' type='text' id='descripcion"+posicionCampo+ "' size='30' readonly='readonly' class='texto'></td>";  
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='codigo"+posicionCampo+"' type='text' id='codigo"+posicionCampo+ "' size='10' readonly='readonly'></td> ";
		nuevaCelda=nuevaFila.insertCell(-1);
nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'><input name='uni"+posicionCampo+"' type='text'  id='uni"+posicionCampo+"'  size='15' readonly='readonly'/><input name='um"+posicionCampo+"' type='hidden'  id='um"+posicionCampo+"'  size='2' readonly='readonly'/><input name='r"+posicionCampo+"' type='hidden'  id='r"+posicionCampo+"'  size='2' readonly='readonly'/><input name='f"+posicionCampo+"' type='hidden'  id='f"+posicionCampo+"'  size='2' readonly='readonly'/><input name='c"+posicionCampo+"' type='hidden'  id='c"+posicionCampo+"'  size='2' readonly='readonly'/></td> <img src='../images/user_logout.png' value='Eliminar'  onclick='eliminarUsuario(this)'>  ";
escribirDiagnostico(posicionCampo);
		posicionCampo++;
    }
function escribirDiagnostico(posicionCampo)
{
			descripcion = document.getElementById("descripcion" + posicionCampo);
			descripcion.value = document.formElem.descripcion.value;
			
			codigo=document.getElementById("codigo" +posicionCampo);
			
			var refer=document.formElem.refer.options[document.formElem.refer.selectedIndex].text;
			var filas=document.formElem.filas.options[document.formElem.filas.selectedIndex].text;
			var col=document.formElem.col.options[document.formElem.col.selectedIndex].text;
			r = document.getElementById("r" + posicionCampo);
			r.value=refer;
			f = document.getElementById("f" + posicionCampo);
			f.value=filas;
			c = document.getElementById("c" + posicionCampo);
			c.value=col;	
			var texto=refer+filas+col;
			codigo.value=texto;	
			uni= document.getElementById("uni" + posicionCampo);
			uni.value =  document.formElem.uniM.options[document.formElem.uniM.selectedIndex].text;	
			um=document.getElementById("um" + posicionCampo);
			um.value =  document.formElem.uniM.options[document.formElem.uniM.selectedIndex].value;
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
		document.getElementById("descripcion1").value="";
		document.getElementById("codigo1").value="";
		document.getElementById("uni1").value="";
	}       
}
function add(){
	agregarUsuario();
	//escribirDiagnostico();
	document.getElementById("descripcion").value="";
	document.getElementById("descripcion").focus();
	}
function validagraba(){
	if((document.getElementById("hc").value)==""){
	alert("Faltan datos");
document.getElementById("hc").focus();
}else{
	linkgraba();
}
}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Grabar Registros ?")){
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
  function eliminarUsuario(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }
</script>
</head>
<body>
<div style="color:#036">REGISTRO DE INGRESO DE PAQUETES</div>
<form id="formElem" name="formElem"  method="post" 
action="../MVC_Controlador/MisturaC.php?acc=m22&udni=<?php echo $_GET['udni'];?>&mod=<?php echo $modulox ?>">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="554" height="136" border="0">

    <tr>
      <td colspan="2" style="text-align:center;"><strong><span style="font-size:14px; color:#390; text-align:center">MODULO DE ATENCION NRO:<?php echo $modulox ?></span></strong></td>
      </tr>
    <tr>
      <td width="103" height="24"><strong> Cliente</strong></td>
      <td width="230"><input name="hc" type="text" id="hc" size="38" /><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>--></td>
      <td width="84">Codigo</td>
      <td width="133" colspan="3"><label for="codi"></label>
        <input type="text" name="codi" id="codi" /></td>
    </tr>
    <tr>
      <td height="24">Nombre</td>
      <td>
        <input name="nom" type="text" id="nom"  size="38" readonly="readonly" /></td>
      <td>Fecha </td>
      <td colspan="3"><label for="contacto">
        <input name="txtfecreg2" type="text" id="txtfecreg2" value="<?php echo date("Y-m-d")?>" size="10" readonly="readonly"/>
      </label>
        <label for="hora"></label></td>
    </tr>
    <tr>
      <td height="24">Contacto</td>
      <td><input name="contacto" type="text" id="contacto"  size="38" readonly="readonly" /></td>
      <td colspan="4"><span style="text-align:center;">
        <input type="text" name="hiddenField" id="hiddenField" value="<?php echo $modulox ?>" />
      </span></td>
      </tr>
    <tr>
      <td height="28">Stand</td>
      <td><input name="stand" type="text" id="stand"  size="19" readonly="readonly" /></td>
      <td>&nbsp;</td>
      <td colspan="3"><label for="textfield"></label>
        <input name="textfield" type="hidden" id="textfield" value="1" /></td>
    </tr>
    </table>
</fieldset>
<fieldset class="fieldset legend">
    
    <legend style="color:#03C"><strong>Detalle</strong></legend>
    <table id="tablaDiagnostico" width="555" border="0">
      <tr>
        <td height="31" colspan="4">Descripcion
          <input name="descripcion" type="text" id="descripcion" size="25" class="texto" />
          Refer
          <label for="refer"></label>
          <?php $grupo = $resultadolista;?>
          <select name="refer" id="refer" >
            <?php foreach($grupo as $item){ echo $modulo=$item['idmodulo'];?>
            
            <option value="<?php echo $item["id_contenedor"]?>"><?php echo $item["id_contenedor"]?></option>
            <?php }	?>
          </select>
          Fila
  <label for="filas"></label>
  <select name="filas" id="filas">
    <option>A</option>
    <option>B</option>
    <option>C</option>
    <option>D</option>
    <option>E</option>
    <option>F</option>
  </select>
          Columna
  <label for="col"></label>
  <select name="col" id="col">
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
  </select>
          Unidad Medida
  <label for="uniM"></label>
  <?php $grupo = ListaunidadmedidaC();?>
  <select name="uniM" id="uniM" >
    <?php foreach($grupo as $item){?>
    <option value="<?php echo $item["id_medida"]?>"><?php echo $item["nombre_medida"]?></option>
    <?php }	?>
  </select>
   
  <a href="#" onclick="add();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;</a><a href="#" onclick="eliminarDiagnosticos();"><img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" /></a></td>
      </tr>
      <tr>
        <td  bgcolor="#000000" style="color:#FFF"><strong>Nro</strong></td>
        <td  bgcolor="#000000" style="color:#FFF"><strong>Descripcion del Paquete</strong></td>
        <td  bgcolor="#000000" style="color:#FFF"><strong>Ubicacion</strong></td>
        <td  bgcolor="#000000" style="color:#FFF"><strong>Uni Med</strong></td>
	<!--	 <td width="25" bgcolor="#000000" style="color:#FFF">&nbsp;</td>
 		<td width="24" bgcolor="#000000" style="color:#FFF">&nbsp;</td>
 		<td width="60" bgcolor="#000000" style="color:#FFF">&nbsp;</td>-->
      </tr>
  <tr>
    <!--<td bgcolor="#CCCCCC">1
      
      <label for="qtar1"></label></td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="descripcion1" type="text"  id="descripcion1" size="30" readonly="readonly" class="texto"/>
      </strong></td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="codigo1" type="text" id="codigo1" size="10" readonly="readonly"/>
  
    </strong></td>
    <td bgcolor="#CCCCCC"><strong>
      <input name="uni1" type="text"  id="uni1" size="15" readonly="readonly" />
      <img align="top" src="../images/icon_delete.png" width="20" height="20" border="0" onclick="eliminarUsuario(this)" /><input name="r1" type="hidden" id="r1" size="2" />
      <input name="f1" type="hidden" id="f1" size="2" />
      <input name="c1" type="hidden" id="c1" size="2" />
      <input type="hidden" name="um1" id="um1" />
    </strong></td>-->
     <!--<td bgcolor="#CCCCCC">&nbsp;</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>-->
    </tr>
</table>
</fieldset>
<table border="0" align="center">
  <tr>
    <td><div class="buttons" align="center">
      <button type="button" class="positive" name="save" onclick="validagraba();" > <img src="../images/icon_accept.png" alt=""/>Grabar</button>
           <a href="../MVC_Controlador/MisturaC.php?acc=m21" class="negative"> <img src="../images/icon_delete.png" alt="" />Cancelar</a></div></td>
  </tr>
</table>
</form>

</body>
</html>
