<?php 
  $c_nomcli= $_GET['val1']; 
  $descripcion= $_GET['val2']; 
  $equipo=  $_GET['val3']; 
  $tipo= 	 $_GET['val4']; 
  $usuario= $_GET['val5']; 
  $nroasig= $_GET['val6']; 
  $tipomov= $_GET['val7']; //si bien registro,actualiza,elimina 
  $nrocoti=$_GET['val8'];
  $usuariocoti=$_GET['val9'];

  if($usuariocoti == '40294243' || $usuariocoti == 'MATILDE'){
	   $correovendedor='mamenero@zgroup.com.pe';
	   $vendedor='Matilde Amenero';
  }else  if($usuariocoti == '12000100' || $usuariocoti == 'LEIDY'){
	  $correovendedor='lespiritu@zgroup.com.pe';
	  $vendedor='Leidy Espiritu';
  }else  if($usuariocoti == '70210612' || $usuariocoti == 'JLINARES'){
	  $correovendedor='customer@zgroup.com.pe';
	  $vendedor='Matilde Amenero';
  } else  if($usuariocoti == '41696274' || $usuariocoti == 'MARISOL'){
	  $correovendedor='mzabarburu@zgroup.com.pe';
	  $vendedor='Joel Linares';
  }
  
  

   // $destinatario = "mzabarburu@zgroup.com,kespiritu@zgroup.com.pe,$correovendedor";
	 $destinatario = "$correovendedor,mhuaman@zgroup.com.pe";
	 
     $asunto = "Asignacion de equipo para ".$vendedor." Cotizacion ".$nrocoti;
	
	
	
$mensaje.="\n Se ha Realizado La siguiente Asignacion \n";
$mensaje.="\n Nro Asignacion: ".$nroasig;
$mensaje.="\n Tipo: ".$tipomov;
$mensaje.="\n Cotizacion: ".$nrocoti;
$mensaje.="\n Ejecutivo Venta: ".$usuariocoti;
$mensaje.="\n Cliente: ".$c_nomcli;
$mensaje.="\n Descripcion: ".$descripcion;
$mensaje.="\n Equipo(s): ".$equipo;
$mensaje.="\n Condicion: ".$tipo;
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

