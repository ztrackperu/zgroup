<?php 
 include("funciones.php");
 include("../MVC_Modelo/cn/dbconex.php");
   //vWritePageToFile( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc=10436232620', '43623262.txt' );
$RUCTXT=$_REQUEST["txtruc"];
function BuscaM($RUCTXT){
	include("../MVC_Modelo/cn/dbconex.php");
	$sql="select pr_razo,pr_nruc,pr_tele,pr_emai,pr_resp FROM promae where pr_ruc='$RUCTXT'";
$resultado = odbc_exec($cid,$sql)or die("Error: ".odbc_error($cid));
	while ($fila = odbc_fetch_array($resultado))
	{
		$Paciente[] = $fila;
	}	
	odbc_close($cid);
	return $Paciente;
}
if($_REQUEST["txtruc"]!=""){

   RecuperarXML( 'http://www.sunat.gob.pe/w/wapS01Alias?ruc='.$RUCTXT, $RUCTXT.'.txt' );
   QuitarXML($RUCTXT.'.txt');
   QiotarLinesBlancas($RUCTXT.'.txt');

$con=mysqli_connect("localhost","root","1234","zgroup");
 
if (mysqli_connect_errno())
  {
  echo "orror  MySQL: " . mysqli_connect_error();
  }
mysqli_query($con,"LOAD DATA LOCAL INFILE '".$RUCTXT.".txt' REPLACE INTO TABLE sunatrusc FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n%%\n'");
/*ELIMINAMOS el TXT*/
unlink($RUCTXT.'.txt'); /// Luego eliminas el TXT
/* LUEGO PODEMOS ELIMINAR EL REGISTRO YA VISUALIZADO RECUERDA Q SOLO ES UNA TAMBLA TEMPORAL */

$result = mysqli_query($con,"SELECT * FROM sunatrusc limit  1");

while($row = mysqli_fetch_array($result))
  {
    $row["camo1"];
    list($RUSX, $RSOS) = split( '[-]', $row["camo1"]);
    $razonsocial=trim($RSOS);
   list($nombrerus, $ruc) = split( '[.]', trim($RUSX));
 // list($ruc, $razonsocial) = split( '[-]', trim($contenido));
    $row["camo2"];
    $row["camo3"];
    $row["camo4"];
  list($nombreestado, $estadoruc) = split( '[.]', $row["camo4"]);
    $row["camo5"];
 // list($nombreretencio, $retencionigv) = split( '[.]', $row["camo5"]);
    $retencionigv=substr($row["camo5"],26,500);
    $row["camo6"];
   list($nomcomericla, $nombrecomercial) = split( '[.]', $row["camo6"]);
   $nombrecomercial=substr($row["camo6"],20,500);
   $Direcciondomicilia=substr($row["camo7"],16,500);
   
   
  $row["camo8"];
  $row["camo9"];
     list($tel, $telf) = split( '[.]', $row["camo9"]);
  //$telf=substr($row["camo9"],16,500);
  
  $row["camo10"];
  $row["camo11"];
  $row["camo12"];
  $row["camo13"];
  $row["camo14"];
  $row["camo15"];
  }
//echo $ruc.$razonsocial;
$result = mysqli_query($con,"TRUNCATE sunatrusc");
mysqli_close($con);

$resultado=BuscaM($RUCTXT);
if($resultado!=NULL){
$mensaje="Ruc Ya Existe Proceda A Registrar Choferes";
		print "<script>alert('$mensaje')</script>";	
include("ListaProveedores.php");
	
	}else{

	//$mensaje="RUC NO Existe";
		
		
		}
	


}

?>