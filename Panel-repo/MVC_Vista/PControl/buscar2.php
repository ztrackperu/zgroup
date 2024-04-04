<? 
 include("cn/cn.php");
 
 
 include("funciones.php");
?>


<html>
<head>
</script>
<script language="javascript" src="liveclock.js">
<style type="text/css"> 
<!-- 
a.p:link { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:visited { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:active { 
    color: #0066FF; 
    text-decoration: none; 
} 
a.p:hover { 
    color: #0066FF; 
    text-decoration: underline; 
} 


--> 


</style>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251" />

<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stylos.css" type="text/css" rel="stylesheet">
<link href="images/iconos/displaytags.css" rel="stylesheet" type="text/css">  
<script languaje="JavaScript" src="images/iconos/validar.js"></script>

<style type="text/css">
<!--
.Estilo1 {color: #003399}
.Estilo2 {font-size: 12px}
body,td,th {
	color: #0033CC;
}
.Estilo3 {font-size: 10px; }
.Estilo4 {color: #CC0000}
.Estilo5 {color: #CC3300}
-->
</style>
</head>

<BODY onLoad="show_clock()">
<form name="form1" action="buscar2.php"  class="green" >

<input name="idusuario" type="hidden" value="<?php echo $idusuario; ?>">

<div align="left">
  <script language="JavaScript"> 
function muestra(queCosa) 
{ 
 var letra=queCosa;
document.form1.txtvar.value=letra;
<?
echo "alert(letra);";
$_SESSION['tabla']=letra;

?>
} 

  </script>
</div>
</center>
<? 
$criterio =$_GET[""]; 
$txt_criterio =$_GET[""]; 

$captura=$_GET["criterio"];

if ($_GET["criterio"]!=""){ 
$txt_criterio = $_GET["criterio"]; 
$criterio = " where cedula like '%" . $txt_criterio . "%' or apellido like '%" . $txt_criterio . "%'  or cargo like '%" . $txt_criterio . "%' "; 
}

$sql="SELECT * FROM personal ".$txtcentro." ".$criterio."  ORDER BY apellido DESC"; 
$res=mysql_query($sql); 
$numeroRegistros=mysql_num_rows($res);
 
if($txt_criterio=NULL or $numeroRegistros<=0){
    echo "<div align='center'>"; 
  echo "</div>"; 
}else{
if($numeroRegistros<=0) 
{ 
    echo "<div align='center'>"; 
    echo "<font face='verdana' size='-2'>No se encontraron resultados</font>"; 
    echo "</div>"; 
}else{ 
    
    if(!isset($orden)) 
    { 
       $orden="apellido"; 
    } 
    
  $tamPag=8;
		if(!isset($pagina))
		{
			   $pagina=1;
			   $inicio=1;
			   $final=$tamPag;
		}
		$limitInf=($pagina-1)*$tamPag;
		$numPags=ceil($numeroRegistros/$tamPag);
		if(!isset($pagina))
		{
			   $pagina=1;
			   $inicio=1;
			   $final=$tamPag;
		}else{
			$seccionActual=intval(($pagina-1)/$tamPag);
			$inicio=($seccionActual*$tamPag)+1;

			if($pagina<$numPags)
			{
			   $final=$inicio+$tamPag-1;
			}else{
				$final=$numPags;
			}
                
                if ($final>$numPags){
                     $final=$numPags;
		    }
		}}
  
  $sql="SELECT * FROM personal ".$criterio." ORDER BY ".$orden.", cedula ASC LIMIT ".$limitInf.",".$tamPag; 

$res=mysql_query($sql); 
 } ?>

<table width="84%" height="93" border="1" align="center" cellpadding="0"  cellspacing="0" bordercolor="#C8D6FB" bgcolor="#B3EAE9">
<tr><td colspan='2'></td></tr>

<tr bgcolor="#F0F6FD" class="blue1">
  <td bgcolor="#B3EAE9" >&nbsp;</td>
  <td colspan="3" bgcolor="#B3EAE9"><span class="Estilo1">CRITERIO DE BUSQUEDA </span> : 
    <input type="text" name="criterio" size="22" maxlength="150">
    <input name="submit" type="submit" class="Estilo1" value="Buscar"></td>
  <td bgcolor="#B3EAE9">&nbsp;</td>
  <td colspan="2" bgcolor="#B3EAE9"><div align="center"></div></td>
<tr bgcolor="#F0F6FD" class="blue1">
  <td width="9%" bgcolor="#B3EAE9" ><div align="center" class="blue">DNI</div></td>

<td colspan="3" bgcolor="#B3EAE9"><div align="center" class="blue"><?php echo "<a align='center' class='link' class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=apellido&criterio=".$txt_criterio."'> "?>Nombre</div>
  <div align="center" class="blue"></div>  <div align="center"></div>  <div align="center" class="blue"></div></td>

<td width="31%" bgcolor="#B3EAE9"><div align="center" class="blue"><?php echo "<a align='center' class='link' class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=unidad&criterio=".$txt_criterio."'>"?> Servicio</div>
  </div></td>
<td width="15%" colspan="2" bgcolor="#B3EAE9"><div align="center" class="blue">Boletas</div></td>
<?php
while($registro=mysql_fetch_array($res)) 
 { 

?> 

<!-- tabla de resultados --> 
<tr bgcolor="#F7FAFD" onMouseOver="this.style.backgroundColor='#C8E1F7';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#F7FAFD'"o"];" onClick="javascript:muestra('<? echo "[".$registro["cedula"]."]- ".$registro["apellido"]." - ".$registro["cod_dependencia"]; ?>');"> 
	
    <td height="47" class="blue"><div align="left" class="Estilo3"><? echo $cedula=$registro["cedula"]; ?></div></td> 	
    <!--<td class="blue" ></td> -->
    <td colspan="3" align='center'><div align="left" class="Estilo3"><? echo $registro["apellido"]; ?></font></div>
      <span class="Estilo2"></font></span>
      <div> 
        <div align="left"></div>
      </div>      <div style="margin-left:13px; margin-top:7px "></div>      <div align="left" class="Estilo2"></div></td>
	<td class="Estilo3"><? $icedulavel=$registro["cod_dependencia"];
	
$CENTRO = mysql_query("SELECT  nombre  FROM dependencia where cod_dependencia='$icedulavel'");
$cant =  mysql_num_rows($CENTRO);
						
	while($rs = mysql_fetch_array($CENTRO)){
	 echo $rs["nombre"];
	}
	
	 ?></td>
  <td class="blue"><div align="center"><a href="boleta.php?dni=<? echo $registro["cedula"]?>&nivel=<? echo $nivel?>&idusuario=<? echo $idusuario?>"><img src="img/MsgSent.gif" width="28" height="25" border="0"></a></div></td>
  <td class="blue"><?php echo DameMovi($cedula); ?></td>
</tr> 
   <!-- fin tabla resultados --> 
<? } ?>
</table>
 
<br> 
<table border="0" cellspacing="0" cellpadding="0" align="center"> 
    <tr><td align="center" valign="top"> 
<? 
    if($pagina>1) 
    { 

       echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$captura."'>"; 
       echo "<font face='verdana' size='-2'>anterior</font>"; 
       echo "</a> "; 

    } 

    for($i=$inicio;$i<=$final;$i++) 
    { 
       if($i==$pagina) 
       { 
          echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
       }else{ 
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$captura."'>"; 
          echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
       } 
    } 
    if($pagina<$numPags) 
   { 
       echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$captura."'>"; 
       echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//fin de la paginacion 
?> 

</td></tr> 
</table>
<p><a href="presenta.php?idusuario=<?php echo $idusuario; ?>"><img src="img/MsgError.gif" width="36" height="39" border="0"></a>  Salir</p>

</form>
</body>
</HTML>
<? 
/*}else {
$mensaje="3";
$ruta="presenta.php";

   header ("Location: error2.php?mensaje=$mensaje&ruta=$ruta");   
}      
mysql_close(); */
?> 