<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
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
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
<script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>
<script language="javascript">

<?PHP $udni=""; ?>

function abreVentana(obj){
	//var codigo=document.getElementById("fecha").value;
//	var cod=codprod
		var valor=obj
	
	
			miPopup = window.open("../MVC_Controlador/ContabilidadC.php?acc=buscacoti&udni=<?php echo $udni;?>&val="+valor,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			
			
}


function abreVentanaOT(obj){
	//var codigo=document.getElementById("fecha").value;
//	var cod=codprod
		var valor=obj
	
	
			miPopup = window.open("../MVC_Controlador/ContabilidadC.php?acc=buscaOT&udni=<?php echo $udni;?>&val="+valor,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			
			
}
</script>

</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ContabilidadC.php?acc=updatevou">
<fieldset class="fieldset legend" style="width:100%">
  <legend style="color:#03C"><strong>Actualizacion Comprobantes</strong>
</legend>
  <div class="buttons">
    <button type="submit" class="positive" name="save" onclick="guardar()"> <img src="../images/icon_accept.png" alt=""/>Actualizar</button>
    <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>
    <button type="button" class="negative" name="cancel"> <img src="../images/icon_delete.png" alt=""/> Cancelar </button>
  </div>
  <p>&nbsp;</p>
  <table width="929" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38" align="center" bgcolor="#CCCCCC"><strong>Nro</strong></td>
    <td width="242" align="center" bgcolor="#CCCCCC"><strong>Comprobante</strong></td>
    <td width="150" align="center" bgcolor="#CCCCCC"><strong>Cotizacion Nro</strong></td>
    <td>&nbsp;</td>
    <td>Glosa </td>
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
    <td><input type="text" id="<?php echo "c_numvou".$i; ?>"  name="<?php echo "c_numvou".$i; ?>" readonly  size="15" value="<?php echo $itemD["c_numvou"]; ?>" class='texto' />
    <input type="text" id="<?php echo "c_anovou".$i; ?>"  name="<?php echo "c_anovou".$i; ?>" readonly  size="5" value="<?php echo $itemD["c_anovou"]; ?>" class='texto' />
      <input type="text" id="<?php echo "c_mesvou".$i; ?>"  name="<?php echo "c_mesvou".$i; ?>" readonly  size="5" value="<?php echo $itemD["c_mesvou"]; ?>" class='texto' />
    
    </td>
    <td>
    <input type="text" id="<?php echo "c_numeOP".$i; ?>"  name="<?php echo "c_numeOP".$i; ?>" readonly  size="25" value="<?php echo $itemD["c_numeOP"]; ?>" class='texto' placeholder="Ingrese Cotizacion " onclick="abreVentana(this.name)" />
    
    

    
    </td>
    <td>    <input type="text" id="<?php echo "c_NumOT".$i; ?>"  name="<?php echo "c_NumOT".$i; ?>" readonly  size="25" value="<?php echo $itemD["c_NumOT"]; ?>" class='texto' placeholder="Ingrese ORDEN TRABAJO " onclick="abreVentanaOT(this.name)" /></td>
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