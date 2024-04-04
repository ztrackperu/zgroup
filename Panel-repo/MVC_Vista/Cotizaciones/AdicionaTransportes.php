<?php

if($reporte!=NULL)
{
$cantDiagnosticos = 0;
$sw='1';
foreach($reporte as $itemD)
{
	$cantDiagnosticos += 1;
}

}else{
$cantDiagnosticos=1;	
$sw='0';
}
if($obtenerproveedor!=NULL){
	foreach($obtenerproveedor as $itemp){
		 $ruc=$itemp['PR_RUC'];
		 $razon=$itemp['PR_RAZO'];
		 $dir=$itemp['PR_DIR1'];
		 $telf=$itemp['PR_TELE'];
		 $email=$itemp['PR_EMAI'];

		
		
		}
	
	}

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
<title>Registro Cliente</title>
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
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo2=valor+1;
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
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='mtc"+posicionCampo2+"' type='text' id='mtc"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> "; 
		 
		 
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'> </td> "; 

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
			
		//	chofer1 = document.getElementById("chofer1");
//			chofer1.value = document.form1.chofer1.value;

			
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
	if(document.getElementById("chofer").value=="" || document.getElementById("brevete").value==""){
		alert ('Ingrese Datos del Chofer');
			}else{
		
	agregarUsuario2();
	document.getElementById("chofer").value="";
	document.getElementById("brevete").value="";
	document.getElementById("placa").value="";
	
		document.getElementById("marca").value="";
document.getElementById("mtc").value="";
	
	document.getElementById("chofer").focus();
	//}
	}
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
			var theTable = document.getElementById('tablaDiagnostico2');
cantFilas = theTable.rows.length;
//alert(cantFilas)
	if(cantFilas==3){
		
		alert ('Falta No Hay NIngun Chofer');
		document.form1.chofer.focus() 
		return 0;
		}
	if(confirm("Seguro de Grabar Chofer(s) ?")){
	document.getElementById("form1").submit();
	
	}
}
</script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=adicionatrans">
  <table width="855" border="0" align="left">
    <tr>
      <td colspan="2" align="center" bgcolor="#0000CC" style="color:#FFF">UPDATE DATOS TRANSPORTISTA
        <label for="sw"></label>
      <input name="sw" type="hidden" id="sw" value="<?php echo $sw ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FF0000" style="color:#FFF"><?php echo 'Transportista: '.$_GET['nom'].' '.'Ruc: '.$_GET['cod']; ?>
      <input type="hidden" name="cod" id="cod" value="<?php echo $_GET['cod']; ?>"/>
      <input type="hidden" name="nom" id="nom" value="<?php echo $_GET['nom']; ?>" /></td>
    </tr>
    <tr>
      <td align="right"><strong>Nro de Ruc</strong></td>
      <td width="830"><label for="txtruc"></label>
        <input name="ruc" type="text" id="ruc" onmouseup="selection.empty()" onmousemove="selection.empty()" onkeypress="return isNumberKey(event);" onkeyup="selection.empty()" value="<?php echo $ruc ?>" maxlength="11" readonly="readonly" oncontextmenu="return false;"/>
        <strong style="color:#F00">Digite RUC (11 digitos), No se permite pegar
          <input name="user" type="text" id="user" readonly="readonly" value="<?php echo $udnis ?>"/>
        </strong></td>
    </tr>
    <tr>
      <td width="213" align="right"><strong>Razon Social:</strong></td>
      <td><label for="textfield3"></label>
        <input name="textfield3" type="text" id="textfield3" size="50" value="<?php echo trim($razon);?>" /></td>
    </tr>
    <tr>
      <td align="right"><strong>Direccion: </strong></td>
      <td><label for="textfield5"></label>
        <input name="textfield5" type="text" id="textfield5" value="<?php echo  trim($dir); ?>" size="70" maxlength="50" />
        (solo acepta 50 caracteres)</td>
    </tr>
    <tr>
      <td align="right"><strong>Telf Proveedor:</strong></td>
      <td><input type="text" name="textfield7" id="textfield7" value="<?php echo  trim($telf); ?>" />
        <strong>Email</strong>
        <input type="text" name="textfield8" id="textfield8" value="<?php echo $email ?>" />
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
        </select>
        &nbsp;</td>
    </tr>
    <tr>
      <td align="right"><strong>Referencia:</strong></td>
      <td><input type="text" name="nrocerti" id="nrocerti" />
        (En caso proveedor sea Basc ejemplo  PERLIM500)&nbsp;</td>
    </tr>
    <tr>
      <td align="center" style="color:#FFF">&nbsp;</td>
      <td align="center" style="color:#FFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><hr /></td>
    </tr>
    <tr>
      <td colspan="2"><table width="847" border="0" id="tablaDiagnostico2">
        <tr>
          <td width="193">Chofer
           
            <input name="chofer" type="text" id="chofer" size="30"class='texto' /></td>
          <td width="128">Brevete
           
            <input name="brevete" type="text" id="brevete" size="20" class='texto'/></td>
          <td width="133">Placa
           
            <input name="placa" type="text" id="placa" size="20" class='texto'/></td>
          <td width="137">Marca
           
            <input name="marca" type="text" id="marca" size="20" class='texto'/></td>
          <td width="137">Mtc
            
            <input name="mtc" type="text" id="mtc" size="20" class='texto'/></td>
          <td width="286" valign="bottom"><a href="#" onclick="add2();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;Agregar<span style="color:#FFF">
           
          </span></a></td>
        </tr>
        <tr>
          <td colspan="6"><hr /></td>
          </tr>
        <tr>
          <td bgcolor="#000000" style="color:#FFF">Chofer</td>
          <td bgcolor="#000000"style="color:#FFF">Brevete</td>
          <td bgcolor="#000000"style="color:#FFF">Placa</td>
          <td bgcolor="#000000"style="color:#FFF">Marca</td>
          <td bgcolor="#000000"style="color:#FFF">Mtc</td>
          <td bgcolor="#000000"style="color:#FFF">Delete</td>
          </tr>
           <?php 
							if($reporte != NULL)
							{		
								$i = 1;
								foreach($reporte as $itemD)
								{
							?>
        <tr>
          <td bgcolor="#FFFFFF" style="color:#FFF"><input type="text" id="<?php echo "chofer".$i; ?>"  name="<?php echo "chofer".$i; ?>"  size="30" value="<?php echo $itemD["c_chofer"]; ?>" class='texto' /></td>
          <td bgcolor="#FFFFFF"style="color:#FFF"><input type="text" id="<?php echo "brevete".$i; ?>"  name="<?php echo "brevete".$i; ?>"  size="20" value="<?php echo $itemD["c_brevete"]; ?>" class='texto' /></td>
          <td bgcolor="#FFFFFF"style="color:#FFF"><input type="text" id="<?php echo "placa".$i; ?>"  name="<?php echo "placa".$i; ?>"  size="20" value="<?php echo $itemD["c_placa"]; ?>" class='texto' /></td>
          <td bgcolor="#FFFFFF"style="color:#FFF"><input type="text" id="<?php echo "marca".$i; ?>"  name="<?php echo "marca".$i; ?>"  size="20" value="<?php echo $itemD["c_marca"]; ?>" class='texto' /></td>
          <td bgcolor="#FFFFFF"style="color:#FFF"><input type="text" id="<?php echo "mtc".$i; ?>"  name="<?php echo "mtc".$i; ?>"  size="20" value="<?php echo $itemD["c_mtc"]; ?>" class='texto' /></td>
          <td bgcolor="#FFFFFF"style="color:#FFF"><input type="button" name="button" id="button" value="Delete" onclick="eliminarUsuario(this)" /></td>
          </tr>
           <?php 	
								$i++;
								}			
							}
						?>
      </table></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="button2" id="button2" value="GUARDAR" onclick="graba1()" />
        - 
      <input type="button" name="button3" id="button3" value="CANCELAR" /></td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
  </table>
  <p>  
  <p>  
  <p>  
  <p>  
  <p>
  

</form>

<p>&nbsp;</p>
</body>
</html>
