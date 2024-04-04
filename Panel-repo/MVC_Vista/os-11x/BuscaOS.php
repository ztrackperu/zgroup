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
function pon_prefijo(numos,monto,xmonto,asunto) {
	parent.opener.document.form1.codigo.value=numos;
	parent.opener.document.form1.descripcion.value=numos;
	parent.opener.document.form1.precio.value=monto;
	parent.opener.document.form1.cantidad.value=xmonto;
parent.opener.document.form1.glosa.value=asunto;
//	parent.opener.document.formElem.cantidad.focus;
	//parent.opener.actualizar_importe();
	parent.window.close();
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<div class="column_left">
    <div class="header"><strong>BUSQUEDA DE ORDEN SERVICIO</strong></div>
  <table width="575"class="data"  cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td colspan="6">Ingrese Ord. Serv 
        <input name="txtbusca" type="text" id="txtbusca" size="40" />
        <input type="button" name="button" id="button" value="Buscar" /></td>
    </tr>
    <tr>
      <td width="88" align="center" bgcolor="#CCCCCC"><strong>Nro Orden Servicio</strong></td>
      <td width="75" align="center" bgcolor="#CCCCCC"><strong>Proveedor</strong></td>
      <td width="72" align="center" bgcolor="#CCCCCC"><strong>Asunto</strong></td>
      <td width="112" align="center" bgcolor="#CCCCCC"><strong>Monto sin Igv</strong></td>
      <td width="112" align="center" bgcolor="#CCCCCC"><strong>Monto Con Igv</strong></td>
      <td width="114" align="center" bgcolor="#CCCCCC"><strong>Seleccionar</strong></td>
    </tr>
    <?php    
$i = 1;
if($resultadordserv!=NULL){
   foreach($resultadordserv as $item){ 
					
					
					//c_numos ,c_asunto,c_nomprov,c_codmod , d_fecos  ,n_bruto ,n_totigv,n_totos
					?>
    <tr>
      <td><?php echo $item["c_numos"];?></td>
      <td><?php echo $item["c_nomprov"];?></td>
      <td><?php echo $item["c_asunto"];?></td>
      <td><?php echo $item["n_bruto"];?></td>
      <td><?php echo $item["n_totos"];?></td>
      <td><a href="javascript:pon_prefijo('<?php echo $item["c_numos"]?>','<?php echo $item["n_bruto"]?>','<?php echo $item["n_totos"]?>','<?php echo $item["c_asunto"] ?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></td>
    </tr>
    <?php }}?>
  </table>
  </div>
</form>
</body>
</html>