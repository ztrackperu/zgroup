<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');
ini_set('error_reporting',1);//para xamp
require('dbconex.php');
//define ('FPDF_FONTPATH', '. /');
// initiate FPDI

$pdf = new \setasign\Fpdi\Fpdi();
$pdf->SetTopMargin(30);
#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true,30);  
$pdf->AddFont('Flama-Basic','','Flama-Basic.php');
$pdf->AddFont('Flama-Bold','','Flama-Bold.php');
#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(5, 30 , 5);
// add a page
$pdf->AddPage();


// now write some text above the imported page
$pdf->SetFont('Flama-Basic','',10);
$pdf->SetTextColor(24,44,78);


$ncoti     = $_REQUEST['ncoti'];
$valSubt   = $_REQUEST['subt'];
$my_cad    = $_REQUEST['cad'];
$obsultimo = utf8_encode(base64_decode($my_cad));
$valReefer = $_REQUEST['reefer'];
$mostrar_cambio = isset($_REQUEST['showcambiomoneda'])?$_REQUEST['showcambiomoneda']:false;
$mostrar_cambio = $mostrar_cambio == 'true'?true:false;

//$pdf=new PDF('P','mm','A4'); 
//$dimensiones=array (80,120);
//$pdf=new PDF('P','mm',$dimensiones);
//$pdf->SetMargins(10,40); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$cabecera="SELECT  distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_tipocoti,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,cc_nruc,c.c_tipped,c_codven,
d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto as descuento_cab,n_neta,n_neti,c_codtit,n_facisc,
n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado,
tp_desc,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,c_numocref,n_swtfac,n_swtapr,
c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c.c_oper,c_precios,c_tiempo,
c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,
n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,n_intprd,
c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper 
FROM tab_pago AS p, pedidet AS d, pedicab AS c, climae AS m
WHERE  c_codpga=tp_codi 
AND m.cc_ruc=c.c_codcli 
AND c.c_numped=d.c_numped 
AND c.c_numped='$ncoti'";

$cab = odbc_exec($cid,$cabecera);
$fila = odbc_fetch_array($cab);
$c_numped=$fila['c_numped'];
$obsultimox=$fila['c_desgral'];
//$pdf->SetFont('Arial','',10);
$usuario=$fila['c_opcrea'];
$descuento=$fila['descuento_cab'];
$imagprd=$fila['c_codtit'];
$nomcli=$fila['c_nomcli'];
//$obsultimo = $cad=utf8_encode($fila['c_desgral']);
$asuntocot=$fila['c_asunto'];
$tipopedido=$fila['c_tipocoti'];
$cotipedido=$fila['c_tipped'];
$c_obsped=$fila['c_obsped'];


if($fila['c_codmon']=='0'){
    $moneda='SOLES';
    $moneda_cambio = "DOLARES";
    $simbolo_cambio = '$';
}else{
    $moneda='DOLARES AMERICANOS';	
    $moneda_cambio = "SOLES";
    $simbolo_cambio = 'S./';
}
$tipo_cambio = $fila['n_tcamb'];

/**
 * SECCION DE DATOS DE CABECERA DE COTIZACION
 */
$variable2 = explode ('-',substr($fila['d_fecped'],0,10)); //división de la fecha utilizando el separador -
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];
if($tipo_cambio == null || $tipo_cambio == 0){
    $fecha_buscar = $variable2[2].'/'.$variable2[1].'/'.$variable2[0];
    $cambio_sql = "SELECT * FROM tipocamb WHERE FORMAT(TC_FECHA,'dd/mm/YYYY')='$fecha_buscar'";
    $cambio_result = odbc_exec($cid, $cambio_sql);
    $cambio_fila = odbc_fetch_array($cambio_result);
    if($moneda_cambio == 'DOLARES'){
        $tipo_cambio = $cambio_fila['TC_VTA'];
    }else{
        $tipo_cambio = $cambio_fila['TC_CMP'];
    }
}
$pdf->SetFont('Flama-Bold','',21);
$pdf->SetTextColor(35,44,76);
$pdf->cell(17,7,utf8_decode("COTIZACIÓN N°:".$fila['c_numped']),0,0,'L');

$pdf->Ln(8); 
$pdf->SetFont('Flama-Basic','',9);
$pdf->SetTextColor(35,31,32);
$pdf->cell(18,7,'FECHA',0,0,'L');
$pdf->cell(190,7,'              :   '.$fecha2,0,0,'L');
$pdf->Ln(4);
$pdf->cell(18,7,'CLIENTE',0,0,'L');
$pdf->cell(190,7,'              :   '.($fila['c_nomcli']),0,0,'L');
$pdf->Ln(4); 
$pdf->cell(18,7,'RUC',0,0,'L');;
$pdf->cell(190,7,'              :   '.utf8_decode($fila['cc_nruc']),0,0,'L');
$pdf->Ln(4); 
$pdf->cell(18,7,'CONTACTO',0,0,'L');
$pdf->cell(190,7,'              :   '.$fila['c_contac'],0,0,'L');
$pdf->Ln(4);
$pdf->cell(18,7,'TELEFONO',0,0,'L');
$pdf->cell(190,7,'              :   '.$fila['c_telef'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(18,7,'CORREO',0,0,'L');
$pdf->cell(190,7,'              :   '.$fila['c_email'],0,0,'L');
//$pdf->Ln(5);
//$pdf->cell(18,7,'DCTO REF',0,0,'L');
//$pdf->cell(190,7,'              :   '.utf8_decode($fila['c_numocref']),0,0,'L');
$pdf->Ln(7); 

/**
 * SECCION DE ASUNTO DE COTIZACION
 */
//$pdf->Cell(185,5,'ASUNTO :'.$asuntocot,1,1,'C','true'); 
//$pdf->Ln(2); 
$pdf->SetFont('Flama-Bold','',12);
$pdf->SetDrawColor(35,44,76);
$pdf->SetTextColor(255,255,255);//25,40,76
$pdf->SetFillColor(35,44,76);
/**
 * SECCION DE DETALLE DE COTIZACION
 */
//$pdf->SetXY(5,76);
$pdf->MultiCell(199,6,$asuntocot,1,'C','C','true'); 
$pdf->Ln(2); 

//$pdf->SetXY(5,85);
if($descuento==0){
	if($mostrar_cambio){
    $pdf->SetWidths(array(8,111, 18, 18, 20, 24,22));
    $pdf->SetAligns(array('C','L','R','R','R','R','L'));
	
	}else{
		$pdf->SetWidths(array(8,129, 20, 18, 24,22));
		$pdf->SetAligns(array('C','L','R','R','R','L'));
	}
}else{
	if($mostrar_cambio){
    $pdf->SetWidths(array(8,75, 18,20,18, 16, 20, 24,22));
    $pdf->SetAligns(array('C','L','R','R','R','R','R','R','L'));
	
	}else{
    $pdf->SetWidths(array(8,93, 20,18,18, 18, 24,22));
    $pdf->SetAligns(array('C','L','R','R','R','R','R','L'));
	}
}       

$pdf->SetFont('Flama-Basic','',9);
$pdf->SetTextColor(35,44,76);
$pdf->SetDrawColor(35,44,76);//COLOR DE LINEA TABLA
$pdf->SetFillColor(220,229,244);//COLOR TEXTO
for($i=0;$i<1;$i++){
	if($descuento==0){
		if($mostrar_cambio){
		$pdf->cell(8,7,'N',1,0,'C','true');
        $pdf->cell(111,7,utf8_decode('DESCRIPCIÓN'),1,0,'C','true');
        $pdf->cell(18,7,'PRECIO UNT',1,0,'C','true');
       // $pdf->cell(18,7,'DSCTO',1,0,'C','true');
        //$pdf->cell(18,7,'TOTAL UNIT.',1,0,'C','true');
        $pdf->cell(18,7,'CANT',1,0,'C','true');
        $pdf->cell(20,7,'PRECIO FINAL',1,0,'C','true');
        $pdf->cell(24,7,'PRECIO EN '.$simbolo_cambio,1,0,'C','true');
        //$pdf->SetAligns(array('C','C','C','C','C','C','C','C','L'));		
       // $pdf->Row(array('N','DESCRIPCION','PRECIO UNT.','DSCTO', 'TOTAL UNIT.', 'CANT.', 'PRECIO FINAL', 'PRECIO EN '.$simbolo_cambio));
		//$pdf->SetFillColor(40,58,90);
		}else{		
			$pdf->cell(8,7,'N',1,0,'C','true');
			$pdf->cell(129,7,utf8_decode('DESCRIPCIÓN'),1,0,'C','true');
			$pdf->cell(20,7,'PRECIO UNT',1,0,'C','true');
		   // $pdf->cell(18,7,'DSCTO',1,0,'C','true');
			//$pdf->cell(20,7,'TOTAL UNIT.',1,0,'C','true');
			$pdf->cell(18,7,'CANT',1,0,'C','true');
			$pdf->cell(24,7,'PRECIO FINAL',1,0,'C','true');
			//$pdf->SetAligns(array('C','C','C','C','C','C','L'));		
		   // $pdf->Row(array('N','DESCRIPCION','PRECIO UNT','DSCTO', 'TOTAL UNIT.', 'CANT.', 'PRECIO FINAL'));
			//$pdf->SetFillColor(40,58,90);
		}
	}else{
		if($mostrar_cambio){
		$pdf->cell(8,7,'N',1,0,'C','true');
        $pdf->cell(75,7,utf8_decode('DESCRIPCIÓN'),1,0,'C','true');
        $pdf->cell(18,7,'PRECIO UNT',1,0,'C','true');
		$pdf->cell(20,7,'DSCTO',1,0,'C','true');
        $pdf->cell(18,7,'TOTAL UNIT.',1,0,'C','true');
        $pdf->cell(16,7,'CANT',1,0,'C','true');
        $pdf->cell(20,7,'PRECIO FINAL',1,0,'C','true');
        $pdf->cell(24,7,'PRECIO EN '.$simbolo_cambio,1,0,'C','true');
        //$pdf->SetAligns(array('C','C','C','C','C','C','C','C','L'));		
       // $pdf->Row(array('N','DESCRIPCION','PRECIO UNT.','DSCTO', 'TOTAL UNIT.', 'CANT.', 'PRECIO FINAL', 'PRECIO EN '.$simbolo_cambio));
		//$pdf->SetFillColor(40,58,90);
		}else{		
			$pdf->cell(8,7,'N',1,0,'C','true');
			$pdf->cell(93,7,utf8_decode('DESCRIPCIÓN'),1,0,'C','true');
			$pdf->cell(20,7,'PRECIO UNT',1,0,'C','true');
		    $pdf->cell(18,7,'DSCTO',1,0,'C','true');
			$pdf->cell(18,7,'TOTAL UNIT.',1,0,'C','true');
			$pdf->cell(18,7,'CANT',1,0,'C','true');
			$pdf->cell(24,7,'PRECIO FINAL',1,0,'C','true');
			//$pdf->SetAligns(array('C','C','C','C','C','C','L'));		
		   // $pdf->Row(array('N','DESCRIPCION','PRECIO UNT','DSCTO', 'TOTAL UNIT.', 'CANT.', 'PRECIO FINAL'));
			//$pdf->SetFillColor(40,58,90);
		}
		
	}

}
$pdf->Ln(7); 
$strConsulta = "SELECT  c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_swfirma,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,cod_tipo,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_codcont,c_fecini,c_fecfin,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_item,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper 
from pedidet as d,pedicab as c,invmae
where c_codprd=in_codi  
and c.c_numped=d.c_numped 
and c.c_numped='$ncoti' 
order by d.n_item asc";

	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);	
	$detsubtotal=0;
	$detdscto=0;
	$detdscto2=0;
	$dettotal=0;
	$dettotal2=0;
$i=1;
$detsubtotal2=0;	
while($resultado = odbc_fetch_array($historial)){
    $c_swfirma=$resultado['c_swfirma'];
    $zglos=$resultado['c_descr2'];
    $glos=strtr(strtoupper($zglos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ");
    $xglos = strtr(strtoupper($glos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");

    $c_obsdoc = $resultado['c_obsdoc']; 
   // $c_obsdoc = strtr(strtoupper($c_obsdoc),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ"); 
    //$c_obsdoc = strtr(strtoupper($c_obsdoc),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"); 

    if($resultado['c_tipped']=='017' && $resultado['c_codcont']!=NULL){
	    $gl='';
	    $des=$gl.' '.$resultado['c_desprd'].'-'.$zglos.' CODIGO: '.$cod=substr($resultado['c_codcont'],2,20).' PERIODO '.$resultado['c_fecini'].' / '.$resultado['c_fecfin'];
	}elseif($resultado['c_codcont']!=NULL){
	    $gl='';	
	    $des=$gl.' '.$resultado['c_desprd'].' '.$zglos.' CODIGO:'.$cod=substr($resultado['c_codcont'],2,20);
    }else if($resultado['c_desprd']=='OTROS PRODUCTOS'){
        $gl='';	
        $des=$zglos.' '.$resultado['c_desprd'].' ';	
    }else{
        $des=' '.$resultado['c_desprd'].' '.$zglos;	
    }
    /*if($resultado['c_desprd']=='OTROS PRODUCTOS'){
	$descripcion=$xglos.' '.$resultado['c_desprd'];
	}else if($resultado['c_desprd']!='OTROS PRODUCTOS'){
		$Descripcion=$des;
    }*/			
    $pre=number_format($resultado['n_preprd'],2);
    $cant=number_format($resultado['n_canprd'],2);
    $tot=number_format($resultado['n_totimp'],2);
    $dscto=number_format($resultado['n_dscto'],2); 
    /*$total+=$itemD->n_preprd*$itemD->n_canprd;
    $dscto+=$itemD->n_dscto;
    $totaln=$total-$dscto;*/
    $xtipo=$resultado['c_tipped'];
    $ztipo=$resultado['cod_tipo'];
    if($xtipo=='001'){
	    $tipo='/ VENTA';	
	    $Descripcion=$des;
	}elseif($xtipo=='017'){
		$tipo='/ ALQUILER';
    }else{
        $tipo="";
    }
    $glosa='';
    $det='';
    $totuni=number_format(($resultado['n_preprd'] - $resultado['n_dscto']),2);
    $total=number_format(($resultado['n_preprd'] - $resultado['n_dscto']) * $resultado['n_canprd'],2);
    if($moneda_cambio == "DOLARES"){//De soles a dolares
        $total_al_cambio = (($resultado['n_preprd'] - $resultado['n_dscto']) * $resultado['n_canprd']) / $tipo_cambio;
    }else{//De dolares a soles
        $total_al_cambio = (($resultado['n_preprd'] - $resultado['n_dscto']) * $resultado['n_canprd']) * $tipo_cambio;
    }
   
	
	//lcruzado
	 $total_al_cambio = number_format($total_al_cambio,1,'.','');
	$sep = explode(".",($total_al_cambio)); 
if(count($sep)>1){ 
    // Si existe un decimal lo tomamos 
    if($sep[1]>5){ 
        // Si el decimal es mayor que 5 pasamos al siguiente entero 
        $total_al_cambio = $sep[0] + 1; 
    } else if($sep[1]<6) { 
        // Si es menor que 5 
        $total_al_cambio = $sep[0]; 
    } 
}  
	//$total_al_cambio=$sep[0].'-'.$sep[1];
	 $total_al_cambio = number_format((round($total_al_cambio,1)), 2);//lcruzado
	
	
    $descripcionDet = $des;
    if(strpos($descripcionDet, $c_obsdoc) === false){
        $descripcionDet .= ' '. $c_obsdoc;
    }
	$n_item=$resultado['n_item'];
	$pdf->SetLineWidth(.2);
	$pdf->SetFont('Flama-Basic','',9);
	 $detsubtotal+=($resultado['n_preprd']*$resultado['n_canprd']);
    $detdscto+= $resultado['n_dscto'] * $resultado['n_canprd'];
	if($descuento==0){
		if($mostrar_cambio){
        $pdf->SetAligns(array('C','L','R','R','R','R'));
        $pdf->Row(array($n_item,ucfirst($descripcionDet), $pre, $cant, $total, $total_al_cambio));
		/* $pdf->MultiCell(90,5,$descripcionDet."\n",1, 'J', 0, 0, '' ,'', true);
		//$pdf->Cell(18,5,".....",'LR',0,'C');
	    //$pdf->Cell(20,5,"----",'LR',0,'R');
		$pdf->Cell(15,5,$pre,1,0,'C',1);
		$pdf->Cell(15,5,$dscto,1,0,'C',1);
		$pdf->Cell(15,5,$totuni,1,0,'C',1);	
		$pdf->Cell(15,5,$cant,1,0,'C',1);
		$pdf->Cell(15,5,$total,1,0,'C',1);
		$pdf->Cell(15,5,$total_al_cambio,1,0,'C',1);
		$pdf->Cell(20,5,$det,1,0,'L',1); */
	
		}else{
			$pdf->SetAligns(array('C','L','R','R','R'));
			$pdf->Row(array($n_item,ucfirst($descripcionDet), $pre, $cant, $total));
	/* 		$pdf->MultiCell(90,5,$descripcionDet."\n",1, 'J', 0, 0, '' ,'', true);
			//$pdf->Cell(18,5,".....",'LR',0,'C');
		   // $pdf->Cell(20,5,"----",'LR',0,'R');
			$pdf->Cell(15,5,$pre,1,0,'C',1);
			$pdf->Cell(15,5,$dscto,1,0,'C',1);
			$pdf->Cell(15,5,$totuni,1,0,'C',1);	
			$pdf->Cell(15,5,$cant,1,0,'C',1);
			$pdf->Cell(15,5,$total,1,0,'C',1);
			$pdf->Cell(20,5,$det,1,0,'L',1); */
		}
	}else{
		if($mostrar_cambio){
        $pdf->SetAligns(array('C','L','R','R','R','R','R'));
        $pdf->Row(array($n_item,ucfirst($descripcionDet), $pre,$dscto,$totuni,$cant, $total, $total_al_cambio));
		/* $pdf->MultiCell(90,5,$descripcionDet."\n",1, 'J', 0, 0, '' ,'', true);
		//$pdf->Cell(18,5,".....",'LR',0,'C');
	    //$pdf->Cell(20,5,"----",'LR',0,'R');
		$pdf->Cell(15,5,$pre,1,0,'C',1);
		$pdf->Cell(15,5,$dscto,1,0,'C',1);
		$pdf->Cell(15,5,$totuni,1,0,'C',1);	
		$pdf->Cell(15,5,$cant,1,0,'C',1);
		$pdf->Cell(15,5,$total,1,0,'C',1);
		$pdf->Cell(15,5,$total_al_cambio,1,0,'C',1);
		$pdf->Cell(20,5,$det,1,0,'L',1); */
	
		}else{
			$pdf->SetAligns(array('C','L','R','R','R','R','R'));
			$pdf->Row(array($n_item,ucfirst($descripcionDet), $pre,$dscto,$totuni,$cant, $total));
	/* 		$pdf->MultiCell(90,5,$descripcionDet."\n",1, 'J', 0, 0, '' ,'', true);
			//$pdf->Cell(18,5,".....",'LR',0,'C');
		   // $pdf->Cell(20,5,"----",'LR',0,'R');
			$pdf->Cell(15,5,$pre,1,0,'C',1);
			$pdf->Cell(15,5,$dscto,1,0,'C',1);
			$pdf->Cell(15,5,$totuni,1,0,'C',1);	
			$pdf->Cell(15,5,$cant,1,0,'C',1);
			$pdf->Cell(15,5,$total,1,0,'C',1);
			$pdf->Cell(20,5,$det,1,0,'L',1); */
		}
		
	}
    
    $i++;

   
    // $dettotal+=(($resultado['n_preprd'] - $resultado['n_dscto'])*$resultado['n_canprd']);
	 $detsubtotal2+=$total_al_cambio;
}
$dettotal = $detsubtotal - $detdscto;
$dettotal2 = $detsubtotal2 - $detdscto;
 $detsubtotal2;
 
/**
 * SECCION MONTOS TOTALES
 */
 function truncateFloat($number, $digitos)
{
	$raiz = 10;
	$multiplicador = pow ($raiz,$digitos);
	$resultado = ((int)($number * $multiplicador)) / $multiplicador;
	return number_format($resultado, $digitos);
}
if($fila['c_precios']=='001'){
    $mon='NO INCLUYE IGV';
}else{
    if($fila['c_precios']=='002'){
        $mon='INCLUYE IGV';
    }else{
        $mon='INAFECTO IGV';
    }    
}
if($mostrar_cambio){
        if($moneda_cambio == "DOLARES"){//De soles a dolares
            $detsubtotal_al_cambio = $detsubtotal / $tipo_cambio;
            $detdscto_al_cambio = $detdscto / $tipo_cambio;
            $dettotal_al_cambio = $dettotal / $tipo_cambio;
        }else{//De dolares a soles
            $detsubtotal_al_cambio = intval($detsubtotal * $tipo_cambio) ;//;$detsubtotal2
            $detdscto_al_cambio = $detdscto * $tipo_cambio;
            $dettotal_al_cambio = intval($dettotal * $tipo_cambio);//;$dettotal2
        }
}
if((int)$valSubt != 0){
		if($descuento==0){
			$pdf->SetFont('Flama-Basic','',9);
		$pdf->cell(33,4,'',0,0,'L');
		$pdf->cell(104,4,'',0,0,'L');
        $pdf->cell(38,4,'TOTAL SIN DSCTO',1,0,'R','true');
        $pdf->cell(24,4,number_format($detsubtotal,2),1,0,'R');
		$pdf->Ln(4);
		$pdf->SetFont('Flama-Basic','',9);
		$pdf->cell(33,4,'',0,0,'L');
		$pdf->cell(104,4,' ',0,0,'L');
        $pdf->cell(38,4,'DSCTO',1,0,'R','true');
        $pdf->cell(24,4,number_format($detdscto,2),1,0,'R');
		$pdf->Ln(4);
		$pdf->cell(33,4,'',0,0,'L');
		$pdf->cell(104,4,' ',0,0,'L');
        $pdf->cell(38,4,'TOTAL',1,0,'R','true');
        $pdf->cell(24,4,number_format($dettotal,2),1,0,'R');
		$pdf->Ln(4);
		$pdf->cell(33,4,'',0,0,'L');
		$pdf->cell(104,4,'',0,0,'L');
		if($mostrar_cambio){
		$pdf->cell(38,4,'TOTAL SIN DSCTO '.$simbolo_cambio,1,0,'R','true');
        $pdf->cell(24,4,number_format($detsubtotal_al_cambio,2),1,0,'R');
		}
        $pdf->cell(38,4,'',0,0,'R');
        $pdf->cell(24,4,'',0,0,'R');
		$pdf->Ln(4);
		if($mostrar_cambio){
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(104,4,' ',0,0,'L');
			$pdf->cell(38,4,'DSCTO '.$simbolo_cambio,1,0,'R','true');
			$pdf->cell(24,4,number_format($detdscto_al_cambio,2),1,0,'R');
			$pdf->Ln(4);
		}
		$pdf->cell(33,4,'',0,0,'L');
		$pdf->cell(104,4,'',0,0,'L');
		if($mostrar_cambio){
		$pdf->cell(38,4,'TOTAL '.$simbolo_cambio,1,0,'R','true');
        $pdf->cell(24,4,number_format($dettotal_al_cambio,2),1,0,'R');
		}
        $pdf->cell(38,4,'',0,0,'R');
        $pdf->cell(24,4,'',0,0,'R');
		$pdf->Ln(4);
		$pdf->cell(33,4,'',0,0,'L');
		$pdf->cell(104,4,'',0,0,'L');
        $pdf->cell(38,4,'',0,0,'R');
        $pdf->cell(24,4,'',0,0,'R');
		$pdf->Ln(1);
		}
		else{
			$pdf->SetFont('Flama-Basic','',9);
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(106,4,'',0,0,'L');
			$pdf->cell(36,4,'TOTAL SIN DSCTO',1,0,'R','true');
			$pdf->cell(24,4,number_format($detsubtotal,2),1,0,'R');
			$pdf->Ln(4);
			$pdf->SetFont('Flama-Basic','',9);
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(106,4,' ',0,0,'L');
			$pdf->cell(36,4,'DSCTO',1,0,'R','true');
			$pdf->cell(24,4,number_format($detdscto,2),1,0,'R');
			$pdf->Ln(4);
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(106,4,' ',0,0,'L');
			$pdf->cell(36,4,'TOTAL',1,0,'R','true');
			$pdf->cell(24,4,number_format($dettotal,2),1,0,'R');
			$pdf->Ln(4);
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(106,4,'',0,0,'L');
			if($mostrar_cambio){
			$pdf->cell(36,4,'TOTAL SIN DSCTO '.$simbolo_cambio,1,0,'R','true');
			$pdf->cell(24,4,number_format($detsubtotal_al_cambio,2),1,0,'R');
			}
			$pdf->cell(36,4,'',0,0,'R');
			$pdf->cell(24,4,'',0,0,'R');
			$pdf->Ln(4);
			if($mostrar_cambio){
				$pdf->cell(33,4,'',0,0,'L');
				$pdf->cell(106,4,' ',0,0,'L');
				$pdf->cell(36,4,'DSCTO '.$simbolo_cambio,1,0,'R','true');
				$pdf->cell(24,4,number_format($detdscto_al_cambio,2),1,0,'R');
				$pdf->Ln(4);
			}
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(106,4,'',0,0,'L');
			if($mostrar_cambio){
			$pdf->cell(36,4,'TOTAL '.$simbolo_cambio,1,0,'R','true');
			$pdf->cell(24,4,number_format($dettotal_al_cambio,2),1,0,'R');
			}
			$pdf->cell(36,4,'',0,0,'R');
			$pdf->cell(24,4,'',0,0,'R');
			$pdf->Ln(4);
			$pdf->cell(33,4,'',0,0,'L');
			$pdf->cell(106,4,'',0,0,'L');
			$pdf->cell(36,4,'',0,0,'R');
			$pdf->cell(24,4,'',0,0,'R');
			$pdf->Ln(1);
			
		}
		
}

$pdf->Ln();
/**** BENEFICIOS 
$pdf->SetFont('Flama-Bold','',12);
$pdf->SetDrawColor(40,58,90);
$pdf->SetTextColor(255,255,255);//25,40,76
$pdf->SetFillColor(40,58,90); 
$pdf->MultiCell(199,6,'BENEFICIOS ZGROUP',1,'C','C','true');
$pdf->SetFont('Flama-Basic','',9);
$pdf->SetTextColor(35,31,32);
$pdf->SetDrawColor(40,58,90);//COLOR DE LINEA TABLA
$pdf->SetFillColor(211,221,237);//COLOR TEXTO 
		$pdf->cell(99.5,3.5,' ',0,0,'L',true);
        $pdf->cell(99.5,3.5,utf8_decode('  '),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,'- Servicio Post-venta 24/7.',0,0,'L',true);
        $pdf->cell(99.5,3.5,utf8_decode('- Servicio de transporte y manipuleo a nivel nacional e internacional '),0,0,'L', true);
        $pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode('- Asesoria permanente y personalizada.'),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode(' puede ser solicitado y se le enviará al cliente una cotización del'),0,0,'L', true);
        $pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode('. Incluye  manipuleo  sobre unidad  de transporte dentro  del almacén '),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode(' servicio.'),0,0,'L', true);
        $pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode(' de ZGROUP (solo aplica para contenedor refrigerado).'),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode(' - ZGROUP  cuenta  con un  amplio  stock  de las siguientes marcas, '),0,0,'L', true);
		$pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode('- Incluye instalación  sobre chasis dentro del almacén de  ZGROUP '),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode(' a libre  elección del cliente:  ThermoKing, Carrier Transicold,'),0,0,'L', true);
		$pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode(' siempre y cuando la carreta se encuentre debidamente '),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode(' Starcool,  Daikin,  sujeto a  disponibilidad (solo aplica para maquina)'),0,0,'L', true);
		$pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode(' acondicionada para su instalación  conforme con las instrucciones  '),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode('  reefer. '),0,0,'L', true);
		$pdf->Ln(3.5);
        $pdf->cell(99.5,3.5,utf8_decode(' de ZGROUP, caso contrario incluye inducción a un miembro del '),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode('- Servicio de asistencia  técnica  disponible  las 24 horas del día y los '),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode(' personal del cliente y puesta en marcha.'),0,0,'L', true);
        $pdf->cell(99.5,3.5,utf8_decode(' 365 días del año a nivel nacional.'),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,' ',0,0,'L',true);
        $pdf->cell(99.5,3.5,utf8_decode('  '),0,0,'L', true);

$pdf->Ln(6);

/**
 * SECCION FORMA DE PAGO
 */
$pdf->SetFont('Flama-Basic','',9);
$pdf->SetTextColor(35,31,32);
$pdf->cell(33,7,'FORMA DE PAGO',0,0,'L');
$pdf->cell(60,7,'  :  '.$fila['tp_desc'],0,0,'L');
$pdf->cell(33,7,'TIEMPO DE ENTREGA',0,0,'L');
$pdf->cell(60,7,'  :  '.$fila['c_tiempo'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(33,7,'PRECIOS',0,0,'L');
$pdf->cell(60,7,'  :  '.$mon,0,0,'L');
$pdf->cell(33,7,'VALIDEZ DE OFERTA',0,0,'L');
$pdf->cell(60,7,'  :  '.$fila['c_validez'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(33,7,'TIPO DE MONEDA',0,0,'L');
$pdf->cell(60,7,'  :  '.$moneda,0,0,'L');
if($mostrar_cambio){
    $pdf->cell(33,7,'TIPO DE CAMBIO',0,0,'L');
    $pdf->cell(60,7,'  :  '.$tipo_cambio,0,0,'L');
	$pdf->Ln(4); 
}


if($tipopedido=='020'){
	$pdf->cell(33,7,'LUGAR DE ENTREGA',0,0,'L');
	$pdf->cell(45,7,'  :  PACKING ZGROUP TAMBOGRANDE - APAGRO',0,0,'L');
	
}elseif($tipopedido=='002' || $tipopedido=='001' || $tipopedido=='015' || $tipopedido=='019'){
    $pdf->cell(33,7,'LUGAR DE ENTREGA',0,0,'L');
    $html='  :  <P>ALMACEN ZGROUP </P>,';
}elseif($tipopedido=='017'){
    $pdf->cell(33,7,'LUGAR DE ENTREGA',0,0,'L');
	$pdf->cell(45,7,'  :  '.utf8_decode($fila['c_lugent']),0,0,'L');
}
if(isset($html))
    $pdf->WriteHTML($html);
$pdf->Ln();
$pdf->Ln();
/**** VENTAJAS ****/
$pdf->SetFont('Flama-Bold','',12);
$pdf->SetDrawColor(35,44,76);
$pdf->SetTextColor(255,255,255);//25,40,76
$pdf->SetFillColor(35,44,76); 
$pdf->MultiCell(199,6,'VENTAJAS ZGROUP',1,'C','C','true');
$pdf->SetFont('Flama-Basic','',9);
$pdf->SetTextColor(35,44,76);
$pdf->SetDrawColor(35,44,76);//COLOR DE LINEA TABLA
$pdf->SetFillColor(220,229,244);//COLOR TEXTO 
		$pdf->cell(199,3.5,' ',0,0,'L',true);
		$pdf->Ln(3.5);
		$pdf->SetFont('Flama-Bold','',9);
		$pdf->cell(199,3.5,utf8_decode('MÓVIL - RÁPIDO - ECONÓMICO'),0,0,'C',true);
		$pdf->Ln(3.5);
		$pdf->SetFont('Flama-Basic','',9);
		$pdf->cell(199,3.5,utf8_decode('Hace más de 20 años trabajamos en lo que nos apasiona,'),0,0,'C',true);
		$pdf->Ln(3.5);
		$pdf->cell(199,3.5,utf8_decode('transformándonos en lideres de la industria en la cadena de frío.'),0,0,'C',true);
		$pdf->Ln(3.5);
		$pdf->cell(199,3.5,utf8_decode('En ZGROUP queremos ayudarte a concretar tus proyectos, creamos productos y soluciones para cada necesidad,'),0,0,'C',true);
		$pdf->Ln(3.5);
		$pdf->cell(199,3.5,utf8_decode('tus proyectos son el punto de partida y la razón de ser de nuestra compañía.'),0,0,'C',true);
		$pdf->Ln(3.5);
		$pdf->cell(199,3.5,utf8_decode(''),0,0,'C',true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode('- Líder en la industria de la cadena de Frío.'),0,0,'L', true);
		$pdf->cell(99.5,3.5,utf8_decode('- Ventas a nivel nacional e internacional.'),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode('- Somos representante de THERMOKING en Perú.'),0,0,'L', true);
		$pdf->cell(99.5,3.5,utf8_decode('- Todas nuestras soluciones están disponibles en alquiler y venta.'),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode('- Soluciones integrales diseñadas para cada necesidad y presupuesto.'),0,0,'L', true);
		$pdf->cell(99.5,3.5,utf8_decode('- Servicio postventa 24/7.'),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode('- Somos expertos en manejo de contenedores refrigerados y el '),0,0,'L', true);
		$pdf->cell(99.5,3.5,utf8_decode('- Brindamos asesoría permanente y personalizada.'),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode('  cuidado estricto de la cadena de frío.'),0,0,'L', true);
		$pdf->cell(99.5,3.5,utf8_decode('- Todas nuestras soluciones son completamente móviles.'),0,0,'L', true);
		$pdf->Ln(3.5);
		$pdf->cell(99.5,3.5,utf8_decode('- Contamos con productos especializados en Postcosecha.'),0,0,'L', true);
		$pdf->cell(99.5,3.5,utf8_decode(''),0,0,'L', true);
		
$pdf->Ln(6); 

$pdf->SetFont('Flama-Bold','',12);
$pdf->SetDrawColor(35,44,76);
$pdf->SetTextColor(255,255,255);//25,40,76
$pdf->SetFillColor(35,44,76); 
$pdf->MultiCell(199,6,'OBSERVACIONES',1,'C','C','true');
$pdf->SetFont('Flama-Basic','',9);
$pdf->SetTextColor(35,31,32);
$pdf->SetFillColor(211,221,237);//COLOR TEXTO 
$c= str_replace("background-color","</p>", $obsultimo);
$c2= str_replace("background-color","</p>", $obsultimo);
$c3= str_replace("background-color","</p>", $obsultimo);
$resultado = str_replace('<br>', "</p>", $obsultimo);
$resultado2 = str_replace('<p>', "", $resultado);
$resultado3 = str_replace('</p>', "<br> ", $resultado2);
$resultado4 = str_replace('<br />', "", $resultado3);
$resultado5 = str_replace('                                                                                                                                                ', "", $resultado4);
//$pdf->cell(25,7,$resultado,0,0,'L');
$pdf->SetWidths(array(199));
$pdf->SetAligns(array('L'));
$pdf->Row(array(utf8_decode($resultado5)));

/**
 * SECCION CUENTAS BANCARIAS ZGROUP
 */
$pdf->Ln(8);

$pdf->SetFont('Flama-Bold','',12);
$pdf->SetDrawColor(35,44,76);
$pdf->SetTextColor(255,255,255);//25,40,76
$pdf->SetFillColor(35,44,76); 
$pdf->MultiCell(199,6,'  CUENTAS CORRIENTES ZGROUP',1,'C','C','true');
$pdf->Ln(3); 

$pdf->SetFont('Flama-Bold','',10);
$pdf->SetTextColor(35,31,32);
$pdf->SetDrawColor(35,44,76);//COLOR DE LINEA TABLA
$pdf->SetFillColor(220,229,244);//COLOR TEXTO

$pdf->cell(40,4.5,'TIPO DE CUENTA',1,0,'C',true);
$pdf->cell(56,4.5,'BANCO',1,0,'C',true);
$pdf->cell(20,4.5,'MONEDA',1,0,'C',true);
$pdf->cell(33,4.5,'NRO CTA',1,0,'C',true);
$pdf->cell(50,4.5,'NRO CTA INTERBANCARIO',1,0,'C',true);
$pdf->Ln(); 
$pdf->SetFont('Flama-Basic','',8);
$pdf->cell(40,4.5,'CUENTA CORRIENTE',1,0,'L');
$pdf->cell(56,4.5,utf8_decode('BANCO DE CREDITO DEL PERÚ'),1,0,'L');
$pdf->cell(20,4.5,'DOLARES',1,0,'L');
$pdf->cell(33,4.5,'191-1775551-1-67',1,0,'L');
$pdf->cell(50,4.5,'002-191-001775551167-56',1,0,'L');
$pdf->ln(4.5);
$pdf->cell(40,4.5,'CUENTA CORRIENTE',1,0,'L');
$pdf->cell(56,4.5,utf8_decode('BANCO DE CREDITO DEL PERÚ'),1,0,'L');
$pdf->cell(20,4.5,'SOLES',1,0,'L');
$pdf->cell(33,4.5,'191-1876416-0-95',1,0,'L');
$pdf->cell(50,4.5,'002-191-001876416095-50',1,0,'L');

$pdf->ln(4.5);
$pdf->cell(40,4.5,'CUENTA CORRIENTE',1,0,'L');
$pdf->cell(56,4.5,'SCOTIABANK',1,0,'L');
$pdf->cell(20,4.5,'DOLARES',1,0,'L');
$pdf->cell(33,4.5,'0003812201',1,0,'L');
$pdf->cell(50,4.5,'009-081-000003812201-16',1,0,'L');

$pdf->ln(4.5);
$pdf->cell(40,4.5,'CUENTA CORRIENTE',1,0,'L');
$pdf->cell(56,4.5,'SCOTIABANK',1,0,'L');
$pdf->cell(20,4.5,'SOLES',1,0,'L');
$pdf->cell(33,4.5,'0000353893',1,0,'L');
$pdf->cell(50,4.5,'009-081-000000353893-11',1,0,'L');

$pdf->ln(4.5);
$pdf->cell(40,4.5,'DETRACCION',1,0,'L');
$pdf->cell(56,4.5,'BANCO DE LA NACION',1,0,'L');
$pdf->cell(20,4.5,'SOLES',1,0,'L');
$pdf->cell(33,4.5,'000-30011740',1,0,'L');
$pdf->cell(50,4.5,'',1,0,'L');

$pdf->Ln(4);
$pdf->SetFont('Flama-Basic','',7);
$pdf->SetTextColor(0,0,0);

/**
 * SECCION DE FIRMA 
 */

  if($usuario=="MMEDINA"){
	$usuario2="MATILDE";
}
  else if($usuario=="MYOGHI"){
	$usuario2="MYOGHI";
}
  else if($usuario=="ZBOLANIOS"){
	$usuario2="HEIDY";
}
 else if($usuario=="MBLAS"){
	$usuario2="MATILDE";
} 
else if($usuario=="ABACILIO"){
	$usuario2="JLINARES";
}
else if($usuario=="CSAIRE"){
	$usuario2="MATILDE";
}
else if($usuario=="LESPINOZA"){
	$usuario2="LESPINOZA";
}
else if($usuario=="KAREVALO"){
	$usuario2="KAREVALO";
}
else if($usuario=="SMEZA"){
	$usuario2="MATILDE";
}
else if($usuario=="LJANAMPA"){
	$usuario2="MATILDE";
}
else if($usuario=="SDELGADO"){
	$usuario2="MATILDE";
}
else if($usuario=="SMEZA"){
	$usuario2="MATILDE";
}
else if($usuario=="RTACSI"){
	$usuario2="MATILDE";
}
else if($usuario=="KCASTILLO"){
	$usuario2="MATILDE";
}
else if($usuario=="LQUEZADA"){
	$usuario2="LQUEZADA";
}
else if($usuario=="DGIRON"){
	$usuario2="LEIDY";
}
else if($usuario=="SCASTILLO"){
	$usuario2="LEIDY";
}
else if($usuario=="VMARTINEZ"){
	$usuario2="LEIDY";
}
else if($usuario=="AMORALES"){
	$usuario2="LEIDY";
}
else if($usuario=="NCORDOVA"){
	$usuario2="LEIDY";
}
else if($usuario=="PORSI"){
	$usuario2="LEIDY";
}
else if($usuario=="CMORAN"){
	$usuario2="LEIDY";
}
else if($usuario=="AZABARBURU"){
	$usuario2="FLORENT";
}
else{
	$usuario2=$usuario;
}
 
$cabecera="select * from userdet where c_udni='$usuario2' or c_login='$usuario2'";
$cab = odbc_exec($cid,$cabecera);
$fila = odbc_fetch_array($cab);
$ven=$fila['c_nombre'];
$comercial=str_replace(' ','+',$fila['c_nombre']);
$cargo=$fila['c_cargo'];
$telefono1='Central Telf. '.$fila['c_fono1'];
$telefono2='Central Telf. '.$fila['c_fono2'];
$telefono3=$fila['c_fono3'];
$telefono4=$fila['c_correo'];
$mensaje='Hola+'.$comercial.'+Deseo+que+me+puedas+dar+mas+informacion+sobre+la+cotizacion+'.$c_numped.'+enviada';
//$telefono4='MOVIL '.$fila['c_fono4'];	
$pdf->Ln(5);
$pdf->SetTextColor(35,44,76);//25,40,76
$pdf->SetFont('Flama-Bold','',12);
$pdf->cell(199,5,$ven,0,1,'R');
$pdf->SetTextColor(114,115,118);//25,40,76
$pdf->SetFont('Flama-Bold','',9);
$pdf->cell(199,5,$cargo,0,1,'R');
$pdf->SetFont('Flama-Basic','',9);
$pdf->cell(199,5,$telefono4,0,1,'R');
$pdf->SetTextColor(40,58,90);//25,40,76
$linkWhatsap='                                                                                                                                                                                                                               <a href="https://wa.me/'.$telefono3.'?text='.$mensaje.'" target="_blank">+51 '.$telefono3.' </a>';
$pdf->WriteHTML($linkWhatsap);
//$pdf->cell(199,5,$telefono3,0,1,'R');

$asunto=isset($fila['c_asunto'])?$fila['c_asunto']:'';
$coti=$ncoti;
$archivo=$coti.' - '.$asuntocot.' - '.$nomcli;
$pdf->AliasNbPages();
$pdf->SetTopMargin(30);
#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true,30);  
$pdf->AddFont('Flama-Basic','','Flama-Basic.php');
$pdf->AddFont('Flama-Bold','','Flama-Bold.php');
#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(4, 30 , 4);
$pdf->AddPage();
$pdf->Image('condiciones.png',0,0,210);
$pdf->Ln(3); 
$pdf->Output($archivo.'.pdf', 'I');
