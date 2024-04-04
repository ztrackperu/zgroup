<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action=""><table width="745" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" align="center" bgcolor="#FF0000" style="color:#FFF;font-size:12"><strong>Cotizacion Nro:<?php echo $_REQUEST['txtbusca'] ?> &nbsp;&nbsp;&nbsp;&nbsp;Cliente:<?php echo $_REQUEST['cli'] ?> Asunto:<?php echo $_REQUEST['hiddenField']; ?></strong></td>
                          </tr>
                          <tr>
                            <td width="647">&nbsp;</td>
                            <td width="288">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="742" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="3" align="center" bgcolor="#99CCFF"><strong>Ingresos</strong></td>
                              </tr>
                              <tr>
                                <td width="189" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Factura </strong></td>
                                <td width="211" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Moneda</strong></td>
                                <td width="187" align="center" bgcolor="#CCCCCC"><strong>Monto (sin igv)</strong></td>
                              </tr>
                                  <?php 
                  //  $i = 1;
					if($Ringresos!=NULL){
                    foreach($Ringresos as $item)
                    { 
					$xtot=$item['PE_TCAM']*$item['PE_TBRU'];
					 $ztot+=$xtot;
	
            ?>
                              <tr  style="font-size:12px">
                                <td><?php echo $item['PE_NDOC'] ?></td>
                                <td align="center"><?php if($item['PE_MONE']=='0'){echo 'Soles';}else{ echo 'Dolares';}?></td>
                                <td align="right"><?php echo $tot=$item['PE_TCAM']*$item['PE_TBRU']?>&nbsp;</td>
                              </tr>
                              <?php 
							  
							  
							  }}?>
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><hr /></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="742" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="4" align="center" bgcolor="#FFFFCC"><strong>Gastos</strong></td>
                              </tr>
                              <tr>
                                <td width="458" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Detalle</strong></td>
                                <td width="140" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Monto $</strong></td>
                                <td width="144" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><strong>Monto S/. (sin igv)</strong></td>
                              </tr>
                                <?php 
                  //  $i = 1;
					if($Rgastos!=NULL){
                    foreach($Rgastos as $item)
                    { 
			
	
            ?>
                              <tr style="font-size:12px">
                                <td><?php echo $item['c_glosa'] ; echo '********'.$d=substr($item['c_glosa'],0,1)?>&nbsp;</td>
                                <td align="right"><?php if($d=='F'){echo number_format($item['n_debext']/1.18,2);}else{ $item['n_debext'];} ?>&nbsp;</td>
                                <td colspan="2" align="right"><?php if($d=='F'){echo $tote=$item['n_debnac']/1.18;}else{ $tote=$item['n_debnac'];} ?>&nbsp;</td>
                              </tr>
                              <?php
							  		$ztote+=$tote;
							   } }?>
                            </table>&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><hr /></td>
                          </tr>
          </table>
  <table width="400" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3" bgcolor="#99FFCC">Resumen:</td>
    </tr>
    <tr>
      <td width="280">Total Ingresos </td>
      <td width="44" align="right">S/.&nbsp;</td>
      <td width="76" align="right"><?php echo $ztot ?></td>
    </tr>
    <tr>
      <td>Total Gastos </td>
      <td align="right">S/.&nbsp;</td>
      <td align="right"><?php echo $ztote ?></td>
    </tr>
    <tr>
      <td>Total Profit </td>
      <td align="right">S/.&nbsp;</td>
      <td align="right"><?php echo $ztot-$ztote ?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>