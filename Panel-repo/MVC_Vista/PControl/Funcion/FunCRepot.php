<?

 
function formato_fecha($fecorigi){
$dia= substr($fecorigi, 0, 4);     
$mes= substr($fecorigi, 5, 2);  
$year=substr($fecorigi, 8, 2); 
$formafecha=$year."/".$mes."/".$dia; 	 
return $formafecha;
}


function obtieneMes($nmes)
{
   switch ($nmes) {
  		case "01" : $mes = "Enero"; break;
  		case "02" : $mes = "Febrero"; break;
  		case "03" : $mes = "Marzo"; break;
  	    case "04" : $mes = "Abril"; break;
  		case "05" : $mes = "Mayo"; break;
  		case "06" : $mes = "Junio"; break;
  		case "07" : $mes = "Julio"; break;
  		case "08" : $mes = "Agosto"; break;
  		case "09" : $mes = "Septiembre"; break;
  		case "10" : $mes = "Octubre"; break;
  		case "11" : $mes = "Noviembre"; break;
  		case "12" : $mes = "Diciembre"; break;
   }

   return $mes;
}

function DiaSemana($fecha, $texto = 1)
{ 
   list($ano,$mes,$dia) = explode("-",$fecha);
    $numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$ano));
	
	 if ($texto == 0)
	   return $numerodiasemana;
	 
	 switch($numerodiasemana)
	 {
	    case 0: return "Domingo";
	    case 1: return "Lunes";
	    case 2: return "Martes";
	    case 3: return "Miércoles";
	    case 4: return "Jueves";
	    case 5: return "Viernes";
	    case 6: return "Sábado";
	 }
} 


function TipoMovi($tipoMov,$dni,$diapro){
if ($tipoMov == 'T1' or $tipoMov == 'T2' or $tipoMov == 'T3' or $tipoMov == 'T4' or $tipoMov == 'T8' or $tipoMov == 'T20' or $tipoMov == 'T21' ) {
   
	echo VerificaMoletaHorario($tipoMov,$dni,$diapro);
	 
	 
	
} elseif ($tipoMov == 'T5' ) {
	$NOT=VerMovimi($tipoMov);
	$colorx=substr($NOT,0,3);
    echo "<font color='#FF0000'>$colorx</font>";
	       
	
} elseif ( $tipoMov == 'T6') {
	$NOT=VerMovimi($tipoMov);
	$colorx=substr($NOT,0,3);
	if($colorx=="DES"){
		$vac="VAC";
		echo "<font color='#0000FF'>$vac</font>";
	 }
    
		
} elseif ($tipoMov == 'B13') {
	echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B14') {
 	echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B15') {
    echo "<font color='#FF0000'>Fa.In.";
	echo VerMovimi($tipoMov);
	echo "</font>";
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
	
} elseif ($tipoMov == 'B20') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
}elseif ($tipoMov == 'B23') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
}elseif ($tipoMov == 'B24') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
}elseif ($tipoMov == 'B25') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);

}elseif ($tipoMov == 'B26') {
    echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B27') {
    echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B24') {
    echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B33') {
	echo VerMovimi($tipoMov);
    
}
else{
	echo "No Existe";
	}

}
 
 
 
function ProHorario($tipoMov,$dni,$diapro){
if ($tipoMov == 'T1' or $tipoMov == 'T2' or $tipoMov == 'T3' or $tipoMov == 'T4' or $tipoMov == 'T8' or $tipoMov == 'T20' or $tipoMov == 'T21' ) {
   
	echo ConsultarHorarioPro($tipoMov,$dni,$diapro);
	 
	 
	
} elseif ($tipoMov == 'T5' ) {
	$NOT=VerMovimi($tipoMov);
	$colorx=substr($NOT,0,3);
    echo "<font color='#FF0000'>$colorx</font>";
	       
	
} elseif ( $tipoMov == 'T6') {
	$NOT=VerMovimi($tipoMov);
	$colorx=substr($NOT,0,3);
	if($colorx=="DES"){
		$vac="VAC";
		echo "<font color='#0000FF'>$vac</font>";
	 }
    
		
} elseif ($tipoMov == 'B13') {
	echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B14') {
 	echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B15') {
    echo "<font color='#FF0000'>Fa.In.";
	echo VerMovimi($tipoMov);
	echo "</font>";
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
	
} elseif ($tipoMov == 'B20') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
}elseif ($tipoMov == 'B23') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
}elseif ($tipoMov == 'B24') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);
}elseif ($tipoMov == 'B25') {
    echo VerMovimi($tipoMov);
	echo ConsultarMarcacion($tipoMov,$dni,$diapro);

}elseif ($tipoMov == 'B26') {
    echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B27') {
    echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B24') {
    echo VerMovimi($tipoMov);
}elseif ($tipoMov == 'B33') {
	echo VerMovimi($tipoMov);
    
}
else{
	echo "No Existe";
	}

}
function ConsultarMarcacion($tipoMov,$dni,$diapro){
	
			$sql_constab=mysql_query("SELECT min(h_entrada) as h_entrada
			 ,max(h_salida)as h_salida,fecha,n_horas_dia FROM asistencia where codigo='$dni' and fecha ='$diapro' group by fecha order by contador asc limit 1;");	
$cant =  mysql_num_rows($sql_constab);
if($cant==1){
while($veres = mysql_fetch_array($sql_constab)){
 	
	   $entradax=$veres["h_entrada"];
	   $salidax=$veres["h_salida"];
	   $dentrada=GuardaHora($entradax);
	   $dsalida=GuardaHora($salidax);
	   
	   echo "<br>";
	   echo "E:".substr($dentrada,0,5);
	   echo "<br>";
	   echo "S:".substr($dsalida,0,5);
	   //echo "<br><font color='#FF0000'>";
	   //echo "T".substr($veres["n_horas_dia"],0,5);
	   //echo "</font>";
	   
      }
	 }else{
		 echo "<font color='#FF0000'>X</font>";
		 }
}


function ConsultarHorarioPro($tipoMov,$dni,$diapro){
	
			$sql_constab=mysql_query("SELECT hentrada,hsalida,thoras, diapro FROM horario where dni='$dni' and diapro='$diapro' limit 1;");	
$cant =  mysql_num_rows($sql_constab);
if($cant==1){
while($veres = mysql_fetch_array($sql_constab)){
 	
	   //echo "<br>";
	   
	   $entradax=$veres["hentrada"];
	   $salidax=$veres["hsalida"];
	   $dentrada=GuardaHora($entradax);
	   $dsalida=GuardaHora($salidax);
	   
	   echo "<br>";
	   echo "E:".substr($dentrada,0,5);
	   echo "<br>";
	   echo "S:".substr($dsalida,0,5);
	   
	   /*
	   
	   echo "E:".substr($veres["hentrada"],0,5);
	   echo "<br>";
	   echo "S:".substr($veres["hsalida"],0,5);
	   //echo "<br><font color='#336600'>";
	   //echo "T->".substr($veres["thoras"],0,2);
	    */
	   
      }
	 }else{
		 echo "<font color='#FF0000'>X</font>";
		 }
}
 
 function VerMovimi($tipoMov){

$sql_movi=mysql_query("select idtipmov, nomtipmov from tipmov where idtipmov='$tipoMov' ;");	
$cantm =  mysql_num_rows($sql_movi);
		while($vermov = mysql_fetch_array($sql_movi)){
		 $vacaciones=$vermov["nomtipmov"];
		 return  $vacaciones;
		}
}
  
 
 function VerificaMoletaHorario($tipoMov,$dni,$diapro){
$sql_movi=mysql_query("SELECT * FROM movimientos where dni='$dni'and diapro='$diapro';");	
$cantmov =  mysql_num_rows($sql_movi);

if($cantmov==1){
		while($vermovi = mysql_fetch_array($sql_movi)){
			 $vermovi["hentrada"];
			echo "<br>";
			echo $vermovi["hentrada"];
			echo $vermovi["hsalida"];
			//echo "<br><font color='#FF0000'>";
			//echo $vermovi["thoras"];
			//echo "<br>";
			 $tipmo=$vermovi["tipmov"];
			 //echo "</font>";
		  echo VerMovimi($tipmo);

		  }
}else{
				 
	 ConsultarMarcacion($tipoMov,$dni,$diapro);
    } 
	 
 }



function DameDia($fecha){
$fechats = strtotime($fecha); 

switch (date('w', $fechats)){
    case 0: echo "Do"; break;
    case 1: echo "Lu"; break;
    case 2: echo "Ma"; break;
    case 3: echo "Mi"; break;
    case 4: echo "Ju"; break;
    case 5: echo "Vi"; break;
    case 6: echo "Sa"; break;
} 

}
// echo DameDia("18-10-2010");
function GuardaHora($hentradax){

    $pieces = explode(".", $hentradax);
	 $horax = $pieces[0]; 
	  $minuto = $pieces[1]; 

	
	 switch ($minuto) {
		case 25: $horaexac=$horax.".".$minuto="15"; break;
		case 50: $horaexac=$horax.".".$minuto="30";	break;
		case 75: $horaexac=$horax.".".$minuto="45";	break;
		default: $horaexac=$hora; break; 
	 }
	 	 
	        $horaexac=$horax.".".$minuto;
     return $horaexac;
}
?>