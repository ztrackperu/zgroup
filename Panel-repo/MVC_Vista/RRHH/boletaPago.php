<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<!--INICIO DE IMPRESION EN A4-->
<style type="text/css">
body {
	 margin: 10 0 10 0px; 
	
}
body,td,th {
	font-size: 10px;
	font-family: Calibri, Arial;
	
}
</style>
<style type="text/css">
		@media all {
			div.saltopagina{
				display: none;
			}
		}
			
		@media print{
			div.saltopagina{ 
				display:block; 
				page-break-before:always;
			}
		}	
	</style>
<script>
<!--FIN IMPRESION A4-->
</script> 
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
<style type="text/css">
body {
	margin-left: 0px;
}
</style>
</head>
<style type="text/css" media="print">
.nover {display:none}
#factura table tr td table tr td p {
	font-weight: bold;
}
#factura table tr td table tr td p {
	font-weight: bold;
}
</style>


</head>

<body>



<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="#=<?php echo $udni ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>


  <?php $listacliente = $b;
                    $i = 1;
					if($listacliente!=NULL)
{
                    foreach($listacliente as $item)
                    {						
            ?>
			
<div id="factura">

<table width="1042" border="0" height="700"  >
  <tr>
    <td width="510"><table width="510" border="0" height="700"  cellpadding="0" cellspacing="0" align="center"  >

	  <tr>
		<td align="center" colspan="4">BOLETA    DE PAGO</td>
	  </tr>
	  <tr>
		<td align="center" colspan="4"><img src="../images/logochiquito.jpg" width="184" height="59"  /></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

	  </tr>
	  <tr>
	    <td width="30">&nbsp;</td>
		<td width="154">RUC</td>
		<td width="11">:</td>
		<td width="315">20521180774</td>
	   
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>Razón Social</td>
		<td>:</td>
		<td><?php $emp=$item['Empresa']; if($emp=='1'){echo "ZGROUP SAC.";}else{echo "PSCARGO SAC";}?></td>
		
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>Período Tributario</td>
		<td>:</td>
		<td><?php echo  $item['mes'].'/'.$item['anno']?>&nbsp;</td>
	   
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

	  </tr>

	 
	  

	  
	  <tr>
		<td  colspan="7" align="center"><table  border="1" cellspacing="0" cellpadding="0" width="454" align="center" >
		  <tr align="center">
			<td width="75"><strong>Codigo</strong></td>
			<td align="center" colspan="2"><strong>Apellidos</strong></td>
			<td width="78"><strong>Nombres</strong></td>
			
			
			<td colspan="2"><strong>Tipo de Trabajador</strong></td>
		  </tr>
		  <tr  align="center">
			<td><?php echo $item['userid']  ?>&nbsp;</td>
		   
			<td width="73"><?php echo $item['ApePat']?></td>
			<td width="73"><?php echo $item['ApeMat']?></td>
			 <td><?php  echo $item['Nomc'].' '.$item['Nomc2']?></td>
			<td colspan="2">Empleado</td>
		  </tr>
		  <tr align="center">
			<td height="30" rowspan="2" align="center"><p><strong>Correo electronico</strong></p></td>
			<td height="14" colspan="2">Documento de Identidad</td>
			<td rowspan="2"  align="center"><strong>Fecha de Ingreso o Reingreso</strong></td>
			<td width="68" rowspan="2"  align="center"><strong>Fecha de Cese</strong></td>
			<td width="73" rowspan="2"  align="center"><strong>Régimen Laboral</strong></td>
		  </tr>
		  <tr align="center">
			<td height="14">Tipo </td>
			<td height="14" align="center">Numero</td>
		  </tr>
		  <tr align="center">
			<td height="15">&nbsp;</td>
			<td height="15">DNI</td>
			<td  align="center"><?php echo $item['Dni'] ?></td>
			<td><?php $f=$item['FechaIngEm']; echo date('d/m/Y', strtotime($f));?></td>
			<td align="center">-</td>
			<td align="center">Privado</td>
		  </tr>
		  <tr  align="center">
			<td><strong>AFP</strong></td>
			<td><strong>CUSSP</strong></td>
			<td><strong>Inici de Vac.</strong></td>
			<td><strong>Fin de Vac.</strong></td>
			<td colspan="2"><strong>Total Dias Vac.</strong></td>
		  </tr>
		  <tr  align="center">
			<td><?php  $ps=$item['pension'];$a=$item['c_nombre']; if($ps!=1){echo $a;}?> </td>
			<td><?php $item['cussp'];?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>

		  </tr>
		  <tr  align="center">
			<td><strong>Días Lab.</strong></td>
			<td><strong>Días no Lab.</strong></td>
			<td><strong>Días Subsidiados</strong></td>
			<td><strong>Horas Laboradas</strong></td>
			<td colspan="2"><strong>Horas en Sobretiempo</strong></td>
		  </tr>
		  <tr  align="center">
			<td><?php echo $item['d_trab'] ?>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?php echo $item['horast']; ?>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
		  </tr>
		  <tr  align="center">
			<td ><strong>Codigo</strong></td>
			<td colspan="2"><strong>Conceptos</strong></td>
			<td><strong>Ingresos s/.</strong></td>
			<td><strong>Descuentos S/.</strong></td>
			<td><strong>Aportes Empleador S/.</strong></td>
		  </tr>
		  <tr>
		  
			<td   colspan="6" align="center"><strong>INGRESOS</strong></td>
				  
		  </tr>
		  
		 
		  <tr >
			<td colspan="6"><table border="0" width="450" cellpadding="0" cellspacing="0">
			  <tr>
				<td width="75">&nbsp;</td>
				<td width="150">Remuneración o Jornal Básico</td>
				<td width="80" align="right"><?php echo $item['sueldob']; ?></td>
				<td width="70">&nbsp;</td>
				<td width="75">&nbsp;</td>
				</tr>
			  <tr>
				<td>&nbsp;</td>
				<td>Asignación Familiar</td>
				<td align="right"><?php $af=$item['asigf']; if($af==1){echo '75';} ?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
			</table></td>
			</tr>
		  <tr align="center">
			<td colspan="6"><strong>Descuentos</strong></td>
			</tr>
		   <tr align="center">
			 <td colspan="6"><strong>Aportes Trabajador</strong></td>
		   </tr>
		   <tr> 
			<td colspan="6">
			<table width="450" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="75">&nbsp;</td>
			<td width="150" >Renta de Quinta Categoría-Retenciones</td>
			<td width="80" align="right">&nbsp;</td>
			<td width="70" align="right"><?php echo	 $item['desc_quinta']; ?></td>
			<td width="75" align="right">&nbsp;</td>
		   
		  </tr>
		  <tr>
		  <?php  $pens=$item['pension']; if($pens==1){ ?>
			<td>&nbsp;</td>
			<td>Sist. Nacional de Pen. D.L. 19990</td>
			<td  align="right"></td>
			<td  align="right"><?php echo  $item['DescToPen']; ?></td>
			<td  align="right">&nbsp;</td>
			
		  </tr>
		  
		  <? }else{ ?>
		  <tr >
			<td>&nbsp;</td>
			<td>Comisión</td>
			<td  align="right">&nbsp;</td>
			<td  align="right"><?php echo $item['ComiRA']; ?></td>
			<td  align="right">&nbsp;</td>
			
		  </tr>
		  <tr >
			<td>&nbsp;</td>
			<td>Prima de Seguro AFP</td>
			<td  align="right">&nbsp;</td>
			<td  align="right"><?php echo $item['PrmSeg'] ?></td>
			<td  align="right">&nbsp;</td>
		   
		  </tr>
		  <tr>
			<td >&nbsp;</td>
			<td>Sist. Priv. De Pens.-Aport. Oblig.</td>
			<td  align="right">&nbsp;</td>
			<td  align="right"><?php echo $item['AprtObl'] ?></td>
			<td  align="right">&nbsp;</td>
		   
		  </tr>
		  <?php } ?>
		  
			
		</table> 
		   
			</td>
		</tr>
		  
		  
		  
		  
		  
		  
		  <tr>
			<td colspan="6"><strong>Aportes Empleador</strong></td>
			</tr>
		  
		  <tr>
			<td colspan="6">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ESSALUD</td>
		  </tr>
		  <tr>
			<td colspan="2"><strong>Totales S/.</strong></td>
			<td align="right"><strong><?php echo "S/.  ".$item['TotalRemuB']; ?></strong></td>
			<td align="right"><strong><?php echo "S/.  ".$item['descTotal']; ?></strong></td>
			<td colspan="2" align="center">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="2"><strong>Neto a Pagar S/.</strong></td>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td colspan="2" align="right"><strong><?php echo "S/.  ". $item['total_pag']; ?></strong></td>
		   </tr>
		</table>
		<table width="454" border="0" >
		  <tr align="center">
			<td width="200">&nbsp;</td>
			<td width="10">&nbsp;</td>
			<td width="230">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		   <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><hr /></td>
			<td>&nbsp;</td>
			<td><hr /></td>
		  </tr>
		  <tr align="center">
			<td>Firma del Empleador</td>
			<td>&nbsp;</td>
			<td>Firma del Trabajador</td>
		  </tr>
		  <tr align="center">
			<td>SEGUNDO JOSE ZABARBURU CHUQUIZUTA</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr align="center">
			<td ><strong> Gerente General</strong></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr align="center">
			<td><strong> ZGROUP S.A.C.</strong></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		 
		</table><p align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLEADOR</p></td>
	  </tr>  

	</table></td>
   
    <td width="522"><table width="510" border="0" height="700"  cellpadding="0" cellspacing="0" align="right"   >

	  <tr>
		<td align="center" colspan="4">BOLETA    DE PAGO</td>
	  </tr>
	  <tr>
		<td align="center" colspan="4"><img src="../images/logochiquito.jpg" width="184" height="59"  /></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

	  </tr>
	  <tr>
	    <td width="30">&nbsp;</td>
		<td width="154">RUC</td>
		<td width="11">:</td>
		<td width="315">20521180774</td>
	   
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>Razón Social</td>
		<td>:</td>
		<td><?php $emp=$item['Empresa']; if($emp=='1'){echo "ZGROUP SAC.";}else{echo "PSCARGO SAC";}?></td>
		
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>Período Tributario</td>
		<td>:</td>
		<td><?php echo  $item['mes'].'/'.$item['anno']?>&nbsp;</td>
	   
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

	  </tr>

	 
	  

	  
	  <tr>
		<td  colspan="7" align="center"><table  border="1" cellspacing="0" cellpadding="0" width="454" align="center" >
		  <tr align="center">
			<td width="75"><strong>Codigo</strong></td>
			<td align="center" colspan="2"><strong>Apellidos</strong></td>
			<td width="78"><strong>Nombres</strong></td>
			
			
			<td colspan="2"><strong>Tipo de Trabajador</strong></td>
		  </tr>
		  <tr  align="center">
			<td><?php echo $item['userid']  ?>&nbsp;</td>
		   
			<td width="73"><?php echo $item['ApePat']?></td>
			<td width="73"><?php echo $item['ApeMat']?></td>
			 <td><?php  echo $item['Nomc'].' '.$item['Nomc2']?></td>
			<td colspan="2">Empleado</td>
		  </tr>
		  <tr align="center">
			<td height="30" rowspan="2" align="center"><p><strong>Correo electronico</strong></p></td>
			<td height="14" colspan="2">Documento de Identidad</td>
			<td rowspan="2"  align="center"><strong>Fecha de Ingreso o Reingreso</strong></td>
			<td width="68" rowspan="2"  align="center"><strong>Fecha de Cese</strong></td>
			<td width="73" rowspan="2"  align="center"><strong>Régimen Laboral</strong></td>
		  </tr>
		  <tr align="center">
			<td height="14">Tipo </td>
			<td height="14" align="center">Numero</td>
		  </tr>
		  <tr align="center">
			<td height="15">&nbsp;</td>
			<td height="15">DNI</td>
			<td  align="center"><?php echo $item['Dni'] ?></td>
			<td><?php $f=$item['FechaIngEm']; echo date('d/m/Y', strtotime($f));?></td>
			<td align="center">-</td>
			<td align="center">Privado</td>
		  </tr>
		  <tr  align="center">
			<td><strong>AFP</strong></td>
			<td><strong>CUSSP</strong></td>
			<td><strong>Inici de Vac.</strong></td>
			<td><strong>Fin de Vac.</strong></td>
			<td colspan="2"><strong>Total Dias Vac.</strong></td>
		  </tr>
		  <tr  align="center">
			<td><?php  $ps=$item['pension'];$a=$item['c_nombre']; if($ps!=1){echo $a;}?> </td>
			<td><?php $item['cussp'];?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>

		  </tr>
		  <tr  align="center">
			<td><strong>Días Lab.</strong></td>
			<td><strong>Días no Lab.</strong></td>
			<td><strong>Días Subsidiados</strong></td>
			<td><strong>Horas Laboradas</strong></td>
			<td colspan="2"><strong>Horas en Sobretiempo</strong></td>
		  </tr>
		  <tr  align="center">
			<td><?php echo $item['d_trab'] ?>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?php echo $item['horast']; ?>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
		  </tr>
		  <tr  align="center">
			<td ><strong>Codigo</strong></td>
			<td colspan="2"><strong>Conceptos</strong></td>
			<td><strong>Ingresos s/.</strong></td>
			<td><strong>Descuentos S/.</strong></td>
			<td><strong>Aportes Empleador S/.</strong></td>
		  </tr>
		  <tr>
		  
			<td   colspan="6" align="center"><strong>INGRESOS</strong></td>
				  
		  </tr>
		  
		 
		  <tr >
			<td colspan="6"><table border="0" width="450" cellpadding="0" cellspacing="0">
			  <tr>
				<td width="75">&nbsp;</td>
				<td width="150">Remuneración o Jornal Básico</td>
				<td width="80" align="right"><?php echo $item['sueldob']; ?></td>
				<td width="70">&nbsp;</td>
				<td width="75">&nbsp;</td>
				</tr>
			  <tr>
				<td>&nbsp;</td>
				<td>Asignación Familiar</td>
				<td align="right"><?php $af=$item['asigf']; if($af==1){echo '75';} ?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
			</table></td>
			</tr>
		  <tr align="center">
			<td colspan="6"><strong>Descuentos</strong></td>
			</tr>
		   <tr align="center">
			 <td colspan="6"><strong>Aportes Trabajador</strong></td>
		   </tr>
		   <tr> 
			<td colspan="6">
			<table width="450" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="75">&nbsp;</td>
			<td width="150" >Renta de Quinta Categoría-Retenciones</td>
			<td width="80" align="right">&nbsp;</td>
			<td width="70" align="right"><?php echo	 $item['desc_quinta']; ?></td>
			<td width="75" align="right">&nbsp;</td>
		   
		  </tr>
		  <tr>
		  <?php  $pens=$item['pension']; if($pens==1){ ?>
			<td>&nbsp;</td>
			<td>Sist. Nacional de Pen. D.L. 19990</td>
			<td  align="right"></td>
			<td  align="right"><?php echo  $item['DescToPen']; ?></td>
			<td  align="right">&nbsp;</td>
			
		  </tr>
		  
		  <? }else{ ?>
		  <tr >
			<td>&nbsp;</td>
			<td>Comisión</td>
			<td  align="right">&nbsp;</td>
			<td  align="right"><?php echo $item['ComiRA']; ?></td>
			<td  align="right">&nbsp;</td>
			
		  </tr>
		  <tr >
			<td>&nbsp;</td>
			<td>Prima de Seguro AFP</td>
			<td  align="right">&nbsp;</td>
			<td  align="right"><?php echo $item['PrmSeg'] ?></td>
			<td  align="right">&nbsp;</td>
		   
		  </tr>
		  <tr>
			<td >&nbsp;</td>
			<td>Sist. Priv. De Pens.-Aport. Oblig.</td>
			<td  align="right">&nbsp;</td>
			<td  align="right"><?php echo $item['AprtObl'] ?></td>
			<td  align="right">&nbsp;</td>
		   
		  </tr>
		  <?php } ?>
		  
			
		</table> 
		   
			</td>
		</tr>
		  
		  
		  
		  
		  
		  
		  <tr>
			<td colspan="6"><strong>Aportes Empleador</strong></td>
			</tr>
		  
		  <tr>
			<td colspan="6">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ESSALUD</td>
		  </tr>
		  <tr>
			<td colspan="2"><strong>Totales S/.</strong></td>
			<td align="right"><strong><?php echo "S/.  ".$item['TotalRemuB']; ?></strong></td>
			<td align="right"><strong><?php echo "S/.  ".$item['descTotal']; ?></strong></td>
			<td colspan="2" align="center">&nbsp;</td>
			</tr>
		  <tr>
			<td colspan="2"><strong>Neto a Pagar S/.</strong></td>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td colspan="2" align="right"><strong><?php echo "S/.  ". $item['total_pag']; ?></strong></td>
		   </tr>
		</table>
		<table width="454" border="0" >
		  <tr align="center">
			<td width="200">&nbsp;</td>
			<td width="10">&nbsp;</td>
			<td width="230">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		   <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><hr /></td>
			<td>&nbsp;</td>
			<td><hr /></td>
		  </tr>
		  <tr align="center">
			<td>Firma del Empleador</td>
			<td>&nbsp;</td>
			<td>Firma del Trabajador</td>
		  </tr>
		  <tr align="center">
			<td>SEGUNDO JOSE ZABARBURU CHUQUIZUTA</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr align="center">
			<td ><strong> Gerente General</strong></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr align="center">
			<td><strong> ZGROUP S.A.C.</strong></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		 
		</table><p align="center">TRABAJADOR</p></td>
	  </tr>  

	</table></td>
  </tr>
</table>
<div class="saltopagina">	</div>
</div>
	<?php
					$i += 1;
				}
		}
     ?>
            
<p>&nbsp;</p>



</body>
</html>