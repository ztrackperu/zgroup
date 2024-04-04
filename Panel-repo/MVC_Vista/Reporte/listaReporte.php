<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
</head>

<body>
<?php
if(isset($_GET['system']) && $_GET['system']!='' && $_GET['system'] != null)
  $system = $_GET['system'];
else
  $system = '';
?>
<h2>LISTADO DE VENTAS DEL <?php echo $fechainicio ?> AL <?php echo $fechafinal ?> </h2>

<table width="400" border="1" bordercolor="#0066FF" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="center">Datos Comprobante</td>    
    <td>&nbsp;</td>
    <td colspan="3" align="center">Datos Cliente</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" align="center">Arroz Pilado</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" align="center">Docu que se modifica(factura)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td bgcolor="#66FFCC">4</td>
    <td bgcolor="#66FFCC">5</td>
    <td bgcolor="#66FFCC">6</td>
    <td bgcolor="#66FFCC">7 </td>
    <td bgcolor="#66FFCC">8</td>
    <td>9</td>
    <td bgcolor="#FFFF66">10</td>
    <td bgcolor="#FFFF66">11</td>
    <td bgcolor="#FFFF66">12</td>
    <td>13</td>
    <td bgcolor="#FF9999">14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td bgcolor="#FF9999">18</td>
    <td bgcolor="#66FF99">19</td>
    <td bgcolor="#66FF99">20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td bgcolor="#FFCCFF">28</td>
    <td bgcolor="#FFCCFF">29</td>
    <td bgcolor="#FFCCFF">31</td>
    <td bgcolor="#FFCCFF">31</td>
    <td>32</td>
    <td>33</td>
    <td>34</td>
    <td>35</td>
    
  </tr>
  <tr>
    <td>ID</td>
    <td>Periodo</td>
    <td>CUO</td>
    <td>Id CUO</td>
    <td bgcolor="#66FFCC">Fecha Emision</td>
    <td bgcolor="#66FFCC">Fecha Vencimiento</td>
    <td bgcolor="#66FFCC">Tipo</td>
    <td bgcolor="#66FFCC">Serie</td>
    <td bgcolor="#66FFCC">Numero</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFF66">Tipo Doc</td>
    <td bgcolor="#FFFF66">Numero</td>
    <td bgcolor="#FFFF66">Razon Social</td>
    <td>Valor Facturado de la Exportacion</td>
    <td bgcolor="#FF9999">Base Imponible Op. Grabada</td>
    <td><!--Importe Op. Exonerada-->Descuento de la Base Imponible</td>
    <td><!--Importe Op. Inafecta-->IGV</td>
    <td><!--Impuesto selectivo-->Descuento IGV</td>
    <td bgcolor="#FF9999"><!--IGV-->Importe Op. Exonerada</td>
    <td bgcolor="#66FF99"><!--Base imponible-->Importe Op. Inafecta</td>
    <td bgcolor="#66FF99">Impuesto selectivo al consumo</td>
    <td>Base Imponible Venta Arroz</td>
    <td>IGV Venta Arroz</td>
    <td>ICBP</td>
    <td>Otros Conceptos</td>
    <td>Importe total del Comprobante</td>
    <td>Tipo de Moneda</td>
    <td>Tipo de cambio</td>
    <td bgcolor="#FFCCFF">Fecha emision</td>
    <td bgcolor="#FFCCFF">Tipo</td>
    <td bgcolor="#FFCCFF">Serie</td>
    <td bgcolor="#FFCCFF">Numero de comprob. o DUA</td>
    <td>Identificacion de contrato o Proyecto</td>
    <td>Inconsistencia en el Tipo de Cambio</td>
    <td>Indicador de comprob. de pago cancelado con medios de pago</td>
    <td>Estado de anotacion</td>
  </tr>
  
  <?php 
  
  	$reporte=$listaVentas;
	$i=1;
	if($reporte!=""){
		$contador=1;
		$contador2=1;
		$sumbaseimp=0;$sumigv=0;$sumimptotal=0;
		
		foreach($listaVentas as $liveitem){			
		 
		$periodo=$anno.$mes.'00';//columna uno	
			
		//////columna dos
		//$cuo=$liveitem['c_codasi'];
		$obtenercuo=obtenercuoM($liveitem['ocho'],$liveitem['siete'], $system);//NUMERO DE FACTURA y serie
		if($obtenercuo!=""){
			foreach($obtenercuo as $itemcuo){
			$cuo=$itemcuo['c_numvou'];	
			}
		}else{ //if($cuo=="")
			$c3i=str_pad($contador2, 7, '0', STR_PAD_LEFT);
			$cuo='014'.$c3i; //COLUMNA TRES	 M0000003	
			$contador2++;
		}		
		
		//columna tres
		$c3=str_pad($contador, 7, '0', STR_PAD_LEFT);
		$idcuo='M'.$c3; //COLUMNA TRES	 M0000003	
		$contador++;
		
		$cuatrox=$liveitem['cuatro'];//fecha de emision comprobante 2014-01-31 00:00:00
		$annoemi=substr($cuatrox,0,4);
		$mesemi=substr($cuatrox,5,2);		
		$diaemi=substr($cuatrox,8,2);
		$cuatro=$diaemi.'/'.$mesemi.'/'.$annoemi;
		
		$cincox=$liveitem['cinco'];//fecha de vencim comprobante 2014-01-31 00:00:00		
		$annoven=substr($cincox,0,4);
		$mesven=substr($cincox,5,2);
		$diaven=substr($cincox,8,2);
		$cinco=$diaven.'/'.$mesven.'/'.$annoven;
		
		$xseis=$liveitem['seis'];
		if($xseis=='F'){ //F=factura
			$seis='01';
		}elseif($xseis=='B'){ //B=boleta
			$seis='03';			
		}elseif($xseis=='A'){ //A=nota de credito
			$seis='07';						
		}elseif($xseis=='C'){ //C=nota de debito
			$seis='08';			
		}
		
		$xsiete=$liveitem['siete'];//serie
		$siete=str_pad($xsiete, 4, '0', STR_PAD_LEFT);
		
		$ocho=$liveitem['ocho'];
		$nueve='';
		$xdiez=$liveitem['diez'];
		
		//$diez=substr($xdiez,1,1);
		if($xdiez=='01'){ //01=DNI
			$diez='1';
		}elseif($xdiez=='04'){ //=CARNET DE EXTRANJERIA
			$diez='4';
		}elseif($xdiez=='06'){ //06=RUC
			$diez='6';
		}elseif($xdiez=='07'){ //=PASAPORTE
			$diez='7';
		}else{//=OTROS
			$diez='0';
		}
		
		$once=$liveitem['once'];
		///RAZON SOCIAL
		if($liveitem['treintaycuatro']=='4'){ //estado=anulado
			$doce='ANULADO';			
		}else{
			$doce=$liveitem['doce'];
			}		
		
		$trece='';		
		
		if($liveitem['treintaycuatro']=='4'){ //estado=anulado
			$catorce='0.00';
			$quince='0.00';
			$dieciseis='0.00';
			$diecinueve='0.00';			
			$veinticuatro='0.00';			
		}else{
			$xcatorce=$liveitem['catorce'];
			$catorce=number_format($xcatorce,2,'.','');//2 decimales,separacion decimales,separacion de miles	
			
			$xquince=$liveitem['quince'];
			$quince=number_format($xquince,2,'.','');//2 decimales,separacion decimales,separacion de miles		
			
			$xdieciseis=$liveitem['dieciseis'];
			$dieciseis=number_format($xdieciseis,2,'.','');//importe total de la operacion inafecta		
			
			$xdiecinueve=$liveitem['diecinueve'];	
			$diecinueve=number_format($xdiecinueve,2,'.','');
				
			$xveinticuatro=$liveitem['veinticuatro'];
			$veinticuatro=number_format($xveinticuatro,2,'.','');	
		}
		
		/*if($dieciseis!='0.00'){
			$catorce='0.00';
			$diez='4';
		}else{
			$catorce=$catorce;
			$diez=$diez;
			}*/			
		
		$diecisiete='';				
		$dieciocho='';
		$veinte='';		
		$veintiuno='';
		$vientidos='';		
		
		$xveinticinco=$liveitem['PE_MONE'];
		if($xveinticinco=='0'){
			$veinticinco='PEN';	
		}else if($xveinticinco=='1'){
			$veinticinco='USD';	
		}
		$xveintiseis=$liveitem['veintiseis'];
		$veintiseis=number_format($xveintiseis,3,'.','');
		
		$factura=$liveitem['factura'];		
		$listafactura=listafacturaM($factura);//27 a la 30
		  if($listafactura!=""){			  
			foreach($listafactura as $itemfactura ){   
				$veintisietex=$itemfactura['veintisiete']; //2014-10-30 00:00:00
				$annofac=substr($veintisietex,0,4);
				$mesfac=substr($veintisietex,5,2);
				$diafac=substr($veintisietex,8,2);
				$veintisiete=$diafac.'/'.$mesfac.'/'.$annofac;
				
				$xveintiocho=$itemfactura['veintiocho'];
				if($xveintiocho=='F'){ //F=factura
					$veintiocho='01';
				}elseif($xveintiocho=='B'){ //B=boleta
					$veintiocho='03';			
				}elseif($xveintiocho=='A'){ //A=nota de credito
					$veintiocho='07';						
				}elseif($xveintiocho=='C'){ //C=nota de debito
					$veintiocho='08';			
				}
				
				$xveintinueve=$itemfactura['veintinueve'];
				$veintinueve=str_pad($xveintinueve, 4, '0', STR_PAD_LEFT);
				$treinta=$itemfactura['treinta'];				
			}
		  }			 
			/*$veintisiete='';
			$veintiocho='';
			$veintinueve='';
			$treinta='';
		 }*/
		$treintayuno='';
		$treintaydos='';
		$treintaytres=''; 
		$xtreintaycuatro=$liveitem['treintaycuatro'];
			if($xtreintaycuatro=='2' || $xtreintaycuatro=='3' ){ //
				$treintaycuatro='1';
			}
			elseif($xtreintaycuatro=='4'){ //anulado
				$treintaycuatro='2';
			}			
  ?>  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $periodo; ?></td>
    <td><?php echo $cuo; ?></td>
    <td><?php echo $idcuo; ?></td>
    <td bgcolor="#66FFCC"><?php echo $cuatro; ?></td>
    <td bgcolor="#66FFCC"><?php echo $cinco; ?></td>
    <td bgcolor="#66FFCC"><?php echo $seis; ?></td>
    <td bgcolor="#66FFCC"><?php echo $siete; ?></td>
    <td bgcolor="#66FFCC"><?php echo $ocho; ?></td>
    <td><?php echo $nueve; ?></td>
    <td bgcolor="#FFFF66"><?php echo $diez; ?></td>
    <td bgcolor="#FFFF66"><?php echo $once; ?></td>
    <td bgcolor="#FFFF66"><?php echo $doce; ?></td>
    <td><?php echo $trece; ?></td>
    <td bgcolor="#FF9999"><?php echo $catorce; ?></td>
    <td><?php echo $quince; ?></td>
    <td><?php echo $dieciseis; ?></td>
    <td><?php echo $diecisiete; ?></td>
    <td bgcolor="#FF9999"><?php echo $dieciocho; ?></td>
    <td bgcolor="#66FF99"><?php echo $diecinueve; ?></td>
    <td bgcolor="#66FF99"><?php echo $veinte; ?></td>
    <td><?php echo $veintiuno; ?></td>
    <td><?php echo $vientidos; ?></td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td><?php echo $veinticuatro; ?></td>
    <td><?php echo $veinticinco; ?></td>
    <td><?php echo $veintiseis; ?></td>
    <td bgcolor="#FFCCFF"><?php echo $veintisiete; ?></td>
    <td bgcolor="#FFCCFF"><?php echo $veintiocho; ?></td>
    <td bgcolor="#FFCCFF"><?php echo $veintinueve; ?></td>
    <td bgcolor="#FFCCFF"><?php echo $treinta; ?></td>
    <td><?php echo $treintayuno; ?></td>
    <td><?php echo $treintaydos; ?></td>
    <td><?php echo $treintaytres; ?></td>
    <td><?php echo $treintaycuatro; ?></td>
  </tr>
  
  
  <?php $i++;
  			$sumbaseimp=$sumbaseimp+$catorce; 
			$sumigv=$sumigv+$dieciseis;
			$sumimptotal=$sumimptotal+$veinticuatro;
		}
		
	}  ?>

</table>

<table width="400" border="0">
  <tr>
    <td>Total Base imponible</td>
    <td><?php echo $sumbaseimp ?></td>
  </tr>
  <tr>
    <td>Total IGV</td>
    <td><?php echo $sumigv ?></td>
  </tr>
  <tr>
    <td>Importe Total</td>
    <td><?php echo $sumimptotal ?></td>
  </tr>
</table>
</body>
</html>
