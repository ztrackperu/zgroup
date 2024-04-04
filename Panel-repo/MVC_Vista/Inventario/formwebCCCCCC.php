<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php $c_nomcli= $_GET['val1']; ?>
<?php $descripcion= $_GET['val2']; ?>
<?php $equipo= $_GET['val3']; ?>
<?php $tipo= $_GET['val4']; ?>
<?php
    $destinatario = "lcruzado@zgroup.com.pe";
    $asunto = "Reserva de Equipos Zgroup";
    $mensaje = 
       'Se ha Realizado La siguiente Reserva de Equipo'.'|'.'Cliente: '.$c_nomcli.'|'.'Descripcion: '.$descripcion.'|'.'Equipo: '.$equipo.'|'.'Tipo: '.$tipo.'|'.'Informacion enviada por:'.' '.'Sistema Intranet Zgroup';
    //para el envío en formato HTML 
  //  $headers = "MIME-Version: 1.0rn"; 
    //$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= 'From: no-reply@zgroup.com.pe.com' . "\r\n";
    $headers .= 'Cc: galfaro@zgroup.com.pe' . "\r\n";
    $headers .= 'Reply-To: mzabarburu@zgroup.com.pe' . "\r\n";
   // $headers .= 'X-Mailer: PHP/' . phpversion();
  //  mail($destinatario,$asunto,$mensaje,$headers);
?>
</body>
</html>