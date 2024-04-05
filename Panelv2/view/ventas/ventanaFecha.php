<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
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
</head><script language="javascript">
function pon_prefijo(dato,dato2,valor) {
	var val=valor;
	pedazo = val.substr(4,2)
	//alert(pedazo);
	parent.opener.document.getElementById('fini'+pedazo).value=dato;
	parent.opener.document.getElementById('ffin'+pedazo).value=dato2;
	parent.window.close();
}

</script>
<body>
<form id="form1" name="form1" method="post" 
action="../MVC_Controlador/cajaC.php?acc=calculafecha&val=<?php echo $_GET['val']; ?>">
  <table width="446" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td> Fecha Inicio </td>
      <td>Dias</td>
    </tr>
    <tr>
      <td>
       <input name="fecha"  type="text" class="texto"  id="fecha" size="12" maxlength="12" value="<?php echo $xd_fecreg ?>" /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
      <td>
      <select name="<?php echo "dia"; ?>" id="<?php echo "dia"; ?>" >
    <?php $venMO=ListadiasC();?>
 
      <?php foreach($venMO as $item){?>
      <option value="<?php echo $item["tm_codi"]?>"><?php echo $item["tm_desc"]?></option>
      <?php }	?>
    </select></td>
    </tr>
    <tr>
      <td>Fecha Fin</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="fecha2"></label>
      <input name="fecha2" type="text" id="fecha2" size="12" value="<?php echo $fecha2; ?>" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="calcular" /></td>
      <td><a href="javascript:pon_prefijo('<?php echo   $xd_fecreg;?>','<?php echo $fecha2;?>','<?php echo $val ?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar" height="20" width="20"></a></td>
    </tr>
  </table>
</form>
</body>
</html>