<?php
//define('FPDF_FONTPATH','font/');
require('mysql_table.php');
include("comunes.php");
//include ("../conectar.php");
//include ("../funciones/fechas.php"); 
$pdf=new PDF();
//$pdf->Open();


$pdf->AddPage();
$pdf->Image('cabecera.PNG',10,10,50);
$pdf->Ln(5);	
/*$consulta = "Select * from facturas,clientes where facturas.codfactura='$codfactura' and facturas.codcliente=clientes.codcliente";
$resultado = mysql_query($consulta, $conexion);
$lafila=mysql_fetch_array($resultado);*/
	$pdf->Cell(95);
    $pdf->Cell(80,4,"",'',0,'C');
    $pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	
	
    $pdf->Cell(40,65,'FACTURA');
	$pdf->SetX(10);	

    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRT',0,'L',1);
    $pdf->Ln(4);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('NOMBRE'),'LR',0,'L',1);
    $pdf->Ln(4);

    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('DIRECCION'),'LR',0,'L',1);
    $pdf->Ln(4);
	
	//Calculamos la provincia


	$pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('CODIGO POSTAL'),'LR',0,'L',1);
    $pdf->Ln(4);		
	$TEL='6511974';
	$movil='99051212';
    $pdf->Cell(95);
    $pdf->Cell(80,4,"Tlfno: " . $TEL . "  " . "Movil: " . $movil,'LR',0,'L',1);
    $pdf->Ln(4);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRB',0,'L',1);
    $pdf->Ln(10);					

    $pdf->SetFillColor(255,191,116);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(80);
    $pdf->Cell(30,4,"DNI/RUC",1,0,'C',1);
	$pdf->Cell(30,4,"Cod. Cliente",1,0,'C',1);
	$pdf->Cell(30,4,"Fecha",1,0,'C',1);	
	$pdf->Cell(20,4,"Cod. Factura",1,0,'C',1);
	$pdf->Ln(4);
	
	$pdf->Cell(80);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	//$fecha = implota($lafila["fecha"]);
	
    $pdf->Cell(30,4,'20151180774',1,0,'C',1);
	$pdf->Cell(30,4,'cli00000001',1,0,'C',1);
	$pdf->Cell(30,4,'05/10/2016',1,0,'C',1);	
	$pdf->Cell(20,4,'F000000001',1,0,'C',1);		
	
	
	//ahora mostramos las lneas de la factura
	$pdf->Ln(10);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,191,116);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(40,4,"Referencia",1,0,'C',1);
	$pdf->Cell(80,4,"Descripcion",1,0,'C',1);
	$pdf->Cell(20,4,"Cantidad",1,0,'C',1);	
	$pdf->Cell(15,4,"Precio",1,0,'C',1);
	$pdf->Cell(15,4,"% Desc.",1,0,'C',1);	
	$pdf->Cell(20,4,"Importe",1,0,'C',1);
	$pdf->Ln(4);
			
			
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	
	/*$consulta2 = "Select * from factulinea where codfactura='$codfactura' order by numlinea";
    $resultado2 = mysql_query($consulta2, $conexion);*/
    
	$contador=1;
	for($i=1;$i<=6;$i++){
	  $pdf->Cell(1);
	  $contador++;
/*	  $codarticulo=mysql_result($resultado2,$lineas,"codigo");
	  $codfamilia=mysql_result($resultado2,$lineas,"codfamilia");
	  $sel_articulos="SELECT * FROM articulos WHERE codarticulo='$codarticulo' AND codfamilia='$codfamilia'";
	  $rs_articulos=mysql_query($sel_articulos);*/
	  $pdf->Cell(40,4,('COD PRODUCTO'.$i),'LR',0,'L');
	  
	//  $acotado = substr(mysql_result($rs_articulos,0,"descripcion"), 0, 45);
	  $pdf->Cell(80,4,'DESCRIPCION'.$i,'LR',0,'L');
	  
	  $pdf->Cell(20,4,$i,'LR',0,'C');	
	  
	  $precio2= number_format(12.5,2,",",".");	  
	  $pdf->Cell(15,4,'12','LR',0,'R');
	  
	/*  if (mysql_result($i,$lineas,"dcto")==0) 
	  {*/
	  $pdf->Cell(15,4,"",'LR',0,'C');
	 /* } 
	  else 
	   { 
		$pdf->Cell(15,4,mysql_result($i,$lineas,"dcto") . " %",'LR',0,'C');
	   }*/
	  
	  $importe2= number_format(10,2,",",".");	  
	  
	  $pdf->Cell(20,4,$importe2,'LR',0,'R');
	  $pdf->Ln(4);	


	  //vamos acumulando el importe
	  $importe=$importe + 10;
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	  
	};
	
	while ($contador<35)
	{
	  $pdf->Cell(1);
      $pdf->Cell(40,4,"",'LR',0,'C');
      $pdf->Cell(80,4,"",'LR',0,'C');
	  $pdf->Cell(20,4,"",'LR',0,'C');	
	  $pdf->Cell(15,4,"",'LR',0,'C');
	  $pdf->Cell(15,4,"",'LR',0,'C');
	  $pdf->Cell(20,4,"",'LR',0,'C');
	  $pdf->Ln(4);	
	  $contador=$contador +1;
	}

	  $pdf->Cell(1);
      $pdf->Cell(40,4,"",'LRB',0,'C');
      $pdf->Cell(80,4,"",'LRB',0,'C');
	  $pdf->Cell(20,4,"",'LRB',0,'C');	
	  $pdf->Cell(15,4,"",'LRB',0,'C');
	  $pdf->Cell(15,4,"",'LRB',0,'C');
	  $pdf->Cell(20,4,"",'LRB',0,'C');
	  $pdf->Ln(4);	


	//ahora mostramos el final de la factura
	$pdf->Ln(10);		
	$pdf->Cell(66);
	
	$pdf->SetFillColor(255,191,116);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(30,4,"Sub-Total",1,0,'C',1);
	$pdf->Cell(30,4,"Cuota IGV",1,0,'C',1);
	$pdf->Cell(30,4,"IGV",1,0,'C',1);	
	$pdf->Cell(35,4,"TOTAL",1,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(66);
    $importe4=number_format('10',2,",",".");	
    $pdf->Cell(30,4,'100',1,0,'R',1);
	$pdf->Cell(30,4,'3' . "%",1,0,'C',1);
	
	$ivai='5';
	$impo=$importe*($ivai/100);
	$impo=sprintf("%01.2f",'10'); 
	$total=$importe+$impo; 
	$total=sprintf("%01.2f", '20');

	$impo=number_format($impo,2,",",".");	
	$pdf->Cell(30,4,"$impo",1,0,'R',1);	
    $total=sprintf("%01.2f", '20');
	$total2= number_format('10',2,",",".");	
   $pdf->Cell(35,4,'10',1,0,'R',1);
	$pdf->Ln(4);


/*      @mysql_free_result($resultado); 
      @mysql_free_result($query);
	  @mysql_free_result($resultado2); 
	  @mysql_free_result($query3);*/

$pdf->Output();
?> 
