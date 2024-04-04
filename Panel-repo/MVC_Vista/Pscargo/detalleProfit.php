<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detalle Profit</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="1083" border="0">
              <tr>
                <td width="194">Forwarder Nro:<?php echo $fw ?></td>
                <td width="81">&nbsp;</td>
                <td width="216">&nbsp;</td>
                <td width="80">&nbsp;</td>
                <td width="91">&nbsp;</td>
                <td width="395">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="6"><table width="1077" border="0">
                  <tr>
                    <td align="center"><strong>Ingresos Fw:<?php echo $fw ?></strong></td>
                  </tr>
                  <tr>
                    <td><table width="1068" border="0" style="font-size:12px">
                      <tr>
                        <td bgcolor="#00CC00">Nro Dcto / Descripcion</td>
                        <td align="center" bgcolor="#00CC00">Mes</td>
                        <td align="center" bgcolor="#00CC00">Año</td>
                        <td align="center" bgcolor="#00CC00">Fecha Dcto</td>
                        <td align="center" bgcolor="#00CC00">Moneda</td>
                        <td align="center" bgcolor="#00CC00">Importe U. S/</td>
                        <td align="center" bgcolor="#00CC00">Importe N. S/</td>
                        <td align="center" bgcolor="#00CC00">T. Cam</td>
                        <td align="center" bgcolor="#00CC00">Importe U. $</td>
                        <td align="center" bgcolor="#00CC00">Importe N. $</td>
                      </tr>
                       <?php 
                    $i = 1;
					$xmontosU=0;$xmontosN=0;$xmontodU=0;$xmontodN=0;
                   		 foreach($reportesql as $item)
                    { 
					//si la condicion inicial es soles / dolares
					if($item['Ccd_Mone']=='PEN'){
						$montosU=$item['Ccd_Vuni'];
						$montosN=($montosU*$item['Cxc_Pigv'])+$montosU;
						//$montodU=$item['Ccd_Vuni']/$item['Cxc_Tica'];
						
						}else {
						$montosU=$item['Ccd_Vuni']*$item['Cxc_Tica'];
						$montosN=($montosU*$item['Cxc_Pigv'])+$montosU;
					}
					$xmontosU=$xmontosU+$montosU;
					$xmontosN=$xmontosU+$montosN;
					
					if($item['Ccd_Mone']=='USD'){
						$montodU=$item['Ccd_Vuni'];	
						$montodN=($montodU*$item['Cxc_Pigv'])+$montodU;	
					}else{
						$montodU=$item['Ccd_Vuni']/$item['Cxc_Tica'];;	
						$montodN=($montodU*$item['Cxc_Pigv'])+$montodU;	
					}
						$xmontodU=$xmontodU+$montodU;
						$xmontodN=$xmontodU+$montodN;
					?>
                      <tr>
                        <td><?php echo $item['Cxc_Tdoc'].'-'.$item['Cxc_Ndoc']; ?>/<?php echo $item['Ccd_Desc'] ?></td>
                        <td align="center"><?php echo substr($item['fechadoc'],3,2); ?></td>
                        <td align="center"><?php echo substr($item['fechadoc'],6,4); ?>&nbsp;</td>
                        <td align="center"><?php echo $item['fechadoc']; ?></td>
                        <td align="center"><?php if($item['Ccd_Mone']=='PEN') { echo 'Soles';}else{ echo 'Dolares';} ?>&nbsp;</td>
                        <td align="right"><?php echo number_format($montosU,2);?>&nbsp;</td>
                        <td align="right"><?php echo number_format($montosN,2)?>&nbsp;</td>
                        <td align="center"><?php echo number_format($item['Cxc_Tica'],2)?>&nbsp;</td>
                        <td align="right"><?php echo number_format($montodU,2); ?>&nbsp;</td>
                        <td align="right"><?php echo number_format($montodN,2) ?>&nbsp;</td>
                      </tr>
					  <?php $i++;} ?>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="center"><strong>Gastos Fw:<?php echo $fw ?></strong></td>
                  </tr>
                  
                  <tr>
                    <td><table width="1065" border="0" style="font-size:12px">
                      <tr>
                        <td bgcolor="#FF0000" style="color:#FFF">Nro Dcto / Descripcion</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Mes</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Año</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Fecha Dcto</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Moneda</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Importe U S/</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Importe N. S/</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">T.Cam</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Importe U. $</td>
                        <td align="center" bgcolor="#FF0000" style="color:#FFF">Importe N. $</td>
                      </tr>
                       <?php 
                    $i = 1;$xgastodU=0;$xgastosU=0;
					if($reporteacc!=NULL){
                   		 foreach($reporteacc as $itemG)
                    { 
					$gastodU=$itemG['n_debext']/1.18;
					$gastosU=$itemG['n_debnac']/1.18;
					$xgastodU=$xgastodU+$gastodU;
					$xgastosU=$xgastosU+$gastosU;
					$fechadcto=substr($itemG['d_fecdoc'],0,10);
					?>
                      <tr>
                        <td><?php echo $itemG['c_glosa']; ?></td>
                        <td align="center"><?php echo substr(vfecha($fechadcto),3,2); ?></td>
                        <td align="center"><?php echo substr(vfecha($fechadcto),6,4); ?>&nbsp;</td>
                        <td align="center"><?php echo vfecha($fechadcto) ?>&nbsp;</td>
                        <td align="center"><?php if($itemG['c_codmon']=='0'){echo 'Soles';}else{echo 'Dolares';}; ?>&nbsp;</td>
                        <td align="right"><?php echo number_format($gastosU,2); ?></td>
                        <td align="right">&nbsp;<?php echo number_format($itemG['n_debnac'],2); ?></td>
                        <td align="center">&nbsp;<?php echo $itemG['n_tipcmb']; ?></td>
                        <td align="right"><?php echo number_format($gastodU,2); ?>&nbsp;</td>
                        <td align="right"><?php echo number_format($itemG['n_debext'],2); ?>&nbsp;</td>
                      </tr>
                      <?php $i++;}}?>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="1067" border="0" cellpadding="0" cellspacing="0" style="font-size:12px">
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="201" align="right">Total Ingresos Importe.U S/</td>
                        <td width="9">&nbsp;</td>
                        <td width="105" align="right"><?php echo number_format($xmontosU,2) ?></td>
                        <td width="172" align="right">Total Ingresos Importe.U $</td>
                        <td width="13">&nbsp;</td>
                        <td width="130" align="right"><?php echo number_format($xmontodU,2) ?></td>
                        <td width="74" align="right">Leyenda:</td>
                        <td width="335">Importe.U $= Importe Unitario Dolares</td>
                        <td width="9">&nbsp;</td>
                        <td width="19">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right">Total Gastos Importe U S/</td>
                        <td>&nbsp;</td>
                        <td align="right"><?php echo number_format($xgastosU,2) ?></td>
                        <td align="right">Total Gastos Importe.U $</td>
                        <td>&nbsp;</td>
                        <td align="right"><?php echo number_format($xgastodU,2) ?></td>
                        <td>&nbsp;</td>
                        <td>Importe.U S/=Importe Unitario Soles</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right">Profit U S/</td>
                        <td>&nbsp;</td>
                        <td align="right"><?php echo number_format($xmontosU-$xgastosU,2) ?></td>
                        <td align="right">Profit U $</td>
                        <td>&nbsp;</td>
                        <td align="right"><?php echo number_format($xmontodU-$xgastodU,2) ?></td>
                        <td>&nbsp;</td>
                        <td>Importe N. S/=Importe Neto Soles</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Importe N. S/=Importe Neto Soles</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
</form>
</body>
</html>
