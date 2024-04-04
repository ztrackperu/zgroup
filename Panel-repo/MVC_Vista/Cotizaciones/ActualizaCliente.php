<?php
$tipper=$_REQUEST['selecttp'];
$tipdoc=$_REQUEST['select2'];
$ruc=$_REQUEST['txtruc'];

if($resul!=NULL){
	
	foreach($resul as $item){
		
		$ruc=$item['CC_NRUC'];
		$razon=$item['CC_RAZO'];
		$razon2=$item['CC_NCOM'];
		$dir1=$item['CC_DIR1'];
		$dir2=$item['CC_DIR2'];
		$tel=$item['CC_TELE'];
		$correo=strtoupper($item['CC_EMAI']);
		$contacto=$item['CC_RESP'];
		$distrito=$item['CC_CDIS'];
		$tipdoc=$item['CC_TDOC'];
		$tipper=$item['CC_TCLI'];
		$cc_apat=$item['CC_APAT'];
		$cc_amat=$item['CC_AMAT'];
		$cc_nomb=$item['CC_NOMB'];
		$cc_nomb2=$item['CC_NOMB2'];
		$cc_ndni=$item['CC_NDNI'];;
		$ncomer=$item['CC_NCOM'];
		$certi=$item['c_CodCert'];
		$nrocerti=$item['c_DetalleCert'];
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
				//document.getElementById("paterno").value='';
//				document.getElementById("materno").value='';
//				document.getElementById("nombre1").value='';
//				document.getElementById("nombre2").value='';
//				document.getElementById("textfield5").value='';
//				document.getElementById("textfield6").value='';
				document.getElementById("textfield7").value='';
				document.getElementById("textfield8").value='';
				document.getElementById("DNI").focus();
		
		}
	 
	 
	 
	 }

function valida(){
	 	var combo=document.formElem.selecttp.options[document.formElem.selecttp.selectedIndex].value;
	var combo2=document.formElem.select2.options[document.formElem.select2.selectedIndex].value;
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
	var xncomer=document.getElementById('textfield4').value;
	var dni=document.getElementById('DNI').value;
	var udni=document.getElementById('udni').value;
	var cli=document.getElementById('cli').value;
	var nrocer=document.getElementById('nrocerti').value
	social = xsocial.replace("&","@");
	ncomer = xncomer.replace("&","@");
//location.ref('../MVC_Controlador/cajaC.php?acc=registrocli');			

//location.href="../MVC_Controlador/cajaC.php?tipo="+tipo+"&acc=registrocli"+"&udni="+udni+"&doc="+documento+"&ruc="+ruc+"

//&con="+cont+"&ema"+email+"&fono="+fono+"&dis="+dis+"&mat="+mat+"pat="+pat+"&n1="+n1+"&n2="+n2+"d1="+dir1;
    var cer=document.formElem.certi.options[document.formElem.certi.selectedIndex].value;
	
	if(cer=='001'){
		alert('Ingrese Nro Certificado Basc');
		document.getElementById('nrocerti').focus();
		 return 0;
		}


location.href="../MVC_Controlador/cajaC.php?acc=actualizarcli&tip="+tipo+"&doc="+documento+"&ruc="+ruc+"&con="+cont+"&ema="+email+"&fono="+fono+"&dis="+dis+"&mat="+mat+"&pat="+pat+"&n1="+n1+"&n2="+n2+"&d1="+dir1+"&d2="+dir2+"&soc="+social+"&name="+ncomer+"&dni="+dni+"&udni="+udni+"&cli="+cli+"&certi="+cer+"&nrocerti="+nrocer;
	
	//document.getElementById('formElem').submit();
	}



 </script>


<style type="text/css">
#apDiv1 {
	position:absolute;
	width:903px;
	height:94px;
	z-index:1;
	left: 2px;
	top: 101px;
	background-color: #F7F7F7;
}
</style>
</head>

<body onload="tipopersona()">

<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/cajaC.php?acc=valruccli&udni=<?php echo $_GET['udni']; ?>">
<div id="apDiv1">
  <p><strong>Nro Doc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
 
    <input name="DNI" type="text" id="DNI" value="<?php echo $cc_ndni; ?>" readonly="readonly" />
    <input type="submit" name="button4" id="button4" value="Valida DNI" />
    
  </p>
  <p><strong>Apellido Paterno&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
  <input name="paterno" type="text" id="paterno" value="<?php echo utf8_encode($cc_apat);?>" maxlength="30"/> 
  <strong>Apellido Materno&nbsp;&nbsp;:</strong>
<input name="materno" type="text" id="materno" value="<?php echo utf8_encode($cc_amat);?>" maxlength="30"/>
</p>
  <p><strong>Primer Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> 
    <input name="nombre1" type="text" id="nombre1" value="<?php echo utf8_encode($cc_nomb);?>" maxlength="30"/>
    <strong>Segundo Nombre&nbsp;: </strong>
<input name="nombre2" type="text" id="nombre2" value="<?php echo utf8_encode($cc_nomb2);?>" maxlength="30"/>
</p>
</div>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Actualizar  Datos Principales de Clientes <?php echo $_GET['cli']; ?></strong></legend> 

  <table width="908" border="1" align="left" >
    <tr>
      <th width="133" align="left" nowrap="nowrap"><strong>Tipo Persona</strong></th>
      <th width="8" align="right" nowrap="nowrap"><strong>:</strong></th>
      <td width="294"><?php $tipo=ListaTipPersonaC();?>
        <select name="selecttp" id="selecttp" onchange="tipopersona()"  >
        
         <?php foreach($tipo as $item){?>
         
    <option value="<?php echo $item["c_camitm"]?>"<?php if($item["c_camitm"]==$tipop){?>selected<?php }?>><?php echo $item["c_desitm"]?>
          </option>
          
        
          
          
          
          
          <?php }	?>
        </select>
        
        
        
        
        
        
        </td>
      <td width="101"><input name="cli" type="hidden" id="cli" value="<?php echo $_GET['cli']; ?>" /></td>
      <td width="338"><input type="hidden" name="udni" id="udni" value="<?php echo $_GET['udni']; ?>"/>
        <input type="hidden" name="tipocarga" id="tipocarga" value="<?php echo $tipocarga; ?>" /></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Tipo Dcto</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td><label for="select2"></label><?php $dcto=lista_tipodocuC();?>
        <select name="select2" id="select2" onchange="tipopersona()" >
         <?php foreach($dcto as $item){?>
     <option value="<?php echo $item["c_coddoc"]?>"<?php if($item["c_coddoc"]==$doc){?>selected<?php }?>><?php echo $item["c_desdoc"]?>
          
          
          </option>
          <?php }	?>
      </select></td>
      <td>&nbsp;</td>
      <td><label for="select3"></label></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Ruc</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
     
      <input name="txtruc" type="text" disabled="disabled" size="11" id="txtruc" value="<?php echo $ruc;?>" readonly="readonly"/>       
       <!--<input type="submit" name="button" id="button" value="Consultar en Sunat" onclick="validasunat();"  />--> <strong style="color:#003"></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Razon Social</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield3" type="text" disabled="disabled" id="textfield3" value="<?php echo utf8_encode($razon);?>" size="50"  
      maxlength="100"/>
      <input type="checkbox" name="checkbox" id="checkbox" /></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Nombre Comercial</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield4" type="text" disabled="disabled" id="textfield4" value="<?php echo  utf8_encode($ncomer); ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Direccion 1</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield5" type="text" id="textfield5" size="80" value="<?php echo  utf8_encode($dir1); ?>" />
     
        <input type="checkbox" name="checkbox2" id="checkbox2" />
    </td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Direccion 2</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
      <input name="textfield6" type="text" id="textfield6" size="80" value="<?php echo utf8_encode($dir2); ?>" />
      </td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Telf</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
        <input name="textfield7" type="text" id="textfield7" value="<?php echo  $tel; ?>" maxlength="12" />        <strong>Email&nbsp;&nbsp;&nbsp;:</strong>        <input name="textfield8" type="text" id="textfield8" value="<?php echo $correo ?>" size="40"/></td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Contacto</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
        <input name="textfield9" type="text" id="textfield9" value="<?php echo utf8_encode($contacto) ?>" size="35" />
        <strong>Localidad:</strong>
        <label for="select4">
  <?php $dist=lista_distritoC();?>
  <select name="select6" id="select6">
    <?php foreach($dist as $item){?>
   
    
<option value="<?php echo $item["dl_codi"]?>"<?php if($item["dl_codi"]==$distrito){?>selected<?php }?>><?php echo $item["dl_desc"]?>    
    
    
    
    </option>
    <?php }	?>
    </select>
</label></td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Certificado</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td>
      <?php $dist=ListaCertificadoM();?>
      <select name="certi" id="certi"> 
    <?php foreach($dist as $item){?>
   
    
<option value="<?php echo $item["C_NUMITM"]?>"<?php if($item["C_NUMITM"]==$certi){?>selected<?php }?>><?php echo $item["c_desitm"]?>    
    
    
    
    </option>
    <?php }	?>
    </select>
      
      &nbsp;</td>
      <td>&nbsp;</td>
      <td><label for="select6"></label></td>
    </tr>
    <tr>
      <th align="left" nowrap="nowrap"><strong>Referencia</strong></th>
      <th align="right" nowrap="nowrap"><strong>:</strong></th>
      <td colspan="3">
        <input type="text" name="nrocerti" id="nrocerti" value="<?php echo $nrocerti ?>" />
        (En caso cliente Basc ejemplo PERLIM500 </td>
      </tr>
    <tr>
      <th align="left" nowrap="nowrap">&nbsp;</th>
      <th align="right" nowrap="nowrap">&nbsp;</th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th colspan="5" align="center" nowrap="nowrap"><input type="button" name="button2" id="button2" value="Actualizar" onclick="valida()" />
        <input type="button" name="button3" id="button3" value="Cancelar" /></th>
      </tr>
  </table>
  </fieldset>
</form>
</body>
</html>
