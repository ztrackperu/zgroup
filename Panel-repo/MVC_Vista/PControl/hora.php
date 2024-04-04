<?php 
include("cn/cn.php");
include("damedia.php"); 
include("funciones.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.Estilo7 {color: #3366FF}
.Estilo8 {color: #000000}
-->
</style>

<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
function calcula(){
caja=document.forms["sumar"].elements;

var numero1 = Number(caja["elunes"].value);
var numero2 = Number(caja["slunes"].value);
 tlunes=numero2-numero1;
if(!isNaN(tlunes)){
caja["tlunes"].value=numero2-numero1;
}
 
}
</SCRIPT>
<link rel="stylesheet" type="text/css" href="css/table.css" />

</head>
<body>
 
<form  method="POST" name="sumar" id="sumar">

<?php 



$usuario=$_REQUEST["usuario"];
 $centro=$_REQUEST["centro"];
 $cedula=$_REQUEST["dni"];



 $Pmes=$_REQUEST["Pmes"];
 $Pyear=$_REQUEST["Pyear"];

 

   $FecIni=$Pyear."-".$Pmes."-01";
 
   $FecFin=$Pyear."-".$Pmes."-31";
 

   $idmes=substr($FecIni,5,2);

 
?>
<input name="usuario"       id="usuario"     type="hidden" value="<?php echo $usuario;?>" />
<input name="cedula"          id="cedula"          type="hidden" value="<?php echo $cedula;?>" />
<input name="idusuario"     id="idusuario"   type="hidden" value="<?php echo $idusuario;?>" />
<input name="dni" type="hidden" id="dni" value="<?php echo $cedula;?>" />      
<input name="centro" type="hidden" id="centro" value="<?php echo $centro;?>" /> 



<table width="624" align="center" class="testgrid" id="htmlgrid">
  <tr>
    <td colspan="8" align="center"> 
       <strong>Establecer Horario  -- Utilize horario de 24 horas </strong></td>
  </tr>
  <tr>
    <td height="84" colspan="5" align="center" valign="middle" bgcolor="#F7F7F7">  <strong class="Estilo7"><?php echo ExistDni($cedula); ?> 
      <br/>
     <?php echo "".DameMes($Pmes)." -  ".$Pyear;?>
      </strong>
      
      </td>
    <td colspan="3" align="center" valign="middle" bgcolor="#F7F7F7" class="Estilo7"><table width="397" border="0" cellpadding="0" cellspacing="0">
      <tr align="center" valign="middle">
        <td width="109" bgcolor="#F7F7F7" class="Estilo7">Horario por bloques </td>
        <td width="124" bgcolor="#F7F7F7" class="Estilo7">Horario por Día</td>
        <td width="78" bgcolor="#F7F7F7" class="Estilo7">Domigos libres </td>
        <td width="58" bgcolor="#F7F7F7" class="Estilo7">Salir</td>
      </tr>
      <tr align="center" valign="middle">
        <td height="57" bgcolor="#F7F7F7"><a href="hora_3.php?cedula=<?php echo $cedula;?>&amp;Pmes=<?php echo $Pmes;?>&amp;Pyear=<?php echo $Pyear;?>"><img src="iconos/rdevolver.gif" width="35" height="35" border="0" /></a>
          </p></td>
        <td bgcolor="#F7F7F7"><a href="Ppordias.php?cedula=<?php echo $cedula;?>&amp;idmes=<?php echo $Pmes;?>&amp;aniopro=<?php echo $Pyear;?>&amp;centro=<?php echo $centro;?>"><img src="iconos/read.gif" width="35" height="35" border="0" /></a></td>
        <td bgcolor="#F7F7F7"><a href="cdomingo.php?cedula=<?php echo $cedula;?>&amp;idmes=<?php echo $Pmes;?>&amp;aniopro=<?php echo $Pyear;?>&amp;centro=<?php echo $centro;?>"><img src="iconos/proveido.gif" width="35" height="35" border="0" /></a></td>
        <td bgcolor="#F7F7F7"><a href="buscar.php"><img src="iconos/salir_002.gif" width="35" height="35" border="0" /></a></td>
      </tr>
    </table></td>
    </tr>
  
  
  <tr>
    <td width="88" bgcolor="#ECE9D8"><div align="center" class="Estilo8">Fecha</div></td>
    <td width="131" bgcolor="#ECE9D8"><div align="center" class="Estilo8">Dia</div></td>
    <td colspan="2" bgcolor="#ECE9D8"><div align="center" class="Estilo8"> Entrada</div></td>
    <td width="109" bgcolor="#ECE9D8"><div align="center" class="Estilo8"> Salida</div></td>
    <td width="93" bgcolor="#ECE9D8"><div align="center" class="Estilo8">Total Horas</div></td>
    <td width="349" colspan="2" bgcolor="#ECE9D8"><div align="center" class="Estilo8">Tipo Movimiento</div></td>
    </tr>
<?php 

$dias = mysql_query("SELECT
a.hentrada,
a.hsalida,
a.thoras,
a.diapro,
a.dni,
a.tipmov,
b.idtipmov,
b.nomtipmov,
d.cod_dependencia,
d.cedula
FROM horario a,tipmov b,personal d where  a.tipmov=b.idtipmov and a.dni=d.cedula and a.dni='$cedula' and diapro BETWEEN '$FecIni' and '$FecFin'   order by a.diapro;");
$cant =  mysql_num_rows($dias);

if($cant>0){						
	while($rss = mysql_fetch_array($dias)){
$ddd=$rss["diapro"];

if (dame_el_dia ($ddd)=="Domingo"){
	$color="#CC9933";
	}else{
	$color="#FFFFFF";
	}
?>
  <tr bgcolor="<?php echo $color;?>">
    <td height="22"><span class="sm sm"><strong><?php $testinput=$rss["diapro"];  echo CambiaformatoFecha($testinput);?></strong></span></td>
    <td>
	  <span class="sm sm">
	  <?php $ddd=$rss["diapro"];
	 
	 
echo dame_el_dia ($ddd); 
	 
	 ?>
	  </span> </td>
    <input name="testinput" id="testinput" type="hidden" value="<?php echo $testinput;?>" />
    
    <td colspan="2"><div align="center"><span class="sm sm">
    </span></div>
      <span class="sm sm"><label>
      <div align="center"><?php  $xhentra=$rss["hentrada"];    echo GuardaHora($xhentra); ?>      </div>
      </label>
      </span>
      <div align="center" class="sm sm"></div>
      <div align="center" class="sm sm"></div>
      <div align="center" class="sm sm"></div><div align="center" class="sm sm"></div><div align="center" class="sm sm"></div></td>
    <td><div align="center"><span class="sm sm">
    </span></div>
      <span class="sm sm"><label>
      <div align="center"><?php  $dia=$rss["hsalida"]; echo GuardaHora($dia);?>      </div>
      </label>
      </span>
      <div align="center" class="sm sm"></div>
      <div align="center" class="sm sm"></div></td>
    <td><div align="center"><span class="sm sm">
    </span></div>
      <span class="sm sm"><label>
      <div align="center"><?php echo $dia=$rss["thoras"];?>      </div>
      </label>
      </span>
      <div align="center" class="sm sm"></div>
      <div align="center" class="sm sm"></div></td>
    <td colspan="2"><div align="center"><span class="sm sm"><?php echo $nomtipmov=$rss["nomtipmov"];?></span></div></td>
    </tr>

 

  
  <?php }}?> 
  <tr align="center" valign="middle">
    <td height="52" colspan="8"><a href="buscar.php"><img src="iconos/salir_002.gif" width="50" height="45" border="0" /></a></td>
    </tr>
</table>





</form>
</body>
</html>
