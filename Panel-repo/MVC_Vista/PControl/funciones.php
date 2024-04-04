<? 
//include("cn/cn.php");




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

/////////////////////////////////////////CAMBIA FECHA DE MYSQL A DD/MM//AA///////////////
function CambiaformatoFecha($fecha){

  list($anio,$mes,$dia) = explode("-", $fecha);

$fecha=$dia."/".$mes."/".$anio;

return $fecha;
}


/////////////////////////////////////////CAMBIA DD/MM//AA FORMATO MYSQL///////////////
function CambiaformatoFechamysql($fecha){

list($dia,$mes,$anio) = explode("/", $fecha);

$fecha=$anio."-".$mes."-".$dia;

return $fecha;
}



function calculadia($a,$b){

      list($ano1, $mes1,$dia1 ) = explode("-", $b);
	  list($ano2, $mes2,$dia2) = explode("-", $a);
	  
//calculo timestam de las dos fechas


$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2);

//resto a una fecha la otra
$segundos_diferencia = $timestamp1 - $timestamp2;
//echo $segundos_diferencia;

//convierto segundos en días
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

//obtengo el valor absoulto de los días (quito el posible signo negativo)
$dias_diferencia = abs($dias_diferencia);

//quito los decimales a los días de diferencia
$dias_diferencia = floor($dias_diferencia);
               if ($testinput==$testinput1){
$dias=$dias_diferencia+1;
 $dias;
                   }else{
$dias=$dias_diferencia+2;
 $dias;
                  }
//$fechai=$ano2."-".$mes2."-".$dia2;
//$fechaf=$ano1."-".$mes1."-".$dia1;

 	return $dias;
}


////////////////////////////////////ENTREGA NIVEL DE USUARIO/////////////

function DameNivel($nivel){

$prores = mysql_query("SELECT * FROM usuario where idusuario='$nivel'");
	  while($rs = mysql_fetch_array($prores)){
	   $dv=$rs["nivel"];
	
	}

return $dv;

}
////////////////////////

function diasVaca($dni,$diapro){

$prores = mysql_query("SELECT count(*) as diasv FROM horario a, tcontrol b  where dni='$dni' and tipmov='T6' and year(a.diapro)=b.aniovaca");
	  while($rs = mysql_fetch_array($prores)){
	   $dvaca=$rs["diasv"];
	
	}

return $dvaca;

}

function diacontrol(){ 
   $diasvaca = mysql_query("SELECT cantdias FROM  tcontrol");
	  while($rv = mysql_fetch_array($diasvaca)){
	      $diavaca=$rv["cantdias"];
}
return $diavaca;
}


function trabajador($dni){ //Entrega nombre y dni
  $prores = mysql_query("SELECT a.nombre,a.centrocosto,a.idcargo,b.idnivel3,nombreniv3, c.cargo FROM plan a, usuario b, cargos c where a.dni='$dni' and a.centrocosto=b.idnivel3 and a.idcargo=c.idcargo");
    $cant =  mysql_num_rows($prores);
     if($cant>0){						
	  while($rs = mysql_fetch_array($prores)){
	   $nombre=$rs["nombre"]."/".$rs["nombreniv3"]."/".$rs["idnivel3"]."/".$rs["cargo"];
} 
}
return $nombre;
}


function ExisteDni($dni){
  $prores = mysql_query("SELECT dni,nombre FROM plan  where dni='$dni'");
	  while($rs = mysql_fetch_array($prores)){
	   $nombredni=$rs["nombre"]."/".$rs["dni"];
}
return $nombredni;
}

function ExistDni($dni){
  $prores = mysql_query("SELECT * FROM personal  where cedula='$dni'");
	  while($rs = mysql_fetch_array($prores)){
	   $nombredni=$rs["apellido"]."/".$rs["cedula"];
}
return $nombredni;
}


function horario($dni,$diapro){
  $diaprogramado = mysql_query("SELECT dni,diapro,hentrada,hsalida FROM horario where dni='$dni' and diapro='$diapro' order by diapro");
	
	
	while($hor = mysql_fetch_array($diaprogramado)){  
	$hentrada=$hor["hentrada"];
	$hsalida=$hor["hsalida"];
 
}
return $hentrada;
}

/////////////////////////////////////////////////////PARA PROCESO DE PLANILLA///////////////////////////////
function DameOK($hentrada,$hsalida,$entrada,$salida,$tipmov,$diapro,$dni){

		//////proceso entrada////////////

list($hhe,$mme) = explode(":",$entrada);	
$mmentrada=$hhe.".".$mme; ///// TABLA MARCA

//////proceso salida//////////// 
list($hhs,$mms) = explode(":",$salida);	
$mmsalida=$hhs.".".$mms;//////////// TABLA SALIDA  
  
  
  switch ($tipmov) {
  
    case T1: //////////////////////////turno mañana///////////////

			if (mmentrada=="" and mmsalida==""){
			    $RESULTA="falta";	
	
				}elseif ($mmentrada>=$hentrada){ 
          
		    $tt = mysql_query("SELECT tolerancia FROM tcontrol");
					while($hor = mysql_fetch_array($tt)){  
	
					$tolerancia=$hor["tolerancia"]/100;

}
		  $calculo=($mmentrada-$hentrada);
		  
			      if($calculo>$tolerancia){ 
			         $RESULTA="falta";
				 } else{
			         $RESULTA="OK";}
     }
	 elseif($mmentrada==$mmsalida){ 
             $RESULTA="falta";
       }
		elseif ($mmsalida>=$hsalida){
		       $RESULTA="OK";
		   }else{
			    $RESULTA="falta"; 
     }
        break;


    case T2: ////////////////////////turno tarde//////////////

    
if ($mmentrada==" "){
	$RESULTA="falta";	
	}elseif ($mmentrada>=$hentrada){ 
          $calculo=($mmentrada-$hentrada);
			      if($calculo>=0.11){ 
			         $RESULTA="falta";
				 } else{
			         $RESULTA="OK";}

     }
	 elseif($mmentrada==$mmsalida){ 
      
             $RESULTA="falta";
       }
		elseif ($mmsalida>=$hsalida){
		       $RESULTA="OK";
		   }else{
			    $RESULTA="falta"; 
			
     }
		   
        break;

	case T3: ////////////////////////turno mañana tarde//////////////////////////

			 	//////proceso entrada////////////

		if ($mmentrada>=$hentrada){ 
          $calculo=($mmentrada-$hentrada);

			      if($calculo>0.11){ 
			         $RESULTA="falta";
				 } else{
			         $RESULTA="OK";}
 
     }
	 elseif($mmentrada==$mmsalida){ 
      
             $RESULTA="falta";
       }
		elseif ($mmsalida>=$hsalida){
		       $RESULTA="OK";
		   }else{
			    $RESULTA="falta"; 
			   }
							
								  break;
						  
						  
	case T4:

		if ($mmentrada>=$hentrada){ 
          $calculo=($mmentrada-$hentrada);

			      if($calculo>0.11){ 
			         $RESULTA="falta";
				 } else{
			         $RESULTA="OK";}
 
     }

               list($anio,$mes,$dia) = explode("-", $diapro);
                    $diapro=$dia."/".$mes."/".$anio;

            $fecha 			= explode("/",$diapro);
			$can_dias 		= 1;
			$dyh 			= mktime(0, 0, 0, $fecha[1], $fecha[0], $fecha[2]) + 24*60*60*$can_dias;
			$fec_termino 	= date('d',$dyh)."/".date('m',$dyh)."/".date('Y',$dyh); 
			
			list($dia,$mes,$anio) = explode("/", $fec_termino);
			$fec_termino=$anio."-".$mes."-".$dia;
			
	$diaprogramado = mysql_query("SELECT entrada,salida,userna,dia FROM marca where dia='$fec_termino' and userna='$dni';");
					while($hor = mysql_fetch_array($diaprogramado)){
			
					 
						$salidax=$hor["salida"];
						list($hhsx,$mmsx) = explode(":",$salidax);	
						$mmsalidax=$hhsx.".".$mmsx;
						
				} ////fin while
        break;
}
 return  $RESULTA; 
}
////////proceso entrada////////////
//
//list($hhe,$mme) = explode(":",$entrada);	
//$mmentrada=$hhe.".".$mme; ///// TABLA MARCA
//
////////proceso salida//////////// 
//list($hhs,$mms) = explode(":",$salida);	
//$mmsalida=$hhs.".".$mms;//////////// TABLA SALIDA
//
//						if ($mmentrada>$hentrada){ 
//          $calculo=$mmentrada-$hentrada;
//
//			      if($calculo>0.10){ 
//			         $RESULTA="falta";
//				 } else{
//			         $RESULTA="OK";}
// 
//                          } else{ $RESULTA="OK";}
// 
//       if ($mmentrada==$mmsalida){
//             $RESULTA="Falta";
//           }


/////////////////////////////////////////FIN PROCESO DE PLANILLAS/////////////////////////////////////////

function DameMes($mes){

  $mespro = mysql_query("SELECT idmes,nommes FROM mes where idmes='$mes'");
	while($mesp = mysql_fetch_array($mespro)){  
	
	$mesprog=$mesp["nommes"];
 
}
return $mesprog;
}

function indica($por){

  if ($por==100){
	
		$img="<img src='images/274/IconShock  General/png/shpere_256.png' width='25' height='25' border='0'/>";
		 } else{
		$img="<img src='images/MsgError.gif' width='25' height='25'/>";
 	}
	
return $img;
}
 
function dame_el_diaf ($fecha)
{
$array_dias['Sunday']    = "Domingo";
$array_dias['Monday']    = "Lunes";
$array_dias['Tuesday']   = "Martes";
$array_dias['Wednesday'] = "Miercoles";
$array_dias['Thursday']  = "Jueves";
$array_dias['Friday']    = "Viernes";
$array_dias['Saturday']  = "Sabado";
return $array_dias[date('l', strtotime($fecha))];
}

 
function Dameanio(){

        $anio = mysql_query("SELECT mespro,aniopro FROM tcontrol");
	          while($aniop = mysql_fetch_array($anio)){  
	   	          
				  $aniomes=$aniop["aniopro"]."-".$aniop["mespro"];
 
}
return $aniomes;
}

function Damefecha(){

        $anio = mysql_query("SELECT mespro,aniopro FROM tcontrol");
	          while($aniop = mysql_fetch_array($anio)){  
	   	          
				  $aniomes=$aniop["aniopro"]."-".$aniop["mespro"];
 
}
return $aniomes;
}


/////////////////////////////////////////////ENTREGA numero de  DIAS DEL MES/////////////////////////////
function getMonthDays($Month, $Year)  
{  
   //Si la extensión que mencioné está instalada, usamos esa.  
   if( is_callable("cal_days_in_month"))  
   {  
      return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);  
   }  
   else  
   {  
      //Lo hacemos a mi manera.  
      return date("t",mktime(0,0,0,$Month,1,$Year));  
   }  
}  
//Obtenemos la cantidad de días que tiene septiembre del 2008  
 //getMonthDays(9, 2008);
 
 
 function DameMov($diapro,$dni){  
  
  $anio = mysql_query("SELECT m.diapro,m.dni,m.tipmov,t.idtipmov,t.tipo FROM movimientos m, tipmov t  where m.dni='$dni' and m.diapro='$diapro' and m.tipmov=t.idtipmov ");
         
		 $canti =  mysql_num_rows($anio);
	 if($canti>0){
		  while($aniop = mysql_fetch_array($anio)){  

          $tipo=$aniop["tipo"];
          
		   switch ($tipo) {
		case D:
				   $tipo;
				  $sit="falta"; 
		break;
		
		case H:
		          $sit="pensando";
		break;
		
		case N:
		
          $sit="OK";
		
		break;
		
		default: 
                  $sit="falta";
		 break; 
	}
	 }
	 }else{$sit="falta";}
     return $sit;  
	}  
	
	 function Cuentatra(){  
	   $anio = mysql_query("select count(*) as cant from plan where idcon='AC';");
		  while($aniop = mysql_fetch_array($anio)){  
	       $cant=$aniop["cant"];
	}
	 return $cant;  
	}
	
 function Djudicial($dni){  
	      $anio        = mysql_query("select  porjud,tipjud,sueldo from plan where dni='$dni' and porjud>1 and idcon='AC';");
		  while($aniop = mysql_fetch_array($anio)){  
	       $porjud=$aniop["porjud"];
		   $tipjud=$aniop["tipjud"];
		   $sueldo=$aniop["sueldo"];
		   
		    
			 switch ($tipjud) {
		case 0:
				  $totjud=$porjud*0; 
		break;
		
		case 1:
		          $totjud=$porjud;
		break;
		
		case 2:
		          $totjud=$porjud*$sueldo/100;
		break;
			 }
}
	
		 return $totjud;  
	}	
	

    function Cuentafaltas($dni,$fecini,$fecfin){
				    $tt = mysql_query("SELECT tolerancia FROM tcontrol");
					      while($hor = mysql_fetch_array($tt)){  
						  $tolerancia=$hor["tolerancia"]/100;}

$conteo=0;

			 $hora = mysql_query("select  * from hh where dni='$dni' and diapro>='$fecini' and diapro<='$fecfin';");
		              while($horari = mysql_fetch_array($hora)){  
		       	$dni			=$horari["dni"];
			   	$diapro			=$horari["diapro"];
		   		$hsalida		=$horari["hsalida"];
		   		$tipmov			=$horari["tipmov"];
		   

			
		
			  switch ($tipmov) {

       case T1:
															// echo "/".$dia;			  			    
				if($calculo>$tolerancia){
								 $conteo=$conteo+1;

				}elseif ($mmsalida<$hsalida){
								 $conteo=$conteo+1;

				}elseif($mmentrada==$mmsalida){ 
                				 $conteo=$conteo+1;
													
				}elseif($mmentrada==NULL and $hentrada<>""){
								 $conteo=$conteo+1;	
													
                }elseif($mmsalida==NULL and $hsalida<>""){	
								 $conteo=$conteo+1;}
													
								 	 
     break; 

     
   
     case T4:
							
	if($calculo>$tolerancia){
								 $conteo=$conteo+1;
													
				}elseif ($mmsalida<$hsalida){
								 $conteo=$conteo+1;
						
				}elseif($mmentrada==$mmsalida){ 
                				 $conteo=$conteo+1;
						
				}elseif($mmentrada==""){
								 $conteo=$conteo+1;	
						
                }elseif($mmsalida==""){	

				$diaprogramado = mysql_query("SELECT dia,entrada,salida,userna,DATE_ADD(dia,interval 1 day) FROM marca where 			dia='$diapro' and userna='$dni';");
				    $cant =  mysql_num_rows($diaprogramado);
                  if($cant>0){	
					while($hor = mysql_fetch_array($diaprogramado)){
					    	     $salidax=$hor["salida"];
								 list($hhsx,$mmsx) = explode(":",$salidax);	
					   			 $mmsalidax=$hhsx.".".$mmsx;}
						            
				                        
				   }elseif($cant==0){
				                 $conteo=$conteo+2;

                   }elseif($mmsalidax<$hsalida){
				                 $conteo=$conteo+2;}

}                              
	break;     

    default: 
		           $conteo=$conteo+0;
 	 break; 

  			   
} // fin swicht
} // fin while horarios

return $conteo;
}//  fin funcion*/


	    function DameMovi($dni){

			 $hora = mysql_query("select  count(dni) as dn from movimientos where dni='$dni';");
                $cant =  mysql_num_rows($hora);
                 if($cant>0){
			                  while($hor = mysql_fetch_array($hora)){
					    	     $totalmov=$hor["dn"];}
			   
			   }
				return $totalmov;
				}	
				
				
		function existetiphor($tiphor){

		 $hora = mysql_query("select  *  from horarios where hro='$tiphor';");
         $cant =  mysql_num_rows($hora);
             if($cant>0){
                 while($hor = mysql_fetch_array($hora)){
					    				   
			   $var=$hor["tipo"]."/".$hor["entrada"]."/".$hor["salida"]."/".$hor["horas"];
//	
  }  }
			   
				return $var;
				}	


			function	DameCentrodeCosto($idnivel3){

				$smes = mysql_query("SELECT * FROM usuario where idnivel3='$idnivel3'");
                $cant =  mysql_num_rows($smes);
                    if($cant>0){						
                   	while($rs = mysql_fetch_array($smes)){
                     $cc=$rs["nombreniv3"]."/".$rs["aniopro"]."/".$rs["mespro"]."/".$rs["fecprofin"];
}
} 
return $cc;
}				
?>