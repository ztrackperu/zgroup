<?php
$tipper=$_REQUEST['selecttp'];
$tipdoc=$_REQUEST['select2'];
$ruc=$_REQUEST['txtruc'];
 //include("../php/Funciones/Funciones.php");
// 
//   //vWritePageToFile( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc=10436232620', '43623262.txt' );
//$RUCTXT=$_REQUEST["txtruc"];
//if($_REQUEST["txtruc"]!=""){
//
//   RecuperarXML( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc='.$RUCTXT, $RUCTXT.'.txt' );
//   QuitarXML($RUCTXT.'.txt');
//   QiotarLinesBlancas($RUCTXT.'.txt');
//
//$con=mysqli_connect("localhost:33066","root","1234","zgroup");
// 
//if (mysqli_connect_errno())
//  {
//  echo "orror  MySQL: " . mysqli_connect_error();
//  }
//mysqli_query($con,"LOAD DATA LOCAL INFILE '".$RUCTXT.".txt' REPLACE INTO TABLE sunatrusc FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n%%\n'");
///*ELIMINAMOS el TXT*/
//unlink($RUCTXT.'.txt'); /// Luego eliminas el TXT
///* LUEGO PODEMOS ELIMINAR EL REGISTRO YA VISUALIZADO RECUERDA Q SOLO ES UNA TAMBLA TEMPORAL */
//
//$result = mysqli_query($con,"SELECT * FROM sunatrusc limit  1");
//
//while($row = mysqli_fetch_array($result))
//  {
//    $row["camo1"];
//    list($RUSX, $RSOS) = split( '[-]', $row["camo1"]);
//    $razonsocial=trim($RSOS);
//   list($nombrerus, $ruc) = split( '[.]', trim($RUSX));
// // list($ruc, $razonsocial) = split( '[-]', trim($contenido));
//    $row["camo2"];
//    $row["camo3"];
//    $row["camo4"];
//  list($nombreestado, $estadoruc) = split( '[.]', $row["camo4"]);
//    $row["camo5"];
// // list($nombreretencio, $retencionigv) = split( '[.]', $row["camo5"]);
//    $retencionigv=substr($row["camo5"],26,500);
//    $row["camo6"];
//   list($nomcomericla, $nombrecomercial) = split( '[.]', $row["camo6"]);
//   $nombrecomercial=substr($row["camo6"],20,500);
//   $Direcciondomicilia=substr($row["camo7"],16,500); 
//   $row["camo8"];
//   $row["camo9"];
//   list($tel, $telf) = split( '[.]', $row["camo9"]);
//  //$telf=substr($row["camo9"],16,500);
//  
//  $row["camo10"];
//  $row["camo11"];
//  $row["camo12"];
//  $row["camo13"];
//  $row["camo14"];
//  $row["camo15"];
//  }
////echo $ruc.$razonsocial;
//$result = mysqli_query($con,"TRUNCATE sunatrusc");
//mysqli_close($con);
//}


?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Cliente</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
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
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript">

 function tipopersona(){
 	var combo=document.formElem.selecttp.options[document.formElem.selecttp.selectedIndex].value;
	var combo2=document.formElem.select2.options[document.formElem.select2.selectedIndex].value;
	
	if(combo=='J' && combo2=='06'){

		document.getElementById('apDiv1').style.display = 'none'; 
		//document.getElementById("txtruc").value='';
		//document.getElementById("textfield4").value='';
		//document.getElementById("textfield3").value='';
		document.getElementById("txtruc").disabled=false;
		document.getElementById("textfield4").disabled=false;
		document.getElementById("textfield3").disabled=false;
		document.getElementById("paterno").value='';
		document.getElementById("materno").value='';
		document.getElementById("nombre1").value='';
		document.getElementById("nombre2").value='';
		document.getElementById("txtruc").focus();
		
		}else{
				document.getElementById('apDiv1').style.display = 'block'; 
				document.getElementById("txtruc").disabled=true;
				document.getElementById("textfield4").disabled=true;
				document.getElementById("textfield3").disabled=true;
				document.getElementById("txtruc").value='';
				document.getElementById("textfield4").value='';
				document.getElementById("textfield3").value='';
				document.getElementById("paterno").value='';
				document.getElementById("materno").value='';
				document.getElementById("nombre1").value='';
				document.getElementById("nombre2").value='';
				document.getElementById("textfield5").value='';
				document.getElementById("textfield6").value='';
				document.getElementById("textfield7").value='';
				document.getElementById("textfield8").value='';
				document.getElementById("DNI").focus();
		
		}
	 
	 
	 
	 }

function valida(){
	//DNI
	var longitud=document.getElementById("txtruc").value.length;
	var longitud2=document.getElementById("DNI").value.length;
	var combo=document.formElem.selecttp.options[document.formElem.selecttp.selectedIndex].value;
	var combo2=document.formElem.select2.options[document.formElem.select2.selectedIndex].value;
	if(longitud<11 && combo=='J'){
	alert('Nro de RUC no valido debe contener 11 digitos')
	document.getElementById("txtruc").focus();
	return 0;
	}
	if(longitud2<7 && combo=='N'){
	alert('Nro de DNI no valido debe contener 8 digitos')
	document.getElementById("DNI").focus();
	return 0;
	}

	if(combo=='J' && combo2!='06'){
		alert('Seleccione Tipo de Persona Natural y/o Seleccione RUC');
		return 0;
		}
	if(combo=='N' && combo2=='06'){
		alert('Seleccione Tipo de Persona Juridica y/o Seleccione DNI');
		return 0;
		}
	if(combo=='J' && document.getElementById('txtruc').value=='' ){
		alert('Ingrese Nro de Ruc');
		document.getElementById('txtruc').focus();
		return 0;
		}
	if(combo=='N' && document.getElementById('DNI').value=='' ){
		alert('Ingrese Nro de DNI')
		return 0;
	}
	
	if(combo=='N' && document.getElementById('paterno').value=='' ){
		alert('Ingrese Apellido Paterno')

		document.getElementById('paterno').focus();
				return 0;
	}
	if(combo=='N' && document.getElementById('materno').value=='' ){
		alert('Ingrese Apellido materno')
	
		document.getElementById('materno').focus();
			return 0;
	}
	if(combo=='N' && document.getElementById('nombre1').value=='' ){
		alert('Ingrese Nombres')
		
		document.getElementById('nombre1').focus();
		return 0;
	}

	if(document.getElementById('textfield9').value==''){alert('Ingrese Contacto'); document.getElementById('textfield9').focus(); return 0;}
	
	if(document.getElementById('textfield8').value==''){alert('Ingrese Correo Electronico');document.getElementById('textfield8').focus(); return 0;}
	
	if(document.getElementById('textfield7').value==''){alert('Ingrese Telefono');document.getElementById('textfield7').focus();return 0;}
	
	
    var cer=document.formElem.certi.options[document.formElem.certi.selectedIndex].value;
	
	if(cer=='001'){
		alert('Ingrese Nro Certificado Basc');
		document.getElementById('nrocerti').focus();
		 return 0;
		}
	
	
		var tipo=document.formElem.selecttp.options[document.formElem.selecttp.selectedIndex].value;
	var documento=document.formElem.select2.options[document.formElem.select2.selectedIndex].value;
	var ruc=document.getElementById('txtruc').value;
	var cont=document.getElementById('textfield9').value;
	var email=document.getElementById('textfield8').value;
	var fono=document.getElementById('textfield7').value;
	var dis=document.getElementById('select6').value;
	var mat=document.getElementById('materno').value;
	var pat=document.getElementById('paterno').value;
	var n1=document.getElementById('nombre1').value;
	var n2=document.getElementById('nombre2').value;
	var dir1=document.getElementById('textfield5').value;
	var dir2=document.getElementById('textfield6').value;
	var xsocial=document.getElementById('textfield3').value;
	var xncomer=document.getElementById('textfield7').value;
	var dni=document.getElementById('DNI').value;
	var udni=document.getElementById('udni').value;
	var nrocer=document.getElementById('nrocerti').value
	social = xsocial.replace("&","@");
	ncomer = xncomer.replace("&","@");
//location.ref('../MVC_Controlador/cajaC.php?acc=registrocli');			

//location.href="../MVC_Controlador/cajaC.php?tipo="+tipo+"&acc=registrocli"+"&udni="+udni+"&doc="+documento+"&ruc="+ruc+"

//&con="+cont+"&ema"+email+"&fono="+fono+"&dis="+dis+"&mat="+mat+"pat="+pat+"&n1="+n1+"&n2="+n2+"d1="+dir1;



location.href="../MVC_Controlador/cajaC.php?acc=registrocli&tip="+tipo+"&doc="+documento+"&ruc="+ruc+"&con="+cont+"&ema="+email+"&fono="+fono+"&dis="+dis+"&mat="+mat+"&pat="+pat+"&n1="+n1+"&n2="+n2+"&d1="+dir1+"&d2="+dir2+"&soc="+social+"&name="+ncomer+"&dni="+dni+"&udni="+udni+"&certi="+cer+"&nrocerti="+nrocer;
	
	//document.getElementById('formElem').submit();
	}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

 </script>


<style type="text/css">
#apDiv1 {
	position:absolute;
	width:903px;
	height:94px;
	z-index:1;
	left: 2px;
	top: 84px;
	background-color: #F7F7F7;
}
</style>
</head>

<body onload="tipopersona()">

<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/cajaC.php?acc=valruccli&udni=<?php echo $_GET['udni']; ?>">
<div id="apDiv1">
  <p><strong>NRO DOC.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
 
    <input name="DNI" type="text" id="DNI" value="<?php echo $RUCTXT; ?>" />
    <input type="submit" name="button4" id="button4" value="Valida DNI" />
    
  </p>
  <p><strong>Apellido Paterno&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
  <input name="paterno" type="text" id="paterno" value=" " maxlength="30"  /> 
  <strong>Apellido Materno&nbsp;&nbsp;:</strong>
<input name="materno" type="text" id="materno" value="  " maxlength="30" />
</p>
  <p><strong>Primer Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> 
    <input name="nombre1" type="text" id="nombre1" value="  " maxlength="30" />
    <strong>Segundo Nombre&nbsp;: </strong>
<input name="nombre2" type="text" id="nombre2" value="  " maxlength="30"  />
</p>
</div>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Registro  Datos Principales de Clientes</strong></legend>

  <table width="908" border="1" align="left" >
    <tr>
      <th width="133" align="left" nowrap="nowrap"><strong>Tipo Persona</strong></th>
      <th width="8" align="right" nowrap="nowrap"><strong>:</strong></th>
      <td width="294"><?php $tipo=ListaTipPersonaC();?>
        <select name="selecttp" id="selecttp" onchange="tipopersona()" >
        
         <?php foreach($tipo as $item){?>
         
                <option value="<?php echo $item["c_camitm"]?>"<?php if($item["c_camitm"]==$tipper){?>selected<?php }?>><?php echo $item["c_desitm"]?>
          </option>
          
          <?php }	?>
        </select>
        
        
        
        
        </td>
      <td colspan="2" bgcolor="#CCFFFF"><input type="hidden" name="udni" id="udni" value="<?php echo $_GET['udni']; ?>"/>
        (Nota: opcion consultar con sunat deshabilitado)</td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Tipo Dcto</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td><label for="select2"></label><?php $dcto=lista_tipodocuC();?>
        <select name="select2" id="select2" onchange="tipopersona()" >
         <?php foreach($dcto as $item){?>
           <option value="<?php echo $item["c_coddoc"]?>"<?php if($item["c_coddoc"]==$tipdoc){?>selected<?php }?>><?php echo $item["c_desdoc"]?>
          
          
          </option>
          <?php }	?>
      </select></td>
      <td width="101">&nbsp;</td>
      <td width="338"><label for="select3">&nbsp;&nbsp; &nbsp;&nbsp;<input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/></label></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Ruc</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
     
      <input name="txtruc" type="text" disabled="disabled" size="11" id="txtruc" onKeyPress="return isNumberKey(event);" value="" maxlength="11" onMouseMove="selection.empty()" onMouseUp="selection.empty()" onKeyUp="selection.empty()"  oncontextmenu="return false;"/>       <!-- <input type="submit" name="button" id="button" value="Consultar en Sunat" onclick="validasunat();" /> --><strong style="color:#F00"><?php echo 'Digite RUC (11 digitos), No se permite pegar'.trim($estadoruc); ?></strong></td>
    </tr>
    <tr>
    <th align="left" nowrap="nowrap"><strong>Razon Social</strong></th>
    <th align="right" nowrap="nowrap"><strong>:</strong></th>
    <td colspan="3">
    <input name="textfield3" type="text" disabled="disabled" id="textfield3" value="<?php echo trim($razonsocial);?>" size="50" maxlength="100" />
    <input type="checkbox" name="checkbox" id="checkbox" />
    </td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Nombre Comercial</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield4" type="text" disabled="disabled" id="textfield4" value="<?php echo  trim($nombrecomercial); ?>" size="50" maxlength="100" />
    </td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Direccion 1</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield5" type="text" id="textfield5" size="70" value="<?php echo  trim($Direcciondomicilia); ?>" />
     
        <input type="checkbox" name="checkbox2" id="checkbox2" />
    </td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Direccion 2</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield6" type="text" id="textfield6" size="70" />
      </td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Telf</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
        <input name="textfield7" type="text" id="textfield7" value="<?php echo  trim($telf); ?>" maxlength="12" />        <strong>Email&nbsp;&nbsp;&nbsp;:</strong>        <input name="textfield8" type="text" id="textfield8" size="35" /></td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Contacto</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
        <input name="textfield9" type="text" id="textfield9" size="35" />
        <strong>Localidad:</strong>
        
  <?php $dist=lista_distritoC();?>
  <select name="select6" id="select6">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["dl_codi"]?>"><?php echo utf8_encode($item["dl_desc"])?></option>
    <?php }	?>
    </select>
</td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap" bgcolor="#99CCFF"><strong>Certificacion</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td>
          <?php $dist=ListaCertificadoM();?>
  <select name="certi" id="certi">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["C_NUMITM"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    </select></td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap" bgcolor="#99CCFF"><strong>Referencia</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
        <input type="text" name="nrocerti" id="nrocerti" />
        (En caso cliente Basc ejemplo  PERLIM500)</td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap">&nbsp;</th>
      <th align="right" nowrap="nowrap">&nbsp;</th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th colspan="5" align="center" nowrap="nowrap"><input type="button" name="button2" id="button2" value="Registrar" onclick="valida()" />
        <input type="button" name="button3" id="button3" value="Cancelar" /></th>
      </tr>
  </table>
  </fieldset>
</form>
</body>
</html>
