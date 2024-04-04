<?php

// Obtención de la cantidad de Registros. 



 if(!isset($_pagi_conteo_alternativo)){
	// Si no se ha elegido el tipo de conteo
	// Se realiza el conteo dese mySQL con COUNT(*)
	$_pagi_conteo_alternativo = false;
 }
 

 if($_pagi_conteo_alternativo == false){
 	$_pagi_sqlConta = eregi_replace("select (.*) from", "SELECT COUNT(*) FROM", $sql);
 	$_pagi_result2 = mysqli_query($conexion,$_pagi_sqlConta);
	// Si ocurrió error y mostrar errores está activado
 	if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo de registros: $_pagi_sqlConta. Mysql dijo: <b>".mysqli_error()."</b>");
 	}
	$row = mysqli_fetch_array($_pagi_result2);
        $_pagi_totalReg= $row[0];
 	//$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros
 }else{
	$_pagi_result3 = mysqli_query($conexion,$sql);
	// Si ocurrió error y mostrar errores está activado
 	if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
		die (" Error en la consulta de conteo alternativo de registros: $sql. Mysql dijo: <b>".mysqli_error()."</b>");
 	}
	$_pagi_totalReg = mysqli_num_rows($_pagi_result3);
 }


//Obtención de los registros que se mostrarán en la página actual.
 

$regxpag = 10;	
$pagina=$regxpag*$pag;
 
 $_pagi_sqlLim = $sql." LIMIT $pagina,$regxpag";
 $_pagi_result = mysqli_query($conexion,$_pagi_sqlLim);
 // Si ocurrió error y mostrar errores está activado
 if($_pagi_result == false && $_pagi_mostrar_errores == true){
 	die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysql_error()."</b>");
 }





?>