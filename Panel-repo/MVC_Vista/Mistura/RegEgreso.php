<?php 
if($obtnerusuario!=NULL)
{
	foreach ($obtnerusuario as $item)
	{
 
$id_usuario  =$item['id_usuario'];
$nombre_usuario  =$item['nombre_usuario'];
$stand_usuario =$item['stand_usuario'];
$contacto_usuario =$item['contacto_usuario'];
$telefono1_usuario  =$item['telefono1_usuario'];
$telefono2_usuario=$item['telefono2_usuario']; 
$email_usuario  =$item['email_usuario']; 
$grupo_usuario_id_grupo =$item['grupo_usuario_id_grupo']; 
$usuarioreg  =$item['usuarioreg'];
$fechareg=$item['fechareg'];
$estado=$item['estado'];
	
	}
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
sec = 1;
function agregarDiagnostico() {
	if(document.getElementById("descripcion" + sec).value != "")
	{
		sec += 1;
		//codigo = "codigo" + sec;
		descripcion = "descripcion" + sec;
		r="r" + sec
		f="f" + sec;
		c="c" + sec;
		um="um" + sec;
		codigo="codigo" + sec;
		uni="uni" + sec;
		re="re"+sec;
		tabla = document.getElementById("tablaDiagnostico");
		var tr = document.createElement("tr");
		tr.id = "fila" + sec;

		tr.innerHTML = "<td bgcolor='#CCCCCC'>" + sec + " <input type='hidden' id='" + sec + "' name='" + sec + "' readonly size='10'/> </td>";
		
		tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + re + "' type='checkbox' ' id='" + re + "' value='1' /></td>";
		
tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + descripcion + "' type='text' ' id='" + descripcion + "' size='30' readonly='readonly' class='texto'/></td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input name='" + codigo + "' type='text'  id='" + codigo + "' size='10' readonly='readonly'/> </td>";

tr.innerHTML += "<td bgcolor='#CCCCCC'><input  name='" + uni + "' type='text' id='" + uni + "' size='15' readonly='readonly' /> <input name='" + r + "' type='hidden' ' id='" + r + "' size='2' readonly='readonly'/><input name='" + f + "' type='hidden' ' id='" + f + "' size='2' readonly='readonly'/><input name='" + c + "' type='hidden' ' id='" + c + "' size='2' readonly='readonly'/><input name='" + um + "' type='hidden' ' id='" + um + "' size='2' readonly='readonly'/></td>";
		tabla.appendChild(tr);
	}
	else
	{
	}
}

function escribirDiagnostico()
{
	for(i=1; i<=sec; i++)
	{
		if(document.getElementById("descripcion" + i).value == "")
		{
			descripcion = document.getElementById("descripcion" + i);
			descripcion.value = document.formElem.descripcion.value;
			
			codigo=document.getElementById("codigo" + i);
			
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
			uni.value =  document.formElem.uniM.options[document.formElem.uniM.selectedIndex].text;
			
			um=document.getElementById("um" + i);
			um.value =  document.formElem.uniM.options[document.formElem.uniM.selectedIndex].value;
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
	document.formElem.descripcion.focus();
	}
function validagraba(){
	if(((document.getElementById("codi").value)=="") || ((document.getElementById("descripcion1").value)=="") ){
	alert("Faltan datos");
document.getElementById("hc").focus();
}else{
	linkgraba();
}
}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Retirar los Paquetes ?")){
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


function traerDatos2(e, tipo)
{	
	valor = null;	
	tecla = (document.all) ? e.keyCode : e.which;
	
	if (tecla == 13)
	{
		if(tipo=="DNI")
		{
			/*if(document.formElem.PAC_DNI.value.length == 8)
			{*/
			
				valor = document.formElem.tpac.value;	
		/*	}*/
		}
		else
		{
			//if(document.formElem.PAC_HISTORIA.value.length == 11)
			//{
				var dni=document.formElem.hiddenField.value;
				var valor=document.getElementById("codi").value;
				//valor = document.formElem.codi.value;	
			//}
		}
	}

	if(valor != null)
	{
		if (tecla != 8)
		{
			location.href="../MVC_Controlador/MisturaC.php?acc=m24&id="+valor+"&udni="+dni;
		}
	}
}




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

</script>
</head>
<body>
<div style="color:#036">REGISTRO DE EGRESO DE PAQUETES</div>
<form id="formElem" name="formElem"  method="post" 
action="../MVC_Controlador/MisturaC.php?acc=m25&udni=<?php echo $_GET['udni'];?>">
  <label></label>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado</strong></legend>
    <table width="554" height="110" border="0">

    <tr>
      <td width="125" height="24"><strong>Busque Cliente</strong></td>
      <td width="234"><input name="hc" type="text" id="hc" size="38" onkeyup="traerDatos2(event, 'hc')" value="<?php echo $id_usuario?>"  /><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>--></td>
      <td colspan="4" bgcolor="#FF0000" style="color:#FFF"><label for="codi">Digitar y Presionar Enter</label></td>
      </tr>
    <tr>
      <td height="24">Nombre</td>
      <td>
        <input name="nom" type="text" id="nom"  size="38" readonly="readonly" value="<?php echo  $nombre_usuario?>" /></td>
      <td width="85">Codigo</td>
      <td colspan="3"><label for="hora">
        <input name="codi" type="text" id="codi" size="15" value="<?php echo $id_usuario?>" />
      </label></td>
    </tr>
    <tr>
      <td height="24">Contacto</td>
      <td><input name="contacto" type="text" id="contacto"  size="38" readonly="readonly" value="<?php echo $contacto_usuario?>"/></td>
      <td>Fecha Hoy</td>
      <td colspan="3"><input name="txtfecreg2" type="text" id="txtfecreg2" value="<?php echo date("Y-m-d")?>" size="10" readonly="readonly"/></td>
    </tr>
    <tr>
      <td height="28">Stand</td>
      <td><input name="stand" type="text" id="stand"  size="19" readonly="readonly" value="<?php echo $stand_usuario?>"/></td>
      <td><input type="text" name="hiddenField" id="hiddenField" value="<?php echo $_GET['udni']; ?>" /></td>
      <td colspan="3">&nbsp;</td>
    </tr>
    </table>
</fieldset>
<fieldset class="fieldset legend">
    
    <legend style="color:#03C"><strong>Detalle</strong></legend>
    <table id="tablaDiagnostico" width="556" border="0">
      <tr>
        <td style="color:#FFF">&nbsp;</td>
        <td colspan="4"><a href="javascript:seleccionar_todo()">Marcar todos</a> | 
        <a href="javascript:deseleccionar_todo()">Marcar ninguno</a> &nbsp;</td>
      </tr>
      <tr>
        <td width="35" bgcolor="#000000" style="color:#FFF"><strong>Nro</strong></td>
        <td width="52" bgcolor="#000000" style="color:#FFF">Retirar</td>
        <td width="189" bgcolor="#000000" style="color:#FFF"><strong>Descripcion del Paquete</strong></td>
        <td width="78" bgcolor="#000000" style="color:#FFF"><strong>Ubicacion</strong></td>
        <td width="424" bgcolor="#000000" style="color:#FFF"><strong>Uni Med</strong></td>
	<!--	 <td width="25" bgcolor="#000000" style="color:#FFF">&nbsp;</td>
 		<td width="24" bgcolor="#000000" style="color:#FFF">&nbsp;</td>
 		<td width="60" bgcolor="#000000" style="color:#FFF">&nbsp;</td>-->
      </tr>
      <?php 
							if($Obtenerpaquetedaregreso != NULL)
							{		
								$i = 1;
								foreach($Obtenerpaquetedaregreso as $itemD)
								{
							?>
  <tr>
    <td bgcolor="#CCCCCC"><? echo $itemD["id_paquete"] ?></td>
    <td bgcolor="#CCCCCC"><input name="<?php echo "re".$i; ?>" type="checkbox" id="<?php echo "re".$i; ?>" value="<?php  echo $itemD["id_paquete"]; ?>" />
      <label for="re1"></label></td>
    <td bgcolor="#CCCCCC"><strong>
     <!-- <input name="descripcion1" type="text"  id="descripcion1" size="30" readonly="readonly" class="texto"/>--><input name="<?php echo "descripcion".$i; ?>" type="text"  id="<?php echo "descripcion".$i; ?>" size="30"   readonly="readonly" class="texto"  value="<?php echo $itemD["detalle_paquete"]; ?>">
      </strong></td>
    <td bgcolor="#CCCCCC"><strong>
     <!-- <input name="codigo1" type="text" id="codigo1" size="10" readonly="readonly"/>-->
  <input name="<?php echo "codigo".$i; ?>" type="text"  id="<?php echo "codigo".$i; ?>" size="10"   readonly="readonly" value="<?php echo $itemD["ubicacion"]; ?>">
    </strong></td>
    <td bgcolor="#CCCCCC"><strong>
     <!-- <input name="uni1" type="text"  id="uni1" size="15" readonly="readonly" />-->
       <input name="<?php echo "uni".$i; ?>" type="text"  id="<?php echo "uni".$i; ?>" size="10"   readonly="readonly" value="<?php echo $itemD["nombre_medida"]; ?>">
      
      <input name="r1" type="hidden" id="r1" size="2" />
      <input name="f1" type="hidden" id="f1" size="2" />
      <input name="c1" type="hidden" id="c1" size="2" />
      <input type="hidden" name="um1" id="um1" />
    </strong></td>
     <!--<td bgcolor="#CCCCCC">&nbsp;</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>-->
    </tr>
    <?php 	
								$i++;
								}			
							}
						?>
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
