<?php 
if($cabecera != NULL)
{
foreach ($cabecera as $item) 
{
	$serie=$item['c_serdoc'];
$nomtra=$item['c_nomtra'];
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

}
	}
	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<!--<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<!--<link rel="stylesheet" type="text/css" href="../css/imprimir.css">-->
 
<style type="text/css" media="print">
.nover {display:none}
</style>
</head>
<body class="control">
<li><a href="#nogo" onclick="window.print();"><b>Imprimir</b></a></li>
<!--<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="cajaC.php?acc=Rep1&amp;ter=<?php echo $ter ?>&amp;tur=<?php echo $tur?>&amp;udni=<?php echo $cajero ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>

</ul>-->

<div class="cuerpo1">
    
    <form id="frmImpresion" name="formElem" method="post" >
   
        <table width="1400" border="0" align="left" cellpadding="0" cellspacing="0" class="tablaImprimir" style="font-size:14px;font-family:sans-serif">
            <tr>
	          <td width="38208" colspan="8">
             
                <table width="1400" border="0" align="left" cellpadding="0" cellspacing="0" class="tablaImprimir" style="font-size:14px;font:sans-serif">
                  <tr style="font:sans-serif;font-size:14px">
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5" rowspan="2" align="center" valign="bottom"><?php echo $serie.'-'.$c_nume; ?></td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo vfecha(substr($d_fecgui,0,10)); ?></td>
                  <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3"><?php echo $c_parti; ?></td>
                    <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($c_llega); ?></td> 
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
                    <td height="18">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_nomdes; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="24%">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="25">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="2" valign="top"><?php echo $c_rucdes; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="1%">&nbsp;</td>
                    <td colspan="9">&nbsp;</td>
                  </tr>
          
                
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
              <td>&nbsp;</td>
              <td width="5%">&nbsp;</td>
              <td width="9%">&nbsp;</td>
              <td width="22%">&nbsp;</td>
              <td width="10%">&nbsp;</td>
              <td width="3%">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="15%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
              <td width="4%">&nbsp;</td>
            </tr>
               <?php 
							if($detalle != NULL)
							{	
							
						
								$i = 1;
								foreach($detalle as $itemD){
								//for($itemD = mysql_fetch_array($detalle))	{
							?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="7"><br></td>
              </tr>
          
            <tr>
              <td height="43">&nbsp;</td>
              <td><?php echo $a ?><?php echo $itemD['n_canprd'] ?></td>
              <td colspan="8"><?php echo $itemD['c_desprd'].'- //'.strtoupper($itemD['c_codprd']).' '.strtoupper($itemD['c_obsprd']) ?></td>
              </tr>
                  <?php 	
					$i++;
					}			
				}//}
			?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="9">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6"><?php echo $c_chofer; ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="4" align="center"><?php echo $nomtra; ?></td>
              <td>&nbsp;</td> 
              <td align="right">&nbsp;</td>
              <td align="right"><?php echo $c_ructra; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center" valign="top"><?php echo $c_licenci; ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="center" valign="top"><?php echo $c_marca; ?></td>
              <td align="right">&nbsp;</td>
              <td align="right" valign="top"><?php echo $c_placa; ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="18">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            </table>
                <p><br>
                </p>
                <p>&nbsp;</p>
     
                     
	         </td>
	          <td width="3">&nbsp;</td>
          </tr>
	       
            <tr>
              <td colspan="9"></td>
            </tr>
        </table>
</form>
   
</div>
</div>
</body>
</html>