<?php 
if($cabecera != NULL)
{
foreach ($cabecera as $item) 
{
$nomtra=$item['pr_razo'];
$c_nume=$item['c_nume'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=$item['c_llega'];
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];
$c_glosa=$item['c_glosa'];
$c_deprem=$item['c_deprem'];	
$c_provrem=$item['c_provrem'];	
$c_distrem=$item['c_distrem'];	
$c_depdes=$item['c_depdes'];	
$c_provdes	=$item['c_provdes'];
$c_distdes=$item['c_distdes'];
$c_rucrem=$item['c_rucrem'];	$c_desrem=$item['c_desrem'];
$c_confveh=$item['c_confveh'];	$c_certcir=$item['c_certcir'];
$c_empsub=$item['c_empsub'];
$c_rucempsub=$item['c_rucempsub'];
}
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 800px;
	height: 115px;
	z-index: 1;
	left: 45px;
	top: 655px;
}
</style>
</head>
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
<li><a href="#=<?php echo $udni ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
<p>

<body>

<table width="1150" border="0" style="font-size:10px;font-family:sans-serif">
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $d_fecgui; ?>&nbsp;</td>
  </tr>
  <tr>
    <td width="117">&nbsp;</td>
    <td width="160">&nbsp;</td>
    <td width="164">&nbsp;</td>
    <td width="168">&nbsp;</td>
    <td width="132">&nbsp;</td>
    <td width="188">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($c_parti); ?>&nbsp;</td>
    <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($c_llega); ?>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_deprem; ?></td>
    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_provrem; ?></td>
    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_distrem; ?></td>
    <td align="right"><?php echo $c_depdes ?></td>
    <td align="right"><?php echo $c_provdes ?></td>
    <td align="right"><?php echo $c_distdes ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><?php echo $c_desrem ?></td>
    <td colspan="3" align="center"><?php echo $c_nomdes; ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><?php echo $c_rucrem ?></td>
    <td colspan="3" align="center"><?php echo $c_rucdes; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
  </tr>
</table>

   
  
<table width="953" border="0" style="font-size:10px;font-family:sans-serif">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <?php 
							if($detalle != NULL)
							{	
							
						
								$i = 1;
								foreach($detalle as $itemD){
								//for($itemD = mysql_fetch_array($detalle))	{
							?>
  <tr>
    <td colspan="2"><?php echo strtoupper($itemD['c_desprd']) ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php }}?>
</table>

<div id="apDiv1"><table width="759" border="0" cellpadding="0" cellspacing="0" style="font-size:10px;font-family:sans-serif">
                  <tr>
                    <td width="77" height="23">&nbsp;</td>
                    <td colspan="3" valign="baseline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_marca.' '.$c_placa ?></td>
  </tr>
                  <tr>
                    <td height="25">&nbsp;</td>
                    <td width="292" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_confveh; ?>&nbsp;</td>
                    <td width="384" valign="middle"><?php echo $c_empsub ?>&nbsp;</td>
                    <td width="6" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_certcir; ?></td>
                    <td valign="middle"><?php echo $c_rucempsub ?>&nbsp;</td>
                    <td valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="3" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_licenci; ?></td>
                  </tr>
</table></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


</body>
</html>