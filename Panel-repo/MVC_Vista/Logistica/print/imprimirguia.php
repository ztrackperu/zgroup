<?php

require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	
	$this->SetFont('Arial','',10);
	//$this->Cell(0,0,'Guia Remision',0,1,'B');
	$this->Ln(1);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost:33066','root','1234');
mysql_select_db('zgroup');
//$idusuario=$_GET['acc'];
//$idempleado=$_GET['udni'];


$pdf=new PDF('L','mm','A4'); 
//$dimensiones=array (80,120);
//$pdf=new PDF('P','mm',$dimensiones);

$pdf->SetMargins(2, 10, 2); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();
$xcod=$_GET[''];
foreach ($imprimeguia as $xresultado)
	{
$fechat=$xresultado['fectraslado'];
$brevete=$xresultado['brevete'];
$obs=$xresultado['obs'];
$rucempsub=$xresultado['rucempsub'];
$nomempsub=$xresultado['nomempsub'];
$tipo=$xresultado['tipo'];
$placa=$xresultado['placa'];
$certificadoinsp=$xresultado['certificadoinsp'];
}

foreach ($impremi as $itemD)
	{
	$Did_cliente=$itemD['id_cliente'];
	$Dnom_cl=$itemD['nom_cli'];
	$Druc_cli=$itemD['ruc_cli'];
	$Ddir_cli=$itemD['dir_cli'];
	$Ddis_cli=$itemD['dis_cli'];
	$Dprov_cli=$itemD['prov_cli'];
	$Ddep_cli=$itemD['dep_cli'];
}

foreach ($impdest as $itemR)
	{
	$Rid_cliente=$itemR['id_cliente'];
	$Rnom_cli=$itemR['nom_cli'];
	$Rruc_cli=$itemR['ruc_cli'];
	$Rdir_cli=$itemR['dir_cli'];
	$Rdis_cli=$itemR['dis_cli'];
	$Rprov_cli=$itemR['prov_cli'];
	$Rdep_cli=$itemR['dep_cli'];
}

// este select se escoje los resgistros que no han sido impresos y el usuario que lo ah ingresado
$pdf->SetFont('Arial','',9);
$pdf->Cell(20,12,'',0,1);

$pdf->Cell(20,10,'                                                '.$fechat,0,1);

$pdf->Cell(10,5,'                                           '.$Ddir_cli.'                                                                                                               '                 .$Rdir_cli,0,1);  
$pdf->Cell(10,2,'                                   '.$Ddis_cli.'                                              '.$Dprov_cli.'                                             '.$Ddep_cli.'                                          '.$Rdis_cli.'                                        '.$Rprov_cli.'                                  '.$Rdep_cli,0,1);
$pdf->Cell(20,14,'                                                                                '.$Dnom_cl.'                                                                                                                                                              '.$Rnom_cli,0,1);

$pdf->Cell(20,0,'                                          '.$Druc_cli.'                                                                                                                                  '.$Rruc_cli,0,1);
$pdf->Cell(20,12,'',0,2);
	
foreach ($imprimeguia as $resultado)
	{
$pdf->Cell(7,9,'     ',0,0,'C'); 
$pdf->Cell(48,5,'             '.$resultado['detalle'],0,0,'L');
$pdf->Cell(6,5,$resultado['id_contenedor'].$resultado['fila_paquete'].$resultado['columna_paquete'],0,0,'R'); 
$pdf->Ln(); 

}

foreach ($imprimeguia as $xxresultado)
	{



$config=$xxresultado['config'];
$brevete=$xxresultado['brevete'];
$obs=$xxresultado['obs'];
$rucempsub=$xxresultado['rucempsub'];
$nomempsub=$xxresultado['nomempsub'];
$tipo=$xxresultado['tipo'];
$placa=$xxresultado['placa'];
$certificadoinsp=$xxresultado['certificadoinsp'];
}
$pdf->Ln(20); 
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(133,4,'                          '.$obs,0,1);

$pdf->Ln(10); 
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(133,4,'',0,1);
	$pdf->Cell(133,4,'',0,1);$pdf->Cell(20,6,'',0,1);
	$pdf->Cell(133,4,'                                                     '.$tipo.' '.$placa,0,1); 
	$pdf->Cell(133,4,'                                                         '.$config.'                                                                 '.$nomempsub,0,1);
	$pdf->Cell(133,4,'                                                                   '.$certificadoinsp,0,1);
	$pdf->Cell(133,4,'                                                             '.$brevete.'                                                       '.$rucempsub,0,1); 


$pdf->Output();
?>