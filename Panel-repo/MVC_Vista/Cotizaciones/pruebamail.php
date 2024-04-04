<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 

include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");
        $mail = new PHPmailer();
	    $mail->IsSMTP(); // send via SMTP
        $mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl';
		$mail->Host='smtp.gmail.com';
		$mail->Port = 465;
        $mail->Username = "zgroupsac@gmail.com"; // SMTP username
        $mail->Password = "zgroup3341"; // SMTP password
  
  $mail->SetFrom('sistemas@zgroup.com.pe', utf8_decode('Servidor IBM'));
 
//se asigna un tiempo limite para envío de correo
$mail->Timeout = 30;
 
//se activa el soporte de HTML
$mail->isHTML(true);
 
//se asigna un correo destino
$mail->AddAddress('lcruzado@zgroup.com.pe','Area Comercial');
//$mail->AddAddress('zgroupsac@gmail.com','Area Comercial');
//$mail->AddAddress('mamenero@zgroup.com.pe','Area Comercial');
//$mail->AddAddress('jzabarburu@zgroup.com.pe','Area Comercial');
 
//se asigna el cuerpo del mensaje
$mail->Body = '<h1>Estos Son los Alquileres que van a vencer</h1><p>Empresa 1 | Contenedor Reefer 40 hc| fecha venc:30/06/2013</p>';
 
//se asigna el asunto del mensaje
$mail->Subject = 'ALERTA DE VENCIMIENTOS DE ALQUILERES';
  

try {
    //se manda el mensaje
    if(!$mail->Send()) {
        throw new Exception('Error: '.$mail->ErrorInfo);
    }
}
catch (Exception $e ){
     echo $e->getMessage();
}
?>





</body>
</html>