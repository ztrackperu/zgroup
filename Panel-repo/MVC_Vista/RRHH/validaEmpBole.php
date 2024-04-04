<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
<script src="../../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script src="../js/jquery.html5form-1.5-min.js"></script>


<script type="text/javascript">
function Abrirplanilla(){
			anio=document.formElem.anno.options[document.formElem.anno.selectedIndex].value;
			mes=document.formElem.mes.options[document.formElem.mes.selectedIndex].value;
			emp=document.formElem.empresa.options[document.formElem.empresa.selectedIndex].value;
			location.href="../MVC_Controlador/rrhhC.php?acc=verlistaEmp"+"&an="+anio+"&me="+mes+"&em="+emp;
			}
		
</script>



</head>



<body>
<form method="post" action="" id="formElem" name="formElem">
<table width="234" border="0">
  <tr>
    <td colspan="2"><p align="center">BOLETAS:INGRESE EL PERIODO</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label for="textfield"></label></td>
  </tr>
  <tr>
    <td width="87">Año</td>
    <td width="131">
    <?php $ven2 = listarAnosC(); ?>
             <select name="anno" id="anno"   >
                <?php foreach($ven2 as $item2){?>
                    <option value="<?php echo $item2["val1_param"]?>"><?php echo $item2["val1_param"] ?>
                    </option>
                <?php }	?>
             </select>    
    
    
    
    
    </td>
  </tr>
  <tr>
    <td>Mes</td>
    <td><label for="select2"></label>
      <select name="mes" id="mes">
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembe</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select></td>
  </tr>
  <tr>
    <td>Empresa</td>
    <td><select name="empresa" id="empresa">
      <option value="1">Zgroup</option>
      <option value="2">PsCargo</option>
    </select></td>
  </tr>
  <tr>
    
    <td><input type="button" name="button2" id="button2" value="Mostrar"  onclick="Abrirplanilla()"/></td>
  </tr>
</table>
<f/orm>
</body>
</html>