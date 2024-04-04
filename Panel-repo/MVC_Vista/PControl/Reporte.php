<?php 
  	 include ("conexion.php");
	  conectarBD();
  
?>
<?php include("Funciones/FuncionRepor.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="456" border="1">
  <tr>
    <td width="82">&nbsp;</td>
    <td width="358">&nbsp;</td>
    <td width="358">&nbsp;</td>
  </tr>
  <?php 
     $sql = "SELECT * FROM personal where cod_dependencia='x070'";
     $cursor = mysql_query($sql);
		  
  while($fred = mysql_fetch_array($cursor)){
  
  
?>
    <tr>
    <td><?php echo $dni=$fred["cedula"]; ?></td>
    <td><?php echo $fred["apellido"]; ?>  </td>
    <td><table width="200" border="1">
  
  <td>&nbsp;</td>
    <?php for ( $i = 1 ; $i <= DiaMes() ; $i ++) { ?>
    <td><?php echo $i;?> </td>
    <?php } ?>
  </tr>
  <tr>
  
  <?php 
     $sqlx = "SELECT * FROM asistencia where codigo='$dni';";
     $cursorx = mysql_query($sqlx);
	 while($fredx = mysql_fetch_array($cursorx)){

		

  ?>  

  
  <td><?php echo $fredx["fecha"];?></td>
  
  
  

    
    <?php }?>
    
  </tr>
  
</table></td>
      
  </tr>

  <?php }?>
</table>
<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>