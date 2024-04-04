<?php
function RecuperarXML($url,$nomtxt){
$ch = curl_init($url);
             $fp = fopen($nomtxt, "w");
             curl_setopt($ch, CURLOPT_FILE, $fp);
             curl_setopt($ch, CURLOPT_HEADER, 0);
             curl_exec($ch);
             curl_close($ch);
             fclose($fp);  
}
function QuitarXML($archivo){
$abrir = fopen($archivo,'r+');
$contenido = fread($abrir,filesize($archivo));
fclose($abrir);
  $contenido = explode("\n",$contenido);
  
  $contenido =  str_replace('<?xml version="1.0"?>', '', $contenido) ;
  $contenido =  str_replace('<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">', '',$contenido) ;
  $contenido =  str_replace('<wml>', '', $contenido) ;
  $contenido =  str_replace('<head>', '', $contenido) ;
  $contenido =  str_replace('<meta forua="true" http-equiv="Cache-Control" content="no-cache"/>', '', $contenido) ;
  $contenido =  str_replace('</head>', '', $contenido) ;
  $contenido =  str_replace('<template>', '', $contenido) ;
  $contenido =  str_replace('<do type="accept" label="Menu">', '', $contenido) ;
  $contenido =  str_replace('<go href="/w/InicioRucWap.jsp" />', '', $contenido) ;
  $contenido =  str_replace('</do>', '', $contenido) ;
  $contenido =  str_replace('<do type="options" label="Back">', '', $contenido) ;
  $contenido =  str_replace('<prev />', '', $contenido) ;
  $contenido =  str_replace('</do>', '', $contenido) ;
  $contenido =  str_replace('</template>', '', $contenido) ;
  $contenido =  str_replace('<p>', '', $contenido) ;
  $contenido =  str_replace('<br/>', '', $contenido) ;
  $contenido =  str_replace('</p>', '', $contenido) ;
  $contenido =  str_replace('</card>', '', $contenido) ;
  $contenido =  str_replace('</wml>', '', $contenido) ;
  $contenido =  str_replace('<card title="Resultado" id="frstcard">', '', $contenido) ;
  $contenido =  str_replace('<b>', '', $contenido) ;
  $contenido =  str_replace('</b>', '', $contenido) ;
  $contenido =  str_replace('<small>', '', $contenido) ;
  $contenido =  str_replace('</small>', '|', $contenido) ;
  $contenido =  str_replace('<!--', '', $contenido) ;
  $contenido =  str_replace('-->', '', $contenido) ;
  $contenido =  str_replace('-->', '', $contenido) ;
  $contenido =  str_replace('<strong>', '', $contenido) ;
  $contenido =  str_replace('</strong>', '', $contenido) ;
  $contenido =  str_replace('</strong>', '', $contenido) ;
  
 $contenido =   str_replace('      ', '', $contenido) ;
  $contenido =  str_replace('		', '', $contenido) ;
  $contenido =  str_replace('	', '', $contenido) ;
  $contenido =  str_replace('	    	', '', $contenido) ;
  $contenido =  str_replace('\n', '', $contenido) ;
  $contenido = implode("",$contenido);
$abrir = fopen($archivo,'w');
    fwrite($abrir,$contenido);
    fclose($abrir);
	
	
	}
function QiotarLinesBlancas($file){
	//$file='./links.txt';
$str=file_get_contents("$file");
$str = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $str);
file_put_contents("$file", "$str");
	}




function Sumar_Mes($fecha,$nmes=""){ 
list($dia,$mes,$anyo)=explode("-",$fecha); 
$end_mes=array("01"=>"31","02"=>"28","03"=>"31","04"=>"30","05"=>"31","06"=>"30","07"=>"31","08"=>"31","09"=>"30","10"=>"31","11"=>"30","12"=>"31");
checkdate($mes,$dia,$anyo) or die("<div style='font-family:Arial'><strong>Error:</strong> Fecha Invalida! ".$fecha."</div>"); 
$tmpanio=floor($nmes/12); 
$tmpmes=$nmes%12; 
$anyo+=$tmpanio; 
$mesnew=$mes+$tmpmes; 
$mes_cobro=($mesnew<10)?"0".($mesnew):($mesnew); 
if($mes_cobro=="02") 
$end_mes["02"]=(IsBisiesto($anyo))?"29":"28"; 
if($dia<=$end_mes[$mes_cobro]) 
$fec_cobro=$dia."/".$mes_cobro."/".$anyo; 
else 
$fec_cobro=$end_mes[$mes_cobro]."/".$mes_cobro."/".$anyo; 
echo $fec_cobro.'<br>'; 

} 
function IsBisiesto($Year){ 
$value=(($Year%4==0) && ($Year%100!=0) || ($Year%400==0) )?true:false; 
return $value; 
} 

//*******************************Encriptar y desencriptat codigo php**********************
 function Encriptar($string) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen(1))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

//echo $cadena_encriptada = encrypt("index.php?id=0","0");
function Desencripar($string) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen(1))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

//echo $cadena_desencriptada = decrypt($cadena_encriptada,"0");

//**********************************fin encriptamiento************************
//direccionar ubigeo 
function DireccionarUbigeo($variable){
	switch ($variable) {
	case 0: $url= 'confirma_ubigeo.php'; break; 
	case 1: $url= 'confirma_ubigeodireccion.php'; break; 
	case 2: $url= 'confirma_ubigeodireccionDNI.php'; break; 
			
	}
return $url; 
}
//echo DireccionarUbigeo("0");




function Fecha_Actual_Escrita(){
$mes = date("n");
$mesArray = array(
1 => "Enero",
2 => "Febrero",
3 => "Marzo",
4 => "Abril",
5 => "Mayo",
6 => "Junio",
7 => "Julio",
8 => "Agosto",
9 => "Septiembre",
10 => "Octubre",
11 => "Noviembre",
12 => "Diciembre"
);
$semana = date("D");
$semanaArray = array(
"Mon" => "Lunes",
"Tue" => "Martes",
"Wed" => "Miercoles",
"Thu" => "Jueves",
"Fri" => "Viernes",
"Sat" => "Sábado",
"Sun" => "Domingo",
);
$mesReturn = $mesArray[$mes];
$semanaReturn = $semanaArray[$semana];
$dia = date("d");
$anio = date ("Y");
return $semanaReturn." ".$dia." de ".$mesReturn." del ".$anio;
}
// echo Fecha_Actual_Escrita(); // Lunes 14 de Marzo del 2011

//guardar fecha en el formato aaaa-mm-dd
function gfecha($fecha){
    list($anio,$mes,$dia)=explode("/",$fecha);
    return $dia."-".$mes."-".$anio;
}
//echo gfecha('11/12/2010'); Res : 2010-12-11


//ver fecha del formato aaa-mm-dd  a dd/mm/aaaa
function vfecha($fecha){
    if($fecha){
        list($anio,$mes,$dia)=explode("-",$fecha);
        return $dia."/".$mes."/".$anio;
    }else{
        return '';
    }
}
//echo  vfecha('2010-12-31'); Res: 31/12/2010


// subir todo tipo de archivo desde un documento hasta una imagen
 function XSubirArchivo($nombredni,$destinox){
	 $status = "";
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$nombrearchi= substr($archivo, -4);
	$xmon=$nombredni.$nombrearchi;
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  $destinox."/".$xmon;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			$status = "Error al subir el archivo";
		}
	} else {
		$status = "Error al subir archivo";
	}
  return $destino;
 }
 ///SubirArchivo("rusbel","files");
 
  function SubirArchivoAutoNombe($nombre,$destinox){
	 $status = "";
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),3,3);
	$nombrearchi=$nombre."_DG_".$prefijo.$rest = substr($archivo, -4);
	
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  $destinox."/".$nombrearchi;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			$status = "Error al subir el archivo";
		}
	} else {
		$status = "Error al subir archivo";
	}
return $destino;
 }
 ///SubirArchivo("rusbel","files");
 
function Codigodebarra($codigobarra){
	 $numero="0000000000000000";
	  
  $nuevobarcode=$numero.$codigobarra;
  return $rest = substr($nuevobarcode, -12,12);
	 }
 
function vercaducidad($fechafin){

  
$prueba = date("Y-m-d");

if (strcmp($prueba, $fechafin)<0) {
echo "vigente ";
}else{ 
echo "<font color='#FF0000'>Caduco</font> ";
}
}

//compra dos fechas mayor menor igual
function compara_fechas($fecha1,$fecha2)
{
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha1))
              list($dia1,$mes1,$año1)=split("/",$fecha1);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha1))
              list($dia1,$mes1,$año1)=split("-",$fecha1);
        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha2))
              list($dia2,$mes2,$año2)=split("/",$fecha2);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha2))
              list($dia2,$mes2,$año2)=split("-",$fecha2);
        $dif = mktime(0,0,0,$mes1,$dia1,$año1) - mktime(0,0,0, $mes2,$dia2,$año2);
        return ($dif);                         
}
/*
if (compara_fechas($f1,$f2) <0)
      echo "$f1 es menor que $f2 <br>";
if (compara_fechas($f1,$f2) >0)
      echo "$f1 es mayor que $f2 <br>";
if (compara_fechas($f1,$f2) ==0)
*/

// Calcula la edad (formato: año/mes/dia)
function edad($edad){
list($anio,$mes,$dia) = explode("-",$edad);
$anio_dif = date("Y") - $anio;
$mes_dif = date("m") - $mes;
$dia_dif = date("d") - $dia;
if ($dia_dif < 0 || $mes_dif < 0)
$anio_dif--;
return $anio_dif;
}
//edad("1992-03-06");
function GenerarCodigo(){
return $numero_aleatorio = rand(1,10000000); 
}


//saca el formato del archivo 
function TipoImagen($eten){
$rest = substr($eten, -3); 
switch($rest){
case doc: $img="word.gif"; break;
case pdf: $img="pdf.gif"; break;
case xls: $img="excel.gif"; break;
case rar: $img="winrar.gif"; break;
case zip: $img="winrar.gif"; break;
case ppt: $img="gif.gif"; break;
case jpg: $img="imagen.gif"; break;
default: $img="download.png"; 
} 
return $img;  

}
 
 
	  //funcion nombre de la PC
     function NombrePC(){
	 $direccionIP = $_SERVER ['REMOTE_ADDR'];
	 return $ips= @gethostbyaddr($direccionIP);
	 
	 }
	
	 //Ip de la  pc
	 function IPPC(){
	 return $direccionIP = $_SERVER ['REMOTE_ADDR'];
	  $ips= @gethostbyaddr($direccionIP);
	 
	 }
	 
	
	//ip Linux  
	function IPLinux ($ip) {
	
	 $host = `host $ip`;
	 return (($host ? end ( explode (' ', $host)) : $ip));
	}
	
	//ip Windows
	
	function IPWindows ($ip) {
	 $host = split('Name:',`nslookup $ip`);
	 return ( trim (isset($host[1]) ? str_replace ("\n".'Address:  '.$ip, '', $host[1]) : $ip));
	}
	


    //direccion MAC
	
	function DireccionMAC($ip){
	
	    $comando=`/usr/sbin/arp $ip`;
		$comando=`arp -a $ip`;
        ereg(".{1,2}-.{1,2}-.{1,2}-.{1,2}-.{1,2}-.{1,2}|.{1,2}:.{1,2}:.{1,2}:.{1,2}:.{1,2}:.{1,2}", $comando, $mac);

		return  $mac[0]; 	
			
  	}
	
 
			   function Terminal(){
     			$ipx=IPPC();
   			   $macx=DireccionMAC($ipx);
			   $nompcx=NombrePC();   
			 $terminalx=$ipx."|".$macx."|".$nompcx;	   
			 return $terminalx;
			   }
	function NombreMes($nummes){
   
   switch($nummes) {
       case 01: return "Enero"; break;
       case 02: return "Febrero"; break;
       case 03: return "Marzo"; break;
       case 04: return "Abril"; break;
       case 05: return "Mayo"; break;
       case 06: return "Junio"; break;
       case 07: return "Julio"; break;
       case 08: return "Agosto"; break;
       case 09: return "Setiempre"; break;
       case 10: return "Octubre"; break;
       case 11: return "Noviembre"; break;
       case 12: return "Diciembre"; break;
   }
} 		   
function RestarHoras($horaini,$horafin)
{
	list($horai, $mini, $segi) = split('[:/.-]', $horaini);
	list($horaf, $minf, $segf) = split('[:/.-]', $horafin);
 

$ini=((($horai*60)*60)+($mini*60)+$segi);
$fin=((($horaf*60)*60)+($minf*60)+$segf);

$dif=$fin-$ini;

$difh=floor($dif/3600);
$difm=floor(($dif-($difh*3600))/60);
$difs=$dif-($difm*60)-($difh*3600);
return date("H:i",mktime($difh,$difm,$difs));
}
function HoraNumerico($res){
			$div=explode(':',$res);
			$Hora=$div[0];
			$Minutos=($div[1]/60)*100;
			return $Hora.'.'.$Minutos;
}

function Dia_dela_Seman ($fecha){
$array_dias['Sunday']    = "DO";
$array_dias['Monday']    = "LU";
$array_dias['Tuesday']   = "MA";
$array_dias['Wednesday'] = "MI";
$array_dias['Thursday']  = "JU";
$array_dias['Friday']    = "VI";
$array_dias['Saturday']  = "SA";
return $array_dias[date('l', strtotime($fecha))];
}

function convertirdecimal($tiempo){
			   // $res=$num/60;
		 return      $lo_que_quiero = date("i:s", mktime(0, 0, $tiempo, 1, 1, 1970));  
			}
			
			function ConvertirHoraEntero($res){
			$div=explode(':',$res);
			$Hora=$div[0];
			$Minutos=$div[1];
			$Segundos=$div[2];
			$Hente=(60*$Hora);
			return ($Hente+$Minutos);
		}
///------------Calcular porcentaje -----------///		
function porcentaje($cantidad,$porciento,$decimales){
return number_format($cantidad*$porciento/100 ,$decimales);
}		
////////////////////////Nimero de dias del mes /////////////////////////////////////////////

function DiasDelMes($Month, $Year) 
{ 
   //Si la extensión que mencioné está instalada, usamos esa. 
   if( is_callable("cal_days_in_month")) 
   { 
      return cal_days_in_month(CAL_GREGORIAN, $Month, $Year); 
   } 
   else 
   { 
      //Lo hacemos a mi manera. 
      return date("d",mktime(0,0,0,$Month+1,0,$Year)); 
   } 
} 



function CalculaEdad($fecha_de_nacimiento,$fecha_actual){
// separamos en partes las fechas
$array_nacimiento = explode ( "-", $fecha_de_nacimiento );
$array_actual = explode ( "-", $fecha_actual );

$anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos años
$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
$dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos días

//ajuste de posible negativo en $días
if ($dias < 0)
{
    --$meses;

    //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
    switch ($array_actual[1]) {
           case 1:     $dias_mes_anterior=31; break;
           case 2:     $dias_mes_anterior=31; break;
           case 3: 
                if (bisiesto($array_actual[0]))
                {
                    $dias_mes_anterior=29; break;
                } else {
                    $dias_mes_anterior=28; break;
                }
           case 4:     $dias_mes_anterior=31; break;
           case 5:     $dias_mes_anterior=30; break;
           case 6:     $dias_mes_anterior=31; break;
           case 7:     $dias_mes_anterior=30; break;
           case 8:     $dias_mes_anterior=31; break;
           case 9:     $dias_mes_anterior=31; break;
           case 10:     $dias_mes_anterior=30; break;
           case 11:     $dias_mes_anterior=31; break;
           case 12:     $dias_mes_anterior=30; break;
    }

    $dias=$dias + $dias_mes_anterior;
}

//ajuste de posible negativo en $meses
if ($meses < 0)
{
    --$anos;
    $meses=$meses + 12;
}

if($anos>0){
return $anos;
}elseif($meses>0){
	return $meses;
	}elseif($dias>0){
		return $dias;} 

 

	
}

function CalculaEdad_Nuevo($fecha_de_nacimiento){
// separamos en partes las fechas
$array_nacimiento = explode ( "-", $fecha_de_nacimiento );
$fecha_actual=date("Y-m-d");
$array_actual = explode ( "-", $fecha_actual );

$anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos años
$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
$dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos días

//ajuste de posible negativo en $días
if ($dias < 0)
{
    --$meses;

    //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
    switch ($array_actual[1]) {
           case 1:     $dias_mes_anterior=31; break;
           case 2:     $dias_mes_anterior=31; break;
           case 3: 
                if (bisiesto($array_actual[0]))
                {
                    $dias_mes_anterior=29; break;
                } else {
                    $dias_mes_anterior=28; break;
                }
           case 4:     $dias_mes_anterior=31; break;
           case 5:     $dias_mes_anterior=30; break;
           case 6:     $dias_mes_anterior=31; break;
           case 7:     $dias_mes_anterior=30; break;
           case 8:     $dias_mes_anterior=31; break;
           case 9:     $dias_mes_anterior=31; break;
           case 10:     $dias_mes_anterior=30; break;
           case 11:     $dias_mes_anterior=31; break;
           case 12:     $dias_mes_anterior=30; break;
    }

    $dias=$dias + $dias_mes_anterior;
}

//ajuste de posible negativo en $meses
if ($meses < 0)
{
    --$anos;
    $meses=$meses + 12;
}

if($anos>0){
return $anos." "."años";
}elseif($meses>0){
	return $meses." "."meses";
	}elseif($dias>0){
		return $dias." "."días";} 

 

	
}
function MostraAnioMesDia($fecha_de_nacimiento,$fecha_actual){
// separamos en partes las fechas
$array_nacimiento = explode ( "-", $fecha_de_nacimiento );
$array_actual = explode ( "-", $fecha_actual );

$anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos años
$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
$dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos días

//ajuste de posible negativo en $días
if ($dias < 0)
{
    --$meses;

    //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
    switch ($array_actual[1]) {
           case 1:     $dias_mes_anterior=31; break;
           case 2:     $dias_mes_anterior=31; break;
           case 3: 
                if (bisiesto($array_actual[0]))
                {
                    $dias_mes_anterior=29; break;
                } else {
                    $dias_mes_anterior=28; break;
                }
           case 4:     $dias_mes_anterior=31; break;
           case 5:     $dias_mes_anterior=30; break;
           case 6:     $dias_mes_anterior=31; break;
           case 7:     $dias_mes_anterior=30; break;
           case 8:     $dias_mes_anterior=31; break;
           case 9:     $dias_mes_anterior=31; break;
           case 10:     $dias_mes_anterior=30; break;
           case 11:     $dias_mes_anterior=31; break;
           case 12:     $dias_mes_anterior=30; break;
    }

    $dias=$dias + $dias_mes_anterior;
}

//ajuste de posible negativo en $meses
if ($meses < 0)
{
    --$anos;
    $meses=$meses + 12;
}

if($anos>0){
return "1";
}
elseif($meses>0){
	return "2";
	}elseif($dias>0){
		return "3";
			}

 

	
}
	function bisiesto($anio_actual){
    $bisiesto=false;
    //probamos si el mes de febrero del año actual tiene 29 días
      if (checkdate(2,29,$anio_actual))
      {
        $bisiesto=true;
    }
    return $bisiesto;
}	   
function Cambiarformatofechadiamesyanio($Fechapac){
	$panio= substr($Fechapac,0,4);
	$pmeses= substr($Fechapac,5,2);
	$pdias= substr($Fechapac,8,2);
	$phoras= substr($Fechapac,11,8);
	
	return  $pdias."/".$pmeses."/".$panio." ".$phoras;
	
	}
			/////////////////////////////////////////CAMBIA DD/MM//AA FORMATO MYSQL///////////////
function CambiaformatoFechamysql($fecha){

list($dia,$mes,$anio) = explode("/", $fecha);

$fecha=$anio."-".$mes."-".$dia;

return $fecha;
}


function calculardiamesanio($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);

        $time = $edate - $sdate;
        if($time>=0 && $time<=59) {
                // Seconds
                $timeshift = $time.' Segundo ';

        } elseif($time>=60 && $time<=3599) {
                // Minutes + Seconds
                $pmin = ($edate - $sdate) / 60;
                $premin = explode('.', $pmin);
               
                $presec = $pmin-$premin[0];
                $sec = $presec*60;
               
                $timeshift = $premin[0].' Minutos '.round($sec,0).' Segundo ';

        } elseif($time>=3600 && $time<=86399) {
                // Hours + Minutes
                $phour = ($edate - $sdate) / 3600;
                $prehour = explode('.',$phour);
               
                $premin = $phour-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;

                $timeshift = $prehour[0].' Horas '.$min[0].' Minutos '.round($sec,0).' Segundo ';

        } elseif($time>=86400) {
                // Days + Hours + Minutes
                $pday = ($edate - $sdate) / 86400;
                $preday = explode('.',$pday);

                $phour = $pday-$preday[0];
                $prehour = explode('.',$phour*24);

                $premin = ($phour*24)-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;
               
                $timeshift = $preday[0].' D&iacute;as '.$prehour[0].' Horas '.$min[0].' Minutos '.round($sec,0).' Segundos ';

        }
        return $timeshift;
}

 function compararFechas($primera, $segunda)
 { //'d/m/Y'
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 
  $diaPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[2]; 
  $diaSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[2];
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es válida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es válida";
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 
}

function dias_transcurridos($fecha_i,$fecha_f)
{//'Y/m/d'
                $dias     = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                
				$dias = floor($dias);                            
                return $dias;
}

// Evaluar los datos que ingresa el usuario y eliminamos caracteres no deseados.
function evaluar($valor) 
{
	$nopermitido = array("'",'\\','<','>',"\"");
	$valor = str_replace($nopermitido, "", $valor);
	return $valor;
}

// Formatear una fecha a microtime para añadir al evento, tipo 1401517498985.
function _formatear($fecha)
{
	return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}

// EXAMPLE:
 /*$start_date = "2010-03-20 11:03:21";
 $end_date = "2012-04-08 13:50:24";

 echo calculardiamesanio($start_date, $end_date);	*/ ?>