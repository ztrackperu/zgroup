<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO DE EQUIPO </title>
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

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=vertipo&udni=<?php echo $_GET['udni'] ?>">
  <table width="499" height="57" border="1" align="left">
    <tr>
      <td height="23" colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center"><a href="../MVC_Controlador/InventarioC.php?acc=verinicio&udni=<?php echo $_GET['udni'] ?>">RETORNAR</a></td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center" bgcolor="#0066FF"><strong style="color:#FFF">
        <input type="hidden" name="tiping" id="tiping" value="<?php echo $tiping; ?>" />
        TIPO DE <?php if($tiping=='1'){ echo 'INGRESO';}else{echo 'SALIDA';} ?> PARA:
        <?php  $val=$_REQUEST['EQUIPO']; if($val=='I01'){ echo 'CONTENEDOR DRY';}elseif($val=='I02'){ echo 'CONTENEDOR REEFER';}elseif($val=='I03'){ echo 'GENERADOR';}elseif($val=='I04'){echo 'CARRETA';}else{'TRANSFORMADOR';}?>
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $val ?>" />
        <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $equipo; ?>" />
      </strong></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="tipo" id="tipo" value="T01" />
        DEVOLUCION EQUIPO</td>
      <td align="left"><input type="submit" name="tipo" id="tipo" value="T02" />
        MANTENIMIENTO EQUIPO </td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="tipo" id="tipo" value="T03" />
        CAMBIO DE EQUIPO</td>
      <td align="left"><input name="tipo" type="submit" id="tipo" value="T04" />
        <?php if($tiping=='1'){ echo 'COMPRA';}else{echo 'VENTA/ALQUILER';} ?> EQUIPO</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#0066FF"><strong style="color:#FFF" >USUARIO RESPONSABLE</strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FF0000"><strong style="color:#FFF" ><?php echo $_GET['udni']; ?></strong>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
