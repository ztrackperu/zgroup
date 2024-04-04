<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	
	$this->SetFont('Arial','',10);
	$this->Cell(0,6,'   REGISTRO PAQUETE',0,1,'B');
	$this->Ln(2);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','zgroupco_bdz','1Jn4w3yf0U');
mysql_select_db('zgroupco_bdzgroup');

$pdf=new PDF();
$pdf->AddPage();

// Aqui empieza mi codigo para imprimir mi ticket	

$strConsulta = "SELECT * from paquete_ingreso ORDER BY id_paquete DESC limit 0,1";
$viajes = mysql_query($strConsulta);
$fila = mysql_fetch_array($viajes);

$entre = mysql_query($sql); 

$fecha = $fecha_cont; 
$codigo_cont = $codigo_cont; 
$linea_cont = $linea_cont; 
$tipo_cont = $tipo_cont; 

    $pdf->SetFont('Arial','',8);
	//$pdf->Cell(0,6,'*****************************************',0,1);
    $pdf->Cell(20,6,'Codigo: '.$fila['id_paquete'],0,1); 
	$pdf->Cell(20,6,'*****************************************',0,1);
	$pdf->Cell(20,6,'Fecha: '.$fila['fecha'],0,1);
	$pdf->Cell(20,6,'Hora: '.$fila['hora'],0,1); 
	$pdf->Cell(20,6,'Check Ingreso: '.$fila['check_ingreso'],0,1); 

$pdf->Output();
?>
