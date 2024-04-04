<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php 
  	 include ("conexion.php");
	  conectarBD();
  
?>
<?php include("Funciones/FuncionRepor.php"); ?>
<body>
<table border="1">
  <tr>
    <td>&nbsp;</td>
    <?php for ( $i = 1 ; $i <= DiaMes() ; $i ++) { ?>
    <td><?php   $mes=$i."-".date("m");


$Array = array();
$Array[]=$mes;

foreach($Array as $key => $value) {
   print "$value";
}
	?> </td>
    <?php } ?>
  </tr>
  
  <tr>
  <td><?php echo $mes;?></td>
  </tr>
</table>
<p>&nbsp;</p>
<?php /*?>
<table width="200" border="1">
    <?php for ( $i = 1 ; $i <=DiaMes() ; $i ++) { ?>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $n=$i;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php if($n==2){ echo "V";}else{ echo "F"; }?></td>

  </tr>
  <? } ?>
</table>
<?php */?>
<table width="200" border="1">
  <tr>
  <?php for ( $i = 1 ; $i <=DiaMes() ; $i ++) { ?>
    
    <?php 
     $sqlx = "SELECT distinct (fecha), codigo  FROM asistencia where codigo='43623262' and  fecha BETWEEN '2010-05-01' and '2010-05-31';";
     $cursorx = mysql_query($sqlx);
	 while($fredx = mysql_fetch_array($cursorx)){
      ?>  
      
  <td><?php echo $mes=date("Y-m")."-".$i; ?> <b><?php echo $fredx["fecha"];?></b></td>
    
 
    <? } } ?>
  </tr>
</table>

</body>
</html>