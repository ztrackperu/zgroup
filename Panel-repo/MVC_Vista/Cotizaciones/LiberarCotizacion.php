<?php 
foreach ($ImpresionCotizaciones as $item) 
{
	 	$cod=$item['c_codcli'];
		$cliente=$item['c_nomcli'];
		$asunto=$item['c_asunto'];
		$correo=$item['c_email'];
		$telefono=$item['c_telef'].' // '.$item['c_nextel'];
		$contacto=$item['c_contac'];
		$nrocoti=$item['c_numped'];
		$fecha=$item['d_fecped'];
		$descrip=$item['c_desgral'];
		$obs=$item['c_obsped'];
		/***/
		$precioventa=$item['n_totped'];
		$forma=$item['c_codpgf'];
		$precios=$item['c_precios'];
		$moneda=$item['c_codmon'];
		$validez=$item['c_validez'];
		$tiempo	=$item['c_tiempo'];	
		$c_codcont=$item['c_codcont'];	
		$c_fecini=$item['c_fecini'];	
		$c_fecfin=$item['c_fecfin'];	
		$c_obsdoc=$item['c_obsdoc'];	
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Detalle Cotizacion | Zgroup</title>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
 
<style type="text/css" media="print">
.nover {display:none;font-size:14px;font-family:sans-serif}
</style>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:334px;
	height:20px;
	z-index:1;
	left: 366px;
	top: 187px;
}
#apDiv2 {
	position:absolute;
	width:656px;
	height:19px;
	z-index:2;
	left: 188px;
	top: 218px;
}
</style>
</head>
<script type="text/javascript">
function valida_envia(){
	//valido el PAC_DNI

	if (document.formElem.obs.value.length<=10){
		alert("Motivo de Liberacion no cumple el requerimiento minimo");
		document.formElem.obs.focus();
		return 0;
	}
	document.formElem.submit();
}
</script>
<body class="control">

<ul class="pro15 nover">
<li><a href="#nogo" onClick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
</ul>

<div class="cuerpo1">
    <form id="formElem" name="formElem" method="post" action="../MVC_Controlador/cajaC.php?acc=abrircoti&udni=<?php echo $_GET['udni']; ?>" >
        <table width="990" height="355" border="0" align="center" cellpadding="0" cellspacing="0" class="tablaImprimir" style="font-size:14px">
            <tr>
	          <td width="597" height="112" colspan="8"><table class="tablaImprimir" width="1000" border="0">
              <tr>
                <td colspan="6"  style="color:#FFF"><img src="../images/logochiquito.jpg" width="186" height="55"></td>
                </tr>
              <tr>
                <td colspan="6" align="center" style="color:#000">LIBERACION DE COTIZACION</td>
                </tr>
              <tr>
                <td colspan="6"  style="color:#FFF"><hr></td>
                </tr>
              <tr>
                <td colspan="3" style="color:#FFF"><input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $nrocoti ?>"></td>
                <td colspan="3" align="right"  style="color:#000;font-size:14px"><?php echo $cliente; ?>&nbsp;</td>
                </tr>
              <tr>
                <td colspan="6" align="center" bgcolor="#0000CC"  style="color:#063"><span style="color:#FFF;font-size:14px"><span style="color:#FFF"><span style="color:#FFF;font-size:14px">COTIZACION NRO: <?php echo ' '.$nrocoti;  ?></span></span></span></td>
                </tr>
              <tr>
                <td width="47" style="font-size:14px">Contacto</td>
	                <td width="5" style="font-size:14px">:</td>
	                <td colspan="4" style="font-size:14px"><?php echo $contacto; ?>&nbsp;&nbsp;<span style="color:#063"></span></td>
                </tr>
	              <tr>
	                <td style="font-size:14px">Fecha</td>
	                <td style="font-size:14px">:</td>
	                <td colspan="4" style="font-size:14px"><?php echo  vfecha(substr($fecha,0,10)); ?></td>
                </tr>
	              <tr>
	                <td style="font-size:14px">Telefono</td>
	                <td style="font-size:14px">:</td>
	                <td width="292" style="font-size:14px"><?php echo $telefono; ?></td>
	                <td width="42" style="font-size:14px">Correo</td>
	                <td width="9" style="font-size:14px">:</td>
	                <td width="240" style="font-size:14px"><?php echo $correo ?></td>
                  </tr>
	              <tr>
	                <td colspan="6" align="center" bgcolor="#0000CC" style="color:#000"><span style="color:#063"><span style="color:#FFF;font-size:14px"><?php echo $asunto; ?></span></span></td>
                </tr>
	              <tr>
	                <td colspan="6" style="color:#000;font-size:14px">
					<?php echo (($_GET['gral']));
					
					?></td>
                </tr>
              </table></td>
          </tr>
	        <tr>
	          <td ><table  class="tablaImprimir" width="1000" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                    <td width="0%" height="18">&nbsp;</td>
                    <td colspan="11"><hr></td>
                  </tr>
              <tr>
                <td>&nbsp;</td>
                <td width="3%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Item</strong></td>
                <td width="1%" bgcolor="#CCCCCC" style="font-size:14px">&nbsp;</td>
                <td width="17%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Descripcion</strong></td>
                <td width="17%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Glosa</strong></td>
                <td width="20%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Serie de equipo</strong></td>
                <td width="15%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Fechas Alquiler</strong></td>
                <td width="7%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Precio</strong></td>
                <td width="8%" bgcolor="#CCCCCC" style="font-size:14px">&nbsp;</td>
                <td width="7%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Cantidad</strong></td>
                <td width="5%" colspan="2" bgcolor="#CCCCCC" style="font-size:14px"><strong>Importe</strong></td>
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
              <td style="font-size:11px"><?php echo $i; ?></td>
              <td></td>
              <td style="font-size:11px"><?php echo $itemD['c_desprd'] ?></td>
              <td style="font-size:11px"><?php echo $itemD['c_obsdoc']?></td>
              <td style="font-size:11px"><?php echo $serie=$itemD['c_codcont']?>
              <input name="<?php echo "codequipo".$i; ?>" type="text" id="<?php echo "codequipo".$i; ?>" value="<?php echo $serie=$itemD['c_codcont']?>" readonly="readonly"></td>
           <?php /*?>   <td style="font-size:14px"><?php echo  substr('DEL '.$itemD['c_fecini'],0,10).' AL '.(substr($itemD['c_fecfin'],0,10)) ?></td><?php */?>
           <td style="font-size:14px"><?php echo  vfecha(substr($itemD['c_fecini'],0,10)).' al '.(vfecha(substr($itemD['c_fecfin'],0,10))); ?></td>
              <td style="font-size:14px"><?php echo number_format($itemD['n_prevta'],2) ?></td>
              <td style="font-size:14px">&nbsp;</td>
               
              <td style="font-size:14px"><?php echo $itemD['n_canprd'] ?></td>
              <td style="font-size:14px"><?php echo $t=number_format($itemD['n_totimp'],2) ?></td>
              </tr>
              <?php 	
					$i++;
					}			
				}
			?>
            <tr>
              <td>&nbsp;</td>
              <td colspan="11"><hr></td>
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
              <td colspan="8" style="font-size:14px">Observaciones:</td>
            </tr>
            <tr>
              <td colspan="8"><table width="1000" border="0"  class="tablaImprimir">
                <tr>
                  <td colspan="3" style="font-size:14px">
                   <?php echo (($_GET['obs']));?>
                   
                  </td>
                </tr>
                <tr>
                  <td colspan="3"><hr /></td>
                </tr>
                <tr>
                  <td width="130" style="font-size:14px">Forma de Pago</td>
                  <td width="9" style="font-size:14px">:</td>
                  <td width="513" style="font-size:14px"><?php $ven = ListaPlazoC();?>
      <select name="plazo" id="plazo" lass="Combos texto" disabled=disabled>
        <?php foreach($ven as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$forma){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }	?>
        </select>    &nbsp;</td>
                </tr>
                <tr>
                  <td style="font-size:14px">Precios</td>
                  <td style="font-size:14px">:</td>
                  <td style="font-size:14px"><?php if($precios=='001'){ echo 'No incluye Igv'; }else{echo 'incluye Igv';} ?>&nbsp;</td>
                </tr>
                <tr>
                  <td style="font-size:14px">Tipo Moneda</td>
                  <td style="font-size:14px">:</td>
                  <td style="font-size:14px"><?php $venMO = ListaMonedaC();?>
      
          <select name="moneda" id="moneda" class="Combos texto" disabled=disabled>
          
           <option value="0" >.::SELECCIONE::.</option>
            <?php foreach($venMO as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$moneda){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
            </select>&nbsp;</td>
                </tr>
                <tr>
                  <td style="font-size:14px">Tiempo de Entrega</td>
                  <td style="font-size:14px">:</td>
                  <td style="font-size:14px"><?php echo $tiempo ?>&nbsp;</td>
                </tr>
                <tr>
                  <td style="font-size:14px">Validez de la Oferta</td>
                  <td style="font-size:14px">:</td>
                  <td style="font-size:14px"><?php echo $validez ?>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3">INDIQUE MOTIVO DE LIBERACION:
                    <label for="textfield"></label>
                  <input name="obs" type="text" id="obs" size="120" class="texto"></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td>Caracteres minimos 10 maximo 120</td>
                </tr>
                <tr>
                  <td colspan="3" align="center"><input type="button" name="LIBERAR COTIZACION" id="LIBERAR COTIZACION" value="LIBERAR COTIZACION" onClick="valida_envia()">
                  <a href="../MVC_Controlador/cajaC.php?acc=r01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod'];  ?>">CANCELAR</a></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td colspan="8"><p>
                <!--<input type="submit" name="button" id="button" value="DESBLOQUEAR" />-->
              </p></td>
            </tr>
            <tr>
                <td colspan="8"></td>
            </tr>
            <tr>
              <td colspan="8"></td>
            </tr>
            <tr>
              <td colspan="8"></td>
            </tr>
        </table>
</form>
   
</div>
</div>
</body>
</html>