<?php 
if($obtenerdata!=NULL)
{
	foreach ($obtenerdata as $item)
	{
		//$idc=$IDCAMAS;

  $id =$item['id'];
  $direccion=$item['direccion']; 
  $telefono  =$item['telefono'];
  $correo  =$item['correo'];
  $nextel  =$item['nextel'];
  $rpm  =$item['rpm'];
  $tel_informes =$item['tel_informes'] ;
  $resp_informes  =$item['resp_informes'];
  $correo_informes =$item['correo_informes']; 
  $tel_ventas =$item['tel_ventas'] ;
  $resp_ventas  =$item['resp_ventas'];
  $correo_ventas =$item['correo_ventas']; 
  $estado =$item['estado'];
  $usuario  =$item['usuario'];
  $empresa =$item['empresa'];
	}
}

?>
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<!--[if IE]>
	<link href="../css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="../js/excanvas.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
function valida_envia(){
	document.form1.submit();
	
	}
</script>
</head>

<body>
<form name="form1" method="post" action="../MVC_Controlador/WebC.php?acc=w6">
  <table width="870" border="0">
    <tr>
      <td width="860">MODIFICACION DE DATOS DE ZGROUP</td>
    </tr>
  </table>
  <fieldset class="fieldset legend">
  <legend style="color:#C63">INGRESO DE DATOS</legend>
  <table width="630" border="0">
    <tr>
      <td width="164">Direccion</td>
      <td width="456"><label for="textfield"></label>
        <input name="textfield" type="text" id="textfield" size="55" value="<? echo $direccion ?>">
        <input type="hidden" name="hiddenField" id="hiddenField" value="<? echo $id ?>">
        <input type="hidden" name="hiddenField2" id="hiddenField2" value="<? echo $_GET['udni']?>">
        <input type="hidden" name="hiddenField3" id="hiddenField3"value="<? echo $empresa ?>"></td>
    </tr>
    <tr>
      <td>Telefono fijo-celular</td>
      <td><label for="textfield2"></label>
        <input name="textfield2" type="text" id="textfield2" size="45" value="<? echo $telefono ?>"></td>
    </tr>
    <tr>
      <td>Correo</td>
      <td><label for="textfield3"></label>
        <input type="text" name="textfield3" id="textfield3" value="<? echo $correo ?>"></td>
    </tr>
    <tr>
      <td>Telefono nextel</td>
      <td><label for="textfield4"></label>
        <input type="text" name="textfield4" id="textfield4" value="<? echo $nextel ?>"></td>
    </tr>
    <tr>
      <td>Telefono RPM</td>
      <td><label for="textfield5"></label>
        <input type="text" name="textfield5" id="textfield5" value="<? echo $rpm ?>"></td>
    </tr>
    <tr>
      <td>Telefono Informes</td>
      <td><label for="textfield6"></label>
        <input type="text" name="textfield6" id="textfield6" value="<? echo  $tel_informes?>"></td>
    </tr>
    <tr>
      <td>Responsable de Informes</td>
      <td><label for="textfield7"></label>
        <input type="text" name="textfield7" id="textfield7" value="<? echo $resp_informes?>"></td>
    </tr>
    <tr>
      <td>Correo de Informes</td>
      <td><label for="textfield8"></label>
        <input type="text" name="textfield8" id="textfield8" value="<? echo $correo_informes?>"></td>
    </tr>
    <tr>
      <td>Telefono Ventas</td>
      <td><label for="textfield9"></label>
        <input type="text" name="textfield9" id="textfield9" value="<? echo $tel_ventas ?>"></td>
    </tr>
    <tr>
      <td>Responsable Ventas</td>
      <td><label for="textfield10"></label>
        <input type="text" name="textfield10" id="textfield10" value="<? echo $tel_ventas ?>"></td>
    </tr>
    <tr>
      <td>Correo de Ventas</td>
      <td><label for="textfield11"></label>
        <input type="text" name="textfield11" id="textfield11" value="<? echo $correo_ventas ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><table border="0" align="center">
        <tr>
          <td><div class="buttons" align="center">
            <button type="button" class="positive" name="save" onClick="valida_envia()"> <img src="../images/icon_accept.png" alt=""/>Guardar</button>
            <a href="../MVC_Controlador/WebC.php?acc=g1&udni=<?php echo $udni;?>" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a></div></td>
        </tr>
      </table></td>
      </tr>
  </table>
  </fieldset>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>