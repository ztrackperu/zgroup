
<?php include("cn/cn.php"); ?>
<?php include("funciones.php"); ?>

<?php 
 
     
 

  $dni=$_REQUEST["cedula"];
  $Pmes=$_REQUEST["idmes"];
  $Pyear=$_REQUEST["aniopro"];
  $centro=$_REQUEST["centro"];


	   $fecha=date("Y-m-d");
	   
   /*$dni	=$_REQUEST["dni"];
   $idmes=$_REQUEST["idmes"]; 
   $aniopro=$_REQUEST["aniopro"];
   $centro=$_REQUEST["centro"];
	 */  
         
	     $diaaprogra=$_REQUEST["diaapro"];
	     $hentrada=$_REQUEST["hentrada"];
	     $hsalida=$_REQUEST["hsalida"];
	     $tipmov=$_REQUEST["tipmov"];
	     $thora=$_REQUEST["thora"];

$dias = mysql_query("SELECT hentrada,hsalida,thoras,diapro,dni,tipmov FROM horario where dni='$dni' and mespro='$Pmes' and aniopro='$Pyear'");
$cant =  mysql_num_rows($dias);

if($cant>0){						
	while($rss = mysql_fetch_array($dias)){
         $diapro=$rss["diapro"];
        $dd=dame_el_diaf($diapro);
        if($dd==$diaaprogra){ 
                      
		 $ubica="UPDATE horario set hentrada='$hentrada', hsalida='$hsalida',thoras='$thora',fecha='$fecha',tipmov='$tipmov',usuario='$idusuario'  WHERE dni='$dni' and diapro='$diapro'";
   mysql_query($ubica) or die ("problema con query update2"); }// if dia
}  //while
} //cant
//header ("Location: hora.php?dni=$dni&idusuario=$idusuario");  
echo "<meta http-equiv='refresh' content='4; URL=hora.php?Pmes=".$Pmes."&Pyear=".$Pyear."&dni=".$cedula."&centro=".$centro."'>";
//echo "URL=hora.php?Pmes=".$Pmes."&Pyear=".$Pyear."&dni=".$cedula."&centro=".$centro."";
?>     
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="258" align="center">
  <tr>
    <td width="248"><img src="img/bar.gif" width="200" height="25" /></td>
  </tr>
</table>
<p>&nbsp;</p>
