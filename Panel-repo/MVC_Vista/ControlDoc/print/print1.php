<?php
 $c_numcd  =$_GET['c_numcd'];
 $idempleado  =$_GET['udni'];
 ///$hiddenField=$_GET['mod'];
require('mysql_table.php');
require('dbconex.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	
	$this->SetFont('Arial','',12);

	$this->Cell(0,0,'INGRESO DE DOCUMENTOS',0,1,'B');
	$this->Ln(1);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
//$idusuario=$_GET['acc'];
//$idempleado=$_GET['udni'];
/*mysql_connect('localhost:33066','zgroupco','zgroup@@@');
mysql_select_db('zgroupco_bdzgroup');*/

//$pdf=new PDF('P','mm','A4'); 
$dimensiones=array (80,200);
$pdf=new PDF('P','mm',$dimensiones);

$pdf->SetMargins(2, 10, 2); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();

$sql="select c.*,C_DESITM  from ctrdoc c,Dettabla d where d.C_CODTAB='TDC' and d.C_ESTADO='1' 
and d.C_NUMITM=c.c_tipodoc and c_numcd=$c_numcd order by n_item asc";

$strConsulta = odbc_exec($cid,$sql);
$fila = odbc_fetch_array($strConsulta);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(20,6,'***************************************************',0,1);
	$pdf->Cell(20,6,'N Envio: '.$fila['c_numcd'],0,1); 
	
$variable1 = explode ('-',substr($fila['d_fecreg'],0,10));
$fecha1 = $variable1 [2].-$variable1 [1].-$variable1 [0];
$pdf->Cell(20,6,'Fecha: '.$fecha1,0,1); 
	
	$pdf->Cell(20,6,'Usuario: '.$fila['c_opereg'],0,1); 




//DETALLE

$sql1="select c.*,C_DESITM  from ctrdoc c,Dettabla d where d.C_CODTAB='TDC' and d.C_ESTADO='1' 
and d.C_NUMITM=c.c_tipodoc and c_numcd=$c_numcd order by n_item asc";

$strConsulta1 = odbc_exec($cid,$sql1);
//$resultado = odbc_fetch_array($strConsulta);

// este select se escoje los resgistros que no han sido impresos y el usuario que lo ah ingresado
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,6,'***************************************************',0,1);
$pdf->Cell(20,6,' Item - Serie/Num - Fecha dcto - Destin.',0,1);
$pdf->Cell(20,6,'***************************************************',0,1);
while($resultado = odbc_fetch_array($strConsulta1)){ 
$pdf->Cell(4,5,$resultado['n_item'],0,0,'C'); 

//$variable = substr($fila['C_DESITM'],0,10);
//$descripcion = $variable [0];	
/*
 $variable = explode (' ',substr($resultado['C_DESITM'],0,50));
 $descripcion = $variable [0][0].$variable [1][0].$variable[2][0];
 $pdf->Cell(6,5,$descripcion,0,0,'C');
*/

$pdf->Cell(30,5,$resultado['c_serdoc'].'-'.$resultado['c_numdoc'].'('.$resultado['n_copias'].')',0,0,'C'); 

$variable2 = explode ('-',substr($resultado['d_fecdoc'],0,10));
$fecha2 = $variable2 [2].-$variable2 [1].-$variable2 [0];
$pdf->Cell(15,5,$fecha2,0,0,'C'); 

$variable = substr($resultado['c_destidoc'],0,6);
$pdf->Cell(15,5,strtoupper($variable),0,0,'C'); 
$pdf->Ln(); 
} 
$pdf->Ln(5); 
$pdf->Cell(60,5,'-------------------------'.'   '.'------------------------',0,0,'C'); 
$pdf->Ln(); 
$pdf->Cell(30,5,'Recibi conforme',0,0,'C'); 
$pdf->Cell(30,5,'Entrega',0,0,'C'); 
$pdf->Ln(); 
$pdf->Cell(55,5,'Nom:'.'.........................'.'   '.'Nom:'.' '.$fila['c_opereg'],0,0,'L'); 
$pdf->Ln(); 
$pdf->Cell(55,5,'DNI:'.'.........................',0,0,'L'); 
 
$pdf->Output();
?>