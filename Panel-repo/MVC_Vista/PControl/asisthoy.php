<?php
	include ("session_dedometro.php");
	//$inicia_session = mysql_session_inicia(true);
?>	

<html>
<head>
<title>Untitled</title>
</head>

<style type="text/css">
<!-- 
td.list { font-size: 14px; text-align: center;}
td.listl { font-size: 14px; text-align: left;}
a.none { text-decoration: none }
-->
</style>

<body bgcolor="#FFFFFF" alink="blue" link="blue" vlink="blue">

<?php
	//valida_session($inicia_session);
?>
		 
<center>
<h2>Asistencia del 

<?php

  include ("fechas/fecha.php");
  $fecha = $ano . "-" . $mes . "-" . $dia;

	$fecha_ini = $ano."-".$mes."-01";
  $fecha_fin = $ano."-".$mes."-".dias($mes);
	
	echo "$fecha";
?>	
</h2>
</center>

<?php
  include ("conexion.php");
	conectarBD();
	
	$tablas = $join = $cond = "";

  if ($dependencia)
	{
	   $tablas = ", personal per, dependencia dep";
		 $join = "and ast.codigo = per.codigo and per.cod_dependencia = dep.cod_dependencia";
		 $cond = "and dep.cod_dependencia = '$dependencia'";
	}
	
	if ($tipo_pers)
	{
	   if (!$dependencia)
		 {
    	   $tablas = ", personal per";
    		 $join = "and ast.codigo = per.codigo";
		 }
		 $cond .= " and per.tipo_pers = '$tipo_pers'";
	}
	
	$sql = "select * from asistencia ast $tablas ".
         " where fecha = '$fecha' $join $cond group by ast.codigo order by h_entrada, h_salida, ast.codigo";
	//echo $sql;
						
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	?>
	<table border = 1  align=center>
	<tr>
	  <td class = listl bgcolor="#c0c0c0" ><b>Nro.</b></td>
  	<td class = listl bgcolor="#c0c0c0" width = "150px"><b>Apellidos y Nombres</b></td>
  	<td class = list bgcolor="#c0c0c0"><b>Hora Entrada</b></td>
  	<td class = list bgcolor="#c0c0c0"><b>Hora Salida</b></td>
	</tr>
	<?php
	
  $k = 1;
	for ($i=0; $i < $num; $i++)
	{
	     $codigo = mysql_result($cursor,$i,"codigo");
       
	     $sql2 = "select * from personal where cedula = '$codigo'";
			 $cursor2 = mysql_query($sql2);
			 
			 if (!mysql_num_rows($cursor2))
			    continue;
			 
    	 $apellido = mysql_result($cursor2,0,"apellido");
    	 $nombre = mysql_result($cursor2,0,"nombre");
			 
       $sql3 = "select * from asistencia where fecha = '$fecha' and codigo = '$codigo' order by h_entrada";
			 $cursor3 = mysql_query($sql3);
	     $num3 = mysql_num_rows($cursor3);
			 
			 echo "<tr>";
			 $bgcolor = "";
			 if ($k % 2 == 0) $bgcolor = "#e0e0e0";
			 
			 echo "<td rowspan = $num3 class = list bgcolor=\"$bgcolor\">";
			 echo $k++.".";
			 echo "</td>";
			 
			 echo "<td rowspan = $num3 class = listl bgcolor=\"$bgcolor\">";
			 echo "<a class = none href='asistencia.php?codigo=$codigo&fecha_ini=$fecha_ini&fecha_fin=$fecha_fin&btn_consultar=1'>".
			      "$apellido, $nombre</a>";
			 //echo "$apellido, $nombre";
			 echo "</td>";
			 
			 for ($j = 0; $j < $num3; $j++)
			 {
			     $h_entrada = mysql_result($cursor3,$j,"h_entrada");
					 $h_salida = mysql_result($cursor3,$j,"h_salida");
					 
					 /*$color = "black";
					 if ($tipo_pers == "P")
					 {
    					 if ($h_entrada > "08:00:00" and $h_entrada <= "08:15:00")
    					    $color = "blue";
    					 else if ($h_entrada > "08:15:00" and $h_entrada <= "11:45:00")
    					    $color = "red";
									
							 if ($h_entrada > "14:00:00" and $h_entrada <= "14:15:00")
    					    $color = "blue";
    					 else if ($h_entrada > "14:15:00" and $h_entrada <= "17:45:00")
    					    $color = "red";
					 }*/
					 
					 echo "<td class = list bgcolor=\"$bgcolor\"><font color = \"$color\">$h_entrada</font></td>";
					 if ($h_salida) 
					     echo "<td class = list bgcolor=\"$bgcolor\">$h_salida</td>";
					 else
					     echo "<td class = list bgcolor=\"$bgcolor\">-</td>";
					 echo "</tr>";
			 }

  }
	echo "</table>";
?>

</body>
</html>
