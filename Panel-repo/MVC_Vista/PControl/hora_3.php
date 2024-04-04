<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>

<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
function calcula(){
caja=document.forms["testform"].elements;

var numero1 = Number(caja["hentrada"].value);
var numero2 = Number(caja["hsalida"].value);
 thora=numero2-numero1;
if(!isNaN(thora)){
caja["thora"].value=numero2-numero1;
}
 
}
</SCRIPT>

<!--<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
function fijatemes(){

  if(document.write(testform.testinput1.getMonth()))='5'
	  {


      }
  else
      {
      }
 
}
</SCRIPT>-->


<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

	<script language="JavaScript" src="calendar_eu.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="calendar.css" />



<link rel="stylesheet" type="text/css" href="css/ajaxtabs.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="cssverticalmenu.css" />
<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
<link rel="stylesheet" type="text/css" href="contentslider.css" />



<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>
<body>
 
<form  method="POST" action="guardahora.php" name="testform" id="testform">
<?php 
include("cn/cn.php");
include("funciones.php"); 
?>
<?php 


$idusuario		=$_REQUEST["idusuario"];
$centro			=$_REQUEST["centro"];
$dni			=$_REQUEST["cedula"];
$iddia			=$_REQUEST["iddia"];
$aniopro=$_REQUEST["Pyear"]; 

$Pmes=$_REQUEST["Pmes"];
 $Pyear=$_REQUEST["Pyear"];
 
 


  /* $prores = mysql_query("SELECT nombre,centrocosto FROM plan where dni='$dni'");
    $cant =  mysql_num_rows($prores);
     if($cant>0){						
	  while($rs = mysql_fetch_array($prores)){
	   $nombre=$rs["nombre"];
	    $centrocosto=$rs["centrocosto"];
	
	} }*/
?>
<input name="idusuario" type="hidden" value="<?php echo $idusuario;?>"/>
<input name="dni" type="hidden" value="<?php echo $dni;?>" />
<input name="centro" type="hidden" value="<?php echo $centro;?>" />


<table width="786" border="0" align="center">
  <tr class="blue1">
    <td colspan="8"><div align="center">
      <h1><strong>Establecer Horario</strong> -- Utilize horario de 24 horas</h1>
      </div></td>
    </tr>
  <tr class="green">
    <td colspan="2" bgcolor="#F0F0F0"><strong>Nombre:</strong></td>
    <td colspan="4" bgcolor="#F0F0F0"><label>
      <input name="nombre" type="text" id="nombre" value="<?php echo ExistDni($dni);?>" size="45" readonly="readonly" />
    <?php $usuario;0?></label></td>
    <td bgcolor="#F0F0F0"><strong>Mes de Programacion</strong>:<br /> <?php 

	$prores = mysql_query("SELECT idmes,nommes FROM  mes where idmes='$idmes' ");
        
			while($rs = mysql_fetch_array($prores)){ 
    	  	 echo $nommes=$rs["nommes"];
			 echo "-";
        	 //echo $aniopro=$rs["aniopro"];

			echo  $idmes=$rs["idmes"];
		echo 	 $mespro=$rs["mespro"];
			 
		}
?>
<input name="aniopro" type="hidden" value="<?php echo $Pyear; ?>" /><?php echo DameMes($Pmes); ?>
	  <?php echo "Del ".$Pmes; ?>
<input name="mespro" type="hidden" value="<?php echo $Pmes; ?>" />
<input name="idmes" type="hidden" value="<?php echo $Pmes;?>" />
<input name="dni" type="hidden" id="dni" value="<?php echo $dni;?>" /></td>
    <td width="36" rowspan="2" bgcolor="#F0F0F0"><strong> </strong>
      <div align="center" class="blue"><strong>Días de vacaciones tomadas</strong></div></td>
  </tr>
  <tr bgcolor="#F0F0F0" class="blue">
    <td colspan="2"><div align="center"><strong>Rango de fechas
      
    </strong></div></td>
    <td colspan="2" rowspan="2"><div align="center"><strong>Hora de Entrada</strong></div></td>
    <td width="113" rowspan="2"><div align="center"><strong>Hora de Salida</strong></div></td>
    <td width="148" rowspan="2"><div align="center">Tipo Movimiento</div></td>
    <td width="217" rowspan="2"><div align="center"><strong>Total Horas</strong></div></td>
    </tr>
  <tr bgcolor="#F0F0F0">
    <td width="60"><div align="center" class="green">Día inicio  </div></td>
    <td width="60"><div align="center" class="green">Día fin</div></td>
    <td width="36" class="red">&nbsp; </td>
  </tr>
  <tr bgcolor="#F7F7F7">
    <td><label>
    
   <?php  $dias=getMonthDays($Pmes, $Pyear); ?>
     
      <select name="testinput1" class="blue" id="testinput1" >
          <option value="<? echo $rs["idtipmov"]?>" selected="selected"></option>
          <?
$diasm = mysql_query("SELECT * FROM dia_mes where valor<=$dias");
$cant =  mysql_num_rows($diasm);
if($cant>0){						
	while($rsdm = mysql_fetch_array($diasm)){
	?>
          <option value="<? echo $rsdm["valor"]?>"><? echo $rsdm["valor"]?></option>
          <? 
}
} 
?>
    </select>
    </label></td>
    <td height="36"><label>

<select name="testinput2" class="blue" id="testinput2" >
          <option value="<? echo $rs["idtipmov"]?>" selected="selected"></option>
          <?
$diasm = mysql_query("SELECT * FROM dia_mes where valor<=$dias");
$cant =  mysql_num_rows($diasm);
if($cant>0){						
	while($rsdm = mysql_fetch_array($diasm)){
	?>
          <option value="<? echo $rsdm["valor"]?>"><? echo $rsdm["valor"]?></option>
          <? 
}
} 
?>
    </select>    </label></td>
    
  <td colspan="2"><label> 
  <div align="center"><span id="spryselect3">
    <select name="hentrada" class="blue" id="hentrada" onchange="calcula()">
      <option selected="selected" value="<? echo $rs["entradab"]?>"></option>
      <?
$entrada =  mysql_query("SELECT * FROM hora order by entrada");
$cant    =  mysql_num_rows($entrada);
if($cant>0){						
	while($rs = mysql_fetch_array($entrada)){
	?>
      <option value="<? echo $rs["entradab"]?>"><? echo $rs["entrada"]?></option>
      <? 
}
} 
?>
    </select>
    <span class="selectRequiredMsg">Seleccione un elemento.</span></span>
    <!--  *************************-->
  </div>
  </label></td>
    <td><span id="spryselect2">
      <select name="hsalida" class="blue" id="hsalida" onchange="calcula()">
        <option value="<?php $rs["salidab"] ?>" selected="selected" ></option>
        <?
$salida = mysql_query("SELECT * FROM hora order by salida");
$cant =  mysql_num_rows($salida);
if($cant>0){						
	while($rs = mysql_fetch_array($salida)){
	?>
        <option value="<? echo $rs["salidab"]?>"><? echo $rs["salida"]?></option>
        <? 
}
} 
?>
      </select>
      <span class="selectRequiredMsg">Seleccione un elemento.</span></span>
      <div align="center"></div></td>
    <td>
      <div align="center"><span id="spryselect1">
        <select name="tipmov" class="blue" id="tipmov" >
          <option value="<? echo $rs["idtipmov"]?>" selected="selected"></option>
          <?
$tip = mysql_query("SELECT * FROM tipmov where idtipmov like 'T%'");
$cant =  mysql_num_rows($tip);
if($cant>0){						
	while($rs = mysql_fetch_array($tip)){
	?>
          <option value="<? echo $rs["idtipmov"]?>"><? echo $rs["nomtipmov"]?></option>
          <? 
		  
		  
}
} 
?>
        </select>
        <span class="selectRequiredMsg">Seleccione un elemento.</span></span></div></td>     
          <td width="217"><div align="center">
            <input name="thora" type="text" id="thora" size="8" maxlength="4" readonly="readonly" />
          </div>
            <div align="center"><!--  *************************-->
    </div>
    </label></td>
<td width="36"><label>
					<div align="center" class="Estilo1">
					  <?php  
					  
	$prores = mysql_query("SELECT count(*) as diasv FROM horario a, tcontrol b  where dni='$dni' and tipmov='T6' and year(a.diapro)=b.aniovaca");
    while($rs = mysql_fetch_array($prores)){
    echo $dvaca=$rs["diasv"];
	
	} ?></div>
</label></td>
  <tr>
    <td bgcolor="#ECE9D8">&nbsp;</td>
    <td bgcolor="#ECE9D8">&nbsp;</td>
    <td colspan="4" bgcolor="#ECE9D8">&nbsp;</td>
    <td bgcolor="#ECE9D8">&nbsp;</td>
    <td bgcolor="#ECE9D8">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><label>
      <div align="center">
        <input type="submit" name="Grabar" id="Grabar" value="Grabar" />
        </div>
    </label></td>
    <td colspan="3"><label>
      <div align="center"><a href="hora.php?Pmes=<?php echo $Pmes;?>&Pyear=<?php echo $Pyear;?>&dni=<?php echo $dni;?>"><img src="img/MsgError.gif" width="53" height="49" border="0" /></a></div>
    </label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>





</form>
<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
//-->
</script>
</body>
</html>
