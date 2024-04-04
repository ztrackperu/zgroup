<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualizacion de Rutas</title>
</head>
<script language="javascript">
function rutas(){
		miPopup = window.open("http://www.tierra-inca.com/distance/index.php?lg=es","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
	
	}
</script>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=acturutas">
  <table width="704" border="1" cellpadding="1" cellspacing="1" bordercolor="#3D4670">
    <tr>
      <td width="248">Origen</td>
      <td colspan="3">  <label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" size="58" value="<?php echo $_GET['origen']; ?>" />        <label for="select3">
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['cod']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Destino</td>
      <td colspan="3">      <label for="textfield2"></label>
      <input name="textfield2" type="text" id="textfield2" size="58" value="<?php echo $_GET['destino']; ?>" /></td>
    </tr>
    <tr>
      <td>Kilometraje <a href="#"  onclick="rutas()"> Referencias</a></td>
      <td width="144"><label for="textfield3"></label>
      <input type="text" name="textfield3" id="textfield3" value="<?php echo $_GET['kilo']; ?>"/></td>
      <td width="50">Precio</td>
      <td width="244"><label for="textfield4"></label>
      <input type="text" name="textfield4" id="textfield4" value="<?php echo $_GET['precio']; ?>"/></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="button" id="button" value="ACTUALIZAR" />
      <input type="reset" name="button2" id="button2" value="CANCELAR" /></td>
    </tr>
  </table>
</form>
<table width="704" border="1" bordercolor="#3D4670">
  <tr>
    <td width="158" align="center" bgcolor="#3D4670" style="color:#FFF">Origen</td>
    <td width="157" align="center" bgcolor="#3D4670" style="color:#FFF">Destino</td>
    <td width="114" align="center" bgcolor="#3D4670" style="color:#FFF">Kilometraje</td>
    <td width="115" align="center" bgcolor="#3D4670" style="color:#FFF">Precio</td>
    <td width="126" align="center" bgcolor="#3D4670" style="color:#FFF">Administrar</td>
  </tr>
   <?php $rutalista = RutasListaC();
   foreach($rutalista as $item){
   
   ?>
  <tr>
    <td align="center"><?php echo $item["r_origen"]?></td>
    <td align="center"><?php echo $item["r_destino"]?></td>
    <td align="center"><?php echo $item["r_kilometraje"]?></td>
    <td align="center"><?php echo $item["r_precio"]?></td>
    <td align="center"><a href="../MVC_Controlador/cajaC.php?acc=arutas&cod=<?php echo $item["r_id"]?>
&origen=<?php echo $item["r_origen"]?>&destino=<?php echo $item["r_destino"]?>&kilo=<?php echo $item["r_kilometraje"]?>&precio=<?php echo $item["r_precio"]?>"><img src="../images/icon_edit.png" width="16" height="16" />
</a><a href="#"><img src="../images/icon_delete.png" width="16" height="16" /></a></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>