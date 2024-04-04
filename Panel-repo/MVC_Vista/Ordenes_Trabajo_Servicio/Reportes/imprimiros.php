<?php
ini_set('error_reporting',0);//para xamp
require('mysql_table.php');
require('dbconex.php');
$c_numos=$_REQUEST['c_numos'];
class PDF extends PDF_MySQL_Table
{
var $widths;
var $aligns;
function SetWidths($w)
{
	$this->widths=$w;
}

function SetAligns($a)
{
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
$cabecera="select cabos.c_numos as os,* ,pr_tele,pr_emai,pr_resp
			from (cabos 
			inner join detos on  cabos.c_numos=detos.c_numos)
			inner join promae on promae.pr_ruc=cabos.c_codprov 
			where cabos.c_numos='$c_numos'";
$cab = odbc_exec($cid,$cabecera);
$fila = odbc_fetch_array($cab);
//n_bruto,n_totigv,n_totos
$xsbt=$fila['n_bruto'];
$xigvz=$fila['n_totigv'];
$xbi=$fila['n_totos'];
$pdf->SetFont('Arial','',8);
$usuario=$fila['c_opcrea'];
$descuento=$fila['n_dscto'];
$imagprd=$fila['c_codtit'];
$c_numos=$fila['os'];
$c_nomprov=$fila['c_nomprov'];
if($fila['c_codmod']=='0'){
	$moneda='SOLES';
	}else{
	$moneda='DOLARES AMERICANOS';	
		}
//$pdf->SetFillColor(150,25,0);
//$pdf->SetFillColor(0,225,0);
/* CLIENTE */
// 
//$pdf->Code39(106, 2, $fila['c_numped']);
$text='Fecha y Hora Impresion :';
$pdf->Cell(180,7,$text.date("d/m/Y H:i:s"),0,0,'R');
$pdf->Image('cabeceraos.png',10,10,185);
$pdf->Ln(30);
//
$variable2 = explode ('-',substr($fila['d_fecos'],0,10)); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];

$pdf->Cell(180,10,utf8_decode('ORDEN DE SERVICIO NRO *:'.' '.$fila['os'].'          '.'DCTO REF.'.':'.$fila['c_refcoti'].'                     FECHA EMISION :'.$fecha2),0,1,'C'); 
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Cell(180,7,'DATOS DEL PROVEEDOR..:'.utf8_decode($fila['c_numped']),1,1,'L','true'); 
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,7,'RAZON SOCIAL..   :'.utf8_decode($fila['c_nomprov']),1,1,'L'); 
/* $pdf->Cell(2,7,'RUC     	        	       :'.utf8_decode($fila['c_codprov'].'    CONTACTO:'.$fila['c_contacto']),0,1,'L');  */

//http://192.168.0.5:2531/Panel-repo/MVC_Controlador/OrdenTrabajoC.php?acc=verimpresionpdf&os=1000002461
$pdf->SetWidths(array(22,95,23,40));
$pdf->SetAligns(array('L','L'));
$pdf->SetFont('Arial','',8);
$pdf->SetDrawColor(255,255,255); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetAligns(array('C','C'));
				$pdf->Row(array('RUC',utf8_decode($fila['c_codprov']),'TELEFONO',utf8_decode($fila['pr_tele'])));
				$pdf->Row(array('EMAIL',utf8_decode($fila['pr_emai']),'CONTACTO',utf8_decode($fila['pr_resp'])));
$pdf->Ln();				


//$pdf->Cell(1,7,'FECHA EMISION :'.$fecha2,0,1,'L');
//$pdf->Cell(2,7,'CONTACTO		       :'.$fila['c_contacto'],0,1,'L'); 


//imagenes cotizacion.
/*$pdf->Image('imgprd/'.$imagprd.'.png',176,95,20);
$pdf->Image('imgprd/'.$imagprd.'.jpg',24,105,65);*/



//$pdf->WriteHTML(utf8_decode($c_desgral));

$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Cell(180,7,'DETALLE DE SERVICIO:',1,1,'L','true'); 
/*$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);*/
$pdf->SetTextColor(0,0,0);
$pdf->Ln(5); 


$pdf->SetWidths(array(112, 23, 22, 23, 20));
$pdf->SetAligns(array('L','R','R','R','L'));
	$pdf->SetFont('Arial','',8);
	$pdf->SetDrawColor(255,255,255); 
	$pdf->SetDrawColor(0,0,0);
  $pdf->SetFillColor(255,255,255);
//$pdf->SetFillColor(24,53,93);
	$pdf->SetTextColor(0,0,0);
	
	
/*$pdf->SetDrawColor(24,53,93);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(24,53,93);*/

	
	//$pdf->SetTextColor(255,255,255);
		for($i=0;$i<1;$i++)
			{
				$pdf->SetAligns(array('C','C','C','C','L'));
				$pdf->Row(array('DESCRIPCION', 'PRECIO UNIT.', 'CANTIDAD', 'IMPORTE'));
			}
	
	//$historial = $con->conectar();	
	$strConsulta = "select cabos.c_numos as os,* from cabos,detos where cabos.c_numos='$c_numos' and cabos.c_numos=detos.c_numos";
	
	//$historial = mysql_query($strConsulta);
	//$numfilas = mysql_num_rows($historial);
	
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
	
//	for ($i=0; $i<$numfilas; $i++)
//		{
//			$resultado = odbc_fetch_array($historial);
///*			$pdf->SetFont('Arial','',10);
//			$pdf->SetFillColor(153,255,153);
//    			$pdf->SetTextColor(0);*/
//				$desc=utf8_decode($resultado['c_desprd'].' '.$resultado['c_descr2']);
//				$pdf->Row(array('SSS','SSSS','SSSSS','SSSS'));
//			
//			
//		}
while($resultado = odbc_fetch_array($historial)){ 
$i=1;
$c_swfirma=$resultado['c_swfirma'];
$zglos=utf8_decode($resultado['c_descr2']);
$glos=strtr(strtoupper($zglos),"àèìòùáéíóúçñäëïöü?","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜÑ");
$xglos = strtr(strtoupper($glos),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
if($resultado['c_tipped']=='017' && $resultado['c_codcont']!=NULL){
	$gl='SERV. ALQUILER';
	$des=$gl.' '.$resultado['c_desprd'].'-'.$xglos.' CODIGO:'.$cod=substr($resultado['c_codcont'],2,20).'Periodo'.$resultado['c_fecini'].' AL '.$resultado['c_fecfin'];
	}elseif($resultado['c_codcont']!=NULL){
	$gl='';	
	$des=$gl.' '.$resultado['c_desprd'].' '.$xglos.' CODIGO:'.$cod=substr($resultado['c_codcont'],2,20);
		}else{
			$gl='';	
	$des=$gl.' '.$resultado['c_desprd'].' '.$resultado['c_glosa'];	
			}
$pre=number_format($resultado['n_preprd'],2);
$cant=number_format($resultado['n_canprd'],2);
$tot=number_format($resultado['n_totimp'],2);
$pdf->SetAligns(array('L','R','R','R','L'));
$pdf->Row(array($des,$pre,$cant,$tot));
///si esta afecto a igv 
if($xigvz!='0'){
$xst+=$resultado['n_totimp'];
$xigv=$xst*1.18;

$igv=$xigv-$xst;
$total=$xst+$igv;
}else{
$xst+=$resultado['n_totimp'];
$xigv=$xst*1;

$igv=$xigv-$xst;
$total=$xst+$igv;
	
	}

$i++;
}


$pdf->Ln(); 
$d=$total-$dscto;
$pdf->Ln(); 

$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,7,'DETALLE DE PAGO:',1,0,'L');
$pdf->cell(90,7,'SUB TOTAL'.' :'.$xsbt,1,0,'R');
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,7,'CONDICION : '.$fila['c_forpag'],1,0,'L');
$pdf->cell(90,7,'IGV (18%)'.' :  '.$xigvz,1,0,'R');
$pdf->Ln();
$pdf->cell(90,7,'MONEDA      : '.$moneda,1,0,'L');
$pdf->cell(90,7,'TOTAL'.' :'.$xbi,1,0,'R');
$pdf->Ln();
$pdf->Ln();//if($fila['c_precios']=='001'){$mon='NO INCLUYE IGV';}else{$mon='INCLUYE IGV';}

$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Cell(180,7,'OBSERVACIONES',1,1,'C','true'); 
$pdf->SetTextColor(0,0,0);
//$pdf->nl2br((utf8_decode($fila['c_desgral'])));
//$pdf->cell(100,7,utf8_decode($fila['c_obs']),1,0,'C');
$obs=$fila['c_obs'];
//$pdf->cell(100,7,$c_desgral,1,0,'C');
$pdf->WriteHTML(utf8_decode($obs));

$pdf->Ln(); 
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Cell(180,7,'IMPORTANTE',1,1,'C','true'); 
$pdf->SetTextColor(0,0,0);


$pdf->WriteHTML(utf8_decode('
- EL NÚMERO DE LA PRESENTE ORDEN DEBE FIGURAR EN SU FACTURA; PARA LOS PROVEEDORES QUE EMITEN FACTURAS A TRAVES DE CLAVE SOL (SUNAT) POR AHORA DEBERAN DE ASIGNAR EN PARTE DE OBSERVACIONES CONDICION DE PAGO.<br />
FORMA DE PAGO: CONTADO O CREDITO. <br />
SI LA FORMA DE PAGO ES CREDITO: DIAS DE CREDITO, MONTO A PAGAR Y FECHA VENCIMIENTO.<br />
- PARA LA ACEPTACIÓN DE SU FACTURA DEBERÁ ENVIAR POR CORREO EL PRESENTE DOCUMENTO, GUIA ELECTRONICA, XML, CDR; SI TUVIESE GUIA FISICA ACERCARSE A LA OFICINA PARA LA ENTREGA DE SU FACTURA Y GUIA CORRESPONDIENTE.<br />
SE RECUERDA QUE LA DOCUMENTACION TENDRÁ QUE SER ENVIADA POR CORREO proveedores@zgroup.com.pe Y A NUESTRAS OFICINAS SI FUESE EL CASO. <br />
ZGROUP NO SE RESPONSABILIZA POR DEMORA EN EL PAGO POR ERROR DOCUMENTARIO POR PARTE DEL PROVEEDOR. <br />
- PARA ENTREGA DE SU MERCADERÍA O PRESTACIÓN DE SERVICIO ES INDISPENSABLE LA PRESENTACION DEL PRESENTE DOCUMENTO. <br />
-RECEPCION DE FACTURAS TODOS LOS JUEVES DE 2PM A 5PM. <br />
-LUGAR RECEPCION: OFICINA ADMINISTRATIVA (Cal. Ordoner Vargas 142 VillasSol - Los Olivos)<br />
 CONTACTO: NORMA VELASQUEZ  <br />
 - ATENCION DE LLAMADAS DE PROVEEDORES - MIERCOLES 2:30 PM A 5:30 PM. <br />
CELULAR: 970583695 <br />
CORREOS: finanzas@zgroup.com.pe / proveedores@zgroup.com.pe / galfaro@zgroup.com.pe
'));

$pdf->Ln(); 
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(); 

//$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,7,'GENERADO : '.$fila['c_opcrea'],1,0,'C');

$pdf->cell(90,7,'AUTORIZADO : '.$fila['c_uaprob'],1,0,'C');
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

$pdf->cell(90,20,'',1,0,'C');

$pdf->cell(90,20,'',1,0,'C');

//$pdf->Ln();





$archivo=$c_numos.' - '.$c_nomprov;
$pdf->Output($archivo.'.pdf', 'I');


?>