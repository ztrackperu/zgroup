<?php
// include ("session_dedometro.php");
// $inicia_session = mysql_session_inicia(true);
?>	


<html>
<head>
<title>Untitled</title>

<style type="text/css">
<!-- 

td.list { font-size: 14px; text-align: center;}
td.font14 { font-size: 14px;}
 
-->
</style>
</head>

<body bgcolor="#FFFFFF" link="black" alink="black" vlink="black">
<?php 
    //  valida_session($inicia_session);
			
		//  include ("../modulos/fechas/fecha.php");
			
			include ("conexion.php");
			ConectarBD();
						
			$sql = "select * from asist_nota where md5(codigo) = '$mcodigo' and fecha >= '$fecha_ini' and fecha < '$fecha_fin' order by fecha";
			// echo $sql;
			$cursor = mysql_query($sql);
			$num = mysql_num_rows($cursor);
			
?>
       
  	  <h3><center>LISTA DE NOTAS</center></h3>
  	  <br>
			
<?php
		 	if ($num == 0)
			{
			   echo "<br><center>No hay notas registradas !!</center>";
			   return;
			}
?>
    	<table border = 2 align = center width = "100%"> 
  	    <tr>
          <td class=list style="width:80"><b>Fecha</b></td>
					<td class = list><b>Descripcion de la Nota</b></td>
          <td class = list><b>Tipo</b></td>
			 </tr>
<?php

     $codigo = mysql_result ($cursor,0,"codigo");
		 $codpass = md5($codigo);
		 
		 for ($i = 0; $i < $num; $i++)
		 {
				$fecha = mysql_result ($cursor,$i,"fecha");
				$observacion = mysql_result ($cursor,$i,"observacion");
				$tipo = mysql_result ($cursor,$i,"tipo");
			  
				echo "<td class = list><font color = blue><b><span title = '".DiaSemana($fecha)."'>$fecha</span></b></font></td>";
				echo "<td class = font14><a href=\"nota.php?mcodigo=$codpass&fecha=$fecha&fecha_ini=$fecha_ini&fecha_fin=$fecha_fin\" style = \"text-decoration:none\">$observacion</a></td>";
				echo "<td class = list>$tipo</td>";
				echo "</tr>";	   
		 
		 }
?>

</table>

</body>
</html>
