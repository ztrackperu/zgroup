<?php
  include ("session_dedometro.php");
  //$inicia_session = mysql_session_inicia(true);
?>	

<html>
<head>
<title>Visualizaci� en linea de registros del dedometro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css" media="print">
.oculto {display:none}
 </style>
<script language="JavaScript" type="text/JavaScript">
<!-- 
function valida() 
{
		var F = document.forms.formulario;
  /*
    if (F.depen.selectedIndex == 0)
		{
		   alert ("Debe seleccionar una dependencia");
			 F.depen.focus();
			 return false;
		}
		
		if (F.codigo.selectedIndex == 0)
		{
		   alert("Debe seleccionar una persona");
			 F.codigo.focus();
			 return false;
			 
		}
   */
		if ((F.di.selectedIndex == 0 || F.mi.selectedIndex == 0 || F.ai.selectedIndex == 0
		    || F.df.selectedIndex == 0 || F.mf.selectedIndex == 0 || F.af.selectedIndex == 0)
				&& (F.mes.selectedIndex == 0 || F.ano.selectedIndex == 0))
		{
		    alert("Debe ingresar algn periodo de fechas !!");
        if (!F.di.disabled)
				    F.di.focus();
				else 
				   F.mes.focus();
					 
        return false;
		}
		
		return true;
}


function check_tipobusca(campo)
{
   var F = document.forms.formulario;
	 
   sel_tipo = (campo.value == "1") ?  false: true;
	 
	 F.di.disabled = sel_tipo;
	 F.mi.disabled = sel_tipo;
	 F.ai.disabled = sel_tipo;
	 F.df.disabled = sel_tipo;
	 F.mf.disabled = sel_tipo;
	 F.af.disabled = sel_tipo;
	 
	 F.mes.disabled = !sel_tipo;
	 F.ano.disabled = !sel_tipo;
}
// -->
</script>

<style type="text/css">
<!-- 

td.list { font-size: 14px; text-align: center;}
td.listn { font-size: 14px;}
.Estilo1 {font-size: 9px}
 
-->
</style>

</head>

<body bgcolor="#FFFFFF">

<?php 
//valida_session($inicia_session);
 
ini_set("error_reporting","E_ALL | E_NOTICE");

include("fechas/fecha.php");
include("conexion.php");

$conexion= conectarBD();

if(!$btn_actualizar && !$btn_consultar)
{
    $mes = date("m");
    $ano = date("Y");

 ?>
<h2><center>
    Control de Entrada/Salida 
  </center></h2>

<form action="asistencia.php" method="post" name="formulario" onSubmit="return valida()">
  <table align="center">
    <tr> 
      <td><strong>Dependencia: </strong></td>
      <td> <select name="depen" style = "width: 400px" onChange="formulario.submit()">
		  <option value="">Todos</option>
          <?php 
								
						$consulta= "SELECT * FROM dependencia order by nombre";
						$resultado= mysql_query($consulta);
						echo mysql_error();
						
						while($arr_asoc = mysql_fetch_array($resultado))
						{
						 		 $cod = $arr_asoc['cod_dependencia'];
								 $selected="";		
								 if($cod == $depen)
								 			$selected="selected";			
								 
								 $nombre= $arr_asoc['nombre'];
								 
								 echo "<option value=\"$cod\" $selected>$nombre</option>";					
						}
        					 ?>
        </select> </td>
    </tr>
    <tr> 
		<td>
		  <font><strong>Tipo de Personal : </strong></font>
		</td>
		<td>				   				 	  
      	  <select name = "tipo_pers" style = "width: 250px" onChange="formulario.submit()">
  		    <option value = "" <?php if($tipo_pers == "") echo "selected"; ?>>Todos</option>
            <option value = "P" <?php if($tipo_pers == "P") echo "selected"; ?>>Nombrado</option>
            <option value = "B" <?php if($tipo_pers == "B") echo "selected"; ?>>Contratado</option>
      	  </select> 
		</td>
	</tr>
	<tr> 
      <td><strong>Nombre: </strong></td>
       <td> 
	      <select name="codigo" style = "width: 250px" >
          <option value="">Todos</option>
          <?php 
			 if ($depen != "")
			 {           
				$depen = " and cod_dependencia='$depen'";
				if ($tipo_pers != "") 
				   $tipo_pers = "and tipo_pers = '$tipo_pers'";
			 }
			 else
			 {
				if ($tipo_pers != "") 
				   $tipo_pers = "and tipo_pers = '$tipo_pers'";
			 }
						 						
			 $consulta = "SELECT * FROM personal where activo = '1' $depen $tipo_pers order by apellido";
			 
						$resultado= mysql_query($consulta);
						echo mysql_error();
						
						while($arr_asoc = mysql_fetch_array($resultado))
						{
						 		 $codigo = $arr_asoc['cedula'];
								 $nombre= $arr_asoc['apellido'];//.", ".$arr_asoc['nombre'];
								 
								 echo "<option value=\"$codigo\">$nombre</option>";					
						}
				 ?>
         </select>			 
			</td>
    </tr>
    <tr> 
      <td colspan=2>&nbsp;</td>
    </tr>
    <tr> 
      <td><strong>Fecha Inicial:</strong></td>
      <td> 
        <?php 
					 LeeFecha ("di","mi","ai",$di,$mi,$ai,1); 
				?>
      </td>
    </tr>
    <tr> 
      <td><strong>Fecha Final:</strong></td>
      <td> 
        <?php 
           LeeFecha ("df","mf","af",$df,$mf,$af,1);
        ?>
      </td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td><strong>Por Mes:</strong></td>
      <td> 
        <?php	
        	LeeMes("mes",$mes);
    			echo "/";
    		  LeeAno("ano",$ano);
        ?>
      </td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>
			  <input type="radio" name="tipo_consul" value="1" onClick="check_tipobusca(this)">Por Periodo 
				<input type="radio" name="tipo_consul" value="2" onClick="check_tipobusca(this)" checked>Por Mes
			</td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><center>
          <input type="submit" name="btn_consultar" value="Consultar">
          <input type="reset" name="Reset" value="Limpiar">
        </center></td>
    </tr>
  </table>
</form>

<?php
}// fin del if q comprueba si los botones existen
else 
{
   //echo $codigo;
   //$codpass = md5($codigo);

   function Acomodar(&$dia)
	 {
	    // Hay dos datos
			if ($dia[0][0] && $dia[0][1] && !$dia[1][0] && !$dia[1][1])
			{
			    // No resgitro entrada y salida del primer turno
			    if ($dia[0][0] > "11:35:00")
					{
						 $dia[1][0] = $dia[0][0];
						 $dia[1][1] = $dia[0][1];
						 $dia[1][2] = $dia[0][2];
						 						 
						 $dia[0][0] = "";
						 $dia[0][1] = "";
						 $dia[0][2] = "";
					}
			
			}
			// Hay tres datos
			else if ($dia[0][0] && $dia[0][1] && $dia[1][0] && !$dia[1][1])
			{
			    // No resgitro entrada del primer turno
			    if ($dia[0][0] > "11:35:00")
					{
					   $dia[1][1] = $dia[1][0];
						 $dia[1][0] = $dia[0][1];
						 $dia[1][2] = sumahoras($dia[1][1],$dia[1][0]);
						 
						 $dia[0][1] = $dia[0][0];;
						 $dia[0][0] = "";
						 $dia[0][2] = "";
					}
					else
					   // No resgitro salida del primer turno
					   if ($dia[0][1] > "13:45:00")
						 {
    					   $dia[1][1] = $dia[1][0];
    						 $dia[1][0] = $dia[0][1];
    						 $dia[1][2] = sumahoras($dia[1][1],$dia[1][0]);
    						 
    						 $dia[0][1] = "";
    						 $dia[0][2] = "";
						 }
						 else
						     // No resgitro entrada del segundo turno
    						 if ($dia[1][0] > "16:30:00")
    						 {
        					   $dia[1][1] = $dia[1][0];
        						 $dia[1][0] = "";
    						 }
			}
	 }
	 
	 if (!$fecha_ini && !$fecha_fin)
	 {
    	 if($tipo_consul == 1)
    	 {
       		 $fecha_ini= $ai . "-" . $mi . "-" . $di;
      		 $fecha_fin= $af . "-" . $mf . "-" . $df;
        }
    		else
    		{
    		 	 $fecha_ini = $ano."-".$mes."-01";
    			 $fecha_fin = $ano."-".$mes."-".dias($mes);
    		}
		}
		else
		{
		    // echo $clave ."-". $codigo;
				if ($clave == $codigo and $boton == "Aceptar")
				{
				   $sql = "select * from asist_nota where codigo = '$codigo' and fecha = '$fecha'";
					 $curs_tmp = mysql_query($sql);
					 
					 $sql = "";
					 if (mysql_num_rows($curs_tmp) == 0)
					 {
					     if ($nota != "")
        				   $sql = "insert into asist_nota (codigo, fecha, tipo, observacion) ".
        					        "values ('$codigo', '$fecha', '$tipo',  '$nota')";
					 }
					 else
					 {
					     if ($nota != "")
							    $sql = "update asist_nota set observacion = '$nota', tipo = '$tipo' where codigo = '$codigo' and fecha = '$fecha'";
							 else
							    $sql = "delete from asist_nota where codigo = '$codigo' and fecha = '$fecha'";
					 }		 
					
					 if ($sql)
					 {
    					 //echo $sql;
							 mysql_query($sql);
    					 echo mysql_error();
					 }
				}
		}
		
		
		// Busca numero de turnos
		$sql = "select distinct count(*) from  asistencia ast ".
		       " where ast.codigo='$codigo' AND fecha >= '$fecha_ini' AND fecha <= '$fecha_fin'".
					 " group by fecha having count(*) > 1";
		$cursor = mysql_query($sql);
		echo mysql_error();
		
		$max = 1;
		if (($num = mysql_num_rows($cursor)) != 0)
		{
		   for ($i = 0; $i < $num; $i++)
			 {
			     $val = mysql_result($cursor,$i,0);
			     if ($val > $max)
					    $max = $val;
			 }
		}
			 
		$num_turno = ($max > 2) ? $max : 2; 
		
	    //Creaci� del Where
	  
		if (($depen == "") && ($tipo_pers == "") && ($codigo == ""))
			 $where = "";
		else
		{
		   if ($depen != "")			   	
		       $where = "and cod_dependencia = '$depen'";			 
		   if ($tipo_pers != "")			 				   					 
				 $where = $where . " and tipo_pers = '$tipo_pers'";					 
		   if ($codigo != "")
			   $where = $where . " and cedula = '$codigo'";
		} //Fin del else
		
		$where .= " order by apellido";		 

		// Busca nombre del personal 
		$sql = "select * from personal where activo = '1' $where";		
		$curtmp = mysql_query($sql);
		$numtmp = mysql_num_rows($curtmp);
		
		for ($j = 0; $j < $numtmp; $j++)
		{
		     $codigo = mysql_result($curtmp,$j,"cedula");
			 $codpass = md5($codigo);
			 
		
		     $persona = mysql_result($curtmp,$j,"apellido") . ", " . mysql_result($curtmp,$j,"nombre");
		     echo "<br><center><b>$persona<b></center><br>";

	 ?>
	 <table width="100%" border=1 align = center>
		 <tr  bgcolor = "#c0c0c0"> 
		<td rowspan="2" align = center><font color="#0000FF"><b>Fecha</b> </font></td>
    <?php  
		 
     for ($i = 0; $i < $num_turno; $i++)
		 {
    		?>
				
        <td colspan="3" align = center><font color="#0000FF"><strong>Turno</strong></font></td>
        <?php
		 }
		?>
		
    <td rowspan="2">&nbsp;</td>
		<td rowspan="2" align = center><font color="#0000FF"><b>Total<br> Diario</b> </font></td>
		<!--<td rowspan="2" align = center><font color="#0000FF"><b>Notas</b></font></td>-->
   </tr>

   <tr  bgcolor = "#c0c0c0"> 
 	  
    <?php  
    
     for ($i = 0; $i < $num_turno; $i++)
		 {
		    $ndias[$i][0] = 0;
				$ndias[$i][1] = 0;
				
		    $sumatot[$i][0] = 0;
				$sumatot[$i][1] = 0;
		    $sumatot[$i][2] = 0;
    		
				?>
        <td align = center><font color="#0000FF"><b>Inicio</b></font></td>
        <td align = center><font color="#0000FF"><b>Salida</b></font></td>
        <td align = center><font color="#0000FF"><b>Total</b></font></td>
        <?php
		 }
		 ?>
	 </tr>
	 
	 <?php
	 
	 for ($fecha = $fecha_ini; $fecha <= $fecha_fin && $fecha <= date("Y-m-d"); $fecha = add_dia($fecha))  
	 {
			 $sql = "select * from asistencia where fecha = '$fecha' and codigo = '$codigo' order by h_entrada";
			 $cursor = mysql_query($sql);
			 
			 $num = mysql_num_rows($cursor);
			 
			 $nds = DiaSemana($fecha,0);
			
			 if (($nds >= 1 && $nds <= 5) || $num != 0)
			 {   
			     echo "<tr>";
    			 echo "<td class = list  bgcolor = '#e0e0e0'> <font color=#0000FF><b><span title = ".DiaSemana($fecha).">$fecha</span></b></font></td>";
    			 			 
    			 for ($i = 0; $i < $num_turno; $i++)
    			 {
					    $dia[$i] = array("","","");
					    if ($i < $num)
							{
        			    $dia[$i][0] = mysql_result($cursor,$i,"h_entrada");
        					$dia[$i][1] = mysql_result($cursor,$i,"h_salida");
        					$dia[$i][2] = mysql_result($cursor,$i,"n_horas_dia");
									$contador[$i] = mysql_result($cursor,$i,"contador");
							}
    			 }
					 
					 if ($fechaant != date("Y-m-d"))
					     Acomodar($dia);

    			 for ($i = 0; $i < $num_turno; $i++)
    			 {
    	    		if ($dia[$i][0] != "")
								  $ndias[$i][0]++;
										
							if ($dia[$i][1] != "")
								  $ndias[$i][1]++;
					 
					    echo "<td class = list>".ht($dia[$i][0])."</td>";
							echo "<td class = list>".ht($dia[$i][1])."</td>";
							
							if ($dia[$i][0] != "" && $dia[$i][1] != "" && $dia[$i][2] == "")
					    {
								 $newdia = sumahoras($dia[$i][1],$dia[$i][0]);
    						 
    						 $dia[$i][2] = $newdia;
        				 $sql_upd = "update asistencia set n_horas_dia = '". $newdia. "' where fecha = '$fecha'".
								            " and h_entrada = '".$dia[$i][0]."' and h_salida = '".$dia[$i][1]."'";
								 //echo $sql_upd;  
        				 mysql_query($sql_upd);
							
								 
								 echo "<td class = list bgcolor=#e0e0e0>".$newdia."*</td>";          
    					}
							else 
							   echo "<td class = list bgcolor=#e0e0e0>".$dia[$i][2]."</td>";
								 
							$sumatot[$i][0] += hm($dia[$i][0]);
    				  $sumatot[$i][1] += hm($dia[$i][1]);
    				  $sumatot[$i][2] += hm($dia[$i][2]);
					 }
					 
					 echo "<td>&nbsp;</td>";
						 
           echo "<td class = list>";
           $ttdia = "0";
           for ($i=0; $i < $num_turno; $i++)
                $ttdia += hm($dia[$i][2]);
          
					 echo h60($ttdia);
           echo "</td>";
					 
					 $sql2 = "select * from asist_nota where codigo = '$codigo' and fecha = '$fecha'";
					 $cursor2 = mysql_query($sql2);
						 
					 $color = "black";
					 $item = "No";
					 $textnota = "Ingresar Nota";
					 if (mysql_num_rows($cursor2) != 0)
					 {
						    $color = "#006600"; // verde;
						    $item = "Si";
								$textnota = "Ver Nota";
					 }
          
           //echo "<td class = list>";
           //echo "<a href=\"nota.php?mcodigo=$codpass&fecha=$fecha&fecha_ini=$fecha_ini&fecha_fin=$fecha_fin\" ".
             //   " style=\"text-decoration: none\" title = \"$textnota\">";
           //echo " <font color=$color><b>$item</b></font></a>";
           //echo "</td>";
          
           echo "</tr>\n";
					 
					 /*if ($nds == 0)
					 {
    					 echo "<tr><td colspan = 10>";
    					 echo "</td></tr>";
				   }*/
			 }
			 else
			 {
			    /*echo "<tr><td colspan = 10>";
					echo "</td></tr>";*/
			 }
			 
			 if ($nds == 0)
			 {
  					 echo "<tr><td colspan = 10>";
  					 echo "</td></tr>";
		   }
				 
     } // Fin for fecha ...
	  
	 echo "<tr>";
	 echo "<td>&nbsp;</td>";
	 for ($i = 0; $i < $num_turno; $i++)
   {
       $suma[$i] = 0;
       echo "<td class = list><font color=\"#0000FF\">".ht(h60($sumatot[$i][0]/$ndias[$i][0]))."</font></td>";
			 echo "<td class = list><font color=\"#0000FF\">".ht(h60($sumatot[$i][1]/$ndias[$i][1]))."</font></td>";
       echo "<td class = list><font color=\"#0000FF\">".h60($sumatot[$i][2])."</font></td>";
   }
		
	 $enlace = "cons_notas.php?mcodigo=$codpass&fecha_ini=$fecha_ini&fecha_fin=$fecha_fin";
		
	 echo "<td>&nbsp;</td>";
	 echo "<td class = list><font color=\"#0000FF\"><b>".h60($sumatot[0][2]+$sumatot[1][2])."</b></font></td>";
	 //echo "<td class=list><a href=\"$enlace\" style=\"text-decoration: none\">Todas</a></td>";
	 echo "</tr>";
	 
	 ?>
	 </table>
	 
	    <?php
			} // Fin for de select personas 
			?>
          	 
	 <center>
     <table width="344" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="334" align="left"><p align="left" class="Estilo1">Reporte Generado por la Unidad de Inform&aacute;tica <br>
    </p></td>
    </tr>
  <tr>
    <td align="left"><div align="left"><span class="Estilo1">Anexo: 4104 </span></div></td>
    </tr>
</table>

      <br> 
      
      <table width="406" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="212"><a href="asistencia.php" class="oculto">Volver a la pagina de consulta</a></td>
    <td width="194"><input type="button" name="button" id="button" value="          IMPRIMIR  FICHA          " class="oculto" onClick="javascript:print()"/></td>
  </tr>
</table>

</center>
   	
	 <?php
	 
}
?>
  
</body>
</html>

