<?php include("cn/cn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>


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


<script language="JavaScript" src="calendar_eu.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="calendar.css" />



 


 

<style type="text/css">


<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
.Estilo15 {font-size: 10px}
.Estilo20 {
	color: #000000;
	font-weight: bold;
}
.Estilo23 {
	font-size: 12px;
	font-weight: bold;
	color: #000000;
}
.Estilo25 {color: #FFFFFF; font-size: 12px; }
.Estilo26 {color: #000000}
.Estilo27 {color: #FFFFFF; text-decoration: none; }
-->
</style>
<link href="index.css" rel="stylesheet" type="text/css" />
<link href="jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/autocomplete.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="calendar.css" />
<style type="text/css">
<!--
.Estilo32 {font-size: 18px}
-->
</style>
</head>
<body>
 
<form  method="POST" action="guardamov.php" name="testform" id="testform">

<?php 
$idusuario=$_REQUEST["idusuario"];
$centro=$_REQUEST["centro"];
$dni=$_REQUEST["dni"];
 $iddia=$_REQUEST["iddia"];


   $prores = mysql_query("SELECT * FROM personal where cedula='$dni'");
    $cant =  mysql_num_rows($prores);
     if($cant>0){						
	  while($rs = mysql_fetch_array($prores)){
	   $nombre=$rs["apellido"];
	    $centro=$rs["cod_dependencia"];
	
	} }
?>
<input name="idusuario" type="hidden" value="<?php echo $idusuario;?>"/>
<input name="dni" type="hidden" value="<?php echo $dni;?>" />
<input name="centro" type="hidden" value="<?php echo $centro;?>" />
<table width="776" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td height="37" colspan="10"><div align="center" class="Estilo23 Estilo32">      INGRESO DE JUSTIFICACIONES</div></td>
  </tr>
  <tr>
    <td colspan="9" bgcolor="#ECE9D8" class="dark"><span class="Estilo25"><span class="dark">USUARIO:</span></span><span class="Estilo2 Estilo23"> <?php echo $idsuario; ?></span></td>
    <td width="157" bgcolor="#ECE9D8" class="dark">Fecha :<span class="Estilo23"> <?php echo date("d-m-Y") ?></span></td>
  </tr>
  <tr>
    <td height="35" colspan="2" bordercolor="#ECE9D8" bgcolor="#ECE9D8"><span class="Estilo15 Estilo26"><strong>Nombre:</strong></span></td>
    <td colspan="8" bordercolor="#ECE9D8" bgcolor="#ECE9D8"><span class="Estilo15 Estilo15">
      <label>
        <input name="nombre" type="text" id="nombre" value="<?php echo $nombre;?>" size="45" readonly="readonly" />
        <?php $usuario;?>
        </label>
    </span></td>
  </tr>
  <tr bgcolor="#99CCFF">
    <td width="114" height="24" bgcolor="#ECE9D8" class="Estilo15" ><div align="center" class="Estilo26"><strong>Inicio </strong>
           
    </div></td>
    <td width="148" bgcolor="#ECE9D8" class="Estilo15" ><div align="center" class="Estilo26"><strong>Fin
          
    </strong></div></td>
    <td width="84" bgcolor="#ECE9D8" class="Estilo15"  ><div align="center" class="Estilo26"><strong> Hora de Entrada</strong></div></td>
    <td width="80" bgcolor="#ECE9D8" class="Estilo15" ><div align="center" class="Estilo26"><strong> Hora de Salida</strong></div></td>
    <td colspan="4" bgcolor="#ECE9D8" class="Estilo15" ><div align="center" class="Estilo26"><strong> Tipo Movimiento</strong></div>      <div align="center" class="Estilo26"></div></td>
    <td width="37" bgcolor="#ECE9D8" class="Estilo15"><div align="center"><span class="Estilo20">Total Horas</span></div></td>
    <td bgcolor="#ECE9D8" class="Estilo15"><div align="center"><span class="Estilo23">Observaciones</span></div></td>
  </tr>
  <tr>
    <td height="41" bgcolor="#FFFFFF"><label><span id="sprytextfield1"><strong>
      <input name="testinput" type="text" class="Estilo15"  id="testinput" size="10" maxlength="10" readonly="readonly"  />
       <script language="JavaScript" type="text/javascript">
	
	new tcal ({
		// form name
		'formname': 'testform',
		// input name
		'controlname': 'testinput'
	});

	        </script>
    </strong></span></label></td>
    <td height="41" bgcolor="#FFFFFF"><div align="center"><strong>
      <input name="testinput2" type="text" class="Estilo15"  id="testinput2" size="10" maxlength="10" readonly="readonly"  />
      <script language="JavaScript" type="text/javascript">
	
	new tcal ({
		// form name
		'formname': 'testform',
		// input name
		'controlname': 'testinput2'
	});

	        </script>
    </strong></div></td>
    <td bgcolor="#FFFFFF"><label> </label>
        <div align="center">
          <select name="hentrada" class="Estilo15" id="hentrada" onchange="calcula()">
            <option selected="selected" value="<? echo $rs["entradab"]?>"></option>
            <?
$entrada = mysql_query("SELECT * FROM control.hora order by entradab");
$cant =  mysql_num_rows($entrada);
if($cant>0){						
	while($rs = mysql_fetch_array($entrada)){
	?>
            <option value="<? echo $rs["entradab"]?>"><? echo $rs["entrada"]?></option>
            <? 
}
} 
?>
          </select>
          <!--  *************************-->
      </div></td>
    <td bgcolor="#FFFFFF"><div align="center">
      <select name="hsalida" class="Estilo15" id="hsalida" onchange="calcula()">
        <option value="<?php $rs["salidab"] ?>" selected="selected" ></option>
        <?
$salida = mysql_query("SELECT * FROM  hora order by entradab");
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
    </div>
        <div align="center"></div></td>
    <td colspan="4" bgcolor="#FFFFFF"><div align="center"><span id="spryselect1">
      <select name="tipmov" class="Estilo15" id="tipmov" >
        <option value="<? echo $rs["idtipmov"]?>" selected="selected"></option>
        <?
$tip = mysql_query("SELECT * FROM control.tipmov ORDER BY nomtipmov ");
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
    </span></div></td>
    <td bgcolor="#FFFFFF"><div align="center">
      <input name="thora" type="text" class="Estilo15" id="thora" value="" size="4" maxlength="4" readonly="readonly" />
    </div></td>
    <td bgcolor="#FFFFFF"><textarea name="observa" cols="20" class="Estilo15" id="observa"></textarea></td>
  </tr>
  <tr>
    <td height="41" colspan="10" bgcolor="#FFFFFF"><label></label>      <div align="center">
      <input type="submit" name="Grabar2" id="Grabar2" value="Grabar" />
      <a href="buscar.php?idusuario=<?php echo $idusuario;?>&amp;dni=<?php echo $dni;?>&amp;centro=<?php echo $centrocosto;?>"> <img src="img/MsgError.gif" width="34" height="37" border="0" /></a></div></td>
    </tr>
  <tr>
    <td height="41" colspan="10" bgcolor="#FFFFFF"><table width="649" border="1" align="center" class="othermonth">
       <tr>
    <td height="21" colspan="8" bgcolor="#ECE9D8"><div align="center" class="Estilo23">KARDEX DE PERSONAL</div></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo26"><strong>Fecha</strong></div></td>
    <td width="66" colspan="-1" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo26"><strong>Hora entrada</strong></div></td>
    <td width="40" colspan="-1" align="center" valign="middle" nowrap="nowrap" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo26"><strong>Salida</strong></div></td>
    <td width="60" colspan="-1" align="center" valign="middle" nowrap="nowrap" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo26"><strong>Movimiento</strong></div></td>
    <td width="64" colspan="-1" align="center" valign="middle" nowrap="nowrap" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo26"><strong>Total Horas</strong></div></td>
    <td align="center" valign="middle" nowrap="nowrap" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo15"><strong><span class="Estilo27"><span class="Estilo26">Observacione</span>s</span> </strong></div></td>
    <td width="136" colspan="-1" align="center" valign="middle" nowrap="nowrap" bgcolor="#ECE9D8" class="Estilo15"><div align="center" class="Estilo26"><strong>Eliminar</strong></div></td>
  </tr>
  <?php  $proress = mysql_query("SELECT a.hentrada,a.hsalida,a.tipmov,a.thoras,a.diapro,a.observa,b.nomtipmov FROM movimientos a, tipmov b where a.dni='$dni' and a.tipmov=b.idtipmov order by a.diapro");
    $cantt =  mysql_num_rows($proress);
     if($cantt>0){						
	  while($rss = mysql_fetch_array($proress)){

?>
  <tr>
    <td height="29" bgcolor="#FFFFFF"><div align="center"><?php echo $diapro=$rss["diapro"];?></div></td>
    <td colspan="-1" bgcolor="#FFFFFF"><div align="center"><?php echo $rss["hentrada"];?></div></td>
    <td colspan="-1" bgcolor="#FFFFFF"><div align="center"><?php echo $rss["hsalida"];?></div></td>
    <td colspan="-1" bgcolor="#FFFFFF"><div align="center"><?php echo $rss["nomtipmov"];?></div></td>
    <td colspan="-1" bgcolor="#FFFFFF"><div align="center"><?php echo $rss["thoras"];?></div></td>
    <td bgcolor="#FFFFFF"><div align="center"><?php echo $rss["observa"];?>
    </div></td>
    <td colspan="-1" bgcolor="#FFFFFF"><div align="center"><a href="borrabol.php?idusuario=<?php echo $idusuario; ?>&dni=<?php echo $dni; ?>&diapro=<?php echo $diapro; ?>"><img src="iconos/Delete.png" width="24" height="24" border="0" /></a></div></td>
    <input name="diapro" type="hidden" value="<?php echo $diapro; ?>" />
  </tr>
  <?php }}?>
    </table></td>
  </tr>
 
  
</table>
<table width="766" border="0" align="center">
  <tr bgcolor="#CCFFFF">
    <td width="357" bgcolor="#ECE9D8"><div align="right"></div></td>
    <td width="369" bgcolor="#ECE9D8"><div align="left"></div></td>
  </tr>
</table>
</form>

</body>
</html>
