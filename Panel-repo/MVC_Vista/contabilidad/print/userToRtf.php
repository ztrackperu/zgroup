<?php
require('ToRtf.php');

$f = new ToRtf();
$f->fichero = 'plantilla.rtf';
$f->fsalida = 'nuevo.rtf';
$f->dirsalida = '';
$f->retorno = 'fichero';
$f->prefijo = 'p_';
$f->valores = array('#*LETRA*#'=>"CALLAO",'#*NOMBRE*#'=>"Lima",'#*MONTO*#'=>"El Guille");
$f->rtf();
?>