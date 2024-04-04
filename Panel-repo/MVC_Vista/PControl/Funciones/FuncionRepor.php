<?php 
function CalcualDias($anho,$mes){ 
   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) { 
       $dias_febrero = 29; 
   } else { 
       $dias_febrero = 28; 
   } 
   switch($mes) { 
       case 01: return 31; break; 
       case 02: return $dias_febrero; break; 
       case 03: return 31; break; 
       case 04: return 30; break; 
       case 05: return 31; break; 
       case 06: return 30; break; 
       case 07: return 31; break; 
       case 08: return 31; break; 
       case 09: return 30; break; 
       case 10: return 31; break; 
       case 11: return 30; break; 
       case 12: return 31; break; 
   } 
} 

//echo UltimoDia(2012,02)

function DiaMes(){
      $mes=date("m");
	  $anio=date("Y");
	 return  CalcualDias($anio,$mes);
	}
	

function MesDodD($mes){
	switch($mes) { 
       case $mes=1: return 01; break; 
       case 2: return 02; break; 
       case 3: return 03; break; 
       case 4: return 04; break; 
       case 5: return 05; break; 
       case 6: return 06; break; 
       case 7: return 07; break; 
       case 8: return 08; break; 
       case 9: return 09; break; 
       default: return $mes; break;
	   
   }
	
	}
	
	 
?>