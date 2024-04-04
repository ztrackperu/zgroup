<? 
include("cn/cn.php");
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
<title>Licencias Medicas - Busquedas -</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stylos.css" type="text/css" rel="stylesheet">
<link href="images/iconos/tramite.css" rel="stylesheet" type="text/css">
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
<table width="477" border="0" align="center">
  <tr>
    <td width="471"><form name="form1" action="buscar.php"  class="green" >
             <table width="422" border="0" cellspacing="0">
      
  <input name="idusuario" type="hidden" value="<?php echo $idusuario; ?>">
  <input name="centro" type="hidden" value="<?php echo $centro; ?>">
  <input name="nivel" type="hidden" value="<?php echo $nivel; ?>">
  <input name="fecprofin" type="hidden" value="<?php echo $fecprofin; ?>">

      
        <tr>
          <td width="364"><span class="Estilo1">CRITERIO DE BUSQUEDA </span> :            
            <input type="text" name="criterio" size="22" maxlength="150"></td>
          <td width="54"><input name="submit" type="submit" class="Estilo1" value="Buscar"></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</center>
<? 
$criterio =$_GET[""]; 
$txt_criterio =$_GET[""]; 

$captura=$_GET["criterio"];

if ($_GET["criterio"]!=""){ 
$txt_criterio = $_GET["criterio"]; 


//$criterio = " where centrocosto = '" .$centro. "%' and  apellido like '%" . $txt_criterio . "%'"; 
$criterio = " where cedula like '%" . $txt_criterio . "%' or apellido like '%" . $txt_criterio . "%'  or cod_dependencia like '%" . $txt_criterio . "%' "; 
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
 ?>
 <? } ?>
<table width="73%" height="88" border="1" align="center" cellpadding="0"  cellspacing="0" bordercolor="#C8D6FB" bgcolor="#B3EAE9">
<tr><td colspan='2'></td></tr>

<tr bgcolor="#F0F6FD" class="blue1">
  <td bgcolor="#B3EAE9" >&nbsp;</td>
  <td colspan="3" bgcolor="#B3EAE9">&nbsp;</td>
  <td bgcolor="#B3EAE9">&nbsp;</td>
  <td bgcolor="#B3EAE9"><div align="center">Administracion</div></td>
  <tr bgcolor="#F0F6FD" class="blue1">
  <td width="9%" bgcolor="#B3EAE9" ><div align="center" class="blue">DNI</div></td>

<td colspan="3" bgcolor="#B3EAE9"><div align="center" class="blue"><?php echo "<a align='center' class='link' class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=apellido&criterio=".$txt_criterio."'> "?>Nombre</div>
  <div align="center" class="blue"></div>  <div align="center"></div>  <div align="center" class="blue"></div></td>

<td width="28%" bgcolor="#B3EAE9"><div align="center" class="blue"><?php echo "<a align='center' class='link' class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=unidad&criterio=".$txt_criterio."'>"?> Servicio</div>
  </div></td>
<td bgcolor="#B3EAE9"><div align="center" class="blue">Horario Mensual</div></td>
<?php
while($registro=mysql_fetch_array($res)) 
 { 

?> 

<!-- tabla de resultados --> 
<tr bgcolor="#F7FAFD" onMouseOver="this.style.backgroundColor='#C8E1F7';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#F7FAFD'"o"];" onClick="javascript:muestra('<? echo "[".$registro["cedula"]."]- ".$registro["apellido"]." - ".$registro["centrocosto"]; ?>');"> 
	
    <td height="42" class="blue"><div align="left" class="Estilo3"><? echo $cedula=$registro["cedula"]; ?></div></td> 	
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
	  $cedula=$rs["cedula"];
	  $cod_dependencia=$rs["cod_dependencia"];
	}
	
	 ?>	        </td>
        <td class="blue"><div align="center"><a href="control.php?dni=<? echo $cedula=$registro["cedula"]; ?>&centro=<?php echo $icedulavel=$registro["cod_dependencia"];?>"><img src="img/MsgSent.gif" width="31" height="28" border="0"></a></div></td>
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
<p><a href="presenta.php?idusuario=<?php echo $idusuario; ?>"><img src="img/MsgError.gif" alt="" width="36" height="39" border="0" ></a>  Salir</p>
<p>&nbsp;</p>
</BODY>
</HTML>
<? 
    mysql_close(); 
?> 