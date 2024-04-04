<?php 
if($resultados!=NULL)
{
	foreach ($resultados as $item)
	{
		$udnis=$item['login'];
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Proveedores</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
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


<script type="text/javascript">
var  posicionCampo2=1;
function agregarUsuario2(){
	
		nuevaFila = document.getElementById("tablaDiagnostico2").insertRow(-1);
		nuevaFila.id=posicionCampo2;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='chofer"+posicionCampo2+"' type='text' id='chofer"+posicionCampo2+ "' size='30' readonly='readonly' class='texto'></td>";  
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='brevete"+posicionCampo2+"' type='text' id='brevete"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='placa"+posicionCampo2+"' type='text' id='placa"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		
		
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='marca"+posicionCampo2+"' type='text' id='marca"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='mtc"+posicionCampo2+"' type='text' id='mtc"+posicionCampo2+ "' size='15' readonly='readonly' class='texto'><a href='#'> <img src='../images/user_logout.png' value='Eliminar'  onclick='eliminarUsuario2(this)'></a> </td> "; 
		 

escribirDiagnostico2(posicionCampo2);
		posicionCampo2++;
    }
function escribirDiagnostico2(posicionCampo2)
{
			chofer = document.getElementById("chofer" + posicionCampo2);
			chofer.value = document.form1.chofer.value;
			
			brevete = document.getElementById("brevete" + posicionCampo2);
			brevete.value = document.form1.brevete.value;
			
			placa = document.getElementById("placa" + posicionCampo2);
			placa.value = document.form1.placa.value;
			
			marca = document.getElementById("marca" + posicionCampo2);
			marca.value = document.form1.marca.value;
						
			mtc = document.getElementById("mtc" + posicionCampo2);
			mtc.value = document.form1.mtc.value;
			
			
			
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
	
/*	if(document.formElem.estaequi.options[document.formElem.estaequi.selectedIndex].text=='DISPONIBLE'	){
		alert('Seleccione estado Venta, alquiler o Reparacion')
	}else{*/
	agregarUsuario2();
	document.getElementById("chofer").value="";
	document.getElementById("brevete").value="";
	document.getElementById("placa").value="";
	document.getElementById("marca").value="";
	document.getElementById("mtc").value="";
	document.getElementById("chofer").focus();
	//}

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
	
		if((document.getElementById("textfield7").value)==""){
		
		alert('Falta datos de Destinatario');
		return 0;
	}
	if((document.getElementById("transportista").value)==""){
		
		alert('Falta datos de Transportista');
		return 0;
	}
	
	
	if(posicionCampo2<=1){
		alert('Ingrese Detalle de Guia remision')
		return 0;
		}
	 if(confirm("Seguro de Grabar Guia de Remision ?")){
	document.getElementById("formElem").submit();
			 }
/*	if((document.getElementById("material1").value)==""){
	alert("Faltan Datos");
//document.getElementById("txtcodigo").focus();
}else{
	linkgraba();
}*/
}
function enviar(){
		udni=document.getElementById("dni").value;
	 	location.href="../MVC_Controlador/cajaC.php?acc=gregprov"+"&udni="+udni;
		//alert('hola');
	}
function graba1(){
	
		var longitud=document.getElementById("ruc").value.length;
	if(longitud<11){
	alert('Nro de RUC no valido debe contener 11 digitos')
	document.getElementById("ruc").focus();
	return 0;
	}
	
	
	if(document.getElementById("checkbox").checked!=true){
		if( document.getElementById('chofer1').value=="" || document.getElementById('ruc').value==""){
		alert('No ha Ingresado Ningun Datos de chofer');
		return 0;
		}
			if(confirm("Seguro de Grabar Proveedor ?")){
			document.getElementById("form1").submit();
			}
	}else{
		if(confirm("Seguro de Grabar Proveedor Sin Transportista ?")){
		document.getElementById("form1").submit();
		}
	}
}
function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
}

function trim(str, chars) {
    return ltrim(rtrim(str, chars), chars);
}
//www.nerdcoder.com/libreria-javascript-quitar-espacios-con-ltrim-rtrim-y-trim/#sthash.yhbS2OmT.dpuf
</script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/cajaC.php?acc=valrucprov">
  <table width="773" border="0" align="left">
    <tr>
      <td colspan="2"><a href="../MVC_Controlador/cajaC.php?acc=verprov">RETORNAR</a></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><strong><em>REGISTRO DE TRANSPORTISTA</em></strong></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><hr /></td>
    </tr>
    <tr>
      <td width="124" align="right"><strong>Digite Nro Ruc:</strong></td>
      <td><label for="chofer"></label>
      <input name="txtruc" type="text" id="txtruc" value="<?php echo trim($ruc);?>" maxlength="12" />        
 <input type="submit" name="button" id="button" value="Validar ruc con SUNAT"  /> <strong style="color:#003"><?php echo 'CONDICION DE RUC: '.trim($estadoruc); ?></strong></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td bgcolor="#CCCCFF">(Nota: opcion Validar ruc con SUNAT deshabilitado) <a href="../MVC_Controlador/cajaC.php?acc=regprovV2">LINK</a></td>
    </tr>
  </table>
  
</form>
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=gregprov">
<table width="773" border="0" align="left">
    <tr>
      <td height="24" align="right">&nbsp;</td>
      <td align="center">&nbsp;&nbsp; &nbsp;&nbsp;<input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><strong>Nro de Ruc</strong></td>
      <td><label for="txtruc"></label>
      <input type="text" name="ruc" id="ruc" onKeyPress="return isNumberKey(event);" value="" maxlength="11" onMouseMove="selection.empty()" onMouseUp="selection.empty()" onKeyUp="selection.empty()" oncontextmenu="return false;"/> 
      <strong style="color:#F00">Digite RUC (11 digitos), No se permite pegar
      <input name="user" type="text" id="user" readonly="readonly" value="<?php echo $udnis ?>"/>
      </strong></td>
    </tr>
    <tr>
      <td width="124" align="right"><strong>Razon Social:</strong></td>
      <td><label for="textfield3"></label>
      <input name="textfield3" type="text" id="textfield3" size="50" value="<?php echo trim($razonsocial);?>" /></td>
    </tr>
    <tr>
      <td align="right"><strong>Direccion: </strong></td>
      <td><label for="textfield5"></label>
      <input name="textfield5" type="text" id="textfield5" value="<?php echo  trim($Direcciondomicilia); ?>" size="70" maxlength="50" />
      (solo acepta 50 caracteres)</td>
    </tr>
    <tr>
      <td align="right"><strong>Telf Proveedor:</strong></td>
      <td>
        <input type="text" name="textfield7" id="textfield7" value="<?php echo  trim($telf); ?>" />
        <strong>Email</strong>
<input type="text" name="textfield8" id="textfield8" />
      <input type="checkbox" name="checkbox" id="checkbox" />
      <strong>Marque aqui si no cuenta con chofer.</strong></td>
    </tr>
    <tr>
      <td align="right"><strong>Certificado:</strong></td>
      <td><?php $dist=ListaCertificadoM();?>
  <select name="certi" id="certi">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["C_NUMITM"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    </select>&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><strong>Referencia:</strong></td>
      <td> <input type="text" name="nrocerti" id="nrocerti" />
        (En caso proveedor sea Basc ejemplo  PERLIM500)&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><hr /></td>
    </tr>
    <tr>
      <td colspan="2"><table width="1013" border="0" id="tablaDiagnostico2">
        <tr>
          <td width="180" align="center"><strong>Chofer
           
            <input name="chofer" type="text" id="chofer" size="30" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Brevete
           
            <input name="brevete" type="text" id="brevete" size="20" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Placa
           
            <input name="placa" type="text" id="placa" size="20" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Marca
        
            <input name="marca" type="text" id="marca" size="20" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Mtc
            
            <input name="mtc" type="text" id="mtc" size="20" class='texto'/>
          </strong></td>
          <td width="203" valign="bottom"><a href="#" onclick="add2();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;Agregar Chofer<span style="color:#FFF">
       
          </span></a></td>
        </tr>
        <tr>
          <td colspan="6"><hr /></td>
          </tr>
        <tr>
          <td align="center" bgcolor="#000000" style="color:#FFF"><strong>Chofer</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Brevete</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Placa</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Marca</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Mtc</strong></td>
          <td bgcolor="#000000"style="color:#FFF">&nbsp;</td>
          </tr>
        <tr>
          <td bgcolor="#FFFFFF" style="color:#FFF"><label for="chofer1"></label></td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="button2" id="button2" value="REGISTRAR" onclick="graba1()" />
        - 
      <input type="button" name="button3" id="button3" value="CANCELAR" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
