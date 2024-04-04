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
	if(isset($_GET['system']) && $_GET['system'] != ''){
		$system = $_GET['system'];
	}else{
		$system = '';
	}
?>
<h2>LISTADO DE LIBRO DIARIO DEL <?php echo $mes ?>/<?php echo $ano ?> </h2>

<table width="400" border="1" bordercolor="#0066FF" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center" bgcolor="#000000">ANT</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="center" bgcolor="#000000">ANT</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="5" align="center">Comprobante de Pago</td>
    <td colspan="3" bgcolor="#66FFFF">Operacion</td>
    <td colspan="3" align="center" bgcolor="#000000">ANTERIORES</td>
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
    <td bgcolor="#000000">4</td>
    <td bgcolor="#FFFFFF">5 ahora4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td bgcolor="#000000">6</td>
    <td bgcolor="#000000">7 </td>
    <td bgcolor="#FFFFFF">8</td>
    <td bgcolor="#FFFFFF">9</td>
    <td bgcolor="#FFFFFF">10</td>
    <td bgcolor="#FFFFFF">11</td>
    <td bgcolor="#FFFFFF">12</td>
    <td>13</td>
    <td>14</td>
    <td bgcolor="#66FFFF">15</td>
    <td bgcolor="#66FFFF">16</td>
    <td bgcolor="#66FFFF">17</td>
    <td bgcolor="#000000">10</td>
    <td bgcolor="#000000">11</td>
    <td bgcolor="#000000">12</td>
    <td>8 ahora18</td>
    <td>9 ahora19</td>
    <td>20</td>
    <td>13 ahora21</td>
  </tr>
  <tr>
    <td>ID</td>
    <td>Periodo</td>
    <td>CUO</td>
    <td>Id CUO</td>
    <td bgcolor="#000000">Codigo del Plan de Ctas</td>
    <td bgcolor="#FFFFFF">Codigo de la Cta Contable</td>
    <td>Codigo de la unidad de opeacion</td>
    <td>Codigo del centro de costo</td>
    <td>Tipo de moneda de origen</td>
    <td bgcolor="#000000">Fecha</td>
    <td bgcolor="#000000">Glosa</td>
    <td bgcolor="#FFFFFF">tipo de documento de identidad del emisor</td>
    <td bgcolor="#FFFFFF">numero de documento de identidad del emisor</td>
    <td bgcolor="#FFFFFF">tipo de comprobante</td>
    <td bgcolor="#FFFFFF">Numero de Serie</td>
    <td bgcolor="#FFFFFF">Numero de documento de pago</td>
    <td>Fecha Contable</td>
    <td>Fecha de Vencimiento</td>
    <td bgcolor="#66FFFF">Fecha de la operacion</td>
    <td bgcolor="#66FFFF">Glosa de la operacion</td>
    <td bgcolor="#66FFFF">Glosa referencial</td>
    <td bgcolor="#000000">Correlativo Ventas</td>
    <td bgcolor="#000000">Correlativo Compras</td>
    <td bgcolor="#000000">Correlativo Consignaciones</td>
    <td>Debe</td>
    <td>Haber</td>
    <td>Codigo del libro</td>
    <td>Estado</td>
  </tr>
  
  <?php 
  
  	$reporte=$listaLibroDiario;
	$i=1;
	if($reporte!=""){
		$contador=01;
		$sumdebe=0;
		$sumhaber=0;
		
		foreach($reporte as $liveitem){	       
		  
		$periodo=$ano.$mes.'00';//columna uno
		/*$fecontablex=$liveitem['trece'];//fecha contable
		$annofecontable=substr($fecontablex,0,4);
		$mesfecontable=substr($fecontablex,5,2);
		//$diatrecex=substr($fecontablex,8,2);
		$periodo=$annofecontable.$mesfecontable.'00';//columna uno*/	
						
		///columna dos	
		//$cuo=$liveitem['c_codasi'];
		$cuo=$liveitem['c_numvou'];	
		
		///columna tres	M0000003	
		$c3=str_pad($contador, 7, '0', STR_PAD_LEFT);
		$asi=$liveitem['c_codasi'];
		if($asi=='001'){
			$idcuo='A'.$c3;
		}else if($asi=='004'){
			$idcuo='C'.$c3;	
		}else{
			$idcuo='M'.$c3;	
		}
		$contador++;
		
		$cuenta=$liveitem['c_codcta'];
		//$cuatro='02';
		$cuatro=$cuenta;
				
		$quincex=$liveitem['d_fecdoc'];//fecha comprobante 2014-01-31 00:00:00		
		$annofecdoc=substr($quincex,0,4);
		$mesfecdoc=substr($quincex,5,2);
		$diafecdoc=substr($quincex,8,2);
		$quince=$diafecdoc.'/'.$mesfecdoc.'/'.$annofecdoc;		
		
		$dieciseisx=utf8_encode($liveitem['c_glosa']);//Glosa	
		$dieciseis=str_replace('º','',$dieciseisx);	
		
		$dieciochox=$liveitem['n_debnac']; //debe
		$dieciocho=number_format($dieciochox,2,'.','');
		$diecinuevex=$liveitem['n_habnac']; //haber
		$diecinueve=number_format($diecinuevex,2,'.','');
		
		//DATOS DOCUMENTO 
		$xsiete=$liveitem['siete']; //tipo de moneda de origen
		if($xsiete=='0'){ //soles
			$siete='PEN';
		}else if($xsiete=='1'){
			$siete='USD';
		}
		$xdiez=$liveitem['diez']; 
			if($xdiez=='F'){ //F=factura
				$diez='01';	
			}elseif($xdiez=='B'){ //B=boleta
				$diez='03';			
			}elseif($xdiez=='A'){ //A=nota de credito
				$diez='07';						
			}elseif($xdiez=='C'){ //C=nota de debito
				$diez='08';				
			}elseif($xdiez=='P'){ //RECIDO DE ENERGIA ELECTRICA,LUZ,AGUA
				$diez='14';			
			}elseif($xdiez=='W'){ //OTROS
				$diez='00';			
			}elseif($xdiez=='D'){ //LIQUIDACION DE COBRANZA 54
				$diez='00';			
			}elseif($xdiez=='H'){ //RECIBO POR HONORARIOS
				$diez='02';				
			}elseif($xdiez=='G'){ //C=GUIA DE REMISION
				$diez='09';			
			}elseif($xdiez=='Q'){ //CHEQUE
				$diez='00';		
			}elseif($xdiez=='X'){ //LIQUIDACION DE GASTOS
				$diez='04';		
			}else{ //C=nota de debito
				$diez='00';	//OTROS		
			}			
		//$once=$liveitem['once']; 
		$oncez=trim($liveitem['once']); //SERIE		
		 	if($oncez==""){
				$oncex='1';			
			}else{
				$oncex=$oncez;
			}
		
		$letras = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
			"b","c","d","f","g","h","i","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z",
			"B","C","D","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z",".","¥","Ű","/","-",".");
			$oncexx=str_replace($letras,'',trim($oncex));				
			$once=str_pad($oncexx, 4, '0', STR_PAD_LEFT);					
		
		 $docex=trim($liveitem['doce']);//trim($liveitem['doce']); //NUMERO		 	
				//$doce='0000022';
			//$docexx=str_replace('-','',$docex);
			$docexxx=str_replace($letras,'',$docex);			
			//$c9ad=(string)(int)$c9z;
				if(strlen($docexxx)>7)	{
				$docez=substr($docexxx,0,7);	
				}else{					
				//$c9a=str_pad($c9z, 7, '0', STR_PAD_LEFT);
				$docez=$docexxx;
				}
				
			if(trim($docez)==""){//validar si es vacio
				$doce='0000001';
			}elseif($docez=='000000' && $diez=='01'){//validar si numero=000000 y es factura
				$doce='0000001';	
			}else{
				$doce=$docez;
			}
			
		$trecex=$liveitem['trece'];
		$annotrecex=substr($trecex,0,4);
		$mestrecex=substr($trecex,5,2);
		$diatrecex=substr($trecex,8,2);
		$trece=$diatrecex.'/'.$mestrecex.'/'.$annotrecex;		
		$catorcex=$liveitem['catorce']; 
		$annocatorcex=substr($catorcex,0,4);
		$mescatorcex=substr($catorcex,5,2);
		$diacatorcex=substr($catorcex,8,2);
		$catorce=$diacatorcex.'/'.$mescatorcex.'/'.$annocatorcex;
		
		//$vieintiuno='';///////estado validar con fecha contable		
		/*if($mestrecex==$mes && $annotrecex==$ano){
			$vieintiuno='1';	
		}else if($mestrecex<$mes || $annotrecex<$ano){
			$vieintiuno='8';		
		}else{
			$vieintiuno='';
			}*/
		$vieintiuno='1';
		
		$sumdebe=$sumdebe+$dieciochox;
		$sumhaber=$sumhaber+$diecinuevex;			
  
  ?>
  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $periodo; ?></td>
    <td><?php echo $cuo; ?></td>
    <td><?php echo $idcuo; ?></td>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#FFFFFF"><?php echo $cuatro; ?></td>
    <td>NULL</td>
    <td>&nbsp;</td>
    <td><?php echo $siete; ?></td>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#FFFFFF">NULL</td>
    <td bgcolor="#FFFFFF">NULL</td>
    <td bgcolor="#FFFFFF"><?php echo $diez; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $once; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $doce; ?></td>
    <td><?php echo $trece; ?></td>
    <td><?php echo $catorce; ?></td>
    <td><?php echo $quince; ?></td>
    <td><?php echo $dieciseis; ?></td>
    <td>NULL</td>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">&nbsp;</td>
    <td><?php echo $dieciocho; ?></td>
    <td><?php echo $diecinueve; ?></td>
    <td>NULL</td>
    <td><?php echo $vieintiuno; ?></td>
  </tr>
  
  
  <?php $i++;}
		
	}  ?>

</table>

<table width="400" border="0">
  <tr>
    <td>Debe <?php echo $sumdebe ?> </td>
    <td>Haber <?php echo $sumhaber ?> </td>
  </tr>
</table>





</body>
</html>
