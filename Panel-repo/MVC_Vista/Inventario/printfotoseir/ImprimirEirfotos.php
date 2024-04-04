<?php
if($resultadoimpfotos != NULL){
  foreach ($resultadoimpfotos as $item) {
	$c_tipoio=$item['c_tipoio']; 
	$c_codcli=$item['c_codcli'];
	$c_nomcli=$item['c_nomcli'];
	$c_nomcli2=$item['c_nomcli2'];
	$c_nomtec=$item['c_nomtec'];
	$c_fecdoc=$item['c_fecdoc'];
	$c_placa1=$item['c_placa1'];
	$c_placa2=$item['c_placa2'];
	$c_chofer=$item['c_chofer'];
	$c_fechora=$item['c_fechora'];
	$c_condicion=$item['condi'];
	$c_tipois=$item['c_tipois'];
	$c_tipo=$item['c_tipo'];
	$c_tipo2=$item['c_tipo2'];
	$c_tipo3=$item['c_tipo3'];
	$c_obs=$item['c_obs'];
	$c_combu=$item['c_combu'];
	$c_usuario=$_GET['udni'];
	$c_precinto=$item['c_precinto'];
	$c_almacen=$item['c_almacen'];
	$c_numeir=$item['c_numeir'];
	$observacion=utf8_decode(strtoupper($item['c_obseir']));
	$c_material=$item['c_material'];	
	$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];
	
	$c_licencia=$item['c_licencia'];
	$transportista=$item['transportista'];
	$c_precinto1=$item['c_precinto'];
	$c_precinto2=$item['c_precintocli'];
	$c_sitalm=$item['c_sitalm'];
		if($c_sitalm=='D'){
			$sitalm='DISPONIBLE';
		}else if($c_sitalm=='R'){
			$sitalm='RUTA';
		}else if($c_sitalm=='A'){
			$sitalm='ALQUILER';
		}else if($c_sitalm=='V'){
			$sitalm='VENTA';
		}else if($c_sitalm=='L'){
			$sitalm='DEVOLUCION';
		}else if($c_sitalm=='P'){
			$sitalm='PRESTAMO';
		}
	/*$resultado2=listaFotosEquiposM($c_nserie);
		if($resultado2 != NULL){
		  foreach ($resultado2 as $itemE) {
			$nombreimg=$itemE['nombre'];	
	      }
		}*/
  }
}


//CONDICIONES
if($c_tipoio=='1'){$mov='ENTRADA';}else{$mov='SALIDA';}
if($c_condicion=='1'){$cond='VACIO';}elseif($c_condicion=='2'){$cond='LLENO';}elseif($c_condicion=='3'){$cond='FCL';}else{$cond='LCL';}


require('mysql_table.php');
//require('dbconex.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{

	$this->SetFont('Arial','B',12);
	
	//$this->Cell(0,0,' ZGROUP SAC | RUC:20521180774',0,1,'B'); //NEGRITA NO CENTRADO
	$this->Cell(0,0,' ZGROUP SAC | RUC:20521180774',0,1,'C');   //NEGRITA CENTRADO
	$this->Ln(5);
	//Ensure table header is output
	parent::Header();
}
}

$pdf=new PDF('P','mm','A4'); 
//$dimensiones=array (80,120);
//$pdf=new PDF('P','mm',$dimensiones);
// 
$pdf->SetMargins(30, 25, 20); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();

$pdf->SetFont('Arial','',10);

/*$pdf->Cell(180,7,'CUENTAS CORRIENTES ZGROUP',1,1,'C','true'); 
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,7,'BCP DOLARES',1,0,'C');
$pdf->cell(90,7,'191-1775551-1-67',1,0,'C');*/

/*el tamaño esta en mm
$top_ini = 24;
    $pdf->SetXY(37, $top_ini); //top 24mm y empieza en 37mm
    $pdf->Cell(21, 5, $c_numlet, 0, 1, 'C'); //widh 21mm,heigh 5mm*/	

$pdf->Cell(20,4,'Nro EIR',0,0,'L');
$pdf->Cell(20,4,':'.$c_numeir,0,0,'L');
//$pdf->Ln(5);
$pdf->SetXY(110, 30);
$pdf->Cell(20,4,'Fecha EIR',0,0,'L'); 
$pdf->Cell(20,4,':'. vfecha(substr($c_fechora,0,10)),0,0,'L');
$pdf->Cell(20,4,substr($c_fechora,11,8),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(20,4,'Movimiento',0,0,'L'); 
$pdf->Cell(20,4,':'.$mov,0,0,'L');
//$pdf->Ln(5);
$pdf->SetXY(110, 35);
$pdf->Cell(20,4,'Condicion',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($cond),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(20,4,'Gate',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_nomtec),0,0,'L');
//$pdf->Ln(5);
$pdf->SetXY(110, 40);
$pdf->Cell(20,4,'Cliente',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_nomcli),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(20,4,'Condicion E',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($sitalm),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(20,4,'Transport.',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($transportista),0,0,'L');
//$pdf->Ln(5);
$pdf->SetXY(110, 50);
$pdf->Cell(20,4,'Placa',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_placa1),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(20,4,'Conductor',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_chofer),0,0,'L');
//$pdf->Ln(5);
$pdf->SetXY(110, 55);
$pdf->Cell(20,4,'Licencia',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_licencia),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(20,4,'Equipo',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_codprd),0,0,'L');
//$pdf->Ln(5);
$pdf->SetXY(110, 60);
$pdf->Cell(20,4,'Codigo',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_nserie),0,0,'L');
$pdf->Ln(8);
//$pdf->Image('logo_pb1.png',10,8,33); //la imagen la esta llamando del controlador-cambiaruta
										//'logo_pb2.png',10,8,33 10left,8top,33tamaño
//$pdf->Image($c_nserie.'-1'.'.jpg',30,70,50); 
//$pdf->Image('http://localhost:5050//PanelPruebas/MVC_Vista/Digital/images/'.$c_nserie.'-1'.'.jpg',30,70,50,0);
$pdf->SetFont('Arial','B',10);
$resultado2=listaFotosEquiposM($c_nserie);
		$j=0;
		if($resultado2 != NULL){
		  foreach ($resultado2 as $itemE) {
			$nombreimg=$itemE['nombre'];
			$tipo=substr($nombreimg,-5,1); //1,2 o 3
			if($tipo=='1'){
				$pdf->Cell(50,4,'VISTA LATERAL',0,0,'L'); 				
				$pdf->Ln(48);
			}else if($tipo=='2'){
				$pdf->Cell(50,4,'VISTA FRONTAL',0,0,'L'); 				
				$pdf->Ln(48);
			}if($tipo=='3'){
				$pdf->Cell(50,4,'VISTA TRASERA',0,0,'L'); 				
				$pdf->Ln(48);
			}				
			$pdf->Image('../MVC_Vista/Digital/images/'.$nombreimg,30,73+$j,50,0);
	      	$j=$j+48;
		  }
		}
$pdf->Output($c_numeir.'.pdf', 'I');
?>