<?php
/*
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=RELOJ.xls");
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HNAL-<? echo date("Y");?></title>
 
 
 <link rel="stylesheet" type="text/css" href="css/tabl1.css"/>
 
 <style type="text/css" media="print">
.oculto {display:none}
 .center {
	text-align: left;
}
 </style>
</head>
 
<body>
<span class="center">
<?php 


include("cn/cn.php");
include("Funcion/FunCRepot.php");
include("Funcion/configuracion.php");

?>

<?
//direccion (2)
// horario

//$dni="07504327";
   $udni=$_REQUEST["udni"];
   
   $radio=$_REQUEST["radio"];

 $Idia=$_REQUEST["Idia"];
 $Imes=$_REQUEST["Imes"];
 $Iyear=$_REQUEST["Iyear"];
 

 
 $Fdia=$_REQUEST["Fdia"];
 $Fmes=$_REQUEST["Fmes"];
 $Fyear=$_REQUEST["Fyear"];


 
 $Pmes=$_REQUEST["Pmes"];
 $Pyear=$_REQUEST["Pyear"];
 

		if($radio=='Pxperi'){
		
		     $fechaini=$Iyear."-".$Imes."-".$Idia; 
		     $fechafin=$Fyear."-".$Fmes."-".$Fdia;
		   
		  //echo  $variable="between '".$fechaIni."' AND '".$fechaFin."'";
		
		}else{
		
		   $fechaini=$Pyear."-".$Pmes."-01"; 
          $fechafin=$Pyear."-".$Pmes."-31"; 
		//   echo $variable="between '".$CPorMesIni."' AND '".$CPorMesFin."'";
		}

//$fechaini='2010-10-01';
//$fechafin='2010-10-31';
  $centrocosto=$_REQUEST["centrocosto"];
///'x070';


?>
</span>
 
<div align="center"> <strong ><?PHP echo constant("ORGANIZACION");?> – PROGRAMACIÓN   DE CONTROL DE PERSONAL </strong><p>
  <?php if ($radio=='Pxperi'){?>
  Correspondiente al Periodo <? echo formato_fecha($fechaIni);?> -  <? echo formato_fecha($fechaFin);?>
  <?php }else{
			?>
  Correspondiente al Mes de 
  <?  echo   obtieneMes($Pmes)." del ". $Pyear;?>
              
            
  <?php }?>  
</div>
          <p>
          
<table class="testgrid" id="htmlgrid">
 
  
  
  <tr >
<td width="28" align="center" valign="middle">DNI</td>
<td width="126">Apellidos y Nombres <img src="img/espacio.GIF" width="150" height="1" /></td>
    <? 
	
	
  $dia_mes = mysql_query("SELECT  * FROM horario where  diapro BETWEEN '$fechaini' and '$fechafin' GROUP by diapro;");
   while($fred = mysql_fetch_array($dia_mes)){
  ?>


    <td width="680" bgcolor="#CCFFFF" > 
	<? $dnix=$fred["dni"]; $fechax=$fred["diapro"]; echo DameDia($fechax); echo "-"; echo $rest = substr( $fechax, -2);?> </td>

    <?php } ?>
  </tr>
   <? 
//  $queryhora = mysql_query("SELECT * FROM plan where centrocosto='$centrocosto' order by  paterno");
    $queryhora = mysql_query("SELECT apellido, cedula, cod_dependencia FROM personal where cod_dependencia='$centrocosto' order by apellido;");
  
   while($horariosq = mysql_fetch_array($queryhora)){
  ?>
  
  <tr>
  
    <td><? echo $xdni=$horariosq["cedula"];?></td>
    <td><? echo $horariosq["apellido"];?></td>
   
   <? 
   $diaprogra = mysql_query("SELECT dni,diapro,tipmov FROM horario where dni='$xdni' and diapro BETWEEN '$fechaini' and '$fechafin' GROUP by diapro;");
//   $diaprogra = mysql_query("select dni,diapro,tipmov from horario where dni='43623262' and diapro between '2010-05-01' and '2010-05-31'order by diapro asc;");
   while($fecdicpro = mysql_fetch_array($diaprogra)){
   ?>
   
    <td valign="middle" > 
    <?  $dni=$fecdicpro["dni"];
		$diapro=$fecdicpro["diapro"];
		$tipmov=$fecdicpro["tipmov"];	
	 ?>
    
    <?       $tipmov; 
	     //echo"<br>"; 
	    echo ProHorario($tipmov,$dni,$diapro); 
		//echo VerificaMoletaHorario($tipoMov,$dni,$diapro);
		
		//echo VerMovimi($tipmov);
	?>
    </td>
    <? }?>
    
 
  </tr>
  
  <? } ?>


  
  
</table>
 
 
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="334"><p align="left">Reporte Generado por - <?PHP echo constant("ORGANIZACION");?>  <br />
    </p></td>
  </tr>
  <tr>
    <td align="left"><div align="left">Anexo: 4104 </div></td>
  </tr>
</table>
<table width="406" border="0" align="center" cellpadding="0" cellspacing="0" class="testgrid">
  <tr>
    <td width="212"><a href="reportemarca.php" class="oculto">Volver a la pagina de consulta</a></td>
    <td width="194"><input type="button" name="button" id="button" value="          IMPRIMIR  FICHA          " class="oculto" onclick="javascript:print()"/></td>
  </tr>
</table>
<table width="145" border="1">
  <tr>
    <td colspan="2" align="center"><strong>LEYENDA</strong></td>
  </tr>
  <tr>
    <td width="39" class="s">VAC 
   </td>
    <td width="90">Vacaciones</td>
  </tr>
  <tr>
    <td class="a">LIB </td>
    <td>Libre</td>
  </tr>
  <tr>
    <td>E: <br /></td>
    <td>Entrada</td>
  </tr>
  <tr>
    <td>S: <br /></td>
    <td>Salida<br /></td>
  </tr>
  <tr>
    <td>T-&gt;</td>
    <td>Total Horas</td>
  </tr>
  <tr>
    <td>X</td>
    <td> No existe Marcación</td>
  </tr>
</table>
<p>&nbsp;</p>
<p class="negrita">&nbsp; </p>
</body>
</html>

