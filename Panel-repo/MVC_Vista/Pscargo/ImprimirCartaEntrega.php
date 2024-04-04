<?php 
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
 $fec=$_POST['d_fecdcto'];
 
//$fecha= $dias[$fec('w')]." ".$fec('d')." de ".$meses[$fec('n')-1]. " del ".$fec('Y') ;
//Salida: Viernes 24 de Febrero del 2012

$fec = $_POST['d_fecdcto']; 
    setlocale(LC_TIME, "Spanish");
    $fecha= strftime('%A %d de %B del %Y', strtotime($fec)); 

 	 foreach($reporte as $item)
                    { 
					$cli=$item['Cliente'];
					$bl=$item['Fwd_NBL1'];
					$asu=$item['Referencia'];
					$asu2=$item['Viaje1'];
					$fw=$item['RO'];
					$ate=$item['Atencion'];
$bo=$item['Fwd_Bkng'];

					
					}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carta De Entrega</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
<style type="text/css">
body {
	margin-left: 0px;
}
</style>
</head>
<style type="text/css" media="print">
.nover {display:none}
</style>
<body class="control">
<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="Egresoc.php?acc=h1&udni=<?php echo $udni ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
<p>
<table width="882" border="0"  style="font-family: 'Arial Narrow', Arial, sans-serif;font-size:14px">
  <tr>
    <td width="15">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><?php echo utf8_encode(strtoupper($fecha)) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="382">SEÑORES</td>
    <td width="244">&nbsp;</td>
    <td width="223">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong><?php echo utf8_encode($cli);?></strong>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>PRESENT.-</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Att.</td>
    <td><strong><?php 
	
	if($ate==" "){echo $atencion=$_REQUEST['descripcion'];}else{echo $atencion=$ate;}
	
	//echo utf8_encode($atencion) 
	
	
	?></strong>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ref.</td>
    <td><?php echo $asu ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $asu2 ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $fw ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo'BL '.$bl ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo'BOOKING '.$bo ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>ESTIMADO(A):</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><p>POR  MEDIO DE LA PRESENTE NOS ES GRATO SALUDARLA Y A LA VEZ HACERLE LLEGAR LOS  DOCUMENTOS REFERENTE A SU EMBARQUE.</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
    <table width="804" border="0" >
      <tr>
   
        <td>&nbsp;</td>
       
      </tr>
         <?php 
                    $i = 1;
                   		 foreach($reporte as $item)
                    { 
						
					
						
					
            ?>
      <tr>
        <td><?php echo '-'.$item['Cantidad'].' '.$item['TipoDocu'].' '.$item['Docu'].' '.$item['Obse'];?></td>
      </tr>
       <?php }?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">ATENTAMENTE,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><p>PERÚ SHIPPING CARGO S.A.C.</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>