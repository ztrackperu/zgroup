<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<script type="text/javascript" src="../js/jquery.js"></script>   
<script type="text/javascript" src="../js/main.js"></script>
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script src="../js/jquery.html5form-1.5-min.js"></script>




 <link rel="stylesheet" media="screen" type="text/css" href="../css/datepicker.css" />
<script type="text/javascript" src="../js/datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="../css/formulario.css">




<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">

<style type="text/css">
textarea {
	resize: none;
}
</style>
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=InsDesc" >
<table border="1" bgcolor="#E1E1E1">
  <tr>
    <td colspan="5" align="center"><strong>Registro de Descuentos</strong></td>
    </tr>
  <tr>
    <td width="110">Mes</td>
    <td width="161"><select name="mes" id="mes" class="combo texto">
      <option value="01">Enero</option>
      <option value="02">Febrero</option>
      <option value="03">Marzo</option>
      <option value="04">Abril</option>
      <option value="05">Mayo</option>
      <option value="06">Junio</option>
      <option value="07" selected="selected">Julio</option>
      <option value="08">Agosto</option>
      <option value="09">Septiembe</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select></td>
    <td width="114">Tipo Desc.</td>
    <td width="144"><?php $ven = listartipodescC(); ?>
      <select name="tipodesc" id="tipodesc" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
        <?php }	?>
      </select></td>
    <td width="21">&nbsp;</td>
    </tr>
  <tr>
    <td>Año</td>
    <td><select name="anno" id="anno" class="combo texto">
      <option value="2013">2013</option>
      <option value="2014" selected="selected">2014</option>
    </select></td>
    <td>Autorizado por :</td>
    <td><input type="text" name="autoriza" id="autoriza" class="texto"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Empleado</td>
    <td><?php $ven = listarEmpleadoC(); ?>
      <select name="emple" id="emple" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["USERID"]?>"><?php echo $item["ApePat"].' '.$item["NomC"]?></option>
        <?php }	?>
      </select></td>
             
    <td>Motivo</td>
    <td><textarea name="descrip" cols="20" rows="3" id="descrip" class="texto"></textarea></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Moneda</td>
    <td><?php $ven = ListarMonedaC(); ?>
      <select name="moneda" id="moneda" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["codigo"]?>"><?php echo $item["descripcion"]?></option>
        <?php }	?>
      </select></td>
    <td>Monto</td>
    <td><label for="docref">
      <input type="number" name="monto" id="monto" class="texto" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fecha de Desc.</td>
    <td>
    <input name="fechaDesc"  class="texto" id="fechaDesc" type="text" onkeyup = "this.value=formateafecha(this.value); " required  placeholder="Ingrese fecha->" />
             <img src="../images/calendario.jpg" name="Im" id="Im" width="16" height="16" border="0"   onmouseover="this.style.cursor='pointer'" /></td>
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechaDesc",
					ifFormat   : "%Y/%m/%d",
					button     : "Im"
					  }
					);
		 </script>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="button" value="Enviar" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      
      </td>
  </tr>
</table>
</form>

</body>
</html>