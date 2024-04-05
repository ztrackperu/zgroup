<table width="870" border="0">
  <tr>
    <td align="center" valign="middle"><a href="Contabilida.php">Regresar</a></td>
  </tr>
</table>
<?php 

$db = 'C:\xampp\htdocs\public\bd\DBZ.mdb';

// Se define la cadena de conexi�n
$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
DBQ=$db";
// Se realiza la conex�n con los datos especificados anteriormente
$cid = odbc_connect( $dsn, '', 'CIAD876');
if (!$cid) { exit( "Error al conectar: " . $cid);
}

	//extract($_REQUEST);//extraigo todos los tx a variables locales
	//$cid=odbc_connect("$cid","","");	
	$fecha=$_REQUEST['select'];
	$mes=$_REQUEST['select2'];
	$dini=$_REQUEST['select3'];
	$dfin=$_REQUEST['select4'];
	
	
	for ($i=$dini;$i<=$dfin;$i++){
		
		$dia=$i.'-'.$mes.'-'.$fecha;
		//echo $i;
	$sql="Insert into pcfindia (d_fecha,b_swtfin,c_codcia,c_codtda,c_tope,c_oper) 
	values ('$dia','0','01','000','N','GALFARO')";
	$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec()<br>$sql"));
	}
	if (!$result){
	    $mensaje="Fallo Registro Vuelta Intentar";
  print "<script>alert('$mensaje')</script>";
	}
	else{
	   $mensaje="Datos Guardados Correctamente";
  print "<script>alert('$mensaje')</script>";
	 }
	//finfor
 
?>