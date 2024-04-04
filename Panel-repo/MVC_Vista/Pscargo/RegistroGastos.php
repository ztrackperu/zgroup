<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script language="javascript">
function abreVentana(obj){
	//var codigo=document.getElementById("fecha").value;
//	var cod=codprod
		var valor=obj
	
	
			miPopup = window.open("../MVC_Controlador/ContabilidadC.php?acc=buscacoti&udni=<?php echo $udni;?>&val="+valor,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			
			
}
</script>

</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=updatevou">
<fieldset class="fieldset legend" style="width:100%">
  <legend style="color:#03C"><strong>Comprobantes Para Forwarder</strong>
</legend>
  <p>&nbsp;</p>
  <table width="874" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38" align="center" bgcolor="#CCCCCC"><strong>Nro</strong></td>
    <td width="186" align="center" bgcolor="#CCCCCC"><strong>Comprobante</strong></td>
    <td width="191" align="center" bgcolor="#CCCCCC"><strong>Forwarder Nro</strong></td>
    <td width="514" bgcolor="#CCCCCC"><strong>Glosa</strong></td>
    </tr>
   <?php 
							if($resultado != NULL)
							{		
								$i = 1;
								foreach($resultado as $itemD)
								{
									
							?>
  <tr>
    <td><?php echo $i;?>&nbsp;</td>
    <td align="center"><?php echo $itemD["c_numvou"]; ?>
    </td>
    <td align="center"><?php echo $itemD["c_numeOP"]; ?></td>
    <td><?php echo $itemD["c_glosa"]; ?></td>
    </tr>
  <?php 
  $i++;
								}
							}
  ?>
  </table>
</fieldset>
</form>
</body>
</html>