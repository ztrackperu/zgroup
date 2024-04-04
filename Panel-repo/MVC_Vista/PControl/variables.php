<?php 

$zxveriable="00";
$xzhora=date("H");
$xzMinustos=date("i");
$horaactx=$zxveriable.($xzhora);
$codact= substr($horaactx, -2);   
$hora=($codact-1).":".$xzMinustos;


 $fecha = date("Y-m-d");


$fecham=date("d M Y ").$hora.":".date("s");

 function NombrePC(){
	 $direccionIP = $_SERVER ['REMOTE_ADDR'];
	 return $ips= @gethostbyaddr($direccionIP);
	 
	 }
	 
	 
?>