<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tamaño DIN A4</title>
<style type="text/css">
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
</style>

</head>
<?php 
$Mayor1="";
$Mayor2="";
$Mayor3="";
 foreach($this->inspeccionMPD->InspeccionMateriaPrimaDefectosMayoresSeleccionarPorDMP($idInspeccionMp) as $ValorMayor):	 
 
			 if ($ValorMayor->Nro==1){
			 $Mayor1=$ValorMayor->DescripcionDMP;
			 }else if($ValorMayor->Nro==2){
			 $Mayor2=$ValorMayor->DescripcionDMP;
			 }else if($ValorMayor->Nro==3){
			 $Mayor3=$ValorMayor->DescripcionDMP;
 }
 endforeach;



 



?>
<body>
<page size="A4"><table width="730" border="0" align="center">
  <tr>
    <td width="708">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="723" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="55">&nbsp;</td>
        <td width="61">&nbsp;</td>
        <td width="536" align="center">INSPECCION  MATERIA PRIMA</td>
        <td width="24">&nbsp;</td>
        <td width="31">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <?php  foreach($this->inspeccionMPD->InspeccionMateriaPrimaSeleccionarPorDMP($idInspeccionMp) as $CabeceraDMP):	 ?>
  <tr>
    <td><table width="723" border="1" cellspacing="1" cellpadding="1">
      <tr>
        <td width="190"><strong>Nro Lote</strong></td>
        <td colspan="7"><?php echo $CabeceraDMP->NroLoteIMP; ?></td>
        </tr>
      <tr>
        <td><strong>Liberacion de producto en campo</strong></td>
        <td colspan="3">
        <?php if($CabeceraDMP->LiberacionProducto==1){$libPrd="X";}else{$libPrd="";}?>
        (<?php echo $libPrd ?>) SI (<?php echo $libPrd ?>) NO</td>
        
        <td width="72" align="right"><strong>Fecha Ingreso</strong></td>
        <td colspan="3"><?php echo $CabeceraDMP->FechaIngreso; ?></td>
        </tr>
      <tr>
        <td><strong>Producto</strong></td>
        <td colspan="3">&nbsp;</td>
        <td align="right"><strong>Etapa</strong></td>
        <td colspan="3"><?php echo $CabeceraDMP->Clasificacion; ?>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Productor</strong></td>
        <td colspan="3"><?php echo $CabeceraDMP->CC_RAZO;  ?>&nbsp;</td>
        <td align="right"><strong>Condicion </strong></td>
        <?php 
		if($CabeceraDMP->LiberacionProducto==1){$ConLoteE="X";}else {$ConLoteE="";}
		if ($CabeceraDMP->LiberacionProducto==2){$ConLoteT="X";}else {$ConLoteT="";}
		if ($CabeceraDMP->LiberacionProducto==3){$ConLoteTT="X";}else {$ConLoteTT="";}?>
        <td width="65">(<?php echo $ConLoteE ?>)Entero</td>
        <td width="38">(<?php echo $ConLoteT  ?>)Top</td>
        <td width="52">(<?php echo $ConLoteTT ?>) T&amp;T</td>
      </tr>
      <tr>
        <td><strong>Nro Jabas</strong></td>
        <td width="65"><?php echo $CabeceraDMP->CC_RAZO;  ?>&nbsp;</td>
        <td width="94"><strong>Transporte Limpio</strong></td>
        <?php if($CabeceraDMP->TransporteLimpio==1){$TranLimp="X";}else {$TranLimp="";}?>
        <td width="99">(<?php echo $TranLimp; ?>) SI (<?php echo $TranLimp; ?>)NO</td>
        <td colspan="4"><strong>Observaciones</strong></td>
        </tr>
      <tr>
        <td><strong>Temp. Producto</strong></td>
        <td><?php echo $CabeceraDMP->TemperaturaProducto;  ?></td>
        <td><strong>Uso de Toldo</strong></td>
        <?php if($CabeceraDMP->Usotoldo==1){$usotoldo="X";}else {$usotoldo="";}?>
        <td>(<?php echo $usotoldo ?>) SI (<?php echo $usotoldo ?>)NO</td>
        <td colspan="4" rowspan="6">&nbsp;</td>
        </tr>
      <tr>
        <td><strong>PreRequisitos</strong></td>
        <td><strong>OK</strong></td>
        <td><strong>Inaceptable</strong></td>
        <td><strong>Observaciones</strong></td>
        </tr>
      <tr>
        <td><strong>Color / Olor</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Apariencia</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Materia Extraña no Vegetal(gusanos,insectos, etc.)</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Presencia de Fibra</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
        <?php endforeach;?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="723" border="1" cellspacing="1" cellpadding="1">
      <tr>
        <td width="195" bgcolor="#CCCCCC"><strong>Defectos</strong></td>
        <td width="92" bgcolor="#CCCCCC"><strong>G</strong></td>
        <td width="82" bgcolor="#CCCCCC"><strong>%</strong></td>
        <td width="168" bgcolor="#CCCCCC"><strong>Observacion</strong></td>
        <td width="158" bgcolor="#CCCCCC"><strong>Recomendacion</strong></td>
      </tr>
      <?php 
	  $valorAceptable=0;
	  $valorRechazo=0;
	  $valorTotal=0;
	  foreach($this->inspeccionMPD->InspeccionMateriaPrimaDefectosSeleccionarPorDMP($idInspeccionMp) as $DetalleDefectos):	 
	  $valorRechazo=$valorRechazo+$DetalleDefectos->valor; 
	  
	  ?>
      
      
      <tr>
        <td><?php echo $DetalleDefectos->DescripcionDMP ?></td>
        <td><?php echo $DetalleDefectos->valor ?>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php echo $DetalleDefectos->observacion ?>&nbsp;</td>
        <td><?php echo $DetalleDefectos->recomendacion ?>&nbsp;</td>
      </tr>
      <?php endforeach;?>
  </table></td>
  </tr>
  <tr>
    <td height="236"><table width="723" border="1" cellspacing="1" cellpadding="1">
      <tr>
        <td width="195"><strong>Aceptable</strong></td>
        <td width="92"><?php echo $valorAceptable=(1000-$valorRechazo) ?>&nbsp;</td>
        <td width="82"></td>
        <td width="168"></td>
        <td width="158"></td>
      </tr>
      <tr>
        <td><strong>Rechazo</strong></td>
        <td><?php echo $valorRechazo; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Total</strong></td>
        <td><?php echo $valorTotal=$valorAceptable+$valorRechazo ?>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Defecto Mayor 1</strong></td>
        <td colspan="2"><strong>Defecto Mayor 2</strong></td>
        <td><strong>Defecto Mayor 3</strong></td>
        <td rowspan="2" align="center" valign="top">Inspector de Calidad</td>
      </tr>
      <tr>
        <td height="46"><?php echo $Mayor1 ?>&nbsp;</td>
        <td colspan="2"><?php echo $Mayor2 ?>&nbsp;</td>
        <td><?php echo $Mayor3 ?>&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="2">CONDICION LOTE</td>
        <td colspan="2">Aceptado</td>
        <td>&nbsp;</td>
        <td rowspan="3" align="center" valign="top">Autorizado Por</td>
      </tr>
      <tr>
        <td colspan="2">Rechazado</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="39" colspan="4">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>Fecha y hora impresión:</td>
  </tr>
</table>
</page>

</body>

</html>
