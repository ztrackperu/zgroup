<?php 
//header('Content-Type:application/pdf;charset=UTF-8');

/*require('dbconex.php');
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
	}*/

if (PHP_SAPI == 'cli'){
			die('Este archivo solo se puede ver desde un navegador web');
}
		/** Se agrega la libreria PHPExcel */
		require_once '../../lib/PHPExcel/PHPExcel.php';


		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Sistemas") //Autor
							 ->setLastModifiedBy("Usuario") //Ultimo usuario que lo modificó
							 ->setTitle("Impresion Eir")
							 ->setSubject("Impresion Eir")
							 ->setDescription("Impresion Eir")
							 ->setKeywords("Impresion Eir")
							 ->setCategory("Reporte Impresion Eir");

		$tituloReporte = "           TICKET EIR          ";
		$subtituloReporte = "ZGROUP SAC | RUC 20521180774<BR>
		                     --------------------------------";
		$lineas="------------------------------------------";
		$titulosColumnas = array('NOMBRE', 'FECHA DE NACIMIENTO', 'SEXO', 'CARRERA');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:D1');
		$nletra='       L0000078';
		$lgiro='29-12-2015';
		$fvcto='26-02-2016';
		$moneda='USD';
		$monto='7,080.00';
		$montoletra='       SIETE MIL CON 100/DOLARES AMERICANOS';
		$ast='***************************';
		$aceptante='       ALINORTE PERU SAC';
		$dire='       AV RICARDO PALMA NRO 156 LIMA-SURQUILOO';
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('B2',$nletra)
					->setCellValue('B5',$montoletra.$ast)
					->setCellValue('B8',$aceptante)
					->setCellValue('B9',$dire);

				
		//Se agregan los datos de los alumnos
/*		$i = 5;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['alumno'])
		            ->setCellValue('B'.$i,  $fila['fechanacimiento'])
        		    ->setCellValue('C'.$i,  $fila['sexo'])
            		->setCellValue('D'.$i, utf8_encode($fila['correo']));
					$i++;
		}*/
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Draft 12cpi',
    	       // 'bold'      => true,
        	   // 'italic'    => false,
              //  'strike'    => false,
               //	'size' =>16
	            	
            ),
	        
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Draft 12cpi'
               
                
            ),
            
    		);
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Draft 12cpi'              
               	
           	),
           
           	
        ));
		 
		/*$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A4:D4')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:D".($i-1));
				
		for($i = 'A'; $i <= 'D'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}*/
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Alumnos');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		//$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,5);
		
		
		$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);
		$objPHPExcel->getActiveSheet()->getProtection()->setPassword('password');
		
		
		
		
		
		
		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	
?>