<?php 
  $cliente= $_GET['val1'];     //cliente
  $descripcion= $_GET['val2']; 
  $equipo=  $_GET['val3']; 
  $guia= 	 $_GET['val4']; 
  $eirsalida= 	 $_GET['val4']; 
  $usuario= $_GET['val5']; 
  $nroeir= $_GET['val6']; 
  $tipo=$_GET['val6'];
   $destinatario = "mzabarburu@zgroup.com,kespiritu@zgroup.com.pe,galfaro@zgroup.com.pe";
//	 $destinatario = "kespiritu,galfaro@zgroup.com.pe";
	 
     $asunto = "Eir Ingreso por Devolucion";
	
	
	
$mensaje.="\n Se ha Realizado El ingreso de Equipo por Devolucion \n";
$mensaje.="\n Tipo: ".$tipo;
$mensaje.="\n Cliente: ".$cliente;
$mensaje.="\n Guia Salida: ".$guia;
$mensaje.="\n Guia Salida: ".$nroeir;
$mensaje.="\n Descripcion Equipo: ".$descripcion;
$mensaje.="\n Codigo Equipo: ".$equipo;
$mensaje.="\n Informacion enviada por: Sistema Web Zgroup";
    //para el envío en formato HTML 
  //  $headers = "MIME-Version: 1.0rn"; 
    //$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= 'From: no-reply@zgroup.com.pe' . "\r\n";
   // $headers .= 'Cc: wzabarburu@zgroup.com.pe,ezabarburu@zgroup.com.pe' . "\r\n";
    //$headers .= 'Bcc: jzabarburu@zgroup.com.pe,galfaro@zgroup.com.pe' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    mail($destinatario,$asunto,$mensaje,$headers);
?>

