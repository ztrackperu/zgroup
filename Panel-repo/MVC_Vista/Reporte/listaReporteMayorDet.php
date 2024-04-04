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
	if(isset($_GET['system']))
		$system = $_GET['system'];
	else
		$system = '';
	$AnoMesLibroMayor=ObtenerAnoMesLibroMayorM($system);
	///Generar nombre archivo
	if($AnoMesLibroMayor!=""){
		foreach($AnoMesLibroMayor as $itemm){					
				
			$mes=$itemm['mes'];//02
			/*if($mes=='13'){
				$mes='12';
			}*/
			$ano=$itemm['ano']; //2015	
			
		}
	}

?>



<h2>LISTADO DE LIBRO MAYOR DE <?php echo $mes ?> / <?php echo $ano ?> </h2>

<table width="400" border="1" bordercolor="#0066FF" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="9" align="center">Operacion</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td bgcolor="#000000">4</td>
    <td bgcolor="#66FFCC">4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td> 16</td>
    <td>17</td>
    <td> 18</td>
    <td>19</td>
    <td bgcolor="#FFFF66">20</td>
    <td>21</td>
  </tr>
  <tr>
    <td>ID</td>
    <td>Periodo</td>
    <td>CUO</td>
    <td>Id CUO</td>
    <td bgcolor="#000000">Codigo del Plan de Ctas</td>
    <td bgcolor="#66FFCC">Codigo de la Cta Contable</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Tipo de Moneda</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Tipo de Comprobante de Pago</td>
    <td>Serie del comprobante</td>
    <td>Numero del comprobante</td>
    <td>Fecha Contable</td>
    <td>Fecha vencimiento</td>
    <td>Fecha Operacion</td>
    <td>Glosa</td>
    <td>&nbsp;</td>
    <td>Debe</td>
    <td>Haber</td>
    <td bgcolor="#FFFF66">&nbsp;</td>
    <td>Estado</td>
  </tr>
  
  <?php 
  
  
  	$reporte=listaLibroMayorM($system);
	$i=1;$sumdebe=0;$sumhaber=0;
	if($reporte!=""){
		$contador=1;
		foreach($reporte as $liveitem){			
		  
		$periodo=$ano.$mes.'00';//columna uno		
		//$cuo=$liveitem['c_codasi'];
				
		//columna dos		
		$glosa=$liveitem['c_glosa'];//Glosa
		$cuox=$liveitem['c_numvou'];
		if($glosa=="SALDO MES ANTERIOR"){
			$cuo=$i;			
		}else{
			$cuo=$cuox;
			}
		
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
		
		//$cuatro='02';//			
		$cuatro=$liveitem['c_codcta'];
		
		//voumov.c_codmon as siete,voumov.c_coddoc as diez,voumov.c_serdoc as once,
		//voumov.c_numdoc as doce,voumae.d_fecvou as trece,voumov.d_vendoc as catorce
		$xsiete=$liveitem['c_codmon'];
		if($xsiete=='0'){ //soles
			$siete='PEN';
		}else if($xsiete=='1'){
			$siete='USD';
		}
		
		$xdiez=$liveitem['c_coddoc'];
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
				
		$oncez=$liveitem['c_serdoc'];
			if($oncez==""){
				$oncex='1';			
			}else{
				$oncex=$oncez;
			}			
			$letras = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
			"b","c","d","f","g","h","i","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z",
			"B","C","D","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","V","W","X","Y","Z",".","¥","Ű");
			$oncexx=str_replace($letras,'',trim($oncex));				
			$once=str_pad($oncexx, 4, '0', STR_PAD_LEFT);	
			
		$docex=$liveitem['c_numdoc'];
		$docexx=str_replace('-','',$docex);
			$docexxx=str_replace($letras,'',$docexx);			
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
			
		$trecex=$liveitem['d_fecvou'];
		$annotrecex=substr($trecex,0,4);
		$mestrecex=substr($trecex,5,2);
		$diatrecex=substr($trecex,8,2);
		$trece=$diatrecex.'/'.$mestrecex.'/'.$annotrecex;
		
		$catorce=$liveitem['d_vendoc'];
		/*$annocatorcex=substr($catorcex,0,4);
		$mescatorcex=substr($catorcex,5,2);
		$diacatorcex=substr($catorcex,8,2);
		$catorce=$diacatorcex.'/'.$mescatorcex.'/'.$annocatorcex;*/
				
		$quince=$liveitem['d_fecdoc'];//fecha comprobante texto	
		/*$annofecdoc=substr($quincex,0,4);
		$mesfecdoc=substr($quincex,5,2);
		$diafecdoc=substr($quincex,8,2);
		$quince=$diafecdoc.'/'.$mesfecdoc.'/'.$annofecdoc;	*/	
				
		$dieciseisx=rtrim(utf8_encode($liveitem['c_glosa']));//Glosa		
		if($dieciseisx==""){
			$dieciseis=$liveitem['c_coddoc'].$liveitem['c_serdoc'].$liveitem['c_numdoc'];
		}else{
			$dieciseis=str_replace('º','',$dieciseisx);	
		}
		
		$dieciochox=$liveitem['n_debnac']; //debe
		$dieciocho=number_format($dieciochox,2,'.','');
		$diecinuevex=$liveitem['n_habnac']; //haber
		$diecinueve=number_format($diecinuevex,2,'.','');
		
				
		$veintiuno='1'; 
		$sumdebe=$sumdebe+$dieciochox;
		$sumhaber=$sumhaber+$diecinuevex;
  
  ?>
  
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $periodo; ?></td>
    <td><?php echo $cuo; ?></td>
    <td><?php echo $idcuo; ?></td>
    <td bgcolor="#000000"></td>
    <td bgcolor="#66FFCC"><?php echo $cuatro; ?></td>
    <td>NULL</td>
    <td>NULL</td>
    <td><?php echo $siete; ?></td>
    <td>NULL</td>
    <td>NULL</td>
    <td><?php echo $diez; ?></td>
    <td><?php echo $once; ?></td>
    <td><?php echo $doce; ?></td>
    <td><?php echo $trece; ?></td>
    <td><?php echo $catorce; ?></td>
    <td><?php echo $quince; ?></td>
    <td><?php echo $dieciseis; ?></td>
    <td>NULL</td>
    <td><?php echo $dieciocho; ?></td>
    <td><?php echo $diecinueve; ?></td>
    <td bgcolor="#FFFF66">NULL</td>
    <td><?php echo $veintiuno; ?></td>
  </tr>
  
  
  <?php $i++;}
		
	}  ?>

</table>


<table width="400" border="0">
  <tr>
    <td>Suma debe</td>
    <td>Suma Haber</td>
  </tr>
  <tr>
    <td><?php echo $sumdebe ?></td>
    <td><?php echo $sumhaber ?></td>
  </tr>
</table>






</body>
</html>
