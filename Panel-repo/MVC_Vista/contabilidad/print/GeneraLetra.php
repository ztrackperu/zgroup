<?php
require('ToRtf.php');
require('dbconex.php');

$c_nume=$_GET['ot'];
$strConsulta="select * from letras where c_nume='$c_nume'";
$historial = odbc_exec($cid,$strConsulta);
	

while($item = odbc_fetch_array($historial)){ 
$i=1;	
$c_numlet=$item["c_numlet"]; 
$c_nomcli=$item["c_nomcli"];
$c_imppal=$item["c_imppal"];
	$i++;
	}


$f = new ToRtf();
$f->fichero = "plantilla.rtf";
$f->fsalida = 'nuevo.rtf';
$f->dirsalida = '';
$f->retorno = 'fichero';
$f->prefijo = 'L_';
$f->valores = array('#*LETRA*#'=>"$c_numlet",'#*NOMBRE*#'=>"$c_nomcli",'#*MONTO*#'=>"$c_imppal");
$f->rtf();
?>