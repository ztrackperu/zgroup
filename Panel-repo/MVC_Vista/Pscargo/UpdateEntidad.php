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
	
	
	$("#nomcli").autocomplete("../MVC_Controlador/PscargoC.php?acc=entauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#nomcli").result(function(event, data, formatted) {
		$("#nomcli").val(data[0]);
		$("#clicod").val(data[2]);
		$("#cliruc").val(data[1]);
		$("#clidire").val(data[3]);

	});
});
</script>
 <script type="application/javascript">


/*continuar = setInterval(function(){
   inicio();
},5000);*/

//window.onload = inicio();
 </script>
<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/PscargoC.php?acc=updatecliente&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"><strong>Actualizacion Datos Clientes</strong></div>
  <table width="527" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
      </tr>
    <tr>
      <td width="105" align="right" valign="middle">Codigo</td>
      <td width="11" align="center" valign="middle">:</td>
      <td width="411" valign="middle"><input name="clicod" type="text" id="clicod" readonly="readonly" value="<?php echo $clicod ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Ruc</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle"><input name="cliruc" type="text" id="cliruc" value="<?php echo $cliruc ?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Razon Social</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        <input name="nomcli" type="text"  class="texto" id="nomcli" value="<?php echo $nomcli ?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Direccion</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle"><input name="clidire" type="text" id="clidire" size="60" value="<?php echo ($clidire) ?>"/></td>
    </tr>
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle">Usuario Modifica</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        <input name="udni" type="text" id="udni" value="<?php echo $udnix ?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><input type="submit" name="button" id="button" value="Actualizar" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>