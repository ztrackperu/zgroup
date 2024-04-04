<?php
ini_set('error_reporting',0);//para xamp
require('mysql_table.php');
require('dbconex.php');



$c_numeoc=$_GET["os"];

//$nro=$coti;
//$GLOBALS[$nro];<a href="mysql_table.php">mysql_table.php</a>
//
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
$pdf->SetMargins(15,10); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();
$cabecera="select cabeoc.c_numeoc as os,centro_costo.descripcion,* ,pr_tele,pr_emai,pr_resp,pr_cuenta,tab_banc.tb_nomb
			from ((((cabeoc
			inner join detaoc on cabeoc.c_numeoc=detaoc.c_numeoc)			
			left join centro_costo on cabeoc.c_costo=centro_costo.id_ccosto)
			inner join promae on promae.pr_ruc=cabeoc.c_codprv) 
			left join tab_banc on tab_banc.tb_codi=promae.pr_banco)
			where cabeoc.c_numeoc='$c_numeoc'";
$cab = odbc_exec($cid,$cabecera);
$fila = odbc_fetch_array($cab);
$pdf->SetFont('Arial','',8); 
$c_numeoc=$fila['os'];
$c_codprv=$fila['c_codprv'];
$c_nomprv=$fila['c_nomprv'];
$c_oper=$fila['c_oper'];
$d_fecoc=$fila['d_fecoc'];
$n_bruafe=$fila['n_bruafe'];
$n_desafe=$fila['n_desafe'];
$n_netafe=$fila['n_netafe'];
$n_igvafe=$fila['n_igvafe'];
$n_totoc=$fila['n_totoc'];
$n_tcoc=$fila['n_tcoc'];


$pr_tele=$fila['pr_tele'];
$pr_emai=$fila['pr_emai'];
$pr_resp=$fila['pr_resp'];
$pr_cuenta=$fila['pr_cuenta'];
$tb_nomb=$fila['tb_nomb'];

if($fila['c_codmon']=='0'){
	$moneda='SOLES';
	}else if($fila['c_codmon']=='1'){
	$moneda='DOLARES AMERICANOS';	
		}
	else if($fila['c_codmon']=='4'){
	$moneda='EUROS';	
		}
$c_deslug=$fila['c_deslug'];
$text='Fecha y Hora Impresion :';
$pdf->Cell(180,7,$text.date("d/m/Y H:i:s"),0,0,'R');
$pdf->Image('zgroup.png',10,10,65);
$pdf->Ln(18);
$pdf->Cell(185,10,utf8_decode('RUC:20521180774'));
$pdf->Ln(4);
$variable2 = explode ('-',substr($fila['d_fecoc'],0,10)); //división de la fecha utilizando el separador -
//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];
$pdf->Cell(180,10,utf8_decode('ORDEN DE COMPRA NRO:'.' '.$fila['os'].'          '.' DCTO REF. :'.' '.$fila['c_refcoti'].'          '.' FECHA EMISION :'.$fecha2),0,1,'C'); 
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Cell(180,7,'DATOS DEL PROVEEDOR    :',1,1,'L','true'); 
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,7,'RAZON SOCIAL '.':'.utf8_decode($fila['c_nomprv']),1,1,'L'); 
/*
 $pdf->Cell(2,7,'RUC                    '.':'.utf8_decode($fila['c_codprv']),0,1,'L'); 
$pdf->Cell(2,7,'TELEFONO        '.':'.utf8_decode($fila['pr_tele']),0,1,'L'); 
$pdf->Cell(2,7,'EMAIL            '.':'.utf8_decode($fila['pr_emai']),0,1,'L'); 
$pdf->Cell(2,7,'CONTACTO'        .':'.utf8_decode($fila['pr_resp']),0,1,'L'); 
 */
$pdf->SetWidths(array(22,95,23,40));
$pdf->SetAligns(array('L','L'));
$pdf->SetFont('Arial','',8);
$pdf->SetDrawColor(255,255,255); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
if($fila['c_costo']==""){
	$ccosto="-";
}
else{
	$ccosto=$fila['descripcion'];
}
$pdf->SetAligns(array('C','C'));
				$pdf->Row(array('RUC',utf8_decode($fila['c_codprv']),'TELEFONO',utf8_decode($fila['pr_tele'])));
				$pdf->Row(array('EMAIL',utf8_decode($fila['pr_emai']),'CONTACTO',utf8_decode($fila['pr_resp'])));
				$pdf->Row(array('BANCO',utf8_decode($fila['tb_nomb']),'CUENTA',utf8_decode($fila['pr_cuenta'])));
				$pdf->Row(array('C.COSTO',utf8_decode($ccosto)));
$pdf->Ln();				
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Cell(180,7,'DETALLE DE COMPRA:',1,1,'L','true'); 
/*$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);*/
$pdf->SetTextColor(0,0,0);
$pdf->Ln(5); 
$pdf->SetWidths(array(23,50, 33, 10, 10,22,10,22,22));
$pdf->SetAligns(array('L','L','L','R','R','R','R','R','L'));
$pdf->SetFont('Arial','',8);
$pdf->SetDrawColor(255,255,255); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
//$pdf->SetFillColor(24,53,93);
$pdf->SetTextColor(0,0,0);
		for($i=0;$i<1;$i++)
			{
				$pdf->SetAligns(array('C','C','C','C','C','C','C','C','L'));
				$pdf->Row(array('CODIGO','DESCRIPCION','SERIE EQUIPO', 'UM', 'CANT', 'PRECIO', '%', 'IMPORTE'));
			}
	
	//$historial = $con->conectar();	
	$strConsulta = "select cabeoc.c_numeoc as os,* from cabeoc,detaoc where cabeoc.c_numeoc='$c_numeoc' and cabeoc.c_numeoc=detaoc.c_numeoc";

	
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
	

while($resultado = odbc_fetch_array($historial)){ 
$i=1;

$cod=$resultado['c_codprd'];
$des=strtoupper($resultado['c_desprd'].' '.$resultado['c_obsdoc']);
$serie=strtoupper($resultado['c_nroserie']);
$um=strtoupper($resultado['c_codund']);
$pre=number_format($resultado['n_preprd'],3);
$cant=number_format($resultado['n_canprd'],2);
$dscto=number_format($resultado['n_dscto'],2);
$tot=number_format($resultado['n_totimp'],2);


$pdf->SetAligns(array('L','L','L','C','R','R','R','R','L'));
$pdf->Row(array($cod,$des,$serie,$um,$cant,$pre,$dscto,$tot));

$i++;
}

$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->Ln(5); //espacio

$strConsulta2 = "select  c_numitm, c_desitm,c_numeoc from dettabla,cabeoc where c_numitm=c_codpag and c_codtab='CPG'  and c_numeoc='$c_numeoc' ";
	
	$historial2 = odbc_exec($cid,$strConsulta2);
	//$numfilas=odbc_num_rows($historial2);
	
$despag="";
while($res = odbc_fetch_array($historial2)){ 
$i=1;

$codpag=$res['c_numitm'];
$despag=$res['c_desitm'];
}


$pdf->cell(90,7,'DETALLE DE PAGO : ',1,0,'C');
$pdf->cell(90,7,'IMPORTE :	 '.$fila['n_bruafe'],1,0,'R');
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

$pdf->cell(90,7,'MONEDA : '.$moneda,1,0,'C');
$pdf->cell(90,7,'DESCUENTO : 	'.$fila['n_desafe'],1,0,'R');
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

$pdf->cell(90,7,'TIPO DE CAMBIO : '.$fila['n_tcoc'],1,0,'C');
$pdf->cell(90,7,'SUBTOTAL :	 '.$fila['n_netafe'],1,0,'R');
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

$pdf->cell(90,7,'CONDICION : '.$despag,1,0,'C');
$pdf->cell(90,7,'IGV :	 '.$fila['n_igvafe'],1,0,'R'); 
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

$pdf->cell(90,7,'',1,0,'C');
$pdf->cell(90,7,'TOTAL :	 '.$fila['n_totoc'],1,0,'R');
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

$pdf->Ln(5); 

$pdf->Cell(180,7,'DATOS DEL ENTREGA    :',1,1,'L','true'); 
$pdf->SetTextColor(0,0,0);
$pdf->Cell(2,7,'LUGAR     	   : '.utf8_decode($fila['c_lugent']),0,1,'L'); 

 
$variable2 = explode ('-',substr($fila['d_fecent'],0,10)); 
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];
$pdf->Cell(180,10,utf8_decode('FECHA ENTREGA : '.$fecha2),0,1,'L');

$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);

$pdf->Cell(180,7,'DATOS DEL TRANSPORTISTA    :',1,1,'L','true'); 
$pdf->SetTextColor(0,0,0);
$pdf->Cell(2,7,'RUC     	   : '.utf8_decode($fila['c_codtran']),0,1,'L'); 
$pdf->Cell(2,7,'NOMBRE     	   : '.utf8_decode($fila['c_nomtran']),0,1,'L'); 
//$pdf->Cell(2,7,'OBSERV.    	   : '.utf8_decode($fila['c_obsoc']),0,1,'L'); 
//$pdf->MultiCell(2, 7,'OBSERV.    	   : '.utf8_decode($fila['c_obsoc'])."\n", 0, 'J', 0, 0, '' ,'', true); 

//$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

// Multicell test

$pdf->MultiCell(180, 5, 'OBSERV.    	   : '."\n", 0, 'J', 0, 0, '' ,'', true);
$pdf->MultiCell(180, 5,utf8_decode($fila['c_obsoc'])."\n", 0, 'J', 0, 0, '' ,'', true);

$pdf->Ln(4);
$pdf->Cell(180,7,'CONSIDERACIONES IMPORTANTES',1,1,'C','true'); 
$pdf->SetTextColor(0,0,0);


$pdf->WriteHTML(utf8_decode('
- EL NÚMERO DE LA PRESENTE ORDEN, LA FORMA DE PAGO: CONTADO O CREDITO DEBE FIGURAR EN SU FACTURA. <br />
	SI LA FORMA DE PAGO ES CREDITO: DIAS DE CREDITO, MONTO A PAGAR Y FECHA VENCIMIENTO.<br />
- PARA LA ACEPTACIÓN DE SU FACTURA DEBERÁ ENVIAR POR CORREO EL PRESENTE DOCUMENTO, GUIA ELECTRONICA, XML, CDR; SI TUVIESE GUIA FISICA ACERCARSE A LA OFICINA PARA LA ENTREGA DE SU FACTURA Y GUIA CORRESPONDIENTE.
SE RECUERDA QUE LA DOCUMENTACION TENDRA QUE SER ENVIADA POR CORREO proveedores@zgroup.com.pe Y A NUESTRAS OFICINAS SI FUESE EL CASO.<br />
- SÍRVASE ATENDER LA CANTIDAD EXACTA INDICADA POR CADA PRODUCTO EN ESTA ORDEN DE COMPRA, NO SE ACEPTARÁN EXCEDENTES A LAS CANTIDADES APROBADAS EN ESTA ORDEN DE COMPRA. <br />
- RECEPCION DE FACTURAS TODOS LOS JUEVES DE 2PM A 5PM. <br />
- LUGAR RECEPCION: OFICINA ADMINISTRATIVA (Cal. Ordoner Vargas 142 VillasSol - Los Olivos). <br />
- ATENCION DE LLAMADAS DE PROVEEDORES - MIERCOLES 2:30 PM A 5:30 PM. <br />
	CONTACTO: NORMA VELASQUEZ <br />
	CELULAR: 970583695  <br />
	CORREOS: finanzas@zgroup.com.pe / proveedores@zgroup.com.pe / galfaro@zgroup.com.pe <br />
   
 '));

$pdf->Ln(); 
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(204,202,201);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(); 

//$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);

//$gen->WriteHTML('GENERADO POR: <br />');
$variable2 = explode ('-',substr($fila['d_fecoc'],0,10)); 
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];
$pdf->cell(90,7,'GENERADO : '.$fila['c_oper'].' EL '.$fecha2,1,0,'C');

if( $fila['n_swaprb'] == 2){
$variable2 = explode ('-',substr($fila['d_feaprb'],0,10)); 
$fecha3 = $variable2 [2].-$variable2 [1].-$variable2 [0];
$pdf->cell(90,7,'APROBADO POR : '.$fila['c_uaprb'].' EL '.$fecha2,1,0,'C');

}else{
	$pdf->cell(90,7,'ORDEN NO APROBADA  ',1,0,'C');
	
}
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,12,'',1,0,'C');
$pdf->cell(90,12,'',1,0,'C');
$pdf->Ln();



$archivo=$c_numeoc.' - '.$c_nomprv;
$pdf->Output($archivo.'.pdf', 'I');
//$pdf->Output();
?>