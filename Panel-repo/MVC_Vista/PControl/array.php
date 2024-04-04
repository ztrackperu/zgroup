<?php 
$cod_dependencia=$_REQUEST["cod_dependencia"];
$fecha_ini=$_REQUEST["fecha_ini"]; //2010-05-01
$fecha_fin=$_REQUEST["fecha_fin"]; //2010-05-31
  	 include ("conexion.php");
	  conectarBD();
  
     $sqlx = "SELECT * FROM personal where cod_dependencia='$cod_dependencia'";
     $cursorx = mysql_query($sqlx);
	
	
  while($fredx = mysql_fetch_array($cursorx)){	
          
		  echo $fredx["apellido"];   
			$dni=$fredx["cedula"];   
	 $sql = "SELECT distinct (fecha), codigo  FROM asistencia where codigo='$dni' and  fecha BETWEEN '$fecha_ini' and '$fecha_fin';";
     $cursor = mysql_query($sql);
	
	
	
echo "<table border='1'><tr>";		  
  while($fred = mysql_fetch_array($cursor)){
	 $link = array();
	 $link[] = $fred["fecha"];   
 
   for($i = 0; $i < count($link); ++$i)
    {
	
     
     echo "<td><h6>".$link[$i]."</h6></td>";

    }

}
echo"</tr></table>";

  }
?>
