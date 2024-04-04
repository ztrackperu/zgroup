<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deriva Contacto </title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/formulario.css" type="text/css" rel="stylesheet">
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
 <script type="application/javascript">

function cmbuser(){
	document.getElementById('hiddenField8').value=document.formElem.cmbderiva.options[document.formElem.cmbderiva.selectedIndex].text;
	}
	
function valida(){
	
var cmb=document.formElem.cmbderiva.options[document.formElem.cmbderiva.selectedIndex].text	;

if(cmb=='[.:Seleccione:.]'){
	
	jAlert('Falta Asignar Vendedor', 'Mensaje del Sistema');
		return 0;
}
document.formElem.submit();
	
	
	}	
/*continuar = setInterval(function(){
   inicio();
},5000);*/

//window.onload = inicio();
 </script>
<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/buzonC.php?acc=guardasol&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"><strong>CONFIRMAR DERIVACION</strong></div>
    <table width="446" height="235" border="0" cellpadding="0" cellspacing="0">
      <tr>
      <td width="108" height="24" bgcolor="#A3C7F3">Derivar a:</td>
      <td colspan="2" bgcolor="#A3C7F3"><select name="cmbderiva" id="cmbderiva" onchange="cmbuser();">
        <option value="0">[..::Seleccione::..]</option>
        <option value="40294243">Matilde Amenero</option>
        <option value="45172927">Angeli Navarro</option>
        <option value="12000100">Leidy Espiritu</option>
        <option value="70210612">Joel Linares</option>
        <option value="43377015">Kevin Taya</option>
      </select>
        <input type="hidden" name="id" id="id" value="<?php echo $val1=$_GET['id']; ?>" />
        <input type="hidden" name="udni" id="udni" value="<?php echo $_GET['udni']; ?>" />
       </td>
    </tr>
    <tr>
      <td colspan="3"><strong>Datos Contacto:</strong></td>
    </tr>
    <tr>
      <td>Fecha Solicitud</td>
      <td>:</td>
      <td><?php echo $val8=$_GET['fec']; ?>
<input type="hidden" name="hiddenField7" id="hiddenField7" value="<?php echo $_GET['fec']; ?>"/></td>
    </tr>
    <tr>
      <td>Empresa</td>
      <td width="6">:</td>
      <td width="332"><?php echo $val2=$_GET['emp']; ?>
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['emp']; ?>" /></td>
      </tr>
      <tr>
      <td>Contacto</td>
      <td>:</td>
      <td><?php echo $val3=$_GET['cont']; ?>
        <input type="hidden" name="hiddenField2" id="hiddenField2"
         value="<?php echo  $_GET['cont']; ?>" /></td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td>:</td>
      <td><?php echo $val4=$_GET['fon']; ?>
        <input type="hidden" name="hiddenField3" id="hiddenField3"  value="<?php echo $_GET['fon']; ?>"/></td>
    </tr>
    <tr>
      <td>Correo</td>
      <td>:</td>
      <td><?php echo $val5=$_GET['ema']; ?>
        <input type="hidden" name="hiddenField4" id="hiddenField4" value="<?php echo  $_GET['ema'];?>" /></td>
    </tr>
    <tr>
      <td>Producto</td>
      <td>:</td>
      <td><?php echo $val6=$_GET['pro']; ?>
        <input type="hidden" name="hiddenField5" id="hiddenField5" value="<?php echo $_GET['pro']; ?>"/></td>
    </tr>
    <tr>
      <td>Consulta</td>
      <td>:</td>
      <td><?php echo $val7=$_GET['con']; ?>
        <input type="hidden" name="hiddenField6" id="hiddenField6" value="<?php echo $_GET['con']; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#99CCFF"><strong style="color:#F00">Una vez asignado la derivacion esta no sera cambiado.</strong></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="button" name="button" id="button" value="Registrar Derivacion" onclick="valida()"/></td>
    </tr>
    </table>
  </div>
</form>
</body>
</html>