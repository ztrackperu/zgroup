<?php
//if (!isset($_SESSION)) {
//  session_start();
//}
//$MM_authorizedUsers = "";
//$MM_donotCheckaccess = "true";
//
//// *** Restrict Access To Page: Grant or deny access to this page
//function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
//  // For security, start by assuming the visitor is NOT authorized. 
//  $isValid = False; 
//
//  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
//  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
//  if (!empty($UserName)) { 
//    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
//    // Parse the strings into arrays. 
//    $arrUsers = Explode(",", $strUsers); 
//    $arrGroups = Explode(",", $strGroups); 
//    if (in_array($UserName, $arrUsers)) { 
//      $isValid = true; 
//    } 
//    // Or, you may restrict access to only certain users based on their username. 
//    if (in_array($UserGroup, $arrGroups)) { 
//      $isValid = true; 
//    } 
//    if (($strUsers == "") && true) { 
//      $isValid = true; 
//    } 
//  } 
//  return $isValid; 
//}
//
//$MM_restrictGoTo = "../index.php";
//if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
//  $MM_qsChar = "?";
//  $MM_referrer = $_SERVER['PHP_SELF'];
//  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
//  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
//  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
//  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
//  header("Location: ". $MM_restrictGoTo); 
//  exit;
//}
//?>
<?php
 $idusuario  =$_POST['codi'];

 $modulo=$_POST['hiddenField'];
 $idempleado  =$_GET['udni'];
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	
	$this->SetFont('Arial','',13);
	
	$this->Cell(0,0,'SALIDA DE PAQUETES',0,1,'B');
	$this->Ln(1);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','1234');
mysql_select_db('zgroup');
/*mysql_connect('localhost','zgroupco','zgroup@@@');
mysql_select_db('zgroupco_bdzgroup');*/
//$idusuario=$_GET['acc'];
//$idempleado=$_GET['udni'];


$pdf=new PDF('P','mm','A4'); 
//$dimensiones=array (80,120);
//$pdf=new PDF('P','mm',$dimensiones);

$pdf->SetMargins(2, 10, 2); // PERMITE ACOMODAR LOS MARGENES DE IMPRESION
$pdf->AddPage();

/* bk $strConsulta =  mysql_query("SELECT id_paquete, detalle_paquete, 
id_contenedor,fila_paquete,columna_paquete from mpaquete where id_usuario = '$idusuario'  and estado_impresion_out='0'
and check_egreso=''");*/
$strConsulta =  mysql_query("SELECT id_paquete, detalle_paquete, 
id_contenedor,fila_paquete,columna_paquete from mpaquete where id_usuario = '$idusuario'  and estado_impresion_out='0'
and check_egreso='1'");
// este select se escoje los resgistros que no han sido impresos y el usuario que lo ah ingresado
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,6,'**********************************************',0,1);
$pdf->Cell(20,6,'Cod.****Descripcion*********Ubicacion',0,1);
$pdf->Cell(20,6,'**********************************************',0,1);
while($resultado = mysql_fetch_array($strConsulta)){ 
$pdf->Cell(7,5,$resultado['id_paquete'],0,0,'C'); 
$pdf->Cell(48,5,'   '.$resultado['detalle_paquete'],0,0,'L');
$pdf->Cell(6,5,$resultado['id_contenedor'].$resultado['fila_paquete'].$resultado['columna_paquete'],0,0,'R'); 
$pdf->Ln(); 
$actualizar =  mysql_query("UPDATE mpaquete SET estado_impresion_out=1 where  id_usuario = '$idusuario'  and check_egreso='1'");
// aqui actualizo el campo que ya ah sido impreso, coloca el valor 1
mysql_query($actualizar);
}  
// Ahora imprimir el detalle de usuario
$strConsulta = "SELECT id_paquete,modulo, detalle_paquete, id_contenedor,fila_paquete,columna_paquete,

concat(nombres,' ',paterno) as nomuser,p.id_usuario,nombre_usuario,hora_egreso as hora,fecha_egreso as fecha


from mpaquete as p,musuario as m,usuario as u where m.id_usuario=p.id_usuario
and id_empleado=udni and p.id_usuario = '$idusuario' and p.id_empleado_out='$idempleado' AND check_egreso = '1'
 order by hora_egreso desc";
$viajes = mysql_query($strConsulta);
$fila = mysql_fetch_array($viajes);

$entre = mysql_query($sql); 

$id_usuario = $id_usuario; 
$nombre_usuario = $nombre_usuario; 
$nombre = $nombre; 
$fecha = date; 
$hora = $hora; 

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(20,6,'***************************************************',0,1);
	$pdf->Cell(20,6,'Codigo: '.$fila['id_usuario'],0,1); 
	$pdf->Cell(20,6,'Nombre: '.$fila['nombre_usuario'],0,1);
	$pdf->Cell(20,6,'Modulo de Atencion: '.$fila['modulo'],0,1);
	$pdf->Cell(20,6,'Atendido Por: '.$fila['nomuser'],0,1); 
	$pdf->Cell(20,6,'Fecha: '.$fila['fecha'].'   Hora: '.$fila['hora'],0,1); 
	//$pdf->Cell(20,6,'Hora: '.$fila['hora'],0,1); 


$pdf->Output();
?>