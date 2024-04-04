<?php


$deffecha = true;

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


function LeeMes($var_mes,$val_mes,$disabled = 0)
{
   $disabled = ($disabled) ? "disabled" : "";
	 
   echo "<select name=\"$var_mes\" size=\"1\" $disabled>";
   echo "<option value=\"\">--</option>";
   for ($i=1; $i <= 12; $i++)
   {
   	  if ($i < 10) $imes = "0".$i;
  		else $imes = $i;
  		
      $mes = obtieneMes($imes);				
  		
  		$selected = "";
  	  if ($imes == $val_mes or $i == $val_mes) 
         $selected = "selected";
  		
  		echo "<option $selected value=\"$imes\">$mes</option>";
   }
   echo "</select>";
}

function LeeAno($var_ano,$val_ano,$disabled = 0)
{
     $disabled = ($disabled) ? "disabled" : "";
		 
		 echo "<select name=\"$var_ano\" size=\"1\" $disabled>";
		 echo "<option value=\"\">----</option>";
		 for ($i=2009; $i <= 2010; $i++)
		 {
		    $selected = "";
			  if ($i == $val_ano) 
			        $selected = "selected";
		 
				echo "<option $selected value=\"$i\">$i</option>";
		 }
				
		 echo "</select>";
}		

/* $var_dia,$var_mes,$var_ano
	 
	 Definicion actual de la funcion... (llamada a la funcion)
	 LeeFecha ('dia_xxx','mes_xxx','ano_xxx',$dia_xxx,$mes_xxx,$ano_xxx); */


function LeeFecha($var_dia,$var_mes,$var_ano,$val_dia,$val_mes,$val_ano,$disabled = 0)
{
     $disabled = ($disabled) ? "disabled" : "";
 			
		 echo "<select name=\"$var_dia\" size=\"1\" $disabled>";
		 echo "<option value=\"\">--</option>";
		 for ($i=1; $i <= 31; $i++)
		 {
		 	  if ($i < 10) $dia = "0".$i;
				else $dia = $i;
				
				$selected = "";
			  if ($dia == $val_dia) 
			        $selected = "selected";
					 
				echo "<option $selected value=\"$dia\">$dia</option>";
		 }
		 echo "</select>/";
		 
		 LeeMes($var_mes,$val_mes,$disabled);
		 echo "/";
		 LeeAno($var_ano,$val_ano,$disabled);
	   return;
}

function add_dia($fecha,$n = 1)
{
   list ($ano,$mes,$dia) = explode ("-",$fecha);

	 for ($i = 0; $i < $n; $i++)
	 {
  			 $dia = $dia + 1;
  			 if ($dia > 28)
  			 {
  			    $check = checkdate($mes,$dia,$ano);
  					if (!$check)
  					{
      					$dia = 1;
      					$mes++;
      					$check = checkdate($mes,$dia,$ano);
  							if (!$check)
  					    {
  							   $mes = 1;
  								 $ano++; 
  							}
  					}
  			 }
	 }
	 
	 $mes = (strlen($mes) == 1) ? "0".$mes : $mes;
	 $dia = (strlen($dia) == 1) ? "0".$dia : $dia;
	 
	 return "$ano-$mes-$dia";
} 
	
function LeeHora($var_hor,$var_tur,$val_min,$val_hor,$val_tur)
	{
		 echo "<select name=\"$var_hor\" size=\"1\">";
		 echo "<option value=\"\">--</option>";
		 
		 for ($i=1; $i <= 12; $i++)
		 {
		        if ($i < 10) $hor = "0".$i;
				else $hor = $i;
				
				$n = (!$val_min) ? 1 : (60/$val_min);
				for ($j=0; $j < $n; $j++)
		    { 	 
				     if ($j == 0) $min = "00";
						 else 
						 {
						    $m = $j*$val_min;
						    if ($m < 10) $min = "0".$m;
								else $min = $m;
						 }
						 
						 $selected = "";
			       if ($val_hor == $hor.":".$min)  
			           $selected = "selected";
						 
				     echo "<option $selected value=\"$hor:$min\">$hor:$min</option>";
				}
		 }
		 echo "</select> ";
		 
		 echo "<select name=\"$var_tur\" size=\"1\">";
		 
		 if ($val_tur == "pm")
		 {
				 echo "<option value=\"am\">am</option>";
				 echo "<option value=\"pm\" selected>pm</option>";
		 }
		 else
		 {
		     echo "<option value=\"am\" selected>am</option>";
				 echo "<option value=\"pm\">pm</option>";
		 }
		 
		 echo "</select>";
				 
	   return;
	}

	
function formato_tiempo ($tiempo)
{	
		$vtiempo = explode(" ",$tiempo);
							 
    $ftiempo = ""; 
    if ($vtiempo[0] == 1) $ftiempo = "1 año ";
		else if ($vtiempo[0] > 1) $ftiempo = $vtiempo[0] . " años ";
    if ($vtiempo[1] == 1) $ftiempo .= "1 mes ";
    else if ($vtiempo[1] > 1) $ftiempo .= ($vtiempo[1] . " meses ");
    if ($vtiempo[2] == 1) $ftiempo .= "1 día";
    else if ($vtiempo[2] > 1) $ftiempo .= ($vtiempo[2] . " días");
					
		return $ftiempo;
}

function conv_fecha($fini,$ffin,$mostrar_ano)
{
     if ($fini == "0000-00-00" || $ffin == "0000-00-00")
		    return "";
    
     $vfini = explode ("-",$fini); 
     $mes = obtieneMes($vfini[1]);
		 
		 $vffin = explode ("-",$ffin);
		 $mes2 = obtieneMes($vffin[1]);
		 
		 // d de mes de ano 
     // d1 al d2 de mes de ano
		 // d1 de mes1 al d2 de mes2 de ano
		 // d1 de mes1 de ano1 al d2 de mes2 de ano2 

		 if ($vfini[0] == $vffin[0]) // años iguales
		 {
        if ($vfini[1] == $vffin[1]) // meses iguales
				{
				    if ($vfini[2] == "00" || $vffin[2] == "00")  // no hay dato del dia en ambas fechas ..
						   $salida = $mes; 
						else 
    				    if ($vfini[2] == $vffin[2]) // dias iguales
    						   $salida = $vfini[2] . " de " . $mes ;
    						else
    						   $salida = $vfini[2] . " al " . $vffin[2] . " de " . $mes;
    							 
						if ($mostrar_ano)
							     $salida = $salida . " de " . $vfini[0];	 
	      }
				else
				{
				    $salida = $vfini[2] . " de " . $mes . " al " . $vffin[2] . " de " . $mes2;
						
						if ($mostrar_ano)
							     $salida = $salida . " de " . $vfini[0];
			  }
		}
		else
		    $salida = $vfini[2] . " de " . $mes .  " de " . $vfini[0] . " al " . $vffin[2] . " de " . $mes2 . " de " . $vffin[0];
				
    return $salida; 				
				
}

// Hora militar

//$fr = 1, retorna hora militar en fracción (18:30 => 18.5)
//$fr = 0, retorna hora militar en hh:mm (18:30)
 
function hm($hora,$turno,$fr=1)
{
  $h1 = explode(":",$hora);
	if ($turno)
    	$hr = (($turno == "pm") ? (($h1[0] == 12) ? $h1[0] : ($h1[0]+12)) : 
    	                          (($h1[0] == 12) ? "00" : $h1[0]));
	else
	   $hr = $h1[0];
														
  return 	($fr==1) ? ($hr + $h1[1]/60) : ($hr . ":" . $h1[1]);															
}

// Hora en sexagecimal de hora militar en fraccion

function h60($hm)
{
   $h1 = explode(".",$hm);
	 
	 if ($h1[0] == 0)
	     return "-";
	
	 $h2 = abs(round(($hm-$h1[0])*60,0));

	 if ($h2 == "60")
	 {
	    $h1[0]++;
			$h2 = 0;
	 } 
	 
	 return ((strlen($h1[0])==1) ? "0$h1[0]" : "$h1[0]") .":".((strlen($h2)==1) ? "0$h2" : "$h2");
} 

function ht($hora, &$horat, &$turno)
{
   $h1 = explode(":",$hora);
	 
	 if ($h1[0] == 0)
	     return "-";
	 
	 $hr = ($h1[0] >= 22) ? ($h1[0]-12) : (($h1[0] > 12) ? "0" . ($h1[0]-12) : (($h1[0] > 0) ? $h1[0] : 12));
	 $horat = $hr . ":" . $h1[1];

	 $turno = ($h1[0] >= 12) ? "pm" : (($h1[0] > 0) ? "am" : "pm");
	 
	 return "$horat $turno";
} 

function dias($mes)
{
   switch ($mes)
   {
	   // 31 dias
		 case 1: 
		 case 3: 
		 case 5: 
		 case 7: 
		 case 8: 
		 case 10: 
		 case 12: 
		 return 31;
		 // 30 dias
		 case 4: case 6: case 9: 
		 case 11: return 30;
		 // 28 dias
		 case 2: return 28;
   }
}

function sumames($mes1,$mes2)
{
   $suma = 0;
   if ($mes1 <= $mes2)
       for ($mes=$mes1; $mes < $mes2; $mes++)
    			$suma += dias($mes);
	 else
	     for ($mes=$mes1; $mes > $mes2; $mes--)
    			$suma -= dias($mes);
	  
	 return $suma;
}

function sumahoras($h_out,$h_in,$m_out=0,$m_in=0)
{
    if ($m_out == 0 && $m_in == 0)
		{
		   list($h_out,$m_out,$s_out) = explode(":",$h_out);
			 list($h_in,$m_in,$s_in) = explode(":",$h_in);
		}   

    $n_horas = $h_out - $h_in;
		$min = $m_out - $m_in;
		
		if ($min < 0)
		{
		 		$min=60+$min;
				$n_horas--;	
		}
		
    return ((strlen($n_horas)==1)?"0$n_horas":$n_horas).":".((strlen($min)==1)?"0$min":$min).":00";
}

// La funcion retorna una cadena nn::c donde 
// n es el numero de días con pernota y 
// c es una codigo con valores 'M' para medio día 
// y 'S' para dia completo

function calculaViatico($af,$ai,$mi,$mf,$df,$di,$hora1,$hora2,&$htotal)
{
   // calcula la diferencia de dias 
   $dtotal = ($af-$ai)*365 + sumames($mi,$mf) + ($df-$di);


	 
	 // calcula la diferencia de horas
	 $htotal = $dtotal*24 + $hora2 - $hora1; 
	
	 //echo $htotal;		 
	 $tipo = "";
	 if ($htotal > $dtotal*24 and $htotal <= $dtotal*24 + 8)
			 $tipo = "M";
	 else
	     if ($htotal > $dtotal*24 + 8)
			     $tipo = "S";
					 
	 return $dtotal . ":$tipo";
} 

function invfecha($fecha)
{
   $f = explode("-",$fecha);
	 return $f[2] . "-" . $f[1] . "-" . $f[0]; 
}


?>
	

