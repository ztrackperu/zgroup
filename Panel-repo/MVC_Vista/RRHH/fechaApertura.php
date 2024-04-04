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
			nmes=document.formElem.mes.options[document.formElem.mes.selectedIndex].text;
			emp=document.formElem.empresa.options[document.formElem.empresa.selectedIndex].value
			emp2=document.formElem.empresa.options[document.formElem.empresa.selectedIndex].text;
			tipo=document.formElem.tipla.options[document.formElem.tipla.selectedIndex].value;
			location.href="../MVC_Controlador/rrhhC.php?acc=plani"+"&an="+anio+"&me="+mes+"&nm="+nmes+"&em="+emp+"&emp="+emp2+"&tipo="+tipo;
			}
		
</script>



</head>



<body>
<form method="post" action="../MVC_Controlador/rrhhC.php?acc=insapertura" id="formElem" name="formElem">
<table width="275" border="0">
  <tr>
    <td colspan="3"><p align="center">Fecha Apertura</p></td>
  </tr>
  <tr>
    <td>Fecha Apertura</td>
    <td>
    <input type="text" name="fec_aper" id="fec_aper" value="<?php  echo date("Y/m/d");?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="104" height="26">Año</td>
    <td width="147">          
    <?php $ven2 = listarAnosC(); ?>
             <select name="anno" id="anno"   >
                <?php foreach($ven2 as $item2){?>
                    <option value="<?php echo $item2["val1_param"]?>"><?php echo $item2["val1_param"] ?>
                    </option>
                <?php }	?>
             </select>    
    
    </td>
    <td width="10">&nbsp;</td>
  </tr>
  <tr>
    <td>Mes</td>
    <td>
    
		<?php   

	//$hoy = getdate();
	//print_r($hoy);
	//echo "MES".$hoy["mon"]; dia del mes con array


/*$meses = array('','enero','febrero','marzo','abril','mayo','junio','julio',
               'agosto','septiembre','octubre','noviembre','diciembre');
			   
			   $nombre = 'meses';
$resultado = lista($nombre, $meses);
echo $resultado;

function lista($nombre, $meses){
	$array = $meses;
	$nmes1=date("m");// Mes actual en 2 dígitos y con 0, de 01 a 12.  
    $nmes2=date("n");// Mes actual en digitos sin 0 inicial, de 1 a 12
	$txt= "<select name='$nombre' id='$nombre'>";

	for ($i=1; $i<sizeof($array); $i++){	
	$txt .= "<option value='$i' if($i==$nmes2){ selected } >".$array[$i] . '</option>';
	}
	$txt .= '</select>';
	return $txt;
}*/
	 
	?>
    
    
     <!-- <select name="mes" id="mes">
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08" >Agosto</option>
        <option value="09">Septiembe</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select>-->
    
    <select name="mes" class="mes">
  <?php
      $mes=date("n"); 
	  //$mes=date("m");
      $rango=11; 
      for ($i=$mes;$i<=$mes+$rango;$i++){ 
         $mesano=date('Y-n', mktime(0, 0, 0, $i, 1, date("Y") ) );
         $meses=date('F', mktime(0, 0, 0, $i, 1, date("Y") ) );
 if ($meses=="January") $meses="Enero";
 if ($meses=="February") $meses="Febrero";
 if ($meses=="March") $meses="Marzo";
 if ($meses=="April") $meses="Abril";
 if ($meses=="May") $meses="Mayo";
 if ($meses=="June") $meses="Junio";
 if ($meses=="July") $meses="Julio";
 if ($meses=="August") $meses="Agosto";
 if ($meses=="September") $meses="Septiembre";
 if ($meses=="October") $meses="Octubre";
 if ($meses=="November") $meses="Noviembre";
 if ($meses=="December") $meses="Diciembre";
         $ano=date('Y', mktime(0, 0, 0, $i, 1, date("Y") ) );
         /*echo "<option value='$mesano'>$meses-$ano</option>";*/ 
		  echo "<option value='0$i'>$meses</option>";
      } 
  ?> 
</select>
    
    
    
    
    
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Tipo de Planilla</td>
    <td><label for="select3"></label>
       <?php $ven = ListaTipoplanillaC(); ?>
              <select name="tipla" id="tipla" class="Combos texto" onchange="pasardatos()" >
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["id_tipo"]?>"><?php echo $item["descripcion"]?></option>
                <?php }	?>
              </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Empresa</td>
    <td><select name="empresa" id="empresa">
      <option value="1" selected="selected">Zgroup</option>
      <option value="2">PsCargo</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="button" value="Aperturar"  /></td>
    <td><input type="button" name="button2" id="button2" value="Ir a Planilla"  onclick="Abrirplanilla()"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>