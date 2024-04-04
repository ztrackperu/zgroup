<?php 
foreach ($ImpresionCotizaciones as $item) 
{
	 $cod=$item['c_codcli'];
	$cliente=$item['c_nomcli'];
	$asunto=$item['c_asunto'];
	$correo=$item['c_email'];
	$telefono=$item['c_telef'].'//'.$item['c_nextel'];
		$contacto=$item['c_contac'];
		$nrocoti=$item['c_numped'];
		$fecha=$item['c_fecped'];
		
		
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Detalle Cotizacion | Zgroup</title>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
 
<style type="text/css" media="print">
.nover {display:none}
.control .cuerpo1 #frmImpresion .tablaImprimir tr td table {
	color: #FFF;
}
.control .cuerpo1 #frmImpresion .tablaImprimir tr td table {
	color: #FFF;
}
</style>
</head>
<body class="control">
<div class="cuerpo1">
    <form id="frmImpresion" name="formElem" method="post" >
        <table width="584" height="355" border="0" align="left" cellpadding="0" cellspacing="0" class="tablaImprimir">
            <tr>
	          <td width="597" height="112" colspan="8"><table width="500" border="0">
              <tr>
                <td bgcolor="#0066FF" style="color:#FFF">Cliente</td>
                <td bgcolor="#0066FF" style="color:#FFF"><?php echo $cliente; ?>&nbsp;</td>
                <td bgcolor="#0066FF" style="color:#FFF">Nro Cotizacion</td>
                <td bgcolor="#0066FF" style="color:#FFF" width="144"><?php echo $nrocoti; ?></td>
                </tr>
              <tr>
	                <td width="51">Contacto</td>
	                <td colspan="3"><?php echo $contacto; ?>&nbsp;&nbsp;</td>
                  </tr>
	              <tr>
	                <td>Fecha</td>
	                <td colspan="3"><?php echo $fecha; ?></td>
                </tr>
	              <tr>
	                <td>Telefono</td>
	                <td width="197"><?php echo $telefono; ?></td>
	                <td width="90">Correo</td>
	                <td><?php echo $correo ?></td>
                  </tr>
	              <tr>
	                <td bgcolor="#0066FF" style="color:#FFF">Asunto</td>
	                <td colspan="3" bgcolor="#0066FF" style="color:#FFF"><?php echo $asunto; ?></td>
                </tr>
              </table></td>
          </tr>
	        <tr>
	          <td ><table width="502" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                    <td width="1%">&nbsp;</td>
                    <td colspan="8"><hr></td>
                  </tr>
          
                
              <tr>
                <td>&nbsp;</td>
                <td width="7%" bgcolor="#CCCCCC"><strong>Item</strong></td>
                <td width="16%" bgcolor="#CCCCCC"><strong>Codigo</strong></td>
                <td width="34%" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
                <td width="11%" bgcolor="#CCCCCC"><strong>Precio</strong></td>
                <td width="11%" bgcolor="#CCCCCC"><strong>Dscto</strong></td>
                <td width="10%" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
                <td width="10%" colspan="2" bgcolor="#CCCCCC"><strong>Importe</strong></td>
              </tr>
              <?php 
							if($ImpresionCotizaciones != NULL)
							{		
								$i = 1;
								foreach($ImpresionCotizaciones as $itemD)
								{
							?>
            <tr>
              <td>&nbsp;</td>
              <td><?php echo $i; ?></td>
              <td><?php echo $itemD['c_codprd'] ?></td>
              <td><?php echo substr($itemD['c_desprd'],0,15) ?></td>
              <td><?php echo $itemD['n_prevta'] ?></td>
              <td>&nbsp;</td>
               
              <td><?php echo $itemD['n_canprd'] ?></td>
              <td><?php echo $itemD['n_totimp'] ?></td>
              </tr>
              <?php 	
					$i++;
					}			
				}
			?>
            <tr>
              <td>&nbsp;</td>
              <td colspan="8"><hr></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2"><strong>Total</strong></td>
              <td colspan="2"><?php echo $st ?></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2"><strong>Dscto</strong></td>
              <td colspan="2"><?php echo $des ?></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2"><strong>Total a Pagar</strong></td>
              <td colspan="2"><?php echo $t ?></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="8"><?php 
/*! 
  @function num2letras () 
  @abstract Dado un n?mero lo devuelve escrito. 
  @param $num number - N?mero a convertir. 
  @param $fem bool - Forma femenina (true) o no (false). 
  @param $dec bool - Con decimales (true) o no (false). 
  @result string - Devuelve el n?mero escrito en letra. 

*/ 
function num2letras($num, $fem = false, $dec = true) { 
   $matuni[2]  = "dos"; 
   $matuni[3]  = "tres"; 
   $matuni[4]  = "cuatro"; 
   $matuni[5]  = "cinco"; 
   $matuni[6]  = "seis"; 
   $matuni[7]  = "siete"; 
   $matuni[8]  = "ocho"; 
   $matuni[9]  = "nueve"; 
   $matuni[10] = "diez"; 
   $matuni[11] = "once"; 
   $matuni[12] = "doce"; 
   $matuni[13] = "trece"; 
   $matuni[14] = "catorce"; 
   $matuni[15] = "quince"; 
   $matuni[16] = "dieciseis"; 
   $matuni[17] = "diecisiete"; 
   $matuni[18] = "dieciocho"; 
   $matuni[19] = "diecinueve"; 
   $matuni[20] = "veinte"; 
   $matunisub[2] = "dos"; 
   $matunisub[3] = "tres"; 
   $matunisub[4] = "cuatro"; 
   $matunisub[5] = "quin"; 
   $matunisub[6] = "seis"; 
   $matunisub[7] = "sete"; 
   $matunisub[8] = "ocho"; 
   $matunisub[9] = "nove"; 

   $matdec[2] = "veint"; 
   $matdec[3] = "treinta"; 
   $matdec[4] = "cuarenta"; 
   $matdec[5] = "cincuenta"; 
   $matdec[6] = "sesenta"; 
   $matdec[7] = "setenta"; 
   $matdec[8] = "ochenta"; 
   $matdec[9] = "noventa"; 
   $matsub[3]  = 'mill'; 
   $matsub[5]  = 'bill'; 
   $matsub[7]  = 'mill'; 
   $matsub[9]  = 'trill'; 
   $matsub[11] = 'mill'; 
   $matsub[13] = 'bill'; 
   $matsub[15] = 'mill'; 
   $matmil[4]  = 'millones'; 
   $matmil[6]  = 'billones'; 
   $matmil[7]  = 'de billones'; 
   $matmil[8]  = 'millones de billones'; 
   $matmil[10] = 'trillones'; 
   $matmil[11] = 'de trillones'; 
   $matmil[12] = 'millones de trillones'; 
   $matmil[13] = 'de trillones'; 
   $matmil[14] = 'billones de trillones'; 
   $matmil[15] = 'de billones de trillones'; 
   $matmil[16] = 'millones de billones de trillones'; 
   
   //Zi hack
   $float=explode('.',$num);
   $num=$float[0];

   $num = trim((string)@$num); 
   if ($num[0] == '-') { 
      $neg = 'menos '; 
      $num = substr($num, 1); 
   }else 
      $neg = ''; 
   while ($num[0] == '0') $num = substr($num, 1); 
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
   $zeros = true; 
   $punt = false; 
   $ent = ''; 
   $fra = ''; 
   for ($c = 0; $c < strlen($num); $c++) { 
      $n = $num[$c]; 
      if (! (strpos(".,'''", $n) === false)) { 
         if ($punt) break; 
         else{ 
            $punt = true; 
            continue; 
         } 

      }elseif (! (strpos('0123456789', $n) === false)) { 
         if ($punt) { 
            if ($n != '0') $zeros = false; 
            $fra .= $n; 
         }else 

            $ent .= $n; 
      }else 

         break; 

   } 
   $ent = '     ' . $ent; 
   if ($dec and $fra and ! $zeros) { 
      $fin = ' coma'; 
      for ($n = 0; $n < strlen($fra); $n++) { 
         if (($s = $fra[$n]) == '0') 
            $fin .= ' cero'; 
         elseif ($s == '1') 
            $fin .= $fem ? ' una' : ' un'; 
         else 
            $fin .= ' ' . $matuni[$s]; 
      } 
   }else 
      $fin = ''; 
   if ((int)$ent === 0) return 'Cero ' . $fin; 
   $tex = ''; 
   $sub = 0; 
   $mils = 0; 
   $neutro = false; 
   while ( ($num = substr($ent, -3)) != '   ') { 
      $ent = substr($ent, 0, -3); 
      if (++$sub < 3 and $fem) { 
         $matuni[1] = 'una'; 
         $subcent = 'as'; 
      }else{ 
         $matuni[1] = $neutro ? 'un' : 'uno'; 
         $subcent = 'os'; 
      } 
      $t = ''; 
      $n2 = substr($num, 1); 
      if ($n2 == '00') { 
      }elseif ($n2 < 21) 
         $t = ' ' . $matuni[(int)$n2]; 
      elseif ($n2 < 30) { 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      }else{ 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      } 
      $n = $num[0]; 
      if ($n == 1) { 
         $t = ' ciento' . $t; 
      }elseif ($n == 5){ 
         $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
      }elseif ($n != 0){ 
         $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
      } 
      if ($sub == 1) { 
      }elseif (! isset($matsub[$sub])) { 
         if ($num == 1) { 
            $t = ' mil'; 
         }elseif ($num > 1){ 
            $t .= ' mil'; 
         } 
      }elseif ($num == 1) { 
         $t .= ' ' . $matsub[$sub] . '?n'; 
      }elseif ($num > 1){ 
         $t .= ' ' . $matsub[$sub] . 'ones'; 
      }   
      if ($num == '000') $mils ++; 
      elseif ($mils != 0) { 
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
         $mils = 0; 
      } 
      $neutro = true; 
      $tex = $t . $tex; 
   } 
   $tex = $neg . substr($tex, 1) . $fin; 
   //Zi hack --> return ucfirst($tex);
   $end_num=ucfirst($tex).' Con '.$float[1].'/100 .Nuevos Soles';
   return $end_num; 
} 
?>Son: <?php echo num2letras($t);  ?></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="8"><hr></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              
            </tr>
                </table>
                     
	         </td>
          </tr>
	       
            <tr>
              <td colspan="8"></td>
            </tr>
            <tr>
              <td colspan="8"><p>Observaciones:</p></td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
        </table>
</form>
   
</div>
</div>
</body>
</html>