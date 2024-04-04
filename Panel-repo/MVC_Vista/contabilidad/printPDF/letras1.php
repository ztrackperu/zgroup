<?php
//header('Content-Type:application/pdf;charset=UTF-8');

require('dbconex.php');
$c_nume=$_GET['ot'];
$strConsulta="select * from letras where c_nume=$c_nume";
$historial = odbc_exec($cid,$strConsulta);
	

while($item = odbc_fetch_array($historial)){ 
$i=1;	
$c_numlet=$item["c_numlet"];
$c_numfac =$item["c_numfac"];
$variable = explode ('-',substr($item['d_fecemi'],0,10)); 
//Fecha de emision
$d_fecemi = $variable[2].-$variable[1].-$variable[0];
$c_lugarg=$item["c_lugarg"];

//Fecha de vencimiento
$variable2 = explode ('-',substr($item['d_fecven'],0,10)); 
$fecven = $variable2[2].-$variable2[1].-$variable2[0];
if($item['d_fecven']==""){
	$d_fecven='';	
}else{
	$d_fecven=$fecven;
}

$c_codmon=$item["c_codmon"];if($c_codmon=='0'){$moneda='S/';}else{$moneda='US$';}
$xn_implet=$item["n_implet"];

$n_implet= number_format($xn_implet,2);

$c_imppal=$item["c_imppal"];
//$c_nomcli=utf8_decode(utf8_decode($item["c_nomcli"]));
$c_nomcli=$item["c_nomcli"];
$c_dircli=$item["c_dircli"];
$c_telcli=$item["c_telcli"];
$c_doccli=$item["c_doccli"];

//$c_nomava=utf8_decode(utf8_decode($item['c_nomava']));
$c_nomava=$item['c_nomava'];
$c_docava=$item['c_docava'];
$c_telava=$item['c_telava'];
$c_dirava=$item['c_dirava'];
	$i++;
	}


//variable que guarda el nombre del archivo PDF
$archivo="letra-$c_numlet.pdf";

//Llamada al script fpdf
require('fpdf.php');


$archivo_de_salida=$archivo;

$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.



// Datos de la Letra
//$pdf->SetFont('Arial','B',10); //negrita
$pdf->SetFont('Arial','',9); 

//inicio primera fila el tamaño esta en mm
$top_ini = 24;
    $pdf->SetXY(37, $top_ini); //top 24mm y empieza en 37mm
    $pdf->Cell(21, 5, $c_numlet, 0, 1, 'C'); //widh 21mm,heigh 5mm
	
    $pdf->SetXY(60, $top_ini);
    $pdf->Cell(26, 5, $c_numfac, 0, 1, 'C');
	
	$pdf->SetXY(90, $top_ini);
    $pdf->Cell(23, 5, $c_lugarg, 0, 1, 'C');
	//
	$pdf->SetXY(120, $top_ini);
    $pdf->Cell(32, 5, $d_fecemi, 0, 1, 'C');
	
    $pdf->SetXY(150, $top_ini);
    $pdf->Cell(31, 5, $d_fecven, 0, 1, 'C');
	
    $pdf->SetXY(180, $top_ini);
    $pdf->Cell(30, 5, $moneda.' '.$n_implet, 0, 1, 'C');  
	//fin primera fila
	
$pdf->SetFont('Arial','',8); 
//inicio segunda fila el tamaño esta en mm	
$top_2 = 40;	
    $pdf->SetXY(40, $top_2); 
	$c_imppalX=str_pad($c_imppal.' ', 128, '*', STR_PAD_RIGHT);
    $pdf->Cell(100, 5, $c_imppalX, 0, 1, 'L'); 
//fin segunda fila

//////////////////////CLIENTE

//inicio tercera fila el tamaño esta en mm
$top_3 = 53;	
    $pdf->SetXY(53, $top_3); 
    $pdf->Cell(60, 5, $c_nomcli  , 0, 1, 'L'); 
	//$pdf->Ln(2); //Salto de línea	
//fin TERCERA fila
	
//inicio cuarta fila el tamaño esta en mm
$top_5 = 60;	
	$pdf->SetXY(53, $top_5); //top 60mm y empieza en 53mm
	$pdf->Multicell(65,2.4, $c_dircli); //widh 65mm,separacion cada fila 2mm
   // $pdf->Cell(30, 5, $c_dircli, 0, 1, 'L'); 
//fin CUARTA fila

//inicio quinta fila el tamaño esta en mm	
$top_6 = 68;	
$pdf->SetXY(49, $top_6); 
$pdf->Cell(30, 5, $c_doccli, 0, 1, 'L'); 

$pdf->SetXY(90, $top_6); 
$pdf->Cell(30, 5, $c_telcli, 0, 1, 'L'); 
//fin QUINTA fila

//inicio sexta fila el tamaño esta en mm
////////////////////////////AVAL
$top_7 = 76;	
    $pdf->SetXY(62, $top_7); 
    $pdf->Cell(30, 5, $c_nomava , 0, 1, 'L');	
//fin SEXTA fila
	
//inicio septima fila el tamaño esta en mm
$top_8 = 82;	
	$pdf->SetXY(52, $top_8); 
	$pdf->Multicell(65,2.4, $c_dirava);//widh 55mm,separacion cada fila 2mm
   // $pdf->Cell(30, 5, $c_dirava, 0, 1, 'L'); 
//fin SEPTIMA fila

//inicio octava fila el tamaño esta en mm	
$top_9 = 87;	
$pdf->SetXY(49, $top_9); 
$pdf->Cell(30, 5, $c_docava, 0, 1, 'L'); 

$pdf->SetXY(90, $top_9); 
$pdf->Cell(30, 5, $c_telava, 0, 1, 'L'); 
//fin 8 fila

$pdf->Output($archivo_de_salida);//cierra el objeto pdf

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminación del archivo en el servidor
unlink($archivo);
