<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form action="?c=01&a=GenerarArchivoTXT&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="txtfinicio" id="txtfinicio" value="<?php echo $Fini ?>" />
 <input type="hidden" name="txtffin" id="txtffin" value="<?php echo  $Ffin?>" />

  <p>&nbsp;</p>
  <table width="521" border="0" align="center">
    <tr>
      <th align="center" valign="middle" scope="col"><strong style="alignment-adjust:central"><?php echo 'FACTURAS DEL->'.$fecha.'<-HASTA->'.$fechafin ?></strong></th>
    </tr>
    <tr>
      <th align="center" valign="middle" scope="col"><input type="submit" name="Exportar" id="Exportar" value="Enviar a Facturador Sunat" /></th>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#CCCC00">Información Resumida.</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="870" border="1" align="center">
    <tr>
      <th width="126" scope="col">Nro Documento</th>
      <th width="154" scope="col">Fecha Documento</th>
      <th width="254" scope="col">Cliente</th>
      <th width="94" scope="col">Moneda</th>
      <th width="68" scope="col">Bruto</th>
      <th width="68" scope="col">Igv</th>
      <th width="60" scope="col">Total</th>
    </tr>
    
    <?php foreach($this->model->ListarFactuasM($Fini,$Ffin) as $r):
	
	 ?>
    
    <tr>
    
      <td><?php echo $r->PE_NDOC ?></td>
      <td><?php echo vfecha(substr($r->PE_FDOC,0,10)) ?></td>
      <td><?php echo $r->PE_CLIE ?></td>
      <td><?php if($r->PE_MONE=='0'){
		  echo 'SOLES';
	  }else{
		  echo 'DOLARES';
	  }?></td>
      <td><div align="right"><?php echo number_format($r->PE_TBRU,2) ?></div></td>
      <td><div align="right"><?php echo number_format($r->PE_TIGV,2) ?></div></td>
      <td><div align="right"><?php echo number_format($r->PE_TOTD,2) ?></div></td>
      
      
    </tr>
    <?php endforeach; ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>