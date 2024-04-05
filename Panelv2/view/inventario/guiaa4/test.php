<?php
ini_set('error_reporting',1);//para xamp
//define('FPDF_FONTPATH','font/');
require('fpdf/mysql_table.php');
require('dbconex.php');
//include("comunes.php");
//include ("../conectar.php");
//include ("../funciones/fechas.php"); 
class PDF extends FPDF
{
	
}
$pdf=new PDF();
//$pdf->Open();
$pdf->AddPage();

$pdf->Ln(10);
$c_numguia=$_REQUEST['c_numguia'];
$nroguia=$_REQUEST['c_numguia'];
/*$consulta = "Select * from facturas,clientes where facturas.codfactura='$codfactura' and facturas.codcliente=clientes.codcliente";
$resultado = mysql_query($consulta, $conexion);
$lafila=mysql_fetch_array($resultado);*/

	//$pdf->Image('cabecera2.png',10,10,50);
	//$pdf->Image('logo.jpg',10,8,50);
	$pdf->Image('logo.jpg',10,30,90);
	

$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
$historial = odbc_exec($cid,$strConsulta);
$item = odbc_fetch_array($historial);
	//$numfilas=odbc_num_rows($historial);
/*if($historial != NULL){
	foreach ($historial as $item) {*/
$serie='';
$nomtra=$item['c_nomtra'];
$c_nume=$item['c_nume'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=utf8_decode($item['c_llega']);
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];
$c_glosa=$item['c_glosa'];


	
	
	
	
	
	
	$pdf->Ln(7);
	$pdf->Cell(95);
    $pdf->Cell(80,4,"",'',0,'C');
    $pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	
	
    $pdf->Cell(40,65,'Fecha de inicio del traslado:'.(substr($d_fecgui,0,10)));
	$pdf->SetX(10);	

    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRT',0,'L',1);
    $pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',12);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('RUC 20521180774'),'LR',0,'C',1);
    $pdf->Ln(4);

    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('GUÍA DE REMISIÓN'),'LR',0,'C',1);
    $pdf->Ln(4);
	
	//Calculamos la provincia

	$pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('REMITENTE'),'LR',0,'C',1);
    $pdf->Ln(4);		

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	


	$NROGUIA=$serie.''.$c_nume;
    $pdf->Cell(95);
    $pdf->Cell(80,4,"0002 ".$NROGUIA,'LR',0,'C',1);
    $pdf->Ln(4);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRB',0,'L',1);
    $pdf->Ln(10);					

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(6);
    $pdf->Cell(1);
    $pdf->Cell(95,4,"Punto de Partida",1,0,'L',0);
	$pdf->Cell(95,4,"Punto de Llegada",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(95,4,$c_parti,1,0,'C',0);
	$pdf->Cell(95,4,strtoupper($c_llega),1,0,'C',0);
	
	//SEGUNDA LINEA RAZON SOCIAL
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(190,4,"Razon social",1,0,'L',0);

//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190,4,$c_nomdes,1,0,'L',0);
	//TERCERA RUC DNI FACTURA NRO
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(63,4,"RUC",1,0,'L',0);
    $pdf->Cell(63,4,"DNI",1,0,'L',0);
    $pdf->Cell(64,4,"Factura Nro",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(63,4,$c_rucdes,1,0,'L',0);
    $pdf->Cell(63,4,"",1,0,'L',0);
    $pdf->Cell(64,4,"",1,0,'L',0);		
	$pdf->Image('motivo.jpg',10,92,190);
	
	
	
	//ahora mostramos las lneas de la factura
	$pdf->Ln(21);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(199,197,198);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(20,4,"CANTIDAD",1,0,'C',1);
	$pdf->Cell(170,4,"DESCRIPCION",1,0,'C',1);
	$pdf->Ln(4);
			
			
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	
	/*$consulta2 = "Select * from factulinea where codfactura='$codfactura' order by numlinea";
    $resultado2 = mysql_query($consulta2, $conexion);*/
    
	$contador=1;
	//for($i=1;$i<=6;$i++){
		
$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
while($resultado = odbc_fetch_array($historial)){ 
	  $pdf->Cell(1);
	  $contador++;	  
/*	  $codarticulo=mysql_result($resultado2,$lineas,"codigo");
	  $codfamilia=mysql_result($resultado2,$lineas,"codfamilia");
	  $sel_articulos="SELECT * FROM articulos WHERE codarticulo='$codarticulo' AND codfamilia='$codfamilia'";
	  $rs_articulos=mysql_query($sel_articulos);*/
	  $pdf->Cell(20,4,$resultado['n_canprd'],'LR',0,'C');
	  
	//  $acotado = substr(mysql_result($rs_articulos,0,"descripcion"), 0, 45);
	  $pdf->MultiCell(170,4,$resultado['c_desprd'].'//'.$resultado['c_codprd'].' '.$resultado['c_obsprd'],1,'L','');
	  
	   // $pdf->SetAligns(array('C','L','R','R','R','R'));
       //$pdf->Row(array($resultado['c_codprd'],$resultado['c_codprd'], $resultado['c_codprd'], $resultado['c_codprd'], $resultado['c_codprd'], $resultado['c_codprd']));
	  //$pdf->Ln(4);	


	  //vamos acumulando el importe
	  $importe=$importe + 10;
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	  
	};
	
	while ($contador<25)
	{
	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LR',0,'C');
      $pdf->Cell(170,4,"",'LR',0,'C');
	  $pdf->Ln(4);	
	  $contador=$contador +1;
	}

	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LRB',0,'C');
      $pdf->Cell(170,4,"",'LRB',0,'C');
	  $pdf->Ln(4);	


	//ahora mostramos el final de la factura
	
	$pdf->Ln(5);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(100,4,"NOMBRE O RAZON SOCIAL",1,0,'L',1);
	$pdf->Cell(90,4,"RUC",1,0,'L',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,$nomtra,1,0,'L',1);
	$pdf->Cell(90,4,$c_ructra,1,0,'L',1);
	$pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
	
	$pdf->Cell(1);

    $pdf->Cell(190,4,'CONDUCTOR: '.$c_chofer,1,0,'L',1);
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,"LICENCIA DE CONDUCIR",1,0,'C',1);
	$pdf->Cell(63,4,"MARCA",1,0,'C',1);
	$pdf->Cell(64,4,"PLACA",1,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,$c_licenci,1,0,'C',1);
	$pdf->Cell(63,4,$c_marca,1,0,'C',1);
	$pdf->Cell(64,4,$c_placa,1,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);




	//ahora mostramos el final de la factura
	
	$pdf->Ln(8);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
 $pdf->Cell(100,4,"PRINT MULTI SHADES S.A.C. RUC: 20603357699",0,0,'L',1);
	$pdf->Cell(90,4,"",0,0,'L',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'SERIE 0002 DEL 20001 AL 25000',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	
	
	$pdf->Ln(4);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
    $pdf->Cell(100,4,"Nro Aut: 14710647023 - F.I. 10/12/2021",0,0,'L',1);
	$pdf->Cell(90,4,"REMITENTE",0,0,'R',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	////firmas
	
	
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,".......................",0,0,'R',1);
	$pdf->Cell(63,4,".............................",0,0,'R',1);
	$pdf->Cell(64,4,".............................",0,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,'ZGROUP SAC',0,0,'R',1);
	$pdf->Cell(63,4,'TRANSPORTISTA',0,0,'R',1);
	$pdf->Cell(64,4,'RECIBI CONFORME',0,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);
	
	
	
/////////////// AQUI OTRA PAGINA DE GUIA DE REMISION 	


	$pdf->AddPage();
	$pdf->Ln(10);
	
	
	$pdf->Image('logo.jpg',10,30,90);
	

$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
$historial = odbc_exec($cid,$strConsulta);
$item = odbc_fetch_array($historial);
	//$numfilas=odbc_num_rows($historial);
/*if($historial != NULL){
	foreach ($historial as $item) {*/
$serie='';
$nomtra=$item['c_nomtra'];
$c_nume=$item['c_nume'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=$item['c_llega'];
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];
$c_glosa=$item['c_glosa'];


	
	
	
	
	
	
	$pdf->Ln(7);
	$pdf->Cell(95);
    $pdf->Cell(80,4,"",'',0,'C');
    $pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	
	
    $pdf->Cell(40,65,'Fecha de inicio del traslado:'.(substr($d_fecgui,0,10)));
	$pdf->SetX(10);	

    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRT',0,'L',1);
    $pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',12);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('RUC 20521180774'),'LR',0,'C',1);
    $pdf->Ln(4);

    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('GUÍA DE REMISIÓN'),'LR',0,'C',1);
    $pdf->Ln(4);
	
	//Calculamos la provincia


	$pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('REMITENTE'),'LR',0,'C',1);
    $pdf->Ln(4);		

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	


	$NROGUIA=$serie.''.$c_nume;
    $pdf->Cell(95);
    $pdf->Cell(80,4,"0002 ".$NROGUIA,'LR',0,'C',1);
    $pdf->Ln(4);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRB',0,'L',1);
    $pdf->Ln(10);					

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(6);
    $pdf->Cell(1);
    $pdf->Cell(95,4,"Punto de Partida",1,0,'L',0);
	$pdf->Cell(95,4,"Punto de Llegada",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(95,4,$c_parti,1,0,'C',0);
	$pdf->Cell(95,4,strtoupper($c_llega),1,0,'C',0);
	
	//SEGUNDA LINEA RAZON SOCIAL
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(190,4,"Razon social",1,0,'L',0);

//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190,4,$c_nomdes,1,0,'L',0);
	//TERCERA RUC DNI FACTURA NRO
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(63,4,"RUC",1,0,'L',0);
    $pdf->Cell(63,4,"DNI",1,0,'L',0);
    $pdf->Cell(64,4,"Factura Nro",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(63,4,$c_rucdes,1,0,'L',0);
    $pdf->Cell(63,4,"",1,0,'L',0);
    $pdf->Cell(64,4,"",1,0,'L',0);		
	$pdf->Image('motivo.jpg',10,92,190);
	
	
	
	//ahora mostramos las lneas de la factura
	$pdf->Ln(21);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(199,197,198);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(20,4,"CANTIDAD",1,0,'C',1);
	$pdf->Cell(170,4,"DESCRIPCION",1,0,'C',1);
	$pdf->Ln(4);
			
			
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	
	/*$consulta2 = "Select * from factulinea where codfactura='$codfactura' order by numlinea";
    $resultado2 = mysql_query($consulta2, $conexion);*/
    
	$contador=1;
	//for($i=1;$i<=6;$i++){
		
$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
while($resultado = odbc_fetch_array($historial)){ 
		
		
		
	  $pdf->Cell(1);
	  $contador++;
	  
	  
	  
/*	  $codarticulo=mysql_result($resultado2,$lineas,"codigo");
	  $codfamilia=mysql_result($resultado2,$lineas,"codfamilia");
	  $sel_articulos="SELECT * FROM articulos WHERE codarticulo='$codarticulo' AND codfamilia='$codfamilia'";
	  $rs_articulos=mysql_query($sel_articulos);*/
	  $pdf->Cell(20,4,$resultado['n_canprd'],'LR',0,'C');
	  
	//  $acotado = substr(mysql_result($rs_articulos,0,"descripcion"), 0, 45);
	  $pdf->MultiCell(170,4,$resultado['c_desprd'].'//'.$resultado['c_codprd'].' '.$resultado['c_obsprd'],1,'L','');
	  
	  //$pdf->Ln(4);	


	  //vamos acumulando el importe
	  $importe=$importe + 10;
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	  
	};
	
	while ($contador<25)
	{
	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LR',0,'C');
      $pdf->Cell(170,4,"",'LR',0,'C');
	  $pdf->Ln(4);	
	  $contador=$contador +1;
	}

	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LRB',0,'C');
      $pdf->Cell(170,4,"",'LRB',0,'C');
	  $pdf->Ln(4);	


	//ahora mostramos el final de la factura
	
	$pdf->Ln(5);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(100,4,"NOMBRE O RAZON SOCIAL",1,0,'L',1);
	$pdf->Cell(90,4,"RUC",1,0,'L',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,$nomtra,1,0,'L',1);
	$pdf->Cell(90,4,$c_ructra,1,0,'L',1);
	$pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
	
	$pdf->Cell(1);

    $pdf->Cell(190,4,'CONDUCTOR: '.$c_chofer,1,0,'L',1);
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,"LICENCIA DE CONDUCIR",1,0,'C',1);
	$pdf->Cell(63,4,"MARCA",1,0,'C',1);
	$pdf->Cell(64,4,"PLACA",1,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,$c_licenci,1,0,'C',1);
	$pdf->Cell(63,4,$c_marca,1,0,'C',1);
	$pdf->Cell(64,4,$c_placa,1,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);




	//ahora mostramos el final de la factura
	
	$pdf->Ln(8);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
    $pdf->Cell(100,4,"PRINT MULTI SHADES S.A.C. RUC: 20603357699",0,0,'L',1);
	$pdf->Cell(90,4,"",0,0,'L',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'SERIE 0002 DEL 20001 AL 25000',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	
	
	$pdf->Ln(4);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
    $pdf->Cell(100,4,"Nro Aut: 14710647023 - F.I. 10/12/2021",0,0,'L',1);
	$pdf->Cell(90,4,"DESTINATARIO",0,0,'R',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,".......................",0,0,'R',1);
	$pdf->Cell(63,4,".............................",0,0,'R',1);
	$pdf->Cell(64,4,".............................",0,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,'ZGROUP SAC',0,0,'R',1);
	$pdf->Cell(63,4,'TRANSPORTISTA',0,0,'R',1);
	$pdf->Cell(64,4,'RECIBI CONFORME',0,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);
//////////// PAGINA SUNAT

/////////////// AQUI OTRA PAGINA DE GUIA DE REMISION 	


	$pdf->AddPage();
	$pdf->Ln(10);
	
	
	$pdf->Image('logo.jpg',10,30,90);
	

$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
$historial = odbc_exec($cid,$strConsulta);
$item = odbc_fetch_array($historial);
	//$numfilas=odbc_num_rows($historial);
/*if($historial != NULL){
	foreach ($historial as $item) {*/
$serie='';
$nomtra=$item['c_nomtra'];
$c_nume=$item['c_nume'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=$item['c_llega'];
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];
$c_glosa=$item['c_glosa'];


	
	
	
	
	
	
	$pdf->Ln(7);
	$pdf->Cell(95);
    $pdf->Cell(80,4,"",'',0,'C');
    $pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	
	
    $pdf->Cell(40,65,'Fecha de inicio del traslado:'.(substr($d_fecgui,0,10)));
	$pdf->SetX(10);	

    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRT',0,'L',1);
    $pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',12);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('RUC 20521180774'),'LR',0,'C',1);
    $pdf->Ln(4);

    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('GUÍA DE REMISIÓN'),'LR',0,'C',1);
    $pdf->Ln(4);
	
	//Calculamos la provincia


	$pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('REMITENTE'),'LR',0,'C',1);
    $pdf->Ln(4);		

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	


	$NROGUIA=$serie.$c_nume;
    $pdf->Cell(95);
    $pdf->Cell(80,4,"0002 ".$NROGUIA,'LR',0,'C',1);
    $pdf->Ln(4);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRB',0,'L',1);
    $pdf->Ln(10);					

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(6);
    $pdf->Cell(1);
    $pdf->Cell(95,4,"Punto de Partida",1,0,'L',0);
	$pdf->Cell(95,4,"Punto de Llegada",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(95,4,$c_parti,1,0,'C',0);
	$pdf->Cell(95,4,strtoupper($c_llega),1,0,'C',0);
	
	//SEGUNDA LINEA RAZON SOCIAL
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(190,4,"Razon social",1,0,'L',0);

//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190,4,$c_nomdes,1,0,'L',0);
	//TERCERA RUC DNI FACTURA NRO
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(63,4,"RUC",1,0,'L',0);
    $pdf->Cell(63,4,"DNI",1,0,'L',0);
    $pdf->Cell(64,4,"Factura Nro",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(63,4,$c_rucdes,1,0,'L',0);
    $pdf->Cell(63,4,"",1,0,'L',0);
    $pdf->Cell(64,4,"",1,0,'L',0);
	
	
	$pdf->Image('motivo.jpg',10,92,190);
	
	
	
	//ahora mostramos las lneas de la factura
	$pdf->Ln(21);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(199,197,198);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(20,4,"CANTIDAD",1,0,'C',1);
	$pdf->Cell(170,4,"DESCRIPCION",1,0,'C',1);
	$pdf->Ln(4);
			
			
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	
	/*$consulta2 = "Select * from factulinea where codfactura='$codfactura' order by numlinea";
    $resultado2 = mysql_query($consulta2, $conexion);*/
    
	$contador=1;
	//for($i=1;$i<=6;$i++){
		
$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
while($resultado = odbc_fetch_array($historial)){ 
		
		
		
	  $pdf->Cell(1);
	  $contador++;
	  
	  
	  
/*	  $codarticulo=mysql_result($resultado2,$lineas,"codigo");
	  $codfamilia=mysql_result($resultado2,$lineas,"codfamilia");
	  $sel_articulos="SELECT * FROM articulos WHERE codarticulo='$codarticulo' AND codfamilia='$codfamilia'";
	  $rs_articulos=mysql_query($sel_articulos);*/
	  $pdf->Cell(20,4,$resultado['n_canprd'],'LR',0,'C');
	  
	//  $acotado = substr(mysql_result($rs_articulos,0,"descripcion"), 0, 45);
	  $pdf->MultiCell(170,4,$resultado['c_desprd'].'//'.$resultado['c_codprd'].' '.$resultado['c_obsprd'],1,'L','');
	  
	  //$pdf->Ln(4);	


	  //vamos acumulando el importe
	  $importe=$importe + 10;
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	  
	};
	
	while ($contador<25)
	{
	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LR',0,'C');
      $pdf->Cell(170,4,"",'LR',0,'C');
	  $pdf->Ln(4);	
	  $contador=$contador +1;
	}

	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LRB',0,'C');
      $pdf->Cell(170,4,"",'LRB',0,'C');
	  $pdf->Ln(4);	


	//ahora mostramos el final de la factura
	
	$pdf->Ln(5);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(100,4,"NOMBRE O RAZON SOCIAL",1,0,'L',1);
	$pdf->Cell(90,4,"RUC",1,0,'L',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,$nomtra,1,0,'L',1);
	$pdf->Cell(90,4,$c_ructra,1,0,'L',1);
	$pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
	
	$pdf->Cell(1);

    $pdf->Cell(190,4,'CONDUCTOR: '.$c_chofer,1,0,'L',1);
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,"LICENCIA DE CONDUCIR",1,0,'C',1);
	$pdf->Cell(63,4,"MARCA",1,0,'C',1);
	$pdf->Cell(64,4,"PLACA",1,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,$c_licenci,1,0,'C',1);
	$pdf->Cell(63,4,$c_marca,1,0,'C',1);
	$pdf->Cell(64,4,$c_placa,1,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);




	//ahora mostramos el final de la factura
	
	$pdf->Ln(8);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
  $pdf->Cell(100,4,"PRINT MULTI SHADES S.A.C. RUC: 20603357699",0,0,'L',1);
	$pdf->Cell(90,4,"",0,0,'L',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'SERIE 0002 DEL 20001 AL 25000',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	
	
	$pdf->Ln(4);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
    $pdf->Cell(100,4,"Nro Aut: 14710647023 - F.I. 10/12/2021",0,0,'L',1);
	$pdf->Cell(90,4,"SUNAT",0,0,'R',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,".......................",0,0,'R',1);
	$pdf->Cell(63,4,".............................",0,0,'R',1);
	$pdf->Cell(64,4,".............................",0,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,'ZGROUP SAC',0,0,'R',1);
	$pdf->Cell(63,4,'TRANSPORTISTA',0,0,'R',1);
	$pdf->Cell(64,4,'RECIBI CONFORME',0,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);
	
////ADMINISTRATIVO


/////////////// AQUI OTRA PAGINA DE GUIA DE REMISION 	


	$pdf->AddPage();
	$pdf->Ln(10);
	
	
	$pdf->Image('logo.jpg',10,30,90);
	

$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
$historial = odbc_exec($cid,$strConsulta);
$item = odbc_fetch_array($historial);
	//$numfilas=odbc_num_rows($historial);
/*if($historial != NULL){
	foreach ($historial as $item) {*/
$serie='';
$nomtra=$item['c_nomtra'];
$c_nume=$item['c_nume'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=$item['c_llega'];
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];
$c_glosa=$item['c_glosa'];


	
	
	
	
	
	
	$pdf->Ln(7);
	$pdf->Cell(95);
    $pdf->Cell(80,4,"",'',0,'C');
    $pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	
	
    $pdf->Cell(40,65,'Fecha de inicio del traslado:'.(substr($d_fecgui,0,10)));
	$pdf->SetX(10);	

    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRT',0,'L',1);
    $pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',12);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('RUC 20521180774'),'LR',0,'C',1);
    $pdf->Ln(4);

    $pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('GUÍA DE REMISIÓN'),'LR',0,'C',1);
    $pdf->Ln(4);
	
	//Calculamos la provincia


	$pdf->Cell(95);
    $pdf->Cell(80,4,utf8_decode('REMITENTE'),'LR',0,'C',1);
    $pdf->Ln(4);		

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',10);	


	$NROGUIA=$serie.''.$c_nume;
    $pdf->Cell(95);
    $pdf->Cell(80,4,"0002 ".$NROGUIA,'LR',0,'C',1);
    $pdf->Ln(4);
	
    $pdf->Cell(95);
    $pdf->Cell(80,4,"",'LRB',0,'L',1);
    $pdf->Ln(10);					

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(6);
    $pdf->Cell(1);
    $pdf->Cell(95,4,"Punto de Partida",1,0,'L',0);
	$pdf->Cell(95,4,"Punto de Llegada",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(95,4,$c_parti,1,0,'C',0);
	$pdf->Cell(95,4,strtoupper($c_llega),1,0,'C',0);
	
	//SEGUNDA LINEA RAZON SOCIAL
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(190,4,"Razon social",1,0,'L',0);

//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(10);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(190,4,$c_nomdes,1,0,'L',0);
	//TERCERA RUC DNI FACTURA NRO
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Ln(4);
    $pdf->Cell(1);
    $pdf->Cell(63,4,"RUC",1,0,'L',0);
    $pdf->Cell(63,4,"DNI",1,0,'L',0);
    $pdf->Cell(64,4,"Factura Nro",1,0,'L',0);
//	$pdf->Cell(40,4,"Fecha",1,0,'C',1);	
	//$pdf->Cell(70,4,"Cod. Factura",1,0,'C',1);
	$pdf->SetX(9);	
	$pdf->Ln(4);
	
	$pdf->Cell(1);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(63,4,$c_rucdes,1,0,'L',0);
    $pdf->Cell(63,4,"",1,0,'L',0);
    $pdf->Cell(64,4,"",1,0,'L',0);
	
	
	$pdf->Image('motivo.jpg',10,92,190);
	
	
	
	//ahora mostramos las lneas de la factura
	$pdf->Ln(21);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(199,197,198);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(20,4,"CANTIDAD",1,0,'C',1);
	$pdf->Cell(170,4,"DESCRIPCION",1,0,'C',1);
	$pdf->Ln(4);
			
			
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);

	
	/*$consulta2 = "Select * from factulinea where codfactura='$codfactura' order by numlinea";
    $resultado2 = mysql_query($consulta2, $conexion);*/
    
	$contador=1;
	//for($i=1;$i<=6;$i++){
		
$strConsulta = "SELECT *
					FROM cabguia ,detguia WHERE cabguia.c_numguia = detguia.c_numguia and cabguia.c_numguia='$c_numguia' 
					order by cabguia.c_numguia desc";
	$historial = odbc_exec($cid,$strConsulta);
	$numfilas=odbc_num_rows($historial);
while($resultado = odbc_fetch_array($historial)){ 
		
		
		
	  $pdf->Cell(1);
	  $contador++;
	  
	  
	  
/*	  $codarticulo=mysql_result($resultado2,$lineas,"codigo");
	  $codfamilia=mysql_result($resultado2,$lineas,"codfamilia");
	  $sel_articulos="SELECT * FROM articulos WHERE codarticulo='$codarticulo' AND codfamilia='$codfamilia'";
	  $rs_articulos=mysql_query($sel_articulos);*/
	  $pdf->Cell(20,4,$resultado['n_canprd'],'LR',0,'C');
	  
	//  $acotado = substr(mysql_result($rs_articulos,0,"descripcion"), 0, 45);
	  $pdf->MultiCell(170,4,$resultado['c_desprd'].'//'.$resultado['c_codprd'].' '.$resultado['c_obsprd'],1,'L','');
	  
	  //$pdf->Ln(4);	


	  //vamos acumulando el importe
	  $importe=$importe + 10;
	  $contador=$contador + 1;
	  $lineas=$lineas + 1;
	  
	};
	
	while ($contador<25)
	{
	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LR',0,'C');
      $pdf->Cell(170,4,"",'LR',0,'C');
	  $pdf->Ln(4);	
	  $contador=$contador +1;
	}

	  $pdf->Cell(1);
      $pdf->Cell(20,4,"",'LRB',0,'C');
      $pdf->Cell(170,4,"",'LRB',0,'C');
	  $pdf->Ln(4);	


	//ahora mostramos el final de la factura
	
	$pdf->Ln(5);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
    $pdf->Cell(100,4,"NOMBRE O RAZON SOCIAL",1,0,'L',1);
	$pdf->Cell(90,4,"RUC",1,0,'L',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,$nomtra,1,0,'L',1);
	$pdf->Cell(90,4,$c_ructra,1,0,'L',1);
	$pdf->Ln(4);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	
	
	$pdf->Cell(1);

    $pdf->Cell(190,4,'CONDUCTOR: '.$c_chofer,1,0,'L',1);
	$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,"LICENCIA DE CONDUCIR",1,0,'C',1);
	$pdf->Cell(63,4,"MARCA",1,0,'C',1);
	$pdf->Cell(64,4,"PLACA",1,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,$c_licenci,1,0,'C',1);
	$pdf->Cell(63,4,$c_marca,1,0,'C',1);
	$pdf->Cell(64,4,$c_placa,1,0,'C',1);
	//$pdf->Image('tarjeton.jpg',10,300,20);




	//ahora mostramos el final de la factura
	
	$pdf->Ln(8);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
    $pdf->Cell(100,4,"PRINT MULTI SHADES S.A.C. RUC: 20603357699",0,0,'L',1);
	$pdf->Cell(90,4,"",0,0,'L',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'SERIE 0002 DEL 20001 AL 25000',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
	
	
	$pdf->Ln(4);		
	$pdf->Cell(1);
	
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',6);
	
    $pdf->Cell(100,4,"Nro Aut: 14710647023 - F.I. 10/12/2021",0,0,'L',1);
	$pdf->Cell(90,4,"CONTROL ADMINISTRATIVO",0,0,'R',1);
	
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',6);
	
	$pdf->Cell(1);

    $pdf->Cell(100,4,'',0,0,'L',1);
	$pdf->Cell(90,4,'',0,0,'L',1);
$pdf->Ln(4);
	
	//INEA 2
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','B',8);
	$pdf->Cell(1);
   // $pdf->Cell(89,4,"IMPRENTA JABARCOT SAC",1,0,'L',1);
	$pdf->Cell(63,4,".......................",0,0,'R',1);
	$pdf->Cell(63,4,".............................",0,0,'R',1);
	$pdf->Cell(64,4,".............................",0,0,'C',1);
	$pdf->Ln(4);
	
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Arial','',8);
	
	$pdf->Cell(1);
   
   // $pdf->Cell(89,4,"NRO AUT 12555303023 - FI 04/10/2016",1,0,'L',1);
	$pdf->Cell(63,4,'ZGROUP SAC',0,0,'R',1);
	$pdf->Cell(63,4,'TRANSPORTISTA',0,0,'R',1);
	$pdf->Cell(64,4,'RECIBI CONFORME',0,0,'C',1);

$pdf->Output($nroguia.'.pdf', 'I');
?> 