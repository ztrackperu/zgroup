<?php
//require('mysql_table.php');
ini_set('error_reporting',0);//para xamp
require('fpdf/mysql_table.php');
require('./dbconex.php');
//require('hmtl_table.php');
//$nro=$coti;
//$GLOBALS[$nro];<a href="mysql_table.php">mysql_table.php</a>
$ncoti     = $_REQUEST['ncoti'];
$valSubt   = $_REQUEST['subt'];
$my_cad    = $_REQUEST['cad'];
$obsultimo = utf8_encode(base64_decode($my_cad));
$valReefer = $_REQUEST['reefer'];
$mostrar_cambio = isset($_REQUEST['showcambiomoneda'])?$_REQUEST['showcambiomoneda']:false;
$mostrar_cambio = $mostrar_cambio == 'true'?true:false;
//$usuario=$_GET['udni'];
class PDF extends PDF_MySQL_Table{
    //inicio tabla 
    var $widths;
    var $aligns;

    function SetWidths($w){
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a){
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data){
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h){
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt){
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
    function WriteHtmlCell($cellWidth, $html){        
        $rm = $this->rMargin;
        $this->SetRightMargin($this->w - $this->GetX() - $cellWidth);
        $this->WriteHtml($html);
        $this->SetRightMargin($rm);
    }
    /**/
    function PutLink($URL, $txt){
        // Escribir un hiper-enlace
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
    function Header(){
        //$this->Image('cabecera.png',10,8,100);
        /* $this->Ln(3);
        $this->SetFont('Arial','U',10);
        $this->Cell(0,10,'CONTENEDORES  REEFER  BI CAMARA  DRY  MODULOS  GEN SET  CLIP ON   UNDERMOUND',0,0,'C');*/
    }

    /* SECCION DE PIE DE PAGINA*/
    function Footer(){
		
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',6);
        // Número de página
        //$this->cell(0,10,'Ventas: ',0,0,'C');
        
        $this->cell(0,10,'Telf: 651-1974 // 637-5093 / Email: ventas@zgroup.com.pe / Web Site: www.zgroup.com.pe',0,0,'C');
        $this->Ln(3);
        /*USUAR PARA EL CAMPO MEMO*/
        $string=utf8_decode('Calle Ordoner Vargas Nro 142 - Urb. Villasol Lima - Los Olivos - Perú.');
        $this->cell(0,10,$string,0,0,'C');
        $this->Ln(3);
        //$this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');
    }
}
$pdf=new PDF('P','mm','A4'); 
//$dimensiones=array (80,120);
//$pdf=new PDF('P','mm',$dimensiones);
$pdf->SetMargins(15,10); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();
$cabecera="SELECT  distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_tipocoti,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,cc_nruc,c.c_tipped,c_codven,
d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c_codtit,n_facisc,
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
$obsultimox=$fila['c_desgral'];
$pdf->SetFont('Arial','',10);
$usuario=$fila['c_opcrea'];
$usu=$fila['c_oper'];
$descuento=$fila['n_dscto'];
$imagprd=$fila['c_codtit'];
$nomcli=$fila['c_nomcli'];
//$obsultimo = $cad=utf8_encode($fila['c_desgral']);
$asuntocot=$fila['c_asunto'];
$tipopedido=$fila['c_tipocoti'];
$cotipedido=$fila['c_tipped'];

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
 * SECCION IMAGENES DE CABECERA DE COTIZACION
 */
$pdf->Image('LOGO-NUEVO-ZGROUP.png',15,10,50);
$pdf->Image('cabecera2.png',75,10,120);
$pdf->Ln(14);
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
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->Cell(185,3,'COTIZACION NRO:'.utf8_decode($fila['c_numped']),1,1,'C','true'); 
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->cell(17,7,'Fecha',0,0,'L');
$pdf->cell(45,7,':'.$fecha2,0,0,'L');
$pdf->Ln(4); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(17,7,'Cliente',0,0,'L');
$pdf->cell(90,7,':'.($fila['c_nomcli']),0,0,'L');
/* $pdf->SetWidths(array(185));
$pdf->SetAligns(array('C'));
$pdf->Row(array($fila['c_nomcli'])); */
$pdf->Ln(4);
$pdf->cell(17,7,'Ruc',0,0,'L');
$pdf->cell(90,7,':'.utf8_decode($fila['cc_nruc']),0,0,'L');
$pdf->Ln(4); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(17,7,'Contacto',0,0,'L');
$pdf->cell(90,7,':'.($fila['c_contac']),0,0,'L');
$pdf->cell(25,7,'Telefono 1',0,0,'R');
$pdf->cell(45,7,':'.$fila['c_telef'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(17,7,'Correo',0,0,'L');
$pdf->cell(90,7,':'.$fila['c_email'],0,0,'L');
$pdf->cell(25,7,'Dcto Ref',0,0,'R');
$pdf->cell(90,7,':'.$fila['c_numocref'],0,0,'L');

$pdf->Ln(6); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
/**
 * SECCION DE ASUNTO DE COTIZACION
 */
$pdf->Cell(185,3,'ASUNTO :'.utf8_decode($asuntocot),1,1,'C','true'); 
$pdf->Ln(2); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
/**
 * SECCION DE DETALLE DE COTIZACION
 */
$pdf->Cell(185,3,'PRECIOS Y CONDICIONES',1,1,'C','true'); 
$pdf->Ln(2); 
if($mostrar_cambio){
    $pdf->SetWidths(array(6,89, 15, 15,15, 15, 15, 15));
    $pdf->SetAligns(array('L','L','R','R','R','R','R','R'));
}else{
    $pdf->SetWidths(array(6,104, 15, 15,15, 15, 15));
    $pdf->SetAligns(array('L','L','R','R','R','R','R'));
}
$pdf->SetFont('Arial','',6);
//$pdf->SetDrawColor(24,53,93);
$pdf->SetDrawColor(0,0,0); //COLOR DE LINEA TABLA
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(0,0,0); //COLOR TEXTO
for($i=0;$i<1;$i++){
    if($mostrar_cambio){
        $pdf->SetAligns(array('L','C','C','C','C','C','C','C'));
        $pdf->Row(array('N','Descripcion','Precio U.','Dscto', 'Total Unit.', 'Cant', 'Precio Final', 'Precio en '.$simbolo_cambio));
    }else{
        $pdf->SetAligns(array('L','C','C','C','C','C','C'));
        $pdf->Row(array('N','Descripcion','Precio U.','Dscto', 'Total Unit.', 'Cant', 'Precio Final'));
    }
}
$strConsulta = "SELECT  c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_swfirma,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,cod_tipo,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_codcont,c_fecini,c_fecfin,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped,
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
    $zglos=$resultado['c_descr'];
    $glos=strtr(strtoupper($zglos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ");
    $xglos = strtr(strtoupper($glos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");

    $c_obsdoc = $resultado['c_obsdoc']; 
    //$c_obsdoc = strtr(strtoupper($c_obsdoc),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ"); 
    //$c_obsdoc = strtr(strtoupper($c_obsdoc),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"); 

    if($resultado['c_tipped']=='017' && $resultado['c_codcont']!=NULL){
	    $gl='';
	    $des=$gl.' '.$resultado['c_desprd'].'-'.$xglos.' CODIGO: '.$cod=substr($resultado['c_codcont'],2,20).' PERIODO '.$resultado['c_fecini'].' / '.$resultado['c_fecfin'];
	}elseif($resultado['c_codcont']!=NULL){
	    $gl='';	
	    $des=$gl.' '.$resultado['c_desprd'].' '.$xglos.' CODIGO:'.$cod=substr($resultado['c_codcont'],2,20);
    }else if($resultado['c_desprd']=='OTROS PRODUCTOS'){
        $gl='';	
        $des=$xglos.' '.$resultado['c_desprd'].' ';	
    }else{
        $des=' '.$resultado['c_desprd'].' '.$xglos;	
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
	    $Descripcion=$des.''.$tipo.'';
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
	
	
    $descripcionDet = $des.' '.$tipo;
    if(strpos($descripcionDet, $c_obsdoc) === false){
        $descripcionDet .= ' '. $c_obsdoc;
    }
    if($mostrar_cambio){
        $pdf->SetAligns(array('L','L','R','R','R','R','R','R','C'));
        $pdf->Row(array($i,$descripcionDet, $pre, $dscto, $totuni, $cant, $total, $total_al_cambio));
    }else{
        $pdf->SetAligns(array('L','L','R','R','R','R','R','C'));
        $pdf->Row(array($i,$descripcionDet, $pre, $dscto, $totuni, $cant, $total));
    }
    $i++;

    $detsubtotal+=($resultado['n_preprd']*$resultado['n_canprd']);
    $detdscto+= $resultado['n_dscto'] * $resultado['n_canprd'];
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
 
 
if((int)$valSubt != 0){
    $pdf->Ln(1);
    $pdf->SetFont('Arial','',6);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(150,3,'TOTAL SIN DSCTO',0,0,'R');
    $pdf->cell(15,3,number_format($detsubtotal,2),0,0,'R');
    $pdf->cell(15,3,'',0,0,'R'); // NO VA
    $pdf->Ln();
    $pdf->cell(150,3,'DSCTO',0,0,'R');
    $pdf->cell(15,3,number_format($detdscto,2),0,0,'R');
    $pdf->cell(15,3,'',0,0,'R'); // NO VA
    $pdf->Ln();
    $pdf->cell(150,3,'TOTAL',0,0,'R');
    $pdf->cell(15,3,number_format($dettotal,2),0,0,'R');
    $pdf->cell(15,3,'',0,0,'L'); // NO VA
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
        $pdf->Ln(4);
        $pdf->SetFont('Arial','',6);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell(150,3,'TOTAL SIN DSCTO'.$simbolo_cambio,0,0,'R');
        $pdf->cell(15,3,number_format($detsubtotal_al_cambio,2),0,0,'R');
        $pdf->cell(15,3,'',0,0,'R'); // NO VA
        $pdf->Ln();
        $pdf->cell(150,3,'DSCTO '.$simbolo_cambio,0,0,'R');
        $pdf->cell(15,3,number_format($detdscto_al_cambio,2),0,0,'R');
        $pdf->cell(15,3,'',0,0,'R'); // NO VA
        $pdf->Ln();
        $pdf->cell(150,3,'TOTAL '.$simbolo_cambio,0,0,'R');
        $pdf->cell(15,3,number_format($dettotal_al_cambio,2),0,0,'R');
        $pdf->cell(15,3,'',0,0,'L'); // NO VA
    }
}
/**
 * SECCION DE DATOS EXTRA DE COTIZACION
 */
$pdf->Ln(); 
if($fila['c_precios']=='001'){
    $mon='NO INCLUYE IGV';
}else{
    if($fila['c_precios']=='002'){
        $mon='INCLUYE IGV';
    }else{
        $mon='INAFECTO IGV';
    }    
}
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->cell(29,7,'FORMA DE PAGO',0,0,'L');
$pdf->cell(45,7,':'.$fila['tp_desc'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'PRECIOS',0,0,'L');
$pdf->cell(45,7,':'.$mon,0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'TIPO DE MONEDA',0,0,'L');
$pdf->cell(45,7,':'.$moneda,0,0,'L');
if($mostrar_cambio){
    $pdf->Ln(4); 
    $pdf->cell(29,7,'TIPO DE CAMBIO',0,0,'L');
    $pdf->cell(45,7,': '.$tipo_cambio,0,0,'L');
}
$pdf->Ln(4); 
$pdf->cell(29,7,'TIEMPRO DE ENTREGA',0,0,'L');
$pdf->cell(45,7,':'.utf8_decode($fila['c_tiempo']),0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'VALIDEZ DE OFERTA',0,0,'L');
$pdf->cell(45,7,':'.utf8_decode($fila['c_validez']),0,0,'L');
$pdf->Ln(4); 

if($tipopedido=='020'){
	$pdf->cell(29,7,'LUGAR DE ENTREGA',0,0,'L');
    $html=':PACKING ZGROUP TAMBOGRANDE - APAGRO';
	
}elseif($tipopedido=='002' || $tipopedido=='001' || $tipopedido=='015' || $tipopedido=='019'){
    $pdf->cell(29,7,'LUGAR DE ENTREGA',0,0,'L');
    $html=$tipopedido.':ALMACEN ZGROUP (MZ.D LTE. 14 PROGRAMA DE VIVIENDA ACUARIO, CALLAO (ALTURA PARADERO CARRILLO)) <A HREF="https://www.google.com.pe/maps/place/ZGROUP+SAC/@-11.9816981,-77.1247262,17z/data=!3m1!4b1!4m2!3m1!1s0x9105cdc090890995:0x9f144be70d5f6763">Google Maps</A>,';
}elseif($tipopedido=='017'){
    $pdf->cell(29,7,'LUGAR DE ENTREGA',0,0,'L');
    $html=":".utf8_decode($fila['c_lugent']);
}
if(isset($html))
    $pdf->WriteHTML($html);

/**** GARANTIA REEFER ****/
$query    = "SELECT DISTINCT c_obsdoc, c_codprd FROM pedidet WHERE c_numped='$ncoti';";
$garantia = odbc_exec($cid,$query);
$reeferTwenty = 0;
$reeferFourty = 0;
while($reefer = odbc_fetch_object($garantia)){
    switch ($reefer->c_codprd) {
        case 'CRND0010':
            if(utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT A - USED'){
                $reeferTwenty=$reeferTwenty+1;
            }            
            break;
        case 'CRN20F0006':
            if(utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT A - USED'){
                $reeferTwenty=$reeferTwenty+1;
            }
            break;
        case 'CRN40H0005':
            if(utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT A - USED' OR (utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT B - USED') OR (utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT C - USED')){
                $reeferFourty=$reeferFourty+1;
            }            
            break;
        case 'CRND0009':
            if(utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT A - USED' OR (utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT B - USED') OR (utf8_encode(utf8_decode($reefer->c_obsdoc)) == 'CAT C - USED')){
                $reeferFourty=$reeferFourty+1;
            }            
            break;
        default :
            break;
    }
}
$totalReefer   = odbc_num_rows($garantia);
if(!empty($reeferFourty) AND !empty($reeferTwenty)){
    $pdf->Ln(6);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->Cell(180,3, utf8_decode('GARANTÍA'),1,1,'C','true'); 
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT A - Un año por toda la máquina reefer.'),0,0,'L');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT B - Un año por el compresor y controlador.'),0,0,'L');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT C - No tiene garantía.'),0,0,'L');
    $pdf->Ln(3);    
}else if(!empty($reeferTwenty)){
    $pdf->Ln(6);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->Cell(180,3,utf8_decode('GARANTÍA'),1,1,'C','true'); 
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT A - Un año por toda la máquina reefer.'),0,0,'L');
    $pdf->Ln(3);
}else if(!empty($reeferFourty)){
    $pdf->Ln(6);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->Cell(180,3,utf8_decode('GARANTÍA'),1,1,'C','true'); 
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT A - Un año por toda la máquina reefer.'),0,0,'L');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT B - Un año por el compresor y controlador.'),0,0,'L');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('CAT C - No tiene garantía.'),0,0,'L');
    $pdf->Ln(3);
}
if($valReefer == 1){
    $pdf->Ln(6);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->Cell(180,3, utf8_decode('GARANTÍA'),1,1,'C','true'); 
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('Cinco años de garantía equipo completo.'),0,0,'L');
    $pdf->Ln(3);
}
if($valReefer == 2){
    $pdf->Ln(6);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->Cell(180,3, utf8_decode('GARANTÍA'),1,1,'C','true'); 
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('Cinco años de garantía sólo la máquina.'),0,0,'L');
    $pdf->Ln(3);
}
/**** END GARANTIA REEFER ****/

$pdf->Ln(6); 
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->Cell(185,3,'OBSERVACIONES',1,1,'C','true'); 
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->Ln();
//$pdf->WriteHTML(utf8_decode($fila['c_desgral']));
//$pdf->utf8_encode ($fila['c_desgral']);



//$pdf->WriteHTML($fila['c_desgral']);
//$pdf->WriteHTML(utf8_decode($_GET['cad']));
$ccc="<p>-luis carlos<br></p><p>-cruzado ortiz.</p><p>-luis.</p><p><br></p>";
//$cambio=array('</p>','<p>');
$c= str_replace("background-color","</p>", $obsultimo);
$c2= str_replace("background-color","</p>", $obsultimo);
$c3= str_replace("background-color","</p>", $obsultimo);
$resultado = str_replace('<br>', "</p>", $obsultimo);
$resultado2 = str_replace('<p>', " ", $resultado);
$resultado3 = str_replace('</p>', "<br> ", $resultado2);
//$pdf->cell(25,7,$resultado,0,0,'L');
$pdf->WriteHTML(utf8_decode($resultado3));
$pdf->Ln();	
if($xtipo=='002'){ // si es cotizacion solo transporte
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(25,7,utf8_decode('-Cualquier cambio y/o requerimiento de accesorios que no esté especificado en la presente cotización podrá considerado como monto adicional.'),0,0,'L');
    $pdf->Ln(3); 
}else{ //alquiler venta 
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    /*$pdf->cell(25,7,'-Esta Cotizacion no incluye servicio de transporte y manipuleo en destino',0,0,'L');*/
    $pdf->Ln(3); 
    $pdf->cell(25,7,'-Brindamos servicio de transporte y manipuleo a nivel nacional e internacional  favor de solicitarlo a su ejecutivo de ventas.',0,0,'L');
    $pdf->Ln(3); 
    $pdf->Ln(3); 
    $pdf->cell(25,7,utf8_decode('-Cualquier cambio y/o requerimiento de accesorios que no esté especificado en la presente cotización podrá considerado como monto adicional.'),0,0,'L');	
}

$pdf->Ln(3); 
$pdf->SetFont('Arial','B',7);
$pdf->cell(25,7,utf8_decode('-El Cliente deberá Presentar Orden de Compra y/o Orden de Servicio para la aprobación de la cotización.'),0,0,'L');

//requisito solo alquiler
if($xtipo=='017'){//$xtipo=='017'|| $xtipo=='002'
    $pdf->Ln(5); 
    $pdf->SetFont('Arial','U',7);
    $pdf->SetTextColor(46,53,93);
    $pdf->SetFillColor(46,53,93);
    $pdf->cell(25,7,'Requisito para alquiler de equipos:',0,0,'L');
    $pdf->Ln(3); 
    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(46,53,93);
    $pdf->SetFillColor(46,53,93);
    $pdf->cell(25,7,utf8_decode('-Firma de contrato de alquiler por el periodo solicitado, el cual tendrá plazo de vigencia.'),0,0,'L');
    $pdf->Ln(3);
    $pdf->cell(25,7,utf8_decode('-El cliente deberá entregar en garantía:'),0,0,'L');
    $pdf->Ln(3);
    $pdf->cell(25,7,utf8_decode('-Deposito o carta fianza solidaria irrevocable, incondicional de realización automática sin Beneficio de exclusión.'),0,0,'L');
}
//fin alquiler
//para venta o alquiler
//if($xtipo=='001' || $xtipo=='017' || $xtipo=='015' || $xtipo=='019'){
    //Contenedores Reefer(002), Generadores(003), Transformadores(012) , Maquina Reefer New(021)
	if($ztipo=='002' || $ztipo=='003' || $ztipo=='012' || $ztipo=='021' || $ztipo=='000'){
        $pdf->Ln();
        $pdf->SetFont('Arial','',7);
        $pdf->SetDrawColor(24,53,93);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(24,53,93);
        $pdf->cell(90,3,'BENEFICIOS',1,0,'C','true');
        $pdf->cell(90,3,'REQUERIMIENTO DEL USUARIO',1,0,'C','true');
        $pdf->Ln(3);
        $pdf->SetTextColor(0,0,0);
        $pdf->cell(90,3,'-Servicio de post-venta .',0,0,'L');
        $pdf->cell(90,3,utf8_decode('-Potencia mínima: 15KW,  440 VAC/3PH con línea a tierra y deberá tener'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-Asesoria permanente y personalizada.'),0,0,'L');
        $pdf->cell(90,3,utf8_decode(' instalado una llave termo magnética trifásica mínimo 32 A.'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-Servicio técnico especializado las 24 del días los 365 días a nivel nacional. '),0,0,'L');
        $pdf->cell(90,3,utf8_decode('-En caso de no contar con la potencia mínima 440 vac/3ph podrá usar un '),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-
        
        
        
        :'),0,0,'L');
        $pdf->cell(90,3,utf8_decode(' transformador de 220 a 440 vac  o 380 a 440 vac.'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('    Contenedor reefer: gratuita en lima metropolitana y callao '),0,0,'L');
        $pdf->cell(90,3,utf8_decode('-De no contar con el transformador podrá favor de solicitarlo a su ejecutivo de ventas.'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('    Generadores: gratuita dentro del almacén Zgroup'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('-La distancia máxima del punto alimentación eléctrica al equipo deberá ser 5mts. '),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode(' En lugares fuera de lima gastos de viatico del técnico es por cuenta del cliente.'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('-Espacio mínimo para alojamiento:'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-Incluye charla informativa de operación y puesta en marcha.'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('    contenedor de 40 pies Largo 15 m / ancho 3.5m / alto 3.5m / 183 m3'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-Incluye manipuleo dentro del almacén de Zgroup.'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('    contenedor de 20 pies	Largo 9 m / ancho 3.5 / alto 3.25 m / 91.8 m3'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('(puesto sobre unidad de transporte).'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('    contenedor de 10 pies	Largo 6 m / ancho 3.5 / alto 3.25 m / 46 m3'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-Contamos con un amplio stock de las mejores marcas Carrier,Thermo King'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('-Piso deberá está a nivel para la descarga del contenedor.'),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('  Daikin ,el cliente podrá elegir la marca de su preferencia'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('-Para el correcto alojamiento del contenedor deberá tener un piso aplanado y  '),0,0,'L');
        $pdf->Ln(3);
        $pdf->cell(90,3,utf8_decode('-Los contenedores reefer incluye 18mts de cable para su conexión eléctrica.'),0,0,'L');
        $pdf->cell(90,3,utf8_decode('  compacto al 95% con un desnivel máximo de 3%.'),0,0,'L');
        $pdf->Ln(3);
	}
//}
$pdf->Ln();
//fin venta
// Contenedores Dry/Modulos (001, 015, 016), Carretas/Plataformas (004), Transformadores(012)
if($ztipo=='001' || $ztipo=='015' || $ztipo=='016' || $ztipo=='004' || $ztipo=='012'){
    $pdf->SetFont('Arial','',7);
    $pdf->SetDrawColor(24,53,93);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(24,53,93);
    $pdf->cell(185,3,'BENEFICIOS',1,0,'C','true');
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(3);
    $pdf->cell(90,3,'-Servicio de post-venta.',0,0,'L');
    $pdf->Ln(3);
    $pdf->cell(90,3,utf8_decode('-Asesoria permanente y personalizada.'),0,0,'L');
    $pdf->Ln(3);
    $pdf->cell(90,3,utf8_decode('-Servicio técnico especializado las 24 del días los 365 días a nivel nacional. '),0,0,'L');
    $pdf->Ln(3);
    $pdf->cell(90,3,utf8_decode('-Incluye manipuleo dentro del almacén de Zgroup (puesto sobre unidad de transporte).'),0,0,'L');
}
/**
 * SECCION CUENTAS BANCARIAS ZGROUP
 */
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',7);
//$pdf->WriteHTML(utf8_decode($c_obsped));
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->Cell(185,3,'CUENTAS CORRIENTES ZGROUP',1,1,'C','true'); 
$pdf->Ln(2); 
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->cell(15,3,'Tipo Cuenta',1,0,'L');
$pdf->cell(15,3,'Banco',1,0,'L');
$pdf->cell(15,3,'Moneda',1,0,'L');
$pdf->cell(25,3,'Nro Cta',1,0,'L');
$pdf->cell(35,3,'Nro Cta Interbancario',1,0,'L');
$pdf->Ln(); 
$pdf->cell(15,3,'Corriente',1,0,'L');
$pdf->cell(15,3,'Bcp',1,0,'L');
$pdf->cell(15,3,'Dolares',1,0,'L');
$pdf->cell(25,3,'191-1775551-1-67',1,0,'L');
$pdf->cell(35,3,'002-191-001775551167-56',1,0,'L');
$pdf->ln(3);
$pdf->cell(15,3,'Corriente',1,0,'L');
$pdf->cell(15,3,'Bcp',1,0,'L');
$pdf->cell(15,3,'Soles',1,0,'L');
$pdf->cell(25,3,'191-1876416-0-95',1,0,'L');
$pdf->cell(35,3,'002-191-001876416095-50',1,0,'L');

$pdf->ln(3);
$pdf->cell(15,3,'Corriente',1,0,'L');
$pdf->cell(15,3,'Scotiabank',1,0,'L');
$pdf->cell(15,3,'Dolares',1,0,'L');
$pdf->cell(25,3,'0003812201',1,0,'L');
$pdf->cell(35,3,'009-081-000003812201-16',1,0,'L');

$pdf->ln(3);
$pdf->cell(15,3,'Corriente',1,0,'L');
$pdf->cell(15,3,'Scotiabank',1,0,'L');
$pdf->cell(15,3,'Soles',1,0,'L');
$pdf->cell(25,3,'0000353893',1,0,'L');
$pdf->cell(35,3,'009-081-000000353893-11',1,0,'L');

$pdf->ln(3);
$pdf->cell(15,3,'Detraccion',1,0,'L');
$pdf->cell(15,3,'Nacion',1,0,'L');
$pdf->cell(15,3,'Soles',1,0,'L');
$pdf->cell(25,3,'000-30011740',1,0,'L');
$pdf->cell(35,3,'',1,0,'L');

$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);

/**
 * SECCION DE FIRMA 
 */
  if($usuario=="MMEDINA"){
	$usuario2="MATILDE";
}
  else if($usuario=="MYOGHI"){
	$usuario2="HEIDY";
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
else if($usuario=="DGIRON"){
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
$cargo=$fila['c_cargo'];
$telefono1='Central Telf. '.$fila['c_fono1'];
$telefono2='Central Telf. '.$fila['c_fono2'];
$telefono3='Cel.'.$fila['c_fono3'];
$telefono4='Correo '.$fila['c_correo'];
//$telefono4='MOVIL '.$fila['c_fono4'];

	
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->cell(25,7,'Atentamente,',0,1,'L');
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(24,53,93);
$pdf->SetFillColor(24,53,93);
//$pdf->cell(25,7,'FECHA',0,0,'L');
$pdf->cell(10,7,$ven,0,0,'L');
$pdf->Ln(3);
$pdf->SetTextColor(121,128,129);
$pdf->SetFillColor(121,128,129);
$pdf->SetFont('Arial','B',8);
$pdf->cell(10,7,$cargo,0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->cell(8,7,''.$telefono1,0,0,'L');
$pdf->Ln(3);
$pdf->cell(8,7,''.$telefono2,0,0,'L');
$pdf->Ln(3);
if($fila['c_fono3']==""){
$pdf->cell(8,7,''.$telefono4,0,0,'L');
$pdf->Ln(3);
$pdf->cell(8,7,''.$correo,0,0,'L');
$pdf->Ln(3);	
}else{
$pdf->cell(8,7,''.$telefono3,0,0,'L');
$pdf->Ln(3);
$pdf->cell(8,7,''.$telefono4,0,0,'L');
$pdf->Ln(3);
$pdf->cell(8,7,''.$correo,0,0,'L');
$pdf->Ln(3);	
}
$pdf->Image('homologacion.png');
$asunto=isset($fila['c_asunto'])?$fila['c_asunto']:'';
$coti=$ncoti;

$archivo=$coti.' - '.$asuntocot.' - '.$nomcli;
$pdf->Output($archivo.'.pdf', 'I');
?>