<?php include("damedia.php"); 

include("Connections/conexion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link rel="stylesheet" type="text/css" href="css/ajaxtabs.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="cssverticalmenu.css" />
<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
<link rel="stylesheet" type="text/css" href="contentslider.css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
#forma table tr td {
	color: #000;
}
-->
</style>

<script>
function setAnios(){
var valores = new Array();
var inicio = 2010;
var fin = 2200;
var index = 0;
while (inicio < fin) {
valores[index] = inicio;
inicio++;
index++;
}
for (var i=0; i < valores.length; i++) {
document.forma.anios.options[i]=new Option(valores[i], valores[i]);
}
}
</script>



</head>
<body onLoad="setAnios()">
 
<form  method="POST" name="forma"  id="forma"  action="repo1_1">

<?php 


$usuario=$_REQUEST["usuario"];
$dni=$_REQUEST["dni"];
$idusuario=$_REQUEST["idusuario"];

$iusuario = mysql_query("SELECT idusuario,nombreniv3 FROM usuario where idusuario='$idusuario'");

	while($rs = mysql_fetch_array($iusuario)){
	 $centrocosto=$rs["nombreniv3"];
		}
?>



<table width="587" border="0" align="center">
  <tr>
    <td colspan="8"><div align="center">
      <h1><strong>Reporte Horario Mensual</strong></h1>
      <h2 class="Estilo1">Seleccione el Año y mes a consultar</h2>
    </div></td>
    </tr>
  <tr>
    <td colspan="2"><strong>Servicio:</strong></td>
    <td colspan="5"><label>

    </label>      <label><?php $prores = mysql_query("SELECT idusuario,nombreniv3,idnivel3 FROM usuario where idusuario='$idusuario'");
$cant =  mysql_num_rows($prores);
if($cant>0){						
	while($rs = mysql_fetch_array($prores)){
	echo  $nombrecosto=$rs["nombreniv3"];
	    $centrocosto=$rs["idnivel3"]; 
		
		}}
?>
<input name="idusuario"     id="idusuario"   type="hidden" value="<?php echo $idusuario;?>" />
<input name="centrocosto"     id="centrocosto"   type="hidden" value="<?php echo $centrocosto;?>" />

    </label></td>
    <td>&nbsp;</td>
  </tr>
  

  <tr bgcolor="<?php echo $color;?>">
    <td height="36" colspan="2"><p><strong>Año </strong></p>
      <p><strong>Mes a seleccionar</strong></p></td>
  
    
    <td colspan="2"><label>
      <label>

<select name="anios">
</select>

      </label>
      <label>     <br />
      <br />
      <select name="mes" class="blue_l" id="mes" >
      <option selected="selected" value="<? echo $rs["idmes"]?>"></option>
      <?
$smes = mysql_query("SELECT * FROM mes");
$cant =  mysql_num_rows($smes);
if($cant>0){						
	while($rs = mysql_fetch_array($smes)){
	?>
      <option value="<? echo $rs["idmes"]?>"><? echo $rs["nommes"]?></option>
      <? 
}
} 
?>
    </select>
      </label>
      <div align="center"></div>
    </label>
      <div align="center"></div>
      <div align="center"></div>
      <div align="center"></div><div align="center"></div><div align="center"></div></td>
    <td colspan="4"><label>
      <div align="center"></div>
        </label>
        <label>
        <input type="submit" name="button" id="button" value="Visualizar" />
        </label>
        <div align="center"></div>
      <div align="center"></div>      <div align="center"></div>
      <p align="center">&nbsp;</p>
      <div align="center"></div>      <div align="center"></div></td>
    </tr>



  <tr>
    <td width="102" bgcolor="#FF0000">&nbsp;</td>
    <td width="9" bgcolor="#FF0000">&nbsp;</td>
    <td colspan="3" bgcolor="#FF0000">&nbsp;</td>
    <td width="77" bgcolor="#FF0000">&nbsp;</td>
    <td width="74" bgcolor="#FF0000">&nbsp;</td>
    <td width="80" bgcolor="#FF0000">&nbsp;</td>
  </tr>
  <tr>
    <td height="52" colspan="3"><label></label></td>
    <td colspan="2" bordercolor="0"><label>
      <a href="presenta.php?idusuario=<?php echo $idusuario;?>"><img src="iconos/salir_002.gif" width="50" height="30" border="0" /></a> Salir</label></td>
    <td colspan="3" bordercolor="0">&nbsp;</td>
    </tr>
</table>
</form>
</body>
</html>
