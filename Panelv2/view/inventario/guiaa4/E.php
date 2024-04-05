<?php
//require('mysql_table.php');
require('fpdf/mysql_table.php');
require('dbconex.php');
//require('hmtl_table.php');
//$nro=$coti;
//$GLOBALS[$nro];<a href="mysql_table.php">mysql_table.php</a>
$ncoti=$_GET['ncoti'];
$obsultimo=$_GET['cad'];
//$usuario=$_GET['udni'];
class PDF extends PDF_MySQL_Table
{
//inicio tabla
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
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

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
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
//fin tabla



function WriteHtmlCell($cellWidth, $html){        
    $rm = $this->rMargin;
    $this->SetRightMargin($this->w - $this->GetX() - $cellWidth);
    $this->WriteHtml($html);
    $this->SetRightMargin($rm);
}
/**/
function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
function Header()
   {

       //$this->Image('cabecera.png',10,8,100);
/* $this->Ln(3);
      $this->SetFont('Arial','U',10);

      $this->Cell(0,10,'CONTENEDORES  REEFER  BI CAMARA  DRY  MODULOS  GEN SET  CLIP ON   UNDERMOUND',0,0,'C');*/

   }

/**/
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',6);
    // Número de página
	//$this->cell(0,10,'Ventas: ',0,0,'C');
    
	$this->cell(0,10,'Telf: 651-1974 // 637-5093 / Email: ventas@zgroup.com.pe / Web Site: www.zgroup.com.pe',0,0,'C');
    $this->Ln(3);
	/*USUAR PARA EL CAMPO MEMO*/
	$string=utf8_decode('Calle Ordoner Vargas Nro 142 - Urb. Villasol Lima - Los Olivos - Perú');
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
$cabecera="select  distinct c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,cc_nruc,c.c_tipped,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,c_codtit,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado,tp_desc
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,c_numocref,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from tab_pago as p, pedidet as d,pedicab as c,climae as m
where  c_codpga=tp_codi and   m.cc_ruc=c.c_codcli  and c.c_numped=d.c_numped and c.c_numped='$ncoti'";
$cab = odbc_exec($cid,$cabecera);
$fila = odbc_fetch_array($cab);
$obsultimox=$fila['c_desgral'];
$pdf->SetFont('Arial','',10);
$usuario=$fila['c_opcrea'];
$descuento=$fila['n_dscto'];
$imagprd=$fila['c_codtit'];
$nomcli=$fila['c_nomcli'];
$cad=$fila['c_desgral'];
$asuntocot=$fila['c_asunto'];
$tipopedido=$fila['c_tipped'];
if($fila['c_codmon']=='0'){
	$moneda='NUEVOS SOLES';
	}else{
	$moneda='DOLARES AMERICANOS';	
		}
//$pdf->Code39(80, 2, $fila['c_numped']);
$pdf->Image('cabecera.png',10,10,120);
$pdf->Image('cabecera2.png',75,10,120);
$pdf->Ln(11);
$variable2 = explode ('-',substr($fila['d_fecped'],0,10)); //división de la fecha utilizando el separador -
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->Cell(180,3,'COTIZACION NRO:'.utf8_decode($fila['c_numped']),1,1,'C','true'); 
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->cell(17,7,'Fecha',0,0,'L');
$pdf->cell(45,7,':'.$fecha2,0,0,'L');
$pdf->Ln(4); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(17,7,'Cliente',0,0,'L');
$pdf->cell(90,7,':'.(utf8_decode($fila['c_nomcli'])),0,0,'L');
$pdf->cell(25,7,'Ruc',0,0,'R');
$pdf->cell(45,7,':'.utf8_decode($fila['cc_nruc']),0,0,'L');
$pdf->Ln(4); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(17,7,'Contacto',0,0,'L');
$pdf->cell(90,7,':'.utf8_decode($fila['c_contac']),0,0,'L');
$pdf->cell(25,7,'Telefono 1',0,0,'R');
$pdf->cell(45,7,':'.$fila['c_telef'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(17,7,'Correo',0,0,'L');
$pdf->cell(90,7,':'.$fila['c_email'],0,0,'L');
$pdf->cell(25,7,'Dcto Ref',0,0,'R');
$pdf->cell(90,7,':'.$fila['c_numocref'],0,0,'L');

//$pdf->Ln(4); 
//$pdf->cell(17,7,'ASUNTO',0,0,'L');
//$pdf->cell(90,7,':'.utf8_decode($fila['c_asunto']),0,0,'L');
//$pdf->nl2br((utf8_decode($fila['c_desgral'])));
//$pdf->cell(100,7,utf8_decode($fila['c_desgral']),1,0,'C');
//$pdf->cell(100,7,$c_desgral,1,0,'C');
//$pdf->WriteHTML(utf8_decode($c_desgral));

//imagenes cotizacion.
/*$pdf->Image('imgprd/'.$imagprd.'.png',176,95,20);
$pdf->Image('imgprd/'.$imagprd.'.jpg',24,105,65);
*/
//$pdf->Ln(300); 
//$pdf->Ln(); 

//$pdf->WriteHTML(utf8_decode($c_desgral));




$pdf->Ln(6); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);



$pdf->Cell(180,3,'ASUNTO :'.$asuntocot,1,1,'C','true'); 






$pdf->Ln(2); 
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);



$pdf->Cell(180,3,'PRECIOS Y CONDICIONES',1,1,'C','true'); 
$pdf->Ln(2); 
$pdf->SetWidths(array(90, 15, 15,15, 15, 15, 15,20));
$pdf->SetAligns(array('L','R','R','R','R','R','R','L'));
	$pdf->SetFont('Arial','',6);
	//$pdf->SetDrawColor(24,53,93);
	$pdf->SetDrawColor(0,0,0); //COLOR DE LINEA TABLA
    $pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(0,0,0); //COLOR TEXTO
		for($i=0;$i<1;$i++)
			{
$pdf->SetAligns(array('C','C','C','C','C','C','C','L'));
$pdf->Row(array('Descripcion','Precio U.','Dscto', 'Total Unit.', 'Cant', 'Precio Final','Detalles'));
			}
	$strConsulta = "select  c.c_numped,c.c_codcia,c.c_codtda,c_numpd,c_codcli,c_descr2,
c_nomcli,c_contac,c_telef,c_nextel,c_email,c_asunto,c_swfirma,
c_codven,d_fecped,d_fecvig,c.c_tipped,n_bruto,c.n_dscto,n_neta,n_neti,
n_facisc,n_swtint,n_tasigv,n_totigv,n_totped,n_tcamb,c_codmon,c_codpga,c_codpgf,c_estado
,c_obsped,d_fecent,c_lugent,n_swtenv,c_desgral,cod_tipo,
n_swtfac,n_swtapr,c_uaprob,c_motivo,c.n_idreg,d_fecrea,c.c_opcrea,c.d_fecreg,c_codcont,c_fecini,c_fecfin,
c.c_oper,c_precios,c_tiempo,c_validez,c_codprd,c_desprd,c_codund,n_canprd,n_preprd,n_prelis,d.n_dscto,n_prevta,n_precrd,n_costo,n_totimp,n_canfac,n_canbaj,c_codafe,c_codlp,c_tiprec,d.c_tipped,
n_intprd,c_obsdoc,c_codcla,d.n_idreg,d.d_fecreg,d.c_oper from pedidet as d,pedicab as c,invmae
where c_codprd=in_codi  and c.c_numped=d.c_numped and c.c_numped='$ncoti' order by d.n_item asc";
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
while($resultado = odbc_fetch_array($historial)){ 
$i=1;
$c_swfirma=$resultado['c_swfirma'];
$zglos=utf8_decode($resultado['c_descr2']);
$glos=strtr(strtoupper($zglos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ");
$xglos = strtr(strtoupper($glos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
if($resultado['c_tipped']=='017' && $resultado['c_codcont']!=NULL){
	$gl='';
	$des=$gl.' '.$resultado['c_desprd'].'-'.$xglos.' CODIGO: '.$cod=substr($resultado['c_codcont'],2,20).' PERIODO '.$resultado['c_fecini'].' / '.$resultado['c_fecfin'];
	}elseif($resultado['c_codcont']!=NULL){
	$gl='';	
	$des=$gl.' '.$resultado['c_desprd'].' '.$xglos.' CODIGO:'.$cod=substr($resultado['c_codcont'],2,20);
		}else{
			$gl='';	
	$des=$gl.' '.$resultado['c_desprd'].' '.$xglos;	
			}
$pre=number_format($resultado['n_preprd'],2);
$cant=number_format($resultado['n_canprd'],2);
$tot=number_format($resultado['n_totimp'],2);
$dscto=number_format($resultado['n_dscto'],2); 
$xtipo=$resultado['c_tipped'];
$ztipo=$resultado['cod_tipo'];
if($xtipo=='001'){
	$tipo='VENTA';
	}elseif($xtipo=='017'){
		$tipo='ALQUILER';
		}else{
			$tipo="";
			}
$glosa='';
$det='';
$totuni=number_format(($resultado['n_preprd'] -$resultado['n_dscto']),2);
$total=number_format(($resultado['n_preprd'] -$resultado['n_dscto'])*$resultado['n_canprd'],2);
$pdf->SetAligns(array('L','R','R','R','R','R','C'));
$pdf->Row(array($tipo.''.$des,$pre,$dscto,$totuni,$cant,$total,$det));
$i++;
}
$pdf->Ln(); 
if($fila['c_precios']=='001'){$mon='NO INCLUYE IGV';}else{$mon='INCLUYE IGV';}
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);
$pdf->cell(29,7,'Forma de pago',0,0,'L');
$pdf->cell(45,7,':'.$fila['tp_desc'],0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'Precios',0,0,'L');
$pdf->cell(45,7,':'.$mon,0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'Tipo de moneda',0,0,'L');
$pdf->cell(45,7,':'.$moneda,0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'Tiempo de entrega',0,0,'L');
$pdf->cell(45,7,':'.utf8_decode($fila['c_tiempo']),0,0,'L');
$pdf->Ln(4); 
$pdf->cell(29,7,'Validez de oferta',0,0,'L');
$pdf->cell(45,7,':'.utf8_decode($fila['c_validez']),0,0,'L');
$pdf->Ln(4); 
//$pdf->cell(25,7,'GARANTIA',0,0,'L');
//$pdf->cell(45,7,':',0,0,'L');
//$pdf->Ln(4);
if($tipopedido!='002'){
$pdf->cell(29,7,'Lugar de entrega',0,0,'L');
$html=':Almacen Zgroup (Av Nestor Gambeta km 7 s/n a media cuadra de paradero Bayer (puente)) <A HREF="https://www.google.com.pe/maps/place/ZGROUP+SAC/@-11.9816981,-77.1247262,17z/data=!3m1!4b1!4m2!3m1!1s0x9105cdc090890995:0x9f144be70d5f6763">Google Maps</A>,';
}
//$html=utf8_encode($fila['c_lugent']);
//$pdf->Image('cabecera.png',180,10,30,0,'','http://www.fpdf.org');
//$pdf->SetLink($link);
$pdf->WriteHTML($html);
//$pdf->cell('Clik aqui',10,10,30,0,'','http://www.fpdf.org');
//$pdf->cell(45,7,':'.'ALMACEN ZGROUP (Av Nestor Gambeta km 7 s/n Paradero Balanza)',0,0,'L');
//$pdf->Link(10,8,10,10,"http://www.recetasparatodos.com.es");
$pdf->Ln(6); 
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->Cell(180,3,'OBSERVACIONES',1,1,'C','true'); 
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
$pdf->WriteHTML(($resultado3));
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
//$pdf->SetTextColor(24,53,93);
//$pdf->SetFillColor(24,53,93);
$pdf->SetFont('Arial','B',7);
$pdf->cell(25,7,utf8_decode('-El Cliente deberá Presentar Orden de Compra y/o Orden de Servicio para la aprobación de la cotización.'),0,0,'L');

//requisito alquiler
if($xtipo=='017'){
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
$pdf->cell(25,7,utf8_decode('-Letra, cheque o carta fianza solidaria irrevocable, incondicional de realización automática sin Beneficio de exclusión.'),0,0,'L');
}
//fin alquiler
//para venta contenedor y generador

if($xtipo=='001' || $xtipo=='017' ){
	if($ztipo=='002' || $ztipo=='003' || $ztipo=='012'){
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
$pdf->cell(90,3,utf8_decode(' transformador de 220 a 440 vac  o 338 a 440 vac.'),0,0,'L');
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
}
$pdf->Ln();
//fin venta

// en caso se venta de otros producto dry modulo 
if($ztipo=='001' || $ztipo=='015' || $ztipo=='016' || $ztipo=='004' || $ztipo=='012'){
$pdf->SetFont('Arial','',7);
$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->cell(180,3,'BENEFICIOS',1,0,'C','true');
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


//$pdf->SetTextColor(0,0,0);
//$pdf->SetDrawColor(24,53,93);
////$pdf->SetTextColor(255,255,255);
//$pdf->SetFillColor(24,53,93);
//$html='<table border="3" style="border-color:#009">
//<tr>
//<td width="500" height="30">cell 1</td><td width="500" height="30" bgcolor="#D0D0FF">cell 2</td>
//</tr>
//<tr>
//<td width="500" height="30">cell 3</td><td width="500" height="30">cell 4</td>
//</tr>
//</table>';

//$pdf->WriteHTML($html);
//$pdf->WriteHtmlCell(70, $html);

$pdf->Ln();
//$pdf->Cell(180,3,'BENEFICIOS',1,1,'C','true'); 
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',7);
//$pdf->WriteHTML(utf8_decode($c_obsped));

$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);
$pdf->Cell(180,3,'CUENTAS CORRIENTES ZGROUP',1,1,'C','true'); 
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
$pdf->cell(25,3,'3812201',1,0,'L');
$pdf->cell(35,3,'009-081-000003812201-16',1,0,'L');

$pdf->ln(3);
$pdf->cell(15,3,'Detraccion',1,0,'L');
$pdf->cell(15,3,'Nacion',1,0,'L');
$pdf->cell(15,3,'Soles',1,0,'L');
$pdf->cell(25,3,'000-30011740',1,0,'L');
$pdf->cell(35,3,'',1,0,'L');

$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(0,0,0);

$cabecera="select * from userdet where c_udni='$usuario' or c_login='$usuario'";
$cab = odbc_exec($cid,$cabecera);
$fila = odbc_fetch_array($cab);
	$ven=$fila['c_nombre'];
	$cargo=$fila['c_cargo'];
	$telefono1='Central Telf. '.$fila['c_fono1'];
	$telefono2='Central Telf. '.$fila['c_fono2'];
	$telefono3='RPM '.$fila['c_fono3'];
	$telefono4='MOVIL '.$fila['c_fono4'];
	$correo='CORREO '.$fila['c_correo'];

	
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

$pdf->cell(8,7,''.$telefono3,0,0,'L');
$pdf->Ln(3);

$pdf->cell(8,7,''.$telefono4,0,0,'L');
$pdf->Ln(3);

$pdf->cell(8,7,''.$correo,0,0,'L');
$pdf->Ln(3);
$asunto=$fila['c_asunto'];
$coti=$ncoti;
//$c_nomcli='LUIS CRUZADO';
$archivo=$coti.' - '.$asuntocot.' - '.$nomcli;
$pdf->Output($archivo.'.pdf', 'I');
?>