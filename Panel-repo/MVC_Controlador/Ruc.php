<?php 

$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+10 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

echo ($nuevafecha);
?>