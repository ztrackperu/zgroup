<?php 
if($resultados!=NULL)
{
	foreach ($resultados as $item)
	{
		$udnix=$item['login'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imprime Cotizacion</title>
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
	
	
	$("#nomcli").autocomplete("../MVC_Controlador/PscargoC.php?acc=entauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#nomcli").result(function(event, data, formatted) {
		$("#nomcli").val(data[1]);
		$("#clicod").val(data[3]);
		$("#cliruc").val(data[2]);
		$("#clidire").val(data[4]);

	});
});
</script>
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>
 <script type="application/javascript">

function graba(){
	
	
	if(document.getElementById('serie').value==''){
		jAlert ('Falta Serie Factura', 'Mensaje del Sistema');
		return 0;
		}
	if(document.getElementById('numero').value==''){
		jAlert ('Falta Numero Factura', 'Mensaje del Sistema');
		return 0;
		}
	
	jConfirm("¿Seguro de Cambiar TC?", "Mensaje Confirmacion", function(r) {
			if(r) {
				//document.form1.submit();
				document.getElementById("formElem").submit();
			} else {
				return 0;
			}
		});
	
	
	}


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
<form id="formElem" name="formElem" method="post" action="../MVC_Vista/Cotizaciones/print/imprimircotrenov.php">
  <div class="column_left">
    <div class="header"><strong>Imprimir Cotizacion</strong></div>
  <table width="527" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
      </tr>
    <tr>
      <td width="182" align="right" valign="middle">Nro de Cotizacion</td>
      <td width="6" align="center" valign="middle">:</td>
      <td width="320" valign="middle">
        <input name="coti" type="text"  class="texto" id="coti"  size="10" maxlength="7" readonly="readonly"  value="<?php echo $c_numped ?>"/>
        <input name="cli" type="text"  class="texto" id="cli"  size="10" maxlength="7" readonly="readonly"  value="<?php echo $cli ?>"/></td>
    </tr>
    <tr>
      <td colspan="3" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">
      <input type="submit" name="button" id="button" value="Imprimir"  /></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>