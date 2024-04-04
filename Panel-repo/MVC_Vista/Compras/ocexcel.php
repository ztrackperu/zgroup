<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
	$c_numeoc=$item['c_numeoc'];
	$c_tipooc=$item['c_tipooc'];	
	$c_codmon=$item['c_codmon'];	
	
	$c_codcon=$item['c_codcon'];	
	$n_tcoc=$item['n_tcoc'];
	
	$c_nomprov=$item['c_nomprv'];
	$c_codprov=$item['c_codprv'];
	$b_importac=$item['b_importac']; //0 - 1

	$d_fecoc=$item['d_fecoc'];	
	$c_codpag=$item['c_codpag'];
	
	$c_codlug=$item['c_codlug'];
	$c_deslug=$item['c_deslug'];
	
	$c_codtran=$item['c_codtran'];
	$c_nomtran=$item['c_nomtran'];
		
	$d_fecent=$item['d_fecent'];
	$c_lugent=$item['c_lugent'];
	$c_obsoc=$item['c_obsoc'];
	
		
	$n_bruafe=$item["n_bruafe"];
	$n_desafe=$item["n_desafe"];
	$n_netafe=$item["n_netafe"];
	$n_igvafe=$item["n_igvafe"];
	$n_totoc=$item["n_totoc"];	
	
	$n_totimp=$item["n_totimp"]; //detalle no se muestra en el formulario
	
	$cantDiagnosticos += 1;
	
	}
}




 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Reporte O/C</title>


<script>
function enviar(){
	
	document.form1.submit();
	
	}
</script>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ComprasC.php?acc=exportaoc">
  <a href="#" onclick="enviar()">
  <p>Generar Exportacion:</p>
  </a>
  <table width="719" border="1" cellpadding="0" cellspacing="0" class="data" id="Exportar_a_Excel">
    <tr>
      <td colspan="9">Fecha Emision :<?php echo vfecha(substr($d_fecoc,0,10));?></td>
    </tr>
    <tr>
      <td colspan="9">Nro Orden&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $c_numeoc?>  <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $c_numeoc?>" /></td>
    </tr>
    <tr>
      <td colspan="9">Razon Social&nbsp;&nbsp;:<?php echo $c_nomprov?></td>
    </tr>
    <tr>
      <td width="58" align="center">Codigo</td>
      <td width="156" align="center">Descripcion</td>
      <td width="98" align="center">&nbsp;</td>
      <td width="98" align="center">Serie equipo</td>
      <td width="56" align="center">UM</td>
      <td width="58" align="center">Cantidad</td>
      <td width="55" align="center">Precio</td>
      <td width="53" align="center">Dscto</td>
      <td width="67" align="center">Importe</td>
    </tr>
     <?php 
							if($resultado != NULL)
							{		
								$i = 1;
								foreach($resultado as $itemD)
								{
									$total+=$itemD["n_totimp"];
							?>
    <tr>
      <td align="center"><?php echo $itemD["c_codprd"]; ?></td>
      <td align="center"><?php echo $itemD["c_desprd"]; ?></td>
      <td align="center"><?php echo $itemD["c_obsdoc"]; ?>&nbsp;</td>
      <td align="center"><?php echo $itemD["c_nroserie"]; ?></td>
      <td align="center"><?php echo $itemD["c_codund"]; ?></td>
      <td align="center"><?php echo $itemD["n_canprd"]; ?></td>
      <td align="right"><?php echo $itemD["n_preprd"]; ?></td>
      <td align="right"><?php echo $itemD["n_dscto"]; ?></td>
      <td align="right"><?php  $importe=$itemD["n_preprd"]*$itemD["n_canprd"];
		
		$ndesc=($importe*$itemD["n_dscto"])/100;
		$imported=$importe-$ndesc;
		//$imported=(100-$itemD["n_dscto"])*$importe/100;		
		echo $imported ;
		 ?>
      </td>
    </tr>
   <?php 	
   $i++;
   		}
    }
	?>
  </table>
</form>
</body>
</html>