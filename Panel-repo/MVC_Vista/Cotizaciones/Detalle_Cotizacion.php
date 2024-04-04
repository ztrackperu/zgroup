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
		$ucreado=$item['creador'];
		$fcrea=$item ['d_fecrea'];
		$uaprobo=$item['c_uaprob'];
		$fapro=$item['d_fecrea'];
		$c_numocref=$item['c_numocref'];
		/***/
		$c_estado=$item['c_estado'];
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
		$tipo=$item['c_tipped'];	
		$vigencia=$item['d_fecvig'];
}
if($impresionFactura!=NULL){
	 foreach($impresionFactura as $fac){
		 
		 $factura=$fac['PE_NDOC'];
		 
		 }
}
		 
		
	
	if($impresionguia!=NULL){
	foreach($impresionguia as $guia){
		 
		 $nroguia=$guia['c_numguia'];
		 
	
}
	}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Detalle Cotizacion | Zgroup</title>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
 <script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
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
<body class="control">

<ul class="pro15 nover">
<li><a href="#nogo" onClick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
</ul>

<div class="cuerpo1">
    <form id="frmImpresion" name="frmImpresion" method="post" action="../MVC_Controlador/cajaC.php?acc=updatefpcoti&udni=<?php echo $_GET['udni']; ?>" >
        <table width="990" height="355" border="0" align="center" cellpadding="0" cellspacing="0" class="tablaImprimir" style="font-size:14px">
            <tr>
	          <td width="597" height="112" colspan="8"><table class="tablaImprimir" width="1000" border="0">
              <tr>
   <td colspan="6"  style="color:#FFF"><img src="../images/logochiquito.jpg" width="186" height="55"></td>
              </tr>
              <tr>
              <td colspan="6" align="center" style="color:#000">&nbsp;</td>
              </tr>
              <tr>
              <td colspan="6"  style="color:#FFF"><hr></td>
              </tr>
              <tr>
                <td colspan="3" style="color:#FFF"><input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $nrocoti ?>"></td>
                <td colspan="3" align="right"  style="color:#000;font-size:14px"><?php echo $cliente; ?>&nbsp;</td>
                </tr>
              <tr>
                <td colspan="6" align="center" bgcolor="#0000CC"  style="color:#063"><span style="color:#FFF;font-size:14px"><span style="color:#FFF"><span style="color:#FFF;font-size:14px">COTIZACION NRO: <?php echo ' '.$nrocoti;  ?>
                  <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $nrocoti ?>">
                 | 	NRO GUIA:<?php echo $nroguia; ?></span></span></span></td>
                </tr>
              <tr>
                <td colspan="6" bgcolor="#0066FF" style="font-size:14px;color:#FFF">Facturas Relacionadas:<?php if($impresionFactura!=NULL){
	 foreach($impresionFactura as $fac){
		 
		echo $factura=$fac['PE_NDOC'].'|';
		 
		 }
}?>&nbsp;</td>
                </tr>
              <tr>
                <td width="47" style="font-size:14px">Contacto</td>
	                <td width="5" style="font-size:14px">:</td>
	                <td colspan="4" style="font-size:14px"><?php echo $contacto; ?>&nbsp;&nbsp;<span style="color:#063">  <?php echo 'clase: '.$tipo ?></span></td>
                </tr>
	              <tr>
	                <td style="font-size:14px">Fecha</td>
	                <td style="font-size:14px">:</td>
	                <td style="font-size:14px"><?php echo  vfecha(substr($fecha,0,10)); ?></td>
	                <td style="font-size:14px">Dcto Ref.</td>
	                <td style="font-size:14px">:</td>
	                <td style="font-size:14px"><?php echo $c_numocref ?>&nbsp;</td>
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
					<?php  (($_GET['gral']));
					
					?></td>
                </tr>
              </table></td>
          </tr>
	        <tr>
	          <td ><table  class="tablaImprimir" width="1000" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                    <td width="0%" height="18">&nbsp;</td>
                    <td colspan="15"><hr></td>
                  </tr>
              <tr>
                <td>&nbsp;</td>
                <td width="3%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Item</strong></td>
                <td width="0" align="center" bgcolor="#CCCCCC" style="font-size:14px">&nbsp;</td>
                <td width="14%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Descripcion</strong></td>
                <td width="14%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Glosa</strong></td>
                <td width="10%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Serie de equipo</strong></td>
                <td width="4%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>clase</strong></td>
                <td width="11%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Facturado</strong></td>
                <td width="11%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Dcto Guia</strong></td>
                <td width="12%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Fechas Alquiler</strong></td>
                <td width="8%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Precio</strong></td>
                <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>&nbsp;dscto</strong></td>
                <td width="1%" bgcolor="#CCCCCC" style="font-size:14px">&nbsp;</td>
                <td width="7%" bgcolor="#CCCCCC" style="font-size:14px"><strong>Cantidad&nbsp;&nbsp;</strong></td>
                <td width="10%" colspan="2" align="center" bgcolor="#CCCCCC" style="font-size:14px"><strong>Importe</strong></td>
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
              <td style="font-size:14px"><?php echo $i; ?></td>
              <td></td>
              <td style="font-size:14px"><?php  if($itemD['c_tipped']=='017'){echo $x='SERV. ALQUILER ';}else{echo $x='';}?><?php echo $itemD['c_desprd'] ?></td>
              <td style="font-size:14px"><?php echo $itemD['c_descr2']?></td>
              <td align="center" style="font-size:14px"><?php echo $itemD['c_codcont']?></td>
              <td align="center" style="font-size:14px">
              <?php /*?><input type="text" name="<?php echo 'clase'.$i?>" id="<?php echo 'clase'.$i?>" value="<?php echo $itemD['clase']?>" maxlength="3" size="5"><?php */?>
              
              
              <?php $ven = ListaTipoC();?>
        <select name="<?php echo 'clase'.$i?>" id="<?php echo 'clase'.$i?>"  <?php if($itemD['n_canfac']=='1'){  ?> disabled <?php }?> >
                   <option value="0">.::SELECCIONE::.</option>
          <?php foreach($ven as $item){?>
          
          <option   value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$itemD['clase']){?>selected<?php }?> ><?php echo $item["c_desitm"]?> </option>
          <?php //echo $tipocoti ?>
        
          <?php }?>
        </select>
              
              
              <input type="hidden" name="<?php echo 'id'.$i?>" id="<?php echo 'id'.$i?>" value="<?php echo $itemD['n_id'];?>">
</td>
              <td align="center" style="font-size:14px"><?php if($itemD['n_canfac']=='1'){echo 'Si';}else{echo 'No';} ?></td>
              <td style="font-size:14px">&nbsp;</td>
           <?php /*?>   <td style="font-size:14px"><?php echo  substr('DEL '.$itemD['c_fecini'],0,10).' AL '.(substr($itemD['c_fecfin'],0,10)) ?></td><?php */?>
           <td style="font-size:14px"><?php echo  vfecha(substr($itemD['c_fecini'],0,10)).' al '.(vfecha(substr($itemD['c_fecfin'],0,10))); ?></td>
              <td align="right" style="font-size:14px"><?php echo number_format($itemD['n_preprd'],2) ?></td>
              <td align="right" style="font-size:14px"><?php echo number_format($itemD['n_dscto'],2) ?></td>
              <td style="font-size:14px">&nbsp;</td>
               
              <td align="center" style="font-size:14px"><?php echo $itemD['n_canprd'] ?></td>
              <td align="right" style="font-size:14px"><?php echo $t=number_format($itemD['n_totimp'],2); $total+=$itemD['n_totimp']; ?></td>
              </tr>
              <?php 	
			 					$i++;
					}			
				}
			?>
            <tr>
              <td>&nbsp;</td>
              <td colspan="15"><hr></td>
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
              <td>&nbsp;</td>
              <td colspan="3" bgcolor="#00CC00" style="font-size:14px">Total</td>
              <td colspan="2" align="right" bgcolor="#00CC00" style="font-size:14px"><?php echo number_format($total,2); ?>&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="15"><hr></td>
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
                   <?php  (($_GET['obs']));?>
                   
                  </td>
                </tr>
                <tr>
                  <td colspan="3"><hr /></td>
                </tr>
                <tr>
                  <td width="130" style="font-size:14px">Forma de Pago</td>
                  <td width="9" style="font-size:14px">:</td>
                  <td width="513" style="font-size:14px"><?php $ven = ListaPlazoC();?><?php /*41753251*/?>
      <select name="plazo" id="plazo" class="Combos texto" >
        <?php foreach($ven as $item){?>
       <option value="<?php echo utf8_encode($item["c_numitm"])?>"<?php if(utf8_encode($item["c_numitm"])==$forma){?>selected<?php }?>><?php echo utf8_encode($item["c_desitm"])?></option>        <?php }?>
        </select>    &nbsp;
       
        <label for="vigencia"></label>
        <input name="vigencia" type="text" id="vigencia"  value="<?php echo vfecha(substr($vigencia,0,10)) ?>" size="12" readonly> <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "vigencia",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script>
        </td>
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
                  <td colspan="3">USUARIO QUE GENERO 
				  
				  <select name="select" id="select" disabled>
                  <?php $ven = Ver_Estadistica3C();?>
                  <?php foreach($ven as $item){
					//  $usuario=$_GET['udni'];
					  ?>
                           <option  value="<?php echo $item["udni"]?>"<?php if($item["udni"]==$ucreado){?>selected<?php }?>><?php echo $item["usuario"]?></option>
                           <?php }	?>
                  </select>
				  
				  
				  
				USUARIO QUE APROBO 
				
				 <select name="select2" id="select2" disabled>
                  
                  <?php foreach($ven as $item){
					 // $usuario=$_GET['udni'];
					  ?>
                           <option  value="<?php echo $item["udni"]?>"<?php if($item["udni"]==$uaprobo){?>selected<?php }?>><?php echo $item["usuario"]?></option>
                           <?php }	?>
                  </select>
				
				
				</td>
                </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td colspan="8" align="center"><p>
                <!--<input type="submit" name="button" id="button" value="DESBLOQUEAR" />-->
                <?php if( $_GET['udni']=='41753251' ||  $_GET['udni']=='43377015' ||  $_GET['udni']=='45359577'){?>
              <input type="submit" name="button2" id="button2" value="Actualizar">
              <?php  } ?></p></td>
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