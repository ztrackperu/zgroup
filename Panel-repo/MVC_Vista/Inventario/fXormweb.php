<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php $c_nomcli= $_GET['val1']; ?>
<?php $c_numped= $_GET['val2']; ?>
<?php $c_asunto= $_GET['val3']; ?>
<?php $c_oper= $_GET['val4']; ?>

<?php 

if($c_oper=='40294243'){
	$vendedor='Matilde';
	$mail='mamenero@zgroup.com.pe';
	}elseif($c_oper=='12000100'){	
	$vendedor='Leidy';
	$mail='lespiritu@zgroup.com.pe';
	}elseif($c_oper=='43846701'){	
	$vendedor=utf8_decode('Heidy');
	$mail='hzabarburu@zgroup.com.pe';
	}

?>

<?php
    $destinatario = "mamenero@zgroup.com.pe";
    $asunto = "Aprobacion de Cotizacion"." / ".$c_numped;
    $mensaje = 
       $vendedor.' '.'ha Solicitado la Aprobacion de una cotizacion'.'|'.'Cliente: '.$c_nomcli.'|'.'Cotizacion: '.$c_numped.'|'.'Asunto: '.$c_asunto.'|'.'Informacion enviada por:'.' '.'Sistema Intranet Zgroup';
	   
    //para el envío en formato HTML 
  //  $headers = "MIME-Version: 1.0rn"; 
    //$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= 'From: no-reply@zgroup.com.pe.com' . "\r\n";
    $headers .= 'Cc: $mail' . "\r\n";
    //$headers .= 'Reply-To: mzabarburu@zgroup.com.pe' . "\r\n";
   // $headers .= 'X-Mailer: PHP/' . phpversion();
    mail($destinatario,$asunto,$mensaje,$headers);
?>
</body>
</html>