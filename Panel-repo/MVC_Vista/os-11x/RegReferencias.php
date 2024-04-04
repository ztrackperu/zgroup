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

		
$().ready(function() {
	$("#material").autocomplete("../MVC_Controlador/cajaC.php?acc=proautoguia", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#material").result(function(event, data, formatted) {
		$("#material").val(data[2]);
		$("#codigorepuesto").val(data[1]);
		$("#hiddenField3").val(data[1]);
		//$("#unidad").val(data[1]);
		$("#hiddenField5").val(data[1]);

		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});

function copiarcodigo(){
	document.formElem.unidad.value=document.formElem.hiddenField3.value;
	}		
</script>
<script type="text/javascript">
function cursor(){
	document.getElementById('textfield').focus();	
	}
function abreVentana(obj){
var codigo=document.getElementById("hiddenField5").value;
	var cod=codigo
	var sw='1';
	var xsw='1';
	var res='1';
	var valor=obj
			if (codigo=="") {
				alert ("Debe Codigo Equipo");
			} else {
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigosR&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"&res="+res,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}	


function linkgraba(){
		// sumarcolumnatabla();
		
	
			
		
		 	 if(confirm("Seguro Realizar la referencia ?")){
	document.getElementById("formElem").submit();
			 }
	}
</script>
<script type="text/javascript">
$().ready(function() {
	
	
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codcli").val(data[1]);
		//$("#lentrega").val(data[4]);
		//$("#xlentrega").val(data[4]);
		//$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});
</script>
 <script type="application/javascript">

function ponerCeros(obj) {
  while (obj.value.length<3)
    obj.value = '0'+obj.value;
}
function ponerCeros2(obj) {
  while (obj.value.length<7)
    obj.value = '0'+obj.value;
}

/*continuar = setInterval(function(){
   inicio();
},5000);*/

//window.onload = inicio();
 </script>
<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=guardarefos&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"><strong>REFERENCIA ORDEN SERVICIO</strong></div>
  <table width="527" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="22" align="right" valign="middle">Orden Trabajo Nro</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td valign="middle">
        <input type="text" name="c_numos" id="c_numos"  class="texto" value="<?php echo $_GET['os'] ?>"/>
        <input type="hidden" name="c_usrudp" id="c_usrudp" value="<?php echo $_GET['udni'] ?>" /></td>
    </tr>
    <tr>
      <td height="22" align="right" valign="middle">Tipo Documento</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        <select name="c_tipdoc" id="c_tipdoc">
          <option value="001">FACTURA</option>
          <option value="002">BOLETA</option>
          <option value="003">REC.HON.ELEC</option>
        </select>
        </td>
    </tr>
    <tr>
      <td align="right" valign="middle">Serie</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle"><label for="textfield"></label>
       <input name="c_serdoc" type="text" required="required" class="texto"  id="c_serdoc" onblur="ponerCeros(this)"  size="10" maxlength="3"/></td>
    </tr>
    <tr>
      <td height="22" align="right" valign="middle">Nro Dcto</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        
        <input name="c_nrodoc" type="text" required="required" class="texto" id="c_nrodoc" onblur="ponerCeros2(this)" size="35" maxlength="7"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><input type="button" name="VALIDAR" id="VALIDAR" value="Guardar" onclick="linkgraba()"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    </table>
  </div>
</form>
</body>
</html>