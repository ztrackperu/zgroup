<?php
if($resultado != NULL){
	foreach ($resultado as $item) {
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
$situ=$item['c_sitalm'];
if($situ=='A'){
	$condeq='ALQUILER';
	}else if($situ=='V'){
		$condeq='VENTA';
		}else if($situ=='R'){
			$condeq='RUTA-FLETE';
			}
/*$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];
$codmar=$item['c_codmar'];$c_codmod=$item['c_codmod'];$c_codcol=$item['c_codcol'];$c_anno=$item['c_anno'];$c_control=$item['c_control'];$c_codcat=$item['c_codcat'];$c_tiprop=$item['c_tiprop'];$c_mcamaq=$item['c_mcamaq'];$c_procedencia=$item['c_procedencia'];$c_nroejes=$item['c_nroejes'];$c_tamCarreta=$item['c_tamCarreta'];$c_serieequipo=$item['c_serieequipo'];$c_peso=$item['c_peso'];$c_tara=$item['c_tara'];
$c_seriemotor=$item['c_seriemotor'];$c_canofab=$item['c_canofab'];$c_cmesfab=$item['c_cmesfab'];$c_cfabri=$item['c_cfabri'];$c_cmodel=$item['c_cmodel'];$c_ccontrola=$item['c_ccontrola'];$c_tipgas=$item['c_tipgas'];
$procedencia=$item['c_procedencia'];
$c_fabcaja=$item['c_fabcaja'];
$tipoclase=$item['tipoclase'];*/


	}
}
if($resultado2 != NULL){
	foreach ($resultado2 as $itemE) {
		
$codmar=$itemE['c_codmar'];$c_codmod=$itemE['c_codmod'];$c_codcol=$itemE['c_codcol'];$c_anno=$itemE['c_anno'];$c_control=$itemE['c_control'];$c_codcat=$itemE['c_codcat'];$c_tiprop=$itemE['c_tiprop'];$c_mcamaq=$itemE['c_mcamaq'];$c_procedencia=$itemE['c_procedencia'];$c_nroejes=$itemE['c_nroejes'];$c_tamCarreta=$itemE['c_tamCarreta'];$c_serieequipo=$itemE['c_serieequipo'];$c_peso=$itemE['c_peso'];$c_tara=$itemE['c_tara'];
$c_seriemotor=$itemE['c_seriemotor'];$c_canofab=$itemE['c_canofab'];$c_cmesfab=$itemE['c_cmesfab'];$c_cfabri=$itemE['c_cfabri'];$c_cmodel=$itemE['c_cmodel'];$c_ccontrola=$itemE['c_ccontrola'];$c_tipgas=$itemE['c_tipgas'];
$procedencia=$itemE['c_procedencia'];
$c_fabcaja=$itemE['c_fabcaja'];
$tipoclase=$itemE['tipoclase'];
$c_serial=$itemE['c_serieequipo'];
	}
}
$ven = listamaterialC();
            
                 foreach($ven as $item){
					 if($item["tm_codi"]==$c_material){
						 $mate=$item["tm_desc"];
						 }
                }	
$mar=ListaMarcaCajaC();
                 foreach($mar as $itemx){
					 if($itemx["c_numitm"]==$codmar){
						 $marcacaja=$itemx["c_desitm"];
					 }
                }	
$col=listacolorC();

foreach($col as $itemz){
					 if($itemz["c_numitm"]==$c_codcol){
						 $color = $itemz["c_desitm"];
					 }
                }	
$mq = ListaMarcaMaqC();

foreach($mq as $itemz){
					 if($itemz["c_numitm"]==$c_mcamaq){
						 $maquinas = $itemz["c_desitm"];
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

	$this->SetFont('Arial','',9);

	$this->Cell(0,0,'                    TICKET EIR',0,1,'B');
	$this->Ln(5);
	$this->Cell(0,0,' ZGROUP SAC | Ruc:20521180774',0,1,'B');
	$this->Ln(1);
	//Ensure table header is output
	parent::Header();
}
}

$pdf=new PDF('P','mm','A4'); 
//$dimensiones=array (80,120);
//$pdf=new PDF('P','mm',$dimensiones);
// 
$pdf->SetMargins(2, 10, 2); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();

$pdf->SetFont('Arial','',8);

/*$pdf->Cell(180,7,'CUENTAS CORRIENTES ZGROUP',1,1,'C','true'); 
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,7,'BCP DOLARES',1,0,'C');
$pdf->cell(90,7,'191-1775551-1-67',1,0,'C');*/

$pdf->Cell(20,4,'---------------------------------------------------',0,1);
$pdf->Cell(20,4,'Nro EIR',0,0,'L');
$pdf->Cell(20,4,':'.$c_numeir,0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Fecha EIR',0,0,'L'); 
$pdf->Cell(20,4,':'.$c_fechora,0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Movimiento',0,0,'L'); 
$pdf->Cell(20,4,':'.$mov,0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Condicion',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($cond),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Gate',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_nomtec),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Cliente',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_nomcli),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Condicion Eq.',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($condeq),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'---------------------------------------------------',0,1);
$pdf->Cell(20,4,'Transportista',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($transportista),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Placa',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_placa1),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Conductor',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_chofer),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Licencia',0,0,'L'); 
$pdf->Cell(20,4,':'.strtoupper($c_licencia),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'---------------------------------------------------',0,1);
$pdf->Cell(20,4,'Equipo',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_codprd),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Codigo',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_nserie),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Precinto 1',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_precinto1),0,0,'L');
$pdf->Ln();
$pdf->Cell(20,4,'Precinto 2',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_precinto2),0,0,'L');
$pdf->Ln();

if($c_serial!=""){
$pdf->Cell(20,4,'Serie',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_serial),0,0,'L');
$pdf->Ln();
}else{
$pdf->Cell(20,4,'Serie',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper('S/N'),0,0,'L');
$pdf->Ln();

}


if($c_fabcaja!=""){
$pdf->Cell(20,4,'Fabricante',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_fabcaja),0,0,'L');
$pdf->Ln();
}
if($procedencia!=""){
$pdf->Cell(20,4,'Procedencia',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($procedencia),0,0,'L');
$pdf->Ln();
}

if($marcacaja!=""){
$pdf->Cell(20,4,'Marca',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($marcacaja),0,0,'L');
$pdf->Ln();
}

if($color!=""){
$pdf->Cell(20,4,'Color',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($color),0,0,'L');
$pdf->Ln();
}

if($c_anno!=""){
$pdf->Cell(20,4,'A. Fabric.',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_anno),0,0,'L');
$pdf->Ln();
}

if($mate!=""){
$pdf->Cell(20,4,'Tipo Material',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($mate),0,0,'L');
$pdf->Ln();
}

if($c_peso!=""){
$pdf->Cell(20,4,'Peso',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_peso),0,0,'L');
$pdf->Ln();
}

if($c_tara!=""){
$pdf->Cell(20,4,'Tara',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_tara),0,0,'L');
$pdf->Ln();
}

if($maquinas!=""){
$pdf->Cell(20,4,'Marca Maq.',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($maquinas),0,0,'L');
$pdf->Ln();
}

if($c_cfabri!=""){
$pdf->Cell(20,4,'Fabric. Maq.',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_cfabri),0,0,'L');
$pdf->Ln();
}

if($c_canofab!=""){
$pdf->Cell(20,4,'A. Fab. Maq',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_canofab),0,0,'L');
$pdf->Ln();
}

if($c_cmodel!=""){
$pdf->Cell(20,4,'Modelo',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_cmodel),0,0,'L');
$pdf->Ln();
}

if($c_ccontrola!=""){
$pdf->Cell(20,4,'Controlador',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_ccontrola),0,0,'L');
$pdf->Ln();
}

if($c_tipgas!=""){
$pdf->Cell(20,4,'Tipo Gas .',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_tipgas),0,0,'L');
$pdf->Ln();
}

if($c_tamCarreta!=""){
$pdf->Cell(20,4,'Tamaño',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_tamCarreta),0,0,'L');
$pdf->Ln();
}

if($c_vin!=""){
$pdf->Cell(20,4,'Nro VIN',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_vin),0,0,'L');
$pdf->Ln();
}

if($c_seriemotor!=""){
$pdf->Cell(20,4,'Serie Motor',0,0,'L'); 	
$pdf->Cell(20,4,':'.strtoupper($c_seriemotor),0,0,'L');
$pdf->Ln();
}

$pdf->Cell(20,4,'---------------------------------------------------',0,1);
$pdf->Cell(20,4,'Descripcion',0,0,'L'); 	
$pdf->Ln();
$pdf->Cell(22,20,'',1,1,'L'); 	
$pdf->Cell(20,4,'---------------------------------------------------',0,1);
$pdf->Cell(20,4,'Observaciones:',0,0,'L'); 
$pdf->Ln();	
$pdf->Cell(20,4,strtoupper($observacion),0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(20,4,'---------------------------------------------------',0,1);
$pdf->Cell(20,4,'                      Inspector',0,0,'L'); 	





$pdf->Output($c_numeir.'.pdf', 'I');
?>