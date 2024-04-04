<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NEW CODIGO </title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />-->
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
<script type='text/javascript'>
function concatenar(){
if(document.getElementById("CONTENEDOR").checked==true){ var con='CONTENEDOR';}else{ con='';}
if(document.getElementById('textfield4').value=='I02'){ var ref='REEFER';}else{ ref='DRY';}
var tam=document.getElementById('hiddenField').value
var tip=document.getElementById('hiddenField2').value
var cadena=con+' '+ref+' '+' '+tam+' '+tip;
document.getElementById('textfield3').value=cadena;
}
function hab(){
	document.form1.hiddenField.value='20';
	}
function hab2(){
	document.form1.hiddenField.value='40';
	}
function hab3(){
	if(document.getElementById('textfield4').value=='I02'){
	document.form1.hiddenField2.value='RH';
	}else{
		document.form1.hiddenField2.value='HC';
	}
}
function hab4(){
	if(document.getElementById('textfield4').value=='I02'){
	document.form1.hiddenField2.value='RF';
	}else{
		document.form1.hiddenField2.value='DC';
	}

	}
function validarcodigo(){
	var c5=document.getElementById('textfield5').value;
	var c6=document.getElementById('textfield6').value;
	var c7=document.getElementById('textfield7').value;
	var c8=document.getElementById('textfield8').value;
	var c9=document.getElementById('textfield9').value;
	var c10=document.getElementById('textfield10').value;
	var c12=document.getElementById('textfield12').value;
	
	if (c5=='' || c6==''|| c7==''|| c8==''|| c9=='' || c10==''|| c12==''){
		alert ('codigo ingresado incorrecto complete todos los datos');
		return 0;
		}
	
	
if(document.getElementById('textfield3').value.length!=24 
&& document.getElementById('eq').value=='I02'){
			alert ('Falta descripcion de equipo');
		return 0;	
		}
if(document.getElementById('textfield3').value.length!=21 
&& document.getElementById('eq').value=='I01'){
			alert ('Falta descripcion de equipo');
		return 0;	
		}	
	
	
	
 if(confirm("Seguro de Ingresar el codigo ?")){
 document.getElementById("form1").submit();
			 }			
	}
function limpiar(){
		$(":text").each(function(){	
			$($(this)).val('');
	});
		document.getElementById('textfield11').value="-";
		}
	
function nombrecodprd(){
	var nom=document.getElementById('textfield3').value;
if (nom=="CONTENEDOR DRY  20 DC"){
	codprd='CDD20F0003';
	document.getElementById('cod_equipo').value=codprd;
}else if(nom=="CONTENEDOR DRY  40 DC"){
	codprd='CDE40F0002';
	document.getElementById('cod_equipo').value=codprd;
	
	}else if(nom=="CONTENEDOR DRY  40 HC"){
	codprd='CDD40H0004';
	document.getElementById('cod_equipo').value=codprd;
	}else if(nom='CONTENEDOR REEFER  40 RH'){
		codprd='CRN40H0005';
		}else if (nom='CONTENEDOR REEFER  40 RF'){
		codprd='CRND0009';			
			}else if (nom='CONTENEDOR REEFER  20 RF'){
				codprd='CRN20F0006';	
				}else if(nom='CONTENEDOR REEFER  20 RH'){
				codprd='CRND0010';	
				}
}


</script>
<body onload="limpiar();">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=newequipo&udni=<?php echo $_GET['udni'] ?>">
  <table width="562" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">Ejm:</td>
      <td align="center">A</td>
      <td align="center">B</td>
      <td align="center">C</td>
      <td align="center">D</td>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
      <td align="center">6</td>
      <td align="center">-</td>
      <td align="center">7</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <select name="select" id="select">
        <option value="A">A</option>                    		<option value="B">B</option>                    		<option value="C">C</option>                    		<option value="D">D</option>                    		<option value="E">E</option>                    		<option value="F">F</option>                    		<option value="G">G</option>                    		<option value="H">H</option>                    		<option value="I">I</option>                    		<option value="J">J</option>                    		<option value="K">K</option>                    		<option value="L">L</option>                    		<option value="M">M</option>                    		<option value="N">N</option>                    		<option value="O">O</option>                    		<option value="P">P</option>                    		<option value="Q">Q</option>                    		<option value="R">R</option>                    		<option value="S">S</option>                    		<option value="T">T</option>                    		<option value="U">U</option>                    		<option value="V">V</option>                    		<option value="W">W</option>                    		<option value="X">X</option>                    		<option value="Y">Y</option>                    		<option value="Z">Z</option>
      </select>        </td>
      <td>
        <select name="select2" id="select2">
        <option value="A">A</option>                    		<option value="B">B</option>                    		<option value="C">C</option>                    		<option value="D">D</option>                    		<option value="E">E</option>                    		<option value="F">F</option>                    		<option value="G">G</option>                    		<option value="H">H</option>                    		<option value="I">I</option>                    		<option value="J">J</option>                    		<option value="K">K</option>                    		<option value="L">L</option>                    		<option value="M">M</option>                    		<option value="N">N</option>                    		<option value="O">O</option>                    		<option value="P">P</option>                    		<option value="Q">Q</option>                    		<option value="R">R</option>                    		<option value="S">S</option>                    		<option value="T">T</option>                    		<option value="U">U</option>                    		<option value="V">V</option>                    		<option value="W">W</option>                    		<option value="X">X</option>                    		<option value="Y">Y</option>                    		<option value="Z">Z</option>
      </select>        </td>
      <td>
        <select name="select3" id="select3">
        <option value="A">A</option>                    		<option value="B">B</option>                    		<option value="C">C</option>                    		<option value="D">D</option>                    		<option value="E">E</option>                    		<option value="F">F</option>                    		<option value="G">G</option>                    		<option value="H">H</option>                    		<option value="I">I</option>                    		<option value="J">J</option>                    		<option value="K">K</option>                    		<option value="L">L</option>                    		<option value="M">M</option>                    		<option value="N">N</option>                    		<option value="O">O</option>                    		<option value="P">P</option>                    		<option value="Q">Q</option>                    		<option value="R">R</option>                    		<option value="S">S</option>                    		<option value="T">T</option>                    		<option value="U">U</option>                    		<option value="V">V</option>                    		<option value="W">W</option>                    		<option value="X">X</option>                    		<option value="Y">Y</option>                    		<option value="Z">Z</option>
      </select>       </td>
      <td>
        <select name="select4" id="select4">
        <option value="A">A</option>                    		<option value="B">B</option>                    		<option value="C">C</option>                    		<option value="D">D</option>                    		<option value="E">E</option>                    		<option value="F">F</option>                    		<option value="G">G</option>                    		<option value="H">H</option>                    		<option value="I">I</option>                    		<option value="J">J</option>                    		<option value="K">K</option>                    		<option value="L">L</option>                    		<option value="M">M</option>                    		<option value="N">N</option>                    		<option value="O">O</option>                    		<option value="P">P</option>                    		<option value="Q">Q</option>                    		<option value="R">R</option>                    		<option value="S">S</option>                    		<option value="T">T</option>                    		<option value="U">U</option>                    		<option value="V">V</option>                    		<option value="W">W</option>                    		<option value="X">X</option>                    		<option value="Y">Y</option>                    		<option value="Z">Z</option>
      </select>     </td>
      <td>
      <input name="textfield5" type="text" id="textfield5" style=" text-align:center" size="5" maxlength="1"/></td>
      <td>
      <input name="textfield6" type="text" id="textfield6" style=" text-align:center" size="5" maxlength="1" /></td>
      <td>
      <input name="textfield7" type="text" id="textfield7" style=" text-align:center" size="5" maxlength="1"/></td>
      <td>
      <input name="textfield8" type="text" id="textfield8" style=" text-align:center" size="5" maxlength="1"/></td>
      <td>
      <input name="textfield9" type="text" id="textfield9" style=" text-align:center" size="5" maxlength="1"/></td>
      <td><input name="textfield10" type="text" id="textfield10" style=" text-align:center" size="5" maxlength="1"/></td>
      <td>      <input name="textfield11" type="text" id="textfield11" value="-" size="5" style=" text-align:center" /></td>
      <td>
      <input name="textfield12" type="text" id="textfield12" style=" text-align:center" size="5" maxlength="1" />       </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="13">Seleccione Descripcion Equipo</td>
    </tr>
    <tr>
      <?php if($equipo=='I01' || $equipo=='I02'  ){?>
      <td colspan="13"><input name="CONTENEDOR" type="checkbox" id="CONTENEDOR" onclick="concatenar()" value="CONTENEDOR" checked="checked"/>
        CONTENEDOR 
        
        
        <input name="REEFER" type="checkbox" id="REEFER" onclick="concatenar()" value="REEFER" checked="checked" />
        <?php if($equipo=='I02'){?> REEFER <?php }else{?>DRY  <?php }?> 
        <input type="radio" name="tam" id="tam" value="20" onclick="hab(),concatenar()"/>
        20 
        <input type="radio" name="tam" id="tam" value="40"onclick="hab2(),concatenar()" />
        40 
        <input type="radio" name="tip" id="tip" value="RH" onclick="hab3(),concatenar()"/>
          <?php if($equipo=='I02'){?> RH <?php }else{?>HC  <?php }?>  
        <input type="radio" name="tip" id="tip" value="RF" onclick="hab4(),concatenar()"/>
        <?php if($equipo=='I02'){?> RF <?php }else{?>DC  <?php }?> </td>
     <?php }?>
    </tr>
    <tr>
      <?php if($equipo=='I03'){?>
      <td colspan="13"><input name="generador" type="checkbox" id="generador" checked="checked" />
        GENERADOR 
        
          <input type="radio" name="gen" id="gen" value="1" />
        
        CLIP - ON 
        
        <input type="radio" name="gen" id="gen" value="2" />
        
      UNDERMOUND</td>
      <?php }?>
    </tr>
    <tr>
      <td colspan="13" align="center"><input type="hidden" name="hiddenField" id="hiddenField" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" /></td>
    </tr>
    <tr>
      <td colspan="13" align="center">
      <input type="hidden" name="textfield4" id="textfield4" value="<?php echo $equipo; ?>" /></td>
    </tr>
    <tr>
      <td colspan="13" align="center">
      <input name="textfield3" type="text" id="textfield3" onclick="concatenar()" size="50" readonly="readonly" />
      <input type="hidden" name="eq" id="eq" value="<?php echo $_GET['eq']; ?>" /></td>
    </tr>
    <tr>
      <td colspan="13" align="center"><input type="text" name="cod_equipo" id="cod_equipo" /></td>
    </tr>
    <tr>
      <td colspan="13" align="center"><input type="button" name="button" id="button" value="Siguiente" onclick="validarcodigo();" />
      <input type="button" name="button2" id="button2" value="Botón" onclick="nombrecodprd()" /></td>
    </tr>
  </table>
</form>
</body>
</html>