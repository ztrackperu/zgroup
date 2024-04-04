<?php 
  include("cn/cn.php");
      $idusuario=$_REQUEST["idusuario"];
      $dni      =$_REQUEST["dni"];
     $diapro   =$_REQUEST["diapro"];
   
 
$prores = mysql_query("delete from movimientos where dni='$dni' and diapro='$diapro'");


//mysql_close($linkx);
header ("Location: boleta.php?dni=$dni&idusuario=$idusuario");  

?>
