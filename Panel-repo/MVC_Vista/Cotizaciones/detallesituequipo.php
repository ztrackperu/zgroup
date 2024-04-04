<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>

<body bgcolor="#FFFFFF">

 <?php
        if($reportehistorialequipo != NULL  )
        {
 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="8">DETALLE FACTURACION DEL EQUIPO <?php echo $idequipo; ?><BR /></td>
            </tr>
            <tr align="center">
              <td width="33" bgcolor="#CCCCCC">Nro</td>
              <td width="94" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="102" bgcolor="#CCCCCC">Factura</td>
              <td width="140" bgcolor="#CCCCCC">Cliente</td>
              <td width="162" bgcolor="#CCCCCC">Descripcion</td>
              <td width="118" bgcolor="#CCCCCC">Fec_dcto</td>
              <td width="120" bgcolor="#CCCCCC">Condicion</td>
             
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
                    foreach($reportehistorialequipo as $item)
                    { 
					$c_tipped=$item['c_tipped'];
					if($c_tipped=='001'){
						$condicion='V';						
					}if($c_tipped=='017'){
						$condicion='A';
					}
            ?>
            <tr >
              <td align="center"><?php echo $i;?></td>
              <td align="center" bgcolor="#FFFFCC"><?php echo $item["pe_ncoti"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["PE_NDOC"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["PE_CLIE"];?></td>
              <td align="center" bgcolor="#FFCCFF"><?php echo $item["PE_DESC"];?></td>
              <td align="center"><?php  $fec=substr($item["PE_FDOC"],0,10);
			  echo vfecha($fec);?></td>
              <td align="center"><?php echo $condicion; ?></td>
              
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $i += 1;
                    }
            ?>
          </tbody>
        </table>
<?php }?>

<br />



 <?php
        if($reporteguiarem != NULL  )
        {
 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="8">DETALLE GUIA DEL EQUIPO <?php echo $idequipo; ?><BR /></td>
            </tr>
            <tr align="center">
              <td width="33" bgcolor="#CCCCCC">Nro</td>
              <td width="94" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="102" bgcolor="#CCCCCC">Guia</td>
              <td width="140" bgcolor="#CCCCCC">Cliente</td>
              <td width="162" bgcolor="#CCCCCC">Descripcion</td>
              <td width="118" bgcolor="#CCCCCC">Fec_dcto</td>
              <td width="120" bgcolor="#CCCCCC">Condicion</td>
             
            </tr>
          </thead>
          <tbody>
            <?php 
                    $j = 1;
                    foreach($reporteguiarem as $item)
                    { 
					
            ?>
            <tr >
              <td align="center"><?php echo $j;?></td>
              <td align="center" bgcolor="#FFFFCC"><?php echo $item["c_numped"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["c_serdoc"].$item["c_nume"] ;?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["c_nomdes"];?></td>
              <td align="center" bgcolor="#FFCCFF"><?php echo $item["c_desprd"];?></td>
              <td align="center"><?php  $fec=substr($item["d_fecgui"],0,10);
			  echo vfecha($fec);?></td>
              <td align="center"><?php echo $item["c_estaequipo"]; ?></td>
              
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $j += 1;
                    }
            ?>
          </tbody>
        </table>
<?php }?>

<br />



 <?php
        if($reporteeir != NULL  )
        {
 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="8">DETALLE EIR DEL EQUIPO <?php echo $idequipo; ?><BR /></td>
            </tr>
            <tr align="center">
              <td width="33" bgcolor="#CCCCCC">Nro</td>
              <td width="94" bgcolor="#CCCCCC">Nro Guia</td>
              <td width="102" bgcolor="#CCCCCC">Eir</td>
              <td width="140" bgcolor="#CCCCCC">Cliente</td>
              <td width="162" bgcolor="#CCCCCC">Descripcion</td>
              <td width="118" bgcolor="#CCCCCC">Fec_dcto</td>
              <td width="120" bgcolor="#CCCCCC">Condicion</td>
             
            </tr>
          </thead>
          <tbody>
            <?php 
                    $k = 1;
                    foreach($reporteeir as $itemeir)
                    { 
					$c_tipoio=$itemeir["c_tipoio"];
					if($c_tipoio=='1'){
						$tipo='ENTRADA';
					}else{
						$tipo='SALIDA';
						}
					
            ?>
            <tr >
              <td align="center"><?php echo $k;?></td>
              <td align="center" bgcolor="#FFFFCC"><?php echo $itemeir["c_numguia"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $itemeir["c_numeir"] ;?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $itemeir["c_nomcli"];?></td>
              <td align="center" bgcolor="#FFCCFF"><?php echo $itemeir["c_codprd"];?></td>
              <td align="center"><?php  $fec=substr($itemeir["c_fechora"],0,10);
			  echo vfecha($fec);?></td>
              <td align="center"><?php echo $tipo; ?></td>
              
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $k += 1;
                    }
            ?>
          </tbody>
        </table>
<?php }?>

</body>
</html>