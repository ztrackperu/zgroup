<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>
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

<script type="text/javascript">
	


function linkgraba(){
		// sumarcolumnatabla();
		
		
	}
function ponerCeros(obj,val) {
	
	var i=val;
	
  while (obj.value.length<i)
    obj.value = '0'+obj.value;
}
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

function guarda(){

		if(document.getElementById('serie').value==''){
		jAlert('Ingrese Serie', 'Mensaje del Sistema');
		return 0;
		}
		if(document.getElementById('c_numeguia').value==''){
		jAlert('Ingrese Numero', 'Mensaje del Sistema');
		return 0;
		}
		if(document.getElementById('d_fecguia').value==''){
		jAlert('Ingrese Fecha Dcto', 'Mensaje del Sistema');
		return 0;
		}
			if(document.getElementById('c_osb').value==''){
		jAlert('Ingrese Motivo de Anulacion', 'Mensaje del Sistema');
		return 0;
		}
		
	jConfirm("¿Seguro de Realizar La Anulacion?", "Mensaje de Confirmacion", function(r) {
			if(r) {
				//document.form1.submit();
				document.getElementById("formElem").submit();
			} else {
				return 0;
			}
		});
 }
</script>

<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/InventarioC.php?acc=anularguia&udni=<?php echo $_GET['udni'] ?>&mod=<?php echo $_GET['mod'] ?>">
  <div class="column_left">
    <div class="header"><strong>ANULACION DE GUIA NO REGISTRADA</strong></div>
    
    <table width="495" border="0">
  <tr>
    <td width="127">Ingrese Serie</td>
    <td width="352">
      <input name="serie" type="text" id="serie" size="10" maxlength="3" onblur="ponerCeros(this,3)" onkeypress="return isNumberKey(event)" required="required"/></td>
  </tr>
  <tr>
    <td>Ingrese Nro Guia</td>
    <td>
      <input name="c_numeguia" type="text" id="c_numeguia" size="15" maxlength="7" onblur="ponerCeros(this,7)" onkeypress="return isNumberKey(event)" required="required"/></td>
  </tr>
  <tr>
    <td>Fecha Anulacion</td>
    <td>
      <input name="d_fecguia" type="text" id="d_fecguia" size="15" required="required" /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
			<script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "d_fecguia",
						ifFormat   : "%d/%m/%Y",
						button     : "Image1"
						  }
						);
			 </script></td>
  </tr>
  <tr>
    <td>Motivo Anulacion</td>
    <td>
      <input name="c_osb" type="text" id="c_osb" value="" size="40" maxlength="50" /></td>
  </tr>
  <tr>
    <td colspan="2" style="color:#F00">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" style="color:#F00">Nota: El sistema validara que la informacion sea correcta</td>
    </tr>
  <tr>
    <td colspan="2" style="color:#F00">&nbsp;</td>
  </tr>
    </table>
    <p><div class="buttons">
    <button type="button" class="positive" name="save" onclick="guarda()">
        <img src="../images/icon_accept.png" alt=""/>
        Anular
    </button>

 <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>

    <button type="button" class="negative" name="save">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
      </button>
</div>&nbsp;</p>
  
  
  </div>
</form>
</body>
</html>