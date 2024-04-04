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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=tipoing&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"><strong>REGISTRO DE EQUIPOS ZGRUP</strong></div>
  <table width="441" height="57" border="1" align="left">
    <tr>
      <td height="23" colspan="2" align="center" bgcolor="#0066FF"><strong style="color:#FFF">REGISTRO <?php if($tiping=='1'){ echo 'INGRESO';}else{echo 'SALIDA';} ?> DE EQUIPO
        <input type="hidden" name="tiping" id="tiping" value="<?php echo $tiping; ?>" />
        </strong></td>
    </tr>
    <tr>
      <td width="213" align="center">&nbsp;</td>
      <td width="212" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="EQUIPO" id="EQUIPO" value="I01" />
      Contenedores Dry/FlatPack</td>
      <td align="left"><input type="submit" name="EQUIPO" id="EQUIPO" value="I02" />
      Contenedores Reefer</td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="EQUIPO" id="EQUIPO" value="I03" />
      Generadores</td>
      <td align="left"><input type="submit" name="EQUIPO" id="EQUIPO" value="I04" />
      Carretas</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="EQUIPO" id="EQUIPO" value="I12" />
      Transformadores</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $tipo ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#0066FF"><strong style="color:#FFF" >USUARIO RESPONSABLE</strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FF0000"><strong style="color:#FFF" ><?php echo $_GET['udni']; ?></strong>&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>