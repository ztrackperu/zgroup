<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO DE CODIGO </title>
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
<script type="text/javascript">
$().ready(function() {
	$("#textfield").autocomplete("../MVC_Controlador/InventarioC.php?acc=serieequipoauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield").result(function(event, data, formatted) {
		$("#textfield").val(data[1]);
		$("#hiddenField").val(data[2]);
		$("#textfield2").val(data[3]);
		$("#hiddenField2").val(data[4]);
	});
	
});
</script>
<script type="text/javascript">
function cursor(){
	document.getElementById('textfield').focus();
	
	}
function abreVentana(obj){
var codigo=document.getElementById("hiddenField5").value;
var tiping=document.getElementById("tiping").value;
	var cod=codigo
	var sw='1';
	var xsw='1';
	var res='1';
	var valor=obj
			if (codigo=="") {
				alert ("Debe Ingresar Codigo Equipo");
} else {
miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigosEIR&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"&res="+res+"&tip="+tiping,"miwin","width=700,height=380,scrollbars=yes");
miPopup.focus();
			}
		}	
</script>
<body onload="cursor()">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=verdetalleequipo&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"> <span><strong>INGRESO DE EQUIPO GENERACION EIR</strong></span> </div>
  <table width="518" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" valign="middle">Nota: Se Sugiere empezar digitando los numeros del equipo</td>
      </tr>
    <tr>
      <td align="right" valign="middle">Busque Codigo Equipo</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle"><label for="textfield"></label>
      <input name="unidad" type="text" id="unidad" size="20" class="texto" onclick="abreVentana(this.name)" />
      <input type="hidden" name="hiddenField" id="hiddenField" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" />
      <input type="hidden" name="tiping" id="tiping" value="<?php echo $tiping; ?>" /></td>
    </tr>
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle"><label for="textfield3"></label>
        <input type="hidden" name="textfield3" id="textfield3" value="<?php echo $equipo; ?>"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><a href="../MVC_Controlador/InventarioC.php?acc=newcode&amp;udni=<?php echo $_GET['udni'] ?>&amp;tip=<?php echo $tiping;?>&amp;eq=<?php echo $equipo; ?>">-00</a></td>
      </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><label for="cod"></label>
        <input type="hidden" name="cod" id="cod" />        <label for="textfield2">
          <input type="text" name="hiddenField5" id="hiddenField5" value="<?php  $val=substr(
		  $equipo,1,2); echo '0'.$val?>" />
        
        </label>
        
    <input name="codigoequipo" type="hidden" id="codigoequipo" size="25" readonly="readonly" class="texto" />
      <input type="hidden" name="hiddenField" id="hiddenField" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" />
        </td>
      </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><input type="hidden" name="tipoio" id="tipoio" value="<?php echo $tipoio; ?>" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><input name="textfield2" type="text" id="textfield2" size="30" style="border:hidden;text-align:center" /></td>
      </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><input type="submit" name="VALIDAR" id="VALIDAR" value="Validar Información" /></td>
      </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>