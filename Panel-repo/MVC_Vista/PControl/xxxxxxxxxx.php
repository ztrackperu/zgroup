<?php
  
  
   include ("conexion.php");
	//$inicia_session = mysql_session_inicia(true);
 $codigo="43623262";
?>
<?php 

conectarBD();
$sql = "select * from asistencia where codigo ='$codigo' order by contador desc limit 0,1";
     $cursor = mysql_query($sql);
     
     $num = mysql_num_rows($cursor);
     if ($num > 0)
     {
        $h_entrada = mysql_result ($cursor,0,"h_entrada");
        $h_salida = mysql_result ($cursor,0,"h_salida");
        $fecha = mysql_result ($cursor,0,"fecha");
     }
     else
     {
        echo "El usuario no tiene registros";
        // exit();
     }

echo $h_entrada;
echo $h_salida;
?>