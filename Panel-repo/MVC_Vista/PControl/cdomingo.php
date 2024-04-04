 
<?php include("cn/cn.php"); ?>
<?php include("funciones.php"); ?>

<?php 
 
       $idusuario=$_REQUEST["idusuario"];
       $cedula=$_REQUEST["cedula"];
	   $Pyear=$_REQUEST["aniopro"];
	   $Pmes=$_REQUEST["idmes"];
	   $centro=$_REQUEST["centro"];
	   $fecha=date("Y-m-d");
       $Pmes=$Pmes;    
	   $diaaprogra=$_REQUEST["diaapro"];
	   
	   
	 

$dias = mysql_query("SELECT hentrada,hsalida,thoras,diapro,dni,tipmov FROM horario where dni='$cedula' and mespro='$Pmes' and aniopro='$Pyear'");
$cant =  mysql_num_rows($dias);

if($cant>0){						
	while($rss = mysql_fetch_array($dias)){
        $diapro=$rss["diapro"];
       $dd=dame_el_diaf($diapro);
        if($dd=="Domingo"){ 
                      
		 $ubica="UPDATE horario set hentrada='0.00', hsalida='0.00',thoras='0.00',fecha='$fecha',tipmov='T5',usuario='$idusuario'  WHERE dni='$cedula' and diapro='$diapro'";
   mysql_query($ubica) or die ("problema con query update2"); }// if dia
}  //while
} //cant
//header ("Location: hora.php?dni=$dni&idusuario=$idusuario");  
echo "<meta http-equiv='refresh' content='4; URL=hora.php?Pmes=".$Pmes."&Pyear=".$Pyear."&dni=".$cedula."&centro=".$centro."'>";
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


 
