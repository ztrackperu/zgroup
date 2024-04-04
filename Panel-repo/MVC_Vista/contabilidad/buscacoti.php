<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zgroup </title>
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
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
<script type="text/javascript">
$().ready(function() {
	$("#txtbusca").autocomplete("../MVC_Controlador/cajaC.php?acc=cargar_coti_guia", {
		width: 260, 
		matchContains: true,
		selectFirst: true
	});	
	$("#txtbusca").result(function(event, data, formatted) {
		$("#txtbusca").val(data[1]);
		$("<?php $valor ?>").val(data[1]);
			});
	
});
			
</script>
<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
    
    
    
<![endif]-->
<script type="text/javascript" src="../Admision/js/jquery.js"></script>
<script type="text/javascript" src="../Admision/js/jquery-ui.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../Admision/js/hint.js"></script>
<script type="text/javascript" src="../Admision/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../Admision/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../Admision/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../Admision/js/custom_blue.js"></script>
<script type="text/javascript"></script>
<script language="javascript">
function pon_prefijo(valor) {
	//var unidad='unidad'+valor;
	
		parent.opener.document.getElementById(valor).value=document.getElementById('txtbusca').value;
	
	parent.window.close();
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<?php echo $_GET['val']; ?>
<div class="column_left">
    <div class="header"><strong>BUSQUEDA DE COTIZACIONES</strong></div>
  <table width="575"class="data"  cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td width="573" colspan="6">Busque cotizacion 
        <input name="txtbusca" type="text" id="txtbusca" onkeydown="javascript:pon_prefijo(this.name,'<?php echo $_GET['val'];?>')" size="40" maxlength="11" />
       <a  href="javascript:pon_prefijo('<?php echo $_GET['val'];?>')"> <img src="../images/icono-descargas.jpg" width="25" height="25"  /></a></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
