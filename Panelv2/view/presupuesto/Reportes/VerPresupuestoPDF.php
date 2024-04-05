<?php 
require('TCPDF/tcpdf.php');
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 15, 10, 45, '', 'PNG', '', 'T', false, 200, '', false, false, 0, false, false, false);
		
		

    }
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Calle Ordoner Vargas Nro 142 - Urb. Villasol Lima - Los Olivos - Perú', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
function reemplazaMe($text) {
utf8_encode($text);
$codigo= array("&AACUTE;","&EACUTE;","&IACUTE;","&OACUTE;","&UACUTE;","&UUML;","&NTILDE;","&DEG;");
$cambiar = array("Á","É","Í","Ó","Ú","ü","Ñ","°");
$text = str_replace($codigo, $cambiar, $text);
$text= strtoupper($text);
//$text = ereg_replace("[^A-Za-z0-9-]", "", $text);
return $text;
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------
// set font
$pdf->SetFont('times', 'BI', 12);
// add a page
$pdf->AddPage();

// set some text to print
$Id_cabpre=$_REQUEST['IdCab'];

$CabPresupuesto=$this->model->PresupuestoImprimirCabxId($Id_cabpre);
	$i=0;
	foreach($CabPresupuesto as $item){
	$i++;
	$TipoComprobante='PRESUPUESTO';
	$Id_cabpre=$item->Id_cabpre;
	$FechaComprobante=$item->Fecha_ingreso;
	$Eir_Cliente=utf8_decode($item->Numeir." - ".$item->cc_razo);
	$Producto=$item->in_arti;
	$Modelo=($item->Modelo=="")? " --  ":$item->Modelo;
	$Serie=$item->Serie_producto;
	$Built_year=($item->Built_year=="")?"  --  ":$item->Built_year;
	$Refrigerant=($item->Refrigerant=="")?"  --  ":$item->Refrigerant;
	$PtiDate=$item->PtiDate;//
	$Equipment=($item->Equipment=="")?"  --  ":$item->Equipment;
	$Ambient=($item->Ambient=="")?"  --  ":$item->Ambient;
	$SetPoint=($item->SetPoint=="")?"  --  ":$item->SetPoint;
	$Sub_Soles=number_format($item->Sub_Soles,2);
	$Sub_Dolares=number_format($item->Sub_Dolares,2);
	$Total_soles=number_format($item->Total_soles,2);
	$Total_Dolares=number_format($item->Total_Dolares,2);
	$IgvS=number_format($item->IgvS,2);
	$IgvD=number_format($item->IgvD,2);
    }


	


    $pdf->Cell(110);
    $pdf->Cell(80,5,"",'LRT',0,'L',1);
    $pdf->Ln(5);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFont('helvetica','B',12);
    $pdf->Cell(110);
    $pdf->Cell(80,5,('RUC:20601423619'),'LR',0,'C',1);
	$pdf->SetFont('helvetica','B',8);
    $pdf->Ln(5);
	$pdf->SetFont('helvetica','B',12);
    $pdf->Cell(110);
    $pdf->Cell(80,5,($TipoComprobante),'LR',0,'C',1); //COLOCAR EL TIPO DE DOCUMENTO
	$pdf->SetFont('helvetica','B',8);
    $pdf->Ln(5);
	$pdf->SetFont('helvetica','B',12);
	$pdf->Cell(110);
    $pdf->Cell(80,5,("N°:".$Id_cabpre),'LR',0,'C',1);
    $pdf->Ln(5);		



    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);	

    $pdf->Cell(110);
    $pdf->Cell(80,5,"",'LRB',0,'L',1);

	$style = array(
    'border' => false,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 2, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);					
		
//////////////////////////////DATOS DE CABECERA/////////////////////////////	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',9);
	$pdf->Ln(1);
    $pdf->Cell(1);
    $pdf->Cell(25,4,"Fecha",0,0,'L',0);
	$pdf->Cell(150,4,":".date("d-m-Y", strtotime($FechaComprobante)),0,0,'L',0);	
	$pdf->Ln(6);
	
	$pdf->Cell(1);
    $pdf->Cell(25,4,("EIR-CLIENTE"),0,0,'L',0);
	$pdf->Cell(150,4,":".$Eir_Cliente,0,0,'L',0);	


	$pdf->Cell(1);
    $pdf->Cell(25,4,(""),0,0,'L',0);
	$pdf->Cell(86,4,"",0,0,'L',0);
	$pdf->Ln(6);
	
    $pdf->Cell(1);
    $pdf->Cell(25,4,"PRODUCTO",0,0,'L',0);
	$pdf->Cell(86,4,":".$Producto,0,0,'L',0);
	
	
	$pdf->Cell(25,4,"MODELO",0,0,'L',0);
	$pdf->Cell(86,4,":".$Modelo,0,0,'L',0);	
	$pdf->Ln(6);
	
	   

    $pdf->Cell(1);
    $pdf->Cell(25,4,"UNIT SERIAL",0,0,'L',0);
	$pdf->Cell(84,4,":".$Serie,0,0,'L',0);	

    $pdf->Cell(1);
    $pdf->Cell(26,4,"BUITL YEARD",0,0,'L',0);
	$pdf->Cell(86,4,":".$Built_year,0,0,'L',0);	
	$pdf->Ln(6);
	
	$pdf->Cell(1);
    $pdf->Cell(25,4,"REFRIGERANT",0,0,'L',0);
	$pdf->Cell(84,4,":".$Refrigerant,0,0,'L',0);

    $pdf->Cell(1);
    $pdf->Cell(26,4,"PTI-DATE",0,0,'L',0);
	$pdf->Cell(86,4,":".date("d-m-Y", strtotime($PtiDate)),0,0,'L',0);	
	$pdf->Ln(6);
	
 	$pdf->Cell(1);
    $pdf->Cell(25,4,"EQUIP. BRAND",0,0,'L',0);
	$pdf->Cell(84,4,":".$Equipment,0,0,'L',0);	

    $pdf->Cell(1);
    $pdf->Cell(26,4,"AMBIENT TEMP",0,0,'L',0);
	$pdf->Cell(86,4,":".$Ambient,0,0,'L',0);	
	$pdf->Ln(6);

	$pdf->Cell(1);
    $pdf->Cell(25,4,"SET POINT",0,0,'L',0);
	$pdf->Cell(84,4,":".$SetPoint,0,0,'L',0);	//SetPoint

	
	$pdf->Ln(6);
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','',8);
    $pdf->Cell(190,4,"",0,0,'L',0);


//ahora mostramos las lneas de la factura
	$pdf->Ln(5);		
	$pdf->Cell(1);
	$pdf->SetFillColor(199,197,198);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);
    $pdf->Cell(10,5,"Item",1,0,'C',1);
	$pdf->Cell(70,5,"Descripción",1,0,'C',1);
	$pdf->Cell(14,5,"Unidad",1,0,'C',1);
	$pdf->Cell(16,5,"Cantidad",1,0,'C',1);
	
	$pdf->Cell(20,5,"P. Soles",1,0,'C',1);
	$pdf->Cell(20,5,"P. Dolares",1,0,'C',1);
	$pdf->Cell(20,5,"Importe S.",1,0,'C',1);
	$pdf->Cell(20,5,"Importe D.",1,0,'C',1);
	$pdf->Ln(5);				
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','',9);
	
	
	$contador=1;
	$lineas =0;
	$i=0;
$DetPresupuesto=$this->model->PresupuestoImprimirDetxId($Id_cabpre);
	foreach($DetPresupuesto as $item){
	$i++;		
	  $pdf->Cell(1);
	  $contador++;
	  $descripcion=$item->descripcion;
	  $unidad_Medida=$item->unidad_Medida;
	  $Cantidad=$item->Cantidad;
	  $Precio_soles=$item->Precio_soles;
	  $Precio_Dolares=$item->Precio_Dolares;
	  $T_dolares=$item->T_dolares;
	  $T_soles=$item->T_soles;
	  $pdf->Cell(10,5,$i,'LR',0,'C');
	  if($descripcion<>''){
		$pdf->MultiCell(70, 5,$descripcion."\n", 0, 'J', 0, 0, '' ,'', true);  
	  }else{
		$pdf->MultiCell(70, 5,$descripcion, 0, '', 0, 0, '' ,'', true);  
	  }
	  //$pdf->MultiCell(82, 5,$c_desprd.' ('.$c_glosa.')'."\n", 0, 'J', 0, 0, '' ,'', true);
	  $pdf->Cell(14,5,$unidad_Medida,'LR',0,'C');
	  $pdf->Cell(16,5,number_format($Cantidad,2),'LR',0,'R');
	  $pdf->Cell(20,5,number_format($Precio_soles,2),'LR',0,'R');
	  $pdf->Cell(20,5,number_format($Precio_Dolares,2),'LR',0,'R');
	  $pdf->Cell(20,5,number_format($T_soles,2),'LR',0,'R');
	  $pdf->Cell(20,5,number_format($T_dolares,2),'LR',0,'R');
	  	  
	  $pdf->Ln(5);
	  //vamos acumulando el importe
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	}
	while ($contador<3)
	{
	  $pdf->Cell(1);
      $pdf->Cell(10,5,"",'LR',0,'C',0);
      $pdf->Cell(70,5,"",'LR',0,'C',0);
	  $pdf->Cell(14,5,"",'LR',0,'C',0);
	  $pdf->Cell(16,5,"",'LR',0,'C',0);
	  $pdf->Cell(20,5,"",'LR',0,'C',0);
	  $pdf->Cell(20,5,"",'LR',0,'C',0);
	  $pdf->Cell(20,5,"",'LR',0,'C',0);
	  $pdf->Cell(20,5,"",'LR',0,'C',0);
	  $pdf->Ln(5);	
	  $contador=$contador +1;
	}
	  $pdf->Cell(1);
 	  $pdf->Cell(10,5,"",'LR',0,'L',0);
      $pdf->Cell(70,5,"",'LR',0,'L',0);
	  $pdf->Cell(14,5,"",'LR',0,'L',0);
	  $pdf->Cell(16,5,"",'LR',0,'L',0);
	  $pdf->Cell(20,5,"",'LR',0,'L',0);
	  $pdf->Cell(20,5,"",'LR',0,'L',0);
	  $pdf->Cell(20,5,"",'LR',0,'L',0);
	  $pdf->Cell(20,5,"",'LR',0,'C',0);
	//ahora mostramos el final de la factura	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',8);   
	
	$pdf->Ln(4);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','',8);

	$pdf->Cell(1);
    $pdf->Cell(10,4,"",1,0,'L',1);
	$pdf->Cell(70,4,"",1,0,'L',1);
	$pdf->Cell(14,4,"",1,0,'L',1);
	$pdf->Cell(16,4,"",1,0,'L',1);
	$pdf->Cell(20,4,"",1,0,'L',1);
	$pdf->Cell(20,4,"",1,0,'L',1);
	$pdf->Cell(20,4,"",1,0,'R',1);
	$pdf->Cell(20,4,"",1,0,'R',1);
	
	$pdf->Ln(4);
	$pdf->Cell(1);
    $pdf->Cell(10,4,"",0,0,'L',0);
	$pdf->Cell(70,4,"",0,0,'L',0);
	$pdf->Cell(14,4,"",0,0,'L',0);
	$pdf->Cell(16,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"Sub Total "."",1,0,'L',1);
	$pdf->Cell(20,4,$Sub_Soles,1,0,'R',1);
	$pdf->Cell(20,4,$Sub_Dolares,1,0,'R',1);
	
	/* $pdf->Ln(4);
	$pdf->Cell(1);
    $pdf->Cell(10,4,"",0,0,'L',0);
	$pdf->Cell(70,4,"",0,0,'L',0);
	$pdf->Cell(14,4,"",0,0,'L',0);
	$pdf->Cell(16,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"Descuento "."",1,0,'L',1);
	$pdf->Cell(20,4,'Monto Sol',1,0,'R',1);
	$pdf->Cell(20,4,'Monto Dol',1,0,'R',1); */
	//$pdf->Cell(20,4,number_format($descuento,2),1,0,'R',1);
	
	$pdf->Ln(4);
	$pdf->Cell(1);
    $pdf->Cell(10,4,"",0,0,'L',0);
	$pdf->Cell(70,4,"",0,0,'L',0);
	$pdf->Cell(14,4,"",0,0,'L',0);
	$pdf->Cell(16,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"Igv ",1,0,'L',1);
	$pdf->Cell(20,4,$IgvS,1,0,'R',1);
	$pdf->Cell(20,4,$IgvD,1,0,'R',1);

	$pdf->Ln(4);//
	
	$pdf->Cell(1);
    $pdf->Cell(10,4,"",0,0,'L',0);
	$pdf->Cell(70,4,"",0,0,'L',0);
	$pdf->Cell(14,4,"",0,0,'L',0);
	$pdf->Cell(16,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"",0,0,'L',0);
	$pdf->Cell(20,4,"Gran Total "."",1,0,'L',1);
		
	$pdf->Cell(20,4,$Total_soles,1,0,'R',1);
	$pdf->Cell(20,4,$Total_Dolares,1,0,'R',1);

	
/* 	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',8);
	$pdf->Ln(6);
	$pdf->Ln(3); */
	//*****TERMINOS Y CONDICIONES*******///
/* 	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(20,4,"TERMINOS Y CONDICIONES ",0,0,'L',0);
	$pdf->Cell(80,4,"",0,0,'L',0);	
	
	$pdf->Cell(20,4,"CUENTAS BANCARIAS ",0,0,'L',0);
	$pdf->Cell(80,4,"",0,0,'L',0);	
	
	$pdf->Ln(2);
	


	$pdf->Cell(1);
    $pdf->Cell(20,4,(""),0,0,'L',0);
	$pdf->Cell(80,4,"",0,0,'L',0);
	$pdf->Ln(6);
	
    $pdf->Cell(1);
    $pdf->Cell(20,4,"Moneda",0,0,'L',0);
	$pdf->Cell(80,4,":"."ss",0,0,'L',0);
	
	
	
	 $pdf->Cell(1);
    $pdf->Cell(20,4,"BCP DOLARES: 290-2284062-1-34",0,0,'L',0);

	
	
	$pdf->ln(6);
    $pdf->Cell(1);
    $pdf->Cell(20,4,"Vigencia",0,0,'L',0);

	
		 $pdf->Cell(1);
    $pdf->Cell(20,4,"BCP SOLES: 290-2354095-0-28",0,0,'L',0);
	
	$pdf->ln(6);
	
    $pdf->Cell(1);
	$pdf->Cell(20,4,"Forma Pago",0,0,'L',0);

	$pdf->Ln(6);
	

	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','',8);
    $pdf->Cell(190,4,"",0,0,'L',0);
	
	 */
	
	
	//***FIRMA DEL EMPLEADO**///
	/* $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);
	$pdf->Ln(2);
    $pdf->Cell(1);
    $pdf->Cell(30,4,'Atentamente,',0,0,'L',0);

	$pdf->Ln(6);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);
	$pdf->Ln(2);
    $pdf->Cell(1);

	
	$pdf->Ln(3);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);
	$pdf->Ln(2);
    $pdf->Cell(1);
    $pdf->Cell(30,4,'Foodz Export',0,0,'L',0);
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);


	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('helvetica','B',10);
	$pdf->Ln(4);
    $pdf->Cell(1);
 */

//Close and output PDF document
$pdf->Output($Eir_Cliente.'-'.$Eir_Cliente.'.pdf', 'I');
?> 