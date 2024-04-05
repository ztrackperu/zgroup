<?php
$c_numeir=$_GET['neir'];
$c_idequipo=$_GET['eq'];
require('fpdf/mysql_table.php');
require('dbconex.php');
$strConsulta = "select cabeir.c_condicion as condi,* from cabeir,deteir where cabeir.c_numeir=deteir.c_numeir and cabeir.c_numeir=$c_numeir and c_est='1'";
$historial = odbc_exec($cid, $strConsulta);
$item = odbc_fetch_array($historial);
    //$numfilas=odbc_num_rows($historial);
/*if($historial != NULL){
	foreach ($historial as $item) {*/
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
$c_usuario='43377015';
$c_precinto=$item['c_precinto'];
$c_almacen=$item['c_almacen'];
$c_numeir=$item['c_numeir'];
$observacion=utf8_decode(strtoupper($item['c_obseir']));
$observacion1=utf8_decode(strtoupper($item['c_obs']));
$c_material=$item['c_material'];
$c_idequipo=$item['c_idequipo'];
$c_codprd=$item['c_codprd'];
$c_nserie=$item['c_nserie'];
$mate=$item['c_material'];
$fecha=substr($item['c_fechorareg'], 11, 8);
$c_numguia=$item['c_numguia'];
$c_motivo=$item['c_motivo'];


$c_licencia=$item['c_licencia'];
$transportista=$item['transportista'];
$c_precinto1=$item['c_precinto'];
$c_precinto2=$item['c_precintocli'];
$situ=$item['c_sitalm'];
if ($situ=='A') {
    $condeq='ALQUILER';
} elseif ($situ=='V') {
    $condeq='VENTA';
} elseif ($situ=='R') {
    $condeq='RUTA-FLETE';
} elseif ($situ=='D') {
    $condeq='DISPONIBLE';
} else {
    $condeq='NO DEFINDO';
}



if($c_tipo2=='1'){$cond2='LIMPIO';}else{$cond2='SUCIO';}


/* 
    Datos del equipo por id
*/
$strConsulta2 = "select * from invequipo where c_idequipo='$c_idequipo'";
$resultado2 = odbc_exec($cid, $strConsulta2);
$itemE = odbc_fetch_array($resultado2);
$codmar=$itemE['c_codmar'];
$c_codmod=$itemE['c_codmod'];
$c_codcol=$itemE['c_codcol'];
$c_anno=$itemE['c_anno'];
$c_control=$itemE['c_control'];
$c_codcat=$itemE['c_codcat'];
$c_tiprop=$itemE['c_tiprop'];
$c_mcamaq=$itemE['c_mcamaq'];
$c_procedencia=$itemE['c_procedencia'];
$c_nroejes=$itemE['c_nroejes'];
$c_tamCarreta=$itemE['c_tamCarreta'];
$c_serieequipo=$itemE['c_serieequipo'];
$c_peso=$itemE['c_peso'];
$c_tara=$itemE['c_tara'];
$c_seriemotor=$itemE['c_seriemotor'];
$c_canofab=$itemE['c_canofab'];
$c_cmesfab=$itemE['c_cmesfab'];
$c_cfabri=$itemE['c_cfabri'];
$c_cmodel=$itemE['c_cmodel'];
$c_ccontrola=$itemE['c_ccontrola'];
$c_tipgas=$itemE['c_tipgas'];
$procedencia=$itemE['c_procedencia'];
$c_fabcaja=$itemE['c_fabcaja'];
//$tipoclase=$itemE['tipoclase'];
$c_serial=$itemE['c_serieequipo'];
$maquinas =$itemE['c_mcamaq'];
$c_vin=$itemE['c_vin'];

/*
*/
$strConsultaPais = "SELECT * FROM pais WHERE c_codigo = '$procedencia'";
$resultProcedenciaPais = odbc_exec($cid, $strConsultaPais);
$procedenciaPais = odbc_fetch_object($resultProcedenciaPais);
if(!$procedenciaPais){
	$procedenciaPais = $procedencia;
}else{
	$procedenciaPais = $procedenciaPais->c_nombre;
}
/*

*/
$strConsulta3 = "SELECT tm_codi,tm_desc from tab_material order by tm_desc asc";
$historial = odbc_exec($cid, $strConsulta3);
    $numfilas=odbc_num_rows($historial);
while ($item = odbc_fetch_array($historial)) {
    if ($item["tm_codi"]==$c_material) {
        $mate=$item["tm_desc"];
    }
}
/*

*/
$strConsulta4 = "SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='MCA' AND C_ESTADO='1' AND  C_CAMITM<>'1'";
$historial = odbc_exec($cid, $strConsulta4);
    $numfilas=odbc_num_rows($historial);
while ($itemx = odbc_fetch_array($historial)) {
    if ($itemx["C_NUMITM"]==$codmar) {
        $marcacaja=$itemx["C_DESITM"];
    }
}
/*

*/
$strConsulta5 = "SELECT C_NUMITM, C_DESITM, C_ESTADO
FROM Dettabla WHERE C_CODTAB='COL' order by C_NUMITM asc";
    $historial = odbc_exec($cid, $strConsulta5);
    $numfilas=odbc_num_rows($historial);
while ($itemz = odbc_fetch_array($historial)) {
    if ($itemz["C_NUMITM"]==$c_codcol) {
         $color = $itemz["C_DESITM"];
    }
}
//ECHO $c_codcol;
/*
*/
$strConsulta6 = "SELECT C_NUMITM, C_DESITM, C_ESTADO FROM Dettabla WHERE C_CODTAB='MCM' AND C_ESTADO='1'";
    $historial = odbc_exec($cid, $strConsulta6);
    $numfilas=odbc_num_rows($historial);
while ($itemz = odbc_fetch_array($historial)) {
    if ($itemz["C_NUMITM"]==$c_mcamaq) {
        $maquinas = $itemz["C_DESITM"];
    } else {
        $maquinas=null;
    }
}
/*
    Datos Maquina Asignada
*/
$maestrosinvM_path = 'model/inventario/maestrosinvM.php';
if(!file_exists($maestrosinvM_path)) {
    $maestrosinvM_path = '../../../model/inventario/maestrosinvM.php';
}
require_once $maestrosinvM_path;
$maestrosinvM = new Maestrosinv();
$datosMaq = $maestrosinvM->getDatosMaquinasAsignadas(['id_equipo'=>$c_idequipo]);
$seriesMaq = '';
$controladoresMaq = '';
$gasMaq = '';
if(!$datosMaq['error']){
    foreach($datosMaq['data'] as $dmaq){
        $seriesMaq .= $dmaq['serie_maq'].',';
        $controladoresMaq .= $dmaq['controlador_maq'].',';
        $gasMaq .= $dmaq['gas_maq'].',';
    }
    
}else{
    $seriesMaq = $c_serieequipo;
    $controladoresMaq = $c_ccontrola;
    $gasMaq = $c_tipgas;
}
$seriesMaq = rtrim($seriesMaq,',');
$controladoresMaq = rtrim($controladoresMaq,',');
$gasMaq = rtrim($gasMaq,',');
//
//CONDICIONES
if ($c_tipoio=='1') {
    $mov='ENTRADA';
} else {
    $mov='SALIDA';
}
if ($c_condicion=='1') {
    $cond='VACIO';
} elseif ($c_condicion=='2') {
    $cond='LLENO';
} elseif ($c_condicion=='3') {
    $cond='FCL';
} else {
    $cond='LCL';
}


class PDF extends PDF_MySQL_Table{
    function Header(){

        $this->SetFont('Times', '', 11);
        $this->Cell(0, 0, '                        TICKET  EIR', 0, 1, 'B');
        $this->Ln(5);
        $this->Cell(0, 0, '       ZGROUP SAC | Ruc:20521180774', 0, 1, 'B');
        $this->Ln(1);
        //Ensure table header is output
        parent::Header();
    }
}

//$pdf=new PDF('P','mm','A4'); 
$dimensiones=array (80,225);
$pdf=new PDF('P', 'mm', $dimensiones);
// 
$pdf->SetMargins(1, 10, 1); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();

$pdf->SetFont('Times', '', 8);

/*$pdf->Cell(180,7,'CUENTAS CORRIENTES ZGROUP',1,1,'C','true'); 
$pdf->Ln(); 
$pdf->SetTextColor(0,0,0);
$pdf->cell(90,7,'BCP DOLARES',1,0,'C');
$pdf->cell(90,7,'191-1775551-1-67',1,0,'C');*/

$pdf->Cell(20, 4, '===============================================', 0, 1);
$pdf->Cell(20, 4, 'Nro EIR', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.$c_numeir, 0, 0, 'L');
$pdf->Ln();
if ($c_motivo=='Con Orden de Compra'){
$pdf->Cell(20, 4, 'Orden Compra', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.$c_numguia, 0, 0, 'L');
$pdf->Ln();	
	
}else if($c_motivo=='Con Guia Remision'){
$pdf->Cell(20, 4, 'Guia Remision', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.$c_numguia, 0, 0, 'L');
$pdf->Ln();
}

$pdf->Cell(20, 4, 'Fec. '.$mov, 0, 0, 'L');
$pdf->Cell(20, 4, ': '.substr($c_fechora, 0, 10).' '.$fecha, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Movimiento', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.$mov, 0, 0, 'L');
$pdf->Ln();

$pdf->Cell(20, 4, 'Condicion 1', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($cond), 0, 0, 'L');
$pdf->Ln();





$pdf->Cell(20, 4, 'Condicion 2', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($cond2), 0, 0, 'L');
$pdf->Ln();




$pdf->Cell(20, 4, 'Gate', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($c_nomtec), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Cliente', 0, 0, 'L');
$pdf->setFillColor(255,255,255);
$pdf->MultiCell(55, 3, ': '.strtoupper($c_nomcli), 0, 'L', 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Condicion Eq.', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($condeq), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, '---------------------------------------------------', 0, 1);
$pdf->Cell(20, 4, 'Transportista', 0, 0, 'L');
$pdf->setFillColor(255,255,255);
$pdf->MultiCell(55, 3, ': '.strtoupper($transportista), 0, 'L', 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Placa', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($c_placa1.'/'.$c_placa2), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Conductor', 0, 0, 'L');
$pdf->MultiCell(55, 3, ': '.strtoupper(utf8_encode(($c_chofer))), 0, 'L', 'L');
// $pdf->Cell(20, 4, ': '.strtoupper(utf8_encode(($c_chofer))), 0, 0, 'L');

$pdf->Ln();
$pdf->Cell(20, 4, 'Licencia', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($c_licencia), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, '---------------------------------------------------', 0, 1);
$pdf->Cell(20, 4, 'Equipo', 0, 0, 'L');
//$pdf->Cell(20, 4, ': '.strtoupper($c_codprd), 0, 0, 'L');
$pdf->MultiCell(60, 4, ': '.strtoupper($c_codprd), 0, 'L', 'L');
//$pdf->Ln();
$pdf->Cell(20, 4, 'Codigo (Serie)', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($c_nserie), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Precinto 1', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($c_precinto1), 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(20, 4, 'Precinto 2', 0, 0, 'L');
$pdf->Cell(20, 4, ': '.strtoupper($c_precinto2), 0, 0, 'L');
$pdf->Ln();
/*
if ($c_serieequipo!=null) {
    $pdf->Cell(20, 4, 'Serie Equipo', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_serieequipo), 0, 0, 'L');
    $pdf->Ln();
} else {
    $pdf->Cell(20, 4, 'Serie Equipo', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper('S/N'), 0, 0, 'L');
    $pdf->Ln();
}*/


if ($c_fabcaja!=null) {
    $pdf->Cell(20, 4, 'Fabricante', 0, 0, 'L');
    $pdf->setFillColor(255,255,255);
    $pdf->MultiCell(55, 3, ': '.strtoupper($c_fabcaja), 0, 'L', 'L');
    // $pdf->Cell(20, 4, ': '.strtoupper($c_fabcaja), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_fabcaja=null;
}
if ($procedencia!=null) {
    $pdf->Cell(20, 4, 'Procedencia', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($procedenciaPais), 0, 0, 'L');
    $pdf->Ln();
} else {
    $procedencia=null;
}

if ($color!=null) {
    $pdf->Cell(20, 4, 'Color', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($color), 0, 0, 'L');
    $pdf->Ln();
} else {
    $color=null;
}

if ($c_anno!=null) {
    $pdf->Cell(20, 4, 'A. Fabric.', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_anno), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_anno=null;
}

if ($mate!=null) {
    $pdf->Cell(20, 4, 'Tipo Material', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($mate), 0, 0, 'L');
    $pdf->Ln();
} else {
    $mate=null;
}

if ($c_peso!=null) {
    $pdf->Cell(20, 4, 'Peso', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_peso), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_peso=null;
}

if ($c_tara!=null) {
    $pdf->Cell(20, 4, 'Tara', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_tara), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_tara=null;
}

if ($maquinas!=null) {
    $pdf->Cell(20, 4, 'Marca Maq.', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($maquinas), 0, 0, 'L');
    $pdf->Ln();
} else {
    $maquinas=null;
}

if ($c_cfabri!=null) {
    $pdf->Cell(20, 4, 'Fabric. Maq.', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_cfabri), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_cfabri=null;
}

if ($c_canofab!=null) {
    $pdf->Cell(20, 4, 'A. Fab. Maq', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_canofab), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_canofab=null;
}

if ($c_cmodel!=null) {
    $pdf->Cell(20, 4, 'Modelo', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_cmodel), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_cmodel=null;
}
if($seriesMaq != ''){
    $pdf->Cell(20, 4, 'Serie Maquinas', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($seriesMaq), 0, 0, 'L');
    $pdf->Ln();
}
if ($controladoresMaq!=null) {
    $pdf->Cell(20, 4, 'Controlador', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($controladoresMaq), 0, 0, 'L');
    $pdf->Ln();
} else {
    $controladoresMaq=null;
}

if ($c_tipgas!=null) {
    $pdf->Cell(20, 4, 'Tipo Gas .', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_tipgas), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_tipgas=null;
}

if ($c_tamCarreta!=null) {
    $pdf->Cell(20, 4, 'Tamaño', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_tamCarreta), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_tamCarreta=null;
}

if ($c_vin!=null) {
    $pdf->Cell(20, 4, 'Nro VIN', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_vin), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_vin=null;
}

if ($c_seriemotor!=null) {
    $pdf->Cell(20, 4, 'Serie Motor', 0, 0, 'L');
    $pdf->Cell(20, 4, ': '.strtoupper($c_seriemotor), 0, 0, 'L');
    $pdf->Ln();
} else {
    $c_seriemotor=null;
}

$pdf->Cell(20, 4, '---------------------------------------------------', 0, 1);
$pdf->Cell(20, 4, 'Descripcion', 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(22, 20, '', 1, 1, 'L');
$pdf->Cell(20, 4, '---------------------------------------------------', 0, 1);
$pdf->Cell(20, 4, 'Observaciones:', 0, 0, 'L');
// $pdf->setFillColor(255,255,255);

$pdf->Ln();
$pdf->MultiCell(55, 3, strtoupper($observacion), 0, 'L', 'L');
// $pdf->Cell(20, 4, strtoupper(($observacion)), 0, 0, 'L');
$pdf->Ln();
$pdf->MultiCell(55, 3, strtoupper($observacion1), 0, 'L', 'L');
// $pdf->Cell(20, 4, strtoupper(($observacion1)), 0, 0, 'L');
// $pdf->Ln();
// $pdf->Ln();
$pdf->Ln();
$pdf->Cell(20, 4, '---------------------------------------------------', 0, 1);
$pdf->Cell(20, 4, '                Inspector', 0, 0, 'L');





$pdf->Output($c_numeir.'.pdf', 'I');
